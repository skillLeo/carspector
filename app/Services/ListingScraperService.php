<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ListingScraperService
{
    public function scrape(string $url): array
    {
        $platform = $this->detectPlatform($url);

        try {
            $data = match ($platform) {
                'mobile'      => $this->parseMobileDe($this->fetchHtmlViaScraperApi($url)),
                'autoscout24' => $this->parseAutoScout24($this->fetchHtml($url)),
                default       => $this->parseGeneric($this->fetchHtml($url)),
            };

            $data['platform'] = $platform;
            $keyFields = ['brand', 'model', 'make_year', 'mileage'];
            $filled = array_filter(array_intersect_key($data, array_flip($keyFields)), fn($v) => !empty($v));
            $data['status'] = count($filled) >= 3 ? 'success' : (count($filled) > 0 ? 'partial' : 'failed');

            return $data;

        } catch (\Throwable $e) {
            Log::warning('ListingScraper failed', ['url' => $url, 'error' => $e->getMessage()]);
            return ['status' => 'failed', 'platform' => $platform, 'error' => 'Could not read the listing. The site may have blocked the request.'];
        }
    }

    // ─── Platform detection ───────────────────────────────────────────────────

    private function detectPlatform(string $url): string
    {
        if (str_contains($url, 'autoscout24')) return 'autoscout24';
        if (str_contains($url, 'mobile.de'))   return 'mobile';
        return 'unknown';
    }

    // ─── ScraperAPI — mobile.de ──────────────────────────────────────────────

    private function fetchHtmlViaScraperApi(string $url): string
    {
        $apiKey = env('SCRAPER_API_KEY');
        if (!$apiKey) {
            throw new \RuntimeException('SCRAPER_API_KEY not configured');
        }

        $fetchUrl = 'https://api.scraperapi.com/'
            . '?api_key=' . urlencode($apiKey)
            . '&url=' . urlencode($url)
            . '&premium=true&render=true&country_code=de';

        $client = new Client([
            'verify'          => false,
            'timeout'         => 120,
            'allow_redirects' => true,
        ]);

        $response = $client->get($fetchUrl, [
            'headers' => [
                'User-Agent'      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
                'Accept-Language' => 'de-DE,de;q=0.9,en-US;q=0.8',
            ],
        ]);

        $body = (string) $response->getBody();

        if (strlen($body) < 1000 && (
            str_contains($body, 'Request failed') ||
            str_contains($body, 'Protected domains') ||
            str_contains($body, 'upgrade') ||
            str_contains($body, 'premium=true')
        )) {
            throw new \RuntimeException('ScraperAPI premium required: ' . substr($body, 0, 200));
        }

        return $body;
    }

    private function parseMobileDe(string $html): array
    {
        $data = [];

        // 1. __NEXT_DATA__ (Next.js SSR payload — mobile.de uses Next.js)
        if (preg_match('/<script[^>]*id="__NEXT_DATA__"[^>]*>(.*?)<\/script>/s', $html, $m)) {
            $json = json_decode($m[1], true);
            if ($json) {
                $pp = $json['props']['pageProps'] ?? [];
                // mobile.de nests listing under various keys
                $ad = $pp['ad'] ?? $pp['listing'] ?? $pp['vehicle'] ?? $pp['detail'] ?? $pp['data'] ?? null;

                if (!$ad) {
                    foreach ($pp as $val) {
                        if (is_array($val) && (isset($val['id']) || isset($val['make']))) {
                            $ad = $val;
                            break;
                        }
                    }
                }

                if ($ad) {
                    $vehicle = $ad['vehicle'] ?? $ad['attributes'] ?? $ad;
                    $seller  = $ad['seller'] ?? $ad['dealer'] ?? [];
                    $images  = $ad['images'] ?? $ad['photos'] ?? [];

                    $data['brand']     = $vehicle['make']  ?? $vehicle['brand'] ?? $ad['make'] ?? '';
                    $data['model']     = $vehicle['model'] ?? $ad['model'] ?? '';
                    $data['make_year'] = $this->formatRegistration(
                        $vehicle['firstRegistration'] ?? $vehicle['registrationDate'] ??
                        $ad['firstRegistration'] ?? (string)($vehicle['yearOfConstruction'] ?? '')
                    );
                    $mileage           = $vehicle['mileage'] ?? $vehicle['mileageKm'] ?? $ad['mileage'] ?? '';
                    $data['mileage']   = is_array($mileage) ? ($mileage['value'] ?? '') : (string)$mileage;
                    $data['price']     = (string)($ad['price'] ?? $ad['grossPrice'] ?? $vehicle['price'] ?? '');

                    $data['seller_name']  = $seller['name'] ?? $seller['companyName'] ?? '';
                    $data['seller_phone'] = $seller['phone'] ?? $seller['phoneNumber'] ?? '';
                    $addr = $seller['address'] ?? [];
                    $data['seller_address'] = trim(
                        ($addr['street'] ?? '') . ' ' .
                        ($addr['zip'] ?? $addr['postalCode'] ?? '') . ' ' .
                        ($addr['city'] ?? '')
                    );

                    if (!empty($images)) {
                        $first = $images[0] ?? '';
                        $data['image'] = is_array($first) ? ($first['url'] ?? $first['src'] ?? '') : $first;
                    }
                }
            }
        }

        // 2. JSON-LD structured data
        if (empty($data['brand'])) {
            $data = array_merge($data, $this->extractJsonLd($html));
        }

        // 3. Scan all <script> blocks for embedded JSON state objects
        if (empty($data['brand'])) {
            preg_match_all('/<script[^>]*>(.*?)<\/script>/s', $html, $scripts);
            foreach ($scripts[1] as $scriptBody) {
                // Look for JSON objects assigned to window vars
                if (preg_match('/(?:window\.__[A-Z_]+__|self\.__[A-Z_]+__)\s*=\s*(\{.{200,})/s', $scriptBody, $sm)) {
                    // Trim to a balanced JSON object
                    $raw = $sm[1];
                    $depth = 0; $end = 0;
                    for ($i = 0; $i < strlen($raw); $i++) {
                        if ($raw[$i] === '{') $depth++;
                        elseif ($raw[$i] === '}') { $depth--; if ($depth === 0) { $end = $i; break; } }
                    }
                    if ($end) {
                        $json = json_decode(substr($raw, 0, $end + 1), true);
                        if ($json) {
                            // Recursively search for make/brand keys
                            $flat = $this->flattenJsonSearch($json, ['make', 'brand', 'model', 'mileage', 'price']);
                            if (!empty($flat['make'] ?? $flat['brand'] ?? '')) {
                                $data['brand']   = $data['brand']   ?: ($flat['make']  ?? $flat['brand'] ?? '');
                                $data['model']   = $data['model']   ?: ($flat['model'] ?? '');
                                $data['mileage'] = $data['mileage'] ?: (string)($flat['mileage'] ?? '');
                                $data['price']   = $data['price']   ?: (string)($flat['price']   ?? '');
                                break;
                            }
                        }
                    }
                }
            }
        }

        // 4. Fallback: og/meta tags
        if (empty($data['brand'])) {
            $data = array_merge($data, $this->extractMeta($html));
        }

        // 5. Extract price from visible HTML if still missing
        if (empty($data['price'])) {
            if (preg_match('/class="[^"]*price[^"]*"[^>]*>\s*(?:ab\s*)?([\d\s.]+)\s*€/i', $html, $m)) {
                $data['price'] = preg_replace('/\D/', '', $m[1]);
            }
        }

        return $data;
    }

    private function flattenJsonSearch(array $json, array $keys): array
    {
        $result = [];
        array_walk_recursive($json, function($val, $key) use ($keys, &$result) {
            if (in_array(strtolower((string)$key), $keys, true) && empty($result[$key])) {
                $result[$key] = $val;
            }
        });
        return $result;
    }

    // ─── HTTP fetch ───────────────────────────────────────────────────────────

    private function fetchHtml(string $url): string
    {
        $client   = new Client([
            'verify'          => false,
            'timeout'         => 60,
            'allow_redirects' => true,
        ]);
        $response = $client->get($url, [
            'headers' => [
                'User-Agent'      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
                'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'Accept-Language' => 'de-DE,de;q=0.9,en-US;q=0.8,en;q=0.7',
                'Accept-Encoding' => 'gzip, deflate',
                'Cache-Control'   => 'no-cache',
                'Connection'      => 'keep-alive',
            ],
        ]);
        return (string) $response->getBody();
    }

    // ─── AutoScout24 ──────────────────────────────────────────────────────────

    private function parseAutoScout24(string $html): array
    {
        $data = [];

        // Primary: __NEXT_DATA__ JSON (Next.js SSR payload)
        if (preg_match('/<script[^>]*id="__NEXT_DATA__"[^>]*>(.*?)<\/script>/s', $html, $m)) {
            $json = json_decode($m[1], true);
            $pp   = $json['props']['pageProps'] ?? [];

            $listing = $pp['listing'] ?? $pp['ad'] ?? $pp['vehicle'] ?? null;

            if ($listing) {
                $vehicle = $listing['vehicle'] ?? $listing;
                $seller  = $listing['seller']  ?? $listing['dealer'] ?? [];
                $images  = $listing['images']  ?? $listing['photos'] ?? [];

                $data['brand']     = $vehicle['make']  ?? $vehicle['brand'] ?? '';
                $data['model']     = $vehicle['model'] ?? '';
                $data['make_year'] = $this->formatRegistration(
                    $vehicle['firstRegistration'] ?? $vehicle['firstRegistrationDate'] ?? $vehicle['registrationDate'] ?? ''
                );
                $mileage           = $vehicle['mileage'] ?? $vehicle['mileageFromOdometer'] ?? '';
                $data['mileage']   = is_array($mileage) ? ($mileage['value'] ?? '') : $mileage;
                $data['price']     = $listing['prices']['public']['priceRaw'] ?? $listing['price'] ?? '';

                $data['seller_name']  = $seller['name']  ?? $seller['companyName'] ?? '';
                $addr = $seller['address'] ?? [];
                $data['seller_address'] = trim(
                    ($addr['street'] ?? '') . ' ' . ($addr['zip'] ?? '') . ' ' . ($addr['city'] ?? '')
                );
                $data['seller_phone'] = $seller['phone'] ?? $seller['phoneNumber'] ?? '';

                if (!empty($images)) {
                    $first = is_array($images[0]) ? ($images[0]['url'] ?? $images[0]['src'] ?? '') : $images[0];
                    $data['image'] = $first;
                }
            }
        }

        // Fallback: JSON-LD
        if (empty($data['brand'])) {
            $data = array_merge($data, $this->extractJsonLd($html));
        }

        // Fallback: meta/og tags
        if (empty($data['brand'])) {
            $data = array_merge($data, $this->extractMeta($html));
        }

        return $data;
    }

    // ─── Generic fallback ─────────────────────────────────────────────────────

    private function parseGeneric(string $html): array
    {
        return array_merge($this->extractMeta($html), $this->extractJsonLd($html));
    }

    // ─── Shared helpers ───────────────────────────────────────────────────────

    private function extractJsonLd(string $html): array
    {
        $data = [];
        preg_match_all('/<script[^>]*type="application\/ld\+json"[^>]*>(.*?)<\/script>/s', $html, $matches);

        foreach ($matches[1] as $jsonStr) {
            $json = json_decode(trim($jsonStr), true);
            if (!$json) continue;

            $items = isset($json['@graph']) ? $json['@graph'] : [$json];
            foreach ($items as $item) {
                $type = $item['@type'] ?? '';
                if (!in_array($type, ['Car', 'Vehicle', 'Product', 'Offer', 'ItemPage'])) continue;

                $offerData   = $item['offers'] ?? null;
                $offer       = $offerData ? (is_array($offerData) ? ($offerData[0] ?? $offerData) : $offerData) : [];
                $itemOffered = $offer['itemOffered'] ?? null;
                $vehicle     = $itemOffered ?? ($item['itemOffered'] ?? $item);

                $data['brand']     = $data['brand']     ?? ($vehicle['brand']['name'] ?? $vehicle['manufacturer'] ?? $vehicle['make'] ?? $item['brand']['name'] ?? '');
                $data['model']     = $data['model']     ?? ($vehicle['model'] ?? '');
                $data['make_year'] = $data['make_year'] ?? $this->formatRegistration(
                    $vehicle['productionDate'] ?? $vehicle['vehicleModelDate'] ?? $vehicle['modelDate'] ?? ''
                );

                if (!empty($vehicle['mileageFromOdometer'])) {
                    $m = $vehicle['mileageFromOdometer'];
                    $data['mileage'] = $data['mileage'] ?? (is_array($m) ? ($m['value'] ?? '') : $m);
                }

                $img = $vehicle['image'] ?? $item['image'] ?? null;
                if ($img) {
                    $data['image'] = $data['image'] ?? (is_array($img) ? ($img[0] ?? '') : $img);
                }

                if (!empty($offer['price'])) {
                    $data['price'] = $data['price'] ?? $offer['price'];
                }

                $sellerNode = $offer['offeredBy'] ?? $offer['seller'] ?? $item['seller'] ?? [];
                if (!empty($sellerNode['name'])) {
                    $data['seller_name']  = $data['seller_name']  ?? $sellerNode['name'];
                    $data['seller_phone'] = $data['seller_phone'] ?? ($sellerNode['telephone'] ?? '');
                    $addr = $sellerNode['address'] ?? [];
                    if ($addr) {
                        $data['seller_address'] = $data['seller_address'] ?? trim(
                            ($addr['streetAddress'] ?? '') . ' ' . ($addr['postalCode'] ?? '') . ' ' . ($addr['addressLocality'] ?? '')
                        );
                    }
                }
            }
        }

        return $data;
    }

    private function extractMeta(string $html): array
    {
        $data = [];

        if (preg_match('/<meta[^>]*property="og:image"[^>]*content="([^"]+)"/i', $html, $m)) {
            $data['image'] = $m[1];
        }
        if (empty($data['image']) && preg_match('/<meta[^>]*name="twitter:image"[^>]*content="([^"]+)"/i', $html, $m)) {
            $data['image'] = $m[1];
        }

        $title = '';
        if (preg_match('/<meta[^>]*property="og:title"[^>]*content="([^"]+)"/i', $html, $m)) {
            $title = $m[1];
        } elseif (preg_match('/<title[^>]*>([^<]+)<\/title>/i', $html, $m)) {
            $title = strip_tags($m[1]);
        }
        if ($title) {
            $data['model'] = trim(preg_replace('/\s*[\|–\-].*$/', '', $title));
        }

        return $data;
    }

    private function formatRegistration(string $raw): string
    {
        if (empty($raw)) return '';
        if (preg_match('/^(\d{4})-(\d{2})/', $raw, $m)) return $m[2] . '.' . $m[1];
        if (preg_match('/^(\d{4})$/', $raw))             return '01.' . $raw;
        if (preg_match('/^(\d{2})[.\/](\d{4})$/', $raw)) return $raw;
        return $raw;
    }
}

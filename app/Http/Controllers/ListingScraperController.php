<?php

namespace App\Http\Controllers;

use App\Services\ListingScraperService;
use Illuminate\Http\Request;

class ListingScraperController extends Controller
{
    public function fetch(Request $request)
    {
        $request->validate(['url' => 'required|url|max:2000']);

        $url = $request->input('url');

        // Only allow known listing platforms
        $allowed = ['autoscout24.de', 'autoscout24.com', 'mobile.de'];
        $host = parse_url($url, PHP_URL_HOST) ?? '';
        $host = ltrim($host, 'www.');

        $isAllowed = false;
        foreach ($allowed as $domain) {
            if (str_ends_with($host, $domain)) { $isAllowed = true; break; }
        }

        if (!$isAllowed) {
            return response()->json([
                'status'  => 'unsupported',
                'message' => 'Only mobile.de and AutoScout24 listings are supported.',
            ]);
        }

        $data = app(ListingScraperService::class)->scrape($url);

        $data['success'] = in_array($data['status'] ?? '', ['success', 'partial']);

        return response()->json($data);
    }
}

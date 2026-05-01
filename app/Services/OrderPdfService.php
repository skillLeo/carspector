<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderExamination;
use App\Models\OrderDamage;
use App\Models\OrderDamageSummary;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrderPdfService
{
    public function generateAndStore(Order $order): array
    {
        $examination = OrderExamination::where('order_id', $order->id)->first();
        $includes = [];
        $images = collect();

        if ($examination) {
            $cacheDirRel = 'pdf-cache/' . $order->id;
            $cacheDirAbs = storage_path('app/public/' . $cacheDirRel);
            @mkdir($cacheDirAbs, 0775, true);

            foreach (($examination->images ?? []) as $img) {
                try {
                    $raw = ltrim((string)($img->image ?? ''), '/');
                    $rel = $raw !== '' ? $raw : ltrim(parse_url($img->image1 ?? '', PHP_URL_PATH) ?: '', '/');
                    if ($rel === '') { continue; }
                    if (strpos($rel, 'storage/') === 0) { $rel = substr($rel, 8); }
                    $ext = strtolower(pathinfo($rel, PATHINFO_EXTENSION));
                    $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);

                    if ($isImage) {
                        $srcAbs = storage_path('app/public/' . $rel);
                        $baseName = pathinfo($rel, PATHINFO_FILENAME);
                        $dstRel = $cacheDirRel . '/' . $baseName . '-720p.jpg';
                        $dstAbs = storage_path('app/public/' . $dstRel);
                        if (!file_exists($dstAbs)) {
                            $this->compressForPdf($srcAbs, $dstAbs, 1280, 720, 70);
                        }
                        $obj = (object) [
                            'image' => $dstRel,
                            'document_type' => null,
                        ];
                        $images->push($obj);
                    } else {
                        $images->push($img);
                    }
                } catch (\Throwable $e) {
                    $images->push($img);
                }
            }
        }

        $damages = OrderDamage::where('order_id', $order->id)->orderBy('id')->get();
        $damageSummary = OrderDamageSummary::where('order_id', $order->id)->first();
        $chartDataUri = $this->chartDataUri($order, $damages, $damageSummary);

        $pdf = PDF::loadView('frontpages.vehicle.pdf', compact('examination', 'includes', 'order', 'images', 'damages', 'damageSummary', 'chartDataUri'));
        $pdf->set_option('dpi', 110);

        // Save to storage path (public) using a stable filename based on pdf_number
        $fileName = ($order->pdf_number ?: ('order-'.$order->id)) . '.pdf';
        $relPath = 'reports/' . $fileName; // relative to storage/app/public
        $absPath = storage_path('app/public/' . $relPath);
        @mkdir(dirname($absPath), 0775, true);
        try {
            file_put_contents($absPath, $pdf->output());
        } catch (\Throwable $e) {
            Log::warning('Failed saving order PDF', ['order_id' => $order->id, 'error' => $e->getMessage()]);
        }

        return [
            'relative' => $relPath,
            'absolute' => $absPath,
            'url' => asset('storage/' . $relPath),
        ];
    }

    public function generateAndStoreEn(Order $order): array
    {
        $examination = OrderExamination::where('order_id', $order->id)->first();
        $includes = [];
        $images = collect();

        if ($examination) {
            $cacheDirRel = 'pdf-cache/' . $order->id;
            $cacheDirAbs = storage_path('app/public/' . $cacheDirRel);
            @mkdir($cacheDirAbs, 0775, true);

            foreach (($examination->images ?? []) as $img) {
                try {
                    $raw = ltrim((string)($img->image ?? ''), '/');
                    $rel = $raw !== '' ? $raw : ltrim(parse_url($img->image1 ?? '', PHP_URL_PATH) ?: '', '/');
                    if ($rel === '') { continue; }
                    if (strpos($rel, 'storage/') === 0) { $rel = substr($rel, 8); }
                    $ext = strtolower(pathinfo($rel, PATHINFO_EXTENSION));
                    $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);

                    if ($isImage) {
                        $srcAbs = storage_path('app/public/' . $rel);
                        $baseName = pathinfo($rel, PATHINFO_FILENAME);
                        $dstRel = $cacheDirRel . '/' . $baseName . '-720p.jpg';
                        $dstAbs = storage_path('app/public/' . $dstRel);
                        if (!file_exists($dstAbs)) {
                            $this->compressForPdf($srcAbs, $dstAbs, 1280, 720, 70);
                        }
                        $obj = (object) [
                            'image' => $dstRel,
                            'document_type' => null,
                        ];
                        $images->push($obj);
                    } else {
                        $images->push($img);
                    }
                } catch (\Throwable $e) {
                    $images->push($img);
                }
            }
        }

        $damages = OrderDamage::where('order_id', $order->id)->orderBy('id')->get();
        $damageSummary = OrderDamageSummary::where('order_id', $order->id)->first();
        $chartDataUri = $this->chartDataUri($order, $damages, $damageSummary);

        $pdf = PDF::loadView('frontpages.vehicle.pdf_en', compact('examination', 'includes', 'order', 'images', 'damages', 'damageSummary', 'chartDataUri'));
        $pdf->set_option('dpi', 110);

        $fileName = ($order->pdf_number ?: ('order-'.$order->id)) . '-en.pdf';
        $relPath = 'reports/' . $fileName;
        $absPath = storage_path('app/public/' . $relPath);
        @mkdir(dirname($absPath), 0775, true);
        try {
            file_put_contents($absPath, $pdf->output());
        } catch (\Throwable $e) {
            Log::warning('Failed saving order PDF EN', ['order_id' => $order->id, 'error' => $e->getMessage()]);
        }

        return [
            'relative' => $relPath,
            'absolute' => $absPath,
            'url' => asset('storage/' . $relPath),
        ];
    }

    private function compressForPdf(string $srcAbs, string $dstAbs, int $maxWidth = 1280, int $maxHeight = 720, int $quality = 70): void
    {
        try {
            if (!file_exists($srcAbs)) return;
            $info = @getimagesize($srcAbs);
            if (!$info) return;
            $mime = $info['mime'] ?? '';
            switch ($mime) {
                case 'image/jpeg': $im = @imagecreatefromjpeg($srcAbs); break;
                case 'image/png':  $im = @imagecreatefrompng($srcAbs); break;
                case 'image/gif':  $im = @imagecreatefromgif($srcAbs); break;
                case 'image/webp': $im = function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($srcAbs) : null; break;
                default: $im = null; break;
            }
            if (!$im) return;
            $w = imagesx($im); $h = imagesy($im);
            $scale = min(
                1.0,
                $maxWidth > 0 ? ($maxWidth / $w) : 1.0,
                $maxHeight > 0 ? ($maxHeight / $h) : 1.0
            );
            $nw = (int)round($w * $scale); $nh = (int)round($h * $scale);
            $out = imagecreatetruecolor($nw, $nh);
            $white = imagecolorallocate($out, 255, 255, 255);
            imagefilledrectangle($out, 0, 0, $nw, $nh, $white);
            imagecopyresampled($out, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);
            @mkdir(dirname($dstAbs), 0775, true);
            @imagejpeg($out, $dstAbs, max(10, min(95, $quality)));
            imagedestroy($im); imagedestroy($out);
        } catch (\Throwable $e) {
            // ignore errors
        }
    }

    public function chartDataUri(Order $order, $damages, ?OrderDamageSummary $summary): ?string
    {
        try {
            $cacheDirRel = 'pdf-cache/' . $order->id;
            $cacheDirAbs = storage_path('app/public/' . $cacheDirRel);
            @mkdir($cacheDirAbs, 0775, true);
            $dstRel = $cacheDirRel . '/valuation-chart.png';
            $dstAbs = storage_path('app/public/' . $dstRel);

            $dep = 0.0; $add = 0.0; $upc = 0.0;
            foreach ($damages as $d) {
                $cat = strtolower((string)($d->category ?? ''));
                if (!in_array($cat, ['dep','add','upc'], true)) {
                    $t = strtolower((string)($d->cost_type ?? ''));
                    if (Str::contains($t, ['depreciation','deduction','inferior value','wertminderung','value reduction','value loss'])) $cat = 'dep';
                    elseif (Str::contains($t, ['added','enhancement','wertsteigerung','increase'])) $cat = 'add';
                    else $cat = 'upc';
                }
                if ($cat === 'dep') $dep += (float)$d->amount;
                elseif ($cat === 'add') $add += (float)$d->amount;
                else $upc += (float)$d->amount;
            }
            $market = (float) ($summary->market_average ?? 0);
            $dat    = (float) ($summary->dat_value ?? 0);

            $sellRaw  = $summary->selling_price ?? null;
            $hasSell  = is_numeric($sellRaw) && (float)$sellRaw > 0;
            $sell     = $hasSell ? (float)$sellRaw : 0.0;

            $adj = (float) ($summary->market_average_cost ?? 0);

            $v0 = $market;
            $v1 = $dat;

            $base = $hasSell ? $sell : $dat;

            $afterDep = $base - $dep;
            $afterAdd = $afterDep + $add;
            $afterUpc = $afterAdd - $upc;

            $finalMarket = $afterUpc + $adj;

            if ($hasSell) {
                $values = [$v0, $v1, $sell, $afterDep, $afterAdd, $afterUpc, $finalMarket];

                $labels = $order->document_in_english
                    ? ['Market avg.','DAT-Price','Selling','Depreciation','Added Value','Costs','Market value']
                    : ['Markt ⌀','DAT-Preis','Verkaufspreis','Minderwerte','Mehrwerte','Kosten','Marktwert'];

                $deltaFromSegment = 2;
            } else {
                $values = [$v0, $v1, $afterDep, $afterAdd, $afterUpc, $finalMarket];

                $labels = $order->document_in_english
                    ? ['Market avg.','DAT-Price','Depreciation','Added Value','Costs','Market value']
                    : ['Markt ⌀','DAT-Preis','Minderwerte','Mehrwerte','Kosten','Marktwert'];

                $deltaFromSegment = 1;
            }
            $this->renderChartPng($values, $dstAbs, 1840, 520, $labels, $deltaFromSegment); // 2x



            if (!file_exists($dstAbs)) return null;
            $b64 = base64_encode(@file_get_contents($dstAbs));
            return $b64 ? ('data:image/png;base64,'.$b64) : null;
        } catch (\Throwable $e) {
            return null;
        }
    }

        private function renderChartPng(
    array $values,
    string $dstAbs,
    int $W = 920,
    int $H = 260,
    array $labels = [],
    int $deltaFromSegment = 0
): void {
    try {
        $im = imagecreatetruecolor($W, $H);

        // Farben
        $white = imagecolorallocate($im, 255, 255, 255);
        $grid  = imagecolorallocate($im, 230, 235, 240);
        $axis  = imagecolorallocate($im, 170, 180, 190);
        $line  = imagecolorallocate($im, 245, 158, 11);   // orange
        $dot   = imagecolorallocate($im, 245, 158, 11);
        $text  = imagecolorallocate($im, 0, 0, 0);
        $deltaBlue = imagecolorallocate($im, 37, 99, 235); // blau

        imagefilledrectangle($im, 0, 0, $W, $H, $white);

        // ---------- Auto-Scaling (wichtig!) ----------
        // Basis war vorher 920px Breite. Alles wird proportional skaliert.
        $S = max(1.0, $W / 920.0);

        $PADX = (int)round(50 * $S);
        $PADY = (int)round(24 * $S);

        $dotSize     = (int)round(10 * $S);
        $lineThick   = max(1, (int)round(4 * $S));

        $valSize     = (int)round(11 * $S);
        $deltaSize   = (int)round(10 * $S);
        $labSize     = (int)round(10 * $S);

        // Abstände fürs Layout
        $valOffsetY  = (int)round(14 * $S);  // Wert-Label über Punkt
        $deltaOffset = (int)round(16 * $S);  // Delta-Label Abstand zur Linie
        $bottomY     = (int)round(10 * $S);  // X-Label Höhe vom unteren Rand
        // --------------------------------------------

        $n = count($values);
        if ($n <= 0) {
            @imagepng($im, $dstAbs);
            imagedestroy($im);
            return;
        }

        $minV = min($values);
        $maxV = max($values);
        if ($maxV <= $minV) $maxV = $minV + 1.0;

        $dx = ($W - 2 * $PADX) / max(1, $n - 1);

        if (function_exists('imageantialias')) { @imageantialias($im, true); }
        if (function_exists('imagesetthickness')) { @imagesetthickness($im, $lineThick); }

        // Grid
        $levels = 6;
        for ($i = 0; $i <= $levels; $i++) {
            $y = (int)($PADY + ($H - 2 * $PADY) * $i / $levels);
            imageline($im, $PADX, $y, $W - $PADX, $y, $grid);
        }
        for ($i = 0; $i < $n; $i++) {
            $xg = (int)($PADX + $i * $dx);
            imageline($im, $xg, $PADY, $xg, $H - $PADY, $grid);
        }

        // Achsen
        imageline($im, $PADX, $PADY, $PADX, $H - $PADY, $axis);
        imageline($im, $PADX, $H - $PADY, $W - $PADX, $H - $PADY, $axis);

        // Scaling fn
        $scaleY = function ($v) use ($H, $PADY, $minV, $maxV) {
            $rng = max(1e-6, $maxV - $minV);
            $rel = ($v - $minV) / $rng;
            return (int)($H - $PADY - $rel * ($H - 2 * $PADY));
        };

        // Font setup
        $fontPath = base_path('vendor/dompdf/dompdf/lib/fonts/DejaVuSans.ttf');
        $hasTtf = file_exists($fontPath) && function_exists('imagettftext') && function_exists('imagettfbbox');

        // Helper: TTF zentriert, sonst fallback
        $drawCentered = function(int $x, int $y, int $color, int $size, string $str) use ($im, $hasTtf, $fontPath) {
            if ($hasTtf) {
                $bb = @imagettfbbox($size, 0, $fontPath, $str);
                if (is_array($bb)) {
                    $w = abs($bb[2] - $bb[0]);
                    $h = abs($bb[7] - $bb[1]);
                    $tx = (int)($x - $w / 2);
                    $ty = (int)($y + $h / 2);
                    @imagettftext($im, $size, 0, $tx, $ty, $color, $fontPath, $str);
                    return;
                }
            }
            // fallback GD builtin
            $tx = (int)($x - (strlen($str) * 3));
            $ty = (int)($y - 6);
            imagestring($im, 3, $tx, $ty, $str, $color);
        };

        // Punkte berechnen
        $pts = [];
        for ($i = 0; $i < $n; $i++) {
            $x = (int)($PADX + $i * $dx);
            $y = $scaleY((float)$values[$i]);
            $pts[$i] = [$x, $y];
        }

        // Linie + Punkte
        for ($i = 0; $i < $n; $i++) {
            if ($i > 0) {
                imageline($im, $pts[$i - 1][0], $pts[$i - 1][1], $pts[$i][0], $pts[$i][1], $line);
            }
            imagefilledellipse($im, $pts[$i][0], $pts[$i][1], $dotSize, $dotSize, $dot);
            imageellipse($im, $pts[$i][0], $pts[$i][1], $dotSize, $dotSize, $white);
        }

        // Wert-Labels (näher dran)
        for ($i = 0; $i < $n; $i++) {
            $valStr = number_format((float)$values[$i], 0, ',', '.') . ' €';
            $drawCentered($pts[$i][0], max((int)round(14*$S), $pts[$i][1] - $valOffsetY), $text, $valSize, $valStr);
        }

        // Delta-Labels (blau) nur ab deltaFromSegment
        for ($i = 1; $i < $n; $i++) {
            $segmentIndex = $i - 1;
            if ($segmentIndex < $deltaFromSegment) continue;

            $delta = (float)$values[$i] - (float)$values[$i - 1];
            $sign = $delta >= 0 ? '+' : '-';
            $deltaStr = $sign . ' ' . number_format(abs($delta), 0, ',', '.') . ' €';

            $x1 = $pts[$i - 1][0]; $y1 = $pts[$i - 1][1];
            $x2 = $pts[$i][0];     $y2 = $pts[$i][1];

            $mx = (int)(($x1 + $x2) / 2);
            $my = (int)(($y1 + $y2) / 2);

            // immer "über" der Linie, aber nicht aus dem Bild
            $ty = $my - $deltaOffset;
            if ($ty < (int)round(18*$S)) $ty = $my + $deltaOffset;

            $drawCentered($mx, $ty, $deltaBlue, $deltaSize, $deltaStr);
        }

        // X-Achsen Labels unten
        for ($i = 0; $i < $n; $i++) {
            $lab = $labels[$i] ?? ('S' . ($i + 1));
            $drawCentered($pts[$i][0], $H - $bottomY, $text, $labSize, $lab);
        }

        @imagepng($im, $dstAbs);
        imagedestroy($im);
    } catch (\Throwable $e) {
        // ignore
    }
}

}

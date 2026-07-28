<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Smalot\PdfParser\Parser;

class ExaminationPdfController extends Controller
{
    public function extract(Request $request)
{
    $request->validate([
        'pdf'           => 'required|file|mimes:pdf|max:10240',
        'document_type' => 'required|string',
    ]);

    // PDF nur bei FIN-Abfrage auslesen
    if ($request->document_type !== 'FIN-Abfrage') {
        return response()->json([
            'success' => false,
            'message' => 'PDF-Auslesung nur für FIN-Abfrage erlaubt.'
        ], 403);
    }

    try {
        $parser = new Parser();
        $pdf    = $parser->parseFile($request->file('pdf')->getRealPath());
        $text   = $pdf->getText();

        if (empty(trim($text))) {
            return response()->json([
                'success' => false,
                'message' => 'Das PDF enthält keinen lesbaren Text.'
            ]);
        }

        [$standard, $special] = $this->categorise($text);

        return response()->json([
            'success'           => true,
            'serienausstattung' => $standard,
            'sonderausstattung' => $special,
            'raw'               => $text,
        ]);

    } catch (\Throwable $e) {
        Log::warning('PDF equipment extraction failed', [
            'error' => $e->getMessage()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Das PDF konnte nicht gelesen werden.'
        ], 422);
    }
}

    // Split extracted text into Serienausstattung and Sonderausstattung
    private function categorise(string $text): array
{
    // Zeilenumbrüche normalisieren
    $text = preg_replace('/\r\n|\r/', "\n", $text);

    $standard = '';
    $special  = '';

    /*
    |--------------------------------------------------------------------------
    | Serienausstattung
    |--------------------------------------------------------------------------
    */

    if (preg_match(
        '/Serienausstattung:\s*(.*?)\s*Sonderausstattung:/si',
        $text,
        $matches
    )) {
        $standard = trim($matches[1]);
    }

    /*
    |--------------------------------------------------------------------------
    | Sonderausstattung
    |--------------------------------------------------------------------------
    |
    | WICHTIG:
    | Stoppt jetzt BEVOR:
    | - Fahrzeug Neupreis
    | - Bericht-Nr.
    | - autoscout
    | - mobile.de
    |
    */

    if (preg_match(
        '/Sonderausstattung:\s*(.*?)(Fahrzeug Neupreis|Bericht-Nr\.|autoscout|mobile\.de)/si',
        $text,
        $matches
    )) {
        $special = trim($matches[1]);
    }

    /*
    |--------------------------------------------------------------------------
    | Bereinigung
    |--------------------------------------------------------------------------
    */

    $clean = function ($value) {

    // URLs entfernen
    $value = preg_replace('/https?:\/\/\S+/i', '', $value);

    // Unerwünschte Bereiche entfernen
    $value = preg_replace('/autoscout.*$/mi', '', $value);
    $value = preg_replace('/mobile\.de.*$/mi', '', $value);
    $value = preg_replace('/Bericht-Nr\..*$/mi', '', $value);
    $value = preg_replace('/CARTV check Copyright.*$/mi', '', $value);

    // Zeilen aufteilen
    $lines = preg_split('/\n+/', $value);

    $items = [];
    $current = '';

    foreach ($lines as $line) {

        $line = trim($line);

        if (empty($line)) {
            continue;
        }

        /*
        |--------------------------------------------------------------------------
        | Neue Ausstattung erkennen
        |--------------------------------------------------------------------------
        |
        | Wenn Zeile groß beginnt oder typische Ausstattung enthält,
        | starten wir neuen Eintrag
        |
        */

        $isNewItem =
            preg_match('/^[A-ZÄÖÜ]/u', $line) &&
            strlen($line) > 15;

        if ($isNewItem) {

            if (!empty($current)) {
                $items[] = trim($current);
            }

            $current = $line;

        } else {

            // Gehört zur vorherigen Zeile
            $current .= ' ' . $line;
        }
    }

    // letzten Eintrag hinzufügen
    if (!empty($current)) {
        $items[] = trim($current);
    }

    // Alles sauber verbinden
    $value = implode(', ', $items);

    // Mehrfache Leerzeichen
    $value = preg_replace('/\s+/', ' ', $value);

    // Mehrfache Kommas
    $value = preg_replace('/,+/', ',', $value);

    return trim($value, " ,\n\r\t");
};

    $standard = $clean($standard);
    $special  = $clean($special);

    return [
        $standard,
        $special,
    ];
}
}

{{-- resources/views/pdf.blade.php --}}
@php
  use Carbon\Carbon;
  use Illuminate\Support\Str;

  $examination = $examination ?? (object) [];
  $vehicle     = $vehicle     ?? ($examination->vehicle  ?? null);
  $customer    = $customer    ?? ($examination->customer ?? null);
  $inspector   = $inspector   ?? ($examination->inspector ?? null);

  $veh  = is_array($vehicle) ? (object)$vehicle : ($vehicle ?? (object)[]);
  $cust = is_array($customer) ? (object)$customer : ($customer ?? (object)[]);
  $insp = is_array($inspector) ? (object)$inspector : ($inspector ?? (object)[]);

  $weatherMap = [
    'sonnig'           => 'Sonnig',
    'leicht_bewoelkt'  => 'Leicht bewölkt',
    'bewoelkt'         => 'Bewölkt',
    'regen'            => 'Regen',
    'starkregen'       => 'Starkregen',
    'schnee'           => 'Schnee/Glätte',
    'nebel'            => 'Nebel',
    'wind_sturm'       => 'Wind/Sturm',
    'kunstlicht'  => 'Neutral (Innenraum / Halle)',
  ];
  $lightingMap = [
    'hell'        => 'Hell (Tageslicht)',
    'daemmerung'  => 'Dämmerung',
    'dunkel'      => 'Dunkel (Nacht)',
    'kunstlicht'  => 'Kunstlicht (Innenraum / Halle)',
  ];
  $boolMap = [
    'yes'        => 'Ja',
    'no'         => 'Nein',
    'partial'    => 'Teilweise',
    'restricted' => 'Eingeschränkt (z. B. Garage, enge Zufahrt)',
  ];

  $weather_label  = $weatherMap[$examination->weather_conditions ?? ''] ?? '—';
  $lighting_label = $lightingMap[$examination->lighting_conditions ?? ''] ?? '—';
  $clean_label    = $boolMap[$examination->vehicle_clean ?? ''] ?? '—';
  $access_label   = $boolMap[$examination->vehicle_freely_accessible ?? ''] ?? '—';

$report_no = $examination->report_no
    ?? ('CS-' . ($examination->id ?? 0) . '0555');
  $report_dt = null;
  if (!empty($examination->created_at)) {
      try {
          $report_dt = Carbon::parse($examination->created_at)->format('d.m.Y');
      } catch (\Throwable $e) {
          $report_dt = (string)$examination->created_at;
      }
  }
  $location  = $examination->location ?? '—';

@endphp

@php
  $formatKm = function ($value) {
      if ($value === null || $value === '') return '—';
      // Ziffern herausziehen (falls schon mit "km" oder Punkten geliefert)
      if (is_string($value)) {
          $digits = preg_replace('/[^\d]/', '', $value);
          if ($digits === '') return '—';
          $value = (int) $digits;
      }
      if (!is_numeric($value)) return '—';
      return number_format((int)$value, 0, ',', '.') . ' km';
  };
@endphp

@php
  /* Normalisiert beliebige Eingaben auf eine saubere Stringliste */
  $asList = function($val){
    if ($val === null || $val === '') return [];
    if (is_array($val)) {
      return array_values(array_filter(array_map(fn($x)=>trim((string)$x), $val), fn($x)=>$x!==''));
    }
    $s = trim((string)$val);
    return $s === '' ? [] : [$s];
  };

  /* Verbindet Werte kommasepariert */
  $joinComma = function(array $items){
    $clean = array_values(array_filter(array_map(fn($x)=>trim((string)$x), $items), fn($x)=>$x!==''));
    return implode(', ', $clean);
  };

  /* Badge HTML */
$WARN = '<span class="warn-badge" aria-label="Auffälligkeit" title="Auffälligkeit">!</span> ';


  /**
   * Gibt ' class="row-alert"' zurück wenn true – sonst leer.
   * Nutzung im <tr> Tag mit {!! $rowAlert($cond) !!}
   */
  $rowAlert = function(bool $cond){
    return $cond ? ' class="row-alert"' : '';
  };

  /**
   * Rendert die Zellen-Ausgabe für Auffälligkeiten:
   * - Wenn $hasIssue=false → gibt $noneText zurück (z.B. "Keine" oder "—")
   * - Wenn $hasIssue=true  → Icon + kommaseparierter Text aus $items,
   *   oder Icon + $fallback, wenn $items leer ist.
   */
  $renderFinding = function(bool $hasIssue, array $items = [], string $fallback = 'Beschädigt (Details nicht angegeben)', string $noneText = 'Keine') use ($joinComma, $WARN){
    if (!$hasIssue) return $noneText;
    $txt = $joinComma($items);
    return $txt !== '' ? ($WARN.$txt) : ($WARN.$fallback);
  };

  /**
   * Hilfsmapper für Status (häufige Fälle)
   */
  $norm = function($v){
    $s = mb_strtolower((string)$v);
    return strtr($s, ['ä'=>'ae','ö'=>'oe','ü'=>'ue']);
  };
@endphp



<!doctype html>
<html lang="de">
<head>
<meta charset="utf-8">
<title>{{ $brandName }} | {{ $report_no }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
  /* Gelbe Markierung für ganze Zeile bei Auffälligkeiten */
  .row-alert {
    outline: 2px solid #f59e0b;            /* gelb/orange Rahmen */
    outline-offset: -2px;                   /* bündig mit Zellen */
    background: #fff7ed;                    /* sehr helles Orange */
  }
.warn-badge {
  display: inline-flex;
  align-items: center;       /* vertikal mittig */
  justify-content: center;   /* horizontal mittig */
  font-weight: 700;
  font-size: 10px;           /* etwas größer, damit nicht „versinkt“ */
  color: #92400e;
  background: #fde68a;
  border: 1px solid #f59e0b;
  border-radius: 50%;        /* runder Kreis */
  width: 14px;
  height: 14px;
  line-height: 9px;         /* gleiche Höhe wie Kreis → echte Zentrierung */
  text-align: center;
  margin-right: 4px;
  vertical-align: middle;
}


</style>



<style>
  @page { margin: 22mm 16mm 24mm 16mm; }
  html, body { font-family: DejaVu Sans, Arial, sans-serif; color:#0f172a; font-size: 14px; }

  header { position: fixed; top: -13mm; left: 0; right: 0; height: 14mm; }
  footer { position: fixed; bottom: -21mm; left: 0; right: 0; height: 16mm; font-size: 12px; color:#6b7280; }
  .hf-table { width: 100%; border-collapse: collapse; }
  .brand { font-weight: 700; letter-spacing:.3px; }
  .accent { color:#01449a; }
  .page-num:before { content: counter(page); }

  .wrap { width: 100%; }
  .card { border: 1px solid rgba(15,23,42,.08); border-radius: 12px; padding: 14px; margin-bottom: 15px; }
  .section-title { font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing:.6px; color:#111827; margin: 0 0 8px; padding-bottom: 6px; border-bottom: 1px solid #dbdbdbff; }

  /* Key-Value Layout mit mehr Abstand */
  .kv { margin: 2px 0; }
  .kv b { display:inline-block; min-width: 200px; } /* mehr Platz für Label */
  .kv span { padding-left: 10px; display:inline-block; } /* Wert leicht eingerückt */
</style>
<style>
  /* === Abschnitt-Layout ohne Rahmen (Cards neutralisieren) === */
  .card {
    border: 0 !important;
    box-shadow: none !important;
    background: transparent !important;
    padding: 0 !important;
    margin: 0 0 20px 0 !important; /* nur Abstand zwischen den Abschnitten */
  }

  /* Überschrift direkt über der Tabelle, ohne extra Innenabstand */
  .card > .section-title {
    margin: 0 0 8px 0 !important;
    padding: 0 !important;
    /* falls du KEINE Linie unter der Überschrift willst, kommentiere die nächste Zeile aus */
    border-bottom: 1px solid #dbdbdbff !important;
  }

  /* Tabellen-Style bleibt wie zuvor (nur Kopfzeile grau) */
  .simple-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
  .simple-table th, .simple-table td {
    border:1px solid #dbdbdbff; padding:6px 8px; font-size:12px; vertical-align:top; text-align:left;
  }
  .simple-table thead th { background:#f3f4f6; font-weight:700; }
  .col-label { width:33%; }
  .col-value { width:67%; }
</style>

</head>
<body>
@php
    $logoData = base64_encode(file_get_contents(public_path('logo-big.png')));
    $usePartnerLogo = (bool) ($order->pdf_with_partner_logo ?? false);
    $defaultLogoPath = public_path('logo-pdf.png');
    $fallbackPartnerLogo = public_path('logo-pdf-partner.png');
    $selectedPartnerLogo = null;
    if ($usePartnerLogo && optional($order->partnerLogo)->logo_path) {
        $candidate = public_path($order->partnerLogo->logo_path);
        if (file_exists($candidate)) {
            $selectedPartnerLogo = $candidate;
        }
    }
    $logoPath = $defaultLogoPath;
    if ($usePartnerLogo) {
        $logoPath = $selectedPartnerLogo ?? (file_exists($fallbackPartnerLogo) ? $fallbackPartnerLogo : $defaultLogoPath);
    }
    $partnerName = optional($order->partnerLogo)->name;
    $brandName = $usePartnerLogo && $partnerName ? $partnerName : 'Carspector';
@endphp

<header>
    <table class="hf-table" style="width:100%;">
        <tr>
            <!-- Linke Seite: Logo -->
            <td style="width:50%; text-align:left; vertical-align:middle;">
                <img src="{{ $logoPath }}" alt="{{ $brandName }} Logo" style="height:36px; display:block;">
            </td>

            <!-- Rechte Seite: Bericht-Nr. & Datum -->
            <td style="width:50%; text-align:right; vertical-align:middle;">
                <small style="font-size: 12px; display:block;">Bericht-Nr. {{ $report_no }}</small>
                <small style="font-size: 12px; display:block;">Erstellt: {{ $report_dt ?: '—' }}</small>
            </td>
        </tr>
    </table>
</header>



{{--<header>--}}
{{--  <table class="hf-table">--}}
{{--    <tr>--}}
{{--      <td style="width:65%;">--}}
{{--          <div style="display: block;position: relative">--}}
{{--              <div class="brand" style="height: 70px;width: 70px;background: #01449A;text-align: center;border-radius: 5px;position: relative">--}}
{{--                  <img style="position: absolute;top:50%;left: 50%; transform: translate(-50%, -50%);" width="45px" src="{{ public_path('front/imgs/logos/logo-2.png') }}">--}}
{{--              </div>--}}
{{--              <div style="display:block;position: absolute;top: -10px;left: 73px">--}}
{{--                  <h1 style="font-size: 20px;color:#01449A;margin-top: 10px;margin-bottom: 0px;">Carspector</h1>--}}
{{--                  <small style="color:#01449A;font-weight: 500;font-size: 13px;margin:0;padding-left:5px;line-height:1.2;display:block;">Auto gecheckt</small>--}}
{{--                  <small style="color:#01449A;font-weight: 500;font-size: 13px;margin:0;padding-left:5px;line-height:1.2;display:block;">Sicher gekauft</small>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--          <small>Bericht-Nr. {{ $report_no }}</small>--}}
{{--      </td>--}}
{{--      <td style="width:35%; text-align:right;">--}}
{{--        <small>Erstellt: {{ $report_dt ?: '—' }}</small><br>--}}
{{--      </td>--}}
{{--    </tr>--}}
{{--  </table>--}}
{{--</header>--}}

<footer>
  <table class="hf-table">
    <tr>
      <td style="width:60%; font-size: 12px">© {{ date('Y') }} – {{ $brandName }}</td>
      <td style="width:40%; text-align:right; font-size: 12px">Seite <span class="page-num"></span> </td>
    </tr>
  </table>
</footer>

<main class="wrap" style="margin-top: 10px;">

<style>
  .simple-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
  .simple-table th, .simple-table td {
    border:1px solid #dbdbdbff; padding:6px 8px; font-size:12px;
    vertical-align:top; text-align:left; background:#fff;
    font-weight: 400;
  }
  .simple-table thead th { background:#e9f3ff; font-weight:700; }

  .simple-table.two-col th:first-child,
  .simple-table.two-col td:first-child { width:20%; white-space:nowrap; }
  .simple-table.two-col th:nth-child(2),
  .simple-table.two-col td:nth-child(2) { width:80%; }

  .simple-table.four-col th:nth-child(1),
  .simple-table.four-col th:nth-child(2),
  .simple-table.four-col th:nth-child(3),
  .simple-table.four-col th:nth-child(4),
  .simple-table.four-col td.label-cell,
  .simple-table.four-col td.value-cell { width:25%; }

  .label-cell { font-weight:400; white-space:nowrap; }
</style>
<div class="card">
  <!-- <h1 style="font-size:17px; margin-bottom:15px;">Gebrauchtwagengutachten</h1> -->
    <h1 style="font-size: 15px; margin-bottom:15px; padding-top: 20px !important" class="section-title">Gebrauchtwagen-gutachten</h1>

  <table class="simple-table three-col">
    <thead>
      <tr>
        <th>Auftraggeber</th>
        <th>Prüfer</th>
        <th>Datum</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ ($examination->client_name ?? '') !== '' ? $examination->client_name : ($order->user->name ?? '—') }}</td>
        <td>{{ ($examination->examiner_name ?? '') !== '' ? $examination->examiner_name : ($insp->name ?? '—') }}</td>
        <td>{{ $report_dt ?: '—' }}</td>
      </tr>
    </tbody>
  </table>
</div>

<style>
  .simple-table { width:100%; border-collapse:collapse; margin-bottom:15px; }
  .simple-table th, .simple-table td {
    border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px;
    vertical-align:top; text-align:left; background:#fff;
    font-weight:400;
  }
  /* 3 Spalten gleich breit + Datum rechtsbündig */
  .simple-table.three-col th:nth-child(1),
  .simple-table.three-col td:nth-child(1),
  .simple-table.three-col th:nth-child(2),
  .simple-table.three-col td:nth-child(2),
  .simple-table.three-col th:nth-child(3),
  .simple-table.three-col td:nth-child(3) { width:33.333%; }
  .simple-table .text-right { text-align:right; }
</style>



<!-- ABSCHNITT 1: PRÜFUNGSBEDINGUNGEN (Headerzeile grau) -->
<div class="card" style="padding-top: 20px !important;">
  <h2 class="section-title">Prüfungsbedingungen</h2>
  <table class="simple-table">
    <thead>
      <tr>
        <th class="col-label">Kriterium</th>
        <th class="col-value">Wert</th>
      </tr>
    </thead>
    <tbody>
      <tr><td style="background:#e9f3ff">Wetterbedingungen</td><td>{{ $weather_label }}</td></tr>
      <tr><td style="background:#e9f3ff">Lichtbedingungen</td><td>{{ $lighting_label }}</td></tr>
      <tr><td style="background:#e9f3ff">Fahrzeug sauber?</td><td>{{ $clean_label }}</td></tr>
      <tr><td style="background:#e9f3ff">Fahrzeug zugänglich?</td><td>{{ $access_label }}</td></tr>
    </tbody>
  </table>
</div>
<!-- ABSCHNITT 2: FAHRZEUGDATEN (4 Spalten: 2 Datenpaare pro Zeile) -->
@php
  // Fallback, falls $formatKm nicht injiziert ist
  if (!isset($formatKm)) {
    $formatKm = function($km) {
      if ($km === null || $km === '') return '—';
      $n = preg_replace('/[^\d]/', '', (string)$km);
      if ($n === '') return '—';
      return number_format((int)$n, 0, ',', '.') . ' km';
    };
  }

  $rows = [
    ['Hersteller',      $examination->manufacturer ?? $veh->make ?? '—'],
    ['Fz-Ident (FIN)',  isset($examination->fin) ? strtoupper($examination->fin) : (isset($veh->vin) ? strtoupper($veh->vin) : '—')],
    ['Modell',          $examination->model ?? $veh->model ?? '—'],
    ['Bauart',          $examination->body_type ?? '—'],
    ['Getriebe',        $examination->transmission ?? $veh->transmission ?? '—'],
    ['Erstzulassung',   $examination->first_registration ?? '—'],
    ['Kraftstoff',      $examination->fuel ?? $veh->fuel ?? '—'],
    ['Farbe',           $examination->color ?? '—'],
    ['Hubraum',         $examination->engine_displacement ?? '—'],
    ['Anzahl Türen',    $examination->doors ?? '—'],
    ['Leistung',        $examination->power ?? '—'],
    ['Nächste HU',      $examination->next_hu ?? '—'],
    ['Km-Stand',        $formatKm($examination->km_reading ?? $veh->mileage ?? null)],
    ['Schadstoffklasse',$examination->emission_class ?? '—'],
  ];
  if (($examination->previous_owners ?? '') !== '') {
    $rows[] = ['Vorbesitzer', $examination->previous_owners];
  }
@endphp
<div class="card" style="page-break-after: always;padding-top: 25px !important;">
  <h2 class="section-title">Fahrzeugdaten</h2>

  @php
    // Spaltenbreiten (einfach hier anpassen)
    $labelColStyle = 'width:21% !important; background:#e9f3ff';   // 1. & 3. Spalte
    $valueColStyle = 'width:29% !important;';   // 2. & 4. Spalte
  @endphp

  <table class="simple-table four-col" style="width:100%; border-collapse:collapse; table-layout:fixed;">
    <thead>
      <tr>
        <th style="{{ $labelColStyle }}">Parameter</th>
        <th style="{{ $valueColStyle }}">Wert</th>
        <th style="{{ $labelColStyle }}">Parameter</th>
        <th style="{{ $valueColStyle }}">Wert</th>
      </tr>
    </thead>
    <tbody>
      @foreach(array_chunk($rows, 2) as $pair)
        <tr>
          <td class="label-cell" style="{{ $labelColStyle }}">{{ $pair[0][0] ?? '' }}</td>
          <td class="value-cell" style="{{ $valueColStyle }}">{{ $pair[0][1] ?? '' }}</td>
          <td class="label-cell" style="{{ $labelColStyle }}">{{ $pair[1][0] ?? '' }}</td>
          <td class="value-cell" style="{{ $valueColStyle }}">{{ $pair[1][1] ?? '' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>



<!-- ABSCHNITT: FAHRZEUGDOKUMENTE (Headerzeile grau, nur diese grau) -->
@php
  $ynMap = ['yes' => 'Vorhanden', 'no' => 'Nicht vorhanden / lag nicht vor'];
  $serviceTypeMap = ['paper' => 'Papier', 'digital' => 'Digital', 'none' => 'Nicht vorhanden / lag nicht vor'];
  $maintainedMap = ['yes' => 'Ja', 'no' => 'Nein', 'partial' => 'Teilweise'];

  $permitsVal = $examination->permits ?? '';
  $permitsLabel = $ynMap[$permitsVal] ?? ($permitsVal ?: '—');
  $permitsDetails = trim((string)($examination->permits_details ?? ''));

  $registration_certificate = $ynMap[$examination->registration_certificate ?? ''] ?? (($examination->registration_certificate ?? '') ?: '—');
  $vehicle_title            = $ynMap[$examination->vehicle_title ?? ''] ?? (($examination->vehicle_title ?? '') ?: '—');
  $owner_manual             = $ynMap[$examination->owner_manual ?? ''] ?? (($examination->owner_manual ?? '') ?: '—');
  $hu_au_report             = $ynMap[$examination->hu_au_report ?? ''] ?? (($examination->hu_au_report ?? '') ?: '—');

  $service_book_type        = $serviceTypeMap[$examination->service_book_type ?? ''] ?? (($examination->service_book_type ?? '') ?: '—');
  $service_book_maintained  = $maintainedMap[$examination->service_book_maintained ?? ''] ?? (($examination->service_book_maintained ?? '') ?: '—');
  $service_book_details     = trim((string)($examination->service_book_details ?? ''));
@endphp

@php
  $serien = trim((string)($examination->serienausstattung ?? ''));
  $sonder = trim((string)($examination->sonderausstattung ?? ''));
@endphp

@if($serien !== '')
  <div class="card" style="padding-top: 25px !important">
    @if($serien)
      <h2 class="section-title">Serienausstattung</h2>
      <div>{!! nl2br(e($serien)) !!}</div>
    @endif
  </div>
@endif

@if($sonder !== '')
  <div class="card" style="page-break-after: always; padding-top: 15px !important;">
    @if($sonder)
      <h2 class="section-title">Sonderausstattung</h2>
      <div>{!! nl2br(e($sonder)) !!}</div>
    @endif
  </div>
@endif


<div class="card" style="page-break-after: always;padding-top: 25px !important;">
  <h2 class="section-title">Fahrzeugdokumente</h2>
  <table class="simple-table">
    <thead>
      <tr>
        <th class="col-label">Dokument</th>
        <th class="col-value">Wert / Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="background:#e9f3ff">Genehmigungen</td>
        <td>{{ $permitsLabel }}</td>
      </tr>
      @if(($examination->permits ?? '') === 'yes' && $permitsDetails !== '')
        <tr>
          <td style="background:#e9f3ff">Genehmigungen (Details)</td>
          <td>{{ $permitsDetails }}</td>
        </tr>
      @endif
      <tr><td style="background:#e9f3ff">Fahrzeugschein</td><td>{{ $registration_certificate }}</td></tr>
      <tr><td style="background:#e9f3ff">Fahrzeugbrief</td><td>{{ $vehicle_title }}</td></tr>
      <tr><td style="background:#e9f3ff">Bordbuch</td><td>{{ $owner_manual }}</td></tr>
      <tr><td style="background:#e9f3ff">HU/AU Bericht</td><td>{{ $hu_au_report }}</td></tr>
      <tr><td style="background:#e9f3ff">Serviceheft (Art)</td><td>{{ $service_book_type }}</td></tr>
      <tr>
        <td style="background:#e9f3ff">Serviceheft gepflegt?</td>
        <td>
          {{ $service_book_maintained }}
          @if(($examination->service_book_maintained ?? '') === 'partial' && $service_book_details !== '')
            <div style="margin-top:4px;">Details: {{ $service_book_details }}</div>
          @endif
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- ABSCHNITT: BEREIFUNG (Tabellen-Darstellung, mit Hersteller-Spalte und DOT bei Profil) -->
@php
  $tiresRaw = $examination->tires ?? [];
  $tiresArr = is_array($tiresRaw) ? $tiresRaw : (array)$tiresRaw;
  $tires = [];
  foreach ($tiresArr as $t) { $tires[] = is_array($t) ? (object)$t : $t; }

  // Nach Satz gruppieren
  $bySet = [];
  foreach ($tires as $t) {
    $setNo = (int)($t->set ?? 1);
    $bySet[$setNo][] = $t;
  }

  // Positionsreihenfolge
  $posOrder = ['VL','VR','HL','HR'];

  // Formatter
  $fmtSize = function($t) {
    $a = trim((string)($t->tire_size_1 ?? ''));
    $b = trim((string)($t->tire_size_2 ?? ''));
    $c = trim((string)($t->tire_size_3 ?? ''));
    if ($a==='' && $b==='' && $c==='') return '—';
    $c = strtoupper($c);
    $c = preg_match('/^R?\d+$/', $c) ? (strtoupper(substr($c,0,1))==='R' ? $c : ('R'.$c)) : $c;
    return ($a!==''?$a:'—') . ' / ' . ($b!==''?$b:'—') . ' ' . ($c!==''?$c:'—');
  };
  $fmtProfile = function($v) {
    $v = (string)$v;
    $v = str_replace(',', '.', $v);
    $num = is_numeric($v) ? (float)$v : null;
    return $num !== null ? number_format($num, 1, ',', '.') . ' mm' : '—';
  };

  // Hilfsfunktion: Liste eines Satzes auf 4 Positionen auffüllen
  $rowsForSet = function($list) use ($posOrder, $fmtSize, $fmtProfile) {
    $map = [];
    foreach ((array)$list as $t) {
      $pos = strtoupper((string)($t->position ?? ''));
      if ($pos) $map[$pos] = $t;
    }
    $rows = [];
    foreach ($posOrder as $pos) {
      $t = $map[$pos] ?? null;
      $rows[] = [
        'position'     => $pos,
        'manufacturer' => $t ? ($t->manufacturer ?? $t->brand ?? null) : null,
        'type'         => $t->type ?? null,
        'size'         => $t ? $fmtSize($t) : '—',
        'profile'      => $t ? $fmtProfile($t->tire_profile ?? '') : '—',
        'dot'          => $t ? trim((string)($t->tire_dot ?? '')) : '',
      ];
    }
    return $rows;
  };

  // ===== Zusatz: Ersatzrad / Reifenflick-Set =====
  $extraVal  = (string)($examination->tire_extra ?? '');
  $extraLbls = [
    'spare'      => 'Ersatzrad vorhanden',
    'repair_kit' => 'Reifenflick-Set vorhanden',
    'none'       => 'Nichts vorhanden',
  ];
  $extraLabel  = $extraLbls[$extraVal] ?? ($extraVal !== '' ? $extraVal : '—');
  $extraSize   = trim((string)($examination->tire_extra_size ?? ''));
  $extraExpiry = trim((string)($examination->tire_repair_expiry ?? ''));
@endphp

<style>
  .tire-table { width:100%; border-collapse: collapse; margin-bottom:12px; }
  .tire-table th, .tire-table td {
    border:1px solid #dbdbdbff;
    padding:6px 8px;
    font-size:14px;
    vertical-align:top;
    text-align:left;
    background:#fff;
    font-weight:400;
  }
  .tire-table th { background:#e9f3ff; font-weight:700; }
  .set-title { font-weight:700; margin: 6px 0; }
  .sep { color:#64748b; padding:0 4px; }
</style>

<div class="card tire-section" style="page-break-after: always;padding-top: 25px !important;">
  <h2 class="section-title">Bereifung</h2>

  {{-- Satz 1: nur anzeigen, wenn vorhanden --}}
  @if(!empty($bySet[1]))
    @php $rows = $rowsForSet($bySet[1]); @endphp
    <p class="set-title">Reifensatz 1</p>
    <table class="tire-table">
      <thead>
        <tr>
          <th style="width:11%;">Pos.</th>
          <th style="width:22%;">Hersteller</th>
          <th style="width:22%;">Art</th>
          <th style="width:22%;">Größe</th>
          <th style="width:23%;">Profil / DOT</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rows as $r)
          <tr>
  <td style="background:#e9f3ff">{{ $r['position'] }}</td>
  <td>{{ $r['manufacturer'] ?: '—' }}</td>
  <td>{{ $r['type'] ?: '—' }}</td>
  <td>{{ $r['size'] }}</td>
    <td>
      @php
        $dotYear = null;
        $dotWeek = null;
        if (!empty($r['dot']) && preg_match('/(\d{2})(\d{2})$/', $r['dot'], $matches)) {
            $dotWeek = (int)$matches[1];
            $dotYear = (int)$matches[2] + 2000; // z. B. DOT "2317" → KW 23, Jahr 2017
        }
        $isDotAlt = $dotYear && $dotYear <= (date('Y') - 6);
      @endphp

      {{-- WARN zuerst --}}
      @if((int)$r['profile'] < 3 || $isDotAlt)
          {!! $WARN !!}
      @endif

      {{-- danach Profil/DOT --}}
      {{ $r['profile'] }}
      @if(!empty($r['dot']))
        <span class="sep">/</span> {{ $r['dot'] }}
      @endif
    </td>
  </tr>

        @endforeach
      </tbody>
    </table>
  @endif

  {{-- Satz 2: IMMER anzeigen (mit Platzhaltern, falls keine Daten) --}}
  @php $rows2 = $rowsForSet($bySet[2] ?? []); @endphp
  <p style="padding-top: 25px !important" class="set-title">Reifensatz 2</p>
  <table class="tire-table">
    <thead>
      <tr>
        <th style="width:11%;">Pos.</th>
        <th style="width:22%;">Hersteller</th>
        <th style="width:22%;">Art</th>
        <th style="width:22%;">Größe</th>
        <th style="width:23%;">Profil / DOT</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($rows2 as $r)
        <tr>
  <td style="background:#e9f3ff">{{ $r['position'] }}</td>
  <td>{{ $r['manufacturer'] ?: '—' }}</td>
  <td>{{ $r['type'] ?: '—' }}</td>
  <td>{{ $r['size'] }}</td>
  <td>
    @php
      $dotYear = null;
      $dotWeek = null;
      if (!empty($r['dot']) && preg_match('/(\d{2})(\d{2})$/', $r['dot'], $matches)) {
          $dotWeek = (int)$matches[1];
          $dotYear = (int)$matches[2] + 2000; // z. B. DOT "2317" → KW 23, Jahr 2017
      }
      $isDotAlt = $dotYear && $dotYear <= (date('Y') - 6);
    @endphp

    {{-- WARN zuerst --}}
    @if($r['profile'] < 3 || $isDotAlt)
      {!! $WARN !!}
    @endif

    {{-- danach Profil/DOT --}}
    {{ $r['profile'] }}
    @if(!empty($r['dot']))
      <span class="sep">/</span> {{ $r['dot'] }}
    @endif
  </td>
</tr>

      @endforeach
    </tbody>
  </table>

  {{-- Zusatz: Ersatzrad / Reifenflick-Set (zweispaltig) --}}
@if($extraVal === 'spare' || $extraVal === 'repair_kit')
<p style="padding-top: 25px !important" class="set-title">Zusatz</p>

<table class="simple-table two-col" style="width:100%; table-layout:fixed; border-collapse:collapse;">
  <tbody>
    <tr>
      <td style="width:20% !important; background:#e9f3ff; white-space:nowrap;">Zusatz</td>
      <td style="width:80% !important; word-break:break-word;">
        @if($extraVal === 'spare')
          Ersatzrad vorhanden
        @elseif($extraVal === 'repair_kit')
          Reifenflick-Set vorhanden
        @endif
      </td>
    </tr>

    @if($extraVal === 'spare')
      <tr>
        <td style="width:20% !important; background:#e9f3ff; white-space:nowrap;">Größe / Profil</td>
        <td style="width:80% !important; word-break:break-word;">{{ $extraSize !== '' ? $extraSize : '—' }}</td>
      </tr>
    @elseif($extraVal === 'repair_kit')
      <tr>
        <td style="width:20% !important; background:#e9f3ff; white-space:nowrap;">Ablaufdatum</td>
        <td style="width:80% !important; word-break:break-word;">{{ $extraExpiry !== '' ? $extraExpiry : '—' }}</td>
      </tr>
    @endif
  </tbody>
</table>

@endif

  @php
    $tiresComment = trim((string)($examination->vehicle_tires_comment ?? ''));
  @endphp
  @if($tiresComment !== '')
    <table class="simple-table two-col" style="margin-top: 8px;">
      <tbody>
        <tr>
          <td style="background:#e9f3ff; width:20%;">Kommentar</td>
          <td style="width:80%;">{!! nl2br(e($tiresComment)) !!}</td>
        </tr>
      </tbody>
    </table>
  @endif

</div>


<!-- ABSCHNITT: LACKDICKE & -ZUSTAND (Tabellen-Darstellung, ohne "Status"-Spalte) -->
@php
  $parts = [
    ['label' => 'Motorhaube',     'key' => 'bonnet'],
    ['label' => 'Kotflügel VL',   'key' => 'fender_vl'],
    ['label' => 'Kotflügel VR',   'key' => 'fender_vr'],
    ['label' => 'Tür VL',         'key' => 'door_vl'],
    ['label' => 'Tür HL',         'key' => 'door_hl'],
    ['label' => 'Tür VR',         'key' => 'door_vr'],
    ['label' => 'Tür HR',         'key' => 'door_hr'],
    ['label' => 'Seitenwand HL',  'key' => 'quarter_hl'],
    ['label' => 'Seitenwand HR',  'key' => 'quarter_hr'],
    ['label' => 'Dach',           'key' => 'roof'],
    ['label' => 'Heckklappe',     'key' => 'tailgate'],
  ];

  // Text, der bei "nicht messbar" bzw. "nicht vorhanden" anstelle des µm-Werts steht
  $statusMsg = [
    'messbar'         => 'Bauteil vorhanden & messbar',
    'nicht_messbar'   => 'Nicht messbar',
    'nicht_vorhanden' => 'Nicht vorhanden',
  ];
  $yn = ['yes' => 'Ja', 'no' => 'Nein'];

  $fmtMicron = function($v){
    if ($v === null || $v === '') return '—';
    $s = str_replace(',', '.', (string)$v);
    if (!is_numeric($s)) return $v;
    $n = (float)$s;
    return rtrim(rtrim(number_format($n, 0, ',', '.'), '0'), ',') . ' µm';
  };

  $normalizeList = function($val){
    if ($val === null || $val === '') return [];
    if (is_array($val)) return array_values(array_filter($val, fn($x)=>(string)$x !== ''));
    return [(string)$val];
  };
@endphp

<style>
  .paint-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
  .paint-table th, .paint-table td {
    border:1px solid #dbdbdbff;
    padding:6px 8px;
    font-size:14px;
    vertical-align:top;
    text-align:left;
    background:#fff;
    font-weight:400;
  }
  .paint-table th { background:#e9f3ff; font-weight:700; }
  /* 4 Spalten: Bauteil / Dicke / Nachlackiert / Schäden */
  .paint-col-part  { width:21%; }
  .paint-col-thick { width:23%; }
  .paint-col-rep   { width:18%; }
  .paint-col-dmg   { width:38%; }
  .paint-table ul { margin:0; padding-left:18px; }
  .paint-table li { margin:0 0 2px 0; }
</style>

<div class="card" style="padding-top: 25px !important;">
  <h2 class="section-title">Lackdicke &amp; -zustand</h2>

  <table class="paint-table">
    <thead>
      <tr>
        <th class="paint-col-part">Bauteil</th>
        <th class="paint-col-thick">Lackschichtdicke in µm</th>
        <th class="paint-col-rep">Nachlackiert?</th>
        <th class="paint-col-dmg">Schäden / Auffälligkeiten</th>
      </tr>
    </thead>
    <tbody>
  @foreach($parts as $p)
    @php
      $k = $p['key'];

      $status     = $examination->{$k.'_thickness_status'} ?? '';   // 'messbar' | 'nicht_messbar' | 'nicht_vorhanden'
      $thickness  = $examination->{$k.'_paint_layer_thickness'} ?? '';
      $repainted  = $examination->{$k.'_repainted'} ?? '';          // 'yes' | 'no' | ''
      $anyDamage  = $examination->{$k.'_any_damage'} ?? '';         // 'yes' | 'no' | ''
      // Schäden-Liste; reines "Sonstiges" nicht anzeigen (nur Freitext soll erscheinen)
      $damages    = $normalizeList($examination->{$k.'_damages'} ?? []);
      $damages    = array_values(array_filter($damages, function($v){
        $s = trim((string)$v);
        return $s !== '' && mb_strtolower($s) !== 'sonstiges';
      }));

      $isMeasurable   = ($status === 'messbar');
      $isNotPresent   = ($status === 'nicht_vorhanden');

      // Anzeige-Text für "Nachlackiert?"
      $repaintedText = $yn[$repainted] ?? ($repainted !== '' ? $repainted : '—');

      // Prüfen, ob das Bauteil nachlackiert ist (angezeigter Text = "Ja")
      $isRepaintedYes = $isMeasurable && (mb_strtolower(trim($repaintedText)) === 'ja');
    @endphp

    <tr>
      <td style="background:#e9f3ff">{{ $p['label'] }}</td>

      {{-- Lackschichtdicke ODER Status-Text --}}
      <td>
      @if($isMeasurable)
        @php
          $s = trim($thickness);
          if (is_numeric(str_replace(',', '.', $s))) {
              $s = number_format((float)str_replace(',', '.', $s), 2, ',', '');
              $s = preg_replace('/,0+$/', '', $s); // ",00" etc. entfernen
          }
        @endphp
        {{-- Wenn nachlackiert -> Warnsymbol davor --}}
        @if($isRepaintedYes)
          {!! $WARN !!}
        @endif
        {{ $s }} µm
      @elseif(isset($statusMsg[$status]))
        {{ $statusMsg[$status] }}
      @else
        —
      @endif
      </td>

      {{-- Nachlackiert? nur bei "messbar", sonst Strich --}}
      <td>
        @if($isMeasurable)
          {{ $repaintedText }}
        @else
          —
        @endif
      </td>

      {{-- Schäden: nicht anzeigen, wenn Bauteil nicht vorhanden --}}
      <td>
        @if($isNotPresent)
          —
        @else
          @if($anyDamage === 'yes')
            @php $txt = $joinComma($damages); @endphp
            @if($txt !== '')
              {!! $WARN !!}{{ $txt }}
            @else
              {!! $WARN !!}Schäden vorhanden
            @endif
          @elseif($anyDamage === 'no')
            Keine
          @else
            —
          @endif
        @endif
      </td>
    </tr>
  @endforeach

  @php $paintComment = trim((string)($examination->paint_general_comment ?? '')); @endphp
  @if($paintComment !== '')
    <tr>
      <td style="background:#e9f3ff">Kommentar</td>
      <td colspan="3">{{ $paintComment }}</td>
    </tr>
  @endif
</tbody>

  </table>
</div>



<!-- ABSCHNITT: KAROSSERIE (Tabellen-Darstellung mit zusätzlicher Spalte "Zustand") -->
@php
  $parts = [
    ['label' => 'Stoßstange vorne',  'key' => 'front_bumper'],
    ['label' => 'Stoßstange hinten', 'key' => 'rear_bumper'],
    ['label' => 'Grill',              'key' => 'grill'],
    ['label' => 'Schweller links',    'key' => 'sill_left'],
    ['label' => 'Schweller rechts',   'key' => 'sill_right'],
  ];

  $normalizeDamages = function($val){
    if ($val === null || $val === '') return [];
    if (is_array($val)) return $val;
    return [(string)$val];
  };

  // Mappt die yes/no-Eingaben ("Schäden vorhanden?") auf einen Zustands-Text
  $stateFromHas = function($has){
    if ($has === 'yes') return 'Beschädigt';
    if ($has === 'no')  return 'i.O.';
    return '—';
  };
@endphp

<style>
  .body-table { width:100%; border-collapse: collapse; margin-bottom:12px; }
  .body-table th, .body-table td {
    border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; text-align:left; background:#fff; font-weight:400;
  }
  .body-table th { background:#e9f3ff; font-weight:700; }
  .body-table .col-part  { width:33%; white-space:nowrap; }
  .body-table .col-state { width:24%; }
  .body-table .col-find  { width:43%; }
  .body-table ul { margin:0; padding-left:18px; }
  .body-table li { margin:0 0 2px 0; }
</style>

<div class="card body-section" style="page-break-after: always;padding-top: 25px !important;">
  <h2 class="section-title">Karosserie</h2>

  <table class="body-table">
    <thead>
      <tr>
        <th class="col-part">Bauteil</th>
        <th class="col-state">Zustand</th>
        <th class="col-find">Schäden / Auffälligkeiten</th>
      </tr>
    </thead>
    <tbody>
      @foreach($parts as $p)
        @php
          $k   = $p['key'];
          $lbl = $p['label'];
          $has = $examination->{$k} ?? ''; // 'yes' | 'no' | ''
          $stateText = $stateFromHas($has);

          $dmgKey  = $k . '_damage';
          $damages = array_values(array_filter(
            $normalizeDamages($examination->{$dmgKey} ?? []),
            fn($v)=> (string)$v !== ''
          ));
        @endphp
        <tr>
          <td style="background:#e9f3ff">{{ $lbl }}</td>
          <td>{{ $stateText }}</td>
          <td>
            @if($has === 'no')
              Keine
            @elseif($has === 'yes')
              @php $txt = $joinComma($damages); @endphp
              @if($txt !== '')
                {!! $WARN !!}{{ $txt }}
              @else
                {!! $WARN !!}Beschädigt (Details nicht angegeben)
              @endif
            @else
              —
            @endif
          </td>
        </tr>
      @endforeach

      {{-- Spaltmaße --}}
      @php
        $gap = $examination->are_gap_ok ?? '';
        $gapState = $gap === 'yes' ? 'i.O.' : ($gap === 'no' ? 'Abweichend' : '—');
      @endphp
      <tr>
        <td style="background:#e9f3ff">Spaltmaße</td>
        <td>{{ $gapState }}</td>
        <td>
          @if($gap === 'no')
            {!! $WARN !!}
            Abweichungen festgestellt
          @elseif($gap === 'yes')
            Keine
          @else
            —
          @endif
        </td>
      </tr>

      {{-- Allgemeiner Kommentar (optional) --}}
      @php $bodyComment = trim((string)($examination->body_general_comment ?? '')); @endphp
      @if($bodyComment !== '')
        <tr>
          <td style="background:#e9f3ff">Kommentar</td>
          <td colspan="2">{{ $bodyComment }}</td>
        </tr>
      @endif
    </tbody>
  </table>
</div>


<!-- ABSCHNITT: BELEUCHTUNG (Tabellen-Darstellung) -->
@php
  $items = [
    ['label' => 'Scheinwerfer',         'key' => 'headlights'],
    ['label' => 'Rücklichter',          'key' => 'rear_lights'],
    ['label' => 'Bremslicht',           'key' => 'brake_light'],
    ['label' => 'Rückfahrlicht',        'key' => 'reverse_light'],
    ['label' => 'Blinker',              'key' => 'indicator'],
    ['label' => 'Warnblinkanlage',      'key' => 'hazard_lights'],
    ['label' => 'Nebelscheinwerfer',    'key' => 'fog_lights'],
    ['label' => 'Abblendlicht',         'key' => 'low_beam'],
    ['label' => 'Innenraumbeleuchtung', 'key' => 'interior_light'],
    ['label' => 'Tagfahrlicht',         'key' => 'daytime_running_light'],
  ];

  // Status-Normalisierung/Mapping
  $norm = function($v){
    $s = mb_strtolower((string)$v);
    $s = str_replace(['ä','ö','ü'], ['ae','oe','ue'], $s);
    $s = str_replace('ä', 'ae', $s);
    return $s;
  };
  $statusLabel = function($v) use ($norm){
    $s = $norm($v);
    return match($s) {
      'funktioniert'    => 'i.O.',
      'defekt'          => 'Defekt',
      'beschaedigt'     => 'Beschädigt',
      'nicht_vorhanden' => 'Nicht vorhanden',
      default           => ($v !== '' ? (string)$v : '—'),
    };
  };

  // Hilfsfunktionen für Schäden + "Sonstiges"
  $normalizeList = function($val){
    if ($val === null || $val === '') return [];
    if (is_array($val)) return array_values(array_filter($val, fn($x)=>(string)$x !== ''));
    return [(string)$val];
  };
  $combineDamages = function($damages, $others){
    $out = [];
    $count = max(count($damages), count($others));
    for ($i=0; $i<$count; $i++){
      $d = $damages[$i] ?? '';
      $o = trim((string)($others[$i] ?? ''));
      if ($d === '' && $o === '') continue;
      if ($d === 'Sonstiges') {
        $out[] = $o !== '' ? "Sonstiges: ".$o : 'Sonstiges';
      } else {
        $out[] = $d;
      }
    }
    return $out;
  };
@endphp

<style>
  .lights-table { width:100%; border-collapse: collapse; margin-bottom:12px; }
  .lights-table th, .lights-table td {
    border:1px solid #dbdbdbff;
    padding:6px 8px;
    font-size:14px;
    vertical-align:top;
  }
  .lights-table th { background:#e9f3ff; font-weight:700; text-align:left; }
  /* Spaltenbreiten: Bauteil schmaler, Status kompakt, Schäden breit */
  .lt-col-part   { width:33%; }
  .lt-col-status { width:24%; }
  .lt-col-dmg    { width:43%; }
  .lights-table ul { margin:0; padding-left:18px; }
  .lights-table li { margin:0 0 2px 0; }
</style>

<div class="card" style="page-break-after: always;padding-top: 25px !important;">
  <h2 class="section-title">Beleuchtung</h2>

  <table class="lights-table">
    <thead>
      <tr>
        <th class="lt-col-part">Bauteil</th>
        <th class="lt-col-status">Funktion</th>
        <th class="lt-col-dmg">Beschädigungen / Auffälligkeiten</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $it)
        @php
          $k = $it['key'];
          $status = $examination->{$k} ?? ''; // funktioniert|defekt|beschaedigt|nicht_vorhanden|''

          // Mehrfach-Schäden + "Sonstiges"
          $dmgList   = $normalizeList($examination->{$k.'_damages'} ?? []);
          $otherList = $normalizeList($examination->{$k.'_damages_other'} ?? []);
          $combined  = $combineDamages($dmgList, $otherList);

          $isDamaged = $norm($status) === 'beschaedigt';
        @endphp
        <tr>
          <td style="background:#e9f3ff">{{ $it['label'] }}</td>
          <td>{{ $statusLabel($status) }}</td>
          <td>
            @if($isDamaged)
              @php $txt = $joinComma($combined); @endphp
              @if($txt !== '')
                {!! $WARN !!}{{ $txt }}
              @else
                {!! $WARN !!}Beschädigt (Details nicht angegeben)
              @endif
            @elseif($norm($status) === 'defekt')
              {!! $WARN !!}Defekt / ohne Funktion
            @elseif($norm($status) === 'funktioniert')
              Keine
            @elseif($norm($status) === 'nicht_vorhanden')
              —
            @else
              —
            @endif

          </td>
        </tr>
      @endforeach

      @php $lc = trim((string)($examination->lights_comment ?? '')); @endphp
      @if($lc !== '')
        <tr>
          <td style="background:#e9f3ff">Kommentar</td>
          <td colspan="2">{{ $lc }}</td>
        </tr>
      @endif
    </tbody>
  </table>
</div>

<!-- ABSCHNITT: AUßENZUSTAND (Tabellen-Darstellung) -->
@php
  // ===== Konfiguration der Bereiche =====
  $statusMap = [
    'i.O.'            => 'i.O.',
    'beschädigt'      => 'Beschädigt',
    'nicht_vorhanden' => 'Nicht vorhanden',
  ];

  $exterior = [
    ['label' => 'Frontscheibe',        'key' => 'windshield'],
    ['label' => 'Fensterverglasung',   'key' => 'window_glazing'],
    ['label' => 'Scheibenwischer',     'key' => 'wipers'],
    ['label' => 'Dichtungen',          'key' => 'seals'],
    ['label' => 'Zentralverriegelung', 'key' => 'central_locking'],
    ['label' => 'Anbauteile',          'key' => 'attachments'],
    ['label' => 'Außenspiegel',        'key' => 'exterior_mirrors'],
  ];

  $mechanics = [
    ['label' => 'Radaufhängung',               'key' => 'suspension'],
    ['label' => 'Stoßdämpfer',                 'key' => 'shock_absorbers'],
    ['label' => 'Federn',                      'key' => 'springs'],
    ['label' => 'Bremsscheiben',               'key' => 'brake_discs'],
    ['label' => 'Bremsbeläge',                 'key' => 'brake_pads'],
    ['label' => 'Auspuffanlage',               'key' => 'exhaust_system'],
    ['label' => 'Motor Öldichtheit',           'key' => 'engine_oil_tightness'],
    ['label' => 'Getriebe Öldichtheit',        'key' => 'gearbox_oil_tightness'],
    ['label' => 'Differential Öldichtheit',    'key' => 'differential_oil_tightness'],
    ['label' => 'Unterboden Zustand generell', 'key' => 'underbody_condition'],
    ['label' => 'Sonstige Auffälligkeiten',    'key' => 'other_findings'],
  ];

  $rims = [
    ['label' => 'Felge VL', 'path' => 'rims.0'],
    ['label' => 'Felge VR', 'path' => 'rims.1'],
    ['label' => 'Felge HL', 'path' => 'rims.2'],
    ['label' => 'Felge HR', 'path' => 'rims.3'],
  ];

  // ===== Helper =====
  $norm = function($v){
    $s = mb_strtolower((string)$v);
    $s = str_replace(['ä','ö','ü'], ['ae','oe','ue'], $s);
    return $s;
  };
  $statusLabel = function($v) use ($statusMap){
    if ($v === null || $v === '') return '—';
    return $statusMap[$v] ?? (string)$v;
  };
  $list = function($val){
    if ($val === null || $val === '') return [];
    if (is_array($val)) return array_values(array_filter($val, fn($x)=>(string)$x !== ''));
    return [(string)$val];
  };
  $combineDamages = function($damages, $others){
    $out = [];
    $n = max(count($damages), count($others));
    for ($i=0; $i<$n; $i++){
      $d = $damages[$i] ?? '';
      $o = trim((string)($others[$i] ?? ''));
      if ($d === '' && $o === '') continue;
      if ($d === 'Sonstiges') {
        $out[] = $o !== '' ? "Sonstiges: ".$o : 'Sonstiges';
      } else {
        $out[] = $d;
      }
    }
    return $out;
  };
@endphp

<style>
  .ext-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
  .ext-table th, .ext-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; }
  .ext-table th { background:#e9f3ff; font-weight:700; text-align:left; }
  /* Spaltenbreiten: Bauteil schmaler, Status kompakt, Schäden breit */
  .ext-col-part   { width:33%; }
  .ext-col-status { width:24%; }
  .ext-col-dmg    { width:43%; }
  .ext-table ul { margin:0; padding-left:18px; }
  .ext-table li { margin:0 0 2px 0; }
  .ext-caption { font-weight:700; margin:6px 0; }
</style>

<div class="card" style="padding-top: 25px !important;">
  <h2 class="section-title">Außenzustand</h2>

  {{-- ===== Außen-Komponenten ===== --}}
  <p class="ext-caption">Karosserie-Anbauteile &amp; Außenkomponenten</p>
  <table class="ext-table">
    <thead>
      <tr>
        <th class="ext-col-part">Bauteil</th>
        <th class="ext-col-status">Zustand</th>
        <th class="ext-col-dmg">Schäden / Auffälligkeiten</th>
      </tr>
    </thead>
    <tbody>
      @foreach($exterior as $it)
        @php
          $k = $it['key'];
          $status = $examination->{$k} ?? '';
          // Mehrfachdetails (z. B. windshield_details[], windshield_details_other[])
          $d = $list($examination->{$k.'_details'} ?? ($examination->{$k.'_detail'} ?? []));
          $o = $list($examination->{$k.'_details_other'} ?? []);
          $combined = $combineDamages(is_array($d)?$d:[$d], $o);
        @endphp
        <tr>
          <td style="background:#e9f3ff">{{ $it['label'] }}</td>
          <td>{{ $statusLabel($status) }}</td>
          <td>
            @if($norm($status) === 'beschaedigt')
              @php $txt = $joinComma($combined); @endphp
              @if($txt !== '')
                {!! $WARN !!}{{ $txt }}
              @else
                {!! $WARN !!}Beschädigt (Details nicht angegeben)
              @endif
            @elseif($norm($status) === 'i.o.')
              Keine
            @elseif($norm($status) === 'nicht_vorhanden')
              —
            @else
              —
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- ===== Felgen pro Rad ===== --}}
  <p style="padding-top: 20px !important" class="ext-caption">Felgen</p>
  <table class="ext-table">
    <thead>
      <tr>
        <th class="ext-col-part">Position</th>
        <th class="ext-col-status">Zustand</th>
        <th class="ext-col-dmg">Schäden / Auffälligkeiten</th>
      </tr>
    </thead>
    <tbody>
      @foreach($rims as $i => $rim)
        @php
          // Daten aus verschachteltem Array/Objekt: rims.[i].status / details[] / details_other[]
          $base = $rim['path'];
          $status = data_get($examination, $base.'.status', '');
          $d = $list(data_get($examination, $base.'.details', []));
          $o = $list(data_get($examination, $base.'.details_other', []));
          // Legacy-Einzelwert unterstützen:
          if (!count($d)) {
            $one = data_get($examination, $base.'.detail', '');
            if ($one) { $d = [$one]; }
          }
          $combined = $combineDamages($d, $o);
        @endphp
        <tr>
          <td style="background:#e9f3ff">{{ $rim['label'] }}</td>
          <td>{{ $statusLabel($status) }}</td>
          <td>
           @if($norm($status) === 'beschaedigt')
              @php $txt = $joinComma($combined); @endphp
              @if($txt !== '')
                {!! $WARN !!}{{ $txt }}
              @else
                {!! $WARN !!}Beschädigt (Details nicht angegeben)
              @endif
            @elseif($norm($status) === 'i.o.')
              Keine
            @elseif($norm($status) === 'nicht_vorhanden')
              —
            @else
              —
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- ===== Mechanik / Unterboden ===== --}}

  <div class="card" style="page-break-before: always">
  <h2 class="section-title" style="padding-top: 25px !important;">Mechanik &amp; Unterboden</h2>
  <table class="ext-table">
    <thead>
      <tr>
        <th class="ext-col-part">Bauteil</th>
        <th class="ext-col-status">Zustand</th>
        <th class="ext-col-dmg">Schäden / Auffälligkeiten</th>
      </tr>
    </thead>
    <tbody>
      @foreach($mechanics as $it)
        @php
          $k = $it['key'];
          $status = $examination->{$k} ?? '';
          $d = $list($examination->{$k.'_details'} ?? ($examination->{$k.'_detail'} ?? []));
          $o = $list($examination->{$k.'_details_other'} ?? []);
          $combined = $combineDamages(is_array($d)?$d:[$d], $o);
        @endphp
        <tr>
          <td style="background:#e9f3ff">{{ $it['label'] }}</td>
          <td>{{ $statusLabel($status) }}</td>
          <td>
            @if($norm($status) === 'beschaedigt')
              @php $txt = $joinComma($combined); @endphp
              @if($txt !== '')
                {!! $WARN !!}{{ $txt }}
              @else
                {!! $WARN !!}Beschädigt (Details nicht angegeben)
              @endif
            @elseif($norm($status) === 'i.o.')
              Keine
            @elseif($norm($status) === 'nicht_vorhanden')
              —
            @else
              —
            @endif
          </td>
        </tr>
      @endforeach

      {{-- Kommentar Außenzustand (optional) --}}
      @php $overall = trim((string)($examination->external_overall_comment ?? '')); @endphp
      @if($overall !== '')
        <tr>
          <td style="background:#e9f3ff">Kommentar</td>
          <td colspan="2">{{ $overall }}</td>
        </tr>
      @endif
    </tbody>
  </table>
</div>
</div>

<!-- ABSCHNITT: TECHNIK (Tabellen-Darstellung) -->
@php
  // Mapping-Werte wie in der Eingabemaske
  $fluidsMap = [
    'i.O.'               => 'i.O.',
    'nicht_i.O.'         => 'Nicht i.O. / Wechsel fällig',
    'fuellstand_niedrig' => 'Füllstand zu niedrig',
    'nicht_vorhanden' => 'Nicht vorhanden',
    ''                   => '—',
  ];
  $engineBayMap = [
    'sauber'      => 'Sauber',
    'verschmutzt' => 'Verschmutzt',
    ''            => '—',
  ];

  // Werte aus $examination mit Fallback "—"
  $valOrDash = function($v){ $s = trim((string)($v ?? '')); return $s === '' ? '—' : $s; };

  $engine_oil   = $fluidsMap[$examination->engine_oil   ?? ''] ?? $valOrDash($examination->engine_oil   ?? '');
  $break_fluid  = $fluidsMap[$examination->break_fluid  ?? ''] ?? $valOrDash($examination->break_fluid  ?? '');
  $coolant      = $fluidsMap[$examination->coolant      ?? ''] ?? $valOrDash($examination->coolant      ?? '');
  $engine_bay   = $engineBayMap[$examination->general_engine_component ?? ''] ?? $valOrDash($examination->general_engine_component ?? '');

  $next_inspection = $valOrDash($examination->next_inspection ?? '');
  $next_oil_change = $valOrDash($examination->next_oil_change ?? '');

  $tech_comment = trim((string)($examination->technology_overall_comment ?? ''));
@endphp

<style>
  .tech-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
  .tech-table th, .tech-table td {
    border:1px solid #dbdbdbff;
    padding:6px 8px;
    font-size:14px;
    vertical-align:top;
    text-align:left;
  }
  .tech-table th { background:#e9f3ff; font-weight:700; }
  .tech-col-param { width:33%; }
  .tech-col-value { width:67%; }
</style>

<div class="card" style="page-break-before: always;padding-top: 25px !important;">
  <h2 class="section-title">Technik</h2>

  <table class="tech-table">
    <thead>
      <tr>
        <th class="tech-col-param">Parameter</th>
        <th class="tech-col-value">Zustand</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="background:#e9f3ff">Motoröl</td>
        <td>
          @if($engine_oil === 'Nicht i.O. / Wechsel fällig' || $engine_oil === 'Füllstand zu niedrig')
            {!! $WARN !!}
          @endif
          {{ $engine_oil }}
        </td>
      </tr>

      <tr>
        <td style="background:#e9f3ff">Bremsflüssigkeit</td>
        <td>
          @if($break_fluid === 'Nicht i.O. / Wechsel fällig' || $break_fluid === 'Füllstand zu niedrig')
            {!! $WARN !!}
          @endif
          {{ $break_fluid }}
        </td>
      </tr>

      <tr>
        <td style="background:#e9f3ff">Kühlflüssigkeit</td>
        <td>
          @if($coolant === 'Nicht i.O. / Wechsel fällig' || $coolant === 'Füllstand zu niedrig')
            {!! $WARN !!}
          @endif
          {{ $coolant }}
        </td>
      </tr>

      <tr>
        <td style="background:#e9f3ff">Motorraum Zustand generell</td>
        <td>
          @if($engine_bay === 'Verschmutzt')
            {!! $WARN !!}
          @endif
          {{ $engine_bay }}
        </td>
      </tr>

      @if($tech_comment !== '')
        <tr>
          <td style="background:#e9f3ff">Kommentar</td>
          <td>{{ $tech_comment }}</td>
        </tr>
      @endif
    </tbody>
  </table>
</div>

<div class="card" style="padding-top: 20px !important;">
  <h2 class="section-title">Service / Wartung</h2>
  <table class="simple-table two-col" style="width:100%; table-layout:fixed;">
    <tbody>
      <tr>
        <td style="width:33%; background:#e9f3ff;">Nächste Inspektion</td>
        <td style="width:67%;">{{ ($next_inspection ?? '') !== '' ? $next_inspection : '-' }}</td>
      </tr>
      <tr>
        <td style="width:33%; background:#e9f3ff;">Nächster Ölwechsel</td>
        <td style="width:67%;">{{ ($next_oil_change ?? '') !== '' ? $next_oil_change : '-' }}</td>
      </tr>
    </tbody>
  </table>
</div>




<!-- ABSCHNITT: PROBEFAHRT / PROBELAUF (Tabellen-Darstellung) -->
@php
  // Eingabewerte aus $examination
  $driveDone = (string)($examination->test_drive_done ?? '') === '1';
  $runDone   = (string)($examination->test_run_done   ?? '') === '1';

  // Punkte
  $driveItems = [
    ['label'=>'Anlasser',             'key'=>'td_starter'],
    ['label'=>'Motorlauf',            'key'=>'td_engine_run'],
    ['label'=>'Lenkung',              'key'=>'td_steering'],
    ['label'=>'Kupplung',             'key'=>'td_clutch'],
    ['label'=>'Getriebe',             'key'=>'td_transmission'],
    ['label'=>'Tacho',                'key'=>'td_speedometer'],
    ['label'=>'Bremsgefühl',          'key'=>'td_brake_feel'],
    ['label'=>'Auffällige Geräusche', 'key'=>'td_strange_noises'],
    ['label'=>'Steuerkette/Riemen',   'key'=>'td_timing'],
  ];
  $runItems = [
    ['label'=>'Anlasser',             'key'=>'tr_starter'],
    ['label'=>'Kupplung',             'key'=>'tr_clutch'],
    ['label'=>'Motorlauf',            'key'=>'tr_engine_run'],
    ['label'=>'Auffällige Geräusche', 'key'=>'tr_strange_noises'],
    ['label'=>'Steuerkette/Riemen',   'key'=>'tr_timing'],
  ];

  // Status-Label
  $statusLabel = function($v){
    $s = strtolower((string)$v);
    return match($s) {
      'i.o.'      => 'i.O.',
      'auffaellig'=> 'Auffällig',
      'nicht_vorhanden' => 'Nicht vorhanden',
      default     => ($v !== '' ? (string)$v : '—'),
    };
  };

  // Hilfen
  $get = fn($k)=> $examination->{$k} ?? '';
  $noteOrDash = fn($k)=> (trim((string)($examination->{$k} ?? '')) !== '') ? $examination->{$k} : '—';
@endphp

<style>
  .tdrive-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
  .tdrive-table th, .tdrive-table td {
    border:1px solid #dbdbdbff;
    padding:6px 8px;
    font-size:14px;
    vertical-align:top;
    text-align:left;
  }
  .tdrive-table th { background:#e9f3ff; font-weight:700; }
  /* Spaltenbreiten: Punkt / Status / Hinweis */
  .td-col-point  { width:33%; }
  .td-col-status { width:24%; }
  .td-col-note   { width:43%; }
</style>

<div class="card" style="padding-top: 20px !important;">
  <h2 class="section-title">Probelauf / Probefahrt</h2>

<table class="tdrive-table" style="margin-bottom:8px;">
    <tbody>
        @if($driveDone)
            {{-- Wenn Probefahrt Ja → nur Probefahrt anzeigen --}}
            <tr>
                <th class="td-col-point">Probefahrt durchgeführt?</th>
                <td colspan="2">Ja</td>
            </tr>
        @elseif($runDone && !$driveDone)
            {{-- Wenn Probelauf Ja und Probefahrt Nein → kombinierte Anzeige --}}
            <tr>
                <th class="td-col-point">Probelauf / -fahrt durchgeführt?</th>
                <td colspan="2">Ja</td>
            </tr>
        @else
            {{-- Wenn weder noch oder nur Nein → beide normal anzeigen --}}
            <tr>
                <th class="td-col-point">Probefahrt durchgeführt?</th>
                <td colspan="2">{{ (($examination->test_drive_done ?? '') !== '' ? 'Nein' : '—') }}</td>
            </tr>
            <tr>
                <th class="td-col-point">Probelauf durchgeführt?</th>
                <td colspan="2">{{ (($examination->test_run_done ?? '') !== '' ? 'Nein' : '—') }}</td>
            </tr>
        @endif
    </tbody>
</table>


  @if($driveDone)
    <table class="tdrive-table">
      <thead>
        <tr>
          <th class="td-col-point">Prüfpunkt</th>
          <th class="td-col-status">Status</th>
          <th class="td-col-note">Auffälligkeit / Hinweis</th>
        </tr>
      </thead>
      <tbody>
  @foreach($driveItems as $it)
    @php
      $st   = $get($it['key']);
      $note = $get($it['key'].'_note');
      $isA  = strtolower((string)$st) === 'auffaellig';
    @endphp
    <tr>
      <td style="background:#e9f3ff">{{ $it['label'] }}</td>
      <td>{{ $statusLabel($st) }}</td>
      <td>
        @if($isA)
          {!! $WARN !!}{{ $note !== '' ? $note : 'Auffälligkeit nicht beschrieben' }}
        @elseif(strtolower((string)$st) === 'i.o.')
          Keine
        @else
          —
        @endif
      </td>
    </tr>
  @endforeach
</tbody>

    </table>
  @endif

  @if($runDone)
    <table class="tdrive-table">
      <thead>
        <tr>
          <th class="td-col-point">Prüfpunkt</th>
          <th class="td-col-status">Status</th>
          <th class="td-col-note">Auffälligkeit / Hinweis</th>
        </tr>
      </thead>
      <tbody>
  @foreach($runItems as $it)
    @php
      $st   = $get($it['key']);
      $note = $get($it['key'].'_note');
      $isA  = strtolower((string)$st) === 'auffaellig';
    @endphp
    <tr>
      <td style="background:#e9f3ff">{{ $it['label'] }}</td>
      <td>{{ $statusLabel($st) }}</td>
      <td>
        @if($isA)
          {!! $WARN !!}{{ $note !== '' ? $note : 'Auffälligkeit nicht beschrieben' }}
        @elseif(strtolower((string)$st) === 'i.o.')
          Keine
        @else
          —
        @endif
      </td>
    </tr>
  @endforeach
</tbody>

    </table>
  @endif

  @php $tdComment = trim((string)($examination->test_drive_overall_comment ?? '')); @endphp
  @if($tdComment !== '')
    <table class="tdrive-table">
      <tbody>
        <tr>
          <th style="background:#e9f3ff" class="td-col-point">Kommentar</th>
          <td colspan="2">{{ $tdComment }}</td>
        </tr>
      </tbody>
    </table>
  @endif
</div>

<!-- ABSCHNITT: INNENRAUM (Tabellen-Darstellung) -->
@php
  // Labels (Bauteil -> Feldpräfix)
  $labels = [
    'seat_belts'         => 'Sicherheitsgurte',
    'steering_wheel'     => 'Lenkrad',
    'dashboard'          => 'Armatur',
    'air_conditioning'   => 'Klimaanlage',
    'heating_ventilation'=> 'Heizung/ Lüftung',
    'sunroof'            => 'Schiebedach / Cabrioverdeck',
    'controls'           => 'Bedienelemente',
    'window_lifters'     => 'Fensterheber',
    'rearview_mirror'    => 'Rückspiegel',
    'seats'              => 'Sitze',
    'glove_box'          => 'Handschuhfach',
    'radio'              => 'Radio',
    'floor'              => 'Boden',
    'paneling'           => 'Verkleidung',
    'headliner'          => 'Dachhimmel',
    'horn'               => 'Hupe',
    // "Geruch" wird separat am Ende behandelt (anderes Datenmodell)
  ];

  $statusMap = [
    'i.O.'            => 'i.O.',
    'beschädigt'      => 'Beschädigt / defekt',
    'nicht_vorhanden' => 'Nicht vorhanden',
  ];

  // Hilfsfunktionen
  $norm = function($v){
    $s = mb_strtolower((string)$v);
    $s = str_replace(['ä','ö','ü'], ['ae','oe','ue'], $s);
    return $s;
  };
  $statusLabel = function($v) use ($statusMap){
    if ($v === null || $v === '') return '—';
    return $statusMap[$v] ?? (string)$v;
  };
  $list = function($val){
    if ($val === null || $val === '') return [];
    if (is_array($val)) return array_values(array_filter($val, fn($x)=>(string)$x !== ''));
    return [(string)$val];
  };
  $combine = function(array $details, array $others){
    $out = [];
    $n = max(count($details), count($others));
    for ($i=0; $i<$n; $i++){
      $d = $details[$i] ?? '';
      $o = trim((string)($others[$i] ?? ''));
      if ($d === '' && $o === '') continue;
      if ($d === 'Sonstiges') {
        $out[] = $o !== '' ? "Sonstiges: ".$o : 'Sonstiges';
      } else {
        $out[] = $d;
      }
    }
    return $out;
  };
@endphp

<style>
  .interior-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
  .interior-table th, .interior-table td {
    border:1px solid #dbdbdbff;
    padding:6px 8px;
    font-size:14px;
    vertical-align:top;
    text-align:left;
  }
  .interior-table th { background:#e9f3ff; font-weight:700; }
  /* Spaltenbreiten: Bauteil / Status / Auffälligkeiten */
  .int-col-part   { width:33%; }
  .int-col-status { width:24%; }
  .int-col-dmg    { width:43%; }
  .interior-table ul { margin:0; padding-left:18px; }
  .interior-table li { margin:0 0 2px 0; }
</style>

<div class="card" style="page-break-before: always; padding-top: 25px !important;">
  <h2 class="section-title">Innenraum</h2>

  <table class="interior-table">
    <thead>
      <tr>
        <th class="int-col-part">Bauteil</th>
        <th class="int-col-status">Zustand</th>
        <th class="int-col-dmg">Beschädigungen / Auffälligkeiten</th>
      </tr>
    </thead>
    <tbody>
      @foreach($labels as $key => $title)
        @php
          // Felder: <key>, <key>_detail[] und <key>_detail_other[]
          $status = $examination->{$key} ?? '';
          $details = $list($examination->{$key.'_detail'} ?? []);
          $others  = $list($examination->{$key.'_detail_other'} ?? []);
          $combined = $combine($details, $others);
          $isDamaged = $norm($status) === 'beschaedigt';
        @endphp
        <tr>
          <td style="background:#e9f3ff">{{ $title }}</td>
          <td>{{ $statusLabel($status) }}</td>
          <td>
            @if($isDamaged)
            @php $txt = $joinComma($combined); @endphp
              @if($txt !== '')
                {!! $WARN !!}{{ $txt }}
              @else
                {!! $WARN !!}Beschädigt/defekt (Details nicht angegeben)
              @endif
            @elseif($norm($status) === 'i.o.')
              Keine
            @elseif($norm($status) === 'nicht_vorhanden')
              —
            @else
              —
            @endif
          </td>
        </tr>
      @endforeach

      {{-- Geruch (eigenes Feldschema) --}}
      @php
        $smellVal   = (string)($examination->smell ?? '');
        $smellOther = trim((string)($examination->smell_detail_other ?? ''));
        $smellShow  = $smellVal !== '' ? $smellVal : '—';
        if ($smellVal === 'Sonstiges' && $smellOther !== '') {
          $smellShow = "Sonstiges: ".$smellOther;
        }
      @endphp
    @php
  $smellOptions = [
    'i.O. / neutral',
    'Rauch',
    'Tiergeruch',
    'Feuchtigkeit / Schimmel',
    'Kraftstoff',
    'Öl / Kühlmittel',
    'Sonstiges'
  ];
@endphp

<tr>
  <td style="background:#e9f3ff">Geruch</td>
  <td>
    {{ $smellVal !== '' ? 'Erfasst' : '—' }}
  </td>
  <td>
    @if($smellVal !== '' && $smellVal !== 'i.O. / neutral')
      {!! $WARN !!}{{ $smellVal }}
    @elseif($smellVal === 'i.O. / neutral')
      {{ $smellVal }}
    @else
      —
    @endif
  </td>
</tr>



      {{-- Kommentar Innenraum (optional) --}}
      @php $ic = trim((string)($examination->interior_overall_comment ?? '')); @endphp
      @if($ic !== '')
        <tr>
          <td style="background:#e9f3ff">Kommentar</td>
          <td colspan="2">{{ $ic }}</td>
        </tr>
      @endif
    </tbody>
  </table>
</div>

<!-- ABSCHNITT: SONSTIGES & FAZIT (Tabellen-Darstellung, OHNE Status-Spalte) -->
@php
  // Helper
  $valOrDash = function($v){ $s = trim((string)($v ?? '')); return $s === '' ? '—' : $s; };

  // Daten aus $examination (mit Legacy-Fallbacks)
  $clusterStatus = $examination->error_in_instrument_cluster ?? '';
  $clusterNote   = trim((string)($examination->error_in_instrument_cluster_note ?? ''));

  $memoryStatus  = $examination->error_in_error_memory ?? '';
  $memoryNote    = trim((string)($examination->error_in_error_memory_note ?? ''));

  $accStatus     = $examination->known_accident_damage_status
                   ?? $examination->known_accident_damage
                   ?? '';
  $accNote       = trim((string)($examination->known_accident_damage_note ?? ''));

  $conclusion    = trim((string)($examination->conclusion ?? ''));
@endphp

<style>
  .misc-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
  .misc-table th, .misc-table td {
    border:1px solid #dbdbdbff;
    padding:6px 8px;
    font-size:14px;
    vertical-align:top;
    text-align:left;
    background:#fff;
    font-weight:400; /* Einträge nicht fett */
  }
  .misc-table th { background:#e9f3ff; font-weight:700; }
  /* 2 Spalten: 25% / 75% */
  .mis-col-topic  { width:33%; white-space:nowrap; }
  .mis-col-det    { width:67%; }
</style>

<div class="card" style="page-break-before: always;padding-top: 25px !important;">
  <h2 class="section-title">Sonstiges</h2>

  <table class="misc-table">
    <thead>
      <tr>
        <th class="mis-col-topic">Thema</th>
        <th class="mis-col-det">Beschreibung / Details</th>
      </tr>
    </thead>
    <tbody>
      {{-- Kombiinstrument --}}
      <tr>
        <td style="background:#e9f3ff">Fehler im Kombiinstrument</td>
        <td>
          @if($clusterStatus === 'Ja')
            {{ $clusterNote !== '' ? $clusterNote : 'Fehler vorhanden (ohne Beschreibung)' }}
          @elseif($clusterStatus === 'Nein')
            Keine
          @elseif($clusterStatus === '')
            —
          @else
            {{ $valOrDash($clusterStatus) }}@if($clusterNote !== '') — {{ $clusterNote }}@endif
          @endif
        </td>
      </tr>

      {{-- Fehlerspeicher --}}
      <tr>
        <td style="background:#e9f3ff">Fehler im Fehlerspeicher</td>
        <td>
          @if($memoryStatus === 'Ja')
            {{ $memoryNote !== '' ? $memoryNote : 'Fehler vorhanden (ohne Beschreibung)' }}
          @elseif($memoryStatus === 'Nein')
            Keine
          @elseif($memoryStatus === '')
            —
          @else
            {{ $valOrDash($memoryStatus) }}@if($memoryNote !== '') — {{ $memoryNote }}@endif
          @endif
        </td>
      </tr>

      {{-- Unfallschäden --}}
      <tr>
        <td style="background:#e9f3ff">Unfallschäden</td>
        <td>
          @if($accStatus === 'Kein Unfallwagen')
            Keine
          @elseif($accStatus !== '')
            {{ $accStatus }}: {{ $accNote !== '' ? $accNote : 'Details nicht angegeben' }}
          @else
            —
          @endif
        </td>
      </tr>
    </tbody>
  </table>
</div>

{{-- Fazit als eigene Tabelle --}}
@if($conclusion !== '')
  <div class="card" style="padding-top: 20px !important;">
    <h2 class="section-title">Fazit</h2>
    <table class="misc-table">
      <thead>
        <tr>
          <th>Fazit</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{!! nl2br(e($conclusion)) !!}</td>
        </tr>
      </tbody>
    </table>
  </div>
@endif



<!-- ABSCHNITT: FOTO-DOKUMENTATION (2 Bilder pro Zeile) -->
@php
  // Medien aufbereiten und in Bilder/Dokumente trennen
  $media = collect($images ?? [])->map(function($i){
      // Build everything from storage paths only to avoid symlink issues
      if (is_string($i)) {
          $url = $i; // expected: /storage/...
          $pathPart = ltrim(parse_url($url, PHP_URL_PATH) ?: '', '/');

          $ext = strtolower(pathinfo($rel ?: '', PATHINFO_EXTENSION));
          $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
          $src = storage_path('app/public/' . ltrim($rel, '/'));

          return (object) [
              'is_image' => $isImage,
              'url'    => asset('storage/' . ltrim($rel, '/')),
              'name'   => basename($rel ?: 'Dokument.pdf'),
              'src'    => $i->image,
              'type'   => $isImage ? 'image' : ($ext ?: 'document'),
          ];
      } else {
          // Model: raw relative storage path like 'examination-images/...'
          $raw = ltrim((string)($i->image ?? ''), '/');
          $rel = $raw !== '' ? $raw : ltrim(parse_url($i->image1 ?? '', PHP_URL_PATH) ?: '', '/');
          // If rel still contains leading 'storage/', strip it to get real storage path
          if (strpos($rel, 'storage/') === 0) { $rel = substr($rel, 8); }
          // Normalize potential legacy path without hyphen

          $ext = strtolower(pathinfo($rel ?: '', PATHINFO_EXTENSION));
          $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);

          return (object) [
              'is_image' => $isImage,
              'url'    => asset('storage/' . ltrim($rel, '/')),
              'name'   => basename($rel ?: 'Dokument.pdf'),
          'src'    => $i->image,
              'type'   => $i->document_type ?? ($isImage ? 'image' : ($ext ?: 'document')),
          ];
      }
  })->filter(function($m){ return !empty($m->url); })->values();

  $photos = $media->filter(function($m){ return $m->is_image; })->values();
  $docs = $media->filter(function($m){ return !$m->is_image; })->values();
@endphp

<div class="card" style="padding-top: 20px !important;">
  <h2 class="section-title">Fotodokumentation</h2>
  @php
    $fotoDocs = $docs->where('type', 'Fotodokumentation');
  @endphp

  @if($fotoDocs->isEmpty())
    <table class="simple-table" style="margin-bottom: 0;">
      <tbody>
        <tr><td>Keine Fotodokumentation vorhanden.</td></tr>
      </tbody>
    </table>
  @else
    <table class="simple-table" style="width: 100%; margin-bottom: 0;">
      <thead>
        <tr>
          <th style="width: 27%;">Dokumenttyp</th>
          <th style="width: 73%;">Link</th>
        </tr>
      </thead>
      <tbody>
        @foreach($fotoDocs as $d)
          <tr>
            <td style="background:#e9f3ff">
              {{ ucfirst($d->type ?? 'Fotodokumentation') }}
            </td>
            <td>
              <a href="{{ $d->url }}" target="_blank" rel="noopener">{{ $d->name }}</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div style="margin-top: 7px; font-size: 0.9em; color: #666; display: flex; align-items: center;">
      Klicke auf den Link der Fotodokumentation, um sie zu öffnen.
    </div>
  @endif
</div>


<div class="card" style="padding-top: 20px !important;">
  <h2 class="section-title">Zusätzliche Dokumente</h2>
  @php
    $otherDocs = $docs->where('type', '!=', 'Fotodokumentation');
  @endphp

  @if($otherDocs->isEmpty())
    <table class="simple-table" style="margin-bottom: 0;">
      <tbody>
        <tr><td>Keine Dokumente vorhanden.</td></tr>
      </tbody>
    </table>
  @else
    <table class="simple-table" style="width: 100%; margin-bottom: 0;">
      <thead>
        <tr>
          <th style="width: 27%;">Dokumenttyp</th>
          <th style="width: 73%;">Link</th>
        </tr>
      </thead>
      <tbody>
        @foreach($otherDocs as $d)
          <tr>
            <td style="background:#e9f3ff">
              {{ ucfirst($d->type ?? 'Document') }}
            </td>
            <td>
              <a href="{{ $d->url }}" target="_blank" rel="noopener">{{ $d->name }}</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div style="margin-top: 7px; font-size: 0.9em; color: #666; display: flex; align-items: center;">
      Klicke auf den Link des jeweiligen Dokuments, um es zu öffnen.
    </div>
  @endif
</div>




<style>
  .photos-table thead th { background:#e9f3ff; font-weight:700; }
  .photos-table .col-half { width:50%; }
  .photo-row { page-break-inside: avoid; }
  .photo-cell { padding:8px; vertical-align:top; }
  .photo-box { border:1px solid #dbdbdbff; border-radius:8px; overflow:hidden; background:#fff; }
  .photo-box img { display:block; width:100%; height:auto; }
</style>

{{--<div class="card" style="page-break-before: always; padding-top: 25px !important">--}}
{{--  <h2 class="section-title">Foto-Dokumentation</h2>--}}

{{--  @if($photos->isEmpty())--}}
{{--    <table class="simple-table photos-table">--}}
{{--      <thead>--}}
{{--        <tr>--}}
{{--          <th class="col-half">Foto</th>--}}
{{--          <th class="col-half">Foto</th>--}}
{{--        </tr>--}}
{{--      </thead>--}}
{{--      <tbody>--}}
{{--        <tr class="photo-row">--}}
{{--          <td class="photo-cell" colspan="2">Keine Fotos vorhanden / siehe Zusatzdatei (Fotodokumentation).</td>--}}
{{--        </tr>--}}
{{--      </tbody>--}}
{{--    </table>--}}
{{--  @else--}}
{{--    <table class="simple-table photos-table">--}}
{{--      <thead>--}}
{{--        <tr>--}}
{{--          <th class="col-half">Foto</th>--}}
{{--          <th class="col-half">Foto</th>--}}
{{--        </tr>--}}
{{--      </thead>--}}
{{--      <tbody>--}}

{{--        @foreach($photos->reverse()->chunk(2) as $pair)--}}
{{--          <tr class="photo-row">--}}
{{--              @foreach($pair as $m)--}}
{{--                  <td class="photo-cell">--}}


{{--                      @if($m)--}}
{{--                          <div class="photo-box">--}}
{{--                              <img src="{{public_path('storage/'. $m->src )}}" height="200px" alt="Foto">--}}
{{--                          </div>--}}
{{--                      @endif--}}
{{--                  </td>--}}
{{--              @endforeach--}}


{{--          </tr>--}}
{{--        @endforeach--}}
{{--      </tbody>--}}
{{--    </table>--}}
{{--  @endif--}}
{{--</div>--}}




</main>

</body>
</html>

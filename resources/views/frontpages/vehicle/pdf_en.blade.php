{{-- English PDF version: resources/views/frontpages/vehicle/pdf_en.blade.php --}}
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

  // Maps for EN labels from stored values
  $weatherMap = [
    'sonnig'           => 'Sunny',
    'leicht_bewoelkt'  => 'Partly cloudy',
    'bewoelkt'         => 'Cloudy',
    'regen'            => 'Rain',
    'starkregen'       => 'Heavy rain',
    'schnee'           => 'Snow/Ice',
    'nebel'            => 'Fog',
    'wind_sturm'       => 'Wind/Storm',
    'kunstlicht'       => 'Neutral (indoors / hall)',
  ];
  $lightingMap = [
    'hell'        => 'Bright (daylight)',
    'daemmerung'  => 'Dusk',
    'dunkel'      => 'Dark (night)',
    'kunstlicht'  => 'Artificial light (indoors / hall)',
  ];
  $boolMap = [
    'yes'        => 'Yes',
    'no'         => 'No',
    'partial'    => 'Partial',
    'restricted' => 'Restricted (e.g., garage, narrow access)',
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
  // Preserve order cost-calculation rows before local sections reuse `$damages`.
  $calcDamages = $damages ?? collect();
@endphp

@php
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

@php
  $formatKm = function ($value) {
      if ($value === null || $value === '') return '—';
      if (is_string($value)) {
          $digits = preg_replace('/[^\d]/', '', $value);
          if ($digits === '') return '—';
          $value = (int) $digits;
      }
      if (!is_numeric($value)) return '—';
      return number_format((int)$value, 0, ',', '.') . ' km';
  };

  $asList = function($val){
    if ($val === null || $val === '') return [];
    if (is_array($val)) {
      return array_values(array_filter(array_map(fn($x)=>trim((string)$x), $val), fn($x)=>$x!==''));
    }
    $s = trim((string)$val);
    return $s === '' ? [] : [$s];
  };

  $joinComma = function(array $items){
    $clean = array_values(array_filter(array_map(fn($x)=>trim((string)$x), $items), fn($x)=>$x!==''));
    return implode(', ', $clean);
  };

  // Translation for common German option labels (used in selects) → English
  $tr = function($s){
    static $map = [
      // Generic
      'Sonstiges' => 'Other',
      // Paint-thickness damages
      'Steinschlag' => 'Stone chip', 'Kratzer' => 'Scratch', 'Delle' => 'Dent', 'Deformation' => 'Deformation', 'Riss' => 'Crack',
      'Lackabplatzer' => 'Paint chips', 'Lackeinschlüsse' => 'Paint inclusions', 'Lackschlieren' => 'Paint streaks', 'Lackschaden' => 'Paint damage',
      'Polierrückstände' => 'Polishing residues', 'Rost' => 'Rust', 'Spachtelstellen' => 'Filler spots',
      'Spaltmaß abweichend' => 'Panel gap deviating', 'Kante beschädigt' => 'Edge damaged',
      // Exterior
      'Kratzer/Sichtbehinderung' => 'Scratches/visibility impairment', 'Dichtung undicht' => 'Seal leaking', 'Heizung ohne Funktion' => 'Heater inoperative',
      'Kratzer' => 'Scratch', 'Folie/Blendwirkung' => 'Tint/glare', 'Scheibe locker' => 'Pane loose', 'Wischblatt verschlissen' => 'Wiper blade worn',
      'Wasserförderung ohne Funktion' => 'Washer inoperative', 'Gestänge/Motor defekt' => 'Linkage/motor defective', 'Rubbeln/Schlieren' => 'Juddering/streaks',
      'Porös' => 'Brittle', 'Rissig' => 'Cracked', 'Undicht/Wassereintritt' => 'Leaking / water ingress', 'Lose' => 'Loose',
      'Sporadische Funktion' => 'Intermittent function', 'Tür verriegelt nicht' => 'Door does not lock', 'Heckklappe ohne Funktion' => 'Tailgate inoperative',
      'Aktuator/Schloss defekt' => 'Actuator/lock defective', 'Lose Befestigung' => 'Loose mounting', 'Halter gebrochen' => 'Holder broken', 'Verformt' => 'Deformed', 'Kratzer/Delle' => 'Scratches/dent',
      'Gehäuse gerissen' => 'Housing cracked', 'Glas beschädigt' => 'Glass damaged', 'Anklappfunktion defekt' => 'Folding function defective', 'Spiegelverstellung defekt' => 'Mirror adjustment defective', 'Blinker/Heizung defekt' => 'Indicator/heating defective',
      // Rims
      'Kratzer / Bordsteinschaden' => 'Scratch / curb damage', 'Verzogen/Verbeult' => 'Warped / dented', 'Korrosion' => 'Corrosion', 'Oxidation' => 'Oxidation',
      // Mechanics
      'Spiel vorhanden' => 'Play present', 'Gelenk defekt' => 'Joint defective', 'Lager ausgeschlagen' => 'Bearing worn', 'Verzogen' => 'Warped',
      'Undicht (Ölaustritt)' => 'Leaking (oil)', 'Wirkung unzureichend' => 'Insufficient effect', 'Unterschied links/rechts' => 'Left/right difference', 'Befestigung lose' => 'Mounting loose',
      'Gebrochen' => 'Broken', 'Setzung/Schiefstand' => 'Sagging/misalignment', 'Korrosion stark' => 'Heavy corrosion',
      'Verschleißgrenze erreicht' => 'Wear limit reached', 'Riefen' => 'Grooves', 'Untermaß' => 'Undersize', 'Schlag/Seitenschlag' => 'Runout/side runout',
      'Ungleichmäßiger Abrieb' => 'Uneven wear', 'Belag gelöst' => 'Lining loose', 'Quietsch-/Schleifgeräusch' => 'Squeak/grinding noise',
      'Undicht' => 'Leaking', 'Aufhängung defekt' => 'Hanger defective', 'Katalysator/DPF Problem' => 'Catalyst/DPF issue', 'Loch/Korrosion' => 'Hole/corrosion',
      'Ölfeucht' => 'Oil-moist', 'Ölleck deutlich' => 'Distinct oil leak', 'Dichtung defekt' => 'Seal defective', 'Simmerring defekt' => 'Oil seal defective',
      'Verformung/Schaden' => 'Deformation/damage', 'Unterbodenschutz beschädigt' => 'Underbody protection damaged', 'Leitungen beschädigt' => 'Lines damaged',
      'Elektrik/Leitung beschädigt' => 'Electrical/wiring damaged', 'Flüssigkeitsaustritt' => 'Fluid leak', 'Mechanisches Spiel' => 'Mechanical play', 'Akustische Auffälligkeit' => 'Acoustic anomaly',
      // Interior
      'Keine Kühlleistung' => 'No cooling performance', 'Gebläse defekt' => 'Blower defective', 'Geruchsentwicklung' => 'Odor development', 'Bedienung ohne Funktion' => 'Controls inoperative', 'Klappern' => 'Rattling',
      'Heizung ohne Leistung' => 'No heating performance', 'Klappensteuerung defekt' => 'Flap control defective', 'Mechanik klemmt' => 'Mechanism sticking', 'Motor defekt' => 'Motor defective', 'Kratzer/Glas' => 'Scratches/glass', 'Abläufe verstopft' => 'Drains clogged',
      'Abnutzungsspuren' => 'Signs of wear', 'Schalter klemmt' => 'Switch sticking', 'Taster ohne Funktion' => 'Button inoperative', 'Drehregler defekt' => 'Rotary control defective', 'Beleuchtung defekt' => 'Backlight defective',
      'Verriegelung defekt' => 'Latch defective', 'Gurt franst' => 'Belt frayed', 'Gurt strafft nicht' => 'Belt does not tension', 'Gurtaufroller defekt' => 'Belt retractor defective', 'Verschmutzt' => 'Soiled',
      'Riss/Bruch' => 'Crack/break', 'Verfärbung' => 'Discoloration', 'Anzeige defekt' => 'Display defective',
      'Fährt nicht' => 'Does not move', 'Langsam/ruckelnd' => 'Slow/jerky', 'Klemmt' => 'Sticking', 'Schalter defekt' => 'Switch defective',
      'Glas lose/gerissen' => 'Glass loose/cracked', 'Verstellung defekt' => 'Adjustment defective', 'Blendfunktion defekt' => 'Dimming function defective', 'Halter locker' => 'Bracket loose',
      'Polster Riss' => 'Upholstery tear', 'Flecken' => 'Stains', 'Naht offen' => 'Seam open', 'Verstellung defekt' => 'Adjustment defective', 'Sitzheizung defekt' => 'Seat heating defective',
      'Schloss defekt' => 'Lock defective', 'Scharnier gebrochen' => 'Hinge broken', 'Innenbeleuchtung defekt' => 'Interior light defective',
      'Kein Empfang' => 'No reception', 'Display defekt' => 'Display defective', 'Lautsprecher verzerren' => 'Speakers distorting', 'Bluetooth defekt' => 'Bluetooth defective',
      'Teppich verschlissen' => 'Carpet worn', 'Feuchtigkeit' => 'Moisture', 'Befestigung lose' => 'Fastening loose', 'Clip/Befestigung lose' => 'Clip/fastening loose', 'Bruch/Riss' => 'Break/crack',
      'Hängt durch' => 'Sagging', 'Wasserfleck' => 'Water stain', 'Ohne Funktion' => 'Not working', 'Taster defekt' => 'Button defective', 'Kontaktproblem' => 'Contact problem',
      // Smell options
      'i.O. / neutral' => 'OK / neutral', 'Rauch' => 'Smoke', 'Tiergeruch' => 'Animal smell', 'Feuchtigkeit / Schimmel' => 'Moisture / mold', 'Kraftstoff' => 'Fuel', 'Öl / Kühlmittel' => 'Oil / coolant',
    ];
    $s = (string)$s; return $map[$s] ?? $s;
  };
  $joinCommaTr = function(array $items) use ($tr, $joinComma){
    return $joinComma(array_map(fn($x)=>$tr($x), $items));
  };

  $WARN = '<span class="warn-badge" aria-label="Issue" title="Issue">!</span> ';

  $rowAlert = function(bool $cond){
    return $cond ? ' class="row-alert"' : '';
  };

  $renderFinding = function(bool $hasIssue, array $items = [], string $fallback = 'Damaged (details not provided)', string $noneText = 'None') use ($joinComma, $WARN){
    if (!$hasIssue) return $noneText;
    $txt = $joinComma($items);
    return $txt !== '' ? ($WARN.$txt) : ($WARN.$fallback);
  };

  $norm = function($v){
    $s = mb_strtolower((string)$v);
    return strtr($s, ['ä'=>'ae','ö'=>'oe','ü'=>'ue']);
  };
@endphp

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{ $brandName }} | {{ $report_no }}
</title> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
  .row-alert { outline: 2px solid #f59e0b; outline-offset: -2px; background: #fff7ed; }
  .warn-badge { display:inline-flex; align-items:center; justify-content:center; font-weight:700; font-size:10px; color:#92400e; background:#fde68a; border:1px solid #f59e0b; border-radius:50%; width:14px; height:14px; line-height:9px; text-align:center; margin-right:4px; vertical-align:middle; }
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
  .kv { margin: 2px 0; }
  .kv b { display:inline-block; min-width: 200px; }
  .kv span { padding-left: 10px; display:inline-block; }
</style>
<style>
  .card { border: 0 !important; box-shadow:none !important; background:transparent !important; padding:0 !important; margin:0 0 20px 0 !important; }
  .card > .section-title { margin:0 0 8px 0 !important; padding:0 !important; border-bottom:1px solid #dbdbdbff !important; }
  .simple-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
  .simple-table th, .simple-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:12px; vertical-align:top; text-align:left; }
  .simple-table thead th { background:#f3f4f6; font-weight:700; }
  .col-label { width:33%; } .col-value { width:67%; }
</style>

</head>
<body>

<header>
  <table class="hf-table" style="width:100%;">
    <tr>
      <td style="width:50%; text-align:left; vertical-align:middle;">
        <img src="{{ $logoPath }}" alt="{{ $brandName }} Logo" style="height:37px; display:block;">
      </td>
      <td style="width:50%; text-align:right; vertical-align:middle;">
        <!-- @if($usePartnerLogo)
        <small style="font-size: 12px; display:block;">Report No. IMP-{{ $report_no }}</small>
        @else
        <small style="font-size: 12px; display:block;">Report No. {{ $report_no }}</small>
        @endif -->
        <small style="font-size: 12px; display:block;">Report No. {{ $report_no }}</small>
        <small style="font-size: 12px; display:block;">Created: {{ $report_dt ?: '—' }}</small>
      </td>
    </tr>
  </table>
</header>

<footer>
  <table class="hf-table">
    <tr>
      <td style="width:60%; font-size: 12px">© {{ date('Y') }} – {{ $brandName }}</td>
      <td style="width:40%; text-align:right; font-size: 12px">Page <span class="page-num"></span></td>
    </tr>
  </table>
</footer>

<main class="wrap" style="margin-top: 10px;">

  <style>
    .simple-table { width:100%; border-collapse:collapse; margin-bottom:15px; }
    .simple-table th, .simple-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; text-align:left; background:#fff; font-weight:400; }
    .simple-table.three-col th:nth-child(1), .simple-table.three-col td:nth-child(1),
    .simple-table.three-col th:nth-child(2), .simple-table.three-col td:nth-child(2),
    .simple-table.three-col th:nth-child(3), .simple-table.three-col td:nth-child(3) { width:33.333%; }
    .simple-table .text-right { text-align:right; }
  </style>

  <div class="card">
    <h1 style="font-size: 15px; margin-bottom:15px; padding-top: 20px !important" class="section-title">Vehicle Inspection Report</h1>
    <table class="simple-table three-col">
      <thead>
        <tr>
          <th style="background:#e9f3ff;">Client</th>
          <th style="background:#e9f3ff;">Inspector</th>
          <th style="background:#e9f3ff;">Date</th>
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

  <!-- Inspection Conditions -->
  <div class="card" style="padding-top: 20px !important;">
    <h2 class="section-title">Inspection Conditions</h2>
    <table class="simple-table">
      <thead>
        <tr>
          <th class="col-label" style="background:#e9f3ff;">Criteria</th>
          <th class="col-value" style="background:#e9f3ff;">Value</th>
        </tr>
      </thead>
      <tbody>
        <tr><td style="background:#e9f3ff">Weather conditions</td><td>{{ $weather_label }}</td></tr>
        <tr><td style="background:#e9f3ff">Lighting conditions</td><td>{{ $lighting_label }}</td></tr>
        <tr><td style="background:#e9f3ff">Vehicle clean?</td><td>{{ $clean_label }}</td></tr>
        <tr><td style="background:#e9f3ff">Vehicle accessible?</td><td>{{ $access_label }}</td></tr>
      </tbody>
    </table>
  </div>

@php
  $valueTranslations = [
    'transmission' => [
      'Automatik' => 'Automatic',
      'Manuell'   => 'Manual',
      'Schaltgetriebe' => 'Manual',
    ],
    'fuel' => [
      'Benzin'  => 'Petrol',
      'Diesel'  => 'Diesel',
      'Hybrid'  => 'Hybrid',
      'Elektro' => 'Electric',
    ],
    'type' => [
      'Limousine' => 'Sedan',
      'Kombi'     => 'Station wagon',
      'SUV'       => 'SUV',
      'Coupe'     => 'Coupe',
      'Cabrio'    => 'Convertible',
      'Van'       => 'Van',
      'Kleinwagen'    => 'Small Car',
    ],
  ];

  // renamed to avoid collision with existing $tr / $trn
  $trValue = function ($field = null, $value = null) use ($valueTranslations) {
    if ($value === null) return '—';
    $v = trim((string)$value);
    if ($v === '' || $v === '—') return '—';
    if (!$field) return $v;

    return $valueTranslations[$field][$v] ?? $v;
  };
@endphp



  @php
    if (!isset($formatKm)) {
      $formatKm = function($km) {
        if ($km === null || $km === '') return '—';
        $n = preg_replace('/[^\d]/', '', (string)$km);
        if ($n === '') return '—';
        return number_format((int)$n, 0, ',', '.') . ' km';
      };
    }

     $rows = [
    ['Manufacturer',       $examination->manufacturer ?? $veh->make ?? '—'],
    ['VIN',                isset($examination->fin) ? strtoupper($examination->fin) : (isset($veh->vin) ? strtoupper($veh->vin) : '—')],
    ['Model',              $examination->model ?? $veh->model ?? '—'],

['Type',         $trValue('type', $examination->body_type ?? '—')],
['Transmission', $trValue('transmission', $examination->transmission ?? $veh->transmission ?? '—')],

    ['First Registration', $examination->first_registration ?? '—'],
    ['Fuel',         $trValue('fuel', $examination->fuel ?? $veh->fuel ?? '—')],

    ['Color',              $examination->color ?? '—'],
    ['Engine',             $examination->engine_displacement ?? '—'],
    ['No. Doors',          $examination->doors ?? '—'],
    ['Power',              $examination->power ?? '—'],
    ['Next HU',            $examination->next_hu ?? '—'],
    ['Mileage',            $formatKm($examination->km_reading ?? $veh->mileage ?? null)],
    ['Emission class',     $examination->emission_class ?? '—'],
  ];
    if (($examination->previous_owners ?? '') !== '') {
      $rows[] = ['Previous owners', $examination->previous_owners];
    }
  @endphp

  @php
    // Translation record (1:1) may hold EN fields
    $trn = $examination->translation ?? null;
    $pick = function($enValue, $deValue) { $e = trim((string)($enValue ?? '')); return $e !== '' ? $e : $deValue; };
  @endphp

  <div class="card" style="page-break-after: always; padding-top: 25px !important;">
    <h2 class="section-title">Vehicle Data</h2>
    @php
      $labelColStyle = 'width:21% !important; background:#e9f3ff';
      $valueColStyle = 'width:29% !important';
    @endphp
    <table class="simple-table four-col" style="width:100%; border-collapse:collapse; table-layout:fixed;">
      <thead>
        <tr>
          <th style="{{ $labelColStyle }}">Parameter</th>
          <th style="background:#e9f3ff; {{ $valueColStyle }}">Value</th>
          <th style="{{ $labelColStyle }}">Parameter</th>
          <th style="background:#e9f3ff; {{ $valueColStyle }}">Value</th>
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

  @php
    $standardEquip = trim((string)($pick($trn->serienausstattung_en ?? null, $examination->serienausstattung ?? '')));
    $optionalEquip = trim((string)($pick($trn->sonderausstattung_en ?? null, $examination->sonderausstattung ?? '')));
  @endphp

  @if($standardEquip !== '')
    <div class="card" style="padding-top: 25px !important">
      <h2 class="section-title">Standard Equipment</h2>
      <div>{!! nl2br(e($standardEquip)) !!}</div>
    </div>
  @endif

  @if($optionalEquip !== '')
    <div class="card" style="page-break-after: always; padding-top: 15px !important;">
      <h2 class="section-title">Optional Equipment</h2>
      <div>{!! nl2br(e($optionalEquip)) !!}</div>
    </div>
  @endif

  @php
    $ynMap = ['yes' => 'Available', 'no' => 'Not available / not provided'];
    $serviceTypeMap = ['paper' => 'Paper', 'digital' => 'Digital', 'none' => 'Not available / not provided'];
    $maintainedMap = ['yes' => 'Yes', 'no' => 'No', 'partial' => 'Partial'];

    $permitsVal = $examination->permits ?? '';
    $permitsLabel = $ynMap[$permitsVal] ?? ($permitsVal ?: '—');
    $permitsDetails = trim((string)($examination->permits_details ?? ''));

    $registration_certificate = $ynMap[$examination->registration_certificate ?? ''] ?? (($examination->registration_certificate ?? '') ?: '—');
    $vehicle_title            = $ynMap[$examination->vehicle_title ?? ''] ?? (($examination->vehicle_title ?? '') ?: '—');
    $owner_manual             = $ynMap[$examination->owner_manual ?? ''] ?? (($examination->owner_manual ?? '') ?: '—');
    $hu_au_report             = $ynMap[$examination->hu_au_report ?? ''] ?? (($examination->hu_au_report ?? '') ?: '—');

    $service_book_type        = $serviceTypeMap[$examination->service_book_type ?? ''] ?? (($examination->service_book_type ?? '') ?: '—');
    $service_book_maintained  = $maintainedMap[$examination->service_book_maintained ?? ''] ?? (($examination->service_book_maintained ?? '') ?: '—');
    $service_book_details     = trim((string)($pick($trn->service_book_details_en ?? null, $examination->service_book_details ?? '')));
  @endphp

  <div class="card" style="page-break-after: always; padding-top: 25px !important;">
    <h2 class="section-title">Vehicle Documents</h2>
    <table class="simple-table">
      <thead>
        <tr >
          <th class="col-label" style="background:#e9f3ff;">Document</th>
          <th class="col-value" style="background:#e9f3ff;">Value / Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="background:#e9f3ff">Approvals</td>
          <td>{{ $permitsLabel }}</td>
        </tr>
        @if(($examination->permits ?? '') === 'yes' && $permitsDetails !== '')
          <tr>
            <td style="background:#e9f3ff">Approvals (details)</td>
            <td>{{ $permitsDetails }}</td>
          </tr>
        @endif
        <tr><td style="background:#e9f3ff">Registration certificate</td><td>{{ $registration_certificate }}</td></tr>
        <tr><td style="background:#e9f3ff">Vehicle title</td><td>{{ $vehicle_title }}</td></tr>
        <tr><td style="background:#e9f3ff">Owner’s manual</td><td>{{ $owner_manual }}</td></tr>
        <tr><td style="background:#e9f3ff">Inspection report (HU/AU)</td><td>{{ $hu_au_report }}</td></tr>
        <tr><td style="background:#e9f3ff">Service book (type)</td><td>{{ $service_book_type }}</td></tr>
        <tr>
          <td style="background:#e9f3ff">Service book maintained?</td>
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

  @php
  $tireTypeTranslations = [
    'Sommer' => 'Summer',
    'Winter' => 'Winter',
    'Ganzjahresreifen' => 'All-season',
  ];

  $trTireType = function ($value = null) use ($tireTypeTranslations) {
    if ($value === null) return null;
    $v = trim((string)$value);
    if ($v === '') return null;

    return $tireTypeTranslations[$v] ?? $v;
  };
@endphp


  {{-- Tires --}}
  @php
    $tiresRaw = $examination->tires ?? [];
    $tiresArr = is_array($tiresRaw) ? $tiresRaw : (array)$tiresRaw;
    $tires = [];
    foreach ($tiresArr as $t) { $tires[] = is_array($t) ? (object)$t : $t; }

    $bySet = [];
    foreach ($tires as $t) {
      $setNo = (int)($t->set ?? 1);
      $bySet[$setNo][] = $t;
    }

    $posOrder = ['VL','VR','HL','HR'];
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
    $rowsForSet = function($list) use ($posOrder, $fmtSize, $fmtProfile, $trTireType) {
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
          'type'         => $t ? $trTireType($t->type ?? null) : null,
          'size'         => $t ? $fmtSize($t) : '—',
          'profile'      => $t ? $fmtProfile($t->tire_profile ?? '') : '—',
          'dot'          => $t ? trim((string)($t->tire_dot ?? '')) : '',
        ];
      }
      return $rows;
    };

    $extraVal  = (string)($examination->tire_extra ?? '');
    $extraSize   = trim((string)($examination->tire_extra_size ?? ''));
    $extraExpiry = trim((string)($examination->tire_repair_expiry ?? ''));
  @endphp

  <style>
    .tire-table { width:100%; border-collapse: collapse; margin-bottom:12px; }
    .tire-table th, .tire-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; text-align:left; background:#fff; font-weight:400; }
    .tire-table th { background:#e9f3ff; font-weight:700; }
    .set-title { font-weight:700; margin: 6px 0; }
    .sep { color:#64748b; padding:0 4px; }
  </style>

  <div class="card tire-section" style="page-break-after: always; padding-top: 25px !important;">
    <h2 class="section-title">Tires</h2>

    @if(!empty($bySet[1]))
      @php $rows = $rowsForSet($bySet[1]); @endphp
      <p class="set-title">Tire set 1</p>
      <table class="tire-table">
        <thead>
          <tr>
            <th style="width:11%;">Pos.</th>
            <th style="width:22%;">Manufacturer</th>
            <th style="width:22%;">Type</th>
            <th style="width:22%;">Size</th>
            <th style="width:23%;">Tread / DOT</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rows as $r)
            <tr>
          @php $posMap = ['VL'=>'FL','VR'=>'FR','HL'=>'RL','HR'=>'RR']; @endphp
          <td style="background:#e9f3ff">{{ $posMap[$r['position']] ?? $r['position'] }}</td>
              <td>{{ $r['manufacturer'] ?: '—' }}</td>
              <td>{{ $r['type'] ?: '—' }}</td>
              <td>{{ $r['size'] }}</td>
              <td>
                @php
                  $dotYear = null; $dotWeek = null;
                  if (!empty($r['dot']) && preg_match('/(\d{2})(\d{2})$/', $r['dot'], $m)) {
                      $dotWeek = (int)$m[1];
                      $dotYear = (int)$m[2] + 2000;
                  }
                  $isDotAlt = $dotYear && $dotYear <= (date('Y') - 6);
                @endphp
                @if((float)$r['profile'] < 3 || $isDotAlt)
                  {!! $WARN !!}
                @endif
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

    @php $rows2 = $rowsForSet($bySet[2] ?? []); @endphp
    <p style="padding-top: 25px !important" class="set-title">Tire set 2</p>
    <table class="tire-table">
      <thead>
        <tr>
          <th style="width:11%;">Pos.</th>
          <th style="width:22%;">Manufacturer</th>
          <th style="width:22%;">Type</th>
          <th style="width:22%;">Size</th>
          <th style="width:23%;">Tread / DOT</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rows2 as $r)
          <tr>
        @php $posMap = ['VL'=>'FL','VR'=>'FR','HL'=>'RL','HR'=>'RR']; @endphp
        <td style="background:#e9f3ff">{{ $posMap[$r['position']] ?? $r['position'] }}</td>
            <td>{{ $r['manufacturer'] ?: '—' }}</td>
            <td>{{ $r['type'] ?: '—' }}</td>
            <td>{{ $r['size'] }}</td>
            <td>
              @php
                $dotYear = null; $dotWeek = null;
                if (!empty($r['dot']) && preg_match('/(\d{2})(\d{2})$/', $r['dot'], $m)) {
                    $dotWeek = (int)$m[1];
                    $dotYear = (int)$m[2] + 2000;
                }
                $isDotAlt = $dotYear && $dotYear <= (date('Y') - 6);
              @endphp
              @if((float)$r['profile'] < 3 || $isDotAlt)
                <!-- {!! $WARN !!} -->
              @endif
              {{ $r['profile'] }}
              @if(!empty($r['dot']))
                <span class="sep">/</span> {{ $r['dot'] }}
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    @if($extraVal === 'spare' || $extraVal === 'repair_kit')
      <p style="padding-top: 25px !important" class="set-title">Extra</p>
      <table class="simple-table two-col" style="width:100%; table-layout:fixed; border-collapse:collapse;">
        <tbody>
          <tr>
            <td style="width:20% !important; background:#e9f3ff; white-space:nowrap;">Extra</td>
            <td style="width:80% !important; word-break:break-word;">
              @if($extraVal === 'spare')
                Spare wheel present
              @elseif($extraVal === 'repair_kit')
                Tire repair kit present
              @endif
            </td>
          </tr>
          @if($extraVal === 'spare')
            <tr>
              <td style="width:20% !important; background:#e9f3ff; white-space:nowrap;">Size / Tread</td>
              <td style="width:80% !important; word-break:break-word;">{{ $extraSize !== '' ? $extraSize : '—' }}</td>
            </tr>
          @elseif($extraVal === 'repair_kit')
            <tr>
              <td style="width:20% !important; background:#e9f3ff; white-space:nowrap;">Expiry date</td>
              <td style="width:80% !important; word-break:break-word;">{{ $extraExpiry !== '' ? $extraExpiry : '—' }}</td>
            </tr>
          @endif
        </tbody>
      </table>
    @endif

    @php $tiresComment = trim((string)($pick($trn->vehicle_tires_comment_en ?? null, $examination->vehicle_tires_comment ?? ''))); @endphp
    @if($tiresComment !== '')
      <table class="simple-table two-col" style="margin-top: 8px;">
        <tbody>
          <tr>
            <td style="background:#e9f3ff; width:20%;">Comment</td>
            <td style="width:80%;">{!! nl2br(e($tiresComment)) !!}</td>
          </tr>
        </tbody>
      </table>
    @endif
  </div>

  {{-- Paint thickness & condition (condensed EN labels) --}}
  @php
    $parts = [
      ['label' => 'Hood',                     'key' => 'bonnet'],
      ['label' => 'Fender FL',                'key' => 'fender_vl'],
      ['label' => 'Fender FR',                'key' => 'fender_vr'],
      ['label' => 'Door FL',                  'key' => 'door_vl'],
      ['label' => 'Door RL',                  'key' => 'door_hl'],
      ['label' => 'Door FR',                  'key' => 'door_vr'],
      ['label' => 'Door RR',                  'key' => 'door_hr'],
      ['label' => 'Sidewall RL',         'key' => 'quarter_hl'],
      ['label' => 'Sidewall RR',         'key' => 'quarter_hr'],
      ['label' => 'Roof',                     'key' => 'roof'],
      ['label' => 'Tailgate',                 'key' => 'tailgate'],
    ];

    $statusMsg = [
      'messbar'         => 'Part present & measurable',
      'nicht_messbar'   => 'Not measurable',
      'nicht_vorhanden' => 'Not present',
    ];
    $yn = ['yes' => 'Yes', 'no' => 'No'];

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
    .paint-table th, .paint-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; text-align:left; background:#fff; font-weight:400; }
    .paint-table th { background:#e9f3ff; font-weight:700; }
    .paint-col-part{ width:21%; } .paint-col-thick{ width:23%; } .paint-col-rep{ width:18%; } .paint-col-dmg{ width:38%; }
    .paint-table ul { margin:0; padding-left:18px; } .paint-table li { margin:0 0 2px 0; }
  </style>

  <div class="card" style="padding-top: 25px !important;">
    <h2 class="section-title">Paint Thickness &amp; Condition</h2>
    <table class="paint-table">
      <thead>
        <tr>
          <th class="paint-col-part">Component</th>
          <th class="paint-col-thick">Paint layer thickness (µm)</th>
          <th class="paint-col-rep">Repainted?</th>
          <th class="paint-col-dmg">Damages / Findings</th>
        </tr>
      </thead>
      <tbody>
        @foreach($parts as $p)
          @php
            $k = $p['key'];
            $status     = $examination->{$k.'_thickness_status'} ?? '';
            $thickness  = $examination->{$k.'_paint_layer_thickness'} ?? '';
            $repainted  = $examination->{$k.'_repainted'} ?? '';
            $anyDamage  = $examination->{$k.'_any_damage'} ?? '';
            $damages    = $normalizeList($examination->{$k.'_damages'} ?? []);
            $damagesEnMap = is_array($trn->paint_damages_en ?? null) ? ($trn->paint_damages_en ?? []) : [];
            $damagesEn = (array) ($damagesEnMap[$k] ?? []);
            $damages    = array_values(array_filter($damages, function($v){ $s = trim((string)$v); return $s !== '' && mb_strtolower($s) !== 'sonstiges'; }));
            $isMeasurable   = ($status === 'messbar');
            $isNotPresent   = ($status === 'nicht_vorhanden');
            $repaintedText  = $yn[$repainted] ?? ($repainted !== '' ? $repainted : '—');
            $isRepaintedYes = $isMeasurable && (mb_strtolower(trim($repaintedText)) === 'yes');
          @endphp
          <tr>
            <td style="background:#e9f3ff">{{ $p['label'] }}</td>
            <td>
              @if($isMeasurable)
                @php
                  $s = trim($thickness);
                  if (is_numeric(str_replace(',', '.', $s))) {
                      $s = number_format((float)str_replace(',', '.', $s), 2, ',', '');
                      $s = preg_replace('/,0+$/', '', $s);
                  }
                @endphp
                @if($isRepaintedYes){!! $WARN !!}@endif
                {{ $s }} µm
              @elseif(isset($statusMsg[$status]))
                {{ $statusMsg[$status] }}
              @else
                —
              @endif
            </td>
            <td>
              @if($isMeasurable)
                {{ $repaintedText }}
              @else
                —
              @endif
            </td>
            <td>
              @if($isNotPresent)
                —
              @else
                @if($anyDamage === 'yes')
            @php $txt = !empty($damagesEn) ? $joinComma($damagesEn) : $joinCommaTr($damages); @endphp
                  @if($txt !== '')
                    {!! $WARN !!}{{ $txt }}
                  @else
                    {!! $WARN !!}Damages present
                  @endif
                @elseif($anyDamage === 'no')
                  None
                @else
                  —
                @endif
              @endif
            </td>
          </tr>
        @endforeach

        @php $paintComment = trim((string)($pick($trn->paint_general_comment_en ?? null, $examination->paint_general_comment ?? ''))); @endphp
        @if($paintComment !== '')
          <tr>
            <td style="background:#e9f3ff">Comment</td>
            <td colspan="3">{{ $paintComment }}</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>

  {{-- Bodywork --}}
  @php
    $parts = [
      ['label' => 'Front bumper',  'key' => 'front_bumper'],
      ['label' => 'Rear bumper',   'key' => 'rear_bumper'],
      ['label' => 'Grill',        'key' => 'grill'],
      ['label' => 'Sill left',     'key' => 'sill_left'],
      ['label' => 'Sill right',    'key' => 'sill_right'],
    ];
    $normalizeDamages = function($val){ if ($val === null || $val === '') return []; if (is_array($val)) return $val; return [(string)$val]; };
    $stateFromHas = function($has){ if ($has === 'yes') return 'Damaged'; if ($has === 'no') return 'OK'; return '—'; };
  @endphp
  <style>
    .body-table { width:100%; border-collapse: collapse; margin-bottom:12px; }
    .body-table th, .body-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; text-align:left; background:#fff; font-weight:400; }
    .body-table th { background:#e9f3ff; font-weight:700; }
    .body-table .col-part{ width:33%; white-space:nowrap; } .body-table .col-state{ width:24%; } .body-table .col-find{ width:43%; }
  </style>
  <div class="card body-section" style="page-break-after: always; padding-top: 25px !important;">
    <h2 class="section-title">Bodywork</h2>
    <table class="body-table">
      <thead>
        <tr>
          <th class="col-part">Component</th>
          <th class="col-state">Condition</th>
          <th class="col-find">Damages / Findings</th>
        </tr>
      </thead>
      <tbody>
        @foreach($parts as $p)
          @php
            $k   = $p['key'];
            $has = $examination->{$k} ?? '';
            $stateText = $stateFromHas($has);
            $dmgKey  = $k . '_damage';
            $damages = array_values(array_filter($normalizeDamages($examination->{$dmgKey} ?? []), fn($v)=> (string)$v !== ''));
          @endphp
          <tr>
            <td style="background:#e9f3ff">{{ $p['label'] }}</td>
            <td>{{ $stateText }}</td>
            <td>
              @if($has === 'no')
                None
              @elseif($has === 'yes')
                @php $txt = $joinCommaTr($damages); @endphp
                @if($txt !== '')
                  {!! $WARN !!}{{ $txt }}
                @else
                  {!! $WARN !!}Damaged (details not provided)
                @endif
              @else
                —
              @endif
            </td>
          </tr>
        @endforeach

        @php $gap = $examination->are_gap_ok ?? ''; $gapState = $gap === 'yes' ? 'OK' : ($gap === 'no' ? 'Deviating' : '—'); @endphp
        <tr>
          <td style="background:#e9f3ff">Panel gaps</td>
          <td>{{ $gapState }}</td>
          <td>
            @if($gap === 'no')
              {!! $WARN !!}Deviations detected
            @elseif($gap === 'yes')
              None
            @else
              —
            @endif
          </td>
        </tr>

        @php $bodyComment = trim((string)($pick($trn->body_general_comment_en ?? null, $examination->body_general_comment ?? ''))); @endphp
        @if($bodyComment !== '')
          <tr>
            <td style="background:#e9f3ff">Comment</td>
            <td colspan="2">{{ $bodyComment }}</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>

  {{-- Lighting (moved below Bodywork to match DE) --}}
  @php
    $items = [
      ['label' => 'Headlights',            'key' => 'headlights'],
      ['label' => 'Rear lights',           'key' => 'rear_lights'],
      ['label' => 'Brake light',           'key' => 'brake_light'],
      ['label' => 'Reverse light',         'key' => 'reverse_light'],
      ['label' => 'Indicators',            'key' => 'indicator'],
      ['label' => 'Hazard warning lights', 'key' => 'hazard_lights'],
      ['label' => 'Fog lights',            'key' => 'fog_lights'],
      ['label' => 'Low beam',              'key' => 'low_beam'],
      ['label' => 'Interior lighting',     'key' => 'interior_light'],
      ['label' => 'Daytime running light', 'key' => 'daytime_running_light'],
    ];

    $norm = function($v){
      $s = mb_strtolower((string)$v);
      $s = str_replace(['ä','ö','ü'], ['ae','oe','ue'], $s);
      return $s;
    };
    $statusLabel = function($v) use ($norm){
      $s = $norm($v);
      return match($s) {
        'funktioniert'    => 'OK',
        'defekt'          => 'Faulty',
        'beschaedigt'     => 'Damaged',
        'nicht_vorhanden' => 'Not present',
        default           => ($v !== '' ? (string)$v : '—'),
      };
    };

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
          $out[] = $o !== '' ? "Other: ".$o : 'Other';
        } else {
          $out[] = $d;
        }
      }
      return $out;
    };
  @endphp

  <style>
    .lights-table { width:100%; border-collapse: collapse; margin-bottom:12px; }
    .lights-table th, .lights-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; }
    .lights-table th { background:#e9f3ff; font-weight:700; text-align:left; }
    .lt-col-part{ width:33%; } .lt-col-status{ width:24%; } .lt-col-dmg{ width:43%; }
  </style>

  <div class="card" style="page-break-after: always; padding-top: 25px !important;">
    <h2 class="section-title">Lighting</h2>
    <table class="lights-table">
      <thead>
        <tr>
          <th class="lt-col-part">Component</th>
          <th class="lt-col-status">Function</th>
          <th class="lt-col-dmg">Damages / Findings</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $it)
          @php
            $k = $it['key'];
            $status = $examination->{$k} ?? '';
            $dmgList   = $normalizeList($examination->{$k.'_damages'} ?? []);
            $otherList = $normalizeList(($trn?->{$k.'_damages_other_en'} ?? null) ?? ($examination->{$k.'_damages_other'} ?? []));
            $combined  = $combineDamages($dmgList, $otherList);
            $isDamaged = $norm($status) === 'beschaedigt';
          @endphp
          <tr>
            <td style="background:#e9f3ff">{{ $it['label'] }}</td>
            <td>{{ $statusLabel($status) }}</td>
            <td>
              @if($isDamaged)
                @php $txt = $joinCommaTr($combined); @endphp
                @if($txt !== '')
                  {!! $WARN !!}{{ $txt }}
                @else
                  {!! $WARN !!}Damaged (details not provided)
                @endif
              @elseif($norm($status) === 'defekt')
                {!! $WARN !!}Faulty / not functioning
              @elseif($norm($status) === 'funktioniert')
                None
              @elseif($norm($status) === 'nicht_vorhanden')
                —
              @else
                —
              @endif
            </td>
          </tr>
        @endforeach

        @php $lc = trim((string)($pick($trn->lights_comment_en ?? null, $examination->lights_comment ?? ''))); @endphp
        @if($lc !== '')
          <tr>
            <td style="background:#e9f3ff">Comment</td>
            <td colspan="2">{{ $lc }}</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>

  {{-- Exterior condition, rims, mechanics --}}
  @php
    $statusMap = [ 'i.O.' => 'OK', 'beschädigt' => 'Damaged', 'nicht_vorhanden' => 'Not present' ];
    $exterior = [
      ['label' => 'Windshield',            'key' => 'windshield'],
      ['label' => 'Window glazing',        'key' => 'window_glazing'],
      ['label' => 'Wipers',                'key' => 'wipers'],
      ['label' => 'Seals',                 'key' => 'seals'],
      ['label' => 'Central locking',       'key' => 'central_locking'],
      ['label' => 'Attachments',           'key' => 'attachments'],
      ['label' => 'Exterior mirrors',      'key' => 'exterior_mirrors'],
    ];
    $mechanics = [
      ['label' => 'Suspension',                    'key' => 'suspension'],
      ['label' => 'Shock absorbers',               'key' => 'shock_absorbers'],
      ['label' => 'Springs',                       'key' => 'springs'],
      ['label' => 'Brake discs',                   'key' => 'brake_discs'],
      ['label' => 'Brake pads',                    'key' => 'brake_pads'],
      ['label' => 'Exhaust system',                'key' => 'exhaust_system'],
      ['label' => 'Engine oil tightness',          'key' => 'engine_oil_tightness'],
      ['label' => 'Gearbox oil tightness',         'key' => 'gearbox_oil_tightness'],
      ['label' => 'Differential oil tightness',    'key' => 'differential_oil_tightness'],
      ['label' => 'Underbody condition (general)', 'key' => 'underbody_condition'],
      ['label' => 'Other findings',                'key' => 'other_findings'],
    ];
    $rims = [
      ['label' => 'Rim FL', 'path' => 'rims.0'],
      ['label' => 'Rim FR', 'path' => 'rims.1'],
      ['label' => 'Rim RL', 'path' => 'rims.2'],
      ['label' => 'Rim RR', 'path' => 'rims.3'],
    ];
    $norm = function($v){ $s = mb_strtolower((string)$v); $s = str_replace(['ä','ö','ü'], ['ae','oe','ue'], $s); return $s; };
    $statusLabel = function($v) use ($statusMap){ if ($v === null || $v === '') return '—'; return $statusMap[$v] ?? (string)$v; };
    $list = function($val){ if ($val === null || $val === '') return []; if (is_array($val)) return array_values(array_filter($val, fn($x)=>(string)$x !== '')); return [(string)$val]; };
    $combineDamages = function($damages, $others){ $out = []; $n = max(count($damages), count($others)); for ($i=0; $i<$n; $i++){ $d = $damages[$i] ?? ''; $o = trim((string)($others[$i] ?? '')); if ($d === '' && $o === '') continue; if ($d === 'Sonstiges') { $out[] = $o !== '' ? 'Other: '.$o : 'Other'; } else { $out[] = $d; } } return $out; };
  @endphp

  <style>
    .ext-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
    .ext-table th, .ext-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; }
    .ext-table th { background:#e9f3ff; font-weight:700; text-align:left; }
    .ext-col-part{ width:33%; } .ext-col-status{ width:24%; } .ext-col-dmg{ width:43%; }
    .ext-caption { font-weight:700; margin:6px 0; }
  </style>

  <div class="card" style="padding-top: 25px !important;">
    <h2 class="section-title">Exterior Condition</h2>
    <p class="ext-caption">Body attachments &amp; exterior components</p>
    <table class="ext-table">
      <thead>
        <tr>
          <th class="ext-col-part">Component</th>
          <th class="ext-col-status">Condition</th>
          <th class="ext-col-dmg">Damages / Findings</th>
        </tr>
      </thead>
      <tbody>
        @foreach($exterior as $it)
          @php
            $k = $it['key']; $status = $examination->{$k} ?? '';
            $d = $list($examination->{$k.'_details'} ?? ($examination->{$k.'_detail'} ?? []));
            $o = $list(($trn?->{$k.'_details_other_en'} ?? null) ?? ($examination->{$k.'_details_other'} ?? []));
            $combined = $combineDamages(is_array($d)?$d:[$d], $o);
          @endphp
          <tr>
            <td style="background:#e9f3ff">{{ $it['label'] }}</td>
            <td>{{ $statusLabel($status) }}</td>
            <td>
              @if($norm($status) === 'beschaedigt')
          @php $txt = $joinCommaTr($combined); @endphp
                @if($txt !== '') {!! $WARN !!}{{ $txt }} @else {!! $WARN !!}Damaged (details not provided) @endif
              @elseif($norm($status) === 'i.o.')
                None
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

    <p style="padding-top: 20px !important" class="ext-caption">Rims</p>
    <table class="ext-table">
      <thead>
        <tr>
          <th class="ext-col-part">Position</th>
          <th class="ext-col-status">Condition</th>
          <th class="ext-col-dmg">Damages / Findings</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rims as $i => $rim)
          @php
            $base = $rim['path'];
            $status = data_get($examination, $base.'.status', '');
            $d = $list(data_get($examination, $base.'.details', []));
            $o = $list(data_get($examination, $base.'.details_other_en', data_get($examination, $base.'.details_other', [])));
            if (!count($d)) { $one = data_get($examination, $base.'.detail', ''); if ($one) { $d = [$one]; } }
            $combined = $combineDamages($d, $o);
          @endphp
          <tr>
            <td style="background:#e9f3ff">{{ $rim['label'] }}</td>
            <td>{{ $statusLabel($status) }}</td>
            <td>
              @if($norm($status) === 'beschaedigt')
            @php $txt = $joinCommaTr($combined); @endphp
                @if($txt !== '') {!! $WARN !!}{{ $txt }} @else {!! $WARN !!}Damaged (details not provided) @endif
              @elseif($norm($status) === 'i.o.')
                None
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

    <div class="card" style="page-break-before: always">
      <h2 class="section-title" style="padding-top: 25px !important;">Mechanics &amp; underbody</h2>
      <table class="ext-table">
        <thead>
          <tr>
            <th class="ext-col-part">Component</th>
            <th class="ext-col-status">Condition</th>
            <th class="ext-col-dmg">Damages / Findings</th>
          </tr>
        </thead>
        <tbody>
          @foreach($mechanics as $it)
            @php
              $k = $it['key']; $status = $examination->{$k} ?? '';
            $d = $list($examination->{$k.'_details'} ?? ($examination->{$k.'_detail'} ?? []));
            $o = $list(($trn?->{$k.'_details_other_en'} ?? null) ?? ($examination->{$k.'_details_other'} ?? []));
              $combined = $combineDamages(is_array($d)?$d:[$d], $o);
            @endphp
            <tr>
              <td style="background:#e9f3ff">{{ $it['label'] }}</td>
              <td>{{ $statusLabel($status) }}</td>
              <td>
                @if($norm($status) === 'beschaedigt')
              @php $txt = $joinCommaTr($combined); @endphp
                  @if($txt !== '') {!! $WARN !!}{{ $txt }} @else {!! $WARN !!}Damaged (details not provided) @endif
                @elseif($norm($status) === 'i.o.')
                  None
                @elseif($norm($status) === 'nicht_vorhanden')
                  —
                @else
                  —
                @endif
              </td>
            </tr>
          @endforeach

          @php $overall = trim((string)($pick($trn->external_overall_comment_en ?? null, $examination->external_overall_comment ?? ''))); @endphp
          @if($overall !== '')
            <tr>
              <td style="background:#e9f3ff">Comment</td>
              <td colspan="2">{{ $overall }}</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>

  {{-- Interior --}}
  @php
    // Technology section (fluids + engine bay + next service)
    $fluidsLabel = function($v){
      $m = [ 'i.O.'=>'OK', 'nicht_i.O.'=>'Not OK / replacement due', 'fuellstand_niedrig'=>'Low fill level', 'nicht_vorhanden'=>'Not present' ];
      return $m[$v] ?? ($v !== '' ? (string)$v : '—');
    };
    $engineBayLabel = function($v){ $m=['sauber'=>'Clean','verschmutzt'=>'Dirty']; return $m[$v] ?? ($v !== '' ? (string)$v : '—'); };
    $ni = trim((string)$pick($trn->next_inspection_en ?? null, $examination->next_inspection ?? ''));
    $noc = trim((string)$pick($trn->next_oil_change_en ?? null, $examination->next_oil_change ?? ''));
  @endphp
  <div class="card" style="page-break-before: always; padding-top: 25px !important;">
    <h2 class="section-title">Technology</h2>
    <table class="simple-table">
      <thead>
        <tr>
          <th style="width:33%;background:#e9f3ff">Parameter</th>
          <th style="width:67%;background:#e9f3ff">Value</th>
        </tr>
      </thead>
      <tbody>
        <tr><td style="background:#e9f3ff">Engine oil</td><td>{{ $fluidsLabel($examination->engine_oil ?? '') }}</td></tr>
        <tr><td style="background:#e9f3ff">Brake fluid</td><td>{{ $fluidsLabel($examination->break_fluid ?? '') }}</td></tr>
        <tr><td style="background:#e9f3ff">Coolant</td><td>{{ $fluidsLabel($examination->coolant ?? '') }}</td></tr>
        <tr><td style="background:#e9f3ff">Engine bay (general)</td><td>{{ $engineBayLabel($examination->general_engine_component ?? '') }}</td></tr>
    @php $techComment = trim((string)$pick($trn->technology_overall_comment_en ?? null, $examination->technology_overall_comment ?? '')); @endphp
        @if($techComment !== '')
          <tr><td style="background:#e9f3ff">Comment</td><td>{{ $techComment }}</td></tr>
        @endif
      </tbody>
    </table>
  </div>

  <div class="card" style="padding-top: 20px !important;">
    <h2 class="section-title">Service / Maintenance</h2>
    <table class="simple-table two-col" style="width:100%; table-layout:fixed;">
      <tbody>
        <tr>
          <td style="width:33%; background:#e9f3ff;">Next inspection</td>
          <td style="width:67%;">{{ $ni !== '' ? $ni : '-' }}</td>
        </tr>
        <tr>
          <td style="width:33%; background:#e9f3ff;">Next oil change</td>
          <td style="width:67%;">{{ $noc !== '' ? $noc : '-' }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  {{-- Test run / drive (moved after Service/Maintenance to match DE) --}}
  @php
    $driveDone = (string)($examination->test_drive_done ?? '') === '1';
    $runDone   = (string)($examination->test_run_done   ?? '') === '1';
    $driveItems = [
      ['label'=>'Starter',              'key'=>'td_starter'],
      ['label'=>'Engine run',           'key'=>'td_engine_run'],
      ['label'=>'Steering',             'key'=>'td_steering'],
      ['label'=>'Clutch',               'key'=>'td_clutch'],
      ['label'=>'Transmission',         'key'=>'td_transmission'],
      ['label'=>'Speedometer',          'key'=>'td_speedometer'],
      ['label'=>'Brake feel',           'key'=>'td_brake_feel'],
      ['label'=>'Unusual noises',       'key'=>'td_strange_noises'],
      ['label'=>'Timing chain/belt',    'key'=>'td_timing'],
    ];
    $runItems = [
      ['label'=>'Starter',              'key'=>'tr_starter'],
      ['label'=>'Clutch',               'key'=>'tr_clutch'],
      ['label'=>'Engine run',           'key'=>'tr_engine_run'],
      ['label'=>'Unusual noises',       'key'=>'tr_strange_noises'],
      ['label'=>'Timing chain/belt',    'key'=>'tr_timing'],
    ];
    $statusLabel = function($v){ $s = strtolower((string)$v); return match($s) { 'i.o.' => 'OK', 'auffaellig' => 'Notable', 'nicht_vorhanden' => 'Not present', default => ($v !== '' ? (string)$v : '—'), }; };
    $get = fn($k)=> $examination->{$k} ?? '';
  @endphp
  <style>
    .tdrive-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
    .tdrive-table th, .tdrive-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; text-align:left; }
    .tdrive-table th { background:#e9f3ff; font-weight:700; }
    .td-col-point{ width:33%; } .td-col-status{ width:24%; } .td-col-note{ width:43%; }
  </style>
  <div class="card" style="padding-top: 20px !important;">
    <h2 class="section-title">Test run / Test drive</h2>
    <table class="tdrive-table" style="margin-bottom:8px;">
      <tbody>
        @if($driveDone)
          <tr><th class="td-col-point">Test drive performed?</th><td colspan="2">Yes</td></tr>
        @elseif($runDone && !$driveDone)
          <tr><th class="td-col-point">Test run / drive performed?</th><td colspan="2">Yes</td></tr>
        @else
          <tr><th class="td-col-point">Test drive performed?</th><td colspan="2">{{ (($examination->test_drive_done ?? '') !== '' ? 'No' : '—') }}</td></tr>
          <tr><th class="td-col-point">Test run performed?</th><td colspan="2">{{ (($examination->test_run_done ?? '') !== '' ? 'No' : '—') }}</td></tr>
        @endif
      </tbody>
    </table>

  @if($driveDone)
    <table class="tdrive-table">
        <thead><tr><th class="td-col-point">Checkpoint</th><th class="td-col-status">Status</th><th class="td-col-note">Finding / Note</th></tr></thead>
        <tbody>
          @foreach($driveItems as $it)
            @php $st=$get($it['key']); $note=$get($it['key'].'_note'); $isA=strtolower((string)$st)==='auffaellig'; @endphp
            <tr>
              <td style="background:#e9f3ff">{{ $it['label'] }}</td>
              <td>{{ $statusLabel($st) }}</td>
              <td>
                @if($isA)
                  @php $noteEn = $trn?->{$it['key'].'_note_en'} ?? null; @endphp
                  {!! $WARN !!}{{ ($noteEn ?? $note) !== '' ? ($noteEn ?? $note) : 'Finding not described' }}
                @elseif(strtolower((string)$st) === 'i.o.')
                  None
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
        <thead><tr><th class="td-col-point">Checkpoint</th><th class="td-col-status">Status</th><th class="td-col-note">Finding / Note</th></tr></thead>
        <tbody>
          @foreach($runItems as $it)
            @php $st=$get($it['key']); $note=$get($it['key'].'_note'); $isA=strtolower((string)$st)==='auffaellig'; @endphp
            <tr>
              <td style="background:#e9f3ff">{{ $it['label'] }}</td>
              <td>{{ $statusLabel($st) }}</td>
              <td>
                @if($isA)
                  @php $noteEn = $trn?->{$it['key'].'_note_en'} ?? null; @endphp
                  {!! $WARN !!}{{ ($noteEn ?? $note) !== '' ? ($noteEn ?? $note) : 'Finding not described' }}
                @elseif(strtolower((string)$st) === 'i.o.')
                  None
                @else
                  —
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif

    @php $tdComment = trim((string)($pick($trn->test_drive_overall_comment_en ?? null, $examination->test_drive_overall_comment ?? ''))); @endphp
    @if($tdComment !== '')
      <table class="tdrive-table"><tbody><tr><th style="background:#e9f3ff" class="td-col-point">Comment</th><td colspan="2">{{ $tdComment }}</td></tr></tbody></table>
    @endif
  </div>

  @php
    $labels = [
      'seat_belts' => 'Seat belts', 'steering_wheel' => 'Steering wheel', 'dashboard' => 'Dashboard', 'air_conditioning' => 'Air conditioning',
      'heating_ventilation' => 'Heating / ventilation', 'sunroof' => 'Sunroof / convertible top', 'controls' => 'Controls', 'window_lifters' => 'Window lifters',
      'rearview_mirror' => 'Rear-view mirror', 'seats' => 'Seats', 'glove_box' => 'Glove box', 'radio' => 'Radio', 'floor' => 'Floor', 'paneling' => 'Paneling', 'headliner' => 'Headliner', 'horn' => 'Horn',
    ];
    $statusMapInt = [ 'i.O.' => 'OK', 'beschädigt' => 'Damaged / faulty', 'nicht_vorhanden' => 'Not present' ];
    $norm = function($v){ $s = mb_strtolower((string)$v); $s = str_replace(['ä','ö','ü'], ['ae','oe','ue'], $s); return $s; };
    $statusLabelInt = function($v) use ($statusMapInt){ if ($v === null || $v === '') return '—'; return $statusMapInt[$v] ?? (string)$v; };
    $list = function($val){ if ($val === null || $val === '') return []; if (is_array($val)) return array_values(array_filter($val, fn($x)=>(string)$x !== '')); return [(string)$val]; };
    $combine = function(array $details, array $others){ $out = []; $n = max(count($details), count($others)); for ($i=0; $i<$n; $i++){ $d = $details[$i] ?? ''; $o = trim((string)($others[$i] ?? '')); if ($d === '' && $o === '') continue; if ($d === 'Sonstiges') { $out[] = $o !== '' ? 'Other: '.$o : 'Other'; } else { $out[] = $d; } } return $out; };
  @endphp
  <style>
    .interior-table { width:100%; border-collapse:collapse; margin-bottom:12px; }
    .interior-table th, .interior-table td { border:1px solid #dbdbdbff; padding:6px 8px; font-size:14px; vertical-align:top; text-align:left; }
    .interior-table th { background:#e9f3ff; font-weight:700; }
    .int-col-part{ width:33%; } .int-col-status{ width:24%; } .int-col-dmg{ width:43%; }
  </style>
  <div class="card" style="page-break-before: always; padding-top: 25px !important;">
    <h2 class="section-title">Interior</h2>
    <table class="interior-table">
      <thead><tr><th class="int-col-part">Component</th><th class="int-col-status">Condition</th><th class="int-col-dmg">Damages / Findings</th></tr></thead>
      <tbody>
        @foreach($labels as $pref => $lab)
          @php
            $status = $examination->{$pref} ?? '';
          $d = $list($examination->{$pref.'_detail'} ?? []);
          $o = $list(($trn?->{$pref.'_detail_other_en'} ?? null) ?? ($examination->{$pref.'_detail_other'} ?? []));
          $combined = $combine($d, $o);
          @endphp
          <tr>
            <td style="background:#e9f3ff">{{ $lab }}</td>
            <td>{{ $statusLabelInt($status) }}</td>
            <td>
              @if($norm($status) === 'beschaedigt')
              @php $txt = $joinCommaTr($combined); @endphp
                @if($txt !== '') {!! $WARN !!}{{ $txt }} @else {!! $WARN !!}Damaged / faulty (details not provided) @endif
              @elseif($norm($status) === 'i.o.')
                None
              @elseif($norm($status) === 'nicht_vorhanden')
                —
              @else
                —
              @endif
            </td>
          </tr>
        @endforeach

        @php
          $smell = trim((string)($examination->smell ?? ''));
          $smellOther = trim((string)(($trn->smell_detail_other_en ?? null) ?? $examination->smell_detail_other ?? ''));
          $smellShow = $smell !== 'Sonstiges' ? $tr($smell) : ($smellOther !== '' ? 'Other: '.$smellOther : 'Other');
        @endphp
        @if($smell !== '')
          <tr>
            <td style="background:#e9f3ff">Odor</td>
            <td colspan="2">{{ $smellShow }}</td>
          </tr>
        @endif

        @php $intComment = trim((string)($pick($trn->interior_overall_comment_en ?? null, $examination->interior_overall_comment ?? ''))); @endphp
        @if($intComment !== '')
          <tr>
            <td style="background:#e9f3ff">Comment</td>
            <td colspan="2">{{ $intComment }}</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>

  {{-- Other + Conclusion --}}
  @php
    $other = trim((string)($pick($trn->other_en ?? null, $examination->other ?? '')));
    $conclusion = trim((string)($pick($trn->conclusion_en ?? null, $examination->conclusion ?? '')));
  @endphp
  @php
    $valOrDash = function($v){ $s = trim((string)($v ?? '')); return $s === '' ? '—' : $s; };
    $clusterStatus = $examination->error_in_instrument_cluster ?? '';
    $clusterNote   = trim((string)(($trn->error_in_instrument_cluster_note_en ?? null) ?? ($examination->error_in_instrument_cluster_note ?? '')));

    $memoryStatus  = $examination->error_in_error_memory ?? '';
    $memoryNote    = trim((string)(($trn->error_in_error_memory_note_en ?? null) ?? ($examination->error_in_error_memory_note ?? '')));

    $accStatus     = $examination->known_accident_damage_status
                     ?? $examination->known_accident_damage
                     ?? '';
    $accNote       = trim((string)(($trn->known_accident_damage_note_en ?? null) ?? ($examination->known_accident_damage_note ?? '')));
  @endphp

  <div class="card" style="page-break-before: always; padding-top: 25px !important;">
    <h2 class="section-title">Other</h2>

    <table class="simple-table">
      <thead>
        <tr>
          <th style="width:33%;background:#e9f3ff;">Topic</th>
          <th style="width:67%;background:#e9f3ff;">Description / Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="background:#e9f3ff">Errors in Instrument Cluster</td>
          <td>
            @php $cs = trim((string)$clusterStatus); @endphp
            @if($cs === 'Ja')
              {{ $clusterNote !== '' ? $clusterNote : 'Fault present (not described)' }}
            @elseif($cs === 'Nein')
              None
            @elseif($cs === '')
              —
            @else
              {{ $valOrDash($tr($cs)) }}@if($clusterNote !== '') — {{ $clusterNote }}@endif
            @endif
          </td>
        </tr>

        <tr>
          <td style="background:#e9f3ff">Errors in Diagnostic Tool</td>
          <td>
            @php $ms = trim((string)$memoryStatus); @endphp
            @if($ms === 'Ja')
              {{ $memoryNote !== '' ? $memoryNote : 'Fault present (not described)' }}
            @elseif($ms === 'Nein')
              None
            @elseif($ms === 'Keine Diagnose durchgeführt')
              No diagnostics performed
            @elseif($ms === '')
              —
            @else
              {{ $valOrDash($tr($ms)) }}@if($memoryNote !== '') — {{ $memoryNote }}@endif
            @endif
          </td>
        </tr>

        

        @php
  $as = trim((string)$accStatus);
  $note = trim((string)$accNote);

  // Deutsche → Englische Übersetzungen
  $accidentTranslations = [
    'Vorhanden & nicht instandgesetzt' => 'Present & not repaired',
    'Vorhanden & instandgesetzt' => 'Present & repaired',
  ];

  // Status übersetzen (Fallback: Originaltext)
  $asEn = $accidentTranslations[$as] ?? $as;

  // Optional: Notiz ebenfalls übersetzen (falls du willst)
  $noteEn = $accidentTranslations[$note] ?? $note;
@endphp

<tr>
  <td style="background:#e9f3ff">Accident Damage</td>
  <td>
    @if($as === 'Kein Unfallwagen')
      None
    @elseif($as !== '')
      {{ $asEn }}{{ $noteEn !== '' ? ': ' . $noteEn : ': Details not provided' }}
    @else
      —
    @endif
  </td>
</tr>




        @if($other !== '')
          <tr>
            <td style="background:#e9f3ff">Other</td>
            <td>{!! nl2br(e($other)) !!}</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>


  @if($conclusion !== '')
  <div class="card" style="padding-top: 20px !important;">
    <h2 class="section-title">Conclusion</h2>
    <table class="simple-table">
      <thead>
        <tr>
          <th style="background:#e9f3ff;">Conclusion</th>
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


    @php $__showCalcs = ($damageSummary->show_in_pdf ?? false) ? true : false; @endphp
    @if($__showCalcs)
      @include('frontpages.vehicle.partials.cost_calculations_en', ['damages' => $calcDamages ?? collect(), 'damageSummary' => $damageSummary ?? null, 'order' => $order])
    @endif

  {{-- Photo documentation + Additional documents --}}
  @php
    $media = collect(($images ?? collect())->all())->map(function($i){
      if (is_string($i)) { return (object)['is_image'=>true,'url'=>$i,'name'=>basename($i),'type'=>'image']; }
      if (is_object($i)) {
        $rel = $i->image ?? ($i->image1 ?? null);
        $ext = strtolower(pathinfo($rel ?: '', PATHINFO_EXTENSION));
        $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
        return (object) [
          'is_image' => $isImage,
          'url'    => asset('storage/' . ltrim($rel, '/')),
          'name'   => basename($rel ?: 'Document.pdf'),
          'src'    => $i->image,
          'type'   => $i->document_type ?? ($isImage ? 'image' : ($ext ?: 'document')),
        ];
      }
    })->filter(function($m){ return !empty($m->url); })->values();

    $photos = $media->filter(function($m){ return $m->is_image; })->values();
    $docs = $media->filter(function($m){ return !$m->is_image; })->values();
  @endphp

  @php
  $typeTranslations = [
    'Fotodokumentation' => 'Photo documentation', 
    'FIN-Abfrage'          => 'VIN Query',
    'Kalkulation'           => 'Calculation',
    'Diagnose'           => 'Diagnostic report',
    'Dokumente'           => 'Documents',
    'Schadensbilder USA' => 'Accident damage pictures', 
    'Marktanalyse' => 'Market analysis', 
    'E-Batterie Zertifikat' => 'EV battery certificate', 
    'Sonstiges' => 'Other', 
  ];
@endphp


  <div class="card" style="padding-top: 20px !important;">
    <h2 class="section-title">Photo documentation</h2>
    @php $fotoDocs = $docs->where('type', 'Fotodokumentation'); @endphp
    @if($fotoDocs->isEmpty())
      <table class="simple-table" style="margin-bottom: 0;"><tbody><tr><td>No photo documentation available.</td></tr></tbody></table>
    @else
      <table class="simple-table" style="width: 100%; margin-bottom: 0;">
        <thead><tr><th style="width:27%; background:#e9f3ff">Document type</th><th style="width:73%; background:#e9f3ff">Link</th></tr></thead>
        <tbody>
          @foreach($fotoDocs as $d)
            <tr>
              <td style="background:#e9f3ff">
                {{ $typeTranslations[$d->type] ?? ucfirst($d->type ?? 'Photo documentation') }}
              </td>
              <td><a href="{{ $d->url }}" target="_blank" rel="noopener">{{ $d->name }}</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div style="margin-top: 7px; font-size: 0.9em; color: #666; display: flex; align-items: center;">
        Click the photo documentation link to open it.
      </div>
    @endif
  </div>

  <div class="card" style="padding-top: 20px !important;">
    <h2 class="section-title">Additional documents</h2>
    @php $otherDocs = $docs->where('type', '!=', 'Fotodokumentation'); @endphp
    @if($otherDocs->isEmpty())
      <table class="simple-table" style="margin-bottom: 0;"><tbody><tr><td>No documents available.</td></tr></tbody></table>
    @else
      <table class="simple-table" style="width: 100%; margin-bottom: 0;">
        <thead><tr><th style="width:27%; background:#e9f3ff">Document type</th><th style="width:73%; background:#e9f3ff">Link</th></tr></thead>
        <tbody>
          @foreach($otherDocs as $d)
            <tr>
              <td style="background:#e9f3ff">
                {{ $typeTranslations[$d->type] ?? ucfirst($d->type ?? 'Document') }}
              </td>
              <td><a href="{{ $d->url }}" target="_blank" rel="noopener">{{ $d->name }}</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div style="margin-top: 7px; font-size: 0.9em; color: #666; display: flex; align-items: center;">
        Click the link to open the document.
      </div>
    @endif
  </div>

  {{-- Exterior/Mechanics overview (labels only) --}}
  @php
    $statusMap = [ 'i.O.' => 'OK', 'beschädigt' => 'Damaged', 'nicht_vorhanden' => 'Not present' ];
    $exterior = [
      ['label' => 'Windshield',            'key' => 'windshield'],
      ['label' => 'Window glazing',        'key' => 'window_glazing'],
      ['label' => 'Wipers',                'key' => 'wipers'],
      ['label' => 'Seals',                 'key' => 'seals'],
      ['label' => 'Central locking',       'key' => 'central_locking'],
      ['label' => 'Attachments',           'key' => 'attachments'],
      ['label' => 'Exterior mirrors',      'key' => 'exterior_mirrors'],
    ];
    $mechanics = [
      ['label' => 'Suspension',                    'key' => 'suspension'],
      ['label' => 'Shock absorbers',               'key' => 'shock_absorbers'],
      ['label' => 'Springs',                       'key' => 'springs'],
      ['label' => 'Brake discs',                   'key' => 'brake_discs'],
      ['label' => 'Brake pads',                    'key' => 'brake_pads'],
      ['label' => 'Exhaust system',                'key' => 'exhaust_system'],
      ['label' => 'Engine oil tightness',          'key' => 'engine_oil_tightness'],
      ['label' => 'Gearbox oil tightness',         'key' => 'gearbox_oil_tightness'],
      ['label' => 'Differential oil tightness',    'key' => 'differential_oil_tightness'],
      ['label' => 'Underbody condition (general)', 'key' => 'underbody_condition'],
      ['label' => 'Other findings',                'key' => 'other_findings'],
    ];
  @endphp

  {{-- Notes: Many more sections exist in DE template (tires, body, photos).
       For EN, above key sections are translated and values are reused. --}}

       <div style="page-break-inside: avoid;">

    <div style="min-height: 25mm; position: relative;">

    <div style="position: absolute; bottom: 0; left: 0; right: 0;
                font-size:13px; line-height:1.35; color:#6b7280;
                border-top:1px solid #d1d5db; padding-top:6px;">
      Note: This condition report is based on a visual and functional inspection at the time of assessment.
Hidden or non-detectable defects cannot be ruled out.
This report does not constitute any guarantee or assumption of liability.
    </div>

  </div>

</div>

</main>
</body>
</html>

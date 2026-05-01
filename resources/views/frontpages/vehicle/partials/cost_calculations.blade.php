@php
  if ((!isset($damages) || (is_countable($damages) && count($damages) === 0)) && isset($order)) {
    $damages = \App\Models\OrderDamage::where('order_id', $order->id)->orderBy('id')->get();
    $damageSummary = $damageSummary ?? \App\Models\OrderDamageSummary::where('order_id', $order->id)->first();
  }
  // Normalize incoming damages to objects; tolerate arrays/JSON strings
  $rows = collect($damages ?? [])->map(function($x){
      if (is_string($x)) {
          $tmp = json_decode($x, true);
          if (is_array($tmp)) { return (object) $tmp; }
          return null; // skip plain strings
      }
      if (is_array($x)) { return (object) $x; }
      return $x; // Eloquent model or stdClass
  })->filter(function($x){ return is_object($x); });
  $cat = function($item){
    // Prefer explicit category
    $c = strtolower((string)($item->category ?? ''));
    if (in_array($c, ['dep','add','upc'], true)) return $c;
    // Fallback: infer from cost_type text
    $t = mb_strtolower(trim((string)($item->cost_type ?? '')));
    if ($t !== '') {
      if (str_contains($t, 'depreciation') || str_contains($t, 'deduction') || str_contains($t, 'inferior value') || str_contains($t, 'value reduction') || str_contains($t, 'value loss') || str_contains($t, 'wertminderung')) return 'dep';
      if (str_contains($t, 'added') || str_contains($t, 'enhancement') || str_contains($t, 'wertsteigerung') || str_contains($t, 'increase')) return 'add';
      if (str_contains($t, 'upcoming cost') || str_contains($t, 'upcoming costs') || str_contains($t, 'repair cost') || str_contains($t, 'reparatur') || str_contains($t, 'anstehend')) return 'upc';
    }
    return 'upc';
  };
  // Helper: robust number parser (handles 1.234,56 and 1,234.56 and symbols)
  $num = function($v){
      if (is_null($v) || $v === '') return 0.0;
      if (is_numeric($v)) return (float)$v;
      $s = preg_replace('/[^0-9,\.\-]/', '', (string)$v);
      // Remove thousands separators (keep last decimal separator)
      if (substr_count($s, ',') > 1 || substr_count($s, '.') > 1) {
          $s = preg_replace('/\.(?=.*\.)/', '', $s);
          $s = preg_replace('/,(?=.*,)/', '', $s);
      }
      if (strpos($s, ',') !== false && strpos($s, '.') === false) { $s = str_replace(',', '.', $s); }
      else { $s = str_replace(',', '', $s); }
      return (float)$s;
  };
  // Categorize explicitly: inferior value => deductions, added value => enhancements, upcoming cost => repairs
  $dep = $rows->filter(fn($r)=>$cat($r)==='dep')->sortByDesc('amount')->values();
  $add = $rows->filter(fn($r)=>$cat($r)==='add')->sortByDesc('amount')->values();
  $upc = $rows->filter(fn($r)=>$cat($r)==='upc')->sortByDesc('amount')->values();
  if ($rows->count() > 0 && $dep->count()===0 && $add->count()===0 && $upc->count()===0) {
      $upc = $rows; // fallback: show all as upcoming costs
  }
  $sumDep = (float) $dep->sum(fn($x)=> $num($x->amount ?? 0));
  $sumAdd = (float) $add->sum(fn($x)=> $num($x->amount ?? 0));
  $sumUpc = (float) $upc->sum(fn($x)=> $num($x->amount ?? 0));
  $fmt = fn($n)=> number_format((float)$n, 2, ',', '.') . ' €';
  $market = $num($damageSummary->market_average ?? 0);
  $dat    = $num($damageSummary->dat_value ?? 0);
  $sell   = $num($damageSummary->selling_price ?? 0);
  $marketCost = $num($damageSummary->market_average_cost ?? 0);
  $basePrice = ($sell > 0) ? $sell : $dat;
  $marketAdj = 0.0;
  $finalValue = $basePrice - $sumDep - $sumUpc + $sumAdd + $marketCost;
@endphp

<div style="page-break-before: always;"></div> 

<div class="card" style="padding-top: 25px !important;">
  <h2 class="section-title">KALKULATION (Minderwerte, Mehrwerte, Kosten, Marktwert)</h2>

  {{-- Depreciation (Deductions) --}}
  <p class="set-title">Minderwerte</p>
  <table class="simple-table">
    <thead>
      <tr>
        <th style="width:30%;">Bezeichnung</th>
        <th>Bemerkungen</th>
        <th style="width:25%; text-align:left;">Minderwert</th>
      </tr>
    </thead>
    <tbody>
      @forelse($dep as $d)
        <tr>
          <td style="background:#e9f3ff">{{ $d->title }}</td>
          <td>{{ $d->remarks ?: $d->cost_type }}</td>
          <td style="text-align:left;">{{ $fmt($d->amount) }}</td>
        </tr>
      @empty
        <tr><td style="background:#e9f3ff">—</td><td>—</td><td style="text-align:left;">{{ $fmt(0) }}</td></tr>
      @endforelse
      <tr>
        <td colspan="2" style="text-align:left; font-weight:700;">Gesamt</td>
        <td style="text-align:left; font-weight:700;">{{ $fmt($sumDep) }}</td>
      </tr>
    </tbody>
  </table>

  {{-- Added Value (Enhancements) --}}
  <p style="padding-top: 15px" class="set-title">Mehrwerte</p>
  <table class="simple-table">
    <thead>
      <tr>
        <th style="width:30%;">Bezeichnung</th>
        <th>Bemerkungen</th>
        <th style="width:25%; text-align:left;">Mehrwert</th>
      </tr>
    </thead>
    <tbody>
      @forelse($add as $d)
        <tr>
          <td style="background:#e9f3ff">{{ $d->title }}</td>
          <td>{{ $d->remarks ?: $d->cost_type }}</td>
          <td style="text-align:left;">{{ $fmt($d->amount) }}</td>
        </tr>
      @empty
        <tr><td style="background:#e9f3ff">—</td><td>—</td><td style="text-align:left;">{{ $fmt(0) }}</td></tr>
      @endforelse
      <tr>
        <td colspan="2" style="text-align:left; font-weight:700;">Gesamt</td>
        <td style="text-align:left; font-weight:700;">{{ $fmt($sumAdd) }}</td>
      </tr>
    </tbody>
  </table>

  {{-- Upcoming Costs --}}
  <p style="padding-top: 15px" class="set-title">Anstehende Kosten</p>
  <table class="simple-table">
    <thead>
      <tr>
        <th style="width:30%;">Bezeichnung</th>
        <th>Bemerkungen</th>
        <th style="width:25%; text-align:left;">Kosten</th>
      </tr>
    </thead>
    <tbody>
      @forelse($upc as $d)
        <tr>
          <td style="background:#e9f3ff">{{ $d->title }}</td>
          <td>{{ $d->remarks ?: $d->cost_type }}</td>
          <td style="text-align:left;">{{ $fmt($d->amount) }}</td>
        </tr>
      @empty
        <tr><td style="background:#e9f3ff">—</td><td>—</td><td style="text-align:left;">{{ $fmt(0) }}</td></tr>
      @endforelse
      <tr>
        <td colspan="2" style="text-align:left; font-weight:700;">Gesamt</td>
        <td style="text-align:left; font-weight:700;">{{ $fmt($sumUpc) }}</td>
      </tr>
    </tbody>
  </table>

   <p style="font-size: 13px; color:#6b7280; margin-top:6px;">
    Alle Wertangaben inkl. MwSt. Die dargestellten Reparaturkosten dienen der Orientierung und können abweichen.
  </p>

{{-- Vehicle Valuation Summary --}}
<hr style="margin-top: 20px">

<p style="padding-top: 20px" class="set-title">Wertermittlung</p>

  <table class="simple-table">
    <thead>
      <tr>
        <th>Bezeichnung</th>
        <th style="width:70%">Betrag</th>
      </tr>
    </thead>
    <tbody>
      <tr><td style="background:#e9f3ff">Marktdurchschnitt</td><td>{{ $fmt($market) }}</td></tr>
      <tr><td style="background:#e9f3ff">DAT-Preis*</td><td>{{ $fmt($dat) }}</td></tr>

      @if($sell > 0)
        <tr><td style="background:#e9f3ff">Verkaufspreis</td><td>{{ $fmt($sell) }}</td></tr>
      @endif

      <tr><td style="background:#e9f3ff">Minderwerte</td><td>- {{ $fmt($sumDep) }}</td></tr>
      <tr><td style="background:#e9f3ff">Mehrwerte</td><td>+ {{ $fmt($sumAdd) }}</td></tr>
      <tr><td style="background:#e9f3ff">Anstehende Kosten</td><td>- {{ $fmt($sumUpc) }}</td></tr>

      <tr>
        <td style="background:#e9f3ff">Marktanpassung</td>
        <td>
          {{ $marketCost > 0 ? '+ ' : ($marketCost < 0 ? '- ' : '') }}
          {{ $fmt(abs($marketCost)) }}
        </td>
      </tr>
    </tbody>
  </table>

  <table class="simple-table" style="margin-top:15px;">
  <tbody>
    <tr>
      <td style="font-weight: 700; background:#e9f3ff">Wert am Markt</td>
      <td style="font-weight: 700; width:70%">
        {{ $fmt($finalValue) }}
      </td>
    </tr>
  </tbody>
</table>


  <p style="font-size: 13px; color:#6b7280; margin-top:6px;">
   Die Ermittlung des Marktwerts erfolgt auf Grundlage von Fahrzeugdaten (u. a. Erstzulassung und Laufleistung), dem zum Zeitpunkt der Besichtigung festgestellten 
   optischen und technischen Zustand sowie unter Berücksichtigung der aktuellen Marktsituation.
  </p>
  @if(($damageSummary->remarks ?? '') !== '')
    <div style="margin-top:8px; padding:8px 10px; background:#f8fafc; border:1px solid #e5e7eb; border-radius:6px;">
      <div style="font-weight:700; margin-bottom:4px;">Bemerkungen</div>
      <div style="white-space:pre-line;">{{ $damageSummary->remarks }}</div>
    </div>
  @endif
</div>

@php
  // Build data points for simple SVG line chart
  $series = [
    ['label' => 'Market average', 'value' => $market],
    ['label' => 'DAT Preis',      'value' => $dat],
    ['label' => 'Selling Price',  'value' => $sell],
    ['label' => 'Depreciation',   'value' => max(0, -$sumDep)], // show as drop
    ['label' => 'Added Value',    'value' => max(0, $sumAdd)],
    ['label' => 'Upcoming Costs', 'value' => max(0, -$sumUpc)],
    ['label' => 'Marktanpassung', 'value' => $marketCost],
    ['label' => 'Final Value',    'value' => $finalValue],
  ];
  $values = array_map(fn($x)=> (float)$x['value'], $series);
  $minV = min($values); $maxV = max($values);
  if ($maxV <= 0) { $maxV = 1; }
  $W = 520; $H = 160; $PADX = 30; $PADY = 20; $n = count($series);
  $dx = ($W - 2*$PADX) / max(1, $n-1);
  $scale = function($v) use($H,$PADY,$minV,$maxV){
      $rng = max(1e-6, $maxV - $minV);
      $rel = ($v - $minV) / $rng; // 0..1
      return $H - $PADY - $rel * ($H - 2*$PADY);
  };
  $points = [];
  for($i=0;$i<$n;$i++){
    $x = $PADX + $i*$dx; $y = $scale($values[$i]);
    $points[] = $x.','.$y;
  }
@endphp

<div class="card" style="padding-top: 20px !important; padding-bottom: 20px !important">
  <h2 class="section-title">Grafische Darstellung</h2>
  @if(!empty($chartDataUri))
    <img src="{{ $chartDataUri }}" alt="Valuation chart" style="padding-top: 15px !important; width:180mm; height:auto; display:block;" />
  @else
  @php $maxBar = max(1, max(array_map(fn($v)=>abs((float)$v), $values))); @endphp
  <table class="simple-table" style="margin-bottom:0;">
    <thead>
      <tr>
        <th style="width:28%;">Schritt</th>
        <th>Wert</th>
        <th style="width:18%; text-align:right;">Betrag</th>
      </tr>
    </thead>
    <tbody>
    @foreach($series as $i => $s)
      @php
        $pct = intval((abs((float)$s['value']) / $maxBar) * 100);
      @endphp
      <tr>
        <td style="background:#e9f3ff">{{ $s['label'] }}</td>
        <td>
          <div style="width:100%; height:10px; background:#eef2f7; border-radius:6px; overflow:hidden;">
            <div style="width: {{ $pct }}%; height:10px; background:#01449A;"></div>
          </div>
        </td>
        <td style="text-align:right; white-space:nowrap;">{{ $fmt($s['value']) }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  @endif
</div>

<p style="font-size: 13px; color:#6b7280"><b>*DAT-Preis:</b> 
  Der DAT-Preis ist ein durchschnittlicher Marktwert für ein Fahrzeug, der von der Deutschen Automobil Treuhand (DAT) ermittelt wird. Die DAT sammelt Daten zu Fahrzeugverkäufen in 
  Deutschland und berechnet daraus den typischen Preis, den ein Auto mit bestimmten Eigenschaften (z. B. Marke, Modell, Baujahr, Laufleistung, Ausstattung) auf dem freien Markt erzielen würde.
  <!--  Dieser Wert dient als neutrale Orientierung für Händler und Privatpersonen. -->
</p>

<hr style="margin-top: 20px">
<div class="card" style="padding-top: 20px !important">

<h4 class="pb-1" style="letter-spacing: -0.25px">Details zum Auftrag</h4>

{{-- Mini-Styles für Toggle & Dropdown (außerhalb der Status-Card) --}}
<style>
    li.pb-2.pt-2 {
  list-style: none;
}

  /* Toggle-Button */
  .order-toggle.btn {
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    background: #f8fafc;
    color: #111827;
    padding: 10px 14px;
    font-weight: 600;
  }
  .order-toggle.btn { 
  box-shadow: none !important; 
}

  .order-toggle.btn:hover { background:#f3f4f6; }
  .order-toggle .label-hide { display:none; }
  .order-toggle:not(.collapsed) .label-show { display:none; }
  .order-toggle:not(.collapsed) .label-hide { display:inline; }
  .order-toggle .chev {
    display:inline-block; margin-left:6px; transition: transform .2s ease;
    transform: rotate(0deg);
  }
  .order-toggle:not(.collapsed) .chev { transform: rotate(180deg); }

  /* Lesbares Dropdown */
  .order-collapse {
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    background: #ffffff;
    overflow: hidden;
  }
  .order-collapse__head {
    padding: 12px 16px;
    background: linear-gradient(180deg,#f8fafc,#f3f4f6);
    border-bottom: 1px solid #e5e7eb;
    font-weight: 700;
    color: #0d47a1;
  }
  .order-collapse__body {
    padding: 16px;
    display: flex;
    flex-direction: column;
    gap: 14px;
  }
  .kv-block {
    display:flex; flex-direction:column; gap:6px;
    border:1px solid #e5e7eb; border-radius:10px;
    padding:12px; background:#fafafa;
  }
  .kv-block__k { font-size:13px; font-weight:700; color:#374151; }
  .kv-block__v { font-size:14px; color:#111827; word-break:break-word; }
  .link-pill {
    display:inline-block; padding:6px 10px; border-radius:999px;
    background:#f1f5f9; border:1px solid #e5e7eb; text-decoration:none; font-size:13px;
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:100%;
  }
  .link-pill:hover { opacity:.9; }
  .note-block {
    border:1px dashed #e5e7eb; border-radius:10px; padding:12px; background:#fcfcfc;
  }
  .note-block__k { font-size:13px; font-weight:700; color:#374151; margin-bottom:6px; }
  .note-block__v { font-size:14px; color:#111827; line-height:1.5; white-space:pre-wrap; }
</style>

<!-- Status-Hinweis (optional)
<span class="text-primary">Status:</span>
in Bearbeitung
<br><br> -->

<style>
/* ===== Status Widget (stacked, responsive, modern) ===== */
.status-widget {
  --c-created:   #00449a;   /* Schritt 1 */
  --c-inspecting:#f09711;   /* Schritt 2 */
  --c-completed: #157301;   /* Schritt 3 */
  --c-border:    #e5e7eb;
  --c-bg:        #fafafa;
  --c-text:      #111827;
  --c-muted:     #6b7280;

  border: 1px solid var(--c-border);
  border-radius: 12px;
  padding: 16px;
  background: var(--c-bg);
  color: var(--c-text);
}

/* Erfolgshinweis bei abgeschlossenem Auftrag */
.status-success {
  display: none;
  border: 1px solid color-mix(in oklab, var(--c-completed) 40%, white);
  background: color-mix(in oklab, var(--c-completed) 12%, white);
  color: var(--c-text);
  border-radius: 10px;
  padding: 10px 12px;
  margin-bottom: 12px;
  font-size: 14px;
}
.status-success strong { color: var(--c-completed); }

/* Fortschrittsbalken */
.status-progress {
  position: relative;
  width: 100%;
  height: 10px;
  background: #eef2f7;
  border-radius: 999px;
  overflow: hidden;
  margin-bottom: 18px;
}
.status-progress__bar {
  height: 100%;
  width: 0%;
  border-radius: 999px;
  transition: width .3s ease;
}

/* Schritte — vertikal */
.status-steps {
  display: grid;
  grid-template-columns: 1fr;
  gap: 12px;
}

.step-card {
  background: white;
  border: 1px solid var(--c-border);
  border-radius: 10px;
  padding: 12px;
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 10px;
  align-items: start;
}

/* Punkt-Design */
.step-dot {
  --dot: #cbd5e1;
  width: 14px;
  height: 14px;
  border-radius: 999px;
  border: 2px solid var(--dot);
  margin-top: 2px;
  position: relative;
}

/* aktiver Schritt → farbig gefüllt + Glow */
.step-dot.is-active {
  --dot: currentColor;
  box-shadow: 0 0 0 4px color-mix(in oklab, currentColor 20%, transparent);
}
.step-dot.is-active::after {
  content: "";
  position: absolute;
  inset: 2px;
  border-radius: 999px;
  background: currentColor;
}

/* erledigt → gefüllt, kein Glow */
.step-dot.is-done {
  --dot: currentColor;
}
.step-dot.is-done::after {
  content: "";
  position: absolute;
  inset: 2px;
  border-radius: 999px;
  background: currentColor;
}

/* Header + Texte */
.step-header {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 8px;
  margin-bottom: 4px;
}

.badge {
  display: inline-block;
  padding: 6px 10px;
  border-radius: 6px;
  font-size: 13px;
  font-weight: 600;
  color: #fff;
}
.badge.is-dim { opacity: .5; }

.step-state {
  font-size: 12px;
  color: var(--c-muted);
  font-weight: 600;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

.step-desc {
  font-size: 13px;
  color: var(--c-text);
  line-height: 1.4;
}

.next-hint {
  margin-top: 8px;
  padding-top: 8px;
  border-top: 1px dashed var(--c-border);
  font-size: 12px;
  color: var(--c-muted);
}

.status-title {
  font-weight: 700;
  margin-bottom: 8px;
}
</style>

@php
    $steps = [
        [
            'key' => 'created',
            'label' => 'Fahrzeugprüfung',
            'desc'  => 'Die Bearbeitung des Auftrags bzw. die Fahrzeugprüfung ist derzeit in Arbeit.',
            'color' => 'var(--c-created)',
        ],
        [
            'key' => 'inspecting',
            'label' => 'Fertigstellung der Prüfdokumente',
            'desc'  => 'Die Prüfung des Fahrzeugs ist abgeschlossen. Die Prüfdokumente werden nun aufbereitet und fertiggestellt.',
            'color' => 'var(--c-inspecting)',
        ],
        [
            'key' => 'completed',
            'label' => 'Zusendung der Prüfdokumente',
            'desc'  => 'Die Prüfdokumente wurden an dich per E-Mail versendet. Bitte überprüfe dein Postfach (ggf. auch den Spam-Ordner).',
            'color' => 'var(--c-completed)',
        ],
    ];

    $orderMap = array_column($steps, 'key');
    $currentIndex = array_search($order->status, $orderMap);
    if ($currentIndex === false) $currentIndex = 0;

    $progressPercent = (($currentIndex + 1) / count($steps)) * 100;
    $currentColor = $steps[$currentIndex]['color'];
    $isCompleted = ($order->status === 'completed');

    // eindeutige ID für die Collapse-Sektion (falls mehrere Aufträge / Modals)
    $collapseId = 'orderData-' . ($order->id ?? 'current');
@endphp

{{-- === Status-Card === --}}
<li class="pb-2 pt-2">
  <div class="status-widget" role="region" aria-label="Auftragsstatus">
    <div class="status-title text-primary">Statusübersicht</div>

    {{-- Erfolgshinweis bei abgeschlossenem Auftrag --}}
    <div class="status-success" style="{{ $isCompleted ? 'display:block' : '' }}">
      <strong>Auftrag abgeschlossen:</strong> Die Prüfdokumente wurden erfolgreich an dich per E-Mail versendet. Vielen Dank!
    </div>

    {{-- Fortschrittsbalken --}}
    <div class="status-progress" aria-label="Fortschritt">
      <div class="status-progress__bar"
           style="width: {{ $progressPercent }}%; background: {{ $currentColor }};"
           aria-valuemin="0" aria-valuemax="100"
           aria-valuenow="{{ (int) $progressPercent }}"
           role="progressbar"></div>
    </div>

    {{-- Schritte --}}
    <div class="status-steps">
      @foreach($steps as $i => $s)
        @php
          $isLast = $i === count($steps) - 1;
          $state = $i < $currentIndex ? 'done' : ($i === $currentIndex ? 'active' : 'upcoming');
          $dim = $state === 'upcoming' ? 'is-dim' : '';
          $dotClass = $state === 'active' ? 'is-active' : ($state === 'done' ? 'is-done' : '');
        @endphp

        <div class="step-card">
          <div class="step-dot {{ $dotClass }}" style="color: {{ $s['color'] }};"></div>

          <div>
            <div class="step-header">
              <span class="badge {{ $dim }}" style="background: {{ $s['color'] }};">{{ $s['label'] }}</span>
              @if($state === 'done' || ($isLast && $isCompleted))
                <span class="step-state">✓ Abgeschlossen</span>
              @elseif($state === 'upcoming')
                <span class="step-state">Ausstehend</span>
              @endif
            </div>

            {{-- Beschreibung nur beim aktiven Status --}}
            @if($state === 'active' || ($isLast && $isCompleted))
              <div class="step-desc">{{ $s['desc'] }}</div>
            @endif

            {{-- Nächster Schritt nur beim aktiven Status anzeigen (nicht bei letztem) --}}
            @if($state === 'active' && !$isLast)
              <div class="next-hint"><strong>Nächster Schritt:</strong> {{ $steps[$i + 1]['label'] }}</div>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</li>

{{-- === Dokumente aus Storage === --}}
@php
    $customerDocs = collect();
    if ($order->examination) {
        $customerDocs = $order->examination->images->filter(fn($img) => !empty($img->document_type));
    }
@endphp

@if($customerDocs->isNotEmpty())
<li class="pb-2 pt-2">
  <div class="order-collapse" style="border-radius:12px; border:1px solid #e5e7eb; overflow:hidden;">
    <div class="order-collapse__head" style="padding:12px 16px; background:linear-gradient(180deg,#f8fafc,#f3f4f6); border-bottom:1px solid #e5e7eb; font-weight:700; color:#0d47a1;">
      Dokumente
    </div>
    <div style="padding:14px 16px; display:flex; flex-direction:column; gap:10px;">
      @foreach($customerDocs as $doc)
        @php
          $docName = $doc->filename ?? $doc->original_name ?? basename(parse_url($doc->image1, PHP_URL_PATH));
          $dtype = strtoupper($doc->document_type ?? 'Datei');
        @endphp
        <div style="display:flex; align-items:center; justify-content:space-between; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; background:#fafafa;">
          <div style="display:flex; align-items:center; gap:10px;">
            <i class="fa-solid fa-file-lines" style="color:#2563eb;"></i>
            <span class="badge" style="background:#e5e7eb; color:#374151; font-size:12px; padding:4px 8px; border-radius:6px;">{{ $dtype }}</span>
            <span style="font-size:13px; color:#374151; word-break:break-all;">{{ $docName }}</span>
          </div>
          <a href="{{ $doc->image1 }}" target="_blank" rel="noopener" style="font-size:13px; white-space:nowrap; margin-left:10px; text-decoration:none; color:#2563eb;">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Öffnen
          </a>
        </div>
      @endforeach
    </div>
  </div>
</li>
@endif

{{-- === Toggle-Button AUSSERHALB der Status-Card === --}}
<div class="mt-2">
  <button class="btn order-toggle w-100 d-flex justify-content-between align-items-center collapsed"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#{{ $collapseId }}"
          aria-expanded="false"
          aria-controls="{{ $collapseId }}">
    <span>Auftragsdaten</span>
    <span>
      <span class="label-show">anzeigen</span>
      <span class="label-hide">ausblenden</span>
      <span class="chev">▾</span>
    </span>
  </button>
</div>

{{-- === Dropdown (lesbare Auftragsdaten), initial verborgen === --}}
<div id="{{ $collapseId }}" class="collapse mt-2">
  <div class="order-collapse">
 
    <div class="order-collapse__body">

      @if(!empty($order->vehicle_make_model))
        <div class="kv-block">
          <span class="kv-block__k">Marke &amp; Modell</span>
          <span class="kv-block__v">{{ $order->vehicle_make_model }}</span>
        </div>
      @endif

      @if(!empty($order->advertisement_link))
        @php
          $host = parse_url($order->advertisement_link, PHP_URL_HOST);
          $display = $host ?: $order->advertisement_link;
          if (mb_strlen($display) > 42) { $display = mb_substr($display,0,42).'…'; }
        @endphp
        <div class="kv-block">
          <span class="kv-block__k">Inserat-Link</span>
          <span class="kv-block__v">
            <a class="link-pill" href="{{ $order->advertisement_link }}" target="_blank" rel="noopener">{{ $display }}</a>
          </span>
        </div>
      @endif

      @if(!empty($order->street))
        <div class="kv-block">
          <span class="kv-block__k">Adresse</span>
          <span class="kv-block__v">{{ $order->street }}</span>
        </div>
      @endif

      @if(!empty($order->city))
        <div class="kv-block">
          <span class="kv-block__k">Stadt</span>
          <span class="kv-block__v" style="text-transform:capitalize;">{{ $order->city }}</span>
        </div>
      @endif

      @if(!empty($order->desc))
        <div class="kv-block">
          <span class="kv-block__k">Wünsche an die Prüfung</span>
          <div class="pt-1 kv-block__v">{!! nl2br(e($order->desc)) !!}</div>
        </div>
      @endif

    </div>
  </div>
</div>

@extends('mainpages.examlayout')

@section('title', 'Dokumentation')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
@endsection
@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background:#f8fafc; min-height:100dvh; }
  .card-modern { border:1px solid rgba(0,0,0,.06); border-radius:var(--radius); overflow:hidden; box-shadow:0 12px 28px rgba(0,0,0,.06); }
  .card-modern .card-header { background:linear-gradient(180deg,#fff,#f3f4f6); border-bottom:1px solid #eef2f7; }
  .form-max-650 { max-width:800px; margin:0 auto; width:100%; } /* etwas breiter für größere Thumbs */

  .upload-btn { height:48px; }
  .hint { color:#6b7280; font-size:.92rem; }

  /* Thumbs – größer */
  .thumb { border:1px solid #e5e7eb; border-radius:12px; overflow:hidden; background:#fff; }
  .thumb-caption { font-size: 11px; color: #374151; padding: 4px 8px 6px; background: #f9fafb; border-top: 1px solid #e5e7eb; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .thumb-head { display:flex; justify-content:space-between; align-items:center; padding:.5rem .7rem; background:#f9fafb; border-bottom:1px solid #eef2f7; }
  .thumb-img-wrap { width:100%; height:280px; background:#fff; } /* größer */
  .thumb img { display:block; width:100%; height:100%; object-fit:cover; transform-origin:center center; transition:transform .2s ease; }
  .thumb-actions a { margin-left:.4rem; text-decoration:none; }
  .thumb-actions .btn-icon { border:1px solid #e5e7eb; border-radius:8px; padding:.25rem .45rem; background:#fff; }
  .sort-handle { cursor:grab; color:#9ca3af; }
  .sort-handle { touch-action: none; }
  .ui-sortable-helper { opacity:.9; }
  .ui-sortable-placeholder { visibility:visible !important; background:#e5e7eb; border:2px dashed #cbd5e1; min-height:60px; }
  .img-select { cursor:pointer; }

  /* Modal */
  .modal-backdrop-lite { position:fixed; inset:0; background:rgba(2,6,23,.6); display:none; z-index:1050; }
  .modal-shell { position:fixed; inset:5% 3%; background:#0b1220; border-radius:14px; box-shadow:0 20px 60px rgba(0,0,0,.4); display:none; z-index:1060; color:#e5e7eb; }
  .modal-head { display:flex; align-items:center; justify-content:space-between; padding:.6rem .9rem; border-bottom:1px solid #1f2937; gap:.5rem; }
  .modal-title { font-weight:600; }
  .modal-tools { display:flex; gap:.4rem; align-items:center; flex-wrap:wrap; }
  .tool-btn, .tool-select { border:1px solid #374151; background:#111827; color:#e5e7eb; border-radius:10px; padding:.4rem .55rem; cursor:pointer; }
  .tool-select { height:34px; }
  .tool-btn.active { outline:2px solid #2563eb; }
  .modal-body { position:relative; height:calc(100% - 56px); }
  .canvas-wrap { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; overflow:hidden; }

  /* Auswahl-Rahmen */
  .selection-info { font-size:.85rem; color:#9ca3af; margin-left:.5rem; }
  .kbd { padding:.1rem .35rem; border:1px solid #6b7280; border-bottom-width:2px; border-radius:6px; font-size:.8rem; background:#111827; color:#e5e7eb; }

  /* Dokumentliste */
  .doc-item { display:flex; align-items:center; justify-content:space-between; gap:.75rem; border:1px solid #e5e7eb; background:#fff; border-radius:10px; padding:.6rem .75rem; }
  .doc-name { display:flex; align-items:center; gap:.55rem; overflow:hidden; }
  .doc-text { white-space:nowrap; text-overflow:ellipsis; overflow:hidden; }

  /* Vorgabe (vereinfacht) */
  .req-box { border:1px solid #e5e7eb; border-radius:12px; background:#ffffff; padding:14px; }
  .req-title { font-weight:700; font-size:1rem; margin:0 0 .5rem; }
  .req-group { display:grid; grid-template-columns: 1fr; gap:.5rem; }
  .req-row { display:flex; align-items:center; justify-content:space-between; border:1px solid #e5e7eb; background:#f9fafb; border-radius:10px; padding:.5rem .75rem; }
  .req-left { display:flex; align-items:center; gap:.6rem; }
  .req-dot { width:.6rem; height:.6rem; border-radius:999px; background:#60a5fa; display:inline-block; }
  .req-count { font-weight:700; background:#eef2ff; color:#3730a3; border:1px solid #e0e7ff; border-radius:999px; padding:.15rem .5rem; font-size:.85rem; }
  .req-note { color:#6b7280; font-size:.9rem; margin-top:.25rem; }
  .tip { border:1px dashed #fcb85f; background: #ffe3a6; color:black; border-radius:12px; padding:.75rem .9rem; display:flex; gap:.6rem; align-items:flex-start; }
  .tip i { margin-top:.15rem; }

  /* Vorgabe – kompakt (ersetzt die frühere req-box) */
  .req-compact { border:1px solid #e5e7eb; border-radius:12px; background:#fff; padding:10px 12px; }
  .req-compact .head { display:flex; align-items:center; justify-content:space-between; gap:.75rem; }
  .req-compact .title { font-weight:700; font-size:1rem; margin:0; }
  .req-compact .pills { display:flex; flex-wrap:wrap; gap:.4rem; }
  .req-compact .pill { display:inline-flex; align-items:center; gap:.4rem; padding:.2rem .5rem; border:1px solid #e5e7eb; background:#f9fafb; border-radius:999px; font-size:.85rem; white-space:nowrap; }
  .req-compact .count { font-weight:700; color:#1f2937; background:#eef2ff; border:1px solid #e0e7ff; padding:.05rem .45rem; border-radius:999px; }
  .req-compact details { margin-top:.5rem; }
  .req-compact summary { cursor:pointer; list-style:none; display:flex; align-items:center; gap:.5rem; color:#374151; font-size:.9rem; }
  .req-compact summary::-webkit-details-marker { display:none; }
  .req-compact .list { margin:.5rem 0 0 0; padding:0; display:grid; grid-template-columns:1fr 1fr; gap:.4rem .5rem; }
  .req-compact .row { display:flex; align-items:center; justify-content:space-between; gap:.5rem; padding:.35rem .5rem; border:1px dashed #e5e7eb; border-radius:8px; background:#fcfcfd; }
  .req-compact .name { overflow:hidden; text-overflow:ellipsis; }
  /* Responsive tweaks for mobile */
  @media (max-width: 576px) {
    .thumb-img-wrap { height: 160px; }
    .thumb-head { padding: .4rem .6rem; }
    .thumb-actions .btn-icon { padding: .2rem .35rem; }
  }

  /* Pflichtfotos */
  .pflicht-group { margin-bottom: 1.25rem; }
  .pflicht-group-title { font-size: .8rem; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: #6b7280; margin: 0 0 .45rem; }
  .pflicht-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: .45rem; }
  @media (max-width: 767px) {
    .pflicht-grid {
        gap: 1.3rem .45rem;
    }
}
  @media (min-width: 480px) { .pflicht-grid { grid-template-columns: repeat(3, 1fr); } }
  @media (min-width: 768px) { .pflicht-grid { grid-template-columns: repeat(4, 1fr); } }
  .pflicht-slot { border: 1.5px solid #e5e7eb; border-radius: 10px; background: #fff; overflow: hidden; display: flex; flex-direction: column; }
  .pflicht-slot.has-photos { border-color: #22c55e; }
  .pflicht-slot-head { display: flex; align-items: center; justify-content: space-between; gap: .3rem; padding: .35rem .5rem; background: #f9fafb; border-bottom: 1px solid #eef2f7; }
  .slot-name { font-size: .75rem; font-weight: 600; color: #374151; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
  .slot-badge { font-size: .7rem; font-weight: 700; border-radius: 999px; padding: .1rem .4rem; flex-shrink: 0; }
  .slot-badge.badge-empty { background: #f3f4f6; color: #9ca3af; border: 1px solid #e5e7eb; }
  .slot-badge.badge-done  { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
  .pflicht-thumbs { display: flex; flex-wrap: wrap; gap: .25rem; padding: .35rem; }
  .pflicht-thumb { position: relative; width: 52px; height: 52px; border-radius: 6px; overflow: hidden; flex-shrink: 0; }
  .pflicht-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
  .pt-rm { position: absolute; top: 1px; right: 1px; width: 17px; height: 17px; background: rgba(0,0,0,.7); color: #fff; border: none; border-radius: 999px; font-size: .75rem; line-height: 1; cursor: pointer; display: flex; align-items: center; justify-content: center; padding: 0; }
  .pflicht-add-btn { display: flex; align-items: center; justify-content: center; gap: .35rem; padding: .4rem .5rem; margin: .35rem; border: 1.5px dashed #d1d5db; border-radius: 8px; cursor: pointer; font-size: .78rem; color: #6b7280; background: #f9fafb; transition: border-color .15s, background .15s; }
  .pflicht-add-btn:hover { border-color: #2563eb; color: #2563eb; background: #eff6ff; }
  .pt-spinner { text-align: center; padding: .3rem; }
  #photo-dropzone {
    border: 2px dashed #d6dbe1 !important;
    background: #fafbfc;
    transition: all .2s ease;
}

#photo-dropzone:hover {
    border-color: var(--bs-primary) !important;
    background: #f8fbff;
}

#photo-dropzone.dz-drag-hover {
    border-color: var(--bs-primary) !important;
    background: #eef6ff;
}

.pflicht-thumb {
    position: relative;
    width: 85px;
    height: 85px;
    border-radius: 6px;
    overflow: hidden;
    flex-shrink: 0;
}
@media (max-width: 767px) {

    .container-fluid.page-bg {
        padding-left: 0px;
        padding-right: 0px;
    }

    .card-modern {
        border: 0 !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        background: transparent;
    }

    .card-modern > .card-header,
    .card-modern > .card-body {
        background: #fff;
        border-radius: 12px;
    }
}

/* @media (max-width: 767px) {
    .pflicht-grid {
        grid-template-columns: 1fr !important;
    }

    .pflicht-slot {
        width: 100% !important;
    }

    .pflicht-placeholder,
    .pflicht-thumb {
        width: 100% !important;
        height: auto !important;
        aspect-ratio: 4 / 3;
    }
} */
</style>

<div class="container-fluid page-bg py-3 py-md-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-9 col-xxl-8 form-max-650">

      {{-- Link oben: Speichern & zurück zum Hauptmenü (Back-Formular) --}}
      <form method="POST" action="{{ route('examination.store') }}" id="externalConditionForm" class="d-none" novalidate>
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="form" value="save-back">
        <input type="hidden" name="next_url" value="{{ route('examiner.order', ['id' => $id]) }}">
      </form>
      <div class="my-2 d-flex align-items-center justify-content-between flex-wrap gap-2">
        <button type="button" class="js-save-back fw-semibold d-inline-block py-1 pb-3" style="color: var(--primary); text-decoration: none; background: transparent; border: 0;">
          <i class="fa-solid fa-arrow-left me-2"></i> Speichern &amp; zurück zum Hauptmenü
        </button>
      </div>

      <div class="card card-modern">
        <div class="card-header border-0 p-4 pb-3">
          <h1 class="h4 mb-1">Bilder & Dokumente</h1>
        </div>

        <div class="card-body p-4 pt-3">
    @if(auth()->check() && in_array(auth()->user()->type ?? null, ['admin', 'staff']))
    <div class="d-flex flex-column flex-md-row gap-2 mb-4 justify-content-center">
        
        <a href="{{ route('examination.images.zip', $examination->order_id) }}"
           class="btn btn-primary d-inline-flex align-items-center justify-content-center">
            ZIP herunterladen
        </a>

        <a href="{{ route('examiner.generate.photo.pdf', $id) }}"
           class="btn btn-primary d-inline-flex align-items-center justify-content-center">
            <i class="fa-solid fa-file-image me-2"></i>
            PDF erstellen
        </a>

    </div>
    @endif
          <!-- {{-- Vorgabe (kompakt) --}}
          <div class="req-compact mb-3" aria-label="Fotovorgaben">
                          <p class="title">Vorgabe</p>
            <div class="head">
              <div class="pills" aria-hidden="true">
                <span class="pill"><span class="name">Außen</span><span class="count">10×</span></span>
                <span class="pill"><span class="name">Innen</span><span class="count">10×</span></span>
                <span class="pill"><span class="name">Reifen</span><span class="count">4×</span></span>
                <span class="pill"><span class="name">FIN/VIN</span><span class="count">1×</span></span>
                <span class="pill"><span class="name">KM-Stand</span><span class="count">1×</span></span>
                <span class="pill"><span class="name">Motorraum</span><span class="count">1×</span></span>
                <span class="pill"><span class="name">Schäden</span><span class="count">nach Bedarf</span></span>
              </div>
            </div>
          </div> -->

          <div class="alert alert-warning border-0 shadow-sm mb-4">
              <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                  <div>
                      <i class="fa-solid fa-camera me-2"></i>
                      Bitte Fotos nur im <b>Querformat</b> aufnehmen
                  </div>

                  <div class="d-flex gap-2">
                      <div class="border rounded px-3 py-2 bg-white text-success small fw-bold">
                          ✓ ▭
                      </div>

                      <div class="border rounded px-3 py-2 bg-white text-danger small fw-bold">
                          ✕ ▯
                      </div>
                  </div>
              </div>
          </div>
        

          {{-- Pflichtfotos --}}
          @php
            $pflichtDefs = [
              'Außen' => [
              ['key'=>'pflicht:front',       'label'=>'Frontansicht'],
              ['key'=>'pflicht:front_left',  'label'=>'Vorne Links (Diag.)'],

              ['key'=>'pflicht:left',        'label'=>'Linke Seite'],
              ['key'=>'pflicht:rear_left',   'label'=>'Hinten Links (Diag.)'],

              ['key'=>'pflicht:rear',        'label'=>'Heckansicht'],
              ['key'=>'pflicht:rear_right',  'label'=>'Hinten Rechts (Diag.)'],

              ['key'=>'pflicht:right',       'label'=>'Rechte Seite'],
              ['key'=>'pflicht:front_right', 'label'=>'Vorne Rechts (Diag.)'],

              ['key'=>'pflicht:roof',        'label'=>'Dach'],
              ['key'=>'pflicht:underbody',   'label'=>'Unterboden'],

              ['key'=>'pflicht:engine',      'label'=>'Motorraum'],
              ['key'=>'pflicht:vin',         'label'=>'FIN'],
          ],

          'Räder' => [
              ['key'=>'pflicht:tire_fl', 'label'=>'Rad Vorne Links'],
              ['key'=>'pflicht:tire_rl', 'label'=>'Rad Hinten Links'],
              ['key'=>'pflicht:tire_rr', 'label'=>'Rad Hinten Rechts'],
              ['key'=>'pflicht:tire_fr', 'label'=>'Rad Vorne Rechts'],
          ],

          'Innen' => [
              ['key'=>'pflicht:driver_seat',    'label'=>'Sitz Vorne Links'],
              ['key'=>'pflicht:footwell',       'label'=>'Fußraum'],
              ['key'=>'pflicht:cockpit',        'label'=>'Cockpit'],
              ['key'=>'pflicht:steering',       'label'=>'Lenkrad'],
              ['key'=>'pflicht:odometer',       'label'=>'Kilometerstand'],
              ['key'=>'pflicht:gear',           'label'=>'Schaltung'],

              ['key'=>'pflicht:rear_seat_l',    'label'=>'Sitz Hinten Links'],
              ['key'=>'pflicht:trunk',          'label'=>'Kofferraum'],

              ['key'=>'pflicht:rear_seat_r',    'label'=>'Sitz Hinten Rechts'],
              ['key'=>'pflicht:passenger_seat', 'label'=>'Sitz Vorne Rechts'],
              ['key'=>'pflicht:headliner',      'label'=>'Dachhimmel'],
              
          ],
              // 'FIN / VIN' => [
              //
              // ],
              //
              // 'KM-Stand' => [
              //
              // ],
              //
              // 'Motorraum' => [
              //
              // ],
            ];
            $pflichtPhotos = \App\Models\ExaminationImage::where('examination_id', $examination->id)
              ->where('document_type', 'Pflichtfoto')
              ->get()
              ->groupBy('damage_component');
          @endphp
          <div class="mb-4" id="pflicht-section">
            @foreach($pflichtDefs as $groupName => $slots)
            <div class="pflicht-group">
              <p class="pflicht-group-title">{{ $groupName }}</p>
              <div class="pflicht-grid">
                @foreach($slots as $slot)
                @php
                  $slotKey    = $slot['key'];
                  $domKey     = str_replace(':', '-', $slotKey);
                  $slotPhotos = $pflichtPhotos->get($slotKey, collect());
                  $photoCount = count($slotPhotos);
                @endphp
                <div class="pflicht-slot{{ $photoCount > 0 ? ' has-photos' : '' }}"
                     data-slot-key="{{ $slotKey }}"
                     id="slot-{{ $domKey }}">
                  <div class="pflicht-slot-head">
                    <span class="slot-name" title="{{ $slot['label'] }}">{{ $slot['label'] }}</span>
                    <span class="slot-badge {{ $photoCount > 0 ? 'badge-done' : 'badge-empty' }}"
                          id="slot-count-{{ $domKey }}">{{ $photoCount > 0 ? $photoCount : '—' }}</span>
                  </div>
                  <div class="pflicht-thumbs" id="slot-thumbs-{{ $domKey }}">
                    @foreach($slotPhotos as $sPhoto)
                    <div class="pflicht-thumb" id="pt-{{ $sPhoto->id }}">
                      <img src="{{ $sPhoto->image1 }}" alt="">
                      <button type="button" class="pt-rm"
                              data-id="{{ $sPhoto->id }}"
                              data-slot-key="{{ $slotKey }}"
                              title="Entfernen">×</button>
                    </div>
                    @endforeach
                  </div>
                  <label class="pflicht-add-btn {{ $photoCount > 0 ? 'd-none' : '' }}">
                    <i class="fa-solid fa-camera"></i>
                    <input type="file" accept="image/*" multiple
                           class="js-pflicht-input visually-hidden"
                           data-slot-key="{{ $slotKey }}"
                           data-slot-label="{{ $slot['label'] }}"
                           data-order-id="{{ $id }}"
                           data-upload-url="{{ route('examination.store.images') }}"
                           data-csrf="{{ csrf_token() }}">
                  </label>
                  <div class="d-none pt-spinner" id="slot-spin-{{ $domKey }}">
                    <span class="spinner-border spinner-border-sm text-primary"></span>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @endforeach
          </div>
          <hr class="mb-4">

          {{-- Tipp --}}
<div class="card border-0 bg-light mb-3">
    <div class="card-body py-3">
        <h6 class="mb-1">
            <i class="fa-solid fa-images me-2"></i>
            Sonstige Bilder
        </h6>
        <small class="text-muted">
            Bilder, die keiner der oben genannten Kategorien zugeordnet werden können. Maximal 20 Bilder.
        </small>
    </div>
</div>

        {{-- Sonstige Bilder --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">

        <form class="dropzone border-2 rounded-3" id="photo-dropzone"
              action="{{ route('examination.store.images') }}"
              method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="photo">

            <div class="dz-message py-2">
                <div class="mb-3">
                    <i class="fa-solid fa-cloud-arrow-up fa-3x text-primary"></i>
                </div>

                <h6 class="fw-semibold mb-2">
                    Sonstige Bilder hochladen
                </h6>

                <p class="text-muted mb-3">
                    Dateien hierher ziehen oder zum Auswählen klicken
                </p>

                <button type="button"
                        class="btn btn-primary px-4 upload-btn">
                    <i class="fa-solid fa-image me-2"></i>
                    Bilder auswählen
                </button>

                <div class="small text-muted mt-3">
                    Unterstützte Formate: JPG, JPEG, PNG | Max. 20 Bilder
                </div>
            </div>
        </form>
    </div>
</div>

          <hr><br>
<div class="card border-0 bg-light mb-3">
    <div class="card-body py-3">
        <h6 class="mb-1">
            <i class="fa-solid fa-file-image me-2"></i>
             Dokumente hochladen
        </h6>
        <small class="text-muted">
            Diagnoseberichte, Fahrzeugdokumente, Lackmessberichte und weitere Unterlagen.
        </small>
    </div>
</div>
        <div class="card border-0 shadow-sm mb-4">
    <div class="card-body">



        <div class="mb-3">
            <label class="form-label fw-semibold">Dokumenttyp</label>

            <select name="document_type"
                  id="document_type"
                  class="form-select">
              <option value="" selected disabled>Bitte auswählen …</option>
              <option value="Diagnose">Diagnosebericht</option>
              <option value="Lackmessung">Lackmessbericht</option>
              <option value="Dokumente">Fahrzeugdokumente</option>

              @if(auth()->check() && in_array(auth()->user()->type ?? null, ['admin', 'staff']))
                  <option value="FIN-Abfrage">FIN-Abfrage</option>
                  <option value="Kalkulation">Kalkulation</option>
                  <option value="Fotodokumentation">Fotodokumentation</option>
                  <option value="E-Batterie Zertifikat">E-Batterie Zertifikat</option>
                  <option value="Schadensbilder USA">Schadensbilder USA</option>
                  <option value="Wohnmobil-Zusatz">Wohnmobil-Zusatz</option>
                  <option value="Marktanalyse">Marktanalyse</option>
              @endif

              <option value="Sonstiges">Sonstiges</option>
          </select>

            <div id="type-hint" class="small text-warning mt-2">
                <i class="fa-solid fa-circle-info me-1"></i>
                Bitte zuerst einen Dokumenttyp auswählen.
            </div>
        </div>

        <form method="POST"
              id="doc-dropzone"
              class="dropzone border-2 rounded-3"
              action="{{ route('examination.store.documents') }}"
              enctype="multipart/form-data"
              novalidate>

            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="documents">

            <div class="dz-message py-3">

                <div class="mb-2">
                    <i class="fa-solid fa-file-arrow-up fa-2x text-primary"></i>
                </div>

                <h6 class="fw-semibold mb-1">
                    Dokumente hochladen
                </h6>

                <p class="text-muted mb-2">
                    Dateien hierher ziehen oder klicken
                </p>

                <button type="button"
                        id="doc-clickable"
                        class="btn btn-primary upload-btn disabled"
                        aria-disabled="true">
                    <i class="fa-solid fa-file-arrow-up me-2"></i>
                    Dateien auswählen
                </button>

            </div>
        </form>

    </div>

    </div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const select = document.getElementById("document_type");
    const uploadBtn = document.getElementById("doc-clickable");
    const hint = document.getElementById("type-hint");

    select.addEventListener("change", function() {
      if (this.value) {
        uploadBtn.classList.remove("disabled");
        uploadBtn.removeAttribute("aria-disabled");
        hint.style.display = "none";
      } else {
        uploadBtn.classList.add("disabled");
        uploadBtn.setAttribute("aria-disabled", "true");
        hint.style.display = "block";
      }
    });
  });
</script>
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">

         {{-- Liste PDFs --}}
            <div class="mt-1 mb-2" id="docs-section">
              <h2 class="h6 mb-2">Hochgeladene Dokumente</h2>
              @if(!empty($documents) && count($documents))
                <div class="d-flex flex-column gap-2" id="docs-list">
                @foreach($documents as $doc)
                  @php
                    $displayName = $doc->filename
                      ?? (isset($doc->original_name) ? $doc->original_name : basename(parse_url(($doc->file_url ?? ($doc->path ?? $doc->image ?? 'Dokument.pdf')), PHP_URL_PATH)));
                  @endphp
                    <div class="doc-item" data-doc-id="{{ $doc->id }}">
                      <span class="sort-handle me-2" title="Ziehen zum Sortieren"><i class="fa-solid fa-grip-vertical"></i></span>
                      <div class="doc-name">
                        <i class="fa-solid fa-file-lines text-primary"></i>
                        @php $dtype = $doc->document_type ?? (\Illuminate\Support\Str::endsWith(strtolower($doc->image ?? ''), '.pdf') ? 'pdf' : 'document'); @endphp
                        <span class="badge bg-light text-dark me-2" style="border:1px solid #e5e7eb;">{{ strtoupper($dtype) }}</span>
                        <!-- <span class="doc-text" title="{{ $displayName }}">{{ $displayName }}</span> -->
                      </div>
                      <div class="d-flex align-items-center gap-3">
                        <a href="{{ $doc->image1 }}" class="text-decoration-none" target="_blank" rel="noopener">
                          <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Öffnen
                        </a>
                        <a href="{{ route('examination.delete.document', $doc->id) }}" class="text-danger" title="Löschen">
                          <i class="fa-solid fa-trash-can"></i>
                        </a>
                      </div>
                    </div>
                  @endforeach
                </div>
              @else
                <div class="alert alert-secondary mb-0" role="alert" id="docs-empty">Noch keine Dokumente vorhanden.</div>
              @endif
            </div>
          </div>
          </div>
          



          {{-- Bilder – größeres Grid + Aktionen --}}
          <div class="mt-4" id="images-section">
             <div class="d-grid mb-2">
  <button type="button" class="js-save-back btn btn-primary w-100  d-inline-flex align-items-center justify-content-center">
    <i class="fa-solid fa-arrow-left me-2"></i> Speichern &amp; zurück zum Hauptmenü
  </button>
</div><br>
            <hr><br>
            <h2 class="h4 mb-2">Hochgeladene Bilder</h2>
            <div class="d-flex align-items-center gap-3 mb-3" id="images-bulk-toolbar" {{ empty($images) ? 'style=display:none' : '' }}>
              <div class="form-check mb-0">
                <input class="form-check-input" type="checkbox" id="select-all-images">
                <label class="form-check-label" for="select-all-images">Alle auswählen</label>
              </div>
              <button type="button" class="btn btn-sm btn-danger" id="delete-selected-images" disabled>
                <i class="fa-solid fa-trash-can me-1"></i> Ausgewählte löschen
              </button>
            </div>

            @if(!empty($images) && count($images))
              <div class="row g-3" id="images-grid">
                @foreach($images as $image)
                  <div class="col-6 col-md-6 sortable-item"> {{-- 2 pro Reihe auf sm, 2 auf md --}}
                    <div class="thumb" data-image-id="{{ $image->id }}">
                      <div class="thumb-head">
                        <div class="d-flex align-items-center gap-2">
                          <input class="form-check-input img-select" type="checkbox" data-id="{{ $image->id }}">
                          <span class="sort-handle" title="Ziehen zum Sortieren"><i class="fa-solid fa-grip-vertical"></i></span>
                        </div>
                        <div class="thumb-actions">
                          {{-- Löschen --}}
                          <a href="{{ route('examination.delete.image', $image->id) }}" class="text-danger btn-icon" title="Löschen">
                            <i class="fa-solid fa-trash-can"></i>
                          </a>
                        </div>
                      </div>
                      <div class="thumb-img-wrap">
                        <img src="{{ $image->image1 }}" alt="Bild {{ $loop->iteration }}">
                      </div>
                      <div class="thumb-caption">{{ $image->caption ?: ($image->document_type ?? "") }}</div>
                    </div>
                  </div>
                @endforeach
              </div>
            @else
              <div class="alert alert-secondary mb-0" role="alert" id="images-empty">
                Noch keine Bilder vorhanden. Füge das erste Bild über „Bilder auswählen und einfügen“ hinzu.
              </div>
            @endif
          </div>
        </div>

      <div class="d-grid mb-4">
  <button type="button" style="max-width: 90%; margin: 0 auto" class="js-save-back btn btn-primary d-inline-flex align-items-center justify-content-center">
    <i class="fa-solid fa-arrow-left me-2"></i> Speichern &amp; zurück zum Hauptmenü
  </button>
      </div>
      </div>

    </div>
  </div>
</div>


@endsection

@section('scripts')
{{-- Assets: Dropzone + jQuery UI Sortable (CDN) --}}
<script>window.Dropzone = window.Dropzone || {}; window.Dropzone.autoDiscover = false;</script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<script>
  // -------- Dropzone Setup for Images & Documents --------
  document.addEventListener('DOMContentLoaded', function(){
    if (window.Dropzone) {
      Dropzone.autoDiscover = false;

      const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

      // Photos Dropzone
      const photoEl = document.getElementById('photo-dropzone');
      if (photoEl) {
        const dzOpts = {
          url: photoEl.getAttribute('action'),
          headers: { 'X-CSRF-TOKEN': csrf, 'X-Requested-With': 'XMLHttpRequest' },
          paramName: 'photos[]',
          acceptedFiles: 'image/*',
          clickable: '#photo-dropzone .btn',
          addRemoveLinks: true,
          parallelUploads: 2,
          autoProcessQueue: true,
          timeout: 0,
        };
        // German localization
        dzOpts.dictDefaultMessage = 'Dateien hier ablegen oder klicken';
        dzOpts.dictRemoveFile = 'Entfernen';
        dzOpts.dictCancelUpload = 'Abbrechen';
        dzOpts.dictInvalidFileType = 'Ungültiger Dateityp.';
        dzOpts.dictFileTooBig = 'Datei ist zu groß.';
        const photoDz = photoEl.dropzone || new Dropzone(photoEl, dzOpts);
        // Ensure settings if auto-attached earlier
        photoDz.options.autoProcessQueue = true;
        photoDz.options.paramName = 'photos[]';
        photoDz.options.clickable = '#photo-dropzone .btn';

        // append required form fields
        photoDz.on('sending', function(file, xhr, formData){
          formData.append('id', '{{ $id }}');
          formData.append('form', 'photo');
          formData.append('_token', csrf);
        });

        // refresh grid after success and store ids for remove
        photoDz.on('success', function(file, response){
          try {
            let payload = response;
            if (typeof payload === 'string') { try { payload = JSON.parse(payload); } catch(e) {} }
            const items = (payload && payload.items) ? payload.items : [];
            try { file._serverIds = items.map(function(it){ return it.id; }); } catch(e) {}
            // if this file originated from doc dropzone, attach ids back
            if (file._docOrigin && items && items.length) {
              try { file._docOrigin._imgServerIds = (file._docOrigin._imgServerIds||[]).concat(items.map(function(it){ return it.id; })); } catch(e) {}
            }
            refreshImagesGrid();
          } catch(e) {}
        });

        photoDz.on('removedfile', function(file){
          if (!file || !file._serverIds) return;
          try {
            file._serverIds.forEach(function(id){
              // remove from UI list if present
              const el = document.querySelector('.thumb[data-image-id="' + id + '"]');
              if (el && el.parentNode) el.parentNode.remove();
              // hit server delete
              $.ajax({ url: '{{ url('examiner/examination-delete-image') }}/' + id, method: 'GET' });
            });
          } catch(e) {}
        });
      }

      // Documents Dropzone
      const docEl = document.getElementById('doc-dropzone');
      const docTypeSel = document.getElementById('document_type');
      if (docEl) {
        // enqueue image files from docs to the photo dropzone as well
        function enqueueToPhotoDropzone(originFile){
          if (!photoEl || !photoEl.dropzone) return;
          if (!originFile || !(originFile.type||'').startsWith('image/')) return;
          try {
            const blob = originFile.slice(0, originFile.size, originFile.type);
            const clone = new File([blob], originFile.name, { type: originFile.type, lastModified: originFile.lastModified });
            clone._docOrigin = originFile; // link so we can clean up on doc removal
            photoEl.dropzone.addFile(clone);
          } catch(e) {}
        }
        const dzDocOpts = {
          url: docEl.getAttribute('action'),
          headers: { 'X-CSRF-TOKEN': csrf, 'X-Requested-With': 'XMLHttpRequest' },
          paramName: 'pdfs[]',
          // Accept common documents and images; auto-classify server-side
          acceptedFiles: '.pdf,.doc,.docx,.xls,.xlsx,.csv,image/*',
          clickable: '#doc-dropzone .btn',
          addRemoveLinks: true,
          parallelUploads: 5,
          timeout: 0,
          accept: function(file, done){
            // Only require a document type for non-image files
            const isImage = (file.type || '').startsWith('image/');
            if (!isImage && (!docTypeSel || !docTypeSel.value)) return done('Bitte zuerst einen Dokumenttyp auswählen.');
            done();
          }
        };
        // German localization
        dzDocOpts.dictDefaultMessage = 'Dateien hier ablegen oder klicken';
        dzDocOpts.dictRemoveFile = 'Entfernen';
        dzDocOpts.dictCancelUpload = 'Abbrechen';
        dzDocOpts.dictInvalidFileType = 'Ungültiger Dateityp.';
        dzDocOpts.dictFileTooBig = 'Datei ist zu groß.';
        const docDz = docEl.dropzone || new Dropzone(docEl, dzDocOpts);

        docDz.on('sending', function(file, xhr, formData){
          formData.append('id', '{{ $id }}');
          formData.append('form', 'documents');
          formData.append('document_type', (docTypeSel && docTypeSel.value) ? docTypeSel.value : 'Sonstiges');
        });

        docDz.on('error', function(file, message){
          try { if (window.toastr) toastr.error('', (typeof message === 'string' ? message : 'Ungültige Datei')); } catch(e){}
        });

        docDz.on('success', function(file, response){
          try {
            let payload = response;
            if (typeof payload === 'string') {
              try { payload = JSON.parse(payload); } catch(e) {}
            }
            const items = (payload && payload.items) ? payload.items : [];
            let hasImage = false;
            items.forEach(function(it){ if (it && it.is_image) hasImage = true; else appendDocItem(it); });
            // If server already stored image, just refresh; otherwise enqueue to photo dropzone
            if (hasImage) { refreshImagesGrid(); }
            else if ((file.type || '').startsWith('image/')) { enqueueToPhotoDropzone(file); }
            try { file._serverItems = items; } catch(e) {}
          } catch (e) { /* ignore */ }
        });

        docDz.on('removedfile', function(file){
          if (!file || !file._serverItems) return;
          try {
            file._serverItems.forEach(function(it){
              if (!it || !it.id) return;
              if (it.is_image) {
                const el = document.querySelector('.thumb[data-image-id="' + it.id + '"]');
                if (el && el.parentNode) el.parentNode.remove();
                $.ajax({ url: '{{ url('examination-delete-image') }}/' + it.id, method: 'GET' });
              } else {
                const el = document.querySelector('.doc-item[data-doc-id="' + it.id + '"]');
                if (el && el.parentNode) el.parentNode.remove();
                $.ajax({ url: '{{ url('examination-delete-document') }}/' + it.id, method: 'GET' });
              }
            });
            // Also remove any images we explicitly uploaded to the photos endpoint
            if (file._imgServerIds && file._imgServerIds.length) {
              file._imgServerIds.forEach(function(id){
                const el = document.querySelector('.thumb[data-image-id="' + id + '"]');
                if (el && el.parentNode) el.parentNode.remove();
                $.ajax({ url: deleteImageBase + id, method: 'GET' });
              });
            }
          } catch(e) {}
        });
      }
    }

    function initImagesSortable(){
      const $grid = $('#images-grid');
      if (!$grid.length) return;
      try { $grid.sortable('destroy'); } catch(e) {}
      try {
        $grid.sortable({
          items: '> .sortable-item',
          handle: '.sort-handle',
          placeholder: 'ui-sortable-placeholder',
          helper: 'clone',
          forcePlaceholderSize: true,
          tolerance: 'pointer',
          delay: 120,
          cancel: '',
          start: function(e, ui){ ui.placeholder.height(ui.item.height()); ui.placeholder.width(ui.item.width()); },
          update: function(){
            const ids = [];
            $('#images-grid > .sortable-item .thumb').each(function(){
              const id = $(this).data('image-id');
              if (id) ids.push(id);
            });
            if (!ids.length) return;
            $.ajax({
              url: '{{ route('examination.sort.images') }}',
              method: 'POST',
              headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              data: { ids: ids, examination_id: '{{ $examination->id ?? 0 }}' },
              success: function(){ try { if (window.toastr) toastr.success('', 'Reihenfolge gespeichert'); } catch(e) {} },
              error: function(){ try { if (window.toastr) toastr.error('', 'Sortierung speichern fehlgeschlagen'); } catch(e) {} }
            });
          }
        });
      } catch(e) {}
    }

    function initDocsSortable(){
      const $list = $('#docs-list');
      if (!$list.length) return;
      try { $list.sortable('destroy'); } catch(e) {}
      try {
        $list.sortable({
          items: '> .doc-item',
          handle: '.sort-handle',
          placeholder: 'ui-sortable-placeholder',
          helper: 'clone',
          forcePlaceholderSize: true,
          tolerance: 'pointer',
          delay: 120,
          cancel: '',
          start: function(e, ui){ ui.placeholder.height(ui.item.height()); ui.placeholder.width(ui.item.width()); },
          update: function(){
            const ids = [];
            $('#docs-list > .doc-item').each(function(){
              const id = $(this).data('doc-id');
              if (id) ids.push(id);
            });
            if (!ids.length) return;
            $.ajax({
              url: '{{ route('examination.sort.documents') }}',
              method: 'POST',
              headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              data: { ids: ids, examination_id: '{{ $examination->id ?? 0 }}' },
              success: function(){ try { if (window.toastr) toastr.success('', 'Reihenfolge gespeichert'); } catch(e) {} },
              error: function(){ try { if (window.toastr) toastr.error('', 'Sortierung speichern fehlgeschlagen'); } catch(e) {} }
            });
          }
        });
      } catch(e) {}
    }

    // initialize on load if present
    initImagesSortable();
    initDocsSortable();

    // Editing disabled — no image editor

    // -------- Selection + bulk delete (jQuery) --------
    window.bindImageSelectionHandlers = function(){
      const $grid = $('#images-grid');
      const $selectAll = $('#select-all-images');
      const $deleteBtn = $('#delete-selected-images');
      if (!$grid.length) return;

      function updateToolbarState(){
        const $checks = $grid.find('.img-select');
        const total = $checks.length;
        const selected = $checks.filter(':checked').length;
        $deleteBtn.prop('disabled', selected === 0);
        if (total > 0) {
          $selectAll.prop('indeterminate', selected > 0 && selected < total);
          $selectAll.prop('checked', selected > 0 && selected === total);
        } else {
          $selectAll.prop('indeterminate', false).prop('checked', false);
        }
      }

      // Individual checkbox
      $grid.off('change.imgsel').on('change.imgsel', '.img-select', function(){
        updateToolbarState();
      });

      // Select all
      $selectAll.off('change.imgsel').on('change.imgsel', function(){
        const check = $(this).is(':checked');
        $grid.find('.img-select').prop('checked', check);
        updateToolbarState();
      });

      // Bulk delete
      $deleteBtn.off('click.imgsel').on('click.imgsel', function(){
        const ids = $('#images-grid .img-select:checked').map(function(){ return $(this).data('id'); }).get();
        if (!ids.length) return;
        if (!confirm('Ausgewählte Bilder wirklich löschen?')) return;
        const requests = ids.map(function(id){ return $.ajax({ url: deleteImageBase + id, method: 'GET' }); });
        $.when.apply($, requests).always(function(){ refreshImagesGrid(); $selectAll.prop('checked', false).prop('indeterminate', false); $('#delete-selected-images').prop('disabled', true); });
      });

      updateToolbarState();
    };

    // bind on initial DOM
    if (document.getElementById('images-grid')) { bindImageSelectionHandlers(); }
  });

  // ------- Live insert helpers -------
  const deleteImageBase = "{{ rtrim(url('/'), '/') }}/examiner/examination-delete-image/";
  const deleteDocBase   = "{{ rtrim(url('/'), '/') }}/examiner/examination-delete-document/";

  function ensureImagesGrid(){
    let grid = document.getElementById('images-grid');
    if (!grid) {
      const section = document.getElementById('images-section');
      grid = document.createElement('div');
      grid.className = 'row g-3';
      grid.id = 'images-grid';
      const empty = document.getElementById('images-empty');
      if (empty && empty.parentNode) {
        empty.parentNode.insertBefore(grid, empty);
        empty.remove();
      } else if (section) {
        section.appendChild(grid);
      }
    }
    // (re)init sortable if needed
    if (typeof $ !== 'undefined' && $.fn && $.fn.sortable) {
      const $grid = $('#images-grid');
      if ($grid.length && $grid.data('ui-sortable')) { try { $grid.sortable('destroy'); } catch(e) {} }
      if ($grid.length) { try { $grid.sortable({ items: '> [class*="col-"]', handle: '.sort-handle', placeholder: 'ui-sortable-placeholder', forcePlaceholderSize:true, tolerance:'pointer' }); } catch(e) {} }
    }
    return grid;
  }

  function appendImageItem(item){
    if (!item || !item.id || !item.image1) return;
    const grid = ensureImagesGrid();
    // ensure bulk toolbar visible
    const toolbar = document.getElementById('images-bulk-toolbar');
    if (toolbar) toolbar.style.display = '';
    const col = document.createElement('div');
    col.className = 'col-6 col-md-6 sortable-item';
    col.innerHTML = `
      <div class="thumb" data-image-id="${item.id}">
        <div class="thumb-head">
          <div class="d-flex align-items-center gap-2">
            <input class="form-check-input img-select" type="checkbox" data-id="${item.id}">
            <span class="sort-handle" title="Ziehen zum Sortieren"><i class="fa-solid fa-grip-vertical"></i></span>
          </div>
          <div class="thumb-actions">
            <a href="${deleteImageBase + item.id}" class="text-danger btn-icon" title="Löschen">
              <i class="fa-solid fa-trash-can"></i>
            </a>
          </div>
        </div>
        <div class="thumb-img-wrap">
          <img src="${item.image1}" alt="Neu">
        </div>
      </div>`;
    grid.prepend(col);
  }

  function ensureDocsList(){
    let list = document.getElementById('docs-list');
    if (!list) {
      const section = document.getElementById('docs-section');
      list = document.createElement('div');
      list.className = 'd-flex flex-column gap-2';
      list.id = 'docs-list';
      const empty = document.getElementById('docs-empty');
      if (empty && empty.parentNode) {
        empty.parentNode.insertBefore(list, empty);
        empty.remove();
      } else if (section) {
        section.appendChild(list);
      }
    }
    if (typeof $ !== 'undefined' && $.fn && $.fn.sortable) {
      const $list = $('#docs-list');
      if ($list.length && $list.data('ui-sortable')) { try { $list.sortable('destroy'); } catch(e) {} }
      if ($list.length) { try { $list.sortable({ items: '> .doc-item', handle: '.sort-handle', placeholder: 'ui-sortable-placeholder', forcePlaceholderSize:true, tolerance:'pointer' }); } catch(e) {} }
    }
    return list;
  }

  function appendDocItem(item){
    if (!item || !item.id || !item.image1) return;
    const list = ensureDocsList();
    const dtype = (item.document_type || '').toString();
    const badge = (dtype !== '') ? dtype.toUpperCase() : 'DOCUMENT';
    const row = document.createElement('div');
    row.className = 'doc-item';
    row.setAttribute('data-doc-id', item.id);
    row.innerHTML = `
      <span class="sort-handle me-2" title="Ziehen zum Sortieren"><i class="fa-solid fa-grip-vertical"></i></span>
      <div class="doc-name">
        <i class="fa-solid fa-file-lines text-primary"></i>
        <span class="badge bg-light text-dark me-2" style="border:1px solid #e5e7eb;">${badge}</span>
      </div>
      <div class="d-flex align-items-center gap-3">
        <a href="${item.image1}" class="text-decoration-none" target="_blank" rel="noopener">
          <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Öffnen
        </a>
        <a href="${deleteDocBase + item.id}" class="text-danger" title="Löschen">
          <i class="fa-solid fa-trash-can"></i>
        </a>
      </div>`;
    list.prepend(row);
  }

  // Rebuild images grid from server-sorted list
  function rebuildImagesGrid(items){
    const section = document.getElementById('images-section');
    let grid = document.getElementById('images-grid');
    if (!items || !items.length) {
      if (grid) grid.remove();
      const toolbar = document.getElementById('images-bulk-toolbar');
      if (toolbar) toolbar.style.display = 'none';
      if (!document.getElementById('images-empty')) {
        const empty = document.createElement('div');
        empty.className = 'alert alert-secondary mb-0';
        empty.id = 'images-empty';
        empty.setAttribute('role','alert');
        empty.textContent = 'Noch keine Bilder vorhanden. Füge das erste Bild über „Bilder auswählen und einfügen“ hinzu.';
        section && section.appendChild(empty);
      }
      return;
    }
    const toolbar = document.getElementById('images-bulk-toolbar');
    if (toolbar) toolbar.style.display = '';
    if (!grid) {
      grid = document.createElement('div');
      grid.className = 'row g-3';
      grid.id = 'images-grid';
      const empty = document.getElementById('images-empty');
      if (empty && empty.parentNode) { empty.parentNode.insertBefore(grid, empty); empty.remove(); }
      else if (section) { section.appendChild(grid); }
    }
    grid.innerHTML = '';
    items.forEach(function(item){
      const col = document.createElement('div');
      col.className = 'col-6 col-md-6 sortable-item';
      col.innerHTML = `
        <div class="thumb" data-image-id="${item.id}">
          <div class="thumb-head">
            <div class="d-flex align-items-center gap-2">
              <input class="form-check-input img-select" type="checkbox" data-id="${item.id}">
              <span class="sort-handle" title="Ziehen zum Sortieren"><i class="fa-solid fa-grip-vertical"></i></span>
            </div>
            <div class="thumb-actions">
              <a href="${deleteImageBase + item.id}" class="text-danger btn-icon" title="Löschen">
                <i class="fa-solid fa-trash-can"></i>
              </a>
            </div>
          </div>
          <div class="thumb-img-wrap">
            <img src="${item.image1}" alt="Bild">
          </div>
          ${(item.caption || item.document_type) ? `<div class="thumb-caption">${item.caption || item.document_type}</div>` : ''}
        </div>`;
      grid.appendChild(col);
    });
    if (typeof initImagesSortable === 'function') initImagesSortable();
    bindImageSelectionHandlers();
  }

  function refreshImagesGrid(){
    const url = '{{ route('examination.images.list', $id) }}';
    $.ajax({ url: url, method: 'GET' })
      .done(function(resp){ rebuildImagesGrid((resp && resp.items) ? resp.items : []); })
      .fail(function(){ /* ignore */ });
  }

  // -------- Pflichtfotos --------
  (function(){
    var deleteBase = '{{ url("examination-delete-image") }}/';

    function ptDomKey(k){ return k.replace(/:/g, '-'); }

    function makePtThumb(id, src, slotKey) {
      var wrap = document.createElement('div'); wrap.className = 'pflicht-thumb'; wrap.id = 'pt-' + id;
      var img = document.createElement('img'); img.src = src; img.alt = '';
      var btn = document.createElement('button'); btn.type = 'button'; btn.className = 'pt-rm';
      btn.setAttribute('data-id', String(id)); btn.setAttribute('data-slot-key', slotKey);
      btn.title = 'Entfernen'; btn.textContent = '×';
      bindPtRemove(btn);
      wrap.appendChild(img); wrap.appendChild(btn);
      return wrap;
    }

    function updateSlotCount(slotKey) {
  var dk     = ptDomKey(slotKey);
  var thumbs = document.getElementById('slot-thumbs-' + dk);
  var badge  = document.getElementById('slot-count-' + dk);
  var slot   = document.getElementById('slot-' + dk);

  if (!thumbs || !badge) return;

  var count = thumbs.querySelectorAll('.pflicht-thumb').length;

  badge.textContent = count > 0 ? String(count) : '—';
  badge.className   = 'slot-badge ' + (count > 0 ? 'badge-done' : 'badge-empty');

  if (slot) {
    slot.classList.toggle('has-photos', count > 0);

    var addBtn = slot.querySelector('.pflicht-add-btn');
    if (addBtn) {
      addBtn.classList.toggle('d-none', count > 0);
    }
  }
}

    function bindPtRemove(btn) {
      btn.addEventListener('click', function() {
        var id      = this.getAttribute('data-id');
        var slotKey = this.getAttribute('data-slot-key');
        var thumb   = document.getElementById('pt-' + id);
        if (!confirm('Foto entfernen?')) return;
        fetch(deleteBase + id, { method: 'GET', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
          .finally(function() { if (thumb) thumb.remove(); updateSlotCount(slotKey); });
      });
    }

    document.querySelectorAll('.pt-rm').forEach(function(btn) { bindPtRemove(btn); });

    document.querySelectorAll('.js-pflicht-input').forEach(function(input) {
      input.addEventListener('change', function() {
        var slotKey   = this.getAttribute('data-slot-key');
        var slotLabel = this.getAttribute('data-slot-label');
        var orderId   = this.getAttribute('data-order-id');
        var uploadUrl = this.getAttribute('data-upload-url');
        var csrf      = this.getAttribute('data-csrf');
        var dk        = ptDomKey(slotKey);
        var thumbsEl  = document.getElementById('slot-thumbs-' + dk);
        var spinner   = document.getElementById('slot-spin-' + dk);
        var files = Array.from(this.files);
        this.value = '';
        if (!files.length) return;
        if (spinner) spinner.classList.remove('d-none');
        var remaining = files.length;
        files.forEach(function(file) {
          var fd = new FormData();
          fd.append('photos[]', file);
          fd.append('id', orderId);
          fd.append('form', 'photo');
          fd.append('document_type', 'Pflichtfoto');
          fd.append('damage_component', slotKey);
          fd.append('caption', slotLabel);
          fd.append('_token', csrf);
          fetch(uploadUrl, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function(r) { return r.json(); })
            .then(function(data) {
              if (data.success && data.items && thumbsEl) {
                data.items.forEach(function(item) {
                  if (item.image1) thumbsEl.appendChild(makePtThumb(item.id, item.image1, slotKey));
                });
                updateSlotCount(slotKey);
              }
            })
            .catch(function(){})
            .finally(function() {
              remaining--;
              if (remaining <= 0 && spinner) spinner.classList.add('d-none');
            });
        });
      });
    });
  })();

  // Rotation/Annotate UI removed; editing disabled

  // -------- Modal / Canvas (disabled legacy) --------
  if (false) {
  const modal = document.getElementById('imgModal');
  const backdrop = document.getElementById('imgModalBackdrop');
  const titleEl = document.getElementById('imgModalTitle');
  const canvas = document.getElementById('imgCanvas');
  const ctx = canvas.getContext('2d');

  let baseImg = new Image();
  let scale = 1;      // Zoom-Faktor
  let rotation = 0;   // Grad
  let imgW = 0, imgH = 0;

  // Zeichenobjekte
  const shapes = [];  // {id, type, color, ...}
  let nextId = 1;
  let tool = 'select'; // 'select' | 'arrow' | 'circle' | 'rect' | 'text'
  let shapeColor = '#ff4444';
  let textColor = '#ffffff';
  let selectedId = null;

  // Drag state für Zeichnen/Bewegen
  let isMouseDown = false;
  let startX = 0, startY = 0; // Startpunkt
  let liveShape = null;       // Vorschau während Ziehen
  let dragOffset = {x:0, y:0}; // Verschiebeoffset beim Move

  function openModal(src, name) {
    titleEl.textContent = name || 'Bild';
    selectedId = null;
    shapes.length = 0;
    scale = 1;
    rotation = 0;

    backdrop.style.display = 'block';
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';

    baseImg = new Image();
    baseImg.crossOrigin = 'anonymous';
    baseImg.onload = () => {
      imgW = baseImg.width;
      imgH = baseImg.height;
      fitCanvas();
      // nicht größer als 1 zoomen – initial nur verkleinern, falls nötig
      const fitScale = Math.min(canvas.width / imgW, canvas.height / imgH);
      scale = Math.min(1, fitScale);
      drawAll();
    };
    baseImg.src = src;
  }
  function closeModal() {
    backdrop.style.display = 'none';
    modal.style.display = 'none';
    document.body.style.overflow = '';
  }
  function fitCanvas() {
    const wrap = document.getElementById('canvasWrap');
    canvas.width = wrap.clientWidth;
    canvas.height = wrap.clientHeight;
  }

  // Hilfen
  function clearCanvas(){ ctx.clearRect(0,0,canvas.width,canvas.height); }
  function center() { return { cx: canvas.width/2, cy: canvas.height/2 }; }

  function drawImage() {
    ctx.save();
    const {cx, cy} = center();
    const drawW = imgW * scale;
    const drawH = imgH * scale;
    ctx.translate(cx, cy);
    ctx.rotate(rotation * Math.PI/180);
    ctx.drawImage(baseImg, -drawW/2, -drawH/2, drawW, drawH);
    ctx.restore();
  }

  // Bildkoordinaten -> Canvas-Koordinaten
  function imgToCanvas(pt) {
    const {cx, cy} = center();
    const x = pt.x * scale;
    const y = pt.y * scale;
    const rad = rotation * Math.PI/180;
    const xr = x*Math.cos(rad) - y*Math.sin(rad);
    const yr = x*Math.sin(rad) + y*Math.cos(rad);
    return { x: cx + xr, y: cy + yr };
  }
  // Canvas -> Bildkoordinaten (inverse)
  function canvasToImg(pt) {
    const {cx, cy} = center();
    const xr = pt.x - cx;
    const yr = pt.y - cy;
    const rad = -rotation * Math.PI/180;
    const x = xr*Math.cos(rad) - yr*Math.sin(rad);
    const y = xr*Math.sin(rad) + yr*Math.cos(rad);
    return { x: x/scale, y: y/scale };
  }

  // Zeichnen (wie bisher)
  function strokeStyle(color){ ctx.strokeStyle = color; ctx.lineWidth = 3; }
  function fillStyle(color){ ctx.fillStyle = color; }

  function renderArrow(s) {
    const a = imgToCanvas({x: s.ax, y: s.ay});
    const b = imgToCanvas({x: s.bx, y: s.by});
    const headLen = 12;
    strokeStyle(s.color); fillStyle(s.color);
    ctx.beginPath(); ctx.moveTo(a.x, a.y); ctx.lineTo(b.x, b.y); ctx.stroke();
    const ang = Math.atan2(b.y - a.y, b.x - a.x);
    ctx.beginPath();
    ctx.moveTo(b.x, b.y);
    ctx.lineTo(b.x - headLen*Math.cos(ang - Math.PI/6), b.y - headLen*Math.sin(ang - Math.PI/6));
    ctx.lineTo(b.x - headLen*Math.cos(ang + Math.PI/6), b.y - headLen*Math.sin(ang + Math.PI/6));
    ctx.closePath(); ctx.fill();
  }
  function renderCircle(s) {
    const c = imgToCanvas({x: s.cx, y: s.cy});
    strokeStyle(s.color);
    ctx.beginPath(); ctx.arc(c.x, c.y, s.r*scale, 0, Math.PI*2); ctx.stroke();
  }
  function renderRect(s) {
    const p1 = imgToCanvas({x: s.x, y: s.y});
    const w = s.w * scale; const h = s.h * scale;
    strokeStyle(s.color);
    ctx.strokeRect(p1.x, p1.y, w, h);
  }
  function renderText(s) {
    const p = imgToCanvas({x: s.x, y: s.y});
    ctx.font = '20px sans-serif';
    ctx.lineWidth = 3;
    ctx.strokeStyle = 'rgba(0,0,0,.35)';
    ctx.fillStyle = s.color;
    ctx.strokeText(s.text, p.x, p.y);
    ctx.fillText(s.text, p.x, p.y);
  }

  function drawAll(preview=null) {
    clearCanvas();
    drawImage();
    shapes.forEach(s => {
      switch(s.type){
        case 'arrow':  renderArrow(s); break;
        case 'circle': renderCircle(s); break;
        case 'rect':   renderRect(s); break;
        case 'text':   renderText(s); break;
      }
    });
    if (preview) {
      switch(preview.type){
        case 'arrow':  renderArrow(preview); break;
        case 'circle': renderCircle(preview); break;
        case 'rect':   renderRect(preview); break;
      }
    }
    if (selectedId != null) {
      const s = shapes.find(x => x.id === selectedId);
      if (s) drawSelectionBox(s);
    }
  }

  function drawSelectionBox(s){
    ctx.save();
    ctx.setLineDash([6,4]);
    ctx.lineWidth = 1.5;
    ctx.strokeStyle = '#60a5fa';

    let minx, miny, maxx, maxy;

    if (s.type === 'arrow') {
      const a = imgToCanvas({x:s.ax,y:s.ay});
      const b = imgToCanvas({x:s.bx,y:s.by});
      minx = Math.min(a.x,b.x); miny = Math.min(a.y,b.y);
      maxx = Math.max(a.x,b.x); maxy = Math.max(a.y,b.y);
    } else if (s.type === 'circle') {
      const c = imgToCanvas({x:s.cx,y:s.cy});
      minx = c.x - s.r*scale; miny = c.y - s.r*scale;
      maxx = c.x + s.r*scale; maxy = c.y + s.r*scale;
    } else if (s.type === 'rect') {
      const p1 = imgToCanvas({x:s.x,y:s.y});
      const p2 = imgToCanvas({x:s.x + s.w, y:s.y + s.h});
      minx = Math.min(p1.x,p2.x); miny = Math.min(p1.y,p2.y);
      maxx = Math.max(p1.x,p2.x); maxy = Math.max(p1.y,p2.y);
    } else if (s.type === 'text') {
      const p = imgToCanvas({x:s.x,y:s.y});
      ctx.font = '20px sans-serif';
      const w = ctx.measureText(s.text).width;
      minx = p.x - 4; miny = p.y - 20;
      maxx = p.x + w + 4; maxy = p.y + 6;
    }

    ctx.strokeRect(minx, miny, maxx - minx, maxy - miny);
    ctx.restore();
  }

  function pointNearLine(p, a, b, tol){
    const A = {x: p.x - a.x, y: p.y - a.y};
    const B = {x: b.x - a.x, y: b.y - a.y};
    const t = Math.max(0, Math.min(1, (A.x*B.x + A.y*B.y) / (B.x*B.x + B.y*B.y)));
    const proj = { x: a.x + t*B.x, y: a.y + t*B.y };
    const dist = Math.hypot(p.x - proj.x, p.y - proj.y);
    return dist <= tol;
  }
  function hitTest(pt){
    for (let i = shapes.length - 1; i >= 0; i--) {
      const s = shapes[i];
      if (s.type === 'arrow') {
        if (pointNearLine(pt, {x:s.ax,y:s.ay}, {x:s.bx,y:s.by}, 10/scale)) return s.id;
      } else if (s.type === 'circle') {
        const d = Math.hypot(pt.x - s.cx, pt.y - s.cy);
        if (Math.abs(d - s.r) <= 10/scale || d < s.r) return s.id;
      } else if (s.type === 'rect') {
        const x1 = Math.min(s.x, s.x + s.w), y1 = Math.min(s.y, s.y + s.h);
        const x2 = Math.max(s.x, s.x + s.w), y2 = Math.max(s.y, s.y + s.h);
        if (pt.x >= x1 && pt.x <= x2 && pt.y >= y1 && pt.y <= y2) return s.id;
      } else if (s.type === 'text') {
        const w = ctx.measureText(s.text).width / scale;
        const x1 = s.x - 4/scale, y1 = s.y - 20/scale, x2 = s.x + w + 4/scale, y2 = s.y + 6/scale;
        if (pt.x >= x1 && pt.x <= x2 && pt.y >= y1 && pt.y <= y2) return s.id;
      }
    }
    return null;
  }

  // --- Controls (Zoom/Rotate/Undo/Delete) ---
  document.getElementById('btnClose').addEventListener('click', closeModal);
  document.getElementById('btnZoomIn').addEventListener('click', () => { scale = Math.min(10, scale * 1.1); drawAll(); });
  document.getElementById('btnZoomOut').addEventListener('click', () => { scale = Math.max(0.1, scale / 1.1); drawAll(); });
  document.getElementById('btnRotateL').addEventListener('click', () => { rotation = (rotation - 90) % 360; drawAll(); });
  document.getElementById('btnRotateR').addEventListener('click', () => { rotation = (rotation + 90) % 360; drawAll(); });
  document.getElementById('btnDelete').addEventListener('click', deleteSelected);
  document.getElementById('btnUndo').addEventListener('click', undoLast);
  // Save (upload to server instead of download)
  let currentImageId = null;
  document.addEventListener('click', function(e){
    const openBtn = e.target.closest('.js-open');
    if (openBtn) {
      const thumb = openBtn.closest('.thumb');
      currentImageId = thumb ? (thumb.getAttribute('data-image-id') || null) : null;
    }
  });
  document.getElementById('btnDownload').addEventListener('click', () => {
    if (!currentImageId) { alert('Kein Bild ausgewählt.'); return; }
    const tmp = document.createElement('canvas');
    const tctx = tmp.getContext('2d');

    const rot = ((rotation % 360) + 360) % 360;
    const swap = (rot === 90 || rot === 270);
    tmp.width = swap ? imgH : imgW;
    tmp.height = swap ? imgW : imgH;

    // Draw base image rotated like preview
    const cx = tmp.width / 2, cy = tmp.height / 2;
    tctx.save();
    tctx.translate(cx, cy);
    tctx.rotate(rotation * Math.PI/180);
    tctx.drawImage(baseImg, -imgW/2, -imgH/2, imgW, imgH);
    tctx.restore();

    // Map image coords -> export canvas coords with rotation, scale=1
    function imgToCanvasExport(pt) {
      const x = pt.x, y = pt.y;
      const rad = rotation * Math.PI/180;
      const xr = x*Math.cos(rad) - y*Math.sin(rad);
      const yr = x*Math.sin(rad) + y*Math.cos(rad);
      return { x: cx + xr, y: cy + yr };
    }
    function drawArrowT(s){
      const a = imgToCanvasExport({x:s.ax, y:s.ay});
      const b = imgToCanvasExport({x:s.bx, y:s.by});
      const headLen = 12;
      tctx.lineWidth = 3; tctx.strokeStyle = s.color; tctx.fillStyle = s.color;
      tctx.beginPath(); tctx.moveTo(a.x, a.y); tctx.lineTo(b.x, b.y); tctx.stroke();
      const ang = Math.atan2(b.y - a.y, b.x - a.x);
      tctx.beginPath();
      tctx.moveTo(b.x, b.y);
      tctx.lineTo(b.x - headLen*Math.cos(ang - Math.PI/6), b.y - headLen*Math.sin(ang - Math.PI/6));
      tctx.lineTo(b.x - headLen*Math.cos(ang + Math.PI/6), b.y - headLen*Math.sin(ang + Math.PI/6));
      tctx.closePath(); tctx.fill();
    }
    function drawCircleT(s){
      const c = imgToCanvasExport({x:s.cx, y:s.cy});
      tctx.lineWidth = 3; tctx.strokeStyle = s.color; tctx.beginPath(); tctx.arc(c.x, c.y, s.r, 0, Math.PI*2); tctx.stroke();
    }
    function drawRectT(s){
      const p1 = imgToCanvasExport({x:s.x, y:s.y});
      tctx.lineWidth = 3; tctx.strokeStyle = s.color; tctx.strokeRect(p1.x, p1.y, s.w, s.h);
    }
    function drawTextT(s){
      const p = imgToCanvasExport({x:s.x, y:s.y});
      tctx.font = '20px sans-serif'; tctx.lineWidth = 3; tctx.strokeStyle = 'rgba(0,0,0,.35)'; tctx.fillStyle = s.color; tctx.strokeText(s.text, p.x, p.y); tctx.fillText(s.text, p.x, p.y);
    }
    shapes.forEach(s=>{ if (s.type==='arrow') drawArrowT(s); if (s.type==='circle') drawCircleT(s); if (s.type==='rect') drawRectT(s); if (s.type==='text') drawTextT(s); });

    tmp.toBlob((blob) => {
      const formData = new FormData();
      formData.append('image', blob, 'annotated.png');
      formData.append('image_id', currentImageId);
      const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      $.ajax({
        url: "{{ route('examination.update.image') }}",
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          try {
            const thumb = document.querySelector(`.thumb[data-image-id="${currentImageId}"]`);
            if (thumb) {
              const img = thumb.querySelector('img');
              const open = thumb.querySelector('.js-open');
              if (img) img.src = data.url + `?t=${Date.now()}`;
              if (open) open.setAttribute('data-src', data.url);
            }
          } catch (e) { /* no-op */ }
          closeModal();
          if (window.toastr) toastr.success('', 'Bild gespeichert');
        },
        error: function(xhr){
          console.error('Upload error', xhr);
          if (window.toastr) toastr.error('', 'Fehler beim Speichern');
          else alert('Fehler beim Speichern');
        }
      });
    }, 'image/png', 0.95);
  });

  function deleteSelected(){
    if (selectedId == null) return;
    const i = shapes.findIndex(s => s.id === selectedId);
    if (i >= 0) shapes.splice(i,1);
    selectedId = null;
    drawAll();
  }
  function undoLast(){
    if (!shapes.length) return;
    if (selectedId === shapes[shapes.length-1].id) selectedId = null;
    shapes.pop();
    drawAll();
  }

  // Tools
  const btnSelect = document.getElementById('toolSelect');
  const btnArrow  = document.getElementById('toolArrow');
  const btnCircle = document.getElementById('toolCircle');
  const btnRect   = document.getElementById('toolRect');
  const btnText   = document.getElementById('toolText');
  function setTool(t){
    tool = t;
    [btnSelect, btnArrow, btnCircle, btnRect, btnText].forEach(b => b.classList.remove('active'));
    if (t === 'select') btnSelect.classList.add('active');
    if (t === 'arrow')  btnArrow.classList.add('active');
    if (t === 'circle') btnCircle.classList.add('active');
    if (t === 'rect')   btnRect.classList.add('active');
    if (t === 'text')   btnText.classList.add('active');
  }
  setTool('select');
  btnSelect.addEventListener('click', () => setTool('select'));
  btnArrow .addEventListener('click', () => setTool('arrow'));
  btnCircle.addEventListener('click', () => setTool('circle'));
  btnRect  .addEventListener('click', () => setTool('rect'));
  btnText  .addEventListener('click', () => setTool('text'));

  // Farben
  const shapeColorBtn = document.getElementById('shapeColor');
  const shapeSwatch = document.getElementById('shapeColorSwatch');
  shapeColorBtn.addEventListener('click', () => {
    shapeColor = (shapeColor === '#ff4444') ? '#ffffff' : '#ff4444';
    shapeSwatch.style.background = shapeColor;
  });
  const textColorSel = document.getElementById('textColor');
  textColorSel.addEventListener('change', () => { textColor = textColorSel.value; });

  // Maus-Handling
  canvas.addEventListener('mousedown', (e)=>{
    isMouseDown = true;
    const pCanvas = getMouse(e);
    const pImg = canvasToImg(pCanvas);
    startX = pImg.x; startY = pImg.y;

    if (tool === 'select') {
      selectedId = hitTest(pImg);
      if (selectedId != null) {
        const s = shapes.find(x => x.id === selectedId);
        if (s.type === 'arrow') {
          dragOffset = { x: pImg.x, y: pImg.y };
        } else if (s.type === 'circle') {
          dragOffset = { x: pImg.x - s.cx, y: pImg.y - s.cy };
        } else if (s.type === 'rect' || s.type === 'text') {
          dragOffset = { x: pImg.x - s.x, y: pImg.y - s.y };
        }
      } else {
        dragOffset = {x:0, y:0};
      }
      drawAll();
      return;
    }

    if (tool === 'arrow') {
      liveShape = { id:0, type:'arrow', ax:startX, ay:startY, bx:startX, by:startY, color: shapeColor };
    } else if (tool === 'circle') {
      liveShape = { id:0, type:'circle', cx:startX, cy:startY, r:0, color: shapeColor };
    } else if (tool === 'rect') {
      liveShape = { id:0, type:'rect', x:startX, y:startY, w:0, h:0, color: shapeColor };
    } else if (tool === 'text') {
      const t = prompt('Text eingeben:');
      if (t && t.trim()) { shapes.push({ id: nextId++, type:'text', x:startX, y:startY, text: t.trim(), color: textColor }); drawAll(); }
      isMouseDown = false;
    }
  });

  canvas.addEventListener('mousemove', (e)=>{
    if (!isMouseDown) return;
    const pCanvas = getMouse(e);
    const pImg = canvasToImg(pCanvas);

    if (tool === 'select') {
      if (selectedId != null) {
        const s = shapes.find(x => x.id === selectedId);
        if (s) {
          if (s.type === 'arrow') {
            const dx = pImg.x - dragOffset.x;
            const dy = pImg.y - dragOffset.y;
            s.ax += dx; s.ay += dy; s.bx += dx; s.by += dy;
            dragOffset = { x: pImg.x, y: pImg.y };
          } else if (s.type === 'circle') {
            s.cx = pImg.x - dragOffset.x; s.cy = pImg.y - dragOffset.y;
          } else if (s.type === 'rect' || s.type === 'text') {
            s.x = pImg.x - dragOffset.x; s.y = pImg.y - dragOffset.y;
          }
          drawAll();
        }
      }
      return;
    }

    if (!liveShape) return;
    if (liveShape.type === 'arrow') {
      liveShape.bx = pImg.x; liveShape.by = pImg.y;
    } else if (liveShape.type === 'circle') {
      liveShape.r = Math.hypot(pImg.x - liveShape.cx, pImg.y - liveShape.cy);
    } else if (liveShape.type === 'rect') {
      liveShape.w = pImg.x - liveShape.x;
      liveShape.h = pImg.y - liveShape.y;
    }
    drawAll(liveShape);
  });

  canvas.addEventListener('mouseup', ()=>{
    if (!isMouseDown) return;
    if (liveShape) { liveShape.id = nextId++; shapes.push(liveShape); selectedId = liveShape.id; liveShape = null; drawAll(); }
    isMouseDown = false;
  });
  canvas.addEventListener('mouseleave', ()=>{ if (liveShape) { liveShape = null; drawAll(); } isMouseDown = false; });

  // ---- Touch-Handling (Mobile Zeichnen ohne Scroll) ----
  function getTouch(e){
    const rect = canvas.getBoundingClientRect();
    const t = e.touches[0] || e.changedTouches[0];
    return { x: t.clientX - rect.left, y: t.clientY - rect.top };
  }
  canvas.addEventListener('touchstart', (e)=>{
    if (!e.touches.length) return;
    e.preventDefault();
    isMouseDown = true;
    const pCanvas = getTouch(e);
    const pImg = canvasToImg(pCanvas);
    startX = pImg.x; startY = pImg.y;

    if (tool === 'select') {
      selectedId = hitTest(pImg);
      if (selectedId != null) {
        const s = shapes.find(x => x.id === selectedId);
        if (s.type === 'arrow') {
          dragOffset = { x: pImg.x, y: pImg.y };
        } else if (s.type === 'circle') {
          dragOffset = { x: pImg.x - s.cx, y: pImg.y - s.cy };
        } else if (s.type === 'rect' || s.type === 'text') {
          dragOffset = { x: pImg.x - s.x, y: pImg.y - s.y };
        }
      } else {
        dragOffset = {x:0, y:0};
      }
      drawAll();
      return;
    }

    if (tool === 'arrow') {
      liveShape = { id:0, type:'arrow', ax:startX, ay:startY, bx:startX, by:startY, color: shapeColor };
    } else if (tool === 'circle') {
      liveShape = { id:0, type:'circle', cx:startX, cy:startY, r:0, color: shapeColor };
    } else if (tool === 'rect') {
      liveShape = { id:0, type:'rect', x:startX, y:startY, w:0, h:0, color: shapeColor };
    } else if (tool === 'text') {
      const t = prompt('Text eingeben:');
      if (t && t.trim()) { shapes.push({ id: nextId++, type:'text', x:startX, y:startY, text: t.trim(), color: textColor }); drawAll(); }
      isMouseDown = false;
    }
  }, {passive:false});

  canvas.addEventListener('touchmove', (e)=>{
    if (!isMouseDown) return;
    e.preventDefault();
    const pCanvas = getTouch(e);
    const pImg = canvasToImg(pCanvas);

    if (tool === 'select') {
      if (selectedId != null) {
        const s = shapes.find(x => x.id === selectedId);
        if (s) {
          if (s.type === 'arrow') {
            const dx = pImg.x - dragOffset.x;
            const dy = pImg.y - dragOffset.y;
            s.ax += dx; s.ay += dy; s.bx += dx; s.by += dy;
            dragOffset = { x: pImg.x, y: pImg.y };
          } else if (s.type === 'circle') {
            s.cx = pImg.x - dragOffset.x; s.cy = pImg.y - dragOffset.y;
          } else if (s.type === 'rect' || s.type === 'text') {
            s.x = pImg.x - dragOffset.x; s.y = pImg.y - dragOffset.y;
          }
          drawAll();
        }
      }
      return;
    }

    if (!liveShape) return;
    if (liveShape.type === 'arrow') {
      liveShape.bx = pImg.x; liveShape.by = pImg.y;
    } else if (liveShape.type === 'circle') {
      liveShape.r = Math.hypot(pImg.x - liveShape.cx, pImg.y - liveShape.cy);
    } else if (liveShape.type === 'rect') {
      liveShape.w = pImg.x - liveShape.x;
      liveShape.h = pImg.y - liveShape.y;
    }
    drawAll(liveShape);
  }, {passive:false});

  canvas.addEventListener('touchend', (e)=>{
    e.preventDefault();
    if (!isMouseDown) return;
    if (liveShape) { liveShape.id = nextId++; shapes.push(liveShape); selectedId = liveShape.id; liveShape = null; drawAll(); }
    isMouseDown = false;
  }, {passive:false});

  canvas.addEventListener('touchcancel', (e)=>{
    e.preventDefault();
    isMouseDown = false; liveShape = null; drawAll();
  }, {passive:false});

  // Tastatur-Shortcuts (nur Undo + bestehende)
  document.addEventListener('keydown', (e)=>{
    if (modal.style.display !== 'block') return;
    if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'z') { e.preventDefault(); undoLast(); } // ← Strg/Cmd+Z
    if (e.key === 'Escape') { closeModal(); }
    if (e.key.toLowerCase() === 'v') setTool('select');
    if (e.key.toLowerCase() === 'a') setTool('arrow');
    if (e.key.toLowerCase() === 'c') setTool('circle');
    if (e.key.toLowerCase() === 'r') setTool('rect');
    if (e.key.toLowerCase() === 't') setTool('text');
    if (e.key === 'Delete') deleteSelected();
  });

  // Öffnen (Modal)
  document.addEventListener('click', function(e){
    const openBtn = e.target.closest('.js-open');
    if (openBtn) {
      e.preventDefault();
      openModal(openBtn.dataset.src, openBtn.dataset.name || 'Bild');
    }
  });

  // Refit bei Resize
  window.addEventListener('resize', () => {
    if (modal.style.display === 'block' && baseImg.complete) {
      const prevFit = Math.min(canvas.width / imgW, canvas.height / imgH);
      fitCanvas();
      const newFit = Math.min(canvas.width / imgW, canvas.height / imgH);
      if (prevFit > 0) scale = Math.min(10, Math.max(0.1, scale * (newFit/prevFit)));
      drawAll();
    }
  });

  function getMouse(e){
    const rect = canvas.getBoundingClientRect();
    return { x: e.clientX - rect.left, y: e.clientY - rect.top };
  }
  }
</script>
@endsection

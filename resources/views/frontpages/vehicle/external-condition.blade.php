@extends('mainpages.examlayout')

@section('title', 'Außenzustand')

@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background:#f8fafc; min-height:100dvh; }
  .card-modern { border:1px solid rgba(0,0,0,.06); border-radius:var(--radius); overflow:hidden; box-shadow:0 12px 28px rgba(2,6,23,.06); }
  .card-modern .card-header { background:linear-gradient(180deg,#fff,#f3f4f6); border-bottom:1px solid #eef2f7; }
  .form-max-650 { max-width:650px; margin:0 auto; width:100%; }

  .doc-row { border:1px solid #e5e7eb; border-radius:12px; background:#f9fafb; padding:16px; }
  .doc-title { font-weight:700; font-size:1.05rem; margin:0 0 .5rem; }
  .hidden { display:none !important; }

  /* Eingaben */
  .select-tall { height:48px; }
  .input-compact { height:42px; }

  /* Mehrfach-Schäden – jede Zeile separat */
  .damage-row { background:#fff; border:1px solid #e5e7eb; border-radius:8px; padding:10px; }
  .damage-row + .damage-row { margin-top:8px; }
  .damage-line { display:flex; gap:8px; align-items:center; }
  .damage-line .form-select, .damage-line .form-control { flex:1 1 auto; }
  .btn-del { white-space:nowrap; }

  .add-more-holder { margin-top:10px; }

  /* Per-damage photo section */
  .damage-photo-section { margin-top:.6rem; padding:.6rem .7rem; background:#fff8f0; border:1px solid #fed7aa; border-radius:8px; }
  .damage-photo-thumbs { display:flex; flex-wrap:wrap; gap:.5rem; margin-bottom:.5rem; }
  .damage-photo-thumb { position:relative; width:80px; height:80px; border-radius:8px; overflow:hidden; border:1px solid #e5e7eb; }
  .damage-photo-thumb img { width:100%; height:100%; object-fit:cover; }
  .damage-photo-thumb .rm-photo { position:absolute; top:2px; right:2px; background:rgba(220,38,38,.85); color:#fff; border:none; border-radius:50%; width:20px; height:20px; font-size:10px; display:flex; align-items:center; justify-content:center; cursor:pointer; padding:0; line-height:1; }
  .damage-photo-upload-btn { font-size:.85rem; }
  .damage-photo-uploading { font-size:.8rem; color:#6b7280; }

  /* Felgen-Unterabschnitt */
  .rim-sub { border:1px solid #e5e7eb; border-radius:10px; background:#fff; padding:12px; margin-bottom:12px; }

  /* Erzwingt einspaltig (auch Desktop) */
  .force-single .row > [class*="col-"] { flex:0 0 100% !important; max-width:100% !important; }

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
</style>

<div class="container-fluid page-bg py-3 py-md-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-9 col-xxl-8 form-max-650">

      <form method="POST" action="{{ route('examination.store') }}" id="externalConditionForm" novalidate>
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="form" value="external-condition">
          <input type="hidden" name="next_url" value="{{ route('examiner.technology', ['id' => $id]) }}">

          <div class="my-2">
              <button type="button" class="js-save-back fw-semibold d-inline-block py-1 pb-3" style="color: var(--primary); text-decoration: none; background: transparent; border: 0;">
                  <i class="fa-solid fa-arrow-left me-2"></i> Speichern &amp; zurück zum Hauptmenü
              </button>
          </div>


          <div class="card card-modern">
          <div class="card-header border-0 p-4 pb-4">
            <h1 class="h4 mb-1">Außenzustand</h1>
          </div>

          <div class="card-body pt-3 force-single">
            @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                <strong>Bitte prüfen:</strong>
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            @php
              $statusOptions = [
                'i.O.'            => 'i.O.',
                'beschädigt'      => 'Beschädigt / n.i.O.',
                'nicht_vorhanden' => 'Nicht vorhanden',
              ];

              $exterior = [
                ['label' => 'Frontscheibe',        'key' => 'windshield',       'details' => ['Steinschlag','Riss','Kratzer/Sichtbehinderung','Dichtung undicht','Heizung ohne Funktion','Sonstiges']],
                ['label' => 'Fensterverglasung',   'key' => 'window_glazing',   'details' => ['Kratzer','Riss','Folie/Blendwirkung','Scheibe locker','Dichtung undicht','Sonstiges']],
                ['label' => 'Scheibenwischer',     'key' => 'wipers',           'details' => ['Wischblatt verschlissen','Wasserförderung ohne Funktion','Gestänge/Motor defekt','Rubbeln/Schlieren','Sonstiges']],
                ['label' => 'Dichtungen',          'key' => 'seals',            'details' => ['Porös','Rissig','Undicht/Wassereintritt','Lose','Sonstiges']],
                ['label' => 'Zentralverriegelung', 'key' => 'central_locking',  'details' => ['Sporadische Funktion','Tür verriegelt nicht','Heckklappe ohne Funktion','Aktuator/Schloss defekt','Sonstiges']],
                ['label' => 'Anbauteile',          'key' => 'attachments',      'details' => ['Lose Befestigung','Halter gebrochen','Verformt','Kratzer/Delle','Sonstiges']],
                ['label' => 'Außenspiegel',        'key' => 'exterior_mirrors', 'details' => ['Gehäuse gerissen','Glas beschädigt','Anklappfunktion defekt','Spiegelverstellung defekt','Blinker/Heizung defekt','Sonstiges']],
              ];

              $rimBoxes = [
                ['label' => 'Felge VL', 'pos' => 'VL'],
                ['label' => 'Felge VR', 'pos' => 'VR'],
                ['label' => 'Felge HL', 'pos' => 'HL'],
                ['label' => 'Felge HR', 'pos' => 'HR'],
              ];
              $rimDetails = ['Kratzer / Bordsteinschaden','Lackabplatzer','Verzogen/Verbeult','Korrosion', 'Oxidation', 'Sonstiges'];

              $mechanics = [
                ['label' => 'Radaufhängung',               'key' => 'suspension',                'details' => ['Spiel vorhanden','Gelenk defekt','Lager ausgeschlagen','Korrosion','Verzogen','Sonstiges']],
                ['label' => 'Stoßdämpfer',                 'key' => 'shock_absorbers',           'details' => ['Undicht (Ölaustritt)','Wirkung unzureichend','Unterschied links/rechts','Befestigung lose','Sonstiges']],
                ['label' => 'Federn',                      'key' => 'springs',                    'details' => ['Gebrochen','Setzung/Schiefstand','Korrosion stark','Sonstiges']],
                ['label' => 'Bremsscheiben',               'key' => 'brake_discs',                'details' => ['Verschleißgrenze erreicht','Riefen','Untermaß','Korrosion','Schlag/Seitenschlag','Sonstiges']],
                ['label' => 'Bremsbeläge',                 'key' => 'brake_pads',                 'details' => ['Verschleißgrenze erreicht','Ungleichmäßiger Abrieb','Belag gelöst','Quietsch-/Schleifgeräusch','Sonstiges']],
                ['label' => 'Auspuffanlage',               'key' => 'exhaust_system',             'details' => ['Undicht','Aufhängung defekt','Katalysator/DPF Problem','Loch/Korrosion','Sonstiges']],
                ['label' => 'Motor Öldichtheit',           'key' => 'engine_oil_tightness',       'details' => ['Ölfeucht','Ölleck deutlich','Dichtung defekt','Sonstiges']],
                ['label' => 'Getriebe Öldichtheit',        'key' => 'gearbox_oil_tightness',      'details' => ['Ölfeucht','Ölleck deutlich','Simmerring defekt','Sonstiges']],
                ['label' => 'Differential Öldichtheit',    'key' => 'differential_oil_tightness', 'details' => ['Ölfeucht','Ölleck deutlich','Simmerring defekt','Sonstiges']],
                ['label' => 'Unterboden Zustand generell', 'key' => 'underbody_condition',        'details' => ['Korrosion','Verformung/Schaden','Unterbodenschutz beschädigt','Leitungen beschädigt','Sonstiges']],
                ['label' => 'Sonstige Auffälligkeiten',    'key' => 'other_findings',             'details' => ['Elektrik/Leitung beschädigt','Flüssigkeitsaustritt','Mechanisches Spiel','Akustische Auffälligkeit','Sonstiges']],
              ];

              $val = fn($name,$default=null)=> old($name, data_get($examination,$name,$default));
            @endphp

            {{-- ===== Außen-Komponenten (einspaltig) ===== --}}
            @foreach($exterior as $item)
              @php
                $k       = $item['key'];
                $label   = $item['label'];
                $options = $item['details'];

                $status  = (string) $val($k);
                $prefDetails = (array) old($k.'_details', data_get($examination, $k.'_details', []));
                if (empty($prefDetails)) {
                  $single = (string) $val($k.'_detail');
                  if ($single) $prefDetails = [$single];
                }
                $prefOthers  = (array) old($k.'_details_other', data_get($examination, $k.'_details_other', []));
                $rowsCount = max(1, count($prefDetails));
              @endphp

              <div class="doc-row mb-3 box" data-scope="exterior" data-name="{{ $k }}" data-part-label="{{ $label }}" data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                <p class="doc-title">{{ $label }}</p>

                {{-- Zustand (eigene Zeile) --}}
                <div class="row g-2">
                  <div class="col-12">
                    <label class="form-label">Zustand</label>
                    <select name="{{ $k }}" class="form-select select-tall js-status">
                      <option value="">-- bitte wählen --</option>
                      @foreach($statusOptions as $sv => $sl)
                        <option value="{{ $sv }}" {{ $status===$sv ? 'selected' : '' }}>{{ $sl }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                {{-- Schäden (jede Auswahl eigene Zeile; sichtbar nur bei „beschädigt“) --}}
                <div class="mt-2 js-multi-wrap {{ strtolower($status)==='beschädigt' ? '' : 'hidden' }}">
                  <label class="form-label">Schäden</label>

                  <div class="js-details-list">
                    @for($ri=0; $ri<$rowsCount; $ri++)
                      @php
                        $dVal = $prefDetails[$ri] ?? '';
                        $oVal = $prefOthers[$ri]  ?? '';
                        $extEntryId = $k . ':' . $ri;
                        $extDomId   = $k . '-' . $ri;
                        $extPhotos = ($examination->id ?? null)
                          ? \App\Models\ExaminationImage::where('examination_id', $examination->id)
                              ->where('damage_component', $extEntryId)->get()
                          : collect();
                      @endphp

                      <div class="damage-row" data-entry-id="{{ $extEntryId }}">
                        <div class="damage-line">
                          <select name="{{ $k }}_details[]" class="form-select select-tall js-detail">
                            <option value="">-- bitte wählen --</option>
                            @foreach($options as $opt)
                              <option value="{{ $opt }}" {{ $dVal===$opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                          </select>
                          <button type="button" class="btn btn-danger btn-sm btn-del js-remove-detail"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                        <div class="mt-2 js-other-wrap {{ $dVal==='Sonstiges' ? '' : 'hidden' }}">
                          <input type="text" name="{{ $k }}_details_other[]" class="form-control input-compact" placeholder="kurz beschreiben…" value="{{ $oVal }}">
                        </div>
                        <div class="damage-photo-section {{ $dVal !== '' ? '' : 'hidden' }}">
                          <div class="small fw-semibold mb-1"><i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos</div>
                          <div class="damage-photo-thumbs" id="photo-thumbs-{{ $extDomId }}">
                            @foreach($extPhotos as $photo)
                              <div class="damage-photo-thumb" id="dmg-thumb-{{ $photo->id }}">
                                <img src="{{ asset('storage/' . $photo->image) }}" alt="">
                                <button type="button" class="rm-photo" data-id="{{ $photo->id }}" title="Entfernen">×</button>
                              </div>
                            @endforeach
                          </div>
                          <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                            <i class="fa-solid fa-plus me-1"></i> Foto
                            <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input"
                                   data-entry-id="{{ $extEntryId }}" data-part-label="{{ $label }}"
                                   data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                          </label>
                          <span class="damage-photo-uploading d-none ms-2" id="uploading-{{ $extDomId }}"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                        </div>
                      </div>
                    @endfor
                  </div>

                  <div class="add-more-holder">
                    <button type="button" style="color: gray" class="btn btn-outline-secondary btn-sm js-add-detail">Weitere hinzufügen</button>
                  </div>

                  {{-- Template --}}
                  <template class="js-detail-template">
                    <div class="damage-row">
                      <div class="damage-line">
                        <select name="{{ $k }}_details[]" class="form-select select-tall js-detail">
                          <option value="">-- bitte wählen --</option>
                          @foreach($options as $opt)
                            <option value="{{ $opt }}">{{ $opt }}</option>
                          @endforeach
                        </select>
                        <button type="button" class="btn btn-danger btn-sm btn-del js-remove-detail"><i class="fa-solid fa-trash-can"></i></button>
                      </div>
                      <div class="mt-2 js-other-wrap hidden">
                        <input type="text" name="{{ $k }}_details_other[]" class="form-control input-compact" placeholder="kurz beschreiben…">
                      </div>
                      <div class="damage-photo-section hidden">
                        <div class="small fw-semibold mb-1"><i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos</div>
                        <div class="damage-photo-thumbs"></div>
                        <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                          <i class="fa-solid fa-plus me-1"></i> Foto
                          <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input">
                        </label>
                        <span class="damage-photo-uploading d-none ms-2"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                      </div>
                    </div>
                  </template>
                </div>
              </div>
            @endforeach

            {{-- ===== Felgen (jedes Rad separat, einspaltig) ===== --}}
            <div class="doc-row mb-3">
              <p class="doc-title">Felgen</p>

              @foreach($rimBoxes as $i => $rim)
                @php
                  $label  = $rim['label'];
                  $pos    = $rim['pos'];
                  $base   = "rims.$i";
                  $data   = $val($base, []);
                  $status = (string) ($data['status'] ?? '');
                  $prefDetails = (array) old("rims.$i.details", data_get($examination, "rims.$i.details", []));
                  if (empty($prefDetails)) {
                    $single = (string) ($data['detail'] ?? '');
                    if ($single) $prefDetails = [$single];
                  }
                  $prefOthers  = (array) old("rims.$i.details_other", data_get($examination, "rims.$i.details_other", []));
                  $rowsCount = max(1, count($prefDetails));
                @endphp

                <div class="rim-sub box" data-scope="rim" data-name="rims[{{ $i }}]" data-entry-prefix="rim_{{ $i }}" data-part-label="{{ $label }}" data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                  <strong>{{ $label }}</strong>
                  <input type="hidden" name="rims[{{ $i }}][position]" value="{{ $pos }}">

                  {{-- Zustand --}}
                  <div class="mt-1">
                    <label class="form-label">Zustand</label>
                    <select name="rims[{{ $i }}][status]" class="form-select select-tall js-status">
                      <option value="">-- bitte wählen --</option>
                      @foreach($statusOptions as $sv => $sl)
                        <option value="{{ $sv }}" {{ $status===$sv ? 'selected' : '' }}>{{ $sl }}</option>
                      @endforeach
                    </select>
                  </div>

                  {{-- Schäden --}}
                  <div class="mt-2 js-multi-wrap {{ strtolower($status)==='beschädigt' ? '' : 'hidden' }}">
                    <label class="form-label">Schäden</label>

                    <div class="js-details-list">
                      @for($ri=0; $ri<$rowsCount; $ri++)
                        @php
                          $dVal = $prefDetails[$ri] ?? '';
                          $oVal = $prefOthers[$ri]  ?? '';
                          $rimEntryId = 'rim_' . $i . ':' . $ri;
                          $rimDomId   = 'rim-' . $i . '-' . $ri;
                          $rimPhotos = ($examination->id ?? null)
                            ? \App\Models\ExaminationImage::where('examination_id', $examination->id)
                                ->where('damage_component', $rimEntryId)->get()
                            : collect();
                        @endphp

                        <div class="damage-row" data-entry-id="{{ $rimEntryId }}">
                          <div class="damage-line">
                            <select name="rims[{{ $i }}][details][]" class="form-select select-tall js-detail">
                              <option value="">-- bitte wählen --</option>
                              @foreach($rimDetails as $opt)
                                <option value="{{ $opt }}" {{ $dVal===$opt ? 'selected' : '' }}>{{ $opt }}</option>
                              @endforeach
                            </select>
                            <button type="button" class="btn btn-danger btn-sm btn-del js-remove-detail">Löschen</button>
                          </div>
                          <div class="mt-2 js-other-wrap {{ $dVal==='Sonstiges' ? '' : 'hidden' }}">
                            <input type="text" name="rims[{{ $i }}][details_other][]" class="form-control input-compact" placeholder="kurz beschreiben…" value="{{ $oVal }}">
                          </div>
                          <div class="damage-photo-section {{ $dVal !== '' ? '' : 'hidden' }}">
                            <div class="small fw-semibold mb-1"><i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos</div>
                            <div class="damage-photo-thumbs" id="photo-thumbs-{{ $rimDomId }}">
                              @foreach($rimPhotos as $photo)
                                <div class="damage-photo-thumb" id="dmg-thumb-{{ $photo->id }}">
                                  <img src="{{ asset('storage/' . $photo->image) }}" alt="">
                                  <button type="button" class="rm-photo" data-id="{{ $photo->id }}" title="Entfernen">×</button>
                                </div>
                              @endforeach
                            </div>
                            <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                              <i class="fa-solid fa-plus me-1"></i> Foto
                              <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input"
                                     data-entry-id="{{ $rimEntryId }}" data-part-label="{{ $label }}"
                                     data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                            </label>
                            <span class="damage-photo-uploading d-none ms-2" id="uploading-{{ $rimDomId }}"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                          </div>
                        </div>
                      @endfor
                    </div>

                    <div class="add-more-holder">
                      <button type="button" style="color: gray" class="btn btn-outline-secondary btn-sm js-add-detail">Weitere hinzufügen</button>
                    </div>

                    <template class="js-detail-template">
                      <div class="damage-row">
                        <div class="damage-line">
                          <select name="rims[{{ $i }}][details][]" class="form-select select-tall js-detail">
                            <option value="">-- bitte wählen --</option>
                            @foreach($rimDetails as $opt)
                              <option value="{{ $opt }}">{{ $opt }}</option>
                            @endforeach
                          </select>
                          <button type="button" class="btn btn-danger btn-sm btn-del js-remove-detail">Löschen</button>
                        </div>
                        <div class="mt-2 js-other-wrap hidden">
                          <input type="text" name="rims[{{ $i }}][details_other][]" class="form-control input-compact" placeholder="kurz beschreiben…">
                        </div>
                        <div class="damage-photo-section hidden">
                          <div class="small fw-semibold mb-1"><i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos</div>
                          <div class="damage-photo-thumbs"></div>
                          <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                            <i class="fa-solid fa-plus me-1"></i> Foto
                            <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input">
                          </label>
                          <span class="damage-photo-uploading d-none ms-2"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                        </div>
                      </div>
                    </template>
                  </div>
                </div>
              @endforeach
            </div>

            {{-- ===== Mechanik (einspaltig) ===== --}}
            @foreach($mechanics as $item)
              @php
                $k       = $item['key'];
                $label   = $item['label'];
                $options = $item['details'];

                $status  = (string) $val($k);
                $prefDetails = (array) old($k.'_details', data_get($examination, $k.'_details', []));
                if (empty($prefDetails)) {
                  $single = (string) $val($k.'_detail');
                  if ($single) $prefDetails = [$single];
                }
                $prefOthers  = (array) old($k.'_details_other', data_get($examination, $k.'_details_other', []));
                $rowsCount = max(1, count($prefDetails));
              @endphp

              <div class="doc-row mb-3 box" data-scope="mechanic" data-name="{{ $k }}" data-part-label="{{ $label }}" data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                <p class="doc-title">{{ $label }}</p>

                {{-- Zustand --}}
                <div class="row g-2">
                  <div class="col-12">
                    <label class="form-label">Zustand</label>
                    <select name="{{ $k }}" class="form-select select-tall js-status">
                      <option value="">-- bitte wählen --</option>
                      @foreach($statusOptions as $sv => $sl)
                        <option value="{{ $sv }}" {{ $status===$sv ? 'selected' : '' }}>{{ $sl }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                {{-- Schäden --}}
                <div class="mt-2 js-multi-wrap {{ strtolower($status)==='beschädigt' ? '' : 'hidden' }}">
                  <label class="form-label">Schäden</label>

                  <div class="js-details-list">
                    @for($ri=0; $ri<$rowsCount; $ri++)
                      @php
                        $dVal = $prefDetails[$ri] ?? '';
                        $oVal = $prefOthers[$ri]  ?? '';
                        $mechEntryId = $k . ':' . $ri;
                        $mechDomId   = $k . '-' . $ri;
                        $mechPhotos = ($examination->id ?? null)
                          ? \App\Models\ExaminationImage::where('examination_id', $examination->id)
                              ->where('damage_component', $mechEntryId)->get()
                          : collect();
                      @endphp

                      <div class="damage-row" data-entry-id="{{ $mechEntryId }}">
                        <div class="damage-line">
                          <select name="{{ $k }}_details[]" class="form-select select-tall js-detail">
                            <option value="">-- bitte wählen --</option>
                            @foreach($options as $opt)
                              <option value="{{ $opt }}" {{ $dVal===$opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                          </select>
                          <button type="button" class="btn btn-danger btn-sm btn-del js-remove-detail">Löschen</button>
                        </div>
                        <div class="mt-2 js-other-wrap {{ $dVal==='Sonstiges' ? '' : 'hidden' }}">
                          <input type="text" name="{{ $k }}_details_other[]" class="form-control input-compact" placeholder="kurz beschreiben…" value="{{ $oVal }}">
                        </div>
                        <div class="damage-photo-section {{ $dVal !== '' ? '' : 'hidden' }}">
                          <div class="small fw-semibold mb-1"><i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos</div>
                          <div class="damage-photo-thumbs" id="photo-thumbs-{{ $mechDomId }}">
                            @foreach($mechPhotos as $photo)
                              <div class="damage-photo-thumb" id="dmg-thumb-{{ $photo->id }}">
                                <img src="{{ asset('storage/' . $photo->image) }}" alt="">
                                <button type="button" class="rm-photo" data-id="{{ $photo->id }}" title="Entfernen">×</button>
                              </div>
                            @endforeach
                          </div>
                          <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                            <i class="fa-solid fa-plus me-1"></i> Foto
                            <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input"
                                   data-entry-id="{{ $mechEntryId }}" data-part-label="{{ $label }}"
                                   data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                          </label>
                          <span class="damage-photo-uploading d-none ms-2" id="uploading-{{ $mechDomId }}"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                        </div>
                      </div>
                    @endfor
                  </div>

                  <div class="add-more-holder">
                    <button type="button" style="color: gray" class="btn btn-outline-secondary btn-sm js-add-detail">Weitere hinzufügen</button>
                  </div>

                  <template class="js-detail-template">
                    <div class="damage-row">
                      <div class="damage-line">
                        <select name="{{ $k }}_details[]" class="form-select select-tall js-detail">
                          <option value="">-- bitte wählen --</option>
                          @foreach($options as $opt)
                            <option value="{{ $opt }}">{{ $opt }}</option>
                          @endforeach
                        </select>
                        <button type="button" class="btn btn-danger btn-sm btn-del js-remove-detail">Löschen</button>
                      </div>
                      <div class="mt-2 js-other-wrap hidden">
                        <input type="text" name="{{ $k }}_details_other[]" class="form-control input-compact" placeholder="kurz beschreiben…">
                      </div>
                      <div class="damage-photo-section hidden">
                        <div class="small fw-semibold mb-1"><i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos</div>
                        <div class="damage-photo-thumbs"></div>
                        <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                          <i class="fa-solid fa-plus me-1"></i> Foto
                          <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input">
                        </label>
                        <span class="damage-photo-uploading d-none ms-2"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                      </div>
                    </div>
                  </template>
                </div>
              </div>
            @endforeach

          

<div class="mb-3">
  <label for="external_overall_comment" class="form-label fw-semibold">Gesamtkommentar Außenzustand</label>
  <textarea
    name="external_overall_comment"
    id="external_overall_comment"
    rows="3"
    class="form-control"
    placeholder="Allgemeine Bemerkungen…"
  >{{ old('external_overall_comment', $examination->external_overall_comment) }}</textarea>
</div>

  {{-- Sammel-Kommentar --}}
            @if(auth()->check() && (auth()->user()->type ?? null) === 'admin')
  <div class="form-check mb-4">
    <input
      class="form-check-input"
      type="checkbox"
      id="insert_underbody_notice"
    >
    <label class="form-check-label fw-semibold" for="insert_underbody_notice">
      Hinweis: Fahrzeugunterseite eingeschränkt begutachtbar einfügen
    </label>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const checkbox = document.getElementById('insert_underbody_notice');
      const textarea = document.getElementById('external_overall_comment');

      if (!checkbox || !textarea) return;

      const notice =
`Zur Begutachtung der Fahrzeugunterseite standen keine technischen Einrichtungen zur Verfügung (z.B. Hebebühne, Hubmittel, Grube o.Ä.). Das Fahrzeug konnte daher nur eingeschränkt von unten betrachtet werden.`;

      const escapeRegExp = (s) => s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
      const noticeRegex = new RegExp('(?:\\n\\n)?' + escapeRegExp(notice) + '\\s*$', 'm');

      checkbox.addEventListener('change', function () {
        const value = textarea.value || '';

        if (checkbox.checked) {
          // nur anhängen, wenn noch nicht vorhanden
          if (!value.includes(notice)) {
            const separator = value.trim().length ? '\n\n' : '';
            textarea.value = value + separator + notice;
          }
        } else {
          // nur den eingefügten Text am Ende wieder entfernen
          textarea.value = value.replace(noticeRegex, '');
        }
      });
    });
  </script>
@endif

<div class="d-grid mb-2">
  <button type="submit" class="btn btn-primary btn-lg">Nächster Abschnitt</button>
</div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
(function(){
  var boxCounters = {};

  function makeDamageThumb(id, src) {
    var wrap = document.createElement('div'); wrap.className='damage-photo-thumb'; wrap.id='dmg-thumb-'+id;
    var img = document.createElement('img'); img.src=src; img.alt='';
    var btn = document.createElement('button'); btn.type='button'; btn.className='rm-photo';
    btn.setAttribute('data-id', id); btn.title='Entfernen'; btn.textContent='×';
    bindRemovePhoto(btn); wrap.appendChild(img); wrap.appendChild(btn); return wrap;
  }
  function bindRemovePhoto(btn) {
    btn.addEventListener('click', function(){
      var id=this.getAttribute('data-id'); var thumb=document.getElementById('dmg-thumb-'+id);
      if(!confirm('Foto entfernen?')) return;
      fetch('{{ url("examination-delete-image") }}/'+id,{method:'GET',headers:{'X-Requested-With':'XMLHttpRequest'}})
        .finally(function(){ if(thumb) thumb.remove(); });
    });
  }

  function uploadDamagePhoto(input, file){
  return new Promise(function(resolve){

    var entryId=input.getAttribute('data-entry-id'),
        partLabel=input.getAttribute('data-part-label');

    var orderId=input.getAttribute('data-order-id'),
        url=input.getAttribute('data-upload-url'),
        csrf=input.getAttribute('data-csrf');

    if(!entryId||!orderId||!url||!csrf){
      resolve();
      return;
    }

    var domId=entryId.replace(':','-').replace('[','').replace(']','');
    var thumbWrap=document.getElementById('photo-thumbs-'+domId),
        spinner=document.getElementById('uploading-'+domId);

    var row=input.closest('.damage-row');
    var sel=row?row.querySelector('.js-detail'):null;
    var dmgType=(sel&&sel.value)?sel.value:'';

    if(dmgType==='Sonstiges'){
      var oi=row?row.querySelector('.js-other-wrap input'):null;
      dmgType=(oi&&oi.value.trim())?oi.value.trim():'Sonstiges';
    }

    var caption=(partLabel||'')+(dmgType?' - '+dmgType:'');

    if(spinner) spinner.classList.remove('d-none');

    var fd=new FormData();
    fd.append('photos[]',file);
    fd.append('id',orderId);
    fd.append('form','external-condition');
    fd.append('document_type','Schadensfoto');
    fd.append('damage_component',entryId);
    fd.append('caption',caption);
    fd.append('_token',csrf);

    fetch(url,{
      method:'POST',
      body:fd,
      headers:{'X-Requested-With':'XMLHttpRequest'}
    })
    .then(function(r){
      return r.json();
    })
    .then(function(data){
      if(data.success&&data.items){

        if(!thumbWrap){
          thumbWrap = row ? row.querySelector('.damage-photo-thumbs') : null;
        }

        if(thumbWrap){
          data.items.forEach(function(item){
            if(item.image1){
              thumbWrap.appendChild(
                makeDamageThumb(item.id,item.image1)
              );
            }
          });
        }
      }
    })
    .catch(function(err){
      console.error(err);
    })
    .finally(function(){
      if(spinner) spinner.classList.add('d-none');
      resolve();
    });

  });
}
function bindPhotoInput(input){
  input.addEventListener('change', async function(){

    const files = Array.from(this.files);

    for(const file of files){
      await uploadDamagePhoto(input, file);
    }

    this.value = '';
  });
}

  function bindPhotoToggle(row) {
    var sel=row.querySelector('.js-detail'); if(!sel) return;
    var ps=row.querySelector('.damage-photo-section'); if(!ps) return;
    var apply=function(){ ps.classList.toggle('hidden',!sel.value||sel.value===''); };
    sel.addEventListener('change', apply); apply();
  }
  function bindRemovePhotosInRow(row){
    row.querySelectorAll('.rm-photo').forEach(bindRemovePhoto);
  }
  function bindFileInputsInRow(row){
    row.querySelectorAll('.js-damage-photo-input').forEach(bindPhotoInput);
  }

  // Init existing rows
  document.querySelectorAll('.damage-row').forEach(function(row){
    bindPhotoToggle(row);
    bindRemovePhotosInRow(row);
    bindFileInputsInRow(row);
  });

  // Status -> Multi-Schäden Wrap per Box
  document.querySelectorAll('.box').forEach(function(box){
    var statusSel = box.querySelector('.js-status');
    var wrap = box.querySelector('.js-multi-wrap');
    if (!statusSel || !wrap) return;
    function toggle(){ wrap.classList.toggle('hidden', (statusSel.value||'').toLowerCase() !== 'beschädigt'); }
    statusSel.addEventListener('change', toggle);
    toggle();
  });

  // Delegation: Add/Remove + Sonstiges + Photo toggle
  document.querySelectorAll('.box').forEach(function(box){
    var boxName = box.getAttribute('data-name') || '';
    var partLabel = box.getAttribute('data-part-label') || '';
    var orderId = box.getAttribute('data-order-id') || '';
    var uploadUrl = box.getAttribute('data-upload-url') || '';
    var csrf = box.getAttribute('data-csrf') || '';

    box.addEventListener('click', function(e){
      // Hinzufügen
      if (e.target.closest('.js-add-detail')){
        var multi = e.target.closest('.box').querySelector('.js-multi-wrap');
        if (!multi) return;
        var list = multi.querySelector('.js-details-list');
        var tpl  = multi.querySelector('.js-detail-template');
        if (list && tpl){
          var node = tpl.content.cloneNode(true);
          var newRow = node.querySelector ? node : node.firstElementChild;
          // Find the actual .damage-row element
          var rowEl = node.querySelector ? null : null;
          // Insert and find it
          var countBefore = list.querySelectorAll('.damage-row').length;
          list.appendChild(node);
          var rows = list.querySelectorAll('.damage-row');
          var addedRow = rows[rows.length-1];
          if(addedRow) {
            var entryPrefix = box.getAttribute('data-entry-prefix') || boxName;
            var newEntryId = entryPrefix + ':' + countBefore;
            addedRow.setAttribute('data-entry-id', newEntryId);
            // Set data on file input
            var fi = addedRow.querySelector('.js-damage-photo-input');
            if(fi && orderId) {
              fi.setAttribute('data-entry-id', newEntryId);
              fi.setAttribute('data-part-label', partLabel);
              fi.setAttribute('data-order-id', orderId);
              fi.setAttribute('data-upload-url', uploadUrl);
              fi.setAttribute('data-csrf', csrf);
              bindPhotoInput(fi);
            }
            // Set thumb container id
            var tc = addedRow.querySelector('.damage-photo-thumbs');
            if(tc) tc.id = 'photo-thumbs-' + newEntryId.replace(':','-').replace('[','').replace(']','');
            // Set spinner id
            var sp = addedRow.querySelector('.damage-photo-uploading');
            if(sp) sp.id = 'uploading-' + newEntryId.replace(':','-').replace('[','').replace(']','');
            bindPhotoToggle(addedRow);
          }
        }
      }
      // Entfernen
      if (e.target.closest('.js-remove-detail')){
        var row  = e.target.closest('.damage-row');
        var list = e.target.closest('.js-details-list');
        if (row && list){
          var count = list.querySelectorAll('.damage-row').length;
          if (count > 1) row.remove();
        }
      }
    });

    // Sonstiges + photo toggle per row
    box.addEventListener('change', function(e){
      if (e.target.classList.contains('js-detail')){
        var row = e.target.closest('.damage-row');
        if (!row) return;
        // Sonstiges toggle
        var otherWrap  = row.querySelector('.js-other-wrap');
        var otherInput = otherWrap ? otherWrap.querySelector('input,textarea') : null;
        var isOther = e.target.value === 'Sonstiges';
        if (otherWrap){ otherWrap.classList.toggle('hidden', !isOther); if (otherInput) otherInput.required = isOther; }
        // Photo section toggle
        var ps = row.querySelector('.damage-photo-section');
        if (ps) ps.classList.toggle('hidden', !e.target.value || e.target.value === '');
      }
    });
  });
})();
</script>
@endsection

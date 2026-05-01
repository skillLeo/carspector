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

  /* Felgen-Unterabschnitt */
  .rim-sub { border:1px solid #e5e7eb; border-radius:10px; background:#fff; padding:12px; margin-bottom:12px; }

  /* Erzwingt einspaltig (auch Desktop) */
  .force-single .row > [class*="col-"] { flex:0 0 100% !important; max-width:100% !important; }
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

              <div class="doc-row mb-3 box" data-scope="exterior" data-name="{{ $k }}">
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
                      @endphp

                      <div class="damage-row">
                        {{-- Zeile 1: Schaden-Auswahl + Löschen rechts --}}
                        <div class="damage-line">
                          <select name="{{ $k }}_details[]" class="form-select select-tall js-detail">
                            <option value="">-- bitte wählen --</option>
                            @foreach($options as $opt)
                              <option value="{{ $opt }}" {{ $dVal===$opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                          </select>
                          <button type="button" class="btn btn-danger btn-sm btn-del js-remove-detail"><i class="fa-solid fa-trash-can"></i></button>
                        </div>

                        {{-- Zeile 2 (optional): Sonstiges-Beschreibung --}}
                        <div class="mt-2 js-other-wrap {{ $dVal==='Sonstiges' ? '' : 'hidden' }}">
                          <input type="text" name="{{ $k }}_details_other[]" class="form-control input-compact" placeholder="kurz beschreiben…" value="{{ $oVal }}">
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
                        <button type="button" class="btn btn-danger btn-sm btn-del js-remove-detail">🗑️</button>
                      </div>
                      <div class="mt-2 js-other-wrap hidden">
                        <input type="text" name="{{ $k }}_details_other[]" class="form-control input-compact" placeholder="kurz beschreiben…">
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

                <div class="rim-sub box" data-scope="rim" data-name="rims[{{ $i }}]">
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
                        @endphp

                        <div class="damage-row">
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

              <div class="doc-row mb-3 box" data-scope="mechanic" data-name="{{ $k }}">
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
                      @endphp

                      <div class="damage-row">
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
  // Status -> Multi-Schäden Wrap per Box
  document.querySelectorAll('.box').forEach(function(box){
    const statusSel = box.querySelector('.js-status');
    const wrap = box.querySelector('.js-multi-wrap');
    if (!statusSel || !wrap) return;
    function toggle(){ wrap.classList.toggle('hidden', (statusSel.value||'').toLowerCase() !== 'beschädigt'); }
    statusSel.addEventListener('change', toggle);
    toggle();
  });

  // Delegation: Add/Remove + Sonstiges an/aus
  document.querySelectorAll('.box').forEach(function(box){
    box.addEventListener('click', function(e){
      // Hinzufügen
      if (e.target.closest('.js-add-detail')){
        const multi = e.target.closest('.box').querySelector('.js-multi-wrap');
        if (!multi) return;
        const list = multi.querySelector('.js-details-list');
        const tpl  = multi.querySelector('.js-detail-template');
        if (list && tpl){
          list.appendChild(tpl.content.cloneNode(true));
        }
      }
      // Entfernen
      if (e.target.closest('.js-remove-detail')){
        const row  = e.target.closest('.damage-row');
        const list = e.target.closest('.js-details-list');
        if (row && list){
          const count = list.querySelectorAll('.damage-row').length;
          if (count > 1) row.remove(); // mindestens 1 Zeile behalten
        }
      }
    });

    // „Sonstiges“ Feld je Zeile toggeln
    box.addEventListener('change', function(e){
      if (e.target.classList.contains('js-detail')){
        const row = e.target.closest('.damage-row');
        if (!row) return;
        const otherWrap  = row.querySelector('.js-other-wrap');
        const otherInput = otherWrap ? otherWrap.querySelector('input,textarea') : null;
        const isOther = e.target.value === 'Sonstiges';
        if (otherWrap){
          otherWrap.classList.toggle('hidden', !isOther);
          if (otherInput) otherInput.required = isOther;
        }
      }
    });
  });
})();
</script>
@endsection

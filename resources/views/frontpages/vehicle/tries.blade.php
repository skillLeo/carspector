@extends('mainpages.examlayout')

@section('title', 'Bereifung')

@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background: #f8fafc; min-height: 100dvh; }
  .card-modern { border: 1px solid rgba(0,0,0,.06); border-radius: var(--radius); overflow: hidden; box-shadow: 0 12px 28px rgba(2,6,23,.06); }
  .card-modern .card-header { background: linear-gradient(180deg,#fff,#f3f4f6); border-bottom: 1px solid #eef2f7; }
  .card-body.pt-fix { padding-top: 1rem !important; }

  /* Reifenkarten */
  .tire-card { border: 1px solid #e5e7eb; border-radius: 12px; background: #f9fafb; padding: 16px; }
  .tire-size-wrap { border:1px solid #e5e7eb; border-radius:12px; overflow:hidden; background:#fff; }
  .tire-size-wrap input { border:0; text-align:center; height: 48px; }
  .tire-size-wrap input + input { border-left:1px solid #e5e7eb; }
  .pro-mm-field { text-align:center; }
  .select-tall { height: 48px; }
  .input-compact { height: 48px; } /* Textfelder gleiche Höhe wie Select */
  .hidden { display:none !important; }

  .btn-comment { border:0; background:transparent; padding:0; }
  .badge-pos { display:inline-flex; align-items:center; justify-content:center; width:2.1rem; height:2.1rem; border-radius:8px; background:#eef2f7; font-weight:700; }

  .form-max-650 {
    max-width: 650px;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
  }
</style>

<div class="container-fluid page-bg py-5 py-md-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-9 col-xxl-8 form-max-650">

      <form method="POST" action="{{ route('examination.store') }}" id="externalConditionForm" novalidate>
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="form" value="save-back">
        <input type="hidden" name="next_url" value="{{ route('examiner.order', ['id' => $id]) }}">

        {{-- Link oben: Speichern & zurück zum Hauptmenü (Link-Look, aber Submit) --}}
        <div class="my-2">
          <button type="button" class="js-save-back fw-semibold d-inline-block py-1 pb-3" style="color: var(--primary); text-decoration: none; background: transparent; border: 0;">
            <i class="fa-solid fa-arrow-left me-2"></i> Speichern &amp; zurück zum Hauptmenü
          </button>
        </div>

      <div class="card card-modern">
        <div class="card-header border-0 p-4 pb-4">
          <h1 class="h4 mb-0">Bereifung</h1>
        </div>

        <div class="card-body pt-fix">
          <form method="POST" action="{{ route('examination.store') }}" id="tiresForm">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="tires">
            <input type="hidden" name="next_url" value="{{ route('examiner.tries.body', ['id' => $id]) }}">


            <div class="tire-repeater" id="tireRepeater">
              <div data-repeater-list="tires">

                <!-- ONE TIRE CARD (repeater template) -->
                <div data-repeater-item class="tire-card mb-4">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                      <span class="fw-semibold">Reifen</span>
                      <span class="badge-pos js-position-badge">VL</span>
                    </div>
                  </div>

                  <!-- hidden fields -->
                  <input type="hidden" name="comments" class="js-comments">
                  <input type="hidden" name="set" class="js-set" value="1">
                  <input type="hidden" name="is_set_lead" class="js-lead" value="0">
                  <input type="hidden" name="position" class="js-position-input" value="VL"><!-- feste Position -->

                  <!-- Hersteller -->
                  <div class="mt-3">
                    <label class="form-label mb-1">Hersteller</label>
                    <input type="text"
                           name="manufacturer"
                           class="form-control input-compact js-manufacturer"
                           placeholder="z. B. Michelin"
                           aria-label="Reifenhersteller">
                  </div>

                  <!-- Art -->
                  <div class="mt-3">
                    <label class="form-label mb-1">Art</label>
                    <select name="type" class="form-select select-tall js-type-select" aria-label="Reifenart">
                      <option value="">-- bitte wählen --</option>
                      <option value="Sommer">Sommer</option>
                      <option value="Winter">Winter</option>
                      <option value="Ganzjahresreifen">Allwetter</option>
                    </select>
                  </div>

                  <!-- Größe -->
                  <div class="mt-4">
                    <label class="form-label mb-2">Reifengröße (z. B. 255 / 55 R 18)</label>
                    <div class="tire-size-wrap d-flex">
                      <input type="text" name="tire_size_1" class="form-control" placeholder="255" aria-label="Breite">
                      <input type="text" name="tire_size_2" class="form-control" placeholder="55" aria-label="Höhe">
                      <input type="text" name="tire_size_3" class="form-control" placeholder="R18" aria-label="Zoll">
                    </div>
                  </div>

                  <!-- Profil & DOT -->
                  <div class="row g-3 mt-2">
                    <div class="col-6">
                      <label class="form-label">Profil (mm)</label>
                      <input type="text" name="tire_profile" class="form-control pro-mm-field" placeholder="0,0" aria-label="Profil in Millimetern">
                    </div>
                    <div class="col-6">
                      <label class="form-label">DOT</label>
                      <input type="text" name="tire_dot" class="form-control pro-mm-field" placeholder="0000" aria-label="DOT">
                    </div>
                  </div>

                  <div class="d-flex flex-wrap gap-2 mt-4 set-actions">
                    <button type="button" class="btn btn-primary btn-sm js-apply-all d-none">Für alle Reifen im Satz übernehmen</button>
                    <button type="button" class="btn btn-danger btn-sm js-remove-set d-none">Diesen Reifensatz entfernen</button>
                  </div>
                </div>
                <!-- /ONE TIRE CARD -->
              </div>

              <!-- versteckter Create-Button (für Programmsteuerung) -->
              <button type="button" class="btn btn-outline-secondary d-none js-create-one" data-repeater-create>_</button>

              <!-- sichtbarer Button: genau einen Zusatzsatz hinzufügen (4 Reifen) -->
              <button type="button" class="btn btn-primary w-100 mt-2 mb-4 js-add-set">
                Zusätzlichen Reifensatz hinzufügen (4 Reifen)
              </button>
            </div>

            {{-- Zusatz unterhalb der 4 Reifen --}}
            @php
              $extraVal   = old('tire_extra', $examination->tire_extra ?? '');
              $sizeVal    = old('tire_extra_size', $examination->tire_extra_size ?? '');
              $expiryVal  = old('tire_repair_expiry', $examination->tire_repair_expiry ?? '');
              $showSize   = ($extraVal === 'spare');         // NUR bei Ersatzrad
              $showExpiry = ($extraVal === 'repair_kit');    // NUR bei Reifenflick-Set
            @endphp
            <div class="doc-row mb-3">
              <p class="doc-title mb-2">Ersatzrad oder Reifenflickset vorhanden?</p>
              <div class="row g-3">
                <div class="col-12">
                  <select name="tire_extra" id="tire_extra" class="form-select select-tall">
                    <option value="">-- bitte wählen --</option>
                    <option value="spare"       {{ $extraVal==='spare' ? 'selected' : '' }}>Ersatzrad vorhanden</option>
                    <option value="repair_kit"  {{ $extraVal==='repair_kit' ? 'selected' : '' }}>Reifenflick-Set vorhanden</option>
                    <option value="none"        {{ $extraVal==='none' ? 'selected' : '' }}>Nichts vorhanden</option>
                  </select>
                </div>

                <div class="col-12 col-md-6 {{ $showSize ? '' : 'hidden' }}" id="extra-size-wrap">
                  <label class="form-label">Größe / Profil in mm</label>
                  <input type="text" name="tire_extra_size" class="form-control input-compact" value="{{ $sizeVal }}" placeholder="z. B. T125/80 R16 | 8 mm">
                </div>

                <div class="col-12 col-md-6 {{ $showExpiry ? '' : 'hidden' }}" id="repair-exp-wrap">
                  <label class="form-label">Ablaufdatum</label>
                  <input type="text" name="tire_repair_expiry" class="form-control input-compact" value="{{ $expiryVal }}" placeholder="z. B. 12/27">
                </div>
              </div>
            </div>

            {{-- Abschnitts-Kommentar --}}
            <div class="pt-1 pb-3 col-12">
              <div class="doc-row">
                <p class="doc-title mb-2">Kommentar</p>
                <textarea name="vehicle_tires_comment" rows="4" class="form-control" placeholder="Allgemeine Bemerkungen">{{ old('vehicle_tires_comment', $examination->vehicle_tires_comment) }}</textarea>
              </div>
            </div>

     <div class="d-grid mb-2">
  <button type="submit" class="btn btn-primary btn-lg">Nächster Abschnitt</button>
 </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Comment Modal -->
<div class="modal fade" id="tireCommentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reifen-Kommentar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" rows="5" id="modalCommentInput"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="modalCommentSave" data-bs-dismiss="modal">Speichern</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/jquery.repeater@1.2.1/jquery.repeater.min.js"></script>
  <script>
    (function() {
      const basePositions = ['VL','VR','HL','HR'];
      const prefill = {!! json_encode($examination->tires ?? []) !!} || [];

      let extraSetAdded = false; // nur EIN zusätzlicher Satz erlaubt

      const $rep = $('#tireRepeater').repeater({ initEmpty: true });

      // ---- Prefill existing tires if present; else seed 4 defaults ----
      if (Array.isArray(prefill) && prefill.length > 0) {
        // Ensure each item has expected keys and sane defaults
        const normalized = prefill.map((src, idx) => ({
          set: Number(src.set || 1),
          is_set_lead: Number(src.is_set_lead || (idx % 4 === 0 ? 1 : 0)),
          position: (src.position || basePositions[idx % 4]).toString(),
          manufacturer: src.manufacturer || src.brand || '',
          type: src.type || '',
          tire_size_1: src.tire_size_1 || '',
          tire_size_2: src.tire_size_2 || '',
          tire_size_3: src.tire_size_3 || '',
          tire_profile: src.tire_profile || '',
          tire_dot: src.tire_dot || '',
          comments: src.comments || ''
        }));
        $rep.setList(normalized);
        // Reflect whether an extra set already exists
        extraSetAdded = normalized.some(it => Number(it.set) === 2);
        if (extraSetAdded) {
          $('.js-add-set').prop('disabled', true).text('Zusätzlicher Reifensatz hinzugefügt');
        }
      } else {
        const initialSeeds = [];
        for (let i = 0; i < 4; i++) {
          initialSeeds.push({
            set: 1,
            is_set_lead: i === 0 ? 1 : 0,
            position: basePositions[i],
            manufacturer: '',
            type: '',
            tire_size_1: '',
            tire_size_2: '',
            tire_size_3: '',
            tire_profile: '',
            tire_dot: '',
            comments: ''
          });
        }
        $rep.setList(initialSeeds);
      }

      // Nach setList die Karten binden
      $('#tireRepeater [data-repeater-item]').each(function(){ bindCard($(this)); });

      // ---- Zusatzsatz (Satz 2) hinzufügen / entfernen ----
      $('.js-add-set').on('click', function(){
        if (extraSetAdded) return; // nur einmal
        const $createBtn = $('.js-create-one');
        for (let i = 0; i < 4; i++) {
          $createBtn.trigger('click');
          const $new = $('[data-repeater-item]').last();
          // Seed-Werte Satz 2
          $new.find('[name$="[set]"]').val(2);
          $new.find('[name$="[is_set_lead]"]').val(i === 0 ? 1 : 0);
          $new.find('[name$="[position]"]').val(basePositions[i]);
          $new.find('.js-type-select').val('');
          $new.find('[name$="[manufacturer]"]').val('');
          $new.find('[name$="[tire_size_1]"]').val('');
          $new.find('[name$="[tire_size_2]"]').val('');
          $new.find('[name$="[tire_size_3]"]').val('');
          $new.find('[name$="[tire_profile]"]').val('');
          $new.find('[name$="[tire_dot]"]').val('');
          $new.find('[name$="[comments]"]').val('');
          bindCard($new);
        }
        extraSetAdded = true;
        $(this).prop('disabled', true).text('Zusätzlicher Reifensatz hinzugefügt');
      });

      function bindCard($card){
        // Badge zeigt feste Position aus Hidden-Input
        const $posHidden = $card.find('.js-position-input');
        const $badge = $card.find('.js-position-badge');
        const syncPos = () => $badge.text(($posHidden.val() || 'VL').toUpperCase());
        syncPos();

        // Kommentar-Modal
        $card.find('.js-open-comment').off('click.cmt').on('click.cmt', function(){
          window.__activeTireCard = $card;
          $('#modalCommentInput').val($card.find('.js-comments').val() || '');
        });

        // Satz-Aktionen
        updateSetActions($card);

        // Apply-all (nur Satz-Lead)
        $card.find('.js-apply-all').off('click.applyall').on('click.applyall', function(e){
          e.preventDefault();
          const vals = getCardValues($card);
          const setNo = $card.find('[name$="[set]"]').val();
          $('[data-repeater-item]').each(function(){
            const $t = $(this);
            if ($t.is($card)) return;
            if ($t.find('[name$="[set]"]').val() !== setNo) return;
            setCardValues($t, vals);
          });
        });

        // Satz entfernen (nur Satz 2 und nur Satz-Lead)
        $card.find('.js-remove-set').off('click.removeset').on('click.removeset', function(){
          const setNo = Number($card.find('[name$="[set]"]').val());
          if (setNo !== 2) return;
          const $items = $('[data-repeater-item]').filter(function(){ return Number($(this).find('[name$="[set]"]').val()) === 2; });
          $items.each(function(){
            const $it = $(this);
            $it.slideUp(120, function(){ $it.remove(); });
          });
          $('.js-add-set').prop('disabled', false).text('Zusätzlichen Reifensatz hinzufügen (4 Reifen)');
          extraSetAdded = false;
        });
      }

      function getCardValues($c){
        return {
          manufacturer: $c.find('input[name$="[manufacturer]"]').val() || '',
          type:      $c.find('.js-type-select').val() || '',
          size1:     $c.find('input[name$="[tire_size_1]"]').val(),
          size2:     $c.find('input[name$="[tire_size_2]"]').val(),
          size3:     $c.find('input[name$="[tire_size_3]"]').val(),
          profile:   $c.find('input[name$="[tire_profile]"]').val(),
          dot:       $c.find('input[name$="[tire_dot]"]').val(),
          comments:  $c.find('.js-comments').val()
        };
      }

      function setCardValues($c, v){
        $c.find('input[name$="[manufacturer]"]').val(v.manufacturer || '');
        $c.find('.js-type-select').val(v.type || '');
        $c.find('input[name$="[tire_size_1]"]').val(v.size1 || '');
        $c.find('input[name$="[tire_size_2]"]').val(v.size2 || '');
        $c.find('input[name$="[tire_size_3]"]').val(v.size3 || '');
        $c.find('input[name$="[tire_profile]"]').val(v.profile || '');
        $c.find('input[name$="[tire_dot]"]').val(v.dot || '');
        $c.find('.js-comments').val(v.comments || '');
      }

      function updateSetActions($c){
        const setNo = Number($c.find('[name$="[set]"]').val() || 1);
        const isLead = String($c.find('[name$="[is_set_lead]"]').val()) === '1' || String($c.find('.js-lead').val()) === '1';
        const $apply = $c.find('.js-apply-all');
        const $remove = $c.find('.js-remove-set');
        $apply.toggleClass('d-none', !isLead);
        $remove.toggleClass('d-none', !(isLead && setNo === 2));
      }

      // Modal speichern
      $('#modalCommentSave').on('click', function(){
        if(window.__activeTireCard){
          window.__activeTireCard.find('.js-comments').val($('#modalCommentInput').val());
          window.__activeTireCard = null;
        }
      });

      // Zusatz: Sichtbarkeit „Größe“ / „Ablaufdatum“
      const extraSel   = document.getElementById('tire_extra');
      const sizeWrap   = document.getElementById('extra-size-wrap');
      const expWrap    = document.getElementById('repair-exp-wrap');

      function toggleWrap(el, show){
        if(!el) return;
        el.classList.toggle('hidden', !show);
        el.querySelectorAll('input, select, textarea').forEach((i)=>{
          i.disabled = !show;
        });
      }
      function applyExtraVisibility(){
        if(!extraSel) return;
        const v = extraSel.value;
        const showSize = (v === 'spare');        // NUR Ersatzrad
        const showExp  = (v === 'repair_kit');   // NUR Reifenflick-Set
        toggleWrap(sizeWrap, showSize);
        toggleWrap(expWrap,  showExp);
      }
      if (extraSel){
        extraSel.addEventListener('change', applyExtraVisibility);
        applyExtraVisibility(); // initial (old/examination)
      }

      // Optional Submit-Hook
      $('#tiresForm').on('submit', function(){ /* Laravel erhält tires[] + tire_extra Felder */ });
    })();
  </script>
@endsection

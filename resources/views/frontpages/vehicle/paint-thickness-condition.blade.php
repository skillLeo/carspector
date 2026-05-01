@extends('mainpages.examlayout')

@section('title', 'Lackdicke & -zustand')

@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background: #f8fafc; min-height: 100dvh; }
  .card-modern { border: 1px solid rgba(0,0,0,.06); border-radius: var(--radius); overflow: hidden; box-shadow: 0 12px 28px rgba(2,6,23,.06); }
  .card-modern .card-header { background: linear-gradient(180deg,#fff,#f3f4f6); border-bottom: 1px solid #eef2f7; }
  .doc-row { border: 1px solid #e5e7eb; border-radius: 12px; background:#f9fafb; padding: 16px; }
  .doc-title { margin: 0; font-weight: 600; }
  .hidden { display:none !important; }

  /* Inputs */
  .input-micro { height: 44px; }
  .select-tall { height: 52px; padding-top:.5rem; padding-bottom:.5rem; }
  .add-more-btn { border:1px solid #6a6a6a !important; background:#fff !important; color:#716f6f !important; border-radius:6px; height:36px; }
  .form-max-650 { max-width:650px; margin:0 auto; width:100%; }

  /* Schaden-Zeile: 1 Select + Remove-Button */
  .damage-row { display:flex; gap:.5rem; align-items:center; }
  .damage-row select { flex:1; }
  .damage-row .js-damage-other-input { flex:1; }
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
          <h1 class="h4 mb-0">Lackdicke & -zustand</h1>
        </div>

        <div class="card-body pt-3">
          <form action="{{ route('examination.store') }}" method="POST" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="paint-thickness-condition">
            <input type="hidden" name="next_url" value="{{ route('examiner.vehicle.light', ['id' => $id]) }}">

            @php
              $parts = [
                ['label' => 'Motorhaube',       'key' => 'bonnet'],
                ['label' => 'Kotflügel VL',     'key' => 'fender_vl'],
                ['label' => 'Tür VL',           'key' => 'door_vl'],
                ['label' => 'Tür HL',           'key' => 'door_hl'],
                ['label' => 'Seitenwand HL',    'key' => 'quarter_hl'],
                ['label' => 'Heckklappe',       'key' => 'tailgate'],
                ['label' => 'Seitenwand HR',    'key' => 'quarter_hr'],
                ['label' => 'Tür HR',           'key' => 'door_hr'],
                ['label' => 'Tür VR',           'key' => 'door_vr'],
                ['label' => 'Kotflügel VR',     'key' => 'fender_vr'],
                ['label' => 'Dach',             'key' => 'roof'],
            ];

              $damageOptions = ['Steinschlag','Kratzer','Delle','Deformation', 'Riss','Lackabplatzer','Lackeinschlüsse','Lackschlieren', 'Lackschaden', 'Polierrückstände','Rost','Spachtelstellen', 'Spaltmaß abweichend','Kante beschädigt','Sonstiges'];

              $v = function($name) use($examination){ return old($name, $examination->$name ?? ''); };
            @endphp

            @foreach($parts as $p)
              @php
                $k = $p['key'];
                $thickness       = $v($k.'_paint_layer_thickness');
                $thicknessState  = $v($k.'_thickness_status');       // 'messbar' | 'nicht_messbar' | 'nicht_vorhanden'
                $repainted       = $v($k.'_repainted');              // 'yes' | 'no' | ''
                $anyDamage       = $v($k.'_any_damage');             // 'yes' | 'no' | ''
                $dmgKey          = $k.'_damages';
                $damages         = old($dmgKey, $examination->$dmgKey ?? []);
                if(!is_array($damages)) { $damages = $damages ? [$damages] : []; }

                $isNotMeasurable = ($thicknessState === 'nicht_messbar');
                $isNotPresent    = ($thicknessState === 'nicht_vorhanden');
              @endphp

              <div class="doc-row mb-3" data-part="{{ $k }}">
                <p class="pb-3 doc-title">{{ $p['label'] }}</p>

                {{-- Messbarkeit --}}
                <div class="row g-3">
                  <div class="col-12">
                    <label class="form-label">Messbarkeit</label>
                    <select name="{{ $k }}_thickness_status"
                            class="form-select select-tall js-thickness-status">
                      <option value="messbar"         {{ $thicknessState==='messbar' ? 'selected' : '' }}>Bauteil vorhanden & messbar</option>
                      <option value="nicht_messbar"   {{ $thicknessState==='nicht_messbar' ? 'selected' : '' }}>Bauteil nicht messbar</option>
                      <option value="nicht_vorhanden" {{ $thicknessState==='nicht_vorhanden' ? 'selected' : '' }}>Bauteil nicht vorhanden</option>
                    </select>
                  </div>
                </div>

                {{-- Lackschichtdicke --}}
                <div class="row g-3 mt-0">
                  <div class="col-12 js-thickness-input {{ ($isNotMeasurable || $isNotPresent) ? 'hidden' : '' }}">
                    <label class="form-label">Lackschichtdicke (µm)</label>
                    <input type="text" name="{{ $k }}_paint_layer_thickness"
                           class="form-control input-micro"
                           value="{{ $thickness }}">
                  </div>
                </div>

                {{-- Nachlackiert? --}}
                <div class="row g-3 mt-0">
                  <div class="col-12 js-repaint-col {{ ($isNotMeasurable || $isNotPresent) ? 'hidden' : '' }}">
                    <label class="form-label">Nachlackiert?</label>
                    <select name="{{ $k }}_repainted" class="form-select select-tall">
                      <option value="">-- bitte wählen --</option>
                      <option value="yes" {{ $repainted==='yes' ? 'selected' : '' }}>Ja</option>
                      <option value="no"  {{ $repainted==='no'  ? 'selected' : '' }}>Nein</option>
                    </select>
                  </div>
                </div>

                {{-- Schäden vorhanden? --}}
                <div class="row g-3 mt-0">
                  <div class="col-12 js-anydamage-col {{ $isNotPresent ? 'hidden' : '' }}">
                    <label class="form-label">Schäden vorhanden?</label>
                    <select name="{{ $k }}_any_damage"
                            class="form-select select-tall js-toggle"
                            data-target="#wrap-{{ $k }}-damage" data-when="yes">
                      <option value="">-- bitte wählen --</option>
                      <option value="yes" {{ $anyDamage==='yes' ? 'selected' : '' }}>Ja</option>
                      <option value="no"  {{ $anyDamage==='no'  ? 'selected' : '' }}>Nein</option>
                    </select>
                  </div>
                </div>

                {{-- Schäden-Liste --}}
                <div class="mt-3 {{ ($isNotPresent || $anyDamage!=='yes') ? 'hidden' : '' }}" id="wrap-{{ $k }}-damage">
                  <label class="form-label">Schäden</label>
                  <div id="damage-container-{{ $k }}">
                    @if(count($damages))
                      @foreach($damages as $dmg)
                        @php
                          $isOther = ($dmg === 'Sonstiges') || ($dmg !== '' && !in_array($dmg, $damageOptions, true));
                          $otherVal = $isOther && $dmg !== 'Sonstiges' ? $dmg : '';
                        @endphp
                        <div class="damage-row mb-2">
                          <select name="{{ $dmgKey }}[]" class="form-select js-damage-select">
                            <option value="">-- auswählen --</option>
                            @foreach($damageOptions as $opt)
                              <option value="{{ $opt }}" {{ $isOther ? ($opt==='Sonstiges' ? 'selected' : '') : ($opt===$dmg ? 'selected' : '') }}>{{ $opt }}</option>
                            @endforeach
                          </select>
                          <input type="text" class="form-control ms-1 js-damage-other-input {{ $isOther ? '' : 'hidden' }}" placeholder="Bitte angeben" value="{{ $otherVal }}" />
                          
                          <button type="button" class="btn btn-danger btn-sm btn-remove-dmg ms-1" title="Entfernen">
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>
                      @endforeach
                    @else
                      <div class="damage-row mb-2">
                        <select name="{{ $dmgKey }}[]" class="form-select js-damage-select">
                          <option value="">-- auswählen --</option>
                          @foreach($damageOptions as $opt)
                            <option value="{{ $opt }}">{{ $opt }}</option>
                          @endforeach
                        </select>
                        <input type="text" class="form-control ms-1 js-damage-other-input hidden" placeholder="Bitte angeben" />
                        <button type="button" class="btn btn-danger btn-sm btn-remove-dmg ms-1" title="Entfernen">
                          <i class="fa-solid fa-trash-can"></i>
                        </button>
                      </div>
                    @endif
                  </div>
                  <button type="button"
                          class="btn add-more-btn js-add-dmg"
                          data-target="#damage-container-{{ $k }}"
                          data-name="{{ $dmgKey }}[]">+ Schaden hinzufügen</button>
                </div>
              </div>
            @endforeach

            {{-- Allgemeiner Kommentar --}}
            <div class="doc-row mb-3">
              <label for="paint_general_comment" class="form-label">Allgemeiner Kommentar</label>
              <textarea id="paint_general_comment" name="paint_general_comment" rows="4" class="form-control">{{ old('paint_general_comment', $examination->paint_general_comment) }}</textarea>
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
@endsection

@section('scripts')
<script>
  (function(){
    // Toggle Schäden sichtbar/unsichtbar
    document.querySelectorAll('.js-toggle').forEach(function(sel){
      const targetSel = sel.getAttribute('data-target');
      const whenVal   = sel.getAttribute('data-when') || 'yes';
      const targetEl  = document.querySelector(targetSel);
      const apply = () => { if(targetEl) targetEl.classList.toggle('hidden', sel.value !== whenVal); };
      sel.addEventListener('change', apply);
      apply();
    });

    // Schaden-Zeile erstellen (Select + Remove)
    const isAdmin = false;
    function createDamageRow(name){
      const options = ['', 'Steinschlag', 'Kratzer','Delle','Deformation','Riss','Lackabplatzer','Lackeinschlüsse', 'Lackschlieren', 'Lackschaden', 'Polierrückstände', 'Rost','Spachtelstellen','Kante beschädigt', 'Sonstiges'];

      const row = document.createElement('div');
      row.className = 'damage-row mb-2';

      const select = document.createElement('select');
      select.name = name;
      select.className = 'form-select js-damage-select';
      options.forEach(function(txt, i){
        const o = document.createElement('option');
        o.value = txt;
        o.textContent = i === 0 ? '-- auswählen --' : txt;
        select.appendChild(o);
      });

      const other = document.createElement('input');
      other.type = 'text';
      other.placeholder = 'Bitte angeben';
      other.className = 'form-control ms-1 js-damage-other-input hidden';

      // no EN input

      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'btn btn-danger btn-sm btn-remove-dmg ms-1';
      btn.title = 'Entfernen';
      btn.innerHTML = '<i class="fa-solid fa-trash-can"></i>';
      btn.addEventListener('click', function(){
        const container = row.parentElement;
        row.remove();
        ensureAtLeastOne(container, name);
      });

      row.appendChild(select);
      row.appendChild(other);
      // no EN input
      row.appendChild(btn);
      const applyToggle = () => {
        const show = (select.value === 'Sonstiges');
        other.classList.toggle('hidden', !show);
        if (!show) other.value = '';
        if (isAdmin) {
          en.classList.toggle('hidden', !show);
          if (!show) en.value = '';
        }
      };
      select.addEventListener('change', applyToggle);
      applyToggle();
      return row;
    }

    function ensureAtLeastOne(container, name){
      if (!container) return;
      if (container.querySelectorAll('.damage-row').length === 0){
        container.appendChild(createDamageRow(name));
      }
    }

    // + Schaden hinzufügen
    document.querySelectorAll('.js-add-dmg').forEach(function(btn){
      btn.addEventListener('click', function(){
        const target = document.querySelector(this.getAttribute('data-target'));
        const name   = this.getAttribute('data-name');
        if (!target || !name) return;
        target.appendChild(createDamageRow(name));
      });
    });

    // Remove-Buttons an bestehenden Rows binden (Server-Rendering)
    document.querySelectorAll('.btn-remove-dmg').forEach(function(btn){
      btn.addEventListener('click', function(){
        const row = this.closest('.damage-row');
        const container = row ? row.parentElement : null;
        const sel = row ? row.querySelector('select') : null;
        const name = sel ? sel.name : '';
        row.remove();
        ensureAtLeastOne(container, name);
      });
    });

    // Toggle-Handler für bestehende Selects initialisieren
    document.querySelectorAll('.damage-row .js-damage-select').forEach(function(sel){
      const other = sel.parentElement.querySelector('.js-damage-other-input');
      const apply = () => {
        const show = (sel.value === 'Sonstiges');
        if (other) {
          other.classList.toggle('hidden', !show);
          if (!show) other.value = '';
        }
      };
      sel.addEventListener('change', apply);
      apply();
    });

    // Vor dem Absenden: Für "Sonstiges" nur den manuellen Text senden
    document.querySelectorAll('form').forEach(function(form){
      if (!form.querySelector('.damage-row select')) return;
      form.addEventListener('submit', function(){
        this.querySelectorAll('.damage-row').forEach(function(row){
          const sel = row.querySelector('select');
          const other = row.querySelector('.js-damage-other-input');
          const otherEn = row.querySelector('.js-damage-other-input-en');
          if (!sel) return;
          if (sel.value === 'Sonstiges') {
            const txt = (other && other.value) ? other.value.trim() : '';
            if (txt !== '') {
              const hidden = document.createElement('input');
              hidden.type = 'hidden';
              hidden.name = sel.name;
              hidden.value = txt;
              form.appendChild(hidden);
            }
            if (isAdmin && otherEn) {
              const txtEn = otherEn.value ? otherEn.value.trim() : '';
              if (txtEn !== ''){
                const h2 = document.createElement('input');
                h2.type = 'hidden';
                h2.name = sel.name.replace('[]','_en[]');
                h2.value = txtEn;
                form.appendChild(h2);
              }
            }
            sel.disabled = true;
          }
        });
      });
    });

    // Logik Messbarkeit (unverändert)
    function applyThicknessStatus(select){
      const box = select.closest('.doc-row');
      if (!box) return;

      const val = (select.value || '').toLowerCase();
      const thicknessInput = box.querySelector('.js-thickness-input');
      const repaintCol     = box.querySelector('.js-repaint-col');
      const anyDmgCol      = box.querySelector('.js-anydamage-col');
      const dmgWrap        = box.querySelector('[id^="wrap-"][id$="-damage"]');

      if (val === 'nicht_messbar'){
        if (thicknessInput) thicknessInput.classList.add('hidden');
        if (repaintCol)     repaintCol.classList.add('hidden');
        if (anyDmgCol)      anyDmgCol.classList.remove('hidden');
      } else if (val === 'nicht_vorhanden'){
        if (thicknessInput) thicknessInput.classList.add('hidden');
        if (repaintCol)     repaintCol.classList.add('hidden');
        if (anyDmgCol)      anyDmgCol.classList.add('hidden');
        if (dmgWrap)        dmgWrap.classList.add('hidden');
      } else {
        if (thicknessInput) thicknessInput.classList.remove('hidden');
        if (repaintCol)     repaintCol.classList.remove('hidden');
        if (anyDmgCol)      anyDmgCol.classList.remove('hidden');
      }
    }

    document.querySelectorAll('.js-thickness-status').forEach(function(sel){
      sel.addEventListener('change', function(){ applyThicknessStatus(sel); });
      applyThicknessStatus(sel);
    });
  })();
</script>
@endsection

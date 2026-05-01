@extends('mainpages.examlayout')

@section('title', 'Beleuchtung')

@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background:#f8fafc; min-height:100dvh; }
  .card-modern { border:1px solid rgba(0,0,0,.06); border-radius:var(--radius); overflow:hidden; box-shadow:0 12px 28px rgba(2,6,23,.06); }
  .card-modern .card-header { background:linear-gradient(180deg,#fff,#f3f4f6); border-bottom:1px solid #eef2f7; }
  .form-max-650 { max-width:650px; margin:0 auto; width:100%; }

  .doc-row { border:1px solid #e5e7eb; border-radius:12px; background:#f9fafb; padding:16px; }
  .doc-title { margin:0; font-weight:600; }
  .select-tall { height:48px; }
  .input-compact { height:42px; }
  .hidden { display:none !important; }

  /* Schäden */
  .damage-row { margin-bottom:.5rem; }
  .damage-line { display:flex; align-items:center; gap:.5rem; }
  .damage-line .damage-select { flex:1 1 auto; }   /* Select nimmt Breite */
  .btn-remove-dmg { white-space:nowrap; }
  .damage-other { margin-top:.5rem; }              /* steht darunter */
</style>

<div class="container-fluid page-bg py-5 py-md-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-9 col-xxl-8 form-max-650">

    <form method="POST" action="{{ route('examination.store') }}" id="externalConditionForm" novalidate>
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="form" value="save-back">
        <input type="hidden" name="next_url" value="{{ route('examiner.order', ['id' => $id]) }}">

        <div class="my-2">
          <button type="button" class="js-save-back fw-semibold d-inline-block py-1 pb-3" style="color: var(--primary); text-decoration: none; background: transparent; border: 0;">
            <i class="fa-solid fa-arrow-left me-2"></i> Speichern &amp; zurück zum Hauptmenü
          </button>
        </div>

      <div class="card card-modern">
        <div class="card-header border-0 p-4 pb-4">
          <h1 class="h4 mb-0">Beleuchtung</h1>
        </div>

        <div class="card-body pt-3">
          <form method="POST" action="{{ route('examination.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="vehicle-light">
            <input type="hidden" name="next_url" value="{{ route('examiner.external.condition', ['id' => $id]) }}">

            @php
              $items = [
                ['label' => 'Scheinwerfer',           'key' => 'headlights'],
                ['label' => 'Rücklichter',            'key' => 'rear_lights'],
                ['label' => 'Bremslicht',             'key' => 'brake_light'],
                ['label' => 'Rückfahrlicht',          'key' => 'reverse_light'],
                ['label' => 'Blinker',                'key' => 'indicator'],
                ['label' => 'Warnblinkanlage',        'key' => 'hazard_lights'],
                ['label' => 'Nebelscheinwerfer',      'key' => 'fog_lights'],
                ['label' => 'Abblendlicht',           'key' => 'low_beam'],
                ['label' => 'Innenraumbeleuchtung',   'key' => 'interior_light'],
                ['label' => 'Tagfahrlicht',           'key' => 'daytime_running_light'],
              ];

              $damageOptions = [
                'Kratzer', 'Riss', 'Wassereintritt', 'Streuscheibe matt',
                'Halterung gebrochen', 'Gehäuse locker', 'Kabel/Stecker beschädigt', 'Sonstiges'
              ];

              $v = fn($name, $default=null) => old($name, data_get($examination, $name, $default));
            @endphp

            @foreach($items as $it)
              @php
                $k           = $it['key'];
                $statusName  = $k;
                $statusVal   = (string) $v($statusName);

                // Mehrfach-Schäden
                $dmgKey   = $k.'_damages';
                $otherKey = $k.'_damages_other';
                $savedDamages = $v($dmgKey, []);
                $savedOthers  = $v($otherKey, []);
                if (!is_array($savedDamages)) $savedDamages = $savedDamages ? [$savedDamages] : [];
                if (!is_array($savedOthers))  $savedOthers  = $savedOthers  ? [$savedOthers]  : [];

                $isDamaged = in_array(mb_strtolower($statusVal), ['beschaedigt','beschädigt']);
              @endphp

              <div class="doc-row mb-3" data-part="{{ $k }}">
                <p class="pb-2 doc-title">{{ $it['label'] }}</p>

                <div class="row g-3">
                  <div class="col-12">
                    <select name="{{ $statusName }}" class="form-select select-tall js-status"
                            data-target="#wrap-{{ $k }}-damage" data-when="beschaedigt">
                      <option value="">-- bitte wählen --</option>
                      <option value="funktioniert"    {{ $statusVal==='funktioniert' ? 'selected' : '' }}>i.O.</option>
                      <option value="defekt"          {{ $statusVal==='defekt' ? 'selected' : '' }}>Defekt</option>
                      <option value="beschaedigt"     {{ $isDamaged ? 'selected' : '' }}>Beschädigt</option>
                      <option value="nicht_vorhanden" {{ $statusVal==='nicht_vorhanden' ? 'selected' : '' }}>Nicht vorhanden</option>
                    </select>
                  </div>
                </div>

                <div class="mt-3 {{ $isDamaged ? '' : 'hidden' }}" id="wrap-{{ $k }}-damage">
                  <label class="form-label">Beschädigungen</label>

                  <div id="damage-container-{{ $k }}">
                    @php $count = max(1, count($savedDamages)); @endphp
                    @for($i=0; $i<$count; $i++)
                      @php
                        $dVal = $savedDamages[$i] ?? '';
                        $oVal = $savedOthers[$i]  ?? '';
                        $showOther = ($dVal === 'Sonstiges');
                      @endphp
                      <div class="damage-row">
                        <div class="damage-line">
                          <select name="{{ $dmgKey }}[]" class="form-select damage-select js-dmg-select">
                            <option value="">-- auswählen --</option>
                            @foreach($damageOptions as $opt)
                              <option value="{{ $opt }}" {{ $dVal===$opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                          </select>
                          <button type="button" class="btn btn-danger btn-sm btn-remove-dmg" title="Entfernen">
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>

                        <input type="text"
                               name="{{ $otherKey }}[]"
                               class="form-control input-compact damage-other {{ $showOther ? '' : 'hidden' }}"
                               value="{{ $oVal }}"
                               placeholder="Bitte beschreiben (Sonstiges)">
                        
                      </div>
                    @endfor
                  </div>

                  <button type="button" style="color: gray; border: 1px solid gray"
                          class="btn add-more-btn mt-1 js-add-dmg"
                          data-target="#damage-container-{{ $k }}"
                          data-name="{{ $dmgKey }}[]"
                          data-name-other="{{ $otherKey }}[]">
                    + weitere Beschädigung
                  </button>
                </div>
              </div>
            @endforeach

            <div class="mb-4">
              <label for="lights_comment" class="form-label fw-semibold">Gesamtkommentar Beleuchtung</label>
              <textarea name="lights_comment" id="lights_comment" rows="3" class="form-control"
                        placeholder="Allgemeine Bemerkungen...">{{ old('lights_comment', $examination->lights_comment) }}</textarea>
              
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
  const normalize = (v) => (v||'').toString().toLowerCase()
    .normalize('NFD').replace(/\p{Diacritic}/gu,'');

  // Status -> Schadenbereich ein/aus
  document.querySelectorAll('.js-status').forEach(sel=>{
    const targetSel = sel.dataset.target;
    const whenVal   = sel.dataset.when || 'beschaedigt';
    const targetEl  = document.querySelector(targetSel);
    const apply = ()=>{ if(targetEl) targetEl.classList.toggle('hidden', normalize(sel.value)!==whenVal); };
    sel.addEventListener('change', apply); apply();
  });

  // Schaden-Zeile erzeugen (Select + löschen in einer Zeile; Textfeld darunter)
  const isAdmin = false;
  function createDamageRow(name, nameOther, nameOtherEn){
    const row = document.createElement('div');
    row.className = 'damage-row';

    const line = document.createElement('div');
    line.className = 'damage-line';

    const sel = document.createElement('select');
    sel.name = name;
    sel.className = 'form-select damage-select js-dmg-select';
    const opts = ['', 'Kratzer','Riss','Wassereintritt','Streuscheibe matt','Halterung gebrochen','Gehäuse locker','Kabel/Stecker beschädigt','Sonstiges'];
    opts.forEach((t,i)=>{
      const o = document.createElement('option');
      o.value = t;
      o.textContent = i===0 ? '-- auswählen --' : t;
      sel.appendChild(o);
    });

    const rm = document.createElement('button');
    rm.type = 'button';
    rm.className = 'btn btn-danger btn-sm btn-remove-dmg';
    rm.title = 'Entfernen';
    rm.innerHTML = '<i class="fa-solid fa-trash-can"></i>';

    const other = document.createElement('input');
    other.type  = 'text';
    other.name  = nameOther;
    other.className = 'form-control input-compact damage-other hidden';
    other.placeholder = 'Bitte beschreiben (Sonstiges)';

    sel.addEventListener('change', ()=>{
      const isOther = sel.value === 'Sonstiges';
      other.classList.toggle('hidden', !isOther);
      other.required = isOther;
      if(!isOther) other.value = '';
      if (isAdmin && otherEn){
        otherEn.classList.toggle('hidden', !isOther);
        if(!isOther) otherEn.value = '';
      }
    });

    rm.addEventListener('click', ()=>{
      const container = row.parentElement;
      const selectName = sel.name;
      const otherName  = other.name;
      row.remove();
      ensureAtLeastOne(container, selectName, otherName);
    });

    line.appendChild(sel);
    line.appendChild(rm);
    row.appendChild(line);
    row.appendChild(other);
    // no EN input for Other
    return row;
  }

  function ensureAtLeastOne(container, name, nameOther){
    if (!container) return;
    if (container.querySelectorAll('.damage-row').length === 0){
      container.appendChild(createDamageRow(name, nameOther));
    }
  }

  // + weitere Beschädigung
  document.querySelectorAll('.js-add-dmg').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const target = document.querySelector(btn.getAttribute('data-target'));
      const name   = btn.getAttribute('data-name');
      const nameOther = btn.getAttribute('data-name-other');
      const nameOtherEn = btn.getAttribute('data-name-other-en');
      if(!target || !name || !nameOther) return;
      target.appendChild(createDamageRow(name, nameOther, nameOtherEn));
    });
  });

  // Vorhandene Rows binden
  document.querySelectorAll('.damage-row').forEach(row=>{
    const sel = row.querySelector('.js-dmg-select');
    const other = row.querySelector('.damage-other');
    const rm = row.querySelector('.btn-remove-dmg');

    if(sel){
      const apply = ()=>{
        const isOther = sel.value === 'Sonstiges';
        other && other.classList.toggle('hidden', !isOther);
        if(other) other.required = isOther;
      };
      sel.addEventListener('change', apply); apply();
    }
    if(rm){
      rm.addEventListener('click', ()=>{
        const container = row.parentElement;
        const selEl = row.querySelector('select');
        const name = selEl ? selEl.name : '';
        const otherName = (other && other.name) ? other.name : '';
        row.remove();
        ensureAtLeastOne(container, name, otherName);
      });
    }
  });
})();
</script>
@endsection

@extends('mainpages.examlayout')

@section('title', 'Karosserie')

@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background: #f8fafc; min-height: 100dvh; }
  .card-modern { border: 1px solid rgba(0,0,0,.06); border-radius: var(--radius); overflow: hidden; box-shadow: 0 12px 28px rgba(2,6,23,.06); }
  .card-modern .card-header { background: linear-gradient(180deg,#fff,#f3f4f6); border-bottom: 1px solid #eef2f7; }
  .doc-row { border: 1px solid #e5e7eb; border-radius: 12px; background:#f9fafb; padding: 16px; }
  .doc-title { margin: 0; font-weight: 600; }
  .hidden { display:none !important; }
  .select-tall { height:52px; padding-top:.5rem; padding-bottom:.5rem; }
  .add-more-btn { border: 1px solid #6a6a6a !important; background:#fff !important; color:#716f6f !important; border-radius: 6px; height: 36px; }
  .form-max-650 { max-width:650px; margin:0 auto; width:100%; }

  /* Eine Schaden-Zeile = genau 1 Select + Remove-Button */
  .damage-row { display:flex; gap:.5rem; align-items:center; }
  .damage-row select { flex:1; }
  .damage-row .js-damage-other-input { flex:1; }
  .damage-row .btn-remove-damage { white-space: nowrap; }
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
          <h1 class="h4 mb-0">Karosserie</h1>
        </div>

        <div class="card-body pt-3">
          <form method="POST" action="{{ route('examination.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="body">
            <input type="hidden" name="next_url" value="{{ route('examiner.paint.thickness.condition', ['id' => $id]) }}">

            {{-- Hidden Comment Felder (optional) --}}
            <input type="hidden" name="front_bumper_comments" value="{{ old('front_bumper_comments', $examination->front_bumper_comments) }}">
            <input type="hidden" name="rear_bumper_comments" value="{{ old('rear_bumper_comments', $examination->rear_bumper_comments) }}">
            <input type="hidden" name="are_gap_ok_comments" value="{{ old('are_gap_ok_comments', $examination->are_gap_ok_comments) }}">
            <input type="hidden" name="grill_comments" value="{{ old('grill_comments', $examination->grill_comments) }}">
            <input type="hidden" name="sill_left_comments" value="{{ old('sill_left_comments', $examination->sill_left_comments) }}">
            <input type="hidden" name="sill_right_comments" value="{{ old('sill_right_comments', $examination->sill_right_comments) }}">

            @php
              $val = fn($key) => old($key, $examination->{$key} ?? '');
              $damageOptions = [
                'Steinschlag', 'Kratzer', 'Delle', 'Riss', 'Lackabplatzer', 'Deformation', 'Rost','Polierrückstände','Nachlackierung','Unsachgemäße Nachlackierung / Instandsetzung','Halterung gebrochen', 'Spaltmaß abweichend', 'Sonstiges'
              ];
              $parts = [
                ['label' => 'Stoßstange vorne', 'key' => 'front_bumper'],
                ['label' => 'Stoßstange hinten', 'key' => 'rear_bumper'],
                ['label' => 'Grill', 'key' => 'grill'],
                ['label' => 'Schweller links', 'key' => 'sill_left'],
                ['label' => 'Schweller rechts', 'key' => 'sill_right'],
              ];
            @endphp

            @foreach($parts as $p)
              @php
                $k = $p['key'];
                $cur = $val($k); // '' | 'yes' | 'no'
                $damageKey = $k . '_damage';
                $savedDamages = old($damageKey, $examination->{$damageKey} ?? []);
                if (!is_array($savedDamages)) { $savedDamages = $savedDamages ? [$savedDamages] : []; }
              @endphp

              <div class="doc-row mb-3" data-part="{{ $k }}">
                <p class="doc-title">{{ $p['label'] }}</p>

                {{-- 1) Auswahl Schäden vorhanden? (volle Zeile) --}}
                <div class="row g-3">
                  <div class="col-12">
                    <label class="form-label">Schäden vorhanden?</label>
                    <select name="{{ $k }}" class="form-select select-tall js-has-damage"
                            data-target="#wrap-{{ $k }}" data-when="yes">
                      <option value="">-- bitte wählen --</option>
                      <option value="yes" {{ $cur==='yes' ? 'selected' : '' }}>Ja</option>
                      <option value="no"  {{ $cur==='no'  ? 'selected' : '' }}>Nein</option>
                    </select>
                  </div>
                </div>

                {{-- 2) Schäden-Liste (immer UNTERHALB, volle Breite) --}}
                <div class="row g-3 mt-1 {{ $cur==='yes' ? '' : 'hidden' }}" id="wrap-{{ $k }}">
                  <div class="col-12">
                    <label class="form-label">Schäden</label>
                    <div id="damage-container-{{ $k }}">
                      @if(count($savedDamages))
                        @foreach($savedDamages as $dmg)
                          @php
                            $isOther = ($dmg === 'Sonstiges') || ($dmg !== '' && !in_array($dmg, $damageOptions, true));
                            $otherVal = $isOther && $dmg !== 'Sonstiges' ? $dmg : '';
                          @endphp
                          <div class="damage-row mb-2">
                            <select name="{{ $damageKey }}[]" class="form-select js-damage-select">
                              <option value="">-- auswählen --</option>
                              @foreach($damageOptions as $opt)
                                <option value="{{ $opt }}" {{ $isOther ? ($opt==='Sonstiges' ? 'selected' : '') : ($opt === $dmg ? 'selected' : '') }}>{{ $opt }}</option>
                              @endforeach
                            </select>
                            <input type="text" class="form-control ms-1 js-damage-other-input {{ $isOther ? '' : 'hidden' }}" placeholder="Bitte angeben" value="{{ $otherVal }}" />
                            <button type="button" class="btn btn-danger btn-sm btn-remove-damage ms-1" title="Entfernen">
                              <i class="fa-solid fa-trash-can"></i>
                            </button>
                          </div>
                        @endforeach
                      @else
                        <div class="damage-row mb-2">
                          <select name="{{ $damageKey }}[]" class="form-select js-damage-select">
                            <option value="">-- auswählen --</option>
                            @foreach($damageOptions as $opt)
                              <option value="{{ $opt }}">{{ $opt }}</option>
                            @endforeach
                          </select>
                          <input type="text" class="form-control ms-1 js-damage-other-input hidden" placeholder="Bitte angeben" />
                          <button type="button" class="btn btn-danger btn-sm btn-remove-damage ms-1" title="Entfernen">
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>
                      @endif
                    </div>
                    <button type="button"
                            class="btn add-more-btn js-add-damage mt-1"
                            data-target="#damage-container-{{ $k }}"
                            data-name="{{ $damageKey }}[]">
                      + Schaden hinzufügen
                    </button>
                  </div>
                </div>
              </div>
            @endforeach

            {{-- Spaltmaße --}}
            @php $gap = $val('are_gap_ok'); @endphp
            <div class="doc-row mb-3">
              <p class="doc-title">Spaltmaße</p>
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label">Sind die Spaltmaße in Ordnung?</label>
                  <select name="are_gap_ok" class="form-select select-tall">
                    <option value="">-- bitte wählen --</option>
                    <option value="yes" {{ $gap==='yes' ? 'selected' : '' }}>Ja</option>
                    <option value="no"  {{ $gap==='no'  ? 'selected' : '' }}>Nein, Abweichungen vorhanden</option>
                  </select>
                </div>
              </div>
            </div>

            {{-- Kommentar --}}
            <div class="doc-row mb-3">
              <label for="body_general_comment" class="form-label">Allgemeiner Kommentar zur Karosserie</label>
              <textarea name="body_general_comment"
                        id="body_general_comment"
                        rows="4"
                        class="form-control"
                        placeholder="Weitere Hinweise oder Anmerkungen">{{ old('body_general_comment', $examination->body_general_comment) }}</textarea>
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
    // Toggle Sichtbarkeit der Schaden-Container (Ja/Nein)
    document.querySelectorAll('.js-has-damage').forEach(function(sel){
      const targetSel = sel.getAttribute('data-target');
      const whenVal   = sel.getAttribute('data-when') || 'yes';
      const targetEl  = document.querySelector(targetSel);
      const apply = () => { if (targetEl) targetEl.classList.toggle('hidden', sel.value !== whenVal); };
      sel.addEventListener('change', apply);
      apply();
    });

    // Schaden-Zeile erzeugen (genau 1 Select + Remove-Button)
    function makeDamageRow(name){
      const opts = ['', 'Steinschlag', 'Kratzer', 'Delle', 'Deformation', 'Riss', 'Lackabplatzer', 'Polierrückstände', 'Rost', 'Halterung gebrochen', 'Spaltmaß abweichend', 'Sonstiges'];
      const wrap = document.createElement('div');
      wrap.className = 'damage-row mb-2';

      const select = document.createElement('select');
      select.name = name;
      select.className = 'form-select js-damage-select';
      opts.forEach(function(o, idx){
        const opt = document.createElement('option');
        opt.value = o;
        opt.textContent = idx === 0 ? '-- auswählen --' : o;
        select.appendChild(opt);
      });

      const other = document.createElement('input');
      other.type = 'text';
      other.placeholder = 'Bitte angeben';
      other.className = 'form-control ms-1 js-damage-other-input hidden';

      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'btn btn-danger btn-sm btn-remove-damage ms-1';
      btn.title = 'Entfernen';
      btn.innerHTML = '<i class="fa-solid fa-trash-can"></i>';
      btn.addEventListener('click', function(){
        const container = wrap.parentElement;
        wrap.remove();
        ensureAtLeastOneRow(container, name);
      });

      wrap.appendChild(select);
      wrap.appendChild(other);
      wrap.appendChild(btn);

      // Toggle text input on selection
      const applyOtherToggle = () => {
        const show = (select.value === 'Sonstiges');
        other.classList.toggle('hidden', !show);
        if (show) other.focus();
        if (!show) other.value = '';
      };
      select.addEventListener('change', applyOtherToggle);
      applyOtherToggle();
      return wrap;
    }

    function ensureAtLeastOneRow(container, name){
      if (!container) return;
      const rows = container.querySelectorAll('.damage-row');
      if (rows.length === 0){
        container.appendChild(makeDamageRow(name));
      }
    }

    // Existierende Remove-Buttons binden
    document.querySelectorAll('.damage-row .btn-remove-damage').forEach(function(btn){
      btn.addEventListener('click', function(){
        const row = this.closest('.damage-row');
        const container = row ? row.parentElement : null;
        const select = row ? row.querySelector('select') : null;
        const name = select ? select.name : '';
        if (row) row.remove();
        ensureAtLeastOneRow(container, name);
      });
    });

    // Toggle-Handler für bestehende Selects und Initialzustand setzen
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

    // Handler: + Schaden hinzufügen
    document.querySelectorAll('.js-add-damage').forEach(function(btn){
      btn.addEventListener('click', function(){
        const target = document.querySelector(this.getAttribute('data-target'));
        const name   = this.getAttribute('data-name');
        if (!target || !name) return;
        target.appendChild(makeDamageRow(name));
      });
    });

    // Vor dem Absenden: Für "Sonstiges" nur den manuellen Text senden
    document.querySelectorAll('form').forEach(function(form){
      if (!form.querySelector('.damage-row select')) return; // nur Formulare mit Schäden
      form.addEventListener('submit', function(){
        this.querySelectorAll('.damage-row').forEach(function(row){
          const sel = row.querySelector('select');
          const other = row.querySelector('.js-damage-other-input');
          if (!sel) return;
          if (sel.value === 'Sonstiges') {
            const txt = (other && other.value) ? other.value.trim() : '';
            // Hidden-Feld mit dem Text erzeugen (nur wenn nicht leer)
            if (txt !== '') {
              const hidden = document.createElement('input');
              hidden.type = 'hidden';
              hidden.name = sel.name;
              hidden.value = txt;
              form.appendChild(hidden);
            }
            // Select deaktivieren, damit "Sonstiges" nicht mitgesendet wird
            sel.disabled = true;
          }
        });
      });
    });
  })();
</script>
@endsection

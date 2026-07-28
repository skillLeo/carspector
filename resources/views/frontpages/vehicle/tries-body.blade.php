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

  /* Eine Schaden-Zeile */
  .damage-row { display:flex; gap:.5rem; align-items:center; }
  .damage-row select { flex:1; }
  .damage-row .js-damage-other-input { flex:1; }
  .damage-row .btn-remove-damage { white-space: nowrap; }

  /* Damage entry = row + its photo section */
  .damage-entry { border: 1px solid #e5e7eb; border-radius: 10px; padding: .65rem .75rem; background:#fff; margin-bottom: .5rem; }

  /* Schadensfotos (per-row) */
  .damage-photo-section { margin-top:.6rem; padding:.65rem .75rem; background:#fff8f0; border:1px solid #fed7aa; border-radius:8px; }
  .damage-photo-thumbs { display:flex; flex-wrap:wrap; gap:.5rem; margin-bottom:.5rem; }
  .damage-photo-thumb { position:relative; width:80px; height:80px; border-radius:8px; overflow:hidden; border:1px solid #e5e7eb; }
  .damage-photo-thumb img { width:100%; height:100%; object-fit:cover; }
  .damage-photo-thumb .rm-photo { position:absolute; top:2px; right:2px; background:rgba(220,38,38,.85); color:#fff; border:none; border-radius:50%; width:20px; height:20px; font-size:10px; display:flex; align-items:center; justify-content:center; cursor:pointer; padding:0; line-height:1; }
  .damage-photo-upload-btn { font-size:.85rem; }
  .damage-photo-uploading { font-size:.8rem; color:#6b7280; }

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
          <h1 class="h4 mb-0">Karosserie</h1>
        </div>

        <div class="card-body pt-3">
          <form method="POST" action="{{ route('examination.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="body">
            <input type="hidden" name="next_url" value="{{ route('examiner.paint.thickness.condition', ['id' => $id]) }}">

            <input type="hidden" name="front_bumper_comments" value="{{ old('front_bumper_comments', $examination->front_bumper_comments) }}">
            <input type="hidden" name="rear_bumper_comments" value="{{ old('rear_bumper_comments', $examination->rear_bumper_comments) }}">
            <input type="hidden" name="are_gap_ok_comments" value="{{ old('are_gap_ok_comments', $examination->are_gap_ok_comments) }}">
            <input type="hidden" name="grill_comments" value="{{ old('grill_comments', $examination->grill_comments) }}">
            <input type="hidden" name="sill_left_comments" value="{{ old('sill_left_comments', $examination->sill_left_comments) }}">
            <input type="hidden" name="sill_right_comments" value="{{ old('sill_right_comments', $examination->sill_right_comments) }}">

            @php
              $val = fn($key) => old($key, $examination->{$key} ?? '');
              $damageOptions = [
                'Steinschlag', 'Kratzer', 'Delle', 'Riss', 'Lackabplatzer', 'Deformation', 'Rost',
                'Polierrückstände','Nachlackierung','Unsachgemäße Nachlackierung / Instandsetzung',
                'Halterung gebrochen', 'Spaltmaß abweichend', 'Sonstiges'
              ];
              $parts = [
                ['label' => 'Stoßstange vorne',  'key' => 'front_bumper'],
                ['label' => 'Stoßstange hinten', 'key' => 'rear_bumper'],
                ['label' => 'Grill',              'key' => 'grill'],
                ['label' => 'Schweller links',    'key' => 'sill_left'],
                ['label' => 'Schweller rechts',   'key' => 'sill_right'],
              ];
            @endphp

            @foreach($parts as $p)
              @php
                $k = $p['key'];
                $cur = $val($k);
                $damageKey = $k . '_damage';
                $savedDamages = old($damageKey, $examination->{$damageKey} ?? []);
                if (!is_array($savedDamages)) { $savedDamages = $savedDamages ? [$savedDamages] : []; }
              @endphp

              <div class="doc-row mb-3" data-part="{{ $k }}">
                <p class="doc-title">{{ $p['label'] }}</p>

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

                <div class="row g-3 mt-1 {{ $cur==='yes' ? '' : 'hidden' }}" id="wrap-{{ $k }}">
                  <div class="col-12">
                    <label class="form-label">Schäden</label>
                    <div id="damage-container-{{ $k }}">
                      @if(count($savedDamages))
                        @foreach($savedDamages as $dmgIdx => $dmg)
                          @php
                            $entryId  = $k . ':' . $dmgIdx;
                            $domId    = $k . '-' . $dmgIdx;
                            $isOther  = ($dmg !== '' && !in_array($dmg, $damageOptions, true));
                            $otherVal = $isOther ? $dmg : '';
                            $selectVal= $isOther ? 'Sonstiges' : $dmg;
                            $entryPhotos = $examination->id
                              ? \App\Models\ExaminationImage::where('examination_id', $examination->id)
                                  ->where('damage_component', $entryId)->get()
                              : collect();
                          @endphp
                          <div class="damage-entry" data-entry-id="{{ $entryId }}">
                            <div class="damage-row">
                              <select name="{{ $damageKey }}[]" class="form-select js-damage-select">
                                <option value="">-- auswählen --</option>
                                @foreach($damageOptions as $opt)
                                  <option value="{{ $opt }}" {{ $opt === $selectVal ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                              </select>
                              <input type="text" class="form-control ms-1 js-damage-other-input {{ $isOther ? '' : 'hidden' }}"
                                     placeholder="Bitte angeben" value="{{ $otherVal }}" />
                              <button type="button" class="btn btn-danger btn-sm btn-remove-damage ms-1" title="Entfernen">
                                <i class="fa-solid fa-trash-can"></i>
                              </button>
                            </div>

                            {{-- Per-row photo section --}}
                            <div class="damage-photo-section {{ ($selectVal !== '') ? '' : 'hidden' }}">
                              <div class="small fw-semibold mb-1">
                                <i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos
                              </div>
                              <div class="damage-photo-thumbs" id="photo-thumbs-{{ $domId }}">
                                @foreach($entryPhotos as $photo)
                                  <div class="damage-photo-thumb" id="dmg-thumb-{{ $photo->id }}">
                                    <img src="{{ asset('storage/' . $photo->image) }}" alt="Schadensfoto">
                                    <button type="button" class="rm-photo"
                                            data-id="{{ $photo->id }}"
                                            title="Entfernen">×</button>
                                  </div>
                                @endforeach
                              </div>
                              <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                                <i class="fa-solid fa-plus me-1"></i> Foto
                                <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input"
                                       data-entry-id="{{ $entryId }}"
                                       data-part-label="{{ $p['label'] }}"
                                       data-order-id="{{ $id }}"
                                       data-upload-url="{{ route('examination.store.images') }}"
                                       data-csrf="{{ csrf_token() }}">
                              </label>
                              <span class="damage-photo-uploading d-none ms-2" id="uploading-{{ $domId }}">
                                <i class="fa-solid fa-spinner fa-spin me-1"></i>
                              </span>
                            </div>
                          </div>
                        @endforeach
                      @else
                        {{-- Empty initial row --}}
                        <div class="damage-entry" data-entry-id="{{ $k }}:0">
                          <div class="damage-row">
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
                          <div class="damage-photo-section hidden">
                            <div class="small fw-semibold mb-1">
                              <i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos
                            </div>
                            <div class="damage-photo-thumbs" id="photo-thumbs-{{ $k }}-0"></div>
                            <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                              <i class="fa-solid fa-plus me-1"></i> Foto
                              <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input"
                                     data-entry-id="{{ $k }}:0"
                                     data-part-label="{{ $p['label'] }}"
                                     data-order-id="{{ $id }}"
                                     data-upload-url="{{ route('examination.store.images') }}"
                                     data-csrf="{{ csrf_token() }}">
                            </label>
                            <span class="damage-photo-uploading d-none ms-2" id="uploading-{{ $k }}-0">
                              <i class="fa-solid fa-spinner fa-spin me-1"></i>
                            </span>
                          </div>
                        </div>
                      @endif
                    </div>
                    <button type="button"
                            class="btn add-more-btn js-add-damage mt-1"
                            data-part="{{ $k }}"
                            data-part-label="{{ $p['label'] }}"
                            data-name="{{ $damageKey }}[]"
                            data-order-id="{{ $id }}"
                            data-upload-url="{{ route('examination.store.images') }}"
                            data-csrf="{{ csrf_token() }}">
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

  // ── counters: track how many rows added per part (for unique entry IDs) ──
  var partCounters = {};

  // ── Photo: build thumb element ────────────────────────────────────────────
  function makeDamageThumb(id, src) {
    var wrap = document.createElement('div');
    wrap.className = 'damage-photo-thumb';
    wrap.id = 'dmg-thumb-' + id;
    var img = document.createElement('img');
    img.src = src; img.alt = 'Schadensfoto';
    var btn = document.createElement('button');
    btn.type = 'button'; btn.className = 'rm-photo';
    btn.setAttribute('data-id', id);
    btn.title = 'Entfernen'; btn.textContent = '×';
    bindRemovePhoto(btn);
    wrap.appendChild(img); wrap.appendChild(btn);
    return wrap;
  }

  function bindRemovePhoto(btn) {
    if (!btn) return;
    btn.addEventListener('click', function(){
      var id    = this.getAttribute('data-id');
      var thumb = document.getElementById('dmg-thumb-' + id);
      if (!confirm('Foto entfernen?')) return;
      fetch('{{ url("examination-delete-image") }}/' + id, {
        method: 'GET', headers: { 'X-Requested-With': 'XMLHttpRequest' }
      }).finally(function(){ if (thumb) thumb.remove(); });
    });
  }

  // ── Photo: upload a single file for a damage entry ────────────────────────
  function uploadDamagePhoto(input, file) {
  return new Promise(function(resolve){
    var entryId   = input.getAttribute('data-entry-id');
    var partLabel = input.getAttribute('data-part-label');
    var orderId   = input.getAttribute('data-order-id');
    var url       = input.getAttribute('data-upload-url');
    var csrf      = input.getAttribute('data-csrf');

    var domId     = entryId.replace(':', '-');
    var thumbWrap = document.getElementById('photo-thumbs-' + domId);
    var spinner   = document.getElementById('uploading-' + domId);

    var entry = input.closest('.damage-entry');
    var damageSelect = entry ? entry.querySelector('.js-damage-select') : null;
    var damageType = damageSelect && damageSelect.value ? damageSelect.value : '';

    if (damageType === 'Sonstiges') {
      var otherInput = entry ? entry.querySelector('.js-damage-other-input') : null;
      damageType = otherInput && otherInput.value.trim()
        ? otherInput.value.trim()
        : 'Sonstiges';
    }

    var caption = partLabel + (damageType ? ' - ' + damageType : '');

    if (spinner) spinner.classList.remove('d-none');

    var fd = new FormData();
    fd.append('photos[]', file);
    fd.append('id', orderId);
    fd.append('form', 'body');
    fd.append('document_type', 'Schadensfoto');
    fd.append('damage_component', entryId);
    fd.append('caption', caption);
    fd.append('_token', csrf);

    fetch(url, {
      method: 'POST',
      body: fd,
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
      .then(function(r){ return r.json(); })
      .then(function(data){
        if (data.success && data.items && thumbWrap) {
          data.items.forEach(function(item){
            if (!item.image1) return;
            thumbWrap.appendChild(makeDamageThumb(item.id, item.image1));
          });
        }
      })
      .finally(function(){
        if (spinner) spinner.classList.add('d-none');
        resolve();
      });
  });
}

function bindPhotoInput(input) {
  input.addEventListener('change', async function(){
    var files = Array.from(this.files);

    for (var i = 0; i < files.length; i++) {
      await uploadDamagePhoto(input, files[i]);
    }

    this.value = '';
  });
}

  // ── Show/hide photo section based on select value ─────────────────────────
  function bindDamageSelectPhotoToggle(select) {
    var entry = select.closest('.damage-entry');
    if (!entry) return;
    var photoSection = entry.querySelector('.damage-photo-section');
    if (!photoSection) return;
    var apply = function(){
      var hasVal = select.value && select.value !== '';
      photoSection.classList.toggle('hidden', !hasVal);
    };
    select.addEventListener('change', apply);
    apply();
  }

  // ── Sonstiges toggle ──────────────────────────────────────────────────────
  function bindOtherToggle(select) {
    var entry = select.closest('.damage-entry') || select.closest('.damage-row');
    var other = entry ? entry.querySelector('.js-damage-other-input') : null;
    if (!other) return;
    var apply = function(){
      var show = (select.value === 'Sonstiges');
      other.classList.toggle('hidden', !show);
      if (!show) other.value = '';
      if (show) other.focus();
    };
    select.addEventListener('change', apply);
    apply();
  }

  // ── Create a new damage entry (called from "Add" button and init) ─────────
  function makeDamageEntry(partKey, partLabel, entryId, nameAttr, orderId, uploadUrl, csrf) {
    var domId = entryId.replace(':', '-');

    var wrap = document.createElement('div');
    wrap.className = 'damage-entry';
    wrap.setAttribute('data-entry-id', entryId);

    // Row (select + other input + remove)
    var row = document.createElement('div');
    row.className = 'damage-row';

    var opts = ['','Steinschlag','Kratzer','Delle','Riss','Lackabplatzer','Deformation','Rost',
                'Polierrückstände','Nachlackierung','Unsachgemäße Nachlackierung / Instandsetzung',
                'Halterung gebrochen','Spaltmaß abweichend','Sonstiges'];
    var sel = document.createElement('select');
    sel.name = nameAttr;
    sel.className = 'form-select js-damage-select';
    opts.forEach(function(o, i){
      var opt = document.createElement('option');
      opt.value = o; opt.textContent = i === 0 ? '-- auswählen --' : o;
      sel.appendChild(opt);
    });

    var other = document.createElement('input');
    other.type = 'text'; other.placeholder = 'Bitte angeben';
    other.className = 'form-control ms-1 js-damage-other-input hidden';

    var removeBtn = document.createElement('button');
    removeBtn.type = 'button';
    removeBtn.className = 'btn btn-danger btn-sm btn-remove-damage ms-1';
    removeBtn.title = 'Entfernen';
    removeBtn.innerHTML = '<i class="fa-solid fa-trash-can"></i>';
    removeBtn.addEventListener('click', function(){
      var container = wrap.parentElement;
      var name = nameAttr;
      wrap.remove();
      ensureAtLeastOneEntry(container, partKey, partLabel, name, orderId, uploadUrl, csrf);
    });

    row.appendChild(sel); row.appendChild(other); row.appendChild(removeBtn);

    // Photo section
    var photoSection = document.createElement('div');
    photoSection.className = 'damage-photo-section hidden';

    var photoLabel = document.createElement('div');
    photoLabel.className = 'small fw-semibold mb-1';
    photoLabel.innerHTML = '<i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos';

    var thumbs = document.createElement('div');
    thumbs.className = 'damage-photo-thumbs';
    thumbs.id = 'photo-thumbs-' + domId;

    var fileLabel = document.createElement('label');
    fileLabel.className = 'btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1';
    fileLabel.style.cursor = 'pointer';

    var fileInput = document.createElement('input');
    fileInput.type = 'file'; fileInput.accept = 'image/*'; fileInput.multiple = true;
    fileInput.className = 'd-none js-damage-photo-input';
    fileInput.setAttribute('data-entry-id', entryId);
    fileInput.setAttribute('data-part-label', partLabel);
    fileInput.setAttribute('data-order-id', orderId);
    fileInput.setAttribute('data-upload-url', uploadUrl);
    fileInput.setAttribute('data-csrf', csrf);
    bindPhotoInput(fileInput);

    fileLabel.innerHTML = '<i class="fa-solid fa-plus me-1"></i> Foto';
    fileLabel.appendChild(fileInput);

    var spinner = document.createElement('span');
    spinner.className = 'damage-photo-uploading d-none ms-2';
    spinner.id = 'uploading-' + domId;
    spinner.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i>';

    photoSection.appendChild(photoLabel);
    photoSection.appendChild(thumbs);
    photoSection.appendChild(fileLabel);
    photoSection.appendChild(spinner);

    wrap.appendChild(row);
    wrap.appendChild(photoSection);

    // Bind toggles
    bindOtherToggle(sel);
    bindDamageSelectPhotoToggle(sel);

    return wrap;
  }

  function ensureAtLeastOneEntry(container, partKey, partLabel, nameAttr, orderId, uploadUrl, csrf) {
    if (!container || container.querySelectorAll('.damage-entry').length > 0) return;
    var entryId = partKey + ':0';
    container.appendChild(makeDamageEntry(partKey, partLabel, entryId, nameAttr, orderId, uploadUrl, csrf));
  }

  // ── Init: bind existing rows ───────────────────────────────────────────────
  document.querySelectorAll('.damage-entry').forEach(function(entry){
    var sel = entry.querySelector('.js-damage-select');
    if (sel) {
      bindOtherToggle(sel);
      bindDamageSelectPhotoToggle(sel);
    }
    // Remove button
    var removeBtn = entry.querySelector('.btn-remove-damage');
    if (removeBtn) {
      removeBtn.addEventListener('click', function(){
        var container = entry.parentElement;
        var sel2      = entry.querySelector('select');
        var name      = sel2 ? sel2.name : '';
        var btn       = this.closest('[data-part]') ? null : document.querySelector('.js-add-damage[data-name="' + name + '"]');
        var addBtn    = document.querySelector('.js-add-damage[data-name="' + name + '"]');
        var partKey   = addBtn ? addBtn.getAttribute('data-part') : '';
        var partLabel = addBtn ? addBtn.getAttribute('data-part-label') : '';
        var orderId   = addBtn ? addBtn.getAttribute('data-order-id') : '';
        var uploadUrl = addBtn ? addBtn.getAttribute('data-upload-url') : '';
        var csrf      = addBtn ? addBtn.getAttribute('data-csrf') : '';
        entry.remove();
        ensureAtLeastOneEntry(container, partKey, partLabel, name, orderId, uploadUrl, csrf);
      });
    }
    // Bind existing photo inputs
    var photoInputs = entry.querySelectorAll('.js-damage-photo-input');
    photoInputs.forEach(bindPhotoInput);
    // Bind existing remove-photo buttons
    entry.querySelectorAll('.rm-photo').forEach(bindRemovePhoto);
  });

  // ── "Schäden vorhanden?" toggle ───────────────────────────────────────────
  document.querySelectorAll('.js-has-damage').forEach(function(sel){
    var targetEl = document.querySelector(sel.getAttribute('data-target'));
    var whenVal  = sel.getAttribute('data-when') || 'yes';
    var apply = function(){ if (targetEl) targetEl.classList.toggle('hidden', sel.value !== whenVal); };
    sel.addEventListener('change', apply);
    apply();
  });

  // ── "Add damage" button ───────────────────────────────────────────────────
  document.querySelectorAll('.js-add-damage').forEach(function(btn){
    btn.addEventListener('click', function(){
      var partKey   = this.getAttribute('data-part');
      var partLabel = this.getAttribute('data-part-label');
      var name      = this.getAttribute('data-name');
      var orderId   = this.getAttribute('data-order-id');
      var uploadUrl = this.getAttribute('data-upload-url');
      var csrf      = this.getAttribute('data-csrf');
      var container = document.getElementById('damage-container-' + partKey);
      if (!container) return;
      var entryId = partKey + ':' + container.querySelectorAll('.damage-entry').length;
      container.appendChild(makeDamageEntry(partKey, partLabel, entryId, name, orderId, uploadUrl, csrf));
    });
  });

  // ── On submit: replace "Sonstiges" selects with the typed custom text ───────
  document.querySelectorAll('form').forEach(function(form){
    if (!form.querySelector('.js-damage-select')) return;
    form.addEventListener('submit', function(){
      this.querySelectorAll('.damage-entry').forEach(function(entry){
        var sel   = entry.querySelector('select.js-damage-select');
        var other = entry.querySelector('.js-damage-other-input');
        if (!sel) return;
        if (sel.value === 'Sonstiges') {
          var txt = (other && other.value) ? other.value.trim() : '';
          if (txt !== '') {
            // Add the custom text as an option and select it so it submits in the correct array position
            var opt = document.createElement('option');
            opt.value = txt; opt.textContent = txt;
            sel.appendChild(opt);
            sel.value = txt;
          }
          // If no text typed, 'Sonstiges' submits as-is — never disable or drop the entry
        }
      });
    });
  });

})();
</script>
@endsection

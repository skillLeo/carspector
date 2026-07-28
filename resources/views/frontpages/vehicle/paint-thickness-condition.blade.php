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

  /* Damage entry = row + photo section */
  .damage-entry { border:1px solid #e5e7eb; border-radius:10px; padding:.65rem .75rem; background:#fff; margin-bottom:.5rem; }
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
                      @foreach($damages as $dmgIdx => $dmg)
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
                            <select name="{{ $dmgKey }}[]" class="form-select js-damage-select">
                              <option value="">-- auswählen --</option>
                              @foreach($damageOptions as $opt)
                                <option value="{{ $opt }}" {{ $opt===$selectVal ? 'selected' : '' }}>{{ $opt }}</option>
                              @endforeach
                            </select>
                            <input type="text" class="form-control ms-1 js-damage-other-input {{ $isOther ? '' : 'hidden' }}" placeholder="Bitte angeben" value="{{ $otherVal }}" />
                            <button type="button" class="btn btn-danger btn-sm btn-remove-dmg ms-1" title="Entfernen">
                              <i class="fa-solid fa-trash-can"></i>
                            </button>
                          </div>
                          <div class="damage-photo-section {{ $selectVal !== '' ? '' : 'hidden' }}">
                            <div class="small fw-semibold mb-1"><i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos</div>
                            <div class="damage-photo-thumbs" id="photo-thumbs-{{ $domId }}">
                              @foreach($entryPhotos as $photo)
                                <div class="damage-photo-thumb" id="dmg-thumb-{{ $photo->id }}">
                                  <img src="{{ asset('storage/' . $photo->image) }}" alt="">
                                  <button type="button" class="rm-photo" data-id="{{ $photo->id }}" title="Entfernen">×</button>
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
                            <span class="damage-photo-uploading d-none ms-2" id="uploading-{{ $domId }}"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                          </div>
                        </div>
                      @endforeach
                    @else
                      <div class="damage-entry" data-entry-id="{{ $k }}:0">
                        <div class="damage-row">
                          <select name="{{ $dmgKey }}[]" class="form-select js-damage-select">
                            <option value="">-- auswählen --</option>
                            @foreach($damageOptions as $opt)<option value="{{ $opt }}">{{ $opt }}</option>@endforeach
                          </select>
                          <input type="text" class="form-control ms-1 js-damage-other-input hidden" placeholder="Bitte angeben" />
                          <button type="button" class="btn btn-danger btn-sm btn-remove-dmg ms-1" title="Entfernen"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                        <div class="damage-photo-section hidden">
                          <div class="small fw-semibold mb-1"><i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos</div>
                          <div class="damage-photo-thumbs" id="photo-thumbs-{{ $k }}-0"></div>
                          <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                            <i class="fa-solid fa-plus me-1"></i> Foto
                            <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input"
                                   data-entry-id="{{ $k }}:0" data-part-label="{{ $p['label'] }}"
                                   data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                          </label>
                          <span class="damage-photo-uploading d-none ms-2" id="uploading-{{ $k }}-0"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                        </div>
                      </div>
                    @endif
                  </div>
                  <button type="button"
                          class="btn add-more-btn js-add-dmg"
                          data-part="{{ $k }}"
                          data-part-label="{{ $p['label'] }}"
                          data-name="{{ $dmgKey }}[]"
                          data-order-id="{{ $id }}"
                          data-upload-url="{{ route('examination.store.images') }}"
                          data-csrf="{{ csrf_token() }}">+ Schaden hinzufügen</button>
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
  var partCounters = {};

  function mkIcon(cls) { var i = document.createElement('i'); i.className = cls; return i; }

  function makeDamageThumb(id, src) {
    var wrap = document.createElement('div');
    wrap.className = 'damage-photo-thumb'; wrap.id = 'dmg-thumb-' + id;
    var img = document.createElement('img'); img.src = src; img.alt = '';
    var btn = document.createElement('button');
    btn.type = 'button'; btn.className = 'rm-photo';
    btn.setAttribute('data-id', id); btn.title = 'Entfernen'; btn.textContent = '×';
    bindRemovePhoto(btn);
    wrap.appendChild(img); wrap.appendChild(btn); return wrap;
  }
  function bindRemovePhoto(btn) {
    btn.addEventListener('click', function(){
      var id = this.getAttribute('data-id');
      var thumb = document.getElementById('dmg-thumb-' + id);
      if (!confirm('Foto entfernen?')) return;
      fetch('{{ url("examination-delete-image") }}/' + id, { method:'GET', headers:{'X-Requested-With':'XMLHttpRequest'} })
        .finally(function(){ if (thumb) thumb.remove(); });
    });
  }
 function uploadDamagePhoto(input, file) {
  return new Promise(function(resolve){

    var entryId = input.getAttribute('data-entry-id');
    var partLabel = input.getAttribute('data-part-label');
    var orderId = input.getAttribute('data-order-id');
    var url = input.getAttribute('data-upload-url');
    var csrf = input.getAttribute('data-csrf');

    var domId = entryId.replace(':', '-');
    var thumbWrap = document.getElementById('photo-thumbs-' + domId);
    var spinner = document.getElementById('uploading-' + domId);

    var entry = input.closest('.damage-entry');
    var sel = entry ? entry.querySelector('.js-damage-select') : null;
    var dmgType = (sel && sel.value) ? sel.value : '';

    if (dmgType === 'Sonstiges') {
      var oi = entry ? entry.querySelector('.js-damage-other-input') : null;
      dmgType = (oi && oi.value.trim()) ? oi.value.trim() : 'Sonstiges';
    }

    var caption = partLabel + (dmgType ? ' - ' + dmgType : '');

    if (spinner) spinner.classList.remove('d-none');

    var fd = new FormData();
    fd.append('photos[]', file);
    fd.append('id', orderId);
    fd.append('form', 'paint-thickness-condition');
    fd.append('document_type', 'Schadensfoto');
    fd.append('damage_component', entryId);
    fd.append('caption', caption);
    fd.append('_token', csrf);

    fetch(url, {
      method:'POST',
      body:fd,
      headers:{'X-Requested-With':'XMLHttpRequest'}
    })
    .then(function(r){
      return r.json();
    })
    .then(function(data){
      if (data.success && data.items && thumbWrap) {
        data.items.forEach(function(item){
          if (item.image1) {
            thumbWrap.appendChild(
              makeDamageThumb(item.id, item.image1)
            );
          }
        });
      }
    })
    .catch(function(error){
      console.error(error);
    })
    .finally(function(){
      if (spinner) spinner.classList.add('d-none');
      resolve();
    });

  });
}
 function bindPhotoInput(input) {
  input.addEventListener('change', async function(){

    const files = Array.from(this.files);

    for (const file of files) {
      await uploadDamagePhoto(input, file);
    }

    this.value = '';
  });
}
  function bindPhotoToggle(select) {
    var entry = select.closest('.damage-entry'); if (!entry) return;
    var ps = entry.querySelector('.damage-photo-section'); if (!ps) return;
    var apply = function(){ ps.classList.toggle('hidden', !select.value || select.value === ''); };
    select.addEventListener('change', apply); apply();
  }
  function bindOtherToggle(sel) {
    var entry = sel.closest('.damage-entry'); if (!entry) return;
    var other = entry.querySelector('.js-damage-other-input'); if (!other) return;
    var apply = function(){ var show = sel.value==='Sonstiges'; other.classList.toggle('hidden',!show); if(!show) other.value=''; };
    sel.addEventListener('change', apply); apply();
  }

  var dmgOpts = ['','Steinschlag','Kratzer','Delle','Deformation','Riss','Lackabplatzer','Lackeinschlüsse','Lackschlieren','Lackschaden','Polierrückstände','Rost','Spachtelstellen','Kante beschädigt','Sonstiges'];
  function createDamageEntry(partKey, partLabel, entryId, name, orderId, uploadUrl, csrf) {
    var domId = entryId.replace(':', '-');
    var wrap = document.createElement('div');
    wrap.className = 'damage-entry'; wrap.setAttribute('data-entry-id', entryId);

    var row = document.createElement('div'); row.className = 'damage-row';
    var sel = document.createElement('select'); sel.name = name; sel.className = 'form-select js-damage-select';
    dmgOpts.forEach(function(o, i){ var opt = document.createElement('option'); opt.value = o; opt.textContent = i===0 ? '-- auswählen --' : o; sel.appendChild(opt); });
    var other = document.createElement('input'); other.type='text'; other.placeholder='Bitte angeben'; other.className='form-control ms-1 js-damage-other-input hidden';
    var rmBtn = document.createElement('button'); rmBtn.type='button'; rmBtn.className='btn btn-danger btn-sm btn-remove-dmg ms-1'; rmBtn.title='Entfernen';
    rmBtn.appendChild(mkIcon('fa-solid fa-trash-can'));
    rmBtn.addEventListener('click', function(){
      var container = wrap.parentElement;
      wrap.remove();
      if (!container || container.querySelectorAll('.damage-entry').length > 0) return;
      container.appendChild(createDamageEntry(partKey, partLabel, partKey+':0', name, orderId, uploadUrl, csrf));
    });
    row.appendChild(sel); row.appendChild(other); row.appendChild(rmBtn);

    var ps = document.createElement('div'); ps.className = 'damage-photo-section hidden';
    var pLbl = document.createElement('div'); pLbl.className='small fw-semibold mb-1';
    pLbl.appendChild(mkIcon('fa-solid fa-camera me-1 text-warning')); pLbl.appendChild(document.createTextNode(' Schadensfotos'));
    var thumbs = document.createElement('div'); thumbs.className='damage-photo-thumbs'; thumbs.id='photo-thumbs-'+domId;
    var fLabel = document.createElement('label'); fLabel.className='btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1'; fLabel.style.cursor='pointer';
    fLabel.appendChild(mkIcon('fa-solid fa-plus me-1')); fLabel.appendChild(document.createTextNode(' Foto'));
    var fi = document.createElement('input'); fi.type='file'; fi.accept='image/*'; fi.multiple=true; fi.className='d-none js-damage-photo-input';
    fi.setAttribute('data-entry-id', entryId); fi.setAttribute('data-part-label', partLabel);
    fi.setAttribute('data-order-id', orderId); fi.setAttribute('data-upload-url', uploadUrl); fi.setAttribute('data-csrf', csrf);
    bindPhotoInput(fi); fLabel.appendChild(fi);
    var spn = document.createElement('span'); spn.className='damage-photo-uploading d-none ms-2'; spn.id='uploading-'+domId;
    spn.appendChild(mkIcon('fa-solid fa-spinner fa-spin'));
    ps.appendChild(pLbl); ps.appendChild(thumbs); ps.appendChild(fLabel); ps.appendChild(spn);

    wrap.appendChild(row); wrap.appendChild(ps);
    bindOtherToggle(sel); bindPhotoToggle(sel);
    return wrap;
  }

  document.querySelectorAll('.damage-entry').forEach(function(entry){
    var sel = entry.querySelector('.js-damage-select');
    if (sel) { bindOtherToggle(sel); bindPhotoToggle(sel); }
    entry.querySelectorAll('.js-damage-photo-input').forEach(bindPhotoInput);
    entry.querySelectorAll('.rm-photo').forEach(bindRemovePhoto);
    var rmBtn = entry.querySelector('.btn-remove-dmg');
    if (rmBtn) rmBtn.addEventListener('click', function(){
      var container = entry.parentElement;
      var sel2 = entry.querySelector('select');
      var addBtn = document.querySelector('.js-add-dmg[data-name="' + (sel2 ? sel2.name : '') + '"]');
      var pKey = addBtn ? addBtn.getAttribute('data-part') : '';
      var pLbl2 = addBtn ? addBtn.getAttribute('data-part-label') : '';
      var oId = addBtn ? addBtn.getAttribute('data-order-id') : '';
      var uUrl = addBtn ? addBtn.getAttribute('data-upload-url') : '';
      var c = addBtn ? addBtn.getAttribute('data-csrf') : '';
      entry.remove();
      if (!container || container.querySelectorAll('.damage-entry').length > 0) return;
      container.appendChild(createDamageEntry(pKey, pLbl2, pKey+':0', sel2?sel2.name:'', oId, uUrl, c));
    });
  });

  document.querySelectorAll('.js-toggle').forEach(function(sel){
    var targetEl = document.querySelector(sel.getAttribute('data-target'));
    var whenVal = sel.getAttribute('data-when')||'yes';
    var apply = function(){ if(targetEl) targetEl.classList.toggle('hidden', sel.value !== whenVal); };
    sel.addEventListener('change', apply); apply();
  });

  document.querySelectorAll('.js-add-dmg').forEach(function(btn){
    btn.addEventListener('click', function(){
      var partKey = this.getAttribute('data-part');
      var partLabel = this.getAttribute('data-part-label');
      var name = this.getAttribute('data-name');
      var orderId = this.getAttribute('data-order-id');
      var uploadUrl = this.getAttribute('data-upload-url');
      var csrf = this.getAttribute('data-csrf');
      var container = document.getElementById('damage-container-' + partKey);
      if (!container) return;
      container.appendChild(createDamageEntry(partKey, partLabel, partKey+':'+container.querySelectorAll('.damage-entry').length, name, orderId, uploadUrl, csrf));
    });
  });

  document.querySelectorAll('form').forEach(function(form){
    if (!form.querySelector('.js-damage-select')) return;
    form.addEventListener('submit', function(){
      this.querySelectorAll('.damage-entry').forEach(function(entry){
        var sel = entry.querySelector('select.js-damage-select');
        var other = entry.querySelector('.js-damage-other-input');
        if (!sel) return;
        if (sel.value === 'Sonstiges') {
          var txt = (other && other.value) ? other.value.trim() : '';
          if (txt) {
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

  function applyThicknessStatus(select){
    var box = select.closest('.doc-row'); if (!box) return;
    var val = (select.value||'').toLowerCase();
    var ti = box.querySelector('.js-thickness-input');
    var rc = box.querySelector('.js-repaint-col');
    var ac = box.querySelector('.js-anydamage-col');
    var dw = box.querySelector('[id^="wrap-"][id$="-damage"]');
    if (val==='nicht_messbar'){
      if(ti) ti.classList.add('hidden'); if(rc) rc.classList.add('hidden'); if(ac) ac.classList.remove('hidden');
    } else if (val==='nicht_vorhanden'){
      if(ti) ti.classList.add('hidden'); if(rc) rc.classList.add('hidden'); if(ac) ac.classList.add('hidden'); if(dw) dw.classList.add('hidden');
    } else {
      if(ti) ti.classList.remove('hidden'); if(rc) rc.classList.remove('hidden'); if(ac) ac.classList.remove('hidden');
    }
  }
  document.querySelectorAll('.js-thickness-status').forEach(function(sel){
    sel.addEventListener('change', function(){ applyThicknessStatus(sel); }); applyThicknessStatus(sel);
  });
})();
</script>
@endsection

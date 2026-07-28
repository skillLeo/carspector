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
  .damage-line .damage-select { flex:1 1 auto; }
  .btn-remove-dmg { white-space:nowrap; }
  .damage-other { margin-top:.5rem; }

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
                        $entryId = $k . ':' . $i;
                        $domId   = $k . '-' . $i;
                        $entryPhotos = ($examination->id ?? null)
                          ? \App\Models\ExaminationImage::where('examination_id', $examination->id)
                              ->where('damage_component', $entryId)->get()
                          : collect();
                      @endphp
                      <div class="damage-entry" data-entry-id="{{ $entryId }}">
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
                        <div class="damage-photo-section {{ $dVal !== '' ? '' : 'hidden' }}">
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
                                   data-entry-id="{{ $entryId }}" data-part-label="{{ $it['label'] }}"
                                   data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                          </label>
                          <span class="damage-photo-uploading d-none ms-2" id="uploading-{{ $domId }}"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                        </div>
                      </div>
                    @endfor
                  </div>

                  <button type="button" style="color: gray; border: 1px solid gray"
                          class="btn add-more-btn mt-1 js-add-dmg"
                          data-part="{{ $k }}"
                          data-part-label="{{ $it['label'] }}"
                          data-name="{{ $dmgKey }}[]"
                          data-name-other="{{ $otherKey }}[]"
                          data-order-id="{{ $id }}"
                          data-upload-url="{{ route('examination.store.images') }}"
                          data-csrf="{{ csrf_token() }}">
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
  var partCounters = {};
  function mkIcon(cls) { var i = document.createElement('i'); i.className = cls; return i; }

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


function uploadDamagePhoto(input, file) {
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

    var domId=entryId.replace(':','-');
    var thumbWrap=document.getElementById('photo-thumbs-'+domId),
        spinner=document.getElementById('uploading-'+domId);

    var entry=input.closest('.damage-entry');
    var sel=entry?entry.querySelector('.js-dmg-select'):null;
    var dmgType=(sel&&sel.value)?sel.value:'';

    if(dmgType==='Sonstiges'){
      var oi=entry?entry.querySelector('.damage-other'):null;
      dmgType=(oi&&oi.value.trim())?oi.value.trim():'Sonstiges';
    }

    var caption=partLabel+(dmgType?' - '+dmgType:'');

    if(spinner) spinner.classList.remove('d-none');

    var fd=new FormData();
    fd.append('photos[]',file);
    fd.append('id',orderId);
    fd.append('form','vehicle-light');
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
      if(data.success&&data.items&&thumbWrap){
        data.items.forEach(function(item){
          if(item.image1){
            thumbWrap.appendChild(
              makeDamageThumb(item.id,item.image1)
            );
          }
        });
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
  function bindPhotoToggle(select){
    var entry=select.closest('.damage-entry'); if(!entry) return;
    var ps=entry.querySelector('.damage-photo-section'); if(!ps) return;
    var apply=function(){ps.classList.toggle('hidden',!select.value||select.value==='');};
    select.addEventListener('change',apply); apply();
  }
  function bindOtherToggle(sel){
    var entry=sel.closest('.damage-entry'); if(!entry) return;
    var other=entry.querySelector('.damage-other'); if(!other) return;
    var apply=function(){var show=sel.value==='Sonstiges'; other.classList.toggle('hidden',!show); if(!show) other.value='';};
    sel.addEventListener('change',apply); apply();
  }

  var dmgOpts=['','Kratzer','Riss','Wassereintritt','Streuscheibe matt','Halterung gebrochen','Gehäuse locker','Kabel/Stecker beschädigt','Sonstiges'];
  function createDamageEntry(partKey, partLabel, entryId, name, nameOther, orderId, uploadUrl, csrf) {
    var domId=entryId.replace(':','-');
    var wrap=document.createElement('div'); wrap.className='damage-entry'; wrap.setAttribute('data-entry-id',entryId);

    var rowWrap=document.createElement('div'); rowWrap.className='damage-row';
    var line=document.createElement('div'); line.className='damage-line';
    var sel=document.createElement('select'); sel.name=name; sel.className='form-select damage-select js-dmg-select';
    dmgOpts.forEach(function(o,i){var opt=document.createElement('option'); opt.value=o; opt.textContent=i===0?'-- auswählen --':o; sel.appendChild(opt);});
    var rmBtn=document.createElement('button'); rmBtn.type='button'; rmBtn.className='btn btn-danger btn-sm btn-remove-dmg'; rmBtn.title='Entfernen';
    rmBtn.appendChild(mkIcon('fa-solid fa-trash-can'));
    rmBtn.addEventListener('click',function(){
      var container=wrap.parentElement; wrap.remove();
      if(!container||container.querySelectorAll('.damage-entry').length>0) return;
      container.appendChild(createDamageEntry(partKey,partLabel,partKey+':0',name,nameOther,orderId,uploadUrl,csrf));
    });
    line.appendChild(sel); line.appendChild(rmBtn);
    var other=document.createElement('input'); other.type='text'; other.name=nameOther; other.className='form-control input-compact damage-other hidden'; other.placeholder='Bitte beschreiben (Sonstiges)';
    rowWrap.appendChild(line); rowWrap.appendChild(other);

    var ps=document.createElement('div'); ps.className='damage-photo-section hidden';
    var pLbl=document.createElement('div'); pLbl.className='small fw-semibold mb-1';
    pLbl.appendChild(mkIcon('fa-solid fa-camera me-1 text-warning')); pLbl.appendChild(document.createTextNode(' Schadensfotos'));
    var thumbs=document.createElement('div'); thumbs.className='damage-photo-thumbs'; thumbs.id='photo-thumbs-'+domId;
    var fLabel=document.createElement('label'); fLabel.className='btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1'; fLabel.style.cursor='pointer';
    fLabel.appendChild(mkIcon('fa-solid fa-plus me-1')); fLabel.appendChild(document.createTextNode(' Foto'));
    var fi=document.createElement('input'); fi.type='file'; fi.accept='image/*'; fi.multiple=true; fi.className='d-none js-damage-photo-input';
    fi.setAttribute('data-entry-id',entryId); fi.setAttribute('data-part-label',partLabel);
    fi.setAttribute('data-order-id',orderId); fi.setAttribute('data-upload-url',uploadUrl); fi.setAttribute('data-csrf',csrf);
    bindPhotoInput(fi); fLabel.appendChild(fi);
    var spn=document.createElement('span'); spn.className='damage-photo-uploading d-none ms-2'; spn.id='uploading-'+domId; spn.appendChild(mkIcon('fa-solid fa-spinner fa-spin'));
    ps.appendChild(pLbl); ps.appendChild(thumbs); ps.appendChild(fLabel); ps.appendChild(spn);

    wrap.appendChild(rowWrap); wrap.appendChild(ps);
    bindOtherToggle(sel); bindPhotoToggle(sel);
    return wrap;
  }

  // Init existing entries
  document.querySelectorAll('.damage-entry').forEach(function(entry){
    var sel=entry.querySelector('.js-dmg-select');
    if(sel){bindOtherToggle(sel); bindPhotoToggle(sel);}
    entry.querySelectorAll('.js-damage-photo-input').forEach(bindPhotoInput);
    entry.querySelectorAll('.rm-photo').forEach(bindRemovePhoto);
    var rmBtn=entry.querySelector('.btn-remove-dmg');
    if(rmBtn) rmBtn.addEventListener('click',function(){
      var container=entry.parentElement;
      var sel2=entry.querySelector('select');
      var addBtn=document.querySelector('.js-add-dmg[data-name="'+(sel2?sel2.name:'')+'"]');
      var pKey=addBtn?addBtn.getAttribute('data-part'):'';
      var pLbl=addBtn?addBtn.getAttribute('data-part-label'):'';
      var oId=addBtn?addBtn.getAttribute('data-order-id'):'';
      var uUrl=addBtn?addBtn.getAttribute('data-upload-url'):'';
      var c=addBtn?addBtn.getAttribute('data-csrf'):'';
      var nameOther=addBtn?addBtn.getAttribute('data-name-other'):'';
      entry.remove();
      if(!container||container.querySelectorAll('.damage-entry').length>0) return;
      container.appendChild(createDamageEntry(pKey,pLbl,pKey+':0',sel2?sel2.name:'',nameOther,oId,uUrl,c));
    });
  });

  // Status -> damage section toggle
  var normalize=function(v){return(v||'').toString().toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu,'');};
  document.querySelectorAll('.js-status').forEach(function(sel){
    var targetEl=document.querySelector(sel.dataset.target);
    var whenVal=sel.dataset.when||'beschaedigt';
    var apply=function(){if(targetEl) targetEl.classList.toggle('hidden',normalize(sel.value)!==whenVal);};
    sel.addEventListener('change',apply); apply();
  });

  // Add damage button
  document.querySelectorAll('.js-add-dmg').forEach(function(btn){
    btn.addEventListener('click',function(){
      var partKey=this.getAttribute('data-part');
      var partLabel=this.getAttribute('data-part-label');
      var name=this.getAttribute('data-name');
      var nameOther=this.getAttribute('data-name-other');
      var orderId=this.getAttribute('data-order-id');
      var uploadUrl=this.getAttribute('data-upload-url');
      var csrf=this.getAttribute('data-csrf');
      var container=document.getElementById('damage-container-'+partKey);
      if(!container) return;
      var countBefore=container.querySelectorAll('.damage-entry').length;
      container.appendChild(createDamageEntry(partKey,partLabel,partKey+':'+countBefore,name,nameOther,orderId,uploadUrl,csrf));
    });
  });
})();
</script>
@endsection

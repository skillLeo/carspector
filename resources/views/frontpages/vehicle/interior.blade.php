@extends('mainpages.examlayout')

@section('title', 'Innenraum')

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

  /* Einspaltig (auch Desktop) */
  .force-single .row > [class*="col-"] { flex:0 0 100% !important; max-width:100% !important; }

  /* Mehrfach-Schäden: 1 Zeile = 1 Feldgruppe */
  .damage-row { background:#fff; border:1px solid #e5e7eb; border-radius:8px; padding:10px; }
  .damage-row + .damage-row { margin-top:8px; }
  .damage-line { display:flex; gap:.5rem; align-items:center; }
  .damage-line .form-select { flex:1 1 auto; }
  .damage-line .btn-remove-row { border:1px solid #e5e7eb; background:#fff; border-radius:8px; height:42px; padding:0 .75rem; white-space:nowrap; }
  .other-wrap { margin-top:.5rem; }

  .btn-add-damage { border:1px solid #e5e7eb; background:#fff; border-radius:10px; height:44px; }

  /* Per-damage photo section */
  .damage-photo-section { margin-top:.6rem; padding:.6rem .7rem; background:#fff8f0; border:1px solid #fed7aa; border-radius:8px; }
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
            <h1 class="h4 mb-0">Innenraum</h1>
          </div>

          <div class="card-body pt-3 force-single">
            <form method="POST" action="{{ route('examination.store') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $id }}">
              <input type="hidden" name="form" value="interior">
              <input type="hidden" name="next_url" value="{{ route('examiner.other.conclusion', ['id' => $id]) }}">

              @php
                $statusOptions = [
                  'i.O.'            => 'i.O.',
                  'beschädigt'      => 'Beschädigt / defekt',
                  'nicht_vorhanden' => 'Nicht vorhanden',
                ];

                $labels = [
                  'seat_belts'        => 'Sicherheitsgurte',
                  'steering_wheel'    => 'Lenkrad',
                  'dashboard'         => 'Armatur',
                  'air_conditioning'  => 'Klimaanlage',
                  'heating_ventilation'=> 'Heizung/ Lüftung',
                  'sunroof'           => 'Schiebedach / Cabrioverdeck',
                  'controls'          => 'Bedienelemente',
                  'window_lifters'    => 'Fensterheber',
                  'rearview_mirror'   => 'Rückspiegel',
                  'seats'             => 'Sitze',
                  'glove_box'         => 'Handschuhfach',
                  'radio'             => 'Radio',
                  'floor'             => 'Boden',
                  'paneling'          => 'Verkleidung',
                  'headliner'         => 'Dachhimmel',
                  'horn'              => 'Hupe',
                  'smell'             => 'Geruch',
                ];

                $detailOptions = [
                  'seat_belts'       => ['Verriegelung defekt','Gurt franst','Gurt strafft nicht','Gurtaufroller defekt','Verschmutzt','Sonstiges'],
                  'steering_wheel'   => ['Abrieb','Locker','Schiefstand','Tasten defekt','Airbag-Abdeckung beschädigt','Sonstiges'],
                  'dashboard'        => ['Riss/Bruch','Kratzer','Verfärbung','Schalter defekt','Anzeige defekt','Sonstiges'],
                  'air_conditioning' => ['Keine Kühlleistung','Gebläse defekt','Geruchsentwicklung','Bedienung ohne Funktion','Klappern','Sonstiges'],
                  'heating_ventilation'=>['Heizung ohne Leistung','Gebläse defekt','Klappensteuerung defekt','Geruchsentwicklung','Sonstiges'],
                  'sunroof'          => ['Dichtung undicht','Mechanik klemmt','Motor defekt','Kratzer/Glas','Abläufe verstopft','Sonstiges'],
                  'controls'         => ['Abnutzungsspuren', 'Schalter klemmt','Taster ohne Funktion','Drehregler defekt','Beleuchtung defekt','Sonstiges'],
                  'window_lifters'   => ['Fährt nicht','Langsam/ruckelnd','Klemmt','Schalter defekt','Dichtung undicht','Sonstiges'],
                  'rearview_mirror'  => ['Glas lose/gerissen','Verstellung defekt','Blendfunktion defekt','Halter locker','Sonstiges'],
                  'seats'            => ['Abnutzungsspuren', 'Polster Riss','Flecken','Naht offen','Verstellung defekt','Sitzheizung defekt','Sonstiges'],
                  'glove_box'        => ['Schloss defekt','Scharnier gebrochen','Klemmt','Innenbeleuchtung defekt','Sonstiges'],
                  'radio'            => ['Kein Empfang','Display defekt','Bedienung ohne Funktion','Lautsprecher verzerren','Bluetooth defekt','Sonstiges'],
                  'floor'            => ['Teppich verschlissen','Feuchtigkeit','Flecken','Befestigung lose','Sonstiges'],
                  'paneling'         => ['Clip/Befestigung lose','Kratzer','Bruch/Riss','Verfärbung','Sonstiges'],
                  'headliner'        => ['Hängt durch','Flecken','Riss','Wasserfleck','Sonstiges'],
                  'horn'             => ['Ohne Funktion','Taster defekt','Kontaktproblem','Sonstiges'],
                ];

                $smellOptions = ['i.O. / neutral','Rauch','Tiergeruch','Feuchtigkeit / Schimmel','Kraftstoff','Öl / Kühlmittel','Sonstiges'];

                $v = fn($name,$fallback=null) => old($name, data_get($examination, $name, $fallback));
              @endphp

              @foreach($labels as $key => $title)
                @php
                  $statusName = $key;
                  $detailName = $key.'_detail';       // array
                  $otherName  = $key.'_detail_other'; // array

                  $statusVal  = (string) $v($statusName);
                  $isDamaged  = (mb_strtolower($statusVal) === 'beschädigt');

                  $detailVals = (array) $v($detailName, []);
                  $otherVals  = (array) $v($otherName, []);
                  if (empty($detailVals)) { $detailVals = ['']; }
                  while (count($otherVals) < count($detailVals)) { $otherVals[] = ''; }
                @endphp

                <div class="doc-row mb-3 box" data-key="{{ $key }}" data-part-label="{{ $title }}" data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                  <p class="pb-2 doc-title">{{ $title }}</p>

                  @if($key === 'smell')
                    @php
                      $smellVal = (string) $v('smell');
                      $smellOther = (string) $v('smell_detail_other');
                      $smellIsOther = ($smellVal === 'Sonstiges');
                    @endphp

                    <select name="smell" class="form-select select-tall js-smell" data-target="#wrap-smell-other">
                      <option value="">-- bitte wählen --</option>
                      @foreach($smellOptions as $opt)
                        <option value="{{ $opt }}" {{ $smellVal===$opt ? 'selected' : '' }}>{{ $opt }}</option>
                      @endforeach
                    </select>

                    <div id="wrap-smell-other" class="mt-2 {{ $smellIsOther ? '' : 'hidden' }}">
                      <label class="form-label">Bitte beschreiben</label>
                      <input type="text" name="smell_detail_other" class="form-control input-compact" value="{{ $smellOther }}">
                    </div>

                  @else
                    {{-- Status (eigene Zeile) --}}
                    <div class="row g-2 align-items-end">
                      <div class="col-12">
                        <select name="{{ $statusName }}" class="form-select select-tall js-status"
                                data-details="#wrap-{{ $key }}-details">
                          <option value="">-- bitte wählen --</option>
                          @foreach($statusOptions as $sv => $sl)
                            <option value="{{ $sv }}" {{ $statusVal===$sv ? 'selected' : '' }}>{{ $sl }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    {{-- Beschädigungen (einspaltig, dynamisch) --}}
                    <div id="wrap-{{ $key }}-details" class="mt-2 {{ $isDamaged ? '' : 'hidden' }}">
                      <label class="form-label">Beschädigungen</label>

                      <div class="damage-list" data-name="{{ $key }}">
                        @foreach($detailVals as $idx => $dVal)
                          @php
                            $oVal = $otherVals[$idx] ?? '';
                            $isOther = ($dVal === 'Sonstiges');
                            $intEntryId = $key . ':' . $idx;
                            $intDomId   = $key . '-' . $idx;
                            $intPhotos = ($examination->id ?? null)
                              ? \App\Models\ExaminationImage::where('examination_id', $examination->id)
                                  ->where('damage_component', $intEntryId)->get()
                              : collect();
                          @endphp
                          <div class="damage-row" data-entry-id="{{ $intEntryId }}">
                            <div class="damage-line">
                              <select name="{{ $detailName }}[]" class="form-select select-tall js-detail-row" data-other=".other-wrap">
                                <option value="">-- bitte wählen --</option>
                                @foreach(($detailOptions[$key] ?? ['Sonstiges']) as $opt)
                                  <option value="{{ $opt }}" {{ $dVal===$opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                              </select>
                              <button type="button" class="btn btn-sm btn-remove-row {{ $loop->first ? 'hidden' : '' }}" aria-label="Zeile entfernen">✕</button>
                            </div>
                            <div class="other-wrap {{ $isOther ? '' : 'hidden' }}">
                              <input type="text" name="{{ $otherName }}[]" class="form-control input-compact" value="{{ $oVal }}" placeholder="kurz beschreiben…">
                            </div>
                            <div class="damage-photo-section {{ $dVal !== '' ? '' : 'hidden' }}">
                              <div class="small fw-semibold mb-1"><i class="fa-solid fa-camera me-1 text-warning"></i> Schadensfotos</div>
                              <div class="damage-photo-thumbs" id="photo-thumbs-{{ $intDomId }}">
                                @foreach($intPhotos as $photo)
                                  <div class="damage-photo-thumb" id="dmg-thumb-{{ $photo->id }}">
                                    <img src="{{ asset('storage/' . $photo->image) }}" alt="">
                                    <button type="button" class="rm-photo" data-id="{{ $photo->id }}" title="Entfernen">×</button>
                                  </div>
                                @endforeach
                              </div>
                              <label class="btn btn-outline-secondary btn-sm damage-photo-upload-btn mb-0 mt-1" style="cursor:pointer;">
                                <i class="fa-solid fa-plus me-1"></i> Foto
                                <input type="file" accept="image/*" multiple class="d-none js-damage-photo-input"
                                       data-entry-id="{{ $intEntryId }}" data-part-label="{{ $title }}"
                                       data-order-id="{{ $id }}" data-upload-url="{{ route('examination.store.images') }}" data-csrf="{{ csrf_token() }}">
                              </label>
                              <span class="damage-photo-uploading d-none ms-2" id="uploading-{{ $intDomId }}"><i class="fa-solid fa-spinner fa-spin me-1"></i></span>
                            </div>
                          </div>
                        @endforeach
                      </div>

                      <template class="damage-template">
                        <div class="damage-row">
                          <div class="damage-line">
                            <select name="{{ $detailName }}[]" class="form-select select-tall js-detail-row" data-other=".other-wrap">
                              <option value="">-- bitte wählen --</option>
                              @foreach(($detailOptions[$key] ?? ['Sonstiges']) as $opt)
                                <option value="{{ $opt }}">{{ $opt }}</option>
                              @endforeach
                            </select>
                            <button type="button" class="btn btn-sm btn-remove-row" aria-label="Zeile entfernen">✕</button>
                          </div>
                          <div class="other-wrap hidden">
                            <input type="text" name="{{ $otherName }}[]" class="form-control input-compact" placeholder="kurz beschreiben…">
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

                      <div class="mt-2">
                        <button type="button" style="color: gray" class="btn btn-add-damage px-3 py-2">+ Weitere Beschädigung hinzufügen</button>
                      </div>
                    </div>
                  @endif
                </div>
              @endforeach

              <div class="mb-4">
                <label for="interior_overall_comment" class="form-label fw-semibold">Gesamtkommentar Innenraum</label>
                <textarea name="interior_overall_comment" id="interior_overall_comment" rows="3" class="form-control">{{ old('interior_overall_comment', $examination->interior_overall_comment) }}</textarea>

              </div>

           <div class="d-grid mb-2">
  <button type="submit" class="btn btn-primary btn-lg">Nächster Abschnitt</button>
</div>
            </form>
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

    var row=input.closest('.damage-row');
    var sel=row?row.querySelector('.js-detail-row'):null;
    var dmgType=(sel&&sel.value)?sel.value:'';

    if(dmgType==='Sonstiges'){
      var oi=row?row.querySelector('.other-wrap input'):null;
      dmgType=(oi&&oi.value.trim())?oi.value.trim():'Sonstiges';
    }

    var caption=(partLabel||'')+(dmgType?' - '+dmgType:'');

    if(spinner) spinner.classList.remove('d-none');

    var fd=new FormData();
    fd.append('photos[]',file);
    fd.append('id',orderId);
    fd.append('form','interior');
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
    var sel=row.querySelector('.js-detail-row'); if(!sel) return;
    var ps=row.querySelector('.damage-photo-section'); if(!ps) return;
    var apply=function(){ ps.classList.toggle('hidden',!sel.value||sel.value===''); };
    sel.addEventListener('change', apply); apply();
  }
  function bindRow(row, box) {
    var sel = row.querySelector('.js-detail-row');
    var otherWrap = row.querySelector(sel ? sel.getAttribute('data-other') : null);
    var removeBtn = row.querySelector('.btn-remove-row');

    function applyDetail(){
      if (!sel || !otherWrap) return;
      otherWrap.classList.toggle('hidden', sel.value !== 'Sonstiges');
    }
    sel && sel.addEventListener('change', applyDetail);
    applyDetail();

    // Photo toggle
    bindPhotoToggle(row);
    row.querySelectorAll('.js-damage-photo-input').forEach(bindPhotoInput);
    row.querySelectorAll('.rm-photo').forEach(bindRemovePhoto);

    if (removeBtn){
      removeBtn.addEventListener('click', function(){
        var list = row.closest('.damage-list');
        if (!list) return;
        if (list.querySelectorAll('.damage-row').length > 1){
          row.remove();
          refreshRemoveVisibility(list);
        }
      });
    }
  }

  function refreshRemoveVisibility(list){
    var rows = Array.from(list.querySelectorAll('.damage-row'));
    rows.forEach(function(r, idx){
      var btn = r.querySelector('.btn-remove-row');
      if (btn) btn.classList.toggle('hidden', idx === 0);
    });
  }

  // Status -> Details
  document.querySelectorAll('.js-status').forEach(function(sel){
    var detailsSel = sel.getAttribute('data-details');
    var detailsEl  = detailsSel ? document.querySelector(detailsSel) : null;
    function apply(){
      if (!detailsEl) return;
      detailsEl.classList.toggle('hidden', (sel.value || '').toLowerCase() !== 'beschädigt');
    }
    sel.addEventListener('change', apply); apply();
  });

  // Geruch: Sonstiges
  document.querySelectorAll('.js-smell').forEach(function(sel){
    var target = document.querySelector(sel.dataset.target);
    function apply(){ if (!target) return; target.classList.toggle('hidden', sel.value !== 'Sonstiges'); }
    sel.addEventListener('change', apply); apply();
  });

  // Multi-Beschädigungen je Box
  document.querySelectorAll('.box').forEach(function(box){
    var partLabel = box.getAttribute('data-part-label') || '';
    var orderId   = box.getAttribute('data-order-id') || '';
    var uploadUrl = box.getAttribute('data-upload-url') || '';
    var csrf      = box.getAttribute('data-csrf') || '';
    var dataKey   = box.getAttribute('data-key') || '';

    // Init existing rows
    box.querySelectorAll('.damage-row').forEach(function(r){ bindRow(r, box); });

    var addBtn = box.querySelector('.btn-add-damage');
    if (addBtn){
      addBtn.addEventListener('click', function(){
        var list = box.querySelector('.damage-list');
        var tpl  = box.querySelector('.damage-template');
        if (!list || !tpl) return;
        var node = tpl.content.firstElementChild.cloneNode(true);
        list.appendChild(node);

        // Assign entry ID and bind file input
        var countBefore = list.querySelectorAll('.damage-row').length;
        var newEntryId = dataKey + ':' + countBefore;
        node.setAttribute('data-entry-id', newEntryId);
        var fi = node.querySelector('.js-damage-photo-input');
        if(fi && orderId){
          fi.setAttribute('data-entry-id', newEntryId);
          fi.setAttribute('data-part-label', partLabel);
          fi.setAttribute('data-order-id', orderId);
          fi.setAttribute('data-upload-url', uploadUrl);
          fi.setAttribute('data-csrf', csrf);
        }
        var tc = node.querySelector('.damage-photo-thumbs');
        if(tc) tc.id = 'photo-thumbs-' + newEntryId.replace(':','-');
        var sp = node.querySelector('.damage-photo-uploading');
        if(sp) sp.id = 'uploading-' + newEntryId.replace(':','-');

        bindRow(node, box);
        refreshRemoveVisibility(list);
      });
    }
  });
})();
</script>
@endsection

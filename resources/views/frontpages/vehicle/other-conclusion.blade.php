@extends('mainpages.examlayout')

@section('title', 'Sonstiges & Fazit')

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

  .label-mini { font-weight:600; margin-bottom:.25rem; }
  .btn-icon { border:0; background:transparent; padding:0; }
  .btn-icon img { width:22px; height:22px; }

  .text-area-field { width:100%; border-radius:12px; border:1px solid #e5e7eb; background:#fff; padding:12px; }
  .hint-box{
  background:#f3f4f6;          /* hellgrau */
  color:#000;                   /* schwarz */
  border:1px solid #000;        /* schwarzer Rand */
  border-radius:12px;
  padding:12px 14px;
  margin-top:10px;
  display:black;
  gap:3px;
}
.hint-box i{
  margin-top:2px;               /* Icon optisch zentrieren */
}

</style>

<div class="container-fluid page-bg py-3 py-md-5">
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
        <div class="card-header border-0 p-4 pb-4 d-flex justify-content-between align-items-center">
          <h1 class="h4 mb-0">Sonstiges & Fazit</h1>
        </div>

        <div class="card-body pt-3">
          <form action="{{ route('examination.store') }}" method="POST" id="otherConclusionForm" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="other-conclusion">
            <input type="hidden" name="next_url" value="{{ route('examiner.vehicle.photo', ['id' => $id]) }}">

            {{-- Kommentar-Felder (werden über Modal gepflegt) --}}
            <input type="hidden" name="repainting_comments" value="{{ $examination->repainting_comments }}">
            <input type="hidden" name="known_accident_damage_comments" value="{{ $examination->known_accident_damage_comments }}">
            <input type="hidden" name="error_in_error_memory_comments" value="{{ $examination->error_in_error_memory_comments }}">
            <input type="hidden" name="error_in_instrument_cluster_comments" value="{{ $examination->error_in_instrument_cluster_comments }}">

            @php
              $v = fn($name,$fallback=null)=> old($name, data_get($examination,$name,$fallback));

              // Unfall-Statusliste
              $accidentStatus = [
                'Vorhanden & instandgesetzt' => 'Vorhanden & instandgesetzt',
                'Vorhanden & nicht instandgesetzt' => 'Vorhanden & nicht instandgesetzt',
                'Kein Unfallwagen' => 'Kein Unfallwagen',
              ];
            @endphp

            {{-- Fehler im Kombiinstrument --}}
            @php
              $clusterVal = (string) $v('error_in_instrument_cluster');
              $clusterYes = ($clusterVal === 'Ja');
              $clusterNote = (string) $v('error_in_instrument_cluster_note');
            @endphp
            <div class="doc-row mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <p class="doc-title">Kombiinstrument</p>
              </div>
              <div class="row g-2 mt-2">
                <div class="col-12 col-md-6">
                  <label class="label-mini">Fehler vorhanden?</label>
                  <select name="error_in_instrument_cluster" class="form-select select-tall js-toggle" data-target="#cluster-note" data-when="Ja">
                    <option value="">-- bitte wählen --</option>
                    <option value="Nein" {{ $clusterVal==='Nein'? 'selected' : '' }}>Keine Fehler</option>
                    <option value="Ja"   {{ $clusterVal==='Ja' ? 'selected' : '' }}>Fehler vorhanden</option>
                  </select>
                </div>
                <div id="cluster-note" class="col-12 {{ $clusterYes ? '' : 'hidden' }}">
                  <label class="label-mini mt-2 mt-md-0">Beschreibung</label>
                  <input type="text" name="error_in_instrument_cluster_note" class="form-control input-compact" value="{{ $clusterNote }}">
                </div>
              </div>
            </div>

            {{-- Fehler im Fehlerspeicher --}}
            @php
              $memVal  = (string) $v('error_in_error_memory');
              $memYes  = ($memVal === 'Ja');
              $memNote = (string) $v('error_in_error_memory_note');

              // Hinweis nur bei "Nein" oder "Ja"
              $showMemHint = in_array($memVal, ['Nein', 'Ja'], true);
            @endphp

            <div class="doc-row mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <p class="doc-title">Fehlerspeicher</p>
              </div>

              <div class="row g-2 mt-2">
                <div class="col-12 col-md-6">
                  <label class="label-mini">Fehler vorhanden?</label>
                  <select name="error_in_error_memory"
                          class="form-select select-tall js-toggle-memory"
                          data-note-target="#memory-note"
                          data-hint-target="#memory-hint">
                    <option value="">-- bitte wählen --</option>
                    <option value="Nein" {{ $memVal==='Nein'? 'selected' : '' }}>Keine Fehler</option>
                    <option value="Ja"   {{ $memVal==='Ja' ? 'selected' : '' }}>Fehler vorhanden</option>
                    <option value="Keine Diagnose durchgeführt" {{ $memVal==='Keine Diagnose durchgeführt' ? 'selected' : '' }}>
                      Keine Diagnose durchgeführt
                    </option>
                  </select>
                </div>

                <div id="memory-note" class="col-12 {{ $memYes ? '' : 'hidden' }}">
                  <label class="label-mini mt-2 mt-md-0">Beschreibung</label>
                  <input type="text" name="error_in_error_memory_note" class="form-control input-compact" value="{{ $memNote }}">
                </div>

                {{-- Hinweis unter dem Abschnitt (unterhalb der Felder) --}}
               <div id="memory-hint" class="col-12 hidden">
                <div class="hint-box">
                  <i class="fa-solid fa-circle-info"></i>
                  <strong>HINWEIS:</strong> Bitte Diagnosebericht oder Foto vom Diagnosegerät im nächsten Schritt hochladen.
                </div>
              </div>

              </div>
            </div>


            {{-- Bekannte Unfallschäden --}}
            @php
            $accidentStatus = [
                'Kein Unfallwagen'                => 'Kein Unfallwagen',
                'Vorhanden & instandgesetzt'      => 'Vorhanden & instandgesetzt',
                'Vorhanden & nicht instandgesetzt'=> 'Vorhanden & nicht instandgesetzt',
            ];

            $accVal   = (string) $v('known_accident_damage_status', $v('known_accident_damage'));
            $accNote  = (string) $v('known_accident_damage_note');
            // Wichtig: Hier auf den EXAKTEN Wert prüfen, den die Option hat:
            $showNote = !empty($accVal) && $accVal !== 'Kein Unfallwagen';
            @endphp

            <div class="doc-row mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <p class="doc-title">Unfallschäden</p>
              </div>
              <div class="row g-2 mt-2">
                <div class="col-12 col-md-8">
                  <select name="known_accident_damage_status" class="form-select select-tall js-toggle-accident" data-target="#accident-note">
                    <option value="">-- bitte wählen --</option>
                    @foreach($accidentStatus as $sv => $sl)
                      <option value="{{ $sv }}" {{ $accVal===$sv ? 'selected' : '' }}>{{ $sl }}</option>
                    @endforeach
                  </select>
                </div>

                <div id="accident-note" class="col-12 {{ $showNote ? '' : 'hidden' }}">
                  <label class="label-mini mt-2">Beschreibung / Details</label>
                  <input type="text" name="known_accident_damage_note" class="form-control input-compact" value="{{ $accNote }}">
                </div>
              </div>
            </div>

            {{-- Fazit --}}
            <div class="doc-row mb-3">
              <p class="doc-title mb-2">Fazit</p>
              <textarea name="conclusion" rows="5" class="text-area-field">{{ old('conclusion', $examination->conclusion) }}</textarea>
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

{{-- Kommentar-Modal --}}
<div class="modal fade" id="commentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Kommentar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" rows="5" id="commentModalInput"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="commentModalSave" data-bs-dismiss="modal">Speichern</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
// Fehlerspeicher: Hinweis bei "Nein" oder "Ja", Notiz nur bei "Ja" – komplett ohne Serverlogik
document.querySelectorAll('.js-toggle-memory').forEach(function(sel){
  const noteEl = document.querySelector(sel.dataset.noteTarget);
  const hintEl = document.querySelector(sel.dataset.hintTarget);

  function apply(){
    const v = (sel.value || "").trim();

    // Hinweis NUR bei Ja/Nein (nicht bei "" und nicht bei "Keine Diagnose durchgeführt")
    const showHint = (v === "Nein" || v === "Ja");
    if (hintEl) hintEl.classList.toggle('hidden', !showHint);

    // Notizfeld nur bei "Ja"
    if (noteEl) noteEl.classList.toggle('hidden', v !== "Ja");
  }

  sel.addEventListener('change', apply);
  apply(); // initial (wichtig: greift auch nach Reload mit vorbelegtem Wert)
});



// Unfallschäden: Textfeld nur zeigen, wenn Auswahl != "" und != "Kein Unfallwagen"
document.querySelectorAll('.js-toggle-accident').forEach(function(sel){
  const targetEl = document.querySelector(sel.dataset.target);
  function apply(){
    if (!targetEl) return;
    const val = (sel.value || "");
    const show = val !== "" && val !== "Kein Unfallwagen"; // <-- exakter Vergleich zum Option-Wert
    targetEl.classList.toggle('hidden', !show);
  }
  sel.addEventListener('change', apply);
  apply(); // initial
});

(function(){
  // Toggle (zeigen/verstecken) einfacher Notizfelder (nur bei "Ja")
  document.querySelectorAll('.js-toggle').forEach(function(sel){
    const targetSel = sel.dataset.target;
    const whenVal   = sel.dataset.when || 'Ja';
    const targetEl  = document.querySelector(targetSel);
    function apply(){
      if (!targetEl) return;
      targetEl.classList.toggle('hidden', sel.value !== whenVal);
    }
    sel.addEventListener('change', apply); apply();
  });

  // Nachlackierungen: Rows hinzufügen/entfernen (falls im DOM vorhanden)
  const addBtn = document.getElementById('btn-repaint-add');
  const list   = document.getElementById('repaint-list');
  const tpl    = document.getElementById('tpl-repaint');
  if (addBtn && list && tpl){
    addBtn.addEventListener('click', function(){
      const node = tpl.content.firstElementChild.cloneNode(true);
      bindRepaintRow(node);
      list.appendChild(node);
      refreshFirstRowRemoveButton();
    });
    // vorhandene binden
    list.querySelectorAll('.repaint-row').forEach(bindRepaintRow);
    function bindRepaintRow(row){
      const rm = row.querySelector('.btn-repaint-remove');
      if (rm){
        rm.addEventListener('click', function(){
          row.remove();
          refreshFirstRowRemoveButton();
        });
      }
    }
    function refreshFirstRowRemoveButton(){
      const rows = list.querySelectorAll('.repaint-row');
      rows.forEach((r,idx)=>{
        const rm = r.querySelector('.btn-repaint-remove');
        if (rm) rm.classList.toggle('d-none', idx===0);
      });
    }
    refreshFirstRowRemoveButton();
  }

  // Kommentar-Modal
  let activeCommentField = null;
  document.querySelectorAll('.btn-comment').forEach(function(btn){
    btn.addEventListener('click', function(){
      const name = btn.getAttribute('data-name');
      activeCommentField = document.querySelector('[name="'+name+'"]');
      const input = document.getElementById('commentModalInput');
      if (activeCommentField && input) input.value = activeCommentField.value || '';
    });
  });
  const saveBtn = document.getElementById('commentModalSave');
  if (saveBtn){
    saveBtn.addEventListener('click', function(){
      const input = document.getElementById('commentModalInput');
      if (activeCommentField && input) {
        activeCommentField.value = input.value || '';
      }
      activeCommentField = null;
    });
  }
})();
</script>
@endsection

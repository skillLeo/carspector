@extends('mainpages.examlayout')

@section('title', 'Probefahrt / Probelauf')

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
        <div class="card-header border-0 p-4 pb-3">
          <h1 class="h4 mb-0">Probefahrt / Probelauf</h1>
        </div>

        <div class="card-body pt-3">
          <form method="POST" action="{{ route('examination.store') }}" id="testDriveForm">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="test-drive">
            <input type="hidden" name="next_url" value="{{ route('examiner.interior', ['id' => $id]) }}">

            @php
              // Helper
              $val = fn($k,$d=null)=> old($k, data_get($examination,$k,$d));
              $selectStatus = [
                '' => '-- bitte wählen --',
                'i.O.' => 'i.O.',
                'auffaellig' => 'Auffällig',
                'nicht_vorhanden' => 'Nicht vorhanden (z.B. Elektro)',
              ];
              // Probefahrt-Punkte
              $driveItems = [
                ['label'=>'Motorlauf',           'key'=>'td_engine_run'],
                ['label'=>'Lenkung',             'key'=>'td_steering'],
                ['label'=>'Kupplung',            'key'=>'td_clutch'],
                ['label'=>'Getriebe',            'key'=>'td_transmission'],
                ['label'=>'Tacho',               'key'=>'td_speedometer'],
                ['label'=>'Bremsgefühl',         'key'=>'td_brake_feel'],
                ['label'=>'Auffällige Geräusche','key'=>'td_strange_noises'],
                ['label'=>'Anlasser',            'key'=>'td_starter'],
                ['label'=>'Steuerkette/Riemen',  'key'=>'td_timing'],
              ];
              // Probelauf-Punkte (ohne Fahrt)
              $runItems = [
                ['label'=>'Anlasser',            'key'=>'tr_starter'],
                ['label'=>'Kupplung',            'key'=>'tr_clutch'],
                ['label'=>'Motorlauf',           'key'=>'tr_engine_run'],
                ['label'=>'Auffällige Geräusche','key'=>'tr_strange_noises'],
                ['label'=>'Steuerkette/Riemen',  'key'=>'tr_timing'],
              ];
            @endphp

            {{-- Frage 1: Probefahrt durchgeführt? --}}
            <div class="doc-row mb-3">
              <p class="doc-title mb-2">Probefahrt durchgeführt?</p>
              <div class="row g-2">
                @php $driveDone = (string)$val('test_drive_done') === '1'; @endphp
                <div class="col-6">
                  <select name="test_drive_done" id="test_drive_done" class="form-select select-tall">
                    <option value="">-- bitte wählen --</option>
                    <option value="1" {{ $driveDone ? 'selected' : '' }}>Ja</option>
                    <option value="0" {{ (!$driveDone && $val('test_drive_done')!=='') ? 'selected' : '' }}>Nein</option>
                  </select>
                </div>
              </div>
            </div>

            {{-- Sektion: Prüfpunkte bei Probefahrt (sichtbar wenn Ja) --}}
            <div id="section-testdrive" class="{{ $driveDone ? '' : 'hidden' }}">
              @foreach($driveItems as $it)
                @php
                  $k = $it['key'];
                  $status = (string)$val($k);
                  $note   = (string)$val($k.'_note');
                  $isAuff = ($status === 'auffaellig');
                @endphp
                <div class="doc-row mb-3">
                  <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-6">
                      <p class="pb-2 doc-title">{{ $it['label'] }}</p>
                      <select name="{{ $k }}" class="form-select select-tall js-status"
                              data-target="#wrap-{{ $k }}-note" data-when="auffaellig">
                        @foreach($selectStatus as $sv=>$sl)
                          <option value="{{ $sv }}" {{ $status===$sv ? 'selected' : '' }}>{{ $sl }}</option>
                        @endforeach
                        @if($k === 'td_clutch')
                          <option value="nicht_vorhanden" {{ $status==='nicht_vorhanden' ? 'selected' : '' }}>
                            Nicht vorhanden (Automatik)
                          </option>
                        @endif
                      </select>
                    </div>
                    <div class="col-12 col-md-6 {{ $isAuff ? '' : 'hidden' }}" id="wrap-{{ $k }}-note">
                      <label class="form-label">Auffälligkeit</label>
                      <input type="text" name="{{ $k }}_note" class="form-control input-compact" value="{{ $note }}">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            {{-- Frage 2: Probelauf durchgeführt? (nur wenn Probefahrt = Nein) --}}
            @php $runAskVisible = (!$driveDone && $val('test_drive_done')!==''); @endphp
            <div id="question-probelauf" class="{{ $runAskVisible ? '' : 'hidden' }}">
              <div class="doc-row mb-3">
                <p class="doc-title mb-2">Probelauf durchgeführt?</p>
                @php $runDone = (string)$val('test_run_done') === '1'; @endphp
                <div class="row g-2">
                  <div class="col-6">
                    <select name="test_run_done" id="test_run_done" class="form-select select-tall">
                      <option value="">-- bitte wählen --</option>
                      <option value="1" {{ $runDone ? 'selected' : '' }}>Ja</option>
                      <option value="0" {{ (!$runDone && $val('test_run_done')!=='') ? 'selected' : '' }}>Nein</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            {{-- Sektion: Prüfpunkte bei Probelauf (sichtbar wenn Frage 2 = Ja) --}}
            <div id="section-testrun" class="{{ (isset($runDone) && $runDone) ? '' : 'hidden' }}">
              @foreach($runItems as $it)
                @php
                  $k = $it['key'];
                  $status = (string)$val($k);
                  $note   = (string)$val($k.'_note');
                  $isAuff = ($status === 'auffaellig');
                @endphp
                <div class="doc-row mb-3">
                  <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-6">
                      <p class="pb-2 doc-title">{{ $it['label'] }}</p>
                      <select name="{{ $k }}" class="form-select select-tall js-status"
                              data-target="#wrap-{{ $k }}-note" data-when="auffaellig">
                        @foreach($selectStatus as $sv=>$sl)
                          <option value="{{ $sv }}" {{ $status===$sv ? 'selected' : '' }}>{{ $sl }}</option>
                        @endforeach
                        @if($k === 'tr_clutch')
                          <option value="nicht_vorhanden" {{ $status==='nicht_vorhanden' ? 'selected' : '' }}>
                            Nicht vorhanden (Automatik)
                          </option>
                        @endif
                      </select>
                    </div>
                    <div class="col-12 col-md-6 {{ $isAuff ? '' : 'hidden' }}" id="wrap-{{ $k }}-note">
                      <label class="form-label">Auffälligkeit</label>
                      <input type="text" name="{{ $k }}_note" class="form-control input-compact" value="{{ $note }}">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            {{-- Sammel-Kommentar --}}
            <div class="mb-4">
              <label for="test_drive_overall_comment" class="form-label fw-semibold">Gesamtkommentar (Probefahrt/Probelauf)</label>
              <textarea name="test_drive_overall_comment" id="test_drive_overall_comment" rows="3" class="form-control">{{ old('test_drive_overall_comment', $examination->test_drive_overall_comment) }}</textarea>
              
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
  // Helper: Sichtbarkeit + Disable/Enable innerer Inputs
  function toggleSection(el, show){
    el.classList.toggle('hidden', !show);
    el.querySelectorAll('input, select, textarea').forEach(i=>{
      i.disabled = !show;
    });
  }

  const selDrive = document.getElementById('test_drive_done');
  const qRun     = document.getElementById('question-probelauf');
  const selRun   = document.getElementById('test_run_done');

  const secDrive = document.getElementById('section-testdrive');
  const secRun   = document.getElementById('section-testrun');

  function applyFlow(){
    const driveVal = selDrive ? selDrive.value : '';
    const driveYes = (driveVal === '1');
    const driveNo  = (driveVal === '0');

    // Probefahrt JA → nur Probefahrt-Punkte
    toggleSection(secDrive, driveYes);
    toggleSection(qRun, !driveYes && driveNo);

    if (!driveYes) {
      // wenn Probefahrt nicht ja ist, steuern wir noch den Probelauf
      const runVal = selRun ? selRun.value : '';
      const runYes = (runVal === '1');
      toggleSection(secRun, runYes);
    } else {
      toggleSection(secRun, false);
      if (selRun) selRun.value = ''; // zurücksetzen
    }
  }

  if (selDrive) selDrive.addEventListener('change', applyFlow);
  if (selRun)   selRun.addEventListener('change',   applyFlow);
  applyFlow();

  // "Auffällig" → Notizfeld zeigen/verstecken
  document.querySelectorAll('.js-status').forEach(function(sel){
    const targetSel = sel.dataset.target;
    const whenVal   = (sel.dataset.when || 'auffaellig').toLowerCase();
    const targetEl  = document.querySelector(targetSel);

    function apply(){
      const v = (sel.value || '').toLowerCase();
      if (!targetEl) return;
      const show = (v === whenVal);
      targetEl.classList.toggle('hidden', !show);
      targetEl.querySelectorAll('input, textarea, select').forEach(i=>{
        i.disabled = !show;
      });
    }
    sel.addEventListener('change', apply);
    apply();
  });
})();
</script>
@endsection

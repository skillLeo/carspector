@extends('mainpages.examlayout')

@section('title', 'Auftrag – Menü')

@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background: #f8fafc; min-height: 100dvh; }
  .order-card { border: 1px solid rgba(0,0,0,.06); border-radius: var(--radius); overflow: hidden; box-shadow: 0 12px 28px rgba(2,6,23,.06); }
  .order-card .card-header { background: linear-gradient(180deg,#fff,#f3f4f6); }
  .chev { display:inline-block; width: 28px; height: 28px; line-height:28px; text-align:center; border:1px solid #e5e7eb; border-radius:10px; }
  .badge-soft-success { background:#ecfdf5; color:#065f46; border:1px solid #a7f3d0; border-radius:999px; padding:.2rem .5rem; font-size:.8rem; display:inline-flex; align-items:center; gap:.35rem; }
  .badge-soft-muted { background:#eef2f7; color:#6b7280; border:1px solid #e5e7eb; border-radius:999px; padding:.2rem .5rem; font-size:.8rem; }

  .form-max-650 { max-width: 650px; margin-left: auto; margin-right: auto; width: 100%; }

  /* Zahl-Badge statt Icon */
  .menu-num {
    width: 42px; height: 42px; display:grid; place-items:center;
    border-radius: 12px; border:1px solid #e5e7eb; background:#f8fafc;
    font-weight: 700; font-size: .95rem; color:#111827;
  }

  /* Deaktivierter Abschlussbutton */
  .btn[disabled], .btn.disabled {
    pointer-events: none;
    opacity: .6;
  }
</style>

<div class="container-fluid page-bg py-5 py-md-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-9 col-xxl-8 form-max-650">

      <div class="order-card card">
          @php
              $hasFullAccess = auth()->check() && in_array(auth()->user()->type ?? null, ['admin', 'staff']);
          @endphp
          @if($hasFullAccess)
              <div class="mt-3 mx-3 d-flex justify-content-end gap-2">
                  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#pdfMetaModal">
                      PDF-Angaben bearbeiten
                  </button>
                  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ausstattungModal">
                      Ausstattung bearbeiten
                  </button>
{{--                  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#englishTextsModal">--}}
{{--                      English texts--}}
{{--                  </button>--}}
{{--                  <a href="{{ route('examiner.cost.calculations', $id) }}" class="btn btn-sm btn-outline-primary">--}}
{{--                      Schadenskalkulation--}}
{{--                  </a>--}}
              </div>

              <div class="mt-1 mx-3 d-flex  gap-2">
        <a
            href="https://tools.pdf24.org/de/bilder-in-pdf"
            target="_blank"
            rel="noopener" style="background: gray"
            class="btn btn-sm"
            title="Bilder in PDF umwandeln"
        >
            PDF 1
        </a>

        <a
            href="https://tools.pdf24.org/de/pdf-komprimieren"
            target="_blank"
            rel="noopener" style="background: gray"
            class="btn btn-sm"
            title="PDF komprimieren"
        >
            PDF 2
        </a>
    </div>
                      
            @php
              $summary = \App\Models\OrderDamageSummary::where('order_id', $id)->first();
              $showCalc = (bool)($summary->show_in_pdf ?? false);
            @endphp
            <div style="padding-left: 25px" class="pt-3 d-flex align-items-center gap-3">
              <div class="form-check form-switch m-0" title="Schadenskalkulation im PDF anzeigen?">
                <input class="form-check-input" type="checkbox" id="js-show-calcs" {{ $showCalc ? 'checked' : '' }}>
                <label class="form-check-label ms-2" for="js-show-calcs">Show calculations?</label>
              </div>
            </div>
          @endif
        <div class="card-header border-0 p-4">
          <div class="d-flex justify-content-between align-items-end flex-wrap gap-2">
            <div>
              <h1 class="h4 mb-1">Auftrag: CarCheck <!-- <span class="text-muted">{{ $examination->order_no ?? 'CS-06776' }}--></span></h1>
              <p class="mb-0 text-muted">Bitte bearbeiten Sie die Schritte der Reihe nach.</p>
            </div>


            @php
              $isAdmin = $hasFullAccess;

              // Menüeinträge
              $items = [
                ['label' => 'Bedingungen',          'route' => route('examiner.conditions', ['id' => $id]), 'keys' => ['examination-condition']],
                ['label' => 'Fahrzeugdaten',        'route' => route('examiner.vehicle.data', ['id' => $id]), 'keys' => ['vehicle-data']],
                ['label' => 'Dokumente',            'route' => route('examiner.vehicle.docs', ['id' => $id]), 'keys' => ['vehicle-document','documents']],
                ['label' => 'Bereifung',            'route' => route('examiner.tries', ['id' => $id]), 'keys' => ['tires','bereifung']],
                ['label' => 'Karosserie',           'route' => route('examiner.tries.body', ['id' => $id]), 'keys' => ['body','car-body','karosserie','tires']],
                ['label' => 'Lackzustand',          'route' => route('examiner.paint.thickness.condition', ['id' => $id]), 'keys' => ['paint-thickness-condition','paint']],
                ['label' => 'Beleuchtung',          'route' => route('examiner.vehicle.light', ['id' => $id]), 'keys' => ['vehicle-light','light']],
                ['label' => 'Bauteile',             'route' => route('examiner.external.condition', ['id' => $id]), 'keys' => ['external-condition','external']],
                ['label' => 'Technik',              'route' => route('examiner.technology', ['id' => $id]), 'keys' => ['technology']],
                ['label' => 'Probelauf & Fahrt',    'route' => route('examiner.test.drive', ['id' => $id]), 'keys' => ['test-drive']],
                ['label' => 'Innenraum',            'route' => route('examiner.interior', ['id' => $id]), 'keys' => ['interior']],
                ['label' => 'Sonstiges & Fazit',    'route' => route('examiner.other.conclusion', ['id' => $id]), 'keys' => ['other-conclusion','conclusion']],
                ['label' => 'Bilder & Dokumente',   'route' => route('examiner.vehicle.photo', ['id' => $id]), 'keys' => ['photo','photos']],
              ];

              // Nur Admin sieht Schadenskalkulation (und nur dann zählt sie im Fortschritt mit)
              if ($isAdmin) {
                $items[] = ['label' => 'Schadenskalkulation', 'route' => route('examiner.cost.calculations', ['id' => $id]), 'keys' => ['cost-calculations']];
              }

              $completed = collect($examination->completed_steps ?? []);
              $isDone = function($keys) use ($completed) {
                foreach ($keys as $k) { if ($completed->contains($k)) return true; }
                return false;
              };

              $done = 0;
              foreach ($items as $it) { if ($isDone($it['keys'])) $done++; }

              $total = count($items);
              $pct = $total ? intval(($done/$total)*100) : 0;
              $allDone = ($done === $total);
            @endphp


            <div class="text-end">
              <div class="small text-muted">Fortschritt: <strong>{{ $done }}/{{ $total }}</strong> ({{ $pct }}%)</div>
              <div class="progress bg-body-secondary rounded-pill mt-2" style="height:8px;">
                <div class="progress-bar" role="progressbar" style="width: {{ $pct }}%;" aria-valuenow="{{ $pct }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>

            </div>
          </div>
        </div>

        <div class="card-body p-0">
          <ul class="list-group list-group-flush">
            @foreach ($items as $idx => $i)
              @php $rowDone = $isDone($i['keys']); @endphp
              <li class="list-group-item py-3">
                <a class="d-flex align-items-center justify-content-between text-decoration-none" href="{{ $i['route'] }}">
                  <div class="d-flex align-items-center gap-3">
                    <span class="menu-num" aria-hidden="true">{{ $idx + 1 }}</span>
                    <div>
                      <div class="fw-semibold text-dark">{{ $i['label'] }}</div>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-2">
                    @if($rowDone)
                      <span class="badge-soft-success">
                        <img src="{{ asset('assets/img/ordercs_check.png') }}" width="16" height="16" alt="">Fertig
                      </span>
                    @else
                      <span class="badge-soft-muted">Offen</span>
                    @endif
                    <span class="chev" aria-hidden="true">›</span>
                  </div>
                </a>
              </li>
            @endforeach
          </ul>
        </div>



 <div class="card-footer bg-white border-0 p-4 text-center">
  <form method="POST" action="{{ route('examination.complete') }}" id="completeForm" novalidate>
    @csrf
    <input type="hidden" name="id" value="{{ $id }}">

    {{-- Button öffnet eigenes Bestätigungs-Modal --}}
    <button type="button"
            id="completeTrigger"
            class="btn btn-primary btn-lg w-95"
            style="width:95%; max-width:500px; height: 50px; margin:0 auto;"
            @if(!$allDone) disabled @endif
            title="{{ $allDone ? 'Auftrag endgültig abschließen' : 'Bitte erst alle Schritte abschließen' }}">
      Auftrag abschließen
    </button>
  </form>

  <p class="text-muted small mb-0 mt-3">Auftrag kann nach Abschluss nicht mehr bearbeitet werden.</p>
  
</div>

{{-- Eigenes, leichtgewichtiges Modal --}}
<div id="confirmModal" class="cs-modal" aria-hidden="true" role="dialog" aria-modal="true" hidden>
  <div class="cs-modal__backdrop" data-close></div>
  <div class="cs-modal__dialog" role="document">
    <div class="cs-modal__header">
      <h5 class="cs-modal__title m-0">Auftrag abschließen?</h5>
    </div>
    <div class="cs-modal__body">
      Der Auftrag kann nach Abschluss <strong>nicht</strong> mehr bearbeitet werden.
    </div>
    <div class="cs-modal__footer">
      <button type="button" style="color: black" class="btn btn-outline-secondary btn-lg w-100" data-close>Abbrechen</button>
      <button type="button" style="background-color: var(--secondary) !important; border: 1px var(--secondary)" class="btn btn-outline-secondary btn-lg w-100" id="confirmSubmit">Ja, endgültig abschließen</button>
    </div>
  </div>
</div>




<style>
  .cs-modal[hidden] { display: none !important; }
  .cs-modal { position: fixed; inset: 0; z-index: 1060; display: grid; place-items: center; }
  .cs-modal__backdrop { position: absolute; inset: 0; background: rgba(0,0,0,.5); }
  .cs-modal__dialog {
    position: relative; width: min(92vw, 520px); background: #fff; border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,.2); overflow: hidden; margin: 16px;
  }
  .cs-modal__header, .cs-modal__footer { padding: 16px; background: #f8f9fa; }
  .cs-modal__body { padding: 16px; line-height: 1.4; }
  .cs-modal__footer { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  @media (max-width: 420px) {
    .cs-modal__footer { grid-template-columns: 1fr; }
  }
</style>

<script>
  (function() {
    const trigger = document.getElementById('completeTrigger');
    const modal   = document.getElementById('confirmModal');
    const form    = document.getElementById('completeForm');
    const confirmBtn = document.getElementById('confirmSubmit');

    if (!trigger || !modal || !form || !confirmBtn) return;

    const openModal = () => {
      if (trigger.disabled) return;
      modal.hidden = false;
      modal.setAttribute('aria-hidden', 'false');
      confirmBtn.focus({ preventScroll: true });
      document.addEventListener('keydown', escClose);
    };

    const closeModal = () => {
      modal.hidden = true;
      modal.setAttribute('aria-hidden', 'true');
      trigger.focus({ preventScroll: true });
      document.removeEventListener('keydown', escClose);
    };

    const escClose = (e) => { if (e.key === 'Escape') closeModal(); };

    trigger.addEventListener('click', openModal);
    modal.addEventListener('click', (e) => { if (e.target.hasAttribute('data-close')) closeModal(); });
    confirmBtn.addEventListener('click', () => { form.submit(); });

  })();
</script>






    </div>
  </div>
</div>

@php
    $hasFullAccess = $hasFullAccess ?? (auth()->check() && in_array(auth()->user()->type ?? null, ['admin', 'staff']));
@endphp
@if($hasFullAccess)
  <!-- Modal: PDF Meta Edit -->
  <div class="modal fade" id="pdfMetaModal" tabindex="-1" aria-labelledby="pdfMetaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pdfMetaModalLabel">PDF-Angaben</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
        </div>
        <form method="POST" action="{{ route('examination.update.meta') }}">
          @csrf
          <input type="hidden" name="id" value="{{ $id }}">
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Prüfer (Name)</label>
              <input
                type="text"
                class="form-control"
                name="examiner_name"
                value="{{ old('examiner_name', $examination->examiner_name ?? 'Carspector / ') }}"
                placeholder="Prüfername für PDF">
            </div>
            <div class="mb-0">
              <label class="form-label">Auftraggeber (Name)</label>
              <input type="text" class="form-control" name="client_name" value="{{ old('client_name', $examination->client_name ?? '') }}" placeholder="Kundenname für PDF">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
            <button type="submit" class="btn btn-primary">Speichern</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal: Ausstattung Edit -->
  <div class="modal fade" id="ausstattungModal" tabindex="-1" aria-labelledby="ausstattungModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ausstattungModalLabel">Ausstattung bearbeiten</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
        </div>
        <form method="POST" action="{{ route('examination.update.ausstattung') }}">
          @csrf
          <input type="hidden" name="id" value="{{ $id }}">
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Serienausstattung</label>
                <textarea name="serienausstattung" class="form-control" rows="10" placeholder="Serienausstattung eintragen...">{{ old('serienausstattung', $examination->serienausstattung ?? '') }}</textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Sonderausstattung</label>
                <textarea name="sonderausstattung" class="form-control" rows="10" placeholder="Sonderausstattung eintragen...">{{ old('sonderausstattung', $examination->sonderausstattung ?? '') }}</textarea>
              </div>
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
            <button type="submit" class="btn btn-primary">Speichern</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  
@endif
@endsection
@section('scripts')
        <script>
            (function(){
                var $sw = $('#js-show-calcs');
                if ($sw.length) {
                    $sw.on('change', function(){
                        $.ajax({
                            url: '{{ route('order-damages.toggle') }}',
                            method: 'POST',
                            data: { order_id: {{ (int)$id }}, show_in_pdf: $(this).is(':checked') ? 1 : 0 },
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            success: function(){ toastr.success('', 'Gespeichert'); },
                            error: function(){ toastr.error('', 'Konnte nicht speichern'); }
                        });
                    });
                }
            })();
        </script>
@endsection

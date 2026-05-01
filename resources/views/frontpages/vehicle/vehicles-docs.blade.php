@extends('mainpages.examlayout')

@section('title', 'Fahrzeugdokumente')

@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background: #f8fafc; min-height: 100dvh; }
  .card-modern { border: 1px solid rgba(0,0,0,.06); border-radius: var(--radius); overflow: hidden; box-shadow: 0 12px 28px rgba(2,6,23,.06); }
  .card-modern .card-header { background: linear-gradient(180deg,#fff,#f3f4f6); border-bottom: 1px solid #eef2f7; }
  .row-start { padding-top: .5rem; }

  .doc-row { border: 1px solid #e5e7eb; border-radius: 12px; background:#f9fafb; padding: 16px; }
  .doc-title { margin: 0; font-weight: 600; }
  .btn-comment { border:0; background:transparent; padding:0; }
  .hint { color:#6b7280; font-size:.9rem; }
  .hidden { display: none !important; }

  /* Height tuning */
  .select-tall { height: 52px; padding-top: .5rem; padding-bottom: .5rem; }
  .input-compact { height: 52px; padding-top: .25rem; padding-bottom: .25rem; }
  .form-max-650 { max-width: 650px; margin: 0 auto; width: 100%; }
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
          <h1 class="h4 mb-0">Fahrzeugdokumente</h1>
        </div>

        <div class="card-body pt-3">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Bitte prüfen:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <form method="POST" action="{{ route('examination.store') }}" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="vehicle-document">
            <input type="hidden" name="next_url" value="{{ route('examiner.tries', ['id' => $id]) }}">

            @php
              // Für Initial-Visibility der „Serviceheft gepflegt?“-Box
              $serviceTypeVal = old('service_book_type', $examination->service_book_type);
            @endphp

            <div class="row g-3 row-start">
              {{-- Genehmigungen (Dropdown + Textfeld bei "Vorhanden") --}}
              <div class="col-12">
                <div class="doc-row">
                  <p class="doc-title">Genehmigungen</p>
                  @php
                    $permitsVal = old('permits', $examination->permits ?? '');
                  @endphp
                  <select id="permits" name="permits" class="form-select select-tall" data-toggle-target="#permitsDetailsWrap" data-toggle-when="yes">
                    <option value="">-- bitte wählen --</option>
                    <option value="yes" {{ $permitsVal === 'yes' ? 'selected' : '' }}>Vorhanden</option>
                    <option value="no"  {{ $permitsVal === 'no'  ? 'selected' : '' }}>Nicht vorhanden / lag nicht vor</option>
                  </select>
                  <div class="mt-3 {{ $permitsVal==='yes' ? '' : 'hidden' }}" id="permitsDetailsWrap">
                    <label for="permits_details" class="form-label">Welche Genehmigungen?</label>
                    <input type="text" id="permits_details" name="permits_details" class="form-control input-compact" value="{{ old('permits_details', $examination->permits_details) }}" placeholder="z. B. Einzel-/Sondergenehmigung, COC, ABE …">
                  </div>
                </div>
              </div>

              {{-- Fahrzeugschein --}}
              <div class="col-12">
                <div class="doc-row">
                  <p class="doc-title mb-2">Fahrzeugschein</p>
                  @php $val = old('registration_certificate', $examination->registration_certificate); @endphp
                  <select name="registration_certificate" class="form-select select-tall">
                    <option value="">-- bitte wählen --</option>
                    <option value="yes" {{ $val==='yes' ? 'selected' : '' }}>Vorhanden</option>
                    <option value="no"  {{ $val==='no'  ? 'selected' : '' }}>Nicht vorhanden / lag nicht vor</option>
                  </select>
                </div>
              </div>

              {{-- Fahrzeugbrief --}}
              <div class="col-12">
                <div class="doc-row">
                  <p class="doc-title mb-2">Fahrzeugbrief</p>
                  @php $val = old('vehicle_title', $examination->vehicle_title); @endphp
                  <select name="vehicle_title" class="form-select select-tall">
                    <option value="">-- bitte wählen --</option>
                    <option value="yes" {{ $val==='yes' ? 'selected' : '' }}>Vorhanden</option>
                    <option value="no"  {{ $val==='no'  ? 'selected' : '' }}>Nicht vorhanden / lag nicht vor</option>
                  </select>
                </div>
              </div>

              {{-- Bordbuch --}}
              <div class="col-12">
                <div class="doc-row">
                  <p class="doc-title mb-2">Bordbuch</p>
                  @php $val = old('owner_manual', $examination->owner_manual); @endphp
                  <select name="owner_manual" class="form-select select-tall">
                    <option value="">-- bitte wählen --</option>
                    <option value="yes" {{ $val==='yes' ? 'selected' : '' }}>Vorhanden</option>
                    <option value="no"  {{ $val==='no'  ? 'selected' : '' }}>Nicht vorhanden / lag nicht vor</option>
                  </select>
                </div>
              </div>

              {{-- HU/AU Bericht --}}
              <div class="col-12">
                <div class="doc-row">
                  <p class="doc-title mb-2">HU/AU Bericht</p>
                  @php $val = old('hu_au_report', $examination->hu_au_report); @endphp
                  <select name="hu_au_report" class="form-select select-tall">
                    <option value="">-- bitte wählen --</option>
                    <option value="yes" {{ $val==='yes' ? 'selected' : '' }}>Vorhanden</option>
                    <option value="no"  {{ $val==='no'  ? 'selected' : '' }}>Nicht vorhanden / lag nicht vor</option>
                  </select>
                </div>
              </div>

              {{-- Serviceheft (Art) --}}
              <div class="col-12">
                <div class="doc-row">
                  <p class="doc-title mb-2">Serviceheft</p>
                  <select id="service_book_type" name="service_book_type" class="form-select select-tall">
                    <option value="">-- bitte wählen --</option>
                    <option value="paper"   {{ $serviceTypeVal==='paper' ? 'selected' : '' }}>Papier</option>
                    <option value="digital" {{ $serviceTypeVal==='digital' ? 'selected' : '' }}>Digital</option>
                    <option value="none"    {{ $serviceTypeVal==='none' ? 'selected' : '' }}>Nicht vorhanden / lag nicht vor</option>
                  </select>
                </div>
              </div>

              {{-- Serviceheft gepflegt? --}}
              <div class="col-12" id="section_service_maintained" class="{{ $serviceTypeVal==='none' ? 'hidden' : '' }}">
                <div class="doc-row {{ $serviceTypeVal==='none' ? 'hidden' : '' }}">
                  <p class="doc-title mb-2">Serviceheft gepflegt?</p>
                  @php $maintVal = old('service_book_maintained', $examination->service_book_maintained); @endphp
                  <select id="service_book_maintained" name="service_book_maintained" class="form-select select-tall" data-toggle-target="#serviceBookDetailsWrap" data-toggle-when="partial" {{ $serviceTypeVal==='none' ? 'disabled' : '' }}>
                    <option value="">-- bitte wählen --</option>
                    <option value="yes"     {{ $maintVal==='yes' ? 'selected' : '' }}>Ja</option>
                    <option value="no"      {{ $maintVal==='no'  ? 'selected' : '' }}>Nein</option>
                    <option value="partial" {{ $maintVal==='partial' ? 'selected' : '' }}>Teilweise</option>
                  </select>
                  <div class="mt-3 {{ $maintVal==='partial' && $serviceTypeVal!=='none' ? '' : 'hidden' }}" id="serviceBookDetailsWrap">
                    <label for="service_book_details" class="form-label">Details bei "Teilweise"</label>
                    <input type="text" id="service_book_details" name="service_book_details" class="form-control input-compact" value="{{ old('service_book_details', $examination->service_book_details) }}" placeholder="Bitte Details angeben" {{ $serviceTypeVal==='none' ? 'disabled' : '' }}>
                  </div>
                </div>
              </div>

              {{-- Abschnitts-Kommentar (NEU) --}}
              <div class="col-12">
                <div class="doc-row">
                  <p class="doc-title mb-2">Kommentar</p>
                  <textarea name="vehicle_document_overall_comment" rows="4" class="form-control" placeholder="Allgemeine Bemerkungen zu den Unterlagen …">{{ old('vehicle_document_overall_comment', $examination->vehicle_document_overall_comment) }}</textarea>
                </div>
              </div>

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

<!-- Kommentar-Modal -->
<div class="modal fade" id="docCommentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Kommentar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" rows="5" id="docModalCommentInput"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="docModalCommentSave" data-bs-dismiss="modal">Speichern</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  (function(){
    // Dropdown Toggle Logik + Required-Steuerung (z.B. Genehmigungen-Details / Serviceheft „Teilweise“-Details)
    function attachDropdownToggles(){
      document.querySelectorAll('[data-toggle-target]').forEach(function(sel){
        const targetSel = sel.getAttribute('data-toggle-target');
        const whenVal   = sel.getAttribute('data-toggle-when');
        const targetEl  = document.querySelector(targetSel);
        const apply = () => {
          if (!targetEl) return;
          const show = sel.value === whenVal;
          targetEl.classList.toggle('hidden', !show);
          const input = targetEl.querySelector('input, textarea, select');
          if (input) input.required = show; // Pflicht wenn sichtbar
        };
        sel.addEventListener('change', apply);
        apply();
      });
    }

    attachDropdownToggles();

    // --- NEU: Serviceheft (Art) steuert Sichtbarkeit der „Serviceheft gepflegt?“-Box ---
    const typeSel       = document.getElementById('service_book_type');
    const maintainedBox = document.getElementById('section_service_maintained');
    const maintainedSel = document.getElementById('service_book_maintained');
    const detailsWrap   = document.getElementById('serviceBookDetailsWrap');

    function applyServiceBookVisibility(){
      if (!typeSel || !maintainedBox) return;
      const isNone = (typeSel.value === 'none');

      // Sichtbarkeit der gesamten „gepflegt?“-Sektion
      maintainedBox.classList.toggle('hidden', isNone);

      // Alle inneren Inputs (Select/Text) deaktivieren/aktivieren
      maintainedBox.querySelectorAll('input, select, textarea').forEach(function(el){
        el.disabled = isNone;
      });

      if (isNone){
        // Werte zurücksetzen & Details sicher verstecken
        if (maintainedSel) maintainedSel.value = '';
        if (detailsWrap){
          detailsWrap.classList.add('hidden');
          const di = detailsWrap.querySelector('input, textarea, select');
          if (di){ di.value=''; di.required=false; }
        }
      } else {
        // wenn wieder sichtbar, Standard-Required-Logik aus data-toggle-* greift weiterhin
        // optional: apply Dropdown toggles für maintainedSel erneut anstoßen
        if (maintainedSel){
          const event = new Event('change');
          maintainedSel.dispatchEvent(event);
        }
      }
    }

    if (typeSel){
      typeSel.addEventListener('change', applyServiceBookVisibility);
      applyServiceBookVisibility(); // Initial
    }

    // Kommentar-Buttons -> Hidden-Felder (falls vorhanden)
    let activeCommentField = null;
    document.querySelectorAll('.btn-comment').forEach(btn => {
      btn.addEventListener('click', function(){
        activeCommentField = this.getAttribute('data-name');
        const input = document.querySelector(`[name="${activeCommentField}"]`);
        const modalInput = document.getElementById('docModalCommentInput');
        if (modalInput) modalInput.value = input ? (input.value || '') : '';
      });
    });

    const saveBtn = document.getElementById('docModalCommentSave');
    if (saveBtn){
      saveBtn.addEventListener('click', function(){
        if(!activeCommentField) return;
        const input = document.querySelector(`[name="${activeCommentField}"]`);
        const modalInput = document.getElementById('docModalCommentInput');
        if(input && modalInput){ input.value = modalInput.value; }
        activeCommentField = null;
      });
    }
  })();
</script>
@endsection

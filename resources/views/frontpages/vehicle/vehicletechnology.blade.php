@extends('mainpages.examlayout')

@section('title', 'Technik')

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
  .input-compact { height:48px; }
  .link-save-back { color: var(--primary); text-decoration: none; }
</style>

<div class="container-fluid page-bg py-5 py-md-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-9 col-xxl-8 form-max-650">

      {{-- Oben: Speichern & zurück zum Hauptmenü (separates Back-Formular) --}}
      <form method="POST" action="{{ route('examination.store') }}" id="externalConditionForm" class="d-none" novalidate>
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="form" value="save-back">
        <input type="hidden" name="next_url" value="{{ route('examiner.order', ['id' => $id]) }}">
      </form>
      <div class="my-2">
        <button type="button" class="js-save-back fw-semibold d-inline-block py-2 pb-3 link-save-back" style="background: transparent; border: 0;">
          <i class="fa-solid fa-arrow-left me-2"></i> Speichern &amp; zurück zum Hauptmenü
        </button>
      </div>

      <div class="card card-modern">
        <div class="card-header border-0 p-4 pb-4">
          <h1 class="h4 mb-0">Technik</h1>
        </div>

        <div class="card-body pt-3">
          <form method="POST" action="{{ route('examination.store') }}" id="technologyForm" novalidate>
            @csrf
            <input type="hidden" name="form" value="technology">
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="next_url" value="{{ route('examiner.test.drive', ['id' => $id]) }}">

            {{-- Kommentarfelder (werden extern via Modal befüllt) --}}
            <input type="hidden" name="engine_oil_comment" value="{{ $examination->engine_oil_comment }}">
            <input type="hidden" name="break_fluid_comment" value="{{ $examination->break_fluid_comment }}">
            <input type="hidden" name="coolant_comment" value="{{ $examination->coolant_comment }}">
            <input type="hidden" name="general_engine_component_comment" value="{{ $examination->general_engine_component_comment }}">

            @php
              // Auswahl für Flüssigkeiten
              $fluidsOptions = [
                ''                   => '-- bitte wählen --',
                'i.O.'               => 'i.O.',
                'nicht_i.O.'         => 'nicht i.O. / Wechsel fällig',
                'fuellstand_niedrig' => 'Füllstand zu niedrig',
                'nicht_vorhanden' => 'Nicht vorhanden',
              ];
              // Auswahl Motorraum: nur sauber / verschmutzt
              $engineBayOptions = [
                ''           => '-- bitte wählen --',
                'sauber'     => 'Sauber',
                'verschmutzt'=> 'Verschmutzt',
              ];
              $val = fn($name,$default=null)=> old($name, data_get($examination,$name,$default));
            @endphp

            {{-- Motoröl --}}
            <div class="doc-row mb-3">
              <div class="d-flex justify-content-between align-items-start">
                <p class="doc-title">Motoröl</p>

              </div>
              <div class="row g-3 mt-1">
                <div class="col-12 col-md-6">
                  <select name="engine_oil" class="form-select select-tall">
                    @foreach($fluidsOptions as $k=>$label)
                      <option value="{{ $k }}" {{ ($val('engine_oil')===$k) ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            {{-- Bremsflüssigkeit --}}
            <div class="doc-row mb-3">
              <div class="d-flex justify-content-between align-items-start">
                <p class="doc-title">Bremsflüssigkeit</p>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-12 col-md-6">
                  <select name="break_fluid" class="form-select select-tall">
                    @foreach($fluidsOptions as $k=>$label)
                      <option value="{{ $k }}" {{ ($val('break_fluid')===$k) ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            {{-- Kühlflüssigkeit --}}
            <div class="doc-row mb-3">
              <div class="d-flex justify-content-between align-items-start">
                <p class="doc-title">Kühlflüssigkeit</p>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-12 col-md-6">
                  <select name="coolant" class="form-select select-tall">
                    @foreach($fluidsOptions as $k=>$label)
                      <option value="{{ $k }}" {{ ($val('coolant')===$k) ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            {{-- Motorraum Zustand generell (nur sauber/verschmutzt) --}}
            <div class="doc-row mb-3">
              <div class="d-flex justify-content-between align-items-start">
                <p class="doc-title">Motorraum Zustand generell</p>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-12 col-md-6">
                  <select name="general_engine_component" class="form-select select-tall">
                    @foreach($engineBayOptions as $k=>$label)
                      <option value="{{ $k }}" {{ ($val('general_engine_component')===$k) ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            {{-- Nächste Inspektion (nur Textfeld, ohne Placeholder) --}}
            <div class="doc-row mb-3">
            <div class="d-flex justify-content-between align-items-start">
                <p class="doc-title">Nächste Inspektion</p>
            </div>
            <div class="row g-3 mt-1">
                <div class="col-12">
                <label class="form-label">z.B. In 13.000 km oder 12/27</label>
                <input
                    type="text"
                    name="next_inspection"
                    class="form-control input-compact"
                    value="{{ old('next_inspection', $examination->next_inspection) }}"
                    autocomplete="off"
                >
                
                </div>
            </div>
            </div>

            {{-- Nächster Ölwechsel (nur Textfeld, ohne Placeholder) --}}
            <div class="doc-row mb-3">
            <div class="d-flex justify-content-between align-items-start">
                <p class="doc-title">Nächster Ölwechsel</p>
            </div>
            <div class="row g-3 mt-1">
                <div class="col-12">
                <label class="form-label">z.B. In 13.000 km oder 12/27</label>
                <input
                    type="text"
                    name="next_oil_change"
                    class="form-control input-compact"
                    value="{{ old('next_oil_change', $examination->next_oil_change) }}"
                    autocomplete="off"
                >
                
                </div>
            </div>
            </div>




            {{-- Sammel-Kommentar Technik --}}
            <div class="mb-4">
              <label for="technology_overall_comment" class="form-label fw-semibold">Gesamtkommentar Technik</label>
              <textarea name="technology_overall_comment" id="technology_overall_comment" rows="3" class="form-control"
                        placeholder="Allgemeine Bemerkungen…">{{ old('technology_overall_comment', $examination->technology_overall_comment) }}</textarea>
              
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
<div class="modal fade" id="commentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kommentar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
            </div>
            <div class="modal-body">
                <textarea class="form-control comment-text" rows="5" id="commentModalInput"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="commentModalSave" data-bs-dismiss="modal">Speichern</button>
            </div>
        </div>
    </div>
</div>
@endsection

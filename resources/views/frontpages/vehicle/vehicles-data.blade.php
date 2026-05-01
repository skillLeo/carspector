@extends('mainpages.examlayout')

@section('title', 'Fahrzeugdaten')

@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background: #f8fafc; min-height: 100dvh; }
  .card-modern { border: 1px solid rgba(0,0,0,.06); border-radius: var(--radius); overflow: hidden; box-shadow: 0 12px 28px rgba(2,6,23,.06); }
  .card-modern .card-header { background: linear-gradient(180deg,#fff,#f3f4f6); border-bottom: 1px solid #eef2f7; }
  .floating .form-control, .floating .form-select { background: #f9fafb; border: 1px solid #e5e7eb; }
  .floating .form-control:focus, .floating .form-select:focus { border-color: #2563eb; box-shadow: 0 0 0 .2rem rgba(37,99,235,.15); }
  .floating .form-control.is-invalid, .floating .form-select.is-invalid { border-color: #dc2626; }
  .form-floating>label{ z-index:5 }
  .form-floating>.form-control,
  .form-floating>.form-select { padding-top:1.625rem; padding-bottom:.625rem }
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
        <div class="card-header border-0 p-4 pb-3">
          <h1 class="h4 mb-0">Fahrzeugdaten</h1>
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

          <form action="{{ route('examination.store') }}" method="POST" novalidate>
            @csrf
            <input type="hidden" name="form" value="vehicle-data">
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="next_url" value="{{ route('examiner.vehicle.docs', ['id' => $id]) }}">

            <div class="row g-3">
              {{-- Hersteller --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <input type="text" name="manufacturer" id="manufacturer" placeholder="Audi" class="form-control @error('manufacturer') is-invalid @enderror" value="{{ old('manufacturer', $examination->manufacturer) }}" />
                  <label for="manufacturer">Hersteller</label>
                  @error('manufacturer')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Modell --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <input type="text" name="model" id="model" placeholder="A6" class="form-control @error('model') is-invalid @enderror" value="{{ old('model', $examination->model) }}" />
                  <label for="model">Modell</label>
                  @error('model')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Bauart (Dropdown) --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <select name="body_type" id="body_type" class="form-select @error('body_type') is-invalid @enderror">
                    <option value="" disabled {{ old('body_type', $examination->body_type) == '' ? 'selected' : '' }}>-- bitte wählen --</option>
                    <option value="Kleinwagen" {{ old('body_type', $examination->body_type) == 'Kleinwagen' ? 'selected' : '' }}>Kleinwagen</option>
                    <option value="Limousine" {{ old('body_type', $examination->body_type) == 'Limousine' ? 'selected' : '' }}>Limousine</option>
                    <option value="Kombi" {{ old('body_type', $examination->body_type) == 'Kombi' ? 'selected' : '' }}>Kombi</option>
                    <option value="Coupé" {{ old('body_type', $examination->body_type) == 'Coupé' ? 'selected' : '' }}>Coupé</option>
                    <option value="Cabrio" {{ old('body_type', $examination->body_type) == 'Cabrio' ? 'selected' : '' }}>Cabrio</option>
                    <option value="SUV" {{ old('body_type', $examination->body_type) == 'SUV' ? 'selected' : '' }}>SUV</option>
                    <option value="Transporter" {{ old('body_type', $examination->body_type) == 'Transporter' ? 'selected' : '' }}>Transporter</option>
                    <option value="Minivan" {{ old('body_type', $examination->body_type) == 'Minivan' ? 'selected' : '' }}>Minivan</option>
                    <option value="Wohnmobil" {{ old('body_type', $examination->body_type) == 'Wohnmobil' ? 'selected' : '' }}>Wohnmobil</option>
                  </select>
                  <label for="body_type">Bauart</label>
                  @error('body_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>


              {{-- Getriebe (Dropdown) --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <select name="transmission" id="transmission" class="form-select @error('transmission') is-invalid @enderror">
                    <option value="" disabled {{ old('transmission', $examination->transmission) == '' ? 'selected' : '' }}>-- bitte wählen --</option>
                    <option value="Automatik" {{ old('transmission', $examination->transmission) == 'Automatik' ? 'selected' : '' }}>Automatik</option>
                    <option value="Schaltgetriebe" {{ old('transmission', $examination->transmission) == 'Schaltgetriebe' ? 'selected' : '' }}>Schaltgetriebe</option>
                  </select>
                  <label for="transmission">Getriebe</label>
                  @error('transmission')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Erstzulassung --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <input type="text" name="first_registration" id="first_registration" placeholder="03/22" class="form-control @error('first_registration') is-invalid @enderror" value="{{ old('first_registration', $examination->first_registration) }}" />
                  <label for="first_registration">Erstzulassung</label>
                  @error('first_registration')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Kraftstoff (Dropdown) --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <select name="fuel" id="fuel" class="form-select @error('fuel') is-invalid @enderror">
                    <option value="" disabled {{ old('fuel', $examination->fuel) == '' ? 'selected' : '' }}>-- bitte wählen --</option>
                    <option value="Benzin" {{ old('fuel', $examination->fuel) == 'Benzin' ? 'selected' : '' }}>Benzin</option>
                    <option value="Diesel" {{ old('fuel', $examination->fuel) == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                    <option value="Elektro" {{ old('fuel', $examination->fuel) == 'Elektro' ? 'selected' : '' }}>Elektro</option>
                    <option value="Hybrid" {{ old('fuel', $examination->fuel) == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                  </select>
                  <label for="fuel">Kraftstoff</label>
                  @error('fuel')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Farbe --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <input type="text" name="color" id="color" placeholder="Schwarz" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $examination->color) }}" />
                  <label for="color">Farbe</label>
                  @error('color')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Hubraum --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating input-group">
                  <input type="text" name="engine_displacement" id="engine_displacement"
                    placeholder="1.968"
                    class="form-control @error('engine_displacement') is-invalid @enderror"
                    value="{{ old('engine_displacement', $examination->engine_displacement) }}" />
                  <label for="engine_displacement">Hubraum</label>
                  <span class="input-group-text">cm³</span>
                  @error('engine_displacement')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>


              {{-- Anz. Türen (Dropdown) --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <select name="doors" id="doors" class="form-select @error('doors') is-invalid @enderror">
                    <option value="" disabled {{ old('doors', $examination->doors) == '' ? 'selected' : '' }}>-- bitte wählen --</option>
                    <option value="2/3" {{ old('doors', $examination->doors) == '2/3' ? 'selected' : '' }}>2/3</option>
                    <option value="4/5" {{ old('doors', $examination->doors) == '4/5' ? 'selected' : '' }}>4/5</option>
                    <option value="6/7" {{ old('doors', $examination->doors) == '6/7' ? 'selected' : '' }}>6/7</option>
                  </select>
                  <label for="doors">Anz. Türen</label>
                  @error('doors')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>


              {{-- Leistung --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <input type="text" name="power" id="power" placeholder="120 kW (163 PS)" class="form-control @error('power') is-invalid @enderror" value="{{ old('power', $examination->power) }}" />
                  <label for="power">Leistung</label>
                  @error('power')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Nächste HU --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <input type="text" name="next_hu" id="next_hu" placeholder="10/26" class="form-control @error('next_hu') is-invalid @enderror" value="{{ old('next_hu', $examination->next_hu) }}" />
                  <label for="next_hu">Nächste HU</label>
                  @error('next_hu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Km-Stand --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <input type="text" name="km_reading" id="km_reading" placeholder="36.326 km" class="form-control @error('km_reading') is-invalid @enderror" value="{{ old('km_reading', $examination->km_reading) }}" />
                  <label for="km_reading">Km-Stand</label>
                  @error('km_reading')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Schadstoffklasse --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <input type="text" name="emission_class" id="emission_class" placeholder="Euro 6 - Grüne Plakette" class="form-control @error('emission_class') is-invalid @enderror" value="{{ old('emission_class', $examination->emission_class) }}" />
                  <label for="emission_class">Schadstoffklasse</label>
                  @error('emission_class')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- Vorbesitzer --}}
              <div class="col-12 col-md-6">
                <div class="form-floating floating">
                  <input type="number" min="0" step="1" name="previous_owners" id="previous_owners" placeholder="0" class="form-control @error('previous_owners') is-invalid @enderror" value="{{ old('previous_owners', $examination->previous_owners) }}" />
                  <label for="previous_owners">Vorbesitzer (Anzahl)</label>
                  @error('previous_owners')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>

              {{-- FIN --}}
              <div class="col-12">
                <div class="form-floating floating">
                  <input type="text" name="fin" id="fin" placeholder="MUSTER" class="form-control text-uppercase @error('fin') is-invalid @enderror" value="{{ old('fin', $examination->fin) }}" />
                  <label for="fin">Fz-Ident (FIN)</label>
                  @error('fin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
<div class="pt-3 d-grid mb-2">
  <button type="submit" class="btn btn-primary btn-lg">Nächster Abschnitt</button>
</div>

          </form>
        </div>

      </div>

    </div>
  </div>
</div>
@endsection

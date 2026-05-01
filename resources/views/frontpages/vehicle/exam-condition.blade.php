@extends('mainpages.examlayout')

@section('title', 'Prüfungsbedingungen')

@section('content')
<style>
  :root { --radius: 14px; }
  .page-bg { background: #f8fafc; min-height: 100dvh; }
  .card-modern { border: 1px solid rgba(0,0,0,.06); border-radius: var(--radius); overflow: hidden; box-shadow: 0 12px 28px rgba(2,6,23,.06); }
  .card-modern .card-header { background: linear-gradient(180deg,#fff,#f3f4f6); }
  .cond-box { border-radius: 12px; background: #f9fafb; padding: 16px; border: 1px solid #e5e7eb; }
  .btn-comment { border: 0; background: transparent; padding: 0; }
  .btn-primary.btn-lg { border-radius: 12px; }
  .form-help { color:#6b7280; font-size:.9rem; }
  .form-max-650 { max-width: 650px; margin: 0 auto; width: 100%; }
  .select-tall { height: 48px; }
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
        <div class="card-header border-0 p-4">
          <h1 class="h4 mb-0">Prüfungsbedingungen</h1>
        </div>

        <div class="card-body">
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

          <form action="{{ route('examination.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="form" value="examination-condition">
            <input type="hidden" name="type" value="examination">
            <input type="hidden" name="next_url" value="{{ route('examiner.vehicle.data', ['id' => $id, 'keys' => ['vehicle-data']]) }}">


            @php
              $w = old('weather_conditions', $examination->weather_conditions ?? '');
              $l = old('lighting_conditions', $examination->lighting_conditions ?? '');
              $c = old('vehicle_clean', $examination->vehicle_clean ?? '');
              $a = old('vehicle_freely_accessible', $examination->vehicle_freely_accessible ?? '');
            @endphp

            {{-- Wetterbedingungen --}}
            <div class="cond-box mb-4">
              <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0 fw-semibold">Wetterbedingungen</p>
              </div>
              <div class="mt-3">
                <select name="weather_conditions" class="form-select select-tall">
                  <option value="">-- bitte wählen --</option>
                  <option value="sonnig"       {{ $w=='sonnig' ? 'selected' : '' }}>Sonnig</option>
                  <option value="leicht_bewoelkt" {{ $w==='leicht_bewoelkt' ? 'selected' : '' }}>Leicht bewölkt</option>
                  <option value="bewoelkt"     {{ $w=='bewoelkt' ? 'selected' : '' }}>Bewölkt</option>
                  <option value="regen"        {{ $w=='regen' ? 'selected' : '' }}>Regen</option>
                  <option value="starkregen"   {{ $w=='starkregen' ? 'selected' : '' }}>Starkregen</option>
                  <option value="schnee"       {{ $w=='schnee' ? 'selected' : '' }}>Schnee/Glätte</option>
                  <option value="nebel"        {{ $w=='nebel' ? 'selected' : '' }}>Nebel</option>
                  <option value="wind_sturm"   {{ $w=='wind_sturm' ? 'selected' : '' }}>Wind/Sturm</option>
                  <option value="kunstlicht"{{ $l=='kunstlicht' ? 'selected' : '' }}>Neutral (Innenraum / Halle)</option>
                </select>
                <div class="form-help mt-2">Wetterlage zum Prüfzeitpunkt.</div>
              </div>
            </div>

            {{-- Lichtbedingungen --}}
            <div class="cond-box mb-4">
              <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0 fw-semibold">Lichtbedingungen</p>
              </div>
              <div class="mt-3">
                <select name="lighting_conditions" class="form-select select-tall">
                  <option value="">-- bitte wählen --</option>
                  <option value="hell"      {{ $l=='hell' ? 'selected' : '' }}>Hell (Tageslicht)</option>
                  <option value="daemmerung"{{ $l=='daemmerung' ? 'selected' : '' }}>Dämmerung</option>
                  <option value="dunkel"    {{ $l=='dunkel' ? 'selected' : '' }}>Dunkel (Nacht)</option>
                  <option value="kunstlicht"{{ $l=='kunstlicht' ? 'selected' : '' }}>Kunstlicht (Innenraum / Halle)</option>
                </select>
                <div class="form-help mt-2">Helligkeit/Umgebung der Besichtigung.</div>
              </div>
            </div>

            {{-- Fahrzeug sauber? --}}
            <div class="cond-box mb-4">
              <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0 fw-semibold">Fahrzeug sauber?</p>
              </div>
              <div class="mt-3">
                <select name="vehicle_clean" class="form-select select-tall">
                  <option value="">-- bitte wählen --</option>
                  <option value="yes"   {{ $c=='yes' ? 'selected' : '' }}>Ja</option>
                  <option value="no"    {{ $c=='no' ? 'selected' : '' }}>Nein</option>
                  <option value="partial" {{ $c=='partial' ? 'selected' : '' }}>Teilweise</option>
                </select>
                <div class="form-help mt-2">Verschmutzungen können die Begutachtung erschweren.</div>
              </div>
            </div>

            {{-- Fahrzeug frei zugänglich? --}}
            <div class="cond-box mb-4">
              <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0 fw-semibold">Fahrzeug frei zugänglich?</p>
              </div>
              <div class="mt-3">
                <select name="vehicle_freely_accessible" class="form-select select-tall">
                  <option value="">-- bitte wählen --</option>
                  <option value="yes"          {{ $a=='yes' ? 'selected' : '' }}>Ja</option>
                  <option value="no"           {{ $a=='no' ? 'selected' : '' }}>Nein</option>
                  <option value="restricted"   {{ $a=='restricted' ? 'selected' : '' }}>Eingeschränkt (z. B. Garage, enge Zufahrt)</option>
                </select>
                <div class="form-help mt-2">Zugänglichkeit für Rundgang/Prüfungen.</div>
              </div>
            </div>

            {{-- Abschnitts-Kommentar (NEU) --}}
              <div class="pt-1 pb-3 col-12">
                <div class="doc-row">
                  <p class="doc-title mb-2">Kommentar</p>
                  <textarea name="vehicle_exam_condition_comment" rows="4" class="form-control" placeholder="Allgemeine Bemerkungen">{{ old('vehicle_exam_condition_comment', $examination->vehicle_exam_condition_comment) }}</textarea>
                </div>
              </div>

     <div class="d-grid">
  <button type="submit" class="btn btn-primary btn-lg">Nächster Abschnitt</button>
 </div>



          </form>
        </div>

      </div>

    </div>
  </div>
</div>
@endsection

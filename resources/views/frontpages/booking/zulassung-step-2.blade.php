@extends('mainpages.master-layout')
@section('title', 'Carspector | Zulassung Schritt 2')

@section('styles')
    @include('frontpages.booking.partials.zulassung-styles')
    <style>
        .order-wrapper { max-width: 860px; margin: 0 auto; }
    </style>
@endsection

@section('header')
    @include('frontpages.booking.partials.zulassung-header', [
        'currentStep' => 2,
        'steps' => ['Halter', 'Kennzeichen', 'Zahlung']
    ])
@endsection

@section('content')
<div class="container py-4 py-md-5">
    <div class="order-wrapper">
        <form action="{{ route('zulassung.step2.store') }}" method="POST" class="panel">
            @csrf
            <div class="panel-header">
                <div>
                    <h3 class="mb-0">Angaben zum Kennzeichen</h3>
                </div>
                <span class="badge-inline">2/3</span>
            </div>
            <div class="panel-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <p class="mb-1 fw-semibold">Bitte prüfe deine Angaben:</p>
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php
                    $selectedType = old('license_plate_type', $data['license_plate_type'] ?? 'desired');
                    $seasonal = old('seasonal_plate', $data['seasonal_plate'] ?? false);
                    $needsSticker = old('needs_emission_sticker', $data['needs_emission_sticker'] ?? false);
                    $fiveDay = old('five_day_registration', $data['five_day_registration'] ?? false);
                @endphp

                <div class="mb-4">
                    <p class="form-label">Kennzeichenart *</p>
                    <div class="d-flex flex-column gap-3">
                        <label class="type-card {{ $selectedType === 'stva_assigned' ? 'selected' : '' }}">
                            <input class="type-radio" type="radio" name="license_plate_type" value="stva_assigned" {{ $selectedType === 'stva_assigned' ? 'checked' : '' }}>
                            <div class="type-main">
                                <div class="type-icon"><i class="fa-solid fa-building-columns"></i></div>
                                <div>
                                    <div class="type-title">Kennzeichenvergabe durch StVA</div>
                                </div>
                            </div>
                        </label>
                        <label class="type-card {{ $selectedType === 'desired' ? 'selected' : '' }}">
                            <input class="type-radio" type="radio" name="license_plate_type" value="desired" {{ $selectedType === 'desired' ? 'checked' : '' }}>
                            <div class="type-main">
                                <div class="type-icon"><i class="fa-solid fa-star"></i></div>
                                <div>
                                    <div class="type-title">Wunschkennzeichen</div>
                                    <!-- <div class="small-muted">Wir benötigen Kennzeichen &amp; Reservierungs-PIN.</div> -->
                                </div>
                            </div>
                        </label>
                    </div>
                    <x-form-error field="license_plate_type" />
                </div>

                <div id="desiredFields" class="mt-4 {{ $selectedType === 'desired' ? '' : 'd-none' }}">
    <div class="row row-gutter">

        <div class="col-md-6 mt-2">
            <label class="form-label">Gewünschtes Kennzeichen *</label>

            <input 
                type="text"
                name="desired_license_plate"
                id="desired_license_plate"
                class="form-control"
                placeholder="ME AB 123"
                value="{{ old('desired_license_plate', $data['desired_license_plate'] ?? '') }}"
                pattern="[A-Za-z]{1,3}\s?[A-Za-z]{1,2}\s?[0-9]{1,4}"
            >

            <small class="note-muted">
                Format: z.B. ME AB 123
            </small>

            <x-form-error field="desired_license_plate" />
        </div>

        <div class="col-md-6 mt-2">
            <label class="form-label">Reservierungs-PIN *</label>

            <input 
                type="text"
                name="reservation_pin"
                class="form-control"
                placeholder="z.B. 1234"
                value="{{ old('reservation_pin', $data['reservation_pin'] ?? '') }}"
            >

            <small class="mt-1 note-muted">
                Die PIN erhältst du bei der Wunschkennzeichen-Reservierung.
            </small>

            <x-form-error field="reservation_pin" />
        </div>

            </div>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function(){

            const plateInput = document.getElementById("desired_license_plate");

            plateInput.addEventListener("input", function(){

                let value = plateInput.value.toUpperCase();

                value = value.replace(/[^A-Z0-9 ]/g, '');

                plateInput.value = value;

            });

        });
        </script>

                <hr>

                <div class="mt-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="seasonalToggle" name="seasonal_plate" value="1" {{ $seasonal ? 'checked' : '' }}>
                        <label class="form-check-label" for="seasonalToggle">Saisonkennzeichen</label>
                    </div>
                    <div id="seasonalFields" class="row row-gutter mt-3 {{ $seasonal ? '' : 'd-none' }}">
                            <div class="col-md-6 mt-2">
                                <label class="form-label">von Monat *</label>
                                <select name="season_from_month" class="form-select">
                                    <option value="">Bitte wählen</option>
                                    @foreach($months as $key => $label)
                                        <option value="{{ $key }}" @selected(old('season_from_month', $data['season_from_month'] ?? '') === $key)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <x-form-error field="season_from_month" />
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">bis Monat *</label>
                                <select name="season_to_month" class="form-select">
                                    <option value="">Bitte wählen</option>
                                    @foreach($months as $key => $label)
                                        <option value="{{ $key }}" @selected(old('season_to_month', $data['season_to_month'] ?? '') === $key)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <x-form-error field="season_to_month" />
                            </div>
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Spezielle Kennzeichen</label>
                    <select name="special_plate" class="form-select">
                        <option value="">Keine Auswahl</option>
                        @foreach($specialPlateOptions as $option)
                            <option value="{{ $option }}" @selected(old('special_plate', $data['special_plate'] ?? '') === $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                    <x-form-error field="special_plate" />
                </div>


                <div class="mt-3">
    <label class="form-label">eVB-Nummer *</label>
    
    <input
        type="text"
        name="evb_number"
        id="evb_number"
        class="form-control"
        value="{{ old('evb_number', $data['evb_number'] ?? '') }}"
        maxlength="7"
        pattern="[A-Za-z0-9]{7}"
        required
    >

    <p class="note-muted mt-1">
        Deine eVB findest du bei deiner Versicherung oder beantragst sie online.
    </p>

    <small id="evb_error" class="text-danger d-none">
        Bitte gib eine gültige eVB-Nummer mit genau 7 Buchstaben oder Zahlen ein.
    </small>

    <x-form-error field="evb_number" />
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const evbInput = document.getElementById('evb_number');
            const evbError = document.getElementById('evb_error');

            function validateEvb() {
                const value = evbInput.value.trim().toUpperCase();
                evbInput.value = value;

                const evbRegex = /^[A-Z0-9]{7}$/;

                if (value === '') {
                    evbError.classList.add('d-none');
                    evbInput.classList.remove('is-invalid');
                    evbInput.classList.remove('is-valid');
                    return;
                }

                if (evbRegex.test(value)) {
                    evbError.classList.add('d-none');
                    evbInput.classList.remove('is-invalid');
                    evbInput.classList.add('is-valid');
                } else {
                    evbError.classList.remove('d-none');
                    evbInput.classList.add('is-invalid');
                    evbInput.classList.remove('is-valid');
                }
            }

            evbInput.addEventListener('input', validateEvb);
            evbInput.addEventListener('blur', validateEvb);
        });
    </script>

    <style>
.addon .box{
    flex-shrink: 0;
    width: 22px;
    height: 22px;
}
    </style>

                <div class="mt-4 pb-3 d-flex flex-column gap-1">
                    <label class="form-label">Zusatz</label>
                    <label class="addon {{ $needsSticker ? 'selected' : '' }}">
                        <input type="checkbox" name="needs_emission_sticker" value="1" {{ $needsSticker ? 'checked' : '' }}>
                        <span  class="box"><i class="fa-solid fa-check"></i></span>
                        <div>
                            <div class="title">
                                Feinstaub-Plakette 
                                <span style="font-weight:400;">(Umweltplakette für die Windschutzscheibe)</span>
                            </div>
                            <div class="price">+5&nbsp;€</div>
                        </div>
                    </label>
                    <!-- <label class="addon {{ $fiveDay ? 'selected' : '' }}">
                        <input type="checkbox" name="five_day_registration" value="1" {{ $fiveDay ? 'checked' : '' }}>
                        <span class="box"><i class="fa-solid fa-check"></i></span>
                        <div>
                            <div class="title">Kurzzeitkennzeichen (5-Tages-Zulassung)</div>
                            <div class="price">+100&nbsp;€</div>
                        </div>
                    </label> -->
                </div>

                <div class="d-flex flex-wrap justify-content-between gap-3 mt-3">
                    <!-- <a href="{{ route('zulassung.step1.show') }}" class="btn btn-back">Zurück</a> -->
                    <button type="submit" class="btn btn-primary btn-next">Weiter</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        jQuery(function ($) {
            const $typeRadios = $('input[name="license_plate_type"]');
            const $desiredBlock = $('#desiredFields');
            const $seasonalToggle = $('#seasonalToggle');
            const $seasonalFields = $('#seasonalFields');

            const refreshType = () => {
                const isDesired = $typeRadios.filter(':checked').val() === 'desired';
                $desiredBlock.toggleClass('d-none', !isDesired);
                $('.type-card').each(function () {
                    const checked = $(this).find('input').is(':checked');
                    $(this).toggleClass('selected', checked);
                });
            };

            const refreshSeasonal = () => {
                $seasonalFields.toggleClass('d-none', !$seasonalToggle.is(':checked'));
            };

            const refreshAddons = () => {
                $('.addon').each(function () {
                    const checked = $(this).find('input').is(':checked');
                    $(this).toggleClass('selected', checked);
                });
            };

            $typeRadios.on('change', refreshType);
            $seasonalToggle.on('change', refreshSeasonal);
            $('input[name="needs_emission_sticker"], input[name="five_day_registration"]').on('change', refreshAddons);

            refreshType();
            refreshSeasonal();
            refreshAddons();
        });
    </script>
@endsection

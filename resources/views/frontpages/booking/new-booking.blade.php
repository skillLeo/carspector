@extends('mainpages.master-layout')
@section('title', 'Carspector | Neue Buchung')
@section('meta_description', 'Neue Buchung für Zulassung & Kennzeichen – alle Daten auf einer Seite erfassen und per Stripe bezahlen.')

@section('styles')
    @include('frontpages.booking.partials.new-booking-styles')
@endsection

@section('header')
    @include('frontpages.booking.partials.new-booking-header')
@endsection

@section('content')
    <main class="py-4 py-md-5" id="newBookingApp">
        <div class="container booking-grid">
            <section class="col-types">
                <form action="{{ route('new-booking.store') }}" method="POST" class="panel" id="newBookingForm">
                    @csrf
                    <div class="panel-header flex-wrap gap-3">
                        <div>
                            <p class="text-uppercase small text-muted mb-1">Neuer Prozess</p>
                            <h3 class="mb-1">Neue Buchung &amp; Kennzeichenservice</h3>
                            <p class="small-muted mb-0">Alle Schritte wie auf booking-step-1 – nur mit den neuen Feldern und Stripe-Abschluss.</p>
                        </div>
                        <span class="badge-inline">1/1</span>
                    </div>
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-info mb-4">{{ session('status') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger mb-4">
                                <strong>Bitte prüfe die Eingaben:</strong>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="nb-alert">
                            <strong>Hinweis:</strong> Der bestehende Buchungsprozess bleibt bestehen. Diese Seite bildet ausschließlich den neuen Booking-Step in identischem Layout ab.
                        </div>

                        @php
                            $selectedPlateType = old('license_plate_type', 'desired');
                            $seasonalEnabled = old('seasonal_plate') === '1';
                        @endphp

                        <div id="newBookingWizard" class="nb-wizard">
                            <h3>
                                <span class="wizard-step-badge">1</span>
                                <span class="wizard-step-texts">
                                    <span class="wizard-step-title">Customer Data</span>
                                    <span class="wizard-step-subtitle">Vorname, Nachname und Anschrift</span>
                                </span>
                            </h3>
                            <section class="nb-step" data-step="1">
                                <div class="nb-step-card">
                                    <p class="nb-hint mb-3">Trage hier die Angaben der Fahrzeughalterin oder des Fahrzeughalters ein.</p>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="customer_first_name" class="form-label">First name *</label>
                                            <input type="text" class="form-control" id="customer_first_name" name="customer_first_name" value="{{ old('customer_first_name') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="customer_last_name" class="form-label">Last name *</label>
                                            <input type="text" class="form-control" id="customer_last_name" name="customer_last_name" value="{{ old('customer_last_name') }}" required>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="customer_street" class="form-label">Street *</label>
                                            <input type="text" class="form-control" id="customer_street" name="customer_street" value="{{ old('customer_street') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="customer_house_number" class="form-label">House number *</label>
                                            <input type="text" class="form-control" id="customer_house_number" name="customer_house_number" value="{{ old('customer_house_number') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="customer_postal_code" class="form-label">ZIP / Postal code *</label>
                                            <input type="text" class="form-control" id="customer_postal_code" name="customer_postal_code" value="{{ old('customer_postal_code') }}" required>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="customer_city" class="form-label">City *</label>
                                            <input type="text" class="form-control" id="customer_city" name="customer_city" value="{{ old('customer_city') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <h3>
                                <span class="wizard-step-badge">2</span>
                                <span class="wizard-step-texts">
                                    <span class="wizard-step-title">License Plate</span>
                                    <span class="wizard-step-subtitle">Kennzeichenart &amp; Wunschkennzeichen</span>
                                </span>
                            </h3>
                            <section class="nb-step" data-step="2">
                                <div class="nb-step-card">
                                    <p class="nb-hint">Wähle, ob ein Wunschkennzeichen bereits reserviert wurde oder ob wir eines vom Amt erhalten.</p>
                                    <div class="nb-option">
                                        <input class="form-check-input" type="radio" name="license_plate_type" id="plate_desired" value="desired" {{ $selectedPlateType === 'desired' ? 'checked' : '' }}>
                                        <div class="texts">
                                            <h4>Desired license plate</h4>
                                            <p>Wir benötigen das reservierte Kennzeichen inklusive PIN.</p>
                                        </div>
                                    </div>
                                    <div class="nb-option">
                                        <input class="form-check-input" type="radio" name="license_plate_type" id="plate_assigned" value="assigned" {{ $selectedPlateType === 'assigned' ? 'checked' : '' }}>
                                        <div class="texts">
                                            <h4>License plate assigned by registration authority (StVA)</h4>
                                            <p>Wir fordern das Kennzeichen bei der Zulassungsstelle an – keine weiteren Angaben nötig.</p>
                                        </div>
                                    </div>
                                    <div id="desiredPlateFields" class="row g-3 mt-3 {{ $selectedPlateType === 'desired' ? '' : 'nb-hidden' }}">
                                        <div class="col-md-6">
                                            <label for="desired_license_plate" class="form-label">Desired license plate *</label>
                                            <input type="text" class="form-control" id="desired_license_plate" name="desired_license_plate" value="{{ old('desired_license_plate') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="reservation_pin" class="form-label">Reservation PIN *</label>
                                            <input type="text" class="form-control" id="reservation_pin" name="reservation_pin" value="{{ old('reservation_pin') }}">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <h3>
                                <span class="wizard-step-badge">3</span>
                                <span class="wizard-step-texts">
                                    <span class="wizard-step-title">Seasonal License Plate</span>
                                    <span class="wizard-step-subtitle">Zeitraum optional angeben</span>
                                </span>
                            </h3>
                            <section class="nb-step" data-step="3">
                                <div class="nb-step-card">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="seasonalPlate" name="seasonal_plate" value="1" {{ $seasonalEnabled ? 'checked' : '' }}>
                                        <label class="form-check-label" for="seasonalPlate">Seasonal license plate aktivieren</label>
                                    </div>
                                    <div id="seasonalFields" class="row g-3 mt-3 {{ $seasonalEnabled ? '' : 'nb-hidden' }}">
                                        <div class="col-md-6">
                                            <label for="season_from_month" class="form-label">From (month)</label>
                                            <select class="form-select" id="season_from_month" name="season_from_month">
                                                <option value="">Monat wählen</option>
                                                @foreach($months as $key => $label)
                                                    <option value="{{ $key }}" {{ old('season_from_month') === $key ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="season_to_month" class="form-label">To (month)</label>
                                            <select class="form-select" id="season_to_month" name="season_to_month">
                                                <option value="">Monat wählen</option>
                                                @foreach($months as $key => $label)
                                                    <option value="{{ $key }}" {{ old('season_to_month') === $key ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <h3>
                                <span class="wizard-step-badge">4</span>
                                <span class="wizard-step-texts">
                                    <span class="wizard-step-title">Special License Plate</span>
                                    <span class="wizard-step-subtitle">Extras &amp; Stripe Checkout</span>
                                </span>
                            </h3>
                            <section class="nb-step" data-step="4">
                                <div class="nb-step-card">
                                    <label for="special_plate" class="form-label">Auswahl</label>
                                    <select class="form-select" id="special_plate" name="special_plate">
                                        <option value="">Keine spezielle Auswahl</option>
                                        @foreach($specialPlateOptions as $option)
                                            <option value="{{ $option }}" {{ old('special_plate') === $option ? 'selected' : '' }}>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <p class="nb-legend mt-3">Diese Angaben sind optional und werden ausschließlich für den neuen Buchungsprozess gespeichert.</p>
                                    <div class="stripe-badge mt-4">
                                        <i class="fa-brands fa-stripe"></i> SSL-verschlüsselte Zahlung &amp; E-Mail-Bestätigung
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </form>
            </section>

            <aside class="col-summary">
                <div class="panel summary">
                    <div class="panel-header">
                        <h3 class="mb-0">Buchungsübersicht</h3>
                    </div>
                    <div class="panel-body">
                        <p class="small-muted mb-3">Gleiches UI wie booking-step-1 – Fortschritt, Preisbox und CTA bleiben identisch.</p>
                        <ul class="nb-progress">
                            <li class="is-active" data-progress-step="1">
                                <div>
                                    <div class="label">Kundendaten</div>
                                    <div class="meta">Vorname, Nachname, Adresse</div>
                                </div>
                                <i class="fa-solid fa-circle-check"></i>
                            </li>
                            <li data-progress-step="2">
                                <div>
                                    <div class="label">Kennzeichen</div>
                                    <div class="meta">Wunsch oder StVA</div>
                                </div>
                                <i class="fa-solid fa-circle-check"></i>
                            </li>
                            <li data-progress-step="3">
                                <div>
                                    <div class="label">Saison</div>
                                    <div class="meta">Monate optional</div>
                                </div>
                                <i class="fa-solid fa-circle-check"></i>
                            </li>
                            <li data-progress-step="4">
                                <div>
                                    <div class="label">Stripe Checkout</div>
                                    <div class="meta">Spezialkennzeichen + Zahlung</div>
                                </div>
                                <i class="fa-solid fa-circle-check"></i>
                            </li>
                        </ul>

                        <div class="nb-price-box">
                            <p class="text-muted text-uppercase small mb-1">Servicepreis</p>
                            @if($displayPrice)
                                <div class="value">{{ $displayPrice }}</div>
                            @else
                                <div class="value">Stripe Preis-ID</div>
                            @endif
                            <p class="note mb-0">Passe die Price-ID später via Env/Config an – identisch wie bei den bestehenden Steps.</p>
                        </div>
                        <div class="nb-divider"></div>
                        <p class="mb-1 fw-semibold">Support</p>
                        <p class="mb-0 text-muted">Fragen zum neuen Prozess? Nutze dieselben Kanäle wie im klassischen Booking-Step-1.</p>
                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('custom/jquery.steps-lite.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const wizardElement = $('#newBookingWizard');
            if (!wizardElement.length) {
                return;
            }

            const summaryItems = document.querySelectorAll('[data-progress-step]');
            const headerButtons = document.querySelectorAll('[data-header-step]');
            const desiredFields = document.getElementById('desiredPlateFields');
            const desiredInputs = desiredFields ? desiredFields.querySelectorAll('input') : [];
            const seasonalFields = document.getElementById('seasonalFields');
            const seasonalInputs = seasonalFields ? seasonalFields.querySelectorAll('select') : [];
            const plateRadios = document.querySelectorAll('input[name="license_plate_type"]');
            const seasonalToggle = document.getElementById('seasonalPlate');

            const updateStepIndicators = (currentIndex) => {
                const currentStep = currentIndex + 1;
                summaryItems.forEach(item => {
                    const step = Number(item.dataset.progressStep);
                    item.classList.toggle('is-active', step === currentStep);
                    item.classList.toggle('is-complete', step < currentStep);
                });
                headerButtons.forEach(button => {
                    const step = Number(button.dataset.headerStep);
                    button.classList.toggle('current', step === currentStep);
                    button.classList.toggle('is-complete', step < currentStep);
                });
            };

            const jumpToStep = (targetIndex) => {
                const currentIndex = wizardElement.steps('current');
                if (targetIndex <= currentIndex && targetIndex >= 0) {
                    wizardElement.steps('setStep', targetIndex);
                }
            };

            const validateStep = (index) => {
                const section = wizardElement.find('section[data-step="' + (index + 1) + '"]').get(0);
                if (!section) {
                    return true;
                }
                const fields = section.querySelectorAll('input, select, textarea');
                for (const field of fields) {
                    if (field.disabled || field.closest('.nb-hidden')) {
                        continue;
                    }
                    if (!field.checkValidity()) {
                        field.reportValidity();
                        return false;
                    }
                }
                return true;
            };

            const styleWizardActions = () => {
                const finishButton = wizardElement.find('.actions a[href="#finish"]');
                if (finishButton.length) {
                    finishButton.addClass('btn-stripe').html('<i class="fa-brands fa-stripe"></i> Mit Stripe bezahlen');
                }
            };

            wizardElement.steps({
                headerTag: 'h3',
                bodyTag: 'section',
                transitionEffect: 'fade',
                autoFocus: true,
                labels: {
                    next: 'Weiter',
                    previous: 'Zurück',
                    finish: 'Mit Stripe bezahlen'
                },
                onStepChanging: function (event, currentIndex, newIndex) {
                    if (currentIndex < newIndex) {
                        return validateStep(currentIndex);
                    }
                    return true;
                },
                onStepChanged: function (event, currentIndex) {
                    updateStepIndicators(currentIndex);
                    styleWizardActions();
                },
                onFinishing: function (event, currentIndex) {
                    return validateStep(currentIndex);
                },
                onFinished: function () {
                    document.getElementById('newBookingForm').submit();
                }
            });

            styleWizardActions();
            updateStepIndicators(0);

            headerButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetStep = Number(button.dataset.headerStep) - 1;
                    if (!Number.isNaN(targetStep)) {
                        jumpToStep(targetStep);
                    }
                });
            });

            summaryItems.forEach(item => {
                item.tabIndex = 0;
                const go = () => {
                    const targetStep = Number(item.dataset.progressStep) - 1;
                    if (!Number.isNaN(targetStep)) {
                        jumpToStep(targetStep);
                    }
                };
                item.addEventListener('click', go);
                item.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        go();
                    }
                });
            });

            const toggleDesiredFields = () => {
                const selected = document.querySelector('input[name="license_plate_type"]:checked');
                const shouldShow = selected && selected.value === 'desired';
                if (desiredFields) {
                    desiredFields.classList.toggle('nb-hidden', !shouldShow);
                    desiredInputs.forEach(input => {
                        input.required = shouldShow;
                        input.disabled = !shouldShow;
                    });
                }
            };

            const toggleSeasonalFields = () => {
                if (!seasonalFields || !seasonalToggle) {
                    return;
                }
                const shouldShow = seasonalToggle.checked;
                seasonalFields.classList.toggle('nb-hidden', !shouldShow);
                seasonalInputs.forEach(select => {
                    select.required = shouldShow;
                    select.disabled = !shouldShow;
                });
            };

            plateRadios.forEach(radio => radio.addEventListener('change', toggleDesiredFields));
            if (seasonalToggle) {
                seasonalToggle.addEventListener('change', toggleSeasonalFields);
            }

            toggleDesiredFields();
            toggleSeasonalFields();
        });
    </script>
@endsection

@extends('mainpages.master-layout')
@section('title', 'Carspector | Zulassung Schritt 1')

@section('styles')
    @include('frontpages.booking.partials.zulassung-styles')
    <style>
        .order-wrapper { max-width: 860px; margin: 0 auto; }
    </style>
@endsection

@section('header')
    @include('frontpages.booking.partials.zulassung-header', [
        'currentStep' => 1,
        'steps' => ['Halter', 'Kennzeichen', 'Zahlung']
    ])
@endsection

@section('content')
<div class="container py-4 py-md-5">
    <div class="order-wrapper">
        <form action="{{ route('zulassung.step1.store') }}" method="POST" class="panel">
            @csrf
            <div class="panel-header">
                <div>
                    <h3 class="mb-0">Angaben zum Halter</h3>
                </div>
                <span class="badge-inline">1/3</span>
            </div>
            <div class="panel-body">
                @if(session('status'))
                    <div class="alert alert-info">{{ session('status') }}</div>
                @endif
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

                <div class="row row-gutter">
                    <div class="col-md-6  mt-2">
                        <label class="form-label">Vorname *</label>
                        <input type="text" name="customer_first_name" class="form-control" value="{{ old('customer_first_name', $data['customer_first_name'] ?? '') }}" required>
                        <x-form-error field="customer_first_name" />
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="form-label">Nachname *</label>
                        <input type="text" name="customer_last_name" class="form-control" value="{{ old('customer_last_name', $data['customer_last_name'] ?? '') }}" required>
                        <x-form-error field="customer_last_name" />
                    </div>
                    <div class="col-12  mt-2">
                        <label class="form-label">E-Mail *</label>
                        <input type="email" name="customer_email" class="form-control" value="{{ old('customer_email', $data['customer_email'] ?? '') }}" required>
                        <x-form-error field="customer_email" />
                    </div>
                    <div class="col-md-8  mt-2">
                        <label class="form-label">Straße *</label>
                        <input type="text" name="customer_street" class="form-control" value="{{ old('customer_street', $data['customer_street'] ?? '') }}" required>
                        <x-form-error field="customer_street" />
                    </div>
                    <div class="col-md-4  mt-2">
                        <label class="form-label">Hausnummer *</label>
                        <input type="text" name="customer_house_number" class="form-control" value="{{ old('customer_house_number', $data['customer_house_number'] ?? '') }}" required>
                        <x-form-error field="customer_house_number" />
                    </div>
                    <div class="col-md-4  mt-2">
                        <label class="form-label">PLZ *</label>
                        <input type="text" name="customer_postal_code" class="form-control" value="{{ old('customer_postal_code', $data['customer_postal_code'] ?? '') }}" required>
                        <x-form-error field="customer_postal_code" />
                    </div>
                    <div class="col-md-8  mt-2">
                        <label class="form-label">Ort *</label>
                        <input type="text" name="customer_city" class="form-control" value="{{ old('customer_city', $data['customer_city'] ?? '') }}" required>
                        <x-form-error field="customer_city" />
                    </div>
                </div>

                @php
                    $hasDelivery = old('has_delivery_address', $data['has_delivery_address'] ?? false);
                @endphp
                <div class="mt-4">
                    <label class="form-label d-block mb-2">Abweichende Lieferadresse</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="altAddressToggle" name="has_delivery_address" value="1" {{ $hasDelivery ? 'checked' : '' }}>
                        <label class="form-check-label" for="altAddressToggle">Kennzeichen sollen nach Zulassung an eine abweichende Adresse gesendet werden</label>
                    </div>
                    <div id="altAddressFields" class="alt-address mt-3 {{ $hasDelivery ? '' : 'd-none' }}">
                        <div class="row row-gutter">
                            <div class="col-md-6  mt-2">
                                <label class="form-label">Vorname</label>
                                <input type="text" name="delivery_first_name" class="form-control" value="{{ old('delivery_first_name', $data['delivery_first_name'] ?? '') }}">
                                <x-form-error field="delivery_first_name" />
                            </div>
                            <div class="col-md-6  mt-2">
                                <label class="form-label">Nachname</label>
                                <input type="text" name="delivery_last_name" class="form-control" value="{{ old('delivery_last_name', $data['delivery_last_name'] ?? '') }}">
                                <x-form-error field="delivery_last_name" />
                            </div>
                            <div class="col-md-8  mt-2">
                                <label class="form-label">Straße</label>
                                <input type="text" name="delivery_street" class="form-control" value="{{ old('delivery_street', $data['delivery_street'] ?? '') }}">
                                <x-form-error field="delivery_street" />
                            </div>
                            <div class="col-md-4  mt-2">
                                <label class="form-label">Hausnummer</label>
                                <input type="text" name="delivery_house_number" class="form-control" value="{{ old('delivery_house_number', $data['delivery_house_number'] ?? '') }}">
                                <x-form-error field="delivery_house_number" />
                            </div>
                            <div class="col-md-4  mt-2">
                                <label class="form-label">PLZ</label>
                                <input type="text" name="delivery_postal_code" class="form-control" value="{{ old('delivery_postal_code', $data['delivery_postal_code'] ?? '') }}">
                                <x-form-error field="delivery_postal_code" />
                            </div>
                            <div class="col-md-8  mt-2">
                                <label class="form-label">Ort</label>
                                <input type="text" name="delivery_city" class="form-control" value="{{ old('delivery_city', $data['delivery_city'] ?? '') }}">
                                <x-form-error field="delivery_city" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-between gap-3 mt-3">
                    <span></span>
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
            const $toggle = $('#altAddressToggle');
            const $fields = $('#altAddressFields');
            if ($toggle.length && $fields.length) {
                const update = () => $fields.toggleClass('d-none', !$toggle.is(':checked'));
                $toggle.on('change', update);
                update();
            }
        });
    </script>
@endsection

@extends('mainpages.master-layout')
@section('title', 'Carspector | Buchung abgeschlossen - Zulassung')

@section('styles')
    
    <style>
        .success-hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .success-icon {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: linear-gradient(135deg, #16a34a, #0d8a3a);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 35px rgba(15, 118, 110, 0.25);
        }

        .success-icon svg {
            width: 44px;
            height: 44px;
            color: #fff;
        }

        .success-caption {
            font-weight: 600;
            text-transform: uppercase;
            font-size: .9rem;
            letter-spacing: .08em;
            color: #059669;
        }

        .success-note {
            color: #4b5563;
            max-width: 520px;
            margin: 0 auto 1.5rem;
        }

        .success-actions .btn {
            min-width: 200px;
        }
    </style>
@endsection

@section('header')
    @include('partials.index-header')
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @php
                    $monthLabels = $monthLabels ?? [];
                @endphp
                <div class="panel">
                    <div class="panel-header text-center">
                        <h2 style="margin: 0 auto" class="mb-4">Vielen Dank!</h2>
                    </div>
                    <div class="panel-body text-center">
                        <div class="success-hero">
                            <div class="success-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm5 8.59-5.66 5.65a1 1 0 0 1-1.41 0L7 13.32a1 1 0 1 1 1.41-1.41l2.23 2.22 4.95-4.95A1 1 0 0 1 17 10.59Z" />
                                </svg>
                            </div>
                            <span class="success-caption">Zahlung bestätigt</span>
                        </div>
                        <p class="success-note">Wir starten jetzt mit den nächsten Schritten. Alle Unterlagen und Status-Updates erhältst du direkt per E-Mail.</p>
                        <!-- @if($order)
                            <div class="row text-start g-4 mt-4">
                                <div class="col-md-6">
                                    <p class="text-muted text-uppercase small mb-1">Kundendaten</p>
                                    <p class="mb-0 fw-semibold">{{ $order->first_name }} {{ $order->last_name }}</p>
                                    <p class="mb-0">{{ $order->street }} {{ $order->house_number }}</p>
                                    <p class="mb-0">{{ $order->postal_code }} {{ $order->city }}</p>
                                    @if($order->customer_email)
                                        <p class="mb-0">{{ $order->customer_email }}</p>
                                    @endif
                                    @if($order->has_delivery_address)
                                        <p class="text-muted text-uppercase small mt-3 mb-1">Lieferadresse</p>
                                        <p class="mb-0 fw-semibold">{{ $order->delivery_first_name }} {{ $order->delivery_last_name }}</p>
                                        <p class="mb-0">{{ $order->delivery_street }} {{ $order->delivery_house_number }}</p>
                                        <p class="mb-0">{{ $order->delivery_postal_code }} {{ $order->delivery_city }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted text-uppercase small mb-1">Kennzeichen</p>
                                    @php
                                        $licenseLabel = $order->license_plate_type === 'desired' ? 'Wunschkennzeichen' : 'StVA-Zuteilung';
                                    @endphp
                                    <p class="mb-1">Art: {{ $licenseLabel }}</p>
                                    @if($order->license_plate_type === 'desired')
                                        <p class="mb-1">Kennzeichen: {{ $order->desired_license_plate }}</p>
                                        <p class="mb-0">PIN: {{ $order->reservation_pin }}</p>
                                    @endif
                                    @if($order->is_seasonal)
                                        <p class="mt-3 text-muted text-uppercase small mb-1">Saison</p>
                                        <p class="mb-0">Von {{ $monthLabels[$order->season_from_month] ?? $order->season_from_month }} bis {{ $monthLabels[$order->season_to_month] ?? $order->season_to_month }}</p>
                                    @endif
                                    @if($order->special_plate)
                                        <p class="mt-3 text-muted text-uppercase small mb-1">Spezial</p>
                                        <p class="mb-0">{{ $order->special_plate }}</p>
                                    @endif
                                    @if($order->needs_emission_sticker || $order->five_day_registration)
                                        <p class="mt-3 text-muted text-uppercase small mb-1">Optionen</p>
                                        <ul class="mb-0 ps-3">
                                            @if($order->needs_emission_sticker)
                                                <li>Feinstaub-Plakette</li>
                                            @endif
                                            @if($order->five_day_registration)
                                                <li>5-Tages-Zulassung inkl. Versicherung</li>
                                            @endif
                                        </ul>
                                    @endif
                                    @if($order->amount_eur)
                                        <p class="mt-3 text-muted text-uppercase small mb-1">Gesamtbetrag</p>
                                        <p class="fw-semibold mb-0">{{ number_format($order->amount_eur, 2, ',', '.') }} €</p>
                                    @endif
                                </div>
                            </div>
                        @endif -->
                        <!-- <div class="success-actions d-flex flex-wrap gap-3 justify-content-center mt-5">
                            <a href="{{ route('zulassung.step1.show') }}" class="btn btn-primary">Weitere neue Buchung</a>
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary">Zurück zur Startseite</a>
                        </div>
                        <p class="nb-legend mt-4">Der bisherige Buchungsprozess bleibt unverändert aktiv. Diese Seite ergänzt ihn lediglich um den neuen Workflow.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

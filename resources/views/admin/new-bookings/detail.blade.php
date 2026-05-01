@php($months = $months ?? [])
<div class="modal-header">
    <h5 class="modal-title">Neue Buchung #{{ $order->id }}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row g-4">
        <div class="col-md-6">
            <h6 class="fw-semibold mb-1">Kunde</h6>
            <p class="mb-0">{{ trim(($order->first_name ?? '') . ' ' . ($order->last_name ?? '')) ?: '–' }}</p>
            <p class="mb-0 text-muted">{{ trim(($order->street ?? '') . ' ' . ($order->house_number ?? '')) }}</p>
            <p class="mb-0 text-muted">{{ trim(($order->postal_code ?? '') . ' ' . ($order->city ?? '')) }}</p>
        </div>
        <div class="col-md-6">
            <h6 class="fw-semibold mb-1">Systemstatus</h6>
            <p class="mb-0">{{ $order->status ?? '–' }}</p>
            <p class="mb-0 text-muted">Stripe: {{ $order->checkout_status ?? 'offen' }}</p>
            <p class="mb-0 text-muted">Session-ID: {{ $order->checkout_session_id ?: '–' }}</p>
        </div>
        <div class="col-md-6">
            <h6 class="fw-semibold mb-1">Kennzeichen</h6>
            <p class="mb-0">{{ ucfirst(str_replace('_', ' ', $order->license_plate_type ?? '')) ?: 'Nicht gesetzt' }}</p>
            @if($order->license_plate_type === 'desired')
                <p class="mb-0 text-muted">Wunsch: {{ $order->desired_license_plate ?: '–' }}</p>
                <p class="mb-0 text-muted">PIN: {{ $order->reservation_pin ?: '–' }}</p>
            @endif
        </div>
        <div class="col-md-6">
            <h6 class="fw-semibold mb-1">Saisonfenster</h6>
            @if($order->is_seasonal)
                <p class="mb-0">{{ $months[$order->season_from_month] ?? $order->season_from_month }} – {{ $months[$order->season_to_month] ?? $order->season_to_month }}</p>
            @else
                <p class="mb-0 text-muted">Kein Saisonkennzeichen</p>
            @endif
        </div>
        <div class="col-md-6">
            <h6 class="fw-semibold mb-1">Spezialkennzeichen</h6>
            <p class="mb-0">{{ $order->special_plate ?: '–' }}</p>
        </div>
        <div class="col-md-6">
            <h6 class="fw-semibold mb-1">Erstellt</h6>
            <p class="mb-0">{{ optional($order->created_at)->format('d.m.Y H:i') }}</p>
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auftrag {{ $order->orderno ?? ('#'.$order->id) }} — Carspector</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background:#f4f6f9; font-size:15px; }
        .card { border-radius:10px; }
        .header-bar { background:#198754; color:#fff; border-radius:10px 10px 0 0; padding:20px 24px; }
        .info-label { font-weight:600; color:#555; font-size:13px; }
        .info-value { font-size:15px; }
        .section-title { font-size:13px; font-weight:700; text-transform:uppercase; letter-spacing:.05em; color:#6c757d; border-bottom:1px solid #dee2e6; padding-bottom:6px; margin:20px 0 12px; }
    </style>
</head>
<body>
<div class="container py-4" style="max-width:680px;">
    <div class="card shadow-sm">
        <div class="header-bar">
            <div class="d-flex align-items-center gap-3">
                <i class="fas fa-clipboard-check fa-2x opacity-75"></i>
                <div>
                    <h5 class="mb-0">Auftrag {{ $order->orderno ?? ('#'.$order->id) }}</h5>
                    <small class="opacity-75">Hallo {{ $inspector->name }} — hier sind alle Details zu Ihrem Auftrag.</small>
                </div>
            </div>
        </div>

        <div class="card-body px-4 py-3">

            <div class="section-title">Auftragsinformationen</div>
            <div class="row g-3">
                @if($order->order_type)
                <div class="col-6">
                    <div class="info-label">Auftragstyp</div>
                    <div class="info-value">{{ $order->order_type }}</div>
                </div>
                @endif
                @if($order->vehicle_type)
                <div class="col-6">
                    <div class="info-label">Fahrzeugtyp</div>
                    <div class="info-value">{{ $order->vehicle_type }}</div>
                </div>
                @endif
                @if($order->vehicle_make_model || $order->brand)
                <div class="col-6">
                    <div class="info-label">Fahrzeug</div>
                    <div class="info-value">{{ trim(($order->brand ?? '').' '.($order->vehicle_make_model ?? '')) ?: '—' }}</div>
                </div>
                @endif
                @if($order->make_year)
                <div class="col-6">
                    <div class="info-label">Erstzulassung</div>
                    <div class="info-value">{{ $order->make_year }}</div>
                </div>
                @endif
                @if($order->mileage)
                <div class="col-6">
                    <div class="info-label">Kilometerstand</div>
                    <div class="info-value">{{ number_format((int)$order->mileage, 0, ',', '.') }} km</div>
                </div>
                @endif
                @if($order->price)
                <div class="col-6">
                    <div class="info-label">Ihre Vergütung</div>
                    <div class="info-value text-success fw-bold">
                        {{ number_format(max(0, (float)$order->price - ($order->commission ?? 20)), 2, ',', '.') }} €
                    </div>
                </div>
                @endif
            </div>

            @php
                $address = implode(', ', array_filter([
                    $order->inspection_address ?? $order->street ?? '',
                    $order->postal_code ?? '',
                    $order->city ?? '',
                ]));
            @endphp
            @if($address)
            <div class="section-title">Prüfungsort</div>
            <p class="mb-0"><i class="fas fa-map-marker-alt me-2 text-danger"></i>{{ $address }}</p>
            @endif

            <div class="section-title">Kontakt Verkäufer</div>
            <div class="row g-3">
                @if($order->listing_seller_name)
                <div class="col-6">
                    <div class="info-label">Verkäufer</div>
                    <div class="info-value">{{ $order->listing_seller_name }}</div>
                </div>
                @endif
                @if($order->seller_phone || $order->phone)
                <div class="col-6">
                    <div class="info-label">Telefon</div>
                    <div class="info-value">
                        <a href="tel:{{ $order->seller_phone ?: $order->phone }}" class="fw-bold text-primary text-decoration-none fs-5">
                            <i class="fas fa-phone me-1"></i>{{ $order->seller_phone ?: $order->phone }}
                        </a>
                    </div>
                </div>
                @endif
                @if($order->email)
                <div class="col-6">
                    <div class="info-label">E-Mail</div>
                    <div class="info-value"><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></div>
                </div>
                @endif
                @if($order->advertisement_link)
                <div class="col-12">
                    <div class="info-label">Inserat</div>
                    <div class="info-value"><a href="{{ $order->advertisement_link }}" target="_blank" rel="noopener"><i class="fas fa-external-link-alt me-1"></i>Inserat öffnen</a></div>
                </div>
                @endif
            </div>

            @if($order->desc)
            <div class="section-title">Hinweise</div>
            <p class="mb-0">{{ $order->desc }}</p>
            @endif

            <hr class="my-4">
            @if(!empty($examDone) && $examDone)
            <div class="alert alert-success d-flex align-items-center gap-2">
                <i class="fas fa-check-circle fa-lg"></i>
                <div>
                    <strong>Prüfung abgeschlossen.</strong><br>
                    <span style="font-size:14px;">Die Untersuchung wurde übermittelt und wird nun vom Admin geprüft. Vielen Dank!</span>
                </div>
            </div>
            @else
            <div class="d-flex gap-2 flex-wrap">
                <a href="/examiner/order/{{ $order->id }}" class="btn btn-success">
                    <i class="fas fa-play me-2"></i> Prüfung starten
                </a>
                <a href="{{ route('inspector.active-orders') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-home me-1"></i> Meine Aufträge
                </a>
                <a href="{{ route('inspector.login') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-sign-in-alt me-1"></i> Im Portal anmelden
                </a>
            </div>
            @endif
        </div>
    </div>

    <p class="text-center text-muted mt-3" style="font-size:12px;">
        &copy; {{ date('Y') }} Carspector GmbH &mdash; Dieser Link ist 30 Tage gültig.
    </p>
</div>
</body>
</html>

@extends('mainpages.mainadmin')


@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Auftrag {{ $order->display_order_number }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.bookings') }}">Alle Aufträge</a></li>
                <li class="breadcrumb-item active">{{ $order->display_order_number }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @php
        $status = $order->admin_status ?: ($order->status === 'completed' ? 'Completed' : 'New');
        if ($status === 'Abgeschlossen') {
            $status = 'Completed';
        } elseif ($status === 'Pruefung' || str_contains($status, 'fung')) {
            $status = 'Pruefung';
        }
        $statusClasses = [
            'New' => 'badge-secondary',
            'Zuweisung' => 'badge-secondary',
            'Pruefung' => 'badge-info',
            'Prüfung' => 'badge-info',
            'Fertigstellung' => 'badge-warning',
            'Completed' => 'badge-success',
            'Problem' => 'badge-danger',
        ];
        $statusLabels = [
            'New' => 'New',
            'Zuweisung' => 'Zuweisung',
            'Pruefung' => 'Pr&uuml;fung',
            'Fertigstellung' => 'Fertigstellung',
            'Completed' => 'Completed',
            'Problem' => 'Problem',
        ];
        $statusClass = $statusClasses[$status] ?? 'badge-primary';
        $statusLabel = $statusLabels[$status] ?? e($status);
        $customerName = $order->customer_name ?: ($order->user->name ?? $order->name ?? 'No User');
        $examinerEmail = $order->examiner->email ?? '';
    @endphp

    <div class="card mb-4">
        <div class="card-header align-items-center">
            <div>
                <h3 style="padding-right: 15px" class="card-title mb-1">Auftragsdetails</h3>
                <span class="badge {{ $statusClass }}">{!! $statusLabel !!}</span>
            </div>
            <a href="{{ route('admin.bookings') }}" class="btn btn-light btn-sm">Zurück</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="d-flex flex-wrap gap-2 mb-4">
                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit_booking_modal"><i class="fas fa-pen"></i> Auftrag Bearbeiten</button>
                <!-- <button type="button" class="btn btn-sm btn-outline-info" id="btn-open-examiner-email"><i class="fas fa-envelope"></i> Zuweisen</button> -->
                <button type="button" class="btn btn-sm btn-outline-info" id="btn-request-inspectors"
                        data-order-id="{{ $order->id }}">
                    <i class="fas fa-search-location"></i> Gutachter anfragen
                </button>
                @php
                    $inspectorPdfPath = 'reports/' . ($order->pdf_number ?: ('order-'.$order->id)) . '-inspector-original.pdf';
                    $inspectorPdfExists = file_exists(storage_path('app/public/' . $inspectorPdfPath));
                @endphp
                @if($inspectorPdfExists)
                    <a href="{{ asset('storage/' . $inspectorPdfPath) }}" target="_blank" class="btn btn-sm btn-outline-info"><i class="fas fa-file-pdf"></i> PDF org</a>
                @endif
                <a href="{{ route('booking.delete', $order->id) }}" class="btn btn-sm btn-outline-danger js-confirm-delete"
                 data-message="Are you sure you want to delete this booking? This cannot be undone."><i class="fas fa-trash"></i> Auftrag löschen</a>
                <a href="{{ route('examination.delete', $order->id) }}" class="btn btn-sm btn-outline-danger js-confirm-delete" data-message="Delete examination? The booking status will be reset to New."><i class="fas fa-file-excel"></i> Zurücksetzen</a>
                
                <div class="w-100"></div>

                <a href="{{ route('examiner.order', $order->id) }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fas fa-file-alt"></i> Prüfung bearbeiten</a>
                <a href="{{ route('order.pdf', ['number' => $order->pdf_number ?? 1]) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-pdf"></i> PDF DE</a>
                <a href="{{ route('order.pdf.en', ['number' => $order->pdf_number ?? 1]) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-pdf"></i> PDF EN</a>
                <a href="{{ route('send.customer.pdf', ['id' => $order->id]) }}" class="btn btn-sm btn-outline-success js-confirm-send-pdf"><i class="fas fa-paper-plane"></i> PDF senden</a>
            </div>

            <div class="mt-2">
                <div class="card" style="max-width: 400px; border: 1px solid #ccc; box-shadow:none !important">

                    <div class="card-body py-2">
                        <h6 class="pt-2 mb-3" style="font-size:15px;">Inserat PDF</h6>
                        @if($order->listing_pdf_path && file_exists(storage_path('app/public/' . $order->listing_pdf_path)))
                            <div style="background: #e6e6e6; border: 1px solid #ccc" class="alert d-flex justify-content-between align-items-center py-2 px-3 mb-2">
                                <span style="color: black; font-size:13px;">
                                    <i class="fas fa-file-pdf me-1"></i>
                                    Inserat hochgeladen
                                </span>

                                <div class="d-flex gap-1">
                                    <a href="{{ asset('storage/' . $order->listing_pdf_path) }}"
                                    target="_blank"
                                    class="btn btn-sm"
                                    style="color: black; padding:.2rem .5rem;font-size:12px;">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>

                                    <button type="button"
                                            class="btn btn-sm btn-outline-danger js-delete-listing-pdf"
                                            data-order-id="{{ $order->id }}"
                                            style="padding:.2rem .5rem;font-size:12px;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @else
                            <form id="listingPdfForm">
                                @csrf

                                <div class="mb-2">
                                    <input type="file"
                                        id="listingPdfInput"
                                        name="listing_pdf"
                                        class="form-control form-control-sm"
                                        accept=".pdf"
                                        required>

                                    <!-- <small class="text-muted" style="font-size:11px;">
                                        Max. 10MB
                                    </small> -->
                                </div>

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary js-upload-listing-pdf w-100"
                                        data-order-id="{{ $order->id }}"
                                        style="font-size:12px;">
                                    <i class="fas fa-upload me-1"></i>
                                    PDF hochladen
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

                    <div class="mt-4">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#vehicleDetailsForm">
                            <i class="fas fa-pen me-1"></i> Fahrzeug- & Verkäuferdaten bearbeiten
                            @if($order->vehicle_details_confirmed)
                                <span class="badge bg-success ms-1">Bestätigt</span>
                            @else
                                <span class="badge bg-warning text-dark ms-1">Ausstehend</span>
                            @endif
                        </button>
                        <div class="collapse mt-2" id="vehicleDetailsForm">
                            <form action="{{ route('admin.booking.vehicle-details', $order->id) }}" method="POST" class="p-3 border rounded bg-light">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Marke + Modell</label>
                                        <input type="text" name="vehicle_make_model" class="form-control form-control-sm" value="{{ $order->vehicle_make_model }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Erstzulassung</label>
                                        <input type="text" name="make_year" class="form-control form-control-sm" value="{{ $order->make_year }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Kilometerstand</label>
                                        <input type="text" name="mileage" class="form-control form-control-sm" value="{{ $order->mileage }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Verkäufer (Name)</label>
                                        <input type="text" name="listing_seller_name" class="form-control form-control-sm" value="{{ $order->listing_seller_name ?: ($order->b2b_contact_person ?? '') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Verkäufer Adresse</label>
                                        <input type="text" name="listing_seller_address" class="form-control form-control-sm" value="{{ $order->listing_seller_address ?: ($order->b2b_vehicle_location ?? '') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Verkäufer Telefon</label>
                                        <input type="text" name="seller_phone" class="form-control form-control-sm" value="{{ $order->seller_phone ?: ($order->b2b_contact_phone ?? '') }}">
                                    </div>
                                    <div class="col-12 form-check mt-1">
                                        <input type="checkbox" name="private_seller" id="private_seller_check" class="form-check-input" value="1" {{ $order->private_seller ? 'checked' : '' }}>
                                        <label class="form-check-label" for="private_seller_check">Privater Verkäufer</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Speichern</button>
                            </form>
                        </div>
                    </div>

                    <style>
                        @media (min-width: 576px) {
                            dl.row dt,
                            dl.row dd {
                                margin-bottom: .5rem;
                                line-height: 1.4;
                            }
                        }
                    </style>

            <div class="pt-4 row g-4">
                <div class="col-md-6">
                    <h5 class="mb-3">Auftrag</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Auftrags-Nr.</dt><dd class="col-sm-8">{{ $order->display_order_number }}</dd>
                        <dt class="col-sm-4">Auftrags-Typ</dt><dd class="col-sm-8">{{ $order->vehicle_type ?: '-' }}</dd>
                        @if($order->soh_check)
                            <dt class="col-sm-4">SoH</dt><dd class="col-sm-8"><span class="badge bg-info">Aktiv</span></dd>
                        @endif
                        <dt class="col-sm-4">Sprache</dt><dd class="col-sm-8">{{ $order->document_in_english ? 'ENG' : 'DE' }}</dd>
                        <dt class="col-sm-4">Datum</dt><dd class="col-sm-8">{{ $order->admin_order_date ? $order->admin_order_date->format('d.m.Y') : optional($order->created_at)->format('d.m.Y') }}</dd>
                        <dt class="col-sm-4">Status</dt><dd class="col-sm-8"><span class="badge {{ $statusClass }}">{!! $statusLabel !!}</span></dd>
                        @if(auth()->user()->type === 'admin')
                            <dt class="col-sm-4">Termin am</dt>
                            <dd class="col-sm-8">
                                @if($order->appointment_date)
                                    {{ $order->appointment_date->format('d.m.Y') }}@if($order->appointment_time) {{ substr($order->appointment_time, 0, 5) }}@endif
                                @else
                                    -
                                @endif
                            </dd>
                        @endif
                        <dt class="col-sm-4">Abgeschlossen am</dt><dd class="col-sm-8">{{ $order->completed_at ? $order->completed_at->format('d.m.Y') : '-' }}</dd>
                        <dt class="col-sm-4">Bezahlt am</dt><dd class="col-sm-8">
                            @if($order->paid_at_status === 'error') <span class="badge badge-danger">Error</span>
                            @elseif($order->paid_at_status === 'missing') <span class="badge badge-warning">Missing</span>
                            @else {{ $order->paid_at ? $order->paid_at->format('d.m.Y') : '-' }}
                            @endif
                        </dd>
                    </dl>
                    @if(auth()->user()->type === 'admin')
                        <form action="{{ route('admin.booking.appointment', $order->id) }}" method="POST" class="pt-4">
                            @csrf
                            <label class="form-label fw-semibold">Termin setzen</label>
                            <div class="row g-2">
                                <div class="col-sm-7">
                                    <input type="date" name="appointment_date" class="form-control" value="{{ $order->appointment_date ? $order->appointment_date->format('Y-m-d') : '' }}" required>
                                </div>
                                <div class="col-sm-5">
                                    <input type="time" name="appointment_time" class="form-control" value="{{ $order->appointment_time ? substr($order->appointment_time, 0, 5) : '' }}">
                                </div>
                            </div>
                            <div class="mt-3 d-flex gap-2">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Termin speichern
                                </button>

                                @if($order->appointment_date)
                                    <button
                                        type="submit"
                                        name="remove_appointment"
                                        value="1"
                                        class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Termin wirklich entfernen?');">
                                        Termin entfernen
                                    </button>
                                @endif
                            </div>
                        </form>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Kunde</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8">{{ $customerName }}</dd>

                        <dt class="col-sm-4">E-Mail</dt>
                        <dd class="col-sm-8">
                            {{ $order->email ?: '-' }}
                        </dd>

                        <dt class="col-sm-4">Telefon</dt>
                        <dd class="col-sm-8">{{ $order->user->phone ?? '-' }}</dd>
                    </dl>

                    <h5 class="pt-4 mb-3">Prüfer</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8">
                            {{ $order->examiner_name ?: ($order->examiner->name ?? '-') }}
                        </dd>

                        <dt class="col-sm-4">E-Mail</dt>
                        <dd class="col-sm-8">
                            {{ $order->examiner_user_email ?: ($order->examiner->email ?? '-') }}
                        </dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Fahrzeug</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Marke + Modell</dt><dd class="col-sm-8">{{ $order->vehicle_make_model ?: '-' }}</dd>
                        <dt class="col-sm-4">Erstzulassung</dt><dd class="col-sm-8">{{ $order->make_year ?: '-' }}</dd>
                        <dt class="col-sm-4">Kilometerstand</dt><dd class="col-sm-8">{{ $order->mileage ? $order->mileage.' km' : '-' }}</dd>
                        <dt class="col-sm-4">VIN</dt><dd class="col-sm-8">{{ $order->brand ?: '-' }}</dd>
                        <dt class="col-sm-4">Inserat-Link</dt>
                        <dd class="col-sm-8">
                            @if($order->advertisement_link)
                                <a href="{{ $order->advertisement_link }}" target="_blank" style="word-break:break-all;">{{ $order->advertisement_link }}</a>
                            @else - @endif
                        </dd>
                        <!-- <dt class="col-sm-4">Verkäufer</dt><dd class="col-sm-8">{{ $order->listing_seller_name ?: '-' }}{{ $order->private_seller ? ' (privat)' : '' }}</dd>
                        <dt class="col-sm-4">Verkäufer Adresse</dt><dd class="col-sm-8">{{ $order->listing_seller_address ?: '-' }}</dd>
                        <dt class="col-sm-4">Verkäufer Telefon</dt><dd class="col-sm-8">{{ $order->seller_phone ?: '-' }}</dd> -->
                    </dl>

                    {{-- Listing scrape data --}}
                    @if($order->listing_scrape_status)
                        @php $scrapeStatus = $order->listing_scrape_status; @endphp
                        <div class="mt-3 p-3 rounded border {{ $scrapeStatus==='success' ? 'border-success bg-light' : ($scrapeStatus==='partial' ? 'border-warning bg-light' : 'border-danger bg-light') }}" style="font-size:13px;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                @if($scrapeStatus==='success')
                                    <span class="badge bg-success">Inserat automatisch erkannt</span>
                                @elseif($scrapeStatus==='partial')
                                    <span class="badge bg-warning text-dark">Teilweise erkannt - ggf. manuell ergänzen</span>
                                @else
                                    <span class="badge bg-danger">Inserat nicht erkannt - bitte manuell erfassen</span>
                                @endif
                            </div>
                            @if($scrapeStatus !== 'failed')
                            <div class="row g-2">
                                @if($order->listing_image)
                                <div class="col-auto">
                                    <img src="{{ $order->listing_image }}" alt="Fahrzeugbild" style="height:60px;width:90px;object-fit:cover;border-radius:4px;">
                                </div>
                                @endif
                                <div class="col">
                                    <dl class="row mb-0" style="font-size:13px;">
                                        @if($order->listing_seller_name)<dt class="col-sm-5">Verkäufer</dt><dd class="col-sm-7">{{ $order->listing_seller_name }}</dd>@endif
                                        @if($order->listing_seller_address)<dt class="col-sm-5">Adresse</dt><dd class="col-sm-7">{{ $order->listing_seller_address }}</dd>@endif
                                        @if($order->seller_phone)<dt class="col-sm-5">Telefon</dt><dd class="col-sm-7">{{ $order->seller_phone }}</dd>@endif
                                        @if($order->listing_price)<dt class="col-sm-5">Preis</dt><dd class="col-sm-7">{{ $order->listing_price }} €</dd>@endif
                                    </dl>
                                </div>
                            </div>
                            @endif
                        </div>
                    @elseif($order->advertisement_link)
                        <div class="mt-3 p-3 rounded border border-secondary bg-light" style="font-size:13px;">
                            <span class="badge bg-secondary">Inserat nicht gescannt - bitte manuell prüfen</span>
                        </div>
                    @endif

                    {{-- Fahrzeug- & Verkäuferdaten bearbeiten (normalerweise vom Kunden nach Zahlung ausgefüllt) --}}
                    
                </div>
                
                <div class="col-md-6">
                <h5 class="mb-3">Verkäufer / Standort</h5>

                <dl class="row mb-0">
                    <dt class="col-sm-4">Name</dt>
                    <dd class="col-sm-8">
                        {{ $order->listing_seller_name ?: '-' }}
                        {{ $order->private_seller ? ' (privat)' : '' }}
                    </dd>

                    <dt class="col-sm-4">Adresse</dt>
                    <dd class="col-sm-8">
                        {{ $order->listing_seller_address ?: '-' }}
                    </dd>

                    <dt class="col-sm-4">Telefon</dt>
                    <dd class="col-sm-8">
                        {{ $order->seller_phone ?: '-' }}
                    </dd>
                </dl>
            </div>
                <div class="col-12">
                    <h5 class="mb-3">Wünsche an die Prüfung</h5>
                    <div class="p-3 bg-light rounded">{{ $order->desc ?: '-' }}</div>
                </div>

                @if($order->order_source === 'b2b')
                <div class="col-12">
                    <div class="card border-primary mt-2">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="fas fa-building me-2"></i> B2B Order - {{ optional($order->b2bPartner)->company_name ?? 'Partner' }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-5">Partner</dt>
                                        <dd class="col-sm-7">
                                            {{ optional($order->b2bPartner)->company_name ?? '-' }}
                                            @if($order->b2bPartner)
                                                <a href="{{ route('admin.partners.show', $order->b2b_partner_id) }}" class="btn btn-xs btn-outline-primary btn-sm ms-1">View</a>
                                            @endif
                                        </dd>
                                        <dt class="col-sm-5">Partner Email</dt>
                                        <dd class="col-sm-7">{{ optional($order->b2bPartner)->email ?? '-' }}</dd>
                                        <dt class="col-sm-5">VIN / Chassis</dt>
                                        <dd class="col-sm-7"><code>{{ $order->brand ?: '-' }}</code></dd>
                                        <dt class="col-sm-5">Inspection Type</dt>
                                        <dd class="col-sm-7">{{ $order->desc ?: '-' }}</dd>
                                    </dl>
                                </div>
                                <div class="col-md-6">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-5">Location</dt>
                                        <dd class="col-sm-7">{{ $order->b2b_vehicle_location ?: '-' }}</dd>
                                        <dt class="col-sm-5">Contact Person</dt>
                                        <dd class="col-sm-7">{{ $order->b2b_contact_person ?: '-' }}</dd>
                                        <dt class="col-sm-5">Contact Phone</dt>
                                        <dd class="col-sm-7">{{ $order->b2b_contact_phone ?: '-' }}</dd>
                                    </dl>
                                </div>
                                @if($order->b2b_special_notes)
                                <div class="col-12 mt-2">
                                    <strong>Special Notes:</strong>
                                    <div class="p-2 bg-light rounded mt-1" style="white-space:pre-wrap;">{{ $order->b2b_special_notes }}</div>
                                </div>
                                @endif
                                <div class="col-12 mt-2">
                                    <small class="text-muted">
                                        <i class="fas fa-envelope me-1"></i>
                                        Inspection team notified:
                                        @if($order->b2b_order_email_sent_at)
                                            <span class="text-success">{{ $order->b2b_order_email_sent_at->format('d.m.Y H:i') }}</span>
                                        @else
                                            <span class="text-danger">Not sent yet</span>
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
@endsection

{{-- Edit Booking Modal --}}
<div class="modal fade" tabindex="-1" id="edit_booking_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form action="{{ route('admin.booking.store') }}" method="POST" class="modal-content">
            @csrf
            <input type="hidden" name="id" value="{{ $order->id }}">
            <div class="modal-header">
                <h3 class="modal-title">Edit Booking</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Datum</label>
                        <input type="date" name="admin_order_date" class="form-control" value="{{ $order->admin_order_date ? $order->admin_order_date->format('Y-m-d') : '' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="admin_status" class="form-select">
                            @foreach(['New','Zuweisung','Pruefung','Fertigstellung','Completed','Problem'] as $s)
                                <option value="{{ $s }}" {{ ($order->admin_status === $s || ($s === 'Pruefung' && $order->admin_status === 'Prüfung')) ? 'selected' : '' }}>{{ $s === 'Pruefung' ? 'Prüfung' : $s }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kunde</label>
                        <input type="text" name="customer_name" class="form-control" value="{{ $order->customer_name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Gutachter</label>
                        <input type="text" name="examiner_name" class="form-control" value="{{ $order->examiner_name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">E-Mail</label>
                        <input type="text" name="email" class="form-control" value="{{ $order->email }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Telefon</label>
                        <input type="text" name="phone" class="form-control" value="{{ $order->phone }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Fahrzeug</label>
                        <input type="text" name="vehicle_make_model" class="form-control" value="{{ $order->vehicle_make_model }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Fahrzeugtyp</label>
                        @php
                        $eb_vehicle_types = ['Auto/ PKW XL','Auto/ PKW XXL','Transporter XL','Transporter XXL','Oldtimer XL','Oldtimer XXL','Sportwagen XL','Sportwagen XXL','Elektro XL','Elektro XXL','Wohnmobil XL','Wohnmobil XXL','Sonstiges-Check','Kaufbegleitung XL','Kaufbegleitung XXL'];
                        @endphp
                        <select name="vehicle_type" class="form-select">
                            <option value="{{ $order->vehicle_type }}" selected>{{ $order->vehicle_type ?: 'Select type' }}</option>
                            @foreach($eb_vehicle_types as $vt)
                                @if($vt !== $order->vehicle_type)
                                    <option value="{{ $vt }}">{{ $vt }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Preis</label>
                        <input type="text" name="price" class="form-control" value="{{ $order->price }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Inserat-Link</label>
                        <input type="text" name="advertisement_link" class="form-control" value="{{ $order->advertisement_link }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Adresse</label>
                        <input type="text" name="address" class="form-control" value="{{ $order->street }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Stadt</label>
                        <input type="text" name="city" class="form-control" value="{{ $order->city }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Abschluss am</label>
                        <input type="date" name="completed_at" class="form-control" value="{{ $order->completed_at ? $order->completed_at->format('Y-m-d') : '' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Bezahlt am</label>
                        <input type="hidden" name="paid_at_status" id="eb_paid_at_status" value="{{ $order->paid_at_status ?? '' }}">
                        <div class="input-group">
                            <input type="date" name="paid_at" id="eb_paid_at_input" class="form-control {{ in_array($order->paid_at_status ?? '', ['error','missing']) ? 'd-none' : '' }}" value="{{ $order->paid_at ? $order->paid_at->format('Y-m-d') : '' }}">
                            <span id="eb_paid_at_text" class="form-control {{ !in_array($order->paid_at_status ?? '', ['error','missing']) ? 'd-none' : '' }}" style="background:#f8f9fa; text-transform:capitalize;">{{ $order->paid_at_status ?? '' }}</span>
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item eb-paid-mode" href="#" data-mode="">Datum</a></li>
                                <li><a class="dropdown-item eb-paid-mode" href="#" data-mode="error">Error</a></li>
                                <li><a class="dropdown-item eb-paid-mode" href="#" data-mode="missing">Missing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Wünsche</label>
                        <textarea name="desc" class="form-control" rows="3">{{ $order->desc }}</textarea>
                    </div>
                    <div class="col-12 d-flex gap-4 flex-wrap">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="negotiation_checklist" value="1" id="eb_neg" {{ $order->negotiation_checklist ? 'checked' : '' }}>
                            <label class="form-check-label" for="eb_neg">Verhandlungs-Checkliste</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="document_in_english" value="1" id="eb_eng" {{ $order->document_in_english ? 'checked' : '' }}>
                            <label class="form-check-label" for="eb_eng">Dokumente auf Englisch</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="pdf_with_partner_logo" value="1" id="eb_partner_logo" {{ $order->pdf_with_partner_logo ? 'checked' : '' }}>
                            <label class="form-check-label" for="eb_partner_logo">PDF with partner logo</label>
                        </div>
                    </div>
                    <div class="col-12 {{ $order->pdf_with_partner_logo ? '' : 'd-none' }}" id="eb_partner_logo_wrapper">
                        @if(($partnerLogos ?? collect())->isEmpty())
                            <div class="text-muted small">No partner logos available.</div>
                        @else
                            <label class="form-label fw-semibold">Select partner logo</label>
                            <select name="partner_logo_id" class="form-select form-select-sm">
                                <option value="">Choose partner</option>
                                @foreach($partnerLogos ?? collect() as $logo)
                                    <option value="{{ $logo->id }}" {{ (string)($order->partner_logo_id) === (string)$logo->id ? 'selected' : '' }}>{{ $logo->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                <button type="submit" class="btn btn-primary">Speichern</button>
            </div>
        </form>
    </div>
</div>

{{-- Email Examiner Modal --}}
<div class="modal fade" tabindex="-1" id="email_examiner_detail" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Auftragsvergabe</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label class="form-label fw-semibold">E-Mail</label>
                    <input type="email" class="form-control" id="det_examiner_email" placeholder="name@example.com">
                </div>
                <div class="mb-4 form-check">
                    <input class="form-check-input" type="checkbox" id="det_use_tuv_email">
                    <label class="form-check-label fw-semibold" for="det_use_tuv_email">TÜV (tsw@de.tuv.com)</label>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Betreff</label>
                    <input type="text" class="form-control" id="det_examiner_subject" placeholder="CarCheck | ">
                </div>
                <div class="mb-4 pt-2 border-top">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kunde</label>
                            <input type="text" class="form-control" id="det_customer_name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Auftrags-Nr.</label>
                            <input type="text" class="form-control" id="det_booking_code">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Fahrzeug</label>
                            <input type="text" class="form-control" id="det_car_model">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Verkäufer (Name)</label>
                            <input type="text" class="form-control" id="det_seller_name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Verkäufer Adresse</label>
                            <input type="text" class="form-control" id="det_seller_address">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Verkäufer Tel.</label>
                            <input type="text" class="form-control" id="det_seller_phone">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Inserat-Link</label>
                            <input type="text" class="form-control" id="det_listing_link">
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-label fw-semibold">E-Mail Nachricht</label>
                    <textarea class="form-control" id="det_examiner_message" rows="6"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                <button type="button" class="btn btn-primary" id="det_send_examiner_btn">
                    <span class="btn-label">E-Mail senden</span>
                </button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
    // Partner logo toggle in edit modal
    document.getElementById('eb_partner_logo').addEventListener('change', function() {
        document.getElementById('eb_partner_logo_wrapper').classList.toggle('d-none', !this.checked);
    });

    // Bezahlt am mode switcher
    document.querySelectorAll('.eb-paid-mode').forEach(function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();
            var mode = this.dataset.mode;
            var dateInput = document.getElementById('eb_paid_at_input');
            var textSpan  = document.getElementById('eb_paid_at_text');
            var statusInput = document.getElementById('eb_paid_at_status');
            if (mode === 'error' || mode === 'missing') {
                dateInput.classList.add('d-none');
                textSpan.textContent = mode.charAt(0).toUpperCase() + mode.slice(1);
                textSpan.classList.remove('d-none');
                statusInput.value = mode;
                dateInput.value = '';
            } else {
                textSpan.classList.add('d-none');
                dateInput.classList.remove('d-none');
                statusInput.value = '';
            }
        });
    });

    // Confirmation for delete actions
    document.querySelectorAll('.js-confirm-delete').forEach(function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();
            var href = this.getAttribute('href');
            var msg  = this.dataset.message || 'Are you sure?';
            Swal.fire({
                text: msg,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, proceed',
                cancelButtonText: 'Cancel',
                buttonsStyling: false,
                customClass: { confirmButton: 'btn btn-danger me-2', cancelButton: 'btn btn-light' }
            }).then(function(res) {
                if (res.isConfirmed) window.location = href;
            });
        });
    });

    @php
        $isB2B = $order->order_source === 'b2b';
    @endphp

    // Confirmation for Send PDF
    var sendPdfBtn = document.querySelector('.js-confirm-send-pdf');
    if (sendPdfBtn) {
        sendPdfBtn.addEventListener('click', function(e) {
            e.preventDefault();
            var href = this.getAttribute('href');
            Swal.fire({
                title: 'Send PDF to customer?',
                html:
                    '<div class="d-flex flex-column align-items-center gap-3 mt-2">' +

                        '<div class="d-flex align-items-center gap-4">' +
                            '<input class="form-check-input mt-0" type="checkbox" id="swal-no-upsell-detail" {{ $isB2B ? "checked" : "" }}>' +
                            '<label style="padding-left: 7px" class="form-check-label mb-0" for="swal-no-upsell-detail">Partner</label>' +
                        '</div>' +

                        '<div class="d-flex align-items-center gap-4">' +
                            '<input class="form-check-input mt-0" type="checkbox" id="swal-sent-review-detail">' +
                            '<label style="padding-left: 7px" class="form-check-label mb-0" for="swal-sent-review-detail">Bewertung</label>' +
                        '</div>' +

                    '</div>',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, send',
                cancelButtonText: 'Cancel',
                buttonsStyling: false,
                customClass: { confirmButton: 'btn btn-primary me-2', cancelButton: 'btn btn-light' }
            }).then(function(res) {
                if (!res.isConfirmed) return;
                var url = new URL(href, window.location.origin);
                if (document.getElementById('swal-no-upsell-detail').checked) url.searchParams.set('no_upsell', '1');
                if (document.getElementById('swal-sent-review-detail').checked) url.searchParams.set('sent_review', '1');
                window.location = url.pathname + url.search;
            });
        });
    }

    // Email Examiner Modal
    (function () {
        var PREFIX = 'CarCheck | ';
        var examinerEmailRoute = '{{ route('admin.examiner.email') }}';

        var subjectInput = document.getElementById('det_examiner_subject');
        var bookingCodeInput = document.getElementById('det_booking_code');

        function ensurePrefix() {
            if (subjectInput && !subjectInput.value.startsWith(PREFIX)) {
                subjectInput.value = PREFIX + subjectInput.value.replace(/^CarCheck\s*\|\s*/i, '');
            }
        }

        // TÜV checkbox
        document.getElementById('det_use_tuv_email').addEventListener('change', function () {
            var emailInput = document.getElementById('det_examiner_email');
            if (this.checked) { emailInput.dataset.prev = emailInput.value; emailInput.value = 'tsw@de.tuv.com'; }
            else { emailInput.value = emailInput.dataset.prev || ''; }
        });

        // Booking code → subject
        if (bookingCodeInput) {
            bookingCodeInput.addEventListener('input', function () {
                ensurePrefix();
                if (subjectInput) subjectInput.value = PREFIX + (this.value || '');
            });
        }

        // Open modal and pre-fill
        document.getElementById('btn-open-examiner-email').addEventListener('click', function () {
    var customerName   = '{{ addslashes($order->customer_name ?: ($order->user->name ?? '')) }}';
    var bookingCode    = '{{ addslashes($order->display_order_number) }}';
    var carModel       = '{{ addslashes($order->vehicle_make_model ?: '') }}';
    var sellerName     = '{{ addslashes($order->seller_name ?: '') }}';
    var sellerAddress  = '{{ addslashes($order->street ?: '') }}';
    var sellerPhone    = '{{ addslashes($order->seller_phone ?: $order->phone ?: '') }}';
    var sellerPhone2   = '{{ addslashes($order->seller_phone_secondary ?: '') }}';
    var listingLink    = '{{ addslashes($order->advertisement_link ?: '') }}';

    document.getElementById('det_examiner_email').value = '{{ $examinerEmail }}';
    document.getElementById('det_customer_name').value  = customerName;
    document.getElementById('det_booking_code').value   = bookingCode;
    document.getElementById('det_car_model').value      = carModel;
    document.getElementById('det_seller_name').value    = sellerName;
    document.getElementById('det_seller_address').value = sellerAddress;
    document.getElementById('det_seller_phone').value   = sellerPhone;
    document.getElementById('det_listing_link').value   = listingLink;

    ensurePrefix();

    if (subjectInput) {
        subjectInput.value = PREFIX + bookingCode;
    }

    // Verkäufer-Kontakte zusammenführen
    var contact = sellerPhone;
    if (sellerPhone2) {
        contact += ', ' + sellerPhone2;
    }

    // E-Mail Body erzeugen
    var body = '';
    body += 'Sehr geehrte Damen und Herren,\n';
    body += 'wir haben einen Auftrag für einen CarCheck.\n\n';

    body += 'Auftrags-Nr: ' + bookingCode + '\n';
    body += 'Unser Kunde als Referenz (Auftraggeber): ' + customerName + '\n\n';

    if (carModel) {
        body += 'Fahrzeug: ' + carModel + '\n';
    }

    if (listingLink) {
        body += 'Online-Inserat: ' + listingLink + '\n\n';
    }

    if (sellerName) {
        body += 'Verkäufer: ' + sellerName + '\n';
    }

    if (sellerAddress) {
        body += 'Standort: ' + sellerAddress + '\n';
    }

    if (contact) {
        body += 'Kontakt: ' + contact + '\n\n';
    }

    body += 'Bei Fragen oder Updates können Sie gerne direkt auf diese E-Mail antworten oder uns unter partner@carspector.de kontaktieren.\n\n';
    body += 'Mit freundlichen Grüßen\n';
    body += 'Ihr Team von Carspector';

    document.getElementById('det_examiner_message').value = body;

    bootstrap.Modal
        .getOrCreateInstance(document.getElementById('email_examiner_detail'))
        .show();
});

        // Send button
        document.getElementById('det_send_examiner_btn').addEventListener('click', function () {
            var btn = this;
            var email = document.getElementById('det_examiner_email').value;
            var subject = document.getElementById('det_examiner_subject').value;
            var message = document.getElementById('det_examiner_message').value;
            if (!email) { alert('Bitte eine E-Mail angeben.'); return; }
            if (!subject) { alert('Bitte einen Betreff eingeben.'); return; }
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Senden...';
            fetch(examinerEmailRoute, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                body: JSON.stringify({
                    order_id: {{ $order->id }},
                    email: email,
                    subject: subject,
                    message: message,
                    manual_customer_name: document.getElementById('det_customer_name').value,
                    manual_booking_code: document.getElementById('det_booking_code').value,
                    manual_car_model: document.getElementById('det_car_model').value,
                    manual_seller_name: document.getElementById('det_seller_name').value,
                    manual_seller_address: document.getElementById('det_seller_address').value,
                    manual_seller_phone: document.getElementById('det_seller_phone').value,
                    manual_listing_link: document.getElementById('det_listing_link').value,
                })
            })
            .then(function(r){ return r.json(); })
            .then(function(data){
                bootstrap.Modal.getOrCreateInstance(document.getElementById('email_examiner_detail')).hide();
                toastr.success(data.message || 'E-Mail wurde versendet.');
            })
            .catch(function(){ toastr.error('Fehler beim Senden.'); })
            .finally(function(){ btn.disabled = false; btn.innerHTML = 'E-Mail senden'; });
        });
    })();
</script>


{{-- ─── Inspector Request Modal ──────────────────────────────────────────── --}}
<div class="modal fade" id="inspectorRequestModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-search-location me-2 text-warning"></i> Gutachter anfragen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="insp-loading" class="text-center py-4">
                    <span class="spinner-border text-primary"></span>
                    <p class="text-muted mt-2 mb-0">Passende Gutachter werden gesucht…</p>
                </div>
                <div id="insp-content" style="display:none;">
                    {{-- Status panel: shows existing request statuses --}}
                    <div id="insp-status-panel" class="mb-3" style="display:none;">
                        <label class="form-label fw-semibold text-muted" style="font-size:12px;text-transform:uppercase;letter-spacing:.05em;">Bisherige Anfragen</label>
                        <div id="insp-status-list"></div>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Neue Anfrage senden an</label>
                        <div id="insp-list" class="border rounded p-2 mb-2" style="max-height:180px;overflow-y:auto;"></div>
                        <div class="d-flex gap-2 mt-1 mb-2">
                            <select id="insp-extra-select" class="form-select form-select-sm" style="flex:1;"></select>
                            <button class="btn btn-sm btn-outline-secondary" id="insp-extra-add"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="email" id="insp-custom-email" class="form-control form-control-sm" placeholder="Beliebige E-Mail eingeben…">
                            <button class="btn btn-sm btn-outline-primary" id="insp-custom-add"><i class="fas fa-envelope-plus"></i> Hinzufügen</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="https://www.google.com/maps/d/u/0/edit?mid=1wqQCP_XCht7GbcCD-K5CfKmZdd1eWss&ll=53.61339069490858%2C9.868879199999983&z=11"
                        target="_blank"
                        class="btn btn-outline-primary">
                            <i class="fas fa-map-marked-alt me-1"></i>
                            MyMaps öffnen
                        </a>
                    </div>
                    <div class="pt-3 mb-3">
                        <label class="form-label fw-semibold">E-Mail-Text</label>
                        <textarea id="insp-email-body" class="form-control" rows="15"></textarea>
                    </div>
                </div>
                <div id="insp-error" class="alert alert-danger" style="display:none;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                <button type="button" class="btn btn-warning fw-semibold" id="insp-send-btn" style="display:none;">
                    <i class="fas fa-paper-plane me-1"></i> Anfrage senden
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Assignment Email Preview Modal --}}
<div class="modal fade" id="assignEmailPreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-envelope-open-text me-2 text-success"></i> Vorschau: Zuteilungs-E-Mail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div id="assign-preview-loading" class="text-center py-4">
                    <span class="spinner-border text-primary"></span>
                </div>
                <iframe id="assign-preview-frame" style="width:100%;height:60vh;border:0;display:none;"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    var orderId    = {{ $order->id }};
    var previewUrl = '{{ route('admin.inspector.request.preview', $order->id) }}';
    var sendUrl    = '{{ route('admin.inspector.request.send', $order->id) }}';
    var assignUrl  = '{{ route('admin.inspector.assign', $order->id) }}';
    var assignPreviewUrl = '{{ route('admin.inspector.assign.preview', $order->id) }}';
    var csrf       = document.querySelector('meta[name="csrf-token"]').content;
    var badgesMap  = { accepted: 'bg-success', pending: 'bg-warning text-dark', declined: 'bg-danger' };
    var labelsMap  = { accepted: 'Angenommen', pending: 'Ausstehend', declined: 'Abgelehnt' };

    function makeBadge(status) {
        var b = document.createElement('span');
        b.className = 'badge ms-1 ' + (badgesMap[status] || 'bg-secondary');
        b.textContent = labelsMap[status] || status;
        return b;
    }

    function makeAssignButton(label, payload, checkboxElement) {
        var btn = document.createElement('button');
        btn.className = 'btn btn-sm btn-success py-0 px-2';
        btn.textContent = 'Zuweisen & E-Mail senden';
        btn.addEventListener('click', function () {
            if (!confirm(label + ' zuweisen und Zuteilungs-E-Mail senden?')) return;
            btn.disabled = true; btn.textContent = '…';
            var markAuto = checkboxElement && checkboxElement.checked ? true : false;
            var fullPayload = Object.assign({}, payload, { mark_for_auto_assign: markAuto });
            fetch(assignUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                body: JSON.stringify(fullPayload),
            })
            .then(function(r){ return r.json(); })
            .then(function(d){
                bootstrap.Modal.getOrCreateInstance(document.getElementById('inspectorRequestModal')).hide();
                toastr.success(d.message || 'Zugewiesen!');
            })
            .catch(function(){ toastr.error('Fehler beim Zuweisen.'); })
            .finally(function(){ btn.disabled = false; btn.textContent = 'Zuweisen & E-Mail senden'; });
        });
        return btn;
    }

    function makePreviewButton(payload) {
        var btn = document.createElement('button');
        btn.className = 'btn btn-sm btn-outline-secondary py-0 px-2';
        btn.innerHTML = '<i class="fas fa-eye"></i> Vorschau';
        btn.addEventListener('click', function () {
            var modal = new bootstrap.Modal(document.getElementById('assignEmailPreviewModal'));
            var loading = document.getElementById('assign-preview-loading');
            var frame   = document.getElementById('assign-preview-frame');
            loading.style.display = '';
            frame.style.display   = 'none';
            modal.show();

            var qs = Object.keys(payload).map(function(k){ return k + '=' + encodeURIComponent(payload[k]); }).join('&');
            fetch(assignPreviewUrl + '?' + qs, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(function(r){ return r.json(); })
                .then(function(data) {
                    frame.srcdoc = data.html;
                    loading.style.display = 'none';
                    frame.style.display   = '';
                })
                .catch(function() {
                    loading.style.display = 'none';
                    toastr.error('Vorschau konnte nicht geladen werden.');
                });
        });
        return btn;
    }

    var selectedInspectors = [];
    var allInspectors      = [];

    function renderInspectorList() {
        var container = document.getElementById('insp-list');
        while (container.firstChild) { container.removeChild(container.firstChild); }
        if (selectedInspectors.length === 0) {
            var msg = document.createElement('span');
            msg.className   = 'text-muted';
            msg.style.fontSize = '13px';
            msg.textContent = 'Keine Inspektoren ausgewählt.';
            container.appendChild(msg);
            return;
        }
        selectedInspectors.forEach(function (inspector) {
            var row = document.createElement('div');
            row.className = 'd-flex align-items-center justify-content-between py-1 border-bottom gap-2';

            var label = document.createElement('span');
            var icon  = document.createElement('i');
            icon.className = 'fas fa-user-circle me-2 text-muted';
            var strong = document.createElement('strong');
            strong.textContent = inspector.name || inspector.email;
            var emailSpan = document.createElement('span');
            emailSpan.className = 'text-muted';
            emailSpan.textContent = inspector.name ? (' <' + inspector.email + '>') : '';
            label.appendChild(icon);
            label.appendChild(strong);
            label.appendChild(emailSpan);

            var checkboxDiv = document.createElement('div');
            checkboxDiv.className = 'form-check form-check-inline ms-2';
            var checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.className = 'form-check-input';
            checkbox.id = 'auto_assign_select_' + (inspector.id || inspector.email.replace(/[^a-z0-9]/gi, '_'));
            checkbox.setAttribute('data-inspector-key', inspector.id || inspector.email);
            var checkboxLabel = document.createElement('label');
            checkboxLabel.className = 'form-check-label';
            checkboxLabel.setAttribute('for', 'auto_assign_select_' + (inspector.id || inspector.email.replace(/[^a-z0-9]/gi, '_')));
            checkboxLabel.style.fontSize = '12px';
            checkboxLabel.textContent = 'Auto';
            checkboxDiv.appendChild(checkbox);
            checkboxDiv.appendChild(checkboxLabel);
            inspector._autoAssignCheckbox = checkbox;

            var removeBtn = document.createElement('button');
            removeBtn.className = 'btn btn-sm btn-outline-danger py-0 px-1';
            var removeIcon = document.createElement('i');
            removeIcon.className = 'fas fa-times';
            removeBtn.appendChild(removeIcon);
            (function(key){ removeBtn.addEventListener('click', function () {
                selectedInspectors = selectedInspectors.filter(function(x){ return (x.id || x.email) !== key; });
                renderInspectorList();
                updateExtraSelect();
            }); })(inspector.id || inspector.email);

            row.appendChild(label);
            row.appendChild(checkboxDiv);
            row.appendChild(removeBtn);
            container.appendChild(row);
        });
    }

    function updateExtraSelect() {
        var sel = document.getElementById('insp-extra-select');
        while (sel.firstChild) { sel.removeChild(sel.firstChild); }
        var defaultOpt = document.createElement('option');
        defaultOpt.value = '';
        defaultOpt.textContent = '— Weiteren Inspektor hinzufügen —';
        sel.appendChild(defaultOpt);
        var selectedIds = selectedInspectors.map(function(x){ return x.id; });
        allInspectors.forEach(function (inspector) {
            if (selectedIds.indexOf(inspector.id) === -1) {
                var opt = document.createElement('option');
                opt.value = inspector.id;
                opt.dataset.name  = inspector.name;
                opt.dataset.email = inspector.email;
                opt.textContent   = inspector.name + ' <' + inspector.email + '>';
                sel.appendChild(opt);
            }
        });
    }

    document.getElementById('btn-request-inspectors').addEventListener('click', function () {
        document.getElementById('insp-loading').style.display = '';
        document.getElementById('insp-content').style.display  = 'none';
        document.getElementById('insp-error').style.display    = 'none';
        document.getElementById('insp-send-btn').style.display = 'none';
        selectedInspectors = [];

        var modal = new bootstrap.Modal(document.getElementById('inspectorRequestModal'));
        modal.show();

        fetch(previewUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function(r){ return r.json(); })
            .then(function(data) {
                allInspectors      = data.all_inspectors || data.inspectors || [];
                selectedInspectors = (data.matched_inspectors || data.inspectors || []).slice();
                document.getElementById('insp-email-body').value = data.email_body || '';

                // Render only requested inspectors (those with existing requests) with assign buttons always visible
                var withStatus = allInspectors.filter(function(i){ return i.status; });
                var externalReqs = data.external_requests || [];
                var statusPanel = document.getElementById('insp-status-panel');
                var statusList  = document.getElementById('insp-status-list');
                while (statusList.firstChild) { statusList.removeChild(statusList.firstChild); }
                if (withStatus.length > 0 || externalReqs.length > 0) {
                    externalReqs.forEach(function(r) {
                        var row = document.createElement('div');
                        row.className = 'd-flex align-items-center justify-content-between py-1 border-bottom gap-2';
                        var nameWrap = document.createElement('span');
                        nameWrap.className = 'flex-grow-1';
                        var ic = document.createElement('i');
                        ic.className = 'fas fa-envelope me-2 text-muted';
                        var em = document.createElement('strong');
                        em.textContent = r.email;
                        var tag = document.createElement('small');
                        tag.className = 'text-muted ms-1'; tag.textContent = '(extern)';
                        nameWrap.appendChild(ic); nameWrap.appendChild(em); nameWrap.appendChild(tag);
                        row.appendChild(nameWrap); row.appendChild(makeBadge(r.status));
                        row.appendChild(makeAssignButton('Zuweisen', { external_email: r.email }));
                        statusList.appendChild(row);
                    });
                    withStatus.forEach(function(i) {
                        var row = document.createElement('div');
                        row.className = 'd-flex align-items-center justify-content-between py-1 border-bottom gap-2';
                        var nameWrap = document.createElement('span');
                        nameWrap.className = 'flex-grow-1';
                        var ic = document.createElement('i');
                        ic.className = 'fas fa-user-circle me-2 text-muted';
                        var nm = document.createElement('strong');
                        nm.textContent = i.name;
                        var em = document.createElement('span');
                        em.className = 'text-muted ms-1'; em.style.fontSize = '12px';
                        em.textContent = '<' + i.email + '>';
                        nameWrap.appendChild(ic); nameWrap.appendChild(nm); nameWrap.appendChild(em);
                        row.appendChild(nameWrap); row.appendChild(makeBadge(i.status));

                        var checkboxDiv = document.createElement('div');
                        checkboxDiv.className = 'form-check form-check-inline ms-2';
                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.className = 'form-check-input';
                        checkbox.id = 'auto_assign_' + i.id;
                        checkbox.setAttribute('data-inspector-id', i.id);
                        if (i.mark_for_auto_assign) {
                            checkbox.checked = true;
                        }
                        var checkboxLabel = document.createElement('label');
                        checkboxLabel.className = 'form-check-label';
                        checkboxLabel.setAttribute('for', 'auto_assign_' + i.id);
                        checkboxLabel.style.fontSize = '12px';
                        checkboxLabel.textContent = 'Auto';
                        checkboxDiv.appendChild(checkbox);
                        checkboxDiv.appendChild(checkboxLabel);
                        row.appendChild(checkboxDiv);

                        // Add event listener to save auto-assign state when checkbox changes
                        (function(inspectorId) {
                            checkbox.addEventListener('change', function() {
                                fetch('/admin/orders/{{ $order->id }}/inspector-auto-assign-update', {
                                    method: 'POST',
                                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    body: JSON.stringify({ inspector_id: inspectorId, mark_for_auto_assign: this.checked }),
                                })
                                .then(function(r){ return r.json(); })
                                .then(function(d){ if(window.toastr) toastr.success('Auto-assign aktualisiert'); })
                                .catch(function(){ if(window.toastr) toastr.error('Fehler beim Aktualisieren'); });
                            });
                        })(i.id);

                        row.appendChild(makeAssignButton('Zuweisen', { inspector_id: i.id }, checkbox));
                        statusList.appendChild(row);
                    });
                    statusPanel.style.display = '';
                } else {
                    statusPanel.style.display = 'none';
                }

                renderInspectorList();
                updateExtraSelect();
                document.getElementById('insp-loading').style.display  = 'none';
                document.getElementById('insp-content').style.display  = '';
                document.getElementById('insp-send-btn').style.display = '';
            })
            .catch(function() {
                document.getElementById('insp-loading').style.display = 'none';
                document.getElementById('insp-error').style.display   = '';
                document.getElementById('insp-error').textContent     = 'Fehler beim Laden der Inspektoren.';
            });
    });

    document.getElementById('insp-extra-add').addEventListener('click', function () {
        var sel = document.getElementById('insp-extra-select');
        var opt = sel.options[sel.selectedIndex];
        if (!opt || !opt.value) return;
        selectedInspectors.push({ id: parseInt(opt.value, 10), name: opt.dataset.name, email: opt.dataset.email });
        renderInspectorList();
        updateExtraSelect();
    });

    document.getElementById('insp-custom-add').addEventListener('click', function () {
        var input = document.getElementById('insp-custom-email');
        var email = input.value.trim();
        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            toastr.warning('Bitte eine gültige E-Mail eingeben.');
            return;
        }
        if (selectedInspectors.some(function(x){ return x.email === email; })) {
            toastr.info('Diese E-Mail ist bereits in der Liste.');
            return;
        }
        selectedInspectors.push({ id: null, name: null, email: email });
        input.value = '';
        renderInspectorList();
    });

    document.getElementById('insp-send-btn').addEventListener('click', function () {
        var ids       = selectedInspectors.filter(function(i){ return i.id; }).map(function(i){ return i.id; });
        var extEmails = selectedInspectors.filter(function(i){ return !i.id; }).map(function(i){ return i.email; });
        var autoAssignMap = {};
        selectedInspectors.forEach(function(inspector) {
            if (inspector._autoAssignCheckbox && inspector._autoAssignCheckbox.checked) {
                autoAssignMap[inspector.id || inspector.email] = true;
            }
        });
        var body = document.getElementById('insp-email-body').value.trim();
        if (ids.length === 0 && extEmails.length === 0) { toastr.warning('Bitte mindestens einen Empfänger auswählen.'); return; }
        if (!body)            { toastr.warning('E-Mail-Text darf nicht leer sein.'); return; }
        var btn = this;
        btn.disabled  = true;
        btn.textContent = 'Wird gesendet…';
        fetch(sendUrl, {
            method:  'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
            body:    JSON.stringify({ inspector_ids: ids, extra_emails: extEmails, email_body: body, auto_assign_map: autoAssignMap }),
        })
        .then(function(r){ return r.json(); })
        .then(function(data) {
            bootstrap.Modal.getOrCreateInstance(document.getElementById('inspectorRequestModal')).hide();
            toastr.success(data.message || 'Anfrage gesendet.');
        })
        .catch(function() { toastr.error('Fehler beim Senden.'); })
        .finally(function() { btn.disabled = false; btn.textContent = 'Anfrage senden'; });
    });

    // Listing PDF upload handler
    document.addEventListener('click', function(e) {
        if (e.target.closest('.js-upload-listing-pdf')) {
            const btn = e.target.closest('.js-upload-listing-pdf');
            const orderId = btn.dataset.orderId;
            const input = document.getElementById('listingPdfInput');

            if (!input || !input.files[0]) {
                toastr.error('Bitte wählen Sie eine PDF-Datei.');
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                toastr.error('Sicherheits-Token fehlt. Seite neu laden.');
                return;
            }

            const formData = new FormData();
            formData.append('listing_pdf', input.files[0]);

            btn.disabled = true;
            const originalHtml = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Lädt...';

            fetch(`/admin/bookings/${orderId}/upload-listing-pdf`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken.content },
                body: formData
            })
            .then(r => r.json().then(data => ({status: r.status, data: data})))
            .then(response => {
                if (response.status === 200 || response.data.success) {
                    toastr.success('Inserat PDF hochgeladen!');
                    setTimeout(() => location.reload(), 500);
                } else {
                    const errMsg = response.data.message || response.data.error || 'Fehler beim Upload.';
                    console.error('Upload error details:', response.data);
                    toastr.error(errMsg);
                    btn.disabled = false;
                    btn.innerHTML = originalHtml;
                }
            })
            .catch(err => {
                console.error('Upload error:', err);
                toastr.error('Fehler beim Upload: ' + err.message);
                btn.disabled = false;
                btn.innerHTML = originalHtml;
            });
        }
    });

    // Listing PDF delete handler
    document.addEventListener('click', function(e) {
        if (e.target.closest('.js-delete-listing-pdf')) {
            const btn = e.target.closest('.js-delete-listing-pdf');
            const orderId = btn.dataset.orderId;

            if (!confirm('Wirklich löschen?')) return;

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                toastr.error('Sicherheits-Token fehlt.');
                return;
            }

            btn.disabled = true;

            fetch(`/admin/bookings/${orderId}/delete-listing-pdf`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken.content }
            })
            .then(r => {
                if (!r.ok) throw new Error(`HTTP ${r.status}`);
                return r.json();
            })
            .then(data => {
                if (data.success) {
                    toastr.success('Inserat PDF gelöscht!');
                    setTimeout(() => location.reload(), 500);
                } else {
                    toastr.error(data.message || 'Fehler beim Löschen.');
                    btn.disabled = false;
                }
            })
            .catch(err => {
                console.error('Delete error:', err);
                toastr.error('Fehler beim Löschen: ' + err.message);
                btn.disabled = false;
            });
        }
    });
})();
</script>
@endsection

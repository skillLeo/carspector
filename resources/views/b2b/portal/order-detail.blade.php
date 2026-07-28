@extends('layouts.b2b')
@section('title', 'Order ' . ($order->orderno ?? '#'.$order->id))

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Order {{ $order->orderno ?? '#'.$order->id }}</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('b2b.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('b2b.orders') }}">My Orders</a></li>
            <li class="breadcrumb-item active">{{ $order->orderno ?? '#'.$order->id }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

@php
    $statusBadge = match($order->status) {
        'completed'             => ['success',  'Completed'],
        'cancelled'             => ['danger',   'Cancelled'],
        'inspecting'            => ['warning',  'Processing'],
        'processing'            => ['warning',  'Processing'],
        'visited'               => ['info',     'Processing'],
        default                 => ['primary',  'Processing'],
    };
@endphp

<div class="row">
    {{-- Order Summary Card --}}
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                @if($order->b2b_logo_path)
                <div class="mb-3">
                    <img src="{{ Storage::url($order->b2b_logo_path) }}" alt="{{ $partner->company_name }}"
                         style="max-height:60px;max-width:160px;object-fit:contain;">
                </div>
                @endif
                <h5 class="fw-bold mb-3">{{ $partner->company_name }}</h5>

                <div class="mb-3">
                    <div class="text-muted mb-1" style="font-size:12px;">ORDER ID</div>
                    <div class="fw-bold fs-5">{{ $order->orderno ?? '#'.$order->id }}</div>
                </div>
                <div class="mb-3">
                    <div class="text-muted mb-1" style="font-size:12px;">DATE PLACED</div>
                    <div>{{ $order->created_at->format('d.m.Y H:i') }}</div>
                </div>
                <div class="mb-3">
                    <div class="text-muted mb-1" style="font-size:12px;">STATUS</div>
                    <span class="badge bg-{{ $statusBadge[0] }} px-3 py-2" style="font-size:13px;">
                        {{ $statusBadge[1] }}
                    </span>
                </div>
                @if($order->appointment_date)
                <div class="mb-3">
                    <div class="text-muted mb-1" style="font-size:12px;">APPOINTMENT</div>
                    <div class="fw-semibold">
                        <i class="fas fa-calendar-alt me-1 text-primary"></i>
                        {{ \Carbon\Carbon::parse($order->appointment_date)->format('d.m.Y') }}
                        @if($order->appointment_time)
                            {{ substr($order->appointment_time, 0, 5) }} Uhr
                        @endif
                    </div>
                </div>
                @endif
                @if($order->completed_at)
                <div class="mb-3">
                    <div class="text-muted mb-1" style="font-size:12px;">COMPLETED ON</div>
                    <div class="text-success fw-semibold">
                        <i class="fas fa-check-circle me-1"></i>
                        {{ $order->completed_at->format('d.m.Y') }}
                    </div>
                </div>
                @endif
                @if($order->b2b_order_email_sent_at)
                <div class="mb-0">
                    <div class="text-muted mb-1" style="font-size:12px;">TEAM NOTIFIED</div>
                    <div class="text-success" style="font-size:13px;">
                        <i class="fas fa-check-circle me-1"></i>
                        {{ $order->b2b_order_email_sent_at->format('d.m.Y H:i') }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Order Details --}}
    <div class="col-md-8 mb-4">
        {{-- Vehicle --}}
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0"><i class="fas fa-car me-2 text-primary"></i> Vehicle Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 mb-2">
                        <div class="text-muted" style="font-size:12px;">MAKE &amp; MODEL</div>
                        <div class="fw-semibold">{{ $order->vehicle_make_model ?? '—' }}</div>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <div class="text-muted" style="font-size:12px;">FIRST REGISTRATION</div>
                        <div class="fw-semibold">{{ $order->make_year ?? '—' }}</div>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <div class="text-muted" style="font-size:12px;">MILEAGE</div>
                        <div class="fw-semibold">{{ $order->mileage ? $order->mileage.' km' : '—' }}</div>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <div class="text-muted" style="font-size:12px;">VIN / CHASSIS</div>
                        <div class="fw-semibold">{{ $order->brand ?? '—' }}</div>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <div class="text-muted" style="font-size:12px;">INSPECTION TYPE</div>
                        <div class="fw-semibold">{{ $order->desc ?? '—' }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Location & Contact --}}
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0"><i class="fas fa-map-marker-alt me-2 text-danger"></i> Location &amp; Contact</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 mb-2">
                        <div class="text-muted" style="font-size:12px;">ADDRESS</div>
                        <div class="fw-semibold">{{ $order->b2b_vehicle_location ?? $order->inspection_address ?? '—' }}</div>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <div class="text-muted" style="font-size:12px;">CONTACT PERSON</div>
                        <div class="fw-semibold">{{ $order->b2b_contact_person ?? '—' }}</div>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <div class="text-muted" style="font-size:12px;">CONTACT PHONE</div>
                        <div class="fw-semibold">{{ $order->b2b_contact_phone ?? $order->phone ?? '—' }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Special Notes --}}
        @if($order->b2b_special_notes)
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0"><i class="fas fa-sticky-note me-2 text-warning"></i> Special Notes</h6>
            </div>
            <div class="card-body">
                <p class="mb-0" style="white-space:pre-wrap;">{{ $order->b2b_special_notes }}</p>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="mt-2 d-flex justify-content-between align-items-center flex-wrap gap-2">
    <a href="{{ route('b2b.orders') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Back to Orders
    </a>
    @if($order->status === 'completed' && $order->pdf_number)
    <a href="{{ route('order.pdf.en', ['number' => $order->pdf_number]) }}" target="_blank" class="btn btn-success btn-sm">
        <i class="fas fa-file-pdf me-1"></i> Download Report (PDF)
    </a>
    @endif
    <!-- @if(!in_array($order->status, ['completed','cancelled']) && !$order->b2b_cancel_requested)
    <form action="{{ route('b2b.orders.cancel', $order->id) }}" method="POST"
          onsubmit="return confirm('Are you sure you want to request a cancellation?\n\nPlease note: cancellation is subject to review and may not always be possible. Full costs may apply if the inspection has already been scheduled or started.')">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="fas fa-times-circle me-1"></i> Request Cancellation
        </button>
    </form>
    @elseif($order->b2b_cancel_requested)
    <span class="text-warning" style="font-size:13px;">
        <i class="fas fa-hourglass-half me-1"></i> Cancellation requested — our team will be in touch.
    </span>
    @endif -->
</div>

@endsection

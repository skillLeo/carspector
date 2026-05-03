@extends('mainpages.mainadmin')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Booking {{ $order->display_order_number }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.bookings') }}">Bookings</a></li>
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
                <h3 class="card-title mb-1">Booking details</h3>
                <span class="badge {{ $statusClass }}">{!! $statusLabel !!}</span>
            </div>
            <a href="{{ route('admin.bookings') }}" class="btn btn-light btn-sm">Back to bookings</a>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-4">
                <a href="{{ route('admin.bookings', ['id' => $order->id]) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen"></i> Edit</a>
                <a href="{{ $examinerEmail ? 'mailto:' . $examinerEmail : '#' }}" class="btn btn-sm btn-outline-info"><i class="fas fa-envelope"></i> Email examiner</a>
                <a href="{{ route('booking.delete', $order->id) }}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Delete booking</a>
                <a href="{{ route('examiner.order', $order->id) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-alt"></i> Examiner report</a>
                <a href="{{ route('examination.delete', $order->id) }}" class="btn btn-sm btn-outline-danger"><i class="fas fa-file-excel"></i> Delete examination</a>
                <a href="{{ route('order.pdf', ['number' => $order->pdf_number ?? 1]) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-pdf"></i> PDF DE</a>
                <a href="{{ route('order.pdf.en', ['number' => $order->pdf_number ?? 1]) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-pdf"></i> PDF EN</a>
                <a href="{{ route('send.customer.pdf', ['id' => $order->id]) }}" class="btn btn-sm btn-outline-success"><i class="fas fa-paper-plane"></i> Send PDF</a>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="mb-3">Order</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Order ID</dt><dd class="col-sm-8">{{ $order->display_order_number }}</dd>
                        <dt class="col-sm-4">Date</dt><dd class="col-sm-8">{{ $order->admin_order_date ? $order->admin_order_date->format('d.m.Y') : optional($order->created_at)->format('d.m.Y') }}</dd>
                        <dt class="col-sm-4">Status</dt><dd class="col-sm-8"><span class="badge {{ $statusClass }}">{!! $statusLabel !!}</span></dd>
                        <dt class="col-sm-4">Completed on</dt><dd class="col-sm-8">{{ $order->completed_at ? $order->completed_at->format('d.m.Y') : '-' }}</dd>
                        <dt class="col-sm-4">Paid on</dt><dd class="col-sm-8">{{ $order->paid_at ? $order->paid_at->format('d.m.Y') : '-' }}</dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Customer</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Name</dt><dd class="col-sm-8">{{ $customerName }}</dd>
                        <dt class="col-sm-4">Email</dt><dd class="col-sm-8"><a href="mailto:{{ $order->email }}">{{ $order->email ?: '-' }}</a></dd>
                        <dt class="col-sm-4">User phone</dt><dd class="col-sm-8">{{ $order->user->phone ?? '-' }}</dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Vehicle</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Vehicle</dt><dd class="col-sm-8">{{ $order->vehicle_make_model ?: '-' }}</dd>
                        <dt class="col-sm-4">Type</dt><dd class="col-sm-8">{{ $order->vehicle_type ?: '-' }}</dd>
                        <dt class="col-sm-4">Brand</dt><dd class="col-sm-8">{{ $order->brand ?: '-' }}</dd>
                        <dt class="col-sm-4">Link</dt><dd class="col-sm-8">@if($order->advertisement_link)<a href="{{ $order->advertisement_link }}" target="_blank">{{ $order->advertisement_link }}</a>@else - @endif</dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Inspection</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Examiner</dt><dd class="col-sm-8">{{ $order->examiner_name ?: ($order->examiner->name ?? $order->examiner->email ?? '-') }}</dd>
                        <dt class="col-sm-4">Address</dt><dd class="col-sm-8">{{ $order->street ?: '-' }}</dd>
                        <dt class="col-sm-4">City</dt><dd class="col-sm-8">{{ $order->city ?: '-' }}</dd>
                        <dt class="col-sm-4">Seller phone</dt><dd class="col-sm-8">{{ $order->seller_phone ?: $order->phone ?: '-' }}</dd>
                    </dl>
                </div>
                <div class="col-12">
                    <h5 class="mb-3">Wishes</h5>
                    <div class="p-3 bg-light rounded">{{ $order->desc ?: '-' }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

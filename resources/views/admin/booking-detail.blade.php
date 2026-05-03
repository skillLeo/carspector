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
                <a href="{{ route('booking.delete', $order->id) }}" class="btn btn-sm btn-outline-danger js-confirm-delete" data-message="Are you sure you want to delete this booking? This cannot be undone."><i class="fas fa-trash"></i> Delete booking</a>
                <a href="{{ route('examiner.order', $order->id) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-alt"></i> Examiner report</a>
                <a href="{{ route('examination.delete', $order->id) }}" class="btn btn-sm btn-outline-danger js-confirm-delete" data-message="Delete examination? The booking status will be reset to New."><i class="fas fa-file-excel"></i> Delete examination</a>
                <a href="{{ route('order.pdf', ['number' => $order->pdf_number ?? 1]) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-pdf"></i> PDF DE</a>
                <a href="{{ route('order.pdf.en', ['number' => $order->pdf_number ?? 1]) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-pdf"></i> PDF EN</a>
                <a href="{{ route('send.customer.pdf', ['id' => $order->id]) }}" class="btn btn-sm btn-outline-success js-confirm-send-pdf"><i class="fas fa-paper-plane"></i> Send PDF</a>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="mb-3">Order</h5>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Order ID</dt><dd class="col-sm-8">{{ $order->display_order_number }}</dd>
                        <dt class="col-sm-4">Date</dt><dd class="col-sm-8">{{ $order->admin_order_date ? $order->admin_order_date->format('d.m.Y') : optional($order->created_at)->format('d.m.Y') }}</dd>
                        <dt class="col-sm-4">Status</dt><dd class="col-sm-8"><span class="badge {{ $statusClass }}">{!! $statusLabel !!}</span></dd>
                        @if(auth()->user()->type === 'admin')
                            <dt class="col-sm-4">Appointment set</dt>
                            <dd class="col-sm-8">
                                @if($order->appointment_date)
                                    {{ $order->appointment_date->format('d.m.Y') }}@if($order->appointment_time) {{ substr($order->appointment_time, 0, 5) }}@endif
                                @else
                                    -
                                @endif
                            </dd>
                        @endif
                        <dt class="col-sm-4">Completed on</dt><dd class="col-sm-8">{{ $order->completed_at ? $order->completed_at->format('d.m.Y') : '-' }}</dd>
                        <dt class="col-sm-4">Paid on</dt><dd class="col-sm-8">{{ $order->paid_at ? $order->paid_at->format('d.m.Y') : '-' }}</dd>
                    </dl>
                    @if(auth()->user()->type === 'admin')
                        <form action="{{ route('admin.booking.appointment', $order->id) }}" method="POST" class="mt-4 border-top pt-3">
                            @csrf
                            <label class="form-label fw-semibold">Appointment set</label>
                            <div class="row g-2">
                                <div class="col-sm-7">
                                    <input type="date" name="appointment_date" class="form-control" value="{{ $order->appointment_date ? $order->appointment_date->format('Y-m-d') : '' }}" required>
                                </div>
                                <div class="col-sm-5">
                                    <input type="time" name="appointment_time" class="form-control" value="{{ $order->appointment_time ? substr($order->appointment_time, 0, 5) : '' }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-3">Save appointment</button>
                        </form>
                    @endif
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

@section('js')
<script>
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

    // Confirmation for Send PDF
    var sendPdfBtn = document.querySelector('.js-confirm-send-pdf');
    if (sendPdfBtn) {
        sendPdfBtn.addEventListener('click', function(e) {
            e.preventDefault();
            var href = this.getAttribute('href');
            Swal.fire({
                title: 'Send PDF to customer?',
                html: '<div class="d-flex flex-column gap-3 mt-2">' +
                    '<div class="form-check text-start d-flex align-items-center gap-2">' +
                    '<input class="form-check-input" type="checkbox" id="swal-no-upsell-detail">' +
                    '<label class="form-check-label" for="swal-no-upsell-detail">Partner</label></div>' +
                    '<div class="form-check text-start d-flex align-items-center gap-2">' +
                    '<input class="form-check-input" type="checkbox" id="swal-sent-review-detail">' +
                    '<label class="form-check-label" for="swal-sent-review-detail">Bewertung</label></div></div>',
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
</script>
@endsection

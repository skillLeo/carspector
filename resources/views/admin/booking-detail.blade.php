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
                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit_booking_modal"><i class="fas fa-pen"></i> Edit</button>
                <button type="button" class="btn btn-sm btn-outline-info" id="btn-open-examiner-email"><i class="fas fa-envelope"></i> Email examiner</button>
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
                        <input type="text" name="vehicle_type" class="form-control" value="{{ $order->vehicle_type }}">
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
                        <input type="date" name="paid_at" class="form-control" value="{{ $order->paid_at ? $order->paid_at->format('Y-m-d') : '' }}">
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
            var customerName  = '{{ addslashes($order->customer_name ?: ($order->user->name ?? '')) }}';
            var bookingCode   = '{{ addslashes($order->display_order_number) }}';
            var carModel      = '{{ addslashes($order->vehicle_make_model ?: '') }}';
            var sellerAddress = '{{ addslashes($order->street ?: '') }}';
            var sellerPhone   = '{{ addslashes($order->seller_phone ?: $order->phone ?: '') }}';
            var listingLink   = '{{ addslashes($order->advertisement_link ?: '') }}';

            document.getElementById('det_examiner_email').value  = '{{ $examinerEmail }}';
            document.getElementById('det_customer_name').value   = customerName;
            document.getElementById('det_booking_code').value    = bookingCode;
            document.getElementById('det_car_model').value       = carModel;
            document.getElementById('det_seller_name').value     = '';
            document.getElementById('det_seller_address').value  = sellerAddress;
            document.getElementById('det_seller_phone').value    = sellerPhone;
            document.getElementById('det_listing_link').value    = listingLink;
            ensurePrefix();
            if (subjectInput) subjectInput.value = PREFIX + bookingCode;

            // Auto-generate email body from the fields above
            var lines = [];
            if (customerName)  lines.push('Kunde: ' + customerName);
            if (bookingCode)   lines.push('Auftragsnummer: ' + bookingCode);
            if (carModel)      lines.push('Fahrzeug: ' + carModel);
            if (sellerAddress) lines.push('Adresse: ' + sellerAddress);
            if (sellerPhone)   lines.push('Telefon: ' + sellerPhone);
            if (listingLink)   lines.push('Inserat: ' + listingLink);

            var body = 'Sehr geehrte Damen und Herren,\n\nhiermit übermitteln wir Ihnen die Auftragsdetails:\n\n';
            body += lines.join('\n');
            body += '\n\nMit freundlichen Grüßen\nIhr Team von Carspector';

            document.getElementById('det_examiner_message').value = body;

            bootstrap.Modal.getOrCreateInstance(document.getElementById('email_examiner_detail')).show();
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
@endsection

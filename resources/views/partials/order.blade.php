<style>
    .order-detail-modal {
        display: flex;
        flex-direction: column;
        max-height: calc(100vh - 3rem);
        overflow: hidden;
    }
    .order-detail-scroll {
        overflow-y: auto;
        padding-right: .25rem;
    }
    .order-detail-actions {
        flex-shrink: 0;
    }
</style>

<div class="card-bill bg-primary rounded-4 p-3 order-detail-modal">
    <div class="card-bill-header text-center pb-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="text-white mb-0">Alle Informationen</h6>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    @php
        $bookingCode = $order->orderno ?: \App\Models\Order::formatOrderNumber($order);
        $examinerEmail = $order->examiner && $order->examiner->email ? $order->examiner->email : '';
    @endphp

    <div class="order-detail-scroll">
        <div class="card-bill-body py-3">
            <ul>
                <li>
                    <span class="fw-bold">Order ID</span>
                    <span>{{ $bookingCode }}</span>
                </li>
                <li class="pb-3">
                    <span class="fw-bold">Datum</span>
                    <span>{{ $order->admin_order_date ? $order->admin_order_date->format('d.m.Y') : optional($order->created_at)->format('d.m.Y') }}</span>
                </li>
                <div class="border-top pb-4"></div>
                <li>
                    <span class="fw-bold">Kunde</span>
                    <span>{{ $order->customer_name ?: ($order->user->name ?? 'No User') }}</span>
                </li>
                <li class="pb-4">
                    <span class="fw-bold">E-Mail</span>
                    <span><a class="text-white" href="mailto:{{ $order->email }}">{{ $order->email ?: '-' }}</a></span>
                </li>
                <div class="border-top pb-4"></div>
                <li>
                    <span class="fw-bold">Typ</span>
                    <span>{{ $order->vehicle_type ?: '-' }}</span>
                </li>
                <li>
                    <span class="fw-bold">Status</span>
                    <span>{{ $order->admin_status ?: ($order->status ?: '-') }}</span>
                </li>
                <li>
                    <span class="fw-bold">Gutachter</span>
                    <span>{{ $order->examiner_name ?: ($order->examiner->name ?? $order->examiner->email ?? '-') }}</span>
                </li>
                <li>
                    <span class="fw-bold">Abschluss am</span>
                    <span>{{ $order->completed_at ? $order->completed_at->format('d.m.Y') : '-' }}</span>
                </li>
                <li>
                    <span class="fw-bold">Bezahlt am</span>
                    <span>{{ $order->paid_at ? $order->paid_at->format('d.m.Y') : '-' }}</span>
                </li>
                <div class="border-top pb-4"></div>
                <li>
                    <span class="fw-bold">Fahrzeug</span>
                    <span>{{ $order->vehicle_make_model ?: '-' }}</span>
                </li>
                <li>
                    <span class="fw-bold">Link</span>
                    <span>
                        <a class="text-white" target="_blank" href="{{ $order->advertisement_link }}">
                            {{ $order->advertisement_link ? substr($order->advertisement_link, 0, 25) : 'LINK' }}
                        </a>
                    </span>
                </li>
                <li>
                    <span class="fw-bold">Adresse</span>
                    <span>{{ $order->street ?: '-' }}</span>
                </li>
                <li>
                    <span class="fw-bold">Ort</span>
                    <span style="text-transform: capitalize">{{ $order->city ?: '-' }}</span>
                </li>
                <li class="pb-3">
                    <span class="fw-bold">Ver. TEL</span>
                    <span><a class="text-white" href="tel:{{ $order->seller_phone }}">{{ $order->seller_phone ?: '-' }}</a></span>
                </li>
                @if($order->user)
                    <li class="pb-3">
                        <span class="fw-bold">User Phone</span>
                        <span><a class="text-white" href="tel:{{ $order->user->phone }}">{{ $order->user->phone ?: '-' }}</a></span>
                    </li>
                @endif
                <div class="border-top pb-2"></div>
                <li>
                    <span class="fw-bold">V-Liste</span>
                    <span><a class="text-white" href="#">{{ $order->negotiation_checklist == 1 ? 'Y' : 'N' }}</a></span>
                </li>
                <li>
                    <span class="fw-bold">ENG</span>
                    <span><a class="text-white" href="#">{{ $order->document_in_english == 1 ? 'Y' : 'N' }}</a></span>
                </li>
            </ul>
        </div>

        <div class="card-bill-footer border-top pt-3">
            <h6 class="text-white">Wunsche:</h6>
            <p class="text-white" style="word-break: break-all; white-space: pre-wrap;">{{ $order->desc ?: '-' }}</p>
        </div>
        <div class="mt-4 mb-3">
            <a href="/Carspector_Gutachtenvorlage.pdf" target="_blank">
                <button type="button" class="btn btn-white btn-icon shadow w-100">
                    <span class="text text-start text-dark">Gutachtenvorlage herunterladen</span>
                </button>
            </a>
        </div>
    </div>

    <div class="booking-actions order-detail-actions d-flex flex-wrap gap-2 pt-3 border-top">
        <a href="#" data-id="{{ $order->id }}" class="btn action-btn btn-edit-order btn-sm btn-light" title="Edit Booking"><i class="fas fa-pen"></i> Edit</a>
        <a href="#"
           data-id="{{ $order->id }}"
           data-email="{{ $examinerEmail }}"
           data-customer-name="{{ $order->customer_name ?: ($order->user->name ?? $order->name ?? '') }}"
           data-booking-code="{{ $bookingCode }}"
           data-car-model="{{ $order->vehicle_make_model ?: ($order->vehicle_type ?? '') }}"
           data-seller-name="{{ $order->seller_name ?? ($order->name ?? '') }}"
           data-seller-address="{{ $order->seller_address ?? $order->inspection_address ?? $order->street ?? '' }}"
           data-seller-phone="{{ $order->seller_phone ?? $order->phone ?? '' }}"
           data-listing-link="{{ $order->advertisement_link ?? $order->link ?? '' }}"
           class="btn action-btn btn-email-examiner btn-sm btn-info" title="Email Examiner"><i class="fas fa-envelope"></i> Email</a>
        <a href="{{ route('booking.delete', $order->id) }}" class="btn action-btn btn-delete btn-sm btn-danger" title="Delete Booking"><i class="fas fa-trash"></i> Delete</a>
        <a href="{{ route('examiner.order', $order->id) }}" target="_blank" class="btn btn-sm btn-light" title="Examiner Report"><i class="fas fa-file-alt"></i> Report</a>
        <a href="{{ route('examination.delete', $order->id) }}" class="btn action-btn btn-delete btn-sm btn-danger" title="Delete Examination"><i class="fas fa-file-excel"></i> Delete Exam</a>
        <a href="{{ route('order.pdf', ['number' => $order->pdf_number ?? 1]) }}" target="_blank" class="btn btn-sm btn-light" title="Download PDF (DE)"><i class="fas fa-file-pdf"></i> DE</a>
        <a href="{{ route('order.pdf.en', ['number' => $order->pdf_number ?? 1]) }}" target="_blank" class="btn btn-sm btn-light" title="Download PDF (EN)"><i class="fas fa-file-pdf"></i> EN</a>
        <a href="{{ route('send.customer.pdf', ['id' => $order->id]) }}" class="btn action-btn send-customer-pdf btn-sm btn-success" title="Send to Customer"><i class="fas fa-paper-plane"></i> Send</a>
    </div>
</div>

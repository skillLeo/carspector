<div class="card-bill bg-primary rounded-4 p-3">
    <div class="card-bill-header text-center pb-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="text-white mb-0">Alle Informationen</h6>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="card-bill-body py-3">
        <ul>
            <li>
                <span class="fw-bold">Order ID</span>
                <span>{{ $order->orderno ?: \App\Models\Order::formatOrderNumber($order) }}</span>
            </li>
            <li class="pb-3">
                <span class="fw-bold">Datum</span>
                <span>{{ $order->admin_order_date ? $order->admin_order_date->format('d.m.Y') : optional($order->created_at)->format('d.m.Y') }}</span>
            </li>
            <div class="border-top pb-4"></div>
            <li>
                <span class="fw-bold">Kunde</span>
                <span>
                    {{ $order->customer_name ?: ($order->user->name ?? 'No User') }}
                </span>
            </li>
            <li class="pb-4">
                <span class="fw-bold">E-Mail</span>
                <span><a class="text-white" href="mailto:{{$order->email}}">{{$order->email?$order->email:"-"}}</a></span>
            </li>
            <!-- <li>
                <span class="fw-bold">Kunde Tel</span>
                <span><a class="text-white" href="tel:{{$order->user?$order->user->phone:''}}">{{$order->user?($order->user->phone?$order->user->phone:'-'):"-"}}</a></span>
            </li> -->
            <div class="border-top pb-4"></div>
            <li>
                <span class="fw-bold">Kosten</span>
                <span>{{ $order->price ? $order->price . ' €' : '-' }}</span>
            </li>
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
                <span>{{$order->vehicle_make_model?$order->vehicle_make_model:'-'}}</span>
            </li>
            <li>
                <span class="fw-bold">Link</span>
                <span><a class="text-white" target="_blank" href="{{$order->advertisement_link}}">{{$order->advertisement_link?substr($order->advertisement_link,0,25):'LINK'}}</a></span>
            </li>
            <li>
                <span class="fw-bold">Adresse</span>
                <span>{{ $order->street?$order->street:'-' }}</span>
            </li>
            <li>
                <span class="fw-bold">Ort</span>
                <span style="text-transform: capitalize">{{$order->city?$order->city:'-'}}</span>
            </li>
            <li class="pb-3">
                <span class="fw-bold">Ver. TEL</span>
                <span><a class="text-white" href="tel:{{$order->seller_phone}}">{{$order->seller_phone?$order->seller_phone:"-"}}</a></span>
            </li>
            @if($order->user)
                <li class="pb-3">
                    <span class="fw-bold">User Phone</span>
                    <span><a class="text-white" href="tel:{{$order->user->phone}}">{{$order->user->phone?$order->user->phone:"-"}}</a></span>
                </li>
            @endif
            <div class="border-top pb-2"></div>
            <li>
                <span class="fw-bold">V-Liste</span>
                <span><a class="text-white" href="#">{{$order->negotiation_checklist==1?'Y':"N"}}</a></span>
            </li>
            <li>
                <span class="fw-bold">ENG</span>
                <span><a class="text-white" href="#">{{$order->document_in_english==1?'Y':"N"}}</a></span>
            </li>
            <!-- <li>
                <span class="fw-bold">Sprache</span>
                <span>{{$order->language?$order->language:'-'}}</span>
            </li> -->
        </ul>
    </div>
    <div class="card-bill-footer border-top pt-3">
        <h6 class="text-white">Wünsche:</h6>
        <p class="text-white" style="word-break: break-all;white-space: pre-wrap;">{{$order->desc?$order->desc:'-'}}</p>
    </div>
    <div class="mt-4">
            <a href="/Carspector_Gutachtenvorlage.pdf" target="_blank"> <button type="button" class="btn btn-white btn-icon shadow w-100">
                    <span class="text text-start text-dark">Gutachtenvorlage herunterladen</span>
                </button> </a>
    </div>
</div>

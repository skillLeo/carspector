<div class="card-bill bg-primary rounded-4 p-3">
    <div class="card-bill-header text-center pb-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="text-white mb-0">Alle Informationen</h6>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="card-bill-body py-3">
        <ul>
            <li>
                <span class="fw-bold">Art</span>
                <span>Gebrauchtwagencheck</span>
            </li>
            <li>
                <span class="fw-bold">Kundenname</span>
                <span>{{$order->user->name}}</span>
            </li>
            <li>
                <span class="fw-bold">Telefonnummer des Kunden</span>
                <span><a href="tel:{{$order->phone}}">{{$order->phone?$order->phone:"-"}}</a></span>
            </li>
            <li>
                <span class="fw-bold">Preis</span>
                <span>{{$order->price}} €</span>
            </li>
            <li>
                <span class="fw-bold">Prüfer</span>
                <span>{{$order->examiner->name}}</span>
            </li>
            <li>
                <span class="fw-bold">Datum</span>
                <span>{{date('d-m-Y',strtotime($order->date))}}</span>
            </li>
            <li>
                <span class="fw-bold">Uhrzeit</span>
                <span>{{date('H:i',strtotime($order->time))}}</span>
            </li>
            <li>
                <span class="fw-bold">Marke</span>
                <span>{{$order->brand?$order->brand:'-'}}</span>
            </li><li>
                <span class="fw-bold">Fahrzeug</span>
                <span>{{$order->vehicle_make_model?$order->vehicle_make_model:'-'}}</span>
            </li>
            <li>
                <span class="fw-bold">Baujahr</span>
                <span>{{$order->make_year?$order->make_year:'-'}}</span>
            </li>
            <li>
                <span class="fw-bold">Link</span>
                <span><a href="{{$order->link}}">{{$order->link?$order->link:'-'}}</a></span>
            </li>
            <li>
                <span class="fw-bold">Adresse</span>
                <span>{{ $order->street?$order->street:'-' }}</span>
            </li>
            <li>
                <span class="fw-bold">Ort</span>
                <span>{{$order->postal_code?$order->postal_code:'-'}} {{$order->city?$order->city:'-'}}</span>
            </li>
            <li>
                <span class="fw-bold">Zusatz</span>
                <span>{{$order->addition?$order->addition:'-'}}</span>
            </li>

        </ul>
    </div>
    <div class="card-bill-footer border-top pt-3">
        <h6 class="text-white">Deine Wünsche und Vorstellungen:</h6>
        <p class="text-white" style="word-break: break-all;white-space: pre-wrap;">{{$order->desc?$order->desc:'-'}}</p>
    </div>
    <div class="mt-4">
       @if(auth()->user()->type=='user')
            <a href="{{route('vorteile')}}"> <button type="button" class="btn btn-white btn-icon shadow w-100">
                    <span class="text text-start text-dark">Was du erwarten kannst</span>
                    <span class="icon"><img src="{{ asset('assets/img/icons/die-info-dark.png') }}" alt=""></span>
                </button> </a>
        @else
            <a href="/assets/media/checklists/carspector_checkliste.pdf" target="_blank"> <button type="button" class="btn btn-white btn-icon shadow w-100">
                    <span class="text text-start text-dark">Checkliste herunterladen</span>
                    <span class="icon"><img src="{{ asset('assets/img/icons/download_checklist.png') }}" alt=""></span>
                </button> </a>
       @endif
    </div>
</div>

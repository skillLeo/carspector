@component('mail::message')
    Anfrage: Fahrzeugtransport <br><br>
    Marke & Modell: {{$request->vehicle_make_model}} <br>
    Abholort: {{$request->location}} <br>
    Lieferadresse: {{$request->delivery_address}} <br>
    @if($request->sonstiges)
        Sonstiges: {{ $request->sonstiges }} <br>
    @endif
    <br> E-Mail: {{$request->email}}
@endcomponent

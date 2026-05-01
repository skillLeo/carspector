@component('mail::message')
    Buchung: Inserat-Vergleich <br><br>
    Zusatz-Infos: {{$request['vehicle_make_model']}} <br>
    Kosten: {{$request['amount']}} € <br><br>
    @if($request['inserat'])
        @foreach($request['inserat'] as $key=>$inserat)
            inserat ({{$key}}) : {{ $inserat }} <br>
        @endforeach
    @endif
    <br> E-Mail: {{$request['email']}}
@endcomponent

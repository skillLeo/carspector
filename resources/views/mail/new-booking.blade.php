@component('mail::message')
    Netzwerk-Beitritt Anfrage

    Vollständiger Name: {{ $booking['name'] }}

    E-Mail: {{ $booking['email']}}

    Telefon: {{ $booking['phone'] }}

    Einzugsgebiet: {{ $booking['catchment_area'] }}

    Sonstiges: {{ $booking['desc'] }}


    {{ config('app.name') }}
@endcomponent

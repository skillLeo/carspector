@component('mail::message')
    A user made a new booking request.

    **Partner:** {{ examiner($booking->examiner_id) }}

    **Language:** {{ $booking->language }}

    **Marke & Modell:** {{ $booking->vehicle_make_model }}

    **Link zum Inserat - z.B. mobile.de:** {{ $booking->advertisement_link }}

    **Stadt:** {{ $booking->city }}

    **Promo Code:** {{ $booking->promo_code }}

    **Wünsche an die Prüfung:** {{ $booking->desc }}

    **Name:** {{ $booking->name }}

    **E-Mail:** {{ $booking->email }}

    {{ config('app.name') }}
@endcomponent

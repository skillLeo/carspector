@component('mail::message')
# Terminbestätigung

Ihr Termin für den CarCheck wurde gesetzt.

**Fahrzeug:** {{ $order->vehicle_make_model ?: ($order->vehicle_type ?: '-') }}

**Termin:** {{ optional($order->appointment_date)->format('d.m.Y') }}{{ $order->appointment_time ? ' um ' . substr($order->appointment_time, 0, 5) . ' Uhr' : '' }}

Viele Grüße  
Ihr Carspector Team
@endcomponent

@php
    $licenseLabel = $booking->license_plate_type === 'desired' ? 'Wunschkennzeichen' : 'StVA-Zuteilung';
    $seasonText = $booking->is_seasonal
        ? (($monthLabels[$booking->season_from_month] ?? $booking->season_from_month) . ' – ' . ($monthLabels[$booking->season_to_month] ?? $booking->season_to_month))
        : null;
    $options = [];
    if ($booking->needs_emission_sticker) {
        $options[] = 'Feinstaub-Plakette';
    }
    if ($booking->five_day_registration) {
        $options[] = '5-Tages-Zulassung inkl. Versicherung';
    }
@endphp

@component('mail::message')
# Zahlung bestätigt – wir legen los!

Hallo {{ $booking->first_name }} {{ $booking->last_name }},

wir haben deine Daten für die Zulassung erhalten. Unser Team startet jetzt mit der Bearbeitung.

@component('mail::panel')
**Adresse**  
{{ $booking->street }} {{ $booking->house_number }}  
{{ $booking->postal_code }} {{ $booking->city }}  
E-Mail: {{ $booking->customer_email }}

**Kennzeichen**  
Art: {{ $licenseLabel }}  
@if($booking->license_plate_type === 'desired')
Kennzeichen: {{ $booking->desired_license_plate ?? '–' }}  
PIN: {{ $booking->reservation_pin ?? '–' }}  
@endif
@if($seasonText)
Saison: {{ $seasonText }}  
@endif
@if($booking->special_plate)
Spezial: {{ $booking->special_plate }}  
@endif
@if($options)
Optionen: {{ implode(', ', $options) }}  
@endif
@if($booking->amount_eur)
Gesamtbetrag: {{ number_format($booking->amount_eur, 2, ',', '.') }} €
@endif
@endcomponent

Du erhältst in Kürze weitere Informationen zum Versand der Unterlagen. Bei Fragen erreichst du uns jederzeit unter info@carspector.de.

Vielen Dank für dein Vertrauen!  
Dein Carspector Team
@endcomponent

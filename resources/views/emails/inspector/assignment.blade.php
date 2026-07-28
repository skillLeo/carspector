<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Auftragsbestätigung — Carspector</title>
</head>
<body style="font-family:Arial,sans-serif;font-size:14px;color:#212529;line-height:1.6;">

    <p>Sehr geehrte Damen und Herren,</p>

    <p>vielen Dank für die schnelle Rückmeldung.</p>

    <p>Gerne bestätigen wir Ihnen hiermit den unten genannten Auftrag.</p>

    <p>Bitte kontaktieren Sie den Verkäufer / Händler, um einen Termin zu vereinbaren. Bitte teilen Sie uns diesen kurz mit.</p>

    @php
        // If brand looks like a VIN (17 alphanumeric chars), treat it as VIN, not part of model name
        $brandIsVin = !empty($order->brand) && preg_match('/^[A-HJ-NPR-Z0-9]{17}$/i', trim($order->brand));
        $vehicleName = $brandIsVin
            ? trim($order->vehicle_make_model ?? '')
            : trim(($order->brand ?? '') . ' ' . ($order->vehicle_make_model ?? ''));
        $vin = $order->fin ?: ($brandIsVin ? $order->brand : null);
        // Strip everything except digits to handle "119.900 km", "99.000", "99000" etc.
        $mileageDigits = preg_replace('/[^0-9]/', '', $order->mileage ?? '');
        $mileageNum = $mileageDigits !== '' ? (int)$mileageDigits : null;
    @endphp
    <p>
        <strong>Fahrzeug</strong><br>
        Fahrzeug: {{ $vehicleName ?: '—' }}<br>
        Erstzulassung: {{ $order->make_year ?: '—' }}<br>
        Kilometerstand: {{ $mileageNum ? number_format($mileageNum, 0, ',', '.') . ' km' : '—' }}<br>
        @if($vin)
            FIN: {{ $vin }}<br>
        @endif

        @if($order->advertisement_link)
            Inserat-Link:
            <a href="{{ $order->advertisement_link }}">
                {{ $order->advertisement_link }}
            </a><br>
        @endif
    </p>

    <p>
        <strong>Standort / Verkäufer</strong><br>
        Name: {{ $order->listing_seller_name ?: ($order->customer_name ?: '—') }}<br>
        Adresse: {{ $order->listing_seller_address ?: ($order->street ?: ($order->inspection_address ?? '—')) }}<br>
        <!-- Stadt: {{ implode(' ', array_filter([$order->postal_code ?? '', $order->city ?? ''])) ?: '—' }}<br> -->

        Telefon:
        @if($order->seller_phone || $order->phone)
            {{ $order->seller_phone ?: $order->phone }}
        @else
            —
        @endif
    </p>

    @if(isset($appointmentUrl) && $appointmentUrl) 
        <p style="margin-top:15px;"> 
            Sobald ein Termin abgestimmt wurde, bestätigen Sie diesen bitte über den folgenden Button. 
        </p> 
        
        <p style="margin:20px 0;"> 
            <a href="{{ $appointmentUrl }}" style="display:inline-block; background:#01449a; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:4px; font-weight:bold"> 
                Termin bestätigen 
            </a> 
        </p> 
    @endif

    
    <p style="margin-top:25px; margin-bottom:20px; color:#dc3545;">
        <strong>ACHTUNG:</strong> Die Zugangsdaten zur WebApp erhalten Sie in einer separaten E-Mail.
    </p>

    <p>
        Mit freundlichen Grüßen<br>
        Carspector Support Team
    </p>

    <p style="font-size:12px;color:#6c757d;">
        &copy; {{ date('Y') }} Carspector GmbH
    </p>

</body>
</html>
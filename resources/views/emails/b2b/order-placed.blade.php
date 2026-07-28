<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>CarCheck / Zustandsbericht</title>
</head>
<body style="font-family: Arial, sans-serif; font-size:14px; color:#212529; line-height:1.6;">

    <p>
        Sehr geehrte Damen und Herren,<br>
        wir haben einen neuen Auftrag für einen CarCheck / Zustandsbericht.
    </p>

    <p>
        <strong>Auftragsdetails</strong><br>
        Auftrags-Typ: CarCheck / Zustandsbericht<br>
        Auftrags-Nr.: {{ $order->orderno ?? '#' . $order->id }}<br>
        <!-- Datum: {{ $order->created_at->format('d.m.Y H:i') }} Uhr -->
    </p>

    @if($order->soh_check)
    <p>
        <strong>Zusatzdienstleistung</strong><br>
        SoH Check Batterie InspecTR
    </p>
    @endif

    <p>
        <strong>Fahrzeug</strong><br>
        Fahrzeug: {{ $order->vehicle_make_model ?? '—' }}<br>
        <tr><td>Erstzulassung: </td><td>{{ $order->make_year ?? '—' }}</td></tr><br>
        <tr><td>Kilometerstand: </td><td>{{ $order->mileage ? $order->mileage . ' km' : '—' }}</td></tr><br>
        FIN: {{ $order->brand ?? '—' }}<br>
        @if($order->advertisement_link)
            <tr><td>Inserat-Link: </td><td><a href="{{ $order->advertisement_link }}">{{ $order->advertisement_link }}</a></td></tr>
        @endif
    </p>

    <p>
        <strong>Standort</strong><br>
        Adresse: {{ $order->b2b_vehicle_location ?? $order->inspection_address }}<br>
        Ansprechpartner: {{ $order->b2b_contact_person ?? '—' }}<br>
        Telefon: {{ $order->b2b_contact_phone ?? $order->phone ?? '—' }}
    </p>

    <p>
        Mit freundlichen Grüßen,<br>
        Carspector Support Team
    </p>

    <p style="font-size:12px; color:#6c757d;">
        © {{ date('Y') }} Carspector GmbH
    </p>

</body>
</html>
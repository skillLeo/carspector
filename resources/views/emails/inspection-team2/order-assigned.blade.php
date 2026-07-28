<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>CarCheck | Neuer Auftrag</title>
</head>
<body style="font-family: Arial, sans-serif; font-size:14px; color:#212529; line-height:1.6;">

    <p>
        Sehr geehrte Damen und Herren,<br>
        wir haben einen neuen Auftrag für einen CarCheck / Zustandsbericht.
    </p>

    <p>
        <strong>Auftragsdetails</strong><br>
        <!-- Auftrags-Typ: {{ $order->vehicle_type ?? 'CarCheck / Zustandsbericht' }}<br> -->
        Auftrags-Typ: CarCheck / Zustandsbericht<br>
        Auftrags-Nr.: {{ $order->orderno ?? '#' . $order->id }}<br>
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
        Erstzulassung: {{ $order->make_year ?? '—' }}<br>
        Kilometerstand: {{ $order->mileage ? $order->mileage . ' km' : '—' }}<br>
        FIN: {{ $order->brand ?? '—' }}<br>
        @if($order->advertisement_link)
            Inserat-Link: <a href="{{ $order->advertisement_link }}">{{ $order->advertisement_link }}</a><br>
        @endif
    </p>

    <p>
        <strong>Standort / Verkäufer</strong><br>
        Name: {{ $order->listing_seller_name ?? '—' }}<br>
        Adresse: {{ $order->listing_seller_address ?? $order->street ?? '—' }}<br>
        Stadt: {{ $order->city ?? '—' }}<br>
        Telefon: {{ $order->seller_phone ?? $order->phone ?? '—' }}<br>
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

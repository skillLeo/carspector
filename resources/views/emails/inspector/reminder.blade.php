<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Erinnerung: Prüfungsanfrage — Carspector</title>
</head>
<body style="font-family:Arial,sans-serif;font-size:14px;color:#212529;line-height:1.6;">

    <!-- <p>
        <strong>⏰ Erinnerung: Offene Prüfungsanfrage</strong><br>
        Auftrag {{ $order->orderno ?? ('#'.$order->id) }}
    </p> -->

    <p>Hallo,</p>

    <p>
        wir haben noch keine Antwort von Ihnen auf unsere Prüfungsanfrage erhalten.
        Der Auftrag ist noch verfügbar. Wir würden uns über Ihre Rückmeldung freuen.
    </p>

    @php
        $address = implode(', ', array_filter([
            $order->inspection_address ?? $order->street ?? '',
            $order->postal_code ?? '',
            $order->city ?? '',
        ]));
    @endphp

    <table style="border-collapse:collapse;">
        <tr>
            <td style="padding:4px 15px 4px 0;"><strong>Auftrags-Nr.</strong></td>
            <td>{{ $order->orderno ?? ('#'.$order->id) }}</td>
        </tr>

        @if($order->vehicle_make_model || $order->brand)
        <tr>
            <td style="padding:4px 15px 4px 0;"><strong>Fahrzeug</strong></td>
            <td>{{ trim(($order->brand ?? '').' '.($order->vehicle_make_model ?? '')) ?: '—' }}</td>
        </tr>
        @endif

        @if($address)
        <tr>
            <td style="padding:4px 15px 4px 0;"><strong>Prüfungsort</strong></td>
            <td>{{ $address }}</td>
        </tr>
        @endif
    </table>

    @if($acceptUrl && $declineUrl)

    <p>
        <a href="{{ $acceptUrl }}">
            ✅ Jetzt annehmen
        </a>
        <br><br>
        <a href="{{ $declineUrl }}">
            ❌ Ablehnen
        </a>
    </p>

    <p style="font-size:12px;color:#6c757d;">
        Kein Login erforderlich.
    </p>

    @endif

    <p>
        Mit freundlichen Grüßen<br>
        <strong>Carspector Team</strong>
    </p>

    <p style="font-size:12px;color:#6c757d;">
        &copy; {{ date('Y') }} Carspector GmbH
    </p>

</body>
</html>
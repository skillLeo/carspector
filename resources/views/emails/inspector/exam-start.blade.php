<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Prüfung starten — Carspector</title>
</head>
<body style="font-family:Arial,sans-serif;font-size:14px;color:#212529;line-height:1.6;">

    <p>Sehr geehrte Damen und Herren,</p>

    <p>anbei erhalten Sie die Zugangsdaten.</p>

    <p>
        <strong>Auftrags-Nr.:</strong> {{ $order->orderno ?? ('#' . $order->id) }}<br>
        <strong>Fahrzeug:</strong> {{ $order->vehicle_make_model ?: '—' }}
    </p>

    <p style="margin:25px 0;">
        <a href="{{ $examStartUrl }}"
           style="display:inline-block;
                  background:#198754;
                  color:#ffffff;
                  text-decoration:none;
                  padding:12px 24px;
                  border-radius:4px; 
                  font-weight:bold">
            Jetzt Prüfung starten
        </a>
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

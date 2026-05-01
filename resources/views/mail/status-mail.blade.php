<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>Fahrzeugprüfung abgeschlossen</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <!-- Font Awesome einbinden -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="margin:0; padding:0; background:#f7f7fb;">
  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
      <td align="center" style="padding:24px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width:600px; background:#ffffff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
          <tr>
            <td style="padding:32px; font-family:Arial,Helvetica,sans-serif; text-align:center;">

              <!-- Begrüßung -->
              <p style="color:#000000; font-size:26px; font-weight:700; line-height:1.4; margin:0 0 12px 0;">
                Unterlagen folgen in Kürze | {{ $order->vehicle_make_model }}
              </p>

              <p style="margin:0 0 12px 0; color:#333333; line-height:1.6; font-size:16px;">
                Hallo,
              </p>

              <!-- Text -->
              <p style="margin:0 0 12px 0; color:#333333; line-height:1.6; font-size:16px;">
                wir freuen uns, dir mitteilen zu können, dass die Prüfung des Fahrzeugs <b>{{ $order->vehicle_make_model }}</b> erfolgreich abgeschlossen wurde.
                Unser Team erstellt nun das Prüfergebnis.
              </p>

              <p style="margin:12px 0; color:#333333; line-height:1.6; font-size:16px;">
                Innerhalb von <b>24&nbsp;Stunden</b> nach Erhalt dieser E-Mail erhältst du das vollständige Prüfergebnis 
                inklusive aller relevanten Dokumente direkt per E-Mail.
              </p>

              <!-- Signatur -->
              <p style="margin:20px 0 0 0; color:#000000; font-size:16px; line-height:1.6;">
                Vielen Dank für dein Vertrauen in unseren Service.<br>
                Dein Team von Carspector
              </p>

            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neue Prüfungsanfrage — Carspector</title>
</head>
<body style="font-family: Arial, sans-serif; font-size:14px; color:#212529; line-height:1.6;">

    <!-- <p>
        <strong>Neue Prüfungsanfrage</strong><br>
        Carspector — Auftrag {{ $order->orderno ?? ('#'.$order->id) }}
    </p> -->

    <div style="white-space: pre-line;">
        {{ $emailBody }}
    </div>
    
    <br>

    @if($acceptUrl && $declineUrl)

    <p>
        <strong>Bitte antworten Sie direkt über einen der folgenden Buttons:</strong>
    </p>

    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td style="padding-right:10px;">
                <a href="{{ $acceptUrl }}"
                style="display:inline-block;
                        background:#198754;
                        color:#ffffff;
                        text-decoration:none;
                        padding:12px 24px;
                        border-radius:4px;
                        font-weight:bold;
                        font-size:14px;">
                    ✓ Auftrag annehmen
                </a>
            </td>

            <td>
                <a href="{{ $declineUrl }}"
                style="display:inline-block;
                        background:#dc3545;
                        color:#ffffff;
                        text-decoration:none;
                        padding:12px 24px;
                        border-radius:4px;
                        font-weight:bold;
                        font-size:14px;">
                    ✕ Auftrag ablehnen
                </a>
            </td>
        </tr>
    </table>

    @else

    <p>
        <a href="{{ $portalUrl }}">Im Portal antworten</a>
    </p>

    @endif

    <br>

    <p> 
        Mit freundlichen Grüßen<br> 
        Carspector Support Team
    </p>

    <p style="font-size:12px; color:#6c757d;">
        © {{ date('Y') }} Carspector GmbH
    </p>

</body>
</html>
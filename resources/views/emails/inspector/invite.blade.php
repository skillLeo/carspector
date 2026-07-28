<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Neu: Carspector Prüfer-Portal</title>
</head>
<body style="font-family: Arial, sans-serif; font-size:14px; color:#212529; line-height:1.6;">
    
    <p>Hallo,</p>

    <p>
        wir freuen uns, Ihnen das neue <strong>Carspector Gutachter-Portal</strong> vorzustellen.
        Über das Portal können Sie zukünftig Ihre Anfragen und Aufträge noch einfacher verwalten.
    </p>

    <p>
        Die Nutzung des Portals ist <strong>freiwillig</strong>. Es entstehen Ihnen keine Nachteile,
        wenn Sie sich dagegen entscheiden oder die Einrichtung zu einem späteren Zeitpunkt vornehmen.
    </p>

    <p>
        Im Gutachter-Portal können Sie:
    </p>
    <ul>
        <li>Auftragsanfragen einsehen und beantworten</li>
        <li>Ihren Einsatzbereich (Städte und Postleitzahlen) verwalten</li>
        <li>Zugewiesene Aufträge übersichtlich verwalten</li>
    </ul>

    <p><strong>Wichtiger Hinweis:</strong>
    Sollten Sie künftig Auftragsanfragen erhalten, bitten wir Sie, nicht mehr direkt auf die Anfrage-E-Mail zu antworten. 
    Nutzen Sie stattdessen bitte die in der E-Mail enthaltenen Buttons oder bearbeiten Sie die Anfrage direkt im Prüfer-Portal. 
    </p>

    <p>
        Wenn Sie das Portal nutzen möchten, klicken Sie bitte auf den folgenden Link:
    </p>

    <p>
        <a href="{{ $registerUrl }}" style="background:#0d6efd;color:#fff;padding:10px 20px;border-radius:5px;text-decoration:none;display:inline-block;">
            Zugang einrichten
        </a>
    </p>

    <p>
        Nach erfolgreicher Registrierung steht Ihnen das Prüfer-Portal jederzeit zur Verfügung. Der Login erfolgt über <a href="https://carspector.de/inspector/login">https://carspector.de/inspector/login</a>. 
        Alternativ können Sie das Portal auch über die Carspector-Website aufrufen (Gutachter Login).
    </p>

    <p>Oder kopieren Sie diesen Link in Ihren Browser:</p>
    <p><a href="{{ $registerUrl }}">{{ $registerUrl }}</a></p>

    <p>
        <strong>Hinweis:</strong> Dieser Link ist <strong>{{ $expiryHours }} Stunden</strong> gültig.
    </p>

    <p>
        Wir freuen uns und stehen bei Rückfragen gerne zur Verfügung.
    </p>

    <p>
        Mit freundlichen Grüßen<br>
        <strong>Ihr Carspector Team</strong>
    </p>

    <p style="font-size:12px;color:#6c757d;">
        &copy; {{ date('Y') }} Carspector GmbH
    </p>

</body>
</html>

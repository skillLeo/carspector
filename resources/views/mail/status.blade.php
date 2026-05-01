@component('mail::message')
    # Deine Buchung mit der ID: 8{{$id}} wurde aktualisiert.
    Aktueller Status: Fahrzeug-Check abgeschlossen. 
    
    Wir werten derzeit die Ergebnisse aus und erstellen das Prüfergebnis. Sobald alle Unterlagen vollständig sind, senden wir dir diese umgehend per E-Mail zu.

    Solltest du in der Zwischenzeit Fragen haben oder weitere Informationen benötigen, stehen wir dir selbstverständlich jederzeit gerne zur Verfügung. Zögere nicht, uns zu kontaktieren!
    
    Mit freundlichen Grüßen
    Dein Team von {{ config('app.name') }}
@endcomponent

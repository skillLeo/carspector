@component('mail::message')

<div style="font-size:14px; text-align:center; font-weight:400; margin:20px; font-family:Arial,Helvetica,sans-serif; color:#181C32">

<p style="font-size:30px; font-weight:700; margin-bottom:10px;">
    Vielen Dank für deine Buchung bei Carspector!
</p>

<p style="color:#374151; font-size:15px; line-height:1.6; margin-bottom:25px;">
    Wir haben deinen Auftrag erfolgreich erhalten und starten nun mit der Bearbeitung.
</p>

<p style="font-size:18px; font-weight:600; margin-bottom:10px;">
    So geht es jetzt weiter:
</p>

<div style="text-align:left; max-width:480px; margin:0 auto 30px auto; font-size:15px; line-height:1.6; color:#374151;">
    <p><b>1.</b> Unser Prüfer kontaktiert den Verkäufer und vereinbart einen Termin.</p>
    <p><b>2.</b> Prüfung des Fahrzeugs vor Ort.</p>
    <p><b>3.</b> Zusendung des Prüfergebnisses per E-Mail.</p>
</div>

<p style="font-size:18px; font-weight:600; margin-bottom:10px;">
    Kurze Frage vorab
</p>

<p style="font-size:15px; line-height:1.6; margin-bottom:25px; color:#374151;">
    Stehst du bereits in Kontakt mit dem Verkäufer und ist dieser über die Beauftragung informiert bzw. weiß, dass wir uns bei ihm melden werden?<br><br>
    Falls ja, gib uns gerne eine kurze Rückmeldung auf diese E-Mail – das erleichtert die Terminvereinbarung oft.
</p>

<p style="font-size:18px; font-weight:600; margin-bottom:10px;">
    Dein persönlicher Account
</p>

<p style="color:#374151; font-size:15px; line-height:1.6; margin-bottom:20px;">
    Erstelle jetzt kostenlos einen Account, um alle Auftragsdetails einzusehen und den aktuellen Bearbeitungsstand zu verfolgen.
</p>

@component('mail::button', ['url' => route('user.register',['id'=>$booking['id']]), 'color' => 'primary'])
    <span style="display:inline-block; padding:10px 20px; font-size:16px; background-color:#2D3748; color:#ffffff; border-radius:6px; text-decoration:none;">
        Account erstellen
    </span>
@endcomponent

<p style="margin-top:20px; font-size:14px; color:#6B7280;">
    Bereits registriert? <a href="https://www.carspector.de/login">Jetzt anmelden</a>
    <br>
    Fragen? <a href="https://www.carspector.de/kontakt">Kontaktiere uns</a>
</p>

</div>

@endcomponent

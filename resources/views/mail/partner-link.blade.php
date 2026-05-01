@component('mail::message')

    <div style="font-size: 14px; text-align:center; font-weight: 500; margin:10px 10px 10px 10px; font-family:Arial,Helvetica,sans-serif">
        <p style="color:#181C32; font-size: 30px; font-weight:700; line-height:1.4; margin-bottom:6px">Herzlich Willkommen!</p>
        <p style="margin-bottom:2px; color:#708090; line-height:1.6">Herzlich willkommen bei Carspector! Wir freuen uns, dich als Partner an Bord zu haben.
            <!-- <br><br>Durchschnittlich benötigen wir <b>2-4 Werktage</b>, um das Fahrzeug zu prüfen und dir alle Dokumente zukommen zu lassen.<br><br> -->
        </p>
        <br>
        <p>
            <b>
            Um deinen persönlichen Rabattcode zu sehen und die kostenlose Partnerschaft zu starten, erstelle einfach einen Account unter folgendem Link:
                @component('mail::button', ['url' => route('partner.password',['id'=>$user->id]), 'color' => 'primary'])
                    <span style="display: inline-block; padding: 4px 10px; color: #fff; font-size: 16px; background-color: #2D3748; border-radius: 5px; text-decoration: none;">
                        Account erstellen
                    </span>
                @endcomponent
                Fragen? <a href="https://www.carspector.de/kontakt">Kontaktiere uns</a>
        </p>
    </div>





@endcomponent

@component('mail::message')
<!-- Header -->
<div style="text-align:center; font-family:Arial,Helvetica,sans-serif;">
  <p style="margin:0 0 8px; color:#181C32; font-size:28px; font-weight:700; line-height:1.25;">
    Dein Prüfergebnis ist bereit ✅
  </p>
</div>

<!-- Intro -->
<div style="margin-bottom:23px; margin-top:18px; font-family:Arial,Helvetica,sans-serif; color:black; font-size:14px; line-height:1.75;">
  <p style="margin:0 0 12px;">Hallo,</p>
  <p style="margin:0 0 14px;">
  wir freuen uns, dir mitteilen zu können, dass die Prüfung des Fahrzeugs <b>{{ $order->vehicle_make_model }}</b> erfolgreich abgeschlossen wurde und das Prüfergebnis nun für dich bereitsteht.
</p>

</div>

<!-- CTA Button -->
<table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0 auto 18px; width:100%; max-width:480px;">
  <tr>
    <td align="center" style="border-radius:12px; background:#2563EB;">
      <a href="{{ route('order.pdf', ['number' => $booking->pdf_number]) }}"
        style="display:block; padding:14px 22px; font-family:Arial,Helvetica,sans-serif; font-weight:600; font-size:16px; line-height:1; color:#ffffff; text-decoration:none; border-radius:12px;">
        Prüfergebnis ansehen
      </a>
    </td>
  </tr>
</table>

<p style="margin:0 auto; max-width:480px; font-family:Arial,Helvetica,sans-serif; font-size:14px; line-height:1.5; color:#333333; text-align:center;">
  <strong>Wichtig:</strong> Weitere Unterlagen (z. B. Fotodokumentation) findest du im unteren Bereich des Prüfberichts verlinkt.
</p>

@if (empty($hideUpsell) && strpos($booking->vehicle_type, 'XL') !== false && strpos($booking->vehicle_type, 'XXL') === false)
<hr style="border:none; height:1px; background:#E5E7EB; margin:30px 0;">

<div style="margin:18px 0 22px; font-family:Arial,Helvetica,sans-serif; color:black; font-size:14px; line-height:1.7;">
  <div style="padding:16px; border:1px solid #E0E7FF; border-radius:10px; background:#F8FAFC;">
    <p style="color:black; margin:0 0 8px; font-weight:700;">📝 Mehr Transparenz für deine Entscheidung?</p>
    <p style="margin:0 0 10px; color:#374151;">
      Möchtest du eine solide Grundlage für deine weitere Entscheidungsfindung oder anstehende Verhandlungen?
      Dann empfehlen wir dir unsere <b>XXL-Kalkulation</b>, die dir zusätzliche, wertvolle Informationen liefert:
    </p>
    <ul style="margin:0 0 12px 18px; padding:0; color:#374151;">
      <li style="margin:0 0 6px;">Detaillierte Minder- und Mehrwerte</li>
      <li style="margin:0 0 6px;">Anstehende Kosten und Reparaturempfehlungen</li>
      <li style="margin:0 0 6px;">Aktueller Marktwert</li>
      <li style="margin:0;">Abfrage der Fahrgestellnummer</li>
    </ul>
    <p style="margin:0 0 14px; color:black;">
      👉 <span style="font-weight:700;">Jetzt mit nur einem Klick für nur 50&nbsp;€ nachbuchen</span> – deine erweiterte Auswertung erhältst du in kürzester Zeit.
    </p>
    <p style="margin:0;">
      <a href="https://buy.stripe.com/fZu6oG3S90PbdFT0Gu5Rm1B"
         style="color:#2563EB; text-decoration:underline;">Jetzt XXL-Kalkulation nachbuchen →</a>
    </p>
  </div>
</div> 
@endif

<hr style="border:none; height:1px; background:#E5E7EB; margin:30px 0 20px;">

<!-- Upsells -->
@if (empty($hideUpsell))
<div style="font-family:Arial,Helvetica,sans-serif; color:#111827; font-size:14px; line-height:1.7">
  <p style="margin:0 0 14px; font-weight:700;">🚗 Dir gefällt das Auto? Jetzt weiter profitieren:</p>

  <!-- Block 1 -->
  <div style="margin:0 0 16px; padding:14px; border:1px solid #E0E7FF; border-radius:10px; background:#F8FAFC;">
    <p style="margin:0 0 6px; font-weight:700;">🧾 Komplette Kaufabwicklung – <span style="font-weight:700;">nur 149&nbsp;€</span></p>
    <p style="margin:0 0 8px; color:#4B5563;">
      Preisverhandlung &amp; Vertragserstellung inklusive.
    </p>
    <p style="margin:0;">
      <a href="https://buy.stripe.com/fZufZgcoFdBXbxL9d05Rm1O"
         style="color:#2563EB; text-decoration:underline;">Jetzt Kaufabwicklung buchen →</a>
    </p>
  </div>

  <!-- Block 2 -->
  <div style="margin:0 0 16px; padding:14px; border:1px solid #E0E7FF; border-radius:10px; background:#F8FAFC;">
    <p style="margin:0 0 6px; font-weight:700;">🚚 Fahrzeugtransport</p>
    <p style="margin:0 0 8px; color:#4B5563;">
      Deutschlandweit – der Preis richtet sich nach der Entfernung. Wir organisieren den Transport reibungslos für dich.
    </p>
    <p style="margin:0;">
      <a href="https://carspector.de/fahrzeuglieferung"
         style="color:#2563EB; text-decoration:underline;">Transport unverbindlich anfragen →</a>
    </p>
  </div>

  <!-- Block 3 -->
  <div style="margin:0 0 4px; padding:14px; border:1px solid #E0E7FF; border-radius:10px; background:#F8FAFC;">
    <p style="margin:0 0 6px; font-weight:700;">🛠️ Individuelle Services</p>
    <p style="margin:0 0 8px; color:#4B5563;">
      Ganz nach deinem Bedarf – wir erstellen dir ein maßgeschneidertes Angebot, passend zu deiner Situation.
    </p>
    <p style="margin:0;">
      <a href="https://carspector.de/kontakt"
         style="color:#2563EB; text-decoration:underline;">Individuelles Angebot anfordern →</a>
    </p>
  </div>
</div>


<!-- Alternative / Neue Prüfung -->
<div style="margin-top:30px; font-family:Arial,Helvetica,sans-serif; color:#1F2937; font-size:14px; line-height:1.75;">
  <p style="margin:0 0 10px;">
    ❌ <b>Das Auto ist doch nichts für dich?</b> Kein Problem – wir unterstützen dich gerne erneut bei der Prüfung eines anderen Fahrzeugs.
  </p>
  <p style="margin:0;">
    <a href="https://www.carspector.de/buchung"
       style="color:#2563EB; text-decoration:underline;">Neue Fahrzeugprüfung buchen →</a>
  </p>
</div>

<hr style="border:none; height:1px; background:#E5E7EB; margin:30px 0;">
@endif
<!-- Footer -->
<div style="margin-top:25px; padding-bottom:10px; font-family:Arial,Helvetica,sans-serif; color:black; font-size:12px; line-height:1.6;">
  <p style="margin:0;">
    <span style="font-weight:700;">Vielen Dank für dein Vertrauen!</span>
    <br><br>
    Bei Rückfragen oder weiteren Wünschen stehen wir dir selbstverständlich jederzeit zur Verfügung.
    <br><br>
    Mit freundlichen Grüßen<br>Dein Team von Carspector
  </p>
</div>
@endcomponent

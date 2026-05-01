@component('mail::message')
<!-- Header -->
<div style="text-align:center; font-family:Arial,Helvetica,sans-serif;">
  <p style="margin:0 0 8px; color:#181C32; font-size:28px; font-weight:700; line-height:1.25;">
    Your inspection result is ready ✅
  </p>
  </div>

<!-- Intro -->
<div style="margin-bottom:23px; margin-top:18px; font-family:Arial,Helvetica,sans-serif; color:black; font-size:14px; line-height:1.75;">
  <p style="margin:0 0 12px;">Hello,</p>
  <p style="margin:0 0 14px;">
  we’re happy to let you know that the inspection of the vehicle <b>{{ $order->vehicle_make_model }}</b> has been completed and your report is now available.
</p>

</div>

<!-- CTA Button -->
<table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0 auto 18px; width:100%; max-width:480px;">
  <tr>
    <td align="center" style="border-radius:12px; background:#2563EB;">
      <a href="{{ route('order.pdf.en', ['number' => $booking->pdf_number]) }}"
        style="display:block; padding:14px 22px; font-family:Arial,Helvetica,sans-serif; font-weight:600; font-size:16px; line-height:1; color:#ffffff; text-decoration:none; border-radius:12px;">
        View inspection report
      </a>
    </td>
  </tr>
</table>

<p style="margin:0 auto; max-width:480px; font-family:Arial,Helvetica,sans-serif; font-size:14px; line-height:1.5; color:#333333; text-align:center;">
  <strong>Important:</strong> Additional documents (e.g. photo documentation) are linked at the bottom of the inspection report.
</p>

@if (empty($hideUpsell) && strpos($booking->vehicle_type, 'XL') !== false && strpos($booking->vehicle_type, 'XXL') === false)
<hr style="border:none; height:1px; background:#E5E7EB; margin:30px 0;">

<div style="margin:18px 0 22px; font-family:Arial,Helvetica,sans-serif; color:black; font-size:14px; line-height:1.7;">
  <div style="padding:16px; border:1px solid #E0E7FF; border-radius:10px; background:#F8FAFC;">
    <p style="color:black; margin:0 0 8px; font-weight:700;">📝 More transparency for your decision?</p>
    <p style="margin:0 0 10px; color:#374151;">
      Looking for a stronger basis for your decision or upcoming negotiations?
      We recommend our <b>XXL calculation</b> for additional, valuable insights:
    </p>
    <ul style="margin:0 0 12px 18px; padding:0; color:#374151;">
      <li style="margin:0 0 6px;">Detailed added/deducted values</li>
      <li style="margin:0 0 6px;">Upcoming costs and repair recommendations</li>
      <li style="margin:0 0 6px;">Current market value</li>
      <li style="margin:0;">VIN check</li>
    </ul>
    <p style="margin:0 0 14px; color:black;">
      👉 <span style="font-weight:700;">Order now with one click for only €50</span> – you’ll receive the extended analysis shortly.
    </p>
    <p style="margin:0;">
      <a href="https://buy.stripe.com/fZuaEWewN55r6drgFs5Rm1F" style="color:#2563EB; text-decoration:underline;">Order XXL calculation →</a>
    </p>
  </div>
  </div>
@endif

<hr style="border:none; height:1px; background:#E5E7EB; margin:30px 0 20px;">

<!-- Upsells -->
@if (empty($hideUpsell))
<div style="font-family:Arial,Helvetica,sans-serif; color:#111827; font-size:14px; line-height:1.7">
  <p style="margin:0 0 14px; font-weight:700;">🚗 Like the car? Keep going:</p>

  <!-- Block 1 -->
  <div style="margin:0 0 16px; padding:14px; border:1px solid #E0E7FF; border-radius:10px; background:#F8FAFC;">
    <p style="margin:0 0 6px; font-weight:700;">🧾 Complete purchase handling – <span style="font-weight:700;">just €149</span></p>
    <p style="margin:0 0 8px; color:#4B5563;">Price negotiation & contract creation included.</p>
    <p style="margin:0;">
      <a href="https://buy.stripe.com/14AaEW4Wd7dz45jgFs5Rm1P" style="color:#2563EB; text-decoration:underline;">Book purchase handling →</a>
    </p>
  </div>

  <!-- Block 2 -->
  <div style="margin:0 0 16px; padding:14px; border:1px solid #E0E7FF; border-radius:10px; background:#F8FAFC;">
    <p style="margin:0 0 6px; font-weight:700;">🚚 Vehicle transport</p>
    <p style="margin:0 0 8px; color:#4B5563;">Nationwide – pricing depends on distance. We organize it smoothly for you.</p>
    <p style="margin:0;">
      <a href="https://carspector.de/fahrzeuglieferung" style="color:#2563EB; text-decoration:underline;">Request transport →</a>
    </p>
  </div>

  <!-- Block 3 -->
  <div style="margin:0 0 4px; padding:14px; border:1px solid #E0E7FF; border-radius:10px; background:#F8FAFC;">
    <p style="margin:0 0 6px; font-weight:700;">🛠️ Custom services</p>
    <p style="margin:0 0 8px; color:#4B5563;">Tailored to your needs – we’ll create a custom offer for your situation.</p>
    <p style="margin:0;">
      <a href="https://carspector.de/kontakt" style="color:#2563EB; text-decoration:underline;">Request a custom offer →</a>
    </p>
  </div>
</div>


<!-- Alternative / New inspection -->
<div style="margin-top:30px; font-family:Arial,Helvetica,sans-serif; color:#1F2937; font-size:14px; line-height:1.75;">
  <p style="margin:0 0 10px;">❌ <b>The car isn’t right for you?</b> No problem – we’re happy to inspect another vehicle for you.</p>
  <p style="margin:0;">
    <a href="https://www.carspector.de/buchung" style="color:#2563EB; text-decoration:underline;">Book a new inspection →</a>
  </p>
</div>

<hr style="border:none; height:1px; background:#E5E7EB; margin:30px 0;">
@endif
<!-- Footer -->
<div style="margin-top:25px; padding-bottom:10px; font-family:Arial,Helvetica,sans-serif; color:black; font-size:12px; line-height:1.6;">
  <p style="margin:0;">
    <span style="font-weight:700;">Thank you for your trust!</span>
    <br><br>
    If you have any questions or further requests, we’re happy to help at any time.
    <br><br>
    Best regards,<br>Your Carspector team
  </p>
</div>
@endcomponent

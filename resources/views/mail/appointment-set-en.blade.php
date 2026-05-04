<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Appointment Confirmation</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body style="margin:0; padding:0; background:#f7f7fb;">
  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
      <td align="center" style="padding:24px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width:600px; background:#ffffff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
          <tr>
            <td style="padding:32px; font-family:Arial,Helvetica,sans-serif; text-align:center;">

              <p style="color:#000000; font-size:26px; font-weight:700; line-height:1.4; margin:0 0 12px 0;">
                Appointment Confirmation | {{ $order->vehicle_make_model ?: ($order->vehicle_type ?: 'Your Vehicle') }}
              </p>

              <p style="margin:0 0 12px 0; color:#333333; line-height:1.6; font-size:16px;">
                Hello,
              </p>

              <p style="margin:0 0 12px 0; color:#333333; line-height:1.6; font-size:16px;">
                Your appointment for the CarCheck of the vehicle <b>{{ $order->vehicle_make_model ?: ($order->vehicle_type ?: 'your vehicle') }}</b> has been scheduled.
              </p>

              <p style="margin:12px 0; color:#333333; line-height:1.6; font-size:16px;">
                <b>Appointment:</b> {{ optional($order->appointment_date)->format('d.m.Y') }}{{ $order->appointment_time ? ' at ' . substr($order->appointment_time, 0, 5) : '' }}
              </p>

              <p style="margin:20px 0 0 0; color:#000000; font-size:16px; line-height:1.6;">
                Kind regards,<br>
                Your Carspector Team
              </p>

            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>

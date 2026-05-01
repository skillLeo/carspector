<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Vehicle inspection completed</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body style="margin:0; padding:0; background:#f7f7fb;">
  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
      <td align="center" style="padding:24px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width:600px; background:#ffffff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
          <tr>
            <td style="padding:32px; font-family:Arial,Helvetica,sans-serif; text-align:center;">

              <p style="color:#000; font-size:24px; font-weight:700; line-height:1.4; margin:0 0 12px 0;">
                Documents will follow shortly | Vehicle: {{ $order->vehicle_make_model }}
              </p>

              <p style="margin:0 0 12px 0; color:#333; line-height:1.6; font-size:15px;">
                Hello,
              </p>

                <p style="margin:0 0 12px 0; color:#333; line-height:1.6; font-size:15px;">
                  we’re happy to inform you that the inspection of the requested vehicle <b>{{ $order->vehicle_make_model }}</b> has been successfully completed.
                  Our team is now preparing the final report.
                </p>

              <p style="margin:12px 0; color:#333; line-height:1.6; font-size:15px;">
                Within <b>24 hours</b> of receiving this email you’ll get the full report,
                including all relevant documents, sent directly by email.
              </p>

              <p style="margin:20px 0 0 0; color:#000; font-size:15px; line-height:1.6;">
                Thank you for choosing our service.<br>
                Your Carspector team
              </p>

            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>


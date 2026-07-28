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
            <td style="padding:32px; font-family:Arial,Helvetica,sans-serif; text-align:left;">

              <p style="color:#000; font-size:24px; font-weight:700; line-height:1.4; margin:0 0 12px 0;">
                Appointment Confirmation | {{ $order->vehicle_make_model ?: ($order->vehicle_type ?: 'Your Vehicle') }}
              </p>

              <p style="margin:0 0 12px 0; color:#333; line-height:1.6; font-size:15px;">
                Hello,
              </p>

              <p style="margin:0 0 12px 0; color:#333; line-height:1.6; font-size:15px;">
                we’re happy to confirm that the appointment for the inspection of the vehicle
                <b>{{ $order->vehicle_make_model ?: ($order->vehicle_type ?: 'your vehicle') }}</b>
                has been successfully scheduled.
              </p>

              <p style="margin:12px 0; color:#333; line-height:1.6; font-size:15px;">
                <b>Appointment:</b>

                @php
                    $weekdays = [
                        1 => 'Monday',
                        2 => 'Tuesday',
                        3 => 'Wednesday',
                        4 => 'Thursday',
                        5 => 'Friday',
                        6 => 'Saturday',
                        7 => 'Sunday',
                    ];

                    $appointmentDate = $order->appointment_date
                        ? \Carbon\Carbon::parse($order->appointment_date)
                        : null;

                    $appointmentTime = $order->appointment_time
                        ? \Carbon\Carbon::parse($order->appointment_time)->format('g:i A')
                        : null;
                @endphp

                {{ $appointmentDate
                    ? $weekdays[$appointmentDate->dayOfWeekIso] . ', ' . $appointmentDate->format('d.m.Y')
                    : ''
                }}

                <!-- {{ $appointmentTime ? ' at ' . $appointmentTime . ' (CET/CEST)' : '' }} -->
            </p>

              <p style="margin:20px 0 0 0; color:#000; font-size:15px; line-height:1.6;">
                Thank you for choosing our service.<br>
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
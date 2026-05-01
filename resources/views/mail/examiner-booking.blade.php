<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $subjectLine ?? 'Booking Details' }}</title>
  <style>
    html,body { margin:0 !important; padding:0 !important; height:100% !important; width:100% !important; }
    * { -ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; }
    table, td { mso-table-lspace:0pt; mso-table-rspace:0pt; }
    img { -ms-interpolation-mode:bicubic; border:0; outline:none; text-decoration:none; }
    a { text-decoration:none; }
    @media (prefers-color-scheme: dark) {
      .bg-body { background:#0f1720 !important; }
      .bg-card { background:#111827 !important; }
      .text-muted { color:#9ca3af !important; }
      .text { color:#e5e7eb !important; }
      .note { background:#eef2ff !important; }
    }
    @media screen and (max-width:600px) {
      .container { width:100% !important; max-width:100% !important; }
      .px-30 { padding-left:16px !important; padding-right:16px !important; }
      .p-30 { padding:20px !important; }
      h1 { font-size:22px !important; line-height:1.3 !important; }
    }
  </style>
</head>
<body class="bg-body" style="margin:0; padding:0; background:#f3f4f6;">
@php
    $manualData = [];
    if (!empty($manualDetails) && is_array($manualDetails)) {
        foreach ($manualDetails as $key => $value) {
            $value = trim((string) $value);
            if ($value !== '') {
                $manualData[$key] = $value;
            }
        }
    }

    $bookingId = $manualData['booking_code'] ?? data_get($booking, 'orderno') ?? '#' . data_get($booking, 'id');
    $vehicle = $manualData['car_model'] ?? trim((string) data_get($booking, 'vehicle_make_model', ''));
    $vehicleType = trim((string) data_get($booking, 'vehicle_type', ''));
    $city = trim((string) data_get($booking, 'city', ''));
    $address = trim((string) data_get($booking, 'street', ''));
    $price = data_get($booking, 'price');
    $date = data_get($booking, 'date');
    $time = data_get($booking, 'time');
    $customerName = $manualData['customer_name'] ?? trim((string) data_get($booking, 'name', ''));
    $customerPhone = trim((string) data_get($booking, 'phone', ''));
    $customerEmail = trim((string) data_get($booking, 'email', ''));
    $sellerName = $manualData['seller_name'] ?? trim((string) data_get($booking, 'seller_name', ''));
    $listingLink = $manualData['listing_link'] ?? trim((string) (data_get($booking, 'advertisement_link') ?? data_get($booking, 'link', '')));
    $desc = trim((string) data_get($booking, 'desc', ''));
    $formattedPrice = is_numeric($price) ? number_format((float)$price, 2, ',', '.') . ' €' : $price;
    $slot = trim(($date ?? '') . ' ' . ($time ?? ''));
    $detailRows = array_filter([
        'Auftragsnummer' => $bookingId,
        'Fahrzeug' => $vehicle ?: $vehicleType,
        'Fahrzeugtyp' => $vehicleType,
        'Ort' => $city,
        'Adresse' => $address,
        'Termin' => $slot ?: null,
        'Preis' => $formattedPrice,
        'Kunde' => $customerName,
        'E-Mail' => $customerEmail,
        'Telefon' => $customerPhone,
        'Verkäufer' => $sellerName,
        'Verkäufer Adresse' => $manualData['seller_address'] ?? trim((string) data_get($booking, 'seller_address', '')) ?: null,
        'Verkäufer Telefon' => $manualData['seller_phone'] ?? trim((string) data_get($booking, 'seller_phone', '')) ?: null,
        'Inserat' => $listingLink,
    ]);
@endphp
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f3f4f6;">
    <tr>
      <td align="center" style="padding:32px 12px;">
        <table role="presentation" class="container" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width:600px; background:#ffffff; border-radius:8px; overflow:hidden;">
          <tr>
            <td style="padding-left:30px; padding-top:25px; padding-bottom:20px; text-align:center; font-family:Arial, Helvetica, sans-serif;">
              <h1 style="margin:0 0 10px; font-size:21px; line-height:1.25; font-weight:600; color:#1f2937;">
                {{ $subjectLine ?? 'Neue Buchung' }}
              </h1>
              <p class="text-muted" style="margin:0; font-size:14px; color:#6b7280;">
              </p>
            </td>
          </tr>

          @if(!empty($customMessage))
          <tr>
            <td class="px-30" style="padding:0 25px 25px; font-family:Arial, Helvetica, sans-serif;">
              <div class="note" style="background:#eef2ff !important; border:1px solid #c7d2fe !important; border-radius:6px; padding:14px 16px;">
                <p style="margin:0; font-size:14px; color:#111827; line-height:1.5;">
                  {!! nl2br(e($customMessage)) !!}
                </p>
              </div>
            </td>
          </tr>
          @endif
          <!-- @if(!empty($desc))
          <tr>
            <td class="px-30" style="padding:0 30px 20px; font-family:Arial, Helvetica, sans-serif;">
              <div style="background:#fff7ed !important; border:1px solid #fbd38d !important; color:#9a3412 !important; border-radius:6px; padding:14px; font-size:13px; line-height:1.45;">
                <strong>Zusätzliche Wünsche:</strong><br>
                {!! nl2br(e($desc)) !!}
              </div>
            </td>
          </tr>
          @endif 

          <tr>
            <td class="p-30" style="padding:8px 30px 20px; text-align:center; font-family:Arial, Helvetica, sans-serif;">
                <p style="font-size:14px; color:#000000; margin:0;">
                Mit freundlichen Grüßen<br>Ihr Team von Carspector
                </p>
            </td>
          </tr> -->
        </table>
      </td>
    </tr>
  </table>
</body>
</html>

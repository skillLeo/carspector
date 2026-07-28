<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; font-size:14px; color:#212529; line-height:1.6;">

    <p>
        Dear {{ $partner->company_name }},
    </p>

    <p>
        We have successfully received your order. We will now begin processing it shortly.
    </p>

    <p>
        <strong>Order Details</strong><br>
        Order ID: {{ $order->orderno ?? '#' . $order->id }}<br>
        Vehicle: {{ $order->vehicle_make_model ?? '—' }}<br>
        Inspection Type: {{ $order->desc ?? '—' }}{{ $order->soh_check ? ' + SoH Check' : '' }}<br>
        Location: {{ $order->b2b_vehicle_location ?? '—' }}<br>
        Country: {{ $order->b2b_vehicle_country ?? '—' }}
    </p>

    <!-- <p>
        You can track this order in your partner portal:<br>
        <a href="{{ url('/b2b/orders') }}">{{ url('/b2b/orders') }}</a>
    </p> -->

    <p>
        Best regards<br>
        Carspector Support Team
    </p>


    <p style="font-size:12px; color:#6c757d;">
        © {{ date('Y') }} Carspector GmbH
    </p>

</body>
</html>
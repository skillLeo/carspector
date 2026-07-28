<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Update — Carspector</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f6f9; font-family: 'Inter', Arial, sans-serif; }
        .wrapper { max-width: 640px; margin: 40px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .header { background-color: #1a1a2e; padding: 28px 40px; text-align: center; }
        .header img { max-height: 46px; }
        .header h1 { color: #ffffff; margin: 10px 0 0; font-size: 18px; font-weight: 600; }
        .alert-banner { background: #0d6efd; color: #fff; text-align: center; padding: 12px; font-size: 14px; font-weight: 600; letter-spacing: 0.3px; }
        .alert-banner.completed { background: #198754; }
        .body { padding: 36px 40px; }
        .section-title { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #6c757d; margin: 28px 0 12px; border-bottom: 1px solid #e9ecef; padding-bottom: 6px; }
        .section-title:first-child { margin-top: 0; }
        table.detail { width: 100%; border-collapse: collapse; }
        table.detail td { padding: 8px 4px; font-size: 14px; color: #212529; vertical-align: top; }
        table.detail td:first-child { font-weight: 600; width: 40%; color: #495057; }
        .status-badge { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 14px; font-weight: 600; background: #0d6efd; color: #fff; }
        .status-badge.completed { background: #198754; }
        .footer-note { background: #f8f9fa; border-top: 1px solid #e9ecef; padding: 20px 40px; font-size: 12px; color: #adb5bd; text-align: center; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <img src="{{ asset('logo-pdf.png') }}" alt="Carspector">
        <h1>Order Status Update</h1>
    </div>
    <div class="alert-banner {{ $newStatus === 'Completed' ? 'completed' : '' }}">
        Status Update — {{ $newStatus }}
    </div>
    <div class="body">

        <p style="font-size:15px; color:#212529; margin:0 0 20px;">
            Dear {{ $partner->company_name }},<br><br>
            We wanted to let you know that the status of your inspection order has been updated.
        </p>

        <div class="section-title">Order Details</div>
        <table class="detail">
            <tr><td>Order ID:</td><td><strong>{{ $order->orderno ?? '#' . $order->id }}</strong></td></tr>
            <tr><td>Vehicle:</td><td>{{ $order->vehicle_make_model ?? ($order->car_name ?? '—') }}</td></tr>
            <tr><td>New Status:</td>
                <td><span class="status-badge {{ $newStatus === 'Completed' ? 'completed' : '' }}">{{ $newStatus }}</span></td>
            </tr>
            @if($order->appointment_date)
            <tr><td>Appointment:</td><td>{{ \Carbon\Carbon::parse($order->appointment_date)->format('d.m.Y') }}{{ $order->appointment_time ? ' at ' . $order->appointment_time : '' }}</td></tr>
            @endif
            @if($newStatus === 'Completed' && $order->pdf_number)
            <tr><td>Report:</td><td>Your inspection report is ready. Please log in to the partner portal to download it.</td></tr>
            @endif
        </table>

    </div>
    <div class="footer-note">
        This is an automated notification from the Carspector Partner Portal.<br>
        &copy; {{ date('Y') }} Carspector.de
    </div>
</div>
</body>
</html>

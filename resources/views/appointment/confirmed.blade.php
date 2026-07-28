<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carspector | Termin bestätigt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>body{background:#f4f6f9;font-family:'Inter',Arial,sans-serif;}</style>
</head>
<body>
<div style="max-width:480px;margin:80px auto;text-align:center;padding:0 16px;">
    <div class="mb-4">
        <img src="{{ asset('logo-pdf.png') }}" alt="Carspector" style="max-height:40px;">
    </div>
    <div class="card p-4" style="border:none;box-shadow:0 2px 12px rgba(0,0,0,0.10);border-radius:12px;">
        <!-- <div style="font-size:48px;">✅</div> -->
        <h4 class="fw-bold mt-3 mb-3">Termin bestätigt</h4>
        <p class="text-muted">
            Vielen Dank! Der Termin für Auftrag <strong>{{ $order->orderno ?? '#'.$order->id }}</strong>
            wurde erfolgreich für den
            <strong>{{ \Carbon\Carbon::parse($order->appointment_date)->format('d.m.Y') }}
            @if($order->appointment_time) um {{ substr($order->appointment_time, 0, 5) }} Uhr @endif</strong>
            bestätigt und in unserem System hinterlegt.<br>
        </p>
    </div>
    <p class="text-muted mt-3" style="font-size:12px;">&copy; {{ date('Y') }} Carspector GmbH</p>
</div>
</body>
</html>

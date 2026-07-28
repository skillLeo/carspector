<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carspector | Anfrage bestätigt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>body{background:#f4f6f9;font-family:'Inter',Arial,sans-serif;}</style>
</head>
<body>
<div style="max-width:480px;margin:80px auto;text-align:center;padding:0 16px;">
    <img src="{{ asset('logo-pdf.png') }}" alt="Carspector" style="max-height:40px;" class="mb-4">
    <div class="card p-4" style="border:none;box-shadow:0 2px 12px rgba(0,0,0,0.10);border-radius:12px;">
        <!-- <div style="font-size:48px;">✅</div> -->
        <!-- <h4 class="fw-bold mt-3 mb-2">Vielen Dank{{ $inspector ? ', '.$inspector->name : '' }}!</h4> -->
         <h4 class="fw-bold mt-3 mb-2">Vielen Dank!</h4>
        <p class="text-muted">
            Wir haben Ihre Zusage für Auftrag <strong>{{ $order->orderno ?? ('#'.$order->id) }}</strong> erhalten.<br><br>
            Sollte der Auftrag zustande kommen, werden wir Sie über die weiteren Details informieren.
        </p>
        <p class="text-muted" style="font-size:13px;">Sie können dieses Fenster jetzt schließen.</p>
    </div>
    <p class="text-muted mt-3" style="font-size:12px;">&copy; {{ date('Y') }} Carspector GmbH</p>
</div>
</body>
</html>

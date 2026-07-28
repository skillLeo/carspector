<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carspector | Termin bestätigen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>body{background:#f4f6f9;font-family:'Inter',Arial,sans-serif;}</style>
</head>
<body>
<div style="max-width:480px;margin:60px auto;padding:0 16px;">
    <div class="text-center mb-4">
        <img src="{{ asset('logo-pdf.png') }}" alt="Carspector" style="max-height:40px;">
    </div>
    <div class="card p-4" style="border:none;box-shadow:0 2px 12px rgba(0,0,0,0.10);border-radius:12px;">
        @if($order->appointment_date)
            <!-- <div style="font-size:48px;text-align:center;margin-bottom:16px;">✅</div> -->
            <h5 class="fw-bold mb-2 text-center">Termin bestätigt</h5>
            <p class="text-muted mb-0" style="font-size:13px;text-align:center;">
                Auftrag {{ $order->orderno ?? '#'.$order->id }} |
                {{ trim(($order->brand ?? '').' '.($order->vehicle_make_model ?? '')) ?: '—' }}<br>
                <strong>Termin: </strong>{{ \Carbon\Carbon::parse($order->appointment_date)->format('d.m.Y') }}
                @if($order->appointment_time) um {{ substr($order->appointment_time, 0, 5) }} Uhr @endif
            </p>
        @else
            <h5 class="fw-bold mb-1">Termin bestätigen</h5>
            <p class="text-muted mb-3" style="font-size:13px;">
                Auftrag {{ $order->orderno ?? '#'.$order->id }} |
                {{ trim(($order->brand ?? '').' '.($order->vehicle_make_model ?? '')) ?: '—' }}
            </p>

            <form method="POST" action="{{ route('appointment.confirm.save', ['order' => $order->id] + request()->query()) }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Datum <span class="text-danger">*</span></label>
                    <input type="date" name="appointment_date" class="form-control" required
                           min="{{ date('Y-m-d') }}" value="{{ old('appointment_date') }}">
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Uhrzeit <span class="text-muted fw-normal">(optional)</span></label>
                    <input type="time" name="appointment_time" class="form-control" value="{{ old('appointment_time') }}">
                </div>
                <button type="submit" class="btn btn-primary w-100">Termin bestätigen</button>
            </form>
        @endif
    </div>
    <p class="text-center text-muted mt-3" style="font-size:12px;">&copy; {{ date('Y') }} Carspector GmbH</p>
</div>
</body>
</html>

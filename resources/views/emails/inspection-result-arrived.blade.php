<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prüfungsergebnis eingegangen</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
        .header { background: #1a56db; color: #fff; padding: 24px 32px; }
        .header h1 { margin: 0; font-size: 20px; }
        .body { padding: 28px 32px; }
        .field { margin-bottom: 10px; }
        .label { font-weight: bold; color: #555; font-size: 13px; }
        .value { font-size: 15px; }
        .doc-table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        .doc-table th { background: #f4f6f9; text-align: left; padding: 8px 10px; font-size: 12px; color: #666; }
        .doc-table td { padding: 8px 10px; font-size: 13px; border-bottom: 1px solid #eee; }
        .badge { display: inline-block; background: #e8f5e9; color: #2e7d32; padding: 2px 8px; border-radius: 12px; font-size: 12px; font-weight: bold; }
        .btn { display: inline-block; background: #1a56db; color: #fff; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: bold; margin-top: 20px; }
        .footer { padding: 16px 32px; background: #f4f6f9; font-size: 12px; color: #888; text-align: center; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>✅ Prüfungsergebnis eingegangen</h1>
    </div>
    <div class="body">
        <p>Ein Prüfungsergebnis wurde automatisch vom Inspektionspartner empfangen und verarbeitet.</p>
        <p>Der Auftrag wurde auf <strong>Fertigstellung</strong> gesetzt und wartet auf eure Überprüfung.</p>

        <div style="background:#f4f6f9; border-radius:6px; padding:16px; margin: 16px 0;">
            <div class="field">
                <div class="label">Auftrags-Nr.</div>
                <div class="value">{{ $order->display_order_number }}</div>
            </div>
            @if($order->vehicle_make_model)
            <div class="field">
                <div class="label">Fahrzeug</div>
                <div class="value">{{ $order->vehicle_make_model }}</div>
            </div>
            @endif
            @if($order->vehicle_type)
            <div class="field">
                <div class="label">Fahrzeugtyp</div>
                <div class="value">{{ $order->vehicle_type }}</div>
            </div>
            @endif
            <div class="field">
                <div class="label">Status</div>
                <div class="value"><span class="badge">Fertigstellung</span></div>
            </div>
        </div>

        @if(count($savedFiles) > 0)
        <p><strong>{{ count($savedFiles) }} Dokument(e) wurden gespeichert:</strong></p>
        <table class="doc-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Typ</th>
                    <th>Gespeichert unter</th>
                </tr>
            </thead>
            <tbody>
                @foreach($savedFiles as $i => $file)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $file['type'] }}</td>
                    <td style="font-family:monospace; font-size:11px; color:#666;">{{ $file['path'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p style="color:#888;">Keine Dokumente wurden übermittelt.</p>
        @endif

        <a href="{{ url('/admin/bookings/' . $order->id) }}" class="btn">Auftrag im Admin öffnen →</a>
    </div>
    <div class="footer">
        Carspector Admin System · Diese E-Mail wurde automatisch generiert.
    </div>
</div>
</body>
</html>

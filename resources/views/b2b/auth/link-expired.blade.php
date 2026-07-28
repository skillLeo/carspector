<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carspector | Link Expired</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f0f2f5; font-family: 'Inter', sans-serif; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .expired-card { width: 100%; max-width: 460px; }
        .expired-card .card { border: none; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.10); overflow: hidden; }
        .expired-card .card-header { background: #1a1a2e; text-align: center; padding: 28px 24px; }
        .expired-card .card-header img { max-height: 46px; }
        .expired-card .card-body { padding: 40px 32px; text-align: center; }
        .icon-wrap { font-size: 52px; color: #dc3545; margin-bottom: 16px; }
        h3 { font-size: 22px; font-weight: 700; color: #1a1a2e; }
        p { color: #6c757d; font-size: 15px; }
    </style>
</head>
<body>
<div class="expired-card">
    <div class="card">
        <div class="card-header">
            <img src="{{ asset('logo-pdf.png') }}" alt="Carspector">
        </div>
        <div class="card-body">
            <div class="icon-wrap">⏱</div>
            <h3>Registration Link Expired</h3>
            <p>
                This invitation link is no longer valid. Registration links expire after
                {{ env('B2B_INVITE_TOKEN_HOURS', 48) }} hours for security.
            </p>
            <p>
                Please contact us.
            </p>
            <a href="mailto:info@carspector.de" class="btn btn-primary mt-2">
                Contact us
            </a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

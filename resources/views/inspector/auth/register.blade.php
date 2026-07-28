<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carspector | Konto einrichten</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background:#f4f6f9; font-family:'Inter',Arial,sans-serif; }
        .register-box { max-width:460px; margin:70px auto; }
        .card { border:none; box-shadow:0 2px 12px rgba(0,0,0,0.10); border-radius:12px; }
        .card-header { background:#0d6efd; border-radius:12px 12px 0 0; }
    </style>
</head>
<body>
<div class="register-box">
    <div class="text-center mb-4">
        <img src="{{ asset('logo-pdf.png') }}" alt="Carspector" style="max-height:40px;">
    </div>
    <div class="card">
        <div class="card-header text-center py-3">
            <h5 class="text-white mb-0">Konto einrichten</h5>
        </div>
        <div class="card-body p-4">
            <p class="text-muted mb-4">
                Willkommen, <strong>{{ $inspector->name }}</strong>!<br>
                Bitte legen Sie ein Passwort fest, um Ihr Konto zu aktivieren.
            </p>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('inspector.register.post', $token) }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">E-Mail</label>
                    <input type="email" class="form-control" value="{{ $inspector->email }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Passwort <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           minlength="8" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <div class="form-text">Mindestens 8 Zeichen.</div>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Passwort bestätigen <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Konto aktivieren &amp; Portal öffnen</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

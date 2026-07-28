<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carspector | Gutachter Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background:#f4f6f9; font-family:'Inter',Arial,sans-serif; }
        .login-box { max-width:420px; margin:80px auto; }
        .card { border:none; box-shadow:0 2px 12px rgba(0,0,0,0.10); border-radius:12px; }
        .card-header { background:#0d6efd; border-radius:12px 12px 0 0; }
    </style>
</head>
<body>
<div style="padding-top: 100px" class="login-box">
    <!-- <div class="text-center mb-4">
        <img src="{{ asset('logo-pdf.png') }}" alt="Carspector" style="max-height:48px;">
    </div> -->
    <div class="card">
        <div class="card-header text-center py-3">
            <h5 class="text-white mb-0">Gutachter Login</h5>
        </div>
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('inspector.login.post') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">E-Mail</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required autofocus>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Passwort</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Anmelden</button>
            </form>
        </div>
    </div>
    <p class="text-center text-muted mt-3" style="font-size:13px;">
        Noch kein Partner? Kontaktiere uns unter <a href="mailto:partner@carspector.de">partner@carspector.de</a>.
    </p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

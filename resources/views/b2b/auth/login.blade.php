<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carspector | Partner Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f0f2f5; font-family: 'Inter', sans-serif; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { width: 100%; max-width: 420px; }
        .login-card .card { border: none; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.10); }
        .login-card .card-header { background: #1a1a2e; border-radius: 12px 12px 0 0; text-align: center; padding: 28px 24px; }
        .login-card .card-header img { max-height: 46px; }
        .login-card .card-header p { color: rgba(255,255,255,0.75); margin: 8px 0 0; font-size: 14px; }
        .login-card .card-body { padding: 32px; }
        .btn-login { background: #0d6efd; color: #fff; font-weight: 600; width: 100%; padding: 12px; }
        .btn-login:hover { background: #0b5ed7; color: #fff; }
        .footer-note { text-align: center; font-size: 12px; color: #adb5bd; margin-top: 20px; }
    </style>
</head>
<body>
<div class="login-card">
    <div class="card">
        <!-- <div class="card-header">
            <img src="{{ asset('logo-pdf.png') }}" alt="Carspector">
            <p>Partner Portal — Sign In</p>
        </div> -->
        <div class="card-body">

        <h5>B2B Partner Login</h5><br>

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show py-2">
                {{ session('error') }}
                <button type="button" class="btn-close btn-close-sm" data-bs-dismiss="alert"></button>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show py-2">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-sm" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <form action="{{ route('b2b.login.post') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="email">Email Address</label>
                    <input type="email" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required autofocus>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold" for="password">Password</label>
                    <input type="password" id="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-login">Log In</button>
            </form>
        </div>
    </div>
    <div class="footer-note">
        Access is by invitation only. Contact <a href="mailto:partner@carspector.de">partner@carspector.de</a> for access.
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

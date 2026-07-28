<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carspector | Activate Account</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f0f2f5; font-family: 'Inter', sans-serif; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .register-card { width: 100%; max-width: 460px; }
        .register-card .card { border: none; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.10); }
        .register-card .card-header { background: #1a1a2e; border-radius: 12px 12px 0 0; text-align: center; padding: 28px 24px; }
        .register-card .card-header img { max-height: 46px; }
        .register-card .card-header p { color: rgba(255,255,255,0.75); margin: 8px 0 0; font-size: 14px; }
        .register-card .card-body { padding: 32px; }
        .welcome-box { background: #e8f4fd; border-left: 4px solid #0d6efd; border-radius: 6px; padding: 14px 18px; margin-bottom: 24px; }
        .welcome-box h5 { margin: 0 0 4px; color: #1a1a2e; font-size: 16px; }
        .welcome-box p { margin: 0; font-size: 13px; color: #495057; }
        .btn-activate { background: #198754; color: #fff; font-weight: 600; width: 100%; padding: 12px; }
        .btn-activate:hover { background: #157347; color: #fff; }
        .password-strength { height: 4px; border-radius: 2px; margin-top: 6px; transition: all .3s; }
    </style>
</head>
<body>
<div class="register-card">
    <div class="card">
        <!-- <div class="card-header">
            <img src="{{ asset('logo-pdf.png') }}" alt="Carspector">
            <p>Partner Portal — Account Setup</p>
        </div> -->
        <div class="card-body">

            <div class="welcome-box">
                <h5>Welcome, {{ $partner->company_name }}!</h5>
                <p>Set a password below to activate your partner portal account.</p>
            </div>

            @if($errors->any())
            <div class="alert alert-danger py-2">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <form action="{{ route('b2b.register.post', $token) }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" id="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           required minlength="8" autofocus>
                    <div class="password-strength bg-secondary" id="pwd-strength"></div>
                    <div class="form-text">Minimum 8 characters.</div>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="form-control" required minlength="8">
                </div>
                <button type="submit" class="btn btn-activate">
                    Activate My Account
                </button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('password').addEventListener('input', function() {
    const bar = document.getElementById('pwd-strength');
    const len = this.value.length;
    if (len === 0)       { bar.style.width = '0'; bar.className = 'password-strength bg-secondary'; }
    else if (len < 8)    { bar.style.width = '33%'; bar.className = 'password-strength bg-danger'; }
    else if (len < 12)   { bar.style.width = '66%'; bar.className = 'password-strength bg-warning'; }
    else                 { bar.style.width = '100%'; bar.className = 'password-strength bg-success'; }
});
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carspector Admin Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <style>
        body {
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #f4f6f9;
        }

        .admin-login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .login-box {
            width: 100%;
            max-width: 430px;
        }

        .login-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .75rem;
            margin-bottom: 1.5rem;
            color: #212529;
            font-size: 1.75rem;
            font-weight: 700;
        }

        .login-logo i {
            color: #0d6efd;
        }

        .login-card {
            border: 1px solid #dee2e6;
            border-radius: .5rem;
            box-shadow: 0 .5rem 1.5rem rgba(33, 37, 41, .08);
        }

        .login-card .card-body {
            padding: 2rem;
        }

        .input-group-text {
            min-width: 46px;
            justify-content: center;
            background: #fff;
        }

        .btn-primary {
            min-height: 44px;
            font-weight: 600;
        }
    </style>
</head>
<body>
<main class="admin-login-page">
    <div class="login-box">
        <div class="login-logo">
            <i class="fas fa-car"></i>
            <span>Carspector</span>
        </div>

        <div class="card login-card">
            <div class="card-body">
                <h1 class="h3 fw-bold mb-1 text-center">Admin Sign In</h1>
                <p class="text-muted text-center mb-4">Access your admin panel</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <div class="input-group">
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="admin@example.com"
                                autofocus
                            >
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            @error('email')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                autocomplete="current-password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password"
                            >
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            @error('password')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot password?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>

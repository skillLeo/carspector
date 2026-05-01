@extends('mainpages.mainadmin')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Profile Settings</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile Settings</li>
        </ol>
    </div>
</div>
@endsection

@section('styles')
<style>
    .profile-settings-page {
        max-width: 1180px;
    }
    .settings-panel {
        border-radius: .5rem;
        overflow: hidden;
    }
    .settings-panel .card-header {
        display: block;
        padding: 1.25rem 1.5rem;
    }
    .settings-panel .card-header h3 {
        display: block;
        font-size: 1.25rem;
        margin-bottom: .25rem;
    }
    .settings-panel .card-header p {
        display: block;
        max-width: 640px;
        line-height: 1.45;
        text-align: left;
    }
    .settings-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0;
    }
    .settings-section {
        padding: 1.5rem;
        border-top: 1px solid #e9ecef;
        border-right: 1px solid #e9ecef;
        min-width: 0;
    }
    .settings-section:nth-child(3n) {
        border-right: 0;
    }
    .settings-section.settings-wide {
        grid-column: span 3;
        border-right: 0;
    }
    .settings-section-title {
        display: flex;
        align-items: center;
        gap: .65rem;
        margin-bottom: 1rem;
        min-width: 0;
    }
    .settings-section-title .icon {
        width: 2.25rem;
        height: 2.25rem;
        border-radius: .5rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #0d6efd;
        background: #e8f0fe;
        flex: 0 0 auto;
    }
    .settings-section-title h4 {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        line-height: 1.25;
        white-space: nowrap;
    }
    .settings-section-title p {
        margin: .15rem 0 0;
        color: #6c757d;
        font-size: .9rem;
        line-height: 1.35;
    }
    .settings-avatar {
        width: 92px;
        height: 92px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #dee2e6;
        background: #f8f9fa;
    }
    .settings-2fa-content {
        max-width: 720px;
    }
    .settings-qr svg {
        max-width: 180px;
        height: auto;
    }
    @media (max-width: 1199.98px) {
        .settings-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        .settings-section:nth-child(3n) {
            border-right: 1px solid #e9ecef;
        }
        .settings-section:nth-child(2n) {
            border-right: 0;
        }
        .settings-section.settings-wide {
            grid-column: span 2;
        }
    }
    @media (max-width: 767.98px) {
        .settings-grid {
            grid-template-columns: 1fr;
        }
        .settings-section,
        .settings-section:nth-child(2n),
        .settings-section:nth-child(3n),
        .settings-section.settings-wide {
            grid-column: auto;
            border-right: 0;
        }
    }
</style>
@endsection

@section('content')
    <div class="profile-settings-page container-xxl">
                <h2 class="mb-7">Admin Profile Settings</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="settings-panel card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">Account Settings</h3>
                            <p class="text-muted mb-0">Manage sign-in, security, and profile details for the admin account.</p>
                        </div>
                    </div>
                    <div class="settings-grid">
                        <section class="settings-section">
                            <div class="settings-section-title">
                                <span class="icon"><i class="fas fa-envelope"></i></span>
                                <div>
                                    <h4>Update Email</h4>
                                    <p>Change the login email address.</p>
                                </div>
                            </div>
                                <form method="post" action="{{ route('admin.profile.settings.email') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    <button class="btn btn-primary">Save</button>
                                </form>
                        </section>

                        <section class="settings-section">
                            <div class="settings-section-title">
                                <span class="icon"><i class="fas fa-lock"></i></span>
                                <div>
                                    <h4>Change Password</h4>
                                    <p>Use a strong account password.</p>
                                </div>
                            </div>
                                <form method="post" action="{{ route('admin.profile.settings.password') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" name="current_password" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>
                                    <button class="btn btn-primary">Update Password</button>
                                </form>
                        </section>

                        <section class="settings-section">
                            <div class="settings-section-title">
                                <span class="icon"><i class="fas fa-user-circle"></i></span>
                                <div>
                                    <h4>Profile Picture</h4>
                                    <p>Upload a visible admin avatar.</p>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <img src="{{ $user->image }}" alt="avatar" class="settings-avatar" onerror="this.onerror=null;this.src='{{ asset('avatar.png') }}';">
                                </div>
                                <form method="post" action="{{ route('admin.profile.settings.picture') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="file" name="picture" class="form-control" accept="image/*" required>
                                    </div>
                                    <button class="btn btn-primary">Upload</button>
                                </form>
                        </section>

                        <section class="settings-section settings-wide">
                            <div class="settings-section-title">
                                <span class="icon"><i class="fas fa-shield-alt"></i></span>
                                <div>
                                    <h4>Two-Factor Authentication</h4>
                                    <p>Admin-only protection using an authenticator app.</p>
                                </div>
                            </div>
                            <div class="settings-2fa-content">
                                @if(!$user->two_factor_enabled)
                                    <p class="text-muted">Enhance security by enabling 2FA using Google Authenticator or Authy.</p>
                                    <form method="post" action="{{ route('admin.profile.settings.2fa.enable') }}" class="mb-5">
                                        @csrf
                                        <button class="btn btn-outline-primary">Enable 2FA</button>
                                    </form>

                                    @if($otpUri)
                                        <div class="mb-4">
                                            <p class="mb-2">Scan this QR with your Authenticator app:</p>
                                            <div class="settings-qr">
                                                @if(!empty($qrSvg))
                                                    {!! $qrSvg !!}
                                                @else
                                                    <code class="d-inline-block p-2">{{ $otpUri }}</code>
                                                @endif
                                            </div>
                                            <div class="mt-2"><small>Or use code: <code>{{ auth()->user()->two_factor_secret }}</code></small></div>
                                        </div>
                                        <form method="post" action="{{ route('admin.profile.settings.2fa.verify') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Enter 6-digit code</label>
                                                <input type="text" name="code" class="form-control" placeholder="123456" required>
                                            </div>
                                            <button class="btn btn-success">Verify & Enable</button>
                                        </form>
                                    @endif
                                @else
                                    <div class="alert alert-success d-flex align-items-center justify-content-between">
                                        <div>
                                            <strong>Enabled</strong> — Two-factor authentication is active on your account.
                                        </div>
                                    </div>
                                    <form method="post" action="{{ route('admin.profile.settings.2fa.disable') }}">
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Disable two-factor authentication?')">Disable 2FA</button>
                                    </form>
                                @endif
                            </div>
                        </section>
                    </div>
                </div>
            </div>
@endsection

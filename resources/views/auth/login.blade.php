@extends('mainpages.master-layout')
@section('title', 'Carspector | Anmelden')
@section('meta_description', 'Logge dich in dein Carspector-Konto ein, um deine Buchungen zu verwalten, den Prüfstatus einzusehen oder neue Checks zu planen.')
@section('header')
    @include('partials.index-header')
@endsection
@section('styles')
<style>
    /*@media screen and (max-width: 678px) {*/
        /*.shadow-1{*/
        /*    box-shadow: none;*/
        /*    padding: 0px !important;*/
        /*}*/
        .form-control.form-control-sm {
            height: 50px;
            font-size: 15px;

        }
        .form-login .form-wrapper, .form-profile .form-wrapper {
            max-width: 450px;
        }
        input.form-control:focus {
    border-color: var(--primary) !important;
    outline: none;
}


    /*}*/

.login-secondary-btn {
    background: #fff !important;
    border: 1px solid #222 !important;
    color: #222 !important;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    padding: 12px 30px;
    line-height: 1.2;
    transition: all .2s ease;
    box-shadow: none !important;
}

.login-secondary-btn:hover {
    background: #f8f8f8 !important;
    border-color: #000 !important;
    color: #000 !important;
}
.additional-logins-box {
    background: #f8f8f8;
    border: 1px solid #e5e5e5;
    border-radius: 12px;
    padding: 20px;
    margin-top: 20px;
}

.additional-logins-title {
    color: #111;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .5px;
    margin-bottom: 15px;
}

.login-secondary-btn {
    background: #fff !important;
    border: 1px solid #222 !important;
    color: #222 !important;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    padding: 12px 24px;
    transition: all .2s ease;
}

.login-secondary-btn:hover {
    background: #5f5f5f !important;
    border-color: #5f5f5f !important;
    color: #fff !important;
}
.additional-logins-box {
    background: #f8f8f8;
    border: 1px solid #e7e7e7;
    border-radius: 14px;
    padding: 18px;
    margin-top: 22px;
}

.additional-logins-title {
    color: #111;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .6px;
    margin-bottom: 14px;
    text-align: center;
}

.additional-logins-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 10px;
}

.additional-login-card {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 14px 15px;
    color: #1f1f1f;
    text-decoration: none;
    transition: all .2s ease;
}

.additional-login-card:hover {
    border-color: var(--primary);
    background: #fff;
    color: #111;
    box-shadow: 0 8px 20px rgba(0,0,0,.06);
}

.additional-login-icon {
    width: 38px;
    height: 38px;
    min-width: 38px;
    border-radius: 9px;
    background: rgba(0,0,0,.06);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    font-size: 17px;
}

.additional-login-card strong {
    display: block;
    font-size: 14px;
    font-weight: 700;
    line-height: 1.25;
}

.additional-login-card small {
    display: block;
    margin-top: 2px;
    font-size: 12px;
    color: #777;
    line-height: 1.3;
}
.additional-logins-box {
    position: relative;
    margin-top: 40px;
    padding: 21px;
    border-radius: 18px;
    background: #f8f9fb;
    border: 1px solid rgba(0,0,0,.06);
}
</style>
    @endsection

@section('content')
    <main class="main-area">

        <!------- login-register-wrapper Start ------->
        <section class="login-area pb-4 pb-md-5">
            <div class="container">
                <div class="contentBox">
                    <div class="login-wrapper">
                        <!-- step-item -->
                        <form class="row form-wrapper mx-auto" action="{{route('login')}}" method="POST">
                            @csrf
                        <div class="login-inner">
                            <div class="step-item--header mb-5">
                                <h2 style="letter-spacing: -1.5px">Anmelden</h2>
                            </div>
                            <div class="form-content">
                                <div class="form-inpus">
                                    <div class="mb-3 input-box">
                                        <input type="email" name="email" class="form-control" placeholder="E-Mail" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd">
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-4 mb-md-5 input-box">
                                        <input type="password" name="password" class="form-control" placeholder="Passwort" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd">
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    @if(Session::has('error'))
                                        <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{\Session::get('error')}}</strong>
                                            </span>
                                    @endif
                                    <div class="form-text text-center pt-2 pt-md-0 pb-4">
                                        <button type="submit" style="border-radius: 5px" class="btn btn-primary w-100">
                                            Anmelden
                                            <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                        </button>

                                        <a href="{{ route('password.request') }}" class="fs-6 link link-gray">
                                            Passwort vergessen?
                                        </a>

                                        <p class="fs-6">
                                            Keinen Account? <a href="{{route('register')}}" class="fs-6 link link-primary">Registrieren</a>.
                                        </p>
                                    </div>
                                    
                                    <div class="additional-logins-box">
                                        <div class="additional-logins-title">
                                            Für Gutachter & Partner
                                        </div>

                                        <div class="additional-logins-grid">
                                            <a href="https://carspector.de/inspector/login" class="additional-login-card">
                                                <span class="additional-login-icon">
                                                    <i class="fa-solid fa-user-check"></i>
                                                </span>
                                                <span>
                                                    <strong>Gutachter Login</strong>
                                                    <small>Zugang für Prüfer & Gutachter</small>
                                                </span>
                                            </a>

                                            <a href="https://carspector.de/partner/login" class="additional-login-card">
                                                <span class="additional-login-icon">
                                                    <i class="fa-solid fa-building"></i>
                                                </span>
                                                <span>
                                                    <strong>B2B-Partner Login</strong>
                                                    <small>Zugang für Partnerunternehmen</small>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- step-item-end -->

                    </div>
                </div>
            </div>
        </section>
        <!------- login-register-wrapper End ------->


    </main>
@endsection

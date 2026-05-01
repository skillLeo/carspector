@extends('mainpages.master-layout')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')
    <main>
        <!-- step-info -->
        <section class="form-area form-login">
            <div class="container-sm">
            <div class="step-item--header ">
                                <h2 style="letter-spacing: -1.5px" class="pt-5">Passwort zurücksetzen</h2>
                            </div>
                <div class="row pt-4">
                    <div class="col-lg-7 mx-auto">
                        <div style="max-width: 600px; margin: 0 auto" class="bg-white rounded-1 py-5 px-lg-5  p-4 pb-5 shadow-1 position-relative">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="row form-wrapper mx-auto" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p class="mb-1 text-black fs-6">E-Mail</p>
                                        <div style="border: 1px solid black; border-radius: 5px" class="input-box">
                                            <input name="email" type="text" class="form-control form-control-sm shadow">
                                        </div>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-box col-12 mb-3">
                                    <!-- Google reCAPTCHA -->
                                    <div class="g-recaptcha" data-sitekey="6LfYSIAqAAAAAE9j6XmbdSe9UAIjo5KQTAplX3qF" data-callback="onRecaptchaSuccess"></div>
                                    @error('g-recaptcha-response')
                                    <div class="invalid-feedback d-block">Bitte bestätigen Sie, dass Sie kein Roboter sind.</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-lg-3">
                                    <div class="mb-0"><br>
                                        <button id="submit-btn" type="submit" disabled style="width: 100%" class="btn btn-primary shadow">Passwort zurücksetzen</button>
                                    </div>
                                    <br><br>Probleme? Kontaktiere unseren <a href="{{route('kontakt')}}">Kundenservice.</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br><br><br><br>
        <!-- step-info-end -->



    </main>
@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    {{--    <script src="https://www.google.com/recaptcha/api.js?render=6Le9SIAqAAAAAEoig5V7Ay4tNWrfZXZusheT4wlL"></script>--}}
    <script>
        function onRecaptchaSuccess() {
            // Enable the submit button when reCAPTCHA is completed
            document.getElementById('submit-btn').disabled = false;
        }
    </script>
@endsection

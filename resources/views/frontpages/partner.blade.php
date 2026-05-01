@extends('mainpages.master-layout')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')


    <main class="main-area">

        <!------- login-register-wrapper Start ------->
        <section class="login-area pb-4 pb-md-5">
            <div class="container">
                <div class="contentBox">
                    <div class="login-wrapper">
{{--                        @if(session('success'))--}}
{{--                            <br><div class="alert alert-success">{{session('success')}}</div>--}}
{{--                        @endif--}}
                        <!-- step-item -->
                        <form action="{{route('booking.send')}}" method="POST">
                            @csrf
                            <div class="login-inner">
                                <div class="step-item--header mb-5">
                                    <h2 style="letter-spacing: -1.5px">Netzwerk beitreten</h2>
                                    <p class="fs-6 pt-3">Du bist Kfz-Gutachter? Trete unserem Netzwerk kostenlos bei und erhalte Aufträge für verschiedene Dienstleistungen!<p>
                                </div>
                                <div class="form-content">
                                    <div class="form-inpus">
                                        <div class="mb-3 input-box">
                                            <input type="text" class="form-control" name="name" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" value="{{old('name')}}" placeholder="Vollständiger Name*">
                                            @error('name')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-box">
                                            <input type="email" name="email"  class="form-control" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" value="{{old('email')}}"  placeholder="E-Mail*">
                                            @error('email')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-box">
                                            <input type="tel" class="form-control" name="phone" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" value="{{old('phone')}}" placeholder="Telefon*">
                                            @error('phone')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-box">
                                            <input type="text" class="form-control" name="catchment_area" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" value="{{old('catchment_area')}}" placeholder="Einzugsgebiet + KM-Umkreis*">
                                            @error('catchment_area')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-box">
                                            <textarea class="form-control" name="desc" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" placeholder="Sonstiges">{{old('desc')}}</textarea>
                                            @error('desc')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div style="margin-bottom: 30px" class="input-box-text">
                                            <p style="font-size: 15px">Pflichtfelder mit * markiert.</p>
                                        </div>

                                        <div class="input-box col-12 mb-3">
                                            <!-- Google reCAPTCHA -->
                                            <div class="g-recaptcha" data-sitekey="6LfYSIAqAAAAAE9j6XmbdSe9UAIjo5KQTAplX3qF" data-callback="onRecaptchaSuccess"></div>
                                            @error('g-recaptcha-response')
                                            <div class="invalid-feedback d-block">Bitte bestätigen Sie, dass Sie kein Roboter sind.</div>
                                            @enderror
                                        </div>
                                        <div class="form-text text-center pt-2 pt-md-0">
                                            <button type="submit" id="submit-btn" disabled class="btn btn-primary w-100">
                                                Kostenlos beitreten
                                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                            </button>

                                            <p class="fs-6">Mit Registrierung akzeptierst du unsere <a class="text-primary" href="https://dev-cs.de/agb">AGB</a> und die <a class="text-primary" href="https://dev-cs.de/datenschutz">Datenschutzerklärung</a>.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- step-item-end -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
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

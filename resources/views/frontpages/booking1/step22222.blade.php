@extends('mainpages.mainfront')
@section('content')
    <!-- main -->
    <main>

        <!-- page-hero -->
        <section class="page-hero page-hero-shap-2 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-hero-step text-center">
                            <ul>
                                <li class="active"><span>1</span></li>
                                <li class="active"><span>2</span></li>
                                <li><span>3</span></li>
                            </ul>
                            <h4 class="text-white">Dein Account</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-hero-end -->

        <!-- form-step -->
        <section class="section booking">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-5 mx-auto">
                        <div class="booking-form">
                            <form action="{{route('booking.step2')}}" method="POST">
                                @csrf
                                <!-- checkout -->
                                <div class="booking-checkout text-center">
                                    <h6 class="mb-3 text-dark">Mit Google anmelden</h6>
                                    <div class="row gx-3">
                                        <div class="col-12">
                                            <a href="{{route('google.login')}}"><button  type="button" class="btn btn-dark w-100"><img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-1024.png" alt="">Google</button></a>
                                        </div>
{{--                                        <div class="col-6">--}}
{{--                                            <button type="button" class="btn btn-yellow w-100"><img src="{{ asset('assets/img/icons/paypal-c.png') }}" alt=""></button>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <!-- checkout-end -->

                                <!-- separetor -->
                                <div class="booking-sep">
                                    <span>oder</span>
                                </div>
                                <!-- separetor-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5">
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/nutzer.png') }}" alt=""></span>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Vollständiger Name">
                                        @error('name')
                                        <span class="invalid-feedback"  style="text-align: left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/email.png') }}" alt=""></span>
                                        <input type="email" {{ old('email') }} class="form-control" name="email" placeholder="E-Mail">
                                        @error('email')
                                        <span class="invalid-feedback"  style="text-align: left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/passwort.png') }}" alt=""></span>
                                        <input type="password" value="{{old('password')}}" name="password" class="form-control border-end-0" placeholder="Passwort">
                                        <span class="input-group-text password-eye"><img src="{{ asset('assets/img/icons/passwort-eye.png') }}" alt=""></span>
                                        @error('password')
                                        <span class="invalid-feedback d-block"  style="text-align: left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/passwort.png') }}" alt=""></span>
                                        <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control border-end-0" placeholder="Passwort wiederholen">
                                        <span class="input-group-text password-eye"><img src="{{ asset('assets/img/icons/passwort-eye.png') }}" alt=""></span>
                                    </div>

                                    <div class="mb-3 input-check">
                                        <input name="terms_and_conditions" type="checkbox" id="check-1">
                                        <label for="check-1">
                                            <span class="check-ind"></span>
                                            <span class="text">Ich akzeptiere die <a href="{{route('agb')}}">AGB</a> und <a href="{{route('datenschutz')}}">Datenschutzerklärung</a>.</span>
                                        </label>
                                        @error('terms_and_conditions')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5 text-center">
                                    <button type="submit" class="btn btn-primary-light w-100 shadow-none mb-4">Konto erstellen und fortfahren</button>
                                    <p>Bereits registriert? <a href="{{route('tologin')}}"> Hier anmelden</a></p>
                                </div>
                                <!-- single-booking-end -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- form-step-end -->

        

    </main>
    <!-- main-end -->
@endsection

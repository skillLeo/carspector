@extends('mainpages.mainfront')
@section('content')
    <main>

        <!-- form-step -->
        <section class="section booking">
            <form method="post" action="{{route('password.store')}}">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 mx-auto">
                            <div class="booking-form">

                                <!-- single-booking -->
                                <div class="booking-form mb-5">
                                    <h5 class="mb-4 text-center">Passwort ändern</h5>

                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/passwort.png') }}" alt=""></span>
                                        <input type="password" name="old_password"  class="form-control border-end-0" placeholder="Altes Passwort">
                                        <span class="input-group-text password-eye"><img src="{{ asset('assets/img/icons/passwort-eye.png') }}" alt=""></span>
                                        @if(session('error'))
                                            <div class="invalid-feedback d-block" style="text-align: left">{{session('error')}}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/passwort.png') }}" alt=""></span>
                                        <input type="password" name="password"  class="form-control border-end-0" placeholder="Neues Passwort">
                                        <span class="input-group-text password-eye"><img src="{{ asset('assets/img/icons/passwort-eye.png') }}" alt=""></span>
                                        @error('password')
                                        <div class="invalid-feedback d-block" style="text-align: left">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/passwort.png') }}" alt=""></span>
                                        <input name="password_confirmation" type="password" class="form-control border-end-0" placeholder="Neues Passwort">
                                        <span class="input-group-text password-eye"><img src="{{ asset('assets/img/icons/passwort-eye.png') }}" alt=""></span>
                                    </div>

                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5 text-center">
                                    <span > <button type="submit" class="btn btn-primary-light w-100 shadow-none mb-lg-5 mb-4">Passwort ändern</button>
                                        <p class="small">
                                                    @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Passwort vergessen?</a>
                                            @endif
                                        </p> </span>
                                </div>
                                <!-- single-booking-end -->

                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </section>
        <!-- form-step-end -->

    </main>
@endsection

@extends('mainpages.mainfront')
@section('content')
    <main>


        <!-- form-step -->
        <section class="section booking">
            <form method="POST" action="{{ route('password.email') }}">
                <div class="container">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 mx-auto">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                            <div class="booking-form">

                                <!-- single-booking -->
                                <div class="booking-form">
                                    <h5 class="mb-5 text-center">Passwort vergessen?</h5>

                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/email.png') }}" alt=""></span>
                                        <input type="email" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control" placeholder="E-Mail">
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5 text-center">
                                    <button type="submit" class="btn btn-primary-light w-100 shadow-none mb-5">Passwort zurücksetzen</button>
                                    <p class="small">Brauchst du Hilfe? Kontaktiere gerne unseren Support unter <a href="mailto:kontakt@carspector.de">kontakt@carspector.de</a></p>
                                </div>

                                <!-- single-booking-end -->

                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </form>
        </section>
        <!-- form-step-end -->


        <!-- booking-footer -->
    </main>
@endsection

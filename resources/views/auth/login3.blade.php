@extends('mainpages.mainfront')
@section('content')
    <main>
        <!-- page-hero -->
        <section class="page-hero page-hero-shap-2 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-hero-step text-center">
                            <h5 class="text-white mb-4">Als Kunde oder Prüfer anmelden</h5>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-hero-end -->

        <!-- form-step -->
        <section class="section booking">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 mx-auto">
                            <div class="booking-form">

                                <!-- single-booking -->
                                <div class="booking-form mb-5"><br><br>
                                    <h5 class="mb-4 text-center">Anmelden</h5>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="assets/img/icons/email.png" alt=""></span>
                                        <input type="email" name="email" class="form-control" placeholder="E-Mail">
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        @if(Session::has('error'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{\Session::get('error')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="assets/img/icons/passwort.png" alt=""></span>
                                        <input type="password" class="form-control border-end-0" name="password" placeholder="Passwort">
                                        <span class="input-group-text password-eye"><img src="assets/img/icons/passwort-eye.png" alt=""></span>
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5 text-center">

                                    <button type="submit" class="btn btn-primary-light w-100 shadow-none mb-lg-5 mb-4">Anmelden</button>

                                    @if (Route::has('password.request'))
                                    <p class="sm"><a href="{{ route('password.request') }}">Passwort vergessen?</a></p>
                                    @endif
                                    <p class="sm">Noch kein Konto? <a href="{{route('register')}}">Hier registrieren</a></p>
                                    
                                    
                                    <br><h5 class="mb-4 text-center">Mit Google anmelden</h5>
                                    <div class="booking-checkout text-center">
                                        <div class="row gx-3">
                                            <div class="col-12">
                                                <a href="{{route('google.login')}}"><button  type="button" class="btn btn-dark w-100"><img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-1024.png" alt="">Mit Google anmelden</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    
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
@section('scripts')

    @if(\Session::has('error'))
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    swal.fire({
        html: "Danke! Wir haben deine Bewerbung erhalten und werden dich zeitnah kontaktieren.",
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Ok",
        customClass: {
            confirmButton: "btn font-weight-bold btn-primary"
        }
    })
</script>
    @endif
@endsection

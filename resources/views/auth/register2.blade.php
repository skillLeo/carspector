@extends('mainpages.mainfront')
@section('content')
    <div class="container-fluid">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>
        <div class="container px-lg-5 py-5 ">
            <div class="row justify-content-center px-3">
                <div class="col-12 rounded col-md-10 col-lg-10 col-xl-10 text-center supportdiv" style="border: 1px solid gray;">
                    <h3 class="fw-bold py-5"> Registrieren</h3>

                    <form action="{{ route('register') }}" class="row g-3 px-lg-5" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <input type="text" name="first_name" placeholder="Vorname" class="form-control" id="inputfirst">
                            @error('first_name')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="last_name" placeholder="Nachname" class="form-control" id="inputlastname">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="email" name="email" placeholder="E-Mail" class="form-control" id="inputEmail4">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="password" name="password"  placeholder="Passwort" class="form-control" id="inputPassword4">
                            @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="password" name="password_confirmation"  placeholder="Passwort wiederholen" class="form-control" id="inputPassword5">

                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Ich akzeptiere die AGB und Datenschutzerklärung.
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary col-12 d-block">Registrieren</button>
                        </div>
                        <div class="col-12">
                            <label class="form-check-label d-block mt-3" for="exampleCheck1">Bereits registriert?<span style="color: #1877F2;">Hier anmelden.</span> </label>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <script src="assests/js/popper.js"></script>
        <script src="assests/js/bootstrap.min.js"></script>
    </div>
@endsection

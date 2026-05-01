@extends('mainpages.mainfront')
@section('content')
    <div class="container-fluid">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>
        <div class="container px-lg-5 py-5 mt-5">
            <div class="row justify-content-center px-2">
                <div class="col-12 rounded col-md-8 col-lg-8 col-xl-8 text-center supportdiv" style="border: 1px solid gray;">
                    <h3 class="fw-bold py-5"> Login</h3>

                    <form class="px-lg-5" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mt-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" style="outline: none; border: 1px solid gray;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-Mail">
                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" style="border: 1px solid gray;" id="exampleInputPassword1" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Einloggen</button>

                        <div class="form-check pb-4">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="btn form-check-label d-block mt-3" >Passwort vergessen?</a>
                           @endif
                            <label class="form-check-label d-block mt-3" >Noch kein Account?<a href="{{route('register')}}" class="btn" style="color: #1877F2;">Jetzt registrieren.</a> </label>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@extends('mainpages.mainfront')
@section('content')
    <div class="container-fluid">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>
    </div>
    <div class="container px-3 px-lg-5 py-5">
        <div class="row  justify-content-center">
            <div class="col-12  rounded col-md-8 col-lg-8 col-xl-8 text-center supportdiv" style="border: 1px solid gray;">
                <h3 class="fw-bold py-4"> Passwort ändern</h3>

                <form class="px-lg-5" method="post" action="{{route('password.store')}}">
                    @csrf
                    <div class="mt-3">
                        <input type="password" name="old_password" class="form-control @if(session('error')) is-invalid @endif" style="border: 1px solid gray;" id="exampleInputPassword1" placeholder="Altes Passwort">
                        @if(session('error'))
                            <div class="invalid-feedback d-block" style="text-align: left">{{session('error')}}</div>
                        @endif
                    </div>
                    <div class="mt-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" style="border: 1px solid gray;" id="exampleInputPassword1" placeholder="Neues Passwort">
                        @error('password')
                        <div class="invalid-feedback d-block" style="text-align: left">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" style="border: 1px solid gray;" id="exampleInputPassword1" placeholder="Neues Passwort wiederholen">
                        @error('password')
                        <div class="invalid-feedback d-block" style="text-align: left">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary col-12 mt-3">Passwort ändern</button>

                    <div class="form-check">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class=" btn form-check-label d-block mt-3" for="exampleCheck1">Passwort vergessen?</a>
                        @endif
                    </div>


                </form>

            </div>
        </div>
    </div>

@endsection

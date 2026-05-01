@extends('mainpages.mainlayout')
@section('content')
    <main>
        <!-- step-info -->
        <section class="form-area form-login">
            <div class="container-sm">
                <div class="mb-5 text-center text-lg-center">
                    <h3 class="fs-4">Registrieren</h3>
                </div>
                <div class="row mb-5 pt-lg-5">
                    <div class="col-lg-7 mx-auto">
                        <div class="bg-white rounded-1 py-5 px-lg-5  p-4 pb-5 shadow-1 position-relative">
                            <form class="row form-wrapper mx-auto" action="{{route('resgitser')}}" method="POST">

                                @csrf
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Vollständiger Name</p>
                                        <div class="input-box">
                                            <input type="text" style="height: 55px" name="name" class="form-control @error('name') is-invalid @enderror form-control-sm shadow">

                                        </div>
                                        @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">E-Mail</p>
                                        <div class="input-box">
                                            <input type="text" style="height: 55px" name="email" class="form-control @error('email') is-invalid @enderror form-control-sm shadow">

                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Telefon</p>
                                        <div class="input-box">
                                            <input type="text" name="phone" class="form-control @error('email') is-invalid @enderror form-control-sm shadow">

                                        </div>
                                        @error('phone')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <p class="mb-0 text-black fs-6">Passwort</p>
                                        <div class="input-box">
                                            <input type="password" style="height: 55px" name="password" class="form-control form-control-sm shadow">
                                        </div>
                                    </div>
                                </div>
                                @if(Session::has('error'))
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{\Session::get('error')}}</strong>
                                            </span>
                                @endif
                                <div class="col-md-12 mb-lg-3">
                                    <div class="mb-0"><br>
                                        <button type="submit" style="height: 55px; font-size: 17px" class="btn btn-secondary shadow">Account erstellen</button>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <br><br>Bereits registriert? <a href="{{ route('login') }}">Hier anmelden.</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- step-info-end -->



    </main>
@endsection

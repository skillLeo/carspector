@extends('mainpages.mainlayout')
@section('content')
    <main class="main position-relative index-2-page" id="home">

        <img src="{{ asset('front/imgs/icons/left-blue-icon.png') }}" alt="Icon" class="position-absolute pli d-none d-sm-block">
        <img src="{{ asset('front/imgs/icons/right-blue-icon.png') }}" alt="Icon" class="position-absolute pri d-none d-sm-block">



        <div id="-form" class="account-info position-relative">
            <div class="container container-sm">
                <div class="row">

                    <div class="col">
                        <div class="contact-form mx-auto">
                            <form action="{{route('examiner.register')}}" method="POST">
                                @csrf
                                <h3>Netzwerk beitreten</h3><br><br>
                                <div class="form-item">
                                    <label for="">Vollständiger Name</label>
                                    <input name="name" value="{{old('name')}}" type="text" class="form-control">
                                    @error('name')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-item">
                                    <label for="">E-Mail</label>
                                    <input name="email" type="email" value="{{old('email')}}" class="form-control">
                                    @error('email')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-item">
                                    <label for="">Telefon</label>
                                    <input type="tel" name="phone" value="{{old('phone')}}" class="form-control">
                                    @error('phone')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-item">
                                    <label for="">Passwort</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="input-checkbox">
                                    <label class="checkbox bounce d-flex gap-2">
                                        <div>
                                            <input name="terms_and_conditions" value="1" type="checkbox" id="input-checkbox">
                                            <svg viewBox="0 0 21 21">
                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                            </svg>
                                        </div>
                                        <p>Ich akzeptiere die <a href="{{route('agb')}}">AGB</a> und <a href="{{route('datenschutz')}}">Datenschutzerklärung.</a></p>
                                    </label>
                                    @error('terms_and_conditions')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div><br>
                                <button type="submit" class="form-submit btn btn-primary w-100 mt-3 mb-4 text-center justify-content-center">Bewerbung abschicken</button>
                                <p class="create-account text-center mt-2">Du hast ein Konto? <a href="{{route('login')}}" class="text-primary text-decoration-none">Anmelden</a></p>
                            </form>
                            <div class="sets-us-apart-form">

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>




        <!------- Question Section Start ------->

        <!------- Question Section End ------->

    </main>
@endsection

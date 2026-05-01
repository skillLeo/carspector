@extends('mainpages.mainlayout')
@section('content')
    <main>
        <!-- step-info -->
        <section class="step-wrap">

            <form action="{{route('booking.step1')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{request('id')}}">
            <div class="container-sm">
                <div class="mb-5 mb-md-5 text-center text-lg-center">
                    <h3 class="fs-4">Nenne uns weitere Informationen</h3>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="position-relative rounded-1 info-wrap">

                            <div class="row mb-2 mb-md-2">
                                <div class="col-12">
                                    <h5>Persönliche Daten</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Dein vollständiger Name<sup class="text-primary">*</sup></p>
                                        <div class="input-box">
                                            <input type="text"  {{auth()->user()?'disabled':''}} value="{{auth()->user()?auth()->user()->name:old('name')}}" name="name" class="form-control form-control-sm shadow">
                                            @error('name')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">E-Mail<sup class="text-primary">*</sup></p>
                                        <div class="input-box">
                                            <input type="text" {{auth()->user()?'disabled':''}}  value="{{auth()->user()?auth()->user()->email:old('email')}}"  name="email" class="form-control form-control-sm shadow">
                                            @error('email')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Telefon<sup class="text-primary">*</sup></p>
                                        <div class="input-box">
                                            <input name="phone"  {{auth()->user()?'disabled':''}} value="{{auth()->user()?auth()->user()->phone:old('phone')}}" type="text" class="form-control form-control-sm shadow">
                                            @error('phone')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-0 mb-lg-4">
                                        <p class="mb-0 text-black fs-6">Passwort für deinen Account<sup class="text-primary">*</sup></p>
                                        <div class="input-box">
                                            <input name="password" {{auth()->user()?'disabled':''}} value="{{old('password')}}" type="password" class="form-control form-control-sm shadow">
                                            @error('password')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @guest()
                                <div class="row mb-1 mb-md-4">
                                    <div class="col-md-12"><span class="mb-1">Bereits registriert?</span><br><a class="btn btn-primary" href="{{route('tologin',request()->all())}}">Hier anmelden</a></div>
                                </div><br>
                            @endguest

                            <div class="row mb-5 mb-md-4">
                                <div class="col-12">
                                    <h5>Infos zum Fahrzeug</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Marke<sup class="text-primary">*</sup></p>
                                        <div class="input-box">
                                            <input name="brand" value="{{old('brand')}}" type="text" class="form-control form-control-sm shadow">
                                            @error('brand')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Modell<sup class="text-primary">*</sup></p>
                                        <div class="input-box">
                                            <input name="vehicle_make_model" value="{{old('vehicle_make_model')}}" type="text" type="text" class="form-control form-control-sm shadow">
                                            @error('vehicle_make_model')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Baujahr</p>
                                        <div class="input-box">
                                            <input name="make_year"  value="{{old('make_year')}}" type="text" class="form-control form-control-sm shadow">
                                            @error('make_year')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-0 mb-lg-4">
                                        <p class="mb-0 text-black fs-6">Link zum Inserat</p>
                                        <div class="input-box">
                                            <input name="link" type="text" value="{{old('link')}}" class="form-control form-control-sm shadow">
                                            @error('link')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h5>Standort des Fahrzeugs</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Adresse<sup class="text-primary">*</sup></p>
                                        <div class="input-box">
                                            <input name="address" value="{{old('address')}}" type="text" class="form-control form-control-sm shadow">
                                            @error('address')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Stadt<sup class="text-primary">*</sup></p>
                                        <div class="input-box">
                                            <input name="city" value="{{request('city')}}" readonly type="text" class="form-control form-control-sm shadow">
                                            @error('city')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 mb-lg-4">
                                        <p class="mb-0 text-black fs-6">Wünsche an die Prüfung</p>
                                        <div class="input-box">
                                            <textarea name="desc" class="form-control shadow" id="" cols="30" rows="20">{{old('desc')}}</textarea>
                                            @error('desc')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-0">
                                        <p class="mb-0 text-black fs-6">Pflichtfelder mit <sup class="text-primary">*</sup> markiert.</p>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" href="" class="btn-next btn btn-secondary btn-further px-5 py-2 fs-5 shadow-1" >weiter</button>
                            <h6 style="padding-top:25px">Nach erfolgter Buchung werden wir Kontakt mit dir aufnehmen, um weitere Details zu klären.</h5>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>
        <!-- step-info-end -->

    </main>
@endsection

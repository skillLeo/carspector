@extends('mainpages.mainlayout')
@section('content')
    <main>
        <!-- step-info -->
        <section class="step-wrap">

            <form action="{{route('booking.step1')}}" class="row form-wrapper mx-auto" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{request('id')}}">
            <div class="container-sm">
                <div class="mb-5 mb-md-5 text-center text-lg-center">
                    <h3 class="fs-4">Nenne uns weitere Informationen</h3>
                </div>
                <div class="row mb-5 pt-lg-5">
                    <div class="col-lg-7 mx-auto">
                        <div class="bg-white rounded-1 py-5 px-lg-5  p-4 pb-5 shadow-1 position-relative">
                            <div>
                                @csrf
                                <div class="row mb-4 mb-md-2">
                                <div class="col-12">
                                    <h5>Persönliche Daten</h5>
                                </div>
                                <div class="">
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
                                <div class="">
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
                                <div class="">
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
                                <div class="">
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
                                    <div class="col-md-12"><span class="mb-1">Bereits registriert?</span><br><a class="btn btn-outline-primary" href="{{route('tologin',request()->all())}}">Hier anmelden</a></div>
                                </div><br>
                            @endguest

                                @if(request('id'))
                                    <div class="row mb-5 mb-md-4">
                                        <div class="col-12">
                                            <h5>Infos zum Fahrzeug</h5>
                                        </div>
                                        <div class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Marke & Modell<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="brand" value="{{old('brand')}}" type="text" class="form-control form-control-sm shadow">
                                                    @error('brand')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Link zum Inserat</p>
                                                <div class="input-box">
                                                    <input name="make_year"  value="{{old('make_year')}}" type="text" class="form-control form-control-sm shadow">
                                                    @error('make_year')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <div class="row mb-5 mb-md-4">
                                        <div class="col-12">
                                            <h5>Infos zum Fahrzeug</h5>
                                        </div>
                                        <div class="">
                                            <div class="mb-3  mb-lg-4">
                                                <p class="mb-0 text-black fs-6">Marke & Modell<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="advertisement_link" type="text" value="{{old('advertisement_link')}}" class="form-control form-control-sm shadow">
                                                    @error('advertisement_link')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="mb-3 mb-lg-4">
                                                <p class="mb-0 text-black fs-6">Telefonnummer des Autoverkäufers<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="seller_phone" type="text" value="{{old('seller_phone')}}" class="form-control form-control-sm shadow">
                                                    @error('seller_phone')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                                <p class="text-black fs-6 m-0">Link zum Inserat</p>
                                                <div class="input-box">
                                                    <input name="make_year"  value="{{old('make_year')}}" type="text" class="form-control form-control-sm shadow">
                                                    @error('make_year')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                    </div>
                                @endif


                            <div class="row">
                                <div class="col-12">
                                    <h5>Standort des Fahrzeugs</h5>
                                </div>
                                <div class="">
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
                                <div class="">
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

                                        <div class="form-check">
                                            <input required style="    margin-top: 2px;" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label mb-0 text-black fs-6" for="flexCheckDefault">
                                             Pflichtfelder mit <sup class="text-primary">*</sup> markiert.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" href="" class="btn-next btn btn-secondary btn-further px-5 py-2 fs-5 shadow-1" >weiter</button>
                            @if(request('id'))
                            <h6 style="padding-top:25px">Nach erfolgter Buchung wird dich dein persönlicher Prüfer kontaktieren, um einen gemeinsamen
                            Termin für deinen Check zu finden.</h6>
                            @else
                            <h6 style="padding-top:25px">Nach erfolgtem Check erhältst du das Gutachten per E-Mail und einen Anruf zur Nachbesprechung.</h6>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>
        <!-- step-info-end -->

    </main>
@endsection

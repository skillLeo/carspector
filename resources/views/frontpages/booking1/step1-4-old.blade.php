@extends('mainpages.mainlayout')
@section('style')
    <style>
        .section-btn {
            height: 46px;
            color: var(--white-color);
            background-color: var(--secondary);
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 17px;
            font-weight: 500;
            font-family: var(--font-1);
            border-radius: 5px;
            box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.25);
            transition: all .25s ease-in-out;
        }
        .section-btn:hover {
            background-color: var(--primary);
        }
    </style>
@endsection
@section('content')
    <div class="step-wrap container top-breadcrumb">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking Step1</li>
            </ol>
        </nav>
    </div>
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
                <div class="row mb-5 pt-lg-5">
                    <div class="col-lg-7 mx-auto">
                        <div class="bg-white rounded-1 py-5 px-lg-5  p-2 pb-5 shadow-1 position-relative">
                            <form class="row form-wrapper mx-auto">
                                @csrf
                                <div class="row mb-2 mb-md-2">
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

                            <div class="row mb-5 mb-md-4">
                                <div class="col-12">
                                    <h5>Infos zum Fahrzeug</h5>
                                </div>
                                <div class="">
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
                                <div class="c">
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
                                <div class="">
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
                                <div class="">
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
                                        <p class="mb-0 text-black fs-6">Pflichtfelder mit <sup class="text-primary">*</sup> markiert.</p>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" href="" class="btn-next btn btn-secondary btn-further px-5 py-2 fs-5 shadow-1" >weiter</button>
                            <h6 style="padding-top:25px">Nach erfolgter Buchung werden wir Kontakt mit dir aufnehmen, um weitere Details zu klären.</h5>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>
        <!-- step-info-end -->

    </main>
@endsection

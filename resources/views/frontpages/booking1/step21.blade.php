@extends('mainpages.mainfront')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>


    </div>

    <div class="container pb-5  px-3" style="margin-top: -15px">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10 col-xl-10" style="border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black" >
                <div class="row ps-3  py-2" style="background-color: #f5f5f5">
                    <div class=" col-lg-5 px-0 mx-0 pt-0 pt-sm-3 pt-md-3 pt-lg-0">
                        <button class="btn rounded-circle text-white" style="background-color: #1877f2;height: 32px;width: 32px;font-size: 12px">1</button>
                        <span class="fw-bold" style="font-size: 12px">Informationen zur Prüfung</span>
                        <span><img src="{{ asset('assests/images/icons/Line%2088.png') }}" class="d-xl-inline-block d-lg-inline-block d-md-none d-none" style="width: 43%;"></span>
                    </div>
                    <div class=" col-lg-4 pt-1 pt-sm-3 pt-md-3 pt-lg-0  px-0 mx-0">
                        <button class="btn rounded-circle mx-0 text-white" style="background-color: #1877f2;height: 32px;width: 32px;font-size: 12px">2</button>
                        <span class="fw-bold" style="font-size: 12px">Informationen zur Prüfung</span>
                        <span><img src="{{ asset('assests/images/icons/Line%2088.png') }}" class="d-xl-inline-block d-lg-inline-block d-md-none d-none" style="width: 38%;"></span>
                    </div>
                    <div class="col-lg-3 px-0 pt-1 pt-sm-3 pt-md-3 pt-lg-0 mx-0">
                        <button class="btn rounded-circle text-white" style="background-color: #6A6A6A;height: 32px;width: 32px;font-size: 12px">3</button>
                        <span class="fw-bold" style="font-size: 12px">Informationen zur Prüfung</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-2 ">
            <div class="col-12 mt-3 col-lg-7 col-xl-7   text-center">
                <h5 class="bold-text">Bereit zu buchen?</h5>
                <h5 class="bold-text">Erstelle einen Account</h5>

                <div class="row px-2 px-lg-5 px-xl-5 justify-content-end">
                    <div class="col-12 col-md-12 col-lg-11 col-xl-11 booking-2   rounded" style="border: 1px solid black;background-color: #F5F5F5">
                        <form action="{{route('booking.step2')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <input type="text" class="form-control input-field-color" value="{{old('first_name')}}" name="first_name" placeholder="Vorname" >
                                    @error('first_name')
                                    <span class="invalid-feedback d-block" style="text-align: left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 pt-3">
                                    <input type="text" class="form-control input-field-color" name="last_name" value="{{old('last_name')}}" placeholder="Nachname" >
                                    @error('last_name')
                                    <span class="invalid-feedback"  style="text-align: left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control input-field-color" placeholder="E-Mail" >
                                    @error('email')
                                    <span class="invalid-feedback"  style="text-align: left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <input type="password" value="{{old('password')}}" name="password" class="form-control input-field-color" placeholder="Passwort" >
                                    @error('password')
                                    <span class="invalid-feedback d-block"  style="text-align: left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 pt-3">
                                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control input-field-color" placeholder="Passwort wiederholen" >
                                    @error('password')
                                    <span class="invalid-feedback d-block"  style="text-align: left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="form-check checkbox-width">
                                        <input class="form-check-input" type="checkbox" value="" >
                                        <label class="form-check-label ms-0 ps-0" >
                                            Ich akzeptiere die AGB und Datenschutzerklärung.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn col-12 text-white" style="background-color: #1877f2">Registrieren</button>
                                </div>
                                <div class="col-12 pt-2 text-start">
                                    <span class=" ">Bereits registriert? <a href="{{route('tologin')}}" class="btn px-0 mx-0 py-0 my-0 pb-1" style="color: #1877f2">Hier anmelden.</a> </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 col-lg-5 col-xl-5 ">
                <div class="row px-2 mx-lg-3 mx-xl-3">
                    <div class="col-12 col-lg-10 col-xl-10 ">
                        <h6 class="fw-bolder text-center">Deine Buchungsübersicht</h6>
                    </div>
                    <div class="col-12 rounded col-lg-10 col-xl-10 mx-lg-0 mx-xl-0 mx-auto" style="border: 1px solid black">
                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Art </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">Gebrauchtwagencheck </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>
                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Prüfer </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$examiner->name}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>

                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Datum </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px"> {{date('d.m.Y',strtotime($booking['date']))}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>

                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Uhrzeit </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$booking['time']}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>


                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Fahrzeug </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$booking['vehicle_make_model']}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>


                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bold" style="font-size: 14px">Adresse der Prüfung </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$booking['street']}} house #{{$booking['house_no']}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>


                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Telefon </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$booking['phone']}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>
                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Preis </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$examiner->price}} € </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn text-white" style="background-color: #1877f2" type="button" id="button-addon2">></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

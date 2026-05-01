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

                    <form action="{{route('examiner.register')}}" class="row g-3 px-lg-5" method="post">
                        @csrf
                        <div class="col-md-6">
                            <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="Vorname" class="form-control @error('first_name') is-invalid @enderror" id="inputfirst">
                            @error('first_name')
                           <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="Nachname" class="form-control @error('last_name') is-invalid @enderror" id="inputlastname">
                            @error('last_name')
                            <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="email" value="{{old('email')}}" placeholder="E-Mail" class="form-control @error('email') is-invalid @enderror" id="">
                            @error('email')
                            <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Telefon" class="form-control @error('phone') is-invalid @enderror" >
                            @error('phone')
                            <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="date" name="dob" value="{{old('dob')}}" placeholder="Geburtsdatum" class="form-control @error('dob') is-invalid @enderror" id="inputEmail4">
                            @error('dob')
                            <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 pt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="password" name="password" value="{{old('password')}}" placeholder="Passwort" class="form-control @error('password') is-invalid @enderror" id="inputPassword4">
                                    @error('password')
                                    <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation"  placeholder="Passwort wiederholen" class="form-control @error('password') is-invalid @enderror" id="inputPassword5">
                                    @error('password')
                                    <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="company_name" value="{{old('company_name')}}" placeholder="Firmenname" class="form-control @error('company_name') is-invalid @enderror">
                            @error('company_name')
                            <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                            @enderror
                        </div>
                       <div class="col-md-12">
                           <div class="row pt-3">
                               <div class="col-md-6">
                                   <input type="text" name="company_address" value="{{old('company_address')}}" placeholder="Firmenadresse" class="form-control @error('company_address') is-invalid @enderror" >
                                   @error('company_address')
                                   <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                                   @enderror
                               </div>
                               <div class="col-md-6">
                                   <input type="text" name="zip_code"  value="{{old('zip_code')}}" placeholder="Postleitzahl" class="form-control @error('zip_code') is-invalid @enderror" >
                                   @error('zip_code')
                                   <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                                   @enderror
                               </div>
                           </div>
                       </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label text-start" for="gridCheck">
                                    Ich akzeptiere die AGB und Datenschutzerklärung. Zusätzlich bestätige ich, dass ich über einen Gewerbeschein verfüge bzw. Angestellter eines Kfz-Sachverständigenbüros bin.
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


    </div>
@endsection

@extends('mainpages.mainlayout')
@section('styles')
    <style>
        /*@media screen and (max-width: 678px) {*/
        /*.shadow-1{*/
        /*    box-shadow: none;*/
        /*    padding: 0px !important;*/
        /*}*/
        .form-control.form-control-sm {
            height: 50px;
            font-size: 15px;

        }
        .form-login .form-wrapper, .form-profile .form-wrapper {
            max-width: 450px;
        }
        .option-box{
            border:1px solid blue !important;
            padding: 10px 5px !important;
        }
        /*}*/
    </style>
@endsection
@section('content')
    <main>
        <!-- step-info -->
        <section class="form-area form-login">
            <div class="container-sm">
                <div class="mb-5 text-center text-lg-center">
                    <h3 class="fs-4">Account erstellen</h3>
                </div>
                <div class="row mb-5 pt-lg-5">
                    <div class="col-lg-7 mx-auto">
                        <div class="bg-white rounded-1 py-5 px-lg-5  p-3 pb-5 shadow-1 position-relative">





                            <form  action="{{route('user.order.register')}}" class="row form-wrapper mx-auto"  method="POST">
                                <input type="hidden" name="id" value="{{request('id')}}">
                                @csrf
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Vollständiger Name</p>
                                        <div class="input-box">
                                            <input type="text" name="name" style="height: 55px" value="{{old('name')?old('name'):$order->name}}" class="form-control @error('name') is-invalid @enderror form-control-sm shadow">

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
                                            <input type="text" value="{{old('email')?old('email'):$order->email}}" {{strlen($order->email)> 3?'readonly':''}} style="height: 55px" name="email" class="form-control @error('email') is-invalid @enderror form-control-sm shadow">

                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-md-12 d-none">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Telefon</p>
                                        <div class="input-box">
                                            <input type="text" name="phone"  value="{{old('phone')}}" class="form-control @error('email') is-invalid @enderror form-control-sm shadow">

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
                                            <input type="password" name="password" style="height: 55px" class="form-control form-control-sm shadow">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <span style="font-size: 14px; color:gray; padding-top: 15px">Mit Registrierung akzeptierst du unsere <a href="{{ route('agb') }}">AGB</a> und die <a href="{{ route('datenschutz') }}">Datenschutzerklärung</a>.</span>
                                @if(Session::has('error'))
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{\Session::get('error')}}</strong>
                                            </span>
                                @endif
                                <div class="col-md-12 mb-lg-3">
                                    <div class="mb-0"><br>
                                        @if(count(request()->all()) > 0)
                                            <button type="submit" style="width: 100%; height: 55px; font-size: 17px" class="btn btn-secondary shadow">Account erstellen und fortfahren</button>
                                        @else
                                            <button type="submit" style="width: 100%; height: 55px; font-size: 17px" class="btn btn-secondary shadow">Account erstellen</button>
                                        @endif
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

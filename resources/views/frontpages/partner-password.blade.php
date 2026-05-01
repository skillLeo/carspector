@extends('mainpages.master-layout')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')
    <main>
        <!-- step-info -->
        <section class="form-area form-login pb-5">
            <div class="container-sm">
                <div class="step-item--header ">
                    <h2 style="letter-spacing: -1.5px" class="pt-5">Partner-Account erstellen</h2>
                </div>
                <div class="row pt-4">
                    <div class="col-lg-7 mx-auto">
                        <div style="max-width: 600px; margin: 0 auto" class="bg-white rounded-1 py-5 px-lg-5  p-4 pb-5 shadow-1 position-relative">
                            <form class="row form-wrapper mx-auto" method="POST" action="{{ route('partner.password.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">E-Mail</p>
                                        <div class="input-box">
                                            <input type="text" style="background-color: #D3D3D3" value="{{ $user->email }}" readonly name="email" class="form-control form-control-sm @error('email') is-invalid @enderror shadow">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Passwort*</p>
                                        <div class="input-box">
                                            <input type="password" name="password" class="form-control form-control-sm shadow">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Passwort wiederholen*</p>
                                        <div class="input-box">
                                            <input type="password" name="password_confirmation" class="form-control form-control-sm shadow">
                                        </div>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div style="margin-bottom: 15px" class="input-box-text">
                                            <p style="font-size: 15px">Pflichtfelder mit * markiert.</p>
                                        </div>

                                <div class="col-md-12 mb-lg-3">
                                    <div class="mb-0"><br>
                                        <button type="submit" style="width: 100%" class="btn btn-primary shadow">Konto erstellen</button>
                                    </div>
                                    <div class="form-text text-center">
                                    <p class="pt-4 fs-6">Mit Registrierung akzeptierst du unsere <a class="text-primary" href="{{route('agb')}}">AGB</a> und die <a class="text-primary" href="{{route('datenschutz')}}">Datenschutzerklärung</a>.</p>

                                            <p class="fs-6">
                                                Bereits registriert? <a href="{{route('login')}}" class="fs-6 link link-primary">Anmelden</a>.
                                            </p>
</div>
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

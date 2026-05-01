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
                                <h2 style="letter-spacing: -1.5px" class="pt-5">Passwort ändern</h2>
                            </div>
                <div class="row pt-4">
                    <div class="col-lg-7 mx-auto">
                        <div style="max-width: 600px; margin: 0 auto" class="bg-white rounded-1 py-5 px-lg-5  p-4 pb-5 shadow-1 position-relative">
                            <form class="row form-wrapper mx-auto" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">E-Mail</p>
                                        <div class="input-box">
                                            <input type="text" style="background-color: #D3D3D3" value="{{ $email ?? old('email') }}" readonly name="email" class="form-control form-control-sm @error('email') is-invalid @enderror shadow">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Neues Passwort</p>
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
                                        <p class="mb-0 text-black fs-6">Bestätige das Passwort</p>
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

                                <div class="col-md-12 mb-lg-3">
                                    <div class="mb-0"><br>
                                        <button type="submit" style="width: 100%" class="btn btn-secondary shadow">Passwort ändern</button>
                                    </div>
                                    <br><br>Probleme? Kontaktiere unseren <a href="{{route('kontakt')}}">Kundenservice.</a>
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

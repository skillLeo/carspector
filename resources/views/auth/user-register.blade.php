@extends('mainpages.master-layout')
@section('title', 'Carspector | Registrieren')
@section('meta_description', 'Erstelle ein kostenloses Konto, buche Fahrzeugchecks und behalte den Überblick über deine Prüfergebnisse – schnell & einfach.')
@section('header')
    @include('partials.index-header')
@endsection
@section('styles')
@endsection
<style>
    input.form-control:focus {  
        border-color: var(--primary) !important;
        outline: none;
    }
</style>
@section('content')
    <main class="main-area">

        <!------- login-register-wrapper Start ------->
        <section class="login-area pb-4 pb-md-5">
            <div class="container">
                <div class="contentBox">
                    <div class="login-wrapper">
                        <!-- step-item -->
                        <form action="{{route('user.order.register')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{request('id')}}">
                        <div class="login-inner">
                            <div class="step-item--header mb-5">
                                <h2 style="letter-spacing: -1.5px">Account erstellen</h2>
                            </div>
                            <div class="form-content">
                                <div class="form-inpus">
                                    <div class="mb-3 input-box">
                                        <input type="text" class="form-control" name="name" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" placeholder="Vollständiger Name*">
                                        @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-box">
                                        <input type="text" name="email" class="form-control" style="pointer-events: none; background-color:rgb(234, 233, 233); box-shadow: none; border: 1px solid #ddd" value="{{old('email')?old('email'):$order->email}}" {{strlen($order->email)> 3?'readonly':''}}  placeholder="E-Mail">
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-box">
                                        <input type="password" name="password" class="form-control" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" placeholder="Passwort*">
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div style="margin-bottom: 30px" class="input-box-text">
                                            <p style="font-size: 15px">Pflichtfelder mit * markiert.</p>
                                        </div>

                                        <div class="form-check mb-3" style="display: flex; align-items: flex-start; gap: 0.6rem;">
                                        <input 
                                            class="form-check-input" 
                                            type="checkbox" 
                                            name="terms" 
                                            id="terms" 
                                            required
                                            style="border-color: gray; transform: scale(1.1); margin-top: 0.25rem; cursor: pointer;"
                                        >
                                        <label 
                                            class="form-check-label small text-muted" 
                                            for="terms"
                                            style="cursor: pointer; line-height: 1.4;"
                                        >
                                            Ich habe die 
                                            <a class="text-primary" href="{{ route('agb') }}">AGB</a> 
                                            und die 
                                            <a class="text-primary" href="{{ route('datenschutz') }}">Datenschutzerklärung</a> 
                                            zur Kenntnis genommen und akzeptiere diese.
                                        </label>
                                    </div>

                                    <div class="form-text text-center pt-2 pt-md-0">
                                        <button type="submit" style="border-radius: 5px" class="btn btn-primary w-100">
                                            Account erstellen
                                            <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                        </button>

                                        <!-- <p class="fs-6">Mit Registrierung akzeptierst du unsere <a class="text-primary" href="{{route('agb')}}">AGB</a> und die <a class="text-primary" href="{{route('datenschutz')}}">Datenschutzerklärung</a>.</p> -->

                                        <p class="fs-6">
                                            Bereits registriert? <a href="{{route('login')}}" class="link link-primary">Anmelden</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- step-item-end -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!------- login-register-wrapper End ------->


    </main>
@endsection

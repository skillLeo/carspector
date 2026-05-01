@extends('mainpages.master-layout')
@section('title', 'Carspector | Anmelden')
@section('meta_description', 'Logge dich in dein Carspector-Konto ein, um deine Buchungen zu verwalten, den Prüfstatus einzusehen oder neue Checks zu planen.')
@section('header')
    @include('partials.index-header')
@endsection
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
        input.form-control:focus {
            border-color: var(--primary) !important;
            outline: none;
        }


        /*}*/
    </style>
@endsection

@section('content')
    <main class="main-area">

        <!------- login-register-wrapper Start ------->
        <section class="login-area pb-4 pb-md-5">
            <div class="container">
                <div class="contentBox">
                    <div class="login-wrapper">
                        <!-- step-item -->
                        <form class="row form-wrapper mx-auto" action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="login-inner">
                                <div class="step-item--header mb-5">
                                    <h2 style="letter-spacing: -1.5px">Anmelden</h2>
                                </div>
                                <div class="form-content">
                                    <div class="form-inpus">
                                        <div class="mb-3 input-box">
                                            <input type="hidden" name="email" value="{{$user->email}}" class="form-control" placeholder="E-Mail" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd">
                                            @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="mb-4 mb-md-5 input-box">
                                            <input type="password" name="password" class="form-control" placeholder="Passwort" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd">
                                            @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        @if(Session::has('error'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{\Session::get('error')}}</strong>
                                            </span>
                                        @endif
                                        <div class="form-text text-center pt-2 pt-md-0">
                                            <button type="submit" style="border-radius: 5px" class="btn btn-primary w-100">
                                                Anmelden
                                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- step-item-end -->

                    </div>
                </div>
            </div>
        </section>
        <!------- login-register-wrapper End ------->


    </main>
@endsection

@extends('mainpages.master-layout')
@section('styles')
    <style>
        .sticky-header {
            position: relative;
            top: 0;
            z-index: 10;
            background-color: #6c757d; /* Sekundäre Hintergrundfarbe */
            color: white;
            padding: 1rem 2rem; /* Mehr Padding für Breite und Höhe */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 17px; /* Größere Schriftgröße */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px; /* Feste Höhe, um breiter zu wirken */
        }

        .sticky-header a {
            text-decoration: none;
            color: white;
            font-weight: bold; /* Betonung auf dem Link */
        }

        .sticky-header a:hover {
            text-decoration: underline;
        }

        @media (max-width: 700px) {
            div.sticky-header {
                display: none !important;
            }

            div.divider {
                display: none !important;
            }
        }




        /* Trennlinie-Styling */
        .divider {
            width: 100%;
            height: 1px;
            background-color: white;
        }

        .mobile-call-btn {
            display: flex; /* Sichtbar machen und zentrieren */
            position: absolute; /* Relative zur umgebenden Box */
            right: 0; /* Direkt an der rechten Seite */
            bottom: 0; /* Direkt am unteren Rand */
            background-color: #28a745; /* Grün */
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%; /* Runde Form */
            font-size: 1.2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); /* Schattierung */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10; /* Über anderen Elementen */
            position: fixed; /* Fixiert am Bildschirmrand */
            right: 15px; /* Abstand zur rechten Wand */
            bottom: 15px; /* Abstand zum unteren Rand */
        }

        .mobile-call-btn:hover {
            background-color:rgb(8, 123, 35); /* Grün */
        }

        #tel .modal-dialog {
            max-width: 300px;
            width: 100%;
            margin: auto;
        }

        #tel .modal-dialog-centered {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .header-submenu-right {
            display: none;
            top: -10px;
            left: 90%;
            margin-left: 10px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            z-index: 1000;
            list-style: none;
            padding: 5px 0;
        }

        .header-submenu-right li {
            padding: 3px 15px;
        }

        .header-submenu-right li a {
            color: var(--primary);
            text-decoration: none;
            white-space: nowrap;
        }

        /* Show the submenu on hover */
        .header-submenu li.position-relative:hover .header-submenu-right {
            display: block;
        }

        .header-submenu li:last-child {
            border-bottom: none; /* Entfernt die letzte Trennlinie */
        }

        /* Styling for the right submenu */
        .header-submenu-right li {
            padding: 3px 15px;
            border-bottom: 1px solid rgba(35, 193, 151, 0.5);
        }

        .header-submenu-right li:last-child {
            border-bottom: none; /* Entfernt die letzte Trennlinie */
        }

        .header-submenu a {
            border-bottom: 1px solid rgba(35, 193, 151, 0.5);
        }

        .no-border a {
            border-bottom: none !important; /* Entfernt die letzte Trennlinie */
        }


        /* Für größere Bildschirme */
        @media (min-width: 768px) { /* Bootstrap Breakpoint für größere Geräte */
            .header {
                height: 90px; /* Kleinere Höhe */
            }

            .header .header-wrapper {
                transform: translateY(-10px); /* Verschiebt den Inhalt leicht nach oben */
            }

            .header .header-logo img {
                height: 40px; /* Falls das Logo zu groß ist */
            }
        }






    </style>
@endsection
@section('header')
    @include('partials.index-header')
@endsection
@section('content')
    <main class="main-area">

        <!------- login-register-wrapper Start ------->
        <section class="login-area pb-4 pb-md-5">
            <div class="container">
                <div class="contentBox">
                    <div class="login-wrapper">
{{--                        @if(session('success'))--}}
{{--                            <br><div class="alert alert-success">{{session('success')}}</div>--}}
{{--                        @endif--}}
                        <!-- step-item -->
                        <form action="{{route('booking.send')}}" method="POST">
                            @csrf
                            <div class="login-inner">
                                <div class="step-item--header mb-5">
                                    <h2 style="letter-spacing: -1.5px">Netzwerk beitreten</h2>
                                    <p class="fs-6 pt-3">Du bist Kfz-Gutachter? Trete unserem Netzwerk kostenlos bei und erhalte Aufträge für verschiedene Dienstleistungen!<p>
                                </div>
                                <div class="form-content">
                                    <div class="form-inpus">
                                        <div class="mb-3 input-box">
                                            <input type="text" class="form-control" name="name" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" value="{{old('name')}}" placeholder="Vollständiger Name*">
                                            @error('name')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-box">
                                            <input type="email" name="email"  class="form-control" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" value="{{old('email')}}"  placeholder="E-Mail*">
                                            @error('email')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-box">
                                            <input type="tel" class="form-control" name="phone" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" value="{{old('phone')}}" placeholder="Telefon*">
                                            @error('phone')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-box">
                                            <input type="text" class="form-control" name="catchment_area" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" value="{{old('catchment_area')}}" placeholder="Einzugsgebiet + KM-Umkreis*">
                                            @error('catchment_area')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-box">
                                            <textarea class="form-control" name="desc" style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd" placeholder="Sonstiges">{{old('desc')}}</textarea>
                                            @error('desc')
                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div style="margin-bottom: 30px" class="input-box-text">
                                            <p style="font-size: 15px">Pflichtfelder mit * markiert.</p>
                                        </div>

                                        <div class="input-box col-12 mb-3">
                                            <!-- Google reCAPTCHA -->
                                            <div class="g-recaptcha" data-sitekey="6LfYSIAqAAAAAE9j6XmbdSe9UAIjo5KQTAplX3qF" data-callback="onRecaptchaSuccess"></div>
                                            @error('g-recaptcha-response')
                                            <div class="invalid-feedback d-block">Bitte bestätigen Sie, dass Sie kein Roboter sind.</div>
                                            @enderror
                                        </div>
                                        <div class="form-text text-center pt-2 pt-md-0">
                                            <button type="submit" id="submit-btn" disabled class="btn btn-primary w-100">
                                                Kostenlos beitreten
                                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                            </button>

                                            <p class="fs-6">Mit Registrierung akzeptierst du unsere <a class="text-primary" href="https://dev-cs.de/agb">AGB</a> und die <a class="text-primary" href="https://dev-cs.de/datenschutz">Datenschutzerklärung</a>.</p>
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
@endsection

        @section('scripts')
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            {{--    <script src="https://www.google.com/recaptcha/api.js?render=6Le9SIAqAAAAAEoig5V7Ay4tNWrfZXZusheT4wlL"></script>--}}
            <script>
                function onRecaptchaSuccess() {
                    // Enable the submit button when reCAPTCHA is completed
                    document.getElementById('submit-btn').disabled = false;
                }
            </script>
@endsection

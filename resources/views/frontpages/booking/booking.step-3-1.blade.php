@extends('mainpages.master-layout')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/bs-brain@2.0.4/tutorials/timelines/timeline-1/assets/css/timeline-1.css">

    <style>



        /* @media (max-width: 575px) {
            .mb-wi {
                width: 350px;
                margin: 0 auto;
                padding-top: 25px !important;
            }
        } */

        .bsb-timeline-1 .timeline>.timeline-item:before {
            counter-increment: section;
            content: " " counter(section); /* Korrekte Syntax */
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            color: white;
            padding: 12px; /* Konsistenz mit anderen Regeln */
            background-color: var(--primary);
        }

        .bsb-timeline-1 .timeline>.timeline-item.tl-green:before {
            background-color: var(--secondary);
        }

        .bsb-timeline-1 .timeline:after {
            background-color: var(--bsb-tl-color);
            bottom: 0;
            content: ""; /* Korrekte Syntax */
            left: 0;
            margin-left: 16px;
            position: absolute;
            top: 0;
            width: 2px;
        }

        .bsb-timeline-1 .timeline>.timeline-item .timeline-content {
            padding: 0 0 1.2rem 2.5rem;
        }

        .btn-ablauf:hover {
            background-color: var(--secondary) !important;
        }

        .bsb-timeline-1 .timeline>.timeline-item .timeline-content {
            padding: 0 0 1.2rem 2.5rem;
        }

        .btn-zah:hover {
            background-color: var(--primary) !important;
            color: white !important;
        }
        body{
            counter-reset: section;
        }

        .form-control.form-control-sm {
            height: 50px;
            font-size: 15px;
            margin-bottom: 15px;
        }


        .form-login .form-wrapper, .form-profile .form-wrapper {
            max-width: 450px;
        }

        @media (min-width: 768px) {
            .df-top {
                padding-top: 30px;
            }
            .bg-c {
                padding-bottom: 40px;
            }
        }

        @media (max-width: 767px) {
            .df-top {
                padding-top: 50px;
            }
            .bg-c {
                padding-bottom: 5px;
            }
        }


        .section-btn {
            border: 0px;
            height: 46px;
            color: black;
            background-color: white;
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


        .exam-card-header-icon {
            margin-right: 15px;
        }

        #city-input.success {
            border: 2px solid var(--secondary);
        }




        .btn-ablauf:hover {
            background-color: var(--secondary) !important;
        }

        .btn-zah:hover {
            background-color: var(--primary) !important;
            color: white !important;
        }
        .btn-check:checked+.btn, .btn.active, .btn.show, .btn:first-child:active, :not(.btn-check)+.btn:active {
            background-color: var(--secondary) !important;
            color: white !important;
        }
        .btn-check:checked+.bntno, .bntno.active, .bntno.show, .bntno:first-child:active, :not(.btn-check)+.bntno:active {
            background-color:#d33131 !important;
            color: white !important;
        }

        .input-box {
            position: relative;
        }

        .input-box label {
            position: absolute;
            top: 32px;
            left: 20px;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            pointer-events: none;
            font-size: 16px;
            color:rgb(150, 149, 149);
        }

        .input-box input:focus + label,
        .input-box input:not(:placeholder-shown) + label {
            padding-top: 45px;
            top: -10px;
            font-size: 12px;
            color: var(--primary);
        }

        .input-box input {
            width: 100%;
            padding: 15px;
            padding-left: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .input-box textarea:focus + label,
        .input-box textarea:not(:placeholder-shown) + label {
            padding-top: 45px;
            top: -10px; /* Mehr Abstand nach oben */
            left: 15px;
            font-size: 12px;
            color: var(--primary);
        }

        .input-box textarea {
            width: 100%;
            height: 40px !important;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            display: flex;
            align-items: center;
            text-align: left; /* Standardmäßig linksbündig */
        }

        .input-box textarea::placeholder {
            text-align: left; /* Placeholder bleibt linksbündig */
        }

        .input-box textarea:focus {
            border-color: var(--primary);
            text-align: left; /* Text bleibt linksbündig bei Eingabe */
        }

        .input-box input:focus {
            border-color: var(--primary);
        }

        .secondary-border {
            border: 2px solid var(--secondary);
            border-radius: 4px;
        }
        .secondary-text {
            color: var(--secondary);
            font-size: 0.9rem;
            display: block;
            text-align: left;
            margin-left: 5px;
            margin-top: -5px;
        }

        .custom-textarea {
            padding-top: 25px !important;
            padding-left: 15px !important;
        }

        #money-back .modal-dialog {
            max-width: 475px;
            width: 100%;
            margin: auto;
        }

        /* Mobile-Styling */
        @media (max-width: 475px) {
            #money-back .modal-dialog {
                max-width: 90%;
                width: 90%;
                margin: auto;
            }
        }

        #money-back .modal-dialog-centered {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .custom-mobile-button {
            background-color: #F0F5FA; /* Leichter blauer Hintergrund */
            color: var(--primary); /* Textfarbe bleibt wie im ursprünglichen Design */
            border: 1px solid; /* Entfernt den Rahmen */
            border-color: var(--primary);
            border-radius: 0px; /* Optional: leichte Abrundung */
            padding: 10px 24px !important; /* Polsterung */
            font-size: 16px; /* Schriftgröße */
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease; /* Sanfter Hover-Effekt */
        }

        .custom-mobile-button:hover {
            background-color: #cceeff; /* Etwas dunklerer blauer Hintergrund beim Hover */
        }

        .custom-mobile-button {
            display: block;
            width: 100%; /* Vollbreite auf Mobilgeräten */
            padding: 12px; /* Polsterung anpassen */
            box-sizing: border-box;
            text-align: center;
        }

        @media (min-width: 769px) {
            .custom-mobile-button {
                max-width: 100% !important; /* Vollbreite auf Mobilgeräten */
            }
        }

        @media (max-width: 768px) {
            .custom-mobile-button {
                max-width: 100% !important; /* Vollbreite auf Mobilgeräten */
            }
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

        @media (max-width: 575px) {
            .heimb {
                height: 65px;
            }
        }

        .countdown-container {
            text-align: center;
            margin: 15px auto;
            background: #f9f9f9;
            padding: 12px 15px;
            border-radius: 10px;
            border: 2px solid #ddd;
            max-width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .countdown-container h2 {
            margin: 0 0 15px;
            font-size: 20px;
            color: #555;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .countdown div {
            text-align: center;
        }

        .countdown div span {
            display: block;
            font-size: 36px;
            font-weight: bold;
            color: #e67e22;
        }

        .countdown div small {
            font-size: 14px;
            color: #999;
            text-transform: uppercase;
        }

        #apply_discount:hover {
            background-color: #ccc !important;
        }

        #discount_code::placeholder {
            color: rgb(150, 149, 149); /* Hellerer Grauton für den Placeholder */
        }

    </style>
@endsection
@section('header')
    <!-- =====Mobile Header Area Start===== -->
    <div class="mobile-menu d-lg-none">
        <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasRight"
             aria-labelledby="offcanvasRightLabel">

            <div class="offcanvas-header align-items-center justify-content-between border-bottom border-white">
                <div class="offcanvas-title fw-normal text-white fw-bold" id="offcanvasExampleLabel">Menü</div>
                <button type="button" class="mobile-menu-close bg-transparent border-0 p-0 text-white"
                        data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="fa-regular fa-xmark"></i>
                </button>
            </div>

            <div class="offcanvas-body">
                <nav class="mobile-nav">
                    <ul>
                        <li class="mobile-nav-item">
                            <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                               aria-controls="collapseExample" class="mobile-nav-link d-flex align-items-center">
                                Leistungen
                                <span class="nav-triangle"></span>
                            </a>

                            <div class="collapse" id="collapseExample">
                                <ul class="mobile-submenu">
                                    <li>
                                        <a href="#">Menu 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Menu 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Menu 3</a>
                                    </li>
                                    <li>
                                        <a href="#">Menu 4</a>
                                    </li>
                                    <li>
                                        <a href="#">Menu 5</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">Prüfungsinhalte</a></li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">Preise</a></li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">FAQ</a></li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">Rezensionen</a></li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">Kontakt</a></li>
                    </ul>
                    <a href="#" class="btn btn-outline header-btn mt-3">
                        Anmelden
                    </a>
                </nav>
            </div>

        </div>
    </div>
    <!-- =====Mobile Header Area End===== -->

    <!-- =====Header Area Start===== -->
    <header class="header bg-primary header-step position-relative z-3">
        <div class="container">
            <div
                class="header-wrapper d-flex flex-wrap align-items-center justify-content-center justify-content-md-between mx-auto position-relative">

                <!-- header-logo -->
                <div class="header-logo">
                    <a href="{{url('/')}}" class="logo d-inline-flex align-items-center gap-3">
                        <img src="{{ asset('theme-1/imgs/logos/logo.png') }}" alt="">
                    </a>
                </div>
                <!-- header-logo-end -->

                <!-- step-navigations -->
                <div class="step-navigation">
                    <button type="button" class="checked">
                        <span class="ind"></span>
                        @if(request('type')=='Auto/ PKW')
                            <span class="text">Auto/ PKW</span>
                        @elseif(request('type')=='transporter' )
                            <span class="text">Transporter</span>
                        @elseif(request('type')=='sportwagen' )
                            <span class="text">Sportwagen</span>
                        @elseif(request('type')=='oldtimer' )
                            <span class="text">Oldtimer</span>
                        @elseif(request('type')=='wohnmobil' )
                            <span class="text">Wohnmobil</span>
                        @elseif(request('type')=='kaufbegleitung' )
                            <span class="text">Kaufbegleitung</span>
                        @endif
                    </button>
                    <button type="button" class="checked">
                        <span class="ind"></span>
                        @if(request('option')=='1')
                            <span class="text">XL</span>
                        @elseif(request('option')=='2')
                            <span class="text">XXL</span>
                        @endif
                    </button>
                    <button type="button" class="current">
                        <span class="ind"></span>
                        <span class="text">Buchung</span>
                    </button>
                </div>
                <!-- step-navigations--end -->

                <div class="milestones d-none d-md-flex flex-column align-items-center text-center">
                    <i class="fas fa-award text-secondary" style="font-size: 1.5rem;"></i>
                    <span class="text-white mt-2">Marktführer 2024</span>
                </div>

            </div>
        </div>
    </header>
@endsection
@section('content')
    <main class="main-area">
        <div class="modal fade" id="tel" tabindex="-1" aria-labelledby="stepDescModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stepDescModalLabel">Kontaktiere uns</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="popupContent" class="pb-2" style="text-align: left;">
                            <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                <i class="fa fa-phone" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                <span style="color: #000; font-size: 1.0em;"><a href="tel:+4921192325550">0211/ 92325550</a></span>
                            </div><br>
                            <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                <i class="fa-brands fa-square-whatsapp" style="color: var(--secondary); font-size: 1.3em; margin-right: 13px; padding-left: 5px"></i>
                                <span style="color: #000; font-size: 1.0em;"><a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20">Auf WhatsApp schreiben</a></span>
                            </div><br>
                            <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                <i class="fa fa-envelope" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                <span style="color: #000; font-size: 1.0em;"><a href="mailto:info@carspector.de">info@carspector.de</a></span>
                            </div><br>
                            <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                <i class="fa fa-message-text" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                <span style="color: #000; font-size: 1.0em;"><a href="{{route('kontakt')}}">Kontaktformular</a></span>
                            </div>
                            <br><br>
                            <div style="display: flex; align-items: center;">
                                <b>Erreichbar:</b>
                                <div style="font-size: 1.0em; display: flex; align-items: center;">
                                    <span>&nbsp;Mo-Sa: 9-20 Uhr</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#tel" data-bs-target="#tel" data-bs-toggle="modal" class=" mobile-call-btn d-flex justify-content-center align-items-center">
            <i class="fas fa-phone"></i>
        </a>


        <div style="background-color: var(--primary); padding: 15px; text-align: center; border-top: 1px solid white; position: sticky; top: 0; z-index: 1000">
            <p style="font-size: 16px; color: white; font-weight: bold; margin: 0;">

                @if(request('option')=='1')
                    @if(request('type')=='Auto/ PKW')
                        Kosten: <span style="color: white;">249 €</span> +
                    @elseif(request('type')=='transporter' )
                        Kosten: <span style="color: white;">299 €</span> +
                    @elseif(request('type')=='sportwagen' )
                        Kosten: <span style="color: white;">299 €</span> +
                    @elseif(request('type')=='oldtimer' )
                        Kosten: <span style="color: white;">299 €</span> +
                    @elseif(request('type')=='wohnmobil' )
                        Kosten: <span style="color: white;">369 €</span> +
                    @elseif(request('type')=='kaufbegleitung' )
                        Kosten: <span style="color: white;">299 €</span> +
                    @endif
                @elseif(request('option')=='2')
                    @if(request('type')=='Auto/ PKW')
                        Kosten: <span style="color: white;">269 €</span> +
                    @elseif(request('type')=='transporter' )
                        Kosten: <span style="color: white;">319 €</span> +
                    @elseif(request('type')=='sportwagen' )
                        Kosten: <span style="color: white;">319 €</span> +
                    @elseif(request('type')=='oldtimer' )
                        Kosten: <span style="color: white;">319 €</span> +
                    @elseif(request('type')=='wohnmobil' )
                        Kosten: <span style="color: white;">399 €</span> +
                    @elseif(request('type')=='kaufbegleitung' )
                        Kosten: <span style="color: white;">329 €</span> +
                    @endif
                @endif

                <span style="text-decoration: line-through; color: #dc3545;">30 €</span> 0 €
                <span style="background-color: var(--secondary); color: white; padding: 2px 5px; border-radius: 3px; margin-left: 5px;">SALE</span>
            </p>
        </div>


        <!------- step-wrapper Start ------->
        <section class="steps-area pb-0 pb-md-5">
            <div class="container">
                <div class="contentBox">
                    <div class="step-wrapper">
                        <!-- step-item -->
                        <div class="step-item">
                            <div class="step-item--header mb-5">
                                <h2 style="letter-spacing: -1.5px" class="mb-4">Nenne uns weitere Informationen
                                </h2>
                                <a href="#step_desc_modal" data-bs-target="#step_desc_modal" data-bs-toggle="modal" class="btn btn-outline-primary">
                                    Ablauf des Checks ansehen
                                    <span class="btn-icon" style="margin-left: 8px; position: relative;">
                                                    <i class="pt-2 fa-regular fa-circle-info" style="font-size: 20px; color: var(--primary);"></i>
                                                </span>
                                </a>




                            </div>

                            <form action="{{route('booking.step1')}}" method="POST">
                                @csrf
                                <div class="step-item-content">
                                    <input type="hidden" name="option" value="{{request('option')}}">
                                    <input type="hidden" name="vehicle_type" class="vehicle_type" value="{{request('type')}}">
                                    <div class="vehicle-infos-wrapper">
                                        <div class="vehicle-info-header">
                                            <h3>Angaben zum Fahrzeug</h3>
                                        </div>
                                        <div class="vehicle-info-body">

                                            <div class="mb-3 input-box">
                                                <input
                                                    type="text"
                                                    name="vehicle_make_model"
                                                    value="{{old('vehicle_make_model')}}"
                                                    class="form-control"
                                                    placeholder=" "
                                                    id="vehicle_make_model" style="box-shadow: none"
                                                >
                                                <label for="vehicle_make_model">Marke & Modell*</label>
                                                @error('vehicle_make_model')
                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 input-box">
                                                <input type="text" class="form-control" name="advertisement_link" value="{{old('advertisement_link')}}" placeholder=" "  style="box-shadow: none">
                                                <label for="vehicle_make_model">Link zum Inserat</label>
                                                @error('advertisement_link')
                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 input-box">
                                                <input type="text" name="address" class="form-control" value="{{old('address')}}" placeholder=" "   style="box-shadow: none">
                                                <label for="vehicle_make_model">Adresse des Fahrzeugs*</label>
                                                @error('address')
                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 input-box">
                                                <input type="text" name="city" class="form-control secondary-border" placeholder=" " id="city-input"  style="box-shadow: none">
                                                <label for="city-input">Stadt oder PLZ*</label>
                                                @error('city')
                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                @enderror
                                                <div id="availability-box" class="availability-box mt-2" style="display: none;">
                                                    <div style="padding-left: 15px; margin-top: 4px; font-size: 14px; color: var(--secondary); display: flex; align-items: center">
                                                        <span style="width: 10px; height: 10px; background-color: var(--secondary); border-radius: 50%; display: inline-block; margin-right: 6px"></span>
                                                        <span>Wir sind in diesem Gebiet verfügbar.</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 input-box">
                                            <textarea
                                                name="desc"
                                                class="form-control custom-textarea"
                                                placeholder=" "
                                                id="desc" style="box-shadow: none">{{old('desc')}}</textarea>
                                                <label for="desc">Wünsche an den Check</label>
                                                @error('desc')
                                                <div class="invalid-feedback d-block">{{$message}}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 input-box">
                                                <select class="form-select" style="color: black; padding-left: 20px; box-shadow: none; border: 1px solid #ccc" aria-label="Default select example">
                                                    <option value="deutsch">Bericht in: Deutsch (Standard)</option>
                                                    <option value="english">Bericht in: Englisch</option>
                                                    <option value="polnisch">Bericht in: Polnisch</option>
                                                </select>
                                                <i class="fa fa-caret-down" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #aaa;"></i>
                                                @error('language')
                                                <div class="invalid-feedback d-block">{{$message}}</div>
                                                @enderror
                                            </div>


                                            <div class="mb-3 input-box">
                                                <input type="text" class="form-control" name="email" value="{{old('email')?old('email'):(auth()->user()?auth()->user()->email:'')}}" placeholder=" " style="box-shadow: none">
                                                <label for="vehicle_make_model">Deine E-Mail-Adresse*</label>
                                                @error('email')
                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                @enderror
                                            </div>
                                            {{--                                        <div class="mb-3 input-box">--}}
                                            {{--                                            <input type="text" class="form-control" name="promo_code" value="{{old('promo_code')}}" placeholder="" style="box-shadow: none">--}}
                                            {{--                                            <label for="promo_code">Promo Code</label>--}}
                                            {{--                                            @error('promo_code')--}}
                                            {{--                                            <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>--}}
                                            {{--                                            @enderror--}}
                                            {{--                                        </div>--}}

                                            <div class="mb-3 input-box">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="discount_code" name="promo_code"
                                                           value="" placeholder="Rabattcode" style="height: 50px; box-shadow: none;">
                                                    <button class="btn btn-sm d-flex align-items-center btn-check-promo-code justify-content-center text-center" type="button"
                                                            id="apply_discount" style="background-color: #eee; color: black; border: 1px solid #ccc; box-shadow: none !important; outline: none !important; padding: 5px 25px;
                                                    min-width: 80px; display: flex; align-items: center; justify-content: center; font-weight: normal; font-size: 16px; letter-spacing: 0.1px">
                                                        Einlösen
                                                    </button>
                                                </div>
                                                <div id="loading" style="display: none; text-align: center; margin-top: 10px;">
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    Wird überprüft...
                                                </div>
                                                <div id="discount_error" class="invalid-feedback" style="display: none">
                                                    Rabattcode ungültig.
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 40px" class="input-box-text">
                                                <p>Pflichtfelder mit * markiert.</p>
                                            </div>


                                        </div>


                                        <div style="text-align: center">
                                            <a href="#money-back"
                                               data-bs-target="#money-back"
                                               data-bs-toggle="modal"
                                               class="custom-mobile-button"
                                               style="padding: 12px 24px; font-size: 16px; display: inline-block; text-align: center;">
                                                <div style="display: flex; align-items: center; justify-content: center; padding-bottom: 2px">
                                                    Geld-Zurück-Garantie
                                                    <span class="btn-icon" style="margin-left: 15px; position: relative;">
                                                    <i class="pt-2 fa-regular fa-circle-info" style="font-size: 20px; color: var(--primary);"></i>
                                                </span>
                                                </div>
                                                <!-- <div style="margin-top: 2px; font-size: 14px; color: var(--secondary); display: flex; align-items: center; justify-content: center; padding-bottom: 3px">
                                                    <span style="width: 10px; height: 10px; background-color: var(--secondary); border-radius: 50%; display: inline-block; margin-right: 6px"></span>
                                                    <span>Aktiv</span>
                                                </div> -->
                                            </a>
                                        </div>

                                        <div class="pt-3 vehicle-info-bottom">
                                            <button type="submit" class="heimb btn btn-secondary">
                                                Jetzt buchen
                                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                            </button>

                                            <p>
                                                <i style="color: var(--secondary)" class="fa-solid fa-lock-keyhole"></i>
                                                Sichere Zahlungsabwicklung
                                            </p>

                                            <div class="countdown-container">
                                                <h2>Angebot endet in:</h2>
                                                <div class="countdown" id="countdown">
                                                    <div>
                                                        <span id="days">0</span>
                                                        <small id="days-label">Tage</small>
                                                    </div>
                                                    <div>
                                                        <span id="hours">0</span>
                                                        <small id="hours-label">Stunden</small>
                                                    </div>
                                                    <div>
                                                        <span id="minutes">0</span>
                                                        <small id="minutes-label">Minuten</small>
                                                    </div>
                                                    <div>
                                                        <span id="seconds">0</span>
                                                        <small id="seconds-label">Sekunden</small>
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- <div class="hero-counter-wrapper d-flex justify-content-center align-items-center gap-3 pt-3">
                                                <div class="counter-clients d-inline-flex align-items-center">
                                                    <div class="counter-client-img border border-2 border-white shadow">
                                                        <img src="assets/imgs/client/client-3.jpg" alt="Client"
                                                             class="w-100 h-100">
                                                    </div>
                                                    <div class="counter-client-img border border-2 border-white shadow">
                                                        <img src="assets/imgs/client/client-2.jpg" alt="Client"
                                                             class="w-100 h-100">
                                                    </div>
                                                    <div class="counter-client-img border border-2 border-white shadow">
                                                        <img src="assets/imgs/client/client-1.jpg" alt="Client"
                                                             class="w-100 h-100">
                                                    </div>
                                                </div>

                                                <div class="counter-content text-start">
                                                    <p class="counter-text fw-bold text-primary d-block fs-4"><span
                                                            class="">2.500</span> +</p>
                                                    <p class="counter-info text-primary">zufriedene Kunden</p>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- step-item-end -->
                    </div>
                </div>
            </div>
        </section>
        <!------- step-wrapper End ------->

        @if(request('type')=='kaufbegleitung')
            <div class="modal" id="step_desc_modal" tabindex="-1" aria-modal="true" role="dialog">
                <div class="pt-3 modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Check-Ablauf</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Timeline 1 - Bootstrap Brain Component -->
                            <section class="bsb-timeline-1">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-12 col-xl-12">

                                            <ul class="timeline">
                                                <li class="timeline-item">
                                                    <div class="timeline-body">
                                                        <div class="timeline-content">
                                                            <div style="max-width: 415px !important" class="card border-0">
                                                                <div class="card-body p-0">
                                                                    <h4 class="card-title" style="font-size: 20px; padding-top: 5px; padding-left: 20px">Infos und Buchung</h4>
                                                                    <p class="card-text" style="padding-left: 20px">Teile uns alle relevanten Informationen zum Fahrzeug mit und schließe die Buchung bequem ab.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-body">
                                                        <div class="timeline-content">
                                                            <div style="max-width: 415px !important" class="card border-0">
                                                                <div class="card-body p-0">
                                                                    <h4 class="card-title" style="font-size: 20px; padding-top: 5px; padding-left: 20px">Kontaktaufnahme</h4>
                                                                    <p class="card-text" style="padding-left: 20px">Unser Prüfer nimmt direkt Kontakt mit dir auf, um einen passenden Termin zur Fahrzeugbesichtigung zu vereinbaren.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-body">
                                                        <div class="timeline-content">
                                                            <div style="max-width: 415px !important" class="card border-0">
                                                                <div class="card-body p-0">
                                                                    <h4 class="card-title" style="font-size: 20px; padding-top: 5px; padding-left: 20px">Check des Fahrzeugs</h4>
                                                                    <p class="card-text" style="padding-left: 20px">Wir treffen dich am Fahrzeug, führen in deiner Anwesenheit eine umfassende Prüfung durch und beantworten gerne all deine Fragen.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item tl-green">
                                                    <div class="timeline-body">
                                                        <div class="timeline-content">
                                                            <div style="max-width: 415px !important" class="card border-0">
                                                                <div class="card-body p-0">
                                                                    <h4 class="card-title" style="font-size: 20px; padding-top: 5px; padding-left: 20px">Abschlussgespräch</h4>
                                                                    <p class="card-text" style="padding-left: 20px">Vor Ort erhältst du eine fundierte Kaufempfehlung, eine realistische Preiseinschätzung und das zertifizierte Gutachten.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul><br>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="modal" id="step_desc_modal" tabindex="-1" aria-modal="true" role="dialog">
                <div class="mb-wi pt-3 modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Check-Ablauf</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Timeline 1 - Bootstrap Brain Component -->
                            <section class="bsb-timeline-1">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-12 col-xl-12">

                                            <ul class="timeline">
                                                <li class="timeline-item">
                                                    <div class="timeline-body">
                                                        <div class="timeline-content">
                                                            <div style="max-width: 415px !important" class="card border-0">
                                                                <div class="card-body p-0">
                                                                    <h4 class="card-title" style="font-size: 20px; padding-top: 5px; padding-left: 20px">Infos und Buchung</h4>
                                                                    <p class="card-text" style="padding-left: 20px">Teile uns alle relevanten Informationen zum Fahrzeug mit und schließe die Buchung bequem ab.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-body">
                                                        <div class="timeline-content">
                                                            <div style="max-width: 415px !important" class="card border-0">
                                                                <div class="card-body p-0">
                                                                    <h4 class="card-title" style="font-size: 20px; padding-top: 5px; padding-left: 20px">Kontakt zum Verkäufer</h4>
                                                                    <p class="card-text" style="padding-left: 20px">Wir setzen uns mit dem Verkäufer in Verbindung und vereinbaren schnellstmöglich einen Termin zur Besichtigung.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-body">
                                                        <div class="timeline-content">
                                                            <div style="max-width: 415px !important" class="card border-0">
                                                                <div class="card-body p-0">
                                                                    <h4 class="card-title" style="font-size: 20px; padding-top: 5px; padding-left: 20px">Check des Fahrzeugs</h4>
                                                                    <p class="card-text" style="padding-left: 20px">Wir führen vor Ort eine umfassende Prüfung des Fahrzeugs durch und erstellen ein zertifiziertes Gutachten.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item tl-green">
                                                    <div class="timeline-body">
                                                        <div class="timeline-content">
                                                            <div style="max-width: 415px !important" class="card border-0">
                                                                <div class="card-body p-0">
                                                                    <h4 class="card-title" style="font-size: 20px; padding-top: 5px; padding-left: 20px">Zusendung des Gutachtens</h4>
                                                                    <p class="card-text" style="padding-left: 20px">Wir senden dir das Prüfergebnis inklusive detaillierter Bilder, damit du eine fundierte und sichere Kaufentscheidung treffen kannst.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul><br>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="modal fade" id="money-back" tabindex="-1" aria-labelledby="stepDescModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stepDescModalLabel">Geld-Zurück-Garantie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sollte die geplante Besichtigung nicht stattfinden, wird der vollständige Betrag an dich zurückerstattet.</p>
                        <br>
                        <div style="display: flex; align-items: center;">
                            <b>Für deine Buchung:</b>
                            <div style="margin-left: 10px; font-size: 14px; color: var(--secondary); display: flex; align-items: center;">
                                <span style="width: 10px; height: 10px; background-color: var(--secondary); border-radius: 50%; display: inline-block; margin-right: 6px"></span>
                                <span>Aktiv</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('city-input').addEventListener('blur', function () {
                const availabilityBox = document.getElementById('availability-box');
                if (this.value.trim() !== '') {
                    availabilityBox.style.display = 'block';
                    this.style.border = '2px solid var(--secondary)';
                } else {
                    availabilityBox.style.display = 'none';
                    this.style.border = '';
                }
            });


            // Feste Endzeit für den Countdown (z. B. 5 Tage ab dem heutigen Datum)
            const fixedEndDate = new Date("2025-02-15T23:59:59"); // Endzeitpunkt festlegen

            function updateCountdown() {
                const now = new Date();
                const timeLeft = fixedEndDate - now;

                if (timeLeft <= 0) {
                    document.querySelector('.countdown-container').innerHTML = "<h3>Das Angebot ist abgelaufen!</h3>";
                    clearInterval(interval);
                    return;
                }

                const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                document.getElementById('days').textContent = days;
                document.getElementById('hours').textContent = hours;
                document.getElementById('minutes').textContent = minutes;
                document.getElementById('seconds').textContent = seconds;

                // Plural- oder Singularformen korrekt setzen
                document.getElementById('days-label').textContent = days === 1 ? "Tag" : "Tagen";
                document.getElementById('hours-label').textContent = hours === 1 ? "Stunde" : "Stunden";
                document.getElementById('minutes-label').textContent = minutes === 1 ? "Minute" : "Minuten";
                document.getElementById('seconds-label').textContent = seconds === 1 ? "Sekunde" : "Sekunden";
            }

            // Countdown jede Sekunde aktualisieren
            const interval = setInterval(updateCountdown, 1000);
            updateCountdown();

        </script>

    </main>

@endsection
@section('scripts')
    <script>
        $(document).on('click','.btn-check-promo-code',function(e){
            $('#loading').show();
            $.ajax({
                url:'{{route('promo.check')}}',
                type:"GET",
                data:{
                    promo_code:$('#discount_code').val(),
                },
                success:function(data){
                    $('#loading').hide();
                    if(data.success){
                        $('#discount_error').html('<i style="color: var(--secondary); padding-right: 3px" class="fa fa-check"></i> <span class="success-message">Rabattcode wurde aktiviert und wird im nächsten Schritt verrechnet.</span>');
                        $('#discount_error').show();
                        $('#discount_code').addClass('valid-discount');
                    }else {
                        $('#discount_error').text("Rabattcode ungültig.");
                        $('#discount_error').show();
                        $('#discount_code').removeClass('valid-discount');
                    }
                },
                error:function(error){

                }

            })
        })
    </script>

    <style>
        .success-message {
            color: var(--secondary);
        }
        .valid-discount {
            border: 1.5px solid var(--secondary) !important;
        }

    </style>

@endsection

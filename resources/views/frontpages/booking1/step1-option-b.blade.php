@extends('mainpages.mainlayout')
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/tutorials/timelines/timeline-1/assets/css/timeline-1.css">
<script>
document.addEventListener('DOMContentLoaded', function () {
    var cityInput = document.getElementById('city-input');
    var availabilityMessage = document.getElementById('availability-message');

    cityInput.addEventListener('blur', function () {
        // Überprüfe, ob der User etwas eingegeben hat
        if (cityInput.value.trim() !== '') {
            // Füge die Klasse für die grüne Umrandung hinzu
            cityInput.classList.add('success');
            // Zeige die Nachricht an
            availabilityMessage.style.display = 'block';
        }
    });

    cityInput.addEventListener('input', function () {
        // Entferne die grüne Umrandung und Nachricht, wenn der User die Eingabe ändert
        cityInput.classList.remove('success');
        availabilityMessage.style.display = 'none';
    });
});
    </script>

    <style>
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


        .btn-f {
            height: 60px !important;
            background-color: var(--secondary) !important;
            color: white !important;
        }

        .btn-f:hover {
            background-color: var(--primary) !important;
        }

        .btn-nf {
            height: 50px !important;
            background-color: white !important;
            color: black !important;
            border: 2px solid #d33131 !important;
        }

        .btn-nf:hover {
            background-color: #d33131 !important;
            color: white !important;
        }

        .exam-card-header-icon {
            margin-right: 15px;
        }

        #city-input.success {
            border: 2px solid var(--secondary);
        }
        .bsb-timeline-1 .timeline>.timeline-item:before{
            counter-increment: section;
            content: ""counter(section)"";
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            color: white;
            padding: 11px;
            background-color: var(--primary);
        }

        .bsb-timeline-1 .timeline:after {
            background-color: var(--bsb-tl-color);
            bottom: 0;
            content: "";
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

        .btn-zah:hover {
            background-color: var(--primary) !important;
            color: white !important;
        }

    </style><style>
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

        .bsb-timeline-1 .timeline>.timeline-item:before {
            counter-increment: section;
            content: ""counter(section)"";
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            color: white;
            padding: 12px;
            background-color: var(--primary);
        }

        .bsb-timeline-1 .timeline>.timeline-item.tl-green:before {
            background-color: var(--secondary);
        }

        .bsb-timeline-1 .timeline:after {
            background-color: var(--bsb-tl-color);
            bottom: 0;
            content: "";
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


    </style>
@endsection
@section('content')
<section class="bg-c" style="background-color: #f0f5fa">
    <div class="step-wrap container top-breadcrumb">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            @if(request('option')==1)
            <li class="breadcrumb-item"><a href="{{url('')}}">Carspector</a></li>
            <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Fahrzeugtyp</a></li>
            <li class="breadcrumb-item"><a href="{{route('examiner.check',['city'=>request('city')])}}">Auto</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buchung</li>
                @elseif(request('type')=='')
            <li class="breadcrumb-item"><a href="{{url('')}}">Carspector</a></li>
            <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Fahrzeugtyp</a></li>
            <li class="breadcrumb-item"><a href="{{route('examiner.check',['city'=>request('city')])}}">Auto</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buchung</li>
            @elseif(request('type')=='transporter')
            <li class="breadcrumb-item"><a href="{{url('')}}">Carspector</a></li>
            <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Fahrzeugtyp</a></li>
            <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Transporter</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buchung</li>
                @elseif(request('type')=='oldtimer')
            <li class="breadcrumb-item"><a href="{{url('')}}">Carspector</a></li>
            <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Fahrzeugtyp</a></li>
            <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Oldtimer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buchung</li>
                @elseif(request('type')=='sportwagen')
            <li class="breadcrumb-item"><a href="{{url('')}}">Carspector</a></li>
            <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Fahrzeugtyp</a></li>
            <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Sportwagen</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buchung</li>
            @endif
            </ol>
        </nav>
    </div>
    <main>
    <input type="hidden" name="option" value="{{request('option')}}">
                @csrf
                <input type="hidden" name="id" value="{{request('id')}}">
            <div class="df-top mb-5 mb-md-3 text-center text-lg-center">

                @if(request('option')==1)
                    <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">All-Around-Check</h3>
                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.8 (834 Bewertungen)
                        </p>
                @elseif(request('option')==2)
                        <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">Kaufbegleitung</h3>
                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.7 (223 Bewertungen)
                        </p>
                @elseif(request('type')=='transporter')
                    @if(request('option')==5)
                        <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">Transporter Kaufbegleitung</h3>
                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.7 (223 Bewertungen)
                        </p>
                    @else
                        <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">Transporter-Check</h3>
                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.7 (210 Bewertungen)
                        </p>
                    @endif
                @elseif(request('type')=='oldtimer')
                    @if(request('option')==5)
                        <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">Oldtimer Kaufbegleitung</h3>
                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.7 (223 Bewertungen)
                        </p>
                    @else
                        <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">Oldtimer-Check</h3>
                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.8 (226 Bewertungen)
                        </p>
                    @endif
                @elseif(request('type')=='sportwagen')
                    @if(request('option')==5)
                        <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">Sportwagen Kaufbegleitung</h3>
                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.7 (223 Bewertungen)
                        </p>
                        <nav>
                    @else
                        <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">Sportwagen-Check</h3>
                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.7 (378 Bewertungen)
                        </p>
                        <nav>
                    @endif
                @endif

                <br><button type="button" data-bs-target="#step_desc_modal" data-bs-toggle="modal" style="width: 300px; height: 50px; font-size: 16px; background-color: var(--primary); color: white" class="btn btn-ablauf btn-primary shadow">Ablauf ansehen</button>

        </div>
    </section>

        <!-- step-info -->
        <section class="step-wrap">

            <form action="{{route('booking.step1')}}" id="booking_form" class="row form-wrapper mx-auto" method="POST">
                <input type="hidden" name="option" value="{{request('option')}}">
                <input type="hidden" name="vehicle_type" class="vehicle_type" value="{{request('type')}}">
                @csrf
                <input type="hidden" name="id" value="{{request('id')}}">
                <div class="container-sm">




                    <div class="row mb-5 pt-lg-5">
                        <div class="col-lg-7 mx-auto">
                            <div class="bg-white step-card rounded-1 py-4 px-lg-4 p-3 pb-4 shadow-1 position-relative">

                            @if(request('option')==1 || request('option')==2)
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="https://dev-cs.de/assets/imgs/iconadv/settings.png" alt="kilometerstand check prüfung tachomanipulation">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: 550; padding-top: 13px; padding-left: 0px">FIN-Abfrage dazu buchen?</p>
                                </div>
                                <div style="text-align: left; font-size: 17px" class="exam-card-body">
                                    Wir nutzen die FIN (Fahrgestellnummer) und fragen beim Hersteller und bei der DAT zusätzlich folgende Dinge an:
                                </div>
                                <div style="padding-top: 15px" id="multiCollapseExample1" class="multi-collapse show d-lg-block">
                                    <ul class="mb-4">
                                        <li>
                                            <span class="icon"><img src="https://dev-cs.de/front/imgs/icons/check-faq.png" alt="auto pkw vor dem kauf prüfen lassen" height="25px"></span>
                                            Fahrzeughistorie
                                        </li>
                                        <li>
                                            <span class="icon"><img src="https://dev-cs.de/front/imgs/icons/check-faq.png" alt="transporter kleintransporter prüfung" height="25px"></span>
                                            Unfallberichte
                                        </li>
                                        <li>
                                            <span class="icon"><img src="https://dev-cs.de/front/imgs/icons/check-faq.png" alt="transporter kleintransporter prüfung" height="25px"></span>
                                            Wartungsprotokolle
                                        </li>
                                        <li>
                                            <span class="icon"><img src="https://dev-cs.de/front/imgs/icons/check-faq.png" alt="transporter kleintransporter prüfung" height="25px"></span>
                                            Tachostand
                                        </li>
                                        <li>
                                            <span class="icon"><img src="https://dev-cs.de/front/imgs/icons/check-faq.png" alt="transporter kleintransporter prüfung" height="25px"></span>
                                            Ausstattungsliste
                                        </li>
                                        <li>
                                            <span class="icon"><img src="https://dev-cs.de/front/imgs/icons/check-faq.png" alt="transporter kleintransporter prüfung" height="25px"></span>
                                            Diebstahlüberprüfung
                                        </li>
                                        <li>
                                            <span class="icon"><img src="https://dev-cs.de/front/imgs/icons/check-faq.png" alt="transporter kleintransporter prüfung" height="25px"></span>
                                            ...
                                        </li>
                                    </ul>
                                </div>
                                <input type="radio" checked="" class="btn-check btn-yes" value="1" name="vin_chasis" id="vin_chasis_1" autocomplete="off">
                                <label class="section-btn btn" style="width: 49%; height: 50px" for="vin_chasis_1">Ja + 20 €</label>
                                <input type="radio" class="btn-check bntno btn-no" value="0" name="vin_chasis" id="vin_chasis_2" autocomplete="off">
                                <label class="btn section-btn bntno " style="width: 49%; height: 50px" for="vin_chasis_2">Nein, danke</label>
                                <span style="padding-bottom: 30px"></span>
                                <br>
                                <br>
                                <hr>

                            @endif


                                    <!--<div class="exam-card-header">
                                        <div class="exam-card-header-icon">
                                            <img src="{{ asset('assets/imgs/iconadv/settings.png') }}" alt="kilometerstand check prüfung tachomanipulation">
                                        </div><p style="text-align: left; font-size: 19px; font-weight: 550; padding-top: 12px; padding-left: 0px">Kostenermittlung</p>
                                    </div>-->

                                    <!-- <div class="">
                                                <div class="mb-3">
                                                <div class="col-12">
                                                <h5 style="font-weight: 550">Fahrzeugwert wählen</h5>
                                            </div>

                                                    <div class="input-box">
                                                        <select class="form-select form-select-md form-select-type shadow vehicle_value" style="height: 55px; color: gray; font-size: 15px" name="vehicle_value">
                                                            @if(request('type')=='transporter')
                                                                <option value="max_30.000">unter 50.000 €</option>
                                                                <option value="max_50.000">über 50.000 €</option>
                                                                @elseif(request('type')=='oldtimer')
                                                                <option value="max_30.000">unter 50.000 €</option>
                                                                <option value="max_50.000">über 50.000 €</option>
                                                                @elseif(request('type')=='sportwagen')
                                                                <option value="max_30.000">unter 100.000 €</option>
                                                                <option value="max_50.000">über 100.000 €</option>
                                                            @else

                                                            <option value="max_30.000">unter 50.000 €</option>
                                                            <option value="max_50.000">50.000 € - 100.000 €</option>
                                                            <option value="max_70.000">über 100.000 €</option>
                                                            @endif
                                                        </select>
                                                        @error('type')
                                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                    <div style="text-align: left; font-size: 18px; color: black; padding-top: 15px" class="exam-card-body">
                                        Gesamtkosten: <b class="price_tag">laden ...</b>
                                        <p style="color: gray; font-size: 16px; padding-top: 5px">Der Preis gilt nur für den gewählten Fahrzeugwert.</p>
                                    </div>

                                           <hr>
                                           <p style="color: black; font-size: 16px; padding-top: 10px">Bitte nenne uns noch die folgenden Informationen, um deine Buchung abzuschließen:</p> -->

                                    @if(request('option')==1 || request('option')==2)
                                        <div style="padding-top: 25px">
                                    @else
                                    <div style="padding-top: 5px">
                                    @endif
                                            <div class="col-12">
                                                <h5 style="font-weight: 550; letter-spacing: -0.25px">Details zum Fahrzeug</h5>
                                            </div>
                                            <div style="padding-top: 15px" class="">
                                                <div class="mb-3">
                                                    <p class="mb-0 text-black fs-6">Marke & Modell<sup class="text-primary">*</sup></p>
                                                    <div class="input-box">
                                                        <input name="vehicle_make_model" style="height: 55px" type="text" value="{{old('vehicle_make_model')}}" class="form-control form-control-sm shadow">
                                                        @error('vehicle_make_model')
                                                        <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Link zum Inserat - z.B. mobile.de</p>
                                                <div class="input-box">
                                                    <input name="advertisement_link" style="height: 55px" value="{{old('advertisement_link')}}" type="text" class="form-control form-control-sm shadow">
                                                    @error('advertisement_link')
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>



                                    <div class="row">
                                        <div class="col-12">
                                            <h5 style="font-weight: 550; padding-top: 50px !important; letter-spacing: -0.25px">Standort des Fahrzeugs</h5>
                                        </div>
                                        <div style="padding-top: 15px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Adresse des Fahrzeugs<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="address" value="{{old('address')}}" style="height: 55px" type="text" class="form-control form-control-sm shadow">
                                                    @error('address')
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Stadt oder PLZ<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input id="city-input" name="city" value="{{request('city')}}" style="text-transform: capitalize; height: 55px;" type="text" class="form-control form-control-sm shadow">
                                                    @error('city')
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    @enderror
                                                </div>
                                                <p id="availability-message" class="availability-text" style="display: none; color: var(--secondary); font-size: 16px; margin-bottom: 0px">Wir sind in diesem Gebiet verfügbar.</p>
                                                <p style="padding-bottom: 10px">
                                            </div>
                                            <hr style="padding-top: 0px">
                                        </div>

                                        <div style="padding-top: 15px" class="col-md-12">
                                            <div class="mb-3 mb-lg-4">
                                                <p class="mb-0 text-black fs-6">Wünsche an die Prüfung</p>
                                                <div class="input-box">
                                                    <textarea name="desc" style="height: 150px; font-size: 15px" class="form-control shadow" id="" cols="30" rows="20">{{old('desc')}}</textarea>
                                                    @error('desc')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding-top: 10px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Sprache des Berichts<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                        <select class="form-select form-select-md form-select-type shadow language" style="height: 55px; color: gray; font-size: 15px" name="language">
                                                            <option value="deutsch">Deutsch</option>
                                                            <option value="english">Englisch</option>
                                                            <option value="english">Polnisch</option>
                                                        </select>
                                                        @error('language')
                                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                            </div>
                                        </div>

                                        <div style="padding-top: 50px" class="col-12">
                                            <h5 style="font-weight: 550; letter-spacing: -0.25px">Deine Kontaktdaten</h5>
                                        </div>
                                        <div style="padding-top: 15px" class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">E-Mail-Adresse<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="email" id="email" value="{{old('email')?old('email'):(auth()->user()?auth()->user()->email:'')}}" style="height: 55px" type="text" class="form-control form-control-sm shadow">
                                                    @error('email')
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <p style="padding-top: 15px" class="mb-0 text-black fs-6">Pflichtfelder mit <sup class="text-primary">*</sup> markiert.</p>
                                        <!-- <div style="padding-top: 25px" class="col-md-12">
                                            <div class="mb-0">

                                                <div class="form-check">
                                                    <input required style="margin-top: 2px; border-color: #01449A" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label mb-0 text-black fs-6" for="flexCheckDefault">
                                                        Ich bestätige, dass der Autoverkäufer mit der Prüfung einverstanden ist.<sup class="text-primary">*</sup>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>

                                    <br><br><button type="submit" href="" style="width: 100%; height: 55px; font-size: 17px" class="btn btn-zah btn-secondary btn-submit shadow">Jetzt buchen</button>
                                    <p class="text-primary ml-2 text-center text-lg-center" style="line-height: 1.5; font-size: 16px; margin-left: 2px; padding-top: 15px">
                                        <i class="fa-solid fa-lock" style="color: #23C197; padding-right: 5px"></i> <span style="color: gray; font-weight: 400">Sichere Zahlungsabwicklung</span>
                                    </p>

                                    @if((request('option')==2) || (request('option')==5))
                                    <p style="padding-top: 20px; font-size: 16px; font-weight: 450; text-align: center">Nach erfolgreicher Buchung wird sich dein persönlicher Prüfer mit dir in Verbindung setzen, um einen gemeinsamen Termin zu vereinbaren.</p>
                                    @else
                                    <p style="padding-top: 20px; font-size: 16px; font-weight: 450; text-align: center">Wir übernehmen die Kontaktaufnahme zum Verkäufer und vereinbaren umgehend einen Besichtigungstermin.
                                    </p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="modal" id="add_price_modal" tabindex="-1">--}}
{{--                    <div class="modal-dialog">--}}
{{--                        <div class="modal-content">--}}
{{--                            <div class="modal-header">--}}
{{--                                <h5 class="modal-title">Unsere Empfehlung</h5>--}}
{{--                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                            </div>--}}
{{--                            <div class="modal-body">--}}
{{--                                <div class="exam-card-header">--}}
{{--                                    <div class="exam-card-header-icon">--}}
{{--                                        <img src="{{ asset('assets/imgs/iconadv/settings.png') }}" alt="kilometerstand check prüfung tachomanipulation">--}}
{{--                                    </div><p style="text-align: left; font-size: 19px; font-weight: 550; padding-top: 12px; padding-left: 0px">Profitiere zusätzlich von einer FIN-Abfrage!</p>--}}
{{--                                </div>--}}
{{--                                <div style="text-align: left; font-size: 17px" class="exam-card-body">--}}
{{--                                    Wir nutzen die FIN (Fahrgestell-Nummer), um beim Hersteller und bei der DAT wichtige und relevante Fahrzeugdaten abzufragen:--}}
{{--                                </div>--}}
{{--                                <div style="padding-top: 15px" id="multiCollapseExample1" class="multi-collapse show d-lg-block">--}}
{{--                                    <ul style="font-size: 16px; letter-spacing: -0.1px" class="mb-4">--}}
{{--                                        <li>--}}
{{--                                            <span class="icon"><img src="{{ asset('front/imgs/icons/check-faq.png') }}" alt="auto pkw vor dem kauf prüfen lassen" height="25px" style="padding-right: 5px"></span>--}}
{{--                                            Fahrzeughistorie--}}
{{--                                        </li>--}}
{{--                                        <li style="padding-top: 5px">--}}
{{--                                            <span class="icon"><img src="{{ asset('front/imgs/icons/check-faq.png') }}" alt="transporter kleintransporter prüfung" height="25px" style="padding-right: 5px"></span>--}}
{{--                                            Unfallberichte--}}
{{--                                        </li>--}}
{{--                                        <li style="padding-top: 5px">--}}
{{--                                            <span class="icon"><img src="{{ asset('front/imgs/icons/check-faq.png') }}" alt="transporter kleintransporter prüfung" height="25px" style="padding-right: 5px"></span>--}}
{{--                                            Wartungsprotokolle--}}
{{--                                        </li>--}}
{{--                                        <li style="padding-top: 5px">--}}
{{--                                            <span class="icon"><img src="{{ asset('front/imgs/icons/check-faq.png') }}" alt="transporter kleintransporter prüfung" height="25px" style="padding-right: 5px"></span>--}}
{{--                                            Tachostand--}}
{{--                                        </li>--}}
{{--                                        <li style="padding-top: 5px">--}}
{{--                                            <span class="icon"><img src="{{ asset('front/imgs/icons/check-faq.png') }}" alt="transporter kleintransporter prüfung" height="25px" style="padding-right: 5px"></span>--}}
{{--                                            Ausstattungsliste--}}
{{--                                        </li>--}}
{{--                                        <li style="padding-top: 5px">--}}
{{--                                            <span class="icon"><img src="{{ asset('front/imgs/icons/check-faq.png') }}" alt="transporter kleintransporter prüfung" height="25px" style="padding-right: 5px"></span>--}}
{{--                                            Diebstahlüberprüfung--}}
{{--                                        </li>--}}
{{--                                        <li style="padding-top: 5px">--}}
{{--                                            <span class="icon"><img src="{{ asset('front/imgs/icons/check-faq.png') }}" alt="transporter kleintransporter prüfung" height="25px" style="padding-right: 5px"></span>--}}
{{--                                            ...--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <input type="radio"  class="btn-check" value="1" name="vin_chasis" id="vin_chasis_1" autocomplete="off">--}}
{{--                                <label class="section-btn btn btn-f " for="vin_chasis_1" style="width: 100%; margin-bottom: 10px">Ja, ich möchte die FIN-Abfrage für 20 €</label>--}}
{{--                                <input type="radio" checked class="btn-check bntno" value="0"  name="vin_chasis" id="vin_chasis_2" autocomplete="off">--}}
{{--                                <label class="btn section-btn btn-nf" for="vin_chasis_2" style="width: 100%">Nein, ich verzichte.</label>--}}
{{--                                <div class="w-100 text-center mt-2">--}}
{{--                                    <br>--}}
{{--                                        <!-- <p class="text-primary ml-2" style="line-height: 1.5; font-size: 16px; margin-left: 2px">--}}
{{--                                        <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.8 (1.755) FIN-Abfrage--}}
{{--                                        </p> -->--}}
{{--                                    <span><b>95 %</b> unserer Kunden wählen diese Zusatzoption und profitieren von zusätzlicher Sicherheit.</span>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </form>
        </section>
        <!-- step-info-end -->
        @if((request('option')==2) || (request('option')==5))
            <div class="modal" id="step_desc_modal" tabindex="-1">
            <div class="modal-dialog">
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
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Infos + Buchung</h4>
                                                                <p class="card-text" style="padding-left: 20px">Teile uns alle relevanten Informationen zum Fahrzeug mit und schließe die Buchung bequem ab.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-body">
                                                    <div class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Kontaktaufnahme</h4>
                                                                <p class="card-text" style="padding-left: 20px">Unser Prüfer nimmt direkt Kontakt mit dir auf, um einen passenden Termin zur Fahrzeugbesichtigung zu vereinbaren.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-body">
                                                    <div  class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Check des Fahrzeugs</h4>
                                                                <p class="card-text" style="padding-left: 20px">Wir treffen dich am Fahrzeug, führen in deiner Anwesenheit eine umfassende Prüfung durch und beantworten gerne all deine Fragen.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item tl-green">
                                                <div class="timeline-body">
                                                    <div class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Abschlussgespräch</h4>
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
            <div class="modal" id="step_desc_modal" tabindex="-1">
            <div class="modal-dialog">
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
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Infos + Buchung</h4>
                                                                <p class="card-text" style="padding-left: 20px">Teile uns alle relevanten Informationen zum Fahrzeug mit und schließe die Buchung bequem ab.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-body">
                                                    <div class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Kontakt zum Verkäufer</h4>
                                                                <p class="card-text" style="padding-left: 20px">Wir setzen uns mit dem Verkäufer in Verbindung und vereinbaren schnellstmöglich einen Termin zur Besichtigung.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-body">
                                                    <div  class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Check des Fahrzeugs</h4>
                                                                <p class="card-text" style="padding-left: 20px">Wir führen vor Ort eine umfassende Prüfung des Fahrzeugs durch und erstellen einen zertifizierten Bericht.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item tl-green">
                                                <div class="timeline-body">
                                                    <div class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Zusendung des Gutachtens</h4>
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
    </main>

@endsection
@section('scripts')
    <script>
        $(document).ready(function(e){

            // $('#add_price_modal').modal('show');
            $(document).on('change','.vehicle_age',function(e){
                getPrice()
            });
            $(document).on('change','.vehicle_value',function(e){
                getPrice()
            });
            $(document).on('click','.btn-check',function(e){
                getPrice()
                    // $('#booking_form')[0].submit();

            });
            $('.btn-submit').on('click',function(e){
                $('#add_price_modal').modal('show');
            })

            function getPrice(){
                var vehicle_age=$('.vehicle_age').val()?$('.vehicle_age').val():'none';
                var vehicle_value=$('.vehicle_value').val()?$('.vehicle_value').val():0;
                var vehicle_type=$('.vehicle_type').val();
                var option='{{request('option')}}';
                var vin_chassis=$('.btn-check:checked').val();
                $.ajax({
                   url:"{{route('booking.price.calculate')}}",
                   type:"GET",
                   data:{
                       vehicle_value:vehicle_value,
                       vehicle_age:vehicle_age,
                       vehicle_type:vehicle_type,
                       option:option,
                       vin_chasis:vin_chassis
                   },
                   success:function(data){
                       console.log(data);
                       $('.price_tag').text(data.amount+' €');
                       // $('#booking_form')[0].submit();
                   }
                });


            }
            setTimeout(function (){
                getPrice();
            },500)

        });
    </script>
@endsection

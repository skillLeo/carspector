@extends('mainpages.mainlayout')
@section('styles')
    <style>
        .not-available{
            background-color: #c1c1c1 !important;
            opacity: 0.8 !important;
        }
        .step-card-border{
            border: 2px solid #25c196;
        }
        .option-badge{
            position: absolute;
            top: -20px;
            right: 11px;
            background: #00449a;
            color: white;
            font-weight: 600;
            padding: 8px 12px;
            border-radius: 7px;
        }
        .price_tag_bottom{
            background: #00449a;
            color: white;
            font-weight: 600;
            padding: 12px 9px;
            border-radius: 7px;
            max-width: 100px;
            text-align: center;
            /*margin-top: 12px;*/
        }
        .price_tag_bottom-mobile{
            background: #00449a;
            color: white;
            font-weight: 600;
            padding: 16px 12px;
            border-radius: 7px;
            max-width: 120px;
            text-align: center;
            margin-top: 0px;
        }
        .see-more-details{
            margin-top: 30px;
        }
        .option-first-line{

        }
        .option-stars{
            font-size: 18px;
        }
        .option-box{
            cursor: pointer;
        }
        .option-first-line{
            height: 30px;
        }
        @media screen and (min-width: 678px) {
            .right-card{
                /*padding-right: 150px;*/

            }
            .left-card{
                padding-left: 150px;
            }
            .option-badge{
                right: 30px;
            }
        }
        .not-available{
            background-color: #c1c1c1 !important;
            opacity: 0.8 !important;
        }
        @media screen and (min-width: 767px){

            .step-cards .col-lg-5 {
                width: 36% !important;
            }
            .btn-next {
                width: 68%;
                margin-left: 10px;
            }
        }

        .price_tag_bottom{
            background: #00449a;
            color: white;
            font-weight: 600;
            padding: 12px 16px;
            border-radius: 7px;
            max-width: 300px;
            text-align: center;
            width: 130px;
            /*margin-top: 12px;*/
        }
        .price_tag_bottom-mobile{
            background: #00449a;
            color: white;
            font-weight: 600;
            padding: 16px 12px;
            border-radius: 7px;
            max-width: 120px;
            text-align: center;
            margin-top: 0px;
        }
        @media screen and (max-width: 678px) {
            .btn-next{
                width: 70%;
                margin-left: 10px;
            }
            .price_tag_bottom{
                width: 130px;
                padding: 15px 0px !important;
                max-width: 250px;

            }

        }
    </style>
@endsection
@section('content')
    <div class="step-wrap container top-breadcrumb">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Carspector</a></li>
                <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Fahrzeugtyp</a></li>
                @if(request('type')=='oldtimer')
                    <li class="breadcrumb-item active" aria-current="page">Oldtimer</li>
                @elseif(request('type')=='sportwagen')
                    <li class="breadcrumb-item active" aria-current="page">Sportwagen</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">Transporter</li>
                @endif
            </ol>
        </nav>
    </div>
    <main>

        <!-- step-info -->
        <section class="step-wrap">
            <div class="container-md">
                <div class="mb-5 mb-md-5 d-flex justify-content-center">
                    <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">Wähle eine Option</h3>

                <!-- @if(request('type')=='oldtimer')
                    <h3 class="fs-4">Oldtimer Prüfung</h3>
                @elseif(request('type')=='sportwagen')
                    <h3 class="fs-4">Sportwagen Prüfung</h3>
                @else
                    <h3 class="fs-4">Transporter Prüfung</h3>
                @endif -->
                </div>

                <div class="step-cards pt-4 pt-md-0">


                    <div class="row step-card-row d-flex justify-content-center">

                        @if(request('type')=='transporter')
                        <div class="col-lg-5" >
                            <div class="bg-white step-card p-3 option-box shadow-1 position-relative rounded-2 pb-3 pb-lg-4 ">
                                <h5 style="font-weight: 600; letter-spacing: -0.5px">Transporter-Check</h5>
                                <div class="option-first-line d-flex">
                                    <div class="option-stars d-flex">
                                        <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i>
                                    </div>
                                    <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                                        4.6 (87)
                                    </p>
                                </div>
                                <p style="font-size: 18px; letter-spacing: -0.1px" class="text-primary">
                                    Ein zertifizierter Kfz-Experte prüft deinen gewünschten Transporter direkt vor Ort nach unserem detaillierten Leitfaden.
                                </p>
                                <div class="d-flex d-none mb-3 see-more-details  d-lg-none justify-content-center">
                                    <a class="text-center text-muted text-decoration-none" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="true" aria-controls="multiCollapseExample2">
                                        <p class="m-0 text-muted">Details ansehen</p>
                                        <i class="fa-solid text-muted fa-chevron-down"></i>
                                    </a>
                                </div>


                                <div style="letter-spacing: -0.1px" id="multiCollapseExample2" class="multi-collapse show d-lg-block">
                                    <ul class="mb-4">
                                        <li>
                                            <span class="icon">
                                                <img src="front/imgs/icons/check-faq.png" alt="transporter gutachten" height="25px">
                                            </span>
                                            <b style="letter-spacing: 0px">Zertifiziertes Gutachten</b>
                                        </li>
                                        <!-- <li onclick="event.stopPropagation();event.preventDefault();window.location.href='{{route('vorteile')}}'">
                                        <span class="icon">
                                            <img src="front/imgs/icons/check-faq.png" alt="" height="25px" />
                                        </span>
                                            <span  >All-Around-Check</span>
                                        </li> -->
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="lackschichtmessung analyse" height="25px"></span>
                                            Dokumentenprüfung
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="lackschichtmessung analyse" height="25px"></span>
                                            Lackschichtmessung & Analyse
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="lackschichtmessung analyse" height="25px"></span>
                                            Prüfung auf Unfallschäden
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="motor elektronikdiagnose kontrolle" height="25px"></span>
                                            Motor & Elektronikdiagnose
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="probefahrt fahrzeug auto" height="25px"></span>
                                            Umfassende Probefahrt
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="kilometerstand check tachomanipulation" height="25px"></span>
                                            Kilometerstand-Check
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="prüfung innenraum" height="25px"></span>
                                            Prüfung des Innenraums
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="fotos bilder videos zustand" height="25px"></span>
                                            Fotodokumentation
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="kilometerstand check tachomanipulation" height="25px"></span>
                                            Kosten & Minderwert Berechnung
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="expertenmeinung tüv gebrauchtwagencheck experte" height="25px"></span>
                                            Ermittlung des Marktwertes
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="expertenmeinung tüv gebrauchtwagencheck experte" height="25px"></span>
                                            FIN Abfrage
                                        </li>
                                        <!-- <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            <span class="fw-bold"><a target="_blank" href="{{route('vorteile')}}">Alle Vorteile ansehen</a></span>
                                        </li> -->
                                        <br style="line-height: 5px" />
                                        <a style="color: #01449A" class="vortile_click" href="{{route('transporter')}}">Alle Prüfungsinhalte ansehen</a>
                                    </ul>


                                    <!-- <a href="/Carspector_Mustergutachten.pdf" target="_blank" class="btn btn-outline-primary">Mustergutachten ansehen</a> -->

                                </div>

                                <div class="d-flex justify-content-between">
                                    <div style="padding-top: 13px" class="price_tag_bottom">
                                        329 €
                                    </div>
                                    <a  href="{{route('booking.step1',['city'=>request('city'),'option'=>3,'type'=>request('type')])}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1"><span style="font-size: 17px">Jetzt buchen<i style="padding-left: 15px" class="fa fa-chevron-right"></i></span></a>
                                </div>
                                {{--                                <a href="{{route('booking.step1',['city'=>request('city')])}}" class="btn-next d-none d-md-block d-lg-block btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa fa-chevron-right"></i></a>--}}
                                <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                            </div>


                        </div>
                            <div class="col-lg-2">
                                <div class="text-center py-5">
                                    <span class="text-grey">oder</span>
                                </div>
                            </div>

                            <div class="col-lg-5 right-card">

                                <div class="bg-white step-card p-3 option-box shadow-1  position-relative rounded-2 pb-3 pb-lg-4">

                                    <h5 style="font-weight: 600; letter-spacing: -0.5px">Kaufbegleitung</h5>
                                    <div class="option-first-line d-flex">
                                        <div class="option-stars d-flex">
                                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i>
                                        </div>
                                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                                            4.7 (129)
                                        </p>
                                    </div>
                                    <p style="font-size: 18px; letter-spacing: -0.1px" class="text-primary d-none d-sm-block">
                                        Du begleitest unseren Prüfer beim Check des Transporters und verfolgst die Prüfung hautnah.
                                    </p>
                                    <p style="font-size: 18px" class="text-primary d-sm-none">Du begleitest unseren Prüfer beim Check des Transporters und verfolgst die Prüfung hautnah.</p>

                                    <div class="d-flex mb-3 d-none d-lg-none see-more-details  justify-content-center">
                                        <a class="text-center text-muted text-decoration-none" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">
                                            <p class="m-0 text-muted">Details ansehen</p>
                                            <i class="fa-solid text-muted fa-chevron-down"></i>
                                        </a>
                                    </div>


                                    <div style="letter-spacing: -0.1px" id="multiCollapseExample1" class="multi-collapse show d-lg-block">
                                        <ul class="mb-4">
                                            <!-- <li onclick="event.stopPropagation();event.preventDefault();window.location.href='{{route('vorteile')}}'">
                                        <span class="icon">
                                            <img src="front/imgs/icons/check-faq.png" alt="" height="25px" />
                                        </span>
                                            <span  >All-Around-Check</span>
                                        </li> -->
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="gutachten kaufbegleitung" height="25px"></span>
                                                <b style="letter-spacing: 0px">Alles vom "Transporter-Check"</b>
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="kaufbegleitung gebrauchtwagencheck" height="25px"></span>
                                                LIVE während der Prüfung dabei
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="probefahrt" height="25px"></span>
                                                Probefahrt mit Prüfer
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="fragen autokauf" height="25px"></span>
                                                Stelle deine Fragen
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="wünsche autokauf" height="25px"></span>
                                                Nenne deine Wünsche
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="preisverhandlung tipps unterstützung preis günstig auto kaufen" height="25px"></span>
                                                Unterstützung in der Preisverhandlung
                                            </li>
                                            <!-- <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            <span class="fw-bold"><a target="_blank" href="{{route('vorteile')}}">Alle Vorteile ansehen</a></span>
                                        </li> -->
                                            <!-- <br style="line-height: 5px" />
                                        <a style="color: #01449A" class="vortile_click" href="{{route('kaufbegleitung')}}">Alle Prüfungsinhalte ansehen</a> -->
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div style="padding-top: 13px" class="price_tag_bottom">
                                            379 €
                                        </div>
                                        <a href="{{route('booking.step1',['city'=>request('city'),'option'=>5,'type'=>request('type')])}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1"><span style="font-size: 17px">Jetzt buchen<i style="padding-left: 15px" class="fa fa-chevron-right"></i></span></a>
                                    </div>

                                </div>


                            </div>


                        @elseif(request('type')=='oldtimer')
                            <div class="col-lg-5" >
                                <div class="bg-white step-card p-3 option-box shadow-1 position-relative rounded-2 pb-3 pb-lg-4 ">
                                    <h5 style="font-weight: 600; letter-spacing: -0.5px">Oldtimer-Check</h5>
                                    <div class="option-first-line d-flex">
                                        <div class="option-stars d-flex">
                                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i>
                                        </div>
                                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                                            4.7 (69)
                                        </p>
                                    </div>
                                    <p style="font-size: 18px; letter-spacing: -0.1px" class="text-primary">
                                        Ein zertifizierter Kfz-Experte prüft deinen gewünschten Oldtimer direkt vor Ort nach unserem detaillierten Leitfaden.
                                    </p>
                                    <div class="d-flex d-none mb-3 see-more-details  d-lg-none justify-content-center">
                                        <a class="text-center text-muted text-decoration-none" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="true" aria-controls="multiCollapseExample2">
                                            <p class="m-0 text-muted">Details ansehen</p>
                                            <i class="fa-solid text-muted fa-chevron-down"></i>
                                        </a>
                                    </div>


                                    <div style="letter-spacing: -0.1px" id="multiCollapseExample2" class="multi-collapse show d-lg-block">
                                        <ul class="mb-4">
                                        <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                                <b style="letter-spacing: 0px">Prüfung durch Oldtimer Experten</b>
                                            </li>
                                            <li>
                                            <span class="icon">
                                                <img src="front/imgs/icons/check-faq.png" alt="oldtimer gutachten" height="25px">
                                            </span>
                                            Oldtimer Gutachten
                                            </li>
                                            <!-- <li onclick="event.stopPropagation();event.preventDefault();window.location.href='{{route('vorteile')}}'">
                                        <span class="icon">
                                            <img src="front/imgs/icons/check-faq.png" alt="" height="25px" />
                                        </span>
                                            <span  >All-Around-Check</span>
                                        </li> -->
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="lackschichtmessung analyse" height="25px"></span>
                                            Dokumentenprüfung
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="lackschichtmessung analyse" height="25px"></span>
                                            Lackschichtmessung & Analyse
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="lackschichtmessung analyse" height="25px"></span>
                                            Prüfung auf Unfallschäden
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="motor elektronikdiagnose kontrolle" height="25px"></span>
                                            Motor & Elektronikdiagnose
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="probefahrt fahrzeug auto" height="25px"></span>
                                            Umfassende Probefahrt
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="kilometerstand check tachomanipulation" height="25px"></span>
                                            Kilometerstand-Check
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="prüfung innenraum" height="25px"></span>
                                            Prüfung des Innenraums
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="fotos bilder videos zustand" height="25px"></span>
                                            Fotodokumentation
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="kilometerstand check tachomanipulation" height="25px"></span>
                                            Kosten & Minderwert Berechnung
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="expertenmeinung tüv gebrauchtwagencheck experte" height="25px"></span>
                                            Ermittlung des Marktwertes
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="expertenmeinung tüv gebrauchtwagencheck experte" height="25px"></span>
                                            FIN Abfrage
                                        </li>
                                            <!-- <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            <span class="fw-bold"><a target="_blank" href="{{route('vorteile')}}">Alle Vorteile ansehen</a></span>
                                        </li> -->
                                            <br style="line-height: 5px" />
                                            <a style="color: #01449A" class="vortile_click" href="{{route('oldtimer')}}">Alle Prüfungsinhalte ansehen</a>
                                        </ul>


                                        <!-- <a href="/Carspector_Mustergutachten.pdf" target="_blank" class="btn btn-outline-primary">Mustergutachten ansehen</a> -->

                                    </div>
                                    <div class="d-flex  justify-content-between">
                                        <div class="price_tag_bottom">
                                            329 €
                                        </div>
                                        <a href="{{route('booking.step1',['city'=>request('city'),'option'=>4,'type'=>request('type')])}}" class="btn-next  btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa fa-chevron-right"></i></a>
                                    </div>
                                    {{--                                <a href="{{route('booking.step1',['city'=>request('city')])}}" class="btn-next d-none d-md-block d-lg-block btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa fa-chevron-right"></i></a>--}}
                                    <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                                </div>


                            </div>
                            <div class="col-lg-2">
                                <div class="text-center py-5">
                                    <span class="text-grey">oder</span>
                                </div>
                            </div>

                            <div class="col-lg-5 right-card">

                                <div class="bg-white step-card p-3 option-box shadow-1  position-relative rounded-2 pb-3 pb-lg-4">

                                    <h5 style="font-weight: 600; letter-spacing: -0.5px">Kaufbegleitung</h5>
                                    <div class="option-first-line d-flex">
                                        <div class="option-stars d-flex">
                                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i>
                                        </div>
                                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                                            4.7 (129)
                                        </p>
                                    </div>
                                    <p style="font-size: 18px; letter-spacing: -0.1px" class="text-primary d-none d-sm-block">
                                        Du begleitest unseren Prüfer beim Check des Oldtimers und verfolgst die Prüfung hautnah.
                                    </p>
                                    <p style="font-size: 18px" class="text-primary d-sm-none">Du begleitest unseren Prüfer beim Check und verfolgst die Prüfung hautnah.</p>

                                    <div class="d-flex mb-3 d-none d-lg-none see-more-details  justify-content-center">
                                        <a class="text-center text-muted text-decoration-none" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">
                                            <p class="m-0 text-muted">Details ansehen</p>
                                            <i class="fa-solid text-muted fa-chevron-down"></i>
                                        </a>
                                    </div>


                                    <div style="letter-spacing: -0.1px" id="multiCollapseExample1" class="multi-collapse show d-lg-block">
                                        <ul class="mb-4">
                                            <!-- <li onclick="event.stopPropagation();event.preventDefault();window.location.href='{{route('vorteile')}}'">
                                        <span class="icon">
                                            <img src="front/imgs/icons/check-faq.png" alt="" height="25px" />
                                        </span>
                                            <span  >All-Around-Check</span>
                                        </li> -->
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="gutachten kaufbegleitung" height="25px"></span>
                                                <b style="letter-spacing: 0px">Alles vom "Oldtimer-Check"</b>
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="kaufbegleitung gebrauchtwagencheck" height="25px"></span>
                                                LIVE während der Prüfung dabei
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="probefahrt" height="25px"></span>
                                                Probefahrt mit Prüfer
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="fragen autokauf" height="25px"></span>
                                                Stelle deine Fragen
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="wünsche autokauf" height="25px"></span>
                                                Nenne deine Wünsche
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="preisverhandlung tipps unterstützung preis günstig auto kaufen" height="25px"></span>
                                                Unterstützung in der Preisverhandlung
                                            </li>
                                            <!-- <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            <span class="fw-bold"><a target="_blank" href="{{route('vorteile')}}">Alle Vorteile ansehen</a></span>
                                        </li> -->
                                            <!-- <br style="line-height: 5px" />
                                        <a style="color: #01449A" class="vortile_click" href="{{route('kaufbegleitung')}}">Alle Prüfungsinhalte ansehen</a> -->
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div style="padding-top: 13px" class="price_tag_bottom">
                                          379 €
                                        </div>
                                        <a href="{{route('booking.step1',['city'=>request('city'),'option'=>5,'type'=>request('type')])}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1"><span style="font-size: 17px">Jetzt buchen<i style="padding-left: 15px" class="fa fa-chevron-right"></i></span></a>
                                    </div>

                                </div>


                            </div>


                        @elseif(request('type')=='sportwagen')
                            <div class="col-lg-5" >
                                <div class="bg-white step-card p-3 option-box shadow-1 position-relative rounded-2 pb-3 pb-lg-4 ">
                                    <h5 style="font-weight: 600; letter-spacing: -0.5px">Sportwagen-Check</h5>
                                    <div class="option-first-line d-flex">
                                        <div class="option-stars d-flex">
                                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i>
                                        </div>
                                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                                            4.8 (168)
                                        </p>
                                    </div>
                                    <p style="font-size: 18px; letter-spacing: -0.1px" class="text-primary">
                                        Ein zertifizierter Kfz-Experte prüft deinen gewünschten Sportwagen direkt vor Ort nach unserem detaillierten Leitfaden.
                                    </p>
                                    <div class="d-flex d-none mb-3 see-more-details  d-lg-none justify-content-center">
                                        <a class="text-center text-muted text-decoration-none" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="true" aria-controls="multiCollapseExample2">
                                            <p class="m-0 text-muted">Details ansehen</p>
                                            <i class="fa-solid text-muted fa-chevron-down"></i>
                                        </a>
                                    </div>


                                    <div style="letter-spacing: -0.1px" id="multiCollapseExample2" class="multi-collapse show d-lg-block">
                                        <ul class="mb-4">
                                        <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                                <b style="letter-spacing: 0px">Prüfung durch Sportwagen Experten</b>
                                            </li>
                                            <li>
                                            <span class="icon">
                                                <img src="front/imgs/icons/check-faq.png" alt="sportwagen gutachten" height="25px">
                                            </span>
                                                Sportwagen Gutachten
                                            </li>
                                            <!-- <li onclick="event.stopPropagation();event.preventDefault();window.location.href='{{route('vorteile')}}'">
                                        <span class="icon">
                                            <img src="front/imgs/icons/check-faq.png" alt="" height="25px" />
                                        </span>
                                            <span  >All-Around-Check</span>
                                        </li> -->
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="lackschichtmessung analyse" height="25px"></span>
                                            Dokumentenprüfung
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="lackschichtmessung analyse" height="25px"></span>
                                            Lackschichtmessung & Analyse
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="lackschichtmessung analyse" height="25px"></span>
                                            Prüfung auf Unfallschäden
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="motor elektronikdiagnose kontrolle" height="25px"></span>
                                            Motor & Elektronikdiagnose
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="probefahrt fahrzeug auto" height="25px"></span>
                                            Umfassende Probefahrt
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="kilometerstand check tachomanipulation" height="25px"></span>
                                            Kilometerstand-Check
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="prüfung innenraum" height="25px"></span>
                                            Prüfung des Innenraums
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="fotos bilder videos zustand" height="25px"></span>
                                            Fotodokumentation
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="kilometerstand check tachomanipulation" height="25px"></span>
                                            Kosten & Minderwert Berechnung
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="expertenmeinung tüv gebrauchtwagencheck experte" height="25px"></span>
                                            Ermittlung des Marktwertes
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="expertenmeinung tüv gebrauchtwagencheck experte" height="25px"></span>
                                            FIN Abfrage
                                        </li>
                                            <!-- <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            <span class="fw-bold"><a target="_blank" href="{{route('vorteile')}}">Alle Vorteile ansehen</a></span>
                                        </li> -->
                                            <br style="line-height: 5px" />
                                            <a style="color: #01449A" class="vortile_click" href="{{route('sportwagen')}}">Alle Prüfungsinhalte ansehen</a>
                                        </ul>


                                        <!-- <a href="/Carspector_Mustergutachten.pdf" target="_blank" class="btn btn-outline-primary">Mustergutachten ansehen</a> -->

                                    </div>
                                    <div class="d-flex  justify-content-between">
                                        <div class="price_tag_bottom ">
                                            329 €
                                        </div>
                                        <a href="{{route('booking.step1',['city'=>request('city'),'type'=>request('type')])}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1"><span style="font-size: 17px">Jetzt buchen<i style="padding-left: 15px" class="fa fa-chevron-right"></i></span></a>
                                    </div>
                                    {{--                                <a href="{{route('booking.step1',['city'=>request('city')])}}" class="btn-next d-none d-md-block d-lg-block btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa fa-chevron-right"></i></a>--}}
                                    <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                                </div>


                            </div>
                            <div class="col-lg-2">
                                <div class="text-center py-5">
                                    <span class="text-grey">oder</span>
                                </div>
                            </div>

                            <div class="col-lg-5 right-card">

                                <div class="bg-white step-card p-3 option-box shadow-1  position-relative rounded-2 pb-3 pb-lg-4">

                                    <h5 style="font-weight: 600; letter-spacing: -0.5px">Kaufbegleitung</h5>
                                    <div class="option-first-line d-flex">
                                        <div class="option-stars d-flex">
                                            <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i>
                                        </div>
                                        <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                                            4.7 (129)
                                        </p>
                                    </div>
                                    <p style="font-size: 18px; letter-spacing: -0.1px" class="text-primary d-none d-sm-block">
                                        Du begleitest unseren Prüfer beim Check des Sportwagens und verfolgst die Prüfung hautnah.
                                    </p>
                                    <p style="font-size: 18px" class="text-primary d-sm-none">Du begleitest unseren Prüfer beim Check des Sportwagens und verfolgst die Prüfung hautnah.</p>

                                    <div class="d-flex mb-3 d-none d-lg-none see-more-details  justify-content-center">
                                        <a class="text-center text-muted text-decoration-none" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">
                                            <p class="m-0 text-muted">Details ansehen</p>
                                            <i class="fa-solid text-muted fa-chevron-down"></i>
                                        </a>
                                    </div>


                                    <div style="letter-spacing: -0.1px" id="multiCollapseExample1" class="multi-collapse show d-lg-block">
                                        <ul class="mb-4">
                                            <!-- <li onclick="event.stopPropagation();event.preventDefault();window.location.href='{{route('vorteile')}}'">
                                        <span class="icon">
                                            <img src="front/imgs/icons/check-faq.png" alt="" height="25px" />
                                        </span>
                                            <span  >All-Around-Check</span>
                                        </li> -->
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="gutachten kaufbegleitung" height="25px"></span>
                                                <b style="letter-spacing: 0px">Alles vom "Sportwagen-Check"</b>
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="kaufbegleitung gebrauchtwagencheck" height="25px"></span>
                                                LIVE während der Prüfung dabei
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="probefahrt" height="25px"></span>
                                                Probefahrt mit Prüfer
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="fragen autokauf" height="25px"></span>
                                                Stelle deine Fragen
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="wünsche autokauf" height="25px"></span>
                                                Nenne deine Wünsche
                                            </li>
                                            <li>
                                                <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="preisverhandlung tipps unterstützung preis günstig auto kaufen" height="25px"></span>
                                                Unterstützung in der Preisverhandlung
                                            </li>
                                            <!-- <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            <span class="fw-bold"><a target="_blank" href="{{route('vorteile')}}">Alle Vorteile ansehen</a></span>
                                        </li> -->
                                            <!-- <br style="line-height: 5px" />
                                        <a style="color: #01449A" class="vortile_click" href="{{route('kaufbegleitung')}}">Alle Prüfungsinhalte ansehen</a> -->
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div style="padding-top: 13px" class="price_tag_bottom">
                                            379 €
                                        </div>
                                        <a href="{{route('booking.step1',['city'=>request('city'),'option'=>5,'type'=>request('type')])}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1"><span style="font-size: 17px">Jetzt buchen<i style="padding-left: 15px" class="fa fa-chevron-right"></i></span></a>
                                    </div>

                                </div>


                            </div>


                        @endif


                    </div>
                </div>
            </div>
        </section>
        <!-- step-info-end -->
    </main>
@endsection
@section('scripts')
    <script>

        $('.option-box').on('click',function(e){
            e.preventDefault();
            var href=$(this).find('.btn-next').attr('href');
            window.location.href=href;
        });
        $('.see-more-details').on('click',function(e){
            // e.preventDefault();
            e.stopPropagation();
        })
        $('.vortile_click').on('click',function(e){
            e.stopPropagation();
        })

    </script>
@endsection

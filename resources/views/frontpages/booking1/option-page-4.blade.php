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
            margin-top: 12px;
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
        @media screen and (min-width: 568px){
            .pt-md-6{
                padding-top: 45px !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="step-wrap container top-breadcrumb">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Carspector</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fahrzeugtyp</li>
            </ol>
        </nav>
    </div>
    <main>

        <!-- step-info -->
        <section class="step-wrap">
            <div class="container-md">
                <div class="mb-5 mb-md-5 text-center text-lg-center">
                    <h3 style="font-weight: 600; letter-spacing: -0.5px" class="fs-4">Fahrzeugtyp wählen</h3>
                    <!-- <h3 class="fs-4">Gebrauchtwagencheck in <span style="text-transform: capitalize">{{request('city')}}</span></h3> -->
                </div>

                <div class="step-cards pt-4 pt-md-6">


                    <div class="row step-card-row d-flex ">



                        <div class="col-lg-4">
                            <div class="bg-white step-card p-3 option-box shadow-1  position-relative rounded-2 pb-3 pb-lg-4 mb-5">

                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconoption/sedan.png" alt="Auto Gebrauchtwagencheck Prüfung Gutachten Gebrauchtwagen check">
                                    </div><p style="text-align: left; font-size: 20px; padding-top: 15px; font-weight: 600; letter-spacing: -0.5px">Auto/ PKW</p>
                                </div>




                                <div id="multiCollapseExample1" class="multi-collapse show d-lg-block">
                                    <ul class="mb-4">
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            PKW aller Bauarten
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Kleintransporter
                                        </li>

                                    </ul>
                                </div>
                                <a href="{{route('examiner.check',['city'=>request('city')])}}" class="btn-next d-block  btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa fa-chevron-right"></i></a>
                                <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                            </div>


                        </div>

                        <div class="col-lg-4">
                            <div class="bg-white step-card p-3  option-box shadow-1  position-relative rounded-2 pb-3 pb-lg-4 mb-5">


                            <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconoption/van.png" alt="transporter Gebrauchtwagencheck Prüfung Gutachten Gebrauchtwagen check">
                                        </div><p style="text-align: left; font-size: 20px; padding-top: 15px; font-weight: 600; letter-spacing: -0.5px">Transporter</p>
                                </div>




                                <div id="multiCollapseExample3" class="multi-collapse show show d-lg-block">
                                    <ul class="mb-4">
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Alle Marken und Modelle
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Bis zu 5,5t Gesamtgewicht
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{route('booking.option-transporter',['city'=>request('city'),'type'=>'transporter'])}}" class="btn-next btn d-block  btn-secondary px-4 py-2 fs-5 shadow-1 "> <i class="fa fa-chevron-right"></i> </a>
                                <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                            </div>


                        </div>

                        <div class="col-lg-4">
                            <div class="bg-white step-card p-3 option-box shadow-1 position-relative rounded-2 pb-3 pb-lg-4 mb-5">

                            <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconoption/car.png" alt="oldtimer Gebrauchtwagencheck Prüfung Gutachten Gebrauchtwagen check">
                                        </div><p style="text-align: left; font-size: 20px; padding-top: 15px; font-weight: 600; letter-spacing: -0.5px">Oldtimer</p>
                                </div>

                                <div id="multiCollapseExample2" class="multi-collapse show d-lg-block">
                                    <ul class="mb-4">
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Alle Marken und Modelle
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Alter > 30 Jahre
                                        </li>

                                    </ul>


                                    <!-- <a href="/Carspector_Mustergutachten.pdf" target="_blank" class="btn btn-outline-primary">Mustergutachten ansehen</a> -->

                                </div>
                                <div class="d-flex flex-column justify-content-between">
                                    <a href="{{route('booking.option-transporter',['city'=>request('city'),'type'=>'oldtimer'])}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa fa-chevron-right"></i></a>
                                </div>
                                {{--                                <a href="{{route('booking.request',['city'=>request('city'),'type'=>'oldtimer'])}}" class="btn-next d-none d-md-block d-lg-block btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa fa-chevron-right"></i></a>--}}
                                <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                            </div>


                        </div>
                        <div class="col-lg-4">
                            <div class="bg-white step-card p-3  option-box shadow-1  position-relative rounded-2 pb-3 pb-lg-4 mb-5">


                            <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconoption/super-car.png" alt="sportwagen Gebrauchtwagencheck Prüfung Gutachten Gebrauchtwagen check">
                                        </div><p style="text-align: left; font-size: 20px; padding-top: 15px; font-weight: 600; letter-spacing: -0.5px">Sportwagen</p>
                                </div>




                                <div id="multiCollapseExample3" class="multi-collapse show show d-lg-block">
                                    <ul class="mb-4">
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Ab 400 PS
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Alle Preisklassen
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{route('booking.option-transporter',['city'=>request('city'),'type'=>'sportwagen'])}}" class="btn-next btn d-block  btn-secondary px-4 py-2 fs-5 shadow-1 "> <i class="fa fa-chevron-right"></i> </a>
                                <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                            </div>


                        </div>
                        <div class="col-lg-4">
                            <div class="bg-white step-card p-3  option-box shadow-1  position-relative rounded-2 pb-3 pb-lg-4 mb-5">


                            <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconoption/caravan.png" alt="wohnmobil Gebrauchtwagencheck Prüfung Gutachten Gebrauchtwagen check">
                                        </div><p style="text-align: left; font-size: 20px; padding-top: 15px; font-weight: 600; letter-spacing: -0.5px">Wohnmobil</p>
                                </div>




                                <div id="multiCollapseExample3" class="multi-collapse show show d-lg-block">
                                    <ul class="mb-4">

                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Alle Marken und Modelle
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Individuell gestaltet
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{route('booking.request',['city'=>request('city'),'type'=>'wohnmobil'])}}" class="btn-next btn d-block  btn-secondary px-4 py-2 fs-5 shadow-1 "> <i class="fa fa-chevron-right"></i> </a>
                                <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                            </div>


                        </div>

                        <div class="col-lg-4">
                            <div class="bg-white step-card p-3  option-box shadow-1  position-relative rounded-2 pb-3 pb-lg-4 mb-5">


                            <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconoption/others.png" alt="sonstiges andere Gebrauchtwagencheck Prüfung Gutachten Gebrauchtwagen check">
                                        </div><p style="text-align: left; font-size: 20px; padding-top: 15px; font-weight: 600; letter-spacing: -0.5px">Sonstiges</p>
                                </div>

                                <div id="multiCollapseExample3" class="multi-collapse show show d-lg-block">
                                    <ul class="mb-4">
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Individuelle Anfragen
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Sonstige Fahrzeugklassen
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{route('booking.request',['city'=>request('city'),'type'=>'sonstiges'])}}" class="btn-next btn d-block  btn-secondary px-4 py-2 fs-5 shadow-1 "> <i class="fa fa-chevron-right"></i> </a>
                                <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                            </div>


                        </div>
                        {{--                        <div class="col-lg-3">--}}
                        {{--                            <div class="bg-white step-card p-3  shadow-1 position-relative rounded-2 pb-4 pb-lg-4 mb-5">--}}

                        {{--                                <h5>All-Around-Check</h5>--}}
                        {{--                                <p class="text-primary">--}}
                        {{--                                    Wir fahren zu deinem gewünschten Auto in <span style="text-transform: capitalize">{{request('city')}}</span>, prüfen es nach TÜV-Vorgaben, dokumentieren den Zustand mit Fotos, gehen auf deine Wünsche--}}
                        {{--                                    und Fragen ein und erstellen ein <b>zertifiziertes Gutachten</b>.--}}
                        {{--                                </p>--}}
                        {{--                                <div class="price_tag_and_next d-flex justify-content-between d-lg-none d-sm-flex">--}}
                        {{--                                    <div class="price_tag_bottom-mobile">--}}
                        {{--                                        nur {{$amount}} €--}}
                        {{--                                    </div>--}}
                        {{--                                    <a href="{{route('booking.step1',['city'=>request('city')])}}" class="btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa fa-chevron-right"></i></a>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="d-flex mb-3 d-lg-none  justify-content-center">--}}
                        {{--                                    <a class="text-center text-muted text-decoration-none" data-bs-toggle="collapse" href="#multiCollapseExample4" role="button" aria-expanded="true" aria-controls="multiCollapseExample4">--}}
                        {{--                                        <p class="m-0 text-muted">Details ansehen</p>--}}
                        {{--                                        <i class="fa-solid text-muted fa-chevron-down"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                                <div id="multiCollapseExample4" class="multi-collapse collapse d-lg-block">--}}
                        {{--                                    <ul class="mb-4">--}}
                        {{--                                        <li>--}}
                        {{--                                            <span class="icon">--}}
                        {{--                                                <img src="front/imgs/icons/check-faq.png" alt="" height="25px">--}}
                        {{--                                            </span>--}}
                        {{--                                            <b>Gebrauchtwagen-Gutachten</b>--}}
                        {{--                                        </li>--}}
                        {{--                                        <!-- <li onclick="event.stopPropagation();event.preventDefault();window.location.href='{{route('vorteile')}}'">--}}
                        {{--                                        <span class="icon">--}}
                        {{--                                            <img src="front/imgs/icons/check-faq.png" alt="" height="25px" />--}}
                        {{--                                        </span>--}}
                        {{--                                            <span  >All-Around-Check</span>--}}
                        {{--                                        </li> -->--}}
                        {{--                                        <li>--}}
                        {{--                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>--}}
                        {{--                                            Mehr als 150 Prüfpunkte--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>--}}
                        {{--                                            Prüfung von Außen und Innen--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>--}}
                        {{--                                            Technische Überprüfung--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>--}}
                        {{--                                            Kilometerstand Überprüfung--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>--}}
                        {{--                                            Fotodokumentation--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>--}}
                        {{--                                            Probefahrt--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>--}}
                        {{--                                            Experteneinschätzung--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>--}}
                        {{--                                            <span class="fw-bold">und vieles mehr ...</span>--}}
                        {{--                                        </li>--}}
                        {{--                                        <br style="line-height: 5px" />--}}
                        {{--                                        <a style="color: #01449A" href="{{route('vorteile')}}" target="_blank">Alle Prüfungsinhalte ansehen</a>--}}
                        {{--                                    </ul>--}}


                        {{--                                <a href="/Carspector_Mustergutachten.pdf" target="_blank" class="btn  btn-outline-primary">Mustergutachten ansehen</a>--}}
                        {{--                                <div class="price_tag_bottom d-none d-lg-block ">--}}
                        {{--                                    nur {{$amount}} €--}}
                        {{--                                </div>--}}
                        {{--                                </div>--}}
                        {{--                                <a href="{{route('examiners',['city'=>request('city'),'type'=>'others'],)}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1 d-none d-md-block d-lg-block"><i class="fa fa-chevron-right"></i></a>--}}
                        {{--                                <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->--}}
                        {{--                            </div>--}}


                        {{--                        </div>--}}







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

    </script>
@endsection

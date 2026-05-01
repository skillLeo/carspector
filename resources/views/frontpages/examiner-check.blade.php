@extends('mainpages.mainlayout')
@section('styles')
    <style>
        .not-available{
            background-color: #c1c1c1 !important;
            opacity: 0.8 !important;
        }
    </style>
@endsection
@section('content')
    <main>
        <!-- step-info -->
        <section class="step-wrap">
            <div class="container-sm">
                <div class="mb-5 mb-md-5 text-center text-lg-center">
                <h3 class="fs-4">Wähle eine Option</h3>
                    <!-- <h3 class="fs-4">Gebrauchtwagencheck in <span style="text-transform: capitalize">{{request('city')}}</span></h3> -->
                </div>

                <div class="step-cards pt-4 pt-md-0">


                        <div class="row step-card-row">
                            <a class="text-decoration-none" href="{{route('booking.step1',['city'=>request('city')])}}">
                            <div class="col-lg-5">
                                <div class="bg-white step-card p-3 shadow-1 position-relative rounded-2 pb-5 pb-lg-4">
                                    <h5>All-Around-Check</h5>
                                    <p class="text-primary">
                                        Wir fahren zu deinem gewünschten Auto in <span style="text-transform: capitalize">{{request('city')}}</span>, prüfen es nach TÜV-Vorgaben, dokumentieren den Zustand mit Fotos, gehen auf deine Wünsche 
                                        und Fragen ein und erstellen ein <b>zertifiziertes Gutachten</b>.
                                    </p>
                                    <ul class="mb-4">
                                        <li>
                                            <span class="icon">
                                                <img src="front/imgs/icons/check-faq.png" alt="" height="25px">
                                            </span>
                                            <b>Gebrauchtwagen-Gutachten</b>
                                        </li>
                                        <!-- <li onclick="event.stopPropagation();event.preventDefault();window.location.href='{{route('vorteile')}}'">
                                        <span class="icon">
                                            <img src="front/imgs/icons/check-faq.png" alt="" height="25px" />
                                        </span>
                                            <span  >All-Around-Check</span>
                                        </li> -->
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Mehr als 150 Prüfpunkte
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Prüfung von Außen und Innen
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Technische Überprüfung
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Kilometerstand Überprüfung
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Fotodokumentation
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Probefahrt
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Experteneinschätzung
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            <span class="fw-bold">und vieles mehr ...</span>
                                        </li>
                                           <br style="line-height: 5px" />
                                           <a style="color: #01449A" href="{{route('vorteile')}}" target="_blank">Alle Prüfungsinhalte ansehen</a>
                                    </ul>

                                    <a href="/Carspector_Mustergutachten.pdf" target="_blank" class="btn btn-outline-primary">Mustergutachten ansehen</a>

                                    <a href="{{route('booking.step1',['city'=>request('city')])}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1">{{$amount}} € </a>
                                    <!-- <i style="padding-left: 10px" class="fa-solid fa-angle-right"></i> -->
                                </div>


                            </div>
                            </a>

                            <div class="col-lg-2">
                                <div class="text-center py-5">
                                    <span class="text-grey">oder</span>
                                </div>
                            </div>




                            <div class="col-lg-5">
                                <a class="text-decoration-none" href="@if(count($examiners) > 0) {{route('examiners',['city'=>request('city')])}} @else # @endif">
                                <div class=" @if(count($examiners) <= 0) not-available @endif bg-white step-card p-3 shadow-1 position-relative rounded-2 pb-5 pb-lg-4">
                                    <h5>Kaufbegleitung</h5>
                                    <p class="text-primary">
                                    Wir begleiten dich beim Kauf, prüfen dein gewünschtes Fahrzeug direkt beim Verkäufer in <span style="text-transform: capitalize">{{request('city')}}</span> und helfen dir
                                    in der Verhandlung.
                                    </p>
                                    <ul class="mb-4">
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            LIVE während der Prüfung dabei
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            <b>Alle Vorteile des All-Around-Checks</b>
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Probefahrt mit Prüfer
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Stelle deine Fragen
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Nenne deine Wünsche
                                        </li>
                                        <li>
                                        <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="" height="25px"></span>
                                            Unterstützung in der Preisverhandlung
                                        </li>
                                    </ul>
                                    <a href="{{route('vorteile')}}" target="_blank" class="btn btn-outline-primary">Alle Vorteile ansehen</a>
                                    @if(count($examiners) > 0)
                                    <a href="{{route('examiners',['city'=>request('city')])}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa-solid fa-angle-right"></i></a>
                                    @else
                                        <a href="#" style="background: grey;font-size: 16px !important;" class="btn-next btn  px-4 py-2 fs-5 shadow-1 btn-color-gray-100" disabled>Nicht<br>verfügbar</a>
                                    @endif
                                </div>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </section>
        <!-- step-info-end -->
    </main>
@endsection

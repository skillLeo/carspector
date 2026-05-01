@extends('mainpages.mainlayout')
@section('styles')
    <style>
        span.typed-text {
            /*font-weight: normal;*/
            color: #25c196 !important;
            line-height:1.2;

        }

        p span.cursor {
            display: inline-block;
            background-color: #ccc;
            margin-left: 0.1rem;
            width: 3px;
            color: #25c196 !important;
            animation: blink 1s infinite;
        }
        p span.cursor.typing {
            animation: none;
        }
        @keyframes blink {
            0% {
                background-color: #ccc;
            }
            49% {
                background-color: #ccc;
            }
            50% {
                background-color: transparent;
            }
            99% {
                background-color: transparent;
            }
            100% {
                background-color: #ccc;
            }
        }
        @media screen and (max-width: 767px) {
            .mobile-bullet-list-hero{
                margin: 0 auto;
                width: 234px;
            }
            .btn-footer-bottom{

                height: 50px !important;

            }
            /*.btn-check-city{*/
            /*    display: none;*/
            /*}*/
        }
        
        @media screen and (min-width: 568px) {
            .blue-hero-form{
                padding-right: 50px;
            }
        }

        @media screen and (max-width: 767px) {
            .mobile-review{
                padding-top: 75px;
                padding-bottom: 75px;
            }
        }

        .sticky-bottom-footer{
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #00449a;
            z-index: 9999999999;
        }


    </style>
@endsection
@section('content')
    <main>
        <!-- hero-area-start -->
        <section class="section hero-area hero-area-two position-relative z-2 bg-white">
            <div class="container">
                <div class="hero-wrapper">
                    <!-- hero-content -->
                    <div class="hero-content hero-content-two">
                    <h1 class="fw-bold text-center text-white mb-1">Wir <span class="text-secondary">prüfen</span> <br> deinen Neuen.</h1>
                        <!-- <h1 class="fw-bold text-center text-white mb-1">Wir <span class="text-white">prüfen</span> <br><span class="typed-text"></span><span class="cursor">&nbsp;</span></h1> -->
                        <p style="letter-spacing: 0.25px" class="text-center text-white">Gebrauchtwagencheck - Für einen sicheren Autokauf.</p>

                        <ul style="letter-spacing: 0.25px; padding-left: 50px" class="my-5 d-none d-md-block">
                            <li>
                                <span class="icon"><img src="front/imgs/check-2.png" alt="Zertifizierte Prüfer" height="40px"></span>
                                <span class="text text-white">Zertifizierte Prüfer</span>
                            </li>
                            <li>
                                <span class="icon"><img src="front/imgs/check-2.png" alt="Einfach und schnell" height="40px"></span>
                                <span class="text text-white">Einfach & schnell</span>
                            </li>
                            <li>
                                <span class="icon"><img src="front/imgs/check-2.png" alt="TÜV Vorgaben" height="40px"></span>
                                <span class="text text-white">TÜV-Vorgaben</span>
                            </li>
                            <li>
                                <span class="icon"><img src="front/imgs/check-2.png" alt="Gebrauchtwagencheck Deutschlandweit" height="40px"></span>
                                <span class="text text-white">Deutschlandweit</span>
                            </li>
                        </ul>

                        <!-- Mobile List -->
                        <ul style="letter-spacing: 0.25px" class="my-5 d-md-none mobile-bullet-list-hero">
                            <li>
                                <span class="icon"><img src="front/imgs/check-2.png" alt="Zertifizierte Prüfer"></span>
                                <span class="text text-white">Zertifizierte Prüfer</span>
                            </li>
                            <li>
                                <span class="icon"><img src="front/imgs/check-2.png" alt="TÜV Vorgaben"></span>
                                <span class="text text-white">TÜV-Vorgaben</span>
                            </li>
                            <li>
                                <span class="icon"><img src="front/imgs/check-2.png" alt="Einfach und schnell"></span>
                                <span class="text text-white">Einfach & schnell</span>
                            </li>
                            <li>
                                <span class="icon"><img src="front/imgs/check-2.png" alt="Gebrauchtwagencheck Deutschlandweit"></span>
                                <span class="text text-white">Deutschlandweit</span>
                            </li>
                        </ul>
                        <div class="hero-form hero-area-form blue-hero-form">
                            <form action="{{route('booking.option-page')}}">
                                <p class="pb-1 text-white">Mein Wunschfahrzeug steht in ...</p>
                                <div class="d-flex gap-md-2 w-100 align-items-center flex-column flex-md-row mobile-hero-area-btns">
                                    <div class="input-box input-box-icon mb-0 flex-grow-1 align-items-center">
                                        <span class="icon"><img src="front/imgs/sedan.png" alt="Gebrauchtwagencheck" width="50px" height="50px"></span>
                                        <input name="city" type="text" pattern="[0-9-A-Za-zäöüÄÖÜß\s]+.*[^ ].*" placeholder="Stadt/ PLZ" class="form-control input-shadow-1" required>
                                    </div>
                                    <button type="submit" class="btn btn-secondary fw-bold">CHECK</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- hero-content-end -->
                </div>
                <div class="hero-bottom position-relative z-1">
                    <div class="row gx-xl-5">
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-lg-0">
                            <!-- hero--logo -->
                            <div class="hero-logo">
                                <span class="icon"><img src="front/imgs/tuv.png" alt="TÜV Zertifiziert Gebrauchtwagencheck" width="50px" height="50px"></span>
                                TÜV-Zertifiziert
                            </div>
                            <!-- hero--logo-end -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-lg-0">
                            <!-- hero--logo -->
                            <div class="hero-logo">
                                <span class="icon"><img src="front/imgs/adac.png" alt="ADAC Gebrauchtwagencheck" width="50px" height="25px"></span>
                                Empfohlen
                            </div>
                            <!-- hero--logo-end -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-md-0">
                            <!-- hero--logo -->
                            <div class="hero-logo">
                                <span class="icon"><img src="front/imgs/shield.png" alt="Prüfungsgarantie" width="50px" height="50px"></span>
                                Prüfungsgarantie
                            </div>
                            <!-- hero--logo-end -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-5 mb-lg-0">
                            <!-- hero--logo -->
                            <div class="hero-logo">
                                <span class="icon"><img src="front/imgs/germany.png" alt="Gebrauchtwagencheck Deutschlandweit" width="50px" height="50px"></span>
                                Deutschlandweit
                            </div>
                            <!-- hero--logo-end -->
                        </div>
                        <div class="col-12 pt-3 d-lg-none">
                            <div class="text-center">
                                <a href="{{route('faq')}}" class="text-primary">Wie funktioniert das genau?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero-area-start-end -->

        <!-- desired-vehicle area start -->
        <section id="desired-vehicle">
            <div class="container">
                <div class="desired-vehicle-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2>Unsicher beim Autokauf?</h2>
                            </div>
                            <p class="paragraph"><b>Kein Problem!</b> Wir prüfen dein gewünschtes Fahrzeug vor dem Kauf.</p>
                            <div style="padding-top: 40px" class="desire-vehicle-check-list">
                                <ul>
                                    <li>Sicherheit beim Kauf</li>
                                    <li>Vermeide hohe Kosten</li>
                                    <li>Schutz vor Betrug</li>
                                    <li>Fundierte Kaufentscheidung</li>
                                    <li>Sorgenfreie Fahrt</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="desire-vehicle-img">
                                <img src="front/imgs/bg-imgs/desired-vehicle-thumb.png" alt="Gebrauchtwagencheck Auto Transporter Oldtimer Sportwagen Wohnmobile">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- desired-vehicle area end -->

        <section style="background-color: white" id="how-does-work">
      <h2 style="padding-bottom: 50px; padding-top: 0px" class="text-center">Carspector in Zahlen</h2>

        <section style="padding-top: 15px" class="exam-area position-relative">


            <div class="container position-relative">
                <div class="exam-cards">
                    <div class="row g-lg-5 g-md-4 g-sm-3 pb-4">
                        <div class="col-sm-6 col-lg-4" >
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconhome/happy.png" alt="Gebrauchtwagencheck; Auto vor dem Kauf prüfen lassen">
                                    </div><p style="text-align: left; font-size: 19px; padding-top: 10px"><b>10.000 +</b><br>zufriedene Kunden</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Über 10.000 Kunden sind von unseren Produkten und Dienstleistungen überzeugt.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconhome/loupe.png" alt="Fotos Zustand Bilder Auto Fahrzeug Videos">
                                        </div><p style="text-align: left; font-size: 19px; padding-top: 10px"><b>100 +</b><br>Prüfungen am Tag</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir führen täglich über 100 Prüfungen zuverlässig und effizient durch.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconhome/star.png" alt="Auto Fahrzeug Gebrauchtwagen Bewertung objektiv">
                                        </div><p style="text-align: left; font-size: 19px; padding-top: 10px"><b>4,7/5</b><br>Sterne im Durchschnitt</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Unsere Kunden bewerten uns im Durchschnitt mit 4,7 von 5 Sternen.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4" >
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconhome/multiple.png" alt="Gebrauchtwagencheck; Auto vor dem Kauf prüfen lassen">
                                        </div><p style="text-align: left; font-size: 19px; padding-top: 10px"><b>10 +</b><br>Dienstleistungen</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir bieten über 10 verschiedene Dienstleistungen und Leistungen an.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconhome/shield.png" alt="Fotos Zustand Bilder Auto Fahrzeug Videos">
                                        </div><p style="text-align: left; font-size: 19px; padding-top: 10px"><b>5 +</b><br>Jahre Erfahrung</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Mit über 5 Jahren Erfahrung sind wir Experten auf unserem Gebiet.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconhome/skyline.png" alt="Auto Fahrzeug Gebrauchtwagen Bewertung objektiv">
                                        </div><p style="text-align: left; font-size: 19px; padding-top: 10px"><b>500 +</b><br>verfügbare Städte</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Unsere Dienstleistungen sind in mehr als 500 Städten Deutschlands verfügbar.
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <h3 style="padding-top: 50px" class="text-center mobile-review">Mehr als 2.500 <span style="color: #23C197">5-Sterne</span> Bewertungen!</h3>
                </div>
            </div>
            <!-- <center style="padding-top: 25px"><a href="{{route('vorteile')}}" class="section-btn" style="width:250px">Alle Vorteile ansehen</a></center> -->
        </section>

        <section style="background-color: #f0f5fa" id="live-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="live-wrapper">
                            <div style="padding-top: 50px" class="watch-live text-center">
                                <a href="#">
                                    <img src="front/imgs/high-quality.png" alt="Zertifiziertes Gutachten Gebrauchtwagen" height="125px">
                                </a>
                            </div>
                            <div style="padding-top: 50px" class="used-car-history-wrapper m-auto text-center">
                            <div class="section-heading">
                                <h2 class="mb-0">Tätige keinen Fehlkauf.</h2>
                            </div>
                            <p style="font-size: 19px" class="paragraph m-auto py-5">
                                Wir prüfen dein gewünschtes Fahrzeug und erstellen einen zertifizierten Bericht, damit du eine fundierte Kaufentscheidung treffen kannst.
                            </p>
                            <a href="/Carspector_Mustergutachten.pdf" target="_blank" class="btn section-btn">Mustergutachten ansehen</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section style="background-color: white" class="slider-area">
            <div class="container container-lg">
                <div class="section-heading">
                    <h2 class="text-center">Das sagen unsere Kunden</h2>
                </div>
                <div class="slider-content">
                    <div class="slider-inner position-relative">
                        <div class="swiper-btns">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div class="slider-active swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="single-slider swiper-slide ">
                                    <div class="ratings text-center">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="slider-paragraph text-center">
                                        “Bei meinem Kauf eines Gebrauchtwagens war ich unsicher, da ich mich mit der Autotechnik nicht auskenne. Der über Carspector von mir ausgewählte Gutachter hat mir Sicherheit gegeben, das Auto gründlich gecheckt und alle meine Fragen gut beantwortet. “
                                    </p><br>
                                    <div class="client-info d-flex align-items-center">
                                        <img src="front/imgs/client-2.jpg" alt="Kundenbewertung">
                                        <h6>Susanne Lenz</h6>
                                    </div>
                                </div>
                                <div class="single-slider swiper-slide">
                                    <div class="ratings text-center">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="slider-paragraph text-center">
                                        “Nachdem ich meinen Führerschein bestanden habe, war ich sehr unsicher, was mein
                                        erstes Auto betrifft. Auf die Website gegangen, mit drei Klicks einen Gutachter
                                        gebucht und Zack: Ich konnte den perfekten Gebrauchtwagen für mich finden, bei
                                        dem ich über jegliche Mängel Bescheid weiß.”
                                    </p>
                                    <div class="client-info d-flex align-items-center">
                                        <img src="front/imgs/client.png" alt="Kundenbewertung">
                                        <h6>Annalena Bayreuth</h6>
                                    </div>
                                </div>
                                <div class="single-slider swiper-slide">
                                    <div class="ratings text-center">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="slider-paragraph text-center">
                                        "Ich bin wirklich begeistert von Ihrem Service! Es war eine wahre Freude, mit Ihnen zu arbeiten. Von Anfang bis Ende verlief alles perfekt und reibungslos. Die Professionalität Ihres Teams hat mich beeindruckt und ich bin äußerst zufrieden mit dem Ergebnis."
                                    </p><br><br>
                                    <div class="client-info d-flex align-items-center">
                                        <img src="front/imgs/client-3.png" alt="Kundenbewertung">
                                        <h6>Viktor Schmidt</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-btns">
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <!-- live area start -->
        <!-- <section id="live-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="live-wrapper">
                            <div class="watch-live text-center">
                                <a href="#">
                                    <img src="front/imgs/high-quality.png" alt="Zertifiziertes Gutachten Gebrauchtwagen" height="125px">
                                </a>
                            </div>
                            <div style="padding-top: 50px" class="section-heading">
                            <h2 class="text-center">Erhalte einen zertifizierten Bericht</h2>
                                <p style="font-size: 19px" class="paragraph text-center d-none d-sm-block">
                                Wir prüfen dein gewünschtes Fahrzeug vor dem Kauf und
                                erstellen ein <b>zertifiziertes Gebrauchtwagen-Gutachten</b>, das mehr als <b>150 verschiedene Prüfpunkte</b> abdeckt.
                                <br><br>
                                Natürlich berücksichtigen wir auch deine individuellen Wünsche und Vorstellungen, prüfen<br>diese genaustens und führen sie im Gutachten auf.
                                </p>
                                <p class="paragraph text-center d-sm-none">
                                Wir prüfen dein gewünschtes Fahrzeug vor dem Kauf und
                                erstellen ein <b>zertifiziertes Gebrauchtwagen-Gutachten</b>, das mehr als <b>150 verschiedene Prüfpunkte</b> abdeckt.
                                <br><br>
                                Natürlich berücksichtigen wir auch deine individuellen Wünsche und Vorstellungen und prüfen diese genaustens und führen sie im Gutachten auf.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        live area end --> 

        <section id="how-does-work">
      <h2 style="padding-bottom: 50px; padding-top: 0px" class="text-center">Warum du Carspector nutzen solltest</h2>

        <section style="padding-top: 15px" class="exam-area position-relative">


            <div class="container position-relative">
                <div class="exam-cards">
                    <div class="row g-lg-5 g-md-4 g-sm-3 pb-4">
                        <div class="col-sm-6 col-lg-4" >
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/checklist.png" alt="Gebrauchtwagencheck; Auto vor dem Kauf prüfen lassen">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Prüfung nach Vorgaben</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                   Erhalte einen Gebrauchtwagencheck nach TÜV-Vorgaben für dein gewünschtes Fahrzeug. Wir überprüfen jedes Detail, von Motor bis Karosserie, und decken potenzielle Mängel auf.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/camera.png" alt="Fotos Zustand Bilder Auto Fahrzeug Videos">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Detaillierte Fotodokumentation</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Du erhältst einen umfassenden Einblick in den Zustand deines gewünschten Fahrzeugs dank unserer detaillierten Fotodokumentation.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/target.png" alt="Auto Fahrzeug Gebrauchtwagen Bewertung objektiv">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Objektive Bewertung</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Du erhältst eine objektive Bewertung deines Fahrzeugs, da unsere Experten mit neutraler Sichtweise vorgehen und dein Fahrzeug auf Basis von Fakten und Standards bewertet.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/happy.png" alt="Entspannt zuhause vor Ort einfach">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Entspannt von zuhause</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Lehne dich entspannt zurück, während wir dein Traumfahrzeug überprüfen. Nach Abschluss des Checks besprechen wir das Ergebnis mit dir telefonisch.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/user-2.png" alt="fragen wünsche fahrzeug auto gebrauchtwagencheck">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Individuelle Wünsche</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Unsere Experten stehen dir mit ihrem Fachwissen und ihrer Erfahrung zur Seite, um genaustens auf deine individuellen Wünsche und Vorstellungen einzugehen.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/danger.png" alt="Tätige nie wieder einen Fehlkauf. Wir wissen was man beim Autokauf beachten muss.">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Tätige keinen Fehlkauf</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Tätige nie wieder einen Fehlkauf. Unser umfassender Gebrauchtwagencheck bietet dir die Sicherheit, dass du eine fundierte Entscheidung treffen kannst.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- <center style="padding-top: 25px"><a href="{{route('vorteile')}}" class="section-btn" style="width:250px">Alle Vorteile ansehen</a></center> -->
        </section>
        </section>

        <section style="padding-top: 50px; padding-bottom: 100px" id="live-area">

            <div style="background-color: white" class="section-title text-center py-4">
                <h2 class="fs-3 fw-bold mb-md-1">Erklärt in 4 einfachen Schritten</h2>
            </div>
            <div class="container">
                <div class="how-work-cards">
                    <div class="row justify-content-between justify-content-lg-center gx-lg-5">
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="how-work-card">
                                <div class="how-work-card-number">
                                    1
                                </div>
                                <div class="how-work-card-body">
                                    <h5>Stadt eingeben</h5>
                                    <p>Nenne uns die Stadt, in der dein Wunschfahrzeug steht.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="how-work-card">
                                <div class="how-work-card-number">
                                    2
                                </div>
                                <div class="how-work-card-body">
                                    <h5>Check wählen</h5>
                                    <p>Wähle deinen gewünschten Gebrauchtwagencheck.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="how-work-card">
                                <div class="how-work-card-number">
                                    3
                                </div>
                                <div class="how-work-card-body">
                                    <h5>Weitere Infos</h5>
                                    <p>Nenne uns weitere Informationen zum gewünschten Fahrzeug und zum Check.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="how-work-card">
                                <div style="background-color:#23C197" class="how-work-card-number">
                                    4
                                </div>
                                <div class="how-work-card-body">
                                    <h5>Geschafft!</h5>
                                    <p>Schließe die Buchung ab und wir checken das Fahrzeug nach unseren Vorgaben</a>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="you-get-area">
            <div class="container position-relative">
                <div class="row">
                    <div class="col">
                        <div class="you-get-wrapper">
                            <div class="section-heading">
                                <h2 class="d-none d-sm-block">Unsere Fahrzeugprüfungen</h2>
                                <h2 class="d-sm-none">Unsere Fahrzeug-<br>prüfungen</h2>
                            </div>
                            <div class="you-get-list d-flex">
                                <div class="you-get-list-row">
                                    <ul>
                                        <li>TÜV-Zertifiziert</li>
                                        <li>Karosserie-Check</li>
                                        <li>Sicherheits-Check</li>
                                        <li>Motor-Check</li>
                                        <li>Historien-Check</li>
                                    </ul>
                                </div>
                                <div class="you-get-list-row">
                                    <ul>
                                        <li>Umfassende Probefahrt</li>
                                        <li>Detaillierte Fotodokumentation</li>
                                        <li><b>Zertifiziertes Gebrauchtwagen-Gutachten</b></li>
                                        <div class="you-get-btn">
                                            <a href="{{route('faq')}}" class="section-btn">FAQ ansehen</a>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="you-get-thumb position-absolute">
                    <img src="{{ asset('front/imgs/bg-imgs/you-get-thumb.png') }}" alt="Carspector Prüfungsinhalte Gebrauchtwagencheck">
                </div>
            </div>
        </section>

        <!-- how-does-work area start -->
       
        <!-- how-does-work area end -->

        <section id="sets-us-apart">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-heading">
                            <h2 class="text-center">Das zeichnet uns aus</h2>
                        </div>
                        <div class="sets-us-apart-wrapper d-flex justify-content-between align-items-start">
                            <div class="single-set-us-box">
                                <div class="set-us-img">
                                    <img src="{{ asset('front/imgs/germany.png') }}" alt="deutschlandweit" height="75px" width="75px">
                                </div>
                                <p class="paragraph">Deutschlandweit im Einsatz</p>
                            </div>
                            <div class="single-set-us-box">
                                <div class="set-us-img">
                                    <img src="{{ asset('front/imgs/tuv.png') }}" alt="tüv zertifiziert" height="75px" width="75px">
                                </div>
                                <p class="paragraph">Zertifizierte Gutachten</p>
                            </div>
                            <div class="single-set-us-box">
                                <div class="set-us-img">
                                    <img src="{{ asset('front/imgs/search.png') }}" alt="transparent, unabhängig und neutral" height="75px" width="75px">
                                </div>
                                <p class="paragraph">Transparent, unabhängig & neutral</p>
                            </div>
                            <div class="single-set-us-box">
                                <div class="set-us-img">
                                    <img src="{{ asset('front/imgs/logo-2.png') }}" alt="sicher gebrauchtwagen kaufen" height="115px" width="115px">
                                </div>
                                <p class="paragraph">DIE Sicherheit für den Gebraucht-wagenkauf</p>
                            </div>
                            <div class="single-set-us-box">
                                <div class="set-us-img">
                                    <img src="{{ asset('front/imgs/live-2.png') }}" alt="kaufbegleitung" height="75px" width="75px">
                                </div>
                                <p class="paragraph">Kaufbegleitung (LIVE dabei)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
        <section id="how-does-work">
            <div class="container">
                <div class="how-does-work-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="how-does-work-content">
                                <div class="section-heading">
                                    <h2>Wie funktioniert Carspector?</h2>
                                </div>
                                <p class="paragraph">Schaue dir unser 60 sekündiges Erklärvideo an, um genau zu verstehen, wie Carspector funktioniert.</p>
                                <a href="#" onclick="return false" style="background-color: gray" class="section-btn d-none d-md-inline-flex">Bald verfügbar</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="how-does-work-img text-end">
                                <img src="front/imgs/bg-imgs/how-does-work-thumb.png" alt="Wie funktioniert Carspector">
                            </div>
                            <div class="mobile-section-btn">
                                <a href="#" onclick="return false" style="background-color: gray" class="section-btn d-md-none">Bald verfügbar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- you-get area start -->
        
       

        <!--------- FAQ area start --------->
        <section style="background-color: white" class="faq-area" id="faq-section">
            <div class="container-sm">
                <div class="section-heading">
                    <h2>Meistgestellte Fragen</h2>
                </div>
                <div class="faq-accordion">
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-one" aria-expanded="false" aria-controls="faq-one">
                                    Was ist Carspector?
                                </button>
                            </h2>
                            <div id="faq-one" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                    Carspector ist <b>deutschlands führender Anbieter von Gebrauchtwagenchecks</b> für Fahrzeuge aller Klassen. Unter Anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und
                                    Wohnmobile. Du kannst mit nur wenigen Klicks schnell und unkompliziert
                                    deinen persönlichen Gebrauchtwagencheck deutschlandweit buchen.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-two" aria-expanded="false" aria-controls="faq-two">
                                    Wie funktioniert Carspector genau?
                                </button>
                            </h2>
                            <div id="faq-two" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Wir fahren zu deinem gewünschten Fahrzeug und prüfen es direkt beim Verkäufer vor Ort.<br><br>
                                    Wir arbeiten mit zertifizierten Prüfern in ganz Deutschland zusammen, um unsere Leistungen möglichst flächendeckend anbieten zu können. Unser Team besteht ausschließlich
                                    aus geprüften und professionellen Kfz-Experten, die Fachwissen und Erfahrung mitbringen.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-one1" aria-expanded="false" aria-controls="faq-one1">
                                    Welche Fahrzeuge prüft Carspector?
                                </button>
                            </h2>
                            <div id="faq-one1" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                    <b>Wir prüfen Fahrzeuge aller Klassen.</b> Unter Anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und
                                    Wohnmobile. Falls dein gewünschtes Fahrzeug nicht dabei ist, kontaktiere gerne unseren <a href="{{route('kontakt')}}">Support</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-one11" aria-expanded="false" aria-controls="faq-one11">
                                    Was beinhaltet eine Fahrzeugprüfung?
                                </button>
                            </h2>
                            <div id="faq-one11" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                    Die Prüfungsinhalte variieren pro Fahrzeugklasse. Weitere Informationen zu den Inhalten des jeweiligen Fahrzeugs findest du weiter unten.<br><br>
                                    Grundsätzlich prüfen wir allerdings bei jeder Fahrzeugklasse: Die Fahrzeugdokumente, die Fahrzeughistorie, den Lack und Außenzustand,
                                    den Motor und die Elektronik, den Kilometerstand, den Innenraum und vieles mehr.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-two3" aria-expanded="false" aria-controls="faq-two3">
                                    In welchen Städten kann ich buchen?
                                </button>
                            </h2>
                            <div id="faq-two3" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Wir bieten unsere Dienstleistungen <b>deutschlandweit</b> in allen Gebieten und Städten an.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three6" aria-expanded="false" aria-controls="faq-three6">
                                    Welche Informationen muss ich angeben?
                                </button>
                            </h2>
                            <div id="faq-three6" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Um dein gewünschtes Fahrzeug zu prüfen, benötigen wir <b>Marke, Modell und die Adresse des Fahrzeugs</b>. Optional kannst du noch den Link zum
                                 Inserat angeben, damit wir uns bestens vorbereiten können. Zusätzlich kannst du uns gerne deine Prüfungswünsche und Fragen mitteilen.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-five" aria-expanded="false" aria-controls="faq-five">
                                    Ich habe eine Prüfung gebucht - wie geht es weiter?
                                </button>
                            </h2>
                            <div id="faq-five" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Du erhältst einen Eintrag auf deinem Profil und eine E-Mail mit Rechnung und allen wichtigen Informationen. Wir werden nun dein
                                gewünschtes Fahrzeug prüfen und senden dir schnellstmöglich das Prüfergebnis zu. Zusätzlich stehen wir dir weiterhin für Rückfragen zur Prüfung
                                zur Verfügung und klären Fragen auch gerne telefonisch.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-six_2" aria-expanded="false" aria-controls="faq-six_2">
                                    Wann erhalte ich das Prüfergebnis?
                                </button>
                            </h2>
                            <div id="faq-six_2" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Durchschnittlich dauert es <b>2-4 Werktage</b>, bis du das Ergebnis des Gebrauchtwagenchecks erhältst. Jedoch kann es manchmal zu Verzögerungen kommen, da wir
                                 auf die Verfügbarkeit des Verkäufers angewiesen sind.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-nine" aria-expanded="false" aria-controls="faq-nine">
                                    Ich habe Fragen, wie kann ich euch kontaktieren?
                                </button>
                            </h2>
                            <div id="faq-nine" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                Nutze ganz einfach unser <a href="{{route('kontakt')}}">Kontaktformular</a>, um uns zu kontaktieren. Unser Kundenservice wird sich um dein Anliegen kümmern und sich schnellstmöglich bei dir melden.
                                <br><br>
                                Ansonsten auch ganz entspannt via <a target="_blank" href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20">WhatsApp</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-seven" aria-expanded="false" aria-controls="faq-seven">
                                    Mein Wunschfahrzeug ist abgemeldet - ist das ein Problem?
                                </button>
                            </h2>
                            <div id="faq-seven" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                <b>Nein.</b> Unsere geschulten Prüfer haben jahrelange Erfahrung im Bereich Gebrauchtwagen und können daher den Zustand eines Fahrzeugs schnell und auch ohne Probefahrt bestimmen.
                                Jedoch empfiehlt es sich, den Verkäufer darauf aufmerksam zu machen, dass wir gerne eine Probefahrt während des Gebrauchtwagenchecks machen möchten.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-six" aria-expanded="false" aria-controls="faq-six">
                                    Ich bin mir nicht sicher, ob mir Carspector wirklich helfen kann?
                                </button>
                            </h2>
                            <div id="faq-six" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                Das Feedback unserer Kunden spricht für sich. Laut Kundenumfragen und Bewertungen sind <b>97,5% aller Kunden mehr als zufrieden</b> und empfehlen Carspector weiter.
                                 Falls du dich beim Gebrauchtwagenkauf unsicher fühlst oder einfach auf Nummer sicher gehen möchtest, ist Carspector genau das Richtige für dich. Probiere es aus!
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-four" aria-expanded="false" aria-controls="faq-four">
                                    Kostet die Buchung noch extra Gebühren?
                                </button>
                            </h2>
                            <div id="faq-four" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                    <b>Nein.</b> Du bezahlst lediglich den Preis für den Gebrauchtwagencheck. Auf dich kommen sonst keine weiteren Kosten oder Gebühren zu.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-eleven" aria-expanded="false" aria-controls="faq-eleven">
                                    Welche Zahlungsmethoden kann ich nutzen?
                                </button>
                            </h2>
                            <div id="faq-eleven" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                Du kannst mit allen gängigen Zahlungsmethoden bei uns bezahlen. Die beliebtesten sind <b>PayPal, VISA, Klarna und ApplePay.</b>
                                    <br><br>
                                Falls deine Zahlungsmethode nicht dabei sein sollte, zögere nicht uns zu <a href="{{route('kontakt')}}">kontaktieren</a> und wir finden gemeinsam eine Lösung.
                                </div><br>
                            </div>
                        </div>
                        <br><br><br>
                        <center><a href="{{route('faq')}}" class="section-btn" style="width:300px">Weitere Fragen ansehen</a></center>
                    </div>
                </div>
            </div>
        </section>
        <!--------- FAQ area end --------->

        <!--------- safe-and-easy area start --------->
        <section style="background-color: #f0f5fa" id="safe-and-easy">
            <div class="container position-relative">
                <div class="row">
                    <div class="col">
                        <div class="safe-and-easy-wrapper">
                            <div class="section-heading">
                                <h2 class="d-none d-sm-block">Wir machen den Gebrauchtwagenkauf sicher. und einfach. und günstig.</h2>
                                <h2 class="d-sm-none">Wir machen den Gebrauchtwagen-<br>kauf sicher. und einfach. und günstig.</h2>
                            </div>
                            <p class="paragraph pt-3 pb-5">
                                Lasse jetzt dein gewünschtes <b>Fahrzeug vor dem Kauf prüfen</b> und tätige nie wieder einen Fehlkauf. Ebenfalls kannst du unser Gutachten nutzen, um den Preis zu drücken und Geld zu sparen.
                            </p>
                            <a href="{{route('index')}}" class="section-btn">Jetzt loslegen</a>
                        </div>
                    </div>
                </div>
                <div class="safe-easy-thumb position-absolute">
                    <img src="front/imgs/bg-imgs/safe-and-easy-thumb.png" alt="Gebrauchtwagenkauf sicher und einfach und günstig. Gebrauchtwagengutachten. Geld sparen.">
                </div>
            </div>
        </section>
        <!--------- safe-and-easy area end --------->

        <!-- Testimonail Section Start -->
        
        <!-- Testimonail Section End -->

        <!-- known-from Section start -->
        <section id="known-from-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="known-from-wrapper">
                            <div class="section-heading">
                                <h2 class="text-center">Carspector ist bekannt aus</h2>
                            </div>
                            <div class="known-from-items m-auto d-flex justify-content-between align-items-start">
                                <div class="kf-single-item text-center">
                                    <div class="known-from-img">
                                        <img src="front/imgs/autobild-logo.png" alt="Carspector Autobild" width="115px" height="115px">
                                    </div>
                                    <p class="paragraph">Autobild</p>
                                </div>
                                <div class="kf-single-item text-center">
                                    <div class="known-from-img">
                                        <img src="front/imgs/logo_dw_2017.png" alt="Carspector Düsseldorfer Wirtschaft" width="115px" height="115px">
                                    </div>
                                    <p class="paragraph">Düsseldorfer Wirtschaft</p>
                                </div>
                                <div class="kf-single-item text-center">
                                    <div class="known-from-img">
                                        <img src="front/imgs/youtube.png" alt="Carspector Youtube" width="115px" height="115px">
                                    </div>
                                    <p class="paragraph">Youtube und weitere soziale Medien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- known-from Section End -->

        <div class="sticky-bottom-footer" style="display: none">
            <div class="hero-form hero-area-form blue-hero-form" style="padding: 10px 10px">
                <form action="{{route('booking.option-page')}}" style="margin: auto !important;">

                    <div class="d-flex gap-md-2 w-100 align-items-center  flex-md-row mobile-hero-area-btns">
                        <div class="input-box input-box-icon mb-0 flex-grow-1 align-items-center">
                            <span class="icon"><img src="front/imgs/sedan.png" alt="Gebrauchtwagencheck" width="50px" height="50px"></span>
                            <input name="city" type="search" pattern="[0-9-A-Za-zäöüÄÖÜß\s]+.*[^ ].*" placeholder="Stadt/ PLZ" class="form-control input-shadow-1" required>
                        </div>
                        <button type="submit" class="btn btn-secondary btn-check-city btn-footer-bottom fw-bold">CHECK</button>

                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        const typedTextSpan = document.querySelector(".typed-text");
        const cursorSpan = document.querySelector(".cursor");

        const textArray = ["Autos", "Transporter", "Oldtimer", "Sportwagen", "Wohnmobile"];
        const typingDelay = 200;
        const erasingDelay = 100;
        const newTextDelay = 1000;

        let textArrayIndex = 0;
        let charIndex = 0;

        function type() {
            if (charIndex < textArray[textArrayIndex].length) {
                if (!cursorSpan.classList.contains("typing"))
                    cursorSpan.classList.add("typing");
                typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
                charIndex++;
                setTimeout(type, typingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                setTimeout(erase, newTextDelay);
            }
        }

        function erase() {
            if (charIndex > 0) {
                if (!cursorSpan.classList.contains("typing"))
                    cursorSpan.classList.add("typing");
                typedTextSpan.textContent = textArray[textArrayIndex].substring(
                    0,
                    charIndex - 1
                );
                charIndex--;
                setTimeout(erase, erasingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                textArrayIndex++;
                if (textArrayIndex >= textArray.length) textArrayIndex = 0;
                setTimeout(type, typingDelay + 200);
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            // On DOM Load initiate the effect
            if (textArray.length) setTimeout(type, newTextDelay + 250);
            type();
        });

        $(window).scroll(function() {
            var ScrollTop = $(window).scrollTop();
            if (ScrollTop > 750) {
                $('.sticky-bottom-footer').fadeIn(600);
            }else{
                $('.sticky-bottom-footer').fadeOut(100);
            }
        });
    </script>
@endsection

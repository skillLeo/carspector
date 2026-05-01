<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gebrauchtwagencheck - Sicher und zertifiziert. Lass dein Auto vor dem Kauf prüfen. Deutschlandweit für alle Fahrzeugklassen.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Carspector - Gebrauchtwagencheck | Deutschlandweit | Zertifiziert</title>

    <!-- Chrome, Firefox OS & Opera -->
    <meta name="theme-color" content="#01449A">
    <!-- Windos-Phone -->
    <meta name="msapplication-navbutton-color" content="#01449A">
    <!-- Safari & iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#01449A">

    <link rel="icon" href="/favicon.ico">

    <!-- css-start -->
    <link rel="stylesheet" href="{{ asset('front-home/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-home/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-home/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-home/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-home/css/responsive.css') }}" />
    <!-- css-start-end -->

    <style>
        .dropdown-item{
            color: #5e5b5b !important;
            /*border-bottom: 1px solid #e7e7e7;*/
        }
        .swiper-slide{
            /*display: block !important;*/
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

                /*height: 50px !important;*/

            }
            /*.btn-check-city{*/
            /*    display: none;*/
            /*}*/

        }

        

        .single-advantage-card{
            min-height: 0px;
            height: auto;
        }

        @media screen and (min-width: 568px) {
            .blue-hero-form{
                padding-right: 50px;
            }

            .extra-1{
            width: 400px;
        }

        .btn-footer-bottom {
                width: 25%;
            }

        .center-hero-2{
            margin: auto;
            text-align: center;
        }

        h1 {
            font-size: 75px;
            font-weight: 450;
            line-height: 0.95;
            letter-spacing: -3px;
            font-family: var(--roboto);
            margin: auto;
        }

        .hero-area {
	        min-height: 500px;
            background: #01449A;
	        padding-bottom: 90px;
	        padding-top: 160px;
            text-align: center;
        }

        .hero-area::after {
            background: linear-gradient(to right, rgb(7, 75, 163, 1) 100%, rgba(7, 75, 163, .5) 100%);
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.92;
        }

        .hero-content {
	        max-width: 600px; 
            text-align: center;
            margin: auto;
        }

        .hero-para {
            text-align: center;
            margin: auto;
            font-size: 21px;
            max-width: 750px;
            letter-spacing: 0;
            font-family: var(--roboto);
            line-height: 1.45;
        }   

        .hero-form {
            max-width: 450px;
            background-color: transparent;
            padding: 0px 0px 0px;
            border-radius: 0;
        }

        .hero-area .hero-form {
            padding: 0px 0px 0px;
        }

        }

        .spezial-4{
            padding-top: 10px;
        }

        @media screen and (min-width: 1200px) {
            h1 {
            font-size: 95px;
            font-weight: 500;
            line-height: 0.95;
            letter-spacing: -3px;
            font-family: var(--roboto);
            margin: auto;
        }

        }

        .df-3{
                padding-top: 20px;
            }

        @media screen and (max-width: 767px) {
            .mobile-review{
                padding-top: 75px;
                font-weight: 300;
                padding-bottom: 75px;
            }
            
            .btn-footer-bottom {
                width: 100%;
            }

            h1 {
                font-size: 52px;
                font-weight: 500;
                letter-spacing: -1.5px;
            }

            .hero-list{
                font-size: 13px;
            }

            .hero-content{
                text-align: center;
                margin: auto;
            }

            .hero-para{
                text-align: center;
                margin: auto;
            }

            .efs-4 span{
                font-size: 18px; 
            }

            .INV2{
                max-width: 100%;
            }

            .hero-area{
                padding-top: 100px;
            }

            .pad-2{
                padding-bottom: 35px;
            }

            .bbtn-3 {
                text-align: center !important;
                margin: 0 auto !important;
                display: block !important;
                padding-top: 14px !important;
            }

        }        

        .sticky-bottom-footer{
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #00449a;
            z-index: 9999999999;
        }
        .offcanvas{
            max-width: 85% !important;
        }

        .check-card {
            height: 150px;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* remove the gap so it doesn't close */
        }
        .dropdown{
            border-radius: 0 !important;
        }
        .dropdown-item{
            color: #01449A !important;

        }
        .btn-further {
            height: 50px !important;
        }

        .faq-btn-2 {
            background-color: var(--primary) !important;
        }

        .faq-btn-2:hover {
            background-color: var(--secondary) !important;
        }

        

        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {

            .dropdown-menu li{
                position: relative;
            }
            .dropdown-menu .submenu{
                display: none !important;
                position: absolute !important;
                left:100% !important;
                transform: none !important;

                top:-7px;
            }
            .dropdown-menu .submenu-left{
                right:100%; left:auto;
            }

            .dropdown-menu > li:hover{ background-color: #f1f1f1 }
            .dropdown-menu > li:hover > .submenu{
                display: block !important;
            }
        }
        /* ============ desktop view .end// ============ */

        /* ============ small devices ============ */
        @media (max-width: 991px) {

            .dropdown-menu .dropdown-menu{
                margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
            }

        }

        .my-dropdown-toggle::after {
            content: none;
        }

        .btn-demo:hover {
            background-color: white !important;
            color: var(--primary) !important;
        }

        @media (max-width: 767.98px) {
            /* Grundlegende Gestaltung des Dropdown-Menüs */
            .dropdown-menu {
                padding: 15px !important; /* Mehr Padding um die gesamte Dropdown-Liste */
                width: 250px; /* Breitere Liste */
                font-size: 18px; /* Größere Schrift für bessere Lesbarkeit */
                background-color: #ffffff; /* Weißer Hintergrund für bessere Sichtbarkeit */
                border-radius: 8px; /* Abgerundete Ecken */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Leichte Schatten für Tiefenwirkung */
                transition: all 0.3s ease; /* Sanfter Übergang bei Hover */
                z-index: 9999; /* Sicherstellen, dass das Dropdown immer oben ist */
            }

            .dropdown-item {
                padding: 12px 20px; /* Mehr Platz zwischen den einzelnen Links im Dropdown-Menü */
                font-size: 17px; /* Größere Schrift für die Links */
                color: #333; /* Dunkle Schriftfarbe */
                text-decoration: none; /* Unterstreichung entfernen */
                border-radius: 5px; /* Leicht abgerundete Ecken für die Links */
                transition: background-color 0.3s ease; /* Sanfter Übergang bei Hover */
            }

            /* Hover-Effekt für die Dropdown-Elemente */
            .dropdown-item:hover {
                background-color: #007bff; /* Blaue Hintergrundfarbe bei Hover */
                color: #ffffff; /* Helle Schriftfarbe bei Hover */
            }

            /* Überschrift im Dropdown-Menü nur auf Mobil */
            .dropdown-menu li strong {
                font-size: 18px;
                color: #343a40; /* Farbe der Überschrift */
                display: block; /* Sicherstellen, dass es sich wie eine Überschrift verhält */
                border-bottom: 1px solid #ddd; /* Linie unter der Überschrift für bessere Übersicht */
                margin-bottom: 10px; /* Abstand nach unten */
                margin-top: 0; /* Verringern des Abstands nach oben auf 0 */
                padding: 5px 0; /* Padding für mehr Platz */
            }

            /* Zusätzlicher Abstand für die zweite Überschrift */
            .dropdown-menu li:nth-child(7) strong {
                margin-top: 10px; /* Abstand nach oben für die zweite Überschrift */
            }

            /* Spezifischer Abstand NUR im Dropdown-Menü auf Mobil */
            .dropdown-menu li {
                margin-bottom: 10px; /* Abstand nur zwischen den Dropdown-Menüpunkten */
            }

            /* Keine zusätzlichen Abstände zwischen den Hauptmenüpunkten auf Mobil */
            .mobile-menu-link ul {
                padding-left: 0;
                margin: 0;
            }

            .mobile-menu-link li {
                margin-bottom: 0; /* Kein zusätzlicher Abstand zwischen den Menüpunkten im Hauptmenü */
            }

            .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Halbtransparentes Schwarz */
            z-index: 9998; /* Unter dem Dropdown, aber über dem Inhalt */
        }
        }

    </style>

    <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '407563301697559');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=407563301697559&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-65LCZE82B5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-65LCZE82B5');
    </script>
  	<script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Carspector",
            "url": "https://www.carspector.de"
        }
    </script>

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11007240787"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11007240787');
</script>
</head>
<body>

<!-- mobile-menu-start -->
<div class="mobile-menu d-lg-none">
    <div class="offcanvas offcanvas-end bg-primary p-4" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header flex-column">
            <span style="padding-top: 8px; color:white; font-size: 20px">Menü</span>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="offcanvas-body p-0">
            <div class="mobile-menu-link py-4 border-white">
                <ul>
                    <li class="dropdown">
                        <a style="font-size: 19px; text-align: center" href="#" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Leistungen</a>
                        <ul class="dropdown-menu" style="border-radius: 1 !important;z-index: 99999999 !important;padding: 8px 8px;">
                            <li><strong style="font-size: 18px; padding-top: 5px !important; display: block;">Gebrauchtwagencheck</strong></li>
                            <li><a class="dropdown-item" href="{{route('gebrauchtwagencheck')}}">Auto/ PKW Check</a></li>
                            <li><a class="dropdown-item" href="{{route('transporter')}}">Transporter-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('oldtimer')}}">Oldtimer-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('sportwagen')}}">Sportwagen-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('wohnmobil')}}">Wohnmobil-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('kaufbegleitung')}}">Kaufbegleitung</a></li>
                            <li style="padding-top: 5px"><strong style="font-size: 18px; padding: 10px 0; display: block;">Inserat-Prüfungen</strong></li>
                            <li><a class="dropdown-item" href="{{route('inseratcheck')}}">Inserat-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('wertermittlung')}}">Wert-Ermittlung</a></li>
                            <li style="padding-top: 5px"><strong style="font-size: 18px; padding: 10px 0; display: block;">Weitere Angebote</strong></li>
                            <li><a class="dropdown-item" href="{{route('fahrzeuglieferung')}}">Fahrzeug-Lieferung</a></li>
                            <li style="padding-bottom: 5px"><a class="dropdown-item" href="/Kfz-Kaufvertrag.pdf">Kfz-Kaufvertrag</a></li>
                        </ul>
                    </li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('faq')}}">FAQ</a></li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('rezensionen')}}">Rezensionen</a></li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="https://blog.carspector.de">Blog</a></li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('kontakt')}}">Kontakt</a></li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('login')}}">Login</a></li>
                    <br>
                    <hr style="color: white; border-width: 1px; background-color: white">
                    <div style="text-align: center; padding-top: 10px">
                        <p style="font-size: 17px; color: white"><b>Fragen? Support kostenlos anrufen.</b></p>
                        <p style="font-size: 17px; color: white">Mo-Sa: 9:00 - 20:00 Uhr</p>
                        <a href="tel:021192325550" style="width: 90%; height: 50px; font-size: 16px" class="btn btn-secondary shadow">0211 92325550</a>
                    </div> 
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- mobile-menu-end -->

    <header class="header position-absolute top-0 start-0 w-100 z-3">
    <div class="header-wrapper container d-flex align-items-center justify-content-center justify-content-md-between">
        <!-- header-logo -->
        <div class="header-logo">
            <a href="{{url('/')}}"><img src="{{ asset('front/imgs/logos/logo-2.png') }}" alt="Gebrauchtwagencheck, Fahrzeugcheck"> <span style="letter-spacing: 0.1px" class="d-none d-lg-block">Auto gecheckt,<br>sicher gekauft.</span></a>
        </div>
        <!-- header-logo-end -->

        <!-- header-right -->
        <div class="header-end align-items-center d-none d-lg-flex">
            <div class="header-nav ">
                <ul style="letter-spacing: 0.5px" class="d-flex align-items-center justify-content-end">
                    <li class="dropdown">
                        <a href="{{route('index')}}" class="dropdown-toggle"  type="button" data-bs-toggle="dropdown" >Leistungen</a>
                        <ul class="dropdown-menu " style="border-radius: 1 !important;z-index: 99999999 !important;">
                        <li style="padding-top: 5px"><strong style="padding-left: 15px">Fahrzeug-Checks</strong></li>
                                <li style="padding-top: 5px"><a class="dropdown-toggle dropdown-item my-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Gebrauchtwagencheck &raquo; </a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('gebrauchtwagencheck')}}">Auto/ PKW</a></li>
                                        <li><a class="dropdown-item" href="{{route('transporter')}}">Transporter</a></li>
                                        <li><a class="dropdown-item" href="{{route('oldtimer')}}">Oldtimer</a></li>
                                        <li><a class="dropdown-item" href="{{route('sportwagen')}}">Sportwagen</a></li>
                                        <li><a class="dropdown-item" href="{{route('wohnmobil')}}">Wohnmobil</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="{{route('kaufbegleitung')}}">Kaufbegleitung</a></li>
                                <br>
                                <li><strong style="padding-left: 15px">Inserat-Prüfungen</strong></li>
                                <li style="padding-top: 5px"><a class="dropdown-item" href="{{route('inseratcheck')}}">Inserat-Check</a></li>
                                <li><a class="dropdown-item" href="{{route('wertermittlung')}}">Wert-Ermittlung</a></li>
                                <br>
                                <li><strong style="padding-left: 15px">Weitere Angebote</strong></li> 
                                <li style="padding-top: 5px"><a class="dropdown-item" href="{{route('fahrzeuglieferung')}}">Fahrzeug-Lieferung</a></li>
                                <li style="padding-bottom: 5px"><a class="dropdown-item" href="/Kfz-Kaufvertrag.pdf">Kfz-Kaufvertrag</a></li>
                            </ul>
                    </li>
                    <li><a href="{{route('faq')}}">FAQ</a></li>
                    <li><a href="{{route('rezensionen')}}">Rezensionen</a></li>
                    <li><a href="https://blog.carspector.de">Blog</a></li>
                    <li><a href="{{route('kontakt')}}">Kontakt</a></li>
                </ul>
            </div>

            <div class="header-btn">
                @if(auth()->user())
                    @if(auth()->user()->type=='examiner')
                        <a href="{{route('examiner.dashboard')}}">Mein Profil</a>
                    @else
                        <a href="{{route('user.dashboard')}}">Mein Profil</a>
                    @endif

                @else
                    <a href="{{route('login')}}">Login</a>
                @endif
            </div>
        </div>
        <!-- header-right-end -->

        <!-- menu-bar -->
        <div class="bar d-lg-none">
            <button class="mobile-menu-btn d-lg-none bg-transparent border-0 p-0 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <!-- menu-bar-end -->
    </div>
</header>

<!-- main -->
<main>

    <!-- hero-area-start -->
    <section class="section hero-area position-relative z-1">
        <div class="container">
          <div class="hero-wrapper px-1 px-sm-0">
            <!-- hero-content -->
            <div class="hero-content center-hero-2">
              <h1 class="text-white pb-sm-4 pad-2 mb-0 mb-sm-2">Wir <span class="text-secondary">prüfen</span> deinen Neuen.</h1>

              <p style="padding-bottom: 35px" class="hero-para text-white mb-2 mb-sm-1">Wir prüfen das Fahrzeug, das du kaufen möchtest – direkt vor Ort und nach strengen TÜV-Richtlinien. 
                Du erhältst ein zertifiziertes Gebrauchtwagen-Gutachten inklusive Wertermittlung und einen Überblick über zukünftige Kosten.</p>
                
              <form action="{{route('booking.option-page')}}" class="m-auto">
                  <div>
                    <button type="submit" style="width: 450px; height: 60px; font-size: 18px; letter-spacing: -0.25px" class="btn btn-secondary form-btn mt-2 INV2">Fahrzeug-Check buchen</button>
                  </div>
                </form>
                <form action="/Carspector_Mustergutachten.pdf" target="_blank" class="m-auto">
                  <div>
                    <button type="submit" style="width: 450px; height: 55px; color: white; background-color: transparent; border-color: white" class="btn btn-demo form-btn mt-2 INV2">Demo-Gutachten ansehen</button>
                  </div>
                </form>

                <br>

              <div class="d-flex df-3 align-items-center justify-content-center gap-4">
                <span class="ratings-check flex-shrink-0">
                  <img src="front/imgs/high-quality.png" alt="Gebrauchtwagencheck">
                </span>

                <div class="rating-details">
                  <div class="rd-top d-inline-flex align-items-center gap-3 mb-2">
                    <span class="text-white fw-bold">4.8</span>
                    <div class="ratings text-secondary">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                  </div>
                  </div>

                  <div class="rd-bottom">
                    <p class="text-white mb-0"><span class="fw-bold">2.938</span> Bewertungen</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

      <div class="hero-mobile-bg d-sm-none position-relative">
        <img style="width: 100%" src="front-home/imgs/bg/hero-mobile-bg.jpg" alt="fahrzeug prüfung">
      </div>
      <!-- hero-area-start-end -->

    <!-- about-cards-section-start -->
    <section class="about-cards-section section-bg">
        <div class="container">
          <div class="about-cards-wrapper m-auto position-relative">
            <div class="about-cards-slider swiper mySwiper">
              <div class="swiper-wrapper">

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/tuv.png" alt="TÜV Gebrauchtwagencheck" height="50px"></span>
                  TÜV Vorgaben
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/certificate.png" alt="Zertifizierte Prüfer" height="45px"></span>
                  Zertifizierte Prüfer
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/adac.png" alt="ADAC Richtlinien" height="25px"></span>
                  ADAC Richtlinien
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/germany.png" alt="Gebrauchtwagencheck Deutschlandweit" height="50px"></span>
                  Deutschlandweit
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/quick.png" height="55px" alt="Schnell und einfach"></span>
                  Schnelle Buchung
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/shield.png" height="50px" alt="Garantie & Zertifiziert"></span>
                  Prüfungsgarantie
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/hp-car.png" height="50px" alt="Alle Fahrzeugklassen"></span>
                  Alle Fahrzeugklassen
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/telephone.png" height="40px" alt="Kundenservice und Support"></span>
                  24/7 Kundenservice
                </div>

              </div>
            </div>

            <div class="about-cards-pagination swiper-pagination"></div>

          </div>
        </div>
      </section>
      <!-- about-cards-section-end -->

    <!--
    <section class="user-section section-padding">
        <div class="container">
            <div class="unsure-wrapper m-auto">
                <div class="row g-0 unsure-wrapper-row">
                    <div class="col-lg-6">
                        <div class="unsure-text mt-lg-3">
                            <h2 class="unsure-heading">Unsicher beim Autokauf?</h2>
                            <div class="unsure-icon mb-3">
                                <span><img src="front-home/imgs/icons/delete-circle.svg" alt=""></span>
                            </div>
                            <p class="paragraph unsure-para">Leider muss man heutzutage mit Vorsicht und Achtung dem Verkäufer gegenüber treten.
                                <br><br>
                                Betrug und Abzocke tritt immer häufiger auf und Käufer werden tagtäglich damit konfrontiert.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="unsure-img">
                            <img src="front-home/imgs/thumbs/unsuer-thumb.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->

    <!-- not-anymore-section-end -->
    <section class="not-anymore-section section-padding">
        <div class="container">
          <div class="not-anymore-wrapper m-auto">
            <div class="row flex-column-reverse flex-lg-row g-0 not-anymore-wrapper-row">
              <div class="col-lg-6">
                <div class="not-anymore-img">
                  <img src="assets/imgs/thumbs/not-anymore-thumb.jpg" alt="Gebrauchtwagencheck">
                </div>

                <form action="{{route('booking.option-page')}}">
                <div class="text-center text-md-start d-sm-none pt-4 mt-3">
                  <button type="submit" style="width: 100%; height: 55px; font-size: 17px; font-weight: 500 !important" class="btn btn-secondary book-a-check-btn">Jetzt buchen</button>
                </div>
    </form>
              </div>

              <div class="col-lg-6">
                <div class="not-anymore-text mt-xl-3">
                  <h2 style="padding-bottom: 15px; font-weight: 600; font-size: 40px; letter-spacing: -0.5px" class="not-anymore-heading mb-0 d-none d-sm-block">Gebrauchtwagencheck vor dem Kauf</h2>
                  <h2 style="padding-bottom: 15px; font-weight: 600; font-size: 33px; letter-spacing: -0.5px" class="not-anymore-heading mb-0 d-sm-none text-center">Gebrauchtwagen-Check vor dem Kauf</h2>
                  <!-- <img src="front/imgs/car-check-3.png" alt="" class="not-anymore-icon my-3"> -->
                  <!-- <p style="padding-top: 15px" class="paragraph not-anymore-para mb-sm-4">Wir prüfen dein gewünschtes Fahrzeug vor dem Kauf, damit du über den technischen und optischen Zustand
                    bestens informiert bist und eine fundierte Kaufentscheidung treffen kannst.</p> --> 
                    <p style="padding-top: 15px; letter-spacing: -0.25px" class="paragraph not-anymore-para mb-sm-4 d-none d-sm-block">Wir prüfen dein gewünschtes Fahrzeug vor dem Kauf, damit du über den technischen und optischen Zustand bestens informiert bist und eine fundierte Kaufentscheidung treffen kannst.</p> 
                    <p style="padding-top: 10px; letter-spacing: -0.25px" class="paragraph not-anymore-para mb-sm-4 text-center d-sm-none">Wir prüfen dein gewünschtes Fahrzeug vor dem Kauf, damit du über den technischen und optischen Zustand bestens informiert bist und eine fundierte Kaufentscheidung treffen kannst.</p> 
                    
                   <div style="padding-top: 15px" class="text-center text-md-start d-none d-sm-block">
                    <form action="{{route('booking.option-page')}}"><button type="submit" style="font-weight: 500 !important; width: 350px" class="btn btn-secondary book-a-check-btn">Jetzt buchen</button></form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </section>
      <!-- not-anymore-section-end -->

    <!-- advantages-section-start -->
    <section class="reviews-section section-padding section-bg">
        <div class="container">
          <div class="advantages-wrapper">
          <h2 style="font-weight: 600; font-size: 40px; letter-spacing: -0.5px; padding-bottom: 50px !important" class="text-center d-none d-sm-block">Deine Vorteile mit Carspector</h2>
          <h2 style="font-weight: 600; font-size: 35px; letter-spacing: -0.5px; padding-bottom: 40px !important" class="text-center d-sm-none">Deine Vorteile mit Carspector</h2>

            <div class="advantages-cards">
              <div class="row advantages-cards-row g-4 g-xxl-4">

                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                        <img src="front/imgs/check-2.png" alt="Sicherheit vor dem Kauf">
                      </span>

                        <div class="efs-4 spezial-4 sac-info">
                            <span style="font-weight: 550 !important" class="fw-bold">Sicherheit vor dem Kauf</span>
                        </div>
                        </div>
                        <p class="sac-para mb-0">Wir bieten Sicherheit und schützen dich vor unvorhergesehenen Problemen beim Fahrzeugkauf.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="Gebrauchtwagencheck">
                      </span>

                      <div class="efs-4 spezial-4 sac-info">
                            <span style="font-weight: 550 !important" class="fw-bold">Schutz vor Betrug</span>
                        </div>
                        </div>
                        <p class="sac-para mb-0">Unser Gebrauchtwagencheck enthüllt Betrug und schützt dich effektiv vor unseriösen Angeboten und Abzocke</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="Schutz vor Betrug">
                      </span>

                      <div class="efs-4 spezial-4 sac-info">
                            <span style="font-weight: 550 !important" class="fw-bold">Geringes Risiko</span>
                        </div>
                        </div>
                        <p class="sac-para mb-0">Wir minimieren dein Risiko und machen potenzielle Probleme und Mängel frühzeitig sichtbar.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="Kein Risiko beim Gebrauchtwagenkauf">
                      </span>

                      <div class="efs-4 spezial-4 sac-info">
                            <span style="font-weight: 550 !important" class="fw-bold">Vermeide hohe Kosten</span>
                        </div>
                        </div>
                        <p class="sac-para mb-0">Mit uns vermeidest du teure Reparaturen und unerwartete Zusatzkosten nach dem Kauf.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                        <img src="front/imgs/check-2.png" alt="Kosten Geld sparen">
                      </span>

                        <div class="efs-4 spezial-4 sac-info">
                            <span style="font-weight: 550 !important" class="fw-bold">Tätige keinen Fehlkauf</span>
                        </div>
                        </div>
                        <p class="sac-para mb-0">Mit unserem Gebrauchtwagencheck tätigst du nie wieder einen Fehlkauf und sparst dir somit Zeit und Geld.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="Gebrauchtwagencheck">
                      </span>

                      <div class="efs-4 spezial-4 sac-info">
                            <span style="font-weight: 550 !important" class="fw-bold">Zeit- und Wegersparnis</span>
                        </div>
                        </div>
                        <p class="sac-para mb-0">Du sparst dir lange Anfahrtswege und endlose Besichtigungstermine – bequem von zuhause aus.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="Preisverhandlung Unterstützung">
                      </span>

                      <div class="efs-4 spezial-4 sac-info">
                            <span style="font-weight: 550 !important" class="fw-bold">Verhandlungssicherheit</span>
                        </div>
                        </div>
                        <p class="sac-para mb-0">Du bist bestens vorbereitet und kannst mit dem Bericht den Preis des Fahrzeugs gezielt verhandeln.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                        <img src="front/imgs/check-2.png" alt="Sichere transparente Kaufentscheidung">
                      </span>

                        <div class="efs-4 spezial-4 mb-pb-2 sac-info">
                            <span style="font-weight: 550 !important" class="fw-bold">Sichere Kaufentscheidung</span>
                        </div>
                        </div>
                        <p class="sac-para mb-0">Wir liefern dir alle notwendigen Daten, um eine informierte und sichere Kaufentscheidung zu treffen.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                        <img src="front/imgs/check-2.png" alt="Sorgenfreie Fahrt problemlos">
                      </span>

                        <div class="efs-4 spezial-4 sac-info">
                            <span style="font-weight: 550 !important" class="fw-bold">Sorgenfreie Fahrt</span>
                        </div>
                        </div>
                        <p class="sac-para mb-0">Nach dem Kauf kannst du entspannt fahren, ohne dir Gedanken über Probleme machen zu müssen.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </section>
      <!-- advantages-section-end -->

<!-- ratings-section-start -->
<section style="padding-top: 20px !important" class="ratings-section section-padding section-bg">
        <div class="container">
          <div class="ratings-wrapper d-flex flex-column justify-content-center align-items-center gap-5">
            <span class="ratings-check flex-shrink-0">
              <img src="front/imgs/high-quality.png" alt="Gebrauchtwagencheck Zertifiziertes Gutachten Gebrauchtwagen">
            </span>

            <div class="ratings-content">
                <h2 style="font-weight: 600; font-size: 40px; letter-spacing: -0.5px; text-align: center" class="ratings-heading mb-3 mb-sm-0 d-none d-sm-block">Tätige keinen Fehlkauf!</h2>
                <h2 style="font-weight: 600; font-size: 35px; letter-spacing: -0.5px; text-align: center" class="ratings-heading mb-3 mb-sm-0 d-sm-none">Tätige keinen Fehlkauf!</h2>

              <div class="rating-details d-flex flex-column flex-sm-row align-items-center ms-md-2 pt-4 pt-md-2">
                <div class="rd-top d-inline-flex align-items-center gap-3">
                  <span class="text-primary fw-bold">4.8</span>
                  <div class="ratings text-secondary">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                </div>

                <div class="rd-bottom pt-1 pt-sm-0">
                  <p class="text-primary mb-0"><span class="fw-bold">2.938</span> Bewertungen</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ratings-section-end -->

    <!-- how-does-work-section-start -->
    <section style="padding-top: 75px !important; padding-bottom: 100px !important" class="not-anymore-section">
        <div class="container">
            <div class="how-does-work-wrapper">
                <h2 style="font-weight: 600; font-size: 40px; letter-spacing: -0.5px" class="text-center d-none d-sm-block">Wie funktioniert Carspector?</h2>
                <h2 style="font-weight: 600; font-size: 35px; letter-spacing: -0.5px" class="text-center d-sm-none">Wie funktioniert Carspector?</h2>

                <div style="padding-top: 50px !important" class="row hdw-row">
                    <div class="col-md-6 col-lg-4">
                        <div class="single-hdw-item single-hdw-item-1">
                            <div class="hdw-item-inner d-flex flex-column">
                                <div class="hdw-icon flex-shrink-0">
                      <span class="d-inline-flex justify-content-start align-items-center">
                      <img src="front/imgs/sedan.png" alt="Gebrauchtwagencheck">
                      </span>
                                </div>

                                <span class="hdw-number text-secondary fw-bold py-3">1.</span>

                                <h5 style="font-weight: 500 !important" class="hdw-item-heading text-primary pb-2">Wähle das Fahrzeug</h5>

                                <p class="hdw-para mb-0">Wähle dein gewünschtes Fahrzeug und deinen gewünschten Check.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="single-hdw-item single-hdw-item-2">
                            <div class="hdw-item-inner d-flex flex-column">
                                <div class="hdw-icon flex-shrink-0">
                      <span class="d-inline-flex justify-content-start align-items-center">
                        <img src="front/imgs/step-2-icon.png" alt="Auto vor dem Kauf prüfen lassen">
                      </span>
                                </div>

                                <span class="hdw-number text-secondary fw-bold py-3">2.</span>

                                <h5 style="font-weight: 500 !important" class="hdw-item-heading text-primary pb-2">Wir checken das Fahrzeug</h5>

                                <p class="hdw-para mb-0">Ein zertifizierter KFZ-Experte checkt das Fahrzeug anhand unseres Leitfadens.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="single-hdw-item single-hdw-item-3">
                            <div class="hdw-item-inner d-flex flex-column">
                                <div class="hdw-icon flex-shrink-0">
                      <span class="d-inline-flex justify-content-start align-items-center">
                      <img src="front/imgs/step-3-icon.png" alt="Gebrauchtwagen Gutachten Bericht">
                      </span>
                                </div>

                                <span class="hdw-number text-secondary fw-bold py-3">3.</span>

                                <h5 style="font-weight: 500 !important" class="hdw-item-heading text-primary pb-2">Bericht erhalten</h5>

                                <p class="hdw-para mb-0">Wir erstellen einen zertifizierten Bericht, der den Zustand und unsere Kaufempfehlung beinhaltet.</p>
                            </div>

                            <div class="pt-4 mt-3">
                                <a href="{{route('gebrauchtwagencheck')}}"><button class="btn btn-secondary hdw-report-btn fw-normal">Was beinhaltet der Bericht?</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- how-does-work-section-end -->

                

    <!-- reviews-section-start -->
    <section class="reviews-section section-padding section-bg">
        <div class="container">
            <div class="reviews-wrapper">
            <h2 style="font-weight: 600; font-size: 40px; letter-spacing: -0.5px" class="advantages-heading text-center pb-5 mb-0 mb-lg-3 d-none d-sm-block">Darauf sind wir stolz</h2>
            <h2 style="font-weight: 600; font-size: 35px; letter-spacing: -0.5px" class="advantages-heading text-center pb-5 mb-0 mb-lg-3 d-sm-none">Darauf sind wir stolz</h2>
                <div class="advantages-cards">
                    <div class="row advantages-cards-row g-4 g-xxl-5">

                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/happy.png" alt="Gebrauchtwagencheck; Auto vor dem Kauf prüfen lassen">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">3.000+</span>
                                        <p class="mb-0">zufriedene Kunden</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Über 3.000 Kunden sind von unserem Gebrauchtwagencheck sowie von weiteren Produkten und Dienstleistungen überzeugt.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                                <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/star.png" alt="Auto Fahrzeug Gebrauchtwagen Bewertung objektiv">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">4,7/5</span>
                                        <p class="mb-0">Sterne im Durchschnitt</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Unsere Kunden bewerten uns im Durchschnitt mit 4,7 von 5 Sternen.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">

                                <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/skyline.png" alt="Auto Fahrzeug Gebrauchtwagen Bewertung objektiv">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">500 +</span>
                                        <p class="mb-0">verfügbare Städte</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Unsere Dienstleistungen sind in mehr als 500 Städten Deutschlands verfügbar.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">

                                <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/shield.png" alt="Fotos Zustand Bilder Auto Fahrzeug Videos">
                      </span>

                                <div class="sac-info">
                                    <span class="fw-bold">5+</span>
                                        <p class="mb-0">Jahre Erfahrung</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Mit über 5 Jahren Erfahrung sind wir Experten auf unserem Gebiet.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/loupe.png" alt="Fotos Zustand Bilder Auto Fahrzeug Videos">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">50+</span>
                                        <p class="mb-0">Prüfungen am Tag</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Wir führen täglich über 50 Prüfungen zuverlässig und effizient durch.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">

                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/multiple.png" alt="Gebrauchtwagencheck; Auto vor dem Kauf prüfen lassen">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">10+</span>
                                        <p class="mb-0">Dienstleistungen</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Wir bieten über 10 verschiedene Dienstleistungen und Leistungen an.</p>
                            </div>
                        </div>






                    </div>
                </div>

                <h4 class="reviews-title fs-4 text-center mb-0">Mehr als 2.500 <span class="text-secondary">5-Sterne</span> Bewertungen!</h4>
            </div>
        </div>
    </section>
    <!-- reviews-section-end -->

    <!-- testimonial-section-start -->

    <section style="padding-top: 75px !important; padding-bottom: 100px !important" class="not-anymore-section">
        <div class="container">
        <h2 style="font-weight: 600; font-size: 40px; letter-spacing: -0.5px" class="hdw-heading text-center d-none d-sm-block">Das sagen Kunden zu<br>unserem Gebrauchtwagencheck</h2>
        <h2 style="font-weight: 600; font-size: 35px; letter-spacing: -0.5px" class="hdw-heading text-center d-sm-none">Das sagen Kunden zu unserem Gebrauchtwagen-Check</h2>
            <div class="testimonial-wrapper d-flex flex-wrap align-items-center justify-content-center">

                <div class="testimonial-card testimonial-card-1 d-flex flex-column justify-content-between">
                    <div class="testimonial-info d-flex flex-column">
                        <div class="testimonial-ratings text-center text-secondary pb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-paragraph text-center">
                            “Mein beauftragter Gebrauchtwagencheck wurde zügig bearbeitet. Von außen sah das Fahrzeug gut aus, hatte jedoch Mängel, 
                            die ich alleine nicht bemerkt hätte.”
                        </p>
                    </div>
                    <hr><br>
                    <div style="padding-left: 35px" class="client-info d-flex align-items-center gap-3">
                        <img src="front-home/imgs/client/client-1.jpg" alt="Gebrauchtwagencheck">
                        <h6 class="fw-normal mb-0">Annika Z.</h6>
                    </div>
                </div>

                <div class="testimonial-card testimonial-card-2 d-flex flex-column justify-content-between">
                    <div class="testimonial-info d-flex flex-column">
                        <div class="testimonial-ratings text-center text-secondary pb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-paragraph text-center">
                            “Ich konnte viel über die Historie des Fahrzeugs erfahren. Beschädigungen, Kratzer und Dellen wurden mit Bildern veranschaulicht und dokumentiert.”
                        </p>
                    </div>
                    <hr><br>
                    <div style="padding-left: 35px" class="client-info d-flex align-items-center gap-3">
                        <img src="front-home/imgs/client/client-2.jpg" alt="Kunde Renzension">
                        <h6 class="fw-normal mb-0">Michael L.</h6>
                    </div>
                </div>

                <div class="testimonial-card testimonial-card-3 d-flex flex-column justify-content-between">
                    <div class="testimonial-info d-flex flex-column">
                        <div class="testimonial-ratings text-center text-secondary pb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-paragraph text-center">
                            “Die Begutachtung erfolgte schnell und gründlich. Das Gutachten war ausführlich, mit Bildern belegt und enthielt alle für mich erforderlichen Informationen.”
                        </p>
                    </div>
                    <hr><br>
                    <div style="padding-left: 35px" class="client-info d-flex align-items-center gap-3">
                        <img src="front-home/imgs/client/client-3.jpg" alt="Erfahrung">
                        <h6 class="fw-normal mb-0">Mustafa Y.</h6>
                    </div>
                </div>

                <span style="padding-top: 50px">
                <center><a href="{{route('rezensionen')}}" class="section-btn" style="width:350px; font-weight: 500 !important; height: 50px">Alle Bewertungen ansehen</a></center>

            </div>
        </div>
    </section>
    <!-- testimonial-section-end -->

        

    <!--------- FAQ section start --------->
    <section id="faq-section" class="faq-area section-bg">
        <div class="container-sm">
            <div class="section-heading">
                <h2 style="font-weight: 600; font-size: 40px; letter-spacing: -0.5px" class="text-center d-none d-sm-block">Meist gestellte Fragen</h2>
                <h2 style="font-weight: 600; font-size: 35px; letter-spacing: -0.5px" class="text-center d-sm-none">Meist gestellte Fragen</h2>
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
                                 Wir fahren zu deinem gewünschten Fahrzeug und führen einen umfassenden Gebrauchtwagencheck vor Ort durch.<br><br>
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
                                    Die Prüfungsinhalte variieren pro Fahrzeugklasse. Weitere Informationen zu den Inhalten des jeweiligen Fahrzeugs findest <a href="{{route('faq')}}">hier im FAQ</a>.<br><br>
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
                        <br><br><br>
                        <center><a href="{{route('faq')}}" class="section-btn faq-btn-2" style="width:350px; font-weight: 500 !important; height: 50px">Weitere Fragen ansehen</a></center>
                </div>
            </div>
        </div>
    </section>
    <!--------- FAQ section end --------->

        

    <!--------- safe-and-easy section start --------->
    <section style="padding-top: 75px !important; padding-bottom: 100px !important" class="not-anymore-section">
        <div class="container position-relative">
            <div class="safe-and-easy-wrapper">
                <div class="row g-0 safe-and-easy-wrapper-row">
                    <div class="col-lg-6">
                        <div class="safe-and-easy-wrapper mt-xl-4">
                            <div class="section-heading">
                                <h2 style="font-weight: 600; font-size: 40px; letter-spacing: -0.5px" class="d-none d-sm-block">Sicherer Autokauf dank unserem umfassenden Gebrauchtwagencheck.</h2>
                                <h2 style="font-weight: 600; font-size: 35px; letter-spacing: -0.5px" class="d-sm-none text-center">Sicherer Autokauf dank unserem umfassenden Gebrauchtwagen-Check.</h2>
                            </div>
                            <p style="padding-top: 30px !important" class="paragraph not-anymore-para pt-3 pb-5 d-none d-sm-block">
                            Erfahre alles über den technischen und optischen Zustand deines gewünschten Fahrzeugs dank zertifiziertem Prüfbericht.
                            </p>
                            <p style="padding-top: 30px !important" class="paragraph not-anymore-para pt-3 pb-5 d-sm-none text-center">
                            Erfahre alles über den technischen und optischen Zustand deines gewünschten Fahrzeugs dank zertifiziertem Prüfbericht.
                            </p>
                            <a href="{{route('booking.option-page')}}" class="section-btn bbtn-3" style="width:350px; font-weight: 500 !important; height: 55px">Jetzt loslegen</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="safe-easy-thumb">
                            <img src="front-home/imgs/thumbs/safe-and-easy-thumb.png" alt="Gebrauchtwagencheck">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------- safe-and-easy section end --------->

    <section class="ratings-section section-padding section-bg">
        <div class="container">
            <div class="ratings-wrapper d-flex flex-column flex-md-row justify-content-center align-items-center gap-4">
            <span class="ratings-check flex-shrink-0">
              <img src="front/imgs/high-quality.png" alt="Auto vor dem Kauf prüfen lassen">
            </span>

                <div class="ratings-content">
                    <h2 style="font-weight: 600; font-size: 40px; letter-spacing: -0.5px" class="ratings-heading d-none d-sm-block">Sorgenfrei & abgesichert</h2>
                    <h2 style="font-weight: 600; font-size: 35px; letter-spacing: -0.5px" class="ratings-heading d-sm-none">Sorgenfrei & abgesichert</h2>

                    <div class="rating-details d-flex flex-column flex-sm-row align-items-center ms-md-2 pt-4 pt-md-0">
                        <div class="rd-top d-inline-flex align-items-center gap-3">
                            <span class="text-primary fw-bold">4.8</span>
                            <div class="ratings text-secondary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>

                        <div class="rd-bottom pt-1 pt-sm-0">
                  <p class="text-primary mb-0"><span class="fw-bold">2.938</span> Bewertungen</p>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- known-from Section start -->
    <section style="padding-top: 75px !important; padding-bottom: 100px !important" class="not-anymore-section">
        <div class="container">
            <div class="known-from-wrapper">
                <div class="section-heading">
                    <h2 style="font-weight: 600; font-size: 40px; letter-spacing: -0.5px" class="ratings-heading text-center d-none d-sm-block">Carspector ist bekannt aus</h2>
                    <h2 style="font-weight: 600; font-size: 35px; letter-spacing: -0.5px" class="ratings-heading text-center d-sm-none">Carspector ist bekannt aus</h2>
                </div>
                <div class="known-from-items m-auto d-flex flex-column flex-sm-row justify-content-between align-items-center align-items-sm-start">
                    <div class="kf-single-item text-center">
                        <div class="known-from-img">
                            <img src="front-home/imgs/known-from/img-1.png" alt="Fahrzeug-Check vor dem Kauf">
                        </div>
                        <p class="paragraph">Autobild</p>
                    </div>
                    <div class="kf-single-item text-center">
                        <div class="known-from-img">
                            <img src="front-home/imgs/known-from/img-2.png" alt="Carspector Check">
                        </div>
                        <p class="paragraph">Düsseldorfer Wirtschaft</p>
                    </div>
                    <div class="kf-single-item text-center">
                        <div class="known-from-img">
                            <img src="front-home/imgs/known-from/img-3.png" alt="Zertifiziert">
                        </div>
                        <p class="paragraph">Youtube und weitere soziale Medien</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- known-from Section End -->

</main>
<div class="sticky-bottom-footer" style="display: none">
    <div class="hero-form hero-area-form blue-hero-form" style="padding: 10px 10px;margin: auto !important;background-color: transparent !important">
        <form action="{{route('booking.option-page')}}" style="margin: auto !important">
                <center><button type="submit" style="height: 50px; font-weight: 500 !important" class="btn btn-secondary mt-0 btn-check-city btn-footer-bottom fw-bold">Fahrzeug-Check buchen</button></center>
        </form>
    </div>
</div>
<!-- main-end -->

<!-- footer-start -->
@include('partials.footer')
<!-- footer-start-end -->


<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('front-home/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front-home/js/swiper-bundle.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('front-home/js/scripts.js') }}"></script>
@yield('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var swiper = new Swiper(".about-cards-slider", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
            }
        },
        pagination: {
            el: ".about-cards-pagination",
            clickable: true,
        },
    });
    var swiper = new Swiper(".slider-active", {
        slidesPerView: 1,
        spaceBetween: 50,
        loop: true,
        breakpoints: {
            992: {
                slidesPerView: 2,
                spaceBetween: 70,
            }
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    $(window).on('scroll resize', function() {
    var ScrollTop = $(window).scrollTop(); // aktuelle Scrollposition von oben
    var DocumentHeight = $(document).height(); // Gesamthöhe des Dokuments
    var WindowHeight = window.innerHeight || $(window).height(); // Höhe des Viewports (innerHeight für mobile Kompatibilität)
    var ScrollBottom = ScrollTop + WindowHeight; // aktuelle Position des unteren Viewports

    // Bedingung: Mehr als 1250 Pixel gescrollt und noch nicht am Ende der Seite (mit Puffer)
    if (ScrollTop > 1250 && ScrollBottom < (DocumentHeight - 50)) {
        $('.sticky-bottom-footer').fadeIn(500);
    } 
    // Footer ausblenden, wenn man am Seitenende angekommen ist oder weniger als 1250 Pixel gescrollt hat
    else {
        $('.sticky-bottom-footer').fadeOut(250);
    }
});
    
</script>
@if(session('success'))
    <script>
        toastr.success('','{{session('success')}}')
    </script>
@endif
@if(session('error'))
    <script>
        toastr.success('','{{session('error')}}')
    </script>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function(){


        /////// Prevent closing from click inside dropdown
        document.querySelectorAll('.dropdown-menu').forEach(function(element){
            element.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        })



        // make it as accordion for smaller screens
        if (window.innerWidth < 992) {

            // close all inner dropdowns when parent is closed
            document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
                everydropdown.addEventListener('hidden.bs.dropdown', function () {
                    // after dropdown is hidden, then find all submenus
                    this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                        // hide every submenu as well
                        everysubmenu.style.display = 'none';
                    });
                })
            });

            document.querySelectorAll('.dropdown-menu a').forEach(function(element){
                element.addEventListener('click', function (e) {

                    let nextEl = this.nextElementSibling;
                    if(nextEl && nextEl.classList.contains('submenu')) {
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        console.log(nextEl);
                        if(nextEl.style.display == 'block'){
                            nextEl.style.display = 'none';
                        } else {
                            nextEl.style.display = 'block';
                        }

                    }
                });
            })
        }
        // end if innerWidth

    });
</script>
</body>
</html>

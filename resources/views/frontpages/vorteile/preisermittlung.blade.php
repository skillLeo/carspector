<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gebrauchtwagencheck vor Ort für dein gewünschtes Fahrzeug. Auto vor dem Kauf prüfen lassen. Prüfungen aller Fahrzeugklassen. Autos, Transporter,
    Oldtimer, Sportwagen, Wohnmobile. ✓ TÜV-Zertifiziert ✓ Gutachten ✓ Sicher und günstig Gebrauchtwagen kaufen ✓ Garantie">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Carspector - Preisermittlung</title>

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

         

        

        .single-advantage-card{
            min-height: 0px;
            height: auto;
        }

        

        @media screen and (min-width: 568px) {
            .blue-hero-form{
                padding-right: 50px;
            }

            .spezial-4{
            padding-top: 10px;
        }

            .hero-area {
	        background: url("../front-home/imgs/bg/bg-ic.png") no-repeat 75% / cover, #01449A;
	        min-height: 300px;
	        padding-bottom: 150px;
	        padding-top: 185px;
        }

        .hero-area::after {
	        content: "";
	        position: absolute;
	        top: 0;
	        left: 0;
	        width: 100%;
	        height: 100%;
	        background: linear-gradient(to right, rgb(7, 75, 163, 1) 20%, rgba(7, 75, 163, .5) 100%);
	        z-index: -1;
	      opacity: 0.92;
        }

        .single-advantage-card{
            min-height: 0px;
            height: auto;
        }
        }

        #faq-section .accordion-button:not(.collapsed) {
	        color: #fff;
	        background-color: var(--secondary);
	        box-shadow: unset;
	        transition: all .25s ease-in-out;
	        font-weight: 700;
        }

        .faq-area .accordion-flush .accordion-item{
            max-width: 600px;
            margin: 0 auto;
        }

            .mobile-review{
                padding-top: 75px;
                padding-bottom: 75px;
            }

            .hero-list{
                font-size: 13px;
            }

            .hero-content{
                text-align: center;
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
        .btn-footer-bottom{
            width: auto !important;
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

        .accordion-body{
            font-weight: 500;
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

        @media (min-width: 767px) {
        .btnbb {
            max-width: 350px;
        }

        }
            .hero-para {
                text-align: center !important;
                margin: auto;
            }
        
        
            .mg-3 {
                text-align: center !important;
                margin: auto;
            }

        @media (min-width: 767px) {
            .hero-area {
                min-height: 750px !important;
            }
        }

        @media (min-width: 575px) {
            .hero-area {
                min-height: 700px !important;
            }

            .hp-2 {
                padding-bottom: 40px !important;
            }
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

        .accordion-button {
            font-weight: normal !important;
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
    
        .btn-buy:hover {
            background-color: white !important;
            color: var(--primary) !important;
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
                            <li><a class="dropdown-item" href="{{route('preisermittlung')}}">Preis-Ermittlung</a></li>
                            <li style="padding-top: 5px"><strong style="font-size: 18px; padding: 10px 0; display: block;">Weitere Angebote</strong></li>
                            <li><a class="dropdown-item" href="{{route('fahrzeuglieferung')}}">Fahrzeug-Lieferung</a></li>
                            <li><a class="dropdown-item" href="/Kfz-Kaufvertrag.pdf">Kfz-Kaufvertrag</a></li>
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
                        <p style="font-size: 17px; color: white">Mo-Sa: 9:00 - 18:00 Uhr</p>
                        <a href="tel:+4921192325550" style="width: 90%; height: 50px; font-size: 16px" class="btn btn-secondary shadow">0211 92325550</a>
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
            <a href="{{url('/')}}"><img src="{{ asset('front/imgs/logos/logo-2.png') }}" alt="Auto vor dem Kauf prüfen lassen; Gebrauchtwagencheck"> <span style="letter-spacing: 0.1px" class="d-none d-lg-block">Auto gecheckt,<br>sicher gekauft.</span></a>
        </div>
        <!-- header-logo-end -->

        <!-- header-right -->
        <div class="header-end align-items-center d-none d-lg-flex">
            <div class="header-nav ">
                <ul style="letter-spacing: 0.5px" class="d-flex align-items-center justify-content-end">
                    <li class="dropdown">
                        <a href="{{route('index')}}" class="dropdown-toggle"  type="button" data-bs-toggle="dropdown" >Leistungen</a>
                        <ul class="dropdown-menu " style="border-radius: 2 !important;z-index: 99999999 !important;">
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
                                <li><a class="dropdown-item" href="{{route('preisermittlung')}}">Preis-Ermittlung</a></li>
                                <br>
                                <li><strong style="padding-left: 15px">Weitere Angebote</strong></li> 
                                <li style="padding-top: 5px"><a class="dropdown-item" href="{{route('fahrzeuglieferung')}}">Fahrzeug-Lieferung</a></li>
                                <li><a class="dropdown-item" href="/Kfz-Kaufvertrag.pdf">Kfz-Kaufvertrag</a></li>
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
    <section style="max-height: 625px; background: var(--primary) !important" class="section hero-area position-relative z-1">
        <div class="container">
          <div class="hero-wrapper px-1 px-sm-0">
            <!-- hero-content -->
            <div style="text-align: center" class="justify-content-center align-items-center">
              <h1 class="fw-bold text-white"><span class="text-secondary">Inserat-Preisermittlung</span></h1>
              <p class="hero-para text-white pb-3" style="padding-top: 5px"><b>Finde heraus, ob der Preis fair ist!</b></p>
                    <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px; margin-left: 2px; padding-top: 0px !important">
                        <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i><span style="color: white">4.8 (278 Bewertungen)</span>
                    </p>
                    <br>
              
              <p class="hero-para hp-2 text-white pb-4 mb-2 mb-sm-0">Du hast ein spannendes Fahrzeuginserat entdeckt, bist dir aber unsicher, ob der Preis passt? Mit unserer Inserat-Preisermittlung bekommst du eine professionelle Einschätzung des Fahrzeugpreises.</p>

              <div class="hero-form mg-3 shadow">
              <form action="https://buy.stripe.com/bIYbKjf2n7rH9a0cNv" class="m-auto">
                  <div>
                    <button type="submit" class="btn btn-buy btn-secondary form-btn fw-bold mt-2">Jetzt buchen für 19 €</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- hero-area-start-end -->


      <!-- reviews-section-start -->
    <section style="background-color: white" class="reviews-section section-padding section-bg">
        <div class="container">
            <div class="reviews-wrapper">
            <h2 class="advantages-heading pb-5 mb-0 mb-lg-3">Was wir für dich tun</h2>
                <div class="advantages-cards">
                    <div class="row advantages-cards-row g-4 g-xxl-5">

                        <div class="col-sm-6 col-lg-4">
                        <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                        <div class="sac-top d-flex gap-4 mb-3">
                        <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                            <img src="assets/imgs/iconadv/loupe.png" alt="Objektive Bewertung">
                        </span>          
                            <div style="padding-top: 10px" class="sac-info spezial-4">
                                <span class="fw-bold">Analyse des Inserats</span>
                            </div>
                            </div>
                                <p class="sac-para mb-0">Wir prüfen alle wesentlichen Angaben des Fahrzeugs: Kilometerstand, Baujahr, Ausstattung, Pflegezustand und viele weitere Faktoren, die den Wert beeinflussen.</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                        <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                        <div class="sac-top d-flex gap-4 mb-3">
                        <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                            <img src="assets/imgs/iconadv/phone.png" alt="Objektive Bewertung">
                        </span>          
                            <div class="sac-info">
                                <span class="fw-bold">Rücksprache mit dem Verkäufer</span>
                            </div>
                            </div>
                                <p class="sac-para mb-0">Um ein noch genaueres Bild zu bekommen, klären wir in einem Telefonat mit dem Verkäufer offene Fragen und holen zusätzliche Informationen ein.</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                        <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                        <div class="sac-top d-flex gap-4 mb-3">
                        <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                            <img src="assets/imgs/iconadv/money-bag.png" alt="Objektive Bewertung">
                        </span>          
                            <div class="sac-info spezial-4">
                                <span class="fw-bold">Marktgerechte Bewertung</span>
                            </div>
                            </div>
                                <p class="sac-para mb-0">Wir vergleichen das Angebot mit ähnlichen Fahrzeugen auf dem Markt und berechnen einen realistischen, fairen Preis für das Inserat.</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                        <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                        <div class="sac-top d-flex gap-4 mb-3">
                        <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                            <img src="assets/imgs/iconadv/paper.png" alt="Objektive Bewertung">
                        </span>          
                            <div class="sac-info spezial-4">
                                <span class="fw-bold">Detaillierter Bewertungsbericht</span>
                            </div>
                            </div>
                                <p class="sac-para mb-0">Sie erhalten von uns eine detaillierte Einschätzung zum Fahrzeugwert, inklusive eventueller Hinweise auf Risiken und verborgene Kosten.</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                        <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                        <div class="sac-top d-flex gap-4 mb-3">
                        <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                            <img src="assets/imgs/iconadv/review.png" alt="Objektive Bewertung">
                        </span>          
                            <div class="sac-info spezial-4">
                                <span class="fw-bold">Professionelle Einschätzung</span>
                            </div>
                            </div>
                                <p class="sac-para mb-0">Unsere Experten bieten dir eine fundierte, professionelle Einschätzung, die auf umfassenden Marktanalysen basiert.</p>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-lg-4">
                        <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                        <div class="sac-top d-flex gap-4 mb-3">
                        <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                            <img src="assets/imgs/iconadv/clock.png" alt="Objektive Bewertung">
                        </span>          
                            <div style="padding-top: 10px" class="sac-info">
                                <span class="fw-bold">Innerhalb 24h</span>
                            </div>
                            </div>
                                <p class="sac-para mb-0">Du erhältst dein Wertgutachten innerhalb von 24 Stunden. So kannst du schnell auf Angebote reagieren und deine Kaufentscheidung zeitnah treffen.</p>
                            </div>
                        </div>
                        
                    </div>
                </div><br>
                <h4 class="reviews-title fs-4 text-center mb-0">Jetzt buchen und <span class="text-secondary">professionelle und faire<br></span> Preiseinschätzung erhalten.</h4>
            </div>
                <br><br><center><a href="https://buy.stripe.com/bIYbKjf2n7rH9a0cNv" class="section-btn btnbb" style="width: 100%; height: 55px; font-size: 17px">Jetzt buchen</a></center><br>
        </div>
    </section>
    <!-- reviews-section-end -->

    <section id="faq-section" class="faq-area section-bg">
        <div class="container-sm">
            <div class="section-heading">
                <center><h2>Deine Vorteile der Preisermittlung</h2></center>
            </div>
            <div class="faq-accordion">
                <div class="accordion accordion-flush" id="accordionFlushExample">

                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-one" aria-expanded="false" aria-controls="faq-one">
                                        Zahle nicht zu viel
                                </button>
                            </h2>
                            <div id="faq-one" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Du vermeidest überhöhte Preise und erhältst eine fundierte Einschätzung, was das Fahrzeug wirklich wert ist.
                                </div><br>
                            </div>
                        </div>

                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-two" aria-expanded="false" aria-controls="faq-two">
                                        Sicherheit vor der Anreise
                                </button>
                            </h2>
                            <div id="faq-two" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Du weißt schon vor der Besichtigung, ob der Preis fair ist, und sparst dir unnötige Fahrten zu überteuerten Angeboten.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-one11" aria-expanded="false" aria-controls="faq-one11">
                                        Risiken frühzeitig erkennen
                                </button>
                            </h2>
                            <div id="faq-one11" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Durch unsere Analyse erfährst du von möglichen versteckten Mängeln oder Risiken, die im Inserat nicht offensichtlich sind.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-two3" aria-expanded="false" aria-controls="faq-two3">
                                        Starke Verhandlungsposition
                                </button>
                            </h2>
                            <div id="faq-two3" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Mit unserer Bewertung hast du ein solides Argument für Preisverhandlungen und kannst gezielt Einsparungen erzielen.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-one1" aria-expanded="false" aria-controls="faq-one1">
                                    Einfach & schnell
                                </button>
                            </h2>
                            <div id="faq-one1" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Durch die einfache Buchung erhältst du das Wertgutachten schnell und unkompliziert innerhalb von 24 Stunden zugesendet.
                                </div><br>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ratings-section-start -->
    <section class="ratings-section section-padding section-bg bg-white">
        <div class="container">
            <div class="ratings-wrapper d-flex flex-column flex-md-row justify-content-center align-items-center gap-4">
            <span class="ratings-check flex-shrink-0">
              <img src="front/imgs/high-quality.png" alt="">
            </span>

                <div class="ratings-content">
                    <h2 class="ratings-heading">Fairer Preis, innerhalb von 24h.</h2>

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
            <br><br><br><center><a href="https://buy.stripe.com/bIYbKjf2n7rH9a0cNv" class="section-btn btnbb" style="width: 100%; height: 55px; font-size: 17px">Jetzt buchen</a></center><br>
        </div>
    </section>
      <!-- ratings-section-end -->

      

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

    $(window).scroll(function() {
        var ScrollTop = $(window).scrollTop();
        if (ScrollTop > 750) {
            $('.sticky-bottom-footer').fadeIn(600);
        }else{
            $('.sticky-bottom-footer').fadeOut(100);
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

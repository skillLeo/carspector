@extends('mainpages.master-layout')
@section('header')
    
@endsection
@section('content')

<script>
  fbq('track', 'ViewContent');
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Gebrauchtwagencheck",
  "provider": {
    "@type": "Organization",
    "name": "Carspector",
    "url": "https://www.carspector.de"
  },
  "serviceType": "Gebrauchtwagencheck",
  "description": "Wir fahren zu dem Fahrzeug, das du kaufen möchtest, und prüfen es direkt vor Ort!",
  "areaServed": {
    "@type": "Country",
    "name": "Germany"
  }
}
</script>


<style>
  /* Standardmäßig ausblenden */


  /* Auf Mobilgeräten (bis zu 768px) anzeigen */



  @media (max-width: 550px) {
    .h1main {
        font-size: 53px !important;
        letter-spacing: -2px;
    }
  }

  .slider-height {
    height: 70px !important;
  }

  @media (max-width: 576px) {
    .blue-section-pb {
        padding-bottom: 40px !important;
    }
  }

  @media (min-width: 1125px) {
    .hdw-card {
        width: 325px !important;
    }
  }

  @media (max-width: 576px) {
        .pt-mb-cst {
            padding-top: 60px;
        }
    }

   /* Der Hintergrund-Balken */
#stickyBar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: var(--primary); /* Hellblauer Hintergrund */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70px; /* Balkenhöhe */
    box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    /* Startzustand für Animation */
    transform: translateY(100%); /* Außerhalb des Sichtfelds */
    transition: transform 0.3s ease-in-out; /* Sanfte Bewegung */
}

/* Sichtbarer Zustand */
#stickyBar.visible {
    transform: translateY(0); /* Im Sichtfeld */
}

/* Der Button */
#stickyButton {
    background-color: var(--secondary);
    color: white;
    font-weight: bold;
    font-size: 17px;
    padding: 10px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    line-height: 2;
    width: 90%; /* Standardbreite für mobile Geräte */
    max-width: 400px; /* Maximale Breite auf Desktop */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#stickyButton:hover {
    background-color: #0056b3;
}

/* Für größere Bildschirme */
@media (min-width: 768px) {
    #stickyButton {
        width: 450px; /* Automatische Breite */
    }
}

#fin-model .modal-dialog {
    max-width: 350px;
    width: 100%;
    margin: auto; 
}

/* Mobile-Styling */
@media (max-width: 350px) {
    #fin-model .modal-dialog {
        max-width: 85%;
        width: 85%;
        margin: auto; 
    }
}

#fin-model .modal-dialog-centered {
    display: flex;
    align-items: center;
    justify-content: center; 
    min-height: 100vh; 
}

@media (max-width: 768px) {
    .padt-mb {
        padding-top: 10px;
    }
}

@keyframes bounce-in {
    0% {
        transform: scale(0.5); /* Start kleiner */
        opacity: 0; /* Unsichtbar */
    }
    50% {
        transform: scale(1.5); /* Größer während des Bounces */
        opacity: 1; /* Sichtbar */
    }
    100% {
        transform: scale(1); /* Zurück zur normalen Größe */
        opacity: 1; /* Sichtbar */
    }
}

.animate-check {
    display: inline-block;
    opacity: 0; /* Unsichtbar vor der Animation */
    animation: bounce-in 1s ease-out; /* Schnellere Animation */
    animation-fill-mode: forwards; /* Letzter Zustand bleibt */
}

.hero-section {
    position: relative;
    background-image: url('/theme-1/imgs/desk/mechanic.png');
    background-size: cover;
    background-position: center 20%;
}

.background-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%; /* Blau mit 90% Deckkraft */
    background-color: #01449AEB;
    z-index: 1;
}

.container {
    position: relative;
    z-index: 2; /* Inhalt über der Überlagerung */
}

@media (max-width: 575px) {
    .desk-pic {
        background-color: var(--primary) !important;
    }
}

@media (max-width: 991px) {
    .pad-top {
        padding-top: 32px;
    }

        .hero-section {
        padding-top: 12px !important;
        padding-bottom: 50px;
    }
    
    .header {
        margin: 0;
        padding: 0;
    }
}


@media (min-width: 991px) {
    .pad-top {
        padding-top: 20px;
    }

        .hero-section {
        padding-top: 30px;
        padding-bottom: 60px;
    }

    .header {
        margin: 0;
        padding: 0;
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
    .mob-pad {
        padding-bottom: 25px !important;
    }

    .mob-pad-bt {
        padding-bottom: 35px !important;
    }
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

@media (max-width: 991px) {
        .mobile-divider {
            display: block !important;
            width: 100%;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.6);
            margin-top: 12px;
        }
    }

    /* Standardmäßig ausblenden für größere Bildschirme */
    .mobile-divider {
        display: none;
    }

@media (min-width: 768px) {
    .para-space {
        letter-spacing: 0.4px !important;
        font-size: 18px !important;
    }

    .thopt {
        margin-top: 0px !important;
    }

    .para-dk {
        padding-bottom: 20px !important;
    }

    .pad-para-f {
        padding-bottom: 21px !important;
    }
}

@media(min-width: 1199px) {
    .tlemain {
        font-size: 85px !important; 
    }
}

@media(min-width: 1500px) {
    .tlemain {
        font-size: 95px !important; 
    }
}




</style>
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

   
    <main class="main-area overflow-hidden"> 

    <div id="stickyBar">
        <div id="stickyButton" onclick="window.location.href='https://carspector.de/booking-step-1';">Fahrzeug-Check buchen</div>
    </div>

    
    <section class="mob-pad hero-section section-padding bg-primary pb-mob" style="position: relative; overflow: hidden;">
    <div class="desk-pic background-overlay"></div>

    <!-- Header innerhalb der Section -->
    <header class="header position-relative z-3">
        <div class="header-wrapper index-header d-flex align-items-center justify-content-center justify-content-md-between mx-auto position-relative">
            <!-- header-logo -->
            <div class="header-logo">
                <a href="{{url('/')}}" class="logo d-inline-flex align-items-center gap-3">
                    <img src="{{ asset('theme-1/imgs/logos/logo.png') }}" alt="">
                    <span style="font-size: 17px" class="fw-semibold d-none d-lg-block">Auto gecheckt, <br>sicher gekauft.</span>
                </a>
            </div>
            <!-- header-logo-end -->

            <!-- header-right -->
            <div class="header-end align-items-center d-none d-lg-flex">
                <div class="header-nav">
                    <ul class="d-flex align-items-center justify-content-end">
                        <li class="header-nav-item position-relative">
                            <a href="" style="letter-spacing: 0.25px" class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Leistungen
                                <span class="nav-triangle"></span></a>
                            <ul class="header-submenu">
                                <li><a href="{{route('gebrauchtwagencheck')}}" class="d-flex align-items-center">
                                Auto/ PKW Check
                                <span style="background-color: var(--secondary); color: white; padding: 3px 6px; border-radius: 2px; font-size: 12px; margin-left: 10px">Beliebt</span>
                            </a></li>
                                <li><a href="{{route('transporter')}}">Transporter-Check</a></li>
                                <li><a href="{{route('oldtimer')}}">Oldtimer-Check</a></li>
                                <li><a href="{{route('sportwagen')}}">Sportwagen-Check</a></li>
                                <li><a href="{{route('wohnmobil')}}">Wohnmobil-Check</a></li>
                                <li><a href="{{route('kaufbegleitung')}}">Kaufbegleitung</a></li>
                                <li class="position-relative">
                            <a class="d-inline-flex align-items-center" style="width: 100%; justify-content: space-between;">
                                Inserat-Checks
                                <span>&#9658;</span>
                            </a>
                            <!-- Submenu for Inserat-Check -->
                            <ul class="header-submenu-right position-absolute">
                                <li class="no-border">
                                    <a  href="{{route('inseratcheck')}}">Inserat-Check</a>
                                </li>
                                <li>
                                <a href="{{route('inseratvergleich')}}" class="d-flex align-items-center">
                                    Inserat-Vergleich
                                    <span style="background-color: var(--secondary); color: white; padding: 3px 6px; border-radius: 2px; font-size: 12px; margin-left: 10px">NEU</span>
                                </a>
                                </li>
                            </ul>
                        </li>
                        <li class="position-relative">
                            <a class="d-inline-flex align-items-center" style="width: 100%; padding-bottom: 18px; justify-content: space-between;">
                                Zusatzleistungen
                                <span>&#9658;</span>
                            </a>
                            <!-- Submenu for Inserat-Check -->
                            <ul class="header-submenu-right position-absolute">
                                <li>
                                    <a href="{{route('fahrzeuglieferung')}}">Fahrzeug-Lieferung</a>
                                </li>
                                <li>
                                    <a target="_blank" href="/Kfz-Kaufvertrag.pdf">Kfz-Kaufvertrag</a>
                                </li>
                            </ul>
                        </li>
                            </ul>
                        </li>
                        <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                            <a href="{{route('preise')}}" class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Preise</a>
                        </li>
                        <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                            <a href="{{route('faq')}}" class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">FAQ</a>
                        </li>
                        <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                            <a href="{{route('kontakt')}}" class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Kontakt</a>
                        </li>
                    </ul>
                </div>
                <a href="{{route('login')}}" style="letter-spacing: 0.25px" class="btn btn-outline header-btn">
                    Anmelden
                </a> 
            </div>
            <!-- header-right-end -->

            <!-- mobile menu start -->
            <!-- <a class="login-btn d-lg-none bg-transparent border-0 p-0 text-white position-absolute top-50 end-0 translate-middle-y me-5 rounded-circle"
   href="{{route('login')}}"
   style="right: 10px !important; font-size: 1.3rem; padding: 0.5rem; border: 2px solid white; display: flex; align-items: center; justify-content: center; text-decoration: none;">
    <i class="fa-regular fa-user"></i>
</a>-->
            <button class="mobile-menu-btn d-lg-none bg-transparent border-0 p-0 text-white position-absolute top-50 end-0 translate-middle-y me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="fa-regular fa-bars"></i>
            </button>
            <!-- mobile menu end -->
        </div>
        <!-- <div class="mobile-divider"></div> -->

    </header>



    <!-- Header Ende -->

    <div class="pad-top container">
        <div class="hero-wrapper mx-auto text-center">
        <h1 style="padding-bottom: 17px" class="tlemain h1main page-title fs-1 text-white fw-bold pad-para-f">Wir <span class="animate-check text-secondary">prüfen</span>
                <br>deinen Neuen.</h1>
                
                <p style="padding-bottom: 15px" class="para-dk main-hero-para text-white">
                        Wir fahren zu dem Fahrzeug, das du kaufen möchtest, und prüfen es direkt vor Ort!
                    </p>

                    <ul class="main-hero-para d-flex flex-column flex-md-row flex-wrap justify-content-center align-items-center gap-1 gap-md-3" 
                        style="list-style-type: none; padding-left: 0; text-align: center; padding-bottom: 30px;">
                        <li class="d-flex align-items-center gap-2 text-center" style="color: var(--secondary); margin-top: 3px;">
                            <i class="fas fa-check" style="font-size: 20px;"></i>
                            <span style="font-size: 17px; letter-spacing: 0.1px" class="para-space text-white">Deutschlandweit verfügbar</span>
                        </li>
                        <li class="d-flex align-items-center gap-2 text-center ms-md-2" style="color: var(--secondary); margin-top: 3px;">
                            <i class="fas fa-check" style="font-size: 20px;"></i>
                            <span style="font-size: 17px; letter-spacing: 0.1px" class="para-space text-white">Gutachten nach TÜV-Richtlinien</span>
                        </li>
                        <li class="thopt d-flex align-items-center gap-2 text-center" style="color: var(--secondary); margin-top: 3px;">
                            <i class="fas fa-check" style="font-size: 20px;"></i>
                            <span style="font-size: 17px; letter-spacing: 0.1px" class="para-space text-white">Wertermittlung & Kostenprognose</span>
                        </li>
                    </ul>



                    <div class="main-hero-btns d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 gap-md-4 pb-lg-5 pb-4 mb-lg-2 mb-3">
    <a href="https://carspector.de/Carspector_Mustergutachten.pdf?" target="_blank" class="btn btn-outline main-hero-btn-1">Demo-Gutachten ansehen</a>
    <a href="{{route('booking.option-page')}}" class="btn btn-secondary main-hero-btn-1">
        Fahrzeug-Check buchen
        <span class="btn-icon">
            <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck">
        </span>
    </a>
</div>

            <div class="hero-counter-wrapper d-flex justify-content-center align-items-center gap-3">
                <div class="counter-clients d-inline-flex align-items-center">
                    <div class="counter-client-img border border-2 border-white shadow overflow-hidden">
                        <img src="assets/imgs/client/client-3.jpg" alt="gebrauchtwagencheck vor Ort" class="w-100 h-100">
                    </div>
                    <div class="counter-client-img border border-2 border-white shadow overflow-hidden">
                        <img src="assets/imgs/client/client-2.jpg" alt="gebrauchtwagencheck in der Nähe" class="w-100 h-100">
                    </div>
                    <div class="counter-client-img border border-2 border-white shadow overflow-hidden">
                        <img src="assets/imgs/client/client-1.jpg" alt="gebrauchtwagencheck ohne Termin" class="w-100 h-100">
                    </div>
                </div>
                <div class="counter-content text-start">
                    <p class="counter-text fw-bold text-secondary"><span class="counter">2.500</span> +</p>
                    <p class="counter-info text-white">zufriedene Kunden</p>
                </div>
            </div>
        </div>
    </div>
</section>



        
        <div style="padding-top: 45px" class="hero-mobile-bg d-sm-none position-relative">
            <img src="theme-1/imgs/thumbs/hero-mobile-bg.png"   alt="">
        </div>
        <!------- Hero Section End ------->

        <!------- MiniCards Section Start ------->
        <section class="mini-cards-section section-bg">
            <div class="container">
                <div class="mini-cards-wrapper mx-auto">
                    <div class="mini-cards-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                    <img src="assets/imgs/hpslider/1.png" style="height: 40px" alt="tüv gebrauchtwagencheck">
                                </span>
                                TÜV-Richtlinien
                            </div>
                            <div class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/2.png" style="height: 40px" alt="zertifiziert">
                                </span>
                                Zertifizierte Prüfer
                            </div>
                            <div class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/3.png" style="height: 25px" alt="adac gebrauchtwagencheck">
                                </span>
                                ADAC Richtlinien
                            </div>
                            <div class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/4.png" style="height: 45px" alt="deutschlandweit vor ort">
                                </span>
                                Deutschlandweit
                            </div>
                            <div class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/5.png" style="height: 50px" alt="entspannt und einfach">
                                </span>
                                Schnelle Buchung
                            </div>
                            <div class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/6.png" style="height: 45px" alt="garantie zertifikat">
                                </span>
                                Prüfungsgarantie
                            </div>
                            <div class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/7.png" style="height: 40px" alt="auto pkw transporter oldtimer sportwagen wohnmobil gebrauchtwagencheck">
                                </span>
                                Alle Fahrzeugklassen
                            </div>
                            <div class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/8.png" style="height: 35px" alt="kundenservice kontakt">
                                </span>
                                24/7 Kundenservice
                            </div>
                        </div>
                        <div class="swiper-pagination mini-card-pagination d-lg-none"></div>
                    </div>
                </div>
            </div>
            <div class="blue-section-pb"></div>
        </section>
        <!------- MiniCards Section End ------->

        <!------- UsedCarCheck Before Purchase Section Start ------->
        <section class="used-car-check-section">
            <div class="container">
                <div class="ucc-wrapper mx-auto">
                    <div class="row flex-column-reverse flex-md-row align-items-center">
                        <div class="col-md-6">
                            <div class="ucc-thumb text-end">
                                <img src="theme-1/imgs/thumbs/used-car-thumb.jpg" alt="gebrauchtwagencheck" style="border-radius: 5px">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ucc-text text-center text-md-start p-lg-5 pe-0">
                                <h3 class="padt-mb section-title fs-3 fw-bold text-primary pb-2">Autokauf geplant?</h3>

                                <p style="font-size: 17px" class="pt-2 pb-4 text-primary">
                                    Wir führen einen umfassenden Gebrauchtwagencheck vor dem Kauf durch, damit du über den technischen und
                                    optischen Zustand bestens informiert bist und eine <b>fundierte Kaufentscheidung</b>
                                    treffen kannst.
                                </p>
                                <span style="background-color: var(--secondary); color: white; padding: 5px 7px; border-radius: 2px; font-size: 15px">In ganz Deutschland verfügbar!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- UsedCarCheck Before Purchase Section End ------->

         <!------- HowDoesWork Section Start ------->
         <section class="how-does-work-section section-bg section-padding">
            <div class="container">
                <div class="how-does-work-wrapper">
                    <div class="section-head text-center pb-5 mb-2">
                        <h3 class="section-title fs-3 text-primary">Wie funktioniert Carspector?</h3>
                    </div>

                    <div class="hdw-wrapper d-flex flex-column flex-md-row justify-content-center gap-4 gap-xl-5">
                        <div class="hdw-card-inner d-flex flex-md-column align-items-center">
                            <span
                                class="hdw-number fw-bold position-relative d-flex justify-content-center mb-4">1</span>
                                <div class="pt-3 hdw-card text-primary text-center d-flex flex-column align-items-center justify-content-center bg-white position-relative">
                                    <span class="icon mb-3" style="font-size: 2em; background-color: #F0F5FA; padding: 0.5rem 1.2rem; border-radius: 5px; display: inline-block;">
                                        <i style="font-size: 2rem; color: var(--primary)" class="fa-solid fa-car"></i>
                                    </span>

                                <div class="hdw-text-box h-100 d-flex flex-column justify-content-between">
                                    <h4 class="hdw-title fw-bold mb-2 pb-1">Wähle das Fahrzeug</h4>
                                    <p class="hdw-para text-black">
                                    Wähle dein gewünschtes Fahrzeug, deinen gewünschten Check und nenne uns deine Wünsche.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="hdw-card-inner d-flex flex-md-column align-items-center">
                            <span
                                class="hdw-number fw-bold position-relative d-flex justify-content-center mb-4">2</span>
                                <div class="pt-3 hdw-card text-primary text-center d-flex flex-column align-items-center justify-content-center bg-white position-relative">
                                    <span class="icon mb-3" style="font-size: 2em; background-color: #F0F5FA; padding: 0.5rem 1.2rem; border-radius: 5px; display: inline-block;">
                                        <i style="font-size: 2rem; color: var(--primary)" class="fa-solid fa-magnifying-glass"></i>
                                    </span>

                                <div class="hdw-text-box h-100 d-flex flex-column justify-content-between">
                                    <h4 class="hdw-title fw-bold mb-2 pb-1">Wir fahren zum Fahrzeug</h4>
                                    <p class="hdw-para text-black">
                                    Wir prüfen das Fahrzeug anhand unserer Checkliste, die über 150 Prüfpunkte beinhaltet.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="hdw-card-inner d-flex flex-md-column align-items-center">
                            <span
                                class="hdw-number fw-bold position-relative d-flex justify-content-center mb-4">3</span>
                                <div class="pt-3 hdw-card text-primary text-center d-flex flex-column align-items-center justify-content-center bg-white position-relative">
                                    <span class="icon mb-3" style="font-size: 2em; background-color: #F0F5FA; padding: 0.5rem 1.2rem; border-radius: 5px; display: inline-block;">
                                        <i style="font-size: 2rem; color: var(--primary)" class="fa-regular fa-file-certificate"></i>
                                    </span>

                                <div class="hdw-text-box h-100 d-flex flex-column justify-content-between">
                                    <h4 class="hdw-title fw-bold mb-2 pb-1">Gutachten erhalten</h4>
                                    <p class="hdw-para text-black">
                                    Wir erstellen ein zertifiziertes Gutachten, das den Zustand und unsere Kaufempfehlung beinhaltet.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                                <a href="{{route('booking.option-page')}}" style="width: 335px" class="btn btn-secondary vehicle-check-btn">
                                    Jetzt buchen
                                    <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                </a>
                            </div>
                </div>
            </div>
        </section>
        <!------- HowDoesWork Section End ------->

        

        <!------- Advantage Section Start ------->
        <section class="advantage-section section-padding">
            <div class="container">
                <div class="advantage-wrapper">
                    <div class="section-head text-center pb-4 mb-3">
                        <h3 class="section-title fs-3 text-primary pb-1">Deine Vorteile mit Carspector</h3>
                        <!-- <p class="section-pretitle">Für deine Sicherheit beim Autokauf.</p> -->
                    </div>

                    <div class="advantage-cards cards-wrapper">
                        <div class="row advantage-cards-row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                        <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                        <img src="assets/imgs/hpslider/4.png" style="height: 50px" alt="Deutschlandweit">
                                        </span>

                                        <h4 class="card-title fw-bold pt-1 pb-2">Deutschlandweit verfügbar</h4>
                                    </div>

                                    <p class="card-para text-black">
                                    Unser Team aus zertifizierten Fahrzeugprüfern ist deutschlandweit für dich im Einsatz!
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                    <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                        <i class="fa-regular fa-shield-check"></i>
                                    </span>

                                        <h4 class="card-title fw-bold pt-1 pb-2">Sicherheit vor dem Kauf</h4>
                                    </div>

                                    <p class="card-para text-black">
                                        Wir bieten Sicherheit und schützen dich vor unvorhergesehenen Problemen beim
                                        Fahrzeugkauf.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                    <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                    <i class="fa-light fa-face-smile-beam"></i>
                                    </span>

                                        <h4 class="card-title fw-bold pt-1 pb-2">Vermeide hohe Kosten</h4>
                                    </div>

                                    <p class="card-para text-black">
                                    Mit uns vermeidest du teure Reparaturen und unerwartete Zusatzkosten nach dem Kauf.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                    <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                    </span>

                                        <h4 class="card-title fw-bold pt-1 pb-2">Tätige keinen Fehlkauf</h4>
                                    </div>

                                    <p class="card-para text-black">
                                    Mit unserem Gebrauchtwagencheck tätigst du nie wieder einen Fehlkauf und sparst dir somit Zeit und Geld.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                    <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                    <i class="fa-regular fa-car"></i>
                                    </span>

                                        <h4 class="card-title fw-bold pt-1 pb-2">
                                        Sichere Kaufentscheidung</h4>
                                    </div>

                                    <p class="card-para text-black">
                                    Wir liefern dir alle notwendigen Daten, um eine informierte und sichere Kaufentscheidung zu treffen.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                    <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                    <i class="fa-light fa-watch"></i>
                                    </span>

                                        <h4 class="card-title fw-bold pt-1 pb-2">Zeit- und Wegersparnis</h4>
                                    </div>

                                    <p class="card-para text-black">
                                    Du sparst dir lange Anfahrtswege und endlose Besichtigungstermine – bequem von zuhause aus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- Advantage Section End ------->

        <!------- VehicleCheck Section Start ------->
        <section class="vehicle-check-section section-bg">
            <div class="container">
                <div class="vehicle-check-wrapper">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="vehicle-check-text text-center text-md-start ms-md-auto">
                                <h3 class="section-title fs-3 text-primary fw-bold pb-4 mb-md-3">Fahrzeug-Checks
                                    <br>aller Klassen</h3>

                                <a href="{{route('booking.option-page')}}" class="btn btn-secondary d-none d-md-inline-flex vehicle-check-btn w-100">
                                    Jetzt buchen
                                    <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="fahrzeugprüfung vor dem kauf"></span>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="vehicle-check-list ">
                                <ul class="text-primary d-flex flex-md-column flex-wrap">
                                    <li class="d-flex align-items-center">
                                        <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt="auto pkw gebrauchtwagencheck"></span>
                                        Auto / PKW
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt="transporter check"></span>
                                        Transporter
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt="oldtimer check"></span>
                                        Oldtimer
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt="sportwagen check"></span>
                                        Sportwagen
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt="wohnmobil check"></span>
                                        Wohnmobil
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt="auto vor dem kauf prüfen lassen"></span>
                                        Sonstiges
                                    </li>
                                </ul>
                            </div>


                            <div class="text-center  d-md-none pt-4 mt-2">
                                <a href="{{route('booking.option-page')}}" class="btn btn-secondary vehicle-check-btn">
                                    Jetzt buchen
                                    <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- VehicleCheck Section End ------->

       

        <!------- UsedCarCheck (2) OnSite Section Start ------->
        <section class="used-car-check-section-2 pt-mb-cst">
            <div class="container">
                <div class="ucc-2-wrapper mx-auto">
                    <div class="row flex-column-reverse flex-md-row align-items-center">
                        <div class="col-md-6">
                            <div class="ucc-text p-lg-5 pe-0 text-center text-md-start">
                                <h3 class="section-title fs-3 fw-bold text-primary pb-2">Gebrauchtwagencheck vor Ort
                                </h3>

                                <div class="text-grey pt-1 pb-2 mb-1"><i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                           4.8 (2.733 Bewertungen) </div>

                                <p class="pt-2 text-primary">
                                Wir führen die Inspektion deines gewünschten Gebrauchtwagens direkt am Standort des Fahrzeugs durch, sodass du weder Zeit noch Aufwand investieren musst.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ucc-thumb text-end">
                                <img src="theme-1/imgs/thumbs/used-car-2-thumb.jpg" alt="gebrauchtwagencheck" style="border-radius: 5px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- UsedCarCheck (2) OnSite Section End ------->

        <!------- CheckList Section Start ------->
        <section class="checklist-section section-bg">
            <div class="container pricing-select">
                <h3 class="section-title fw-bold text-primary text-center pb-5 mb-2">Unser Gebrauchtwagencheck</h3>

                <div class="check-wrapper ">
                    <nav>
                        <div class="nav row" id="nav-tab" role="tablist">
                            <div class="col-6">
                                <div class="check-nav">
                                    <input type="radio" id="check1" name="check">
                                    <label for="check1" class="" id="nav-home-tab" data-bs-toggle="tab"
                                           data-bs-target="#nav-home" type="button" role="tab"
                                           aria-controls="nav-home" aria-selected="false">
                                        <div class="d-flex align-items-center check-nav-link">
                                            <span class="ind">
                                                <span class="dot"></span>
                                            </span>
                                            <div class="check-nav-content">
                                                <h5>Check XL</h5>
                                                <p>Umfassender Fahrzeug-Check</p>
                                                <div class="rattings">
                                                    <span class="star">
                                                        <i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                    </span>
                                                    <span class="ratting-text">4.8 (237)</span>
                                                </div>
                                            </div>
                                        </div>

                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="check-nav">
                                    <span class="check-badge">Empfohlen</span>
                                    <input type="radio" id="check2" name="check" checked>
                                    <label for="check2" class="active" id="nav-profile-tab"
                                           data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
                                           role="tab" aria-controls="nav-profile" aria-selected="true">
                                        <div class="d-flex align-items-center check-nav-link">
                                            <span class="ind">
                                                <span class="dot"></span>
                                            </span>
                                            <div class="check-nav-content">
                                                <h5>Check XXL</h5>
                                                <p>Umfassender Fahrzeug-Check + FIN-Abfrage & Berechnung
                                                </p>
                                                <div class="rattings">
                                                    <span class="star">
                                                        <i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                    </span>
                                                    <span class="ratting-text">4.8 (973)</span>
                                                </div>
                                            </div>
                                        </div>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="tab-content row" id="nav-tabContent">
                        <div class="tab-pane fade col-md-6" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="check-content">
                                <div class="check-cotnent-body">
                                <ul>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="zertifiziertes gutachten"></span>
                                            <b>Zertifiziertes Gutachten</b>
                                        </li>
                                        <li>
                                            <span>
                                                <img src="theme-1/imgs/icons/check.png" alt="dokumentenprüfung">
                                            </span>
                                            Dokumentenprüfung
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Lackschichtmessung & Analyse"></span>
                                            Lackschichtmessung & Analyse
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Prüfung auf Unfallschäden"></span>
                                            Prüfung auf Unfallschäden
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Bauteil & Fahrwerks-Check"></span>
                                            Bauteil & Fahrwerks-Check
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Motor & Elektronikdiagnose"></span>
                                            Motor & Elektronikdiagnose
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Umfassende Probefahrt"></span>
                                            Umfassende Probefahrt
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Kilometerstand-Check"></span>
                                            Kilometerstand-Check
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Prüfung des Innenraums"></span>
                                            Prüfung des Innenraums
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Fotodokumentation"></span>
                                            Fotodokumentation
                                        </li>
                                        <li>
                                            <span><i style="font-size: 1.5rem; color: #D3D3D3" class="fa-sharp-duotone fa-regular fa-xmark"></i></span>
                                            Kosten & Minderwert Berechnung
                                        </li>
                                        <li>
                                            <span><i style="font-size: 1.5rem; color: #D3D3D3" class="fa-sharp-duotone fa-regular fa-xmark"></i></span>
                                            Ermittlung des Marktwertes
                                        </li>
                                        <li>
                                            <span><i style="font-size: 1.5rem; color: #D3D3D3" class="fa-sharp-duotone fa-regular fa-xmark"></i></span>
                                            FIN-Abfrage
                                            <a href="#fin-model" data-bs-target="#fin-model" data-bs-toggle="modal">
                                                <i style="font-size: 1.3rem; color: var(--primary);"  class="pt-1 fa-regular fa-circle-info"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active show col-md-6" id="nav-profile" role="tabpanel"
                             aria-labelledby="nav-profile-tab" tabindex="0">
                            <div class="check-content">
                                <div class="check-cotnent-body">
                                <ul>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Zertifiziertes Gutachten"></span>
                                            <b>Zertifiziertes Gutachten</b>
                                        </li>
                                        <li>
                                            <span>
                                                <img src="theme-1/imgs/icons/check.png" alt="Dokumentenprüfung">
                                            </span>
                                            Dokumentenprüfung

                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Lackschichtmessung & Analyse"></span>
                                            Lackschichtmessung & Analyse
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Prüfung auf Unfallschäden"></span>
                                            Prüfung auf Unfallschäden
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Bauteil & Fahrwerks-Check"></span>
                                            Bauteil & Fahrwerks-Check
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Motor & Elektronikdiagnose"></span>
                                            Motor & Elektronikdiagnose
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Umfassende Probefahrt"></span>
                                            Umfassende Probefahrt
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Kilometerstand-Check"></span>
                                            Kilometerstand-Check
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Prüfung des Innenraums"></span>
                                            Prüfung des Innenraums
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Fotodokumentation"></span>
                                            Fotodokumentation
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Kosten & Minderwert Berechnung"></span>
                                            Kosten & Minderwert Berechnung
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="Ermittlung des Marktwertes"></span>
                                            Ermittlung des Marktwertes
                                        </li>
                                        <li>
                                            <span><img src="theme-1/imgs/icons/check.png" alt="FIN-Abfrage & Ausstattungscodes"></span>
                                            FIN-Abfrage
                                            <a href="#fin-model" data-bs-target="#fin-model" data-bs-toggle="modal">
                                                <i style="font-size: 1.3rem; color: var(--primary);"  class="pt-1 fa-regular fa-circle-info"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <a href="{{route('booking.option-page')}}" class="nextStep btn btn-secondary ">
                            Angebot berechnen
                            <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck buchen"></span>
                    </a>
                </div>
            </div>
        </section>
        <!------- CheckList Section End ------->

        <div class="modal fade" id="fin-model" tabindex="-1" aria-labelledby="stepDescModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="stepDescModalLabel">FIN-Abfrage</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="popupContent" class="pb-2" style="text-align: left;">
                                                        <b>Wir nutzen die FIN (Fahrgestellnummer) und fragen beim Hersteller und bei der DAT zusätzlich folgende Dinge an:</b>
                                                        <br><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;">Fahrzeughistorie</span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;">Unfallberichte</span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;">Wartungsprotokolle</span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;">Tachostand</span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;">Ausstattungsliste</span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;">Diebstahlüberprüfung</span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;">vieles mehr ...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

        <!------- UsedCarCheck (3) In Detail Section Start ------->
        <section class="used-car-check-section-3">
            <div class="container">
                <div class="section-head text-center pb-4 mb-3">
                    <h3 class="section-title fs-3 text-primary">Gebrauchtwagencheck im Detail</h3>
                    <!-- <p class="section-pretitle">Alles was du erhältst.</p> -->
                </div>

                <div class="ucc-3-wrapper">
                    <div class="row g-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                                <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                    <i class="fa-regular fa-file-certificate"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Zertifiziertes Gutachten</h4>
                            </div>
                            <p class="card-para text-black">Wir erstellen ein zertifiziertes Gutachten, das eine professionelle und objektive Bewertung des gesamten Fahrzeugs bietet.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                <i class="fa-regular fa-magnifying-glass"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Mehr als 150 Prüfpunkte</h4>
                            </div>
                            <p class="card-para text-black">Das Gutachten deckt über 150 spezifische Prüfpunkte ab, um eine gründliche Überprüfung des Fahrzeugs und aller Bauteile zu gewährleisten.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-folder-open"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Dokumentenprüfung</h4>
                            </div>
                            <p class="card-para text-black">Wir prüfen alle Fahrzeugdokumente wie Zulassungsbescheinigung, Fahrzeugbrief und Serviceheft auf Vollständigkeit und Authentizität.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-paint-roller"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Lackschichtmessung & Analyse</h4>
                            </div>
                            <p class="card-para text-black">Durch die Messung der Lackschichtdicke erkennen wir, ob das Fahrzeug nachlackiert wurde, was auf mögliche Unfallschäden hinweist.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-solid fa-car-burst"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Prüfung auf Unfallschäden</h4>
                            </div>
                            <p class="card-para text-black">Wir setzen spezielle Prüfmethoden und visuelle Inspektionen ein, um versteckte Unfallschäden am Fahrzeug zu identifizieren und zu bewerten.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-gear"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Bauteil & Fahrwerksanalyse</h4>
                            </div>
                            <p class="card-para text-black">Wir analysieren Bauteile und das Fahrwerk, um technische Defekte und Verschleiß zu identifizieren.</p>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </section>
        <!------- UsedCarCheck (3) In Detail Section End ------->

        <!------- UsedCarCheck (4) Nationwide Section Start ------->
        <section class="used-car-check-section-4">
            <div
                class="ucc-4-top section-bg section-padding d-flex flex-column flex-md-row justify-content-center align-items-center text-center text-md-start">
                <span class="germany-flag-lg">
                    <img src="assets/imgs/hpslider/4.png" style="height: 115px" alt="Germany Flag">
                </span>

                <h3 class="section-title fs-3 text-primary">Gebrauchtwagencheck vor Ort. <br>Deutschlandweit.</h3>
            </div>

            <div class="ucc-4-wrapper section-padding">
                <div class="container">
                    <div class="row g-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-light fa-engine"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Motor & Elektronikdiagnose</h4>
                            </div>
                            <p class="card-para text-black">Mit modernen Diagnosegeräten prüfen wir den Zustand des Motors und der elektronischen Systeme und identifizieren mögliche Fehler oder Probleme.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-gauge"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Kilometerstand-Check</h4>
                            </div>
                            <p class="card-para text-black">Wir prüfen den Kilometerstand auf Plausibilität, um Manipulationen zu erkennen und die tatsächliche Laufleistung des Fahrzeugs sicherzustellen.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-solid fa-laptop-code"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">FIN-Abfrage&nbsp;
                                    <a href="#fin-model" data-bs-target="#fin-model" data-bs-toggle="modal">
                                        <i style="color: var(--primary);"  class="fa-regular fa-circle-info"></i>
                                    </a>
                                </h4>
                            </div>
                            <p class="card-para text-black">Wir nutzen die FIN, um die Fahrzeughistorie, Inspektionen, Tachostand, technische Angaben und Ausstattungscodes zu überprüfen.   
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-steering-wheel"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Prüfung des Innenraums</h4>
                            </div>
                            <p class="card-para text-black">Wir untersuchen den Innenraum auf Sauberkeit, Abnutzung und Funktionalität aller Bedienelemente und Ausstattungsteile, um Komfort und Qualität zu bewerten.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-car-tunnel"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Probefahrt</h4>
                            </div>
                            <p class="card-para text-black">Wir führen eine Probefahrt durch, um das Fahrverhalten, die Lenkung, die Bremsen und andere fahrrelevante Systeme des Fahrzeugs unter realen Bedingungen zu testen.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-light fa-camera"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Fotodokumentation</h4>
                            </div>
                            <p class="card-para text-black">Wir erstellen eine umfassende Fotodokumentation, die den Zustand des Fahrzeugs visuell festhält und für spätere Referenzen zur Verfügung steht.</p>
                        </div>
                    </div>

                    <div class="pt-4 d-flex flex-column align-items-center justify-content-center">
                        <a href="{{route('inhalt')}}" style="width: 350px" class="nextStep btn btn-primary">
                                Alle Inhalte ansehen
                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                        </a>
                    </div>

                    </div>
                </div>
            </div>
        </section>
        <!------- UsedCarCheck (4) Nationwide Section End ------->

        <!------- SafetyBanner Section Start ------->
        <section class="safety-banner-section section-bg">
            <div class="container">
                <div
                    class="safety-banner-wrapper d-flex flex-column justify-content-center align-items-center text-center mx-auto">
                    <sapn class="ratings-check flex-shrink-0">
                        <i style="font-size: 4rem; color: var(--secondary)" class="fa-solid fa-badge-check"></i>
                    </sapn>

                    <h3 class="section-title fs-3 text-primary pb-4 mb-2">Für deine Sicherheit <br>beim Autokauf.</h3>

                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <a href="{{route('booking.option-page')}}" style="width: 350px" class="nextStep btn btn-secondary ">
                                Jetzt Fahrzeug-Check buchen
                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!------- SafetyBanner Section End ------->

        <!------- WhyIsImportant Section Start ------->
        <section class="why-is-important-section section-padding">
            <div class="container">
                <h3 class="section-title fs-3 text-primary text-center pb-4 mx-auto mb-4">Warum du Carspector nutzen solltest</h3>

                <div class="car-check-importance-wrapper mx-auto">
                    <div class="row g-3 g-sm-4">
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="tüv gebrauchtwagencheck"></span>
                                <p style="font-size: 17px; font-weight: 500">TÜV-Richtlinien</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt="adac gebrauchtwagencheck"></span>

                                <p style="font-size: 17px; font-weight: 500">ADAC empfohlen</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="deutschlandweit"></span>

                                <p style="font-size: 17px; font-weight: 500">Deutschlandweit im Einsatz</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="gebrauchtwagencheck zertifiziert"></span>

                                <p style="font-size: 17px; font-weight: 500">Zertifiziert & anerkannt</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="dekra gebrauchtwagencheck"></span>

                                <p style="font-size: 17px; font-weight: 500">Faire Preise</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="hervorragende kundenrezensionen"></span>

                                <p style="font-size: 17px; font-weight: 500">Bekannt aus Zeitung & Co.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- WhyIsImportant Section End ------->

        <!------- BuyCarSafely Section Start ------->
        <section class="buy-car-safely-section section-bg">
            <div class="container">
                <div
                    class="bcs-wrapper d-flex flex-column flex-md-row align-items-center justify-content-center text-center text-sm-start">
                    <h3 class="section-title fs-3 text-primary">Sicherer Autokauf dank unseres Gebrauchtwagenchecks.</h3>

                    <div class="bcs-right d-flex flex-column flex-sm-row align-items-center">
                        <sapn class="ratings-check flex-shrink-0">
                            <i style="font-size: 4rem; color: var(--secondary)" class="fa-regular fa-file-certificate"></i>
                        </sapn>

                        <p style="font-size: 18px !important" class="bcs-para text-primary">
                            Erfahre alles über den technischen und optischen Zustand deines gewünschten Fahrzeugs dank
                            zertifiziertem Prüfbericht.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!------- BuyCarSafely Section End ------->

        <!------- Testimonial Section Start ------->
        <section class="testimonial-section">
            <div class="container">
                <h3 class="section-title fs-3 fw-bold text-primary text-center pb-2 pb-md-5 mb-4 mb-sm-2">Das sagen unsere Kunden</h3>

                <div class="testimonial-wrapper mx-auto mb-4 pb-2">
                    <div class="testimonial-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="testimonial-card swiper-slide d-flex flex-column justify-content-between">
                                <div class="testimonial-info d-flex flex-column">
                                    <div
                                        class="testimonial-ratings d-flex justify-content-center align-items-center text-center text-secondary pb-4">
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <p class="testimonial-para text-center">
                                    "Mein beauftragter Gebrauchtwagencheck wurde zügig bearbeitet. Von außen sah das Fahrzeug gut aus, hatte jedoch Mängel, die ich alleine nicht bemerkt hätte."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <img src="assets/imgs/client/client-1.jpg" alt="Client">
                                    <p class="client-name">Annika Z.</p>
                                </div>
                            </div>
                            <div class="testimonial-card swiper-slide d-flex flex-column justify-content-between">
                                <div class="testimonial-info d-flex flex-column">
                                    <div
                                        class="testimonial-ratings d-flex justify-content-center align-items-center text-center text-secondary pb-4">
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <p class="testimonial-para text-center">
                                    "Ich konnte viel über die Historie des Fahrzeugs erfahren. Beschädigungen, Kratzer und Dellen wurden mit Bildern veranschaulicht und dokumentiert."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <img src="assets/imgs/client/client-2.jpg" alt="Client">
                                    <p class="client-name">Michael L.</p>
                                </div>
                            </div>
                            <div class="testimonial-card swiper-slide d-flex flex-column justify-content-between">
                                <div class="testimonial-info d-flex flex-column">
                                    <div
                                        class="testimonial-ratings d-flex justify-content-center align-items-center text-center text-secondary pb-4">
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                        <span>
                                            <i style="font-size: 1.3rem" class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <p class="testimonial-para text-center">
                                    "Die Begutachtung erfolgte schnell und gründlich. Das Gutachten war ausführlich, mit Bildern belegt und enthielt alle für mich erforderlichen Informationen."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <img src="assets/imgs/client/client-3.jpg" alt="Client">
                                    <p class="client-name">Mustafa Y.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination d-lg-none"></div>
                    </div>
                </div>

                <h3 class="testimonial-info fw-bold text-primary text-center">
                    Mehr als 2.500 <span class="text-secondary">5-Sterne</span> Bewertungen!
                </h3>

                <div class="text-center mt-5">
                    <a href="{{route('rezensionen')}}" class="btn btn-primary faq-btn">
                        Alle Bewertungen ansehen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                    </a>
                </div>
            </div>
        </section>
        <!------- Testimonial Section End ------->

        <!------- SecuredBanner Section Start ------->
        <section class="secured-banner-section section-padding section-bg">
            <div class="container">
                <div
                    class="secured-banner-wrapper d-flex flex-column flex-md-row justify-content-center align-items-center">
                    <h3 class="section-title fs-3 fw-bold text-primary">Sorgenfrei & <br>abgesichert</h3>

                    <div class="secured-banner-right d-inline-flex align-items-center">
                        <sapn class="ratings-check flex-shrink-0">
                            <i style="font-size: 4rem; color: var(--secondary)" class="fa-solid fa-badge-check"></i>
                        </sapn>

                        <div class="rating-details">
                            <div class="rd-top d-inline-flex align-items-center gap-2 mb-1">
                                <span class="rd-title text-primary fw-bold lh-1">4.8</span>
                                <div class="ratings text-secondary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>

                            <div class="rd-bottom">
                                <p class="rd-bottom-title text-primary"><span class="fw-bold">2.938</span> Bewertungen
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- SecuredBanner Section End ------->

        <!------- FAQ Section Start ------->
        <section class="faq-section">
            <div class="container">
                <h3 class="section-title fs-3 fw-bold text-primary text-center pb-5 mb-2">Fragen zum Gebrauchtwagencheck
                </h3>

                <div class="faq-accordion mx-auto">
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                    <div style="margin-bottom: 15px !important" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-two" aria-expanded="false" aria-controls="faq-two">
                                                        Was ist Carspector?
                                                    </button>
                                                </h2>
                                                <div id="faq-two" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        Carspector ist deutschlands <b>führender Anbieter von Gebrauchtwagenchecks</b> für Fahrzeuge aller Klassen. Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile. Du kannst mit nur wenigen Klicks schnell und unkompliziert deinen persönlichen Gebrauchtwagencheck deutschlandweit buchen.
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-three" aria-expanded="false" aria-controls="faq-three">
                                                        Wie funktioniert Carspector genau?
                                                    </button>
                                                </h2>
                                                <div id="faq-three" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <b>Wir fahren zu deinem gewünschten Fahrzeug und prüfen es direkt beim Verkäufer vor Ort.</b>
                                                        <br><br>
                                                        Wir arbeiten mit zertifizierten Prüfern in ganz Deutschland zusammen, um unsere Leistungen möglichst flächendeckend anbieten zu können. Unser Team besteht ausschließlich aus geprüften und professionellen Kfz-Experten, die Fachwissen und Erfahrung mitbringen.
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-four2" aria-expanded="false" aria-controls="faq-four2">
                                                        Welche Fahrzeuge prüft Carspector?
                                                    </button>
                                                </h2>
                                                <div id="faq-four2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <b>Wir prüfen Fahrzeuge aller Klassen.</b> Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile. Falls dein gewünschtes Fahrzeug nicht dabei ist, kontaktiere gerne unseren Support.
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-four" aria-expanded="false" aria-controls="faq-four">
                                                            Verkäufer: privat und gewerblich?
                                                    </button>
                                                </h2>
                                                <div id="faq-four" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <b>Ja</b>, wir prüfen sowohl privat zum Verkauf stehende Fahrzeuge als auch gewerbliche, beispielsweise aus einem Autohaus.
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-five" aria-expanded="false" aria-controls="faq-five">
                                                        Was beinhaltet eine Fahrzeugprüfung?
                                                    </button>
                                                </h2>
                                                <div id="faq-five" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                    Die Prüfungsinhalte variieren pro Fahrzeugklasse und sind während des Buchungsprozesses oder auf der jeweiligen Produktseite zu finden.
                                                        <br><br>
                                                        Grundsätzlich prüfen wir allerdings bei jeder Fahrzeugklasse: Die Fahrzeugdokumente, die Fahrzeughistorie, den Lack und Außenzustand, den Motor und die Elektronik, den Kilometerstand, den Innenraum und vieles mehr.
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-six" aria-expanded="false" aria-controls="faq-six">
                                                        In welchen Städten kann ich buchen?
                                                    </button>
                                                </h2>
                                                <div id="faq-six" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        Wir bieten unsere Dienstleistungen <b>deutschlandweit</b> in allen Gebieten und Städten an.
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-seven" aria-expanded="false" aria-controls="faq-seven">
                                                        Welche Informationen muss ich angeben?
                                                    </button>
                                                </h2>
                                                <div id="faq-seven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        Um dein gewünschtes Fahrzeug zu prüfen, benötigen wir <b>Marke, Modell und die Adresse des Fahrzeugs.</b> Optional kannst du noch den Link zum Inserat angeben, damit wir uns bestens vorbereiten können. Zusätzlich kannst du uns gerne deine Prüfungswünsche und Fragen mitteilen.
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-eight" aria-expanded="false" aria-controls="faq-eight">
                                                        Ich habe eine Prüfung gebucht - wie geht es weiter?
                                                    </button>
                                                </h2>
                                                <div id="faq-eight" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        Du erhältst einen Eintrag auf deinem Profil und eine E-Mail mit Rechnung und allen wichtigen Informationen. Wir werden nun den Autoverkäufer kontaktieren, dein gewünschtes Fahrzeug prüfen und dir das Prüfergebnis schnellstmöglich zusenden. 
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-nine" aria-expanded="false" aria-controls="faq-nine">
                                                        Wann erhalte ich das Prüfergebnis?
                                                    </button>
                                                </h2>
                                                <div id="faq-nine" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        Durchschnittlich dauert es <b>2-4 Werktage</b>, bis du das Ergebnis des Gebrauchtwagenchecks erhältst. Jedoch kann es manchmal zu Verzögerungen kommen, da wir auf die Verfügbarkeit des Verkäufers angewiesen sind.
                                                    </div>
                                                </div>
                                            </div>

                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="{{route('faq')}}" class="btn btn-primary faq-btn">
                        Vollständiges FAQ ansehen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="auto vor dem kauf checken lassen"></span>
                    </a>
                </div>
            </div>
        </section>
        <!------- FAQ Section End ------->

        <!------- BenefitBanner Section Start ------->
        <section class="benefit-banner-section section-bg">
            <div class="container">
                <div
                    class="benefit-banner-wrapper d-flex flex-column justify-content-center align-items-center text-center mx-auto">
                    <sapn class="ratings-check flex-shrink-0">
                        <i style="font-size: 4rem; color: var(--secondary)" class="fa-solid fa-badge-check"></i>
                    </sapn>

                    <h3 class="section-title fs-3 text-primary pb-4 mb-2">Jetzt buchen <br>und profitieren.</h3>



                    <a href="{{route('booking.option-page')}}" class="btn btn-secondary benefit-banner-btn">
                        Gebrauchtwagencheck buchen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck"></span>
                    </a>
                </div>
            </div>
        </section>
        <!------- BenefitBanner Section End ------->

        <!------- Proud Section Start ------->
        <section class="proud-section py-5">
            <div class="container">
                <h3 class="section-title fs-3 text-primary text-center pb-4 mb-2">Darauf sind wir stolz</h3>

                <div class="proud-wrapper mx-auto shadow-1">
                    <div class="row g-0">
                        <div class="col-md-4 proud-col">
                            <div class="proud-item text-primary text-center position-relative p-4">
                                <span class="proud-icon d-inline-flex mb-3">
                                    <i style="font-size: 2rem; color: var(--secondary)" class="fa-regular fa-face-smile-beam"></i>
                                </span>

                                <div class="proud-text">
                                    <h5 class="count">3.000 +</h5>
                                    <p>zufriedene Kunden</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 proud-col">
                            <div class="proud-item text-primary text-center position-relative p-4">
                                <span class="proud-icon d-inline-flex mb-3">
                                    <i style="font-size: 2rem; color: var(--secondary)" class="fa-regular fa-star"></i>
                                </span>

                                <div class="proud-text">
                                    <h5 class="count">4,7/5</h5>
                                    <p>Sterne im Durchschnitt</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 proud-col">
                            <div class="proud-item text-primary text-center position-relative p-4">
                                <span class="proud-icon d-inline-flex mb-3">
                                    <i style="font-size: 2rem; color: var(--secondary)" class="fa-regular fa-city"></i>
                                </span>

                                <div class="proud-text">
                                    <h5 class="count">500 +</h5>
                                    <p>verfügbare Städte</p>
                                    <!-- <a href="https://www.carspector.de/payment-success/109">hallo</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- Proud Section End ------->

        <script>

        document.addEventListener("DOMContentLoaded", () => {
            const animatedElement = document.querySelector('.animate-check');
            if (animatedElement) {
                animatedElement.style.opacity = "1"; // Nur sichtbar, wenn Animation aktiv ist
            }
        });

        document.addEventListener("scroll", function () {
            const stickyBar = document.getElementById("stickyBar");
            const scrollY = window.scrollY || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight;
            const viewportHeight = window.innerHeight;

            // Ab 500px anzeigen, bis 500px vor dem Ende verstecken
            if (scrollY > 2000 && scrollY < scrollHeight - viewportHeight - 1000) {
                stickyBar.classList.add("visible");
            } else {
                stickyBar.classList.remove("visible");
            }
        });

        </script>


    </main>
@endsection

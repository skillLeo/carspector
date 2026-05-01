@extends('mainpages.master-layout')
@section('header')
    
@endsection
@section('content')

<script>
  fbq('track', 'ViewContent');
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
        <h1 style="padding-bottom: 17px" class="tlemain h1main page-title fs-1 text-white fw-bold pad-para-f">Tätige keinen <span class="text-secondary">Fehlkauf!</span></h1>
                
                <p style="padding-bottom: 15px" class="para-dk main-hero-para text-white">
                    Jeder dritte Gebrauchtwagen hat versteckte Mängel – Wir schützen dich davor!
                    </p>



                    <div class="pt-3 main-hero-btns d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 gap-md-4 pb-lg-5 pb-4 mb-lg-2 mb-3">
    <a href="{{route('booking.option-page')}}" class="btn btn-secondary main-hero-btn-1">
        Jetzt buchen
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
            
    <div style="padding-top: 25px" class=" d-sm-none ">
        </div>
        <!------- Hero Section End ------->
</section>


      

        <section class="why-is-important-section section-padding">
            <div class="container">
                <h3 class="section-title fs-3 text-primary text-center pb-4 mx-auto mb-4">Warum du dein Auto vor dem Kauf checken lassen solltest</h3>

                <div class="car-check-importance-wrapper mx-auto">
                    <div class="row g-3 g-sm-4">
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="tüv gebrauchtwagencheck"></span>
                                <p style="font-size: 17px; font-weight: 500">30% Tachomanipulation</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt="adac gebrauchtwagencheck"></span>

                                <p style="font-size: 17px; font-weight: 500">50% Unfallschaden</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="deutschlandweit"></span>

                                <p style="font-size: 17px; font-weight: 500">Entdecke versteckte Mängel</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="gebrauchtwagencheck zertifiziert"></span>

                                <p style="font-size: 17px; font-weight: 500">Marktwertanalyse</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!------- VehicleCheck Section Start ------->
        <section class="vehicle-check-section section-bg">
            <div class="container">
                <div class="vehicle-check-wrapper">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="vehicle-check-text text-center text-md-start ms-md-auto">
                                <h3 class="section-title fs-3 text-primary fw-bold pb-4 mb-md-3">Warum Carspector?</h3>

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
                                        Unabhängige Expertenprüfung vor Ort
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

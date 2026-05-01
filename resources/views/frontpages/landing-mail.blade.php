@extends('mainpages.master-layout')
@section('title', 'Carspector | Gebrauchtwagencheck – zertifiziert & deutschlandweit')
@section('meta_description', 'Jetzt Gebrauchtwagencheck deutschlandweit buchen – zertifizierte Vor-Ort-Prüfung mit über 150 Prüfpunkten, Fotodokumentation & Marktwertanalyse.')
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

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "Gebrauchtwagencheck",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": 4.8,
    "reviewCount": 834
  }
}
</script>


<style>
  /* Standardmäßig ausblenden */


  /* Auf Mobilgeräten (bis zu 768px) anzeigen */



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
    height: 65px; /* Balkenhöhe */
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
    padding: 8px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    line-height: 2;
    width: 85%; /* Standardbreite für mobile Geräte */
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
    background-image: url('/theme-1/imgs/desk/mechanic.jpg');
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
        padding-top: 15px;
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
        padding-top: 5px;
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
        padding-bottom: 50px !important;
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

    .pad-top-inhalt {
      padding-top: 20px !important;
      padding-bottom: 50px !important;
    }
    }


    /* Standardmäßig ausblenden für größere Bildschirme */
    .mobile-divider {
        display: none;
    }

     .pad-top-inhalt {
      padding-top: 0px;
      padding-bottom: 0px;
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
        padding-bottom: 25px !important;
    }
}

@media(min-width: 575px) {
    .tlemain {
        font-size: 58px !important; 
    }
}

@media(min-width: 768px) {
    .tlemain {
        font-size: 75px !important; 
    }
}

@media(min-width: 1199px) {
    .tlemain {
        font-size: 80px !important; 
    }
}

@media(min-width: 1500px) {
    .tlemain {
        font-size: 85px !important; 
    }
}

@media(min-width: 575px) {
    .btn-main-1 {
        min-width: 350px !important;
    }
}



@media(min-width: 768px) {
    .online-text-index {
        padding-top: 0px !important;
    }
}

@media(max-width: 767px) {
    .online-text-index {
        padding-top: 10px !important;
    }
}

.accordion-item {
    box-shadow: none !important;
    border: 1px solid #ccc !important;
    border-radius: 8px;
    margin-bottom: 15px !important;
    overflow: hidden;
    transition: border-color 0.2s ease;
}

/* Standard Button */
.accordion-button {
    background-color: #fcfcfd;
    font-weight: 600;
    padding: 1rem 1.25rem;
    color: #333;
    border: none;
    box-shadow: none;
    transition: background-color 0.2s ease, border 0.2s ease;
}

/* Eingeklappter Zustand */
.accordion-button.collapsed {
    background-color: #fcfcfd;
}



/* Geöffneter Zustand */
.accordion-button:not(.collapsed) {
    background-color: #e9f3ff !important;  /* sanftes Blau */
    border: none !important;              /* Rahmen komplett entfernt */
    border-radius: 8px 8px 0 0;
    color: #333;
}

/* Fokus-Effekt deaktivieren */
.accordion-button:focus {
    outline: none;
    box-shadow: none;
}

/* Accordion Inhalt */
.accordion-body {
    background-color: #fff;
    padding: 1rem 1.25rem;
    font-size: 0.95rem;
    line-height: 1.6;
    border-top: none !important;
}


  @media (max-width: 550px) {
    .h1main {
        font-size: 53px !important;
        letter-spacing: -2px;
    }
  }

  @media (max-width: 390px), (min-width: 768px) {
    .br-381-767 {
        display: none !important;
    }
}
@media (min-width: 391px) and (max-width: 767px) {
    .br-381-767 {
        display: block !important;
    }
}

.hero-blue-section {
        background-color:rgb(240, 244, 247);
        padding: 3rem 1rem 2rem;
    }

    .price-section {
        background-color: #ffffff;
        padding: 3rem 1rem;
    }

    .section-title h2 {
        font-size: 3rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .price-card {
        background:rgb(255, 255, 255);
        border-radius: 1.25rem;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.08);
        padding: 2.25rem 1.75rem;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid #e5e5e5;
    }

    .price-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 45px rgba(0, 0, 0, 0.15);
    }

    .price-tag {
        font-size: 1.35rem;
        font-weight: bold;
        color: var(--primary);
    }

    .service-title {
        font-size: 1.6rem;
        font-weight: 600;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.6rem;
        flex-wrap: nowrap;
        margin-bottom: 1rem;
        text-align: center;
    }

    .icon-circle {
        position: relative;
        width: 50px;
        height: 50px;
        background: #e1f0fb;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
    }

    .icon-circle i {
        color: var(--primary);
        font-size: 1.3rem;
    }

    .icon-tag {
        position: absolute;
        top: -12px;
        font-size: 0.65rem;
        color: var(--primary);
        font-weight: 600;
        text-align: center;
        width: 100%;
    }

    .xl-xxl-wrapper {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        align-items: center;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    .xl-col, .xxl-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 1rem;
    }

    .divider-desktop {
        font-weight: bold;
        font-size: 1.3rem;
        color: #999;
    }

     .btn-sm-custom {
        padding: 1rem 2rem;
        font-size: 1rem;
        border-radius: 6px;
        font-weight: 500;
    }

    .info-box-toggle {
        background: rgb(255, 255, 255);
        border-left: 4px solid var(--primary);
        border-radius: 8px;
        margin: 1.5rem auto 2.5rem;
        text-align: center;
        max-width: 450px;
        border: 1px solid #ccc;
    }

    .info-box-toggle summary {
        padding: 1rem 1.5rem;
        cursor: pointer;
        font-weight: bold;
        color: var(--primary);
    }

    .info-box-toggle p {
        padding: 0 1.5rem 1rem;
        margin: 0;
    }

    @media (max-width: 576px) {
        .service-title {
            flex-direction: row;
            justify-content: center;
            font-size: 1.35rem;
        }

        .xl-xxl-wrapper {
            flex-direction: row;
            gap: 1.2rem;
        }

        .divider-desktop {
            font-size: 1.1rem;
        }
    }
 .section-bg {
  background: #f2f7fc !important;
}
.trust-marquee-wrapper {
  overflow: hidden;
  background: #f4f7fa;
  border-radius: 12px;
  padding: 15px 0;
  margin: 30px auto;
  border: 1px solid #e0e6eb;
  max-width: 800px;
}

.trust-marquee {
  width: 100%;
  overflow: hidden;
  position: relative;
}

.trust-marquee-inner {
  display: inline-flex;
  gap: 40px;
  white-space: nowrap;
  animation: scroll-left 110s linear infinite;
  font-size: 15px;
  font-weight: 500;
  color: #333;
}

.trust-marquee-inner span {
  flex: 0 0 auto;
  padding: 0 10px;
}

/* Langsame, durchlaufende Animation */
@keyframes scroll-left {
  from {
    transform: translateX(0%);
  }
  to {
    transform: translateX(-50%);
  }
}

.section-bg {
  background: #f2f7fc !important;
}


.header-nav > ul { gap: 60px; }
/* --- LOGO endlich groß & nicht mehr geschrumpft --- */
.header .header-logo { 
  flex: 0 0 auto;          /* nicht schrumpfen */
  overflow: visible !important;
}

.header .header-logo a { 
  overflow: visible !important;
}

.header .header-logo img {
  height: 36px !important; /* explizite Höhe statt max-height */
  width: auto !important;  /* Seitenverhältnis beibehalten */
  max-width: none !important;
  object-fit: contain;
  display: block;
}

@media (max-width: 992px) {
  .header .header-logo img { height: 33px !important; margin-bottom: 3px !important}
    .header { min-height: 60px;      } 
    }
@media (min-width: 993px) {
  .header .header-logo { padding-top: 6px !important;}
}


/* --- Logo links ausrichten --- */
.header .header-wrapper {
  display: flex;
  align-items: center;
  justify-content: space-between; /* Logo links, Menü/Burger rechts */
}




/* Logo-Container fix links */
.header .header-logo {
  margin-right: auto;   /* schiebt alles andere nach rechts */
  justify-content: flex-start;
  text-align: left;
}

/* Logo selbst – kein automatisches Zentrieren */
.header .header-logo a {
  display: inline-flex;
  align-items: center;
  justify-content: flex-start;
}

/* Sicherstellen, dass nichts es zentriert */
.header .header-wrapper > *:not(.header-logo) {
  margin-left: auto;
}

.header-nav-link {
  font-size: 17px !important; /* etwas leichter als fw-semibold (600) */
}

.header .header-logo {
  display: flex;             /* aktiviert Flexbox */
  align-items: center;       /* vertikal zentrieren */
  justify-content: flex-start; /* linksbündig */
  height: 100%;              /* volle Header-Höhe nutzen */
}


.header-nav-item,
.header-nav-link {
  display: flex;
  align-items: center;          /* Text vertikal mittig */
  height: 100%;
  padding-top: 1px;
  padding-bottom: 0;
}

  .mobile-nav-link {
    padding-top: 9px !important;
    padding-bottom: 9px !important;font-size: 19px !important;}
  
@media (min-width: 767px) and (max-width: 991px) {
  .header {
    padding-top: 12px;
  }}

@media (min-width: 550px) {
  .btn-wid {
    min-width: 350px !important;
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
                                                                <span>&nbsp;Mo-Sa: 9-18 Uhr</span>
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
        <div id="stickyButton" onclick="window.location.href='#angebot-formular';">Infos & Angebot erhalten</div>
    </div>

    
    <section class="mob-pad hero-section section-padding bg-primary pb-mob" style="position: relative; overflow: hidden;">
    <div class="desk-pic background-overlay"></div>

    <!-- Header innerhalb der Section -->
    <header class="header position-relative z-3">
        <div class="header-wrapper index-header d-flex align-items-center justify-content-center justify-content-md-between mx-auto position-relative">
            <!-- header-logo -->
            <div class="header-logo">
                <a href="{{url('/')}}" class="logo d-inline-flex align-items-center gap-3"><img
                    src="logo-slogan-white.png" alt=""></a>
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
                                <li>
                            <a href="https://carspector.de/fin-abfrage" class="d-flex align-items-center">
                                FIN-Abfrage
                                <span style="background-color: var(--secondary); color: white; padding: 3px 6px; border-radius: 2px; font-size: 12px; margin-left: 10px">NEU</span>
                            </a>
                        </li>
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
                                <li class="no-border">
                                <a href="{{route('inseratvergleich')}}" class="d-flex align-items-center">
                                    Inserat-Vergleich
                                </a>
                                </li>
                                <li>
                                <a href="{{route('wertermittlung')}}" class="d-flex align-items-center">
                                    Inserat-Wertermittlung
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
                                <li>
                                    <a href="{{route('kaufabwicklung')}}">Kaufabwicklung</a>
                                </li>
                            </ul>
                        </li>
                            </ul>
                        </li>
                        <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('preise')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Preise</a>
                    </li>
                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('erfahrungen')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Erfahrungen</a>
                    </li>
                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('faq')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">FAQ</a>
                    </li>
                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('kontakt')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Kontakt</a>
                    </li>
                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('kontakt')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Über uns</a>
                    </li>
                    <a href="{{ route('login') }}" 
                        class="btn btn-outline header-btn d-flex align-items-center justify-content-center"
                        style="letter-spacing: 0.25px; border-radius: 5px; width: 40px; height: 40px; padding: 0;">
                        <i class="fa-regular fa-user" style="font-size: 1rem;"></i>
                    </a>
                    </ul>
                </div>
            </div>
            <!-- header-right-end -->

            <!-- mobile menu start -->
            <!-- <a class="login-btn d-lg-none bg-transparent border-0 p-0 text-white position-absolute top-50 end-0 translate-middle-y me-5 rounded-circle"
   href="{{route('login')}}"
   style="right: 10px !important; font-size: 1.3rem; padding: 0.5rem; border: 2px solid white; display: flex; align-items: center; justify-content: center; text-decoration: none;">
    <i class="fa-regular fa-user"></i>
</a>-->
          <style>

     .burger-menu-btn {
    width: 25px;
    height: 25px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 6px;
    z-index: 1051;
  }

  .burger-line {
    height: 2.5px;
    background-color: white;
    border-radius: 1px;
    transition: all 0.3s ease;
  }

  .burger-line.top,
  .burger-line.middle,
  .burger-line.bottom {
    width: 100%;
  }

.burger-menu-btn.active .top {
  transform: rotate(45deg) translate(5.9px, 5.9px);
}

.burger-menu-btn.active .bottom {
  transform: rotate(-45deg) translate(5.9px, -5.9px);
}
.burger-menu-btn.active .top,
.burger-menu-btn.active .bottom {
  width: 110%; 
}

  .burger-menu-btn.active .middle {
    opacity: 0;
  }
  
  </style>
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('burgerToggle');
    const offcanvasEl = document.getElementById('offcanvasRight');
    const offcanvas = new bootstrap.Offcanvas(offcanvasEl);

    offcanvasEl.addEventListener('show.bs.offcanvas', () => {
      btn.classList.add('active');
    });

    offcanvasEl.addEventListener('hide.bs.offcanvas', () => {
      btn.classList.remove('active');
    });
  });
</script>

<button
  id="burgerToggle"
  class="burger-menu-btn d-lg-none bg-transparent border-0 p-0 text-white position-absolute top-50 end-0 translate-middle-y me-3"
  type="button"
  data-bs-toggle="offcanvas"
  data-bs-target="#offcanvasRight"
  aria-controls="offcanvasRight"
>
  <div class="burger-line top"></div>
  <div class="burger-line middle"></div>
  <div class="burger-line bottom"></div>
</button>

<div class="mobile-menu d-lg-none">
  <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header align-items-center justify-content-between border-bottom border-white">
      <div class="offcanvas-title fw-normal text-white fw-bold" id="offcanvasExampleLabel">Menü</div>
    </div>

        <div class="offcanvas-body">
            <nav class="mobile-nav">
            <div class="accordion" id="accordionMenu">
                <ul>
                    <li class="mobile-nav-item">
                        <a data-bs-toggle="collapse" data-bs-parent="#accordionMenu" href="#collapseExample" role="button" aria-expanded="false"
                           aria-controls="collapseExample" class="mobile-nav-link d-flex align-items-center">
                            Fahrzeug-Checks
                            <span class="nav-triangle"></span>
                        </a>

                        <div class="collapse" id="collapseExample">
                            <ul style="padding-left: 5px !important" class="mobile-submenu">
                                <li>
                                <a href="{{route('gebrauchtwagencheck')}}" class="d-flex align-items-center">
                                    Auto/ PKW Check
                                    <span style="background-color: var(--secondary); color: white; padding: 2px 6px; border-radius: 2px; font-size: 12px; margin-left: 10px">Beliebt</span>
                                </a>
                                </li>
                                <li>
                                    <a href="{{route('transporter')}}">Transporter-Check</a>
                                </li>
                                <li>
                                    <a href="{{route('oldtimer')}}">Oldtimer-Check</a>
                                </li>
                                <li>
                                    <a href="{{route('sportwagen')}}">Sportwagen-Check</a>
                                </li>
                                <li>
                                    <a href="{{route('wohnmobil')}}">Wohnmobil-Check</a>
                                </li>
                                <li>
                                    <a href="{{route('kaufbegleitung')}}">Kaufbegleitung</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-nav-item">
                        <a data-bs-toggle="collapse" data-bs-parent="#accordionMenu" href="#collapseExample1" role="button" aria-expanded="false"
                           aria-controls="collapseExample1" class="mobile-nav-link d-flex align-items-center">
                            Zusatzleistungen
                            <span class="nav-triangle"></span>
                        </a>

                        <div class="collapse" id="collapseExample1">
                            <ul style="padding-left: 5px !important" class="mobile-submenu">
                                <li>
                                <a href="https://carspector.de/fin-abfrage" class="d-flex align-items-center">
                                    FIN-Abfrage
                                    <span style="background-color: var(--secondary); color: white; padding: 2px 6px; border-radius: 4px; font-size: 12px; margin-left: 10px;">NEU</span>
                                </a>
                                </li>
                                <li>
                                    <a href="{{route('inseratcheck')}}">Inserat-Check</a>
                                </li>
                                <li>
                                <a href="{{route('inseratvergleich')}}" class="d-flex align-items-center">
                                    Inserat-Vergleich
                                </a>
                                </li>
                                 <li>
                                <a href="{{route('wertermittlung')}}" class="d-flex align-items-center">
                                    Inserat-Wertermittlung
                                </a>
                                </li>
                                <li>
                                    <a href="{{route('fahrzeuglieferung')}}">Fahrzeug-Lieferung</a>
                                </li>
                                <li>
                                    <a target="_blank" href="/Kfz-Kaufvertrag.pdf">Kfz-Kaufvertrag</a>
                                </li>
                                <li>
                                    <a href="{{route('kaufabwicklung')}}">Kaufabwicklung</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-nav-item"><a href="{{route('preise')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Preise</a></li>
                    <li class="mobile-nav-item"><a href="{{route('erfahrungen')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Erfahrungen</a></li>
                    <li class="mobile-nav-item"><a href="{{route('faq')}}"
                                                   class="mobile-nav-link d-flex align-items-center">FAQ</a></li>
                    <li class="mobile-nav-item"><a href="{{route('kontakt')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Kontakt</a></li>
                    <li class="mobile-nav-item"><a href="{{route('kontakt')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Über uns</a></li>
                    <li class="mobile-nav-item"><a href="{{route('login')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Anmelden</a></li>
                </ul>
                <!-- <a href="{{route('login')}}" class="btn btn-outline header-btn mt-3">
                    Anmelden
                </a> -->
</div>
                <hr style="border: 1px solid #fff">
                    <div class="questions-section pt-2 mt-4">
                    <p class="pb-3" style="color: white; font-size: 17.5px"><b>Fragen?</b> Ruf uns einfach an!<br><span style="font-size: 16px; color: #d6d6d6">Mo-Sa: 9-18 Uhr</span></p>
                    
                    <a href="tel:+4921192325550" style="border-radius: 5px" class="btn btn-secondary d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.5rem" class="fa-regular fa-phone"></i>0211/ 92325550
                    </a>
            </div>
            </nav>
        </div>

    </div>
</div>
        <!-- <div class="mobile-divider"></div> -->

    </header>



    <!-- Header Ende <br class="d-none d-md-block">-->

    <div class="pad-top container">
        <div class="hero-wrapper mx-auto text-center">
        <!-- <h1 style="padding-bottom: 20px" class="tlemain h1main page-title fs-1 text-white fw-bold pad-para-f">
        Kauf eines<br><span class="animate-check text-secondary">Autos</span> geplant?</h1> -->
        <h1 style="padding-bottom: 17px" class="tlemain h1main page-title fs-1 text-white fw-bold pad-para-f">
        Wir <span class="animate-check text-secondary">prüfen</span><br>deinen Neuen.</h1>
                
                <p style="padding-bottom: 15px" class="para-dk main-hero-para text-white">
                        Wir fahren zu dem Fahrzeug, das du kaufen<br class="br-381-767"> möchtest, und prüfen es direkt vor Ort!
                    </p>

                    <ul class="main-hero-para d-flex flex-column flex-md-row flex-wrap justify-content-center align-items-center gap-1 gap-md-3" 
                        style="list-style-type: none; padding-left: 0; text-align: center; padding-bottom: 30px;">
                        <li class="d-flex align-items-center gap-2 text-center" style="color: var(--secondary); margin-top: 3px;">
                            <i class="fas fa-check" style="font-size: 20px;"></i>
                            <span style="font-size: 17px; letter-spacing: 0.1px" class="para-space text-white">Über 150+ Prüfpunkte</span>
                        </li>
                        <li class="d-flex align-items-center gap-2 text-center ms-md-2" style="color: var(--secondary); margin-top: 3px;">
                            <i class="fas fa-check" style="font-size: 20px;"></i>
                            <span style="font-size: 17px; letter-spacing: 0.1px" class="para-space text-white">Deutschlandweit verfügbar</span>
                        </li>
                        <li class="thopt d-flex align-items-center gap-2 text-center" style="color: var(--secondary); margin-top: 3px;">
                            <i class="fas fa-check" style="font-size: 20px;"></i>
                            <span style="font-size: 17px; letter-spacing: 0.1px" class="para-space text-white">Gutachten nach TÜV-Richtlinien</span>
                        </li>
                    </ul>

                    <div class="main-hero-btns d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 gap-md-4 pb-lg-5 pb-4 mb-lg-2 mb-3">
    <!-- <a href="https://carspector.de/Carspector_Mustergutachten.pdf?" target="_blank" style="border-radius: 5px !important" class="btn btn-outline main-hero-btn-1">Demo-Gutachten ansehen</a> -->
    <a href="#angebot-formular" style="border-radius: 5px !important" class="btn-wid btn btn-secondary main-hero-btn-1">
        Infos & Angebot erhalten
        <span class="btn-icon">
            <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck">
        </span>
    </a>
</div>


                    <!-- <div class="main-hero-btns d-flex flex-column align-items-center gap-3 gap-md-4 pb-lg-4 pb-4 mb-lg-2 mb-3">
    <a href="https://carspector.de/Carspector_Mustergutachten.pdf?" target="_blank" class="btn btn-outline main-hero-btn-1">Demo-Gutachten ansehen</a>
    <a href="{{route('booking.option-page')}}" class="btn-main-1 btn btn-secondary main-hero-btn-1">
    Fahrzeug-Check buchen
        <span class="btn-icon">
            <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck">
        </span>
    </a>
    <p class="online-text-index text-center mb-0" style="color: #d6dadf; font-size: 16px">
        Online-Buchung in unter 2 Minuten – ganz ohne Registrierung.
    </p>
</div> -->


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



        
        <!-- <div style="padding-top: 45px" class="hero-mobile-bg d-sm-none position-relative">
            <img src="theme-1/imgs/thumbs/hero-mobile-bg.jpg"   alt="">
        </div> -->

        <!------- MiniCards Section Start ------->
        <section class="mini-cards-section section-bg">
          <style>
  .mini-cards-section .mini-cards-wrapper { 
    max-width: 1140px; 
    margin: 0 auto; 
  }
  .mini-cards-section .single-mini-card {
    border-radius: 10px !important;
    box-shadow: 0 4px 12px rgba(0,0,0,.06);
  }

  /* 🔹 Mobile: max-width 85% */
  @media (max-width: 768px) {
    .mini-cards-section .mini-cards-wrapper {
      max-width: 85%;
    }
  }
</style>

            <div class="container">
                <div class="mini-cards-wrapper mx-auto">
                    <div class="mini-cards-slider swiper">
                        <div class="swiper-wrapper">
                            <div style="border-radius: 5px" class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                    <img src="assets/imgs/hpslider/1.png" style="height: 40px" alt="tüv gebrauchtwagencheck">
                                </span>
                                <span style="font-size: 16px; padding-left: 15px">TÜV-Richtlinien</span>
                            </div>
                            <div style="border-radius: 5px" class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/2.png" style="height: 40px" alt="zertifiziert">
                                </span>
                                 <span style="font-size: 16px; padding-left: 10px">Zertifizierte Prüfer</span>
                            </div>
                            <div style="border-radius: 5px" class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/3.png" style="height: 25px" alt="adac gebrauchtwagencheck">
                                </span>
                                 <span style="font-size: 16px; padding-left: 10px">ADAC Richtlinien</span>
                            </div>
                            <div style="border-radius: 5px" class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/4.png" style="height: 40px" alt="deutschlandweit vor ort">
                                </span>
                                 <span style="font-size: 16px; padding-left: 15px">Deutschlandweit</span>
                            </div>
                            <div style="border-radius: 5px" class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/5.png" style="height: 50px" alt="entspannt und einfach">
                                </span>
                                 <span style="font-size: 16px; padding-left: 10px">Schnelle Buchung</span>
                            </div>
                            <div style="border-radius: 5px" class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/6.png" style="height: 45px" alt="garantie zertifikat">
                                </span>
                                 <span style="font-size: 16px; padding-left: 15px">Prüfungsgarantie</span>
                            </div>
                            <div style="border-radius: 5px"class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/7.png" style="height: 40px" alt="auto pkw transporter oldtimer sportwagen wohnmobil gebrauchtwagencheck">
                                </span>
                                 <span style="font-size: 16px; padding-left: 5px">Alle Fahrzeugklassen</span>
                            </div>
                            <div  style="border-radius: 5px"class="slider-height single-mini-card swiper-slide d-flex align-items-center fw-semibold text-black">
                                <span class="mini-card-img">
                                <img src="assets/imgs/hpslider/8.png" style="height: 35px" alt="kundenservice kontakt">
                                </span>
                                 <span style="font-size: 16px; padding-left: 5px">24/7 Kundenservice</span>
                            </div>
                        </div>
                        <div class="swiper-pagination mini-card-pagination d-lg-none"></div>
                    </div>
                </div>
            </div>
            <div class="blue-section-pb"></div>
        </section>
        <!------- MiniCards Section End ------->



       <section class="used-car-check-section">
  <style>
    .used-car-check-section .ucc-thumb img {
      border-radius: 5px;
      box-shadow: 0 6px 18px rgba(0,0,0,.1);
    }
    .used-car-check-section .ucc-badge {
      box-shadow: 0 4px 10px rgba(0,0,0,.12);
    }
  </style>

  <div class="container">
    <div class="ucc-wrapper mx-auto">
      <div class="row flex-column-reverse flex-md-row align-items-center">
        <div class="col-md-6">
          <div class="ucc-thumb text-end">
            <img src="/autokauf.webp" alt="gebrauchtwagencheck">
          </div>
        </div>

        <div class="col-md-6">
          <div class="ucc-text text-center text-md-start p-lg-5 pe-0">
            <h3 class="padt-mb section-title fs-3 fw-bold text-primary pb-2">Autokauf geplant?</h3>
            <p style="font-size: 17px" class="pt-2 pb-4 text-primary">
              Wir fahren zu deinem gewünschten Fahrzeug und führen einen umfassenden Gebrauchtwagencheck vor Ort durch, damit du über den technischen und
              optischen Zustand bestens informiert bist und eine <b>fundierte Kaufentscheidung</b> treffen kannst.
            </p>
            <span class="ucc-badge" style="background-color: var(--secondary); color: white; padding: 7px 15px; border-radius: 5px; font-size: 15px">In ganz Deutschland verfügbar!</span>
            <div class="pb-3 pb-sm-0"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 



   <!------- HowDoesWork Section Start ------->
       <section class="how-does-work-section  section-bg section-padding" style="padding: 60px 20px">
  <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
    <h3 style="color: var(--primary); margin-bottom: 60px">In 3 Schritten sicher zum neuen Auto</h3>
    <div style="display: flex; flex-direction: row; justify-content: space-between; gap: 40px; flex-wrap: wrap;">
      
      <!-- Schritt 1 -->
      <div style="flex: 1; min-width: 280px; text-align: center;">
        <img src="/step-1-bild.webp" alt="Wunschauto angeben" style="width: 145px; margin-bottom: 20px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
          <span style="background-color: var(--primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
            1
          </span>
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">Wunschfahrzeug angeben</div>
        </div>
        <p style="font-size: 16px; color: #333;">Mache Angaben zu deinem Wunsch-Gebrauchtwagen bequem online.</p>
      </div>

      <!-- Schritt 2 -->
      <div class="pt-3 pt-sm-0" style="flex: 1; min-width: 280px; text-align: center;">
        <img src="/step-2-bild.webp" alt="Prüfung vor Ort" style="width: 200px; margin-bottom: 20px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
          <span style="background-color: var(--primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
            2
          </span>
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">Wir prüfen es vor Ort</div>
        </div>
        <p style="font-size: 16px; color: #333;">Unsere Experten fahren zum Fahrzeug und prüfen es anhand unserer Checkliste mit über 150 Prüfpunkten.</p>
      </div>

      <!-- Schritt 3 -->
      <div class="pt-4 pt-sm-0" style="flex: 1; min-width: 280px; text-align: center;">
        <img src="/step-3-bild.webp" alt="Zertifiziertes Gutachten" style="width: 175px; margin-bottom: 21px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
          <span style="background-color: var(--primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
            3
          </span>
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">Gutachten erhalten</div>
        </div>
        <p style="font-size: 16px; color: #333;">Du erhältst ein zertifiziertes Gutachten, das den Zustand und unsere Kaufempfehlung beinhaltet.</p>
      </div>
      

    </div>
    <a href="#angebot-formular" class="btn btn-secondary mt-5" style="border-radius: 5px; padding: 15px 60px">
          Angebot erhalten
          <span class="btn-icon ms-2">
            <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px;" alt="weiter zur Buchung">
          </span>
        </a>
  </div>
</section>



<section class="checklist-section py-5">
  <style>
    /* Scoped Styles für Prüfpunkte */
    .checklist-section .section-title {
      font-size: 1.9rem;
      letter-spacing: -0.4px;
    }

    .checklist-section .section-subtitle {
      max-width: 720px;
      margin: 0 auto;
      font-size: 0.98rem;
      color: #6b7280;
    }

    .checklist-section .features-grid {
      display: grid;
      gap: 16px;
      grid-template-columns: 1fr;
    }
    @media (min-width: 767px){
      .checklist-section .features-grid {
        grid-template-columns: 1fr 1fr;
      }
    }

    .checklist-section .feature-card {
      display: grid;
      grid-template-columns: auto 1fr;
      gap: 14px;
      align-items: start;
      background: #ffffff;
      border: 1px solid rgba(148,163,184,.45);
      border-radius: 14px;
      box-shadow: 0 4px 14px rgba(15,23,42,.04);
      padding: 14px 16px;
      /* Hover-Effekt entfernt */
    }

    .checklist-section .icon-wrap {
      width: 46px;
      height: 46px;
      display:flex;
      align-items:center;
      justify-content:center;
      border-radius: 999px;
      flex-shrink: 0;
      background: #ecf4ff;
      border: 1px solid rgba(13,110,253,.25);
      box-shadow: inset 0 1px 0 rgba(255,255,255,.7);
    }
    .checklist-section .icon-wrap i{
      font-size: 1.15rem;
      color: var(--primary, #0d6efd);
    }

    .checklist-section .feature-title{
      margin: 0;
      font-weight: 700;
      font-size: 1rem;
      color: #111827;
      letter-spacing: -0.1px;
      display:flex;
      align-items:center;
      gap: 6px;
    }
    .checklist-section .feature-title .check-icon {
      color: #16a34a;
      font-size: 1rem;
    }
    .checklist-section .feature-text{
      margin: 4px 0 0;
      color: #5c626d;
      font-size: .88rem;
      line-height: 1.45;
    }

    /* Schlankere Preisbox im Website-Theme */
    .checklist-section .price-box {
      max-width: 620px;
      margin: 32px auto 0;
      text-align: center;
      background: #ffffff;
      color: #111827;
      border-radius: 14px;
      padding: 18px 22px;
      border: 1px solid rgba(13,110,253,.18);
      box-shadow: 0 8px 22px rgba(15,23,42,.06);
    }
    .checklist-section .price-label {
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: .14em;
      color: #6b7280;
      margin-bottom: 2px;
    }
    .checklist-section .price-main {
      font-size: 1.8rem;
      font-weight: 800;
      letter-spacing: -0.04em;
      margin: 4px 0 4px;
      color: #0f172a;
    }
    .checklist-section .price-main span {
      font-size: 0.98rem;
      font-weight: 600;
      margin-left: 4px;
      color: #4b5563;
    }
    .checklist-section .price-subline {
      font-size: 0.9rem;
      color: #4b5563;
    }
.checklist-section .price-tags {
  margin-top: 10px;
  display:flex;
  flex-wrap:wrap;
  gap: 6px;
  justify-content:center;
  font-size: 0.72rem; /* kleiner */
}

.checklist-section .price-tag {
  padding: 3px 8px; /* kleiner */
  border-radius: 999px;
  background: #f3f4f6;
  border: 1px solid #e5e7eb;
  display:flex;
  align-items:center;
  gap: 4px; /* enger */
  white-space: nowrap;
  color: #374151;
}

.checklist-section .price-tag i {
  font-size: 0.75rem; /* kleiner */
  color: #16a34a;
}


    .checklist-section .cta-wrapper {
      padding-top: 14px;
    }
    .checklist-section .cta-btn {
      border-radius: 999px;
      padding: 11px 34px;
      font-weight: 600;
      display:inline-flex;
      align-items:center;
      gap: 8px;
    }
  </style>

  <div class="container">
     <h3 class="section-title fs-3 fw-bold text-primary text-center mb-3">
      Was wir beim Gebrauchtwagen-Check für dich prüfen
    </h3>
    <p class="section-subtitle text-center mb-5">
      Du erhältst einen kompletten Check vom Profi – inklusive Gutachten, Technikprüfung, Probefahrt
      und klarer Einschätzung, ob sich der Kauf wirklich lohnt.
    </p>

    <div class="features-grid" role="list" aria-label="Leistungsübersicht">

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-file-certificate"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Zertifiziertes Gutachten
          </h5>
          <p class="feature-text">
            Professionelle, objektive Gesamtbewertung deines Wunschfahrzeugs – ideale Entscheidungsgrundlage.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-folder-open"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Dokumentenprüfung
          </h5>
          <p class="feature-text">
            Kontrolle von Zulassung, Brief, Serviceheft & Co. auf Vollständigkeit und Echtheit.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-paint-roller"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Lack & Karosserie
          </h5>
          <p class="feature-text">
            Lackschichtmessung und Analyse, um Nachlackierungen und mögliche Unfallschäden zu erkennen.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-solid fa-car-burst"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Prüfung auf Unfallschäden
          </h5>
          <p class="feature-text">
            Sicht- und Strukturprüfung, um versteckte Schäden und schlechte Reparaturen aufzudecken.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-gear"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Technik & Fahrwerk
          </h5>
          <p class="feature-text">
            Analyse wichtiger Bauteile, Fahrwerk und Achsen auf Defekte, Spiel und sicherheitsrelevanten Verschleiß.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-tire"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Reifen & Bremsen
          </h5>
          <p class="feature-text">
            Check von Profiltiefe, Alter und Zustand der Reifen sowie Verschleiß von Scheiben und Belägen.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-engine"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Motor- & Elektronikdiagnose
          </h5>
          <p class="feature-text">
            Diagnose der Motor- und Fahrzeugsysteme mit modernen Testgeräten zur Erkennung versteckter Fehler.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-solid fa-tablet-rugged"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            OBD2-Fehlerspeicher
          </h5>
          <p class="feature-text">
            Auslesen der Fehlercodes über OBD2 – z.&nbsp;B. Motorsteuerung, Abgasanlage und weitere Systeme.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-gauge"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Kilometerstand-Check
          </h5>
          <p class="feature-text">
            Plausibilitätsprüfung von Laufleistung, Zustand und Historie – zum Schutz vor Tacho-Manipulation.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-car-tunnel"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Probefahrt
          </h5>
          <p class="feature-text">
            Test des Fahrverhaltens, Lenkung, Bremsen und Geräusche unter realen Bedingungen.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-steering-wheel"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Innenraum & Bedienung
          </h5>
          <p class="feature-text">
            Prüfung von Innenraum, Sitzen, Ausstattung und allen relevanten Bedienelementen.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-camera"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Fotodokumentation
          </h5>
          <p class="feature-text">
            Ausführliche Fotos vom Fahrzeugzustand, damit du später alles in Ruhe nachvollziehen kannst.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-heart"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Individuelle Wünsche
          </h5>
          <p class="feature-text">
            Auf Wunsch prüfen wir gezielt Punkte, die dir besonders wichtig sind (z.&nbsp;B. Langstrecken-Tauglichkeit).
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-circle-euro"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Marktwert-Ermittlung
          </h5>
          <p class="feature-text">
            Einschätzung des realistischen Marktwertes anhand Zustand, Ausstattung, Laufleistung und Marktdaten.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-calculator"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Folgekosten & Minderwerte
          </h5>
          <p class="feature-text">
            Zusammenfassung der Mängel inkl. Einschätzung zu anstehenden Kosten und möglichen Preisabschlägen.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-solid fa-laptop-code"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            FIN-Abfrage
          </h5>
          <p class="feature-text">
            Abgleich der Fahrzeughistorie, Inspektionen und Ausstattung über die FIN.
            <a href="#fin-model" data-bs-toggle="modal" class="text-decoration-underline" aria-label="Mehr Infos zur FIN-Abfrage">
              Mehr Infos
            </a>
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-solid fa-list-check"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Verhandlungs-Checkliste
          </h5>
          <p class="feature-text">
            Klare, strukturierte Aufstellung aller Mängel – als starke Basis für deine Preisverhandlung.
          </p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-badge-check"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Experteneinschätzung
          </h5>
          <p class="feature-text">
            Persönliche Empfehlung von unseren Experten, ob sich der Kauf aus technischer Sicht lohnt oder nicht.
          </p>
        </div>
      </article>

    </div>
<!-- Schlanke Preisbox + CTA -->
<div style="border: 1px solid var(--primary) !important" class="price-box mt-4 border rounded-3 text-center p-4 shadow-sm">
  <h5 class="mb-2 fw-bold text-dark">
    Kompletter Gebrauchtwagen-Check
  </h5>

  <p class="mb-1 text-muted text-uppercase small">
    Deutschlandweit verfügbar
  </p>

  <div class="mb-1" style="font-size: 2rem; font-weight: 700; color: var(--primary)">
    299&nbsp;€
  </div>

  <p class="mb-3 text-muted" style="font-size: 0.9rem;">
    inkl. MwSt., Anfahrt & allen Prüfleistungen –
    <strong>keine versteckten Gebühren.</strong>
  </p>


<div class="d-flex flex-wrap justify-content-center mb-4" style="gap: 10px; font-size: 1rem;">

    <span class="badge bg-light text-secondary border px-3 py-2 d-flex align-items-center" style="font-weight: 500;">
      <i class="fa-solid fa-check me-2" style="font-size: 1rem;"></i>
      Anfahrt inklusive
    </span>

    <span class="badge bg-light text-secondary border px-3 py-2 d-flex align-items-center" style="font-weight: 500;">
      <i class="fa-solid fa-check me-2" style="font-size: 1rem;"></i>
      Festpreis 299&nbsp;€
    </span>

    <span class="badge bg-light text-secondary border px-3 py-2 d-flex align-items-center" style="font-weight: 500;">
      <i class="fa-solid fa-check me-2" style="font-size: 1rem;"></i>
      Perfekte Verhandlungs-Grundlage
    </span>

  </div>
  <a href="#angebot-formular" class="btn btn-secondary px-4 py-2 fw-semibold" style="height: 55px; width: min(95%, 350px);; border-radius: 25px;">
    Jetzt Angebot erhalten
    <span class="btn-icon ms-1">
      <img src="theme-1/imgs/icons/arrowr.png" style="height: 18px;" alt="weiter zum Angebot">
    </span>
  </a>
</div>


  </div>
</section>






<style>
  .elevated-card {
  box-shadow: 0 3px 8px rgba(0,0,0,0.12) !important; /* dezenter Schatten */
}
</style>

  
<section class="section-bg  testimonial-section">
  <div class="container">
    <!-- Überschrift -->
    <h3 class="section-title fs-3 fw-bold text-primary text-center pb-2 pb-md-5 mb-4 mb-sm-2">
      Das sagen unsere Kunden
    </h3>

    <!-- Slider-Wrapper -->
    <div class="testimonial-wrapper mx-auto mb-4 pb-2">
      <div class="testimonial-slider swiper">
        <div class="swiper-wrapper">
          <!-- 1 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/3.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Maximilian S.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Wir sind sehr zufrieden. Das Fahrzeug wurde detailliert und ausführlich beschrieben, gute Fotos runden das Gutachten ab. Die netten Mitarbeiter von Carspector sind schnell zu erreichen und sehr hilfsbereit. Ich würde Carspector auf jeden Fall wieder beauftragen.
                </p>
              </div>
            </div>
          </div>

          <!-- 2 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/2.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Anna K.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Vor allem der Support hat mich mehr als positiv überrascht. Es war fast schon freundschaftlich! Termin für den nächsten Tag erhalten, trotz Buchung um 18&nbsp;Uhr. Es lief alles absolut reibungslos!
                </p>
              </div>
            </div>
          </div>

          <!-- 3 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/1.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Jonas M.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Erstklassiger Service. Innerhalb von 2&nbsp;Tagen hatte ich meinen ausführlichen Gebrauchtwagen-Check und konnte dadurch einen wesentlich besseren Preis verhandeln – ohne selbst vor Ort sein zu müssen.
                </p>
              </div>
            </div>
          </div>

          <!-- 4 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/4.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Sabine R.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Sehr professionell – Termin extrem schnell, was wichtig war, weil der Wagen nur zwei Tage reserviert war. Das Gutachten half mir enorm bei der Entscheidung. Sehr zufrieden.
                </p>
              </div>
            </div>
          </div>

          <!-- 5 -->
        <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/5.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Tobias L.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Innerhalb von 2&nbsp;Tagen hatte ich den vollständigen Bericht plus 30 Fotos und sparte mir 800&nbsp;km Anfahrt. Würde den Service jederzeit wieder nutzen.
                </p>
              </div>
            </div>
          </div>

          <!-- 6 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/6.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Claudia H.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Top-Erfahrung! Buchung online, Prüfer pünktlich im Autohaus, Bericht verständlich geschrieben – sogar für Laien wie mich.
                </p>
              </div>
            </div>
          </div>

          <!-- 7 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/7.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Erik W.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Ohne Carspector hätte ich 300&nbsp;km fahren müssen. Stattdessen bekam ich den Check per Mail und konnte direkt zuschlagen – riesige Zeitersparnis.
                </p>
              </div>
            </div>
          </div>

          <!-- 8 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/8.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Katharina Z.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Detailgetreues Gutachten mit vielen Bildern. Die XXL-Variante inkl. Marktanalyse half mir bei der Preisverhandlung. Vielen Dank!
                </p>
              </div>
            </div>
          </div>

          <!-- 9 -->
         <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/9.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Mehmet T.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Schnell, kompetent, freundlich. Der Bericht war erstklassig – perfekt zur Kaufvorbereitung. Danke, immer wieder.
                </p>
              </div>
            </div>
          </div>

          <!-- 10 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/12.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Lisa B.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Erster Autokauf, große Unsicherheit – bis ich den freundlichen Support von Carspector am Telefon hatte. Prüfer entdeckte einen Unfallschaden, Kauf abgebrochen.
                </p>
              </div>
            </div>
          </div>

          <!-- 11 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/11.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Felix M.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Als Laie sparte ich mir den Weg Hamburg → Berlin: Carspector schickte den Gutachter. Händler erschien nicht, Carspector prüfte an einem neuen Termin – top Service!
                </p>
              </div>
            </div>
          </div>

          <!-- 12 -->
         <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/10.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Laura B.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Dank Carspector wurde uns vom Kauf abgeraten – wir fanden mit ihrer Hilfe ein besseres Fahrzeug. Vielen Dank!
                </p>
              </div>
            </div>
          </div>

          <!-- 13 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/13.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Andreas K.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Super freundlicher und kompetenter Service. Es wurde stets auf meine Bedürfnisse eingegangen.
                </p>
              </div>
            </div>
          </div>

          <!-- 14 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/14.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Timo F.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Beide beauftragten Berichte waren umfangreich und hilfreich, der Support sehr nett, freundlich und schnell.
                </p>
              </div>
            </div>
          </div>

          <!-- 15 -->
          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
            <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
              <img src="/assets/imgs/reviews/15.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
              <div class="card-body">
                <h5 class="card-title fw-bold mb-1 text-dark">Daniela P.</h5>
                <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
                <p class="card-text text-dark" style="font-size: 0.95rem;">
                  Montags beauftragt, donnerstags eine sehr ausführliche Dokumentation inkl. Bilder – absolut zu empfehlen!
                </p>
              </div>
            </div>
          </div>

          <div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
  <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
    <img src="/assets/imgs/reviews/16.png" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
    <div class="card-body">
      <h5 class="card-title fw-bold mb-1 text-dark">Nina W.</h5>
      <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
      <p class="card-text text-dark" style="font-size: 0.95rem;">
        Sehr angenehm überrascht! Ich hatte nicht erwartet, dass der Bericht so detailliert ausfällt. Der gesamte Ablauf war unkompliziert und effizient – klare Empfehlung.
      </p>
    </div>
  </div>
</div>

<div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
  <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
    <img src="/assets/imgs/reviews/17.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
    <div class="card-body">
      <h5 class="card-title fw-bold mb-1 text-dark">Elena F.</h5>
      <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
      <p class="card-text text-dark" style="font-size: 0.95rem;">
        Schnelle Bearbeitung, Gute Dokumentation, leider wurde die Anzahl der Halter nicht überprüft. Sehr hilfreich, wenn das Auto weit entfernt ist.
      </p>
    </div>
  </div>
</div>

<div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
  <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
    <img src="/assets/imgs/reviews/18.png" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
    <div class="card-body">
      <h5 class="card-title fw-bold mb-1 text-dark">Sebastian L.</h5>
      <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
      <p class="card-text text-dark" style="font-size: 0.95rem;">
        Ich bin beruflich viel eingespannt, deshalb war der Vor-Ort-Service für mich ideal. Alles lief wie versprochen – pünktlich, kompetent, vertrauenswürdig. Jederzeit wieder!
      </p>
    </div>
  </div>
</div>

<div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
  <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
    <img src="/assets/imgs/reviews/19.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
    <div class="card-body">
      <h5 class="card-title fw-bold mb-1 text-dark">Thomas L.</h5>
      <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
      <p class="card-text text-dark" style="font-size: 0.95rem;">
        Der Auftrag wurde schnell bearbeitet - Montag beauftragt, am Donnerstag war das Gutachten da. Das erstellte Gutachten hat mich vor einer herben Enttäuschung und wohl auch vor einem Fehlkauf bewahrt. Kein Autokauf mehr ohne Carspector, es lohnt sich für Laien definitiv.
      </p>
    </div>
  </div>
</div>

<div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
  <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
    <img src="/assets/imgs/reviews/20.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
    <div class="card-body">
      <h5 class="card-title fw-bold mb-1 text-dark">Rolf B.</h5>
      <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
      <p class="card-text text-dark" style="font-size: 0.95rem;">
        Schnelle Terrminvereinbarung mit dem Verkäufer. Ausführlicher Bericht über den Zustand. Beantwortung von Rückfragen.
      </p>
    </div>
  </div>
</div>

<div class="swiper-slide" style="height: auto; min-height: 475px; display: flex; justify-content: center;">
  <div class="card elevated-card shadow border-0 rounded mx-auto" style="max-width: 350px;">
    <img src="/assets/imgs/reviews/21.jpg" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
    <div class="card-body">
      <h5 class="card-title fw-bold mb-1 text-dark">Lars P.</h5>
      <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">★★★★★</p>
      <p class="card-text text-dark" style="font-size: 0.95rem;">
        Ich habe die Buchung an einem Montag erledigt. Am Mittwoch habe ich dann die Mitteilung erhalten das die Besichtigung am gleichen Tag geplant ist und ebenfalls die Prüfergebnisse am selben Tag noch ankommen werden.
      </p>
    </div>
  </div>
</div>


        </div>

        <!-- Mobile-Pagination -->
        <div class="swiper-pagination d-block mt-4"></div>


      </div>
    </div>

    <!-- Footer-Text -->
    <h3 style="font-size: 30px; letter-spacing: -0.5px" class="testimonial-info fw-bold text-primary text-center">
      Mehr als 2.500 <span class="text-secondary">5-Sterne</span> Bewertungen!
    </h3>
  </div>
</section>

<script>
const testimonialSwiper = new Swiper('.testimonial-slider', {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 24
    },
    1400: {
      slidesPerView: 3,
      spaceBetween: 32
    }
  }
});

</script>


       


        <!------- UsedCarCheck (2) OnSite Section End ------->

        
<section class="check-from-home-section py-5">
  <div class="container">
    <div class="row align-items-center flex-column-reverse flex-md-row">
      
      <!-- Text -->
      <div class="col-md-6 text-center text-md-start">
        <h3 class="fw-bold text-primary mb-4">Auto bequem von zuhause<span class="d-none d-lg-inline"><br></span> aus prüfen lassen</h3>

        <p class="pb-1 text-primary" style="font-size: 17px;">
          Kein Weg zum Fahrzeug nötig – unsere Experten übernehmen das für dich. Wir führen einen detaillierten Gebrauchtwagencheck durch und senden dir im Anschluss ein zertifiziertes Gutachten, aussagekräftige Bilder und eine professionelle Einschätzung direkt per E-Mail.
        </p>
        <a href="#angebot-formular" class="btn btn-secondary mt-4" style="border-radius: 5px; padding: 15px 40px">
          Jetzt Infos erhalten
          <span class="btn-icon ms-2">
            <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px;" alt="weiter zur Buchung">
          </span>
        </a>
      </div>

      <!-- Illustration -->
      <div class="col-md-6 mb-4 mb-md-0 text-center">
  <img src="/vonzuhause.webp" alt="Auto von Zuhause prüfen lassen"
       class="img-fluid img-responsive-custom">
</div>


    </div>
  </div>
</section>

<style>
  .img-responsive-custom {
    width: 100%;
    max-width: 250px; /* Mobil kleiner */
  }

  @media (min-width: 768px) {
    .img-responsive-custom {
      max-width: 375px; /* Desktop normal groß */
    }
  }
</style>
      
        

        

        <!------- SafetyBanner Section End ------->

        <section class="pb-4 section-bg faq-section">
            <div class="container">
                <h3 class="section-title fs-3 fw-bold text-primary text-center pb-5 mb-2">Fragen zum Gebrauchtwagencheck
                </h3>

                <div class="faq-accordion mx-auto">
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                                            <div style="margin-bottom: 15px !important; border-radius: 5px" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-two" aria-expanded="false" aria-controls="faq-two">
                                                        Was ist Carspector?
                                                    </button>
                                                </h2>
                                                <div id="faq-two" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        Carspector ist deutschlands <b>führender Anbieter von Gebrauchtwagenchecks</b> für Fahrzeuge aller Klassen. Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile. 
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important; border-radius: 5px" class="accordion-item">
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
                                            <div style="margin-bottom: 15px !important; border-radius: 5px" class="accordion-item">
                                              <h2 class="accordion-header">
                                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                          data-bs-target="#faq-four3" aria-expanded="false" aria-controls="faq-four3">
                                                      Wie ist der genaue Ablauf?
                                                  </button>
                                              </h2>
                                              <div id="faq-four3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                  <div class="accordion-body">
      Über <a href="#angebot-formular">dieses Formular</a> erhältst du ganz einfach dein persönliches Angebot direkt in dein Postfach und kannst den Fahrezug-Check dort mühelos beauftragen.

                                                      <br><br>
                                                      Anschließend nehmen wir Kontakt mit dem Verkäufer auf, vereinbaren einen Termin und führen den Fahrzeug-Check durch. 
                                                      Nach Abschluss erhältst du das Ergebnis inklusive Bildern und aller relevanten Informationen bequem per E-Mail.
                                                  </div>
                                              </div>
                                          </div>
                                            <div style="margin-bottom: 15px !important; border-radius: 5px" class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#faq-four2" aria-expanded="false" aria-controls="faq-four2">
                                                        Welche Fahrzeuge prüft Carspector?
                                                    </button>
                                                </h2>
                                                <div id="faq-four2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <b>Wir prüfen Fahrzeuge aller Klassen.</b> Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile.
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px !important; border-radius: 5px" class="accordion-item">
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
                                              
                                  
                                            <div style="margin-bottom: 15px !important; border-radius: 5px" class="accordion-item">
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
                                            <div style="margin-bottom: 15px !important; border-radius: 5px" class="accordion-item">
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
                                            <div style="margin-bottom: 15px !important; border-radius: 5px" class="accordion-item">
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
                                            <div style="border-radius: 5px" class="accordion-item">
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

            </div>
        </section>

              <!------- SafetyBanner Section Start ------->
             
<section id="angebot-formular" class="contact-section py-5">
  <h3 class="text-primary text-center fw-bold mb-3">
    Infos und Angebot erhalten
  </h3>
  <p class="text-center text-muted mb-4" style="font-size: 0.95rem;">
    Trage deine E-Mail ein und erhalte alle Infos zu unserem Fahrzeug-Check
    bequem in dein Postfach – unverbindlich & kostenlos.
  </p>

  <div class="pb-4 pt-2 container" style="max-width: 550px;">

    <form action="{{ route('landing-mail.submit') }}" method="POST"
          class="shadow-lg p-4 p-md-4 rounded-4 bg-white border-0">
      @csrf

      {{-- Erfolgs- / Fehlermeldungen --}}
      @if (session('success'))
        <div class="alert alert-success mb-3">
          {{ session('success') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger mb-3">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <input type="hidden" name="name" value="TEST">

      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">E-Mail-Adresse</label>
        <input
          type="email"
          name="email"
          id="email"
          class="form-control shadow-input form-control-lg custom-input"
          style="border: 1px solid #000; background-color: #f9f9f9ff;"
          placeholder="Deine E-Mail-Adresse"
          required
        >
      </div>

      <!-- <p class="text-muted mb-3" style="font-size: 0.85rem;">
        Keine Buchung, kein Risiko – du erhältst nur Informationen zu unserem Gebrauchtwagen-Check
        und kannst später ganz in Ruhe entscheiden.
      </p> -->

      <div class="text-center pt-2 mb-3">
        <button type="submit" class="btn btn-secondary px-5 py-3 fw-semibold rounded-pill">
          Infos per E-Mail erhalten
        </button>
      </div>

      <div class="pt-2">
        <ul class="list-unstyled text-start" style="font-size: 0.95rem; line-height: 1.55;">
          <li class="d-flex mb-2">
            <span class="me-2">✔️</span>
            Unverbindliches & individuelles Angebot
          </li>
          <li class="d-flex mb-2">
            <span class="me-2">✔️</span>
            Step-by-Step Anleitung zum Fahrzeug-Check
          </li>
          <li class="d-flex mb-2">
            <span class="me-2">✔️</span>
            Übersicht über alle Preise & Leistungen
          </li>
          <li class="d-flex mb-2">
            <span class="me-2">✔️</span>
            Buchungslink für deinen Gebrauchtwagen-Check
          </li>
          <li class="d-flex mb-2">
            <span class="me-2">✔️</span>
            Demo-Gutachten für volle Transparenz
          </li>
          <!-- <li class="d-flex mb-2">
            <span class="me-2">✔️</span>
            Inserat-Checkliste: Häufige Händlertricks & wie du sie erkennst
          </li> -->
          <li class="d-flex mb-1">
            <span class="me-2">✔️</span>
            100 % unverbindlich & datenschutzsicher
          </li>
        </ul>
      </div>

      <p class="text-center pt-3 mb-0" style="font-size: 0.9rem;">
        Du erhältst alle Infos innerhalb weniger Sekunden direkt an deine E-Mail.
      </p>
    </form>
  </div>
</section>


<script>
  // Smooth Scroll für CTAs, die auf #angebot-formular verlinken
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth' });
    });
  });
</script>


<style>
  /* Shadow entfernt */
  .shadow-input {
    box-shadow: none !important;
  }

  /* Input-Fokus: Border-Farbe + leichtes Glow */
  .custom-input:focus {
    border-color: #0d6efd !important;  /* Bootstrap primary */
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25) !important;
  }
</style>

       
        <!------- Advantage Section End ------->

        <div class="modal fade" id="fin-model" tabindex="-1" aria-labelledby="stepDescModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="stepDescModalLabel">FIN-Abfrage</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="popupContent" class="pb-2" style="text-align: left;">
                                                        <b>Wir nutzen die FIN (Fahrgestellnummer) und fragen beim Hersteller, bei der DAT sowie bei weiteren Quellen zusätzlich folgende Informationen ab:</b>
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
                                                            <span style="color: #000; font-size: 1.0em;">Kilometerstand</span>
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
        
       <section class="safety-banner-section section-bg">
            <div class="container">
                <div
                    class="safety-banner-wrapper d-flex flex-column justify-content-center align-items-center text-center mx-auto">
                    <sapn class="ratings-check flex-shrink-0">
                        <i style="font-size: 4rem; color: var(--secondary)" class="fa-solid fa-badge-check"></i>
                    </sapn>

                    <h3 class="section-title fs-3 text-primary">Für deine Sicherheit <br>beim Autokauf.</h3>

                </div>
            </div>
        </section>


        <style>
.proud-wrapper {
  box-shadow: 0 5px 18px rgba(0,0,0,0.2);
  border-radius: 5px;
}
</style>


        <!------- Proud Section Start ------->
        <section class="proud-section py-5">
            <div class="container">
                <h3 class="section-title fs-3 text-primary text-center pb-4 mb-3">Darauf sind wir stolz</h3>

                <div style="border-radius: 5px !important" class="proud-wrapper mx-auto shadow-1">
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

            if (scrollY > 900 && scrollY < scrollHeight - viewportHeight - 1850) {
                stickyBar.classList.add("visible");
            } else {
                stickyBar.classList.remove("visible");
            }
        });

        </script>


    </main>
@endsection

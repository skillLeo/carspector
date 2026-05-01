@extends('mainpages.master-layout')
@section('title', "Gebrauchtwagencheck in {$cityTitle} – geprüft & vor Ort")
@section('meta_description', "Jetzt Gebrauchtwagencheck in {$cityTitle} buchen – umfassende Vor-Ort-Prüfung mit über 150 Prüfpunkten, Fotodokumentation & Marktwertanalyse.")
@section('header')
    @include('partials.index-header')
@endsection
@section('content')
<base href="/">
<script type="application/ld+json">
{!! json_encode([
  "@context" => "https://schema.org",
  "@type" => "Service",
  "name" => "Gebrauchtwagencheck {$cityTitle}",
  "description" => "Wir fahren zu dem Fahrzeug, das du kaufen möchtest, und prüfen es direkt vor Ort!",
  "url" => $canonicalUrl,
  "areaServed" => [
      "@type" => "Place",
      "name" => $cityTitle
  ],
  "provider" => [
      "@type" => "Organization",
      "name" => "Carspector",
      "telephone" => "+49 211 92325550",
      "url" => "https://carspector.de"
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>

<script type="application/ld+json">
{!! json_encode([
  "@context" => "https://schema.org",
  "@type" => "Product",
  "name" => "Gebrauchtwagencheck {$cityTitle}",
  "aggregateRating" => [
      "@type" => "AggregateRating",
      "ratingValue" => 4.8,
      "reviewCount" => 834
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
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


.container {
    position: relative;
    z-index: 2; /* Inhalt über der Überlagerung */
}

@media (max-width: 575px) {
    .desk-pic {
        background-color: var(--primary) !important;
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
</style>

   
    <main class="main-area overflow-hidden"> 

     <div id="stickyBar">
        <div id="stickyButton" onclick="window.location.href='https://carspector.de/booking-step-1';">Fahrzeug-Check buchen</div>
    </div>

    


<!-- =========================
     HOMEPAGE HERO + IN-HERO SLIDER (updated spacing + card widths)
     ========================= -->
<section class="ugc-hero">
  <style>
    .ugc-hero{
      position: relative;
      padding: 60px 0 50px;
      background: #eaf4ff;
      overflow: hidden;
    }

    .ugc-hero::before{
      content:"";
      position:absolute;
      width: 520px; height: 520px;
      left: -180px; top: -220px;
      background: radial-gradient(circle, rgba(13,110,253,0.12), rgba(13,110,253,0.00) 65%);
      pointer-events:none;
    }
    .ugc-hero::after{
      content:"";
      position:absolute;
      width: 560px; height: 560px;
      right: -220px; bottom: -260px;
      background: radial-gradient(circle, rgba(13,110,253,0.09), rgba(13,110,253,0.00) 65%);
      pointer-events:none;
    }

    .ugc-hero .container,
    .ugc-hero .row{ position: relative; z-index: 1; }

    /* Copy */
    .ugc-hero .hero-title{
      font-weight: 650;
      letter-spacing: -0.02em;
      line-height: 1.08;
      margin: 0 0 14px;
      color: #0b1f3a;
      font-size: clamp(2.15rem, 4.1vw, 3.05rem);
    }

    .ugc-hero .hero-subtitle{
      font-size: 17px;
      line-height: 1.5;
      color: rgba(11,31,58,0.86);
      margin-bottom: 0;
      max-width: 375px;
    }

    /* Bulletpoints */
    .ugc-hero .hero-bullets{
      list-style: none;
      padding: 0;
      margin: 18px 0 0;
      display: grid;
      gap: 10px;
      max-width: 590px;
    }

    .ugc-hero .hero-bullets li{
      display:flex;
      align-items:flex-start;
      gap: 10px;
      color: rgba(11,31,58,0.92);
      font-weight: 650;
    }

    .ugc-hero .bullet-check{
      flex: 0 0 auto;
      width: 22px;
      height: 22px;
      border-radius: 6px;
      background: rgba(13,110,253,0.10);
      border: 1px solid rgba(13,110,253,0.18);
      display:flex;
      align-items:center;
      justify-content:center;
      margin-top: 0;
      color: #0d6efd;
      font-size: 13px;
      line-height: 1;
    }

    /* CTA Wrapper */
    .ugc-hero .cta-wrap{ padding-top: 26px; }

    /* Counter */
    .ugc-hero .hero-counter-wrapper{
      margin-top: 18px;
      padding-top: 4px;
    }
    .ugc-hero .counter-client-img{
      width: 50px;
      height: 50px;
      border-radius: 999px;
      margin-left: -12px;
      background: rgba(255,255,255,0.9);
    }
    .ugc-hero .counter-client-img:first-child{ margin-left: 0; }
    .ugc-hero .counter-client-img img{ object-fit: cover; }

    .ugc-hero .counter-text{
      margin: 0;
      font-size: 26px;
      line-height: 1.05;
      letter-spacing: -0.02em;
    }
    .ugc-hero .counter-info{
      margin: 2px 0 0;
      color: rgba(11,31,58,0.75);
      font-size: 17px;
      font-weight: 500;
    }

    /* Visual rechts (Video/Thumbnail größer) */
    .ugc-hero .hero-visual-wrap{
      display:flex;
      justify-content: center;
      align-items: center;
    }
    .ugc-hero .hero-visual{
      width: min(435px, 92%);
      background: rgba(255,255,255,0.75);
      border: 1px solid rgba(13,110,253,0.12);
      box-shadow: 0 18px 46px rgba(0,0,0,0.075);
      border-radius: 12px;
    }
    .ugc-hero .hero-visual img{
      width: 100%;
      height: auto;
      display:block;
      border-radius: 18px;
    }

    /* Mobile tuning */
    @media (max-width: 991px){
      .ugc-hero{ padding: 40px 0 50px; }
      .ugc-hero .hero-visual-wrap{ margin-top: 28px; }
      .ugc-hero .hero-subtitle, .ugc-hero .hero-bullets{ max-width: 100%; }
    }

    @media (max-width: 991px){
      .ugc-hero .hero-title{
        font-size: 2.6rem;
        line-height: 1.06;
      }

      /* Bulletpoints mobil zentriert */
      .ugc-hero .hero-bullets{
        justify-items: start;
        text-align: left;
        margin-left: auto;
        margin-right: auto;
        width: fit-content; 
      }
      .ugc-hero .hero-bullets li{ width: fit-content; }

      .ugc-hero .cta-wrap{ padding-top: 22px; }

      .ugc-hero .counter-client-img{
        width: 52px;
        height: 52px;
      }
    }

    /* =========================
       IN-HERO MINI CARDS MARQUEE
       ========================= */

    /* mehr Abstand über dem Slider (mobile + desktop) */
    .ugc-hero .hero-mini-cards{
      width: 100%;
      margin-top: 45px; /* default */
    }
    @media (min-width: 992px){
      .ugc-hero .hero-mini-cards{
        margin-top: 50px; /* desktop: mehr Abstand */
      }
    }

    .ugc-hero .mini-cards-marquee{
      position: relative;
      overflow: hidden;
      -webkit-mask-image: linear-gradient(to right, transparent 0%, #000 10%, #000 90%, transparent 100%);
              mask-image: linear-gradient(to right, transparent 0%, #000 10%, #000 90%, transparent 100%);
    }

    .ugc-hero .mini-cards-track{
      display: flex;
      align-items: center;
      gap: 18px;                 /* default gap */
      width: max-content;
      will-change: transform;
      animation: heroMiniCardsScroll var(--marquee-duration, 28s) linear infinite;
      padding: 8px 0;
    }

    /* “Schwebende” White Cards */
    .ugc-hero .single-mini-card{
      border-radius: 10px !important;
      background: rgba(255,255,255,0.92);
      border: 1px solid rgba(13,110,253,0.10);
      padding: 12px 16px;
      min-height: 56px;
      white-space: nowrap;
      transform: translateZ(0);
      transition: transform .15s ease, box-shadow .15s ease;
      flex: 0 0 auto;
      box-shadow: none !important;
    }
    .ugc-hero .single-mini-card:hover{
      transform: translateY(-2px);
      box-shadow: none !important;
    }

    /* Desktop: breiter + fixe Breite */
    @media (min-width: 992px){
      .ugc-hero .single-mini-card{
        width: 260px;            /* fixe Breite */
        padding: 12px 16px;      /* etwas großzügiger */
        max-height: 66px;
      }
      .ugc-hero .mini-cards-track{
        gap: 25px;               /* desktop: weiter auseinander */
      }
    }

    .ugc-hero .mini-card-img img{
      height: 40px;
      width: auto;
      display: block;
      flex: 0 0 auto;
    }

    .ugc-hero .mini-card-text{
      font-size: 16px;
      padding-left: 12px;
    }

    @keyframes heroMiniCardsScroll{
      from { transform: translateX(0); }
      to   { transform: translateX(calc(-1 * var(--marquee-distance, 600px))); }
    }

    @media (prefers-reduced-motion: reduce){
      .ugc-hero .mini-cards-track{ animation: none; }
    }

    /* Mobile: weiter auseinander */
    @media (max-width: 768px){
      .ugc-hero .mini-cards-track{ gap: 20px; } /* weiter auseinander auf mobile */
      .ugc-hero .mini-card-img img{ height: 36px; }
      .ugc-hero .single-mini-card{ padding: 11px 14px; min-height: 56px; }
    }

    .ugc-hero .cta-wrap{ padding-top: 37px; }          /* default / desktop */
    @media (max-width: 767px){
      .ugc-hero .cta-wrap{ padding-top: 30px; }        /* mobile */
    }

    @media (min-width: 992px){
  .ugc-hero .row{ --bs-gutter-x: 5rem; } /* z.B. 64px */
}
.custom-modal-width {
    max-width: 400px;
    width: 90%;
    margin: 0 auto;
}
.custom-modal-width-2 {
    max-width: 360px;
    width: 90%;
    margin: 0 auto;
}
  </style>

  <div class="modal fade" id="germany_modal" tabindex="-1" aria-labelledby="stepDescModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered custom-modal-width-2">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="stepDescModalLabel">Deutschlandweit verfügbar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="popupContent" class="pb-2" style="text-align: left;">
                                                        <b>Wir bieten unsere Dienstleistungen nicht nur in {{ $cityTitle }}, sondern deutschlandweit an.</b>
                                                        <br><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;"> Vor-Ort-Check in {{ $cityTitle }}</span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;">Vor-Ort-Check deutschlandweit</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

  <div class="container">
    <div class="row align-items-center g-4">
      <!-- LEFT -->
      <div class="col-lg-6 text-center text-lg-start">

        <h1 class="hero-title">
          Gebrauchtwagen-Check in {{ $cityTitle }}
        </h1>

        <p class="hero-subtitle">
          Wir fahren zu dem Fahrzeug, das du kaufen möchtest, und prüfen es direkt vor Ort.
        </p>

        <ul style="padding-top: 3px" class="hero-bullets">
          <li class="d-flex align-items-center gap-2">
            <span class="bullet-check">✓</span>
            <span>&nbsp;Vor-Ort-Check in {{ $cityTitle }}</span>
            <a href="#germany_modal" data-bs-toggle="modal" data-bs-target="#germany_modal">
                <i class="fa-regular fa-circle-info"
                  style="font-size: 1.1rem; color: inherit; cursor: pointer;"></i>
            </a>
        </li>
          <li><span class="bullet-check">✓</span> Zustandsbericht nach TÜV-Richtlinien</li>
          <li><span class="bullet-check">✓</span> Wertermittlung inkl. Kostenprognose</li>
        </ul>

        <!-- Button -->
        <div class="cta-wrap pb-3 d-flex flex-column align-items-center align-items-lg-start justify-content-center">
          <a href="{{route('booking.option-page')}}" class="btn btn-secondary" style="border-radius: 5px; padding: 18px 50px">
            Fahrzeug prüfen lassen
            <span class="btn-icon ms-2">
              <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px;" alt="weiter zur Buchung">
            </span>
          </a>
        </div>

        <!-- Counter -->
        <div class="hero-counter-wrapper d-flex justify-content-center justify-content-lg-start align-items-center gap-3">
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
            <p class="counter-info">zufriedene Kunden</p>
          </div>
        </div>

      </div>

      <!-- RIGHT -->
      <div class="col-lg-6">
        <div class="hero-visual-wrap">
          <div class="hero-visual">
            <img src="/hero-report.png" alt="Carspector Gebrauchtwagen Check">
          </div>
        </div>

        <!-- ✅ MOBILE: Slider direkt unter dem Video -->
        <div class="hero-mini-cards d-block d-lg-none">
          <div class="mini-cards-marquee" data-speed="26">
            <div class="mini-cards-track">
              <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
                <span class="mini-card-img"><img src="assets/imgs/hpslider/1.png" alt="tüv gebrauchtwagencheck"></span>
                <span class="mini-card-text">TÜV-Richtlinien</span>
              </div>
              <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
                <span class="mini-card-img"><img src="assets/imgs/hpslider/2.png" alt="zertifiziert"></span>
                <span class="mini-card-text">Qualifizierte Prüfer</span>
              </div>
              <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
                <span class="mini-card-img"><img src="assets/imgs/hpslider/3.png" alt="adac gebrauchtwagencheck"></span>
                <span class="mini-card-text">ADAC-Richtlinien</span>
              </div>
              <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
                <span class="mini-card-img"><img src="assets/imgs/hpslider/4.png" alt="deutschlandweit vor ort"></span>
                <span class="mini-card-text">Deutschlandweit</span>
              </div>
              <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
                <span class="mini-card-img"><img src="assets/imgs/hpslider/5.png" alt="entspannt und einfach"></span>
                <span class="mini-card-text">Schnelle Buchung</span>
              </div>
              <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
                <span class="mini-card-img"><img src="assets/imgs/hpslider/6.png" alt="garantie zertifikat"></span>
                <span class="mini-card-text">Prüfungsgarantie</span>
              </div>
              <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
                <span class="mini-card-img"><img src="assets/imgs/hpslider/7.png" alt="alle fahrzeugklassen"></span>
                <span class="mini-card-text">Alle Fahrzeugklassen</span>
              </div>
              <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
                <span class="mini-card-img"><img src="assets/imgs/hpslider/8.png" alt="kundenservice kontakt"></span>
                <span class="mini-card-text">24/7 Kundenservice</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- ✅ DESKTOP: Slider unter der gesamten Hero-Row, aber im gleichen Hintergrund -->
    <div class="hero-mini-cards d-none d-lg-block">
      <div class="mini-cards-marquee" data-speed="30">
        <div class="mini-cards-track">
          <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
            <span class="mini-card-img"><img src="assets/imgs/hpslider/1.png" alt="tüv gebrauchtwagencheck"></span>
            <span class="mini-card-text">TÜV-Richtlinien</span>
          </div>
          <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
            <span class="mini-card-img"><img src="assets/imgs/hpslider/2.png" alt="zertifiziert"></span>
            <span class="mini-card-text">Qualifizierte Prüfer</span>
          </div>
          <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
            <span class="mini-card-img"><img src="assets/imgs/hpslider/3.png" alt="adac gebrauchtwagencheck"></span>
            <span class="mini-card-text">ADAC-Richtlinien</span>
          </div>
          <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
            <span class="mini-card-img"><img src="assets/imgs/hpslider/4.png" alt="deutschlandweit vor ort"></span>
            <span class="mini-card-text">Deutschlandweit</span>
          </div>
          <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
            <span class="mini-card-img"><img src="assets/imgs/hpslider/5.png" alt="entspannt und einfach"></span>
            <span class="mini-card-text">Schnelle Buchung</span>
          </div>
          <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
            <span class="mini-card-img"><img src="assets/imgs/hpslider/6.png" alt="garantie zertifikat"></span>
            <span class="mini-card-text">Prüfungsgarantie</span>
          </div>
          <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
            <span class="mini-card-img"><img src="assets/imgs/hpslider/7.png" alt="alle fahrzeugklassen"></span>
            <span class="mini-card-text">Alle Fahrzeugklassen</span>
          </div>
          <div class="single-mini-card d-flex align-items-center fw-semibold text-black">
            <span class="mini-card-img"><img src="assets/imgs/hpslider/8.png" alt="kundenservice kontakt"></span>
            <span class="mini-card-text">24/7 Kundenservice</span>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- ✅ JS: Auto-Clone für Endlos-Schleife -->
  <script>
    (function(){
      function initMarquee(marquee){
        const track = marquee.querySelector('.mini-cards-track');
        if (!track) return;

        if (marquee.dataset.inited === "1") return;
        marquee.dataset.inited = "1";

        const build = () => {
          // Remove old clones if any
          const kids = Array.from(track.children);
          const originalCount = parseInt(marquee.dataset.originalCount || kids.length, 10);

          if (kids.length > originalCount) {
            kids.slice(originalCount).forEach(n => n.remove());
          }
          marquee.dataset.originalCount = originalCount;

          // Measure original width
          const originalWidth = track.scrollWidth;

          // Clone once (no manual duplication needed)
          Array.from(track.children).forEach(el => track.appendChild(el.cloneNode(true)));

          // Travel distance = original width
          marquee.style.setProperty('--marquee-distance', originalWidth + 'px');

          // Duration via data-speed seconds
          const speed = parseFloat(marquee.getAttribute('data-speed') || '28');
          marquee.style.setProperty('--marquee-duration', speed + 's');
        };

        build();
        window.addEventListener('load', build, { once: true });
      }

      function initAll(){
        document.querySelectorAll('.ugc-hero .mini-cards-marquee').forEach(initMarquee);
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAll);
      } else {
        initAll();
      }

      let resizeTimer;
      window.addEventListener('resize', function(){
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function(){
          document.querySelectorAll('.ugc-hero .mini-cards-marquee').forEach(m => {
            m.dataset.inited = "0";
            initMarquee(m);
          });
        }, 180);
      });
    })();
  </script>
</section>


        
      





<style>
  /* Wrapper in hero – kein eigener Hintergrund */
  .ugc-hero .hero-mini-cards{
    width: 100%;
  }

  /* Marquee Container */
  .ugc-hero .mini-cards-marquee{
    position: relative;
    overflow: hidden;
    /* leichte Fades an den Seiten -> schöner Übergang */
    -webkit-mask-image: linear-gradient(to right, transparent 0%, #000 10%, #000 90%, transparent 100%);
            mask-image: linear-gradient(to right, transparent 0%, #000 10%, #000 90%, transparent 100%);
  }

  .ugc-hero .mini-cards-track{
    display: flex;
    align-items: center;
    gap: 14px;
    width: max-content;
    will-change: transform;
    animation: heroMiniCardsScroll var(--marquee-duration, 28s) linear infinite;
    padding: 6px 0;
  }

  /* “Schwebende” White Cards */
  .ugc-hero .single-mini-card{
    border-radius: 10px !important;
    background: rgba(255,255,255,0.92);
    border: 1px solid rgba(13,110,253,0.10);
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    padding: 12px 16px;
    min-height: 56px;
    white-space: nowrap;
    transform: translateZ(0);
    transition: transform .15s ease, box-shadow .15s ease;
  }
  .ugc-hero .single-mini-card:hover{
    transform: translateY(-2px);
    box-shadow: 0 14px 36px rgba(0,0,0,0.10);
  }

  .ugc-hero .mini-card-img img{
    height: 40px;
    width: auto;
    display: block;
  }

  .ugc-hero .mini-card-text{
    font-size: 16px;
    padding-left: 12px;
  }

  @keyframes heroMiniCardsScroll{
    from { transform: translateX(0); }
    to   { transform: translateX(calc(-1 * var(--marquee-distance, 600px))); }
  }

  @media (prefers-reduced-motion: reduce){
    .ugc-hero .mini-cards-track{ animation: none; }
  }

  /* Mobile: etwas kompakter */
  @media (max-width: 768px){
    .ugc-hero .mini-card-img img{ height: 36px; }
    .ugc-hero .single-mini-card{ padding: 11px 14px; min-height: 52px; }
  }
</style>

<!-- ✅ JS: macht automatisch eine saubere Endlos-Schleife (ohne manuelles Copy/Paste) -->
<script>
  (function(){
    function initMarquee(marquee){
      const track = marquee.querySelector('.mini-cards-track');
      if (!track) return;

      // Prevent double-init
      if (marquee.dataset.inited === "1") return;
      marquee.dataset.inited = "1";

      // 1) Originalbreite messen
      const originalWidth = track.scrollWidth;

      // 2) Einmal automatisch klonen, damit ein nahtloser Loop möglich ist
      //    (keine manuelle Doppelung im HTML nötig)
      const items = Array.from(track.children);
      items.forEach(el => track.appendChild(el.cloneNode(true)));

      // 3) Distanz = Originalbreite (bis die zweite Kopie exakt an der Startposition ist)
      marquee.style.setProperty('--marquee-distance', originalWidth + 'px');

      // 4) Speed via data-speed (sekunden) steuerbar
      const speed = parseFloat(marquee.getAttribute('data-speed') || '28');
      marquee.style.setProperty('--marquee-duration', speed + 's');
    }

    function initAll(){
      document.querySelectorAll('.ugc-hero .mini-cards-marquee').forEach(initMarquee);
    }

    // Init
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initAll);
    } else {
      initAll();
    }

    // Re-init bei Resize (falls Fonts/Bilder laden und Breiten sich ändern)
    let resizeTimer;
    window.addEventListener('resize', function(){
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function(){
        document.querySelectorAll('.ugc-hero .mini-cards-marquee').forEach(m => {
          // Reset + neu aufbauen
          m.dataset.inited = "0";
          const track = m.querySelector('.mini-cards-track');
          if (!track) return;
          // Entferne evtl. alte Klone: wir lassen nur die erste Hälfte stehen
          const kids = Array.from(track.children);
          const half = Math.ceil(kids.length / 2);
          kids.slice(half).forEach(n => n.remove());
          initMarquee(m);
        });
      }, 180);
    });
  })();
</script>

<section style="padding: 45px 0;">
  <div class="container">
    <div class="row justify-content-center awards-row">
      <div class="col-12 text-center">
        <h3 class="fw-bold" style="color: var(--primary); padding-bottom: 35px">Unsere Auszeichnungen</h3>
      </div>

      <!-- Awards -->
      <div class="col-6 col-md-auto d-flex justify-content-center mb-2 mb-md-0">
        <img src="/award-1.png" alt="Auszeichnung 1" class="img-fluid award-img">
      </div>

      <div class="col-6 col-md-auto d-flex justify-content-center mb-2 mb-md-0">
        <img src="/award-2.png" alt="Auszeichnung 2" class="img-fluid award-img">
      </div>

      <div class="col-12 col-md-auto d-flex justify-content-center">
        <img src="/award-3.png" alt="Auszeichnung 3" style="max-height: 95px" class="img-fluid award-img">
      </div>
    </div>
  </div>
</section>

<style>
  .award-img{
    max-height: 85px;
    width: auto;
    object-fit: contain;
    display: block;
  }

  @media (min-width: 768px){
    .awards-row{
      --bs-gutter-x: 10rem; /* angenehmer Abstand */
      --bs-gutter-y: 0;
    }
  }
</style>














<!-- 
       <section class="section-bg used-car-check-section">
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
</section> -->


   <!------- HowDoesWork Section Start ------->
       <section class="how-does-work-section section-padding section-bg" style="padding: 60px 20px">
  <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
    <h3 style="color: var(--primary); margin-bottom: 60px">So funktioniert der Gebrauchtwagencheck in {{ $cityTitle }}</h3>
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
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">Zustandsbericht erhalten</div>
        </div>
        <p style="font-size: 16px; color: #333;">Du erhältst einen detaillierten Zustandsbericht inklusive Fotodokumentation und Kaufempfehlung.</p>
      </div>
    </div>
    <a href="{{route('booking.option-page')}}" class="btn btn-secondary mt-5" style="border-radius: 5px; padding: 15px 60px">
          Jetzt starten
          <span class="btn-icon ms-2">
            <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px;" alt="weiter zur Buchung">
          </span>
        </a> 
  </div>
</section>

<section class="used-car-video-section">
  <style>
    .used-car-video-section {
      background-color: var(--primary);
      padding: 60px 0;
    }

    .used-car-video-section h3,
    .used-car-video-section p {
      color: #fff;
    }

    .used-car-video-section .video-btn {
      display: inline-block;
      background: var(--secondary);
      color: white;
      padding: 15px 30px;
      border-radius: 5px;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .used-car-video-section .video-btn:hover {
      background: rgba(255,255,255,0.9);
      color: var(--primary);
    }

    .used-car-video-section .ucc-thumb img {
      max-width: 90%; 
      border-radius: 6px;
      box-shadow: 0 8px 22px rgba(0,0,0,0.25);
    }

    @media (min-width: 768px) {
      .used-car-video-section .text-col {
        padding-right: 10px;
      }

      .used-car-video-section .video-col {
        padding-left: 10px;
      }
    }

    @media (max-width: 767px) {
      .used-car-video-section .ucc-thumb {
        margin-top: 45px; 
      }
    }
  </style>

  <div class="container">
    <div class="row align-items-center">
      
 
      <div class="col-md-6 text-center text-md-start">
        <h3 class="fw-bold mb-3">
          Mach’s dir einfach!
        </h3>
        <p class="mb-4" style="font-size:17px">
          Schau dir unser Erklärvideo an und erfahre, wie der Carspector-Gebrauchtwagencheck abläuft.
        </p>

        <a
          href="https://www.youtube.com/watch?v=ycUuMn1oaHI"
          target="_blank"
          rel="noopener"
          class="video-btn"
        >
          <i style="padding-right: 5px" class="fa-solid fa-circle-play"></i>
          Erklärvideo ansehen
        </a>
      </div>

    
      <div class="col-md-6 text-center text-md-end">
        <div class="ucc-thumb">
          <a
            href="https://www.youtube.com/watch?v=ycUuMn1oaHI"
            target="_blank"
            rel="noopener"
          >
            <img
              src="/thumbnail_yt.png"
              alt="Gebrauchtwagencheck Erklärungsvideo"
            >
          </a>
        </div>
      </div>

    </div>
  </div>
</section> 




<section class="checklist-section py-5">
  <style>
    /* Scoped Styles für Prüfpunkte – neues Design */

    .checklist-section .section-title {
      font-size: 1.9rem;
      letter-spacing: -0.4px;
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

    .checklist-section .feature-card{
      display: grid;
      grid-template-columns: auto 1fr;
      gap: 14px;
      align-items: start;
      background: #ffffff;
      border: 1px solid rgba(148,163,184,.45);
      border-radius: 14px;
      box-shadow: 0 4px 14px rgba(15,23,42,.04);
      padding: 14px 16px;
    }

    .checklist-section .icon-wrap{
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

    .checklist-section .cta-wrapper {
      padding-top: 24px;
    }
    .checklist-section .cta-btn {
      border-radius: 999px;
      padding: 11px 34px;
      font-weight: 600;
      display:inline-flex;
      align-items:center;
      gap: 8px;
    }

     .checklist-section .section-subtitle {
      max-width: 720px;
      margin: 0 auto;
      font-size: 0.98rem;
      color: #6b7280;
    }
  </style>

  <div class="container">
     <h3 class="section-title fs-3 fw-bold text-primary text-center mb-3">
      Deine Vorteile unseres Gebrauchtwagen-Checks in {{ $cityTitle }}
    </h3>
    <p class="section-subtitle text-center mb-5">
      Du erhältst einen kompletten Check vom Profi – inklusive Zustandsbericht, Technikprüfung, Probefahrt
      und klarer Einschätzung, ob sich der Kauf wirklich lohnt.
    </p>
    <div class="features-grid" role="list" aria-label="Leistungsübersicht">
      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-file-certificate"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Umfassender Zustandsbericht
          </h5>
          <p class="feature-text">Du erhältst einen professionellen Zustandsbericht mit objektiver Bewertung des gesamten Fahrzeugs.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-folder-open"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Dokumentenprüfung
          </h5>
          <p class="feature-text">Wir prüfen alle Fahrzeugdokumente wie Zulassungsbescheinigung, Fahrzeugbrief und Serviceheft auf Vollständigkeit und Authentizität.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-paint-roller"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Lackschichtmessung & Analyse
          </h5>
          <p class="feature-text">Durch die Messung der Lackschichtdicke erkennen wir, ob das Fahrzeug nachlackiert wurde, was auf mögliche Unfallschäden hinweist.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-solid fa-car-burst"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Prüfung auf Unfallschäden
          </h5>
          <p class="feature-text">Wir setzen spezielle Prüfmethoden und visuelle Inspektionen ein, um versteckte Unfallschäden am Fahrzeug zu identifizieren und zu bewerten.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-gear"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Bauteil & Fahrwerks-Analyse
          </h5>
          <p class="feature-text">Wir analysieren die Bauteile und das Fahrwerk, um technische Defekte und Verschleiß zu identifizieren. Dabei werden sämtliche relevanten Komponenten geprüft.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-tire"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Reifen & Bremsen
          </h5>
          <p class="feature-text">Wir prüfen Profiltiefe, Alter und Zustand der Reifen sowie den Verschleißgrad der Bremsen. So lassen sich sicherheitsrelevante Mängel frühzeitig erkennen.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-engine"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Motor- & Elektronikdiagnose
          </h5>
          <p class="feature-text">Mit modernen Diagnosegeräten prüfen wir den Zustand des Motors und der elektronischen Systeme und identifizieren mögliche Fehler oder Probleme.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-solid fa-tablet-rugged"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            OBD2-Fehlerspeicher
          </h5>
          <p class="feature-text">Über die OBD2-Schnittstelle lesen wir sämtliche gespeicherten Fehlercodes aus, die auf Probleme in Motorsteuerung, Abgasanlage oder anderen Systemen hinweisen können.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-gauge"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Kilometerstand-Check
          </h5>
          <p class="feature-text">Wir prüfen den Kilometerstand auf Plausibilität, um Manipulationen zu erkennen und die tatsächliche Laufleistung des Fahrzeugs sicherzustellen.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-car-tunnel"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Umfassende Probefahrt
          </h5>
          <p class="feature-text">Wir führen eine Probefahrt durch, um das Fahrverhalten, die Lenkung, die Bremsen und andere fahrrelevante Systeme des Fahrzeugs unter realen Bedingungen zu testen.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-steering-wheel"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Prüfung des Innenraums
          </h5>
          <p class="feature-text">Wir untersuchen den Innenraum auf Sauberkeit, Abnutzung und Funktionalität aller Bedienelemente und Ausstattungsteile, um Komfort und Qualität zu bewerten.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-camera"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Fotodokumentation
          </h5>
          <p class="feature-text">Wir erstellen eine umfassende Fotodokumentation, die den Zustand des Fahrzeugs visuell festhält und für spätere Referenzen zur Verfügung steht.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-heart"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Individuelle Wünsche
          </h5>
          <p class="feature-text">Selbstverständlich berücksichtigen wir deine persönlichen Wünsche und Vorstellungen und prüfen alle relevanten Details.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-circle-euro"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Ermittlung des Marktwertes
          </h5>
          <p class="feature-text">Wir ermitteln den aktuellen Marktwert basierend auf Zustand, Kilometerstand, Ausstattung und aktuellen Marktdaten.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-calculator"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Ermittlung von Minderwerten und Folgekosten
          </h5>
          <p class="feature-text">Wir fassen alle Mängel zusammen und ziehen daraus Schlüsse über mögliche Minderwerte und anstehende Kosten.</p>
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
            Wir nutzen die FIN, um die Fahrzeughistorie, Inspektionen, Kilometerstand, technische Angaben und Ausstattungscodes zu überprüfen. 
            <a href="#fin-model" data-bs-toggle="modal" class="text-decoration-underline" aria-label="Mehr Infos zur FIN-Abfrage">Mehr Infos</a>
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
          <p class="feature-text">Du erhältst eine strukturierte Aufstellung aller festgestellten Mängel und Argumente, die dir eine fundierte und selbstsichere Preisverhandlung ermöglichen.</p>
        </div>
      </article>

      <article class="feature-card" role="listitem">
        <div class="icon-wrap"><i class="fa-regular fa-badge-check"></i></div>
        <div>
          <h5 class="feature-title">
            <i class="fa-solid fa-circle-check check-icon"></i>
            Experteneinschätzung
          </h5>
          <p class="feature-text">Unsere erfahrenen Fachleute geben eine detaillierte Einschätzung des Fahrzeugzustands und bieten dir wertvolle Ratschläge.</p>
        </div>
      </article>
    </div>

   
    <div style="padding-top: 50px" class="pb-3 d-flex flex-column align-items-center justify-content-center">
      <a href="{{route('booking.option-page')}}" class="btn btn-secondary" style="border-radius: 5px; padding: 15px 50px">
        Jetzt Check beauftragen
        <span class="btn-icon ms-2">
          <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px;" alt="weiter zur Buchung">
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

  
<section class="testimonial-section section-bg">
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

        
<section class="check-from-home-section  py-5">
  <div class="container">
    <div class="row align-items-center flex-column-reverse flex-md-row">
      
      <!-- Text -->
      <div class="col-md-6 text-center text-md-start">
        <h3 class="fw-bold text-primary mb-4">Auto bequem von zuhause<span class="d-none d-lg-inline"><br></span> aus prüfen lassen</h3>

        <p class="pb-1 text-primary" style="font-size: 17px;">
          Kein Weg zum Fahrzeug nötig – unsere Experten übernehmen das für dich. Wir führen einen detaillierten Gebrauchtwagencheck durch und senden dir im Anschluss einen detaillierten Zustandsbericht, aussagekräftige Bilder und eine professionelle Einschätzung direkt per E-Mail.
        </p>
        <a href="{{route('booking.option-page')}}" class="btn btn-secondary mt-4" style="border-radius: 5px; padding: 15px 40px">
          Jetzt starten
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
      
         

         <section style="padding-bottom: 70px" class="pt-5 section-bg">
        <div class="container">

        <div class="container">
                <h3 class="section-title fs-3 fw-bold text-primary text-center pb-2 mb-2">Preise
                </h3>

            <details style="border-radius: 5px !important" class="info-box-toggle">
                <summary>Was ist der Unterschied zwischen XL und XXL?</summary>
                <p>
                    Neben dem umfassenden Gebrauchtwagencheck der XL-Variante beinhaltet die XXL-Variante zusätzlich eine Marktwertanalyse, eine Kalkulation bevorstehender Kosten sowie festgestellter Minderwerte. Darüber hinaus erfolgt eine Abfrage der Fahrgestellnummer, die detaillierte Informationen zu Fahrzeugausstattung, digitalen Servicenachweisen und gegebenenfalls vorhandenen Unfallberichten liefert.
                </p>
            </details>


        <div class="row pt-2 g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-car-side"></i>
                                </div>
                                Auto/ PKW
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">299 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('gebrauchtwagencheck') }}" style="border-radius: 5px !important" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-van-shuttle"></i>
                                </div>
                                Transporter
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('transporter') }}" style="border-radius: 5px !important" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <img src="/oldtimer_car.png" alt="Oldtimer" width="30" height="30">
                                </div>
                                Oldtimer
                            </div>
                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('oldtimer') }}" style="border-radius: 5px !important" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <img src="/sportscar.png" alt="Sportwagen" width="32" height="32">
                                </div>
                                Sportwagen
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('sportwagen') }}" style="border-radius: 5px !important" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                 <div class="icon-circle">
                                    <img src="/rv_car.png" alt="Wohnmobil" width="30" height="30">
                                </div>
                                Wohnmobil
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">449 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('wohnmobil') }}" style="border-radius: 5px !important" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-bolt"></i>
                                </div>
                                Elektro/ Hybrid
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="https://carspector.de/elektro" style="border-radius: 5px !important" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        
    </section>

        

        <!------- SafetyBanner Section End ------->

        <section class="faq-section">
            <div class="container">
                <h3 class="section-title fs-3 fw-bold text-primary text-center pb-5 mb-2">Fragen zum Gebrauchtwagencheck in {{ $cityTitle }}
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
                                                        Carspector ist deutschlands <b>führender Anbieter von Gebrauchtwagenchecks</b> für Fahrzeuge aller Klassen. Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile. Du kannst mit nur wenigen Klicks schnell und unkompliziert deinen persönlichen Gebrauchtwagencheck deutschlandweit buchen.
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
                                                        Wir arbeiten mit qualifizierten Prüfern in ganz Deutschland zusammen, um unsere Leistungen flächendeckend anbieten zu können. Unser Team besteht ausschließlich aus geprüften und professionellen Kfz-Experten, die Fachwissen und Erfahrung mitbringen.
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
                                                      Du <b>buchst und bestätigst den Fahrzeug-Check</b> ganz einfach online über unsere Website über <a href="https://carspector.de/booking-step-1">dieses Formular</a>.
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
                                                        <b>Wir prüfen Fahrzeuge aller Klassen.</b> Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile. Falls dein gewünschtes Fahrzeug nicht dabei ist, kontaktiere gerne unseren <a href="{{route('kontakt')}}">Support</a>.
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
                                                            data-bs-target="#faq-five" aria-expanded="false" aria-controls="faq-five">
                                                        Was beinhaltet eine Fahrzeugprüfung?
                                                    </button>
                                                </h2>
                                                <div id="faq-five" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                Die konkreten Prüfungsinhalte <b>richten sich nach der jeweiligen Fahrzeugklasse</b> und können während des Buchungsprozesses oder auf der entsprechenden Produktseite eingesehen werden.
                                                <br><br>
                                                Unabhängig von der Fahrzeugklasse umfasst jede Prüfung unter anderem folgende Punkte: Kontrolle der Fahrzeugdokumente und Historie, Begutachtung des Lack- und Karosseriezustands, Überprüfung von Motor und Elektronik, Prüfung des Kilometerstands sowie eine Bewertung des Innenraums – und vieles mehr.
                                                <br><br>
                                                <a href="{{route('gebrauchtwagencheck')}}">Prüfungsinhalte für einen PKW im Detail ansehen.</a>
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
                                            <div style="margin-bottom: 15px !important; border-radius: 5px" class="accordion-item">
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
                    <a href="{{route('faq')}}" style="border-radius: 5px !important" class="btn btn-primary faq-btn">
                        Vollständiges FAQ ansehen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="auto vor dem kauf checken lassen"></span>
                    </a>
                </div>
            </div>
        </section>

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
                        <a href="{{route('booking.option-page')}}" style="width: 350px; border-radius: 5px !important" class="nextStep btn btn-secondary ">
                                Jetzt Fahrzeug-Check buchen
                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

       
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

            // Ab 500px anzeigen, bis 500px vor dem Ende verstecken
            if (scrollY > 900 && scrollY < scrollHeight - viewportHeight - 1000) {
                stickyBar.classList.add("visible");
            } else {
                stickyBar.classList.remove("visible");
            }
        });

        </script>

       
<div class="modal fade" id="tuv_modal" tabindex="-1" aria-labelledby="tuvModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-width">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center gap-2" id="tuvModalLabel">
                    <i class="fas fa-shield-alt text-primary"></i>
                     TÜV Rheinland Partner
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            
<div class="modal-body pb-1" style="text-align: left;">

    <!-- Bild + Hauptsatz direkt nebeneinander -->
    <div class="d-flex align-items-center mb-2">
        <img src="assets/imgs/hpslider/1.png"
             alt="TÜV Rheinland Partner – Gebrauchtwagenbewertung"
             style="max-height: 65px">

        <p class="fs-6 mb-0" style="padding-left:15px">
            Carspector arbeitet als <strong>offizieller Partner</strong> mit
            dem <strong>TÜV Rheinland</strong> zusammen.
        </p>
    </div>

    <!-- Erklärungstext darunter -->
    <p style="padding-bottom: 20px; padding-top: 11px" class="fs-6">
        Die Fahrzeug-Checks und Gutachten erfolgen in Zusammenarbeit
        mit dem TÜV Rheinland.
    </p> 

    <!-- Vorteile -->
    <div style="
    background-color: #f2f7fc; border: 1px solid #b6d9ff;
    padding: 15px;
    border-radius: 8px">
    <ul style="margin: 0;" class="list-unstyled">
        <li class="d-flex align-items-start gap-2 mb-2">
            <i style="margin-top: 2px" class="fas text-success fa-check-circle"></i>
            <span style="font-size: 0.95rem">TÜV Rheinland Gutachten-Partner</span>
        </li>
        <li class="d-flex align-items-start gap-2">
            <i style="margin-top: 2px" class="fas text-success fa-check-circle"></i>
            <span style="font-size: 0.95rem" >Objektive und unabhängige Fahrzeugbewertung</span>
        </li>
    </ul>
</div>
<div style="padding-bottom: 15px"></div>

    <!-- Transparenz-Hinweis 
    <div class="alert alert-warning" style="font-size: 14px;">
        <strong>Hinweis:</strong>
         In Ausnahmefällen erfolgt die Bearbeitung des Auftrags nicht durch den TÜV Rheinland, sondern durch einen gleichwertig qualifizierten Partner.
    </div> -->

</div>

        </div>
    </div>
</div>
    </main>
@endsection
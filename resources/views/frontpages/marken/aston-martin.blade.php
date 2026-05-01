@extends('mainpages.master-layout')
@section('title', 'Gebrauchtwagencheck für Aston Martin – zertifiziert & vor Ort')
@section('meta_description', 'Jetzt Gebrauchtwagencheck für Aston Martin buchen – zertifizierte Vor-Ort-Prüfung mit über 150 Prüfpunkten, Fotodokumentation & Marktwertanalyse.')
@section('header')

@endsection
@section('content')
<base href="/">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Gebrauchtwagencheck Aston Martin",
  "description": "Wir fahren zu dem Fahrzeug, das du kaufen möchtest, und prüfen es direkt vor Ort!",
  "url": "https://carspector.de/marken/gebrauchtwagencheck-aston-martin",
  "provider": {
    "@type": "Organization",
    "name": "Carspector",
    "telephone": "+49 211 92325550",
    "url": "https://carspector.de"
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "Gebrauchtwagencheck Aston Martin",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": 4.7,
    "reviewCount": 515
  }
}
</script>

<div class="modal fade" id="germany_modal" tabindex="-1" aria-labelledby="stepDescModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="stepDescModalLabel">Deutschlandweit verfügbar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="popupContent" class="pb-2" style="text-align: left;">
                                                        <b>Wir bieten unsere Dienstleistungen nicht nur in Aachen, sondern deutschlandweit an.</b>
                                                        <br><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-check" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;"> Vor-Ort-Check in Aachen</span>
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

                                  
<style>
  /* Standardmäßig ausblenden */

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

  /* Auf Mobilgeräten (bis zu 768px) anzeigen */

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
    background-position: center;
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

    .btndk {
      width: 375px !important;
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


@media(max-width: 768px) {
    .tlemain {
        font-size: 45px !important;
        letter-spacing: -1.6px !important;
    }
}

/* Für größere Bildschirme */
@media (min-width: 991px) { /* Bootstrap Breakpoint für größere Geräte */
    .header {
        height: 87px; /* Kleinere Höhe */
    }


    .header .header-wrapper {
    margin-top: -10px; /* verschiebt den Wrapper nach oben */
}

    .header .header-logo img {
        height: 40px; /* Falls das Logo zu groß ist */
    }
}
@media (min-width: 768px) {

    .offcanvas-title {
      padding-top: 8px !important;
    }
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
        padding-bottom: 27px !important;
    }
}

#germany_modal .modal-dialog {
    max-width: 360px;
    width: 100%;
    margin: auto; 
}

/* Mobile-Styling */
@media (max-width: 360px) {
    #germany_modal .modal-dialog {
        max-width: 85%;
        width: 85%;
        margin: auto; 
    }
}

#germany_modal .modal-dialog-centered {
    display: flex;
    align-items: center;
    justify-content: center; 
    min-height: 100vh; 
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

@media(min-width: 575px) {
    .btn-main-1 {
        min-width: 350px !important;
    }
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

.header-nav > ul { gap: 70px; }
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
  .header .header-logo img { height: 32px !important; margin-bottom: 3px !important}
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






/* ===== Desktop: "Leistungen"-Dropdown per Hover als Kachel-Grid ===== */
@media (min-width: 992px) {

  /* --- Nav-Item mit Dropdown --- */
  .header-nav-item.has-dropdown {
    position: relative;
  }

  .header-nav-item.has-dropdown > .header-nav-link {
    background: transparent;
    border: 0;
    cursor: pointer;
  }

  .header-nav-item.has-dropdown > .header-nav-link:focus {
    outline: none;
    box-shadow: none;
  }

  /* Pfeil neben "Leistungen" – größer, dreht bei Hover */
  .header-nav-item.has-dropdown .nav-triangle {
    display: inline-block;
    margin-left: 0.4rem;
    border-top: 7px solid currentColor;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    transition: transform 0.2s ease-out;
    transform-origin: center center;
    transform: rotate(0deg); /* Grundzustand */
  }

  .header-nav-item.has-dropdown:hover .nav-triangle {
    transform: rotate(180deg);
  }

  /* --- Dropdown-Panel --- */
  .header-nav-item.has-dropdown > .header-submenu {
    position: absolute;
    top: 200%;
    left: -200px; /* leicht nach links verschoben */
    margin: 0;
    margin-top: 2px; /* kleiner Abstand zur Nav */
    padding: 0.25rem 1.1rem 1.2rem; /* oben sehr wenig Padding */
    list-style: none;

    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 14px 40px rgba(15, 23, 42, 0.22);
    z-index: 1100;

    /* breites Menü */
    min-width: 1100px;
    max-width: 1150px;

    /* Kachel-Grid */
    display: none; /* Standard: verstecken */
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 0.5rem 0.5rem; /* kleiner vertikaler Abstand */
  }

  /* Sichtbar, solange man über dem Menüpunkt ODER dem Dropdown ist */
  .header-nav-item.has-dropdown:hover > .header-submenu,
  .header-nav-item.has-dropdown > .header-submenu:hover {
    display: grid;
  }

  /* --- Kacheln / Einträge --- */
  .header-submenu li {
    margin: 0;
    padding: 0;
    border: 0;
    height: 100%;
  }

  /* Gruppentitel – praktisch kein Abstand zur ersten Box */
  .header-submenu .menu-group-title {
    grid-column: 1 / -1;
    padding: 0;
    margin: 0 0 0.2rem;
    padding-top: 1rem;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #6b7280;
    font-weight: 600;
    opacity: 1;
  }

  /* Divider zwischen Gruppen */
  .header-submenu .menu-divider {
    grid-column: 1 / -1;
    margin: 0.05rem 0 0.25rem;
    border-top: 1px solid rgba(15, 23, 42, 0.08);
  }

  /* Kachel-Links – flacher, aber schön card-artig */
  .header-submenu a {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    width: 100%;
    height: 100%;
    box-sizing: border-box;

    padding: 0.7rem 0.95rem;
    border-radius: 8px;
    background-color: #ffffff;
    border: 1px solid rgba(148, 163, 184, 0.5);   /* neutral grau */
    text-decoration: none;
    color: #111827;
    font-size: 1.01rem;
    line-height: 1.4;

    min-height: 80px;   /* flachere Boxen */

    box-shadow: 0 5px 12px rgba(15, 23, 42, 0.06);
    transition:
      box-shadow 0.15s ease-out,
      transform 0.12s ease-out,
      background-color 0.15s ease-out,
      color 0.12s ease-out,
      border-color 0.15s ease-out;

    border-bottom: 1px solid rgba(148, 163, 184, 0.5);
  }

  .header-submenu a:hover {
    background-color: #f9fafb;
    border-color:var(--secondary) !important;  /* kein Grün */
    color: var(--primary);
    transform: translateY(-1px);
    box-shadow: 0 10px 24px rgba(15, 23, 42, 0.18);
    text-decoration: none;
  }

  .header-submenu li:last-child a {
    border-bottom: 1px solid rgba(148, 163, 184, 0.5);
  }

  /* Icon links mit hellblauem Hintergrund + var(--primary) */
  .header-submenu .menu-icon {
    width: 35px;
    height: 35px;
    flex: 0 0 35px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin-top: 2px;
    font-size: 0.9rem;

    background-color: #e0f2fe;  /* hellblau */
    border-radius: 999px;
    color: var(--primary);
  }

  /* Textblock in der Kachel */
  .header-submenu .menu-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
  }

  .header-submenu .menu-title {
    font-weight: 550;
    font-size: 1.01rem;
  }

  .header-submenu .menu-desc {
    font-size: 0.86rem;
    color: #6b7280;
    line-height: 1.35;
    font-weight: 500;
  }

  /* Badge rechts */
  .header-submenu .badge-inline {
    margin-left: auto;
    font-size: 11px;
    padding: 3px 8px;
    border-radius: 999px;
    background-color: var(--secondary);
    color: #fff;
    white-space: nowrap;
  }

  .header-submenu a {
    border-bottom: 1px solid rgba(148, 163, 184, 0.5) !important;
  }

  .header-submenu-right li {
    border-bottom: 1px solid rgba(148, 163, 184, 0.5) !important;
  }

  .header-submenu a.kachel-highlight {
    border-color: var(--secondary) !important;
  }

  .header-nav-item.has-dropdown {
    position: relative; /* hast du eh schon, aber zur Sicherheit */
  }

  /* Unsichtbare Brücke zwischen Nav-Button und Dropdown */
  .header-nav-item.has-dropdown::after {
    content: "";
    position: absolute;
    left: -40px;      /* links etwas überstehen */
    right: -40px;     /* rechts etwas überstehen */
    top: 100%;        /* direkt unter dem Button starten */
    height: 25px;     /* Höhe = Abstand bis zum Menü + Puffer */
    /* kein background, kein border -> komplett unsichtbar */
  }
}



/* ===== Desktop: "Leistungen"-Dropdown per Hover als Kachel-Grid ===== */
@media (min-width: 992px) {

  /* --- Nav-Item mit Dropdown --- */
  .header-nav-item.has-dropdown {
    position: relative;
  }

  .header-nav-item.has-dropdown > .header-nav-link {
    background: transparent;
    border: 0;
    cursor: pointer;
  }

  .header-nav-item.has-dropdown > .header-nav-link:focus {
    outline: none;
    box-shadow: none;
  }

  /* Pfeil neben "Leistungen" – größer, dreht bei Hover */
  .header-nav-item.has-dropdown .nav-triangle {
    display: inline-block;
    margin-left: 0.4rem;
    border-top: 7px solid currentColor;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    transition: transform 0.2s ease-out;
    transform-origin: center center;
    transform: rotate(0deg); /* Grundzustand */
  }

  .header-nav-item.has-dropdown:hover .nav-triangle {
    transform: rotate(180deg);
  }

  /* --- Dropdown-Panel --- */
  .header-nav-item.has-dropdown > .header-submenu {
    position: absolute;
    top: 200%;
    left: -200px; /* leicht nach links verschoben */
    margin: 0;
    margin-top: 2px; /* kleiner Abstand zur Nav */
    padding: 0.25rem 1.1rem 1.2rem; /* oben sehr wenig Padding */
    list-style: none;

    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 14px 40px rgba(15, 23, 42, 0.22);
    z-index: 1100;

    /* breites Menü */
    min-width: 1100px;
    max-width: 1150px;

    /* Kachel-Grid */
    display: none; /* Standard: verstecken */
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 0.5rem 0.5rem; /* kleiner vertikaler Abstand */
  }

  /* Sichtbar, solange man über dem Menüpunkt ODER dem Dropdown ist */
  .header-nav-item.has-dropdown:hover > .header-submenu,
  .header-nav-item.has-dropdown > .header-submenu:hover {
    display: grid;
  }

  /* --- Kacheln / Einträge --- */
  .header-submenu li {
    margin: 0;
    padding: 0;
    border: 0;
    height: 100%;
  }

  /* Gruppentitel – praktisch kein Abstand zur ersten Box */
  .header-submenu .menu-group-title {
    grid-column: 1 / -1;
    padding: 0;
    margin: 0 0 0.2rem;
    padding-top: 1rem;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #6b7280;
    font-weight: 600;
    opacity: 1;
  }

  /* Divider zwischen Gruppen */
  .header-submenu .menu-divider {
    grid-column: 1 / -1;
    margin: 0.05rem 0 0.25rem;
    border-top: 1px solid rgba(15, 23, 42, 0.08);
  }

  /* Kachel-Links – flacher, aber schön card-artig */
  .header-submenu a {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    width: 100%;
    height: 100%;
    box-sizing: border-box;

    padding: 0.7rem 0.95rem;
    border-radius: 8px;
    background-color: #ffffff;
    border: 1px solid rgba(148, 163, 184, 0.5);   /* neutral grau */
    text-decoration: none;
    color: #111827;
    font-size: 1.01rem;
    line-height: 1.4;

    min-height: 80px;   /* flachere Boxen */

    box-shadow: 0 5px 12px rgba(15, 23, 42, 0.06);
    transition:
      box-shadow 0.15s ease-out,
      transform 0.12s ease-out,
      background-color 0.15s ease-out,
      color 0.12s ease-out,
      border-color 0.15s ease-out;

    border-bottom: 1px solid rgba(148, 163, 184, 0.5);
  }

  .header-submenu a:hover {
    background-color: #f9fafb;
    border-color:var(--secondary) !important;  /* kein Grün */
    color: var(--primary);
    transform: translateY(-1px);
    box-shadow: 0 10px 24px rgba(15, 23, 42, 0.18);
    text-decoration: none;
  }

  .header-submenu li:last-child a {
    border-bottom: 1px solid rgba(148, 163, 184, 0.5);
  }

  /* Icon links mit hellblauem Hintergrund + var(--primary) */
  .header-submenu .menu-icon {
    width: 35px;
    height: 35px;
    flex: 0 0 35px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin-top: 2px;
    font-size: 0.9rem;

    background-color: #e0f2fe;  /* hellblau */
    border-radius: 999px;
    color: var(--primary);
  }

  /* Textblock in der Kachel */
  .header-submenu .menu-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
  }

  .header-submenu .menu-title {
    font-weight: 550;
    font-size: 1.01rem;
  }

  .header-submenu .menu-desc {
    font-size: 0.86rem;
    color: #6b7280;
    line-height: 1.35;
    font-weight: 500;
  }

  /* Badge rechts */
  .header-submenu .badge-inline {
    margin-left: auto;
    font-size: 11px;
    padding: 3px 8px;
    border-radius: 999px;
    background-color: var(--secondary);
    color: #fff;
    white-space: nowrap;
  }

  .header-submenu a {
    border-bottom: 1px solid rgba(148, 163, 184, 0.5) !important;
  }

  .header-submenu-right li {
    border-bottom: 1px solid rgba(148, 163, 184, 0.5) !important;
  }

  .header-submenu a.kachel-highlight {
    border-color: var(--secondary) !important;
  }

  .header-nav-item.has-dropdown {
    position: relative; /* hast du eh schon, aber zur Sicherheit */
  }

   /* Unsichtbare Brücke zwischen Nav-Button und Dropdown */
  .header-nav-item.has-dropdown::after {
    content: "";
    position: absolute;
    left: -40px;      /* links etwas überstehen */
    right: -40px;     /* rechts etwas überstehen */
    top: 100%;        /* direkt unter dem Button starten */
    height: 25px;     /* Höhe = Abstand bis zum Menü + Puffer */
    /* kein background, kein border -> komplett unsichtbar */
  }
}

@media (min-width: 992px) and (max-width: 1500px) {
  .header-nav-item.has-dropdown > .header-submenu {

    max-width: 900px;
    min-width: 900px; 
  }

  .header-nav-item.has-dropdown > .header-submenu a {
    max-width: 350px;
    margin: 0 auto;
  }
}

.header-nav > ul { gap: 62px; }
.header-nav-link {
  font-size: 16px !important; 
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
    <div style="border: 1px solid var(--primary)"></div>

   <div id="stickyBar">
        <div id="stickyButton" onclick="window.location.href='https://carspector.de/booking-step-1';">Aston Martin Check buchen</div>
    </div>
    
    <section class="mob-pad hero-section section-padding bg-primary pb-mob" style="position: relative">
    <div class="desk-pic background-overlay"></div>

    <!-- Header innerhalb der Section -->
    <header class="header position-relative z-3">
        <div  class="header-wrapper index-header d-flex align-items-center justify-content-center justify-content-md-between mx-auto position-relative">
            <!-- header-logo -->
            <div class="header-logo">
            <a href="{{url('/')}}" class="logo d-inline-flex align-items-center gap-3"><img
                    src="logo-slogan-white.png" alt=""></a>
        </div>
            <!-- header-logo-end -->

            <!-- header-right -->
            <div class="header-end align-items-center d-none d-xl-flex">
                <div class="header-nav">
                    <ul class="d-flex align-items-center justify-content-end">
                        <li class="header-nav-item position-relative has-dropdown">
  <button
      type="button"
      class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center bg-transparent border-0 p-0"
      data-leistungen-toggle
      style="letter-spacing: 0.25px">
    Leistungen
    <span class="nav-triangle"></span>
  </button>

  <ul class="header-submenu">
    <!-- Gruppe: Fahrzeug-Checks -->
    <li class="menu-group-title">Fahrzeug-Checks</li>

    <li>
      <a class="kachel-highlight" href="{{route('gebrauchtwagencheck')}}">
        <span class="menu-icon"><i class="fa-solid fa-car-side"></i></span>
        <span class="menu-text">
          <span class="menu-title">Auto/ PKW Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für PKW und Kleintransporter</span>
        </span>
        <span class="badge-inline">Beliebt</span>
      </a>
    </li>

    <li>
      <a href="{{route('transporter')}}">
        <span class="menu-icon"><i class="fa-solid fa-van-shuttle"></i></span>
        <span class="menu-text">
          <span class="menu-title">Transporter-Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für Transporter bis 5,5 t Gesamtgewicht</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('oldtimer')}}">
        <span class="menu-icon"><img src="/oldtimer_car.png" alt="Oldtimer" width="23" height="23"></span>
        <span class="menu-text">
          <span class="menu-title">Oldtimer-Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für Oldtimer mit einem Alter von über 30 Jahren</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('sportwagen')}}">
        <span class="menu-icon"><img src="/sportscar.png" alt="Sportwagen" width="23" height="23"></span>
        <span class="menu-text">
          <span class="menu-title">Sportwagen-Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für sportliche Autos ab 300 PS</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('wohnmobil')}}">
        <span class="menu-icon"> <img src="/rv_car.png" alt="Wohnmobil" width="21" height="21"></span>
        <span class="menu-text">
          <span class="menu-title">Wohnmobil-Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für Wohnmobile und Camper-Ausbauten</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('kaufbegleitung')}}">
        <span class="menu-icon"> <img src="/handshake_kaufbegleitung.png" alt="Kaufbegleitung" width="21" height="21"></span>
        <span class="menu-text">
          <span class="menu-title">Kaufbegleitung</span>
          <span class="menu-desc">Wir begleiten dich bei Besichtigung und prüfen das Fahrzeug in deiner Anwesenheit</span>
        </span>
      </a>
    </li>

    <li><hr class="menu-divider"></li>

    <!-- Gruppe: Zusatzleistungen -->
    <li class="menu-group-title">Zusatzleistungen</li>

    <li>
      <a class="kachel-highlight" href="https://carspector.de/fin-abfrage">
        <span class="menu-icon"><i class="fa fa-search"></i></span>
        <span class="menu-text">
          <span class="menu-title">FIN-Abfrage</span>
          <span class="menu-desc">Fahrzeughistorie über die Fahrgestellnummer (FIN) prüfen</span>
        </span>
        <span class="badge-inline">Neu</span>
      </a>
    </li>

    <li>
      <a href="{{route('fahrzeuglieferung')}}">
        <span class="menu-icon"><i class="fa-solid fa-truck"></i></span>
        <span class="menu-text">
          <span class="menu-title">Fahrzeug-Transport</span>
          <span class="menu-desc">Europaweite, versicherte Transporte unverbindlich anfragen</span>
        </span>
      </a>
    </li>

    <!-- <li>
      <a target="_blank" href="/Kfz-Kaufvertrag.pdf">
        <span class="menu-icon"><i class="fa fa-file-contract"></i></span>
        <span class="menu-text">
          <span class="menu-title">Kfz-Kaufvertrag (PDF)</span>
          <span class="menu-desc">Vorlage für einen sicheren Kaufvertrag.</span>
        </span>
      </a>
    </li> -->

    <li>
      <a href="{{route('kaufabwicklung')}}">
        <span class="menu-icon"><i class="fa-solid fa-file-signature"></i></span>
        <span class="menu-text">
          <span class="menu-title">Kaufabwicklung</span>
          <span class="menu-desc">Unterstützung bei Vertragsabschluss, Unterlagen, Zahlung & Übergabe</span>
        </span>
      </a>
    </li>

    
    <li><hr class="menu-divider"></li>

    <!-- Gruppe: Inserat-Services -->
    <li class="menu-group-title">Inserat-Checks</li>

    <li>
      <a href="{{route('inseratcheck')}}">
        <span class="menu-icon"><i class="fa-solid fa-clipboard-check"></i></span>
        <span class="menu-text">
          <span class="menu-title">Inserat-Check</span>
          <span class="menu-desc">Prüfung deines gewünschten Inserats auf Auffälligkeiten und Risiken</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('inseratvergleich')}}">
        <span class="menu-icon"><i class="fa-solid fa-list-ul"></i></span>
        <span class="menu-text">
          <span class="menu-title">Inserat-Vergleich</span>
          <span class="menu-desc">Vergleich mehrerer Inserate inkl. Analyse und Einschätzung</span>
        </span>
      </a>
    </li>

    <!-- <li>
      <a href="{{route('wertermittlung')}}">
        <span class="menu-icon"><i class="fa fa-balance-scale"></i></span>
        <span class="menu-text">
          <span class="menu-title">Inserat-Wertermittlung</span>
          <span class="menu-desc">Realistische Bewertung von Preis & Zustand.</span>
        </span>
      </a>
    </li> -->
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
                        <a href="{{route('ueber-uns')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Über uns</a>
                    </li> 
                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('kontakt')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Kontakt</a>
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

            <!-- mobile menu start 
            <a class="login-btn d-lg-none bg-transparent border-0 p-0 text-white position-absolute top-50 end-0 translate-middle-y me-5 rounded-circle"
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
  class="burger-menu-btn d-xl-none bg-transparent border-0 p-0 text-white position-absolute top-50 end-0 translate-middle-y me-3"
  type="button"
  data-bs-toggle="offcanvas"
  data-bs-target="#offcanvasRight"
  aria-controls="offcanvasRight"
>
  <div class="burger-line top"></div>
  <div class="burger-line middle"></div>
  <div class="burger-line bottom"></div>
</button>

<div class="mobile-menu d-xl-none">
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
                                    <a href="{{route('fahrzeuglieferung')}}">Fahrzeug-Transport</a>
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
                    <li class="mobile-nav-item"><a href="{{route('ueber-uns')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Über uns</a></li> 
                    <li class="mobile-nav-item"><a href="{{route('kontakt')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Kontakt</a></li>
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
    <!-- Header Ende -->

    <div class="pad-top container">
        <div class="hero-wrapper mx-auto text-center">
            <h1 style="letter-spacing: -2px; font-size: 75px; padding-bottom: 20px" class="pad-para-f tlemain section-title text-white fw-bold">Gebrauchtwagen-Check für <span class="animate-check" style="color: var(--secondary)">Aston Martin</span></h1>
                
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
                        <li class="thopt d-flex align-items-center gap-2 text-center ms-md-2" style="color: var(--secondary); margin-top: 3px;">
                            <i class="fas fa-check" style="font-size: 20px;"></i>
                            <span style="font-size: 17px; letter-spacing: 0.1px" class="para-space text-white">Wertermittlung & Kostenprognose</span>
                        </li>
                    </ul>


                    <div class="main-hero-btns d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 gap-md-4 pb-lg-5 pb-4 mb-lg-2 mb-3">
    <a href="https://carspector.de/Carspector_Mustergutachten.pdf?" target="_blank" style="border-radius: 5px !important" class="btn btn-outline main-hero-btn-1">Demo-Gutachten ansehen</a>
    <a href="{{route('booking.option-page')}}" style="border-radius: 5px !important" class="btn btn-secondary main-hero-btn-1">
        Fahrzeug prüfen lassen
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
              Wir fahren zu deinem gewünschten <b>Aston Martin</b> und führen einen <b>umfassenden Gebrauchtwagencheck</b> vor Ort durch,
              damit du über den technischen und optischen Zustand bestens informiert bist und eine fundierte Kaufentscheidung treffen kannst.
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
       <section class="how-does-work-section section-bg section-padding" style="padding: 60px 20px">
  <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
    <h3 style="color: var(--primary); margin-bottom: 60px">So läuft unser Gebrauchtwagencheck für Aston Martin ab</h3>
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
    <a href="{{route('booking.option-page')}}" class="btn btn-secondary mt-5" style="border-radius: 5px; padding: 15px 50px">
          Jetzt starten
          <span class="btn-icon ms-2">
            <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px;" alt="weiter zur Buchung">
          </span>
        </a>
  </div>
</section>


<section class="pad-top-inhalt steps-area pb-4 mb-4 pb-md-0">
                <form action="{{route('booking.step-3',['type'=>('')])}}" method="GET">
                    <input type="hidden" name="type" value="Auto/ PKW">
                <div class="container">

                        <div class="step-wrapper">
                            <!-- step-item -->
                            <div class="step-item">
       
 <div class="section-head text-center pb-4 mb-4">
                        <h3 class="section-title fs-3 text-primary pb-2">Prüfungsinhalte: Gebrauchtwagencheck Aston Martin</h3>

                    </div>


                                <div class="pt-desk step-item-content pricing-select">
                                    <div class="check-wrapper">
                                        <nav>
                                            <div class="nav row" id="nav-tab" role="tablist">
                                                <div class="col-6">
                                                    <div class="check-nav">
                                                        <input type="radio" id="check1" name="option" value="1" checked>
                                                        <label for="check1" class="active" id="nav-home-tab" data-bs-toggle="tab"
                                                               data-bs-target="#nav-home" type="button" role="tab"
                                                               aria-controls="nav-home" aria-selected="true">
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
                                                                        <span class="ratting-text">4.8 (537)</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="check-nav">
                                                        <span class="check-badge">Empfohlen</span>
                                                        <input value="2" type="radio" id="check2" name="option">
                                                        <label for="check2" class="" id="nav-profile-tab"
                                                               data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
                                                               role="tab" aria-controls="nav-profile" aria-selected="false">
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
                                                                        <span class="ratting-text">4.8 (1.374)</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                        <div class="tab-content row" id="nav-tabContent">
                                            <div  class="tab-pane fade active show col-md-6" id="nav-home" role="tabpanel"
                                                 aria-labelledby="nav-home-tab" tabindex="0">
                                                <div class="check-content">
                                                    <div class="check-cotnent-body">
                                                        <ul>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                <b>Zertifiziertes Gutachten</b>
                                                            </li>
                                                            <li>
                                                            <span>
                                                                <img src="theme-1/imgs/icons/check.png" alt="">
                                                            </span>
                                                                Dokumentenprüfung

                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Lackschichtmessung & Analyse
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Prüfung auf Unfallschäden
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Bauteil & Fahrwerks-Check
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                    Prüfung von Reifen & Bremsen 
                                                            </li>
                                                            <li> 
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Motor- & Elektronikdiagnose
                                                            </li>
                                                            <li> 
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                OBD2-Fehlerspeicher-Auslese
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Umfassende Probefahrt
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Kilometerstand-Check
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Prüfung des Innenraums
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Fotodokumentation
                                                            </li>
                                                            <li>
                                                                <span><img src="theme-1/imgs/icons/check.png" alt=""></span>
                                                                Individuelle Wünsche
                                                            </li>
                                                                                                                            <li>
                                                                <span><i style="font-size: 1.5rem; color: #D3D3D3" class="fa-sharp-duotone fa-regular fa-xmark"></i></span>
                                                                Verhandlungs-Checkliste
                                                            </li>
                                                            <li>
                                                                <span><i style="font-size: 1.5rem; color: #D3D3D3" class="fa-sharp-duotone fa-regular fa-xmark"></i></span>
                                                                Berechnung anstehender Kosten
                                                            </li>
                                                            <li>
                                                                <span><i style="font-size: 1.5rem; color: #D3D3D3" class="fa-sharp-duotone fa-regular fa-xmark"></i></span>
                                                                Minderwertkalkulation
                                                            </li>
                                                            <li>
                                                                <span><i style="font-size: 1.5rem; color: #D3D3D3" class="fa-sharp-duotone fa-regular fa-xmark"></i></span>
                                                                Ermittlung des Marktwertes
                                                            </li>
                                                            <li>
                                                                    <span>
                                                                        <i style="font-size: 1.5rem; color: #D3D3D3" class="fa-sharp-duotone fa-regular fa-xmark"></i>
                                                                    </span>
                                                                    FIN-Abfrage
                                                                    <a href="#fin-model" data-bs-target="#fin-model" data-bs-toggle="modal">
                                                                        <i style="font-size: 1.3rem; color: var(--primary);"  class="pt-1 fa-regular fa-circle-info"></i>
                                                                    </a>
                                                                </li>

                                                            <!-- <li class="pt-3">
                                                                <a href="{{route('inhalt')}}" style="text-decoration: underline; color: var(--primary)">Detaillierte Inhalte ansehen</a>
                                                            </li>
                                                            <li>
                                                                <span><i style="font-size: 1.5rem; color: var(--primary)" class="fa-regular fa-check-double"></i></span>
                                                                <a href="{{route('inhalt')}}" style="text-decoration: underline; color: var(--primary)">Detaillierte Inhalte ansehen</a>
                                                            </li> -->

                                                        </ul>
                                                    </div>
                                                    <div class="check-cotnent-footer">
                                                        <h6>
                                                        Preis:<b> 299 €</b>
                                                        </h6>
                                                        <p class="pt-1" style="font-size: 15.5px; color: #666">
                                                        inkl. Anfahrt und MwSt.
                                                            <!-- Anfahrt: <span style="text-decoration: line-through; color: #dc3545">30 €</span> 0 €  
                                                            <span style="background-color: var(--secondary); color: white; padding: 2px 5px; border-radius: 3px; margin-left: 5px">SALE</span> -->
                                                        </p>  
                                                        <p style="font-size: 16px; color: black; font-weight: 500; margin-top: 15px; display: flex; align-items: center;">
                                                            <i class="fas fa-check-circle" style="font-size: 16px; color: var(--secondary); margin-right: 8px;"></i>
                                                            Deutschlandweit verfügbar
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  col-md-6" id="nav-profile" role="tabpanel"
                                                 aria-labelledby="nav-profile-tab" tabindex="0">
                                                <div class="check-content">
                                                    <div class="check-cotnent-body">
                                                        <ul>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                <b>Zertifiziertes Gutachten</b>
                                                            </li>
                                                            <li>
                                                            <span>
                                                                <img src="theme-1/imgs/icons/check.png" alt="">
                                                            </span>
                                                                Dokumentenprüfung

                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Lackschichtmessung & Analyse
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Prüfung auf Unfallschäden
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Bauteil & Fahrwerks-Check
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Prüfung von Reifen & Bremsen
                                                            </li>
                                                            <li> 
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Motor- & Elektronikdiagnose
                                                            </li>
                                                            <li> 
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                OBD2-Fehlerspeicher-Auslese
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Umfassende Probefahrt
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Kilometerstand-Check
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Prüfung des Innenraums
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Fotodokumentation
                                                            </li>
                                                            <li>
                                                                <span><img src="theme-1/imgs/icons/check.png" alt=""></span>
                                                                Individuelle Wünsche
                                                            </li>
                                                                                                                           <li>
                                                                <span><img src="theme-1/imgs/icons/check.png" alt=""></span>
                                                                Verhandlungs-Checkliste
                                                            </li>
                                                            <li> 
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Berechnung anstehender Kosten
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Minderwertkalkulation
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                                       alt=""></span>
                                                                Ermittlung des Marktwertes
                                                            </li>
                                                            <li>
                                                            <span><img src="theme-1/imgs/icons/check.png"
                                                            alt=""></span>
                                                                    FIN-Abfrage
                                                                    <a href="#fin-model" data-bs-target="#fin-model" data-bs-toggle="modal">
                                                                        <i style="font-size: 1.3rem; color: var(--primary);"  class="pt-1 fa-regular fa-circle-info"></i>
                                                                    </a>
                                                                </li>
 
                                                        </ul>
                                                    </div>
                                                    <div class="check-cotnent-footer">
                                                        <h6>
                                                        Preis:<b> 349 €</b>
                                                        </h6>
                                                        <p class="pt-1" style="font-size: 15.5px; color: #666">
                                                        inkl. Anfahrt und MwSt.
                                                            <!-- Anfahrt: <span style="text-decoration: line-through; color: #dc3545">30 €</span> 0 €  
                                                            <span style="background-color: var(--secondary); color: white; padding: 2px 5px; border-radius: 3px; margin-left: 5px">SALE</span> -->
                                                        </p>  
                                                        <p style="font-size: 16px; color: black; font-weight: 500; margin-top: 15px; display: flex; align-items: center;">
                                                            <i class="fas fa-check-circle" style="font-size: 16px; color: var(--secondary); margin-right: 8px;"></i>
                                                            Deutschlandweit verfügbar
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <a href="{{route('inhalt')}}"><p style="color: var(--primary); text-decoration:underline; font-size: 18px" class="pt-5 text-center">Alle Prüfungsinhalte ansehen</p></a> -->
                                        </div>
                                    </div>

                                    <!-- <div style="padding-bottom: 35px" class="text-center">
                                        <a href="{{route('inhalt')}}" style="color: var(--primary); text-decoration:underline; font-size: 17px">Alle Prüfinhalte ansehen</a>
                                    </div> -->



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

                                    <p class="termin-pb fs-6 text-center text-muted">⏱️ Termin innerhalb von 24 – 48h verfügbar</p>
                                    <!-- <p style="padding-top: 10px !important" class="termin-pb fs-6 text-center text-muted">📍 Deutschlandweit</p> -->

                                    <div class="pt-3 pb-3 check-bottom d-flex flex-column align-items-center justify-content-center">
                                        <button type="submit" style="border-radius: 5px" class="btndk nextStep btn btn-secondary ">
                                            Jetzt Aston Martin-Check buchen
                                            <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                        </button>
                                    </div>

                                    <div class="trust-marquee-wrapper">
  <div class="trust-marquee">
    <div class="trust-marquee-inner">
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Gutachten nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Zertifikat</span>
      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
      <span>🛡 Geld-zurück-Garantie</span>
      <span>🧾 Für Privatkunden & Händler geeignet</span>
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Gutachten nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Zertifikat</span>
      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
      <span>🛡 Geld-zurück-Garantie</span>
      <span>🧾 Für Privatkunden & Händler geeignet</span>
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Gutachten nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Zertifikat</span>
      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
      <span>🛡 Geld-zurück-Garantie</span>
      <span>🧾 Für Privatkunden & Händler geeignet</span>
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Gutachten nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Zertifikat</span>
      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
      <span>🛡 Geld-zurück-Garantie</span>
      <span>🧾 Für Privatkunden & Händler geeignet</span>
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Gutachten nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Zertifikat</span>
      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
      <span>🛡 Geld-zurück-Garantie</span>
      <span>🧾 Für Privatkunden & Händler geeignet</span>
    </div>
  </div>
</div>




  





                                </div>
                            </div>
                            <!-- step-item-end -->
                        </div>
                    </div>
                </div>
                </form>
            </section>
            <!------- step-wrapper End ------->



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
                <h5 class="card-title fw-bold mb-1 text-dark">ClAston Martina H.</h5>
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
          <b>Kein Weg zum Fahrzeug nötig</b> – unsere Experten übernehmen das für dich. Wir führen einen detaillierten Gebrauchtwagencheck deines gewünschten Aston Martin durch und senden dir 
          im Anschluss ein <b>zertifiziertes Gutachten, aussagekräftige Bilder und eine professionelle Einschätzung</b> direkt per E-Mail.
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
  <img src="/vonzuhause.png" alt="Auto von Zuhause prüfen lassen"
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
                                    <img src="/handshake_kaufbegleitung.png" alt="Kaufbegleitung" width="28" height="28">
                                </div>
                                Kaufbegleitung
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">329 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">379 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('kaufbegleitung') }}" style="border-radius: 5px !important" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        
    </section>

        
<section class="faq-section">
  <div class="container">
    <h3 class="section-title fs-3 fw-bold text-primary text-center pb-5 mb-2">
      Fragen zum Gebrauchtwagencheck für Aston Martin
    </h3>

    <div class="faq-accordion mx-auto">
      <div class="accordion accordion-flush" id="accordionFlushExample">
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

<script>
  const faqs = [
  {
    question: "Was ist Carspector?",
    answer: `Carspector ist Deutschlands <b>führender Anbieter für professionelle Gebrauchtwagenchecks</b> – unabhängig, transparent und deutschlandweit verfügbar. 
             Wir prüfen Fahrzeuge aller Klassen: Autos/PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile. 
             Mit nur wenigen Klicks kannst du deinen <b>Gebrauchtwagencheck online buchen</b> – schnell, sicher und unkompliziert.`
  },
  {
    question: "Wie funktioniert Carspector genau?",
    answer: `<b>Unsere Experten fahren direkt zum Fahrzeugstandort</b> – egal ob privat oder beim Autohaus – und prüfen dein Wunschauto umfassend vor Ort. 
             <br><br>
             Wir arbeiten ausschließlich mit <b>zertifizierten Kfz-Prüfern</b> in ganz Deutschland zusammen, um dir ein professionelles und unabhängiges Gutachten zu garantieren.`
  },
  {
    question: "Wie läuft der Gebrauchtwagencheck ab?",
    answer: `Du <b>buchst deinen Fahrzeug-Check online</b> über <a href="https://carspector.de/booking-step-1">dieses Formular</a>. 
             Danach kontaktieren wir den Verkäufer, vereinbaren einen Termin und führen den Check direkt am Fahrzeug durch. 
             <br><br>
             Anschließend erhältst du <b>einen detaillierten Prüfbericht mit Fotos</b> und einer Einschätzung des Fahrzeugzustands bequem per E-Mail.`
  },
  {
    question: "Welche Fahrzeuge prüft Carspector?",
    answer: `<b>Wir prüfen alle Fahrzeugtypen:</b> PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile. 
             Wenn dein Fahrzeugtyp nicht aufgeführt ist, kontaktiere einfach unseren <a href="{{route('kontakt')}}">Support</a> – wir finden eine Lösung.`
  },
  {
    question: "Prüft Carspector auch Aston Martin?",
    answer: `Ja, selbstverständlich! Unsere <b>zertifizierten Prüfer</b> führen regelmäßig Gebrauchtwagenchecks für <b>Aston Martin</b> durch. 
             So erhältst du eine unabhängige Bewertung über den technischen und optischen Zustand des Aston Martin.`
  },
  {
    question: "Verkäufer: privat und gewerblich?",
    answer: `<b>Ja</b>, wir prüfen Fahrzeuge sowohl von privaten Verkäufern als auch von gewerblichen Anbietern – zum Beispiel aus Autohäusern oder Leasingrückläufen.`
  },
  {
    question: "Was beinhaltet eine Fahrzeugprüfung?",
    answer: `Unsere Fahrzeugprüfung umfasst <b>über 150 Prüfpunkte</b> – unter anderem: Fahrzeughistorie, Lack- und Karosseriezustand, Motor, Elektronik, Bremsen, Innenraum, Kilometerstand und Probefahrt (wenn möglich). 
             <br><br>
             <a href="{{route('gebrauchtwagencheck')}}">Hier findest du alle Prüfpunkte im Detail.</a>`
  },
  {
    question: "Wie viel kostet ein Gebrauchtwagencheck?",
    answer: `Der Preis hängt von der Fahrzeugklasse und dem gewünschten Leistungsumfang ab. 
             Unsere <b>PKW-Checks beginnen ab 299 €</b>. Den genauen Preis siehst du direkt während der Online-Buchung.`
  },
  {
    question: "Wie lange dauert die Prüfung?",
    answer: `Je nach Fahrzeugtyp dauert der Check vor Ort in der Regel <b>zwischen 60 und 120 Minuten</b>. 
             Anschließend werden alle Ergebnisse dokumentiert und ausgewertet, bevor du den Bericht erhältst.`
  },
  {
    question: "Wann erhalte ich das Prüfergebnis?",
    answer: `In der Regel bekommst du dein Ergebnis innerhalb von <b>2–4 Werktagen</b> nach der Prüfung per E-Mail. 
             In Einzelfällen kann es geringfügig länger dauern – etwa wenn wir auf Rückmeldung des Verkäufers warten.`
  },
  {
    question: "Wer führt die Gebrauchtwagenchecks durch?",
    answer: `Unsere Prüfungen werden ausschließlich von <b>zertifizierten Kfz-Meistern oder -Technikern</b> mit langjähriger Erfahrung durchgeführt. 
             Jeder Prüfer wird regelmäßig geschult, um dir maximale Sicherheit und Qualität zu garantieren.`
  },
  {
    question: "Welche Informationen muss ich bei der Buchung angeben?",
    answer: `Wir benötigen <b>Marke, Modell und Standort</b> des Fahrzeugs. 
             Optional kannst du den Link zum Inserat hinzufügen, damit wir uns optimal vorbereiten können. 
             Deine individuellen Wünsche oder Hinweise kannst du ebenfalls direkt im Buchungsformular angeben.`
  },
  {
    question: "Ich habe eine Prüfung gebucht – wie geht es weiter?",
    answer: `Nach der Buchung erhältst du eine Bestätigung per E-Mail inklusive Rechnung und Zugang zu deinem Kundenbereich. 
             Unser Team kontaktiert anschließend den Verkäufer, führt die Prüfung durch und sendet dir das Ergebnis direkt nach Abschluss zu.`
  },
  {
    question: "In welchen Regionen ist Carspector verfügbar?",
    answer: `Wir sind <b>deutschlandweit</b> aktiv – unsere mobilen Prüfer sind in allen Städten und Regionen im Einsatz. 
             Egal, ob das Fahrzeug in Berlin, München oder auf dem Land steht – wir kommen direkt dorthin.`
  }
];


  (function renderFAQ() {
    const accordion = document.getElementById("accordionFlushExample");

    faqs.forEach((item, idx) => {
      const collapseId = `faq-${idx}`;
      const headerId = `heading-${idx}`;

      const wrapper = document.createElement("div");
      wrapper.className = "accordion-item";
      wrapper.style.cssText = "margin-bottom: 15px !important; border-radius: 5px";

      wrapper.innerHTML = `
        <h2 class="accordion-header" id="${headerId}">
          <button class="accordion-button collapsed" type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#${collapseId}"
                  aria-expanded="false"
                  aria-controls="${collapseId}">
            ${item.question}
          </button>
        </h2>
        <div id="${collapseId}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample" aria-labelledby="${headerId}">
          <div class="accordion-body">
            ${item.answer}
          </div>
        </div>
      `;

      accordion.appendChild(wrapper);
    });
  })();
</script>


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


    </main>
@endsection

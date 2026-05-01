@extends('mainpages.master-layout')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<script>
  fbq('track', 'ViewContent');
</script>

<style>
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

    @media (min-width: 991px) {
            .btnwd {
                width: 350px;
            }
        }

        .btnwd {
            max-width: 90%;
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
</style>

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

    <main class="main-area">

    <div id="stickyBar">
        <div id="stickyButton" onclick="window.location.href='https://carspector.de/booking-step-1';">Jetzt buchen</div>
    </div>

    <section class="benefit-banner-section section-bg py-4 py-lg-5">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="content-box" style="flex: 1;">
            <h3 class="section-title fs-3 text-primary pb-2">Vor-Kauf-Check</h3>
            <div class="text-grey pb-2 mb-1">
                <i style="color: #f2d414" class="fa-solid fa-star"></i> 4.8 (2.733)
            </div>
            <p style="max-width: 470px; margin-left: auto; margin-right: auto;">
                Ein zertifizierter Kfz-Experte prüft dein gewünschtes Fahrzeug direkt vor Ort nach unserem detaillierten Leitfaden.
            </p>
            <br>
            <ul class="main-hero-para d-flex flex-column flex-md-row flex-wrap justify-content-center align-items-center gap-1 gap-md-3" 
                        style="list-style-type: none; padding-left: 0; text-align: center;">
                        <li class="thopt d-flex align-items-center gap-2 text-center" style="color: var(--secondary); margin-top: 3px;">
                            <i class="fas fa-check" style="font-size: 20px;"></i>
                            <span style="font-size: 17px; letter-spacing: 0.1px" class="para-space text-black">Deutschlandweit verfügbar</span>
                        </li>
                    </ul>
            <a href="{{route('booking.option-page')}}" class="btnwd nextStep btn btn-secondary mt-4">
                Jetzt buchen
                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="auto pkw gebrauchtwagencheck"></span>
            </a>
        </div>
        <div class="image-box d-none d-xl-block" style="flex: 0.5; text-align: center; margin-left: 20px;">
            <img src="theme-1/imgs/vorteile/main.png" alt="auto pkw gebrauchtwagencheck" style="max-width: 100%; height: 325px; border-radius: 5px;">
        </div>
    </div>
    <div class="image-box d-block d-xl-none pt-4" style="flex: 0.5; text-align: center;">
            <img src="theme-1/imgs/vorteile/main.png" alt="auto pkw gebrauchtwagencheck" style="max-width: 90%; max-height: 315px; border-radius: 5px">
    </div>
</section>


        
        
<section class="checklist-section">
            <div class="container pricing-select">
                <h3 class="section-title fw-bold text-primary text-center pb-5 mb-2">Unser Fahrzeug-Check</h3>

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



            <!------- HowDoesWork Section Start ------->
        <section class="how-does-work-section section-padding section-bg">
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
                    <a href="{{route('booking.option-page')}}" class="btnwd nextStep btn btn-secondary mt-0 mx-auto">
                            Jetzt buchen
                            <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="fahrzeugprüfung vor dem kauf"></span>
                    </a>
                    </div>
                </div>
            </div>
        </section>
        

        <section class="used-car-check-section-3">
            <div class="container">

            <div class="section-head text-center pb-4 mb-3">
                        <h3 class="section-title fs-3 text-primary pb-3">Prüfungsinhalte im Detail</h3>
                        <a href="https://carspector.de/Carspector_Mustergutachten.pdf?" style="border: 1px solid var(--primary); color: var(--primary)" target="_blank" class="btn btn-outline main-hero-btn-1">Demo-Gutachten ansehen</a>
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
                                <h4 class="card-title fw-bold pt-1 pb-2">Bauteil & Fahrwerks-Analyse</h4>
                            </div>
                            <p class="card-para text-black">Wir analysieren die Bauteile und das Fahrwerk, um technische Defekte und Verschleiß zu identifizieren. Dabei werden sämtliche relevanten Komponenten geprüft.</p>
                        </div>
                    </div>

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

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-circle-euro"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Ermittlung des Marktwertes</h4>
                            </div>
                            <p class="card-para text-black">Wir ermitteln den aktuellen Marktwert basierend auf Zustand, Kilometerstand, Ausstattung und aktuellen Marktdaten.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-calculator"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Ermittlung von Minderwerten und Folgekosten</h4>
                            </div>
                            <p class="card-para text-black">Wir fassen alle Mängel zusammen und ziehen daraus Schlüsse über mögliche Minderwerte und anstehende Kosten.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-chart-line"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Ermittlung von Mehrwerten</h4>
                            </div>
                            <p class="card-para text-black">Wir berücksichtigen und kalkulieren eventuell vorhandene Mehrwerte und Wertsteigerungen des Fahrzeugs.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-badge-check"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Experteneinschätzung</h4>
                            </div>
                            <p class="card-para text-black">Unsere erfahrenen Fachleute geben eine detaillierte Einschätzung des Fahrzeugzustands und bieten dir wertvolle Ratschläge.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-heart"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Individuelle Wünsche</h4>
                            </div>
                            <p class="card-para text-black">Selbstverständlich berücksichtigen wir deine persönlichen Wünsche und Vorstellungen und prüfen alle relevanten Details.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-solid fa-ellipsis"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Weiteres folgt</h4>
                            </div>
                            <p class="card-para text-black">Wir arbeiten ständig an unseren Produkten und freuen uns, dir schon bald neue Prüfpunkte und Dienstleistungen vorzustellen.</p>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </section>


        <div
                class="ucc-4-top section-bg section-padding d-flex flex-column flex-md-row justify-content-center align-items-center text-center text-md-start">
                <span class="germany-flag-lg">
                    <img src="assets/imgs/hpslider/4.png" style="height: 115px" alt="Germany Flag">
                </span>

                <h3 class="section-title fs-3 text-primary">Deutschlandweit für dich im Einsatz.</h3>
            </div>

     

        
        <!------- HowDoesWork Section End ------->

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
                                4.8 (2.733) </div>

                                <p class="pt-2 text-primary">
                                    Wir prüfen dein gewünschtes Fahrzeug vor dem Kauf, damit du über den technischen und
                                    optischen Zustand bestens informiert bist und eine <b>fundierte Kaufentscheidung</b>
                                    treffen kannst.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ucc-thumb text-end">
                                <img src="theme-1/imgs/thumbs/used-car-2-thumb.jpg" alt="auto pkw gebrauchtwagen vor dem kauf prüfen checken lassen" style="border-radius: 5px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- UsedCarCheck (2) OnSite Section End ------->

          
        

        <!------- Advantage Section Start ------->
        <section class="advantage-section section-padding section-bg">
            <div class="container">
                <div class="advantage-wrapper">
                    <div class="section-head text-center pb-4 mb-3">
                        <h3 class="section-title fs-3 text-primary pb-1">Deine Vorteile mit unserem Check</h3>

                    </div>
                    <div class="advantage-cards cards-wrapper">
                        <div class="row advantage-cards-row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                        <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                        <img src="assets/imgs/hpslider/4.png" style="height: 50px" alt="gebrauchtwagencheck deutschlandweit">
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
                                    Wir bieten Sicherheit und schützen dich vor unvorhergesehenen Problemen beim Fahrzeugkauf.
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
                    <div class="pt-5 d-flex flex-column align-items-center justify-content-center">
                        <a href="{{route('booking.option-page')}}" style="width: 350px" class="btnwdnextStep btn btn-secondary ">
                                Jetzt buchen
                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!------- Advantage Section End ------->

         

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
                        <a href="{{route('booking.step-2',['type'=>('Auto/ PKW')])}}" style="width: 350px" class="nextStep btn btn-secondary ">
                                Jetzt PKW-Check buchen
                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!------- SafetyBanner Section End ------->



       

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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- Proud Section End ------->


    </main>
@endsection

<script>

document.addEventListener("scroll", function () {
    const stickyBar = document.getElementById("stickyBar");
    const scrollY = window.scrollY || document.documentElement.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight;
    const viewportHeight = window.innerHeight;

    // Ab 500px anzeigen, bis 500px vor dem Ende verstecken
    if (scrollY > 750 && scrollY < scrollHeight - viewportHeight - 750) {
        stickyBar.classList.add("visible");
    } else {
        stickyBar.classList.remove("visible");
    }
});

</script>

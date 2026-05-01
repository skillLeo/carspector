@extends('mainpages.master-layout')
@section('title', 'Carspector | Sportwagen-Check')
@section('meta_description', 'Gebrauchtwagencheck für Sportwagen – unabhängig und mit technischem Fokus auf Leistung, Zustand und Originalität.')
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
    
      @media (max-width: 990px) {
 .pad-top-inhalt {
            padding-top: 20px !important;
        }
      }

      
        .pad-top-inhalt {
            padding-top: 50px;
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

.desktop-only-br {
    display: none;
  }

@media (min-width: 494px) {
  .desktop-only-br {
    display: inline;
  }
}

.card-item {
  border-radius: 10px;
  border: 1px solid rgba(17, 24, 39, 0.05) !important;
  box-shadow:
    0 2px 8px rgba(0, 0, 0, 0.05),
    0 8px 20px rgba(0, 0, 0, 0.08);
  transition: transform .25s ease, box-shadow .25s ease;
}

 .section-bg {
  background: #f2f7fc !important;
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

    <main class="main-area">

        <!------- Page-Header-Area Start ------->
        <section class="benefit-banner-section section-bg py-4 py-lg-5">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="content-box" style="flex: 1;">
                    <h3 class="section-title fs-3 text-primary pb-2">Sportwagen-Check</h3>
                    <div class="text-grey pb-2 mb-1"><i style="color: #f2d414" class="fa-solid fa-star"></i> 4.8 (317)
                    </div>
                    <p style="max-width: 470px; margin-left: auto; margin-right: auto;">
Unsere Experten prüfen deinen gewünschten Sportwagen <br class="desktop-only-br">direkt beim Verkäufer – unabhängig, professionell <br class="desktop-only-br">und nach über 150 Prüfpunkten.
                    </p>
                    <a href="{{route('booking.step-2',['type'=>('sportwagen')])}}" class="btnwd nextStep btn btn-secondary mt-4">
                        Jetzt buchen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                    </a>
                    </div>
                <div class="image-box d-none d-xl-block" style="flex: 0.5; text-align: center; margin-left: 20px;">
                    <img src="theme-1/imgs/vorteile/sportwagen.png" alt="sportwagen check gebrauchtwagen" style="max-width: 100%; height: 315px; border-radius: 5px;">
                </div>
            </div>
            <div class="image-box d-block d-xl-none pt-4" style="flex: 0.5; text-align: center;">
                    <img src="theme-1/imgs/vorteile/sportwagen.png" alt="sportwagen gutachten" style="max-width: 90%; max-height: 315px; border-radius: 5px">
            </div>
        </section>
        <!------- Page-Header-Area End ------->

      <style>

@media (min-width: 991px) {
    .pad-top-pruef {
        padding-top: 5px !important;
    }
}

</style>

<section class="pad-top-inhalt steps-area pb-5 pb-md-5">
                <form action="{{route('booking.step-3',['type'=>('')])}}" method="GET">
                    <input type="hidden" name="type" value="sportwagen">
                <div class="container">
                  
                      
                            <!-- step-item -->
                            <div class="step-item">
       
 <div class="section-head text-center pb-4 mb-3">
                       <h3 style="padding-top: 25px" class="pad-top-pruef section-title fs-3 fw-bold text-primary text-center mb-3">
      Das prüfen wir für dich
    </h3>
    <p style="max-width: 720px;
      margin: 0 auto;
      font-size: 0.98rem;
      color: #6b7280;" class="text-center mb-3"> 
      Du erhältst einen kompletten Check vom Profi – inklusive Zustandsbericht, Technikprüfung, Probefahrt
      und klarer Einschätzung, ob sich der Kauf wirklich lohnt.
    </p>

    </div>


                               <div class="pt-desk step-item-content pricing-select">
                                    <div class="check-wrapper">
                                        <nav>
                                            <div class="nav row" id="nav-tab" role="tablist">
                                                <div class="col-6">
                                                    <div class="check-nav">
                                                        <input type="radio" id="check1" name="option" value="1" checked />
                                                        <label for="check1" class="active" id="nav-home-tab" data-bs-toggle="tab"
                                                               data-bs-target="#nav-home" type="button" role="tab"
                                                               aria-controls="nav-home" aria-selected="true">
                                                            <div class="d-flex align-items-center check-nav-link">
                                                            <span class="ind">
                                                                <span class="dot"></span>
                                                            </span>
                                                                <div class="check-nav-content">
                                                                    <h5>Check XL</h5>
                                                                    <p>Umfassender Sportwagen-Check</p>
                                                                    <div class="rattings">
                                                                    <span class="star">
                                                                    <i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                                    </span>
                                                                        <span class="ratting-text">4.8 (89)</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="check-nav">
                                                        <span class="check-badge">Empfohlen</span>
                                                        <input type="radio" id="check2" name="option" value="2" />
                                                        <label for="check2" class="" id="nav-profile-tab"
                                                               data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
                                                               role="tab" aria-controls="nav-profile" aria-selected="false">
                                                            <div class="d-flex align-items-center check-nav-link">
                                                            <span class="ind">
                                                                <span class="dot"></span>
                                                            </span>
                                                                <div class="check-nav-content">
                                                                    <h5>Check XXL</h5>
                                                                    <p>Umfassender Sportwagen-Check + FIN-Abfrage & Berechnung
                                                                    </p>
                                                                    <div class="rattings">
                                                                    <span class="star">
                                                                    <i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                                    </span>
                                                                        <span class="ratting-text">4.8 (228)</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                        <div class="tab-content row" id="nav-tabContent">
                                            <div class="tab-pane active show fade col-md-6" id="nav-home" role="tabpanel"
                                                 aria-labelledby="nav-home-tab" tabindex="0">
                                                <div class="check-content">
                                                    <div class="check-cotnent-body">
                                                        <ul>
                                                            <li>
                                                                <span><img src="theme-1/imgs/icons/check.png" alt=""></span>
                                                                <b>Prüfung durch Sportwagen-Experten</b>
                                                            </li>
                                                            <li>
                                                                <span><img src="theme-1/imgs/icons/check.png" alt=""></span>
                                                                Sportwagen-Zustandsbericht
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
                                                                Leistungs-Analyse
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
                                            <div class="tab-pane fade col-md-6" id="nav-profile" role="tabpanel"
                                                 aria-labelledby="nav-profile-tab" tabindex="0">
                                                <div class="check-content">
                                                    <div class="check-cotnent-body">
                                                        <ul>
                                                            <li>
                                                                <span><img src="theme-1/imgs/icons/check.png" alt=""></span>
                                                                <b>Prüfung durch Sportwagen-Experten</b>
                                                            </li>
                                                            <li>
                                                                <span><img src="theme-1/imgs/icons/check.png" alt=""></span>
                                                                Sportwagen-Zustandsbericht
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
                                                                Leistungs-Analyse
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
                                                            <span><img src="theme-1/imgs/icons/check.png" alt=">"></span>
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
                                                        Preis:<b> 399 €</b>
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
                                        </div>
                                    </div>



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
                                            Weiter zur Buchung
                                            <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                                        </button>
                                    </div>

                                    <div class="trust-marquee-wrapper">
  <div class="trust-marquee">
    <div class="trust-marquee-inner">
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Prüfung nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Qualifikation</span>
      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
      <span>🛡 Geld-zurück-Garantie</span>
      <span>🧾 Für Privatkunden & Händler geeignet</span>
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Prüfung nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Qualifikation</span>
      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
      <span>🛡 Geld-zurück-Garantie</span>
      <span>🧾 Für Privatkunden & Händler geeignet</span>
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Prüfung nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Qualifikation</span>
      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
      <span>🛡 Geld-zurück-Garantie</span>
      <span>🧾 Für Privatkunden & Händler geeignet</span>
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Prüfung nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Qualifikation</span>
      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
      <span>🛡 Geld-zurück-Garantie</span>
      <span>🧾 Für Privatkunden & Händler geeignet</span>
      <span>✅ Heute schon 45× gebucht</span>
      <span>🕒 Nur noch wenige Termine verfügbar</span>
      <span>📍 Aktiv in ganz Deutschland</span>
      <span>📄 Prüfung nach TÜV-Richtlinien</span>
      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
      <span>💬 Käufer sparen im Schnitt 900 €</span>
      <span>🔧 KFZ-Profis mit Qualifikation</span>
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
   <!------- HowDoesWork Section Start ------->
       <section class="how-does-work-section section-bg section-padding" style="padding: 60px 20px">
  <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
    <h3 style="color: var(--primary); margin-bottom: 60px">In 3 Schritten sicher zum neuen Sportwagen</h3>
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
    <a href="{{route('booking.step-2',['type'=>('sportwagen')])}}" class="btn btn-secondary mt-5" style="border-radius: 5px; padding: 15px 60px">
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
      
      <!-- TEXT -->
      <div class="col-md-6 text-center text-md-start">
        <h3 class="fw-bold mb-3">
          Mach’s dir einfach!
        </h3>
        <p class="mb-4" style="font-size:17px">
          Schau dir unser Erklärvideo an und erfahre, wie der
          Carspector-Gebrauchtwagencheck abläuft.
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

      <!-- VIDEO / THUMB -->
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

        <section class="used-car-check-section-3">
            <div class="container">

            <div class="section-head text-center pb-4 mb-3">
                        <h3 class="section-title fs-3 text-primary pb-1">Prüfungsinhalte im Detail</h3>

                    </div>

                <div class="ucc-3-wrapper">
                    <div class="row g-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                                <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                    <i class="fa-regular fa-file-certificate"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Sportwagen-Zustandsbericht</h4>
                            </div>
                            <p class="card-para text-black">Wir erstellen einen geprüften Sportwagen-Zustandsbericht, der eine professionelle und objektive Bewertung des gesamten Fahrzeugs bietet.</p>
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
                            <p class="card-para text-black">Der Zustandsbericht deckt über 150 spezifische Prüfpunkte ab, um eine gründliche Überprüfung des Fahrzeugs und aller Bauteile zu gewährleisten.</p>
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
                            <i class="fa-regular fa-bolt"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Leistungs-Analyse</h4>
                            </div>
                            <p class="card-para text-black">Wir prüfen die Fahrzeugleistung (PS). Diese Prüfung ermöglicht es uns, genaue Informationen über die Motorleistung des Fahrzeugs bereitzustellen.</p>
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
                            <p class="card-para text-black">Wir nutzen die FIN, um die Fahrzeughistorie, Inspektionen, Kilometerstand, technische Angaben und Ausstattungscodes zu überprüfen.   
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


                    </div>
                </div>
            </div>
        </section>

     <div
                class="ucc-4-top section-bg section-padding d-flex flex-column flex-md-row justify-content-center align-items-center text-center text-md-start">
                <span class="germany-flag-lg">
                    <img src="assets/imgs/hpslider/4.png" style="height: 115px" alt="Germany Flag">
                </span>

                <h3 class="section-title fs-3 text-primary">Deutschlandweit<br>verfügbar</h3>
            </div>

        <!------- HowDoesWork Section Start ------->
        
        <!------- HowDoesWork Section End ------->

        <!------- UsedCarCheck (2) OnSite Section Start ------->
        <section class="used-car-check-section-2 pt-mb-cst">
            <div class="container">
                <div class="ucc-2-wrapper mx-auto">
                    <div class="row flex-column-reverse flex-md-row align-items-center">
                        <div class="col-md-6">
                            <div class="ucc-text p-lg-5 pe-0 text-center text-md-start">
                                <h3 class="section-title fs-3 fw-bold text-primary pb-2">Sportwagen-Check<br>vor Ort
                                </h3>

                                <div class="text-grey pb-2 mb-1 pt-1"><i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                           4.8 (317 Bewertungen) </div>

                                <p class="pt-2 text-primary">
                                    Wir prüfen deinen gewünschten Sportwagen vor dem Kauf, damit du über den technischen und
                                    optischen Zustand bestens informiert bist und eine <b>fundierte Kaufentscheidung</b>
                                    treffen kannst.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ucc-thumb text-end">
                                <img src="theme-1/imgs/thumbs/used-car-2-thumb.jpg" alt="fahrzeugprüfung vor dem kauf" style="border-radius: 5px">
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
                                    Unser Team aus qualifizierten Fahrzeugprüfern ist deutschlandweit für dich im Einsatz.
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
                        <a href="{{route('booking.step-2',['type'=>('sportwagen')])}}" style="width: 350px; border-radius: 5px" class="btnwdnextStep btn btn-secondary ">
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
                            <div style="border-radius: 5px"
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="tüv gebrauchtwagencheck"></span>
                                <p style="font-size: 17px; font-weight: 500">TÜV-Richtlinien</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="border-radius: 5px"
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt="adac gebrauchtwagencheck"></span>

                                <p style="font-size: 17px; font-weight: 500">ADAC-Richtlinien</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="border-radius: 5px"
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="deutschlandweit"></span>

                                <p style="font-size: 17px; font-weight: 500">Deutschlandweit im Einsatz</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="border-radius: 5px"
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="gebrauchtwagencheck zertifiziert"></span>

                                <p style="font-size: 17px; font-weight: 500">Qualifizierte Fahrzeugprüfer</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="border-radius: 5px"
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt="dekra gebrauchtwagencheck"></span>

                                <p style="font-size: 17px; font-weight: 500">Faire Preise</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="border-radius: 5px"
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
                        <a href="{{route('booking.step-2',['type'=>('sportwagen')])}}" style="width: 350px; border-radius: 5px" class="nextStep btn btn-secondary ">
                                Jetzt Sportwagen-Check buchen
                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="gebrauchtwagencheck"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!------- SafetyBanner Section End ------->

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

                <div style="border-radius: 5px" class="proud-wrapper mx-auto shadow-1">
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

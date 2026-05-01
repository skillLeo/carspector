@extends('mainpages.master-layout')
@section('title', 'Carspector | Prüfungsinhalte')
@section('meta_description', 'Erfahre, welche Fahrzeugbereiche wir beim Gebrauchtwagencheck genau prüfen – Technik, Karosserie, Elektronik, Probefahrt & mehr.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<style>
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

        <!------- Page-Header-Area Start ------->
        <section class="benefit-banner-section section-bg">
            <div class="container">
                <div
                    class="benefit-banner-wrapper d-flex flex-column justify-content-center align-items-center text-center mx-auto">
                    <sapn class="ratings-check flex-shrink-0">
                        <i style="font-size: 4rem; color: var(--secondary)" class="fa-solid fa-badge-check"></i>
                    </sapn>
                    <h3 style="font-size: 40px !important" class="section-title fs-2 text-primary mb-0 pb-2">Prüfungsinhalte</h3>
                    <p class="text-base text-grey pb-3 mb-2">Erfahre mehr über unser Angebot.</p>


                    <a href="https://carspector.de/Carspector_Mustergutachten.pdf?" target="_blank" style="color: var(--primary)" class="btn btn-outline benefit-banner-btn">
                        <i class="fa fa-file-alt" style="font-size: 2rem; margin-right: 15px;"></i>
                        Mustergutachten ansehen
                    </a>
                    <br>
                    <a href="{{route('booking.option-page')}}" class="btn btn-secondary benefit-banner-btn">
                        Jetzt buchen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                    </a>
                </div>
            </div>
        </section>
        <!------- Page-Header-Area End ------->

        <section class="used-car-check-section-3">
            <div class="container">

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

                    </div>
                </div>
            </div>
        </section>

        <div class="ucc-4-top  section-bg section-padding d-flex flex-column flex-md-row justify-content-center align-items-center text-center text-md-start">
            <div class="text-center">
                <h3 class="section-title fs-3 text-primary pb-4">Sicherer Autokauf ist so einfach!</h3>
                <div>
                    <a href="{{route('booking.option-page')}}" class="btn btn-secondary benefit-banner-btn">
                        Jetzt buchen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                    </a>
                </div>
            </div>
        </div>

        <section class="used-car-check-section-4">

            <div class="ucc-4-wrapper section-padding">
                <div class="container">
                    <div class="row g-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-circle-euro"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Ermittlung des Marktwertes</h4>
                            </div>
                            <p class="card-para text-black">Nach der Fahrzeuganalyse ermitteln wir einen aktuellen Marktwert basierend auf Zustand, Kilometerstand, Ausstattung und aktuellen Marktdaten.</p>
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
                            <p class="card-para text-black">Selbstverständlich berücksichtigen wir deine persönlichen Wünsche und Vorstellungen und prüfen alle relevanten Details, um deinen Bedürfnissen gerecht zu werden.</p>
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

        <div class="ucc-4-top  section-bg section-padding d-flex flex-column flex-md-row justify-content-center align-items-center text-center text-md-start">
            <div class="text-center">
                <h3 class="section-title fs-3 text-primary pb-2">Zusätzliche Wohnmobil-Check Inhalte:</h3>
            </div>
        </div>

        <section class="used-car-check-section-4">

            <div class="ucc-4-wrapper section-padding">
                <div class="container">
                    <div class="row g-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-solid fa-bed"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Prüfung des Innenraums</h4>
                            </div>
                            <p class="card-para text-black">Überprüfung des gesamten Innenbereichs des Wohnmobils auf Schäden, Sauberkeit und Funktionalität. Dazu gehören Möbel, Polster, Böden und Fenster.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-solid fa-snowflake"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Check aller Zusatzaggregate</h4>
                            </div>
                            <p class="card-para text-black">Kontrolle von zusätzlichen technischen Komponenten wie Klimaanlage, Heizung, Wasserpumpe, und anderen eingebauten Systemen.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-microwave"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Untersuchung von Geräten</h4>
                            </div>
                            <p class="card-para text-black">Test von eingebauten Geräten wie Herd, Kühlschrank, Warmwasserboiler oder Mikrowelle, um deren Funktionsfähigkeit zu überprüfen.</p>
                        </div>
                    </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                <div class="card-item-head">
                                    <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                        <i class="fa-regular fa-umbrella-beach"></i>
                                    </span>
                                    <h4 class="card-title fw-bold pt-1 pb-2">Nutzungstauglichkeit</h4>
                                </div>
                                <p class="card-para text-black">Überprüfung, ob alle Bereiche und Funktionen des Wohnmobils im Alltag problemlos genutzt werden können, z. B. ob Türen, Schränke und Betten sicher und praktisch bedienbar sind.</p>
                            </div>
                        </div>
        


                    </div>
                </div>
            </div>
        </section>

        <div class="ucc-4-top section-padding d-flex flex-column flex-md-row justify-content-center align-items-center text-center text-md-start">
            <div class="text-center">
                <div>
                    <a href="{{route('booking.option-page')}}" class="btn btn-secondary benefit-banner-btn">
                        Jetzt buchen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                    </a>
                </div>
            </div>
        </div>

    </main>
    <!-- =====Main Area End===== -->
    @endsection
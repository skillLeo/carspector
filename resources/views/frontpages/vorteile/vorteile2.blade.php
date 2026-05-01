<style>
    @media screen and (max-width: 678px){
            .you-get-thumb{
                padding-bottom: 50px !important;
            }
        }
</style>

@extends('mainpages.mainlayout')
@section('content')
    <main>

    <section style="padding-top: 25px" class="live-area">
            <div class="container-md">
                <div class="step-cards pt-4 pt-md-6">
                    <div class="row d-flex ">
                    <center><div class="col-lg-4">
                            <div class="bg-white step-card p-3  option-box shadow-1  position-relative rounded-2 pb-3 pb-lg-4 mb-5">
                            <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconoption/car.png" alt="oldtimer prüfung gutachten gebrauchtwagencheck">
                                        </div><p style="text-align: left; font-size: 20px; font-weight: bold; padding-top: 15px">Oldtimer Prüfung</p>
                                </div>

                                <div id="multiCollapseExample2" class="multi-collapse show d-lg-block">
                                    <ul class="mb-4">
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="oldtimer alle marken modelle" height="25px"></span>
                                            Alle Marken und Modelle
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-faq.png" alt="oldtimer prüfung vor dem kauf checken prüfen" height="25px"></span>
                                            Alter > 30 Jahre
                                        </li>

                                    </ul>


                                    <!-- <a href="/Carspector_Mustergutachten.pdf" target="_blank" class="btn btn-outline-primary">Mustergutachten ansehen</a> -->

                                </div>
                                <a href="{{route('index')}}" class="section-btn" style="width: 100%">Jetzt buchen</a>
                    </div>
    </section>



        <section style="padding-top: 25px" class="exam-area position-relative">
            
            <div class="container position-relative">
                
      <div style="padding-bottom: 15px" class="section-heading">
                    <h3>Prüfungsinhalte</h3>
                </div>
                <div class="exam-cards">
                    <div class="row g-lg-5 g-md-4 g-sm-3 pb-4">
                        
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/business-report.png" alt="zertifiziertes oldtimer gutachten">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Zertifiziertes Oldtimer-<br>Gutachten</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir erstellen ein zertifiziertes Oldtimer-Gutachten, das eine professionelle und objektive Bewertung des Fahrzeugs bietet.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/bullet-point.png" alt="150 prüfpunkte check auto">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Mehr als 150 Prüfpunkte</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Das Gutachten deckt über 150 spezifische Prüfpunkte ab, um eine gründliche Überprüfung des Fahrzeugs zu gewährleisten.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/paper.png" alt="dokumentenprüfung">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Dokumentenprüfung</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir prüfen alle Fahrzeugdokumente wie Zulassungsbescheinigung, Fahrzeugbrief und Serviceheft auf Vollständigkeit und Authentizität.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/spray-gun.png" alt="lackschichtmessung analyse lackdicke nachlackierung">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Lackschichtmessung & Analyse</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Durch die Messung der Lackschichtdicke erkennen wir, ob das Fahrzeug nachlackiert wurde, was auf mögliche Unfallschäden hinweist.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/crash.png" alt="überprüfung unfallschäden">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Prüfung auf Unfallschäden</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir setzen spezielle Prüfmethoden und visuelle Inspektionen ein, um versteckte Unfallschäden am Fahrzeug zu identifizieren und zu bewerten.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4" >
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/car-engine.png" alt="motor elektronik diagnose auslesen">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Motor & Elektronikdiagnose</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Mit modernen Diagnosegeräten prüfen wir den Zustand des Motors und der elektronischen Systeme und identifizieren mögliche Fehler oder Probleme.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/download-speed.png" alt="kilometerstand check prüfung tachomanipulation">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Kilometerstand-Check</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir prüfen den Kilometerstand auf Plausibilität, um Manipulationen zu erkennen und die tatsächliche Laufleistung des Fahrzeugs sicherzustellen.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/settings.png" alt="kilometerstand check prüfung tachomanipulation">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">VIN-Abfrage</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir nutzen die VIN, um die Fahrzeuggeschichte, Inspektionen, Tachostand, technische Angaben und Ausstattungscodes zu überprüfen.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/steering-wheel.png" alt="innenraum prüfung interior">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Prüfung des Innenraums</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir untersuchen den Innenraum auf Sauberkeit, Abnutzung und Funktionalität aller Bedienelemente und Ausstattungsteile, um Komfort und Qualität zu bewerten.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/car.png" alt="probefahrt gebrauchtwagencheck">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Probefahrt</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir führen eine Probefahrt durch, um das Fahrverhalten, die Lenkung, die Bremsen und andere fahrrelevante Systeme des Fahrzeugs unter realen Bedingungen zu testen.
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/camera.png" alt="fotodokumentation bilder fotos videos zustand bericht mängel">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Fotodokumentation</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Wir erstellen eine umfassende Fotodokumentation, die den Zustand des Fahrzeugs visuell festhält und für spätere Referenzen zur Verfügung steht.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/money-bag.png" alt="kilometerstand check prüfung tachomanipulation">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Ermittlung des Marktwertes</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Nach der Fahrzeuganalyse ermitteln wir einen aktuellen Marktwert basierend auf Zustand, Kilometerstand, Ausstattung und aktuellen Marktdaten.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/calculator.png" alt="kilometerstand check prüfung tachomanipulation">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Ermittlung von Minderwerten und Folgekosten</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Wir fassen alle Mängel zusammen und ziehen daraus Schlüsse über mögliche Minderwerte und anstehende Kosten.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/medal.png" alt="experten meinung autokauf einschätzung">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Experteneinschätzung</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Unsere erfahrenen Fachleute geben eine detaillierte Einschätzung des Fahrzeugzustands und bieten dir wertvolle Ratschläge.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/iconadv/smiley.png" alt="wünsche fragen individuell gebrauchtwagen kaufen">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold; padding-top: 10px">Individuelle Wünsche</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Auf Wunsch führen wir spezifische Prüfungen oder zusätzliche Leistungen durch, um den individuellen Bedürfnissen und Anforderungen unserer Kunden gerecht zu werden.
                                </div>
                            </div> 
                        </div>

                    </div>
                </div>
            </div>
        </section>
        </section>
        <section id="you-get-area">
            <div class="container position-relative">
                <div class="row">
                    <div class="col">
                        <div class="you-get-wrapper">
                            <div class="section-heading">
                                <h2 class="d-none d-sm-block">Unsere Oldtimer Prüfung</h2>
                                <h2 class="d-sm-none">Unsere Oldtimer Prüfung</h2>
                            </div>
                            <div class="you-get-list d-flex">
                                <div class="you-get-list-row">
                                    <ul>
                                        <li>TÜV-Zertifiziert</li>
                                        <li>Karosserie-Check</li>
                                        <li>Sicherheits-Check</li>
                                        <li>Motor-Check</li>
                                        <li>Historien-Check</li>
                                    </ul>
                                </div>
                                <div class="you-get-list-row">
                                    <ul>
                                        <li>Umfassende Probefahrt</li>
                                        <li>Detaillierte Fotodokumentation</li>
                                        <li><b>Zertifiziertes Oldtimer-Gutachten</b></li>
                                        <div class="you-get-btn">
                                            <a href="{{route('index')}}" class="section-btn">Jetzt buchen</a>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="you-get-thumb position-absolute">
                    <img src="{{ asset('front/imgs/bg-imgs/you-get-thumb.png') }}" alt="Gebrauchtwagencheck Vorgaben Richtlinien Auto vor dem Kauf prüfen lassen">
                </div>
            </div>
        </section>

        <section style="padding-top: 100px" id="live-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="live-wrapper">
                            <div class="section-heading">
                            <h2 class="text-center">Erhalte ein zertifiziertes Oldtimer Gutachten</h2>
                                <p style="font-size: 19px" class="paragraph text-center d-none d-sm-block">
                                Wir prüfen deutschlandweit deinen gewünschten Oldtimer vor dem Kauf nach unseren strengen Richtlinien und Vorgaben und 
                                erstellen ein <b>zertifiziertes Oldtimer-Gutachten</b>, das mehr als<br><b>150 verschiedene Prüfpunkte</b> abdeckt.
                                <br><br>
                                Natürlich berücksichtigen wir auch deine individuellen Wünsche und Vorstellungen, prüfen<br>diese genaustens und führen sie im Gutachten auf.
                                </p>
                                <p class="paragraph text-center d-sm-none">
                                Wir prüfen deutschlandweit deinen gewünschten Oldtimer vor dem Kauf nach unseren strengen Richtlinien und Vorgaben und
                                erstellen ein <b>zertifiziertes Oldtimer-Gutachten</b>, das mehr als <b>150 verschiedene Prüfpunkte</b> abdeckt.
                                <br><br>
                                Natürlich berücksichtigen wir auch deine individuellen Wünsche und Vorstellungen und prüfen diese genaustens und führen sie im Gutachten auf.
                                </p>
                            </div>
                            <br><br><br>
                            <center><a href="{{route('faq')}}" class="section-btn" style="width:300px">FAQ ansehen</a></center>
                        </div>   
                    </div> 
                </div>
            </div>
        </section>

        <section id="how-does-work">
        <div class="container-sm">
          <div class="mb-5 mb-md-5 text-center text-lg-center">
          <h2 style="padding-bottom: 50px; padding-top: 50px" class="text-center">Darauf sind wir stolz</h2>
          </div>
          <div class="row faq-wrapper gx-0 mx-auto mb-5">
            <div class="col-lg-12 mx-auto" id="faq-section">
              <div class="faq-accordion">
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-two" aria-expanded="false" aria-controls="faq-two">
                                <span class="icon">
                                  <img src="assets/imgs/icons/check-faq.png" alt="ADAC empfohlen">
                                </span>
                                ADAC Empfohlen
                            </button>
                        </h2>
                        <div id="faq-two" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div style="background-color: white; color: black" class="accordion-body"><br>
                                Carspector präsentiert stolz, dass unsere Dienstleistungen vom ADAC empfohlen werden. Der ADAC (Allgemeiner Deutscher Automobil-Club) ist eine renommierte Institution im Bereich der Automobilbranche, bekannt für seine unabhängigen Tests und Bewertungen.
                            </div><br>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-three" aria-expanded="false" aria-controls="faq-three">
                                <span class="icon">
                                  <img src="assets/imgs/icons/check-faq.png" alt="TÜV zertifiziertes Gutachten">
                                </span>
                                TÜV-Zertifiziertes Gutachten
                            </button>
                        </h2>
                        <div id="faq-three" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div style="background-color: white; color: black" class="accordion-body"><br>
                               Nach Abschluss des Gebrauchtwagenchecks erhältst du von uns ein vom TÜV-zertifiziertes Gebrauchtwagen-Gutachten. Wir folgen stets strengen Vorgaben und Richtlinien, um unserem hohen Maß an Professionalität und Qualität gerecht zu werden.
                            </div><br>
                        </div>
                    </div>           
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-eighteen" aria-expanded="false" aria-controls="faq-eighteen">
                                <span class="icon">
                                  <img src="assets/imgs/icons/check-faq.png" alt="Tätige keinen Fehlkauf">
                                </span>
                                Tätige keinen Fehlkauf
                            </button>
                        </h2>
                        <div id="faq-eighteen" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div style="background-color: white; color: black" class="accordion-body"><br>
                            Tätige nie wieder einen Fehlkauf. Unser umfassender Gebrauchtwagencheck und professionelle Beratung direkt am Fahrzeug bieten dir die
                            Sicherheit, dass du eine fundierte Entscheidung triffst. Wir helfen dir dabei, potenzielle Risiken zu minimieren, indem wir alle 
                            relevanten Aspekte deines zukünftigen Fahrzeugs gründlich prüfen.
                            </div><br>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-twenty_2" aria-expanded="false" aria-controls="faq-twenty_2">
                                <span class="icon">
                                  <img src="assets/imgs/icons/check-faq.png" alt="Entspannt von zuhause">
                                </span>
                                Entspannt von zuhause
                            </button>
                        </h2>
                        <div id="faq-twenty_2" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div style="background-color: white; color: black" class="accordion-body"><br>
                            Wir prüfen dein Traumauto während du entspannt von zuhause auf die Bewertung wartest. Zusätzlich besprechen wir den Check mit dir im Anschluss sehr genau und 
                            erklären dir, ob du das Fahrzeug ohne Sorgen und Angst kaufen kannst.
                            </div><br>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-nineteen" aria-expanded="false" aria-controls="faq-nineteen">
                                <span class="icon">
                                  <img src="assets/imgs/icons/check-faq.png" alt="Prüfungsgarantie">
                                </span>
                                Prüfungsgarantie
                            </button>
                        </h2>
                        <div id="faq-nineteen" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div style="background-color: white; color: black" class="accordion-body"><br>
                            Da wir nur mit geprüften und zertifizierten Gebrauchtwagen-Prüfern zusammenarbeiten, können wir dir einen hohen Qualitätstandard versichern. Somit bieten
                            wir eine umfassende Prüfungsgarantie an, damit du auf der sicheren Seite bist.
                            </div><br>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-twenty" aria-expanded="false" aria-controls="faq-twenty">
                                <span class="icon">
                                  <img src="assets/imgs/icons/check-faq.png" alt="Deutschlandweit">
                                </span>
                                Deutschlandweit im Einsatz
                            </button>
                        </h2>
                        <div id="faq-twenty" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div style="background-color: white; color: black" class="accordion-body"><br>
                            Dank unseres umfangreichen Netzwerks an Prüfern sind wir deutschlandweit im Einsatz. Diese breite geografische Abdeckung ermöglicht es uns, 
                            schnell und effizient auf Kundenanfragen zu reagieren, unabhängig davon, wo sich das Fahrzeug befindet. 
                            </div><br>
                        </div>
                    </div>
                    
                </div>
            </div>
            </div>
          </div>
          <div class="row mb-5 pt-lg-5">
            <div class="text-center mb-4">
              <h4 class="fs-4 mb-4">Jetzt buchen und sicher kaufen.</h4>
              <a href="{{route('index')}}" class="section-btn" style="width:250px">Jetzt buchen</a>
            </div>
          </div>
        </div>
            
        </section>
        <section id="known-from-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="known-from-wrapper">
                            <div class="section-heading">
                                <h2 class="text-center">Carspector ist bekannt aus</h2>
                            </div>
                            <div class="known-from-items m-auto d-flex justify-content-between align-items-start">
                                <div class="kf-single-item text-center">
                                    <div class="known-from-img">
                                        <img src="front/imgs/autobild-logo.png" alt="Carspector Autobild" width="115px" height="115px">
                                    </div>
                                    <p class="paragraph">Autobild</p>
                                </div>
                                <div class="kf-single-item text-center">
                                    <div class="known-from-img">
                                        <img src="front/imgs/logo_dw_2017.png" alt="Carspector Düsseldorfer Wirtschaft" width="115px" height="115px">
                                    </div>
                                    <p class="paragraph">Düsseldorfer Wirtschaft</p>
                                </div>
                                <div class="kf-single-item text-center">
                                    <div class="known-from-img">
                                        <img src="front/imgs/youtube.png" alt="Carspector Youtube" width="115px" height="115px">
                                    </div>
                                    <p class="paragraph">Youtube und weitere soziale Medien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@extends('mainpages.mainlayout')
@section('content')
    <main>

            <section style="background-color: white" id="how-does-work">
      <h2 style="padding-bottom: 50px; padding-top: 25px" class="text-center">Auto-Check</h2>
        <section style="padding-top: 15px" class="exam-area position-relative">
            
            
            <div class="container position-relative">
                <div class="exam-cards">
                    <div class="row g-lg-5 g-md-4 g-sm-3 pb-4">
                        <div class="col-sm-6 col-lg-4" >
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/icons/expert.png" alt="Professionelle Einschätzung">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold">Professionelle Einschätzung</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Du erhältst eine professionelle Einschätzung deines gewünschten Fahrzeugs von einem Experten, welcher auf Gebrauchtwagenchecks spezialisiert ist. Wir wissen genau,
                                    worauf es ankommt und unterstützen dich beim Autokauf mithilfe von Vorgaben und Richtlinien. Einfach. Sicher. Kaufen.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/icons/target.png" alt="Objektive Bewertung">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold">Objektive Bewertung</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Du erhältst eine objektive Bewertung deines Fahrzeugs, da unsere Experten mit neutraler Sichtweise
                                vorgehen und dein Auto auf Basis von Fakten und Standards bewertet. Dadurch kannst du sicher sein, dass du eine faire Einschätzung erhältst, 
                                die auf den tatsächlichen Merkmalen deines Fahrzeugs beruht.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/icons/faq.png" alt="Kaufbegleitung">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold">Optional: Kaufbegleitung</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Durch deine Anwesenheit bei der Prüfung erhältst du die einmalige Möglichkeit, einem Experten Fragen zu stellen, deine Wünsche zu 
                                nennen und zu erklären, was dir beim Autokauf besonders wichtig ist.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/icons/relax.png" alt="Entspannt von zuhause schnell und einfach buchen">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold">Entspannt von zuhause</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Lehne dich entspannt zurück, während wir dein Traumauto überprüfen. Nach Abschluss des Checks besprechen wir das Ergebnis mit dir telefonisch und 
                                    klären deine noch offenen Fragen und Bedenken.
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/icons/people.png" alt="Individuelle Wünsche an den Gebrauchtwagencheck">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold">Individuelle Wünsche</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Unsere Experten stehen dir mit ihrem Fachwissen und ihrer Erfahrung zur Seite, um genaustens auf deine individuellen Wünsche und Vorstellungen einzugehen.
                                    Erkläre uns, was dir besonders wichtig ist und wir werden es prüfen!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/icons/cross.png" alt="Der sichere Weg beim Autokauf">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold">Tätige keinen Fehlkauf</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Tätige nie wieder einen Fehlkauf. Unser umfassender Gebrauchtwagencheck und professionelle Nachbesprechung bieten dir die Sicherheit, dass du eine fundierte Entscheidung treffen kannst. Wir helfen dir dabei, potenzielle Risiken zu minimieren.
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/icons/relax.png" alt="Entspannt von zuhause schnell und einfach buchen">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold">Entspannt von zuhause</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Lehne dich entspannt zurück, während wir dein Traumauto überprüfen. Nach Abschluss des Checks besprechen wir das Ergebnis mit dir telefonisch und 
                                    klären deine noch offenen Fragen und Bedenken.
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/icons/people.png" alt="Individuelle Wünsche an den Gebrauchtwagencheck">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold">Individuelle Wünsche</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                    Unsere Experten stehen dir mit ihrem Fachwissen und ihrer Erfahrung zur Seite, um genaustens auf deine individuellen Wünsche und Vorstellungen einzugehen.
                                    Erkläre uns, was dir besonders wichtig ist und wir werden es prüfen!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="exam-card">
                                <div class="exam-card-header">
                                    <div class="exam-card-header-icon">
                                        <img src="assets/imgs/icons/cross.png" alt="Der sichere Weg beim Autokauf">
                                    </div><p style="text-align: left; font-size: 19px; font-weight: bold">Tätige keinen Fehlkauf</p>
                                </div>
                                <div style="text-align: left; font-size:17px" class="exam-card-body">
                                Tätige nie wieder einen Fehlkauf. Unser umfassender Gebrauchtwagencheck und professionelle Nachbesprechung bieten dir die Sicherheit, dass du eine fundierte Entscheidung treffen kannst. Wir helfen dir dabei, potenzielle Risiken zu minimieren.
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
                                <h2 class="d-none d-sm-block">Unser Gebrauchtwagencheck</h2>
                                <h2 class="d-sm-none">Unser Gebraucht-<br>wagencheck</h2>
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
                                        <li><b>Zertifiziertes Gebrauchtwagen-Gutachten</b></li>
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
                            <h2 class="text-center">Erhalte ein zertifiziertes Gutachten</h2>
                                <p style="font-size: 19px" class="paragraph text-center d-none d-sm-block">Wir prüfen dein gewünschtes Auto vor dem Kauf nach unseren Richtlinien und Vorgaben.
                                Zusätzlich erstellen wir ein zertifiziertes Gebrauchtwagen-Gutachten, das mehr als <b>150 verschiedene Prüfpunkte</b> abdeckt.
                                <br><br>
                                Natürlich berücksichtigen wir auch deine individuellen Wünsche und Vorstellungen, prüfen diese genaustens und führen sie im Gutachten auf.
                                </p>
                                <p class="paragraph text-center d-sm-none">
                                Wir prüfen deutschlandweit dein gewünschtes Auto vor dem Kauf nach strengen Richtlinien und Vorgaben.
                                <br>Zusätzlich erstellen wir ein zertifiziertes Gebrauchtwagen-Gutachten, das mehr als <b>150 verschiedene Prüfpunkte</b> abdeckt.
                                <br><br>
                                Natürlich berücksichtigen wir auch deine individuellen Wünsche und Vorstellungen und prüfen diese genaustens und führen sie im Gutachten auf.
                                </p>
                            </div>
                            <br><br><br>
                            <center><a href="/Carspector_Mustergutachten.pdf" target="_blank" class="section-btn" style="width:300px">Mustergutachten ansehen</a></center>
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
                                Carspector präsentiert stolz, dass unsere Dienstleistungen vom ADAC empfohlen werden. Der ADAC (Allgemeiner Deutscher Automobil-Club) ist eine renommierte Institution im Bereich der Automobilbranche, bekannt für seine unabhängigen Tests und Bewertungen, und ihre Empfehlung bestätigt die Qualität und Zuverlässigkeit unserer Plattform. Sie zeigt, dass wir hohe Standards in Bezug auf Transparenz, Genauigkeit und Kundenzufriedenheit erfüllen. Diese Anerkennung gibt unseren Kunden zusätzliches Vertrauen, wenn sie unsere Services nutzen, um den Kauf eines Gebrauchtwagens vorzubereiten.
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
                               Nach Abschluss des Gebrauchtwagenchecks erhältst du von uns ein vom TÜV-zertifiziertes Gebrauchtwagen-Gutachten. Wir folgen stets strengen Vorgaben und Richtlinien, um unserem hohen Maß an Professionalität und Qualität gerecht zu werden. Dieses Gutachten deckt sämtliche Aspekte deines gewünschten Fahrzeugs ab und bietet dir detaillierte Einblicke in dessen Zustand.
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
                            schnell und effizient auf Kundenanfragen zu reagieren, unabhängig davon, wo sich das Fahrzeug befindet. Unsere Prüfer sind über das
                            gesamte Bundesgebiet verteilt und stehen bereit, um Gebrauchtwagenchecks durchzuführen.
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

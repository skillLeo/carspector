@extends('mainpages.mainfront')
@section('content')
    <main>

        <!-- Hero-sections-start -->
        <section class="section hero  position-relative" style="background-image: url('assets/img/hero-bg.png');">
            <img  data-src="{{ asset('assets/img/logo-bgs/logo-bg.png') }}" class="logoBg lazy logoBg-hero-1" alt="">
            <img data-src="{{ asset('assets/img/logo-bgs/logo-bg-2.png') }}" class="logoBg lazy logoBg-hero-2" alt="">
            <div class="container">
                <div class="row align-items-stretch">
                    <div class="col-lg-7">
                        <div class="hero-content">
                            <h1 class="text-white">Finde deinen persönlichen Gebrauchtwagen-Prüfer</h1>
                            <p class="text-white">und erhalte ein vom TÜV zertifiziertes Gebrauchtwagen-Gutachten für dein Wunschfahrzeug</p>
                            <div class="search-box mx-auto ms-md-0 mt-5">
                                <form  action="{{route('examiners')}}" method="get">
                                    <input type="search"  min="3" name="city" placeholder="Stadt" required>
                                    <button type="submit"  class="btn btn-primary">Los geht’s</button>
                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero-img h-100 position-relative">
                            <img  data-src="assets/img/happy-mechanic.webp" class="lazy" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero-sections-end -->

        <!-- Service-sections-start -->
        <section class="section service">
            <div class="container">
                <div class="title-wrapper text-center">
                    <h2 class="mb-0">Deine Vorteile im Überblick</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item text-center">
                            <div class="service-item-icon">
                                <span>
                                    <img data-src="assets/img/handschlag.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="service-item-content">
                                <h4>Begleite deinen Prüfer</h4>
                                <p>Bei deiner Prüfung bist du dabei und begleitest deinen ausgewählten Prüfer! Stelle Fragen, nenne deine Wünsche und Vorstellungen und höre die Meinung eines Experten</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item text-center">
                            <div class="service-item-icon">
                                <span>
                                    <img data-src="assets/img/service-2.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="service-item-content">
                                <h4>Gebrauchtwagen-Gutachten</h4>
                                <p>Erhalte ein genormtes und vom TÜV zertifiziertes Gebrauchtwagen-Gutachten vom Prüfer deiner Wahl, um auf der sicheren Seite zu sein. Kaufe dein neues Auto ohne Stress und Sorgen</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item text-center">
                            <div class="service-item-icon">
                                <span>
                                    <img data-src="assets/img/garantie.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="service-item-content">
                                <h4>Prüfungsgarantie</h4>
                                <p>Da wir nur mit geprüften und zertifizierten Prüfer zusammenarbeiten, können wir dir einen hohen Qualitätstandard versichern. Somit bieten wir eine umfassende Prüfungsgarantie an, damit du auf der sicheren Seite bist</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service-sections-end -->

        <!-- Info-box-sections-start -->
        <section class="section info position-relative">
            <div class="container">
                <div class="info-box position-relative">
                    <img data-src="assets/img/logo-bgs/logo-bg.png" class="logoBg lazy logoBg-info" alt="">
                    <div class="row gx-0">
                        <div class="col-lg-7">
                            <div class="info-box-content pe-lg-4">
                                <div class="info-box-header">
                                    <h3 class="text-white">Carspector hilft dir beim Gebrauchtwagenkauf!</h3>
                                    <p class="text-white">Wir helfen dir dabei, sicher und problemlos einen Gebrauchten zu kaufen. Vergleiche unsere Prüfer und finde deinen
                                        Favoriten.</p>
                                </div>
                                <div class="info-box-white">
                                    <h3 class=""><span class="counter">10.000</span>+</h3>
                                    <p>Kunden sind überzeugt</p>
                                </div>
                                <div class="search-box">
                                    <form action="{{route('examiners')}}" method="get">
                                    <input type="search" required name="city" placeholder="Stadt">
                                    <button type="submit"  class="btn btn-secondary">Los geht’s</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="info-box-img">
                                <img data-src="assets/img/about-img.webp" class="img-fluid lazy" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Info-box-sections-end -->

        <!-- How-works-sections-start -->
        <section class="section works">
            <div class="container">
                <div class="title-wrapper">
                    <h2>Wie es funktioniert</h2>
                    <p>in 4 einfachen Schritten</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="works-item">
                            <div class="works-item-count">1</div>
                            <div class="works-item-content">
                                <h5>Stadt eingeben</h5>
                                <p>Finde Prüfer in der Stadt, in welcher dein zu prüfendes Wunschfahrzeug steht.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="works-item">
                            <div class="works-item-count">2</div>
                            <div class="works-item-content">
                                <h5>Prüfer vergleichen</h5>
                                <p>Vergleiche die Prüfer anhand von verschiedenen Kriterien und nutze unsere umfassende Suchfunktion um deinen Favoriten zu finden.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="works-item">
                            <div class="works-item-count">3</div>
                            <div class="works-item-content">
                                <h5>Termin finden</h5>
                                <p>Wähle deinen gewünschten Termin und nenne uns Informationen zu deinem Wunschfahrzeug und Ort der Prüfung.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="works-item works-item-green">
                            <div class="works-item-count">4</div>
                            <div class="works-item-content">
                                <h5>Sicher kaufen</h5>
                                <p>Du erhältst ein genormtes Gutachten, welches speziell auf Gebrauchtwagen ausgelegt ist und erfährst somit alle Mängel,
                                Probleme aber auch Positives über dein Wunschfahrzeug.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- How-works-sections-end -->

        <!-- customers-sections-start -->
        <section class="section customers bg-primary position-relative">
            <img data-src="assets/img/logo-bgs/logo-customers-1.png" class="logoBg lazy logoBg-customers-1" alt="">
            <img data-src="assets/img/logo-bgs/logo-customers-2.png" class="logoBg lazy logoBg-customers-2" alt="">
            <div class="container">
                <div class="row align-items-center customers-counters">
                    <div class="col-lg-4">
                        <div class="customers-text">
                            <div class="customers-text-shap"></div>
                            <h2>Carspector in <br> Zahlen</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="customers-count">
                                    <h2><span class="counter">10.000</span>+</h2>
                                    <p>Kunden sind überzeugt</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customers-count">
                                    <h2><span class="counter">250</span>+</h2>
                                    <p>Städte verfügbar</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customers-count">
                                    <h2><span class="counter">3.000</span>+</h2>
                                    <p>5 Sterne Bewertungen</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customers-count">
                                    <h2><span class="counter">4.7</span>/5</h2>
                                    <p>Sterne laut Kunden</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customers-count">
                                    <h2><span class="counter">2.500</span>+</h2>
                                    <p>Prüfer registriert</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="customers-count">
                                    <h2><span class="counter">150</span>+</h2>
                                    <p>Gutachten pro Tag</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <div class="search-box">
                            <form action="{{route('examiners')}}" method="get">
                            <input type="search" required  name="city" placeholder="Stadt">
                            <button type="submit" class="btn btn-secondary">Los geht’s</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- customers-sections-start-end -->

        <!-- explain-area-sections-start -->
        <section class="section explain">
            <div class="container">
                <div class="title-wrapper">
                    <h2>Deine Gebrauchtwagen-Prüfung einfach erklärt</h2>
                    <p>Alles was du erhältst</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row gx-3">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/handshake_vorteile.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Begleite deinen Prüfer</h5>
                                <p>Bei deiner Prüfung bist du dabei und begleitest deinen ausgewählten Prüfer! Stelle Fragen, nenne deine Wünsche und Vorstellungen und höre die Meinung eines Experten.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/left-and-right-arrows.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Vergleichen und Finden</h5>
                                <p>Durch unsere umfassende Suchfunktion kannst du Prüfer einfach vergleichen und den idealen Experten für dich finden. Nutze die Filteroptionen, um schnell und gezielt nach deinen
                                Wünschen zu suchen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/back-in-time.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Flexible Zeiten</h5>
                                <p>Entscheide selbst, wann deine Gebrauchtwagen-Prüfung stattfinden soll. Schau dir die verfügbaren Termine deines gewählten Prüfers an und wähle den Termin, der am besten zu deinen individuellen Bedürfnissen passt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/guarantee.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Prüfungsgarantie</h5>
                                <p>Da wir nur mit geprüften und zertifizierten Prüfer zusammenarbeiten, können wir dir einen hohen Qualitätstandard versichern. Somit bieten wir eine umfassende Prüfungsgarantie an, damit du auf der sicheren Seite bist.</p>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/explain/01.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Gebrauchtwagen-Gutachten</h5>
                                <p>Du erhältst ein genormtes und vom TÜV zertifiziertes Gutachten, welches speziell auf Gebrauchtwagen ausgelegt ist. Dein ausgewählter Prüfer arbeitet alle Schritte an deiner Seite ab und ist für dich da.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/explain/06.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Prüfung wichtiger Bauteile</h5>
                                <p>Wir überprüfen sorgfältig alle wichtiges Bauteile deines Fahrzeugs wie zum Beispiel: die Bremsanlage, Radaufhängung, Motor und Reifen. Gerne berücksichtigen wir deine speziellen
                                Wünsche während des Prüfprozesses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/car-collision.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Überprüfung auf Unfallschäden</h5>
                                <p>Unsere Überprüfung umfasst eine genaue Untersuchung auf Unfallschäden, selbst kleine Schäden bleiben bei Carspector nicht unbemerkt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/explain/04.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Gebrauchsspuren werden dokumentiert</h5>
                                <p>Alle Gebrauchsspuren und Auffälligkeiten werden genaustens dokumentiert und dir vor Ort erklärt. Ebenfalls erhältst du eine grobe Kosteneinschätzung, falls du diesen Mangel reparieren möchtest.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/explain/05.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Probefahrt</h5>
                                <p>Der erfahrene Prüfer nimmt dein gewünschtes Fahrzeug für eine sorgfältige Probefahrt unter die Lupe. Dabei achtet er besonders auf Geräusche, Auffälligkeiten und andere Details. Du bist herzlich eingeladen, persönlich dabei zu sein und Fragen zu stellen - so erhältst du einen direkten Einblick in die Leistung und den Zustand des Fahrzeugs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/like.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Objektive Bewertung</h5>
                                <p>Carspector bietet objektive Fahrzeugbewertungen, die frei von persönlichen Eindrücken oder Gefühlen sind. Wir liefern klare und zuverlässige Informationen, damit du als
                                Autokäufer gut informierte Entscheidungen treffen kannst.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/conversation.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Du stellst Fragen</h5>
                                <p>Du hast jederzeit die Möglichkeit, deinem Prüfer Fragen zu stellen und deine Bedenken zu äußern. Der Prüfer berücksichtigt auch deine individuellen
                                Wünsche und steht dir unterstützend zur Seite - Gemeinsam bildet ihr ein Team!</p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="assets/img/chat.png" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Preisverhandlung</h5>
                                <p>Selbstverständlich steht dir der Experte auch bei der Preisverhandlung zur Seite. Die identifizierten Mängel oder kleinen Probleme können als Verhandlungsbasis genutzt werden,
                                 um den Preis zu reduzieren.</p>
                            </div>
                        </div>
                    </div>       
                </div>
            </div>
        </section>
        <!-- explain-area-sections-end -->

        <!-- Customers-say-sections-start -->
        <section class="section say bg-primary position-relative">
            <img data-src="assets/img/logo-bgs/logo-bg-say-1.png" class="logoBg lazy logoBg-say-1" alt="">
            <img data-src="assets/img/logo-bgs/logo-bg-say-2.png" class="logoBg lazy logoBg-say-2" alt="">
            <div class="container">
                <div class="title-wrapper">
                    <h2 class="text-white">Das sagen unsere Kunden</h2>
                    <p class="text-white">höre Stimmen der Überzeugten</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="say-item">
                            <span class="say-quote"><img data-src="assets/img/say/quote.png" class="lazy" alt=""></span>
                            <div class="say-item-desc">
                                <p>“Bei meinem Kauf eines Gebrauchtwagens war ich unsicher, da ich mich mit der Autotechnik nicht auskenne. Der über
                                    Carspector von mir ausgewählte Gutachter hat mir Sicherheit gegeben, das Auto gründlich gecheckt und alle meine Fragen
                                    gut beantwortet. “</p>
                            </div>
                            <div class="say-meta">
                                <div class="say-meta-img">
                                    <img data-src="assets/img/say/say-1.webp" class="lazy" alt="">
                                </div>
                                <div class="say-meta-content">
                                    <h6>Susanne Lenz</h6>
                                    <img data-src="assets/img/say/stars.png" class="lazy" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="say-item">
                            <span class="say-quote"><img data-src="assets/img/say/quote.png" class="lazy" alt=""></span>
                            <div class="say-item-desc">
                                <p>“Nachdem ich meinen Führerschein bestanden habe, war ich sehr unsicher was mein erstes Auto betrifft. Auf die Website
                                    gegangen, mit drei Klicks einen Gutachter gebucht und Zack: Ich konnte den perfekten Gebrauchtwagen für mich finden bei
                                    dem ich über jegliche Mängel Bescheid weiß.”</p>
                            </div>
                            <div class="say-meta">
                                <div class="say-meta-img">
                                    <img data-src="assets/img/say/say-2.webp" class="lazy" alt="">
                                </div>
                                <div class="say-meta-content">
                                    <h6>Annalena Bayreuth</h6>
                                    <img data-src="assets/img/say/stars.png" class="lazy" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="say-item mb-0">
                            <span class="say-quote"><img data-src="assets/img/say/quote.png" class="lazy" alt=""></span>
                            <div class="say-item-desc">
                                <p>“Ich bin wirklich begeistert! Klasse Service - perfekte und reibungslose Abwicklung. Jederzeit wieder!“</p>
                            </div>
                            <div class="say-meta">
                                <div class="say-meta-img">
                                    <img data-src="assets/img/say/say-3.webp" class="lazy" alt="">
                                </div>
                                <div class="say-meta-content">
                                    <h6>Sinan Öztürk</h6>
                                    <img data-src="assets/img/say/stars.png" class="lazy" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Customers-say-sections-end -->

        <!-- faq-sections-start -->
        <section class="section faq">
            <div class="container">
                <div class="row gx-lg-5">
                    <div class="col-lg-6">
                        <div class="faq-wrapper pe-lg-3">
                            <div class="title-wrapper">
                                <h2>FAQ</h2>
                                <p>um deine Fragen zu klären</p>
                            </div>
                            <div class="faq-wrapp">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                Was ist Carspector?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Carspector ist Deutschlands führender Online-Marktplatz zur Vermittlung von Gebrauchtwagenprüfern. Auf der Website kannst du mit nur wenigen Klicks schnell und unkompliziert deinen persönlichen & verifizierten Prüfer buchen.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Wie funktioniert Carspector genau?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Ganz einfach. Du vergleichst Gebrauchtwagen-Experten, welche rundum den Standort deines Wunschfahrzeugs agieren und wählst deinen Favoriten aus. Dieser untersucht dann dein Fahrzeug und erstellt ein professionelles Gebrauchtwagen-Gutachten. Du bist bei der Prüfung dabei, kannst Fragen stellen und deine Wünsche äußern.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Wie viel kostet ein über Carspector gebuchter Prüfer?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Da jeder Prüfer selbst über seinen individuellen Kundenpreis entscheidet, legst du als Kunde ebenfalls deine persönliche Preisspanne für deine Gebrauchtwagen-Prüfung fest. Du bestimmst daher den Preis für deinen Prüfer selbst.

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Kann ich meinen gebuchten Termin kurzfristig verschieben?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Ja, das ist möglich. Sende dazu ganz einfach eine E-Mail an unseren Support mit deinem Namen und Termin der Buchung und erläutere die Sachlage. Wir werden dann Kontakt mit deinem Prüfer aufnehmen und einen neuen Termin für dich finden.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                Muss ich zum Preis des Prüfers noch extra Gebühren bezahlen?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                               Nein, es fallen keine Gebühren oder Ähnliches an. Du bezahlst nur für deinen persönlichen Prüfer. Nachdem du deinen Favoriten gewählt hast, kannst du ganz einfach mit allen gängigen Bezahlmethoden bezahlen.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                Ich habe einen Prüfer gebucht - wie geht es weiter?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Du bekommst eine sofortige Benachrichtigung per E-Mail und einen Eintrag auf deinem Benutzerprofil mit allen wichtigen Informationen. Du kannst dich nun entspannen und auf die Prüfung freuen!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                Ich bin mir nicht sicher, ob Carspector mir wirklich helfen kann?
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Das Feedback unserer Kunden spricht für sich. Laut Kundenumfragen und Bewertungen sind 97,5% aller Kunden mehr als zufrieden und empfehlen Carspector weiter. Falls du dich beim Gebrauchtwagenkauf unsicher fühlst oder einfach auf Nummer sicher gehen möchtest, ist Carspector genau das Richtige für dich. Probiere es aus!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEight">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                Mein Wunschfahrzeug ist abgemeldet, ist das ein Problem?
                                            </button>
                                        </h2>
                                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Nein, unsere Prüfer haben jahrelange Erfahrung im Bereich Gebrauchtwagen und können daher den Zustand eines Fahrzeuges schnell und auch ohne Probefahrt bestimmen. Jedoch empfiehlt es sich, den Autoverkäufer darauf aufmerksam zu machen, dass du gerne eine Probefahrt machen möchtest.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNine">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                Begleite ich meinen gebuchten Gebrauchtwagen-Prüfer?
                                            </button>
                                        </h2>
                                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Ja, du bist bei der Prüfung mit dabei. So kannst du jederzeit Fragen stellen und diese direkt von deinem ausgewählten Experten beantworten lassen. Zusätzlich kannst du deinen persönlichen Prüfer bitten, auf bestimmte Bereich besonders einzugehen.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTen">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                Ich habe Fragen, wie kann ich euch kontaktieren?
                                            </button>
                                        </h2>
                                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Du kannst unseren Kundenservice jederzeit via E-Mail an <a href="mailto:kontakt@carspector.de"><b>kontakt@carspector.de</b></a> kontaktieren oder schreibe uns ganz einfach eine
                                    <b>kostenlose</b> Nachricht via WhatsApp.<a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20" style="color: green"><b> Klicke hier um den Chat zu starten.</b></a> Wir helfen dir, eine Lösung zu finden!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEleven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                                Wie kann ich mich auf die Prüfung vorbereiten?
                                            </button>
                                        </h2>
                                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Nutze die Kommentarfunktion auf Carspector, um deinem Prüfer besondere Wünsche bereits im Vorfeld mitzuteilen. Zudem kannst du gerne alle deine Wünsche und Prioritäten auf einer Checkliste notieren. Diese hilft deinem Prüfer gezielter auf deine Präferenzen einzugehen.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwelve">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                                Welche Vorteile bietet Carspector?
                                            </button>
                                        </h2>
                                        <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Du erhältst ein professionelles und verifiziertes Gebrauchtwagen-Gutachten und kannst dich vor Ort von deinem persönlich ausgewählten Prüfer beraten lassen. Carspector bietet Sicherheit und sorgt für einen problemlosen Autokauf ohne Sorgen. Mehr zu deinen Vorteilen findest du <a href="{{route('vorteile')}}">hier</a>.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThirdteen">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThirdteen" aria-expanded="false" aria-controls="collapseThirdteen">
                                                Welche Zahlungsmethoden bietet Carspector?
                                            </button>
                                        </h2>
                                        <div id="collapseThirdteen" class="accordion-collapse collapse" aria-labelledby="headingThirdteen"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Du kannst mit allen gängigen Bezahlmethoden bezahlen. Die beliebtesten sind VISA, PayPal, Apple Pay und Mastercard. Falls du Probleme mit dem Bezahlen hast oder deine Bezahlmethode nicht dabei ist, kontaktiere gerne unseren Support unter <a href="mailto:kontakt@carspector.de"><b>kontakt@carspector.de</b></a> oder schreibe uns ganz einfach eine
                                    <b>kostenlose</b> Nachricht via WhatsApp.<a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20" style="color: green"><b><br><br>Klicke hier um den Chat zu starten.</b></a> Wir helfen dir, eine Lösung zu finden!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-img ps-lg-3">
                            <img data-src="assets/img/faq-img.webp"  class="img-fluid lazy" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- faq-sections-end -->


        <!-- cta-sections-start -->
        <section class="section cta">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cta-content">
                            <div class="cta-info">
                                <h4>Du hast noch offene Fragen?</h4>
                                <p>Dann kontaktiere gerne unseren Kundenservice via E-Mail an <a href="mailto:kontakt@carspector.de">kontakt@carspector.de</a> oder schreibe uns ganz einfach eine
                                    <b>kostenlose</b> Nachricht via <a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20"><b>WhatsApp</b></a>.</p><br>

                                <div class="booking-form mb-5 text-center">
                                        <a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20"><button style="background-color: #25D366" class="btn btn-primary-light w-100 shadow-none mb-lg-5 mb-4">Auf WhatsApp schreiben</button></a>
                                    </div>

                            </div>
                            <div class="search-box mx-auto">
                               <form method="get" action="{{route('examiners')}}">
                                   <input name="city" required type="search" placeholder="Stadt">
                                   <button class="btn btn-secondary">Los geht’s</button>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-sections-end -->

    </main>



















{{--    Modal --}}


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custum-model-width modal-xl">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-end pe-4">
                            <h6 class="pb-0 mb-0" data-bs-dismiss="modal">X</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <div class="profile-img">
                                <img data-src="{{ asset('assets/img/portal-img.png') }}" class="lazy" alt="">
                            </div>
                        </div>
                        <div class="col-7 col-md-3 pt-2 pt-md-3 pt-lg-3 pt-xl-3">
                            <div class="profile-info ps-2 ps-sm-2 ps-lg-0 ps-md-0 ps-xl-0">
                                <h6 class="pb-0 mb-0">Andy Woslate</h6>
                                <p><img data-src="{{ asset('assets/img/icons/star.png') }}" class="lazy" alt="">4.3 (39)</p>
                                <a href="#" type="button" style="background-color: white; color: black; border: 1px solid black;width: 135px" class="btn py-2 btn-primary d-none d-md-block d-lg-block d-xl-block mt-2" id="newReview">Bewerten</a>
                            </div>
                        </div>
                        {{--  For Responsive Modal  --}}



                        <div class="col-12  d-block d-md-none py-3 d-lg-none d-xl-none" style="border-bottom: 1px solid #C1C1C1">
                            <div class="row">
                                <div class="col-7 pe-0 me-0 ">
                                    <a href="" type="button" style="font-size: 12px;line-height: 17.5px" class="btn btn-primary w-100" id="allReview">Bewertungen ansehen</a>
                                </div>
                                <div class="col-5 ">
                                    <a href="#" type="button" style="font-size: 12px;line-height: 17.5px;background-color: white; color: black; border: 1px solid black" class="btn py-2 btn-primary  w-100" id="newReview">Bewerten</a>
                                </div>
                            </div>
                        </div>





                        {{-- End  For Responsive Modal --}}

                        <div class="col-12 col-md-3 pt-3">
                            <div class="profile-meta">
                                <ul>
                                    <li class="d-block d-md-none d-lg-none d-xl-none"><span><img data-src="{{ asset('assets/img/icons/star.png') }}" class="lazy" alt=""></span>39 Bewertungen</li>
                                    <li><span><img data-src="{{ asset('assets/img/icons/euro-circle.png') }}" class="lazy" alt=""></span>199 €</li>
                                    <li><span><img data-src="{{ asset('assets/img/icons/greencirclecheck.png') }}" class="lazy" alt=""></span>Bestätigt & verifiziert</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12  d-block d-md-none py-3 d-lg-none d-xl-none" >
                            <div class="row">
                                <div class="col-12 ">
                                    <p class="text-start p-2" style="color:#074BA3;font-size: 14px;line-height: 18px">Hey, ich bin Markus, ein erfahrener Gebrauchtwagenprüfer. Meine Leidenschaft gilt Autos und ich stehe Ihnen zur Seite, um den perfekten Gebrauchtwagen zu finden. Mit meiner gründlichen Inspektion decke ich potenzielle Probleme auf und bewerte den Zustand der Fahrzeuge objektiv. Ich erstelle detaillierte Berichte und stehe Ihnen mit professioneller Beratung zur Seite. Mein Ziel ist es, dass Sie ein Fahrzeug finden, das Ihren Bedürfnissen entspricht und Ihnen langfristig Freude bereitet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 pt-3 text-center">
                            <div class="profile-meta">
                                <ul class="text-center justify-content-center">
                                    <li class="text-center d-none d-md-block d-lg-block d-xl-block"><img src="{{ asset('assets/img/icons/star.png') }}" class="me-3" style="height: 20px;width: 20px" alt="">39 Bewertungen</li>
                                    <li>
                                        <button type="button" style="font-size: 14px" class="btn btn-primary py-2 px-0 w-100  d-none d-md-block d-lg-block d-xl-block " id="allReview">Bewertungen ansehen</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-1 pt-md-4">
                        <div class="col-lg-6 px-0 mx-0 pb-0 mb-0" style="border-bottom: 1px solid #C1C1C1">
                            <div class="row  px-2"  >
                                <div class="col-12 " style="border-top: 1px solid #C1C1C1">
                                </div>
                            </div>
                            <div class="profile-info-item " style="border: none">
                                <div class="profile-info-header">
                                    <h6><img src="{{ asset('assets/img/icons/badge-certificate.png') }}" alt="">Ausbildungen & Können</h6>
                                </div>
                                <ul>
                                    <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>Ausbildung zum Kfz-Mechatroniker 2007</li>
                                    <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>Fortbildung zum Sachverständigen 2015</li>
                                    <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>Fachwissen im Bereich Lack, Karosserie und Allgemein-wissen rund ums Thema Kfz und Gebrauchtwagen</li>
                                </ul>
                            </div>

                            <div class="row px-2 "  >
                                <div class="col-12" style="border-top: 1px solid #C1C1C1">
                                </div>
                            </div>
                            <div class="profile-info-item w-100" style="border: none">
                                <div class="profile-info-header">
                                    <h6><img src="{{ asset('assets/img/icons/muskel.png') }}" alt="">Stärken</h6>
                                </div>
                                <ul>
                                    <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>Fachwissen und Erfahrung</li>
                                    <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>Transparente und verständliche Berichterstellung</li>
                                    <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>Vertrauenswürdigkeit und Zuverlässigkeit</li>
                                </ul>
                            </div>


                        </div>


                        <div class="col-lg-6 d-none d-md-block d-lg-block d-xl-block pe-4">
                            <div class="row" style="background: #1877F2;border-radius: 15px">
                                <div class="col-12" style="border-bottom: 1px solid white">
                                    <h6 class="text-center py-3 text-white " >Über mich:</h6>
                                </div>
                                <div class="col-12 ">
                                    <p class="text-white text-center p-2" style="font-size: 16px;line-height: 20px">Hey, ich bin Markus, ein erfahrener Gebrauchtwagenprüfer. Meine Leidenschaft gilt Autos und ich stehe Ihnen zur Seite, um den perfekten Gebrauchtwagen zu finden. Mit meiner gründlichen Inspektion decke ich potenzielle Probleme auf und bewerte den Zustand der Fahrzeuge objektiv. Ich erstelle detaillierte Berichte und stehe Ihnen mit professioneller Beratung zur Seite. Mein Ziel ist es, dass Sie ein Fahrzeug finden, das Ihren Bedürfnissen entspricht und Ihnen langfristig Freude bereitet.</p>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="profile-info-item">
                                <div class="row">
                                    <div class="col-12 pb-4 d-block d-md-none d-lg-none d-xl-none">
                                        <a href="#" type="button" class="btn mt-3 py-4 btn-secondary btn-icon btn-shadow w-100 rounded-4">
                                            <span class="text text-center text-white" style="font-size: 14px">Nächster Schritt</span>
                                        </a>
                                    </div>
                                    <div class="col-12 pt-2">
                                        <button type="button" class="btn py-2 w-100 btn-white btn-icon" style="border:1px solid black">
                                            <span class="text text-dark  text-start"><a href="#" class="text-dark" style="font-size: 14px">Deine Vorteile mit Carspector</a></span>
                                            <span class="icon "><img src="{{ asset('assets/img/icons/die-info-dark.png') }}" alt=""></span>
                                        </button>
                                    </div>
                                    <div class="col-12 pt-2">
                                        <button type="button" class="btn py-2 w-100 btn-primary btn-icon" style="border:1px solid black">
                                            <span class="text text-white  text-start"><a href="#" style="color: white;font-size: 14px">Fragen? Support</a></span>
                                            <span class="icon "><img src="{{ asset('assets/img/icons/telefone.png') }}" alt=""></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-4 d-none d-md-block d-lg-block d-xl-block" style="vertical-align: center">
                            <a href="#" type="button" class="btn mt-3 btn-secondary btn-icon w-100 rounded-4">
                                <span class="text text-start text-white">Nächster Schritt</span>
                                <span class="icon"><img src="{{ asset('assets/img/icons/next-arrow.png') }}" alt=""></span>
                            </a>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection

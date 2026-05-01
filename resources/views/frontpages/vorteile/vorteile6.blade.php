@extends('mainpages.master-layout')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<style>

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.6); /* Background overlay */
        display: none;
        justify-content: center;
        align-items: flex-start; /* Align the popup at the top */
        z-index: 9999;
        overflow-y: auto; /* Ensure scrollability for taller content */
        padding: 20px; /* Add padding to avoid content touching edges */
    }

    .popup {
        position: relative;
        background: #fff;
        /*padding: 20px;*/
        /*border-radius: 5px;*/
        /*max-width: 768px;*/
        width: 100%;
        /*box-sizing: border-box;*/
        /*z-index: 10000;*/
        /*max-height: 90vh; !* Limit the popup's height to the viewport *!*/
        overflow-y: hidden; /* Add internal scroll if content is taller than max-height */
    }
        select {
            -webkit-appearance: none; /* Entfernt das Standard-Apple-Styling */
            -moz-appearance: none; /* Für Firefox */
            appearance: none;
        }

        .input-container {
            position: relative;
            margin-bottom: 15px;
        }

        .input-container .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d; /* Farbe der Icons */
            font-size: 1.2em; /* Größe der Icons */
        }

        .input-container input,
        .input-container select {
            width: 100%;
            padding: 10px 10px 10px 40px; /* Platz für das Icon links schaffen */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            line-height: 1.5em; /* Stellt sicher, dass die Placeholder-Textausrichtung konsistent ist */
        }

        .input-container input::placeholder {
            color: #aaa; /* Farbe für die Placeholder-Text */
            font-size: 1em; /* Konsistente Größe für Placeholder */
            line-height: 1.5em; /* Gleiche Höhe wie das Eingabefeld */
        }

        .input-container input[type="text"] {
            width: 100%;
            padding: 8px 8px 8px 30px;
            box-sizing: border-box;
        }

        /* Allgemeine Button-Styles */
        .popup button {
          margin-top: 10px;
          padding: 8px 12px;
          cursor: pointer;
          border: none;
          border-radius: 3px;
          font-family: sans-serif;
        }

        /* Style für den Absenden-Button */
        #submitData {
          background-color: #01449a;
          color: #ffffff;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          height: 40px;
          width: 125px;
        }

        /* Schließen-Button am Ende des Formulars */
        .closePopup {
          background-color: #ddd;
          color: #000;
          margin-left: 10px;
          height: 40px;
          width: 125px;
          visibility: hidden;
        }

        /* Schließen-Button oben rechts */
        .close-button {
            position: absolute;
            top: 5px;
            right: 5px;
            background: none;
            border: none;
            font-size: 20px;
            line-height: 20px;
            cursor: pointer;
            color: #000;
        }

        ::placeholder {
            color: grey;
        }

@media (max-width: 576px) {
    .pt-mb-cst {
        padding-top: 60px;
    }
}

    .pt-mb-topt {
        padding-top: 40px !important;
    }

    @media (min-width: 991px) {
            .btnwd {
                width: 350px;
            }
        }

        .icon-bg {
            font-size: 1.5rem;
            color: var(--primary);
            background-color: #F0F5FA;
            padding: 20px;
            border-radius: 5%;
        }

        @keyframes pulseEffect {
    0%, 100% {
        box-shadow: 0 4px 10px rgba(76, 175, 80, 0.5);
    }
    50% {
        box-shadow: 0 4px 20px rgba(76, 175, 80, 0.7);
    }
}

@keyframes shineEffect {
    0% {
        left: -300%;
    }
    50% {
        left: 100%;
    }
    100% {
        left: 100%;
    }
}
.icon-dynamic{
    left: 20px !important;
}


</style>

    <!-- =====Main Area Start===== -->
    <main class="main-area">

    <section class="benefit-banner-section section-bg py-4 py-lg-5">
    <div class="container" style="display: flex; align-items: center;">
        <!-- Content Box -->
        <div class="content-box" style="flex: 1">
            <!-- NEU Banner -->
            <div style="
                background: linear-gradient(90deg, #4caf50, #81c784);
                color: #fff;
                font-weight: bold;
                text-align: center;
                padding: 7px 20px;
                border-radius: 3px;
                display: inline-block;
                margin-bottom: 10px;
                box-shadow: 0 4px 10px rgba(76, 175, 80, 0.5);
                position: relative;
                overflow: hidden;

                animation: pulseEffect 3s infinite ease-in-out;
            ">
                <span style="
                    position: relative;
                    z-index: 1;
                ">NEU</span>
                <div style="
                    position: absolute;
                    top: 0;
                    left: -200%;
                    width: 300%;
                    height: 100%;
                    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
                    transform: skewX(-45deg);
                    animation: shineEffect 3s infinite ease-in-out;
                "></div>
            </div>
            <h3 class="section-title fs-3 text-primary pb-2">Inserat-Vergleich</h3>
            <div class="text-grey pb-2 mb-1">
                <i style="color: #f2d414" class="fa-solid fa-star"></i>
                4.6 (45)
            </div>
            <p style="max-width: 470px; margin-left: auto; margin-right: auto;">
                Du hast mehrere Fahrzeuge im Blick aber bist dir unsicher, welches das beste ist? Kein Problem! Wir vergleichen und erstellen eine detaillierte Rangliste.
            </p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class=" nextStep btn btn-secondary mt-4">
                Jetzt buchen
                <span class="btn-icon">
                    <img src="theme-1/imgs/icons/arrowr.png" alt="">
                </span>
            </button>
        </div>

        <!-- Image Box -->
        <div class="image-box d-none d-xl-block" style="flex: 0.5; text-align: center; margin-left: 20px">
            <img src="theme-1/imgs/vorteile/vergleich-2.png" alt="Fahrzeug Lieferung" style="max-width: 100%; height: 300px; border-radius: 5px">
        </div>
    </div>
    <div class="image-box d-block d-xl-none pt-4" style="flex: 0.5; text-align: center;">
                <img src="theme-1/imgs/vorteile/vergleich-2.png" alt="Fahrzeug Lieferung" style="max-width: 90%; max-height: 315px; border-radius: 5px">
            </div>
</section>


        <section class="used-car-check-section-3">
            <div class="container">

            <div class="section-head text-center pb-4 mb-3">
                        <h3 class="section-title fs-3 text-primary pb-1">Was wir für dich tun</h3>

                    </div>

                <div class="ucc-3-wrapper">
                    <div class="row g-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                                <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                    <i class="fa-regular fa-magnifying-glass"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Vergleich der Inserate</h4>
                            </div>
                            <p class="card-para text-black">Vergleich von Fahrzeugangeboten basierend auf Preis, Ausstattung, Kilometerstand und weiteren Kriterien.</p>
                        </div>

                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-circle-euro"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Prüfung des Marktwertes</h4>
                            </div>
                            <p class="card-para text-black">Analyse des Marktwertes eines Fahrzeugs anhand aktueller Datenbanken und Marktdaten.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-star"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Qualitätsprüfung der Inserate</h4>
                            </div>
                            <p class="card-para text-black">Überprüfung der Inserate auf Vollständigkeit, Glaubwürdigkeit und Professionalität.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-triangle-exclamation"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Erkennung von unseriösen Angeboten</h4>
                            </div>
                            <p class="card-para text-black">Identifikation verdächtiger oder betrügerischer Inserate durch spezialisierte Prüfverfahren.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-image"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Bilder-Check</h4>
                            </div>
                            <p class="card-para text-black">Analyse der Fahrzeugbilder auf Qualität, Vollständigkeit und mögliche Hinweise auf Mängel.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-solid fa-chart-mixed"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Bewertung der Gesamtbetriebskosten</h4>
                            </div>
                            <p class="card-para text-black">Berechnung der laufenden Kosten wie Versicherung, Steuer, Wartung und Treibstoffverbrauch.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-rectangle-history"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Historie-Check</h4>
                            </div>
                            <p class="card-para text-black">Prüfung der Fahrzeughistorie, z. B. Unfallfreiheit, Anzahl der Vorbesitzer und Wartungsberichte.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-gear"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Auflistung typischer Mängel</h4>
                            </div>
                            <p class="card-para text-black">Analyse basierend auf Prüfberichten, um typische Mängel und bekannte Probleme frühzeitig zu erkennen.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-rocket-launch"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Innerhalb 24h</h4>
                            </div>
                            <p class="card-para text-black">Du erhältst unseren ausführlichen Bericht innerhalb von 24 Stunden nach dem Eingang deiner Buchung.</p>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </section>

        <!------- BenefitBanner Section Start ------->
        <section class="benefit-banner-section section-bg">
            <div class="container">
                <div
                    class="benefit-banner-wrapper d-flex flex-column justify-content-center align-items-center text-center mx-auto">
                    <sapn class="ratings-check flex-shrink-0">
                        <i style="font-size: 4rem; color: var(--secondary)" class="fa-solid fa-badge-check"></i>
                    </sapn>

                    <h3 class="section-title fs-3 text-primary pb-4 mb-2">Finde dein Traumauto.<br>Ganz entspannt.</h3>



                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"  type="button" class="openPopup nextStep btn btn-secondary mt-4">
                        Jetzt buchen
                        <span class="btn-icon">
                            <img src="theme-1/imgs/icons/arrowr.png" alt="">
                        </span>
                    </button>
                </div>
            </div>
        </section>
        <!------- BenefitBanner Section End ------->


        <!------- UsedCarCheck (2) OnSite Section Start ------->
        <section class="used-car-check-section-2 pt-mb-cst">
            <div class="container">
                <div class="ucc-2-wrapper mx-auto">
                    <div class="row flex-column-reverse flex-md-row align-items-center">
                        <div class="col-md-6">
                            <div class="ucc-text p-lg-5 pe-0 text-center text-md-start">
                                <h3 class="section-title fs-3 fw-bold text-primary pb-2">Detaillierter Bericht<br>innerhalb von 24h!
                                </h3>

                                <div class="text-grey pb-2 mb-1"><i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                           4.6 (45 Bewertungen) </div>

                                <p style="font-size: 18px" class="text-primary">
                                    Jetzt buchen und detaillierte<br>Vergleichsanalyse erhalten.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ucc-thumb text-end" style="text-align: center;">
                                <img src="theme-1/imgs/vorteile/vergleich.png" alt="Check Used Car" style="border-radius: 5px">
                                <!-- <p class="text-center pt-1" style="color: gray; font-size: small;">Maria Burg, Beratung</p> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!------- UsedCarCheck (2) OnSite Section End ------->

         <!------- Testimonial Section Start ------->
         <section class="testimonial-section section-bg">
            <div class="container">
                <h3 class="section-title fs-3 fw-bold text-primary text-center pb-2 pb-md-5 mb-4 mb-sm-2">Das sagen unsere Kunden</h3>

                <div class="testimonial-wrapper mx-auto mb-4 pb-2">
                    <div class="testimonial-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="testimonial-card swiper-slide d-flex flex-column justify-content-between bg-white">
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
                                    „Der Transport lief absolut reibungslos. Mein neues Auto wurde pünktlich und in perfektem Zustand geliefert. Die Abwicklung war unkompliziert.“
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-user icon-bg"></i>
                                    <p class="client-name">Thomas M.</p>
                                </div>

                            </div>
                            <div class="testimonial-card swiper-slide d-flex flex-column justify-content-between bg-white">
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
                                    „Mein neues Auto wurde über 500 Kilometer sicher transportiert und kam genau wie versprochen an."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-user icon-bg"></i>
                                    <p class="client-name">Sophie K.</p>
                                </div>
                            </div>
                            <div class="testimonial-card swiper-slide d-flex flex-column justify-content-between bg-white">
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
                                    "Ich war froh, mein Auto geliefert zu bekommen, anstatt es selbst abzuholen. Der Service war schnell und zuverlässig, und alles lief wie vereinbart."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-user icon-bg"></i>
                                    <p class="client-name">Lukas B.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <h3 class="testimonial-info fw-bold text-primary text-center">
                    Bereits über <span class="text-secondary">150</span> Fahrzeuge erfolgreich analysiert und verglichen!
                </h3>

                <div class="pt-3 text-center">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="openPopup nextStep btn btn-secondary mt-4">
                        Jetzt buchen
                        <span class="btn-icon">
                            <img src="theme-1/imgs/icons/arrowr.png" alt="">
                        </span>
                    </button>
                </div>

            </div>
        </section>
        <!------- Testimonial Section End ------->

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

{{--        <div class="overlay" id="popupOverlay">--}}
{{--            <div class="popup" id="popupContent">--}}
{{--               <div class="popup-inner">--}}
{{--                   <button class="close-button" id="closeIcon">&times;</button>--}}
{{--                   <h2>Inserat-Vergleich</h2>--}}
{{--                   <p style="font-size: 17px; color: var(--primary)" class="pt-1"><b>Kosten</b>: 9 € pro Inserat</p>--}}
{{--                   <div style="overflow:hidden;width: 100%">--}}
{{--                       <br>--}}
{{--                       <form action="{{route('votile.post')}}" method="POST">--}}
{{--                           @csrf--}}

{{--                           <!-- Auswahl der Anzahl der Inserate -->--}}
{{--                           <div class="input-container">--}}
{{--                               <i class="fas fa-list-ol icon"></i>--}}
{{--                               <select id="inserateAnzahl" name="inserate_anzahl" onchange="generateFields()">--}}
{{--                                   <option value="">Wähle: Anzahl der Inserate (2-10)*</option>--}}
{{--                                   <option value="2">2 Inserate</option>--}}
{{--                                   <option value="3">3 Inserate</option>--}}
{{--                                   <option value="4">4 Inserate</option>--}}
{{--                                   <option value="5">5 Inserate</option>--}}
{{--                                   <option value="6">6 Inserate</option>--}}
{{--                                   <option value="7">7 Inserate</option>--}}
{{--                                   <option value="8">8 Inserate</option>--}}
{{--                                   <option value="9">9 Inserate</option>--}}
{{--                                   <option value="10">10 Inserate</option>--}}
{{--                               </select>--}}
{{--                           </div>--}}

{{--                           <!-- Dynamisch generierte Textfelder -->--}}
{{--                           <div id="dynamicFields" class="row"></div>--}}

{{--                           <!-- Zusatzinfos -->--}}
{{--                           <div class="input-container">--}}
{{--                               <i class="fas fa-circle-info icon"></i>--}}
{{--                               <input style="padding-left: 42px" type="text" name="vehicle_make_model" placeholder="Zusatzinfos (optional)" />--}}
{{--                           </div>--}}

{{--                           <!-- E-Mail Feld -->--}}
{{--                           <div class="input-container">--}}
{{--                               <i class="fas fa-envelope icon"></i>--}}
{{--                               <input type="email" name="email" placeholder="Deine E-Mail-Adresse*" required />--}}
{{--                           </div>--}}

{{--                           <p class="pb-2" style="color: gray; font-size: 15px">Pflichtfelder mit * markiert.</p>--}}
{{--                           <hr>--}}
{{--                           <div id="costCalculator" style="margin-top: 10px; font-size: 16px; color: #333;">--}}
{{--                               <b>Gesamtkosten</b>: <span id="totalCost">0</span> €--}}
{{--                           </div>--}}
{{--                           <input type="hidden" id="amount" name="amount">--}}

{{--                           <button style="background-color: var(--secondary); width: 100%" type="submit" id="submitData">Jetzt buchen</button>--}}
{{--                           <button style="display: none" id="closePopup">Schließen</button>--}}
{{--                       </form>--}}
{{--                       <br>--}}
{{--                       Wir senden dir unseren detaillierten Vergleichsbericht innerhalb von 24h zu.--}}
{{--                   </div>--}}
{{--               </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">

                        <div class="popup" id="popupContent">
                            <button class="close-button" id="closeIcon" data-bs-dismiss="modal">&times;</button>
                            <h2>Inserat-Vergleich</h2>
                            <p style="font-size: 17px; color: var(--primary)" class="pt-1"><b>Kosten</b>: 9 € pro Inserat</p>
                            <div style="overflow-y: hidden;overflow-x:hidden;width: 100%">
                                <br>
                                <form action="{{route('votile.post')}}" method="POST">
                                    @csrf

                                    <!-- Auswahl der Anzahl der Inserate -->
                                    <div class="input-container">
                                        <i class="fas fa-list-ol icon"></i>
                                        <select id="inserateAnzahl" name="inserate_anzahl" onchange="generateFields()">
                                            <option value="">Wähle: Anzahl der Inserate (2-10)*</option>
                                            <option value="2">2 Inserate</option>
                                            <option value="3">3 Inserate</option>
                                            <option value="4">4 Inserate</option>
                                            <option value="5">5 Inserate</option>
                                            <option value="6">6 Inserate</option>
                                            <option value="7">7 Inserate</option>
                                            <option value="8">8 Inserate</option>
                                            <option value="9">9 Inserate</option>
                                            <option value="10">10 Inserate</option>
                                        </select>
                                    </div>

                                    <!-- Dynamisch generierte Textfelder -->
                                    <div id="dynamicFields" class="row"></div>

                                    <!-- Zusatzinfos -->
                                    <div class="input-container">
                                        <i class="fas fa-circle-info icon"></i>
                                        <input style="padding-left: 42px" type="text" name="vehicle_make_model" placeholder="Zusatzinfos (optional)" />
                                    </div>

                                    <!-- E-Mail Feld -->
                                    <div class="input-container">
                                        <i class="fas fa-envelope icon"></i>
                                        <input type="email" name="email" placeholder="Deine E-Mail-Adresse*" required />
                                    </div>

                                    <p class="pb-2" style="color: gray; font-size: 15px">Pflichtfelder mit * markiert.</p>
                                    <hr>
                                    <div id="costCalculator" style="margin-top: 10px; font-size: 16px; color: #333;">
                                        <b>Gesamtkosten</b>: <span id="totalCost">0</span> €
                                    </div>
                                    <input type="hidden" id="amount" name="amount">

                                    <button style="background-color: var(--secondary); width: 100%" type="submit" id="submitData">Jetzt buchen</button>
                                    <button style="display: none" id="closePopup">Schließen</button>
                                </form>
                                <br>
                                Wir senden dir unseren detaillierten Vergleichsbericht innerhalb von 24h zu.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <script>
            function generateFields() {
        const container = document.getElementById('dynamicFields');
        container.innerHTML = ''; // Vorherige Felder entfernen

        const anzahl = document.getElementById('inserateAnzahl').value;
        if (anzahl >= 2 && anzahl <= 10) {
            for (let i = 1; i <= anzahl; i++) {
                const div = document.createElement('div');
                div.classList.add('input-container','col-12','col-md-6');
                div.style='position:relative';

                const icon = document.createElement('i');
                icon.classList.add('fas', 'fa-file-alt', 'icon','icon-dynamic');
                div.appendChild(icon);

                const input = document.createElement('input');
                input.type = 'text';
                input.name = `inserat[]`;
                input.placeholder = `Inserat ${i}*`;
                input.required = true;
                input.style.paddingLeft = '42px';
                div.appendChild(input);

                container.appendChild(div);
            }
        }
    }

    function calculateCost() {
        const anzahl = document.getElementById('inserateAnzahl').value;
        const costPerInserat = 9;
        const totalCost = anzahl ? anzahl * costPerInserat : 0;
        document.getElementById('totalCost').textContent = totalCost;
        // inserateAnzahl
        document.getElementById('amount').value=totalCost;
    }

    document.getElementById('inserateAnzahl').addEventListener('change', calculateCost);

        document.addEventListener('DOMContentLoaded', function() {
            const openButtons = document.querySelectorAll('.openPopup');
            const closeBtn = document.getElementById('closePopup');
            const closeIcon = document.getElementById('closeIcon');
            const overlay = document.getElementById('popupOverlay');

            // Add click event to each button
            openButtons.forEach(button => {
                button.addEventListener('click', () => {
                overlay.style.display = 'flex';
                });
            });

            // Close popup functionality
            if (closeBtn) closeBtn.addEventListener('click', closePopup);
            if (closeIcon) closeIcon.addEventListener('click', closePopup);

            overlay.addEventListener('click', (event) => {
                if (event.target === overlay) {
                closePopup();
                }
            });

            function closePopup() {
                overlay.style.display = 'none';
            }
            });

        </script>


    </main>
    <!-- =====Main Area End===== -->

    @endsection
@section('scripts')

@endsection

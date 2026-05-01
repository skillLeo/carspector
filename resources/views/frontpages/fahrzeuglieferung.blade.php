@extends('mainpages.master-layout')
@section('title', 'Carspector | Fahrzeuglieferung')
@section('meta_description', 'Wir liefern dein Wunschfahrzeug deutschlandweit – zuverlässig, sicher und komfortabel direkt zu dir nach Hause.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<style>
        /* Überlagerung (Overlay), 25% Abdunkelung */
        .overlay {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: rgba(0, 0, 0, 0.6); /* 25% Abdunkelung */
          display: none;
          justify-content: center;
          align-items: center;
          z-index: 9999;
        }

        .popup {
          position: relative;
          background: #fff;
          padding: 20px;
          border-radius: 5px;
          width: 350px;
          box-sizing: border-box;
          z-index: 10000;
        }

         /* Wrapper um die Input-Felder, um Icons einzubinden */
        .input-container {
            position: relative;
            margin-bottom: 10px;
        }

        .input-container .icon {
            position: absolute;
            top: 50%;
            left: 8px;
            transform: translateY(-50%);
            color: #999;
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
            .openPopup {
                width: 400px;
            }
        }

        .icon-bg {
            font-size: 1.5rem;
            color: var(--primary);
            background-color: #F0F5FA;
            padding: 20px;
            border-radius: 5%;
        }


      </style>

    <main class="main-area">

        <!------- Page-Header-Area Start ------->
        

    <section class="benefit-banner-section section-bg py-4 py-lg-5">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="content-box" style="flex: 1;">
            <h3 class="section-title fs-3 text-primary pb-2">Fahrzeug-Lieferung</h3>
            <div class="text-grey pb-2 mb-1">
            <i style="color: #f2d414" class="fa-solid fa-star"></i> 
                4.8 (273)
            </div>
            <p style="max-width: 470px; margin-left: auto; margin-right: auto;">
                <b>Autokauf geplant?</b> Wir liefern dein gewünschtes Fahrzeug ganz entspannt zu dir nach Hause.
            </p>
            <button id="openPopup" style="border-radius: 5px" type="button" class="openPopup nextStep btn btn-secondary mt-4">
                Jetzt unverbindlich anfragen
                <span class="btn-icon">
                    <img src="theme-1/imgs/icons/arrowr.png" alt="fahrzeug lieferung transport auto">
                </span>
            </button>
        </div>
        <div class="image-box d-none d-xl-block" style="flex: 0.5; padding-left: 20px; text-align: center;">
            <img src="theme-1/imgs/vorteile/lieferung.jpeg" alt="fahrzeug lieferung transport auto" style="max-width: 100%; height: 295px; border-radius: 5px">
        </div> 
    </div>
    <div class="image-box d-block d-xl-none pt-4" style="flex: 0.5; text-align: center;">
        <img src="theme-1/imgs/vorteile/lieferung.jpeg" alt="fahrzeug lieferung transport auto" style="max-width: 90%; max-height: 315px; border-radius: 5px">
    </div>
</section>


        <!------- Page-Header-Area End ------->

        <div class="overlay" id="popupOverlay">
            <div class="popup" id="popupContent">
              <button class="close-button" id="closeIcon">&times;</button>
              <h2>Unverbindliche Anfrage</h2>
              <br>
                <form action="{{route('store.fahrzeuglieferung')}}" method="POST">
                    @csrf
                <div class="input-container">
                    <i class="fas fa-car icon"></i>
                    <input type="text" name="vehicle_make_model" placeholder="Marke & Modell*" />
                </div>
                <div class="input-container">
                    <i class="fas fa-map-marker-alt icon"></i>
                    <input type="text" name="location" placeholder="Abholort*" />
                </div>
                <div class="input-container">
                    <i class="fas fa-map-marker-alt icon"></i>
                    <input type="text" name="delivery_address" placeholder="Zielort*" />
                </div>
                <div class="input-container">
                    <i class="fas fa-circle-info icon"></i>
                    <input type="text" name="sonstiges" placeholder="Sonstiges" />
                </div>
                <div class="input-container">
                    <i class="fas fa-envelope icon"></i>
                    <input type="text" name="email" placeholder="Deine E-Mail-Adresse*" />
                </div>
                <p class="pb-2 pt-1" style="color: gray; font-size: 16px">Pflichtfelder mit * markiert.</p>
              <button type="submit" id="submitData">Absenden</button>
              <button style="visibility: hidden" id="closePopup">Schließen</button>
                </form>
              <br>
              Wir senden dir innerhalb kurzer Zeit ein unverbindliches Angebot per E-Mail zu.
            </div>
          </div>

        <!------- Advantage Section Start ------->
        <section class="advantage-section section-padding">
            <div class="container">
                <div class="advantage-wrapper">
                    <div class="section-head text-center pb-4 mb-3">
                        <h3 class="section-title fs-3 text-primary pb-1">Deine Vorteile mit unserer Lieferung</h3>

                    </div>
                    <div class="advantage-cards cards-wrapper">
                        <div class="row advantage-cards-row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                        <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                        <img src="assets/imgs/hpslider/4.png" style="height: 50px" alt="fahrzeug lieferung transport auto deutschlandweit">
                                        </span>

                                        <h4 class="card-title fw-bold pt-1 pb-2">Deutschlandweit verfügbar</h4>
                                    </div>

                                    <p class="card-para text-black">
                                        Wir transportieren dein Fahrzeug überall hin – ganz egal, wo du in Deutschland bist.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                    <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                        <i class="fa-regular fa-truck-fast"></i>
                                    </span>

                                        <h4 class="card-title fw-bold pt-1 pb-2">Schnelle Lieferung</h4>
                                    </div>

                                    <p class="card-para text-black">
                                    Wir sorgen dafür, dass dein Fahrzeug schnell und zuverlässig an den gewünschten Zielort kommt.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                                    <div class="card-item-head">
                                    <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                        <i class="fa-solid fa-shield-halved"></i>
                                    </span>

                                        <h4 class="card-title fw-bold pt-1 pb-2">Versicherter Transport</h4>
                                    </div>

                                    <p class="card-para text-black">
                                    Dein Fahrzeug ist bei uns in besten Händen – unser Transport ist vollständig versichert.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------- Advantage Section End ------->

        <!------- HowDoesWork Section Start ------->
        <section class="how-does-work-section section-bg section-padding">
            <div class="container">
                <div class="how-does-work-wrapper">
                    <div class="section-head text-center pb-5 mb-2">
                        <h3 class="section-title fs-3 text-primary">Wie funktioniert die Lieferung?</h3>
                    </div>

                    <div class="hdw-wrapper d-flex flex-column flex-md-row justify-content-center gap-4 gap-xl-5">
                        <div class="hdw-card-inner d-flex flex-md-column align-items-center">
                            <span
                                class="hdw-number fw-bold position-relative d-flex justify-content-center mb-4">1</span>
                            <div style="border-radius: 5px"
                                class="pt-3 hdw-card text-primary text-center d-flex flex-column align-items-center justify-content-center bg-white position-relative">
                                    <span class="icon mb-3" style="font-size: 2em; background-color: #F0F5FA; padding: 0.5rem 1.2rem; border-radius: 5px; display: inline-block;">
                                        <i style="font-size: 2rem; color: var(--primary)" class="fa-solid fa-desktop"></i>
                                    </span>

                                <div class="hdw-text-box h-100 d-flex flex-column justify-content-between">
                                    <h4 class="hdw-title fw-bold mb-2 pb-1">Anfrage stellen</h4>
                                    <p class="hdw-para text-black">
                                    Stelle eine kostenlose Anfrage und wir schicken dir zeitnah ein unverbindliches Angebot.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="hdw-card-inner d-flex flex-md-column align-items-center">
                            <span
                                class="hdw-number fw-bold position-relative d-flex justify-content-center mb-4">2</span>
                            <div style="border-radius: 5px"
                                class="pt-3 hdw-card text-primary text-center d-flex flex-column align-items-center justify-content-center bg-white position-relative">
                                <span class="icon mb-3" style="font-size: 2em; background-color: #F0F5FA; padding: 0.5rem 1.2rem; border-radius: 5px; display: inline-block;">
                                        <i style="font-size: 2rem; color: var(--primary)" class="fa-regular fa-file-check"></i>
                                    </span>

                                <div class="hdw-text-box h-100 d-flex flex-column justify-content-between">
                                    <h4 class="hdw-title fw-bold mb-2 pb-1">Auftrag bestätigen</h4>
                                    <p class="hdw-para text-black">
                                    Wenn dir das Angebot gefällt, kannst du den Auftrag ganz einfach bestätigen und erhältst eine Bestätigung.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="hdw-card-inner d-flex flex-md-column align-items-center">
                            <span
                                class="hdw-number fw-bold position-relative d-flex justify-content-center mb-4">3</span>
                            <div style="border-radius: 5px"
                                class="pt-3 hdw-card text-primary text-center d-flex flex-column align-items-center justify-content-center bg-white position-relative">
                                <span class="icon mb-3" style="font-size: 2em; background-color: #F0F5FA; padding: 0.5rem 1.2rem; border-radius: 5px; display: inline-block;">
                                        <i style="font-size: 2rem; color: var(--primary)" class="fa-regular fa-truck-fast"></i>
                                    </span>

                                <div class="hdw-text-box h-100 d-flex flex-column justify-content-between">
                                    <h4 class="hdw-title fw-bold mb-2 pb-1">Lieferung des Fahrzeugs</h4>
                                    <p class="hdw-para text-black">
                                    Wir holen dein Fahrzeug ab und liefern es sicher und schnell an den von dir gewünschten Ort – deutschlandweit!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                    <button id="openPopup" type="button" style="border-radius: 5px" class="openPopup nextStep btn btn-secondary mt-4">
                        Jetzt unverbindlich anfragen
                        <span class="btn-icon">
                            <img src="theme-1/imgs/icons/arrowr.png" alt="fahrzeug lieferung transport auto">
                        </span>
                    </button>
                    </div>
                </div>
            </div>
        </section>
        <!------- HowDoesWork Section End ------->

        <!------- UsedCarCheck (2) OnSite Section Start ------->
        <section class="used-car-check-section-2 pt-mb-cst">
            <div class="container">
                <div class="ucc-2-wrapper mx-auto">
                    <div class="row flex-column-reverse flex-md-row align-items-center">
                        <div class="col-md-6">
                            <div class="ucc-text p-lg-5 pe-0 text-center text-md-start">
                                <h3 class="section-title fs-3 fw-bold text-primary pb-2">Ganz entspannt bis<br>vor die Tür
                                </h3>

                                <div class="text-grey pt-1 pb-2 mb-1"><i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                           4.8 (273 Bewertungen) </div>

                                <p class="pt-2 text-primary">
                                Wir bringen dein Fahrzeug sicher und bequem bis vor deine Tür – ganz ohne Stress, damit du dich entspannt zurücklehnen kannst.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ucc-thumb text-end">
                                <img src="theme-1/imgs/vorteile/lieferung-2.jpg" alt="fahrzeug lieferung transport auto" style="border-radius: 5px">
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
                            <div style="border-radius: 5px" class="testimonial-card swiper-slide d-flex flex-column justify-content-between bg-white">
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
                                    "Der Transport lief absolut reibungslos. Mein neues Auto wurde pünktlich und in perfektem Zustand geliefert. Die Abwicklung war unkompliziert."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-user icon-bg"></i>
                                    <p class="client-name">Thomas M.</p>
                                </div>

                            </div>
                            <div style="border-radius: 5px" class="testimonial-card swiper-slide d-flex flex-column justify-content-between bg-white">
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
                                    "Mein neues Auto wurde über 500 Kilometer sicher transportiert und kam genau wie versprochen an."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-user icon-bg"></i>
                                    <p class="client-name">Sophie K.</p>
                                </div>
                            </div>
                            <div style="border-radius: 5px" class="testimonial-card swiper-slide d-flex flex-column justify-content-between bg-white">
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
                        <div class="swiper-pagination mini-card-pagination d-lg-none"></div>
                    </div>
                </div>

                <h3 class="testimonial-info fw-bold text-primary text-center">
                    Mehr als <span class="text-secondary">1.000</span> Fahrzeuge sicher ans Ziel gebracht!
                </h3>

                <div class="pt-3 text-center">
                    <button id="openPopup" type="button" style="border-radius: 5px" class="openPopup nextStep btn btn-secondary mt-4">
                        Jetzt unverbindlich anfragen
                        <span class="btn-icon">
                            <img src="theme-1/imgs/icons/arrowr.png" alt="fahrzeug lieferung transport auto">
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
    <!-- =====Main Area End===== -->

    <script>
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


@endsection

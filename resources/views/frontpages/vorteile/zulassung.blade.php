@extends('mainpages.master-layout')
@section('title', 'Carspector | Kfz-Zulassungsdienst')
@section('meta_description', '')
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


      </style>

    <main class="main-area">

        <!------- Page-Header-Area Start ------->
        

    <section class="benefit-banner-section section-bg py-4 py-lg-5">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="content-box" style="flex: 1;">
            <h3 class="section-title fs-3 text-primary pb-2">Kfz-Zulassung</h3>
            <div class="text-grey pb-2 mb-1">
            <i style="color: #f2d414" class="fa-solid fa-star"></i> 
                4.9 (107)
            </div>
            <p style="max-width: 470px; margin-left: auto; margin-right: auto;">
               <b>Fahrzeug gekauft?</b>  Wir übernehmen die komplette Kfz-Zulassung für dich und senden dir nach erfolgreicher Anmeldung die Kennzeichen 
        sowie alle zugehörigen Unterlagen bequem nach Hause.
            </p>
            <button 
        type="button"
        onclick="window.location.href='{{route('new-booking.create')}}'"
        style="border-radius: 5px"
        class="openPopup nextStep btn btn-secondary mt-4">

    Jetzt buchen
    <span class="btn-icon">
        <img src="theme-1/imgs/icons/arrowr.png" alt="fahrzeug lieferung transport auto">
    </span>
</button>
        </div>
        <div class="image-box d-none d-xl-block" style="flex: 0.5; padding-left: 20px; text-align: center;">
            <img src="/zula_bild_1.png" alt="fahrzeug lieferung transport auto" style="max-width: 100%; height: 295px; border-radius: 5px">
        </div> 
    </div>
    <div class="image-box d-block d-xl-none pt-4" style="flex: 0.5; text-align: center;">
        <img src="/zula_bild_1.png" alt="fahrzeug lieferung transport auto" style="max-width: 90%; max-height: 315px; border-radius: 5px">
    </div>
</section>

<!-- 
<br><a href="{{route('new-booking.create')}}"
                        style="border-radius: 5px; max-width: 350px; margin: 0 auto; display: block;"
                        class="pt-3 btn btn-secondary w-100">
                        Jetzt buchen
                    </a> -->

   
        <section class="advantage-section section-padding">
            <div class="container">
                <div class="advantage-wrapper">
                    <div class="section-head text-center pb-4 mb-3">
                        <h3 class="section-title fs-3 text-primary pb-1">Deine Vorteile mit unserem Zulassungsdienst</h3>

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
                                         Unser Zulassungsservice ist deutschlandweit für dich verfügbar.
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

                                        <h4 class="card-title fw-bold pt-1 pb-2">Schnelle Bearbeitung</h4>
                                    </div>

                                    <p class="card-para text-black">
                                    Wir kümmern uns schnell und zuverlässig um die Zulassung deines Fahrzeugs.
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

                                        <h4 class="card-title fw-bold pt-1 pb-2">Sicherer Dokumentenservice</h4>
                                    </div>

                                    <p class="card-para text-black">
                                    Deine Unterlagen werden von uns sorgfältig und vertraulich bearbeitet.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  

         <!------- HowDoesWork Section Start ------->
       <section class="how-does-work-section section-bg section-padding" style="padding: 60px 20px">
  <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
    <h3 style="color: var(--primary); margin-bottom: 60px">So funktioniert unser Zulassungsservice</h3>
    <div style="display: flex; flex-direction: row; justify-content: space-between; gap: 40px; flex-wrap: wrap;">
      
      <!-- Schritt 1 -->
      <div style="flex: 1; min-width: 280px; text-align: center;">
        <img src="/zula_1.png" alt="Wunschauto angeben" style="width: 182px; margin-bottom: 23px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
          <span style="background-color: var(--primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
            1
          </span>
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">Service online beauftragen</div>
        </div>
        <p style="font-size: 16px; color: #333;">Beauftrage unseren Zulassungsservice bequem online.</p>
      </div>

      <!-- Schritt 2 -->
      <div class="pt-3 pt-sm-0" style="flex: 1; min-width: 280px; text-align: center;">
        <img src="/zula_2.png" alt="Prüfung vor Ort" style="width: 200px; margin-bottom: 20px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
          <span style="background-color: var(--primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
            2
          </span>
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">Fahrzeugdokumente einsenden</div>
        </div>
        <p style="font-size: 16px; color: #333;">Sende uns die benötigten Fahrzeugunterlagen für die Zulassung zu.</p>
      </div>

      <!-- Schritt 3 -->
      <div class="pt-4 pt-sm-0" style="flex: 1; min-width: 280px; text-align: center;">
        <img src="/zula_3.png" alt="Zertifiziertes Gutachten" style="width: 200px; margin-bottom: 21px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
          <span style="background-color: var(--primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
            3
          </span>
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">Zulassung & Versand</div>
        </div>
        <p style="font-size: 16px; color: #333;">Wir melden dein Fahrzeug an und senden dir Kennzeichen sowie Unterlagen bequem nach Hause.</p>
      </div>
      

    </div>
    <div class="pt-3"></div><button 
                            type="button"
                            onclick="window.location.href='{{route('new-booking.create')}}'"
                            style="border-radius: 5px"
                            class="openPopup nextStep btn btn-secondary mt-4">

                        Jetzt buchen
                        <span class="btn-icon">
                            <img src="theme-1/imgs/icons/arrowr.png" alt="fahrzeug lieferung transport auto">
                        </span>
                    </button>
  </div>
</section>



        <!------- UsedCarCheck (2) OnSite Section Start ------->
        <section class="used-car-check-section-2 pt-mb-cst">
            <div class="container">
                <div class="ucc-2-wrapper mx-auto">
                    <div class="row flex-column-reverse flex-md-row align-items-center">
                        <div class="col-md-6">
                            <div class="ucc-text p-lg-5 pe-0 text-center text-md-start">
                                <h3 class="section-title fs-3 fw-bold text-primary pb-2">Bequem und unkompliziert zur Fahrzeugzulassung</h3>

                                <div class="text-grey pt-1 pb-2 mb-1"><i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                           4.9 (107 Bewertungen) </div>

                                <p class="pt-2 text-primary">
                               Mit unserem Zulassungsdienst sparst du Zeit und Aufwand – wir übernehmen die Anmeldung deines Fahrzeugs für dich.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ucc-thumb text-end">
                                <img src="zula_bild_2.png" alt="fahrzeug lieferung transport auto" style="border-radius: 5px">
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
                                     "Die Zulassung lief schnell und völlig unkompliziert. Ich musste mich um fast nichts kümmern und habe meine Unterlagen und Kennzeichen bequem erhalten."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-user icon-bg"></i>
                                    <p class="client-name">Marian Y.</p>
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
                                     "Ich wollte mir den Aufwand bei der Zulassungsstelle sparen – genau dafür war der Service perfekt. Alles lief reibungslos und wie angekündigt."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-user icon-bg"></i>
                                    <p class="client-name">Katrin S.</p>
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
                                     "Sehr zuverlässiger Service. Die Kommunikation war klar und die Anmeldung meines Fahrzeugs wurde schnell erledigt."
                                    </p>
                                </div>
                                <div class="client-info d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-user icon-bg"></i>
                                    <p class="client-name">Bernhard W.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination mini-card-pagination d-lg-none"></div>
                    </div>
                </div>

                <h3 class="testimonial-info fw-bold text-primary text-center">
                     Mehr als <span class="text-secondary">150</span> Fahrzeuge erfolgreich zugelassen!
                </h3>

                <div class="pt-3 text-center">
                    <button 
                            type="button"
                            onclick="window.location.href='{{route('new-booking.create')}}'"
                            style="border-radius: 5px"
                            class="openPopup nextStep btn btn-secondary mt-4">

                        Jetzt buchen
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





@endsection

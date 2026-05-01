@extends('mainpages.master-layout')
@section('title', 'Carspector | Wertermittlung')
@section('meta_description', 'Erhalte in 24h eine professionelle Inserat-Fahrzeugbewertung. Vermeide überhöhte Preise, erkenne Risiken und triff sichere Kaufentscheidungen.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<style>

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


</style>

    <!-- =====Main Area Start===== -->
    <main class="main-area">

    <section class="benefit-banner-section section-bg py-4 py-lg-5">
    <div class="container" style="display: flex; align-items: center;">
        <!-- Content Box -->
        <div class="content-box" style="flex: 1; padding-right: 20px;">
            <h3 class="section-title fs-3 text-primary pb-2">Inserat-Wertermittlung</h3>
            <div class="text-grey pb-2 mb-1">
                <i style="color: #f2d414" class="fa-solid fa-star"></i>
                4.8 (278)
            </div>
            <p style="max-width: 470px; margin-left: auto; margin-right: auto;">
                Du hast ein spannendes Fahrzeuginserat entdeckt, bist dir aber unsicher, ob der Preis passt? Mit unserer Inserat-Wertermittlung bekommst du eine professionelle Einschätzung des Fahrzeugpreises.
            </p>
            <a href="https://buy.stripe.com/bIYbKjf2n7rH9a0cNv?" class="btnwd nextStep btn btn-secondary mt-4">
                Jetzt buchen für nur 19 €
                <span class="btn-icon">
                    <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="inserat check prüfen lassen autoscout mobile online ebay kleinanzeigen">
                </span>
            </a>
        </div>

        <!-- Image Box -->
        <div class="image-box d-none d-xl-block" style="flex: 0.5; text-align: center;">
            <img src="/assets/imgs/iconadv/inseratwert-1.png" alt="inserat check prüfen lassen autoscout mobile online ebay kleinanzeigen" style="max-width: 100%; height: 315px; border-radius: 5px">
        </div>
    </div>
    <div class="image-box d-block d-xl-none pt-4" style="flex: 0.5; text-align: center;">
                <img src="/assets/imgs/iconadv/inseratwert-1.png" alt="inserat check prüfen lassen autoscout mobile online ebay kleinanzeigen" style="max-width: 90%; max-height: 315px; border-radius: 5px">
            </div>
</section>




        <section class="used-car-check-section-3">
            <div class="container">

            <div class="section-head text-center pb-4 mb-3">
                        <h3 class="section-title fs-3 text-primary pb-1">Inhalte der Inserat-Wertermittlung</h3>

                    </div>

                <div class="ucc-3-wrapper">
                    <div class="row g-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                                <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                    <i class="fa-regular fa-magnifying-glass"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Analyse des Inserats</h4>
                            </div>
                            <p class="card-para text-black">Wir prüfen alle wesentlichen Angaben des Fahrzeugs: Kilometerstand, Baujahr, Ausstattung, Pflegezustand und viele weitere Faktoren, die den Wert beeinflussen.</p>
                        </div>
                        
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                <i class="fa-regular fa-phone"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Telefonische Befragung</h4>
                            </div>
                            <p class="card-para text-black">Um ein noch genaueres Bild zu bekommen, klären wir in einem Telefonat mit dem Verkäufer offene Fragen und holen zusätzliche Informationen ein.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-calculator"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Marktgerechte Bewertung</h4>
                            </div>
                            <p class="card-para text-black">Wir vergleichen das Angebot mit ähnlichen Fahrzeugen auf dem Markt und berechnen einen realistischen, fairen Preis für das Inserat.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-folder-open"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Detaillierter Bewertungsbericht</h4>
                            </div>
                            <p class="card-para text-black">Sie erhalten von uns eine detaillierte Einschätzung zum Fahrzeugwert, inklusive eventueller Hinweise auf Risiken und verborgene Kosten.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-light fa-handshake"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Professionelle Einschätzung</h4>
                            </div>
                            <p class="card-para text-black">Unsere Experten bieten dir eine fundierte, professionelle Einschätzung, die auf umfassenden Marktanalysen basiert.</p>
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
                            <p class="card-para text-black">Du erhältst dein Wertgutachten innerhalb von 24 Stunden. So kannst du schnell auf Angebote reagieren und deine Kaufentscheidung zeitnah treffen.</p>
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

                    <h3 class="section-title fs-3 text-primary pb-4 mb-2">Jetzt buchen und professionelle<br class="d-none d-md-block">und faire Preiseinschätzung erhalten.</h3>



                    <a href="https://buy.stripe.com/bIYbKjf2n7rH9a0cNv?" class="btnwd btn btn-secondary benefit-banner-btn">
                        Inserat-Wertermittlung buchen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt="inserat check prüfen lassen autoscout mobile online ebay kleinanzeigen"></span>
                    </a>
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
                                <h3 class="section-title fs-3 fw-bold text-primary pb-2">Fairer Preis, innerhalb von 24h.
                                </h3>

                                <div class="text-grey pb-2 mb-1"><i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                           4.8 (278 Bewertungen) </div>

                                <p style="font-size: 18px !important" class="text-primary">
                                    Jetzt buchen und faire Preisbewertung<br>innerhalb von 24h erhalten.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ucc-thumb text-end" style="text-align: center;">
                                <img src="/assets/imgs/iconadv/inseratwert-2.png" alt="inserat check prüfen lassen autoscout mobile online ebay kleinanzeigen" style="border-radius: 5px">
                                <!-- <p class="text-center pt-1" style="color: gray; font-size: small;">Maria Burg, Beratung</p> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!------- UsedCarCheck (2) OnSite Section End ------->

        <!------- WhyIsImportant Section Start ------->
        <section class="why-is-important-section section-padding section-bg">
    <div class="container">
        <h3 class="section-title fs-3 text-primary text-center pb-4 mx-auto mb-4">
            Warum du die Inserat-Wertermittlung nutzen solltest
        </h3>

        <div class="car-check-importance-wrapper mx-auto">
            <!-- keine row mehr nötig -->
            
            <div class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium mb-3" style="border-radius: 5px">
                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center">
                    <img src="theme-1/imgs/icons/check.png" alt="besichtigung">
                </span>
                <p style="font-size: 17px; font-weight: 500">
                   Du vermeidest überhöhte Preise und erfährst, was das Fahrzeug wirklich wert ist.
                </p>
            </div>

            <div class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium mb-3" style="border-radius: 5px">
                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center">
                    <img src="theme-1/imgs/icons/check.png" alt="inserat">
                </span>
                <p style="font-size: 17px; font-weight: 500">
                    Du erkennst vor der Besichtigung, ob der Preis fair ist, und sparst unnötige Fahrten.
                </p>
            </div>

            <div class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium mb-3" style="border-radius: 5px">
                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center">
                    <img src="theme-1/imgs/icons/check.png" alt="einfach schnell">
                </span>
                <p style="font-size: 17px; font-weight: 500">
                    Unsere Analyse deckt versteckte Mängel oder Risiken auf.
                </p>
            </div>

            <div class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium mb-3" style="border-radius: 5px">
                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center">
                    <img src="theme-1/imgs/icons/check.png" alt="experteneinschätzung">
                </span>
                <p style="font-size: 17px; font-weight: 500">
                    Mit unserer Bewertung hast du ein starkes Argument für Preisverhandlungen.
                </p>
            </div>

            <div class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium mb-3" style="border-radius: 5px">
                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center">
                    <img src="theme-1/imgs/icons/check.png" alt="zeit sparen">
                </span>
                <p style="font-size: 17px; font-weight: 500">
                    Das Wertgutachten erhältst du unkompliziert innerhalb von 24 Stunden.
                </p>
            </div>

            <div class="d-flex justify-content-center pt-4 pt-mb-topt">
                <a href="https://buy.stripe.com/bIYbKjf2n7rH9a0cNv?"
                   class="btnwd btn btn-secondary benefit-banner-btn text-center">
                    Jetzt buchen
                    <span class="btn-icon">
                        <img src="theme-1/imgs/icons/arrowr.png" style="height: 21px"
                             alt="inserat check prüfen lassen autoscout mobile online ebay kleinanzeigen">
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

        
        <!------- WhyIsImportant Section End ------->

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
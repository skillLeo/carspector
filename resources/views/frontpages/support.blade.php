@extends('mainpages.master-layout')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<style>

@media (max-width: 576px) {
    .pt-mb-cst {
        padding-top: 60px;
    }

    .pt-mb-topt {
        padding-top: 40px !important;
    }
}
</style>

    <!-- =====Main Area Start===== -->
    <main class="main-area">

        <!------- Page-Header-Area Start ------->
        <section class="benefit-banner-section section-bg py-4 py-lg-5">
            <div class="container">
                <div class="content-box">
                    <h3 class="section-title fs-3 text-primary pb-2">Inserat-Check</h3>
                    <div class="text-grey pb-2 mb-1"><i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                           4.8 (544)
                    </div>
                    <p style="max-width: 470px; margin-left: auto; margin-right: auto;">Wir erstellen einen Bericht der dir hilft, die Seriosität des Angebots einzuschätzen 
                        und potenzielle Risiken zu minimieren.</p>
                        <a href="https://buy.stripe.com/eVacOn3jF27n0Du7sQ?" class="nextStep btn btn-secondary mt-4">
                            Jetzt buchen für 39 €
                            <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                        </a>
                </div>
            </div>
        </section>
        <!------- Page-Header-Area End ------->

        <section class="used-car-check-section-3">
            <div class="container">

            <div class="section-head text-center pb-4 mb-3">
                        <h3 class="section-title fs-3 text-primary pb-1">Inhalte des Inserat-Checks</h3>

                    </div>

                <div class="ucc-3-wrapper">
                    <div class="row g-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                                <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                    <i class="fa-regular fa-phone"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Telefonische Befragung</h4>
                            </div>
                            <p class="card-para text-black">Wir sammeln in einem Telefoninterview mit dem Verkäufer wichtige Informationen zum Fahrzeug, die über die Angaben im Inserat hinausgehen.</p>
                        </div>
                        
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                                <i class="fa-regular fa-magnifying-glass"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Abgleich der Inseratsangaben</h4>
                            </div>
                            <p class="card-para text-black">Wir vergleichen die im Inserat gemachten Angaben sorgfältig mit den von uns eingeholten Informationen des Verkäufers, um sicherzustellen, dass alle Details übereinstimmen.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-gear"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Fahrzeug- und Servicehistorie</h4>
                            </div>
                            <p class="card-para text-black">Wir sammeln nützliche Informationen über die Fahrzeug- und Servicehistorie. Diese Angaben helfen uns dabei, den Wartungs- und Reparaturzustand des Fahrzeugs zu bewerten.</p>
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
                            <p class="card-para text-black">Wir prüfen, ob alle relevanten Dokumente wie z.B. Fahrzeugbrief, TÜV-Bescheinigung, etc. aktuell und vorhanden sind.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-light fa-handshake"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Verkaufsbedingungen</h4>
                            </div>
                            <p class="card-para text-black">Wir klären die Verkaufsbedingungen, um sicherzustellen, dass alle Punkte klar und verständlich sind.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-calculator"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Preiseinschätzung</h4>
                            </div>
                            <p class="card-para text-black">Wir prüfen, ob es sich um einen fairen und der Marktlage entsprechenden Verkaufspreis handelt.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-star"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Anbieterbewertung</h4>
                            </div>
                            <p class="card-para text-black">Wir analysieren die Reputation des Verkäufers, damit du mit Vertrauen kaufen kannst.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card-item text-primary d-flex flex-column justify-content-between text-center bg-white">
                            <div class="card-item-head">
                            <span class="icon mb-1" style="font-size: 2.5rem; background-color: #F0F5FA; padding: 0.5rem 1rem; border-radius: 5px; display: inline-block;">
                            <i class="fa-regular fa-square-question"></i>
                                </span>
                                <h4 class="card-title fw-bold pt-1 pb-2">Deine Wünsche und Fragen</h4>
                            </div>
                            <p class="card-para text-black">Wir stellen deine gewünschten Fragen und beschaffen deine gewünschten Informationen.</p>
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

                    <h3 class="section-title fs-3 text-primary pb-4 mb-2">Jetzt buchen <br>und profitieren.</h3>



                    <a href="https://buy.stripe.com/eVacOn3jF27n0Du7sQ?" class="btn btn-secondary benefit-banner-btn">
                        Inserat-Check buchen
                        <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
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
                                <h3 class="section-title fs-3 fw-bold text-primary pb-2">Analyse innerhalb von 24h!
                                </h3>

                                <div class="text-grey pb-2 mb-1"><i style="color: #f2d414" class="fa-solid fa-star"></i>
                                                           4.8 (544 Bewertungen) </div>

                                <p class="text-primary">
                                    Jetzt buchen und zusätzliche Sicherheit<br>innerhalb von 24h erhalten.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ucc-thumb text-end" style="text-align: center;">
                                <img src="theme-1/imgs/inserat/2.png" alt="Check Used Car" style="border-radius: 5px">
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
                <h3 class="section-title fs-3 text-primary text-center pb-4 mx-auto mb-2">Warum du den Inserat-Check nutzen solltest</h3>

                <div class="car-check-importance-wrapper mx-auto">
                    <div class="row g-3 g-sm-4">
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt=">"></span>
                                <p>Spare dir unnötige Besichtigungen</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                        src="theme-1/imgs/icons/check.png" alt=">"></span>

                                <p>Erfahre mehr, als im Inserat steht</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt=">"></span>

                                <p>Einfach & schnell</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt=">"></span>

                                <p>Experteneinschätzung</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt=">"></span>

                                <p>Zeitersparnis</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="car-check-importance d-flex align-items-center gap-4 bg-white text-primary fw-medium">
                                <span class="list-icon flex-shrink-0 d-inline-flex align-items-center"><img
                                src="theme-1/imgs/icons/check.png" alt=">"></span>

                                <p>Innerhalb von 24h</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center pt-4 pt-mb-topt">
                            <a href="https://buy.stripe.com/eVacOn3jF27n0Du7sQ?" class="btn btn-secondary benefit-banner-btn text-center">
                                Jetzt buchen
                                <span class="btn-icon"><img src="theme-1/imgs/icons/arrowr.png" style="height: 21px" alt=""></span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        
        <!------- WhyIsImportant Section End ------->

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
    <!-- =====Main Area End===== -->

    @endsection
@extends('mainpages.master-layout')
@section('title', 'Carspector | Preise')
@section('meta_description', 'Unsere Preise auf einen Blick – transparente Kosten für Fahrzeugprüfungen aller Art. Ohne versteckte Gebühren, inklusive Anfahrt & MwSt.')
@section('header')
    @include('partials.index-header')
@endsection

@section('content')
<style>
    .hero-blue-section {
        background-color:rgb(240, 244, 247);
        padding: 3rem 1rem 2rem;
    }

    .price-section {
        background-color: #ffffff;
        padding: 3rem 1rem;
    }

    .section-title h2 {
        font-size: 3rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .price-card {
        background: #f9f9f9;
        border-radius: 1.25rem;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.08);
        padding: 2.25rem 1.75rem;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid #e5e5e5;
    }

    .price-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 45px rgba(0, 0, 0, 0.15);
    }

    .price-tag {
        font-size: 1.35rem;
        font-weight: bold;
        color: var(--primary);
    }

    .service-title {
        font-size: 1.6rem;
        font-weight: 600;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.6rem;
        flex-wrap: nowrap;
        margin-bottom: 1rem;
        text-align: center;
    }

    .icon-circle {
        position: relative;
        width: 50px;
        height: 50px;
        background: #e1f0fb;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
    }

    .icon-circle i {
        color: var(--primary);
        font-size: 1.3rem;
    }

    .icon-tag {
        position: absolute;
        top: -12px;
        font-size: 0.65rem;
        color: var(--primary);
        font-weight: 600;
        text-align: center;
        width: 100%;
    }

    .xl-xxl-wrapper {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        align-items: center;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    .xl-col, .xxl-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 1rem;
    }

    .divider-desktop {
        font-weight: bold;
        font-size: 1.3rem;
        color: #999;
    }

     .btn-sm-custom {
        padding: 1rem 2rem;
        font-size: 1rem;
        border-radius: 6px;
        font-weight: 500;
    }

    .info-box-toggle {
        background: #f9f9f9;
        border-left: 4px solid var(--primary);
        border-radius: 8px;
        margin: 1.5rem auto 2.5rem;
        text-align: center;
        max-width: 450px;
        border: 1px solid #ccc;
    }

    .info-box-toggle summary {
        padding: 1rem 1.5rem;
        cursor: pointer;
        font-weight: bold;
        color: var(--primary);
    }

    .info-box-toggle p {
        padding: 0 1.5rem 1rem;
        margin: 0;
    }

    @media (max-width: 576px) {
        .service-title {
            flex-direction: row;
            justify-content: center;
            font-size: 1.35rem;
        }

        .xl-xxl-wrapper {
            flex-direction: row;
            gap: 1.2rem;
        }

        .divider-desktop {
            font-size: 1.1rem;
        }
    }

 .section-bg {
  background: #f2f7fc !important;
}
</style>

<main class="main-area">
    <section class="section-bg hero-blue-section">
        <div class="container">
            <div class="text-center section-title">
                <h2 class="text-primary">Preise</h2>
                <p class="text-muted">Unsere Leistungen im Überblick</p>
            </div>
        </div>
    </section>

            <section class="price-section">
        <div class="container">
            <div class="text-center mt-1 mb-4">
                <h3 style="font-size: 30px !important; letter-spacing: -0.5px" class="fw-bold">Gebrauchtwagencheck</h3>
            </div>

            <details style="border-radius: 5px" class="info-box-toggle">
                <summary>Was ist der Unterschied zwischen XL und XXL?</summary>
                <p>
                    Neben dem umfassenden Gebrauchtwagencheck der XL-Variante beinhaltet die XXL-Variante zusätzlich eine Marktwertanalyse, eine Kalkulation bevorstehender Kosten sowie festgestellter Minderwerte. Darüber hinaus erfolgt eine Abfrage der Fahrgestellnummer, die detaillierte Informationen zu Fahrzeugausstattung, digitalen Servicenachweisen und gegebenenfalls vorhandenen Unfallberichten liefert.
                </p>
            </details>

            <div class="row pt-2 g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-car-side"></i>
                                </div>
                                Auto/ PKW
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">299 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('gebrauchtwagencheck') }}" style="border-radius: 5px" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-van-shuttle"></i>
                                </div>
                                Transporter
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('transporter') }}" style="border-radius: 5px" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <img src="/oldtimer_car.png" alt="Oldtimer" width="30" height="30">
                                </div>
                                Oldtimer
                            </div>
                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('oldtimer') }}" style="border-radius: 5px" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <img src="/sportscar.png" alt="Sportwagen" width="32" height="32">
                                </div>
                                Sportwagen
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('sportwagen') }}" style="border-radius: 5px" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                 <div class="icon-circle">
                                    <img src="/rv_car.png" alt="Wohnmobil" width="30" height="30">
                                </div>
                                Wohnmobil
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">449 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('wohnmobil') }}" style="border-radius: 5px" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <i class="fa-solid fa-bolt"></i>
                                </div>
                                Elektro/ Hybrid
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">349 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">399 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="https://carspector.de/elektro" style="border-radius: 5px" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding-top: 75px; margin-bottom: 35px" class="text-center">
    <h3 style="font-size: 30px !important; letter-spacing: -0.5px" class="fw-bold">Weitere Leistungen</h3>
</div>

<div class="row g-4">

<div class="col-md-6 col-lg-4">
                    <div class="price-card">
                        <div>
                            <div class="service-title">
                                <div class="icon-circle">
                                    <img src="/handshake_kaufbegleitung.png" alt="Kaufbegleitung" width="28" height="28">
                                </div>
                                Kaufbegleitung
                            </div>

                            <div class="xl-xxl-wrapper">
                                <div class="xl-col">
                                    <span class="label">XL</span>
                                    <span class="pt-1 price-tag">329 €</span>
                                </div>
                                <div class="divider-desktop">|</div>
                                <div class="xxl-col">
                                    <span class="label">XXL</span>
                                    <span class="pt-1 price-tag">379 €</span>
                                </div>
                            </div>
                        </div>

                        <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. Anfahrt und MwSt.</p>
                        <div class="mt-4">
                            <a href="{{ route('kaufbegleitung') }}" style="border-radius: 5px" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
                        </div>
                    </div>
                </div>

<div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div>
                <div class="service-title">
                    <div class="icon-circle">
                        <i class="fa fa-search"></i>
                    </div>
                    FIN-Abfrage
                </div>
                <div class="xl-xxl-wrapper">
                    <div class="xl-col">
                        <span class="price-tag">auf Anfrage</span>
                    </div>
                </div>
            </div>
            <p class="pt-3" style="font-size: 15.5px; color: #666">FIN abfragen und Angebot erhalten</p>
            <div class="mt-4">
                <a href="https://carspector.de/fin-abfrage" style="border-radius: 5px"  class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div>
                <div class="service-title">
                    <div class="icon-circle">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                    Inserat-Check
                </div>
                <div class="xl-xxl-wrapper">
                    <div class="xl-col">
                        <span class="price-tag">39 €</span>
                    </div>
                </div>
            </div>
            <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. MwSt.</p>
            <div class="mt-4">
                <a href="{{ route('inseratcheck') }}" style="border-radius: 5px" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div>
                <div class="service-title">
                    <div class="icon-circle">
                        <i class="fa-solid fa-list-ul"></i>
                    </div>
                    Inserat-Vergleich
                </div>
                <div class="xl-xxl-wrapper">
                    <div class="xl-col">
                        <span class="price-tag">je 9 €</span>
                    </div>
                </div>
            </div>
            <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. MwSt.</p>
            <div class="mt-4">
                <a href="{{ route('inseratvergleich') }}" style="border-radius: 5px"  class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
            </div>
        </div>
    </div>

    <!-- <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div>
                <div class="service-title">
                    <div class="icon-circle">
                        <i class="fa-solid fa-euro-sign"></i>
                    </div>
                    Wertermittlung
                </div>
                <div class="xl-xxl-wrapper">
                    <div class="xl-col">
                        <span class="price-tag">19 €</span>
                    </div>
                </div>
            </div>
            <p class="pt-3" style="font-size: 15.5px; color: #666">inkl. MwSt.</p>
            <div class="mt-4">
                <a href="{{ route('wertermittlung') }}" style="border-radius: 5px"  class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
            </div>
        </div>
    </div> -->

    <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div>
                <div class="service-title">
                    <div class="icon-circle">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    Fahrzeug-Lieferung
                </div>
                <div class="xl-xxl-wrapper">
                    <div class="xl-col">
                        <span class="price-tag">auf Anfrage</span>
                    </div>
                </div>
            </div>
            <p class="pt-3" style="font-size: 15.5px; color: #666">Erhalte ein unverbindliches Angebot.</p>
            <div class="mt-4">
                <a href="{{ route('fahrzeuglieferung') }}" style="border-radius: 5px"  class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div>
                <div class="service-title">
                    <div class="icon-circle">
                        <i class="fa-solid fa-file-signature"></i>
                    </div>
                    Kaufabwicklung
                </div>
                <div class="xl-xxl-wrapper">
                    <div class="xl-col">
                        <span class="price-tag">auf Anfrage</span>
                    </div>
                </div>
            </div>
            <p class="pt-3" style="font-size: 15.5px; color: #666">Erhalte ein unverbindliches Angebot.</p>
            <div class="mt-4">
                <a href="{{ route('kaufabwicklung') }}" style="border-radius: 5px" class="btn btn-primary btn-sm-custom">Mehr erfahren</a>
            </div>
        </div>
    </div>

    <!-- <div class="col-md-6 col-lg-4">
        <div class="price-card">
            <div>
                <div class="service-title">
                    <div class="icon-circle">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    Kfz-Kaufvertrag
                </div>
                <div class="xl-xxl-wrapper">
                    <div class="xl-col">
                        <span class="price-tag">0 €</span>
                    </div>
                </div>
            </div>
            <p class="pt-3" style="font-size: 15.5px; color: #666">Komplett kostenlos.</p>
            <div class="mt-4">
                <a href="/Kfz-Kaufvertrag.pdf" style="border-radius: 5px" class="btn btn-primary btn-sm-custom" target="_blank">Jetzt herunterladen</a>
            </div>
        </div>
    </div>
     -->
</div>



        </div>

        
    </section>





    <!-- <hr class="my-5">
                    <section style="padding-bottom: 30px">
                        <div class="container">
                            <h4 style="font-size: 32px !important; letter-spacing: -0.5px" class="text-center mb-5">Du hast Fragen?</span></h4>
                            <div class="row justify-content-center g-4">
                                <div class="col-sm-6 col-md-4">
                                    <div class="contact-card text-center">
                                        <i style="font-size: 30px" class="fa-regular fa-phone text-primary"></i>
                                        <div class="title">Telefon</div>
                                        <div class="text pt-1 mb-3">Ruf uns einfach an</div>
                                        <a href="tel:+4921192325550" class="btn btn-primary btn-sm px-4">Jetzt anrufen</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="contact-card text-center">
                                        <i class="fab fa-whatsapp text-success"></i>
                                        <div class="title">WhatsApp</div>
                                        <div class="text pt-1 mb-3">Chatte direkt mit unserem Team</div>
                                        <a href="https://wa.me/+4915774993273?text=Hey%20Carspector!" class="btn btn-success btn-sm px-4">Jetzt schreiben</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="contact-card text-center">
                                        <i class="fa-regular fa-envelope text-primary"></i>
                                        <div class="title">E-Mail</div>
                                        <div class="text pt-1 mb-3">Wir antworten innerhalb kurzer Zeit</div>
                                        <a href="mailto:info@carspector.de" class="btn btn-primary btn-sm px-4">E-Mail schreiben</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->

</main>
@endsection

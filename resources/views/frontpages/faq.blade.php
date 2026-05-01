@extends('mainpages.master-layout')
@section('title', 'Carspector | FAQ')
@section('meta_description', 'Antworten auf die häufigsten Fragen zum Ablauf, zur Buchung, zur Prüfung und zu den Kosten beim Gebrauchtwagencheck mit Carspector.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<style>
@media (min-width: 500px) {
    .btnds {
        width: 400px !important;
    }
}

.mwdith {
    max-width: 450px !important;
}

.faq-wrapper .row {
    justify-content: center;
}

.bthov:hover {
    border: 1px solid var(--primary) !important;
}

.bthov {
    color: black !important;
}
/* Button-Anpassungen */

.btn-outline-primary {
    border: 1px solid #ccc !important;
}

.contact-card {
        transition: all 0.3s ease-in-out;
        border-radius: 1rem;
        background-color:#f9f9f9; /* etwas dunkleres Grau-Blau */
        padding: 2rem 1rem;
        box-shadow: 0 8px 12px rgba(0,0,0,0.08); /* stärkerer Shadow */
        height: 100%;
    }

    .contact-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }

    .contact-card i {
        font-size: 2.2rem;
        margin-bottom: 1rem;
    }

    .contact-card .title {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .contact-card .text {
        font-size: 0.95rem;
        color: #495057;
    }

    @media (max-width: 767px) {
    .contact-form-card .form-control,
    .contact-form-card textarea {
        background-color: #f4f4f4 !important;
    }
}

 @media (max-width: 550px) {
    .fs-header {
        font-size: 40px !important;
    }
 }

.disabled-btn {
    pointer-events: none;
    background-color: #e0e0e0 !important;
    color: #999 !important;
    border-color: #ccc !important;
    cursor: not-allowed;
}


</style>

<main class="main-area">
    <section class="faq-box pb-3">
        <div class="container">
            <div class="contentBox pb-5">
                <div class="faq-wrapper">
                    <div class="step-item--header mb-5 pb-2 pt-5">
                        <h2 style="font-size: 45px" class="fs-header pb-1 text-primary">Hilfebereich / FAQ</h2>
                        <p class="text-grey">Wähle einen Themenbereich</p>
                    </div>

                    <!-- Themenbereiche -->
                    <div class="row">
                        <div class="mwdith col-md-6 mb-3">
                            <a href="{{ route('faq.allgemein') }}" style="border-radius: 5px; height: 80px; box-shadow: none !important; background-color: #fcfcfd" class="bthov btn btn-outline-primary w-100">Allgemeines & Angebot</a>
                        </div>
                        <div class="mwdith col-md-6 mb-3">
                            <a href="{{ route('faq.ablauf') }}" style="border-radius: 5px; height: 80px; box-shadow: none !important; background-color: #fcfcfd" class="bthov btn btn-outline-primary w-100">Fahrzeugprüfung & Ablauf</a>
                        </div>
                        <div class="mwdith col-md-6 mb-3">
                            <a href="{{ route('faq.zahlung') }}" style="border-radius: 5px; height: 80px; box-shadow: none !important; background-color: #fcfcfd" class="bthov btn btn-outline-primary w-100">Preise & Zahlung</a>
                        </div>
                        <div class="mwdith col-md-6 mb-3">
                            <a href="{{ route('faq.buchung') }}" style="border-radius: 5px; height: 80px; box-shadow: none !important; background-color: #fcfcfd" class="bthov btn btn-outline-primary w-100">Buchung & Termin</a>
                        </div>
                                          <!-- 
                        <div class="mwdith col-md-6 mb-3">
                            <a href="" style="border-radius: 5px; height: 80px; box-shadow: none !important; background-color: #fcfcfd" class="disabled-btn bthov btn btn-outline-primary w-100">Bald verfügbar</a>
                        </div>
                        <div class="mwdith col-md-6 mb-3">
                            <a href="" style="border-radius: 5px; height: 80px; box-shadow: none !important; background-color: #fcfcfd" class="disabled-btn bthov btn btn-outline-primary w-100">Bald verfügbar</a>
                        </div>
                        <div class="mwdith col-md-6 mb-3">
                            <a href="" style="border-radius: 5px; height: 80px; box-shadow: none !important; background-color: #fcfcfd" class="disabled-btn bthov btn btn-outline-primary w-100">Bald verfügbar</a>
                        </div>
      
                        <div class="mwdith col-md-6 mb-3">
                            <a href="" style="height: 90px; box-shadow: none !important; background-color: #fcfcfd" class="disabled-btn bthov btn btn-outline-primary w-100">Gutachten & Ergebnis</a>
                        </div>
                        <div class="mwdith col-md-6 mb-3">
                            <a href="" style="height: 90px; box-shadow: none !important; background-color: #fcfcfd" class="disabled-btn bthov btn btn-outline-primary w-100">Stornierung & Änderungen</a>
                        </div>
                        <div class="mwdith col-md-6 mb-3">
                            <a href="" style="height: 90px; box-shadow: none !important; background-color: #fcfcfd" class="disabled-btn bthov btn btn-outline-primary w-100">Technik & Website</a>
                        </div>
                        <div class="mwdith col-md-6 mb-3">
                            <a href="" style="height: 90px; box-shadow: none !important; background-color: #fcfcfd" class="disabled-btn bthov btn btn-outline-primary w-100">Datenschutz & Sicherheit</a>
                        </div>
                        <div class="mwdith col-md-6 mb-3">
                            <a href="" style="height: 90px; box-shadow: none !important; background-color: #fcfcfd" class="disabled-btn bthov btn btn-outline-primary w-100">Für Händler</a>
                        </div>-->
                    </div>

                    <!-- Supportbereich -->
                    <hr class="my-5">
                    <section style="padding-bottom: 25px">
                        <div class="container">
                            <h4 style="font-size: 32px !important; letter-spacing: -0.5px" class="text-center mb-5">Du hast weitere Fragen?</span></h4>
                            <div class="row justify-content-center g-4">
                                <div class="col-sm-6 col-md-4">
                                    <div class="contact-card text-center">
                                        <i style="font-size: 30px" class="fa-regular fa-phone text-primary"></i>
                                        <div class="title">Telefon</div>
                                        <div class="text pt-1 mb-3">Ruf uns einfach an</div>
                                        <a href="tel:+4921192325550" style="border-radius: 5px" class="btn btn-primary btn-sm px-4">Jetzt anrufen</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="contact-card text-center">
                                        <i class="fab fa-whatsapp text-success"></i>
                                        <div class="title">WhatsApp</div>
                                        <div class="text pt-1 mb-3">Chatte direkt mit unserem Team</div>
                                        <a href="https://wa.me/+4915774993273?text=Hey%20Carspector!" style="border-radius: 5px" class="btn btn-success btn-sm px-4">Jetzt schreiben</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

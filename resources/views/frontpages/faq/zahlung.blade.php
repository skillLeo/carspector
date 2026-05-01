@extends('mainpages.master-layout')
@section('title', 'Carspector | FAQ zur Zahlung')
@section('meta_description', 'Infos zu unseren Zahlungsmöglichkeiten, dem sicheren Bezahlvorgang und dem Erhalt deiner Rechnung nach der Buchung.')
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

        .accordion-item {
    box-shadow: none !important;
    border: 1px solid #ccc !important;
    border-radius: 8px;
    margin-bottom: 15px !important;
    overflow: hidden;
    transition: border-color 0.2s ease;
}

/* Standard Button */
.accordion-button {
    background-color: #fcfcfd;
    font-weight: 600;
    height: 70px;
    padding: 1rem 1.25rem;
    color: #333;
    border: none;
    box-shadow: none;
    transition: background-color 0.2s ease, border 0.2s ease;
}

/* Eingeklappter Zustand */
.accordion-button.collapsed {
    background-color: #fcfcfd;
}



/* Geöffneter Zustand */
.accordion-button:not(.collapsed) {
    background-color: #e9f3ff !important;  /* sanftes Blau */
    border: none !important;              /* Rahmen komplett entfernt */
    border-radius: 8px 8px 0 0;
    color: #333;
}

/* Fokus-Effekt deaktivieren */
.accordion-button:focus {
    outline: none;
    box-shadow: none;
}

/* Accordion Inhalt */
.accordion-body {
    background-color: #fff;
    padding: 1rem 1.25rem;
    font-size: 0.95rem;
    line-height: 1.6;
    border-top: none !important;
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

.small-button {
    font-size: 1rem;
    padding: 1.25rem 2rem;
    line-height: 1.2;
}
</style>

    <main class="main-area">
        <!------- My-Profile-wrapper Start ------->
        <section class="pb-4 faq-box">
            <div class="container">
                <div class="contentBox">
                    <div class="faq-wrapper">
                        <!-- step-item -->
                        <div class="faq-inner">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="/faq">Hilfebereich</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Preise & Zahlung</li>
                                </ol>
                            </nav>
                            <div class="step-item--header mb-5 pb-1">
                                <h2 style="font-size: 40px !important" class="text-primary">Preise & Zahlung</h2>
                            </div>
                            <div class="faq-content">
                                <div class="faq-block">


                                    <div class="faq-items">
                                        <div class="faq-accordion mx-auto">
                                            <div class="accordion" id="accordionFlushExample">

                                                <div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-18" aria-expanded="false" aria-controls="faq-18">
      Was kostet eine Fahrzeugprüfung bei Carspector?
    </button>
  </h2>
  <div id="faq-18" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Der Preis <b>richtet sich nach dem gewählten Paket (XL oder XXL) und dem Fahrzeugtyp</b>. Unsere Preisstruktur ist transparent und beinhaltet bereits alle Kosten – inklusive Anfahrt. 
      Eine vollständige Übersicht findest du hier: <a href="{{ route('preise') }}">Preise</a>.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-19" aria-expanded="false" aria-controls="faq-19">
      Gibt es Preisunterschiede je nach Fahrzeugtyp oder Standort?
    </button>
  </h2>
  <div id="faq-19" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Ja – abhängig vom Fahrzeugtyp</b> (z. B. Wohnmobil oder Oldtimer) unterscheiden sich die Preise, da der Prüfaufwand variiert. Der Standort spielt dagegen keine Rolle: Unsere deutschlandweite Anfahrt ist bereits im Preis inbegriffen.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-20" aria-expanded="false" aria-controls="faq-20">
      Muss ich im Voraus zahlen oder erst nach der Prüfung?
    </button>
  </h2>
  <div id="faq-20" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Die Zahlung erfolgt <b>direkt bei der Buchung – bequem online</b>. So können wir den Auftrag sofort bearbeiten und umgehend mit der Terminvereinbarung starten.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-21" aria-expanded="false" aria-controls="faq-21">
      Bekomme ich eine Rechnung mit ausgewiesener Mehrwertsteuer?
    </button>
  </h2>
  <div id="faq-21" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Selbstverständlich</b>. Du erhältst deine Rechnung automatisch per E-Mail direkt nach der Buchung. Sie enthält alle steuerlich relevanten Angaben, inklusive ausgewiesener Mehrwertsteuer – ideal auch für Unternehmen und gewerbliche Kunden.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-22" aria-expanded="false" aria-controls="faq-22">
      Gibt es Rabatte bei mehreren Buchungen oder für Händler?
    </button>
  </h2>
  <div id="faq-22" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Ja!</b> Für Händler, Fuhrparks oder Vielnutzer bieten wir attraktive Konditionen über unser Partnerprogramm. Sprich uns einfach an oder sende eine Anfrage an <a href="mailto:partner@carspector.de">partner@carspector.de</a> – wir finden eine faire Lösung für deinen Bedarf.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-25" aria-expanded="false" aria-controls="faq-25">
      Kostet die Buchung zusätzliche Gebühren?
    </button>
  </h2>
  <div id="faq-25" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Nein</b>. Der auf unserer Website angegebene Preis ist ein <b>Festpreis – inklusive Anfahrt, Mehrwertsteuer und aller Leistungen</b> laut Paketbeschreibung. Du hast volle Kostentransparenz von Anfang an.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-24" aria-expanded="false" aria-controls="faq-24">
      Welche Zahlungsmethoden kann ich nutzen?
    </button>
  </h2>
  <div id="faq-24" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Du kannst bequem mit allen gängigen Zahlungsmethoden bezahlen – darunter <b>PayPal, Kreditkarte (z. B. VISA), Klarna sowie Apple Pay</b>. Falls deine Wunsch-Zahlungsart nicht verfügbar ist, 
      <a href="{{ route('kontakt') }}">kontaktiere</a> uns gerne und wir finden eine Lösung.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-23" aria-expanded="false" aria-controls="faq-23">
      Fallen zusätzliche Kosten bei Express-Terminen oder ländlichen Regionen an?
    </button>
  </h2>
  <div id="faq-23" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Nein</b> – unsere Preise sind <b>Festpreise</b>. Es gibt keine versteckten Zusatzkosten für Expressbearbeitung, kurzfristige Termine oder abgelegene Orte. Fairness und Transparenz stehen bei uns an erster Stelle.
    </div>
  </div>
</div>




                                            <div class="pt-4 text-center">
                                                <a href="{{ route('faq') }}" style="border-radius: 5px" class="btn small-button btn-primary mt-2">
                                                    <i class="fas fa-arrow-left me-2"></i> Zurück zum Hilfebereich
                                                </a>
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-5">
                    <section>
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
                        <!-- step-item-end -->

                    </div>
                </div>
            </div>
            </div>
        </section>
        <!------- My-Profile-wrapper End ------->


    </main>
@endsection

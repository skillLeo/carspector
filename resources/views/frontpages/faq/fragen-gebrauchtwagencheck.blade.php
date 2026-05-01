@extends('mainpages.master-layout')
@section('title', 'Carspector | FAQ zum Gebrauchtwagencheck')
@section('meta_description', 'Wie läuft ein Gebrauchtwagencheck ab? Alle Antworten zu Ablauf, Dauer, Prüfpunkten und Kosten findest du hier im FAQ.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Was ist ein Gebrauchtwagencheck?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ein Gebrauchtwagencheck ist eine unabhängige Prüfung eines Fahrzeugs vor dem Kauf. Dabei wird der technische, optische und rechtliche Zustand des Autos beurteilt – inklusive Karosserie, Elektronik, Historie und Dokumentation. Ziel ist es, Risiken zu erkennen und eine fundierte Kaufentscheidung zu ermöglichen."
      }
    },
    {
      "@type": "Question",
      "name": "Warum ist ein Gebrauchtwagencheck vor dem Kauf sinnvoll?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ein Gebrauchtwagencheck schützt vor versteckten Mängeln, Tachomanipulation und teuren Reparaturen nach dem Kauf. Er liefert eine objektive Einschätzung des Fahrzeugzustands und hilft, Fehlkäufe zu vermeiden – vor allem bei privaten Verkäufen oder unübersichtlichen Inseraten."
      }
    },
    {
      "@type": "Question",
      "name": "Wer bietet einen Gebrauchtwagencheck beim Verkäufer vor Ort an?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Carspector bietet deutschlandweit mobile Gebrauchtwagenchecks direkt beim Verkäufer an. Dabei kommen qualifizierte Kfz-Experten zum Fahrzeugstandort und prüfen das Auto unabhängig, ohne dass der Käufer selbst anreisen muss."
      }
    },
    {
      "@type": "Question",
      "name": "Wie läuft ein Gebrauchtwagencheck ab?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Nach der Online-Buchung übernimmt Carspector die Terminabsprache mit dem Verkäufer. Ein Prüfer fährt zum Standort, führt den Check durch und erstellt einen Prüfbericht mit Fotos, Marktwert und allen relevanten Befunden – dieser wird dir per E-Mail zugeschickt."
      }
    },
    {
      "@type": "Question",
      "name": "Was kostet ein Gebrauchtwagencheck?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Die Kosten für einen Gebrauchtwagencheck bei Carspector liegen je nach Fahrzeugklasse und Leistungspaket zwischen etwa 199 € und 399 €. Der Preis variiert je nach Umfang – von Basisprüfung bis hin zur Marktwertanalyse und OBD-Diagnose."
      }
    },
    {
      "@type": "Question",
      "name": "Was wird beim Gebrauchtwagencheck alles geprüft?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Geprüft werden unter anderem: Karosserie, Lack, Unterboden, Elektronik, Antrieb, Innenraum, Reifen, Dokumente und Kilometerstand. Je nach Fahrzeugklasse und Paket variiert der Umfang – alle Ergebnisse werden im Bericht transparent dokumentiert."
      }
    },
    {
      "@type": "Question",
      "name": "Wie lange dauert ein Gebrauchtwagencheck vor Ort?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Die reine Vor-Ort-Prüfung dauert etwa 60 bis 90 Minuten. Inklusive Terminorganisation und Berichtversand dauert der gesamte Prozess im Durchschnitt 2 bis 4 Werktage – je nach Verfügbarkeit des Verkäufers."
      }
    },
    {
      "@type": "Question",
      "name": "Kann man einen Gebrauchtwagencheck deutschlandweit buchen?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ja, Carspector bietet Gebrauchtwagenchecks flächendeckend in ganz Deutschland an. Egal ob in Berlin, Hamburg, München oder kleineren Städten – unsere Prüfer sind bundesweit verfügbar."
      }
    },
    {
      "@type": "Question",
      "name": "Kann ein Gebrauchtwagencheck Tachomanipulation erkennen?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ja, durch den Einsatz von OBD2-Diagnosegeräten und das Fachwissen unserer Prüfer können verdächtige Kilometerstände und Manipulationsversuche erkannt und im Bericht dokumentiert werden."
      }
    }
  ]
}
</script>

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
                                    <li class="breadcrumb-item active" aria-current="page">Fragen zum Gebrauchtwagen-Check</li>
                                </ol>
                            </nav>
                            <div class="step-item--header mb-5 pb-1">
                                <h2 style="font-size: 40px !important" class="text-primary">Häufige Fragen zum Gebrauchtwagen-Check</h2>
                            </div>
                            <div class="faq-content">
                                <div class="faq-block">


                                    <div class="faq-items">
                                        <div class="faq-accordion mx-auto">
                                            <div class="accordion" id="accordionFlushExample">

                                             <div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-18" aria-expanded="false" aria-controls="faq-18">
      Was ist ein Gebrauchtwagencheck?
    </button>
  </h2>
  <div id="faq-18" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Ein Gebrauchtwagencheck ist eine unabhängige Prüfung eines Fahrzeugs vor dem Kauf. Dabei wird der technische, optische und rechtliche Zustand des Autos beurteilt – inklusive Karosserie, Elektronik, Historie und Dokumentation. Ziel ist es, Risiken zu erkennen und eine fundierte Kaufentscheidung zu ermöglichen.
    </div>
  </div>
</div>

<div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-19" aria-expanded="false" aria-controls="faq-19">
      Warum ist ein Gebrauchtwagencheck vor dem Kauf sinnvoll?
    </button>
  </h2>
  <div id="faq-19" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Ein Gebrauchtwagencheck schützt vor versteckten Mängeln, Tachomanipulation und teuren Reparaturen nach dem Kauf. Er liefert eine objektive Einschätzung des Fahrzeugzustands und hilft, Fehlkäufe zu vermeiden – vor allem bei privaten Verkäufen oder unübersichtlichen Inseraten.
    </div>
  </div>
</div>

<div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-20" aria-expanded="false" aria-controls="faq-20">
      Wer bietet einen Gebrauchtwagencheck beim Verkäufer vor Ort an?
    </button>
  </h2>
  <div id="faq-20" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Carspector bietet deutschlandweit mobile Gebrauchtwagenchecks direkt beim Verkäufer an. Dabei kommen qualifizierte Kfz-Experten zum Fahrzeugstandort und prüfen das Auto unabhängig, ohne dass der Käufer selbst anreisen muss.
    </div>
  </div>
</div>

<div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-21" aria-expanded="false" aria-controls="faq-21">
      Wie läuft ein Gebrauchtwagencheck ab?
    </button>
  </h2>
  <div id="faq-21" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Nach der Online-Buchung übernimmt Carspector die Terminabsprache mit dem Verkäufer. Ein Prüfer fährt zum Standort, führt den Check durch und erstellt einen Prüfbericht mit Fotos, Marktwert und allen relevanten Befunden – dieser wird dir per E-Mail zugeschickt.
    </div>
  </div>
</div>

<div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-22" aria-expanded="false" aria-controls="faq-22">
      Was kostet ein Gebrauchtwagencheck?
    </button>
  </h2>
  <div id="faq-22" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Die Kosten für einen Gebrauchtwagencheck bei Carspector liegen je nach Fahrzeugklasse und Leistungspaket zwischen etwa 199 € und 399 €. Der Preis variiert je nach Umfang – von Basisprüfung bis hin zur Marktwertanalyse und OBD-Diagnose.
    </div>
  </div>
</div>

<div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-23" aria-expanded="false" aria-controls="faq-23">
      Was wird beim Gebrauchtwagencheck alles geprüft?
    </button>
  </h2>
  <div id="faq-23" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Geprüft werden unter anderem: Karosserie, Lack, Unterboden, Elektronik, Antrieb, Innenraum, Reifen, Dokumente und Kilometerstand. Je nach Fahrzeugklasse und Paket variiert der Umfang – alle Ergebnisse werden im Bericht transparent dokumentiert.
    </div>
  </div>
</div>

<div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-24" aria-expanded="false" aria-controls="faq-24">
      Wie lange dauert ein Gebrauchtwagencheck vor Ort?
    </button>
  </h2>
  <div id="faq-24" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Die reine Vor-Ort-Prüfung dauert etwa 60 bis 90 Minuten. Inklusive Terminorganisation und Berichtversand dauert der gesamte Prozess im Durchschnitt 2 bis 4 Werktage – je nach Verfügbarkeit des Verkäufers.
    </div>
  </div>
</div>

<div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-25" aria-expanded="false" aria-controls="faq-25">
      Kann man einen Gebrauchtwagencheck deutschlandweit buchen?
    </button>
  </h2>
  <div id="faq-25" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Ja, Carspector bietet Gebrauchtwagenchecks flächendeckend in ganz Deutschland an. Egal ob in Berlin, Hamburg, München oder kleineren Städten – unsere Prüfer sind bundesweit verfügbar.
    </div>
  </div>
</div>

<div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-26" aria-expanded="false" aria-controls="faq-26">
      Kann ein Gebrauchtwagencheck Tachomanipulation erkennen?
    </button>
  </h2>
  <div id="faq-26" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Ja, durch den Einsatz von OBD2-Diagnosegeräten und das Fachwissen unserer Prüfer können verdächtige Kilometerstände und Manipulationsversuche erkannt und im Bericht dokumentiert werden.
    </div>
  </div>
</div>


                                            <div class="pt-4 text-center">
                                                <a style="border-radius: 5px" href="{{ route('faq') }}" class="btn small-button btn-primary mt-2">
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

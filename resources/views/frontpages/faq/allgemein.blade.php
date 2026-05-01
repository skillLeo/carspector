@extends('mainpages.master-layout')
@section('title', 'Carspector | FAQ Allgemein')
@section('meta_description', 'Hier findest du allgemeine Antworten zu Carspector, unserem Service und häufig gestellten Fragen zum Gebrauchtwagencheck.')
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
                                    <li class="breadcrumb-item active" aria-current="page">Allgemeines & Angebot</li>
                                </ol>
                            </nav>
                            <div class="step-item--header mb-5 pb-1">
                                <h2 style="font-size: 40px !important" class="text-primary">Allgemeines & Angebot</h2>
                            </div>
                            <div class="faq-content">
                                <div class="faq-block">


                                    <div class="faq-items">
                                        <div class="faq-accordion mx-auto">
                                            <div class="accordion" id="accordionFlushExample">

                                            <div style="border-radius: 5px" class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-0" aria-expanded="false" aria-controls="faq-0">
                                            Was ist Carspector?
                                            </button>
                                        </h2>
                                        <div id="faq-0" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                            Carspector ist Deutschlands <b>führender Anbieter von Gebrauchtwagenchecks</b> für Fahrzeuge aller Klassen. Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile. Du kannst mit nur wenigen Klicks schnell und unkompliziert deinen persönlichen Gebrauchtwagencheck deutschlandweit buchen.
                                            </div>
                                        </div>
                                        </div>

                                        
                                            <div style="border-radius: 5px" class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-05" aria-expanded="false" aria-controls="faq-05">
                                            Welche Fahrzeuge prüft Carspector?
                                            </button>
                                        </h2>
                                        <div id="faq-05" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                            <b>Wir prüfen Fahrzeuge aller Klassen</b>. Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und Wohnmobile. Falls dein gewünschtes Fahrzeug nicht dabei ist, 
                                            kontaktiere gerne unseren <a href="{{ route('kontakt') }}">Support</a>.
                                            </div>
                                        </div>
                                        </div>

                                        <div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-26" aria-expanded="false" aria-controls="faq-26">
      In welchen Städten kann ich buchen?
    </button>
  </h2>
  <div id="faq-26" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Wir bieten unsere Dienstleistungen <b>deutschlandweit</b> in allen Gebieten und Städten an.
    </div>
  </div>
</div>


<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-1" aria-expanded="false" aria-controls="faq-1">
      Warum sollte ich Carspector statt eines klassischen TÜV-Termins nutzen?
    </button>
  </h2>
  <div id="faq-1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Im Gegensatz zur klassischen Hauptuntersuchung (HU) beim TÜV oder bei der Dekra fokussiert sich Carspector auf eine <b>unabhängige und praxisnahe Bewertung speziell für den Gebrauchtwagenkauf</b>. 
      Wir prüfen das Fahrzeug und achten gezielt auf typische Schwachstellen – von der Fahrzeughistorie über Motor, Elektronik bis hin zum Marktwert. So bekommst du eine realistische Einschätzung und kannst mit einem sicheren Gefühl entscheiden.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-23" aria-expanded="false" aria-controls="faq-23">
      Verkäufer: privat und gewerblich?
    </button>
  </h2>
  <div id="faq-23" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Ja</b>, wir prüfen sowohl privat zum Verkauf stehende Fahrzeuge als auch gewerbliche, beispielsweise aus einem Autohaus.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-2" aria-expanded="false" aria-controls="faq-2">
      Ist die Prüfung auch für gewerbliche Käufer sinnvoll?
    </button>
  </h2>
  <div id="faq-2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Absolut.</b> Unsere Fahrzeugprüfungen sind nicht nur für Privatpersonen konzipiert – auch Autohäuser, Leasingfirmen oder Flottenkunden profitieren von unserer Expertise. Besonders bei häufigen Käufen ist eine unabhängige Prüfung eine wertvolle Ergänzung zur internen Kontrolle.
    </div>
  </div>
</div>



<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-3" aria-expanded="false" aria-controls="faq-3">
      Gibt es Einschränkungen beim Fahrzeugstandort?
    </button>
  </h2>
  <div id="faq-3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Grundsätzlich können unsere Prüfer das Fahrzeug <b>überall besichtigen</b> – egal ob auf einem Händlerhof, in einer Tiefgarage oder auf einem Privatgrundstück. Für eine optimale Sicht und Lichtverhältnisse bevorzugen wir allerdings einen freien Stellplatz im Freien. Wir stimmen das individuell direkt mit dem Verkäufer ab.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-4" aria-expanded="false" aria-controls="faq-4">
      Bietet Carspector auch eine Beratung nach der Prüfung an?
    </button>
  </h2>
  <div id="faq-4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Ja – und das ist uns besonders wichtig</b>. Nachdem du das Prüfergebnis erhalten hast, stehen dir unsere Experten jederzeit für Rückfragen zur Verfügung. Wir helfen dir, die Ergebnisse richtig zu interpretieren und beraten dich ehrlich bei der Kaufentscheidung.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-5" aria-expanded="false" aria-controls="faq-5">
      Wie viele Fotos und Details erhalte ich im Bericht?
    </button>
  </h2>
  <div id="faq-5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Unser Bericht enthält je nach Fahrzeugzustand etwa <b>20 bis 30 hochwertige Fotos</b> – inklusive Detailaufnahmen von relevanten Bauteilen, Schwachstellen, Dokumenten sowie dem Innen- und Außenbereich.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-6" aria-expanded="false" aria-controls="faq-6">
      Gibt es eine telefonische Erstberatung?
    </button>
  </h2>
  <div id="faq-6" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Ja, natürlich!</b> Wenn du vor der Buchung Fragen hast oder dir unsicher bist, welches Paket das richtige ist, erreichst du uns gerne telefonisch unter <a href="tel:+4921192325550"><strong>+49 211 92325550</strong></a>. Wir beraten dich persönlich, ehrlich und ohne Verkaufsdruck.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-7" aria-expanded="false" aria-controls="faq-7">
      Wie lange ist der Zustandsbericht gültig?
    </button>
  </h2>
  <div id="faq-7" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Der Zustandsbericht hat <b>kein formelles Ablaufdatum</b>. Es zeigt jedoch den Zustand des Fahrzeugs zum Zeitpunkt der Prüfung. Wir empfehlen dir, die Dateien innerhalb von 30 Tagen herunterzuladen, 
      da sie danach automatisch gelöscht werden.
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

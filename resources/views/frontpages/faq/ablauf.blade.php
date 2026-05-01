@extends('mainpages.master-layout')
@section('title', 'Carspector | FAQ zum Ablauf')
@section('meta_description', 'Vom Termin bis zum Prüfergebnis: Hier erfährst du, wie ein Gebrauchtwagencheck bei Carspector Schritt für Schritt abläuft.')
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
                                    <li class="breadcrumb-item active" aria-current="page">Fahrzeugprüfung & Ablauf</li>
                                </ol>
                            </nav>
                            <div class="step-item--header mb-5 pb-1">
                                <h2 style="font-size: 40px !important" class="text-primary">Fahrzeugprüfung & Ablauf</h2>
                            </div>
                            <div class="faq-content">
                                <div class="faq-block">


                                    <div class="faq-items">
                                        <div class="faq-accordion mx-auto">
                                            <div class="accordion" id="accordionFlushExample">

                                               <div class="accordion-item" style="border-radius: 5px">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-8" aria-expanded="false" aria-controls="faq-8">
      Was beinhaltet eine Fahrzeugprüfung?
    </button>
  </h2>
  <div id="faq-8" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Unsere Fahrzeugprüfung umfasst <b>über 150 Prüfpunkte</b> – je nach Fahrzeugtyp. Dabei bewerten wir unter anderem Karosserie und Lack, Innenraum, Motorraum, Elektronik, Bereifung, Fahrgestellnummer, Dokumente, Fahrzeughistorie sowie den allgemeinen Pflegezustand. Weitere Details findest du <a href="{{ route('gebrauchtwagencheck') }}">hier</a>.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-9" aria-expanded="false" aria-controls="faq-9">
      Wie läuft die Fahrzeugprüfung genau ab – was passiert vor Ort?
    </button>
  </h2>
  <div id="faq-9" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Nach deiner Buchung kontaktieren wir den Verkäufer und vereinbaren einen Termin. Vor Ort prüft einer unserer qualifizierten Experten das Fahrzeug detailliert – unabhängig und neutral. Nach der Prüfung erstellen wir ein umfassendes Prüfprotokoll inklusive Fotodokumentation, das du per E-Mail erhältst.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-10" aria-expanded="false" aria-controls="faq-10">
      Wird eine Probefahrt durchgeführt?
    </button>
  </h2>
  <div id="faq-10" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Ja, eine Probefahrt wird durchgeführt</b>, sofern das Fahrzeug zugelassen ist oder sich beim Händler befindet. Sie hilft uns, das Fahrverhalten, Bremsverhalten, Motorgeräusche und andere dynamische Eigenschaften realistisch zu bewerten.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-11" aria-expanded="false" aria-controls="faq-11">
      Wie lange dauert die Prüfung?
    </button>
  </h2>
  <div id="faq-11" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Die Fahrzeugprüfung dauert in der Regel <b>zwischen 60 und 90 Minuten</b> – abhängig vom Fahrzeugtyp und Zustand. Unsere Prüfer nehmen sich ausreichend Zeit, um ein fundiertes Ergebnis zu liefern. Qualität steht bei uns über Schnelligkeit.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-12" aria-expanded="false" aria-controls="faq-12">
      Muss der Verkäufer anwesend sein?
    </button>
  </h2>
  <div id="faq-12" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Ja</b>, idealerweise ist der Verkäufer <b>zu Beginn der Prüfung</b> anwesend, damit wir wichtige Fragen klären und Zugang zum Fahrzeug erhalten können. Nach dem Start kann der Prüfer die Begutachtung auch eigenständig durchführen – ganz flexibel.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-13" aria-expanded="false" aria-controls="faq-13">
      Was passiert, wenn der Verkäufer keinen Zugang gewährt?
    </button>
  </h2>
  <div id="faq-13" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Dies klären wir im Vorfeld direkt mit dem Verkäufer. Sollte dieser keine Prüfung erlauben oder sich weigern, wird der Auftrag storniert – du erhältst selbstverständlich dein Geld vollständig zurück.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-14" aria-expanded="false" aria-controls="faq-14">
      Wer führt die Prüfung durch und welche Qualifikation haben die Prüfer?
    </button>
  </h2>
  <div id="faq-14" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Unsere Prüfungen werden <b>ausschließlich von qualifizierten Kfz-Sachverständigen durchgeführt</b> – entweder festangestellte Experten oder sorgfältig geprüfte, qualifizierte Partner. Jeder Prüfer durchläuft einen strengen Auswahlprozess und wird regelmäßig geschult. So stellen wir eine gleichbleibend hohe Qualität sicher – deutschlandweit.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-15" aria-expanded="false" aria-controls="faq-15">
      Wird auch der Marktwert im Bericht genannt?
    </button>
  </h2>
  <div id="faq-15" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Ja, in unserem <strong>XXL-Paket</strong> ist eine fundierte Marktwertanalyse inklusive. Du erfährst, wie der geprüfte Wagen aktuell im Vergleich zum Markt steht – ein wertvoller Vorteil beim Verhandeln oder bei der finalen Kaufentscheidung. 
      Mehr Infos findest du hier: <a href="{{ route('gebrauchtwagencheck') }}">Prüfungsinhalte</a>.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-16" aria-expanded="false" aria-controls="faq-16">
      Was passiert, wenn gravierende Mängel entdeckt werden?
    </button>
  </h2>
  <div id="faq-16" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Sollte das Fahrzeug schwerwiegende Mängel aufweisen, werden diese <b>im Zustandsbericht klar dokumentiert und fotografisch belegt</b>. Wir geben dir eine neutrale, ehrliche Einschätzung – ohne Schönreden. So kannst du genau abwägen, ob sich ein Kauf noch lohnt oder nicht.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-17" aria-expanded="false" aria-controls="faq-17">
      Mein Wunschfahrzeug ist abgemeldet – ist das ein Problem?
    </button>
  </h2>
  <div id="faq-17" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Kein Problem</b>. Auch abgemeldete Fahrzeuge können wir prüfen. Eine Probefahrt ist in diesem Fall zwar grundsätzlich nicht möglich, aber unsere erfahrenen Prüfer können den Fahrzeugzustand trotzdem umfassend bewerten – basierend auf ihrer Fachkenntnis und Erfahrung.
Steht das Fahrzeug jedoch bei einem Händler, ist im Normalfall dennoch eine Probefahrt möglich – etwa mithilfe von Händlerkennzeichen.
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

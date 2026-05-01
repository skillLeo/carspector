@extends('mainpages.master-layout')
@section('title', 'Carspector | FAQ zur Buchung')
@section('meta_description', 'Fragen zur Buchung? Hier erklären wir, wie du deinen Fahrzeugcheck schnell, sicher und bequem online buchst.')
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
                                    <li class="breadcrumb-item active" aria-current="page">Buchung & Termin</li>
                                </ol>
                            </nav>
                            <div class="step-item--header mb-5 pb-1">
                                <h2 style="font-size: 40px !important" class="text-primary">Buchung & Termin</h2>
                            </div>
                            <div class="faq-content">
                                <div class="faq-block">


                                    <div class="faq-items">
                                        <div class="faq-accordion mx-auto">
                                            <div class="accordion" id="accordionFlushExample">

                                                <div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-26" aria-expanded="false" aria-controls="faq-26">
      In welchen Städten kann ich buchen?
    </button>
  </h2>
  <div id="faq-26" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Unser Service ist <b>deutschlandweit</b> verfügbar. Egal ob Großstadt oder ländlicher Raum – wir prüfen dein Wunschfahrzeug überall dort, wo es steht. Du brauchst dich um nichts zu kümmern – wir kommen zum Verkäufer.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-27" aria-expanded="false" aria-controls="faq-27">
      Welche Informationen muss ich bei der Buchung angeben?
    </button>
  </h2>
  <div id="faq-27" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Für eine erfolgreiche Bearbeitung benötigen wir die <b>Fahrzeugmarke, das Modell und den Standort des Fahrzeugs</b>. Optional kannst du auch den Link zum Inserat und spezielle Wünsche oder Fragen mit angeben – damit wir uns optimal vorbereiten können.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-28" aria-expanded="false" aria-controls="faq-28">
      Wie kurzfristig kann ich einen Termin buchen?
    </button>
  </h2>
  <div id="faq-28" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      In den meisten Fällen können wir deinen Termin bereits <strong>am nächsten Werktag</strong> realisieren – abhängig von der Verfügbarkeit des Verkäufers. Je früher du buchst, desto besser – wir starten sofort nach Zahlungseingang mit der Terminvereinbarung.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-29" aria-expanded="false" aria-controls="faq-29">
      Kann ich die Buchung später noch ändern oder stornieren?
    </button>
  </h2>
  <div id="faq-29" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Ja, solange die Prüfung noch nicht vor Ort begonnen hat</b>, ist eine Änderung oder Stornierung problemlos möglich. Kontaktiere uns dafür einfach über unsere 
      <a href="{{ route('kontakt') }}">Kontaktseite</a> – wir helfen dir schnell und unkompliziert weiter.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-30" aria-expanded="false" aria-controls="faq-30">
      Wie funktioniert der Buchungsprozess – Schritt für Schritt?
    </button>
  </h2>
  <div id="faq-30" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Ganz einfach</b>: Du wählst zuerst den Fahrzeugtyp, dann dein Wunschpaket (XL oder XXL). Danach gibst du uns einige Basisinformationen zum Fahrzeug. Nach der Online-Zahlung starten wir sofort – 
      wir kontaktieren den Verkäufer, organisieren den Termin und senden dir nach der Prüfung alle Ergebnisse digital zu. <a href="{{route('booking.option-page')}}">Jetzt Buchungsprozess starten</a>.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-31" aria-expanded="false" aria-controls="faq-31">
      Was passiert, wenn ich keinen Kontakt zum Verkäufer herstellen kann?
    </button>
  </h2>
  <div id="faq-31" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Kein Problem</b> – für uns reicht in der Regel eine Telefonnummer oder E-Mail-Adresse des Verkäufers. Wir übernehmen die Terminabstimmung für dich und kümmern uns um die Kontaktaufnahme. Du kannst dich entspannt zurücklehnen.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-32" aria-expanded="false" aria-controls="faq-32">
      Kann ich auch für jemand anderen buchen (z. B. Eltern, Freunde, Firma)?
    </button>
  </h2>
  <div id="faq-32" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <b>Natürlich!</b> Du kannst problemlos im Namen einer anderen Person oder für dein Unternehmen buchen. Wichtig ist nur, dass du uns beim Buchungsvorgang Bescheid gibst – damit wir wissen, mit wem wir Kontakt aufnehmen sollen.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-33" aria-expanded="false" aria-controls="faq-33">
      Wie erfahre ich, ob mein Termin bestätigt ist?
    </button>
  </h2>
  <div id="faq-33" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Sobald wir einen verbindlichen Termin mit dem Verkäufer vereinbart haben, erhältst du eine schriftliche <b>Terminbestätigung per E-Mail</b>. Du wirst laufend über den Status informiert – transparent und zuverlässig.
    </div>
  </div>
</div>

<div style="border-radius: 5px" class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#faq-34" aria-expanded="false" aria-controls="faq-34">
      Wann erhalte ich das Prüfergebnis?
    </button>
  </h2>
  <div id="faq-34" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      Durchschnittlich dauert es <b>2-4 Werktage</b>, bis du das Ergebnis des Gebrauchtwagenchecks erhältst. Jedoch kann es manchmal zu Verzögerungen kommen, da wir auf die Verfügbarkeit des Verkäufers angewiesen sind.
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

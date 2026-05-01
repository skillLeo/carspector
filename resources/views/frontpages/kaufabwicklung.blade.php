@extends('mainpages.master-layout')
@section('title', 'Carspector | Kaufabwicklung beim Gebrauchtwagenkauf')
@section('meta_description', 'Professionelle Kaufabwicklung beim Gebrauchtwagenkauf in Deutschland. Rechtssicher, transparent & zuverlässig.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')



<script>
  fbq('track', 'ViewContent');
</script>

<style>
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
    
      @media (max-width: 990px) {
 .pad-top-inhalt {
            padding-top: 20px !important;
        }
      }

    @media (min-width: 991px) {
            .btnwd {
                width: 350px;
            }
        }

        .pad-top-inhalt {
            padding-top: 50px;
        }

        .btnwd {
            max-width: 90%;
        }

        #fin-model .modal-dialog {
    max-width: 350px;
    width: 100%;
    margin: auto; 
}

/* Mobile-Styling */
@media (max-width: 350px) {
    #fin-model .modal-dialog {
        max-width: 85%;
        width: 85%;
        margin: auto; 
    }
}

#fin-model .modal-dialog-centered {
    display: flex;
    align-items: center;
    justify-content: center; 
    min-height: 100vh; 
}

.trust-marquee-wrapper {
  overflow: hidden;
  background: #f4f7fa;
  border-radius: 12px;
  padding: 15px 0;
  margin: 30px auto;
  border: 1px solid #e0e6eb;
  max-width: 800px;
}

.trust-marquee {
  width: 100%;
  overflow: hidden;
  position: relative;
}

.trust-marquee-inner {
  display: inline-flex;
  gap: 40px;
  white-space: nowrap;
  animation: scroll-left 110s linear infinite;
  font-size: 15px;
  font-weight: 500;
  color: #333;
}

.trust-marquee-inner span {
  flex: 0 0 auto;
  padding: 0 10px;
}

/* Langsame, durchlaufende Animation */
@keyframes scroll-left {
  from {
    transform: translateX(0%);
  }
  to {
    transform: translateX(-50%);
  }
}

.desktop-only-br {
    display: none;
  }

@media (min-width: 450px) {
  .desktop-only-br {
    display: inline;
  }
}

@media (max-width: 550px) {
  .fs-header {
    font-size: 32px !important;
  }

  .fs-under {
    font-size: 17px !important;
  }
}

.contact-input {
    border: 2px solid #ced4da;
    border-radius: 6px;
    padding: 10px 14px;
    font-size: 1rem;
    transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    background-color: #fff;
    box-shadow: none;
}

.contact-input:focus {
    border-color: #0d6efd;
    outline: none;
    box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.2);
}

.resizable {
     resize: vertical;
  min-height: 100px;
  max-height: 400px;
}


</style>



    <main class="main-area">


   <section class="section-padding section-bg">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="font-size: 40px; padding-bottom: 20px !important; letter-spacing: -0.4px" class="fs-header section-title text-primary fw-bold">
                Professionelle Kaufabwicklung beim Gebrauchtwagenkauf
            </h2>
            <p style="font-size: 19px" class="fs-under text-muted">
                Du möchtest ein Fahrzeug in Deutschland kaufen, bist aber nicht vor Ort? <br class="d-none d-md-inline">
                Wir übernehmen die komplette Abwicklung für dich.
            </p>
            <div class="alert alert-light border border-secondary-subtle shadow-sm mt-4 mx-auto" style="max-width: 600px; border-radius: 5px">
              <i class="fa-solid fa-info-circle me-2 text-primary"></i>
              <strong>Gut zu wissen:</strong>
              Selbstverständlich übernehmen wir die komplette Kaufabwicklung auch für Auslandskunden, die ein Fahrzeug aus dem Ausland in Deutschland kaufen möchten – sowohl privat als auch gewerblich.
          </div>
        </div>




        <div class="row gy-4">
            <div class="col-md-4">
                <div style="border-radius: 5px" class="bg-white shadow-sm p-4 h-100 text-center">
                    <i class="fa-solid fa-file-contract fa-2x text-secondary mb-3"></i>
                    <h5 class="pb-3 fw-bold text-primary">Rechtssicher & mehrsprachig</h5>
                    <p>Wir erstellen und prüfen Kaufverträge – klar, verständlich und rechtlich abgesichert. Für Auslandskunden stellen wir die Unterlagen auf 
                      Wunsch auch zweisprachig (Deutsch / Englisch) bereit.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div style="border-radius: 5px" class="bg-white shadow-sm p-4 h-100 text-center">
                    <i class="fa-solid fa-handshake-simple fa-2x text-secondary mb-3"></i>
                    <h5 class="pb-3 fw-bold text-primary">Verkäuferkommunikation</h5>
                    <p>Wir übernehmen die komplette Kommunikation mit dem Verkäufer, klären offene Punkte und stimmen alle Details verbindlich ab – professionell und in deinem Interesse.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div style="border-radius: 5px" class="bg-white shadow-sm p-4 h-100 text-center">
                    <i class="fa-solid fa-shield-halved fa-2x text-secondary mb-3"></i>
                    <h5 class="pb-3 fw-bold text-primary">Sichere Zahlungsabwicklung</h5>
                    <p>Auf Wunsch unterstützen wir mit Treuhandlösungen oder begleiten die Übergabe persönlich, um maximale Sicherheit für Käufer und Verkäufer zu gewährleisten.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div style="border-radius: 5px" class="bg-white shadow-sm p-4 h-100 text-center">
                    <i class="fa-solid fa-file-signature fa-2x text-secondary mb-3"></i>
                    <h5 class="pb-3 fw-bold text-primary">Digitale Unterzeichnung</h5>
                    <p>Alle relevanten Dokumente können bequem digital unterzeichnet werden – ideal, wenn du nicht vor Ort bist oder Zeit sparen möchtest.</p>
                </div>
            </div>
                        <div class="col-md-4">
                <div style="border-radius: 5px" class="bg-white shadow-sm p-4 h-100 text-center">
                    <i class="fa-solid fa-plane-departure fa-2x text-secondary mb-3"></i>
                    <h5 class="pb-3 fw-bold text-primary">Ideal für Export & Ausland</h5>
                    <p>Egal ob Kauf innerhalb Deutschlands oder Export ins Ausland: Wir koordinieren die Übergabe, unterstützen bei Export- und Zollunterlagen und sorgen für einen reibungslosen Ablauf.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div style="border-radius: 5px" class="bg-white shadow-sm p-4 h-100 text-center">
                    <i class="fa-solid fa-clock fa-2x text-secondary mb-3"></i>
                    <h5 class="pb-3 fw-bold text-primary">Schnelle Umsetzung</h5>
                    <p>Wir starten in der Regel innerhalb von 24 Stunden – optimal bei kurzfristigen oder zeitkritischen Kaufentscheidungen.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">

            <!-- Button zum Öffnen des Modals -->
            <a href="{{ route('kontakt') }}" style="border-radius: 5px" class="btn btn-secondary btn-lg px-4">
    <i class="fa-light fa-envelope me-2"></i>Jetzt unverbindlich anfragen
</a>


            <p style="padding-top: 25px" class="text-muted">Antwort innerhalb von 24 Stunden – auch auf Englisch möglich</p>
        </div>
    </div>
</section>
<div class="bg-white mt-5 mb-5 py-4">
    <div class="container text-center">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <i class="fa-solid fa-file-circle-check fa-3x text-success mb-3"></i>
            <h4 class="fw-bold text-primary mb-2">Bereits über 800 Verträge erfolgreich abgewickelt</h4>
            <p class="text-muted pt-1 mb-0">Käufer aus Deutschland sowie aus über 20 weiteren Ländern vertrauen auf unsere Erfahrung in der Kaufabwicklung, Vertragsprüfung und Exportbegleitung.</p>
        </div>
    </div>
</div>


    </main>
@endsection

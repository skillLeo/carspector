@extends('mainpages.master-layout')
@section('title', 'Carspector | Schritt 1/3')
@section('meta_description', 'Wähle den Fahrzeugtyp, den du prüfen lassen möchtest – vom PKW über Transporter bis zum Wohnmobil.')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-T7E6W0hCk4n8QXQeC3mx3t0m5n3kqvKQ/4e6+Q3+1XJgNw3p5j6b0s5r9HkUx3Q9oJY8Xz8tK9cJ9W5lU7lqtw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  :root{
    --cs-bg: #0f172a;
    --cs-primary: var(--primary);
    --cs-secondary: var(--secondary);
  }

  .booking-grid{ --g-gap: 28px; display:grid; grid-template-columns: 1fr; gap: var(--g-gap); }
  @media(min-width: 992px){ .booking-grid{ grid-template-columns: minmax(0,1fr) 420px; align-items:start; } }

  .panel{ background:#fff; border:1px solid #e5e7eb; border-radius:16px; box-shadow:0 6px 24px rgba(2,6,23,.06); }
  .panel-header{ padding:18px 20px; border-bottom:1px solid #eef2f7; display:flex; align-items:center; justify-content:space-between; gap:10px; }
  .panel-header h3{ margin:0; font-size:1.15rem; letter-spacing:-.2px; }
  .panel-body{ padding:20px; }

  .badge-inline{ background:#eef2ff; color:#1e40af; font-weight:700; padding:4px 10px; border-radius:999px; font-size:.85rem; }
  .small-muted{ color:#6b7280; font-size:.92rem; }

  /* Fahrzeugtyp Karten */
  .type-card{
    position:relative;
    display:flex;
    align-items:center;
    gap:14px;
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:14px 16px;
    cursor:pointer;
    transition:border-color .2s ease, background .2s ease, opacity .2s ease;
    background:#fff;
  }
  .type-card.selected{ border-color: var(--primary); background:#f8fafc; }

  /* Deaktivierter Zustand */
  .type-card.disabled{
    opacity:.6;
    cursor:not-allowed;
  }
  .type-card.disabled .type-main{ pointer-events:none; }
  .type-card.disabled .info-link{ pointer-events:none; opacity:.8; }

  /* Das eigentliche Radio: komplett aus dem Klickfluss nehmen */
  .type-card .type-radio{
    position:absolute;
    opacity:0;
    pointer-events:none;
  }

  /* Linker Inhaltsblock (Label) */
  .type-main{
    display:flex;
    align-items:center;
    gap:14px;
    flex: 1 1 auto;
  }

  .type-icon{
    width:44px; height:44px; border-radius:50%;
    display:inline-flex; align-items:center; justify-content:center;
    background:#eef2ff; color:var(--primary); border:1px solid #dbe3ff; flex-shrink:0;
  }
  .type-icon i{ font-size:1.2rem; }
  .type-icon img{ width:28px; height:28px; object-fit:contain; display:block; }

  .type-title{ font-weight:700; color:#0f172a; letter-spacing:-.2px; }

  /* Rechter Info-Link (Modal Trigger) */
  .type-right{ margin-left:auto; }
  .info-link{ color:var(--primary); text-decoration:none; display:inline-flex; align-items:center; position:relative; z-index:2; }
  .info-link:hover{ opacity:.9; }

  /* Zusammenfassung */
  .summary{ position:sticky; top:20px; }
  .summary .row-line{ display:flex; align-items:center; justify-content:space-between; gap:10px; padding:8px 0; }
  .summary .label{ color:#475569; }
  .summary .tot{ border-top:1px dashed #e5e7eb; margin-top:10px; padding-top:12px; font-size:1.08rem; font-weight:700; }
  .summary .value-weak{ color:#94a3b8; }

  /* Button */
  .btn-next{ padding:14px 28px; font-weight:700; width:100%; }
  @media(min-width:992px){ .btn-next{ padding:16px 40px; font-size:1.05rem; } }

  /* Responsive Sichtbarkeit der rechten Box / Mobile-Badge */
  .col-summary { display:none; }
  @media(min-width:992px){
    .col-summary{ display:block; }
    .panel-header .badge-inline.mobile-step { display:none; }
  }

  /* Begrenze die Breite der Info-Popups */
.modal-dialog.modal-dialog-centered {
  max-width: 300px;
  margin: 0 auto;
}
#opt1 .modal-body li,
#opt2 .modal-body li,
#opt3 .modal-body li,
#opt4 .modal-body li,
#opt5 .modal-body li {
  margin-bottom: 8px;
}

/* Panel schmaler (nur Desktop) */
  @media (min-width: 992px){
    .col-types .panel{
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }
  }

@media (min-width: 992px){
  .nudge-right-desktop{ margin-left: 15px; }
  .nudge-right-desktop-2{ margin-left: 8px; }
}

/* Logo auf Desktop kleiner machen */
@media (min-width: 992px) {
  .header-logo img {
    max-height: 42px;
    width: auto;
  }
}
/* Box-Style bleibt wie gehabt */
.ev-toggle {
  text-align: left;
  border: 1px solid #e5e7eb;
  border-radius: 0.5rem;
  padding: 0.75rem 1.5rem ;
  max-width: 350px !important;
  background: #fff;
}

/* Abstand Label → Switch-Gruppe */
.ev-toggle label { font-weight: 500; margin-right: 1.25rem; }

/* Switch */
.ev-toggle .form-switch .form-check-input {
  width: 3rem !important;
  height: 1.5rem !important;
  cursor: pointer;
  transition: all 0.2s ease;
  background-position: left .3rem center;
  background-size: 1.2rem 1.2rem;
}
.ev-toggle .form-switch .form-check-input:checked {
  background-color: #198754;
  border-color: #198754;
  background-position: calc(100% - .3rem) center;
}
.ev-toggle .form-switch .form-check-input:focus {
  box-shadow: 0 0 0 .25rem rgba(25,135,84,.15);
}
.ev-toggle { margin-left: 0; margin-right: auto; }

/* Ab 900px zwei Fahrzeugkarten nebeneinander */
@media (min-width: 900px){
  .col-types .panel .panel-body > .vstack{
    display: grid !important;
    grid-template-columns: 1fr 1fr;
    column-gap: 0.5rem; /* ~ gap-2 */
    row-gap: 0.5rem;
  }
}




.type-card.disabled {
  display: none;
}

@media (min-width: 900px) {
  .type-card.disabled {
    display: flex;
  }

  
.col-types .panel .panel-body > .vstack{
  gap: 0.75rem !important; 
}
}

/* Standardgröße (Desktop) */
.milestone-icon {
  font-size: 1.5rem;
}

.milestone-text {
  font-size: 1rem;
}

/* Mobile kleiner machen */
@media (max-width: 767px) {
  .milestone-icon {
    font-size: 1rem !important;
  }

  .milestone-text {
    font-size: 0.8rem !important;
  }
}

.header .header-logo { 
  flex: 0 0 auto;          /* nicht schrumpfen */
  overflow: visible !important;
}

.header .header-logo a { 
  overflow: visible !important;
}

.header .header-logo img {
  height: 39px !important; /* explizite Höhe statt max-height */
  width: auto !important;  /* Seitenverhältnis beibehalten */
  max-width: none !important;
  object-fit: contain;
  display: block;
}

@media (max-width: 992px) {
  .header .header-logo img { height: 32px !important; margin-bottom: 3px !important}
    .header { min-height: 60px;      } 
    }
@media (min-width: 993px) {
  .header .header-logo { padding-top: 6px !important;}
}


/* --- Logo links ausrichten --- */
.header .header-wrapper {
  display: flex;
  align-items: center;
  justify-content: space-between; /* Logo links, Menü/Burger rechts */
}




/* Logo-Container fix links */
.header .header-logo {
  margin-right: auto;   /* schiebt alles andere nach rechts */
  justify-content: flex-start;
  text-align: left;
}

/* Logo selbst – kein automatisches Zentrieren */
.header .header-logo a {
  display: inline-flex;
  align-items: center;
  justify-content: flex-start;
}

/* Sicherstellen, dass nichts es zentriert */
.header .header-wrapper > *:not(.header-logo) {
  margin-left: auto;
}/* Standard: Desktop bleibt wie bisher (justify-content-md-between wirkt ab md) */

/* Mobile-Optimierung */
@media (max-width: 991px) {
  .header-wrapper {
    justify-content: space-between;   /* Logo links, Marktführer rechts */
    align-items: center;
  }

  .header-logo {
    order: 1;
  }

  .milestones {
    order: 2;
    margin-left: auto;               /* schiebt es ganz nach rechts */
  }

  .step-navigation {
    order: 3;
    width: 100%;
    margin-top: 10px;
    display: flex;
    justify-content: center;         /* Navigation mittig unter Logo + Badge */
  }
}

.milestone-text {
  margin-top: 2px;
}

@media (min-width: 767px) {
.milestone-text {
  margin-top: 6px !important;
}
}

@media (max-width: 991px) {

  .step-navigation {
    position: relative;
    width: 100%;
    margin-top: 15px;
    padding-top: 15px;
  }

  .step-navigation::before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100vw;                /* volle Bildschirmbreite */
    height: 1px;
    background: rgba(255, 255, 255, 0.25); /* dezente helle Linie */
  }

}

/* Bis 500px: äußeren Container entfernen */
@media (max-width: 500px) {
  main .container {
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    max-width: 100% !important;
    width: 100% !important;
  }

  /* Optional, wenn du auch den Abstand oben reduzieren willst */
  main.py-4 {
    padding-top: 5px !important;
    padding-bottom: 20px !important;
  }

    main .panel,
  main .card,
  main .panel-header,
  main .panel-body {
    border-radius: 0 !important;
  }

  @media (max-width: 500px) {
  .panel {
    display: contents !important;
  }
}

}

.tuv-logo{
  padding-left: 30px;
  height: 50px;          /* bleibt gleich -> Header bleibt gleich hoch */
  width: auto;
  display: block;
  transform: scale(1.25);        /* <<< größer machen */
  transform-origin: center right; /* wirkt natürlicher im Header */
}

@media (max-width: 768px){
  .tuv-logo{ height: 38px; 
  transform: scale(1.1);
}
  
}
@media (max-width: 991.98px){
  .header-badges .milestones { order: 1; }
  .header-badges .tuv-badge  { order: 2; }
}
</style>
@endsection

@section('header')

<header class="header bg-primary header-step position-relative z-3">
  <div class="container">
    <div class="header-wrapper d-flex flex-wrap align-items-center justify-content-center justify-content-md-between mx-auto position-relative">
      <div class="header-logo">
        <a href="{{url('/')}}" class="logo d-inline-flex align-items-center gap-3"><img
                    src="logo-slogan-white.png" alt=""></a>
      </div>
      <div class="step-navigation">
        <button type="button" class="current">
          <span class="ind"></span><span class="text">Fahrzeug</span>
        </button>
        <button type="button">
          <span class="ind"></span><span class="text">Check</span>
        </button>
        <button type="button">
          <span class="ind"></span><span class="text">Buchung</span>
        </button>
      </div>

      <div class="milestones d-flex flex-column align-items-center text-center">
        <i class="fas fa-award text-secondary milestone-icon"></i>
        <span class="text-white milestone-text">Top-Anbieter 2025</span>
      </div>

    </div>
  </div>
</header>

<!-- <header class="header bg-primary header-step position-relative z-3">
  <div class="container">
    <div class="header-wrapper d-flex flex-wrap align-items-center justify-content-between mx-auto position-relative">

      <div class="header-logo order-1">
        <a href="{{url('/')}}" class="logo d-inline-flex align-items-center gap-3">
          <img src="logo-slogan-white.png" alt="">
        </a>
      </div>

      <div class="header-badges order-2 d-flex align-items-center gap-3 ms-auto">
        <div class="milestones d-none d-sm-flex flex-column align-items-center text-center">
          <i class="fas fa-award text-secondary milestone-icon"></i>
          <span class="text-white milestone-text">Marktführer 2024</span>
        </div>

           <div class="tuv-badge d-flex align-items-center" role="button"
            data-bs-toggle="modal" data-bs-target="#tuv_modal"
            aria-label="TÜV Rheinland Partner-Info öffnen">
          <img src="/tuv-gebrauchtwagenbewertung.png" class="tuv-logo" alt="TÜV">
        </div> 
        <div class="tuv-badge d-flex align-items-center">
          <img src="/tuv-gebrauchtwagenbewertung.png" class="tuv-logo" alt="TÜV">
        </div>
      </div>

      <div class="step-navigation order-3 order-md-2 w-md-auto d-flex justify-content-center">
        <button type="button" class="current">
          <span class="ind"></span><span class="text">Fahrzeug</span>
        </button>
        <button type="button">
          <span class="ind"></span><span class="text">Check</span>
        </button>
        <button type="button">
          <span class="ind"></span><span class="text">Buchung</span>
        </button>
      </div>

    </div>
  </div>
</header> -->


@endsection


@section('content')
<main class="py-4 py-md-5">
  <div class="container">
    <!-- <div class="booking-grid"> -->

      {{-- LINKS --}}
      <section class="col-types">
        <form action="{{ route('booking.step-2') }}" method="GET" class="panel">
          @csrf
          <div class="panel-header">
            <h3>Fahrzeugtyp wählen</h3>
            <span class="badge-inline">Schritt 1/3</span>
          </div>
          <div class="panel-body">
            <div style="font-size: 1rem !important" class="small-muted mb-4">Bitte wähle den Fahrzeugtyp, den du prüfen lassen möchtest.</div>

          <!-- <div class="ev-toggle mt-4 mb-4 d-flex align-items-center justify-content-between">
            <label for="is_ev" class="form-label mb-0 fw-semibold fs-6">
              Elektrofahrzeug?
            </label>
            <div class="d-flex align-items-center gap-2">
              <span class="text-muted fw-semibold">Nein</span>
              <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" id="is_ev" name="is_ev" value="1"
                      {{ request('is_ev') ? 'checked' : '' }}>
              </div>
              <span class="text-muted fw-semibold">Ja</span>
            </div>
          </div> -->

  <div class="vstack gap-2">

              {{-- Auto / PKW --}}
              <div class="type-card" data-type-label="Auto/ PKW">
                <input class="type-radio" type="radio" id="type1" name="type" value="Auto/ PKW" checked>
                <label class="type-main" for="type1">
                  <span class="type-icon"><i class="fa-solid fa-car-side"></i></span>
                  <span class="type-title">Auto/ PKW</span>
                </label>
                <a href="#opt1" data-bs-toggle="modal" class="type-right info-link" aria-label="Info Auto/PKW">
                  <i style="font-size:20px" class="fa-regular fa-circle-info"></i>
                </a>
              </div>

              {{-- Transporter --}}
              <div class="type-card" data-type-label="Transporter">
                <input class="type-radio" type="radio" id="type2" name="type" value="transporter">
                <label class="type-main" for="type2">
                  <span class="type-icon"><i class="fa-solid fa-van-shuttle"></i></span>
                  <span class="type-title">Transporter</span>
                </label>
                <a href="#opt2" data-bs-toggle="modal" class="type-right info-link" aria-label="Info Transporter">
                  <i style="font-size:20px" class="fa-regular fa-circle-info"></i>
                </a>
              </div>

              {{-- Oldtimer --}}
              <div class="type-card" data-type-label="Oldtimer">
                <input class="type-radio" type="radio" id="type3" name="type" value="oldtimer">
                <label class="type-main" for="type3">
                  <span class="type-icon"><img src="/oldtimer_car.png" alt="Oldtimer"></span>
                  <span class="type-title">Oldtimer</span>
                </label>
                <a href="#opt3" data-bs-toggle="modal" class="type-right info-link" aria-label="Info Oldtimer">
                  <i style="font-size:20px" class="fa-regular fa-circle-info"></i>
                </a>
              </div>

              {{-- Sportwagen --}}
              <div class="type-card" data-type-label="Sportwagen">
                <input class="type-radio" type="radio" id="type4" name="type" value="sportwagen">
                <label class="type-main" for="type4">
                  <span class="type-icon"><img src="/sportscar.png" alt="Sportwagen"></span>
                  <span class="type-title">Sportwagen</span>
                </label>
                <a href="#opt4" data-bs-toggle="modal" class="type-right info-link" aria-label="Info Sportwagen">
                  <i style="font-size:20px" class="fa-regular fa-circle-info"></i>
                </a>
              </div>

              {{-- Wohnmobil --}}
              <div class="type-card" data-type-label="Wohnmobil">
                <input class="type-radio" type="radio" id="type5" name="type" value="wohnmobil">
                <label class="type-main" for="type5">
                  <span class="type-icon"><img src="/rv_car.png" alt="Wohnmobil"></span>
                  <span class="type-title">Wohnmobil</span>
                </label>
                <a href="#opt5" data-bs-toggle="modal" class="type-right info-link" aria-label="Info Wohnmobil">
                  <i style="font-size:20px" class="fa-regular fa-circle-info"></i>
                </a>
              </div>

              {{-- Elektrofahrzeug --}}
              <div class="type-card" data-type-label="Elektro">
                <input class="type-radio" type="radio" id="type-ev" name="type" value="elektro">
                <label class="type-main" for="type-ev">
                  <span class="type-icon">
                    <i class="fa-solid fa-bolt"></i>
                  </span>
                  <span class="type-text">
                    <span class="type-title">Elektro/ Hybrid</span>
                    <span class="type-subtitle">Alle Fahrzeugklassen</span>
                  </span>
                </label>
                <a href="#opt6" data-bs-toggle="modal" class="type-right info-link" aria-label="Info Elektro">
                  <i style="font-size:20px" class="fa-regular fa-circle-info"></i>
                </a>
              </div>


              <style>
                .type-main {
                display: flex;
                align-items: center;
                gap: 8px;
              }

              .type-text {
                display: flex;
                flex-direction: column; /* ⬅ zwingt Untereinander */
              }

              .type-subtitle {
                font-size: 0.85rem;
                color: #979797;
                line-height: 1.1;
              }
            </style>

              <!-- <div class="type-card disabled" data-type-label="Bald verfügbar" aria-disabled="true" title="Bald verfügbar">
                <input class="type-radio" type="radio" id="type6" name="type" value="bald_verfuegbar" disabled>
                <label class="type-main" for="type6" aria-hidden="true">
                  <span class="type-icon"><i class="fa-regular fa-clock"></i></span>
                  <span class="type-title">Bald verfügbar</span>
                </label>
              </div> -->

            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-secondary btn-next">
                Weiter <i class="fa-solid fa-arrow-right ms-2"></i>
              </button>
            </div>
          </div>
        </form>
      </section>

      <!-- <aside class="col-summary">
        <div class="panel summary" aria-label="Buchungszusammenfassung">
          <div class="panel-header">
            <h3>Deine Buchung</h3>
            <span class="badge-inline">Schritt 1/3</span>
          </div>
          <div class="panel-body">
            <div class="mb-3">
              <div class="row-line"><span class="label">Fahrzeugtyp</span><strong id="sumType">Auto/ PKW</strong></div>
              <div class="row-line"><span class="label">Paket</span><span class="value-weak" id="sumPkg">–</span></div>
            </div>
            <hr>
            <div id="priceText">
              <div class="row-line"><span class="label">Grundpreis</span><strong class="value-weak">–</strong></div>
              <div class="row-line"><span class="label">Anfahrt</span><strong class="value-weak">–</strong></div>
              <div class="row-line tot">
                <span>Gesamt <small class="small-muted" style="font-weight:500">(inkl. MwSt.)</small></span>
                <strong id="sumTotal" class="value-weak">–</strong>
              </div>
            </div>
          </div>
        </div>
      </aside>-->

    </div>
  </div>

  {{-- Info-Modals --}}
  <div class="modal fade" id="opt1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Auto/ PKW Check</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <ul class="mb-2 list-unstyled">
          <li><i class="fa-solid fa-check text-success me-2"></i>Alle Marken & Modelle</li>
          <li><i class="fa-solid fa-check text-success me-2"></i>PKW aller Bauarten</li>
          <li><i class="fa-solid fa-check text-success me-2"></i>Kleintransporter</li>
        </ul>
      </div>
    </div></div>
  </div>

  <div class="modal fade" id="opt6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Elektro/ Hybrid Check</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <ul class="mb-0 list-unstyled">
          <li><i class="fa-solid fa-check text-success me-2"></i>Alle Marken & Modelle</li>
          <li><i class="fa-solid fa-check text-success me-2"></i>Elektro & Hybrid</li>
        </ul>
      </div>
    </div></div>
  </div>

  <div class="modal fade" id="opt2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Transporter-Check</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <ul class="mb-0 list-unstyled">
          <li><i class="fa-solid fa-check text-success me-2"></i>Alle Marken & Modelle</li>
          <li><i class="fa-solid fa-check text-success me-2"></i>Bis 5,5 t Gesamtgewicht</li>
        </ul>
      </div>
    </div></div>
  </div>

  <div class="modal fade" id="opt3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Oldtimer-Check</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <ul class="mb-0 list-unstyled">
          <li><i class="fa-solid fa-check text-success me-2"></i>Alle Marken & Modelle</li>
          <li><i class="fa-solid fa-check text-success me-2"></i>Fahrzeuge > 30 Jahre</li>
        </ul>
      </div>
    </div></div>
  </div>

  <div class="modal fade" id="opt4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Sportwagen-Check</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <ul class="mb-0 list-unstyled">
          <li><i class="fa-solid fa-check text-success me-2"></i>Alle Marken & Modelle</li>
          <li><i class="fa-solid fa-check text-success me-2"></i>Alle Preisklassen</li>
          <li><i class="fa-solid fa-check text-success me-2"></i>Ab 300 PS</li>
        </ul>
      </div>
    </div></div>
  </div>

  <div class="modal fade" id="opt5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Wohnmobil-Check</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <ul class="mb-0 list-unstyled">
          <li><i class="fa-solid fa-check text-success me-2"></i>Alle Marken & Modelle</li>
          <li><i class="fa-solid fa-check text-success me-2"></i>Auch umgebaute Wohnmobile</li>
        </ul>
      </div>
    </div></div>
  </div>
    
<div class="modal fade" id="tuv_modal" tabindex="-1" aria-labelledby="tuvModalLabel" aria-hidden="true">
    <div style="
    max-width: 400px;
    width: 90%;
    margin: 0 auto" class="modal-dialog modal-dialog-centered custom-modal-width">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center gap-2" id="tuvModalLabel">
                    <i class="fas fa-shield-alt text-primary"></i>
                     TÜV Rheinland Partner
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            
<div class="modal-body pb-1" style="text-align: left;">

    <!-- Bild + Hauptsatz direkt nebeneinander -->
    <div class="d-flex align-items-center mb-2">
        <img src="/tuv-gebrauchtwagenbewertung.png"
             alt="TÜV Rheinland Partner – Gebrauchtwagenbewertung"
             style="max-height: 65px">

        <p class="fs-6 mb-0" style="padding-left:15px">
            Carspector arbeitet als <strong>offizieller Partner</strong> mit
            dem <strong>TÜV Rheinland</strong> zusammen.
        </p>
    </div>

    <!-- Erklärungstext darunter -->
    <p style="padding-bottom: 20px; padding-top: 11px" class="fs-6">
        Die Fahrzeug-Checks und Gutachten erfolgen in Zusammenarbeit
        mit dem TÜV Rheinland.
    </p> 

    <!-- Vorteile -->
    <div style="
    background-color: #f2f7fc; border: 1px solid #b6d9ff;
    padding: 15px;
    border-radius: 8px">
    <ul style="margin: 0;" class="list-unstyled">
        <li class="d-flex align-items-start gap-2 mb-2">
            <i style="margin-top: 2px" class="fas text-success fa-check-circle"></i>
            <span style="font-size: 0.95rem">TÜV Rheinland Gutachten-Partner</span>
        </li>
        <li class="d-flex align-items-start gap-2">
            <i style="margin-top: 2px" class="fas text-success fa-check-circle"></i>
            <span style="font-size: 0.95rem" >Objektive und unabhängige Fahrzeugbewertung</span>
        </li>
    </ul>
</div>
<div style="padding-bottom: 15px"></div>

    <!-- Transparenz-Hinweis 
    <div class="alert alert-warning" style="font-size: 14px;">
        <strong>Hinweis:</strong>
         In Ausnahmefällen erfolgt die Bearbeitung des Auftrags nicht durch den TÜV Rheinland, sondern durch einen gleichwertig qualifizierten Partner.
    </div> -->

</div>

        </div>
    </div>
</div>

</main>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
  const cards = document.querySelectorAll('.type-card');
  const sumType = document.getElementById('sumType');

  function updateSelection(){
    cards.forEach(c => {
      const r = c.querySelector('.type-radio');
      c.classList.toggle('selected', r.checked);
      if(r.checked && sumType){
        sumType.textContent = c.getAttribute('data-type-label') || r.value;
      }
    });
  }

  cards.forEach(c => {
    c.addEventListener('click', function(e){
      if(e.target.closest('a.info-link')) return; // Icon-Click: nur Modal
      const r = this.querySelector('.type-radio');
      if (this.classList.contains('disabled') || r.disabled) return; // nicht wählbar
      if(!r.checked){
        r.checked = true;
        updateSelection();
      }
    });

    const radio = c.querySelector('.type-radio');
    radio.addEventListener('change', updateSelection);
  });

  updateSelection();
});
</script>
@endsection

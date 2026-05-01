@extends('mainpages.master-layout')
@section('title', 'Carspector | Schritt 3/3')
@section('meta_description', 'Trage die Daten deines Wunschfahrzeugs ein – wir starten im Anschluss sofort mit der Bearbeitung.')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-T7E6W0hCk4n8QXQeC3mx3t0m5n3kqvKQ/4e6+Q3+1XJgNw3p5j6b0s5r9HkUx3Q9oJY8Xz8tK9cJ9W5lU7lqtw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  :root{
    --cs-bg: #0f172a; /* primary bg */
    --cs-primary: var(--primary);
    --cs-secondary: var(--secondary);
  }

  /* Header */
  .page-header{ background: var(--cs-bg); padding: 18px 0; }
  .page-header .logo img{ height:42px; }
  .stepper{ gap:10px; }
  .stepper .step{ display:flex; align-items:center; gap:8px; color:#cbd5e1; font-weight:600; }
  .stepper .step .dot{ width:22px; height:22px; border-radius:50%; background:#22c55e; display:inline-block; position:relative; }
  .stepper .step.current .dot{ background:var(--cs-secondary); }
  .stepper .step span{ color:#fff; font-weight:500; font-size:.95rem; }

  /* Layout */
  .booking-grid{ --g-gap: 28px; display:grid; grid-template-columns: 1fr; gap: var(--g-gap); }
  @media(min-width:992px){ .booking-grid{ grid-template-columns: minmax(0,1fr) 420px; align-items:start; } }

  .panel{ background:#fff; border:1px solid #e5e7eb; border-radius:16px; box-shadow:0 6px 24px rgba(2,6,23,.06); }
  .panel-header{ padding:18px 20px; border-bottom:1px solid #eef2f7; display:flex; align-items:center; justify-content:space-between; }
  .panel-header h3{ margin:0; font-size:1.15rem; letter-spacing:-.2px; }
  .panel-body{ padding:20px; }

  /* Form */
  .form-control{ height:60px; box-shadow:none !important; outline:none !important; }
  .form-control:focus{ box-shadow:none !important; outline:none !important; border-color: var(--primary)}
  textarea.form-control{ min-height:100px; height:auto; }
  .input-group .form-control{ box-shadow:none !important; }
  .apply-row .form-control{ height:50px; }

  .form-floating-like{ position:relative; }
  .form-floating-like label{ position:absolute; top:13px; left:14px; font-size:.95rem; color:#6b7280; transition: all .15s ease; pointer-events:none; }
  .form-floating-like input.form-control,
  .form-floating-like textarea.form-control{ padding:14px 14px 12px; }
  .form-floating-like input:focus + label,
  .form-floating-like input:not(:placeholder-shown) + label,
  .form-floating-like textarea:focus + label,
  .form-floating-like textarea:not(:placeholder-shown) + label{
      transform:translateY(-16px); font-size:.75rem; color:var(--cs-primary); background-color: #f9f9f9; padding:0 6px; left:10px;
  }

  .addon{ display:flex; align-items:flex-start; gap:12px; padding:14px; border:1px solid #e5e7eb; border-radius:12px; cursor:pointer; transition:border-color .2s ease, box-shadow .2s ease; }
  .addon:hover{ border-color: var(--cs-primary); box-shadow:0 6px 18px rgba(2,6,23,.06); }
  .addon .box{ width:20px; height:20px; border:1.2px solid gray; border-radius:6px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
  .addon input{ display:none; }
  .addon input:checked ~ .box{ border-color: var(--cs-primary); }
  .addon .title{ font-weight:600; }
  .addon .price{ color: var(--cs-primary); font-weight:700; }

  /* Summary */
  .summary{ position:sticky; top:20px; }
  .summary .row-price{ display:flex; align-items:center; justify-content:space-between; gap:10px; font-size:.98rem; padding:8px 0; }
  .summary .row-price .label{ color:#475569; display:flex; align-items:center; gap:.5rem; }
  .summary .tot{ border-top:1px dashed #e5e7eb; margin-top:10px; padding-top:12px; font-size:1.1rem; font-weight:600; }
  .badge-inline{ background:#eef2ff; color:#1e40af; font-weight:700; padding:4px 10px; border-radius:999px; font-size:.85rem; }
  .apply-row{ display:flex; gap:10px; }
  .apply-row .btn{ height:50px; }

  /* Order */
  .order-summary{ order:1; }
  .order-form{ order:2; }
  @media(min-width:992px){ .order-summary{ order:2; } .order-form{ order:1; } }

  .small-muted{ color:#6b7280; font-size:.9rem; }

  /* Buttons */
  .btn-book{ padding:17px 32px; font-size:1rem; font-weight:600; }
  @media (min-width: 992px){ .btn-book{ padding:15px 48px; font-size:1.15rem; } }

  .addon{ background-color:#f9f9f9; border:1px solid #d1d5db !important; border-radius:5px !important; }
  #englishReport:checked + label.addon, #verhandlung:checked + label.addon{ border-color:var(--primary) !important; }

  /* Rabattbutton */
  #apply_discount{ box-shadow:none !important; }
</style>
{{-- Füge das am Ende deiner bestehenden <style>-Sektion hinzu --}}
<style>
  /* Inputs */
  .form-control, .input-group .form-control, .form-floating-like .form-control, textarea.form-control{
    border:1px solid #d1d5db; box-shadow:none !important; outline:none !important; background-color: #f9f9f9;
  }
  .form-control:focus, .input-group .form-control:focus, .form-floating-like .form-control:focus, textarea.form-control:focus{
    border-color:var(--primary) !important; box-shadow:none !important; outline:none !important;
  }
  .form-control:disabled, .form-control[disabled]{ background-color:#f3f4f6; border-color:#e5e7eb; opacity:1; }
  .form-floating-like label, .input-box label{ top:19px !important; }
  .input-box textarea + label{ top:5px !important; }

  /* Info */
  .booking-info .info-text{ font-size:1rem; color:#6a7078ff; margin-bottom:1rem; }
  .booking-info .reviews img{ width:48px; height:48px; }
  .booking-info .review-text{ font-size:1rem; font-weight:500; color:var(--primary); }

  /* Rabattfeld */
  .promo-compact{ display:flex; width:100%; border:1px solid #d1d5db; border-radius:6px; overflow:hidden; background:#f9f9f9; height:45px;}
  .promo-input{ flex:1 1 auto; min-width:0; border:0; background:transparent; padding:12px 14px; height:42px; outline:none !important; box-shadow:none !important; font-size:1rem; }
  .promo-input::placeholder{ color: #8e9195ff; }
  .promo-btn{ flex:0 0 auto; border:0; height:45px; padding:0 35px; font-weight:500; background:#e9e9e9ff; color:#000; cursor:pointer; display:inline-flex; align-items:center; justify-content:center; transition:opacity .15s ease; }
  .promo-btn:hover{ background:#dadadaff }
  .promo-input:focus ~ .promo-btn, .promo-compact:focus-within{ border-color:var(--primary); box-shadow:0 0 0 2px rgba(0,0,0,0); }
  .promo-compact:focus-within{ border-color:var(--primary); }
  @media (max-width: 767.98px){ .promo-btn{ padding:0 30px; } }

  /* Upgrade CTA + Badge */
  .upgrade-cta-min{
    display:flex; align-items:center; gap:12px; width:100%;
    border:1px solid #e5e7eb; background:#fff; border-radius:8px; padding:12px 14px;
    cursor:pointer; transition:box-shadow .2s ease, transform .06s ease;
  }
  .upgrade-cta-min:hover{ box-shadow:0 6px 18px rgba(2,6,23,.06); }
  .upgrade-cta-min:active{ transform:translateY(1px); }
  .upgrade-cta-min .icon{ width:30px; height:30px; flex:0 0 auto; display:inline-flex; align-items:center; justify-content:center; color:var(--primary); }
  .upgrade-cta-min .txt{ color: black; font-weight:600; line-height:1.2; display:flex; align-items:center; gap:.3rem; flex-wrap:wrap; }
  .badge-reco{ display:inline-block; font-size:.72rem; line-height:1; padding:.28rem .5rem; border-radius:5px; background:var(--secondary); color:#fff; font-weight:700; }

  /* Entfernen (Mülleimer) */
  .trash-btn{ background:none; border:0; padding:0; margin:0; color:#ef4444; cursor:pointer; display:inline-flex; align-items:center; gap:.35rem; }
  .trash-btn:hover{ color:#dc2626; }

  @media (min-width: 992px) { /* ab Bootstrap lg-Breakpoint */
  .header-logo img {
    max-height: 42px; /* oder deine Wunschhöhe */
    width: auto;      /* sorgt dafür, dass das Seitenverhältnis bleibt */
  }
}

  .break-lg { display: none; }
  @media (min-width: 520px) { .break-lg { display: inline; } }

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

.booking-steps {
  background: #f9fafb;
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  padding: 20px;
}

.steps-title {
  font-size: 18px;
  font-weight: 600;
  letter-spacing: -0.25px;
}

.step {
  display: flex;
  align-items: center;
  padding: 12px 0;
  border-bottom: 1px solid #ececec;
}

.step:last-child {
  border-bottom: none;
}

.step-number {
  min-width: 32px;
  min-height: 32px;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: #d0d7e1;
  color: #333;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 600;
  margin-right: 12px;
  font-size: 15px;
  flex-shrink: 0; /* Verhindert Zusammendrücken auf kleinen Screens */
}


.current-step .step-number {
  background: #0d6efd;
  color: #fff;
}

.step-content strong {
  font-size: 15px;
  font-weight: 600;
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
<!-- 
<header class="header bg-primary header-step position-relative z-3">
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

        <div class="tuv-badge d-flex align-items-center">
          <img src="/tuv-gebrauchtwagenbewertung.png" class="tuv-logo" alt="TÜV">
        </div>
      </div>

      <div class="step-navigation order-3 order-md-2 w-md-auto d-flex justify-content-center">
        <button type="button" class="checked">
          <span class="ind"></span>
          @if(request('type')=='Auto/ PKW') <span class="text">Auto/ PKW</span>
          @elseif(request('type')=='elektro') <span class="text">Elektro</span>
          @elseif(request('type')=='transporter') <span class="text">Transporter</span>
          @elseif(request('type')=='sportwagen') <span class="text">Sportwagen</span>
          @elseif(request('type')=='oldtimer') <span class="text">Oldtimer</span>
          @elseif(request('type')=='wohnmobil') <span class="text">Wohnmobil</span>
          @elseif(request('type')=='kaufbegleitung') <span class="text">Kaufbegleitung</span>
          @endif
        </button>
        <button type="button" class="checked">
          <span class="ind"></span>
          @if(request('option')=='1') <span class="text">XL</span>
          @elseif(request('option')=='2') <span class="text">XXL</span>
          @endif
        </button>
        <button type="button" class="current">
          <span class="ind"></span>
          <span class="text">Buchung</span>
        </button>
      </div>

    </div>
  </div>
</header> -->

<header class="header bg-primary header-step position-relative z-3">
  <div class="container">
    <div class="header-wrapper d-flex flex-wrap align-items-center justify-content-center justify-content-md-between mx-auto position-relative">
      <div class="header-logo">
        <a href="{{url('/')}}" class="logo d-inline-flex align-items-center gap-3"><img
                    src="logo-slogan-white.png" alt=""></a>
      </div>
      <div class="step-navigation">
        <button type="button" class="checked">
          <span class="ind"></span>
          @if(request('type')=='Auto/ PKW') <span class="text">Auto/ PKW</span>
          @elseif(request('type')=='elektro') <span class="text">Elektro</span>
          @elseif(request('type')=='transporter') <span class="text">Transporter</span>
          @elseif(request('type')=='sportwagen') <span class="text">Sportwagen</span>
          @elseif(request('type')=='oldtimer') <span class="text">Oldtimer</span>
          @elseif(request('type')=='wohnmobil') <span class="text">Wohnmobil</span>
          @elseif(request('type')=='kaufbegleitung') <span class="text">Kaufbegleitung</span>
          @endif
        </button>
        <button type="button" class="checked">
          <span class="ind"></span>
          @if(request('option')=='1') <span class="text">XL</span>
          @elseif(request('option')=='2') <span class="text">XXL</span>
          @endif
        </button>
        <button type="button" class="current">
          <span class="ind"></span>
          <span class="text">Buchung</span>
        </button>
      </div>

      <div class="milestones d-flex flex-column align-items-center text-center">
        <i class="fas fa-award text-secondary milestone-icon"></i>
        <span class="text-white milestone-text">Top-Anbieter 2025</span>
      </div>

    </div>
  </div>
</header>
@endsection

@section('content')
<script> window.fbq && window.fbq('track','AddToCart'); </script>

@php
  // WICHTIG: Nur wenn die Seite initial mit XL geladen wurde, erlauben wir Upgrade/Downgrade.
  $initialIsXL = request('option')=='1';

  // Serverseitiger Basispreis (entspricht dem gewählten Paket zum Zeitpunkt des Ladens)
  $basePrice = 0;
  if(request('option')=='1'){
    if(request('type')=='Auto/ PKW') $basePrice=299;
    elseif(request('type')=='elektro') $basePrice=349;
    elseif(request('type')=='transporter') $basePrice=349;
    elseif(request('type')=='sportwagen') $basePrice=349;
    elseif(request('type')=='oldtimer') $basePrice=349;
    elseif(request('type')=='wohnmobil') $basePrice=399;
    elseif(request('type')=='kaufbegleitung') $basePrice=329;
  }elseif(request('option')=='2'){
    if(request('type')=='Auto/ PKW') $basePrice=349;
    elseif(request('type')=='elektro') $basePrice=399;
    elseif(request('type')=='transporter') $basePrice=399;
    elseif(request('type')=='sportwagen') $basePrice=399;
    elseif(request('type')=='oldtimer') $basePrice=399;
    elseif(request('type')=='wohnmobil') $basePrice=449;
    elseif(request('type')=='kaufbegleitung') $basePrice=379;
  }
@endphp

<style>
/* Nur Mobile: Box-Style des 2. Panels entfernen, Inhalt bleibt */
@media (max-width: 499.98px) {

   main.py-4 {
    padding-bottom: 10px !important;
  }
  .order-form > form.panel {
    border: none !important;
    box-shadow: none !important;
    background: transparent !important;
    border-radius: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
  }

  /* Innenabstände auf normalen Container-Level zurückholen */
  .order-form > form.panel .panel-header,
  .order-form > form.panel .panel-body {
    padding-left: 0 !important;
    padding-right: 0 !important;
    border: none !important;
    box-shadow: none !important;
    background: transparent !important;
  }

  .mobile-section-separator {
    display: block !important;
  }

  .ph-2{
    padding-bottom: 0px !important;
  }
 
}
 .mobile-section-separator {
  display: none;
  border: 1px solid var(--primary) !important;
  padding-top: 0px !important;
  padding-bottom: 0px !important;
}
  </style>
<main class="py-4 py-md-5">
  <div class="container">
    <div class="booking-grid">

      {{-- SUMMARY --}}
      <aside class="order-summary">
        <div class="panel summary" aria-label="Buchungszusammenfassung">
          <div class="panel-header">
            <h3>Deine Buchung</h3>
            <span class="badge-inline">Schritt 3/3</span>
          </div>
          <div class="panel-body">
            <div class="mb-3">
              <div class="d-flex align-items-center gap-2 small-muted">
                <i class="fa-solid fa-car-side text-primary" aria-hidden="true"></i>
                <span>
                  @if(request('type')=='Auto/ PKW') Auto/ PKW
                  @elseif(request('type')=='elektro') Elektro
                  @elseif(request('type')=='transporter') Transporter
                  @elseif(request('type')=='sportwagen') Sportwagen
                  @elseif(request('type')=='oldtimer') Oldtimer
                  @elseif(request('type')=='wohnmobil') Wohnmobil
                  @elseif(request('type')=='kaufbegleitung') Kaufbegleitung
                  @endif
                  • <span id="packageSizeLabel">@if(request('option')=='1') XL @else XXL @endif</span>
                </span>
              </div>
            </div>

            <div id="priceText" class="mb-2">
              <div class="row-price">
                <span class="label">Fahrzeug-Check</span>
                <strong><span id="basePrice">{{ $basePrice }}</span> €</strong>
              </div>

              {{-- XXL-Upgrade (nur sichtbar & zählend, wenn initial XL UND clientseitig auf XXL toggled) --}}
              <div class="row-price" id="rowXXL" style="display:none;">
                <span class="label">
                  XXL-Upgrade
                  @if($initialIsXL)
                    <button type="button" class="trash-btn" id="removeXXL" aria-label="XXL-Upgrade entfernen">
                      <i class="fa-solid fa-trash-can"></i>
                    </button>
                  @endif
                </span>
                <strong><span id="addonXXL">50</span> €</strong>
              </div>

              <div class="row-price" id="rowEnglish" style="display:none;">
                <span class="label">Dokumente auf Englisch</span>
                <strong><span id="addonEnglish">0</span> €</strong>
              </div>

              <div class="row-price">
                <span class="label">Anfahrt</span>
                <strong>gratis</strong>
              </div>

              <div class="row-price tot">
                <span>Gesamt <small style="font-weight: 500" class="small-muted">(inkl. MwSt.)</small></span>
                <strong><span class="tot" id="totalPrice">{{ $basePrice }}</span><span style="font-weight: 600"> €</span></strong>
              </div>
            </div>

            <div class="mb-1" aria-label="Rabattcode eingeben">
              {{-- Trigger-Text: erst nur diesen zeigen --}}
              <p id="promoTrigger" class="small-muted" style="margin:0; font-size: 0.95rem">
                <a href="#" id="togglePromo">Rabattcode hinzufügen</a>
              </p>

              {{-- Rabattbox: standardmäßig versteckt --}}
              <div id="promoWrap" style="display:none;">
                <div class="promo-compact">
                  {{-- WICHTIG: name + form, damit beim Form-Submit übertragen wird --}}
                  <input type="text"
                         class="promo-input"
                         id="discount_code"
                         name="promo_code"
                         form="bookingForm"
                         placeholder="Rabattcode"
                         inputmode="text"
                         autocomplete="off"
                         aria-label="Rabattcode">
                  <button style="padding-bottom: 3px" class="promo-btn btn-check-promo-code" id="apply_discount" type="button" aria-label="Rabattcode einlösen">Einlösen</button>
                </div>

                <div id="loading" class="text-muted mt-2" style="display:none">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Wird überprüft…
                </div>
                <div id="discount_error" class="mt-2" style="display:none"></div>
              </div>

              {{-- Upgrade-CTA nur rendern, wenn initial XL (unverändert) --}}
              @if($initialIsXL)
                <div class="mt-3" id="upgradeCtaWrap" style="@if(request('option')=='2')display:none;@endif">
                  <button style="border: 1.1px solid var(--primary)" type="button" id="upgrade_xxl" class="upgrade-cta-min" aria-label="Jetzt auf XXL upgraden">
                    <span class="icon"><i class="fa-solid fa-rocket" aria-hidden="true"></i></span>
                    <span class="txt">
                      Jetzt auf XXL upgraden + 50 €
                      <span class="badge-reco">Meist gewählt</span>
                    </span>
                    <span class="ms-auto d-inline-flex align-items-center" aria-hidden="true">
                      <i style="color: var(--primary); padding-right: 5px" class="fa-solid fa-chevron-right"></i>
                    </span>
                  </button>
                </div>
              @endif
            </div>

          </div>
        </div>
      </aside>

      {{-- FORM --}}
      <section class="order-form">
        <!-- <hr class="mobile-section-separator"> -->
        <form id="bookingForm" action="{{ route('booking.step1') }}" method="POST" class="panel">
          @csrf
          {{-- Optionaler Hidden-Fallback (falls du nur bei „Einlösen“ übergeben willst) --}}
          {{-- <input type="hidden" name="promo_code" id="promo_code_hidden"> --}}

          <div class="panel-header ph-2"><h3>Daten eingeben und Check starten</h3></div>
          <div class="panel-body">
            <input type="hidden" id="inputs_type" name="inputs_type" value="auto">
            <input type="hidden" name="option" value="{{ request('option') }}">
            <input type="hidden" name="vehicle_type" class="vehicle_type" value="{{ request('type') }}">

            <div class="mb-3" style="font-size: 15px; color: #4D4D4D; display: flex; align-items: center; gap: 8px;">
              <span style="background-color: #E5F0FF; color: #2563EB; padding: 5px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; width: 33px; height: 33px;">
                <i class="fas fa-car" style="font-size: 15px;"></i>
              </span>
              Fahrzeugdaten
            </div>

            {{-- Inserat-Link --}}
            <div class="mb-2 form-floating-like position-relative" id="advertisement-link-box">
              <input type="text" class="form-control pe-5" name="advertisement_link" value="{{ old('advertisement_link') }}" id="advertisement_link_input" placeholder=" ">
              <label for="advertisement_link_input">Link zum Inserat (z. B. mobile.de)*</label>
              <a href="#opt1" data-bs-toggle="modal" class="position-absolute" style="font-size: 18px; right:12px; top:18px; color:var(--cs-primary)"><i class="fa-regular fa-circle-info"></i></a>
              <div id="valid-url-feedback" class="mt-1" style="display:none; font-size:.9rem; color:var(--cs-secondary)"><i class="fa fa-check me-1"></i>Gültiger Link erkannt.</div>
              @error('advertisement_link')<div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>@enderror
            </div>

            {{-- Toggle-Hinweis --}}
            <p id="toggle-entry-wrapper" class="pt-1 small-muted" style="font-size:0.95rem;">
              Keinen Inserat-Link? <a href="#" id="toggle-entry-link">Daten manuell eintragen</a>
            </p>

            <div id="manual-entry-fields" style="display:none">
              <div class="pt-3"></div>
              <div class="mb-3 form-floating-like">
                <input type="text" class="form-control" name="vehicle_make_model" value="{{ old('vehicle_make_model') }}" id="vehicle_make_model" placeholder=" " disabled>
                <label for="vehicle_make_model">Marke & Modell*</label>
                @error('vehicle_make_model')<div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>@enderror
              </div>
              <div class="mb-3 form-floating-like">
                <input type="text" class="form-control" name="advertisement_link" value="{{ old('advertisement_link') }}" id="advertisement_link_input_1" placeholder=" " disabled>
                <label for="advertisement_link_input_1">Link zum Inserat (optional)</label>
              </div>
              <div class="mb-3 form-floating-like">
                <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="address" placeholder=" " disabled>
                <label for="address">Adresse des Fahrzeugs*</label>
                @error('address')<div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>@enderror
              </div>
              <div class="mb-3 form-floating-like">
                <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="city-input" placeholder=" " disabled>
                <label for="city-input">Stadt oder PLZ*</label>
                @error('city')<div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>@enderror
                <div id="availability-box" class="mt-1" style="display:none; color:var(--cs-secondary); font-size:.9rem"><span class="me-1" style="display:inline-block;width:10px;height:10px;background:var(--cs-secondary);border-radius:50%"></span>Wir sind in diesem Gebiet verfügbar.</div>
              </div>
              <div class="mb-3 form-floating-like">
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" id="phone" placeholder=" " disabled>
                <label for="phone">Telefonnummer des Verkäufers*</label>
                @error('phone')<div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>@enderror
              </div>
            </div>

            <hr class="pt-1">
            {{-- Wünsche --}}
            <div class="mb-3 form-floating-like">
              <textarea class="form-control" name="desc" id="desc" placeholder=" " rows="5">{{ old('desc') }}</textarea>
              <label for="desc">Wünsche an die Prüfung</label>
              @error('desc')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            </div>

            {{-- E-Mail --}}
            <div class="mb-3 form-floating-like">
              <input type="email" class="form-control" name="email" value="{{ old('email')?old('email'):(auth()->user()?auth()->user()->email:'') }}" id="email" placeholder=" ">
              <label for="email">Deine E-Mail-Adresse*</label>
              @error('email')<div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>@enderror
            </div>

            {{-- Addons --}}
            <!-- <div class="mb-3">
              <input type="checkbox" id="englishReport" name="negotiation_list" value="english" class="d-none">
              <label for="englishReport" class="addon">
                <input type="checkbox" aria-hidden="true" tabindex="-1"/>
                <span class="box"><svg id="checkmark" viewBox="0 0 24 24" width="18" height="18" style="display:none"><polyline points="20 6 9 17 4 12" style="fill:none;stroke:black;stroke-width:3"></polyline></svg></span>
                <div class="flex-grow-1">
                  <div class="d-flex flex-wrap align-items-center gap-2"><span class="title">carVertical Bericht</span><span class="price">(+25 €)</span></div>
                  <small class="text-muted">Ideal für Export oder internationale Käufer</small>
                </div>
              </label>
            </div> -->

            <div class="mb-3">
              <input type="checkbox" id="englishReport" name="language" value="english" class="d-none">
              <label for="englishReport" class="addon">
                <input type="checkbox" aria-hidden="true" tabindex="-1"/>
                <span class="box"><svg id="checkmark" viewBox="0 0 24 24" width="18" height="18" style="display:none"><polyline points="20 6 9 17 4 12" style="fill:none;stroke:black;stroke-width:3"></polyline></svg></span>
                <div class="flex-grow-1">
                  <div class="d-flex flex-wrap align-items-center gap-2"><span class="title">Dokumente auf Englisch</span><span class="price">(+9 €)</span></div>
                  <small class="text-muted">Ideal für Export oder internationale Käufer</small>
                </div>
              </label>
            </div>

            <p class="mb-4 small-muted">Pflichtfelder mit * markiert.</p>

            <div class="pb-2 booking-action text-center">
              <button type="submit" class="btn btn-secondary btn-book w-100 w-md-auto">
                Jetzt buchen <i class="fa-solid fa-arrow-right ms-1"></i>
              </button>
              <div class="pt-3 d-flex align-items-center justify-content-center gap-2">
                <i class="fa-solid fa-shield-halved text-success" aria-hidden="true"></i>
                <span>Sichere Zahlungsabwicklung</span>
              </div>
            </div>

            <hr>
     

            @if(request('type')=='kaufbegleitung')
            <div class="booking-info text-center mt-4">
              
                <p class="info-text">
                  Direkt nach Buchungseingang nimmt unser Prüfer Kontakt mit<br class="break-lg"> dir
                  auf, um einen Termin zur Besichtigung zu vereinbaren.
                </p>

                 @else
       
                  <div class="booking-steps mt-4">
                

  <h4 class="steps-title mb-3">So geht es nach deiner Buchung weiter:</h4>

  <div class="step current-step">
    <div class="step-number">1</div>
    <div class="step-content">
      <strong>Online-Buchung (aktueller Schritt)</strong>
    </div>
  </div>

  <div class="step">
    <div class="step-number">2</div>
    <div class="step-content">
      <strong>Wir vereinbaren einen Termin mit dem Verkäufer</strong>
    </div>
  </div>

  <div class="step">
    <div class="step-number">3</div>
    <div class="step-content">
      <strong>Prüfung des Fahrzeugs vor Ort</strong>
    </div>
  </div>

  <div class="step">
    <div class="step-number">4</div>
    <div class="step-content">
      <strong>Zusendung des Prüfergebnisses</strong>
    </div>
  </div>

</div>
        @endif

        <div class="reviews d-flex flex-column align-items-center gap-2 mt-4">
                <div class="d-inline-flex">
                  <img src="assets/imgs/client/client-3.jpg" class="rounded-circle border border-2" width="48" height="48" alt="Client">
                  <img src="assets/imgs/client/client-2.jpg" class="rounded-circle border border-2 ms-n2" width="48" height="48" alt="Client">
                  <img src="assets/imgs/client/client-1.jpg" class="rounded-circle border border-2 ms-n2" width="48" height="48" alt="Client">
                </div>
                <div class="review-text"><strong>2.500+</strong> zufriedene Kunden</div>
              </div>
            </div>

       <!-- <div class="reviews d-flex flex-row flex-lg-column justify-content-between align-items-start align-items-lg-center gap-2 mt-4 w-100 px-2">
        <div class="d-flex flex-column align-items-start align-items-lg-center gap-2">
          <div class="d-inline-flex">
            <img src="assets/imgs/client/client-3.jpg" class="rounded-circle border border-2" width="48" height="48" alt="Client">
            <img src="assets/imgs/client/client-2.jpg" class="rounded-circle border border-2 ms-n2" width="48" height="48" alt="Client">
            <img src="assets/imgs/client/client-1.jpg" class="rounded-circle border border-2 ms-n2" width="48" height="48" alt="Client">
          </div>
          <div class="review-text text-start text-lg-center"><strong>2.500+</strong> zufriedene Kunden</div>
        </div>

        <img src="/tuv-gebrauchtwagenbewertung.png" class="tuv-logo-mobile d-lg-none" alt="TÜV">
      </div>
              
        <style>
        @media (min-width: 576px){
          .tuv-logo-mobile{ display: none !important; }
        }@media (min-width: 576px){
          .reviews{
            justify-content: center !important;
            align-items: center !important;
            text-align: center;
          }
          .reviews > .d-flex{
            align-items: center !important;
          }
        }

          .tuv-logo-mobile {
          height: 55px;
          width: auto;
        }
        </style> -->
             

          </div>
        </form>
      </section>

    </div>
  </div>

  {{-- Modals (unverändert) --}}
  <div class="modal fade" id="money-back" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Geld-zurück-Garantie</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
          <p>Sollte die geplante Besichtigung nicht stattfinden, wird der vollständige Betrag an dich zurückerstattet.</p>
          <div class="d-flex align-items-center gap-2 mt-2"><i class="fas fa-check-circle text-success"></i><span>Für deine Buchung: Aktiv</span></div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="opt1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Fahrzeug online inseriert?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Füge einfach den Link zum Inserat (z. B. mobile.de) ein. Bitte stelle sicher, dass im Inserat Folgendes enthalten ist:
          <ul class="mt-2 mb-0 list-unstyled">
            <li><i class="fa-solid fa-check text-success me-2"></i>Marke & Modell</li>
            <li><i class="fa-solid fa-check text-success me-2"></i>Adresse des Fahrzeugs</li>
            <li><i class="fa-solid fa-check text-success me-2"></i>Stadt oder PLZ</li>
            <li><i class="fa-solid fa-check text-success me-2"></i>Telefonnummer des Verkäufers</li>
          </ul>
          <div class="mt-3">Fehlen wichtige Angaben? Trage die Daten manuell ein.</div>
        </div>
      </div>
    </div>
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
  (function(){
    const trigger = document.getElementById('promoTrigger');
    const toggle  = document.getElementById('togglePromo');
    const wrap    = document.getElementById('promoWrap');

    if(toggle && wrap && trigger){
      toggle.addEventListener('click', function(e){
        e.preventDefault();
        wrap.style.display = 'block';
        trigger.style.display = 'none';
      });
    }
  })();

  // Toggle Manual Entry + exakter Textwechsel
  document.addEventListener('DOMContentLoaded', function(){
    const toggleWrapper = document.getElementById('toggle-entry-wrapper');
    const manual       = document.getElementById('manual-entry-fields');
    const adBox        = document.getElementById('advertisement-link-box');
    const inputs       = ['vehicle_make_model','address','city-input','phone','advertisement_link_input_1'];

    function renderToggleLink(manualVisible){
      if(!toggleWrapper) return;
      if(manualVisible){
        toggleWrapper.innerHTML = '<a href="#" id="toggle-entry-link">Zurück zur Inserat-Option</a>';
      } else {
        toggleWrapper.innerHTML = 'Keinen Inserat-Link? <a href="#" id="toggle-entry-link">Fahrzeugdaten manuell eintragen</a>';
      }
    }

    function bindHandler(){
      const link = document.getElementById('toggle-entry-link');
      if(!link) return;
      link.addEventListener('click', function(e){
        e.preventDefault();
        const isManual = manual.style.display !== 'none';
        const toManual = !isManual;
        manual.style.display = toManual ? 'block' : 'none';
        adBox.style.display  = toManual ? 'none'  : 'block';
        document.getElementById('inputs_type').value = toManual ? 'manual' : 'auto';

        inputs.forEach(id=>{
          const el = document.getElementById(id);
          if(!el) return;
          el.disabled = !toManual;
          if(id !== 'advertisement_link_input_1'){
            toManual ? el.setAttribute('required','required') : el.removeAttribute('required');
          }
        });

        renderToggleLink(toManual);
        bindHandler();

        if(window._cs_calc_total) window._cs_calc_total();
      });
    }

    manual.style.display = 'none';
    adBox.style.display  = 'block';
    renderToggleLink(false);
    bindHandler();

    // sync ad link (beide Felder spiegeln)
    function syncTo(id, value){ const el = document.getElementById(id); if(el) el.value = value; }
    const ad0 = document.getElementById('advertisement_link_input');
    const ad1 = document.getElementById('advertisement_link_input_1');
    if(ad0 && ad1){
      ['keyup','change'].forEach(evt=>{
        ad0.addEventListener(evt, ()=>syncTo('advertisement_link_input_1', ad0.value));
        ad1.addEventListener(evt, ()=>syncTo('advertisement_link_input', ad1.value));
      });
    }

    // Availability Cue
    const city = document.getElementById('city-input');
    if(city){
      city.addEventListener('blur', ()=>{
        const box=document.getElementById('availability-box');
        if(!box) return;
        box.style.display = city.value.trim()!=='' ? 'block':'none';
      });
    }
  });

  // URL validation cue
  (function(){
    const adInput = document.getElementById('advertisement_link_input');
    const validFeedback = document.getElementById('valid-url-feedback');
    function isValidURL(str){ try{ const u=new URL(str.startsWith('http')?str:'https://'+str); return !!u.hostname && u.hostname.includes('.'); }catch(e){ return false; } }
    if(adInput){
      adInput.addEventListener('input', function(){
        const v=this.value.trim();
        if(!v){
          this.style.border=''; validFeedback.style.display='none'; return;
        }
        if(isValidURL(v)){
          this.style.border='2px solid var(--cs-secondary)';
          validFeedback.style.display='block';
        } else {
          this.style.border=''; validFeedback.style.display='none';
        }
      });
    }
  })();
</script>

<script>
  // Pricing logic: Grundpreis + (Englisch? 9) + (XXL? 50 nur wenn initial XL)
  (function(){
    const INITIAL_IS_XL = {{ $initialIsXL ? 'true' : 'false' }};

    const baseEl         = document.getElementById('basePrice');
    const totalEl        = document.getElementById('totalPrice');
    const englishCk      = document.getElementById('englishReport');
    const addonEnglishEl = document.getElementById('addonEnglish');
    const rowEnglish     = document.getElementById('rowEnglish');

    const rowXXL       = document.getElementById('rowXXL');
    const addonXXLEl   = document.getElementById('addonXXL');
    const formOpt      = document.querySelector('form.panel input[name="option"]');
    const pkgLabel     = document.getElementById('packageSizeLabel');

    function isXXL(){ return (formOpt && formOpt.value === '2'); }

    function calc(){
      const base = parseInt(baseEl?.innerText||'0',10) || 0;
      let addons = 0;

      const englishOn = !!(englishCk && englishCk.checked);
      if(englishOn){
        addons += 9;
        if(addonEnglishEl) addonEnglishEl.innerText = '9';
        if(rowEnglish) rowEnglish.style.display = '';
      } else {
        if(addonEnglishEl) addonEnglishEl.innerText = '0';
        if(rowEnglish) rowEnglish.style.display = 'none';
      }

      if(INITIAL_IS_XL && isXXL()){
        addons += 50;
        if(addonXXLEl) addonXXLEl.innerText = '50';
        if(rowXXL) rowXXL.style.display = '';
      } else {
        if(rowXXL) rowXXL.style.display = 'none';
      }

      if(totalEl){ totalEl.innerText = (base + addons).toString(); }
      if(pkgLabel) pkgLabel.textContent = isXXL() ? 'XXL' : 'XL';
    }

    if(englishCk){ englishCk.addEventListener('change', calc); }

    window._cs_calc_total = calc;

    const addonLabel = document.querySelector('label[for="englishReport"] #checkmark');
    const addonClickable = document.querySelector('label[for="englishReport"]');
    if(addonClickable){
      addonClickable.addEventListener('click', function(){
        const target = document.getElementById('englishReport');
        setTimeout(()=>{ if(addonLabel) addonLabel.style.display = target.checked ? 'block':'none'; },0);
      });
    }

    calc();
  })();
</script>

<script>
  // Promo code (AJAX-Check + garantiertes Mitsenden via form="bookingForm")
  (function(){
    const btn = document.querySelector('.btn-check-promo-code');
    if(!btn) return;

    btn.addEventListener('click', function(){
      const codeInput = document.getElementById('discount_code');
      const code = (codeInput?.value || '').trim();
      const loading = document.getElementById('loading');
      const msg = document.getElementById('discount_error');

      if(!code){
        msg.textContent='Bitte gib einen Rabattcode ein.';
        msg.style.display='block';
        msg.classList.remove('text-success');
        msg.classList.add('text-danger');
        return;
      }

      loading.style.display='block'; msg.style.display='none';

      fetch('{{ route('promo.check') }}?promo_code='+encodeURIComponent(code), {
        method: 'GET',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json'
        },
        credentials: 'same-origin'
      })
        .then(r=> r.ok ? r.json() : Promise.reject(r))
        .then(data=>{
          loading.style.display='none';
          if(data?.success){
            msg.innerHTML='<i class="fa fa-check text-success me-1"></i> <span class="success-message">Rabattcode wurde aktiviert und wird im nächsten Schritt verrechnet.</span>';
            msg.style.display='block'; msg.classList.remove('text-danger'); msg.classList.add('text-success');
            // Falls du NUR bei Erfolg mitschicken willst, nimm alternativ ein Hidden-Feld:
            // document.getElementById('promo_code_hidden').value = code;
            codeInput.classList.add('valid-discount');
          } else {
            msg.textContent='Rabattcode ungültig.'; msg.style.display='block'; msg.classList.remove('text-success'); msg.classList.add('text-danger');
            codeInput.classList.remove('valid-discount');
          }
        })
        .catch(()=>{
          loading.style.display='none';
          msg.textContent='Etwas ist schiefgelaufen. Bitte später erneut versuchen.';
          msg.style.display='block';
          msg.classList.remove('text-success'); msg.classList.add('text-danger');
        });
    });
  })();
</script>

<script>
  // Upgrade/Downgrade nur erlauben, wenn initial XL
  (function(){
    const INITIAL_IS_XL = {{ $initialIsXL ? 'true' : 'false' }};
    if(!INITIAL_IS_XL) return;

    const btnUpgrade   = document.getElementById('upgrade_xxl');
    const wrapUpgrade  = document.getElementById('upgradeCtaWrap');
    const formOpt      = document.querySelector('form.panel input[name="option"]');
    const pkgLabel     = document.getElementById('packageSizeLabel');
    const stepperSecondText = document.querySelector('.step-navigation button.checked:nth-child(2) .text');
    const removeXXLBtn = document.getElementById('removeXXL');

    function setPackage(toXXL){
      if(!formOpt) return;
      formOpt.value = toXXL ? '2' : '1';
      if(pkgLabel) pkgLabel.textContent = toXXL ? 'XXL' : 'XL';
      if(stepperSecondText) stepperSecondText.textContent = toXXL ? 'XXL' : 'XL';
      if(wrapUpgrade) wrapUpgrade.style.display = toXXL ? 'none' : '';
      if(window._cs_calc_total) window._cs_calc_total();
    }

    if(btnUpgrade){ btnUpgrade.addEventListener('click', ()=> setPackage(true)); }
    if(removeXXLBtn){ removeXXLBtn.addEventListener('click', (e)=>{ e.preventDefault(); setPackage(false); }); }

    if(formOpt && formOpt.value === '2' && wrapUpgrade){ wrapUpgrade.style.display = 'none'; }
  })();
</script>
@endsection

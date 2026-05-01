@extends('mainpages.master-layout')
@section('title', 'Carspector | Schritt 2/3')
@section('meta_description', 'Entscheide dich für das passende Prüfpaket: XL für Basis-Check oder XXL für umfassende Prüfung mit Zusatzleistungen.')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-T7E6W0hCk4n8QXQeC3mx3t0m5n3kqvKQ/4e6+Q3+1XJgNw3p5j6b0s5r9HkUx3Q9oJY8Xz8tK9cJ9W5lU7lqtw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.mobile-call-btn{position:fixed;right:15px;bottom:15px;display:flex;justify-content:center;align-items:center;width:45px;height:45px;border-radius:50%;background:#28a745;color:#fff;box-shadow:0 2px 5px rgba(0,0,0,.3);z-index:10}
.mobile-call-btn:hover{background:#087b23}

.trust-marquee-wrapper{overflow:hidden;background:#f4f7fa;border-radius:12px;padding:15px 0;margin:30px auto;border:1px solid #e0e6eb;max-width:800px}
.trust-marquee{width:100%;overflow:hidden;position:relative}
.trust-marquee-inner{display:inline-flex;gap:40px;white-space:nowrap;animation:scroll-left 110s linear infinite;font-size:15px;font-weight:500;color:#333}
.trust-marquee-inner span{flex:0 0 auto;padding:0 10px}
@keyframes scroll-left{from{transform:translateX(0)}to{transform:translateX(-50%)}}

#fin-model .modal-dialog{max-width:475px;width:100%;margin:auto}
#fin-model .modal-dialog-centered{display:flex;align-items:center;justify-content:center;min-height:100vh}
#tel .modal-dialog{max-width:300px;width:100%;margin:auto}
#tel .modal-dialog-centered{display:flex;align-items:center;justify-content:center;min-height:100vh}

@media(min-width:991px){.pt-desk{padding-top:15px}}
.termin-pb{padding-bottom:17px}
@media(min-width:768px){.termin-pb{padding-bottom:25px}}
.custom-mobile-button {
    background-color: #F0F5FA; /* Leichter blauer Hintergrund */
    color: var(--primary); /* Textfarbe bleibt wie im ursprünglichen Design */
    border: 1px solid; /* Entfernt den Rahmen */
    border-color: var(--primary);
    border-radius: 0px; /* Optional: leichte Abrundung */
    padding: 12px 24px; /* Polsterung */
    font-size: 16px; /* Schriftgröße */
    text-align: center;
    display: inline-block;
    transition: background-color 0.3s ease; /* Sanfter Hover-Effekt */
}

.custom-mobile-button:hover {
    background-color: #cceeff; /* Etwas dunklerer blauer Hintergrund beim Hover */
}

    .custom-mobile-button {
        display: block;
        width: 100%; /* Vollbreite auf Mobilgeräten */
        padding: 12px; /* Polsterung anpassen */
        box-sizing: border-box;
        text-align: center;
    }

    @media (min-width: 991px) {
        .custom-mobile-button {
        max-width: 350px !important; /* Vollbreite auf Mobilgeräten */
    }
    }

    @media (max-width: 768px) {
        .custom-mobile-button {
        max-width: 85% !important; /* Vollbreite auf Mobilgeräten */
    }
    }

    @media (min-width: 500px) {
        .btndk {
            width: 400px !important;
        }
    }



    @media (max-width: 475px) {
    .mobile-br::after {
        content: "\A";
        white-space: pre;
    }
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

#step_desc_modal .modal-dialog {
    max-width: 475px;
    width: 100%;
    margin: auto; 
}

/* Mobile-Styling */
@media (max-width: 768px) {
    #step_desc_modal .modal-dialog {
        max-width: 90%;
        width: 90%;
        margin: auto; 
    }
}

#step_desc_modal .modal-dialog-centered {
    display: flex;
    align-items: center;
    justify-content: center; 
    min-height: 100vh; 
}


.mobile-call-btn {
    display: flex; /* Sichtbar machen und zentrieren */
    position: absolute; /* Relative zur umgebenden Box */
    right: 0; /* Direkt an der rechten Seite */
    bottom: 0; /* Direkt am unteren Rand */
    background-color: #28a745; /* Grün */
    color: white;
    width: 45px;
    height: 45px;
    border-radius: 50%; /* Runde Form */
    font-size: 1.2rem;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); /* Schattierung */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10; /* Über anderen Elementen */
    position: fixed; /* Fixiert am Bildschirmrand */
        right: 15px; /* Abstand zur rechten Wand */
        bottom: 15px; /* Abstand zum unteren Rand */
}

.mobile-call-btn:hover {
    background-color:rgb(8, 123, 35); /* Grün */
}

#tel .modal-dialog {
    max-width: 300px;
    width: 100%;
    margin: auto; 
}

#tel .modal-dialog-centered {
    display: flex;
    align-items: center;
    justify-content: center; 
    min-height: 100vh; 
}

@media (min-width: 991px) {
    .pt-desk {
        padding-top: 15px;
    }
} 

.countdown-container {
  text-align: center;
  margin: 15px auto;
  background: #f9f9f9;
  padding: 12px 15px;
  border-radius: 10px;
  border: 2px solid #e67e22;
  max-width: 315px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.countdown-container h2 {
  margin: 0 0 15px;
  font-size: 20px;
  font-weight: bold;
  letter-spacing: 0.25px;
  color: #555;
}

.countdown {
  display: flex;
  justify-content: center;
  gap: 15px;
}

.countdown div {
  text-align: center;
}

.countdown div span {
  display: block;
  font-size: 36px;
  font-weight: bold;
  color: #e67e22;
}

.countdown div small {
  font-size: 14px;
  color: #999;
  text-transform: uppercase;
}

@media(min-width: 768px) {
    .termin-pb {
        padding-bottom: 25px !important;
    }
}

@media(max-width: 767px) {
    .termin-pb {
        padding-bottom: 17px !important;
    }
}


.trust-marquee-wrapper {
  overflow: hidden;
  background: #f4f7fa;
  border-radius: 12px;
  padding: 15px 0;
  margin: 35px auto;
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
  animation: scroll-left 45s linear infinite;
  font-size: 15px;
  font-weight: 500;
  color: #333;
}

.trust-marquee-inner span {
  flex: 0 0 auto;
  padding: 0 10px;
}

/* Langsame, durchlaufende Animation */
@keyframes  scroll-left {
  from {
    transform: translateX(0%);
  }
  to {
    transform: translateX(-50%);
  }
}

    footer a:hover {
        color: var(--primary) !important;
    }
    
    @media(max-width: 767px) {
        .b-pad {
            letter-spacing: 0px !important;
        }
    }
@media (max-width: 500px) {
    div[style*="display: flex; flex-wrap: wrap"] > div {
        flex: 1 1 100% !important;
        min-width: 100% !important;
    }
}

@media (min-width: 926px) {
  .line-break::after {
    content: "";
    display: block;
  }
}
.mobile-submenu li,
.mobile-nav-item {
    margin-bottom: 4px; /* oder 2px für noch enger */
}

.mobile-submenu a,
.mobile-nav-link {
    padding-bottom: 7px;
}
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
      transform:translateY(-16px); font-size:.75rem; color:var(--cs-primary); background-color: #fafaffff; padding:0 6px; left:10px;
  }

  .addon{ display:flex; align-items:flex-start; gap:12px; padding:14px; border:1px solid #e5e7eb; border-radius:12px; cursor:pointer; transition:border-color .2s ease, box-shadow .2s ease; }
  .addon:hover{ border-color: var(--cs-primary); box-shadow:0 6px 18px rgba(2,6,23,.06); }
  .addon .box{ width:20px; height:20px; border:2px solid #cbd5e1; border-radius:6px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
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

  .addon{ background-color:#fafaffff; border:1px solid #d1d5db !important; border-radius:5px !important; }
  #englishReport:checked + label.addon, #verhandlung:checked + label.addon{ border-color:var(--primary) !important; }

  /* Rabattbutton */
  #apply_discount{ box-shadow:none !important; }
</style>
{{-- Füge das am Ende deiner bestehenden <style>-Sektion hinzu --}}
<style>
  /* Inputs */
  .form-control, .input-group .form-control, .form-floating-like .form-control, textarea.form-control{
    border:1px solid #d1d5db; box-shadow:none !important; outline:none !important; background-color:#fafaffff;
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
  .promo-compact{ display:flex; width:100%; border:1px solid #d1d5db; border-radius:6px; overflow:hidden; background:#fafaffff; }
  .promo-input{ flex:1 1 auto; min-width:0; border:0; background:transparent; padding:12px 14px; height:50px; outline:none !important; box-shadow:none !important; font-size:1rem; }
  .promo-input::placeholder{ color:#9aa3ae; }
  .promo-btn{ flex:0 0 auto; border:0; height:50px; padding:0 35px; font-weight:500; background:#e9e9e9ff; color:#000; cursor:pointer; display:inline-flex; align-items:center; justify-content:center; transition:opacity .15s ease; }
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
  .upgrade-cta-min .txt{ font-weight:600; line-height:1.2; display:flex; align-items:center; gap:.5rem; flex-wrap:wrap; }
  .badge-reco{ display:inline-block; font-size:.72rem; line-height:1; padding:.28rem .5rem; border-radius:999px; background:var(--secondary); color:#fff; font-weight:700; }

  /* Entfernen (Mülleimer) */
  .trash-btn{ background:none; border:0; padding:0; margin:0; color:#ef4444; cursor:pointer; display:inline-flex; align-items:center; gap:.35rem; }
  .trash-btn:hover{ color:#dc2626; }

/* 1) Rechter „Summary“-Streifen schmaler (falls Grid vorhanden ODER nicht) */
@media (min-width: 992px) {
  /* Falls der Grid-Wrapper existiert: rechte Spalte auf 360px */
  .booking-grid{
    grid-template-columns: minmax(0,1fr) 360px !important;
  }

  /* Falls KEIN Grid aktiv ist: erzwinge eine schmale Summary-Spalte */
  .order-summary{
    margin-left: auto !important; /* schiebt sie nach rechts */
  }
  .order-summary .panel{
    width: 100% !important;
  }
}

/* 2) Wenn du stattdessen NUR das Formular-Panel schmaler willst */
@media (min-width: 992px){
  .order-form > form.panel{
    max-width: 850px;      /* beliebig anpassen (z. B. 720px, 680px ...) */
    margin: 0 auto;        /* mittig zentrieren */
  }
}


  @media (min-width: 992px) {
  /* NUR den Bereich der Auswahlboxen im Panel „hochziehen“ */
  .order-form .panel .panel-body .pricing-select {
    margin-top: -35px !important;   /* leicht nach oben ziehen */
  }
}


/* Panel-Inhalt immer mittig */
.order-form .panel-body {
  display: flex;
  flex-direction: column;
  align-items: center;  /* horizontal zentrieren */
}

/* Gemeinsame Regeln für Auswahl + Prüfungsinhalte */
.pricing-select,
.check-content {
  width: 100%;
  max-width: 900px;     /* Desktop: nicht breiter als 900px */
  margin: 0 auto;
}

/* Text in den Listen bleibt links */
.check-content {
  text-align: left;
}

/* Mobile: Boxen nicht zu breit, etwas Abstand zum Rand */
@media (min-width: 1px) {
  .pricing-select,
  .check-content {
     padding-left: 10px !important;   /* 1–2px „Luft“ innerhalb des Panels */
    padding-right: 10px !important;
  }
}


  @media (min-width: 500px) and (max-width: 575.98px) {
      .order-form .panel .panel-body .pricing-select,
  .order-form .panel .panel-body .check-content {
    padding-left: 10px !important;   /* schlankes Innenpadding */
    padding-right: 10px !important;
  }

  }

@media (max-width: 575.98px) {
  /* Wrapper-Breite + Zentrierung (unverändert) */
  .order-form .panel .panel-body .pricing-select,
  .order-form .panel .panel-body .check-content {
    width: 100%;
    max-width: min(95vw, calc(100%)) !important; /* ~2px Panelrand je Seite */
    margin-left: auto !important;
    margin-right: auto !important;
    box-sizing: border-box;
  }


  /* Prüfungsinhalte: einspaltig, mittig, ohne Überhang (wie gehabt) */
  .order-form .panel .panel-body .tab-content.row {
    margin-left:0px !important;
    margin-right: 0px !important;
  }
  .order-form .panel .panel-body .tab-content > [class*="col-"] {
    flex: 0 0 100 !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    box-sizing: border-box;
    margin: 0 auto;
  }
}

/* Checkpunkte in .check-content ganz nach links an den Rand */
.order-form .panel .panel-body .check-content {
  padding-left: 0 !important;   /* Box ohne linken Innenabstand */
  padding-right: 0 !important;   /* Box ohne linken Innenabstand */
}

/* ul ohne Einzug */
.order-form .panel .panel-body .check-content .check-cotnent-body ul {
  margin-left: 0 !important;
  padding-left: 0 !important;
}

/* jedes Listenelement: Icon-Spalte + Text-Spalte, ohne linken Einzug */
.order-form .panel .panel-body .check-content .check-cotnent-body li {
  list-style: none;
  display: grid;
  grid-template-columns: 24px 1fr;  /* 24px fürs Icon, Rest für Text */
  align-items: start;
  gap: 12px;
  margin-left: 0 !important;
  padding-left: 0 !important;
}

/* Icon-Span bündig links, ohne zusätzliche Abstände */
.order-form .panel .panel-body .check-content .check-cotnent-body li > span {
  width: 24px;
  display: flex;
  justify-content: center; /* oder 'flex-start', wenn du es ganz links willst */
}

/* keine Extramargen auf Icon selbst */
.order-form .panel .panel-body .check-content .check-cotnent-body li > span img,
.order-form .panel .panel-body .check-content .check-cotnent-body li > span i {
  margin: 0 !important;
}

/* Checkpunkte: von Grid -> Flex, damit Text und Info-Icon in EINER Zeile bleiben */
.order-form .panel .panel-body .check-content .check-cotnent-body li{
  display: flex !important;
  align-items: flex-start;
  gap: 15px;                /* Abstand zwischen linkem Check-Icon und Text */
  margin-left: 0 !important;
  padding-left: 0 !important;
  padding-top: 3px;        /* Text minimal tiefer */
}

/* Linkes Check-Icon fix 24px breit, bündig am Rand */
.order-form .panel .panel-body .check-content .check-cotnent-body li > span{
  flex: 0 0 24px;
  width: 24px;
  display: flex;
  justify-content: center; /* oder 'flex-start' wenn noch weiter links gewünscht */
  margin-top: -3px;        /* hebt das Icon wieder an (zu obiger padding-top passend) */
}

/* Das Info-Icon (nur bei FIN-Abfrage vorhanden) direkt hinter dem Text, inline */
.order-form .panel .panel-body .check-content .check-cotnent-body li a[data-bs-toggle="modal"]{
  display: inline-flex;     /* bleibt in derselben Zeile wie der Text */
  align-items: center;
  margin-left: 4px;         /* minimaler Abstand zum Text */
  white-space: nowrap;      /* bricht nicht alleine in die nächste Zeile */
  line-height: 1;
}
.order-form .panel .panel-body .check-content .check-cotnent-body li a[data-bs-toggle="modal"] i{
  line-height: 1;
  margin: 0 !important;
}





/* Minimal nach rechts – nur Desktop */
@media (min-width: 992px){
  .nudge-right-desktop{
    margin-left: 15px; /* bei Bedarf 6–12px feinjustieren */
  }
  .nudge-right-desktop-2{
    margin-left: 8px; /* bei Bedarf 6–12px feinjustieren */
  }
}

/* Info-Link Style */
.info-link{ color:var(--primary); text-decoration:none; display:inline-flex; align-items:center; gap:6px; font-weight:600; }
.info-link:hover{ opacity:.9; }

/* Schönes Modal „So funktioniert’s“ */
.flow-modal .modal-content{ border-radius:16px; }
.flow-modal .modal-header{ border-bottom:1px solid #eef2f7; }
.flow-modal .step{ display:flex; align-items:flex-start; gap:12px; padding:10px 0; }
.flow-modal .ico{
  width:38px; height:38px; border-radius:10px; background:#eef2ff; color:var(--primary);
  display:flex; align-items:center; justify-content:center; flex-shrink:0; border:1px solid #dbe3ff;
}
.flow-modal h6{ margin:0; font-weight:700; font-size:1rem; }
.flow-modal p{ margin:2px 0 0; color:#4b5563; font-size:.95rem; }
.flow-modal .tip{
  background:#f8fafc; border:1px solid #e5e7eb; border-radius:10px; padding:10px 12px; font-size:.92rem; color:#374151;
}


html, body { overflow-x: hidden; }

img, video, iframe {
  max-width: 100%;
  height: auto;
}


@media (min-width: 992px) { /* ab Bootstrap lg-Breakpoint */
  .header-logo img {
    max-height: 42px; /* oder deine Wunschhöhe */
    width: auto;      /* sorgt dafür, dass das Seitenverhältnis bleibt */
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
  .header .header-logo { padding-top: 3px !important;}
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
    height: 1.25px;
    background: rgba(255, 255, 255, 0.25); /* dezente helle Linie */
  }

}

</style>
@endsection
<!-- Schönes Info-Modal (dynamisch) -->
<div class="modal fade" id="serviceFlow" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered flow-modal" style="width:95%; max-width:450px; margin:0 auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa-regular fa-circle-question me-2"></i>
          {{ request('type') == 'kaufbegleitung' ? 'So funktioniert’s' : 'So funktioniert’s' }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
      </div>

      <div class="modal-body">
        @if(request('type')=='kaufbegleitung')
          <!-- Kaufbegleitung – Schritte im Design des ersten Modals -->
          <div class="step">
            <div class="ico"><i class="fa-solid fa-file-pen"></i></div>
            <div>
              <h6 style="letter-spacing: -0.2px">1. Infos und Buchung</h6>
              <p>Wähle dein gewünschtes Paket und buche den Auftrag im nächsten Schritt.</p>
            </div>
          </div>

          <div class="step">
            <div class="ico"><i class="fa-solid fa-phone"></i></div>
            <div>
              <h6 style="letter-spacing: -0.2px">2. Kontaktaufnahme</h6>
              <p>Unser Prüfer nimmt Kontakt mit dir auf, um einen Besichtigungstermin zu vereinbaren.</p>
            </div>
          </div>

          <div class="step">
            <div class="ico"><i class="fa-solid fa-magnifying-glass"></i></div>
            <div>
              <h6 style="letter-spacing: -0.2px">3. Check des Fahrzeugs</h6>
              <p>Wir treffen dich am Fahrzeug, führen in deiner Anwesenheit eine umfassende Prüfung durch und beantworten gerne all deine Fragen.</p>
            </div>
          </div>

          <div class="step">
            <div class="ico"><i class="fa-solid fa-handshake"></i></div>
            <div>
              <h6 style="letter-spacing: -0.2px">4. Abschlussgespräch</h6>
              <p>Vor Ort erhältst du eine fundierte Kaufempfehlung, eine realistische Preiseinschätzung und das Prüfergebnis.</p>
            </div>
          </div>

          <div class="tip mt-2">
            <i style="color: var(--secondary)" class="fa-regular fa-circle-check me-2"></i>
            Carspector ist deutschlandweit verfügbar.
          </div>

        @else
          <!-- Standard-Flow (Original) -->
          <div class="step">
            <div class="ico"><i class="fa-solid fa-rocket"></i></div>
            <div>
              <h6 style="letter-spacing: -0.2px">1. Paket wählen & online buchen</h6>
              <p>Wähle dein gewünschtes Paket und buche den Auftrag im nächsten Schritt.</p>
            </div>
          </div>

          <div class="step">
            <div class="ico"><i class="fa-solid fa-calendar-check"></i></div>
            <div>
              <h6 style="letter-spacing: -0.2px">2. Terminvereinbarung</h6>
              <p>Nach Buchungseingang kontaktieren wir den Verkäufer und vereinbaren einen Besichtigungstermin.</p>
            </div>
          </div>

          <div class="step">
            <div class="ico"><i class="fa-solid fa-magnifying-glass"></i></div>
            <div>
              <h6 style="letter-spacing: -0.2px">3. Check vor Ort</h6>
              <p>Unser Experte fährt zum Fahrzeug und führt einen umfassenden Gebrauchtwagen-Check vor Ort durch.</p>
            </div>
          </div>

          <div class="step">
            <div class="ico"><i class="fa-solid fa-file-shield"></i></div>
            <div>
              <h6 style="letter-spacing: -0.2px">4. Zustandsbericht per E-Mail</h6>
              <p>Du bekommst das Prüfergebnis, die Bilder und alle weiteren Dokumente per E-Mail.</p>
            </div>
          </div>

          <div class="step">
            <div class="ico"><i class="fa-solid fa-handshake"></i></div>
            <div>
              <h6 style="letter-spacing: -0.2px">5. Sicher kaufen</h6>
              <p>Du kannst nun eine fundierte und sichere Kaufentscheidung treffen.</p>
            </div>
          </div>

          <div class="tip mt-2">
            <i style="color: var(--secondary)" class="fa-regular fa-circle-check me-2"></i>
            Carspector ist deutschlandweit verfügbar.
          </div>
        @endif
      </div>
    </div>
  </div>
</div>

<style>
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
       <button type="button" class="current">
          <span class="ind"></span>
          <span class="text">Check</span>
        </button>
        <button type="button">
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
       <button type="button" class="current">
          <span class="ind"></span>
          <span class="text">Check</span>
        </button>
        <button type="button">
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
@php
    $type = request('type');

    // Header-/Stepper-Label
    $labels = [
        'transporter'     => 'Transporter',
        'oldtimer'        => 'Oldtimer',
        'sportwagen'      => 'Sportwagen',
        'wohnmobil'       => 'Wohnmobil',
        'elektro'         => 'Elektro',
        'kaufbegleitung'  => 'Kaufbegleitung',
        'Auto/ PKW'       => 'Auto/ PKW',
        ''                => 'Auto/ PKW',
        null              => 'Auto/ PKW',
    ];
    $vehicleLabel = $labels[$type] ?? 'Auto/ PKW';

    // Preise
    $pricesMap = [
        'transporter'     => ['xl' => 349, 'xxl' => 399],
        'oldtimer'        => ['xl' => 349, 'xxl' => 399],
        'sportwagen'      => ['xl' => 349, 'xxl' => 399],
        'wohnmobil'       => ['xl' => 399, 'xxl' => 449],
        'elektro'         => ['xl' => 349, 'xxl' => 399],
        'kaufbegleitung'  => ['xl' => 329, 'xxl' => 379],
        'default'         => ['xl' => 299, 'xxl' => 349],
    ];
    $prices = $pricesMap[$type] ?? $pricesMap['default'];

    // Ratings
    $ratingsMap = [
        'transporter'     => ['xl' => '4.8 (53)',   'xxl' => '4.8 (337)'],
        'oldtimer'        => ['xl' => '4.8 (344)',  'xxl' => '4.8 (704)'],
        'sportwagen'      => ['xl' => '4.8 (89)',   'xxl' => '4.8 (228)'],
        'wohnmobil'       => ['xl' => '4.8 (55)',   'xxl' => '4.8 (412)'],
        'elektro'         => ['xl' => '4.8 (15)',  'xxl' => '4.8 (117)'],
        'kaufbegleitung'  => ['xl' => '4.7 (129)',  'xxl' => '4.7 (399)'],
        'default'         => ['xl' => '4.8 (537)',  'xxl' => '4.8 (1.374)'],
    ];
    $ratings = $ratingsMap[$type] ?? $ratingsMap['default'];

    // Kurzbeschreibungen
    $xlDescMap = [
        'transporter'     => 'Umfassender Transporter-Check',
        'oldtimer'        => 'Umfassender Oldtimer-Check',
        'sportwagen'      => 'Umfassender Sportwagen-Check',
        'wohnmobil'       => 'Umfassender Wohnmobil-Check',
        'elektro'         => 'Umfassender Elektro-Check',
        'kaufbegleitung'  => 'Umfassende Kaufbegleitung',
        'default'         => 'Umfassender Fahrzeug-Check',
    ];
    $xxlDescMap = [
        'transporter'     => 'Umfassender Transporter-Check + FIN-Abfrage & Berechnung',
        'oldtimer'        => 'Umfassender Oldtimer-Check + FIN-Abfrage & Berechnung',
        'sportwagen'      => 'Umfassender Sportwagen-Check + FIN-Abfrage & Berechnung',
        'wohnmobil'       => 'Umfassender Wohnmobil-Check + FIN-Abfrage & Berechnung',
        'elektro'         => 'Umfassender Elektro-Check + FIN-Abfrage & Berechnung',
        'kaufbegleitung'  => 'Umfassende Kaufbegleitung + FIN-Abfrage & Berechnung',
        'default'         => 'Umfassender Fahrzeug-Check + FIN-Abfrage & Berechnung',
    ];
    $xlDesc  = $xlDescMap[$type]  ?? $xlDescMap['default'];
    $xxlDesc = $xxlDescMap[$type] ?? $xxlDescMap['default'];

    // Feature-Sets (XL-Basis)
    $baseCommon = [
        /*'<b>Durchführung durch TÜV Rheinland</b> <a href="#tuv_modal" data-bs-toggle="modal"><i class="fa-regular fa-circle-info" style="font-size:1.15rem;color:var(--primary)"></i></a>',*/
        '<b>Digitaler Zustandsbericht</b>',
        'Dokumentenprüfung',
        'Lackschichtmessung & Analyse',
        'Prüfung auf Unfallschäden',
        'Bauteil & Fahrwerks-Check',
        'Prüfung von Reifen & Bremsen',
        'Motor- & Elektronikdiagnose',
        'OBD2-Fehlerspeicher-Auslese',
        'Umfassende Probefahrt',
        'Kilometerstand-Check',
        'Prüfung des Innenraums',
        'Fotodokumentation',
        'Individuelle Wünsche',
    ];
    if ($type === 'oldtimer') {
        $baseFeatures = [
            '<b>Prüfung durch Oldtimer-Experten</b>',
            'Oldtimer-Zustandsbericht',
            'Dokumentenprüfung',
            'Historien-Check',
            'Lackschichtmessung & Analyse',
            'Prüfung auf Unfallschäden',
            'Bauteil & Fahrwerks-Check',
            'Prüfung von Reifen & Bremsen',
            'Motor- & Elektronikdiagnose',
            'Fehlerspeicher-Auslese',
            'Umfassende Probefahrt',
            'Kilometerstand-Check',
            'Prüfung des Innenraums',
            'Fotodokumentation',
            'Individuelle Wünsche',
        ];
    } elseif ($type === 'sportwagen') {
        $baseFeatures = [
            '<b>Prüfung durch Sportwagen-Experten</b>',
            'Sportwagen-Zustandsbericht',
            'Dokumentenprüfung',
            'Lackschichtmessung & Analyse',
            'Prüfung auf Unfallschäden',
            'Bauteil & Fahrwerks-Check',
            'Prüfung von Reifen & Bremsen',
            'Motor- & Elektronikdiagnose',
            'OBD2-Fehlerspeicher-Auslese',
            'Leistungs-Analyse',
            'Umfassende Probefahrt',
            'Kilometerstand-Check',
            'Prüfung des Innenraums',
            'Fotodokumentation',
            'Individuelle Wünsche',
        ];
    } elseif ($type === 'wohnmobil') {
        $baseFeatures = [
            '<b>Prüfung durch Wohnmobil-Experten</b>',
            'Wohnmobil-Zustandsbericht',
            'Dokumentenprüfung',
            'Lackschichtmessung & Analyse',
            'Prüfung auf Unfallschäden',
            'Bauteil & Fahrwerks-Check',
            'Prüfung von Reifen & Bremsen',
            'Motor- & Elektronikdiagnose',
            'OBD2-Fehlerspeicher-Auslese',
            'Umfassende Probefahrt',
            'Kilometerstand-Check',
            'Prüfung des Innenraums',
            'Check aller Zusatzaggregate',
            'Untersuchung von Geräten',
            'Nutzungstauglichkeit',
            'Fotodokumentation',
            'Individuelle Wünsche',
        ];
    } elseif ($type === 'kaufbegleitung') {
        $baseFeatures = [
            '<b>LIVE beim Check dabei</b>',
            'Stelle deine Fragen',
            'Individuelle Wünsche',
            'Dokumentenprüfung',
            'Lackschichtmessung & Analyse',
            'Prüfung auf Unfallschäden',
            'Bauteil & Fahrwerks-Check',
            'Prüfung von Reifen & Bremsen',
            'Motor- & Elektronikdiagnose',
            'OBD2-Fehlerspeicher-Auslese',
            'Umfassende Probefahrt',
            'Kilometerstand-Check',
            'Prüfung des Innenraums',
            'Fotodokumentation',
        ];
    } elseif ($type === 'elektro') {
        $baseFeatures = [
            '<b>Prüfung durch E-Auto-Experten</b>',
            'Batteriezertifikat State of Health (SoH)',
            'Batteriezustand & Restkapazität',
            'Dokumentenprüfung',
            'Lackschichtmessung & Analyse',
            'Prüfung auf Unfallschäden',
            'Bauteil & Fahrwerks-Check',
            'Prüfung von Reifen & Bremsen',
            'Ladeanschluss & Ladefunktions-Check',
            'Antrieb & Elektronikdiagnose',
            'OBD2-Fehlerspeicher-Auslese',
            'Umfassende Probefahrt',
            'Kilometerstand-Check',
            'Prüfung des Innenraums',
            'Fotodokumentation',
            'Individuelle Wünsche',
        ];
    } else {
        $baseFeatures = $baseCommon; // PKW/Default/Transporter
    }

    // XXL-Zusätze
    $xxlOnly = [
        'Verhandlungs-Checkliste',
        'Berechnung anstehender Kosten',
        'Minderwertkalkulation',
        'Ermittlung des Marktwertes',
        'FIN-Abfrage',
    ];
    $allFeaturesXXL = array_merge($baseFeatures, $xxlOnly);

    $iconCheck = asset('theme-1/imgs/icons/check.png');
@endphp

<style>

  @media (min-width: 500px) {
     main .container {
    padding-left: 10px !important;
    padding-right: 10px !important;

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
    padding-bottom: 0 !important;
  }

    main .panel,
  main .card,
  main .panel-header,
  main .panel-body {
    border-radius: 0 !important;
  }

  .panel {
    display: contents !important;
}
 .order-form .panel .panel-body .check-bottom .btn {
    width: 100% !important;
  }

  /* Trust-Marquee ohne eigene Box-Optik & Breitenlimit */
  .trust-marquee-wrapper {
    max-width: 100% !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
  }

  
}
.order-form .panel .panel-body .check-content .check-cotnent-body li a[data-bs-toggle="modal"]{
  display: inline-flex;     /* bleibt in derselben Zeile wie der Text */
  align-items: center;
  margin-left: 3px;         /* minimaler Abstand zum Text */
  white-space: nowrap;      /* bricht nicht alleine in die nächste Zeile */
  line-height: 1;
  padding-top: 1px !important;
}
.order-form .panel .panel-body .check-content .check-cotnent-body li a[data-bs-toggle="modal"] i{
  line-height: 1;
  margin: 0 !important;
}

</style>

<main class="py-4 py-md-5">
  <div class="container">

      {{-- SUMMARY --}}
      

      {{-- FORM --}}
      <section class="order-form">
        <form action="{{ route('booking.step-3', ['type'=>request('type')]) }}" method="GET" class="panel">
          @csrf
          <div class="panel-header nudge-right-desktop-2">
            <div class="d-flex align-items-center gap-2">
              <h3 class="mb-0">Prüfpaket wählen</h3>
            </div>
            <span class="badge-inline">Schritt 2/3</span>
          </div>

          <div style="padding-bottom: 0px !important" class="panel-body">

            <div class="nudge-right-desktop small-muted mb-1"
     style="font-size:1rem; text-align:left !important; width:100%;">
  Bitte wähle das Prüfpaket, das du buchen möchtest.
  <a href="#serviceFlow" data-bs-toggle="modal"
     class="info-link d-block mt-2">
    <i class="fa-regular fa-circle-question me-1"></i> Wie läuft das ab?
  </a>
</div>




            <input type="hidden" id="inputs_type" name="inputs_type" value="auto">
            <input type="hidden" name="option" value="{{ request('option') }}">
            <input type="hidden" name="vehicle_type" class="vehicle_type" value="{{ request('type') }}">

            <section class="steps-area pad-step-m">
    <form action="{{ route('booking.step-3', ['type'=>request('type')]) }}" method="GET">
      <input type="hidden" name="type" value="{{ request('type') }}">
      <div class="container">
 
          <div style="padding-bottom: 0px !important" class="step-wrapper">
            <div  class="step-item">


              <div class="pt-desk step-item-content pricing-select">
                <div class="check-wrapper">
                  <nav>
                    <div class="nav row" id="nav-tab" role="tablist">
                      <!-- XL -->
                      <div class="col-6">
                        <div class="check-nav">
                          <input type="radio" id="check1" name="option" value="1" checked>
                          <label for="check1" class="active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                            <div class="d-flex align-items-center check-nav-link">
                              <span class="ind"><span class="dot"></span></span>
                              <div class="check-nav-content">
                                <h5>Check XL</h5>
                                <p>{{ $xlDesc }}</p>
                                <div class="rattings">
                                  <span class="star"><i style="color:#f2d414" class="fa-solid fa-star"></i></span>
                                  <span class="ratting-text">{{ $ratings['xl'] }}</span>
                                </div>
                              </div>
                            </div>
                          </label>
                        </div>
                      </div>
                      <!-- XXL -->
                      <div class="col-6">
                        <div class="check-nav">
                          <span class="check-badge">Empfohlen</span>
                          <input type="radio" id="check2" name="option" value="2">
                          <label for="check2" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                            <div class="d-flex align-items-center check-nav-link">
                              <span class="ind"><span class="dot"></span></span>
                              <div class="check-nav-content">
                                <h5>Check XXL</h5>
                                <p>{{ $xxlDesc }}</p>
                                <div class="rattings">
                                  <span class="star"><i style="color:#f2d414" class="fa-solid fa-star"></i></span>
                                  <span class="ratting-text">{{ $ratings['xxl'] }}</span>
                                </div>
                              </div>
                            </div>
                          </label>
                        </div>
                      </div>
                    </div>
                  </nav>

                  <div class="tab-content row" id="nav-tabContent">
                    <!-- XL Inhalt -->
                    <div class="tab-pane fade show active col-md-6" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                      <div class="check-content">
                        <div class="check-cotnent-body">


                          <ul>
                            @foreach($baseFeatures as $feat)
                              <li>
                                <span><img src="{{ $iconCheck }}" alt="" style="width:23px"></span>
                                {!! $feat !!}
                              </li>
                            @endforeach
                            @foreach($xxlOnly as $feat)
                              <li>
                                <span><i style="font-size: 1.35rem; color: #D3D3D3" class="fa-sharp-duotone fa-regular fa-xmark"></i></span>
                                {!! $feat !!}
                                @if(str_contains($feat,'FIN-Abfrage'))
                                  <a href="#fin-model" data-bs-toggle="modal">
                                    <i class="fa-regular fa-circle-info" style="font-size:1.15rem;color:var(--primary);margin-left:3px"></i>
                                  </a>
                                @endif
                              </li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="check-cotnent-footer">
                          <h6>Preis:<b> {{ number_format($prices['xl'], 0, ',', '.') }} €</b></h6>
                          <p class="pt-1" style="font-size:15.5px;color:#666">inkl. Anfahrt und MwSt.</p>
                          <p style="font-size: 16px; color: black; font-weight: 500; margin-top: 15px; display: flex; align-items: center;">
                                                            <i class="fas fa-check-circle" style="font-size: 16px; color: var(--secondary); margin-right: 8px;"></i>
                                                            Deutschlandweit verfügbar
                                                        </p>
                        </div>
                      </div>
                    </div>

                    <!-- XXL Inhalt -->
                    <div class="tab-pane fade col-md-6" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                      <div class="check-content">
                        <div class="check-cotnent-body">
                          <ul>
                            @foreach($allFeaturesXXL as $feat)
                              <li>
                                <span>
                                  @if(in_array($feat,$baseFeatures))
                                    <img src="{{ $iconCheck }}" alt="" style="width:23px">
                                  @else
                                    <img src="{{ $iconCheck }}" alt="" style="width:23px">
                                  @endif
                                </span>
                                {!! $feat !!}
                                @if(str_contains($feat,'FIN-Abfrage'))
                                  <a href="#fin-model" data-bs-toggle="modal">
                                    <i class="fa-regular fa-circle-info" style="font-size:1.15rem;color:var(--primary);margin-left:3px"></i>
                                  </a>
                                @endif
                              </li>
                            @endforeach
                          </ul>
                        </div>
                        <div class="check-cotnent-footer">
                          <h6>Preis:<b> {{ number_format($prices['xxl'], 0, ',', '.') }} €</b></h6>
                          <p class="pt-1" style="font-size:15.5px;color:#666">inkl. Anfahrt und MwSt.</p>
                          <p style="font-size: 16px; color: black; font-weight: 500; margin-top: 15px; display: flex; align-items: center;">
                                                            <i class="fas fa-check-circle" style="font-size: 16px; color: var(--secondary); margin-right: 8px;"></i>
                                                            Deutschlandweit verfügbar
                                                        </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <p class="termin-pb fs-6 text-center text-muted">⏱️ Termin innerhalb von 24–48h verfügbar</p>

                <div class="pb-3 check-bottom d-flex flex-column align-items-center justify-content-center">
                  <button id="ctaButton" type="submit" class="btndk nextStep btn btn-secondary">
                    Weiter mit Check XL <i class="fa-solid fa-arrow-right ms-1"></i>
                  </button>
                </div>

                <!-- Trust-Marquee -->
                <div class="trust-marquee-wrapper">
                  <div class="trust-marquee">
                    <div class="trust-marquee-inner">
                      <span>✅ Heute schon 45× gebucht</span>
                      <span>🕒 Nur noch wenige Termine verfügbar</span>
                      <span>📍 Aktiv in ganz Deutschland</span>
                      <span>📄 Prüfung nach TÜV-Richtlinien</span>
                      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
                      <span>💬 Käufer sparen im Schnitt 900 €</span>
                      <span>🔧 KFZ-Profis mit Qualifikation</span>
                      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
                      <span>🛡 Geld-zurück-Garantie</span>
                      <span>🧾 Für Privatkunden & Händler geeignet</span>

                      <!-- Wiederholungen für kontinuierliches Scrolling -->
                      <span>✅ Heute schon 45× gebucht</span>
                      <span>🕒 Nur noch wenige Termine verfügbar</span>
                      <span>📍 Aktiv in ganz Deutschland</span>
                      <span>📄 Prüfung nach TÜV-Richtlinien</span>
                      <span>🤝 10.000+ geprüfte Fahrzeuge</span>
                      <span>💬 Käufer sparen im Schnitt 900 €</span>
                      <span>🔧 KFZ-Profis mit Qualifikation</span>
                      <span>🔒 DSGVO-konforme Datenverarbeitung</span>
                      <span>🛡 Geld-zurück-Garantie</span>
                      <span>🧾 Für Privatkunden & Händler geeignet</span>
                    </div>
                  </div>
                </div>
                <!-- /Trust-Marquee -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>

          </div>
        </form>
      </section>

    </div>
  </div>

  <div class="modal fade" id="fin-model" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">FIN-Abfrage</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
    </div>
    <div class="modal-body">
      <div class="pb-2" style="text-align:left">
        <b>Wir nutzen die FIN (Fahrgestellnummer) und fragen beim Hersteller, bei der DAT sowie bei weiteren Quellen zusätzlich folgende Informationen ab:</b>
        <br><br>
        @php
          $finItems = ['Fahrzeughistorie','Unfallberichte','Wartungsprotokolle','Kilometerstand','Ausstattungsliste','Diebstahlüberprüfung','vieles mehr ...'];
        @endphp
        @foreach($finItems as $it)
          <div style="display:inline-flex;align-items:center;margin-bottom:10px;">
            <i class="fa fa-check" style="color:var(--secondary);font-size:1.2em;margin-right:13px;padding-left:5px"></i>
            <span style="color:#000;font-size:1.0em;">{{ $it }}</span>
          </div><br>
        @endforeach
      </div>
    </div>
  </div></div>
</div>

</main>
@endsection

  
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

@section('scripts')
<script>
  // CTA-Text je nach Radiobutton
  document.addEventListener("DOMContentLoaded", function () {
    const ctaButton = document.getElementById("ctaButton");
    const check1 = document.getElementById("check1");
    const check2 = document.getElementById("check2");

    function updateCTA() {
      if (check2.checked) {
        ctaButton.childNodes[0].textContent = "Weiter mit Check XXL";
      } else {
        ctaButton.childNodes[0].textContent = "Weiter mit Check XL";
      }
    }
    updateCTA();
    check1.addEventListener("change", updateCTA);
    check2.addEventListener("change", updateCTA);

    // Tabs initialisieren (Bootstrap)
    const someTabTriggerEl = document.querySelector('#nav-home-tab');
    if (someTabTriggerEl && typeof bootstrap !== 'undefined') {
      const tab = new bootstrap.Tab(someTabTriggerEl);
      tab.show();
    }
  });
</script>
@endsection

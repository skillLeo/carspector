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
  .header-step{ position:sticky; top:0; z-index:1050; }
  .summary{ position:sticky; top:20px; }

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
    .col-summary{ display:block; align-self:flex-start; position:sticky; top:120px; }
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

  /* Wizard Layout */
  .nb-wizard { margin-top: 24px; }
  .nb-wizard.wizard { width: 100%; }
  .nb-wizard .steps { margin-bottom: 20px; width: 100%; }
  .nb-wizard .steps > ul {
    display: flex !important;
    flex-wrap: nowrap;
    gap: 6px;
    padding: 0;
    margin: 0;
    list-style: none;
    overflow-x: auto;
  }
  .nb-wizard .steps > ul > li {
    float: none !important;
    display: block !important;
    width: auto !important;
    border: 1px solid #e2e8f0;
    border-radius: 999px;
    background: #f8fafc;
    transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
    min-width: 0;
    flex: 1 1 auto;
  }
  .nb-wizard .steps > ul > li a {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    width: 100%;
    color: inherit;
    text-decoration: none;
    min-height: auto;
  }
  .nb-wizard .steps > ul > li .number,
  .nb-wizard .steps > ul > li .current-info { display: none !important; }
  .nb-wizard .wizard-step-badge {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: #e2e8f0;
    color: #475569;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .nb-wizard .wizard-step-texts { display: flex; flex-direction: column; text-align: left; }
  .nb-wizard .wizard-step-title { font-weight: 600; color: #0f172a; font-size: .75rem; line-height: 1; white-space: nowrap; }
  .nb-wizard .wizard-step-subtitle { display: none; }
  .nb-wizard .steps > ul > li.current {
    border-color: var(--primary);
    background: #fff;
    box-shadow: 0 16px 40px rgba(15,23,42,.12);
  }
  .nb-wizard .steps > ul > li.current .wizard-step-badge {
    background: #eef2ff;
    color: var(--primary);
  }
  .nb-wizard .steps > ul > li.done {
    border-color: #22c55e;
    background: #ecfdf5;
  }
  .nb-wizard .steps > ul > li.done .wizard-step-badge {
    background: #dcfce7;
    color: #15803d;
  }
  .nb-wizard .steps > ul > li.disabled { opacity: .7; }
  .nb-wizard .content {
    border: none;
    padding: 0;
    background: transparent;
    box-shadow: none;
  }
  .nb-wizard .content .body {
    width: 100%;
    height: auto !important;
    padding: 0;
    position: relative;
  }
  .nb-wizard .content .body:focus { outline: none; }
  .nb-step { animation: fadeIn .25s ease; margin-bottom: 24px; }
  .nb-step:last-of-type { margin-bottom: 0; }
  .nb-step-card {
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    padding: 28px;
    background: #fff;
    box-shadow: 0 28px 60px rgba(15,23,42,.09);
  }
  .nb-wizard .actions { margin-top: 32px; }
  .nb-wizard .actions ul {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    justify-content: flex-end;
    padding: 0;
    margin: 0;
    list-style: none;
  }
  .nb-wizard .actions li { margin: 0; }
  .nb-wizard .actions a {
    border-radius: 14px;
    padding: 13px 28px;
    font-weight: 600;
    border: 1px solid transparent;
    background: #f1f5f9;
    color: #0f172a;
    text-decoration: none;
    transition: all .2s ease;
  }
  .nb-wizard .actions a[href="#previous"] { border-color: #e2e8f0; }
  .nb-wizard .actions a[href="#next"],
  .nb-wizard .actions a[href="#finish"] {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
    box-shadow: 0 8px 24px rgba(37,99,235,.25);
  }
  .nb-wizard .actions a[href="#next"]:hover,
  .nb-wizard .actions a[href="#finish"]:hover { transform: translateY(-1px); }
  .nb-wizard .actions a[href="#previous"]:hover { background: #e2e8f0; }
  .nb-wizard .actions [aria-disabled="true"] {
    opacity: .45;
    pointer-events: none;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .nb-hint { font-size: .9rem; color: #64748b; }
  .nb-option {
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 16px;
    display: flex;
    gap: 14px;
    align-items: center;
    background: #fff;
    margin-top: 12px;
  }
  .nb-option:first-of-type { margin-top: 0; }
  .nb-option .texts h4 { margin: 0; font-size: 1rem; }
  .nb-option .texts p { margin: 4px 0 0; font-size: .9rem; color: #64748b; }

  .nb-hidden { display: none !important; }

  .nb-progress {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .nb-progress li {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #f1f5f9;
    cursor: default;
    outline: none;
  }
  .nb-progress li:last-child { border-bottom: none; }
  .nb-progress li:focus-visible {
    box-shadow: inset 0 0 0 1px var(--primary);
    border-radius: 10px;
    padding-left: 8px;
    padding-right: 8px;
  }
  .nb-progress .label { font-weight: 600; color: #0f172a; }
  .nb-progress .meta { color: #94a3b8; font-size: .85rem; }
  .nb-progress li.is-active .label { color: var(--primary); }
  .nb-progress li.is-complete .label { color: #22c55e; }
  .nb-progress li.is-active,
  .nb-progress li.is-complete { cursor: pointer; }
  .nb-progress li.is-active:hover .label,
  .nb-progress li.is-complete:hover .label { opacity: .85; }

  .nb-price-box { background: #f8fafc; border-radius: 12px; padding: 20px; margin-top: 24px; }
  .nb-price-box .value { font-size: 1.6rem; font-weight: 700; color: #0f172a; }
  .nb-price-box .note { color: #475569; font-size: .92rem; }

  .nb-divider { border-top: 1px dashed #e2e8f0; margin: 24px 0; }
  .nb-legend { font-size: .85rem; color: #94a3b8; }
  .nb-alert { background: #f8fafc; border: 1px solid #cbd5f5; border-radius: 12px; padding: 16px 18px; margin-bottom: 24px; }
  .nb-alert strong { color: #0f172a; }
  .btn-stripe {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 14px;
    font-weight: 700;
    font-size: 1.05rem;
  }
  .nb-wizard .actions .btn-stripe {
    width: auto;
    min-width: 220px;
  }
  .stripe-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: .85rem;
    color: #475569;
    margin-top: 8px;
  }

  .nb-fieldset + .nb-fieldset { margin-top: 18px; }
  .nb-fieldset legend { font-size: .95rem; font-weight: 600; color: #0f172a; margin-bottom: 12px; }

  @media (max-width: 767px) {
    .nb-wizard .steps ul { grid-template-columns: 1fr; }
    .nb-wizard .actions ul {
      flex-direction: column;
      align-items: stretch;
    }
    .nb-wizard .actions a { width: 100%; text-align: center; }
  }

  @media (max-width: 575px) {
    .nb-step-card {
      padding: 20px;
      border-radius: 16px;
    }
  }


</style>

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

  .form-control,
  .form-select,
  textarea.form-control {
    height:60px;
    box-shadow:none !important;
    outline:none !important;
    border:1px solid #d1d5db;
    border-radius:12px;
    background-color:#f9f9f9;
  }

  textarea.form-control {
    min-height:120px;
    height:auto;
  }

  .form-control:focus,
  .form-select:focus,
  textarea.form-control:focus {
    border-color:var(--primary);
    background-color:#fff;
    box-shadow:none !important;
  }

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

  .addon{
    border:1px solid #d1d5db;
    border-radius:12px;
    padding:14px 16px;
    display:flex;
    align-items:center;
    gap:14px;
    background:#fff;
    cursor:pointer;
    transition:border-color .2s ease, box-shadow .2s ease;
  }
  .addon input{ display:none; }
  .addon .box{
    width:22px;
    height:22px;
    border-radius:6px;
    border:1.5px solid #cbd5f5;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:.75rem;
    background:#fff;
  }
  .addon.selected{ border-color:var(--primary); box-shadow:0 10px 30px rgba(15,23,42,.08); }
  .addon.selected .box{ background:var(--primary); border-color:var(--primary); }
  .addon .title{ font-weight:600; color:#0f172a; }
  .addon .price{ color:var(--primary); font-weight:700; font-size:.9rem; }

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
.form-control {
    height: 60px;
    box-shadow: none !important;
    outline: none !important;
    border: 1px solid #d1d5db;
    border-radius: 12px;
    background-color: #f9f9f9;
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
    left: 0;
    transform: none;
    width: 100%;                /* volle Bildschirmbreite */
    height: 1px;
    background: rgba(255, 255, 255, 0.25); /* dezente helle Linie */
  }

}

</style>
<style>
  .summary-section { border-bottom:1px solid #f1f5f9; padding-bottom:12px; }
  .summary-section:last-child { border-bottom:0; padding-bottom:0; }
  .summary-title { text-transform:uppercase; letter-spacing:.05em; font-size:.78rem; color:#94a3b8; margin-bottom:6px; }
  .summary-block { background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:12px 16px; }
  .summary-name { font-weight:600; font-size:.98rem; }
  .summary-address { color:#475569; font-size:.9rem; margin-top:4px; line-height:1.4; }
  .summary-pair { display:flex; justify-content:space-between; align-items:center; padding:6px 0; font-size:.92rem; border-bottom:1px solid #f1f5f9; }
  .summary-pair:last-child { border-bottom:0; }
  .summary-pair span { color:#64748b; }
  .summary-card { background:#fff; border:1px solid #e2e8f0; border-radius:18px; padding:18px; box-shadow:0 18px 45px rgba(15,23,42,.08); }
  .summary-card .summary-section + .summary-section { margin-top:18px; }
  .summary-info-box { display:flex; gap:12px; background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:14px; margin-top:16px; }
  .summary-info-box i { color:var(--primary); font-size:1.25rem; }
  .price-list { border:1px solid #e2e8f0; border-radius:12px; padding:12px 16px; background:#fff; box-shadow:0 6px 18px rgba(15,23,42,.05); }
  .price-row { display:flex; align-items:center; justify-content:space-between; gap:10px; padding:8px 0; font-size:.98rem; }
  .price-row + .price-row { border-top:1px solid #f1f5f9; }
  .price-label { font-weight:600; color:#0f172a; }
  .summary-total-pill { margin-top:14px; border:1px solid #e2e8f0; border-radius:14px; padding:12px 16px; display:flex; align-items:center; justify-content:space-between; background:linear-gradient(135deg,#eef2ff,#fff); }
  .summary-total-pill span { text-transform:uppercase; letter-spacing:.05em; font-size:.8rem; color:#64748b; display:block; }
  .summary-total-pill strong { font-size:1.25rem; color:var(--primary); display:block; }
  .summary-total-pill small { color:#64748b; }
</style>
<style>
  .signature-pad { border:1px solid #d1d5db;  background:#fff; position:relative; }
  .signature-pad .signature-surface { width:100%; height:220px; }
  .signature-actions { display:flex; justify-content:space-between; align-items:center; margin-top:8px; gap:12px; }
  .btn-signature-clear { padding:8px 14px; border:1px solid #f87171; color:#b91c1c; background:#fff1f2; border-radius:10px; font-weight:600; box-shadow:none !important; }
  .btn-signature-clear:hover { background:#fee2e2; border-color:#ef4444; color:#991b1b; }
  .note-muted { font-size:.85rem; color:#94a3b8; }
  .btn-back { border:1px solid #cbd5f5; color:#0f172a; background:#fff; border-radius:12px; font-weight:600; padding:14px 26px; box-shadow:none !important; }
  .btn-back:hover { background:#f8fafc; border-color:#94a3ff; color:#0f172a; }
</style>

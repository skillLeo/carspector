<style>
.sticky-header {
    position: relative;
    top: 0;
    z-index: 10;
    background-color: #6c757d; /* Sekundäre Hintergrundfarbe */
    color: white;
    padding: 1rem 2rem; /* Mehr Padding für Breite und Höhe */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 17px; /* Größere Schriftgröße */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px; /* Feste Höhe, um breiter zu wirken */
}

.sticky-header a {
    text-decoration: none;
    color: white;
    font-weight: bold; /* Betonung auf dem Link */
}

.sticky-header a:hover {
    text-decoration: underline;
}

@media (max-width: 700px) {
    div.sticky-header {
        display: none !important;
    }

    div.divider {
        display: none !important;
    }
}




/* Trennlinie-Styling */
.divider {
    width: 100%;
    height: 1px;
    background-color: white;
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

.header-submenu-right {
    display: none;
    top: -10px;
    left: 90%;
    margin-left: 10px;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    z-index: 1000;
    list-style: none;
    padding: 5px 0;
}

.header-submenu-right li {
    padding: 3px 15px;
}

.header-submenu-right li a {
    color: var(--primary);
    text-decoration: none;
    white-space: nowrap;
}

/* Show the submenu on hover */
.header-submenu li.position-relative:hover .header-submenu-right {
    display: block;
}

.header-submenu li:last-child {
    border-bottom: none; /* Entfernt die letzte Trennlinie */
}

/* Styling for the right submenu */
.header-submenu-right li {
    padding: 3px 15px;
    border-bottom: 1px solid rgba(35, 193, 151, 0.5);
}

.header-submenu-right li:last-child {
    border-bottom: none; /* Entfernt die letzte Trennlinie */
}

.header-submenu a {
    border-bottom: 1px solid rgba(35, 193, 151, 0.5);
}

.no-border a {
    border-bottom: none !important; /* Entfernt die letzte Trennlinie */
}


/* Für größere Bildschirme */
@media (min-width: 991px) { /* Bootstrap Breakpoint für größere Geräte */
    .header {
        height: 87px; /* Kleinere Höhe */
    }


    .header .header-wrapper {
    margin-top: -10px; /* verschiebt den Wrapper nach oben */
}

    .header .header-logo img {
        height: 40px; /* Falls das Logo zu groß ist */
    }
}
@media (min-width: 768px) {

    .offcanvas-title {
      padding-top: 15px !important;
    }
}

@media (min-width: 991px) {

    .offcanvas-title {
      padding-top: 10px !important;
    }
}


.header-nav > ul { gap: 62px; }
/* --- LOGO endlich groß & nicht mehr geschrumpft --- */
.header .header-logo { 
  flex: 0 0 auto;          /* nicht schrumpfen */
  overflow: visible !important;
}

.header .header-logo a { 
  overflow: visible !important;
}

.header .header-logo img {
  height: 36px !important; /* explizite Höhe statt max-height */
  width: auto !important;  /* Seitenverhältnis beibehalten */
  max-width: none !important;
  object-fit: contain;
  display: block;
}

@media (max-width: 992px) {
  .header .header-logo img { height: 32px !important; margin-bottom: 3px !important}
    .header { min-height: 60px; }
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
}

.header-nav-link {
  font-size: 16px !important; /* etwas leichter als fw-semibold (600) */
}

.header .header-logo {
  display: flex;             /* aktiviert Flexbox */
  align-items: center;       /* vertikal zentrieren */
  justify-content: flex-start; /* linksbündig */
  height: 100%;              /* volle Header-Höhe nutzen */
}


.header-nav-item,
.header-nav-link {
  display: flex;
  align-items: center;          /* Text vertikal mittig */
  height: 100%;
  padding-top: 1px;
  padding-bottom: 0;
}

  .mobile-nav-link {
    padding-top: 9px !important;
    padding-bottom: 9px !important;font-size: 19px !important;}


/* ===== Desktop: "Leistungen"-Dropdown per Hover als Kachel-Grid ===== */
@media (min-width: 992px) {

  /* --- Nav-Item mit Dropdown --- */
  .header-nav-item.has-dropdown {
    position: relative;
  }

  .header-nav-item.has-dropdown > .header-nav-link {
    background: transparent;
    border: 0;
    cursor: pointer;
  }

  .header-nav-item.has-dropdown > .header-nav-link:focus {
    outline: none;
    box-shadow: none;
  }

  /* Pfeil neben "Leistungen" – größer, dreht bei Hover */
  .header-nav-item.has-dropdown .nav-triangle {
    display: inline-block;
    margin-left: 0.4rem;
    border-top: 7px solid currentColor;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    transition: transform 0.2s ease-out;
    transform-origin: center center;
    transform: rotate(0deg); /* Grundzustand */
  }

  .header-nav-item.has-dropdown:hover .nav-triangle {
    transform: rotate(180deg);
  }

  /* --- Dropdown-Panel --- */
  .header-nav-item.has-dropdown > .header-submenu {
    position: absolute;
    top: 200%;
    left: -200px; /* leicht nach links verschoben */
    margin: 0;
    margin-top: 2px; /* kleiner Abstand zur Nav */
    padding: 0.25rem 1.1rem 1.2rem; /* oben sehr wenig Padding */
    list-style: none;

    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 14px 40px rgba(15, 23, 42, 0.22);
    z-index: 1100;

    /* breites Menü */
    min-width: 1100px;
    max-width: 1150px;

    /* Kachel-Grid */
    display: none; /* Standard: verstecken */
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 0.5rem 0.5rem; /* kleiner vertikaler Abstand */
  }

  /* Sichtbar, solange man über dem Menüpunkt ODER dem Dropdown ist */
  .header-nav-item.has-dropdown:hover > .header-submenu,
  .header-nav-item.has-dropdown > .header-submenu:hover {
    display: grid;
  }

  /* --- Kacheln / Einträge --- */
  .header-submenu li {
    margin: 0;
    padding: 0;
    border: 0;
    height: 100%;
  }

  /* Gruppentitel – praktisch kein Abstand zur ersten Box */
  .header-submenu .menu-group-title {
    grid-column: 1 / -1;
    padding: 0;
    margin: 0 0 0.2rem;
    padding-top: 1rem;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #6b7280;
    font-weight: 600;
    opacity: 1;
  }

  /* Divider zwischen Gruppen */
  .header-submenu .menu-divider {
    grid-column: 1 / -1;
    margin: 0.05rem 0 0.25rem;
    border-top: 1px solid rgba(15, 23, 42, 0.08);
  }

  /* Kachel-Links – flacher, aber schön card-artig */
  .header-submenu a {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    width: 100%;
    height: 100%;
    box-sizing: border-box;

    padding: 0.7rem 0.95rem;
    border-radius: 8px;
    background-color: #ffffff;
    border: 1px solid rgba(148, 163, 184, 0.5);   /* neutral grau */
    text-decoration: none;
    color: #111827;
    font-size: 1.01rem;
    line-height: 1.4;

    min-height: 80px;   /* flachere Boxen */

    box-shadow: 0 5px 12px rgba(15, 23, 42, 0.06);
    transition:
      box-shadow 0.15s ease-out,
      transform 0.12s ease-out,
      background-color 0.15s ease-out,
      color 0.12s ease-out,
      border-color 0.15s ease-out;

    border-bottom: 1px solid rgba(148, 163, 184, 0.5);
  }

  .header-submenu a:hover {
    background-color: #f9fafb;
    border-color:var(--secondary) !important;  /* kein Grün */
    color: var(--primary);
    transform: translateY(-1px);
    box-shadow: 0 10px 24px rgba(15, 23, 42, 0.18);
    text-decoration: none;
  }

  .header-submenu li:last-child a {
    border-bottom: 1px solid rgba(148, 163, 184, 0.5);
  }

  /* Icon links mit hellblauem Hintergrund + var(--primary) */
  .header-submenu .menu-icon {
    width: 35px;
    height: 35px;
    flex: 0 0 35px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin-top: 2px;
    font-size: 0.9rem;

    background-color: #e0f2fe;  /* hellblau */
    border-radius: 999px;
    color: var(--primary);
  }

  /* Textblock in der Kachel */
  .header-submenu .menu-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
  }

  .header-submenu .menu-title {
    font-weight: 550;
    font-size: 1.01rem;
  }

  .header-submenu .menu-desc {
    font-size: 0.86rem;
    color: #6b7280;
    line-height: 1.35;
    font-weight: 500;
  }

  /* Badge rechts */
  .header-submenu .badge-inline {
    margin-left: auto;
    font-size: 11px;
    padding: 3px 8px;
    border-radius: 999px;
    background-color: var(--secondary);
    color: #fff;
    white-space: nowrap;
  }

  .header-submenu a {
    border-bottom: 1px solid rgba(148, 163, 184, 0.5) !important;
  }

  .header-submenu-right li {
    border-bottom: 1px solid rgba(148, 163, 184, 0.5) !important;
  }

  .header-submenu a.kachel-highlight {
    border-color: var(--secondary) !important;
  }

  .header-nav-item.has-dropdown {
    position: relative; /* hast du eh schon, aber zur Sicherheit */
  }

  /* Unsichtbare Brücke zwischen Nav-Button und Dropdown */
  .header-nav-item.has-dropdown::after {
    content: "";
    position: absolute;
    left: -40px;      /* links etwas überstehen */
    right: -40px;     /* rechts etwas überstehen */
    top: 100%;        /* direkt unter dem Button starten */
    height: 25px;     /* Höhe = Abstand bis zum Menü + Puffer */
    /* kein background, kein border -> komplett unsichtbar */
  }
}
@media (min-width: 992px) and (max-width: 1500px) {
  .header-nav-item.has-dropdown > .header-submenu {

    max-width: 900px;
    min-width: 900px; 
  }

  .header-nav-item.has-dropdown > .header-submenu a {
    max-width: 350px;
    margin: 0 auto;
  }
}

</style>

<div class="modal fade" id="tel" tabindex="-1" aria-labelledby="stepDescModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="stepDescModalLabel">Kontaktiere uns</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="popupContent" class="pb-2" style="text-align: left;">
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-phone" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;"><a href="tel:+4921192325550">0211/ 92325550</a></span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa-brands fa-square-whatsapp" style="color: var(--secondary); font-size: 1.3em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;"><a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20">Auf WhatsApp schreiben</a></span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-envelope" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;"><a href="mailto:info@carspector.de">info@carspector.de</a></span>
                                                        </div><br>
                                                        <div style="display: inline-flex; align-items: left; margin-bottom: 10px;">
                                                            <i class="fa fa-message-text" style="color: var(--secondary); font-size: 1.2em; margin-right: 13px; padding-left: 5px"></i>
                                                            <span style="color: #000; font-size: 1.0em;"><a href="{{route('kontakt')}}">Kontaktformular</a></span>
                                                        </div>
                                                        <br><br>
                                                        <div style="display: flex; align-items: center;">
                                                            <b>Erreichbar:</b>
                                                            <div style="font-size: 1.0em; display: flex; align-items: center;">
                                                                <span>&nbsp;Mo-Sa: 9-18 Uhr</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<a href="#tel" data-bs-target="#tel" data-bs-toggle="modal" class=" mobile-call-btn d-flex justify-content-center align-items-center">
                    <i class="fas fa-phone"></i>
                </a>





<header class="header bg-primary  position-relative z-3">
    <div
        class="header-wrapper index-header d-flex align-items-center justify-content-center justify-content-md-between position-relative mx-auto ">

        <!-- header-logo -->
        <div class="header-logo">
            <a href="{{url('/')}}" class="logo d-inline-flex align-items-center gap-3"><img
                    src="/logo-slogan-white.png" alt=""></a>
        </div>
        <!-- header-logo-end -->

        <!-- header-right -->
        <div class="header-end align-items-center d-none d-xl-flex">
            <div class="header-nav">
                <ul class="d-flex align-items-center justify-content-end">
                <li class="header-nav-item position-relative has-dropdown">
  <button
      type="button"
      class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center bg-transparent border-0 p-0"
      data-leistungen-toggle
      style="letter-spacing: 0.25px">
    Leistungen
    <span class="nav-triangle"></span>
  </button>

  <ul class="header-submenu">
    <!-- Gruppe: Fahrzeug-Checks -->
    <li class="menu-group-title">Fahrzeug-Checks</li>

    <li>
      <a class="kachel-highlight" href="{{route('gebrauchtwagencheck')}}">
        <span class="menu-icon"><i class="fa-solid fa-car-side"></i></span>
        <span class="menu-text">
          <span class="menu-title">Auto/ PKW Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für PKW und Kleintransporter</span>
        </span>
        <span class="badge-inline">Beliebt</span>
      </a>
    </li>

    <li>
      <a href="{{route('transporter')}}">
        <span class="menu-icon"><i class="fa-solid fa-van-shuttle"></i></span>
        <span class="menu-text">
          <span class="menu-title">Transporter-Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für Transporter bis 5,5 t Gesamtgewicht</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('oldtimer')}}">
        <span class="menu-icon"><img src="/oldtimer_car.png" alt="Oldtimer" width="23" height="23"></span>
        <span class="menu-text">
          <span class="menu-title">Oldtimer-Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für Oldtimer mit einem Alter von über 30 Jahren</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('sportwagen')}}">
        <span class="menu-icon"><img src="/sportscar.png" alt="Sportwagen" width="23" height="23"></span>
        <span class="menu-text">
          <span class="menu-title">Sportwagen-Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für sportliche Autos ab 300 PS</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('wohnmobil')}}">
        <span class="menu-icon"> <img src="/rv_car.png" alt="Wohnmobil" width="21" height="21"></span>
        <span class="menu-text">
          <span class="menu-title">Wohnmobil-Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für Wohnmobile und Camper-Ausbauten</span>
        </span>
      </a>
    </li>

    <li>
      <a href="https://carspector.de/elektro">
        <span class="menu-icon"><i class="fa-solid fa-bolt"></i></span>
        <span class="menu-text">
          <span class="menu-title">Elektro-Check</span>
          <span class="menu-desc">Fahrzeug-Check vor dem Kauf für Elektro- & Hybridfahrzeuge</span>
        </span>
      </a>
    </li>

        <li>
      <a href="{{route('kaufbegleitung')}}">
        <span class="menu-icon"> <img src="/handshake_kaufbegleitung.png" alt="Kaufbegleitung" width="21" height="21"></span>
        <span class="menu-text">
          <span class="menu-title">Kaufbegleitung</span>
          <span class="menu-desc">Wir begleiten dich bei Besichtigung und prüfen das Fahrzeug in deiner Anwesenheit</span>
        </span>
      </a>
    </li>

    <li><hr class="menu-divider"></li>

    <!-- Gruppe: Zusatzleistungen -->
    <li class="menu-group-title">Zusatzleistungen</li>

    <li>
      <a class="kachel-highlight" href="https://carspector.de/zulassung">
        <span class="menu-icon"><i class="fa-solid fa-id-card"></i></span>
        <span class="menu-text">
          <span class="menu-title">Kfz-Zulassung</span>
          <span class="menu-desc">Zulassung mit Kennzeichen- und Dokumentenversand nach Hause</span>
        </span>
       <span class="badge-inline">Neu</span>
      </a>
    </li>

    <li>
      <a  href="https://carspector.de/fin-abfrage">
        <span class="menu-icon"><i class="fa fa-search"></i></span>
        <span class="menu-text">
          <span class="menu-title">FIN-Abfrage</span>
          <span class="menu-desc">Fahrzeughistorie über die Fahrgestellnummer (FIN) prüfen</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('fahrzeuglieferung')}}">
        <span class="menu-icon"><i class="fa-solid fa-truck"></i></span>
        <span class="menu-text">
          <span class="menu-title">Fahrzeug-Transport</span>
          <span class="menu-desc">Europaweite, versicherte Transporte unverbindlich anfragen</span>
        </span>
      </a>
    </li>

    <!-- <li>
      <a target="_blank" href="/Kfz-Kaufvertrag.pdf">
        <span class="menu-icon"><i class="fa fa-file-contract"></i></span>
        <span class="menu-text">
          <span class="menu-title">Kfz-Kaufvertrag (PDF)</span>
          <span class="menu-desc">Vorlage für einen sicheren Kaufvertrag.</span>
        </span>
      </a>
    </li> -->

    <li>
      <a href="{{route('kaufabwicklung')}}">
        <span class="menu-icon"><i class="fa-solid fa-file-signature"></i></span>
        <span class="menu-text">
          <span class="menu-title">Kaufabwicklung</span>
          <span class="menu-desc">Unterstützung bei Vertragsabschluss, Unterlagen, Zahlung & Übergabe</span>
        </span>
      </a>
    </li>

    
    <li><hr class="menu-divider"></li>

    <!-- Gruppe: Inserat-Services -->
    <li class="menu-group-title">Inserat-Checks</li>

    <li>
      <a href="{{route('inseratcheck')}}">
        <span class="menu-icon"><i class="fa-solid fa-clipboard-check"></i></span>
        <span class="menu-text">
          <span class="menu-title">Inserat-Check</span>
          <span class="menu-desc">Prüfung deines gewünschten Inserats auf Auffälligkeiten und Risiken</span>
        </span>
      </a>
    </li>

    <li>
      <a href="{{route('inseratvergleich')}}">
        <span class="menu-icon"><i class="fa-solid fa-list-ul"></i></span>
        <span class="menu-text">
          <span class="menu-title">Inserat-Vergleich</span>
          <span class="menu-desc">Vergleich mehrerer Inserate inkl. Analyse und Einschätzung</span>
        </span>
      </a>
    </li>

    <!-- <li>
      <a href="{{route('wertermittlung')}}">
        <span class="menu-icon"><i class="fa fa-balance-scale"></i></span>
        <span class="menu-text">
          <span class="menu-title">Inserat-Wertermittlung</span>
          <span class="menu-desc">Realistische Bewertung von Preis & Zustand.</span>
        </span>
      </a>
    </li> -->
  </ul>
</li>


                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('preise')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Preise</a>
                    </li>
                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('erfahrungen')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Erfahrungen</a>
                    </li>
                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('faq')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">FAQ</a>
                    </li>
                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('ueber-uns')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Über uns</a>
                    </li>
                    <li style="letter-spacing: 0.25px" class="header-nav-item position-relative">
                        <a href="{{route('kontakt')}}"
                           class="header-nav-link fw-semibold position-relative d-inline-flex align-items-center">Kontakt</a>
                    </li>
                    <a href="{{ route('login') }}" 
                        class="btn btn-outline header-btn d-flex align-items-center justify-content-center"
                        style="letter-spacing: 0.25px; border-radius: 5px; width: 40px; height: 40px; padding: 0;">
                        <i class="fa-regular fa-user" style="font-size: 1rem;"></i>
                    </a>
                </ul>
            </div>
            
        </div>
        <!-- header-right-end -->

        <!-- mobile menu start -->
        <a class="login-btn d-xl-none bg-transparent border-0 p-0 text-white position-absolute top-50 end-0 translate-middle-y me-5 rounded-circle"
   href="{{route('login')}}"
   style="right: 10px !important; font-size: 1.3rem; padding: 0.5rem; border: 2px solid white; display: flex; align-items: center; justify-content: center; text-decoration: none;">
    <i class="fa-regular fa-user"></i>
</a>
<style>

     .burger-menu-btn {
    width: 25px;
    height: 25px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 6px;
    z-index: 1051;
  }

  .burger-line {
    height: 2.5px;
    background-color: white;
    border-radius: 1px;
    transition: all 0.3s ease;
  }

  .burger-line.top,
  .burger-line.middle,
  .burger-line.bottom {
    width: 100%;
  }

.burger-menu-btn.active .top {
  transform: rotate(45deg) translate(5.9px, 5.9px);
}

.burger-menu-btn.active .bottom {
  transform: rotate(-45deg) translate(5.9px, -5.9px);
}
.burger-menu-btn.active .top,
.burger-menu-btn.active .bottom {
  width: 110%; 
}

  .burger-menu-btn.active .middle {
    opacity: 0;
  }
  
  

</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
  /* Burger / Offcanvas (unverändert) */
  const btn = document.getElementById('burgerToggle');
  const offcanvasEl = document.getElementById('offcanvasRight');

  if (offcanvasEl && btn && typeof bootstrap !== 'undefined') {
    const offcanvas = new bootstrap.Offcanvas(offcanvasEl);

    offcanvasEl.addEventListener('show.bs.offcanvas', () => {
      btn.classList.add('active');
    });

    offcanvasEl.addEventListener('hide.bs.offcanvas', () => {
      btn.classList.remove('active');
    });
  }

  /* Desktop Dropdown "Leistungen" per Klick */
  const leistungenToggle = document.querySelector('[data-leistungen-toggle]');
  const leistungenItem   = leistungenToggle ? leistungenToggle.closest('.has-dropdown') : null;

  if (leistungenToggle && leistungenItem) {
    const closeDropdown = () => {
      leistungenItem.classList.remove('show');
    };

    // Toggle bei Klick auf "Leistungen"
    leistungenToggle.addEventListener('click', function (event) {
      // Nur auf Desktop relevant
      if (window.innerWidth < 992) return;

      event.preventDefault();
      event.stopPropagation();

      const isOpen = leistungenItem.classList.contains('show');
      if (isOpen) {
        closeDropdown();
      } else {
        leistungenItem.classList.add('show');
      }
    });

    // Klick außerhalb schließt Dropdown
    document.addEventListener('click', function (event) {
      if (window.innerWidth < 992) return;
      if (!leistungenItem.contains(event.target)) {
        closeDropdown();
      }
    });

    // ESC schließt Dropdown
    document.addEventListener('keyup', function (event) {
      if (window.innerWidth < 992) return;
      if (event.key === 'Escape') {
        closeDropdown();
      }
    });
  }
});
</script>

</script>

<button
  id="burgerToggle"
  class="burger-menu-btn d-xl-none bg-transparent border-0 p-0 text-white position-absolute top-50 end-0 translate-middle-y me-3"
  type="button"
  data-bs-toggle="offcanvas"
  data-bs-target="#offcanvasRight"
  aria-controls="offcanvasRight"
>
  <div class="burger-line top"></div>
  <div class="burger-line middle"></div>
  <div class="burger-line bottom"></div>
</button>

<div class="mobile-menu d-xl-none">
  <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header align-items-center justify-content-between border-bottom border-white">
      <div class="offcanvas-title fw-normal text-white fw-bold" id="offcanvasExampleLabel">Menü</div>
    </div>

        <div class="offcanvas-body">
            <nav class="mobile-nav">
            <div class="accordion" id="accordionMenu">
                <ul>
                    <li class="mobile-nav-item">
                        <a data-bs-toggle="collapse" data-bs-parent="#accordionMenu" href="#collapseExample" role="button" aria-expanded="false"
                           aria-controls="collapseExample" class="mobile-nav-link d-flex align-items-center">
                            Fahrzeug-Checks
                            <span class="nav-triangle"></span>
                        </a>

                        <div class="collapse" id="collapseExample">
                            <ul style="padding-left: 5px !important" class="mobile-submenu">
                                <li>
                                <a href="{{route('gebrauchtwagencheck')}}" class="d-flex align-items-center">
                                    Auto/ PKW Check
                                    <span style="background-color: var(--secondary); color: white; padding: 2px 6px; border-radius: 2px; font-size: 12px; margin-left: 10px">Beliebt</span>
                                </a>
                                </li>
                                <li>
                                    <a href="{{route('transporter')}}">Transporter-Check</a>
                                </li>
                                <li>
                                    <a href="{{route('oldtimer')}}">Oldtimer-Check</a>
                                </li>
                                <li>
                                    <a href="{{route('sportwagen')}}">Sportwagen-Check</a>
                                </li>
                                <li>
                                    <a href="{{route('wohnmobil')}}">Wohnmobil-Check</a>
                                </li>
                                <li>
                                    <a href="https://carspector.de/elektro">Elektro-Check</a>
                                </li>
                                <!-- <li>
                                <a href="https://carspector.de/elektro" class="d-flex align-items-center">
                                    Elektro-Check
                                    <span style="background-color: var(--secondary); color: white; padding: 2px 6px; border-radius: 4px; font-size: 12px; margin-left: 10px;">NEU</span>
                                </a>
                                </li> -->
                                <li>
                                    <a href="{{route('kaufbegleitung')}}">Kaufbegleitung</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-nav-item">
                        <a data-bs-toggle="collapse" data-bs-parent="#accordionMenu" href="#collapseExample1" role="button" aria-expanded="false"
                           aria-controls="collapseExample1" class="mobile-nav-link d-flex align-items-center">
                            Zusatzleistungen
                            <span class="nav-triangle"></span>
                        </a>

                        <div class="collapse" id="collapseExample1">
                            <ul style="padding-left: 5px !important" class="mobile-submenu">
                                <!-- <li>
                                <a href="https://carspector.de/fin-abfrage" class="d-flex align-items-center">
                                    FIN-Abfrage
                                    <span style="background-color: var(--secondary); color: white; padding: 2px 6px; border-radius: 4px; font-size: 12px; margin-left: 10px;">NEU</span>
                                </a> 
                                </li> -->
                                <li>
                                    <a href="https://carspector.de/zulassung" class="d-flex align-items-center">
                                    Kfz-Zulassung
                                    <span style="background-color: var(--secondary); color: white; padding: 2px 6px; border-radius: 4px; font-size: 12px; margin-left: 10px;">NEU</span>
                                </a> 
                                </li>
                                <li>
                                    <a href="https://carspector.de/fin-abfrage">FIN-Abfrage</a>
                                </li>
                                </li>
                                <li>
                                    <a href="{{route('inseratcheck')}}">Inserat-Check</a>
                                </li>
                                <li>
                                <a href="{{route('inseratvergleich')}}" class="d-flex align-items-center">
                                    Inserat-Vergleich   
                                </a>
                                </li>
                                <!-- <li>
                                <a href="{{route('wertermittlung')}}" class="d-flex align-items-center">
                                    Inserat-Wertermittlung   
                                </a>
                                </li> -->
                                <li>
                                    <a href="{{route('fahrzeuglieferung')}}">Fahrzeug-Transport</a>
                                </li>
                                <!-- <li>
                                    <a target="_blank" href="/Kfz-Kaufvertrag.pdf">Kfz-Kaufvertrag</a>
                                </li> -->
                                <li>
                                    <a href="{{route('kaufabwicklung')}}">Kaufabwicklung</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-nav-item"><a href="{{route('preise')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Preise</a></li>
                    <li class="mobile-nav-item"><a href="{{route('erfahrungen')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Erfahrungen</a></li>
                    <li class="mobile-nav-item"><a href="{{route('faq')}}"
                                                   class="mobile-nav-link d-flex align-items-center">FAQ</a></li>
                    <li class="mobile-nav-item"><a href="{{route('ueber-uns')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Über uns</a></li>
                    <li class="mobile-nav-item"><a href="{{route('kontakt')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Kontakt</a></li>
                    <li class="mobile-nav-item"><a href="{{route('login')}}"
                                                   class="mobile-nav-link d-flex align-items-center">Anmelden</a></li>
                </ul>
                <!-- <a href="{{route('login')}}" class="btn btn-outline header-btn mt-3">
                    Anmelden
                </a> -->
</div>
                <hr style="border: 1px solid #fff">
                    <div class="questions-section pt-2 mt-4">
                    <p class="pb-3" style="color: white; font-size: 17.5px"><b>Fragen?</b> Ruf uns einfach an!<br><span style="font-size: 16px; color: #d6d6d6">Mo-Sa: 9-18 Uhr</span></p>
                    
                    <a href="tel:+4921192325550" style="border-radius: 5px" class="btn btn-secondary d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.5rem" class="fa-regular fa-phone"></i>0211/ 92325550
                    </a>
            </div>
            </nav>
        </div>

    </div>
</div>
</header>


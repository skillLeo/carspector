@extends('mainpages.master-layout')
@section('title', 'Carspector | Geschäftskunden & B2B')
@section('meta_description', 'Partner-Modell für B2B: Einheitliche Gebrauchtwagenchecks deutschlandweit, individuelle Prozesse, Volumenrabatte & persönlicher Support.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')




<!-- CONTENT ONLY (ohne Header & Footer) -->
<style>
  :root{
    --cs-text: #111827;
    --cs-muted: #6b7280;
    --cs-border: #e5e7eb;

    /* minimal hell-blau für Boxen */
    --cs-surface: #ffffff;
    --cs-surface-blue: #f7fbff;  /* sehr dezent */
    --cs-surface-blue-2: #ffffff;/* etwas stärker, aber immer noch minimal */

    /* klare Abhebung */
    --cs-shadow: 0 10px 28px rgba(17, 24, 39, 0.08);
    --cs-shadow-soft: 0 8px 22px rgba(17, 24, 39, 0.07);
  }

  .cs-b2b-wrap{
    background: transparent;
    color: var(--cs-text);
  }

  .cs-hero{
    border: 1px solid var(--cs-border);
    background: var(--cs-surface-blue);
    border-radius: 16px;
    box-shadow: var(--cs-shadow);
  }

  .cs-lead{
    color: var(--cs-muted);
    max-width: 70ch;
  }

  .cs-card{
    border: 1px solid rgba(229,231,235,0.9);
    background: var(--cs-surface-blue);
    border-radius: 16px;
    height: 100%;
    box-shadow: var(--cs-shadow-soft);
  }

  .cs-soft{
    background: var(--cs-surface-blue-2);
  }

  .cs-icon{
    width: 42px;
    height: 42px;
    border-radius: 12px;
    display:flex;
    align-items:center;
    justify-content:center;
    border: 1px solid rgba(229,231,235,0.9);
    background: white;
    flex: 0 0 auto;
  }

  .cs-mini{
    font-size: .95rem;
    color: black;
  }

  .cs-badge{
    font-size: .87rem;
    border: 1px solid rgba(229,231,235,0.95);
    background: white;
    color: #434343;;
    border-radius: 8px;
    padding: .35rem .6rem;
    white-space: nowrap;
  }

  .cs-divider{
    height: 1px;
    background: rgba(229,231,235,0.95);
  }

  .cs-contact{
    border: 1px solid rgba(229,231,235,0.9);
    background: var(--cs-surface-blue);
    border-radius: 16px;
    box-shadow: var(--cs-shadow);
  }

  .cs-link{
    color: inherit;
    text-decoration: none;
    border-bottom: 1px dashed #cbd5e1;
  }
  .cs-link:hover{ border-bottom-color: #94a3b8; }

  .cs-btn:hover {
    background: var(--secondary);
  }

  .cs-btn{
    border-radius: 12px;
    padding: .85rem 1.8rem;
    font-weight: 600;
    background: var(--primary);
    border: none;
  }
</style>

<section class="cs-b2b-wrap py-5">
  <div class="container py-2 py-md-4">

    <!-- HERO -->
    <div class="cs-hero p-4 p-md-5 mb-5 mb-md-5">
      <div class="row g-4 align-items-center">
        <div class="col-lg-8">
          <div class="d-inline-flex align-items-center gap-2 mb-3 cs-badge">
            <!-- pin icon -->
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M12 22s7-4.5 7-11a7 7 0 1 0-14 0c0 6.5 7 11 7 11Z" stroke="currentColor" stroke-width="1.8"/>
              <path d="M12 13.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" stroke="currentColor" stroke-width="1.8"/>
            </svg>
            Deutschlandweit • Für Geschäftskunden
          </div>

          <h1 style="letter-spacing: -0.5px" class="h2 fw-semibold mb-3">
            Carspector Partner-Modell für B2B
          </h1>

          <p class="cs-lead mb-4">
            Für Autohäuser, Händlernetzwerke, Leasing- und Flottenkunden sowie weitere Unternehmen:
            Wir übernehmen Ihre Gebrauchtwagenprüfungen deutschlandweit – skalierbar, transparent und auf Ihre Prozesse abgestimmt.
          </p>

          <div class="d-flex flex-column flex-sm-row gap-2">
            <a href="#b2b-kontakt" class="btn btn-dark cs-btn">
              Kontakt aufnehmen
            </a>
            <!-- <a href="#b2b-vorteile" class="btn btn-outline-secondary cs-btn">
              Vorteile ansehen
            </a> -->
          </div>

          <div class="d-flex flex-wrap gap-2 mt-4">
            <span class="cs-badge">Rabattstaffel bei Volumen</span>
            <span class="cs-badge">Individuelle Wünsche</span>
            <span class="cs-badge">Fester Ansprechpartner</span>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="cs-card p-4 cs-soft">
            <div class="d-flex align-items-start gap-3">
              <div class="cs-icon">
                <!-- check icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M20 7 10 17l-4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Klare Standards</div>
                <div class="cs-mini">Einheitliche Prüfungen & nachvollziehbare Dokumentation.</div>
              </div>
            </div>

            <div class="cs-divider my-3"></div>

            <div class="d-flex align-items-start gap-3">
              <div class="cs-icon">
                <!-- bolt icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M13 2 3 14h8l-1 8 11-14h-8l0-6Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Skalierbar</div>
                <div class="cs-mini">Von einzelnen Aufträgen bis zu hohem Monatsvolumen.</div>
              </div>
            </div>

            <div class="cs-divider my-3"></div>

            <div class="d-flex align-items-start gap-3">
              <div class="cs-icon">
                <!-- users icon -->
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                  <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M20 21a8 8 0 1 0-16 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Persönlich</div>
                <div class="cs-mini">Ein Ansprechpartner für Setup, Wünsche & laufende Betreuung.</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- VORTEILE -->
    <div id="b2b-vorteile" class="mb-5 mb-md-5">
      <div class="row align-items-end g-3 mb-3">
        <div class="col-lg-8">
          <h2 class="h3 fw-semibold mb-1">Vorteile für Partner</h2>
          <p class="cs-mini mb-0">
            Ein Modell für Geschäftskunden – professionell, zuverlässig, deutschlandweit.
          </p>
        </div>
      </div>

      <div class="row g-3 g-md-4">
        <div class="col-md-6 col-lg-4">
          <div class="cs-card p-4">
            <div class="d-flex gap-3 align-items-start">
              <div class="cs-icon">
                <!-- percent icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M19 5 5 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M7.5 8.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M16.5 18.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" stroke="currentColor" stroke-width="1.8"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Volumenrabatte</div>
                <div class="cs-mini">Konditionen passend zu Auftragszahl und Regelmäßigkeit.</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="cs-card p-4">
            <div class="d-flex gap-3 align-items-start">
              <div class="cs-icon">
                <!-- sliders icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M4 21v-7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M4 10V3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M12 21v-9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M12 8V3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M20 21v-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M20 12V3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M2 14h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M10 8h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M18 16h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Individuelle Anforderungen</div>
                <div class="cs-mini">Sonderprüfpunkte, Prozesse, SLA oder Priorisierung möglich.</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="cs-card p-4">
            <div class="d-flex gap-3 align-items-start">
              <div class="cs-icon">
                <!-- palette icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M12 22a10 10 0 1 0-10-10c0 3.3 2.7 6 6 6h1.5a2.5 2.5 0 0 1 0 5H12Z" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M7.5 10.5h.01M10.5 7.5h.01M13.5 10.5h.01M9.5 13.5h.01" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Personalisierung</div>
                <div class="cs-mini">Report-Details, Zusatztexte oder Branding nach Wunsch.</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="cs-card p-4">
            <div class="d-flex gap-3 align-items-start">
              <div class="cs-icon">
                <!-- map icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M9 18 3 21V6l6-3 6 3 6-3v15l-6 3-6-3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                  <path d="M9 3v15" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M15 6v15" stroke="currentColor" stroke-width="1.8"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Deutschlandweit</div>
                <div class="cs-mini">Ideal für mehrere Standorte, Filialen oder Netzwerke.</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="cs-card p-4">
            <div class="d-flex gap-3 align-items-start">
              <div class="cs-icon">
                <!-- shield icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M12 22s8-3 8-10V5l-8-3-8 3v7c0 7 8 10 8 10Z" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M9 12l2 2 4-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Verlässliche Qualität</div>
                <div class="cs-mini">Standards, Dokumentation und klare Kommunikation.</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="cs-card p-4">
            <div class="d-flex gap-3 align-items-start">
              <div class="cs-icon">
                <!-- headset icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M4 13v-1a8 8 0 1 1 16 0v1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M4 13a2 2 0 0 0 2 2h1v-6H6a2 2 0 0 0-2 2v2Z" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M20 13a2 2 0 0 1-2 2h-1v-6h1a2 2 0 0 1 2 2v2Z" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M17 15v1a3 3 0 0 1-3 3h-2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Fester Kontakt</div>
                <div class="cs-mini">Direkter Draht für Angebote, Setup und laufende Betreuung.</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Ansprechpartner (ohne Formular) -->
    <div id="b2b-kontakt" class="cs-contact p-4 p-md-5">
      <div class="row g-4 align-items-center">
        <div class="col-lg-7">
          <h2 class="h3 fw-semibold mb-2">Kontakt für Geschäftskunden</h2>
          <p class="cs-mini mb-4">
            Schreiben Sie uns kurz Ihr geplantes Volumen und Ihre Anforderungen – wir melden uns mit einem passenden Angebot.
          </p>

          <a class="btn btn-dark cs-btn"
             href="mailto:b2b@carspector.de">
            E-Mail an B2B-Team senden
          </a>
        </div>

        <div class="col-lg-5">
          <div style="background: white"  class="cs-card p-4">
            <div class="d-flex align-items-start gap-3">
              <div class="cs-icon" aria-hidden="true">
                <!-- user circle icon -->
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                  <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M20 21a8 8 0 1 0-16 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <div class="fw-semibold">Ihr persönlicher Ansprechpartner</div>
                <div class="cs-mini">Angebot, Setup & laufende Betreuung</div>
              </div>
            </div>

            <div class="cs-divider my-3"></div>

            <div class="d-flex flex-column gap-2">
              <div class="d-flex justify-content-between align-items-center">
                <span class="cs-mini">Name</span>
                <span class="fw-semibold">Jan Fischer</span>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="cs-mini">E-Mail</span>
                <a class="cs-link" href="mailto:jan.fischer@carspector.de">jan.fischer@carspector.de</a>
              </div>
            </div>


          </div>
        </div>

      </div>
    </div>

  </div>
</section>


@endsection

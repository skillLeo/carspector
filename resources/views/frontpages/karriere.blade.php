@extends('mainpages.master-layout')
@section('title', 'Carspector | Karriere')
@section('meta_description', 'Karriere bei Carspector: Wir suchen Mitarbeiter - jetzt bewerben!')
@section('header')
    @include('partials.index-header')
@endsection

@section('content')




<section class="py-5">
  <div class="container">
    <div class="mb-4">
      <h1 class="h2 fw-bold mb-2">Karriere bei Carspector</h1>
      <p class="text-muted mb-0">
        Wir suchen Verstärkung. Bewerbung bitte per E-Mail an
        <a href="mailto:job@carspector.de" class="link-primary">job@carspector.de</a>.
      </p>
    </div>

    <div class="row g-4">
      <!-- Job 1 -->
      <div class="col-12 col-lg-6">
        <div class="border rounded-4 p-4 h-100 bg-white shadow-lg">
          <h2 class="h4 fw-bold mb-2">Auftragsbearbeitung &amp; Organisation (m/w/d)</h2>
          <p class="text-muted mb-3">Vollzeit / Teilzeit · in Düsseldorf</p>

          <h3 class="h6 fw-bold mb-2">Deine Aufgaben</h3>
          <ul class="ps-3 mb-3 list-unstyled list-points">
            <li>Aufträge erfassen, prüfen und verwalten</li>
            <li>Statuspflege, Dokumentation und Ablage</li>
            <li>Planung &amp; Koordination von CarChecks</li>
            <li>Kommunikation mit Kunden und Team</li>
            <li>Allgemeine organisatorische Aufgaben</li>
          </ul>

          <h3 class="h6 fw-bold mb-2">Dein Profil</h3>
          <ul class="ps-3 mb-0 list-unstyled list-points">
            <li>Strukturierte, zuverlässige Arbeitsweise</li>
            <li>Gute Kommunikation und Organisation</li>
            <li>Sicherer Umgang mit Office-Tools (z. B. Excel/Sheets)</li>
            <li>Erfahrung in Auftragsabwicklung/Backoffice ist ein Plus</li>
            <li>Interesse an Automotive willkommen (kein Muss)</li>
          </ul>
        </div>
      </div>

      <!-- Job 2 -->
      <div class="col-12 col-lg-6">
        <div class="border rounded-4 p-4 h-100 bg-white shadow-lg">
          <h2 class="h4 fw-bold mb-2">Customer Support / Kundenservice (m/w/d)</h2>
          <p class="text-muted mb-3">
            Vollzeit / Teilzeit · in Düsseldorf
          </p>

          <h3 class="h6 fw-bold mb-2">Deine Aufgaben</h3>
          <ul class="ps-3 mb-3 list-unstyled list-points">
            <li>Ansprechpartner für Kunden per E-Mail und Telefon</li>
            <li>Bearbeitung von Kundenanfragen rund um CarChecks</li>
            <li>Hotline-Betreuung und Klärung offener Fragen</li>
            <li>Weiterleitung &amp; Abstimmung komplexerer Themen intern</li>
            <li>Pflege von Tickets, Notizen und einfachen Dokumentationen</li>
          </ul>

          <h3 class="h6 fw-bold mb-2">Dein Profil</h3>
          <ul class="ps-3 mb-0 list-unstyled list-points">
            <li>Freundliche, serviceorientierte Kommunikation</li>
            <li>Sehr gute Deutschkenntnisse sowie gute Englischkenntnisse in Wort und Schrift</li>
            <li>Zuverlässige, strukturierte Arbeitsweise</li>
            <li>Erfahrung im Kundenservice/Support ist ein Plus</li>
            <li>Ruhiges Auftreten auch bei vielen Anfragen</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mt-4 border rounded-4 p-4 bg-white shadow-lg">
      <h2 class="h4 fw-bold mb-2">So bewirbst du dich</h2>
      <ul class="ps-3 mb-0 list-unstyled list-points">
        <li>Kurzer Text im E-Mail-Body oder Anschreiben</li>
        <li>Lebenslauf (PDF)</li>
        <li>Frühester Starttermin &amp; gewünschtes Modell (VZ/TZ)</li>
      </ul>

      <p class="text-muted mt-3 mb-0">
        E-Mail: <a href="mailto:job@carspector.de" class="link-primary">job@carspector.de</a>
      </p>
    </div>
  </div>
</section>

<style>
  /* Farben über eure Variablen */
  .link-primary {
    color: var(--primary) !important;
  }

  /* Letter-spacing normalisieren */
  h1,
  h3 {
    letter-spacing: normal !important;
  }

  /* Stärkerer Shadow */
  .shadow-lg {
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12) !important;
  }

  /* Sichtbare Bullet Points */
  .list-points li {
    position: relative;
    padding-left: 1.25rem;
    margin-bottom: 0.25rem;
  }

  .list-points li::before {
    content: "•";
    position: absolute;
    left: 0;
    top: 0;
    color: var(--primary);
    font-weight: bold;
  }

  .bg-white {
    background: #fff;
  }

  .border {
    border-color: rgba(0, 0, 0, 0.08) !important;
  }
</style>








@endsection

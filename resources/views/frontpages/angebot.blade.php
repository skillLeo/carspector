@extends('mainpages.master-layout')
@section('title', 'Carspector | FIN-Abfrage')
@section('meta_description', 'FIN-Abfrage: Digitaler Fahrzeug-Check per Fahrgestellnummer. Prüfe jetzt verborgene Mängel aus 900+ Datenquellen – schnell, sicher & zuverlässig.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')


<div class="modal fade" id="fin-model" tabindex="-1" aria-labelledby="stepDescModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stepDescModalLabel">Was ist eine FIN?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="popupContent" class="pb-2" style="text-align: left; line-height: 1.6;">
          
          <!-- Erklärung FIN -->
          <p style="font-size: 1rem; color:#333;">
            Die <strong>Fahrgestellnummer (FIN)</strong>, auch als Fahrzeug-Identifikationsnummer (VIN) bekannt, 
            ist eine eindeutige 17-stellige Kombination aus Buchstaben und Zahlen. 
            Sie dient als "Fingerabdruck" eines Fahrzeugs und enthält wichtige Informationen 
            wie Hersteller, Modell, Baujahr und Produktionsnummer.
          </p>
          
          <!-- Wo findet man die FIN? -->
          <h6 style="margin-top: 1rem; font-weight: 600; color: #222;">Wo finde ich die FIN?</h6>
          <ul style="list-style:none; padding:0; margin: 0.5rem 0; color: #333;">
            <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
              <i class="fa-solid fa-check" style="color: var(--secondary); margin-right:0.75rem;"></i>
              Im Fahrzeugschein (Zulassungsbescheinigung Teil I, Feld E)
            </li>
            <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
              <i class="fa-solid fa-check" style="color: var(--secondary); margin-right:0.75rem;"></i>
              Direkt unter der Frontscheibe (linke Seite, außen sichtbar)
            </li>
            <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
              <i class="fa-solid fa-check" style="color: var(--secondary); margin-right:0.75rem;"></i>
              Im Motorraum oder an der Karosserie (z. B. Radkasten)
            </li>
            <li style="display:flex; align-items:center;">
              <i class="fa-solid fa-check" style="color: var(--secondary); margin-right:0.75rem;"></i>
              In deinen Fahrzeugunterlagen oder Kaufvertrag
            </li>
          </ul>
          
          <!-- Beispielbild -->
          <div style="margin-top: 1.5rem; text-align: center;">
            <img src="/finbeispiel.png" alt="Beispiel FIN"
                 style="width: 100%; max-width: 420px; border-radius: 5px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);" />
            <p style="font-size: 0.85rem; color:#555; margin-top: 0.75rem;">
              Beispiel einer FIN: <strong>WVWZZZ1JZXW000001</strong>
            </p>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>




<style>

.trust-marquee-wrapper {
  overflow: hidden;
  background: #f4f7fa;
  border-radius: 12px;
  padding: 15px 0;
  margin: 30px auto;
  border: 1px solid #e0e6eb;
  max-width: min(90%, 1100px);
}

.trust-marquee {
  overflow: hidden;
  position: relative;
}

.trust-marquee-inner {
  display: inline-flex;
  gap: 40px;
  white-space: nowrap;
  animation: scroll-left 100s linear infinite;
  font-size: 15px;
  font-weight: 500;
  color: #333;
}

.trust-marquee-inner span {
  flex: 0 0 auto;
  padding: 0 10px;
}




  .trust-wrapper {
    max-width: 1100px;
    margin: auto;
    display: flex;
    flex-direction: column;
    gap: 2rem;
  }

  .trust-text h2 {
    font-size: 2rem;
    color: #222;
    text-align: center;
    margin-bottom: 2rem;
  }

  .trust-text ul {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    font-size: 1.1rem;
    color: #555;
  }

  .trust-text li {
    display: flex;
    align-items: center;
    gap: 0.8rem;
  }

  .trust-text li i {
    color: var(--primary);
    font-size: 1.2rem;
  }

  .trust-card {
    background: #f8fafc;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    text-align: center;
  }

  .trust-card .stars {
    color: var(--secondary);
    font-size: 1.5rem;
    margin-bottom: 1rem;
  }

  .trust-card .headline {
    font-size: 1.2rem;
    color: #222;
    font-weight: 600;
  }

  .trust-card .subline {
    font-size: 1rem;
    color: #555;
  }

  /* Desktop Ansicht */
  @media (min-width: 768px) {
    .trust-wrapper {
      flex-direction: row;
      align-items: flex-start;
      justify-content: space-between;
    }
    .trust-text {
      flex: 1;
    }
    .trust-text h2 {
      text-align: left;
    }
    .trust-card {
      flex: 0 0 320px;
      margin-left: 2rem;
      text-align: left;
    }
  }


  .review-row {
    position: relative;
    width: 100%;
    overflow: hidden;
    margin-bottom: 1.5rem;
  }


  .review-card {
    flex: 0 0 auto;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    padding: 1rem 1.5rem;
    font-size: 1rem;
    color: #444;
    max-width: 850px;
    min-width: 300px;
  }

  .stars {
    color: #fbbf24;
    font-size: 1rem;
    margin-bottom: 0.5rem;
  }

  @keyframes scroll-left {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }

  @keyframes scroll-right {
    0% { transform: translateX(-50%); }
    100% { transform: translateX(0); }
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

  .img-responsive-custom {
    width: 100%;
    max-width: 275px; /* Mobil kleiner */
  }

  @media (min-width: 768px) {
    .img-responsive-custom {
      max-width: 300px; /* Desktop normal groß */
    }
  }


  @media (max-width: 767px) {
  .mobile-button-padding {
    padding-bottom: 1.5rem; /* Einfacher Abstand unter dem Button */
  }
}

  /* Standard: Desktop-Ansicht */
  .button-wrapper {
    text-align: left;
  }

  /* Mobile: Button mittig */
  @media (max-width: 767px) {
    .button-wrapper {
      text-align: center !important;
       display: inline-block;
    }
  }

  @media (min-width: 768px) {
    section h1 { font-size: 3rem !important; }
    section h2 { font-size: 2.5rem !important; }
    section p { font-size: 1.1rem !important; }
  }

  @keyframes bounce-highlight {
    0% { transform: scale(1); color: #333; }
    30% { transform: scale(1.4); color: var(--secondary); }
    60% { transform: scale(0.9); color: var(--secondary); }
    100% { transform: scale(1); color: #333; }
  }

  .highlight {
    animation: bounce-highlight 1s ease;
  }

.review-marquee {
  overflow: hidden;
  width: 100%;
  margin-bottom: 2rem;
}

.review-track {
  display: flex;
  width: max-content;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

.review-set {
  display: flex;
  gap: 2rem;
}

.review-card {
  flex: 0 0 auto;
  background: white;
  padding: 1rem 1.25rem;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  font-size: 1rem;
  color: #444;
  min-width: 300px;
  max-width: 400px;
  text-align: left;
  white-space: nowrap;
}

.review-marquee {
  overflow: hidden;
  width: 100%;
  margin-bottom: 2rem;
}

.review-track {
  display: flex;
  width: max-content;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

.review-set {
  display: flex;
  gap: 2rem;
}

.review-card {
  flex: 0 0 auto;
  background: white;
  padding: 1.25rem 1.5rem;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  font-size: 1rem;
  color: #444;
  white-space: nowrap; 
  width: fit-content;   
  max-width: none;     
  text-align: left;
  line-height: 1.5;
  display: inline-block;
}



.stars {
  color: #fbbf24;
  font-size: 1.1rem;
  margin-bottom: 0.5rem;
}

/* Scrollrichtungen */
.marquee-left .review-track {
  animation-name: scroll-left;
  animation-duration: 25s;
}

.marquee-right .review-track {
  animation-name: scroll-right;
  animation-duration: 25s;
}

@keyframes scroll-left {
  0% { transform: translateX(0%); }
  100% { transform: translateX(-50%); }
}

@keyframes scroll-right {
  0% { transform: translateX(-50%); }
  100% { transform: translateX(0%); }
}

/* Mobile Anpassungen */
@media (max-width: 768px) {
  .review-card {
    font-size: 0.95rem;
    min-width: 260px;
  }
}

@keyframes pulse-highlight {
    0% {
      box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.2);
    }
    50% {
      box-shadow: 0 0 12px 8px rgba(0, 123, 255, 0.4);
    }
    100% {
      box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
    }
  }

  .highlight-border {
    animation: pulse-highlight 3s ease-in-out 1 forwards;
  }
  
  .check-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    color: #fff;
    background: var(--secondary);
    border: none;
    padding: 1rem 3rem;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.4s ease 0.1s, transform 0.3s ease;
  }

  .check-button .arrow {
    padding-left: 4px;
    padding-bottom: 2px;
    font-size: 1.2rem;
    display: inline-block;
    transition: transform 0.2s ease 0.1s;
  }

  .check-button:hover {
    background-color: var(--secondary-hover, #2898e3);
    transform: scaleX(1.05); 
  }

  .check-button:hover .arrow {
    transform: translateX(6px);
  }

  .scroll-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    color: #fff;
    background: var(--secondary);
    border: none;
    padding: 1rem 2rem;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .scroll-button:hover {
    background-color: var(--secondary-hover, #2898e3);
  }
  #finInput::placeholder {
    color: gray;
    opacity: 1; 
  }

  #finInput {
    text-transform: uppercase;
  }

  #finInput::placeholder {
    text-transform: none;
    color: gray;
    opacity: 1;
  }

.bg-main {
  background: linear-gradient(to right,
    #d6ecf7 0%,   
    #e6f3fa 20%,    
    #f0f9fc 50%,    
    #e6f3fa 80%,     
    #d6ecf7 100%);
}

@media (max-width: 850px) {
  .bg-main {
    background: #e6f3fa;
  }
}



</style>

<script>
  function scrollAndHighlightFinInput() {
    const input = document.getElementById("finInput");
    const container = document.getElementById("finContainer");

    container.scrollIntoView({ behavior: "smooth", block: "center" });

    setTimeout(() => {
      input.focus();

      container.classList.remove("highlight-border"); 
      void container.offsetWidth; 
      container.classList.add("highlight-border");
    }, 350);
  }
</script>

<main style="color:#333; line-height:1.6;">
 

<section class="bg-main section-bg" style="
  padding: 3rem 1rem;
  margin: auto;
  text-align: center;
">

  

    <h1 style="font-size:2.5rem; letter-spacing: -1px; font-weight:700">
      FIN‑Abfrage: Digitaler Fahrzeug‑Check <span class="d-inline d-md-block d-lg-block" style="@media(max-width: 850px){display:block;}">per Fahrgestellnummer</span>
    </h1>

    <div class="pb-1 pt-3">
    <i style="color: #f2d414" class="pb-3 fa-solid fa-star"></i>
    <span style="font-size: 17px"><b>4.8</b> (5.541 Bewertungen)</span>
  </div>
  
    <p style="font-size:1.1rem; color:#444; max-width:750px; margin:0 auto 2rem;">
      Autokauf geplant? Unser Partner carVertical durchsucht internationale Fahrzeugdatenbanken, um verborgene Mängel aufzudecken und dich vor teuren Überraschungen zu schützen.
    </p>

<div style="display:flex; flex-direction:column; gap:1rem; align-items:center; max-width:450px; margin:0 auto 1.5rem;">
  
  <div id="finContainer" style="display:flex; width:95%; max-width: 400px; border:1px solid #ccc; border-radius:5px; background:#fff; overflow:hidden; align-items:center; transition: border-color 0.3s, box-shadow 0.3s;">
<input id="finInput" class="fin-input" type="text" placeholder="Fahrgestellnummer (FIN)"
  style="color: black; flex:1; border:none; padding:1.3rem 1.5rem; font-size:1rem; outline:none;" />

<i id="finCheckIcon" class="fa-solid fa-check" style="font-size:1.3rem; color: var(--secondary); padding-right: 0.25rem; display: none;"></i>

<a href="#fin-model" data-bs-target="#fin-model" data-bs-toggle="modal">
  <i class="fa-regular fa-circle-info" style="font-size:1.3rem; color: gray; padding: 0 1.25rem; padding-top: 5px"></i>
</a>
</div>

    
    <div class="pb-2" style="display: flex; justify-content: center; align-items: center; font-size: 1rem; color: #444; gap: 6px;">
      <span style="background-color: #d32f2f; color: #fff; letter-spacing: 0.1px; font-weight: bold; font-size: 0.8rem; padding: 2px 6px; border-radius: 4px;">
        SALE
      </span>
      <span><strong>20 %</strong> Rabatt:</span>
      <span style="display: flex; align-items: center; gap: 4px;">
        <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--secondary); display: inline-block;"></span>
        <span>Aktiv</span>
      </span>
    </div>

  <div id="finError" style="color:red; display:none;">Die FIN muss genau 17 Zeichen lang sein.</div>

  <button onclick="validateAndRedirect()" class="check-button">
  Jetzt FIN überprüfen <span class="arrow">→</span>
</button>

</div>

<script>
  function validateAndRedirect() {
    const input = document.getElementById("finInput");
    const error = document.getElementById("finError");
    const fin = input.value.trim().toUpperCase();

    if (fin.length !== 17) {
      error.style.display = "block";
    } else {
      error.style.display = "none";
      const url = `https://www.carvertical.com/de/precheck?utm_source=aff&a=6888823a46a7b&b=155b2a51&voucher=carspector&vin=${fin}`;
      window.location.href = url;
    }
  }

  const input = document.getElementById("finInput");
  const container = document.getElementById("finContainer");

  input.addEventListener("keypress", function (e) {
    if (e.key === "Enter") {
      validateAndRedirect();
    }
  });

  const checkIcon = document.getElementById("finCheckIcon");


input.addEventListener("input", function () {
  const fin = input.value.trim();
  if (fin.length === 17) {
    container.style.borderColor = "var(--secondary)";
    container.style.borderWidth = "1px";
    checkIcon.style.display = "inline";
  } else {
    container.style.borderColor = "#ccc";
    container.style.borderWidth = "1px";
    checkIcon.style.display = "none";
  }
});

</script>


<section class="pt-2" style="display:flex; align-items:center; justify-content:center; gap:0.5rem; font-size:1rem; font-weight:500; color:#333;">
  <i class="fa-solid fa-database" style="font-size:1.3rem; color: var(--primary)"></i>
  <span>Über <span id="dataCount">0</span>+ globale Datenquellen</span>
</section>


<script>
  const countTarget = 900;
  const countElement = document.getElementById("dataCount");
  let currentCount = 0;
  const increment = 15; 
  const speed = 30;   

  const counter = setInterval(() => {
    currentCount += increment;
    if (currentCount >= countTarget) {
      currentCount = countTarget;
      clearInterval(counter);
      countElement.classList.add('highlight');
    }
    countElement.textContent = currentCount;
  }, speed);
</script>


  </section>

<div class="trust-marquee-wrapper bg-gray-50 py-3 overflow-hidden">
  <div class="trust-marquee">
    <div class="trust-marquee-inner flex space-x-12 text-gray-800 font-medium text-base whitespace-nowrap">
      <span>🔍 Sofortige FIN-Prüfung – in 15 Sekunden</span>
      <span>📦 Alle Fahrzeugdaten aus über 900 Datenquellen</span>
      <span>🛠 Versteckte Unfallschäden sofort erkennen</span>
      <span>📸 Zugriff auf gespeicherte Bilder</span>
      <span>📏 Erkennen von Tachomanipulation</span>
      <span>🚗 Original-Ausstattung prüfen</span>
      <span>💰 Marktwert in Echtzeit analysieren</span>
      <span>🌪 Schäden durch Naturkatastrophen aufdecken</span>
      <span>🧾 Fahrzeughistorie lückenlos abrufen</span>
      <span>🛡 Mehr Sicherheit beim Gebrauchtwagenkauf</span>
      <span>🏆 Daten von Herstellern & Versicherungen</span>
      <span>🔒 DSGVO-konform & sicher</span>
      <!-- Wiederholung für endlosen Effekt -->
      <span>🔍 Sofortige FIN-Prüfung – in 15 Sekunden</span>
      <span>📦 Alle Fahrzeugdaten aus über 900 Datenquellen</span>
      <span>🛠 Versteckte Unfallschäden sofort erkennen</span>
      <span>📸 Zugriff auf gespeicherte Bilder</span>
      <span>📏 Erkennen von Tachomanipulation</span>
      <span>🚗 Original-Ausstattung prüfen</span>
      <span>💰 Marktwert in Echtzeit analysieren</span>
      <span>🌪 Schäden durch Naturkatastrophen aufdecken</span>
      <span>🧾 Fahrzeughistorie lückenlos abrufen</span>
      <span>🛡 Mehr Sicherheit beim Gebrauchtwagenkauf</span>
      <span>🏆 Daten von Herstellern & Versicherungen</span>
      <span>🔒 DSGVO-konform & sicher</span>
      <span>🔍 Sofortige FIN-Prüfung – in 15 Sekunden</span>
      <span>📦 Alle Fahrzeugdaten aus über 900 Datenquellen</span>
      <span>🛠 Versteckte Unfallschäden sofort erkennen</span>
      <span>📸 Zugriff auf gespeicherte Bilder</span>
      <span>📏 Erkennen von Tachomanipulation</span>
      <span>🚗 Original-Ausstattung prüfen</span>
      <span>💰 Marktwert in Echtzeit analysieren</span>
      <span>🌪 Schäden durch Naturkatastrophen aufdecken</span>
      <span>🧾 Fahrzeughistorie lückenlos abrufen</span>
      <span>🛡 Mehr Sicherheit beim Gebrauchtwagenkauf</span>
      <span>🏆 Daten von Herstellern & Versicherungen</span>
      <span>🔒 DSGVO-konform & sicher</span>
    </div>
  </div>
</div>

  <section class="pb-3 pt-2" style="display:flex; flex-direction:column; align-items:center; justify-content:center; gap:0.5rem;">
    <h3 class="pb-1" style="font-size:1.2rem; font-weight:600; letter-spacing: -0.25px; color:#333; margin:0;">
      Zertifizierter Partner von:
    </h3>
    <div style="background:#fff; border-radius:8px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
                padding:0.8rem 1.2rem; display:flex; align-items:center; gap:0.5rem;">
      <i class="fa-solid fa-badge-check" style="font-size:2rem; color: var(--secondary);"></i>
      <img src="/carvertical.svg" alt="Partner Logo" style="padding-left: 10px; width:155px; padding-bottom: 5px" />
    </div>
  </section> <br>



 <section style="padding:4rem 2rem; background:#f8fafc">
  <div style="max-width:1100px; margin:auto; display:flex; flex-wrap:wrap; gap:2rem; align-items:center;">
    
    <div style="flex:1 1 400px;">
      <img src="/card-stack-en.png" alt="Beispielbericht"
        style="width:100%; border-radius:10px" />
    </div>
    
    <div style="flex:1 1 400px;">
      <h3 style="font-size:1.8rem; margin-bottom:1rem; color:#222;">So sieht dein Bericht aus</h3>
      <p style="font-size:1rem; color:#555; margin-bottom:1rem;">
         Die FIN-Berichte von carVertical bieten dir alle wichtigen Informationen auf einen Blick – von technischen Daten und Ausstattungsdetails bis hin zu möglichen Vorschäden. 
         Falls vorhanden, erhältst du Informationen zu folgenden Punkten:
      </p>
      
      <ul style="list-style:none; padding:0; margin:0; font-size:1rem; color:#333;">
        <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
          <i class="fas fa-check" style="color: var(--secondary); margin-right:0.5rem;"></i> Gespeicherte Bilder
        </li>
        <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
          <i class="fas fa-check" style="color: var(--secondary); margin-right:0.5rem;"></i> Festgestellte Schäden
        </li>
        <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
          <i class="fas fa-check" style="color: var(--secondary); margin-right:0.5rem;"></i> Manipulierter Kilometerstand
        </li>
        <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
          <i class="fas fa-check" style="color: var(--secondary); margin-right:0.5rem;"></i> Fahrzeugausstattung
        </li>
        <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
          <i class="fas fa-check" style="color: var(--secondary); margin-right:0.5rem;"></i> Aktueller Marktwert
        </li>
        <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
          <i class="fas fa-check" style="color: var(--secondary); margin-right:0.5rem;"></i> Sicherheitsmerkmale
        </li>
        <li style="display:flex; align-items:center; margin-bottom:0.5rem;">
          <i class="fas fa-check" style="color: var(--secondary); margin-right:0.5rem;"></i> Schäden durch Naturkatastrophen
        </li>
        <li style="display:flex; align-items:center;">
          <i class="fas fa-check" style="color: var(--secondary); margin-right:0.5rem;"></i> Und vieles mehr …
        </li>
      </ul>
      <br>
      <button onclick="scrollAndHighlightFinInput()" class="scroll-button">
        Jetzt FIN überprüfen <span style="font-size:1.1rem;">→</span>
      </button>

    </div>
  </div>
</section>

 <section class="how-does-work-section section-padding" style="padding: 60px 20px">
  <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
    
    <h3 style="color: #222;; margin-bottom: 60px">So einfach funktioniert die FIN-Abfrage</h3>
    <div style="display: flex; flex-direction: row; justify-content: space-between; gap: 40px; flex-wrap: wrap;">
      
      <!-- Schritt 1 -->
      <div style="flex: 1; min-width: 280px; text-align: center;">
        <img src="/step-1-bild.webp" alt="Wunschauto angeben" style="width: 145px; margin-bottom: 20px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
          <span style="background-color: var(--primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
            1
          </span>
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">Fahrgestellnummer (FIN) angeben</div>
        </div>
        <p style="font-size: 16px; color: #333;">Gib die Fahrgestellnummer (FIN) deines gewünschten Fahrzeugs ein.</p>
      </div>

      <!-- Schritt 2 -->
      <div class="pt-3 pt-sm-0" style="flex: 1; min-width: 280px; text-align: center;">
        <img src="/step-2-fin.webp" alt="Prüfung vor Ort" style="width: 200px; margin-bottom: 20px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
          <span style="background-color: var(--primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
            2
          </span>
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">Wir suchen nach Daten</div>
        </div>
        <p style="font-size: 16px; color: #333;">Die Systeme von carVertical durchsuchen in Echtzeit über 900 internationale Datenbanken und analysieren das Fahrzeug vollständig digital.</p>
      </div>

      <!-- Schritt 3 -->
      <div class="pt-4 pt-sm-0" style="flex: 1; min-width: 280px; text-align: center;">
        <img src="/step-3-bild.webp" alt="Zertifiziertes Gutachten" style="width: 175px; margin-bottom: 21px;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 10px;">
          <span style="background-color: var(--primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px;">
            3
          </span>
          <div style="font-size: 20px; font-weight: bold; color: var(--primary);">FIN-Bericht erhalten</div>
        </div>
        <p style="font-size: 16px; color: #333;">Du erhältst innerhalb von Sekunden einen detaillierten FIN-Bericht, mit dem du alles Wichtige über das Fahrzeug erfährst.</p>
      </div>
      

    </div>

    <div style="display:flex; justify-content:center; align-items:center; width:100%; margin-top:3rem;">
  <button style="width: 250px !important" onclick="scrollAndHighlightFinInput()" class="scroll-button">
        Jetzt FIN abfragen <span style="font-size:1.1rem;">→</span>
      </button>
</div>
<p style="margin-top:1rem; font-size:0.95rem; color:#444;">
    Der FIN-Bericht wird in <strong>unter 1 Minute</strong> zugestellt!
  </p>

  </div>
</section>

<section style="padding:4rem 2rem; background:#f8fafc; overflow:hidden;">
  <div style="max-width:1100px; margin:auto; text-align:center;">
    <h2 style="font-size:2rem; margin-bottom:2.5rem; color:#222;">Das sagen Kunden zur FIN-Abfrage</h2>

    <!-- Zeile 1 – scrollt nach links -->
    <div class="review-marquee marquee-left">
      <div class="review-track">
        <div class="review-set">
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Schnell, übersichtlich und absolut hilfreich!“ – <strong>Marion S.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Top Service – in Sekunden wusste ich alles über das Auto.“ – <strong>Jens T.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Kaufentscheidung war dank des Berichts sofort klar.“ – <strong>Paul K.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Sehr detailliert – mehr Infos als beim Händler!“ – <strong>Jens T.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Schnell, übersichtlich und absolut hilfreich!“ – <strong>Marion S.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Top Service – in Sekunden wusste ich alles über das Auto.“ – <strong>Jens T.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Kaufentscheidung war dank des Berichts sofort klar.“ – <strong>Paul K.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Sehr detailliert – mehr Infos als beim Händler!“ – <strong>Jens T.</strong>
          </div>
        </div>
      </div>
    </div>

    <!-- Zeile 2 – scrollt nach rechts -->
    <div class="review-marquee marquee-right">
      <div class="review-track">
        <div class="review-set">
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Bericht kam sofort. Super verständlich aufgebaut.“ – <strong>Anna W.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Vertrauenswürdiger Service, lohnt sich wirklich.“ – <strong>Thomas L.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Einfache Bedienung, schnelle Ergebnisse.“ – <strong>Joshua L.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Einfach FIN eingeben und fertig. Mega easy!“ – <strong>Josephone P.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Bericht kam sofort. Super verständlich aufgebaut.“ – <strong>Anna W.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Vertrauenswürdiger Service, lohnt sich wirklich.“ – <strong>Thomas L.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Einfache Bedienung, schnelle Ergebnisse.“ – <strong>Joshua L.</strong>
          </div>
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            „Einfach FIN eingeben und fertig. Mega easy!“ – <strong>Josephone P.</strong>
          </div>
        </div>
      </div>
    </div>

    <div style="display:inline-block; background:var(--primary); color:#fff; padding:0.75rem 1.2rem; border-radius:5px; font-size:0.9rem; font-weight:400; margin-top:1rem; box-shadow:0 4px 8px rgba(0, 0, 0, 0.2);">
  <i class="fas fa-thumbs-up" style="margin-right:0.5rem;"></i> Über 5.000 positive Bewertungen!
</div>

  </div>
</section>

  <section style="padding:4rem 2rem; background:white;">
  <div class="trust-wrapper">

    <div class="trust-text">
      <h2 style=" margin-bottom:2rem; color:#222;">Darum kannst du auf eine FIN-Abfrage von carVertical vertrauen</h2>
      <ul>
        <li><i class="fas fa-shield-alt" style="color:var(--primary); margin-right:0.5rem;"></i>Vermeide teure Fehler beim Fahrzeugkauf und handle sicherer.</li>
  <li><i class="fas fa-stopwatch" style="color:var(--primary); margin-right:0.5rem;"></i>Spare wertvolle Zeit mit einem sofort verfügbaren Bericht.</li>
  <li><i class="fas fa-handshake" style="color:var(--primary); margin-right:0.5rem;"></i> Verhandle bessere Preise mit fundierten Informationen.</li>
  <li><i class="fas fa-file-alt" style="color:var(--primary); margin-right:0.5rem;"></i> Erhalte detaillierte, geprüfte und vertrauenswürdige Fahrzeuginfos.</li>
</ul>
    </div>

    <div class="trust-card">
      <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <p class="headline">Über 5.000 Bewertungen</p>
      <p class="subline">Unsere Kunden vertrauen auf unsere Expertise und unseren Service.</p>
    </div>
  </div>
</section>




</section>


<section style="padding:4rem 2rem; background:linear-gradient(135deg, #f5f9fc, #ffffff); text-align:center;">
  <div style="max-width:900px; margin:auto;">
    <h2 style="font-size:2rem; margin-bottom:1rem; color:#222;">Über 900+ Datenquellen</h2>
    <p style="font-size:1.1rem; color:#555; margin-bottom:2rem;">
      Die Informationen stammen aus <strong>mehr als 15 Ländern</strong>  
      und werden kontinuierlich aktualisiert, um dir die besten Fahrzeugdaten zu liefern.
    </p>

    <div style="display:flex; flex-wrap:wrap; gap:1.5rem; justify-content:center; margin-top:2rem;">
      <div style="flex:1 1 220px; background:#fff; padding:1.5rem; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <i class="fas fa-globe-europe" style="font-size:2rem; color:var(--primary); margin-bottom:0.5rem;"></i>
        <p style="font-size:1rem; color:#444;">Daten aus <strong>Europa & USA</strong></p>
      </div>
      <div style="flex:1 1 220px; background:#fff; padding:1.5rem; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <i class="fas fa-database" style="font-size:2rem; color:var(--primary); margin-bottom:0.5rem;"></i>
        <p style="font-size:1rem; color:#444;">Über <strong>900 geprüfte Datenbanken</strong></p>
      </div>
      <div style="flex:1 1 220px; background:#fff; padding:1.5rem; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <i class="fas fa-sync-alt" style="font-size:2rem; color:var(--primary); margin-bottom:0.5rem;"></i>
        <p style="font-size:1rem; color:#444;">Ständige <strong>Aktualisierung</strong></p>
      </div>
    </div>
  </div>
</section>




<section class="check-from-home-section py-5">
  <div class="container">
    <div class="row align-items-center flex-column-reverse flex-md-row">
      <!-- Illustration -->
      <div class="col-md-6 mb-4 mb-md-0 text-center">
        <img src="/vonzuhause.webp" alt="Auto von Zuhause prüfen lassen"
             class="img-fluid img-responsive-custom">
      </div>

      <!-- Text -->
      <div class="col-md-6 text-center text-md-start">
        <h3 style="font-size:1.8rem; margin-bottom:1rem; color:#222;">
          Jetzt FIN abfragen und profitieren
        </h3>

        <p style="font-size:1rem; color:#555">
          Die FIN-Berichte von carVertical liefern dir alle wichtigen Fahrzeugdetails auf einen Blick – 
          von technischen Daten über Ausstattungsmerkmale bis zu eventuellen Schäden.
        </p>

        <!-- Button Wrapper -->
        <div class="mobile-button-padding button-wrapper" style="margin-top:1.5rem;">
          <button onclick="scrollAndHighlightFinInput()" class="scroll-button">
            Jetzt FIN überprüfen <span style="font-size:1.1rem;">→</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>



</main>
@endsection

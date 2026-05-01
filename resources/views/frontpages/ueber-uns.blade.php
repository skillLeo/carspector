@extends('mainpages.master-layout')
@section('title', 'Carspector | Über uns')
@section('meta_description', 'Jetzt Gebrauchtwagencheck deutschlandweit buchen – zertifizierte Vor-Ort-Prüfung mit über 150 Prüfpunkten, Fotodokumentation & Marktwertanalyse.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')

<style>
    .headline {
        font-size: 60px;
        color: #ffffff;
        font-weight: 700;
        margin: 0 0 16px 0;
    }

    /* Mobile */
    @media (max-width: 480px) {
        .headline {
            font-size: 48px; /* gewünschte mobile Größe */
        }
    }
</style>

<!-- HERO -->
<section id="carspector_hero_9273" style="position:relative; min-height:40vh; display:flex; align-items:center; justify-content:center; overflow:hidden;">
    <img src="/team-bild.png"
     alt="Fahrzeugprüfung bei Carspector"
     style="position:absolute; inset:0; width:100%; height:100%;
            object-fit:cover; object-position:center 47%;
            filter:brightness(0.35);">
    <div style="position:relative; z-index:1; padding:0 16px; width:100%; max-width:1100px; box-sizing:border-box;">
        <div style="max-width:680px; text-align:center; margin:0 auto;">
            <h1 class="headline">
    Hallo! Wir sind Carspector.
</h1>

            <!-- <p style="color:#f5f5f5; font-size:1.05rem; margin:0;">
                Herzlich willkommen!
            </p> -->
        </div>
    </div>
</section>

<!-- TIMELINE -->
<section id="carspector_timeline_9273" style="padding:60px 0; background-color:#f7f7f7;">
    <div style="max-width:900px; margin:0 auto; padding:0 16px; box-sizing:border-box;">
        <div style="background-color:#ffffff; border-radius:16px; box-shadow:0 12px 35px rgba(0,0,0,0.08); padding:36px 22px;">
            <div style="text-align:center; margin-bottom:40px;">
                <h2 style="font-size: 32px; margin:0 0 8px 0;">Unsere Reise</h2>
            </div>

            <!-- Timeline Wrapper mit durchgehender Linie -->
            <div style="margin-top:20px; position:relative; box-sizing:border-box; padding-left:0px;">
                <!-- vertikale Linie -->
                <div style="position:absolute; left:5px; top:0; bottom:0; width:2px; background:#e0e0e0;"></div>

                <!-- ITEM 1 -->
                <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
                    <!-- Punkt leicht rechts der Linie, über der Linie -->
                    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
                        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
                    </div>
                    <!-- Inhalt -->
                    <div style="flex:1; padding-left:-5px;">
                        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
                            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;"><span style="color: #0d6efd">11/21</span> – Gründung & Launch </h4>
                            <p style="font-size: 16px; margin:0;">
                                Mit der Gründung von Carspector setzen wir den Grundstein für einen neuen Standard in der Fahrzeugprüfung. Unser Anspruch: Prüfungen, die für jeden Käufer verständlich, transparent und zuverlässig sind. Der Start erfolgt in Düsseldorf und Umgebung – mit dem Fokus, regional eine besonders hohe Servicequalität aufzubauen.
                            </p>
                        </div>
                    </div>
                </div>

                <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
                    <!-- Punkt leicht rechts der Linie, über der Linie -->
                    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
                        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
                    </div>
                    <!-- Inhalt -->
                    <div style="flex:1; padding-left:-5px;">
                        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
                            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;"><span style="color: #0d6efd">12/22</span> – Meilenstein: 1.000 Kunden</h4>
                            <p style="font-size: 16px; margin:0;">
                                Carspector wächst: Bereits 13 Monate nach dem Start erreichen wir die Marke von 1.000 Kunden. Dieser Meilenstein bestätigt die Nachfrage nach unabhängigen Fahrzeugprüfungen und stärkt unseren Weg Richtung bundesweiter Skalierung.
                            </p>
                        </div>
                    </div>
                </div>

                <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
                    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
                        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
                    </div>
                    <div style="flex:1; padding-left:-5px;">
                        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
                            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;"><span style="color: #0d6efd">08/23</span> – Expansion Deutschlandweit</h4>
                            <p style="font-size: 16px; margin:0;">
                                Unsere Vision wächst: Ein deutschlandweites Netzwerk aus qualifizierten, geprüften Fahrzeugexperten entsteht. Immer mehr Regionen können innerhalb kurzer Zeit mit unabhängigen und professionellen Prüfungen versorgt werden. Damit werden hochwertige Gutachten und sichere Kaufentscheidungen erstmals deutschlandweit für alle zugänglich.
                            </p>
                        </div>
                    </div>
                </div>

               <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
    </div>

    <div style="flex:1; padding-left:-5px;">
        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
            
            <!-- Hinweis / Badge -->
            <div style="
                display:inline-block;
                background: var(--secondary);
                color:#fff;
                font-size:12px;
                font-weight:600;
                padding:4px 10px;
                border-radius:8px;
                margin-bottom:8px;
                letter-spacing:0.4px;
                text-transform:uppercase;
            ">
                Carspector 2.0 | Relaunch
            </div>

            <h4 style="letter-spacing: -0.15px; font-size:21px; margin:0 0 6px 0;">
                <span style="color:#0d6efd">01/24</span> – Aufbau eines komplett neuen Systems
            </h4>

            <p style="font-size:16px; margin:0;">
                Carspector wurde komplett neu aufgebaut. Ein neu entwickelter Online-Buchungsprozess sorgt für eine deutlich schnellere und intuitivere Abwicklung. 
                Gleichzeitig haben wir unseren Markenauftritt modernisiert mit neuem Logo und einer klaren, zeitgemäßen Markenidentität. 
                Ergänzt wird der Relaunch durch eine eigens entwickelte App für unsere Fahrzeugprüfer, über die alle Aufträge digital, effizient und transparent gesteuert werden. So entsteht ein zukunftssicheres System, das Abläufe vereinfacht und die Qualität unserer Leistungen weiter verbessert.
            </p>
        </div>
    </div>
</div>


                <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
                    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
                        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
                    </div>
                    <div style="flex:1; padding-left:-5px;">
                        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
                            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;"><span style="color: #0d6efd">05/24</span> – Deutschlandweite Abdeckung</h4>
                            <p style="font-size: 16px; margin:0;">
                                Mit über 1.000 zertifizierten Partnern erreichen wir erstmals eine flächendeckende Verfügbarkeit in ganz Deutschland. Dadurch können wir in allen Regionen schnell reagieren und Prüfaufträge kurzfristig durchführen – zuverlässig, flexibel und kundennah.
                            </p>
                        </div>
                    </div>
                </div>

                <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
                    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
                        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
                    </div>
                    <div style="flex:1; padding-left:-5px;">
                        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
                            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;"><span style="color: #0d6efd">10/24</span> – Partnerprogramm für Händler & Exportkunden</h4>
                            <p style="font-size: 16px; margin:0;">
                                Wir starten ein Partnerprogramm speziell für Händler und Kunden im EU-Ausland. Es ermöglicht reibungslose Abläufe bei Exportprozessen. So wird Carspector zum verlässlichen Partner für internationale Fahrzeuggeschäfte.
                            </p>
                        </div>
                    </div>
                </div>

                <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
                    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
                        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
                    </div>
                    <div style="flex:1; padding-left:-5px;">
                        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
                            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;"><span style="color: #0d6efd">11/24</span> – Einführung Fahrzeugtransport</h4>
                            <p style="font-size: 16px; margin:0;">
                               Unser Angebot wächst weiter: Mit dem neuen Fahrzeugtransport-Service bieten wir eine sichere und bequeme Option, Fahrzeuge deutschlandweit und europaweit transportieren zu lassen. Die ideale Ergänzung für Käufer, die alles aus einer Hand wünschen.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ITEM 3 -->
                <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
                    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
                        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
                    </div>
                    <div style="flex:1; padding-left:-5px8px;">
                        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
                            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;"><span style="color: #0d6efd">03/25</span> - Meilenstein: 10.000 Kunden</h4>
                            <p style="font-size: 16px; margin:0;">
              Ein weiterer bedeutender Schritt: Wir überschreiten die Marke von 10.000 erfolgreich begleiteten Kunden. Jeder Auftrag stärkt unser Qualitätsversprechen und bestätigt den wachsenden Bedarf an unabhängigen, detailgenauen Fahrzeugprüfungen.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ITEM 4 -->
                <div style="display:flex; align-items:flex-start; ; margin-bottom:24px;">
                    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
                        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
                    </div>
                    <div style="flex:1; padding-left:-5px;">
                        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
                            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;"><span style="color: #0d6efd">07/25</span> - Partnerschaft carVertical</h4>
                            <p style="font-size: 16px; margin:0;">
                Durch die Kooperation mit carVertical erweitern wir unsere Prüfungen um zusätzliche Fahrzeughistorien und relevante Hintergrunddaten. Kunden profitieren von noch mehr Transparenz, Sicherheit und einer umfassenderen Entscheidungsgrundlage.
                            </p>
                        </div>
                    </div>
                </div>

                <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
                    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
                        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
                    </div>
                    <div style="flex:1; padding-left:-5px8px;">
                        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
                            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;">
                                <span style="color: #0d6efd">10/25</span> – Marke Carspector<span style="font-size: 0.6em; vertical-align: super;">®</span> eingetragen
                            </h4>
                            <p style="font-size: 16px; margin:0;">
                                Ein bedeutender Schritt für die Zukunft von Carspector. Der Markenname wird offiziell als 
                                europaweit geschützte Marke eingetragen. Damit sichern wir unsere Markenidentität und stärken den rechtlichen Schutz in der gesamten EU.
                            </p>
                        </div>
                    </div>
                </div>




                <style>

                @media (max-width: 500px) {
    .tuv-text-wrap {
        flex-direction: column;
        align-items: flex-start;
    }

    .tuv-text {
        margin-left: 0;
    }
}
</style>

 <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
    
    <!-- Timeline Punkt -->
    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
    </div>

    <!-- Content Box -->
    <div style="flex:1;">
        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px;">
            
            <!-- Überschrift -->
            <h4 style="letter-spacing: -0.15px; font-size:21px; margin:0 0 10px 0;">
                <span style="color:#0d6efd">12/25</span> – Vereinsmitgliedschaft im TÜV Rheinland Berlin Brandenburg Pfalz e.V.
            </h4>

            <!-- Bild + Beschreibung -->
            <div class="tuv-text-wrap" style="display:flex; align-items:flex-start; gap:16px;">
                
                <!-- TÜV Mitgliedersignet -->
                <div class="tuv-logo" style="flex-shrink:0;">
                    <img 
                        src="/tuv-signet.png" 
                        alt="Mitglied im TÜV Rheinland Berlin Brandenburg Pfalz e.V." 
                        style="max-width:85px; height:auto;">
                </div>

                <!-- Beschreibungstext -->
                <p class="tuv-text" style="font-size:16px; margin:0;">
                    Carspector wird Mitglied im TÜV Rheinland Berlin Brandenburg Pfalz e.V.<br>
                    Die Vereinsmitgliedschaft stärkt unseren fachlichen Austausch innerhalb eines etablierten Netzwerks aus Unternehmen, Prüfern und Experten rund um Qualität, Sicherheit und Mobilität.
                </p>

            </div>
        </div>
    </div>
</div>

<div style="display:flex; align-items:flex-start; margin-bottom:24px;">
    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
    </div>

    <div style="flex:1; padding-left:-5px;">
        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">

            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;">
                <span style="color: #0d6efd">02/26</span> – Elektro- & Hybridfahrzeug-Check
            </h4>

            <p style="font-size: 16px; margin:0;">
                Erweiterung unseres Angebots um  Elektro- und Hybridfahrzeug-Checks – inklusive Hochvolt-/Batterieprüfung
                (z. B. SoH/ Restkapazität), Ladefunktions-Check und Elektronikdiagnose. 
            </p>

        </div>
    </div>
</div>

<div style="display:flex; align-items:flex-start; margin-bottom:24px;">
    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
    </div>

    <div style="flex:1; padding-left:-5px;">
        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">

            <!-- Hinweis / Badge -->
            <div style="
                display:inline-block;
                background: var(--secondary);
                color:#fff;
                font-size:12px;
                font-weight:600;
                padding:4px 10px;
                border-radius:8px;
                margin-bottom:8px;
                letter-spacing:0.4px;
                text-transform:uppercase;
            ">
                Neu ab 03/26
            </div>

            <h4 style="letter-spacing: -0.15px; font-size: 21px; margin:0 0 6px 0;">
                <span style="color: #0d6efd">03/26</span> – Kfz-Zulassungsservice
            </h4>

            <p style="font-size: 16px; margin:0;">
                 Mit unserem neuen Kfz-Zulassungsservice erweitern wir unser Angebot um einen weiteren wichtigen Schritt rund um den Fahrzeugkauf. 
                 Wir übernehmen die Abwicklung von An-, Um- und Abmeldungen schnell, zuverlässig und unkompliziert. 
            </p>

        </div>
    </div>
</div>


<!-- <div style="display:flex; align-items:flex-start; margin-bottom:24px;">
    
    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
    </div>

    <div style="flex:1;">
        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px;">
            
            <h4 style="font-size:21px; margin:0 0 10px 0;">
                <span style="color:#0d6efd">01/26</span> – Offizieller TÜV Rheinland Partner
            </h4>

            <div class="tuv-text-wrap" style="display:flex; align-items:flex-start; gap:16px;">
                
                <div class="tuv-logo" style="flex-shrink:0;">
                    <img 
                        src="/tuv-gebrauchtwagenbewertung.png" 
                        alt="TÜV Rheinland Partner – Gebrauchtwagenbewertung" 
                        style="max-width:110px; height:auto;">
                </div>

                <p class="tuv-text" style="font-size:16px; margin:0;">
                   Carspector wird offizieller Partner des TÜV Rheinland. Die Fahrzeug-Checks und Gutachten erfolgen in Zusammenarbeit mit dem TÜV Rheinland als Gutachten-Partner.
                </p>

            </div>
        </div>
    </div>
</div> -->



<div style="display:flex; align-items:flex-start;">
    <div style="flex-shrink:0; width:36px; display:flex; justify-content:center;">
        <div style="width:18px; height:18px; border-radius:50%; background:#0d6efd; box-shadow:0 0 0 4px rgba(13,110,253,0.25); margin-top:21px; margin-left:-24px; position:relative; z-index:1;"></div>
    </div>

    <div style="flex:1; padding-left:-5px;">
        <div style="background-color:#ffffff; border-radius:12px; box-shadow:0 8px 24px rgba(0, 0, 0, 0.1); padding:18px 18px;">
            
            <h4 style="font-size:21px; margin:0 0 6px 0; color:#6c757d;">
                Weiteres folgt
            </h4>
<!-- 
            <p style="font-size:15px; margin:0; color:#6c757d; line-height:1.4;">
                Geplant sind unter anderem ein deutschlandweiter Zulassungsservice. Seid gespannt!
            </p> -->
        </div>
    </div>
</div>



            </div>
        </div>
    </div>
</section>



<!-- FACTS / ICON BOXES -->
<section id="carspector_facts_9273" style="padding:60px 0;">
    <div style="max-width:1100px; margin:0 auto; padding:0 16px; box-sizing:border-box;">
        <div style="text-align:center; margin-bottom:28px;">
            <h2 style="margin:0 0 8px 0;">Zahlen & Fakten</h2>
            <p style="margin:0;">
                Ein kurzer Überblick, warum sich Kunden für Carspector entscheiden.
            </p>
        </div>

        <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">
            <!-- BOX 1 -->
            <div style="flex:1 1 220px; max-width:260px;">
                <div style="background-color:#ffffff; border-radius:14px; padding:24px 18px; text-align:center; box-shadow:0 12px 32px rgba(0,0,0,0.08); height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                    <i class="fa-solid fa-car" style="font-size:28px; margin-bottom:10px; color:#0d6efd;"></i>
                    <div style="font-size:1.4rem; font-weight:700; margin-bottom:4px;">10.000+</div>
                    <div style="font-size:0.95rem;">über 10.000 erfolgreich geprüfte Fahrzeuge</div>
                </div>
            </div>

            <!-- BOX 2 -->
            <div style="flex:1 1 220px; max-width:260px;">
                <div style="background-color:#ffffff; border-radius:14px; padding:24px 18px; text-align:center; box-shadow:0 12px 32px rgba(0,0,0,0.08); height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                    <i class="fa-solid fa-map-location-dot" style="font-size:28px; margin-bottom:10px; color:#0d6efd;"></i>
                    <div style="font-size:1.4rem; font-weight:700; margin-bottom:4px;">deutschlandweit</div>
                    <div style="font-size:0.95rem;">Prüfungen in allen Regionen verfügbar</div>
                </div>
            </div>

            <!-- BOX 3 -->
            <div style="flex:1 1 220px; max-width:260px;">
                <div style="background-color:#ffffff; border-radius:14px; padding:24px 18px; text-align:center; box-shadow:0 12px 32px rgba(0,0,0,0.08); height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                    <i class="fa-solid fa-user-shield" style="font-size:28px; margin-bottom:10px; color:#0d6efd;"></i>
                    <div style="font-size:1.4rem; font-weight:700; margin-bottom:4px;">unabhängig</div>
                    <div style="font-size:0.95rem;">neutrale, unabhängige Bewertung</div>
                </div>
            </div>

            <!-- BOX 4 -->
            <div style="flex:1 1 220px; max-width:260px;">
    <div style="background-color:#ffffff; border-radius:14px; padding:24px 18px; text-align:center; box-shadow:0 12px 32px rgba(0,0,0,0.08); height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center;">
        
        <i class="fa-solid fa-mobile-screen" style="font-size:28px; margin-bottom:10px; color:#0d6efd;"></i>
        
        <div style="font-size:1.4rem; font-weight:700; margin-bottom:4px;">100% digital</div>
        
        <div style="font-size:0.95rem;">
Online-Buchung, digitale Abläufe und schnelle Ergebnisse
        </div>
    </div>
</div>
        </div>
    </div>
</section>



@endsection

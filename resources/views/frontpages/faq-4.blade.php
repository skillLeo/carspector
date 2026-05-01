<style>
    @media (min-width: 767px) {
        .btn-faq {
            max-width: 350px;
        }
    }

    .btn-faq:hover {
        background-color: var(--secondary) !important;
        color: white !important;
    }

    .accordion-button {
        font-weight: normal !important;
    }

    .qss:hover {
        background-color: var(--secondary) !important;
        color: white !important;
    }

    .btnb:hover {
        background-color: var(--primary) !important;
        color: white !important;
        border-color: var(--primary) !important;
    }


</style>
@extends('mainpages.mainlayout')
@section('content')
    <main>

        <div style="background-color: #f0f5fa; padding-bottom: 50px; padding-top: 25px" class="mb-5 text-center text-lg-center">
            <h2 style="padding-bottom: 35px; padding-top: 25px; font-size: 30px" " class="text-center">FAQ - Meistgestellte Fragen</h2>
            <a href="{{route('kontakt')}}" style="background-color: #01449A; height: 50px; font-size: 16px; width: 90%" class="btn btn-faq">Support kontaktieren</a>
        </div>

        <!-- step-info -->
        <section style="background-color: white; padding-top: 0px !important" id="how-does-work">
            <div class="container-sm">
                
               

                <div style="padding-top: 20px !important" class="row mb-5 faq-wrapper gx-0 mx-auto">
                    
                    <div class="col-lg-12 mx-auto" id="faq-section" style="max-width: 700px; margin: 0 auto">
                        <div style="padding-bottom: 15px" class="section-heading">
                            <h3>Allgemeine Fragen</h3>
                        </div>
                    <div class="faq-accordion">
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-one" aria-expanded="false" aria-controls="faq-one">
                                    Was ist Carspector?
                                </button>
                            </h2>
                            <div id="faq-one" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                    Carspector ist <b>deutschlands führender Anbieter von Gebrauchtwagenchecks</b> für Fahrzeuge aller Klassen. Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und
                                    Wohnmobile. Du kannst mit nur wenigen Klicks schnell und unkompliziert 
                                    deinen persönlichen Gebrauchtwagencheck deutschlandweit buchen.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-two" aria-expanded="false" aria-controls="faq-two">
                                    Wie funktioniert Carspector genau?
                                </button>
                            </h2>
                            <div id="faq-two" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Wir fahren zu deinem gewünschten Fahrzeug und prüfen es direkt beim Verkäufer vor Ort.<br><br>
                                    Wir arbeiten mit zertifizierten Prüfern in ganz Deutschland zusammen, um unsere Leistungen möglichst flächendeckend anbieten zu können. Unser Team besteht ausschließlich
                                    aus geprüften und professionellen Kfz-Experten, die Fachwissen und Erfahrung mitbringen.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-one1" aria-expanded="false" aria-controls="faq-one1">
                                    Welche Fahrzeuge prüft Carspector?
                                </button>
                            </h2>
                            <div id="faq-one1" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                    <b>Wir prüfen Fahrzeuge aller Klassen.</b> Unter anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und
                                    Wohnmobile. Falls dein gewünschtes Fahrzeug nicht dabei ist, kontaktiere gerne unseren <a href="{{route('kontakt')}}">Support</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-one11" aria-expanded="false" aria-controls="faq-one11">
                                    Was beinhaltet eine Fahrzeugprüfung?
                                </button>
                            </h2>
                            <div id="faq-one11" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                    Die Prüfungsinhalte variieren pro Fahrzeugklasse. Weitere Informationen zu den Inhalten des jeweiligen Fahrzeugs findest du weiter unten.<br><br>
                                    Grundsätzlich prüfen wir allerdings bei jeder Fahrzeugklasse: Die Fahrzeugdokumente, die Fahrzeughistorie, den Lack und Außenzustand, 
                                    den Motor und die Elektronik, den Kilometerstand, den Innenraum und vieles mehr.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-two3" aria-expanded="false" aria-controls="faq-two3">
                                    In welchen Städten kann ich buchen?
                                </button>
                            </h2>
                            <div id="faq-two3" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Wir bieten unsere Dienstleistungen <b>deutschlandweit</b> in allen Gebieten und Städten an.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three6" aria-expanded="false" aria-controls="faq-three6">
                                    Welche Informationen muss ich angeben?
                                </button>
                            </h2>
                            <div id="faq-three6" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Um dein gewünschtes Fahrzeug zu prüfen, benötigen wir <b>Marke, Modell und die Adresse des Fahrzeugs</b>. Optional kannst du noch den Link zum 
                                 Inserat angeben, damit wir uns bestens vorbereiten können. Zusätzlich kannst du uns gerne deine Prüfungswünsche und Fragen mitteilen.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-five" aria-expanded="false" aria-controls="faq-five">
                                    Ich habe eine Prüfung gebucht - wie geht es weiter?
                                </button>
                            </h2>
                            <div id="faq-five" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Du erhältst einen Eintrag auf deinem Profil und eine E-Mail mit Rechnung und allen wichtigen Informationen. Wir werden nun dein
                                gewünschtes Fahrzeug prüfen und senden dir schnellstmöglich das Prüfergebnis zu. Zusätzlich stehen wir dir weiterhin für Rückfragen zur Prüfung
                                zur Verfügung und klären Fragen auch gerne telefonisch.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-six_2" aria-expanded="false" aria-controls="faq-six_2">
                                    Wann erhalte ich das Prüfergebnis?
                                </button>
                            </h2>
                            <div id="faq-six_2" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Durchschnittlich dauert es <b>2-4 Werktage</b>, bis du das Ergebnis des Gebrauchtwagenchecks erhältst. Jedoch kann es manchmal zu Verzögerungen kommen, da wir
                                 auf die Verfügbarkeit des Verkäufers angewiesen sind.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-nine" aria-expanded="false" aria-controls="faq-nine">
                                    Ich habe Fragen, wie kann ich euch kontaktieren?
                                </button>
                            </h2>
                            <div id="faq-nine" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                Nutze ganz einfach unser <a href="{{route('kontakt')}}">Kontaktformular</a>, um uns zu kontaktieren. Unser Kundenservice wird sich um dein Anliegen kümmern und sich schnellstmöglich bei dir melden.
                                <br><br>
                                Ansonsten auch ganz entspannt via <a target="_blank" href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20">WhatsApp</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-seven" aria-expanded="false" aria-controls="faq-seven">
                                    Mein Wunschfahrzeug ist abgemeldet - ist das ein Problem?
                                </button>
                            </h2>
                            <div id="faq-seven" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                <b>Nein.</b> Unsere geschulten Prüfer haben jahrelange Erfahrung im Bereich Gebrauchtwagen und können daher den Zustand eines Fahrzeugs schnell und auch ohne Probefahrt bestimmen. 
                                Jedoch empfiehlt es sich, den Verkäufer darauf aufmerksam zu machen, dass wir gerne eine Probefahrt während des Gebrauchtwagenchecks machen möchten.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-six" aria-expanded="false" aria-controls="faq-six">
                                    Ich bin mir nicht sicher, ob mir Carspector wirklich helfen kann?
                                </button>
                            </h2>
                            <div id="faq-six" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                Das Feedback unserer Kunden spricht für sich. Laut Kundenumfragen und Bewertungen sind <b>97,5% aller Kunden mehr als zufrieden</b> und empfehlen Carspector weiter.
                                 Falls du dich beim Gebrauchtwagenkauf unsicher fühlst oder einfach auf Nummer sicher gehen möchtest, ist Carspector genau das Richtige für dich. Probiere es aus!
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-four" aria-expanded="false" aria-controls="faq-four">
                                    Kostet die Buchung noch extra Gebühren?
                                </button>
                            </h2>
                            <div id="faq-four" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                    <b>Nein.</b> Du bezahlst lediglich den Preis für den Gebrauchtwagencheck. Auf dich kommen sonst keine weiteren Kosten oder Gebühren zu.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-eleven" aria-expanded="false" aria-controls="faq-eleven">
                                    Welche Zahlungsmethoden kann ich nutzen?
                                </button>
                            </h2>
                            <div id="faq-eleven" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                Du kannst mit allen gängigen Zahlungsmethoden bei uns bezahlen. Die beliebtesten sind <b>PayPal, VISA, Klarna und ApplePay.</b>
                                    <br><br>
                                Falls deine Zahlungsmethode nicht dabei sein sollte, zögere nicht uns zu <a href="{{route('kontakt')}}">kontaktieren</a> und wir finden gemeinsam eine Lösung.
                                </div><br>
                            </div>
                        </div>


                        <div style="padding-bottom: 15px; padding-top: 50px" class="section-heading">
                            <h3>Auto/PKW Check</h3>
                        </div>
                        <a href="{{route('booking.step1',['city'=>request('city'),'option'=>1])}}" style="height: 45px; width: 250px; font-size: 16px" class="btn btnb btn-secondary shadow">Jetzt buchen</a><br><br>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three3" aria-expanded="false" aria-controls="faq-three3">
                                    Welche Fahrzeugtypen beinhaltet die Auto/PKW Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three3" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 - Autos aller Bautypen z.B. Kombi, Limousine, Cabrio, ...  <br>
                                 - Kleintransporter z.B. VW Transporter oder Mercedes-Benz Vito
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three4" aria-expanded="false" aria-controls="faq-three4">
                                    Was beinhaltet die Auto/PKW Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three4" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Alle Prüfungsinhalte der Auto/PKW Prüfung findest du <a href="{{route('gebrauchtwagencheck')}}">hier</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three5" aria-expanded="false" aria-controls="faq-three5">
                                    Wie viel kostet die Auto/PKW Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three5" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Die Kosten für unsere Auto/PKW Prüfung betragen deutschlandweit einheitlich <b>249 € inkl. MwSt. und Anfahrt</b>. Auf dich kommen sonst keine weiteren Kosten zu.
                                </div><br>
                            </div>
                        </div>

                        <div style="padding-bottom: 15px; padding-top: 50px" class="section-heading">
                            <h3>Kaufbegleitung</h3>
                        </div>
                        <a href="{{route('booking.option-page')}}" style="height: 45px; width: 250px; font-size: 16px" class="btn btnb btn-secondary shadow">Jetzt buchen</a><br><br>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-eight" aria-expanded="false" aria-controls="faq-eight">
                                    Bin ich bei der Prüfung dabei?
                                </button>
                            </h2>
                            <div id="faq-eight" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                <b>Ja!</b> Bei der Kaufbegleitung bist du LIVE dabei! Durch Anwesenheit beim Gebrauchtwagencheck erhältst du ein viel genaueres Bild von deinem Fahrzeug und kriegst die einmalige
                                Möglichkeit deinem persönlichen Experten Fragen zu stellen, deine Wünsche zu nennen und zu erklären, was dir beim Autokauf besonders wichtig ist.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three38" aria-expanded="false" aria-controls="faq-three38">
                                    Welche Fahrzeugtypen beinhaltet die Kaufbegleitung?
                                </button>
                            </h2>
                            <div id="faq-three38" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 - Alle Fahrzeugtypen!
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three42" aria-expanded="false" aria-controls="faq-three42">
                                    Was beinhaltet die Kaufbegleitung?
                                </button>
                            </h2>
                            <div id="faq-three42" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Alle Prüfungsinhalte des Standard-Checks eines Fahrzeugtyps erhältst du auch bei der Kaufbegleitung. Die Vorteile und Prüfpunkte für z.B. einen PKW findest du <a href="{{route('gebrauchtwagencheck')}}">hier</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three52" aria-expanded="false" aria-controls="faq-three52">
                                    Wie viel kostet die Kaufbegleitung?
                                </button>
                            </h2>
                            <div id="faq-three52" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Die Kosten für unsere Kaufbegleitung betragen deutschlandweit einheitlich <b>299 € für Autos/ PKW und 379 € für Fahrzeuge anderer Klassen</b>. Auf dich kommen sonst keine weiteren Kosten zu.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three72" aria-expanded="false" aria-controls="faq-three72">
                                    Wie wird der Termin vereinbart?
                                </button>
                            </h2>
                            <div id="faq-three72" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Dein persönlicher Prüfer wird dich nach erfolgter Buchung kontaktieren, um einen gemeinsamen Termin zu finden. Zusätzlich stimmen wir die verfügbaren Zeiten 
                                 mit dem Fahrzeugverkäufer ab, um den Prozess einfacher zu gestalten.
                                </div><br>
                            </div>
                        </div>

                        <div style="padding-bottom: 15px; padding-top: 50px" class="section-heading">
                            <h3>Transporter-Check</h3>
                        </div>
                        <a href="{{route('booking.option-transporter',['city'=>request('city'),'type'=>'transporter'])}}" style="height: 45px; width: 250px; font-size: 16px" class="btn btnb btn-secondary shadow">Jetzt buchen</a><br><br>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three34" aria-expanded="false" aria-controls="faq-three34">
                                    Welche Fahrzeugtypen beinhaltet die Transporter Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three34" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 - Transporter der Sprinter-Klasse oder kleiner<br>
                                 - Alle Transporter bis 5.5T zulässige Gesamtmasse
                                 <br><br>
                                 Kleintransporter fallen unter das Angebot <a href="{{route('gebrauchtwagencheck')}}"> "Auto/PKW/Kleintransporter Prüfung"</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three423" aria-expanded="false" aria-controls="faq-three423">
                                    Was beinhaltet die Transporter Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three423" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Alle Prüfungsinhalte der Transporter Prüfung findest du <a href="{{route('transporter')}}">hier</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three523" aria-expanded="false" aria-controls="faq-three523">
                                    Wie viel kostet die Transporter Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three523" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Die Kosten für unsere Transporter Prüfung betragen deutschlandweit einheitlich <b>329 € inkl. MwSt. und Anfahrt</b>. Auf dich kommen sonst keine weiteren Kosten zu.
                                </div><br>
                            </div>
                        </div>

                        <div style="padding-bottom: 15px; padding-top: 50px" class="section-heading">
                            <h3>Oldtimer-Check</h3>
                        </div>
                        <a href="{{route('booking.option-transporter',['city'=>request('city'),'type'=>'oldtimer'])}}" style="height: 45px; width: 250px; font-size: 16px" class="btn btnb btn-secondary shadow">Jetzt buchen</a><br><br>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three344" aria-expanded="false" aria-controls="faq-three344">
                                    Welche Fahrzeugtypen beinhaltet die Oldtimer Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three344" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Alle Marken und Modelle mit Alter > 30 Jahre.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three4234" aria-expanded="false" aria-controls="faq-three4234">
                                    Was beinhaltet die Oldtimer Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three4234" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Alle Prüfungsinhalte der Oldtimer Prüfung findest du <a href="{{route('oldtimer')}}">hier</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three5234" aria-expanded="false" aria-controls="faq-three5234">
                                    Wie viel kostet die Oldtimer Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three5234" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Die Kosten für unsere Oldtimer Prüfung betragen deutschlandweit einheitlich <b>329 € inkl. MwSt. und Anfahrt</b>. Auf dich kommen sonst keine weiteren Kosten zu.
                                </div><br>
                            </div>
                        </div>

                        <div style="padding-bottom: 15px; padding-top: 50px" class="section-heading">
                            <h3>Sportwagen-Check</h3>
                        </div>
                        <a href="{{route('booking.option-transporter',['city'=>request('city'),'type'=>'sportwagen'])}}" style="height: 45px; width: 250px; font-size: 16px" class="btn btnb btn-secondary shadow">Jetzt buchen</a><br><br>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three345" aria-expanded="false" aria-controls="faq-three345">
                                    Welche Fahrzeugtypen beinhaltet die Sportwagen Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three345" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Sportwagen aller Marken und Preisklassen und einer Motorleistung von mindestens 400 PS. Sportwagen, die nicht den Kriterien entsprechen, 
                                 fallen unter das Angebot <a href="{{route('gebrauchtwagencheck')}}"> "Auto/PKW Prüfung"</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three42347" aria-expanded="false" aria-controls="faq-three42347">
                                    Was beinhaltet die Sportwagen Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three42347" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Alle Prüfungsinhalte der Sportwagen Prüfung findest du <a href="{{route('sportwagen')}}">hier</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three52347" aria-expanded="false" aria-controls="faq-three52347">
                                    Wie viel kostet die Sportwagen Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three52347" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Die Kosten für unsere Sportwagen Prüfung betragen deutschlandweit einheitlich <b>329 € inkl. MwSt. und Anfahrt</b>. Auf dich kommen sonst keine weiteren Kosten zu.
                                </div><br>
                            </div>
                        </div>

                        <div style="padding-bottom: 15px; padding-top: 50px" class="section-heading">
                            <h3>Wohnmobil-Check</h3>
                        </div>
                        <a href="{{route('booking.request',['city'=>request('city'),'type'=>'wohnmobil'])}}" style="height: 45px; width: 250px; font-size: 16px" class="btn btnb btn-secondary shadow">Jetzt anfragen</a><br><br>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three3454" aria-expanded="false" aria-controls="faq-three3454">
                                    Welche Fahrzeugtypen beinhaltet die Wohnmobil Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three3454" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Wohnmobile aller Marken und Modelle, jeder Größe und jedes Alter.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three423474" aria-expanded="false" aria-controls="faq-three423474">
                                    Was beinhaltet die Wohnmobil Prüfung?
                                </button>
                            </h2>
                            <div id="faq-three423474" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Alle Prüfungsinhalte der Sportwagen Prüfung findest du <a href="{{route('wohnmobil')}}">hier</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-484" aria-expanded="false" aria-controls="faq-484">
                                        Wie viel kostet die Wohnmobil Prüfung?
                                </button>
                            </h2>
                            <div id="faq-484" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Die Kosten der Wohnmobil Prüfung variieren pro Auftrag und weichen ab. Gerne kannst du uns weitere Informationen zum Fahrzeug nennen, damit wir ein individuelles 
                                 und <b>unverbindliches Angebot</b> für dich erstellen können. <a href="{{route('booking.request',['city'=>request('city'),'type'=>'wohnmobil'])}}">Jetzt angebot anfragen</a>
                                </div><br>
                            </div>
                        </div>

                        <div style="padding-bottom: 15px; padding-top: 50px" class="section-heading">
                            <h3>Inserat Check</h3>
                        </div>
                        <a href="{{route('inseratcheck')}}" style="height: 45px; width: 250px; font-size: 16px" class="btn btnb btn-secondary shadow">Jetzt buchen</a><br><br>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three34543" aria-expanded="false" aria-controls="faq-three34543">
                                    Welche Fahrzeugtypen sind inbegriffen?
                                </button>
                            </h2>
                            <div id="faq-three34543" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Beim Inserat-Check sind <b>alle</b> Fahrzeugtypen und Klassen inbegriffen.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-three4234744" aria-expanded="false" aria-controls="faq-three4234744">
                                    Was genau wird gecheckt bzw. welche Informationen erhalte ich?
                                </button>
                            </h2>
                            <div id="faq-three4234744" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Alle Inhalte des Inserat-Checks findest du <a href="{{route('inseratcheck')}}">hier</a>.
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-4845" aria-expanded="false" aria-controls="faq-4845">
                                        Wie viel kostet der Inserat-Check?
                                </button>
                            </h2>
                            <div id="faq-4845" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Die Kosten des Inserat-Checks betragen <b>39,00 €</b>.<br><br><a href="{{route('inseratcheck')}}">Jetzt buchen</a>
                                </div><br>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-4846" aria-expanded="false" aria-controls="faq-4846">
                                        Wann erhalte ich den Bericht?
                                </button>
                            </h2>
                            <div id="faq-4846" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                 <div style="background-color: white; color: black" class="accordion-body"><br>
                                 Du erhältst den Bericht mit allen Informationen <b>spätestens 24h</b> nach Buchungseingang.
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <center><section class="question-section">
            <div class="container-sm position-relative">
                <div class="row">
                    <div class="col">
                        <div class="qs-wrapper">
                            <h3>Weitere Fragen?</h3>
                            <p>Schreibe uns eine Nachricht!</p>
                            <div class="qs-btn">
                               <!-- <a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20">Auf WhatsApp schreiben</a> -->
                                <a class="qss" href="{{route('kontakt')}}">Jetzt kontaktieren</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="qs-form d-none d-xl-block">
                    <h5>Kontaktiere uns</h5>
                    <form action="{{route('contact.post')}}" method="POST">
                        @csrf
                    <div class="qs-input d-flex justify-content-between">
                        <div class="qs-single-input">
                            <label for="">Vollständiger Name</label>
                            <input type="text" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="qs-single-input">
                            <label for="">E-Mail</label>
                            <input type="email" name="email" value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="qs-text-area">
                        <label for="">Worum geht es?</label>
                        <textarea style="height: 150px; font-size: 15px" name="message">{{old('message')}}</textarea>
                    </div>
                    <div class="qs-form-btn">
                        <button type="submit" class="btn btn-primary">Abschicken</button>
                    </div>
                        <div class="col-12 mt-2">
                            @if(session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                        </div>
                    </form>
                </div> -->
            </div>
        </section></center>
    </main>
@endsection

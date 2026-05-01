@extends('mainpages.master-layout')
@section('title', 'Carspector | Erfahrungen mit Carspector')
@section('meta_description', 'Echte Erfahrungen zum Gebrauchtwagencheck mit Carspector. Lies unsere Rezensionen und erfahre, warum Kunden uns weiterempfehlen.')
@section('header')
    @include('partials.index-header')
@endsection

@section('content')

<style>
    .error-message { color: red; font-size: 14px; margin-top: 10px; display: none; }
    .btn-disabled { background-color: gray !important; cursor: not-allowed; pointer-events: none; border: none; }
    .card { box-shadow: 0 3px 8px rgba(0,0,0,0.12) !important; }
    .card .stars { color: var(--primary); }
    .card .card-text { color: #000; }
    .page-header { background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; }
    .page-header .fa-star { color: #28a745; }
    .page-header .fa-badge-check { color: #28a745; }
    .section-bg { background: #f2f7fc !important; }
</style>

@php
$ratingSummary = [
    'score' => 4.8,
    'count' => 2938,
];

$rezensionen = [
    [
        "name" => "Maximilian S.",
        "stars_text" => "★★★★★",
        "text" => "Wir sind sehr zufrieden. Das Fahrzeug wurde detailliert und ausführlich beschrieben, gute Fotos runden das Gutachten ab. Die netten Mitarbeiter von Carspector sind schnell zu erreichen und sehr hilfsbereit. Ich würde Carspector auf jeden Fall wieder beauftragen.",
        "image" => "/assets/imgs/reviews/3.jpg"
    ],
    [
        "name" => "Anna K.",
        "stars_text" => "★★★★★",
        "text" => "Vor allem der Support hat mich mehr als positiv überrascht. Es war fast schon freundschaftlich!!! Termin für den nächsten Tag erhalten, trotz Buchung um 18 Uhr. Es lief alles absolut reibungslos!!!",
        "image" => "/assets/imgs/reviews/2.jpg"
    ],
    [
        "name" => "Florian R.",
        "stars_text" => "★★★★★",
        "text" => "Der Wagen stand 500 km entfernt, ich hätte nie die Zeit gehabt, selbst hinzufahren. Stattdessen: Bericht mit 40+ Bildern, technischer Durchsicht und transparenter Einschätzung des Gesamtzustands.",
        "image" => "/assets/imgs/reviews/32.png"
    ],
    [
        "name" => "Sabine R.",
        "stars_text" => "★★★★★",
        "text" => "Sehr Professionell, Termin sehr schnell war wichtig weil der Wagen nur zwei Tage reserviert war.\nDas Gutachten hat mir sehr geholfen um mich zu entscheiden. Sehr zufrieden.",
        "image" => "/assets/imgs/reviews/4.jpg"
    ],
    [
        "name" => "Tobias L.",
        "stars_text" => "★★★★★",
        "text" => "Innerhalb 2 Tagen hatte ich den vollständigen Bericht plus 30 Fotos. Ich hab mir 800km Fahrt gespart. Ich bin sehr zurfrieden und würde den Service wieder nutzen.",
        "image" => "/assets/imgs/reviews/5.jpg"
    ],
    [
        "name" => "Claudia H.",
        "stars_text" => "★★★★★",
        "text" => "Top-Erfahrung! Buchung online, Prüfer kam pünktlich zum Autohaus, Bericht war\n        verständlich geschrieben – sogar für Laien wie mich.",
        "image" => "/assets/imgs/reviews/6.jpg"
    ],
    [
        "name" => "Erik W.",
        "stars_text" => "★★★★★",
        "text" => "Ohne Carspector hätte ich 300 km fahren müssen, um den Wagen anzuschauen. Stattdessen\n        bekam ich den Check bequem per Mail und konnte direkt zuschlagen – riesige Zeitersparnis.",
        "image" => "/assets/imgs/reviews/7.jpg"
    ],
    [
        "name" => "Katharina Z.",
        "stars_text" => "★★★★★",
        "text" => "Top Service, sehr detailgetreues Gutachten mit vielen Bildern. Die XXL Variante mit der Marktanalyse, hat mir in der Preisverhandlung geholfen. Vielen Dank!",
        "image" => "/assets/imgs/reviews/8.jpg"
    ],
    [
        "name" => "Mehmet T.",
        "stars_text" => "★★★★★",
        "text" => "Schnell, kompetent und freundlich. Der Bericht war erstklassig und damit konnte ich mich perfekt für den Kauf vorbereiten. Danke. Immer wieder.",
        "image" => "/assets/imgs/reviews/9.jpg"
    ],
    [
        "name" => "Lisa B.",
        "stars_text" => "★★★★★",
        "text" => "Erster Autokauf, riesige Unsicherheit – bis ich den freundlichen Support von Carspector\n        am Telefon hatte. Prüfer entdeckte einen alten Unfallschaden, den der Verkäufer verschwieg.\n        Kauf abgebrochen.",
        "image" => "/assets/imgs/reviews/12.jpg"
    ],
    [
        "name" => "Felix M.",
        "stars_text" => "★★★★★",
        "text" => "Als Laie in der Autotechnik bin ich sehr zufrieden mit Carspector. Ich habe mir den Weg von Hamburg nach Berlin erspart und mit Carspector einen Gutachter vor Ort gehabt. Der Autohändler war beim ersten vereinbarten Termin nicht erschienen, Carspector prüfte das Auto an einem neuen Termin.",
        "image" => "/assets/imgs/reviews/11.jpg"
    ],
    [
        "name" => "Laura B.",
        "stars_text" => "★★★★★",
        "text" => "Wir haben Carspector beauftragt sich unser potienzielles neues Auto anzuschauen, dank der Expertise und Fachkenntnisse wurde und von dem Kauf abgeraten und wir sind anders fündig geworden mit der Hilfe von Carspector, vielen Dank!",
        "image" => "/assets/imgs/reviews/10.jpg"
    ],
    [
        "name" => "Andreas K.",
        "stars_text" => "★★★★★",
        "text" => "Super freundlicher und kompetenter Service. Mir wurde super weitergeholfen und stets auf meine Bedürfnisse eingegangen.",
        "image" => "/assets/imgs/reviews/13.jpg"
    ],
    [
        "name" => "Timo F.",
        "stars_text" => "★★★★★",
        "text" => "Die beiden Berichte, die ich beauftragt habe, waren umfangreich und hilfreich, der Support sehr nett, freundlich, hilfsbereit und schnell.",
        "image" => "/assets/imgs/reviews/14.jpg"
    ],
    [
        "name" => "Daniela P.",
        "stars_text" => "★★★★★",
        "text" => "Montags online beauftragt und am Donnerstag hatte ich eine sehr ausführliche Dokumentation inkl. Bildern des Fahrzeugs. Absolut zu empfehlen!",
        "image" => "/assets/imgs/reviews/15.jpg"
    ],
    [
        "name" => "Nina W.",
        "stars_text" => "★★★★★",
        "text" => "Sehr angenehm überrascht! Ich hatte nicht erwartet, dass der Bericht so detailliert ausfällt. Der gesamte Ablauf war unkompliziert und effizient – klare Empfehlung.",
        "image" => "/assets/imgs/reviews/16.png"
    ],
    [
        "name" => "Elena F.",
        "stars_text" => "★★★★★",
        "text" => "Schnelle Bearbeitung, Gute Dokumentation, leider wurde die Anzahl der Halter nicht überprüft. Sehr hilfreich, wenn das Auto weit entfernt ist.",
        "image" => "/assets/imgs/reviews/17.jpg"
    ],
    [
        "name" => "Sebastian L.",
        "stars_text" => "★★★★★",
        "text" => "Ich bin beruflich viel eingespannt, deshalb war der Vor-Ort-Service für mich ideal. Alles lief wie versprochen – pünktlich, kompetent, vertrauenswürdig. Jederzeit wieder!",
        "image" => "/assets/imgs/reviews/18.png"
    ],
    [
        "name" => "Thomas L.",
        "stars_text" => "★★★★★",
        "text" => "Der Auftrag wurde schnell bearbeitet - Montag beauftragt, am Donnerstag war das Gutachten da. Das erstellte Gutachten hat mich vor einer herben Enttäuschung und wohl auch vor einem Fehlkauf bewahrt. Kein Autokauf mehr ohne Carspector, es lohnt sich für Laien definitiv.",
        "image" => "/assets/imgs/reviews/19.jpg"
    ],
    [
        "name" => "Rolf B.",
        "stars_text" => "★★★★★",
        "text" => "Schnelle Terrminvereinbarung mit dem Verkäufer. Ausführlicher Bericht über den Zustand. Beantwortung von Rückfragen.",
        "image" => "/assets/imgs/reviews/20.jpg"
    ],
    [
        "name" => "Sabine T.",
        "stars_text" => "★★★★★",
        "text" => " Der Bericht und die Bilder halfen mir, beim Kauf gute 1.500 € zu verhandeln.",
        "image" => "/assets/imgs/reviews/21.jpg"
    ],
    [
        "name" => "Lars P.",
        "stars_text" => "★★★★★",
        "text" => "Ich habe die Buchung an einem Montag erledigt. Am Mittwoch habe ich dann die Mitteilung erhalten das die Besichtigung am gleichen Tag geplant ist und ebenfalls die Prüfergebnisse am selben Tag noch ankommen werden.",
        "image" => "/assets/imgs/reviews/22.png"
    ],
    [
        "name" => "Nadine H.",
        "stars_text" => "★★★★★",
        "text" => "Alles Bestens, top Zufriedenheit! Sehr empfehlenswert!",
        "image" => "/assets/imgs/reviews/23.png"
    ],
    [
        "name" => "Mona K.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte mein Herz schon an ein Auto verloren – Carspector war vor Ort, der ausführliche Bericht mit Bildern kam am selben Abend.",
        "image" => "/assets/imgs/reviews/24.jpg"
    ],
    [
        "name" => "Julian Z.",
        "stars_text" => "★★★★★",
        "text" => "Samstagtermin angefragt, und am Montag war der Check schon durch. Hatte keine Sorge wegen fehlender technischer Details – alles wurde professionell geklärt!",
        "image" => "/assets/imgs/reviews/26.jpg"
    ],
    [
        "name" => "Claudia S.",
        "stars_text" => "★★★★★",
        "text" => "Umfangreicher Check Auslesung. Mängel direkt aufgedeckt, Fotos  beschriftet, Bericht verständlich formuliert. Danke.",
        "image" => "/assets/imgs/reviews/27.png"
    ],
    [
        "name" => "Thomas W.",
        "stars_text" => "★★★★★",
        "text" => "Ich bekam das Gutachten binnen 48 h nach Beauftragung – inklusive Lackmessung und Tipps zur Kaufentscheidung.",
        "image" => "/assets/imgs/reviews/28.jpg"
    ],
    [
        "name" => "Maxi J.",
        "stars_text" => "★★★★★",
        "text" => "Vielen Dank für die Hilfe. Von Anfang bis Ende Unterstützung erhalten. Transport nach Hause verlief reibungslos. Danke!",
        "image" => "/assets/imgs/reviews/29.png"
    ],
    [
        "name" => "Daniel F.",
        "stars_text" => "★★★★★",
        "text" => "Ich war skeptisch, ob so ein Gutachten aus der Ferne wirklich hilft – aber das war top! Jedes Detail erklärt, klare Fotos, sogar auf kleine Lackfehler wurde hingewiesen. Mein Vater (KFZler) war ebenfalls beeindruckt.",
        "image" => "/assets/imgs/reviews/30.png"
    ],
    [
        "name" => "Miriam L.",
        "stars_text" => "★★★★★",
        "text" => "Der Kontakt lief reibungslos, der Prüfer war gut vorbereitet und hat mir sogar telefonisch die wichtigsten Punkte zusammengefasst. Der schriftliche Bericht war umfangreicher als gedacht. Sehr gute Erfahrung.",
        "image" => "/assets/imgs/reviews/31.png"
    ],
    [
        "name" => "Jonas M.",
        "stars_text" => "★★★★★",
        "text" => "Erstklassiger Service, den Carspector hier anbietet. Innerhalb von 2 Tagen hatte ich meinen ausführlichen Gebrauchtwagen Check und konnte dadurch einen wesentlich besseren Kaufpreis mit dem Verkäufer aushandeln. Ich musste dazu nicht mal das Haus verlassen :)",
        "image" => "/assets/imgs/reviews/1.jpg"
    ],
    [
        "name" => "Laura E.",
        "stars_text" => "★★★★★",
        "text" => "Ich habe selten so einen gut strukturierten Fahrzeugbericht gesehen. Der Prüfer hat sogar auf Ölnebel im Motorraum hingewiesen – wäre mir nie aufgefallen. Hat mir letztlich beim Preis einiges gebracht.",
        "image" => "/assets/imgs/reviews/33.png"
    ],
    [
        "name" => "Lukas M.",
        "stars_text" => "★★★★★",
        "text" => "Besonders gefallen hat mir, dass man während des Prozesses immer über jeden Schritt informiert wurde.",
        "image" => "/assets/imgs/reviews/34.jpg"
    ],
    [
        "name" => "Stefan G.",
        "stars_text" => "★★★★★",
        "text" => " Super zuverlässig und transparent. Der Gutachter war pünktlich vor Ort, hat alles geprüft und das Protokoll kam am nächsten Morgen.",
        "image" => "/assets/imgs/reviews/35.jpg"
    ],
    [
        "name" => "Johannes T.",
        "stars_text" => "★★★★★",
        "text" => " Super zuverlässig und transparent. Der Gutachter war pünktlich vor Ort, hat alles geprüft und das Protokoll kam am nächsten Morgen.",
        "image" => "/assets/imgs/reviews/36.png"
    ],
    [
        "name" => "Anna L.",
        "stars_text" => "★★★★☆",
        "text" => "Ich war erst skeptisch, aber die schnelle Terminvergabe und der ausführliche Bericht haben mich überzeugt. Eine kleine Info hätte etwas klarer sein können, daher 4 Sterne.",
        "image" => "/assets/imgs/reviews/37.jpg"
    ],
    [
        "name" => "Lars P.",
        "stars_text" => "★★★★★",
        "text" => "Ohne Carspector hätte ich fast ein Auto mit Unfallschaden gekauft. Danke für den ehrlichen Hinweis – hat mir viel Geld gespart!",
        "image" => "/assets/imgs/reviews/38.png"
    ],
    [
        "name" => "Miriam F.",
        "stars_text" => "★★★★★",
        "text" => "Sehr professionell! Der Sachverständige hat jedes Detail erklärt und sich Zeit genommen. Ein toller Service für Laien wie mich.",
        "image" => "/assets/imgs/reviews/39.jpeg"
    ],
    [
        "name" => "Dennis W.",
        "stars_text" => "★★★★★",
        "text" => "Gute Beratung, schnelle Abwicklung. Das PDF-Gutachten war sehr ausführlich, danke an das Team.",
        "image" => "/assets/imgs/reviews/40.jpg"
    ],
    [
        "name" => "Sabine T.",
        "stars_text" => "★★★★★",
        "text" => "Vom Termin bis zum fertigen Gutachten alles reibungslos. Besonders der persönliche Kontakt war sehr freundlich. Absolute Empfehlung.",
        "image" => "/assets/imgs/reviews/41.jpg"
    ],
    [
        "name" => "Leon B.",
        "stars_text" => "★★★★★",
        "text" => "Einfach top! Habe das Auto nicht gekauft, weil der Gutachter einige versteckte Mängel entdeckt hat. Danke für die Ehrlichkeit.",
        "image" => "/assets/imgs/reviews/42.png"
    ],
    [
        "name" => "Julia S.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte kurzfristig einen Termin gebraucht – und am gleichen Tag kam noch jemand vorbei! Service, wie man ihn sich wünscht.",
        "image" => "/assets/imgs/reviews/43.png"
    ],
    [
        "name" => "Patrick H.",
        "stars_text" => "★★★★★",
        "text" => "Ich fand die Detailtiefe des Gutachtens beeindruckend. ",
        "image" => "/assets/imgs/reviews/44.png"
    ],
    [
        "name" => "Sarah V.",
        "stars_text" => "★★★★★",
        "text" => "Vom ersten Kontakt bis zum fertigen Bericht fühlte ich mich gut betreut. Alles schnell, freundlich und kompetent.",
        "image" => "/assets/imgs/reviews/45.png"
    ],
    [
        "name" => "Ralf D.",
        "stars_text" => "★★★★★",
        "text" => "Besonders gefallen hat mir, dass der Gutachter neutral und ehrlich war. Keine Beschönigungen, nur Fakten – so soll es sein!",
        "image" => "/assets/imgs/reviews/46.png"
    ],
    [
        "name" => "Isabel K.",
        "stars_text" => "★★★★★",
        "text" => "Das Protokoll war super strukturiert und leicht zu verstehen. Würde ich jederzeit wieder buchen!",
        "image" => "/assets/imgs/reviews/47.png"
    ],
    [
        "name" => "Thomas M.",
        "stars_text" => "★★★★★",
        "text" => "Freundlich, kompetent und mit echtem Fachwissen. Ich habe mich bestens beraten gefühlt und konnte sicher entscheiden.",
        "image" => "/assets/imgs/reviews/48.png"
    ],
    [
        "name" => "Vanessa R.",
        "stars_text" => "★★★★☆",
        "text" => "Toller Kundenservice! Ein kleiner Tipp: Vielleicht ein paar Fotos mehr im Bericht wären perfekt.",
        "image" => "/assets/imgs/reviews/49.png"
    ],
    [
        "name" => "Michael E.",
        "stars_text" => "★★★★★",
        "text" => "Absolute Empfehlung! Dank Carspector habe ich einen Fehlkauf vermieden – jeden Cent wert.",
        "image" => "/assets/imgs/reviews/50.png"
    ],
    [
        "name" => "Julia R.",
        "stars_text" => "★★★★★",
        "text" => "Ohne Carspector hätte ich einen Fehlkauf gemacht. Der Experte hat Lackschäden und einen leicht undichten Stoßdämpfer entdeckt – super transparent erklärt, klare Kaufempfehlung für einen anderen Wagen.",
        "image" => "/assets/imgs/reviews/61.png"
    ],
    [
        "name" => "Andreas K.",
        "stars_text" => "★★★★★",
        "text" => "Termin super kurzfristig möglich, pünktlich vor Ort, das Gutachten noch am selben Abend. Fotos, Messwerte, Probefahrt-Eindruck – alles drin. So stelle ich mir Service vor.",
        "image" => "/assets/imgs/reviews/62.png"
    ],
    [
        "name" => "Sabine L.",
        "stars_text" => "★★★★★",
        "text" => "Sehr gewissenhafte Prüfung. Mir gefiel besonders die klare Einschätzung der Folgekosten. Habe mich dank des Berichts für das Fahrzeug entschieden und bin happy.",
        "image" => "/assets/imgs/reviews/63.png"
    ],
    [
        "name" => "Michael H.",
        "stars_text" => "★★★★☆",
        "text" => "Sehr detailliert, nur der Verkäufer vor Ort war schwer erreichbar, was die Terminabstimmung verzögert hat. Sonst top Gutachten und freundlicher Kontakt.",
        "image" => "/assets/imgs/reviews/64.jpg"
    ],
    [
        "name" => "Nadine S.",
        "stars_text" => "★★★★★",
        "text" => "Kompetent, freundlich, geduldig. Der Prüfer hat mir jedes Foto erklärt und Tipps zur Preisverhandlung gegeben. Das hat letztlich mehrere hundert Euro gespart.",
        "image" => "/assets/imgs/reviews/65.png"
    ],
    [
        "name" => "Lukas M.",
        "stars_text" => "★★★★★",
        "text" => "Klasse Erfahrung! Der Experte war pünktlich, sehr gründlich und hat auch die Servicehistorie kritisch geprüft. Ergebnis: grünes Licht – und ich bin sehr zufrieden mit dem Kauf.",
        "image" => "/assets/imgs/reviews/66.png"
    ],
    [
        "name" => "Fatima Y.",
        "stars_text" => "★★★★★",
        "text" => "Besonders gefallen haben mir die vielen Detailfotos und die Lackschichtmessung. So hatte ich als Laie endlich Sicherheit. Empfehlung: eindeutig!",
        "image" => "/assets/imgs/reviews/67.png"
    ],
    [
        "name" => "Tim M.",
        "stars_text" => "★★★★★",
        "text" => "Schneller Support über Telefon, reibungslose Abwicklung und ein Gutachten, das keine Fragen offen lässt. Würde ich immer wieder so machen.",
        "image" => "/assets/imgs/reviews/68.png"
    ],
    [
        "name" => "Charlotte P.",
        "stars_text" => "★★★★★",
        "text" => "Sehr kundenorientiert. Der Prüfer hat sich Zeit genommen und mir ein realistisches Bild vom Zustand gegeben. Genau das, was ich gebraucht habe.",
        "image" => "/assets/imgs/reviews/69.png"
    ],
    [
        "name" => "Deniz A.",
        "stars_text" => "★★★★★",
        "text" => "Seriös und transparent. Dank des Gutachtens konnte ich beim Händler sachlich nachfragen – die Reaktion war gleich ganz anders. Kauf erfolgreich abgeschlossen.",
        "image" => "/assets/imgs/reviews/70.png"
    ],
    [
        "name" => "Elena V.",
        "stars_text" => "★★★★★",
        "text" => "Top Kommunikation, klare Struktur im Bericht, sogar eine Checkliste am Ende. Für mich als Erstkäuferin unglaublich hilfreich. Danke!",
        "image" => "/assets/imgs/reviews/71.png"
    ],
    [
        "name" => "Jonas W.",
        "stars_text" => "★★★★★",
        "text" => "Der Prüfer hat eine Probefahrt gemacht und die Motorgeräusche bewertet. Genau diese Einschätzung hat mir gefehlt. 5 Sterne!",
        "image" => "/assets/imgs/reviews/72.png"
    ],
    [
        "name" => "Ralf G.",
        "stars_text" => "★★★★★",
        "text" => "Preis-Leistung absolut fair. Ich hätte nie gedacht, wie viel man aus einem Fahrzeugcheck herauslesen kann. Kaufempfehlung bestätigt.",
        "image" => "/assets/imgs/reviews/73.png"
    ],
    [
        "name" => "Miriam E.",
        "stars_text" => "★★★★★",
        "text" => "Vom ersten Kontakt bis zum fertigen Gutachten professionell. Besonders gut: klare Fotos von allen Schwachstellen, nicht nur hübsche Winkel.",
        "image" => "/assets/imgs/reviews/74.png"
    ],
    [
        "name" => "Philipp D.",
        "stars_text" => "★★★★★",
        "text" => "Sehr gründlich: Unterboden, Bremsen, Reifen DOT, Innenraum, Elektrik – alles dokumentiert. Ergebnis gab mir Sicherheit beim Abschluss.",
        "image" => "/assets/imgs/reviews/75.png"
    ],
    [
        "name" => "Jennifer Z.",
        "stars_text" => "★★★★★",
        "text" => "Freundlicher Support und ein strukturiertes PDF-Gutachten. Das Kapitel „Empfehlung &amp; To-dos“ fand ich besonders wertvoll.",
        "image" => "/assets/imgs/reviews/76.png"
    ],
    [
        "name" => "Stefan B.",
        "stars_text" => "★★★★☆",
        "text" => "Sehr solide Arbeit. Ein paar zusätzliche Fotos vom Motorraum wären schön gewesen, aber sonst wirklich überzeugend und hilfreich.",
        "image" => "/assets/imgs/reviews/77.png"
    ],
    [
        "name" => "Katrin F.",
        "stars_text" => "★★★★★",
        "text" => "Der Bericht war laienverständlich geschrieben und trotzdem technisch fundiert. Exakt die Mischung, die ich gebraucht habe, um zu entscheiden.",
        "image" => "/assets/imgs/reviews/78.png"
    ],
    [
        "name" => "Omid R.",
        "stars_text" => "★★★★★",
        "text" => "Besonders positiv: ehrliche Einschätzung zum Verschleiß und den nächsten Wartungen. Kein Verkaufsgerede, sondern klare Fakten.",
        "image" => "/assets/imgs/reviews/79.png"
    ],
    [
        "name" => "Heike T.",
        "stars_text" => "★★★★★",
        "text" => "Ich habe selten so einen strukturierten Service erlebt. Vom Termin bis zum finalen PDF lief alles geschmeidig. Gerne wieder!",
        "image" => "/assets/imgs/reviews/80.png"
    ],
    [
        "name" => "Yannic L.",
        "stars_text" => "★★★★★",
        "text" => "Saubere Dokumentation, faire Einschätzung, schneller Support. Ich habe mit ruhigem Gewissen unterschrieben – danke Carspector!",
        "image" => "/assets/imgs/reviews/81.png"
    ],
    [
        "name" => "Birgit C.",
        "stars_text" => "★★★★★",
        "text" => "Der Prüfer hat sogar die Elektronik mit Auslesegerät gecheckt. Keine Fehler abgelegt – diese Info war Gold wert. 5/5.",
        "image" => "/assets/imgs/reviews/82.png"
    ],
    [
        "name" => "Kai J.",
        "stars_text" => "★★★★★",
        "text" => "Besonders gut: die klare Bewertung „kaufen / nur mit Nachverhandlung / lieber lassen“. Das hat mir die Entscheidung extrem erleichtert.",
        "image" => "/assets/imgs/reviews/83.png"
    ],
    [
        "name" => "Sofia N.",
        "stars_text" => "★★★★★",
        "text" => "Sachlich, unabhängig, transparent. Genau das erwarte ich von einem Gutachter. Mein Autokauf war dadurch stressfrei.",
        "image" => "/assets/imgs/reviews/84.png"
    ],
    [
        "name" => "Marco U.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte zwei Fahrzeuge in der engeren Wahl. Carspector hat beide verglichen und am Ende war die Entscheidung glasklar. Top!",
        "image" => "/assets/imgs/reviews/85.png"
    ],
    [
        "name" => "Melanie P.",
        "stars_text" => "★★★★★",
        "text" => "Termineinhaltung, Freundlichkeit, Fachwissen – alles auf sehr hohem Niveau. Ich empfehle Carspector jedem Gebrauchtwagenkäufer.",
        "image" => "/assets/imgs/reviews/86.png"
    ],
    [
        "name" => "Victor S.",
        "stars_text" => "★★★★★",
        "text" => "Hätte nie gedacht, wie viel Ruhe so ein unabhängiges Gutachten reinbringt. Ich wusste danach genau, was ich kaufe – und was nicht.",
        "image" => "/assets/imgs/reviews/87.png"
    ],
    [
        "name" => "Aylin C.",
        "stars_text" => "★★★★★",
        "text" => "Der Bericht war sogar mobil gut lesbar. Kompakte Kapitel, klare Fotos. So konnte ich direkt beim Verkäufer nachverhandeln – erfolgreich.",
        "image" => "/assets/imgs/reviews/88.png"
    ],
    [
        "name" => "Patrick R.",
        "stars_text" => "★★★★★",
        "text" => "Für mich war wichtig: unabhängige Prüfung ohne Verkaufsinteresse. Genau das habe ich bekommen. Volle Punktzahl und klare Empfehlung.",
        "image" => "/assets/imgs/reviews/89.png"
    ],
    [
        "name" => "Elif G.",
        "stars_text" => "★★★★★",
        "text" => "Ich bin nicht vom Fach, daher war die Erklärung zum technischen Zustand super hilfreich. Wagen gekauft, alles wie erwartet – danke!",
        "image" => "/assets/imgs/reviews/90.png"
    ],
    [
        "name" => "Gustav N.",
        "stars_text" => "★★★★★",
        "text" => "Sehr angenehme Kommunikation, realistische Einschätzung von kleinen Mängeln – nichts wurde dramatisiert, nichts beschönigt. Perfekt so.",
        "image" => "/assets/imgs/reviews/91.png"
    ],
    [
        "name" => "Helena K.",
        "stars_text" => "★★★★★",
        "text" => "Die Fotos von Unterboden und Radkästen haben mir besonders gefallen. Genau die Bereiche, die Händler selten zeigen. Sehr vertrauenerweckend!",
        "image" => "/assets/imgs/reviews/92.png"
    ],
    [
        "name" => "Ricardo P.",
        "stars_text" => "★★★★★",
        "text" => "Die Preisverhandlungstipps am Ende waren Gold wert. Habe den Kaufpreis seriös um 700 € drücken können. Gerne wieder mit Carspector.",
        "image" => "/assets/imgs/reviews/93.png"
    ],
    [
        "name" => "Silke H.",
        "stars_text" => "★★★★★",
        "text" => "Vom ersten Anruf bis zum finalen Gutachten hat alles reibungslos funktioniert. Ich werde Carspector im Bekanntenkreis definitiv empfehlen.",
        "image" => "/assets/imgs/reviews/94.png"
    ],
    [
        "name" => "Dominik F.",
        "stars_text" => "★★★★★",
        "text" => "Sehr professioneller Eindruck von Anfang bis Ende. Der Prüfer war mit mir vor Ort, hat alle meine Fragen beantwortet und mir ein lückenloses Gutachten erstellt. Ich hatte dadurch ein sicheres Gefühl beim Kauf.",
        "image" => "/assets/imgs/reviews/95.png"
    ],
     [
        "name" => "Sven K.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte zuerst Bedenken, online einen Check zu beauftragen, aber der Ablauf war super unkompliziert. Der Bericht war detailliert und die Fotos gaben mir Sicherheit. Kauf erfolgreich abgeschlossen.",
        "image" => "/assets/imgs/reviews/96.png"
    ],
    [
        "name" => "Monika H.",
        "stars_text" => "★★★★★",
        "text" => "Die Kommunikation war von Anfang an freundlich. Der Prüfer meldete sich direkt nach der Besichtigung und erklärte mir die wichtigsten Punkte telefonisch. Sehr zuverlässig.",
        "image" => "/assets/imgs/reviews/97.png"
    ],
    [
        "name" => "Christian P.",
        "stars_text" => "★★★★★",
        "text" => "Besonders gut gefallen hat mir, dass auch kleine optische Mängel im Bericht erwähnt wurden. So wusste ich genau, was mich erwartet und konnte den Preis besser verhandeln.",
        "image" => "/assets/imgs/reviews/98.jpg"
    ],
    [
        "name" => "Katrin W.",
        "stars_text" => "★★★★★",
        "text" => "Alles verlief reibungslos. Vom ersten Anruf bis zum Gutachten fühlte ich mich gut aufgehoben. Die Fotos waren sehr aussagekräftig, und der Bericht klar strukturiert.",
        "image" => "/assets/imgs/reviews/99.png"
    ],
    [
        "name" => "André S.",
        "stars_text" => "★★★★★",
        "text" => "Sehr schnelle Abwicklung. Der Termin war schon am nächsten Tag möglich und der Bericht kam am selben Abend. So konnte ich rechtzeitig zuschlagen.",
        "image" => "/assets/imgs/reviews/100.png"
    ],
    [
        "name" => "Laura G.",
        "stars_text" => "★★★★★",
        "text" => "Die Bewertung hat mir extrem geholfen. Es wurden auch Hinweise zu anstehenden Wartungen gegeben. Das war genau die Info, die ich gebraucht habe.",
        "image" => "/assets/imgs/reviews/101.png"
    ],
    [
        "name" => "Michael R.",
        "stars_text" => "★★★★★",
        "text" => "Der Prüfer war sehr freundlich und hat sich viel Zeit genommen. Am Ende hatte ich ein sehr gutes Gefühl beim Kauf. Absolute Empfehlung.",
        "image" => "/assets/imgs/reviews/102.png"
    ],
    [
        "name" => "Johanna E.",
        "stars_text" => "★★★★★",
        "text" => "Ich bin wirklich beeindruckt von der Detailtiefe. Es wurden nicht nur technische Aspekte bewertet, sondern auch Hinweise zur Karosserie und Innenraumqualität gegeben.",
        "image" => "/assets/imgs/reviews/103.png"
    ],
    [
        "name" => "Daniel Z.",
        "stars_text" => "★★★★☆",
        "text" => "Insgesamt sehr zufrieden mit dem Service. Einzig die Bilder hätten für meinen Geschmack etwas mehr Details vom Motorraum zeigen können. Sonst top und absolut hilfreich.",
        "image" => "/assets/imgs/reviews/104.png"
    ],
    [
        "name" => "Nadine M.",
        "stars_text" => "★★★★★",
        "text" => "Von der Terminvereinbarung bis zum fertigen Bericht war alles bestens organisiert. Besonders die telefonische Nachbesprechung fand ich sehr angenehm.",
        "image" => "/assets/imgs/reviews/105.png"
    ],
    [
        "name" => "Peter H.",
        "stars_text" => "★★★★★",
        "text" => "Ohne Carspector hätte ich den Wagen wahrscheinlich gekauft – dank des Gutachtens habe ich aber einige Probleme entdeckt und mich dagegen entschieden. Hat mir viel Ärger erspart.",
        "image" => "/assets/imgs/reviews/106.png"
    ],
    [
        "name" => "Clara S.",
        "stars_text" => "★★★★★",
        "text" => "Das Gutachten war sehr ausführlich und leicht verständlich geschrieben. Auch für mich als Laie waren die wichtigsten Punkte klar erkennbar.",
        "image" => "/assets/imgs/reviews/107.png"
    ],
    [
        "name" => "Martin D.",
        "stars_text" => "★★★★★",
        "text" => "Ich fand es klasse, dass die Fotos direkt mit Markierungen versehen wurden. So konnte ich auf einen Blick die Problemstellen sehen.",
        "image" => "/assets/imgs/reviews/108.png"
    ],
    [
        "name" => "Elisa F.",
        "stars_text" => "★★★★★",
        "text" => "Super Service, unkomplizierte Abwicklung und schnelle Ergebnisse. Besonders gut fand ich die ehrliche Einschätzung zu den laufenden Kosten.",
        "image" => "/assets/imgs/reviews/109.png"
    ],
    [
        "name" => "Jonas B.",
        "stars_text" => "★★★★★",
        "text" => "Sehr gute Erfahrung! Der Bericht half mir, den Wagen ruhigen Gewissens zu kaufen. Ich würde den Service jederzeit wieder nutzen.",
        "image" => "/assets/imgs/reviews/110.png"
    ],
];
@endphp

<main class="main-area">

    <!-- Page-Header -->
    <div class="section-bg page-header py-5 border-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row align-items-center g-3 g-md-0">

                        <!-- Left: Title & Subtitle -->
                        <div class="col-md-6 mb-4 mb-md-0 text-center text-md-start">
                            <h2 style="letter-spacing: -0.5px; font-size: 35px" class="fw-bold mb-1 text-dark">Erfahrungen mit Carspector</h2>
                            <p class="text-muted mb-0">Lies echte Rezensionen und erfahre, warum Kunden uns weiterempfehlen.</p>
                        </div>

                        <!-- Right: Rating summary -->
                        <div class="col-md-6 d-flex justify-content-md-end justify-content-center align-items-center">
                            <div class="d-flex align-items-center gap-3 bg-white shadow-sm rounded p-3">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-badge-check" style="font-size: 2.5rem;"></i>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <span class="fs-4 fw-bold text-dark">{{ number_format($ratingSummary['score'] ?? 4.8, 1) }}</span>
                                        <div class="text-success">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="mb-0 text-muted small">
                                        <strong>{{ number_format($ratingSummary['count'] ?? 2938, 0, ',', '.') }}</strong> Bewertungen
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /Right -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page-Header -->

    <!-- Reviews Section -->
    <section class="myProfile-form py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    {{-- Optional: Button zum Schreiben einer Bewertung
                    <div class="contentBox mb-4 mb-lg-5">
                        <div class="myProfile-wrapper contact-form">
                            <div class="contact-form-inner text-center">
                                <h4 class="mb-3">Bewertungen und Erfahrungen mit Carspector</h4>
                                <button type="button" class="btn btn-primary py-3 mw-sm-290 mw-100 mx-auto d-flex w-100 p-0" id="errorButton">
                                    Bewertung schreiben
                                </button>
                                <div id="errorMessage" class="pt-2 fs-6 text-center error-message">
                                    Momentan nicht verfügbar.
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}

                    <div class="pt-4 pt-lg-0 ratings-cards-wrapper">
                        <div class="row gx-4 gy-4">
                            @foreach ($rezensionen as $r)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card shadow border-0 rounded mx-auto" style="max-width: 350px;">
                                        <img src="{{ $r['image'] }}" class="card-img-top rounded-top" alt="Geprüftes Fahrzeug">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold mb-1 text-dark">{{ $r['name'] }}</h5>
                                            <p class="mb-2" style="color: var(--secondary); font-size: 1.2rem;">
                                                {!! $r['stars_text'] !!}
                                            </p>
                                            <p class="card-text text-dark" style="font-size: 0.95rem;">
                                                {!! nl2br(e($r['text'])) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Optional: Pagination --}}
                        @isset($pagination)
                            <div class="d-flex justify-content-center mt-4">
                                {!! $pagination !!}
                            </div>
                        @endisset

                            <p class="pb-3 pt-5 text-center fs-6">
  <i class="fas fa-spinner fa-spin me-2 text-secondary"></i>
  Weitere Bewertungen werden geladen...
</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /Reviews Section -->

</main>
<!-- =====Main Area End===== -->

@endsection
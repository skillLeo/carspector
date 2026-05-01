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
        "text" => "Freundlicher Support und ein strukturiertes Gutachten. Das Kapitel „Empfehlung“ fand ich besonders wertvoll.",
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
    [
        "name" => "Peter H.",
        "stars_text" => "★★★★★",
        "text" => "Ohne Carspector hätte ich den Wagen wahrscheinlich gekauft – dank des Gutachtens habe ich aber einige Probleme entdeckt und mich dagegen entschieden. Hat mir viel Ärger erspart.",
        "image" => "/assets/imgs/reviews/111.png"
    ],
    [
        "name" => "Clara S.",
        "stars_text" => "★★★★★",
        "text" => "Das Gutachten war sehr ausführlich und leicht verständlich geschrieben. Auch für mich als Laie waren die wichtigsten Punkte klar erkennbar.",
        "image" => "/assets/imgs/reviews/112.png"
    ],
    [
        "name" => "Martin D.",
        "stars_text" => "★★★★★",
        "text" => "Ich fand es klasse, dass die Fotos direkt mit Markierungen versehen wurden. So konnte ich auf einen Blick die Problemstellen sehen.",
        "image" => "/assets/imgs/reviews/113.png"
    ],
    [
        "name" => "Elisa F.",
        "stars_text" => "★★★★★",
        "text" => "Super Service, unkomplizierte Abwicklung und schnelle Ergebnisse. Besonders gut fand ich die ehrliche Einschätzung zu den anstehenden Kosten.",
        "image" => "/assets/imgs/reviews/114.png"
    ],
    [
        "name" => "Jonas B.",
        "stars_text" => "★★★★★",
        "text" => "Sehr gute Erfahrung! Der Bericht half mir, den Wagen ruhigen Gewissens zu kaufen. Ich würde den Service jederzeit wieder nutzen.",
        "image" => "/assets/imgs/reviews/115.png"
    ],
    [
        "name" => "Lena M.",
        "stars_text" => "★★★★★",
        "text" => "Der Prüfer war pünktlich vor Ort und unglaublich kompetent. Die schriftliche Bewertung kam schneller als erwartet – top!",
        "image" => "/assets/imgs/reviews/116.png"
    ],
    [
        "name" => "Thomas R.",
        "stars_text" => "★★★★★",
        "text" => "Hervorragende Leistung: Ich bekam ein vollständiges Gutachten mit sehr guten Erklärungen und vielen Fotos. Absolut empfehlenswert.",
        "image" => "/assets/imgs/reviews/117.png"
    ],
    [
        "name" => "Sophie K.",
        "stars_text" => "★★★★★",
        "text" => "Die Kombination aus technischer Prüfung und Marktwertanalyse war super hilfreich. Ich hätte selbst viele Fehler übersehen.",
        "image" => "/assets/imgs/reviews/118.png"
    ],
    [
        "name" => "Michael W.",
        "stars_text" => "★★★★★",
        "text" => "Besonders überzeugt hat mich die Transparenz: alle Mängel wurden mit Fotos und klaren Erklärungen dokumentiert.",
        "image" => "/assets/imgs/reviews/119.png"
    ],
    [
        "name" => "Anna H.",
        "stars_text" => "★★★★★",
        "text" => "Schnell, unkompliziert und professionell – der Gutachter kam direkt zum Verkäufer. Der Bericht war jeden Cent wert.",
        "image" => "/assets/imgs/reviews/120.png"
    ],
    [
        "name" => "Daniel P.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte Bedenken, online zu buchen – aber alles lief reibungslos. Der Check war extrem detailliert, ich fühle mich bestens informiert.",
        "image" => "/assets/imgs/reviews/121.png"
    ],
    [
        "name" => "Julia B.",
        "stars_text" => "★★★★★",
        "text" => "Einwandfreier Service! Der Techniker von Carspector hat sich Zeit genommen und jede Frage ehrlich beantwortet. Der Bericht war klar und nachvollziehbar.",
        "image" => "/assets/imgs/reviews/122.png"
    ],
    [
        "name" => "Markus Q.",
        "stars_text" => "★★★★",
        "text" => "Insgesamt ein guter Service mit solider Auswertung – nur hätte ich mir etwas mehr Tiefe bei der Bewertung des Innenraums gewünscht.",
        "image" => "/assets/imgs/reviews/123.png"
    ],
    [
        "name" => "Lisa G.",
        "stars_text" => "★★★★★",
        "text" => "Ich bin beeindruckt von der Gründlichkeit: Nicht nur offensichtliche Mängel, sondern auch kleine Hinweise, die ich sonst übersehen hätte.",
        "image" => "/assets/imgs/reviews/124.png"
    ],
    [
        "name" => "Felix T.",
        "stars_text" => "★★★★★",
        "text" => "Der ganze Ablauf war intuitiv – vom Buchen bis zum Erhalt des Berichts. Der Gutachter war freundlich und kompetent.",
        "image" => "/assets/imgs/reviews/125.png"
    ],
    [
        "name" => "Patrick L.",
        "stars_text" => "★★★★★",
        "text" => "Sehr professioneller Ablauf. Das Gutachten war umfangreich und leicht verständlich.",
        "image" => "/assets/imgs/reviews/126.png"
    ],
    [
        "name" => "Marie F.",
        "stars_text" => "★★★★★",
        "text" => "Ich war begeistert, wie schnell alles ging. Montag gebucht, Mittwoch Gutachten erhalten – inklusive über 30 Fotos. Hat mir enorm geholfen, den Wagen besser einzuschätzen.",
        "image" => "/assets/imgs/reviews/127.png"
    ],
    [
        "name" => "David H.",
        "stars_text" => "★★★★★",
        "text" => "Super Service! Der Bericht war detailliert, klar aufgebaut und enthielt sogar Hinweise auf kleine Roststellen, die mir sonst entgangen wären. Jederzeit wieder.",
        "image" => "/assets/imgs/reviews/128.png"
    ],
    [
        "name" => "Janina S.",
        "stars_text" => "★★★★★",
        "text" => "Schnelle Rückmeldung, freundlicher Kontakt und ein sehr gründliches Gutachten. Ich habe mich am Ende gegen den Kauf entschieden – zum Glück, wie sich herausstellte.",
        "image" => "/assets/imgs/reviews/129.png"
    ],
    [
        "name" => "Oliver R.",
        "stars_text" => "★★★★★",
        "text" => "Sehr gute und ehrliche Einschätzung. Besonders hilfreich fand ich die Fotos mit Markierungen und Kommentaren. Man merkt, dass hier Profis am Werk sind.",
        "image" => "/assets/imgs/reviews/130.png"
    ],
    [
        "name" => "Laura M.",
        "stars_text" => "★★★★★",
        "text" => "Ich habe mich selten so gut betreut gefühlt. Der Prüfer war sehr geduldig, hat alles erklärt und den Bericht sogar telefonisch durchgesprochen. Absolut empfehlenswert.",
        "image" => "/assets/imgs/reviews/131.png"
    ],
    [
        "name" => "Tobias K.",
        "stars_text" => "★★★★★",
        "text" => "Der Check war sein Geld wert. Es wurde kein Detail ausgelassen, selbst kleinere Lackfehler wurden erwähnt. Ich habe danach mit gutem Gefühl gekauft.",
        "image" => "/assets/imgs/reviews/132.png"
    ],
    [
        "name" => "Svenja W.",
        "stars_text" => "★★★★★",
        "text" => "Sehr schneller und transparenter Service. Ich bekam regelmäßig Updates zum Ablauf und das fertige Gutachten kam noch am selben Tag. Einfach top!",
        "image" => "/assets/imgs/reviews/133.png"
    ],
    [
        "name" => "Leonard B.",
        "stars_text" => "★★★★☆",
        "text" => "Insgesamt wirklich guter Service, der Bericht war sehr hilfreich. Ein paar zusätzliche Detailfotos vom Innenraum hätten es perfekt gemacht.",
        "image" => "/assets/imgs/reviews/134.png"
    ],
    [
        "name" => "Vanessa K.",
        "stars_text" => "★★★★★",
        "text" => "Alles lief super unkompliziert. Vom ersten Kontakt bis zum fertigen Gutachten nur wenige Tage. Der Bericht war klar formuliert und sehr informativ.",
        "image" => "/assets/imgs/reviews/135.png"
    ],
    [
        "name" => "Theresa B.",
        "stars_text" => "★★★★★",
        "text" => "Ich war während der Besichtigung nicht dabei und hatte erst Sorge, ob mir Infos fehlen. Der Bericht war dann aber so klar (Fotos + Erklärungen), dass ich mich sicher entscheiden konnte.",
        "image" => "/assets/imgs/reviews/136.png"
    ],
    [
        "name" => "Nico L.",
        "stars_text" => "★★★★★",
        "text" => "Sehr angenehmer Ablauf: Auftrag online, Termin wurde koordiniert, danach kam das Gutachten. Für mich war wichtig, dass jemand unabhängig draufschaut – genau das war es.",
        "image" => "/assets/imgs/reviews/137.png"
    ],
    [
        "name" => "Kevin M.",
        "stars_text" => "★★★★☆",
        "text" => "Inhaltlich stark und nachvollziehbar. Ein einziges Foto war etwas unscharf, aber insgesamt hat mir die Prüfung enorm geholfen, den Verkäufer argumentativ „festzunageln“.",
        "image" => "/assets/imgs/reviews/138.png"
    ],
    [
        "name" => "Franziska O.",
        "stars_text" => "★★★★★",
        "text" => "Ich habe online gebucht und musste mich um nichts kümmern. Bericht kam schnell, und die Priorisierung (wichtig vs. kosmetisch) war Gold wert.",
        "image" => "/assets/imgs/reviews/139.png"
    ],
    [
        "name" => "Dennis K.",
        "stars_text" => "★★★★★",
        "text" => "Kurz gesagt: hat mir einen Fehlkauf erspart. Im Inserat sah alles top aus, im Gutachten standen dann ein paar Punkte, die ich nicht riskieren wollte.",
        "image" => "/assets/imgs/reviews/140.png"
    ],
    [
        "name" => "Isabelle R.",
        "stars_text" => "★★★★★",
        "text" => "Top für Leute wie mich, die keine Ahnung von Technik haben. Das Gutachten war verständlich und nicht überladen – trotzdem gründlich.",
        "image" => "/assets/imgs/reviews/141.png"
    ],
    [
        "name" => "Sebastian T.",
        "stars_text" => "★★★★☆",
        "text" => "Sehr detailliert, teilweise schon fast zu viel Information – aber lieber so. Ich konnte daraus eine klare To-do-Liste fürs Nachverhandeln ableiten.",
        "image" => "/assets/imgs/reviews/142.png"
    ],
    [
        "name" => "Melina S.",
        "stars_text" => "★★★★★",
        "text" => "Ich fand super, dass nicht nur „Mängel“ aufgezählt wurden, sondern auch erklärt wurde, was normaler Verschleiß ist und was eher ein Warnsignal.",
        "image" => "/assets/imgs/reviews/143.png"
    ],
    [
        "name" => "Robert F.",
        "stars_text" => "★★★★★",
        "text" => "Sehr gute Dokumentation. Besonders hilfreich waren die Hinweise zu Reifen/Zustand und welche Wartungen bald anstehen. Das hat meine Rechnung verändert.",
        "image" => "/assets/imgs/reviews/144.png"
    ],
    [
        "name" => "Jana W.",
        "stars_text" => "★★★★★",
        "text" => "Ich war nicht dabei, aber hatte nicht das Gefühl, etwas zu verpassen. Viele Fotos, klare Kapitel und eine eindeutige Empfehlung am Ende. Genau so wollte ich es.",
        "image" => "/assets/imgs/reviews/145.png"
    ],
    [
        "name" => "Tim E.",
        "stars_text" => "★★★★☆",
        "text" => "Service war zuverlässig und der Bericht kam wie angekündigt. Insgesamt sehr solide.",
        "image" => "/assets/imgs/reviews/146.png"
    ],
    [
        "name" => "Carolin P.",
        "stars_text" => "★★★★★",
        "text" => "Sehr praktisch, weil ich nicht quer durch Deutschland fahren konnte. Carspector hat das für mich übernommen und ich hatte 1 Tag später Klarheit.",
        "image" => "/assets/imgs/reviews/147.png"
    ],
    [
        "name" => "Alexander G.",
        "stars_text" => "★★★★★",
        "text" => "Der Händler war nach dem Gutachten deutlich gesprächiger. Ich konnte ruhig und sachlich bleiben, weil alles belegt war. Ergebnis: Preisnachlass bekommen.",
        "image" => "/assets/imgs/reviews/148.png"
    ],
    [
        "name" => "Marlene H.",
        "stars_text" => "★★★★☆",
        "text" => "Sehr professionell aufbereitet. Ein paar Formulierungen waren mir etwas technisch, aber mit den Fotos konnte ich es trotzdem gut nachvollziehen.",
        "image" => "/assets/imgs/reviews/149.png"
    ],
    [
        "name" => "Fabian J.",
        "stars_text" => "★★★★★",
        "text" => "Ich nutze den Service inzwischen zum zweiten Mal. Beide Male: saubere Arbeit, keine Übertreibungen, keine Schönfärberei. Genau mein Ding.",
        "image" => "/assets/imgs/reviews/150.png"
    ],
    [
        "name" => "Pauline D.",
        "stars_text" => "★★★★★",
        "text" => "Was mir gefallen hat: klare Trennung zwischen „sofort machen“, „demnächst“ und „nur optisch“. Dadurch konnte ich schnell entscheiden, ob es passt.",
        "image" => "/assets/imgs/reviews/151.png"
    ],
    [
        "name" => "Moritz V.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte zwei Kandidaten. Mit den beiden Gutachten war die Entscheidung leicht. Hat mir viel Zeit und Stress gespart.",
        "image" => "/assets/imgs/reviews/152.png"
    ],
    [
        "name" => "Jasmin P.",
        "stars_text" => "★★★★★",
        "text" => "Super unkompliziert: online gebucht, Carspector hat alles mit dem Verkäufer abgestimmt und ich hatte am nächsten Tag das Gutachten.",
        "image" => "/assets/imgs/reviews/153.png"
    ],
    [
        "name" => "Dennis S.",
        "stars_text" => "★★★★★",
        "text" => "Mega hilfreich bei einem Auto aus 600 km Entfernung. Der Prüfer hat sogar die Geräusche bei der Probefahrt beschrieben und mir klar gesagt, worauf ich achten sollte. Damit war die Entscheidung einfach.",
        "image" => "/assets/imgs/reviews/154.png"
    ],
    [
        "name" => "Helene W.",
        "stars_text" => "★★★★★",
        "text" => "Ich fand die Kommunikation sehr angenehm. Kurzer Anruf nach der Besichtigung, danach ein sauber strukturiertes Gutachten. Verständlich und ehrlich.",
        "image" => "/assets/imgs/reviews/155.png"
    ],
    [
        "name" => "Kevin A.",
        "stars_text" => "★★★★★",
        "text" => "Der Bericht war überraschend detailliert. Reifen DOT, Lackmessung, kleine Dellen – alles drin. Ich konnte dadurch beim Händler sachlich nachverhandeln und habe am Ende wirklich was rausgeholt.",
        "image" => "/assets/imgs/reviews/156.png"
    ],
    [
        "name" => "Nora K.",
        "stars_text" => "★★★★★",
        "text" => "Für mich als Nicht-Technikerin perfekt. Die wichtigsten Punkte waren klar zusammengefasst und die Fotos haben mir gezeigt, wie der Zustand wirklich ist (nicht nur die schönen Inseratbilder).",
        "image" => "/assets/imgs/reviews/157.png"
    ],
    [
        "name" => "Benjamin R.",
        "stars_text" => "★★★★★",
        "text" => "Extrem professionell: gründlich geprüft und am Ende eine klare Empfehlung. Der Verkäufer hat beim Preis plötzlich deutlich mehr Spielraum gehabt, als ich das Gutachten in der Hand hatte.",
        "image" => "/assets/imgs/reviews/158.png"
    ],
    [
        "name" => "Sina M.",
        "stars_text" => "★★★★☆",
        "text" => "Insgesamt wirklich top und sehr hilfreich. Ein, zwei Stellen im Bericht hätte ich mir etwas einfacher erklärt gewünscht, aber der Support hat meine Rückfragen direkt beantwortet. Daher trotzdem klare Empfehlung.",
        "image" => "/assets/imgs/reviews/159.png"
    ],
    [
        "name" => "Marcel F.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte Zeitdruck, weil das Auto schnell weg gewesen wäre. Termin ging fix, und das Gutachten kam zügig. Besonders gut: Mängel wurden nicht dramatisiert, sondern realistisch eingeordnet.",
        "image" => "/assets/imgs/reviews/160.png"
    ],
    [
        "name" => "Daria L.",
        "stars_text" => "★★★★★",
        "text" => "Hat mir Sicherheit gegeben. Der Prüfer hat auch Kleinigkeiten wie ungleichmäßige Spaltmaße und nachlackierte Stellen erwähnt. Ohne den Check hätte ich das nie erkannt.",
        "image" => "/assets/imgs/reviews/161.png"
    ],
    [
        "name" => "Philipp S.",
        "stars_text" => "★★★★★",
        "text" => "Sehr fairer Service. Keine Schönfärberei, sondern klare Fakten mit Bildern. Ich habe mich am Ende gegen den Kauf entschieden und bin im Nachhinein froh darüber.",
        "image" => "/assets/imgs/reviews/162.png"
    ],
    [
        "name" => "Kira T.",
        "stars_text" => "★★★★★",
        "text" => "Der Ablauf war super: Buchung, Terminabstimmung, Check – alles ohne Stress. Im Bericht waren sogar Hinweise, welche Wartungen bald anstehen. Genau solche Infos braucht man.",
        "image" => "/assets/imgs/reviews/163.png"
    ],
    [
        "name" => "Sven H.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte schon ein Bauchgefühl beim Inserat, aber erst durch Carspector hatte ich Klarheit. Die Dokumentation war wirklich gründlich, inklusive Elektronik-Check und Innenraumzustand.",
        "image" => "/assets/imgs/reviews/164.png"
    ],
    [
        "name" => "Melanie G.",
        "stars_text" => "★★★★★",
        "text" => "Was mir am meisten geholfen hat: die Priorisierung der Punkte (was ist kritisch, was nur optisch). Damit konnte ich direkt entscheiden und wusste genau, was ich beim Verkäufer anspreche.",
        "image" => "/assets/imgs/reviews/165.png"
    ],
    [
        "name" => "Okan Y.",
        "stars_text" => "★★★★★",
        "text" => "Richtig guter Service, vor allem wenn man nicht mal eben hinfahren kann. Der Bericht war klar, die Fotos aussagekräftig und die Empfehlung am Ende war nachvollziehbar begründet.",
        "image" => "/assets/imgs/reviews/166.png"
    ],
    [
        "name" => "Franziska B.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte nach dem Gutachten ein viel besseres Gefühl beim Kauf. Besonders die Hinweise zu Bremsen/Reifen und ein paar kleinen Rostansätzen waren super wertvoll. Würde ich wieder machen.",
        "image" => "/assets/imgs/reviews/167.png"
    ],
    [
        "name" => "Nils K.",
        "stars_text" => "★★★★★",
        "text" => "Ich wollte vor allem wissen, ob das Auto wirklich so gepflegt ist wie behauptet. Carspector hat sehr genau hingeschaut (Karosserie, Technik, Innenraum) und die wichtigsten Punkte verständlich zusammengefasst. Danach war die Entscheidung deutlich leichter.",
        "image" => "/assets/imgs/reviews/168.png"
    ],
        [
        "name" => "Jörg A.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte nur das Inserat und ein paar Handyfotos – Carspector hat mir am Ende ein richtiges Gesamtbild geliefert. Besonders die Einschätzung zur Historie und die Hinweise auf typische Schwachstellen waren für mich entscheidend. Würde ich wieder nutzen.",
        "image" => "/assets/imgs/reviews/169.png"
    ],
    [
        "name" => "Sabrina D.",
        "stars_text" => "★★★★★",
        "text" => "Sehr angenehm: keine ewigen Rückfragen, alles lief einfach durch. Ich fand die Prioritätenliste im Bericht stark (was dringend ist vs. was man später machen kann). Damit konnte ich direkt rechnen und entscheiden.",
        "image" => "/assets/imgs/reviews/170.png"
    ],
    [
        "name" => "Hassan M.",
        "stars_text" => "★★★★★",
        "text" => "Der Gutachter hat nicht nur „okay“ oder „nicht okay“ geschrieben, sondern richtig erklärt, warum. Die Probefahrt-Notizen waren mega hilfreich, weil ich genau danach gefragt hatte. Hat mir viel Unsicherheit genommen.",
        "image" => "/assets/imgs/reviews/171.png"
    ],
    [
        "name" => "Chiara S.",
        "stars_text" => "★★★★☆",
        "text" => "Insgesamt sehr überzeugt. Der Ablauf war schnell und klar, der Bericht verständlich. Ein, zwei Formulierungen hätte ich mir etwas weniger fachlich gewünscht, aber meine Rückfragen wurden direkt beantwortet. Daher 4 Sterne.",
        "image" => "/assets/imgs/reviews/172.png"
    ],
    [
        "name" => "Benedikt P.",
        "stars_text" => "★★★★★",
        "text" => "Für mich war der Karosseriezustand entscheidend – und genau da hat Carspector sehr gründlich dokumentiert. Mit den Bildern konnte ich beim Händler sauber argumentieren. Am Ende gab’s einen spürbaren Nachlass.",
        "image" => "/assets/imgs/reviews/173.png"
    ],
    [
        "name" => "Mareike L.",
        "stars_text" => "★★★★★",
        "text" => "Ich mochte die klare Struktur im PDF: Kapitel, kurze Zusammenfassung, dann Details. Keine Romane, aber trotzdem alles drin. So konnte ich das Gutachten auch schnell auf dem Handy durchgehen.",
        "image" => "/assets/imgs/reviews/174.png"
    ],
    [
        "name" => "Giuseppe R.",
        "stars_text" => "★★★★★",
        "text" => "Der Check hat einen Punkt aufgedeckt, der im Gespräch komplett unterging: eine unstimmige Lackierung an einem Seitenteil. Ohne den Hinweis hätte ich das nicht mal bemerkt. Sehr sauber gearbeitet.",
        "image" => "/assets/imgs/reviews/175.png"
    ],
    [
        "name" => "Alina F.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte einen engen Zeitplan und war nervös, dass das Auto weg ist, bevor das Gutachten vorliegt. Termin ging fix und die Ergebnisse kamen schneller als erwartet. Danach konnte ich wirklich sicher zusagen.",
        "image" => "/assets/imgs/reviews/176.png"
    ],
    [
        "name" => "Rene K.",
        "stars_text" => "★★★★★",
        "text" => "Stark fand ich die nüchterne, sachliche Bewertung. Nicht dramatisch, nicht schön geredet. Genau so bekommt man Vertrauen. Ich habe am Ende gekauft, vielen Dank!",
        "image" => "/assets/imgs/reviews/177.png"
    ],
    [
        "name" => "Leonie B.",
        "stars_text" => "★★★★★",
        "text" => "Sehr gute Erfahrung, vor allem die vielen Fotos waren hilfreich. Ein paar zusätzliche Aufnahmen vom Kofferraum/Innenraum wären für mich noch das i-Tüpfelchen gewesen – insgesamt aber echt empfehlenswert.",
        "image" => "/assets/imgs/reviews/178.png"
    ],
    [
        "name" => "Holger W.",
        "stars_text" => "★★★★★",
        "text" => "Bei mir ging es ausnahmsweise um ein Wohnmobil. Ich war überrascht, wie gründlich auch der Aufbau und die typischen Camper-Themen geprüft wurden (Feuchtigkeit, Dichtungen, Elektrik). Der Bericht war extrem hilfreich – dadurch habe ich mit gutem Gefühl zugeschlagen.",
        "image" => "/assets/imgs/reviews/179.png"
    ],
    [
        "name" => "Pia N.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte Angst vor „Katze im Sack“, weil das Fahrzeug weit weg stand. Nach dem Gutachten hatte ich endlich Fakten statt Bauchgefühl. Besonders die Hinweise zu Verschleißteilen und Wartungsstand waren Gold wert.",
        "image" => "/assets/imgs/reviews/180.png"
    ],
    [
        "name" => "Aras T.",
        "stars_text" => "★★★★★",
        "text" => "Top: schnelle Rückmeldung nach der Besichtigung und eine klare Entscheidungshilfe. Die Mängel wurden mit passenden Bildern belegt, nicht nur aufgelistet. Das macht’s einfach nachvollziehbar.",
        "image" => "/assets/imgs/reviews/181.png"
    ],
    [
        "name" => "Frida J.",
        "stars_text" => "★★★★★",
        "text" => "Ich bin Rentnerin und war komplett überfordert. Carspector hat mir das Ganze runtergebrochen: Was bedeutet der Befund? Was kostet es ungefähr? Was ist normal? Dadurch wurde aus Stress eine klare Entscheidung.",
        "image" => "/assets/imgs/reviews/182.png"
    ],
    [
        "name" => "Tarek H.",
        "stars_text" => "★★★★★",
        "text" => "Sehr professionell und dabei total unkompliziert. Ich musste nicht hinterherlaufen, die Abstimmung mit dem Verkäufer lief. Am Ende hatte ich einen Bericht, der wirklich Substanz hat.",
        "image" => "/assets/imgs/reviews/183.png"
    ],
    [
        "name" => "Jasna V.",
        "stars_text" => "★★★★★",
        "text" => "Für mich war entscheidend, dass jemand unabhängig draufschaut. Genau das habe ich bekommen: klare Befunde, saubere Doku und eine ehrliche Einschätzung, ob es sich lohnt. Ich würde es jederzeit wieder machen.",
        "image" => "/assets/imgs/reviews/184.png"
    ],    
    [
        "name" => "Selina R.",
        "stars_text" => "★★★★★",
        "text" => "Ich fand besonders gut, dass nicht nur Mängel aufgezählt wurden, sondern auch eine realistische Einschätzung zum Gesamtzustand kam. Mit den Fotos konnte ich alles nachvollziehen und beim Verkäufer gezielt nachhaken. Hat sich definitiv gelohnt.",
        "image" => "/assets/imgs/reviews/185.png"
    ],
    [
        "name" => "Markus H.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte einen Wagen in 450 km Entfernung im Blick. Carspector hat alles sauber dokumentiert: Lackmessung, Innenraum, Probefahrt, sogar kleine Kratzer wurden gezeigt. Der Bericht kam am selben Abend – dadurch konnte ich sicher entscheiden.",
        "image" => "/assets/imgs/reviews/186.png"
    ],
    [
        "name" => "Lea S.",
        "stars_text" => "★★★★★",
        "text" => "Sehr unkompliziert: online gebucht, Termin wurde direkt mit dem Verkäufer abgestimmt und ich musste mich um nichts kümmern. Im Gutachten war eine klare Zusammenfassung plus viele Detailfotos.",
        "image" => "/assets/imgs/reviews/187.png"
    ],
    [
        "name" => "Dennis J.",
        "stars_text" => "★★★★★",
        "text" => "Der Prüfer war extrem gründlich. Besonders hilfreich fand ich die Hinweise zu anstehenden Kosten. Damit konnte ich realistisch rechnen und am Ende auch besser verhandeln.",
        "image" => "/assets/imgs/reviews/188.png"
    ],
    [
        "name" => "Sophie W.",
        "stars_text" => "★★★★★",
        "text" => "Wirklich top! Nicht nur „Mängel“ wurden dokumentiert, sondern auch, was normaler Verschleiß ist. Als Laie war das für mich Gold wert.",
        "image" => "/assets/imgs/reviews/189.png"
    ],
    [
        "name" => "Ali K.",
        "stars_text" => "★★★★★",
        "text" => "Ich wollte vor allem Klarheit zur Historie. Carspector hat Serviceunterlagen geprüft und Unstimmigkeiten im Inserat angesprochen. Am Ende wusste ich genau, welche Fragen ich dem Händler stellen muss.",
        "image" => "/assets/imgs/reviews/190.png"
    ],
    [
        "name" => "Kerstin B.",
        "stars_text" => "★★★★★",
        "text" => "Der Bericht war super lesbar – auch am Handy. Kapitelweise aufgebaut, viele Fotos eine klare Einschätzung am Ende. Ich fühlte mich wirklich abgesichert.",
        "image" => "/assets/imgs/reviews/191.png"
    ],
    [
        "name" => "Tobias P.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte Zeitdruck, weil noch andere Interessenten am Auto interessiert sind. Termin ging schnell und die Ergebnisse kamen zügig. Durch den Bericht konnte ich sofort entscheiden und habe den Wagen gekauft – alles wie beschrieben.",
        "image" => "/assets/imgs/reviews/192.png"
    ],
    [
        "name" => "Miriam N.",
        "stars_text" => "★★★★★",
        "text" => "Sehr fair und neutral. Es wurde nichts dramatisiert, aber auch nichts beschönigt. Besonders gut: Fotos mit Kommentaren, damit man die Bedeutung direkt versteht.",
        "image" => "/assets/imgs/reviews/193.png"
    ],
    [
        "name" => "Jan F.",
        "stars_text" => "★★★★★",
        "text" => "Der Check hat mir eine lange Anreise gespart. Im Gutachten standen sogar Details wie Reifen-DOT und Bremsen-Zustand. Genau diese Kleinigkeiten machen am Ende den Unterschied.",
        "image" => "/assets/imgs/reviews/194.png"
    ],
    [
        "name" => "Vanessa M.",
        "stars_text" => "★★★★★",
        "text" => "Ich hatte zwei Autos in der engeren Auswahl. Mit den beiden Berichten war die Entscheidung plötzlich glasklar. Sehr gut fand ich die Priorisierung: was ist kritisch, was nur optisch.",
        "image" => "/assets/imgs/reviews/195.png"
    ],
    [
        "name" => "Robert S.",
        "stars_text" => "★★★★★",
        "text" => "Der Prüfer hat bei der Probefahrt ein Geräusch beschrieben, das ich nie herausgehört hätte. Dadurch konnte ich den Händler konkret darauf ansprechen. Am Ende gab es einen ordentlichen Nachlass – hat sich gelohnt.",
        "image" => "/assets/imgs/reviews/196.png"
    ],
    [
        "name" => "Elif A.",
        "stars_text" => "★★★★★",
        "text" => "Sehr kundenorientiert. Ich hatte Rückfragen und bekam schnelle, verständliche Antworten. Das Gutachten selbst war detailliert, aber trotzdem nicht unnötig kompliziert.",
        "image" => "/assets/imgs/reviews/197.png"
    ],
    [
        "name" => "Philipp K.",
        "stars_text" => "★★★★★",
        "text" => "Mir war der Karosseriezustand wichtig. Carspector hat Spaltmaße, Lackbild und nachlackierte Stellen sauber dokumentiert. Ohne den Check hätte ich mich vermutlich geärgert.",
        "image" => "/assets/imgs/reviews/198.png"
    ],
    [
        "name" => "Nora E.",
        "stars_text" => "★★★★★",
        "text" => "Vom Ablauf her perfekt: Buchung, Abstimmung mit dem Verkäufer, Prüfung, Bericht – alles ohne Stress. Besonders gut fand ich das Fazit mit klarer Empfehlung.",
        "image" => "/assets/imgs/reviews/199.png"
    ],
    [
        "name" => "Simon R.",
        "stars_text" => "★★★★★",
        "text" => "Die Detailtiefe hat mich überrascht: Unterboden, Motorraum, Elektrik-Check – alles drin. Dazu viele Fotos aus sinnvollen Perspektiven. Absolute Empfehlung.",
        "image" => "/assets/imgs/reviews/200.png"
    ],
    [
        "name" => "Jana L.",
        "stars_text" => "★★★★★",
        "text" => "Insgesamt sehr zufrieden: schneller Termin, sehr gründlicher Bericht und freundlicher Kontakt. Ein paar Fotos mehr vom Kofferraum wären für mich noch das i-Tüpfelchen gewesen, aber sonst wirklich top.",
        "image" => "/assets/imgs/reviews/201.png"
    ],
    [
    "name" => "Marlon C.",
    "stars_text" => "★★★★★",
    "text" => "Ich fand besonders stark, dass im Bericht nicht nur Mängel genannt wurden, sondern auch, welche Punkte für mich kurzfristig relevant sind und welche eher später anstehen. Dadurch konnte ich viel sachlicher mit dem Verkäufer sprechen und den Preis noch verhandeln. Sehr hilfreicher Service.",
    "image" => "/assets/imgs/reviews/202.png"
    ],
    [
        "name" => "Eva T.",
        "stars_text" => "★★★★★",
        "text" => "Das Fahrzeug stand für mich zu weit entfernt, deshalb war Carspector die perfekte Lösung. Die Prüfung war sehr gründlich und der Bericht war übersichtlich aufgebaut.",
        "image" => "/assets/imgs/reviews/203.png"
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
                        <h2 style="letter-spacing: -0.5px; font-size: 35px"
                            class="fw-bold mb-1 text-dark">
                            Erfahrungen mit Carspector
                        </h2>
                        <p class="text-muted mb-0">
                            Lies echte Rezensionen und erfahre, warum Kunden uns weiterempfehlen.
                        </p>
                    </div>

                    <!-- Right: Rating summary -->
                    <div class="col-md-6 d-flex justify-content-center justify-content-md-end">
                        <div class="d-flex align-items-center gap-3 bg-white shadow-sm rounded p-3">
                            <div class="flex-shrink-0">
                                <i class="fa-solid fa-badge-check" style="font-size: 2.5rem;"></i>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="fs-4 fw-bold text-dark">
                                        {{ number_format($ratingSummary['score'] ?? 4.8, 1) }}
                                    </span>
                                    <div class="text-success">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p class="mb-0 text-muted small">
                                    <strong>{{ number_format($ratingSummary['count'] ?? 2938, 0, ',', '.') }}</strong>
                                    Bewertungen
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
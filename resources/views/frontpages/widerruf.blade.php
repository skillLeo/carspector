@extends('mainpages.master-layout')
@section('title', 'Carspector | Widerruf')
@section('header')
    @include('partials.index-header')
@endsection

@section('content')
<main style="padding: 0 15px; margin: 0 auto; max-width: 900px" class="main-area">

    <div class="section-head text-center pt-5 pb-4 mb-3">
        <h3 class="section-title fs-3 text-primary pb-3">Widerrufsbelehrung</h3>
    </div>

    <h4>Widerrufsrecht</h4>
    <p>
        Verbraucher im Sinne des § 13 BGB haben das Recht, binnen vierzehn Tagen ohne Angabe von Gründen diesen Vertrag zu widerrufen. 
        Die Widerrufsfrist beträgt vierzehn Tage ab dem Tag des Vertragsabschlusses, also der Bestätigung der Buchung durch Carspector.
    </p>

    <p>
        Um Ihr Widerrufsrecht auszuüben, müssen Sie uns (Carspector – Reisholzer Werftstraße 76, 40589 Düsseldorf, E-Mail: kontakt@carspector.de) 
        mittels einer eindeutigen Erklärung (z. B. per E-Mail oder mit einem postalischen Schreiben) über Ihren Entschluss informieren, diesen Vertrag zu widerrufen. 
        Sie können dafür das nachstehende Muster-Widerrufsformular verwenden, das jedoch nicht vorgeschrieben ist.
    </p>

    <br><h4>Folgen des Widerrufs</h4>
    <p>
        Im Falle eines wirksamen Widerrufs erstatten wir Ihnen alle Zahlungen, die wir von Ihnen erhalten haben, unverzüglich und spätestens binnen vierzehn Tagen ab dem Tag, 
        an dem die Mitteilung über Ihren Widerruf bei uns eingegangen ist. Für diese Rückzahlung verwenden wir dasselbe Zahlungsmittel, 
        das Sie bei der ursprünglichen Transaktion eingesetzt haben, es sei denn, es wurde ausdrücklich etwas anderes vereinbart. 
        In keinem Fall werden Ihnen wegen dieser Rückzahlung Entgelte berechnet.
    </p>
    <p>
        Haben Sie verlangt, dass die Dienstleistungen während der Widerrufsfrist beginnen sollen, so haben Sie uns einen angemessenen Betrag zu zahlen, 
        der dem Anteil der bis zu dem Zeitpunkt, zu dem Sie uns von der Ausübung des Widerrufsrechts hinsichtlich dieses Vertrags unterrichten, 
        bereits erbrachten Dienstleistungen im Vergleich zum Gesamtumfang der im Vertrag vorgesehenen Dienstleistungen entspricht. Mehr dazu <a href="https://www.carspector.de/agb">hier</a>.
    </p>
    <p>
        Das Widerrufsrecht erlischt gemäß § 356 Abs. 4 BGB vorzeitig, wenn Carspector die Dienstleistung vollständig erbracht hat 
        oder mit der Erbringung begonnen hat, nachdem Sie ausdrücklich zugestimmt haben, dass wir mit der Ausführung der Dienstleistung vor Ablauf der Widerrufsfrist beginnen. (z.B. durch Buchung und Bezahlung der Dienstleistung).
    </p>

    <br>
    <h4>Muster-Widerrufsformular</h4>
    <p>
        Wenn Sie den Vertrag widerrufen wollen, dann können Sie dieses Formular nutzen und ausgefüllt an uns zurücksenden. 
        Alternativ können Sie auch ein anderes Formular verwenden oder ein freies Schreiben fertigen, 
        sofern dieses alle erforderlichen Daten enthält, die uns eine eindeutige Zuordnung Ihres Widerrufs ermöglichen.
    </p>

    <div style="border: 1px solid #ccc; padding: 15px; margin: 20px 0; font-size: 14px; background: #f9f9f9;">
        <p>
            An: Carspector - Reisholzer Werftstraße 76, 40589 Düsseldorf - Deutschland<br>
            E-Mail: kontakt@carspector.de
        </p>
        <p>
            Hiermit widerrufe(n) ich/wir (*) den von mir/uns (*) abgeschlossenen Vertrag über die Erbringung der folgenden Dienstleistung (*)
        </p>
        <p>
            in Auftrag gegeben bei (*)
        </p>
        <p>
            Bestellt am (*) / erhalten am (*)
        </p>
        <p>
            Name des/der Verbraucher(s)
        </p>
        <p>
            Anschrift des/der Verbraucher(s)
        </p>
        <p>
            Unterschrift des/der Verbraucher(s) (nur bei Mitteilung auf Papier)
        </p>
        <p>
            Datum
        </p>
        <p>_____________</p>
        <p>(* ) Unzutreffendes streichen</p>
    </div>

</main>
@endsection

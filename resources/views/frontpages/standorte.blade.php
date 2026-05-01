@extends('mainpages.master-layout')
@section('title', 'Carspector | Standorte')
@section('meta_description', 'Finde heraus, wo wir für dich vor Ort sind – deutschlandweiter Service für Fahrzeugprüfungen, inkl. Großstädte und ländliche Regionen.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')


<style>

 

    .location-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
      max-width: 400px;
      margin: 0 auto;
    }

    .location-link {
      display: block;
      padding: 1rem;
      background-color: white;
      border-radius: 8px;
      text-align: center;
      text-decoration: none;
      color: var(--primary);
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      transition: all 0.2s ease;
      border: 1px solid var(--primary);
      max-width: 400px;
      padding: 0 20;
    }

     .wrapper {
      padding-left: 20px;
      padding-right: 20px;

    }

    .location-link:hover {
      background-color: var(--secondary);
      color: white;
      border: 1px solid var(--secondary);
      transform: translateY(-2px);
    }

    @media (max-width: 430px) {
     .location-link {
        margin: 0 auto;
        width: 90%;
     }
    }
  </style>
</head>
<body>

<div class="step-item--header mb-5 pb-2 pt-5">
    <h2 class="fs-header pb-1 text-primary">Gebrauchtwagencheck - unsere Standorte</h2>

    <div class="pt-3" style="display: flex; align-items: center; max-width: 90%; margin: 0 auto;">
        <!-- Icon Box -->
        <div class="section-bg" style="padding: 10px; border-radius: 5px; display: flex; align-items: center; justify-content: center; min-width: 50px; min-height: 50px; margin-right: 12px;">
            <img src="assets/imgs/hpslider/4.png" alt="Deutschland Flagge" style="height: 30px; width: auto;">
        </div>

        <!-- Text -->
        <p style="text-align: left" class="pt-2 intro-text">
            Wir sind <b>in ganz Deutschland</b> für dich unterwegs. Hier zeigen wir dir eine Auswahl der Städte, in denen wir besonders häufig im Einsatz sind.
        </p>
    </div>
</div>

 </div>
 

  @php
$citiesWithPages = [
    'berlin' => 'Berlin',
    'duesseldorf' => 'Düsseldorf',
    'muenchen' => 'München',
    'hannover' => 'Hannover',
    'hamburg' => 'Hamburg',
    'dresden' => 'Dresden',
    'koeln' => 'Köln',
    'frankfurt' => 'Frankfurt am Main',
    'stuttgart' => 'Stuttgart',
    'leipzig' => 'Leipzig',
    'dortmund' => 'Dortmund',
    'bremen' => 'Bremen',
    'essen' => 'Essen',
    'nuernberg' => 'Nürnberg',
    'duisburg' => 'Duisburg',
    'bochum' => 'Bochum',
    'wuppertal' => 'Wuppertal',
    'bielefeld' => 'Bielefeld',
    'bonn' => 'Bonn',
    'mannheim' => 'Mannheim',
    'karlsruhe' => 'Karlsruhe',
    'wiesbaden' => 'Wiesbaden',
    'muenster' => 'Münster',
    'augsburg' => 'Augsburg',
    'gelsenkirchen' => 'Gelsenkirchen',
    'aachen' => 'Aachen',
    'moenchengladbach' => 'Mönchengladbach',
    'braunschweig' => 'Braunschweig',
    'chemnitz' => 'Chemnitz',
    'kiel' => 'Kiel',
    'erfurt' => 'Erfurt',
    'magdeburg' => 'Magdeburg',
    'freiburg' => 'Freiburg',
    'krefeld' => 'Krefeld',
    'luebeck' => 'Lübeck',
    'oberhausen' => 'Oberhausen',
    'hagen' => 'Hagen',
    'hamm' => 'Hamm',
    'saarbruecken' => 'Saarbrücken',
    'potsdam' => 'Potsdam',
    'ludwigshafen' => 'Ludwigshafen',
    'oldenburg' => 'Oldenburg',
    'leverkusen' => 'Leverkusen',
    'osnabrueck' => 'Osnabrück',
    'solingen' => 'Solingen',
    'herne' => 'Herne',
    'neuss' => 'Neuss',
    'heidelberg' => 'Heidelberg',
    'darmstadt' => 'Darmstadt',
    'paderborn' => 'Paderborn',
    'regensburg' => 'Regensburg',
    'ingolstadt' => 'Ingolstadt',
    'wuerzburg' => 'Würzburg',
    'wolfsburg' => 'Wolfsburg',
    'ulm' => 'Ulm',
    'heilbronn' => 'Heilbronn',
    'recklinghausen' => 'Recklinghausen',
    'goettingen' => 'Göttingen',
    'rostock' => 'Rostock',
    'hildesheim' => 'Hildesheim',
    'koblenz' => 'Koblenz',
    'trier' => 'Trier',
    'siegen' => 'Siegen',
    'cottbus' => 'Cottbus',
    'konstanz' => 'Konstanz',
    'flensburg' => 'Flensburg',
    'zwickau' => 'Zwickau',
    'gera' => 'Gera',
    'schwerin' => 'Schwerin',
    'witten' => 'Witten',
    'kempten' => 'Kempten',
    'fuerth' => 'Fürth',
    'neubrandenburg' => 'Neubrandenburg',
    'bayreuth' => 'Bayreuth',
    'landshut' => 'Landshut',
    'ravensburg' => 'Ravensburg',
    'weimar' => 'Weimar',
    'plauen' => 'Plauen',
    'passau' => 'Passau',
    'bottrop' => 'Bottrop',
    'salzgitter' => 'Salzgitter',
    'giessen' => 'Gießen',
    'hof' => 'Hof',
    'worms' => 'Worms',
    'hanau' => 'Hanau',
    'celle' => 'Celle',
    'wismar' => 'Wismar',
    'bamberg' => 'Bamberg',
    'delmenhorst' => 'Delmenhorst',
    'luenen' => 'Lünen',
    'tuebingen' => 'Tübingen',
    'freising' => 'Freising',
    'gummersbach' => 'Gummersbach',
    'lippstadt' => 'Lippstadt',
    'sindelfingen' => 'Sindelfingen',
    'villingen-schwenningen' => 'Villingen-Schwenningen',
    'rheine' => 'Rheine',
    'ratingen' => 'Ratingen',
    'marburg' => 'Marburg',
    'gladbeck' => 'Gladbeck',
    'bergisch-gladbach' => 'Bergisch-Gladbach',
    'neumuenster' => 'Neumünster',
    'dueren' => 'Düren',
    'aschaffenburg' => 'Aschaffenburg',
    'friedrichshafen' => 'Friedrichshafen',
    'lueneburg' => 'Lüneburg',
    'fulda' => 'Fulda',
    'friedberg' => 'Friedberg',
    'kaarst' => 'Kaarst',
    'elmshorn' => 'Elmshorn',
    'jena' => 'Jena',
    'greven' => 'Greven',
    'hennef' => 'Hennef',
    'greifswald' => 'Greifswald',
    'detmold' => 'Detmold',
    'minden' => 'Minden',
    'coburg' => 'Coburg',
    'boeblingen' => 'Böblingen',
    'cuxhaven' => 'Cuxhaven',
    'erding' => 'Erding',
    'freudenstadt' => 'Freudenstadt',
    'filderstadt' => 'Filderstadt',
    'geesthacht' => 'Geesthacht',
    'itzehoe' => 'Itzehoe',
    'emden' => 'Emden',
    'eisenach' => 'Eisenach',
    'heidenheim' => 'Heidenheim',
    'hameln' => 'Hameln',
    'herford' => 'Herford',
    'homburg' => 'Homburg',
    'kerpen' => 'Kerpen',
    'kleve' => 'Kleve',
    'lahr' => 'Lahr',
    'langenfeld' => 'Langenfeld',
    'memmingen' => 'Memmingen',
    'nordhorn' => 'Nordhorn',
    'bingen' => 'Bingen',
    'coesfeld' => 'Coesfeld',
    'dinslaken' => 'Dinslaken',
    'ditzingen' => 'Ditzingen',
    'eschwege'  => 'Eschwege',
    'erkelenz'  => 'Erkelenz',
    'geislingen'=> 'Geislingen',
    'gersthofen' => 'Gersthofen',
    'giengen'    => 'Giengen',
    'glauchau'   => 'Glauchau',
    'greiz'      => 'Greiz',
    'grimma'     => 'Grimma',
    'offenburg'   => 'Offenburg',
    'ansbach'     => 'Ansbach',
    'euskirchen'  => 'Euskirchen',
    'straubing'   => 'Straubing',
    'villingen'   => 'Villingen',
    'bautzen'      => 'Bautzen',
    'cloppenburg'  => 'Cloppenburg',
    'deggendorf'   => 'Deggendorf',
    'limburg'      => 'Limburg',
    'rottweil'     => 'Rottweil',
    'eberswalde'  => 'Eberswalde',
    'forchheim'   => 'Forchheim',
    'halberstadt' => 'Halberstadt',
    'hofgeismar'  => 'Hofgeismar',
    'landau'      => 'Landau',
    'altenburg'  => 'Altenburg',
    'andernach'  => 'Andernach',
    'bitburg'    => 'Bitburg',
    'borken'     => 'Borken',
    'merzig'     => 'Merzig',
    'eschborn'      => 'Eschborn',
    'eckernfoerde' => 'Eckernförde',
    'falkensee'   => 'Falkensee',
    'aurich'      => 'Aurich',
    'alsfeld'     => 'Alsfeld',
    'kevelaer'   => 'Kevelaer',
    'haan'       => 'Haan',
    'peine'      => 'Peine',
    'buedingen'  => 'Büdingen',
    'balingen'   => 'Balingen',
    'burgdorf'      => 'Burgdorf',
    'diepholz'      => 'Diepholz',
    'finsterwalde'  => 'Finsterwalde',
    'hemer'         => 'Hemer',
    'kamen'         => 'Kamen',
    'werdau'        => 'Werdau',
    'lichtenfels'   => 'Lichtenfels',
    'brilon'        => 'Brilon',
    'stade'         => 'Stade',
    'buxtehude'     => 'Buxtehude',
    'brandenburg'   => 'Brandenburg',
    'naumburg'      => 'Naumburg',
    'nordenham'     => 'Nordenham',
    'goerlitz'      => 'Görlitz',
    'moers'         => 'Moers',
    'pirna'         => 'Pirna',
    'schweinfurt'   => 'Schweinfurt',
    'pinneberg'     => 'Pinneberg',
    'speyer'        => 'Speyer',
    'neuwied'       => 'Neuwied',
    'remscheid'      => 'Remscheid',
    'meppen'         => 'Meppen',
    'bad-kreuznach'  => 'Bad-Kreuznach',
    'gronau'         => 'Gronau',
    'emmendingen'    => 'Emmendingen',
    'kaufbeuren'   => 'Kaufbeuren',
    'ilmenau'      => 'Ilmenau',
    'ahlen'        => 'Ahlen',
    'ettlingen'    => 'Ettlingen',
    'zeits'        => 'Zeitz',
    'neuhaus'         => 'Neuhaus',
    'bernburg'        => 'Bernburg',
    'eilenburg'       => 'Eilenburg',
    'wilhelmshaven'   => 'Wilhelmshaven',
    'erkrath'         => 'Erkrath',
    'datteln'      => 'Datteln',
    'amberg'       => 'Amberg',
    'schwabach'    => 'Schwabach',
    'viersen'      => 'Viersen',
    'gevelsberg'   => 'Gevelsberg',
    'gifhorn'         => 'Gifhorn',
    'seelze'          => 'Seelze',
    'rosenheim'       => 'Rosenheim',
    'ingelheim'       => 'Ingelheim',
    'kamp-lintfort'   => 'Kamp-Lintfort',
    'dormagen'     => 'Dormagen',
    'lohmar'       => 'Lohmar',
    'wuerselen'    => 'Würselen',
    'weissenfels'  => 'Weißenfels',
    'eppingen'     => 'Eppingen',
    'aalen'           => 'Aalen',
    'aschersleben'    => 'Aschersleben',
    'eschweiler'      => 'Eschweiler',
    'hoyerswerda'     => 'Hoyerswerda',
    'friedrichsdorf'  => 'Friedrichsdorf',
    'pforzheim'     => 'Pforzheim',
    'dessau'        => 'Dessau',
    'bremerhaven'   => 'Bremerhaven',
    'nordhausen'    => 'Nordhausen',
    'ruesselsheim'  => 'Rüsselsheim',
];

$citiesFallback = [
];
@endphp

<div class="pb-3 location-grid">
    @foreach ($citiesWithPages as $slug => $name)
        <a href="/standorte/gebrauchtwagencheck-{{ $slug }}" class="location-link">
            Gebrauchtwagencheck in {{ $name }}
        </a>
    @endforeach

    @foreach ($citiesFallback as $city)
        <a href="{{ route('index') }}" class="location-link">
            Gebrauchtwagencheck in {{ $city }}
        </a>
    @endforeach
</div>





</body>



@endsection

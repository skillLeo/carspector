@extends('mainpages.master-layout')
@section('title', 'Carspector | Fahrzeugmarken')
@section('meta_description', 'Finde den passenden Gebrauchtwagencheck für deine gewünschte Automarke – vom Audi bis zum Porsche, deutschlandweiter Fahrzeug-Check für alle Hersteller.')
@section('header')
    @include('partials.index-header')
@endsection
@section('content')


<style>
    .brand-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        max-width: 400px;
        margin: 0 auto;
    }

    .brand-link {
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
    }

    .wrapper {
        padding-left: 20px;
        padding-right: 20px;
    }

    .brand-link:hover {
        background-color: var(--secondary);
        color: white;
        border: 1px solid var(--secondary);
        transform: translateY(-2px);
    }

    @media (max-width: 430px) {
        .brand-link {
            margin: 0 auto;
            width: 90%;
        }
    }
</style>


</head>
<body>
<div class="step-item--header mb-5 pb-2 pt-5">
    <h2 class="fs-header pb-1 text-primary">Gebrauchtwagencheck nach Automarke</h2>

    <div class="pt-3" style="display: flex; align-items: center; max-width: 90%; margin: 0 auto;">
        <!-- Icon Box -->
        <div class="section-bg" style="padding: 10px; border-radius: 5px; display: flex; align-items: center; justify-content: center; min-width: 50px; min-height: 50px; margin-right: 12px;">
    <i class="fa-solid fa-car" style="font-size: 25px; color: var(--primary)"></i>
</div>

        <!-- Text -->
        <p style="text-align: left" class="pt-2 intro-text">
            Egal ob <b>VW, BMW oder Porsche</b> – wir prüfen Fahrzeuge aller Marken gründlich und professionell.  
            Wähle deine gewünschte Automarke, um mehr über unseren Gebrauchtwagencheck für dein gewünschtes Modell zu erfahren.
        </p>
    </div>
</div>

@php
$brands = [
    'volkswagen' => 'Volkswagen (VW)',
    'audi' => 'Audi',
    'porsche' => 'Porsche',
    'mercedes-benz' => 'Mercedes-Benz',
    'skoda' => 'Škoda',
    'seat' => 'Seat',
    'bmw' => 'BMW',
    'opel' => 'Opel',
    'ford' => 'Ford',
    'peugeot' => 'Peugeot',
    'renault' => 'Renault',
    'citroen' => 'Citroën',
    'fiat' => 'Fiat',
    'toyota' => 'Toyota',
    'honda' => 'Honda',
    'hyundai' => 'Hyundai',
    'mazda' => 'Mazda',
    'nissan' => 'Nissan',
    'kia' => 'Kia',
    'volvo' => 'Volvo',
    'suzuki' => 'Suzuki',
    'mitsubishi' => 'Mitsubishi',
    'subaru' => 'Subaru',
    'chevrolet' => 'Chevrolet',
    'jeep' => 'Jeep',
    'alfa-romeo' => 'Alfa Romeo',
    'land-rover' => 'Land Rover',
    'jaguar' => 'Jaguar',
    'mini' => 'Mini',
    'dacia' => 'Dacia',
    'chrysler' => 'Chrysler',
    'aston-martin' => 'Aston Martin',
    'dodge' => 'Dodge',
    'maserati' => 'Maserati',
    'saab' => 'Saab',
    'smart' => 'Smart',
];
@endphp

<div class="pb-3 brand-grid">
    @foreach ($brands as $slug => $name)
        <a href="/marken/gebrauchtwagencheck-{{ $slug }}" class="brand-link">
            Gebrauchtwagencheck für {{ $name }}
        </a>
    @endforeach
</div>

@endsection
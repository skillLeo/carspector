<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gebrauchtwagencheck vor Ort für dein gewünschtes Fahrzeug. Auto vor dem Kauf prüfen lassen. Prüfungen aller Fahrzeugklassen. Autos, Transporter,
    Oldtimer, Sportwagen, Wohnmobile. ✓ TÜV-Zertifiziert  ✓ Gutachten   ✓ Sicher und günstig Gebrauchtwagen kaufen  ✓ Garantie">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Carspector - Gebrauchtwagencheck | Deutschlandweit | Zertifiziert</title>

    <!-- Chrome, Firefox OS & Opera -->
    <meta name="theme-color" content="#01449A">
    <!-- Windos-Phone -->
    <meta name="msapplication-navbutton-color" content="#01449A">
    <!-- Safari & iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#01449A">

    <link rel="icon" href="/favicon.ico">
    <!-- css-start -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css">
    <!-- css-start-end -->

    @yield('styles')

    <style>
        .exam-card-header-icon img{
            max-width: 45px;
        }
        .hero-area{
            z-index: 1 !important;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* remove the gap so it doesn't close */
        }
        .dropdown{
            border-radius: 0 !important;
        }
        .dropdown-item{
            color: #01449A !important;

        }
        .btn-further {
            height: 50px !important;
        }
        @media screen and (max-width: 678px) {
            .top-breadcrumb {
                width: 100%;
                padding: 10px 15px;
            }
        }
        @media screen and (min-width: 678px) {
            .top-breadcrumb {
                padding: 10px 50px;
            }
        }
        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {

            .dropdown-menu li{
                position: relative;
            }
            .dropdown-menu .submenu{
                display: none !important;
                position: absolute;
                left:100%; top:-7px;
            }
            .dropdown-menu .submenu-left{
                right:100%; left:auto;
            }

            .dropdown-menu > li:hover{ background-color: #f1f1f1 }
            .dropdown-menu > li:hover > .submenu{
                display: block !important;
            }
        }
        .offcanvas{
            max-width: 85% !important;
        }
        /* ============ desktop view .end// ============ */

        /* ============ small devices ============ */
        @media (max-width: 991px) {

            .dropdown-menu .dropdown-menu{
                margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
            }

        }
        /* ============ small devices .end// ============ */
        @media (max-width: 767.98px) {
            /* Grundlegende Gestaltung des Dropdown-Menüs */
            .dropdown-menu {
                padding: 15px !important; /* Weiter reduziertes Padding um die gesamte Dropdown-Liste */
                width: 250px; /* Breitere Liste */
                font-size: 18px; /* Größere Schrift für bessere Lesbarkeit */
                background-color: #ffffff; /* Weißer Hintergrund für bessere Sichtbarkeit */
                border-radius: 8px; /* Abgerundete Ecken */
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); /* Leichte Schatten für Tiefenwirkung */
                transition: all 0.3s ease; /* Sanfter Übergang bei Hover */
                z-index: 9999; /* Sicherstellen, dass das Dropdown immer oben ist */
            }

            .dropdown-item {
                padding: 12px 20px; /* Mehr Platz zwischen den einzelnen Links im Dropdown-Menü */
                font-size: 17px; /* Größere Schrift für die Links */
                color: #333; /* Dunkle Schriftfarbe */
                text-decoration: none; /* Unterstreichung entfernen */
                border-radius: 5px; /* Leicht abgerundete Ecken für die Links */
                transition: background-color 0.3s ease; /* Sanfter Übergang bei Hover */
            }

            /* Hover-Effekt für die Dropdown-Elemente */
            .dropdown-item:hover {
                background-color: #007bff; /* Blaue Hintergrundfarbe bei Hover */
                color: #ffffff; /* Helle Schriftfarbe bei Hover */
            }

            /* Überschrift im Dropdown-Menü nur auf Mobil */
            .dropdown-menu li strong {
                font-size: 18px;
                color: #343a40; /* Farbe der Überschrift */
                display: block; /* Sicherstellen, dass es sich wie eine Überschrift verhält */
                border-bottom: 1px solid #ddd; /* Linie unter der Überschrift für bessere Übersicht */
                margin-bottom: 5px; /* Weniger Abstand nach unten */
                margin-top: 0; /* Verringern des Abstands nach oben auf 0 */
                padding: 5px 0; /* Padding für mehr Platz */
            }

            /* Zusätzlicher Abstand für die zweite Überschrift */
            .dropdown-menu li:nth-child(7) strong {
                margin-top: 10px; /* Weniger Abstand nach oben für die zweite Überschrift */
            }

            /* Spezifischer Abstand NUR im Dropdown-Menü auf Mobil */
            .dropdown-menu li {
                margin-bottom: 3px; /* Weiter reduzierter Abstand nur zwischen den Dropdown-Menüpunkten */
            }

            /* Keine zusätzlichen Abstände zwischen den Hauptmenüpunkten auf Mobil */
            .mobile-menu-link ul {
                padding-left: 0;
                margin: 0;
            }

            .mobile-menu-link li {
                margin-bottom: 0; /* Kein zusätzlicher Abstand zwischen den Menüpunkten im Hauptmenü */
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Halbtransparentes Schwarz */
                z-index: 9998; /* Unter dem Dropdown, aber über dem Inhalt */
            }
        }


    </style>

    <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '407563301697559');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=407563301697559&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-65LCZE82B5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-65LCZE82B5');
    </script>
  	<script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Carspector",
            "url": "https://www.carspector.de"
        }
    </script>

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11007240787"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11007240787');
</script>
    <script type="text/javascript">
        //	window.addEventListener("resize", function() {
        //		"use strict"; window.location.reload();
        //	});


        document.addEventListener("DOMContentLoaded", function(){


            /////// Prevent closing from click inside dropdown
            document.querySelectorAll('.dropdown-menu').forEach(function(element){
                element.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            })



            // make it as accordion for smaller screens
            if (window.innerWidth < 992) {

                // close all inner dropdowns when parent is closed
                document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
                    everydropdown.addEventListener('hidden.bs.dropdown', function () {
                        // after dropdown is hidden, then find all submenus
                        this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                            // hide every submenu as well
                            everysubmenu.style.display = 'none';
                        });
                    })
                });

                document.querySelectorAll('.dropdown-menu a').forEach(function(element){
                    element.addEventListener('click', function (e) {

                        let nextEl = this.nextElementSibling;
                        if(nextEl && nextEl.classList.contains('submenu')) {
                            // prevent opening link if link needs to open dropdown
                            e.preventDefault();
                            console.log(nextEl);
                            if(nextEl.style.display == 'block'){
                                nextEl.style.display = 'none';
                            } else {
                                nextEl.style.display = 'block';
                            }

                        }
                    });
                })
            }
            // end if innerWidth

        });
        // DOMContentLoaded  end
    </script>
</head>
<body id="blue-hero">
    
<!-- offcanvas-menu -->

<div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header flex-column">
            <span style="padding-top: 8px; color:white; font-size: 20px">Menü</span>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas-body p-0">
            <!-- offcanvas-link -->
            <div class="offcanvas-link py-4">
                <ul>
                    <li class="dropdown">
                        <a style="font-size: 19px; text-align: center" href="{{route('index')}}" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Leistungen</a>
                        <ul class="dropdown-menu">
                            <li><strong>Gebrauchtwagencheck</strong></li>
                            <li><a class="dropdown-item" href="{{route('gebrauchtwagencheck')}}">Auto/ PKW Check</a></li>
                            <li><a class="dropdown-item" href="{{route('transporter')}}">Transporter-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('oldtimer')}}">Oldtimer-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('sportwagen')}}">Sportwagen-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('wohnmobil')}}">Wohnmobil-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('kaufbegleitung')}}">Kaufbegleitung</a></li>
                            <li><strong style="margin-top: 15px">Inserat-Prüfungen</strong></li>           
                            <li><a class="dropdown-item" href="{{route('inseratcheck')}}">Inserat-Check</a></li>
                            <li><a class="dropdown-item" href="{{route('wertermittlung')}}">Wert-Ermittlung</a></li>
                            <li><strong style="margin-top: 15px">Weitere Angebote</strong></li>
                            <li><a class="dropdown-item" href="{{route('fahrzeuglieferung')}}">Fahrzeug-Lieferung</a></li>
                            <li><a class="dropdown-item" href="/Kfz-Kaufvertrag.pdf">Kfz-Kaufvertrag</a></li>
                        </ul>
                    </li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('faq')}}">FAQ</a></li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('rezensionen')}}">Rezensionen</a></li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="https://blog.carspector.de">Blog</a></li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('kontakt')}}">Kontakt</a></li>
                    <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('login')}}">Login</a></li>
                    <br>
                    <hr style="color: white; border-width: 1px; background-color: white">
                    <div style="text-align: center; padding-top: 10px">
                        <p style="font-size: 17px; color: white"><b>Fragen? Support kostenlos anrufen.</b></p>
                        <p style="font-size: 17px; color: white">Mo-Sa: 9:00 - 20:00 Uhr</p>
                        <a href="tel:021192325550" style="width: 90%; height: 50px; font-size: 16px" class="btn btn-secondary shadow">0211 92325550</a>
                    </div>
                </ul>
            </div>
        </div>
    </div>

<!-- offcanvas-menu-end -->


<!-- header-start -->
<header class="header header-two">
    <div class="header-wrapper container d-flex align-items-center justify-content-center justify-content-md-between">
        <!-- header-logo -->
        <div class="header-logo">
            <a href="{{url('/')}}"><img src="{{ asset('front/imgs/logos/logo-2.png') }}" alt="Auto vor dem Kauf prüfen lassen; Gebrauchtwagencheck"> <span style="letter-spacing: 0.1px" class="d-none d-lg-block">Auto gecheckt,<br>sicher gekauft.</span></a>
        </div>
        <!-- header-logo-end -->

        <!-- header-right -->
        <div class="header-end align-items-center d-none d-lg-flex">
            <div class="header-nav ">
                <ul style="letter-spacing: 0.5px" class="d-flex align-items-center justify-content-end">
                    <li class="dropdown">
                        <a href="{{route('index')}}" class="dropdown-toggle"  type="button" data-bs-toggle="dropdown" >Leistungen</a>
                            <ul class="dropdown-menu " style="border-radius: 2 !important;z-index: 99999999 !important;">
                            <li style="padding-top: 5px"><strong style="padding-left: 15px">Fahrzeug-Checks</strong></li>      
                                <li style="padding-top: 5px"><a class="dropdown-item" href="#">Gebrauchtwagencheck &raquo; </a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('gebrauchtwagencheck')}}">Auto/ PKW</a></li>
                                        <li><a class="dropdown-item" href="{{route('transporter')}}">Transporter</a></li>
                                        <li><a class="dropdown-item" href="{{route('oldtimer')}}">Oldtimer</a></li>
                                        <li><a class="dropdown-item" href="{{route('sportwagen')}}">Sportwagen</a></li>
                                        <li><a class="dropdown-item" href="{{route('wohnmobil')}}">Wohnmobil</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="{{route('kaufbegleitung')}}">Kaufbegleitung</a></li>
                                <br>
                                <li><strong style="padding-left: 15px">Inserat-Prüfungen</strong></li>
                                <li style="padding-top: 5px"><a class="dropdown-item" href="{{route('inseratcheck')}}">Inserat-Check</a></li>
                                <li><a class="dropdown-item" href="{{route('wertermittlung')}}">Wert-Ermittlung</a></li>
                                <br>
                                <li><strong style="padding-left: 15px">Weitere Angebote</strong></li> 
                                <li style="padding-top: 5px"><a class="dropdown-item" href="{{route('fahrzeuglieferung')}}">Fahrzeug-Lieferung</a></li>
                                <li><a class="dropdown-item" href="/Kfz-Kaufvertrag.pdf">Kfz-Kaufvertrag</a></li>
                        </ul>

                    </li>
                    <li><a href="{{route('faq')}}">FAQ</a></li>
                    <li><a href="{{route('rezensionen')}}">Rezensionen</a></li>
                    <li><a href="https://blog.carspector.de">Blog</a></li>
                    <li><a href="{{route('kontakt')}}">Kontakt</a></li>
                </ul>
            </div>
            <div class="header-btn">
               @if(auth()->user())
                   @if(auth()->user()->type=='examiner')
                        <a href="{{route('examiner.dashboard')}}">Mein Profil</a>
                    @else
                        <a href="{{route('user.dashboard')}}">Mein Profil</a>
                    @endif

                @else
                    <a href="{{route('login')}}">Login</a>
               @endif
            </div>
        </div>
        <!-- header-right-end -->

        <!-- menu-bar -->
        <div class="bar d-lg-none">
            <button class="bg-transparent border-0 p-0 text-white fs-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <!-- menu-bar-end -->
    </div>
</header>
<!-- header-start-end -->

<!-- main -->
@yield('content')
<!-- main-end -->

<!-- footer-start -->
@include('partials.footer')
<!-- footer-start-end -->

<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/js/swiper-bundle.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('front/js/scripts.js') }}"></script>
@yield('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var swiper = new Swiper(".slider-active", {
        slidesPerView: 1,
        spaceBetween: 50,
        loop: true,
        breakpoints: {
            992: {
                slidesPerView: 2,
                spaceBetween: 70,
            }
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

</script>
@if(session('success'))
    <script>
        toastr.success('','{{session('success')}}')
    </script>
@endif
@if(session('error'))
    <script>
        toastr.success('','{{session('error')}}')
    </script>
@endif
</body>
</html>

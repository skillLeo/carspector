<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gebrauchtwagencheck vor Ort für dein gewünschtes Fahrzeug. Auto vor dem Kauf prüfen lassen. Prüfungen aller Fahrzeugklassen. Autos, Transporter,
    Oldtimer, Sportwagen, Wohnmobile. ✓ TÜV-Zertifiziert ✓ Gutachten ✓ Sicher und günstig Gebrauchtwagen kaufen ✓ Garantie">
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
    <link rel="stylesheet" href="{{ asset('front-home/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-home/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-home/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-home/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-home/css/responsive.css') }}" />
    <!-- css-start-end -->

    <style>
        .dropdown-item{
            color: #5e5b5b !important;
            /*border-bottom: 1px solid #e7e7e7;*/
        }
        .swiper-slide{
            /*display: block !important;*/
        }
        @keyframes blink {
            0% {
                background-color: #ccc;
            }
            49% {
                background-color: #ccc;
            }
            50% {
                background-color: transparent;
            }
            99% {
                background-color: transparent;
            }
            100% {
                background-color: #ccc;
            }
        }
        @media screen and (max-width: 767px) {
            .mobile-bullet-list-hero{
                margin: 0 auto;
                width: 234px;
            }
            .btn-footer-bottom{

                /*height: 50px !important;*/

            }
            /*.btn-check-city{*/
            /*    display: none;*/
            /*}*/
        }

        @media screen and (min-width: 568px) {
            .blue-hero-form{
                padding-right: 50px;
            }
        }

        @media screen and (max-width: 767px) {
            .mobile-review{
                padding-top: 75px;
                padding-bottom: 75px;
            }

            .hero-list{
                font-size: 13px;
            }
        }

        .sticky-bottom-footer{
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #00449a;
            z-index: 9999999999;
        }
        .offcanvas{
            max-width: 75% !important;
        }
        .btn-footer-bottom{
            width: auto !important;
        }
        .check-card {
            height: 150px;
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

<body>

<!-- mobile-menu-start -->
<div class="mobile-menu d-lg-none">
    <div class="offcanvas offcanvas-end bg-primary p-4" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

        <div class="offcanvas-header flex-column">
            <span style="padding-top: 8px; color:white; font-size: 20px">Menü</span>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="offcanvas-body p-0">

            <div class="mobile-menu-link py-4 border-white">
            <ul>
            <li class="dropdown">
                    <a style="font-size: 19px; text-align: center" href="{{route('index')}}" class="dropdown-toggle"  type="button" data-bs-toggle="dropdown" aria-expanded="false">Leistungen</a>
                    <ul class="dropdown-menu " style="border-radius: 0 !important;z-index: 99999999 !important;padding: 8px 8px;">
                                <li><a class="dropdown-item" href="{{route('vorteile')}}">Auto/ PKW Prüfung</a></li>
                                <li><a class="dropdown-item" href="{{route('vorteile3')}}">Transporter Prüfung</a></li>
                                <li><a class="dropdown-item" href="{{route('vorteile2')}}">Oldtimer Prüfung</a></li>
                                <li><a class="dropdown-item" href="{{route('vorteile4')}}">Sportwagen Prüfung</a></li>
                                <li><a class="dropdown-item" href="{{route('vorteile5')}}">Wohnmobil Prüfung</a></li>
                                <li><a class="dropdown-item" href="{{route('vorteile1')}}">Kaufbegleitung</a></li>
                                <li><a class="dropdown-item" href="{{route('vorteile6')}}">Inserat Check</a></li>
                    </ul>

                </li>
                <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('faq')}}">FAQ</a></li>
                <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="https://blog.carspector.de">Blog</a></li>
                <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('kontakt')}}">Kontakt</a></li>
                <li><a style="font-size: 19px; text-align: center; padding-top: 15px" href="{{route('login')}}">Login</a></li>
            </ul>
            </div>

        </div>

    </div>
</div>
<!-- mobile-menu-end -->
<header class="header position-absolute top-0 start-0 w-100 z-3">
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
                        <ul class="dropdown-menu " style="border-radius: 0 !important;z-index: 99999999 !important;">       
                                <li><a class="dropdown-item" href="#">Gebrauchtwagencheck &raquo; </a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('vorteile')}}">Auto/ PKW</a></li>
                                        <li><a class="dropdown-item" href="{{route('vorteile3')}}">Transporter</a></li>
                                        <li><a class="dropdown-item" href="{{route('vorteile2')}}">Oldtimer</a></li>
                                        <li><a class="dropdown-item" href="{{route('vorteile4')}}">Sportwagen</a></li>
                                        <li><a class="dropdown-item" href="{{route('vorteile5')}}">Wohnmobil</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="{{route('vorteile1')}}">Kaufbegleitung</a></li>
                                <li><a class="dropdown-item" href="{{route('vorteile6')}}">Inserat Check</a></li>
                            </ul>
                    </li>
                    <li><a href="{{route('faq')}}">FAQ</a></li>
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
            <button class="mobile-menu-btn d-lg-none bg-transparent border-0 p-0 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <!-- menu-bar-end -->
    </div>
</header>



<!-- main -->
<main>

    <!-- hero-area-start -->
    <section class="section hero-area position-relative z-1">
        <div class="container">
          <div class="hero-wrapper px-1 px-sm-0">
            <!-- hero-content -->
            <div class="hero-content">
              <h1 class="fw-bold text-white pb-5 pb-sm-4 mb-0 mb-sm-2"><span class="text-secondary">Sicherer</span> Autokauf kann so einfach sein.</h1>

              <p class="hero-para text-white pb-5 mb-2 mb-sm-0">Wir prüfen dein gewünschtes Fahrzeug vor dem Kauf und erstellen ein zertifiziertes Prüfgutachten.</p>

              <div class="hero-form shadow">
                <form action="" class="m-auto">
                  <div>
                    <div class="input-box input-box-icon mb-0 flex-grow-1">
                      <span class="icon"><img src="front/imgs/sedan.png" alt="Gebrauchtwagencheck" width="50px" height="50px"></span>
                      <input type="text" placeholder="Stadt / PLZ des Fahrzeugs" class="form-control shadow-1">
                    </div>
                    <button type="submit" class="btn btn-secondary form-btn fw-bold mt-2">CHECK</button>
                  </div>
                </form>
              </div>

              <div class="hero-ratings d-flex align-items-center justify-content-center justify-content-sm-start gap-4">
                <span class="ratings-check flex-shrink-0">
                  <img src="front/imgs/high-quality.png" alt="Zertifiziertes Gutachten Gebrauchtwagen">
                </span>

                <div class="rating-details">
                  <div class="rd-top d-inline-flex align-items-center gap-3 mb-2">
                    <span class="text-white fw-bold">4.8</span>
                    <div class="ratings text-secondary">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                  </div>
                  </div>

                  <div class="rd-bottom">
                    <p class="text-white mb-0"><span class="fw-bold">2.938</span> Bewertungen</p>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </section>

      <div class="hero-mobile-bg d-sm-none position-relative">
        <img src="front-home/imgs/bg/hero-mobile-bg.jpg" alt="">
      </div>
      <!-- hero-area-start-end -->

    <!-- about-cards-section-start -->
    <section class="about-cards-section section-bg">
        <div class="container">
          <div class="about-cards-wrapper m-auto position-relative">
            <div class="about-cards-slider swiper mySwiper">
              <div class="swiper-wrapper">

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/tuv.png" alt="TÜV Zertifiziert Gebrauchtwagencheck" height="50px"></span>
                  TÜV-Vorgaben
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/adac.png" alt="ADAC Gebrauchtwagencheck" height="25px"></span>
                  Empfohlen
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/shield.png" alt="Prüfungsgarantie" height="50px"></span>
                  Prüfungsgarantie
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="front/imgs/germany.png" alt="Gebrauchtwagencheck Deutschlandweit" height="50px"></span>
                  Deutschlandweit
                </div>
                
                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="assets/imgs/about-cards/tuv.png" alt=""></span>
                  Schnelle Buchung
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="assets/imgs/about-cards/adac.png" alt=""></span>
                  Zertifizierte Prüfer
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="assets/imgs/about-cards/prufungsgarantie.png" alt=""></span>
                  Alle Fahrzeugklassen
                </div>

                <div class="single-about-card swiper-slide">
                  <span class="icon"><img src="assets/imgs/about-cards/deutsch.png" alt=""></span>
                  24/7 Kundenservice
                </div>

              </div>
            </div>

            <div class="about-cards-pagination swiper-pagination"></div>

          </div>
        </div>
      </section>
      <!-- about-cards-section-end -->

    <!--
    <section class="user-section section-padding">
        <div class="container">
            <div class="unsure-wrapper m-auto">
                <div class="row g-0 unsure-wrapper-row">
                    <div class="col-lg-6">
                        <div class="unsure-text mt-lg-3">
                            <h2 class="unsure-heading">Unsicher beim Autokauf?</h2>
                            <div class="unsure-icon mb-3">
                                <span><img src="front-home/imgs/icons/delete-circle.svg" alt=""></span>
                            </div>
                            <p class="paragraph unsure-para">Leider muss man heutzutage mit Vorsicht und Achtung dem Verkäufer gegenüber treten.
                                <br><br>
                                Betrug und Abzocke tritt immer häufiger auf und Käufer werden tagtäglich damit konfrontiert.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="unsure-img">
                            <img src="front-home/imgs/thumbs/unsuer-thumb.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->

    <!-- not-anymore-section-end -->
    <section class="not-anymore-section section-padding">
        <div class="container">
          <div class="not-anymore-wrapper m-auto">
            <div class="row flex-column-reverse flex-lg-row g-0 not-anymore-wrapper-row">
              <div class="col-lg-6">
                <div class="not-anymore-img">
                  <img src="assets/imgs/thumbs/not-anymore-thumb.jpg" alt="">
                </div>

                <div class="text-center text-md-start d-sm-none pt-4 mt-3">
                  <button class="btn btn-secondary book-a-check-btn">Jetzt Check buchen</button>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="not-anymore-text mt-xl-3">
                  <h2 class="not-anymore-heading mb-0">Unsicher beim Autokauf?</h2>
                  <img src="front/imgs/car-check-3.png" alt="" class="not-anymore-icon my-3">
                  <p class="paragraph not-anymore-para mb-sm-4"><b>Kein Problem!</b> Nach unserem Check bist du über den technischen und optischen Zustand bestens informiert 
                  und kannst mit unserer Kaufempfehlung eine fundierte Entscheidung treffen.</p>
                  <div class="text-center text-md-start d-none d-sm-block">
                    <button class="btn btn-secondary book-a-check-btn">Jetzt Check buchen</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </section>
      <!-- not-anymore-section-end -->

    <!-- advantages-section-start -->
    <section class="advantages-section section-padding section-bg">
        <div class="container">
          <div class="advantages-wrapper">
            <h2 class="advantages-heading text-center pb-5 mb-0 mb-lg-3">Deine Vorteile mit Carspector</h2>

            <div class="advantages-cards">
              <div class="row advantages-cards-row g-4 g-xxl-5">

                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                        <img src="front/imgs/check-2.png" alt="">
                      </span>

                      <div style="padding-top: 10px" class="sac-info">
                        <span class="fw-bold">Sicherheit vor dem Kauf</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="">
                      </span>

                      <div style="padding-top: 10px" class="sac-info">
                        <span class="fw-bold">Vermeide hohe Kosten</span>
                      </div>
                    </div>

                    <p class="sac-para mb-0">durch unsere detaillierte Kostenkalkulation, aktuelle Wertermittlung, Minderwertkalkulation und anstehender Kosten.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="">
                      </span>

                      <div style="padding-top: 10px" class="sac-info">
                        <span class="fw-bold">Schutz vor Betrug</span>
                      </div>
                    </div>

                    <p class="sac-para mb-0">dank tiefgreifender Checks auf Unfallschäden, Tacho-Manipulation, Nachlackierungen, getätigter Reparaturen und mehr.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="">
                      </span>

                      <div style="padding-top: 10px" class="sac-info">
                        <span class="fw-bold">Entspannt von zuhause</span>
                      </div>
                    </div>

                    <p class="sac-para mb-0">alles über den aktuellen technischen und optischen Zustand deines gewünschten Fahrzeugs erfahren.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="">
                      </span>

                      <div style="padding-top: 10px" class="sac-info">
                        <span class="fw-bold">Fundierte Kaufentscheidung</span>
                      </div>
                    </div>

                    <p class="sac-para mb-0">treffen dank argumentativer Kaufempfehlung, kompetenter Expertenanalyse und Einschätzung, sowie umfassender Berichterstattung.</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                    <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="front/imgs/check-2.png" alt="">
                      </span>

                      <div style="padding-top: 10px" class="sac-info">
                        <span class="fw-bold">Sorgenfreie Fahrt</span>
                      </div>
                    </div>

                    <p class="sac-para mb-0">mit deinem neuen Traumauto und einem sicheren Gefühl, dank umfassender Informationen über den Fahrzeugzustand und einem fairen Preis.</p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
       </section>
      <!-- advantages-section-end -->

<!-- ratings-section-start -->
<section class="ratings-section section-padding section-bg">
        <div class="container">
          <div class="ratings-wrapper d-flex flex-column justify-content-center align-items-center gap-5">
            <span class="ratings-check flex-shrink-0">
              <img src="front/imgs/high-quality.png" alt="Zertifiziertes Gutachten Gebrauchtwagen">
            </span>
    
            <div class="ratings-content">
              <h2 class="ratings-heading mb-3 mb-sm-0">Tätige keinen Fehlkauf!</h2>

              <div class="rating-details d-flex flex-column flex-sm-row align-items-center ms-md-2 pt-4 pt-md-2">
                <div class="rd-top d-inline-flex align-items-center gap-3">
                  <span class="text-primary fw-bold">4.8</span>
                  <div class="ratings text-secondary">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                </div>
      
                <div class="rd-bottom pt-1 pt-sm-0">
                  <p class="text-primary mb-0"><span class="fw-bold">2.938</span> Bewertungen</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ratings-section-end -->

    <!-- how-does-work-section-start -->
    <section class="how-does-work-section">
        <div class="container">
            <div class="how-does-work-wrapper">
                <h2 class="hdw-heading text-center">Wie funktioniert Carspector?</h2>

                <div class="row hdw-row">
                    <div class="col-md-6 col-lg-4">
                        <div class="single-hdw-item single-hdw-item-1">
                            <div class="hdw-item-inner d-flex flex-column">
                                <div class="hdw-icon flex-shrink-0">
                      <span class="d-inline-flex justify-content-start align-items-center">
                      <img src="front/imgs/sedan.png" alt="Gebrauchtwagencheck">
                      </span>
                                </div>

                                <span class="hdw-number text-secondary fw-bold py-3">1.</span>

                                <h5 class="hdw-item-heading text-primary pb-2">Wähle das Fahrzeug</h5>

                                <p class="hdw-para mb-0">Wähle dein gewünschtes Fahrzeug und deinen gewünschten Check.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="single-hdw-item single-hdw-item-2">
                            <div class="hdw-item-inner d-flex flex-column">
                                <div class="hdw-icon flex-shrink-0">
                      <span class="d-inline-flex justify-content-start align-items-center">
                        <img src="front/imgs/step-2-icon.png" alt="">
                      </span>
                                </div>

                                <span class="hdw-number text-secondary fw-bold py-3">2.</span>

                                <h5 class="hdw-item-heading text-primary pb-2">Wir checken das Fahrzeug</h5>

                                <p class="hdw-para mb-0">Ein zertifizierter KFZ-Experte wird das Fahrzeug anhand unseres Leitfadens checken.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="single-hdw-item single-hdw-item-3">
                            <div class="hdw-item-inner d-flex flex-column">
                                <div class="hdw-icon flex-shrink-0">
                      <span class="d-inline-flex justify-content-start align-items-center">
                      <img src="front/imgs/step-3-icon.png" alt="">
                      </span>
                                </div>

                                <span class="hdw-number text-secondary fw-bold py-3">3.</span>

                                <h5 class="hdw-item-heading text-primary pb-2">Bericht erhalten</h5>

                                <p class="hdw-para mb-0">Wir erstellen einen zertifizierten Bericht, der den Zustand und unsere Kaufempfehlung beinhaltet.</p>
                            </div>

                            <div class="pt-4 mt-3">
                                <a href="{{route('vorteile')}}"><button class="btn btn-secondary hdw-report-btn fw-normal">Was beinhaltet der Bericht?</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- how-does-work-section-end -->

    <!-- reviews-section-start -->
    <section class="reviews-section section-padding section-bg">
        <div class="container">
            <div class="reviews-wrapper">
            <h2 class="advantages-heading text-center pb-5 mb-0 mb-lg-3">Darauf sind wir stolz</h2>
                <div class="advantages-cards">
                    <div class="row advantages-cards-row g-4 g-xxl-5">

                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/happy.png" alt="Gebrauchtwagencheck; Auto vor dem Kauf prüfen lassen">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">10.000+</span>
                                        <p class="mb-0">zufriedene Kunden</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Über 10.000 Kunden sind von unseren Produkten und Dienstleistungen überzeugt.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/loupe.png" alt="Fotos Zustand Bilder Auto Fahrzeug Videos">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">100+</span>
                                        <p class="mb-0">Prüfungen am Tag</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Wir führen täglich über 100 Prüfungen zuverlässig und effizient durch.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/star.png" alt="Auto Fahrzeug Gebrauchtwagen Bewertung objektiv">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">4,7/5</span>
                                        <p class="mb-0">Sterne im Durchschnitt</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Unsere Kunden bewerten uns im Durchschnitt mit 4,7 von 5 Sternen.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/multiple.png" alt="Gebrauchtwagencheck; Auto vor dem Kauf prüfen lassen">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">10+</span>
                                        <p class="mb-0">Dienstleistungen</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Wir bieten über 10 verschiedene Dienstleistungen und Leistungen an.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/shield.png" alt="Fotos Zustand Bilder Auto Fahrzeug Videos">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">5+</span>
                                        <p class="mb-0">Jahre Erfahrung</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Mit über 5 Jahren Erfahrung sind wir Experten auf unserem Gebiet.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                      <img src="assets/imgs/iconhome/skyline.png" alt="Auto Fahrzeug Gebrauchtwagen Bewertung objektiv">
                      </span>

                                    <div class="sac-info">
                                        <span class="fw-bold">500 +</span>
                                        <p class="mb-0">verfügbare Städte</p>
                                    </div>
                                </div>

                                <p class="sac-para mb-0">Unsere Dienstleistungen sind in mehr als 500 Städten Deutschlands verfügbar.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <h4 class="reviews-title fs-4 text-center mb-0">Mehr als 2.500 <span class="text-secondary">5-Sterne</span> Bewertungen!</h4>
            </div>
        </div>
    </section>
    <!-- reviews-section-end -->

    <!-- testimonial-section-start -->
    <section class="testimonial-section">
        <div class="container">
            <div class="testimonial-wrapper d-flex flex-wrap align-items-center justify-content-center">

                <div class="testimonial-card testimonial-card-1 d-flex flex-column justify-content-between">
                    <div class="testimonial-info d-flex flex-column">
                        <div class="testimonial-ratings text-center text-secondary pb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-paragraph text-center">
                            “Nachdem ich meinen Führerschein bestanden habe, war ich sehr unsicher was mein erstes Auto betrifft. Auf die Website gegangen, mit drei Klicks einen Gutachter gebucht und Zack.”
                        </p>
                    </div>
                    <div class="client-info d-flex align-items-center gap-3">
                        <img src="front-home/imgs/client/client-1.png" alt="Client">
                        <h6 class="fw-normal mb-0">Annika Lorenz</h6>
                    </div>
                </div>

                <div class="testimonial-card testimonial-card-2 d-flex flex-column justify-content-between">
                    <div class="testimonial-info d-flex flex-column">
                        <div class="testimonial-ratings text-center text-secondary pb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-paragraph text-center">
                            “Nachdem ich meinen Führerschein bestanden habe, war ich sehr unsicher was mein erstes Auto betrifft. Auf die Website gegangen, mit drei Klicks einen Gutachter gebucht und Zack.”
                        </p>
                    </div>
                    <div class="client-info d-flex align-items-center gap-3">
                        <img src="front-home/imgs/client/client-1.png" alt="Client">
                        <h6 class="fw-normal mb-0">Annika Lorenz</h6>
                    </div>
                </div>

                <div class="testimonial-card testimonial-card-3 d-flex flex-column justify-content-between">
                    <div class="testimonial-info d-flex flex-column">
                        <div class="testimonial-ratings text-center text-secondary pb-4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-paragraph text-center">
                            “Nachdem ich meinen Führerschein bestanden habe, war ich sehr unsicher was mein erstes Auto betrifft. Auf die Website gegangen, mit drei Klicks einen Gutachter gebucht und Zack.”
                        </p>
                    </div>
                    <div class="client-info d-flex align-items-center gap-3">
                        <img src="front-home/imgs/client/client-1.png" alt="Client">
                        <h6 class="fw-normal mb-0">Annika Lorenz</h6>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- testimonial-section-end -->

    <!--------- FAQ section start --------->
    <section id="faq-section" class="faq-area section-bg">
        <div class="container-sm">
            <div class="section-heading">
                <h2>Meist gestellte Fragen.</h2>
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
                                    Carspector ist <b>deutschlands führender Anbieter von Gebrauchtwagenchecks</b> für Fahrzeuge aller Klassen. Unter Anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und
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
                                    <b>Wir prüfen Fahrzeuge aller Klassen.</b> Unter Anderem prüfen wir Autos/PKW, Transporter, Oldtimer, Sportwagen und
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
                                    Die Prüfungsinhalte variieren pro Fahrzeugklasse. Weitere Informationen zu den Inhalten des jeweiligen Fahrzeugs findest <a href="{{route('faq')}}">hier im FAQ</a>.<br><br>
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
                        <br><br><br>
                        <center><a href="{{route('faq')}}" class="section-btn" style="width:300px">Weitere Fragen ansehen</a></center>
                </div>
            </div>
        </div>
    </section>
    <!--------- FAQ section end --------->

    <!--------- safe-and-easy section start --------->
    <section id="safe-and-easy" class="safe-and-easy-section">
        <div class="container position-relative">
            <div class="safe-and-easy-wrapper">
                <div class="row g-0 safe-and-easy-wrapper-row">
                    <div class="col-lg-6">
                        <div class="safe-and-easy-wrapper mt-xl-4">
                            <div class="section-heading">
                                <h2 class="d-none d-sm-block">Wir machen den Gebrauchtwagenkauf sicher. und einfach. und günstig.</h2>
                                <h2 class="d-sm-none">Wir machen den Gebrauchtwagen<br>kauf sicher. und einfach. und günstig.</h2>
                            </div>
                            <p class="paragraph pt-3 pb-5">
                                Durch gefundene Mängel und Verhandlungstricks, hilft dir dein persönlicher Prüfer in der Preisverhandlung und versichert dir den besten Deal.
                            </p>
                            <a href="#" class="section-btn">Jetzt loslegen</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="safe-easy-thumb">
                            <img src="front-home/imgs/thumbs/safe-and-easy-thumb.png" alt="Safe and Easy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------- safe-and-easy section end --------->

    <!-- ratings-section-start -->
    <section class="ratings-section section-padding section-bg">
        <div class="container">
          <div class="ratings-wrapper d-flex flex-column justify-content-center align-items-center gap-5">
            <span class="ratings-check flex-shrink-0">
              <img src="front/imgs/high-quality.png" alt="Zertifiziertes Gutachten Gebrauchtwagen">
            </span>
    
            <div class="ratings-content">
              <h2 class="ratings-heading mb-3 mb-sm-0">Tätige keinen Fehlkauf!</h2>

              <div class="rating-details d-flex flex-column flex-sm-row align-items-center ms-md-2 pt-4 pt-md-2">
                <div class="rd-top d-inline-flex align-items-center gap-3">
                  <span class="text-primary fw-bold">4.8</span>
                  <div class="ratings text-secondary">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                </div>
      
                <div class="rd-bottom pt-1 pt-sm-0">
                  <p class="text-primary mb-0"><span class="fw-bold">2.938</span> Bewertungen</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ratings-section-end -->

    <!-- known-from Section start -->
    <section class="known-from-section">
        <div class="container">
            <div class="known-from-wrapper">
                <div class="section-heading">
                    <h2 class="text-center">Carspector ist bekannt aus</h2>
                </div>
                <div class="known-from-items m-auto d-flex flex-column flex-sm-row justify-content-between align-items-center align-items-sm-start">
                    <div class="kf-single-item text-center">
                        <div class="known-from-img">
                            <img src="front-home/imgs/known-from/img-1.png" alt="Known From">
                        </div>
                        <p class="paragraph">Autobild</p>
                    </div>
                    <div class="kf-single-item text-center">
                        <div class="known-from-img">
                            <img src="front-home/imgs/known-from/img-2.png" alt="Known From">
                        </div>
                        <p class="paragraph">Düsseldorfer Wirtschaft</p>
                    </div>
                    <div class="kf-single-item text-center">
                        <div class="known-from-img">
                            <img src="front-home/imgs/known-from/img-3.png" alt="Known From">
                        </div>
                        <p class="paragraph">Youtube und weitere soziale Medien</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- known-from Section End -->

</main>
<div class="sticky-bottom-footer" style="display: none">
    <div class="hero-form hero-area-form blue-hero-form" style="padding: 10px 10px;margin: auto !important;background-color: transparent !important;">
        <form action="{{route('booking.option-page')}}" style="margin: auto !important;">

            <div class="d-flex gap-1 gap-md-2 w-100 align-items-center  flex-md-row mobile-hero-area-btns">
                <div class="input-box input-box-icon mb-0 flex-grow-1 align-items-center">
                    <span class="icon"><img src="front/imgs/sedan.png" alt="Gebrauchtwagencheck" width="50px" height="50px"></span>
                    <input name="city" type="text" pattern="[0-9-A-Za-zäöüÄÖÜß\s]+.*[^ ].*" placeholder="Stadt / PLZ" class="form-control input-shadow-1" required>
                </div>
                <button type="submit" class="btn btn-secondary mt-0 btn-check-city btn-footer-bottom fw-bold">CHECK</button>

            </div>
        </form>
    </div>
</div>
<!-- main-end -->

<!-- footer-start -->
@include('partials.footer')
<!-- footer-start-end -->


<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('front-home/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front-home/js/swiper-bundle.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('front-home/js/scripts.js') }}"></script>
@yield('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var swiper = new Swiper(".about-cards-slider", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
            }
        },
        pagination: {
            el: ".about-cards-pagination",
            clickable: true,
        },
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

    $(window).scroll(function() {
        var ScrollTop = $(window).scrollTop();
        if (ScrollTop > 750) {
            $('.sticky-bottom-footer').fadeIn(600);
        }else{
            $('.sticky-bottom-footer').fadeOut(100);
        }
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

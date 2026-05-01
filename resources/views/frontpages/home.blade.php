<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Title & Favicon -->
    <title>CarSpector</title>
    <link rel="shortcut icon" href="front-home/imgs/logos/favicon.png" type="image/x-icon">

    <!-- css-start -->
    <link rel="stylesheet" href="front-home/css/bootstrap.min.css" />
    <link rel="stylesheet" href="front-home/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="front-home/css/all.min.css" />
    <link rel="stylesheet" href="front-home/css/style.css" />
    <link rel="stylesheet" href="front-home/css/responsive.css" />
    <!-- css-start-end -->
</head>

<body>

<!-- mobile-menu-start -->
<div class="mobile-menu d-lg-none">
    <div class="offcanvas offcanvas-end bg-primary p-4" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

        <div class="offcanvas-header flex-column">
            <img src="front-home/imgs/logos/mobile-menu-logo.svg" class="offcanvas-logo" alt="">
            <h5 class="offcanvas-title fw-normal" id="offcanvasExampleLabel">Carspector</h5>
            <h6 class="fw-semibold">Auto gecheckt, sicher gekauft.</h6>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="offcanvas-body p-0">

            <div class="mobile-menu-link py-4 border-bottom border-white">
                <ul>
                    <li><a href="">Meist gestellte Fragen</a></li>
                    <li><a href="">Dein Check</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
            </div>

            <div class="mobile-menu-social py-4 d-flex align-items-center gap-4 ">
                <a href=""><img src="front-home/imgs/social/facebook-white.svg" alt=""></a>
                <a href=""><img src="front-home/imgs/social/insta-white.svg" alt=""></a>
                <a href=""><img src="front-home/imgs/social/linkdin-white.svg" alt=""></a>
                <a href=""><img src="front-home/imgs/social/twitter-white.svg" alt=""></a>
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

                            <li><a class="dropdown-item" href="{{route('vorteile')}}">Auto/ PKW Prüfung</a></li>
                            <li><a class="dropdown-item" href="{{route('vorteile3')}}">Transporter Prüfung</a></li>
                            <li><a class="dropdown-item" href="{{route('vorteile2')}}">Oldtimer Prüfung</a></li>
                            <li><a class="dropdown-item" href="{{route('vorteile4')}}">Sportwagen Prüfung</a></li>
                            <li><a class="dropdown-item" href="{{route('vorteile5')}}">Wohnmobil Prüfung</a></li>
                            <li><a class="dropdown-item" href="{{route('vorteile1')}}">Auto/ PKW Kaufbegleitung</a></li>
                            <li><a class="dropdown-item" href="#"> Dropdown item 2 &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
                                    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
                                </ul>
                            </li>
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

<!-- header-start -->
{{--<header class="header position-absolute top-0 start-0 w-100 z-3">--}}
{{--    <div class="container">--}}
{{--        <div class="header-wrapper d-flex align-items-center justify-content-center justify-content-md-between">--}}
{{--            <!-- header-logo -->--}}
{{--            <div class="header-logo">--}}
{{--                <a href="index.html"><img src="front-home/imgs/logos/logo.png" alt=""> <span class="d-none d-lg-block">Auto gecheckt, sicher gekauft.</span></a>--}}
{{--            </div>--}}
{{--            <!-- header-logo-end -->--}}

{{--            <!-- header-right -->--}}
{{--            <div class="header-end align-items-center d-none d-lg-flex">--}}
{{--                <div class="header-nav">--}}
{{--                    <ul class="d-flex align-items-center justify-content-end">--}}
{{--                        <li><a href="">Meist gestellte Fragen</a></li>--}}
{{--                        <li><a href="">Dein Check</a></li>--}}
{{--                        <li><a href="">Blog</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="header-btn">--}}
{{--                    <a href="#">Login</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- header-right-end -->--}}

{{--            <!-- menu-bar -->--}}
{{--            <button class="mobile-menu-btn d-lg-none bg-transparent border-0 p-0 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">--}}
{{--                <i class="fa-solid fa-bars"></i>--}}
{{--            </button>--}}
{{--            <!-- menu-bar-end -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}
<!-- header-start-end -->

<!-- main -->
<main>

    <!-- hero-area-start -->
    <section class="section hero-area position-relative z-1">
        <div class="container">
            <div class="hero-wrapper">
                <!-- hero-content -->
                <div class="hero-content m-auto">
                    <h1 class="fw-bold text-center text-white pb-5 mb-4 mx-auto"><span class="text-secondary">Sicherer</span> Autokauf kann so einfach sein.</h1>

                    <p class="hero-para text-center text-white m-auto">Wir prüfen dein gewünschtes Fahrzeug vor dem Kauf und erstellen einen zertifizierten Bericht.</p>

                    <div class="hero-form mx-auto shadow">
                        <form action="" class="m-auto">
                            <p class="text-primary pb-1">Mein Wunschfahrzeug steht in ...</p>
                            <div>
                                <div class="input-box input-box-icon mb-0 flex-grow-1">
                                    <span class="icon"><img src="front-home/imgs/icons/car-primary.svg" alt=""></span>
                                    <input type="text" placeholder="Stadt" class="form-control shadow-1">
                                </div>
                                <button type="submit" class="btn btn-secondary fw-bold mb-md-0">CHECK</button>
                            </div>
                        </form>
                    </div>

                    <div class="hero-ratings d-flex justify-content-center align-items-center gap-4">
                <span class="ratings-check flex-shrink-0">
                  <img src="front-home/imgs/icons/ratings-check.svg" alt="">
                </span>

                        <div class="rating-details">
                            <div class="rd-top d-inline-flex align-items-center gap-3">
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
    <!-- hero-area-start-end -->

    <!-- about-cards-section-start -->
    <section class="about-cards-section section-bg">
        <div class="container">
            <div class="about-cards-wrapper m-auto position-relative">
                <div class="about-cards-slider swiper mySwiper">
                    <div class="swiper-wrapper">

                        <div class="single-about-card swiper-slide">
                            <span class="icon"><img src="front-home/imgs/about-cards/tuv.png" alt=""></span>
                            TÜV-Zertifiziert
                        </div>

                        <div class="single-about-card swiper-slide">
                            <span class="icon"><img src="front-home/imgs/about-cards/adac.png" alt=""></span>
                            Empfohlen
                        </div>

                        <div class="single-about-card swiper-slide">
                            <span class="icon"><img src="front-home/imgs/about-cards/prufungsgarantie.png" alt=""></span>
                            Prüfungsgarantie
                        </div>

                        <div class="single-about-card swiper-slide">
                            <span class="icon"><img src="front-home/imgs/about-cards/deutsch.png" alt=""></span>
                            Deutschlandweit
                        </div>

                        <div class="single-about-card swiper-slide">
                            <span class="icon"><img src="front-home/imgs/about-cards/tuv.png" alt=""></span>
                            TÜV-Zertifiziert
                        </div>

                        <div class="single-about-card swiper-slide">
                            <span class="icon"><img src="front-home/imgs/about-cards/adac.png" alt=""></span>
                            Empfohlen
                        </div>

                        <div class="single-about-card swiper-slide">
                            <span class="icon"><img src="front-home/imgs/about-cards/prufungsgarantie.png" alt=""></span>
                            Prüfungsgarantie
                        </div>

                        <div class="single-about-card swiper-slide">
                            <span class="icon"><img src="front-home/imgs/about-cards/deutsch.png" alt=""></span>
                            Deutschlandweit
                        </div>

                    </div>
                </div>

                <div class="about-cards-pagination swiper-pagination"></div>

            </div>
        </div>
    </section>
    <!-- about-cards-section-end -->

    <!-- unsuer-section-start -->
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
    <!-- unsuer-section-end -->

    <!-- not-anymore-section-end -->
    <section class="not-anymore-section section-padding section-bg">
        <div class="container">
            <div class="not-anymore-wrapper">
                <div class="row flex-column-reverse flex-lg-row g-0 not-anymore-wrapper-row">
                    <div class="col-lg-6">
                        <div class="not-anymore-img">
                            <img src="front-home/imgs/thumbs/not-anymore-thumb.jpg" alt="">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="not-anymore-text mt-xl-3">
                            <h2 class="not-anymore-heading">Jetzt nicht mehr!</h2>
                            <p class="paragraph not-anymore-para mb-4">Mit unserem Bericht weißt du genau über technischen sowie optischen Zustand Bescheid und kannst mit unserer Kaufempfehlung eine fundierte Entscheidung treffen. </p>
                            <div class="not-anypore-check d-flex align-items-center gap-4 mb-4">
                    <span class="flex-shrink-0">
                      <img src="front-home/imgs/icons/check-primary.svg" alt="">
                    </span>
                                <p class="paragraph">Lasse daher dein gewünschtes Fahrzeug vor dem Kauf prüfen und sei auf der sicheren Seite.</p>
                            </div>

                            <div class="text-center text-md-start">
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
    <section class="advantages-section section-padding">
        <div class="container">
            <div class="advantages-wrapper">
                <h2 class="advantages-heading text-center pb-5 mb-0 mb-lg-3">Deine Vorteile mit Carspector</h2>

                <div class="advantages-cards">
                    <div class="row advantages-cards-row g-4 g-xxl-5">

                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-1.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-2.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-3.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-4.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-5.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-1.png" alt="">
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
            </div>
        </div>
    </section>
    <!-- advantages-section-end -->

    <!-- ratings-section-start -->
    <section class="ratings-section section-padding section-bg">
        <div class="container">
            <div class="ratings-wrapper d-flex flex-column flex-md-row justify-content-center align-items-center gap-4">
            <span class="ratings-check flex-shrink-0">
              <img src="front-home/imgs/icons/ratings-check.svg" alt="">
            </span>

                <div class="ratings-content">
                    <h2 class="ratings-heading">Tätige keinen Fehlkauf!</h2>

                    <div class="rating-details d-flex flex-column flex-sm-row align-items-center ms-md-2 pt-4 pt-md-0">
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

                        <div class="rd-bottom pt-4 pt-sm-0">
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
                        <img src="front-home/imgs/icons/car-icon.svg" alt="">
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
                        <img src="front-home/imgs/icons/car-checklist.svg" alt="">
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
                        <img src="front-home/imgs/icons/car-report.svg" alt="">
                      </span>
                                </div>

                                <span class="hdw-number text-secondary fw-bold py-3">3.</span>

                                <h5 class="hdw-item-heading text-primary pb-2">Bericht erhalten</h5>

                                <p class="hdw-para mb-0">Wir erstellen einen zertifizierten Bericht, der den Zustand und unsere Kaufempfehlung beinhaltet.</p>
                            </div>

                            <div class="pt-4 mt-3">
                                <button class="btn btn-secondary hdw-report-btn fw-normal">Was beinhaltet der Bericht?</button>
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

                <div class="advantages-cards">
                    <div class="row advantages-cards-row g-4 g-xxl-5">

                        <div class="col-sm-6 col-lg-4">
                            <div class="single-advantage-card d-flex flex-column justify-content-between bg-white">
                                <div class="sac-top d-flex gap-4 mb-3">
                      <span class="sac-icon flex-shrink-0 d-inline-flex justify-content-center align-items-center">
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-1.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-2.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-3.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-4.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-5.png" alt="">
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
                        <img src="front-home/imgs/icons/advantages-icons/advantage-icon-1.png" alt="">
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
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-one" aria-expanded="false" aria-controls="faq-one">
                                Was ist Carspector?
                            </button>
                        </h2>
                        <div id="faq-one" class="accordion-collapse collapse show"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Carspector ist Deutschlands führender Online-Marktplatz zur Vermittlung von <br> Gebrauchtwagenprüfern. Auf der Website kannst du mit nur wenigen Klicks schnell und unkompliziert <br> deinen persönlichen & verifizierten Prüfer buchen.
                            </div>
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
                            <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Possimus distinctio consequuntur laboriosam quas quasi sit ipsa earum? Placeat sunt
                                sint harum, earum cumque error, accusamus tenetur animi molestiae voluptate modi.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-three" aria-expanded="false" aria-controls="faq-three">
                                Wie funktioniert Carspector genau?
                            </button>
                        </h2>
                        <div id="faq-three" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ipsa quasi est labore quia libero culpa. Laboriosam repudiandae assumenda dolorum
                                excepturi earum, laudantium, explicabo ipsum non esse quis velit eum dolor.</div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-four" aria-expanded="false" aria-controls="faq-four">
                                Wie funktioniert Carspector genau?
                            </button>
                        </h2>
                        <div id="faq-four" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. In
                                commodi dolor quibusdam aliquid. Odit fugit voluptate, nulla eius, repellat
                                consectetur obcaecati dolores quos earum exercitationem voluptatum tenetur similique
                                adipisci maxime?</div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-five" aria-expanded="false" aria-controls="faq-five">
                                Wie funktioniert Carspector genau?
                            </button>
                        </h2>
                        <div id="faq-five" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Blanditiis veritatis sapiente facere, neque temporibus ullam. Repudiandae
                                necessitatibus cumque inventore iusto accusamus, veniam officiis dolore rerum
                                perferendis voluptatum corporis assumenda ducimus.</div>
                        </div>
                    </div>
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
            <div class="ratings-wrapper d-flex flex-column flex-md-row justify-content-center align-items-center gap-4">
            <span class="ratings-check flex-shrink-0">
              <img src="front-home/imgs/icons/ratings-check.svg" alt="">
            </span>

                <div class="ratings-content">
                    <h2 class="ratings-heading">Tätige keinen Fehlkauf!</h2>

                    <div class="rating-details d-flex flex-column flex-sm-row align-items-center ms-md-2 pt-4 pt-md-0">
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

                        <div class="rd-bottom pt-4 pt-sm-0">
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
<!-- main-end -->

<!-- footer-start -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <p class="paragraph footer-paragraph">Carspector bietet deutschlandweit Gebrauchtwagenchecks an, mit dem Ziel den Gebrauchtwagenkauf transparenter und sicherer zu gestalten.</p>
            <div class="footer-wrapper flex-wrap d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
                <!-- footer-logo -->
                <div class="footer-logo d-flex align-items-center">
                    <a href="index.html">
                        <img src="front-home/imgs/logos/footer-logo-sm.png" alt="">
                    </a>
                    <p class="paragraph">Auto gecheckt, sicher gekauft.</p>
                </div>
                <!-- footer-logo-end -->

                <!-- footer-social -->
                <div class="footer-end">
                    <div class="footer-social d-flex align-items-center justify-content-start gap-2 justify-content-end mb-3">
                        <a href=""><img src="front-home/imgs/social/facebook.svg" alt=""></a>
                        <a href=""><img src="front-home/imgs/social/insta.svg" alt=""></a>
                        <a href=""><img src="front-home/imgs/social/linkdin.svg" alt=""></a>
                        <a href=""><img src="front-home/imgs/social/twitter.svg" alt=""></a>
                    </div>
                    <div class="footer-nav">
                        <ul class="d-flex align-items-center justify-content-center justify-content-end">
                            <li>
                                <a href="">Impressum</a>
                            </li>
                            <li>
                                <a href="">AGB</a>
                            </li>
                            <li>
                                <a href="">Datenschutz</a>
                            </li>
                            <li>
                                <a href="">Widerruf</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- footer-social--end -->
            </div>
        </div>
    </div>
</footer>
<!-- footer-start-end -->


<!-- scripts -->
<script src="front-home/js/bootstrap.bundle.min.js"></script>
<script src="front-home/js/swiper-bundle.min.js"></script>
<script src="front-home/js/scripts.js"></script>
<script src="front-home/js/plugin.js"></script>
</body>
</html>

@extends('mainpages.master-layout')
@section('header')
    <!-- =====Mobile Header Area Start===== -->
    <div class="mobile-menu d-lg-none">
        <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasRight"
             aria-labelledby="offcanvasRightLabel">

            <div class="offcanvas-header align-items-center justify-content-between border-bottom border-white">
                <div class="offcanvas-title fw-normal text-white fw-bold" id="offcanvasExampleLabel">Menü</div>
                <button type="button" class="mobile-menu-close bg-transparent border-0 p-0 text-white"
                        data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="fa-regular fa-xmark"></i>
                </button>
            </div>

            <div class="offcanvas-body">
                <nav class="mobile-nav">
                    <ul>
                        <li class="mobile-nav-item">
                            <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                               aria-controls="collapseExample" class="mobile-nav-link d-flex align-items-center">
                                Leistungen
                                <span class="nav-triangle"></span>
                            </a>

                            <div class="collapse" id="collapseExample">
                                <ul class="mobile-submenu">
                                    <li>
                                        <a href="#">Menu 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Menu 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Menu 3</a>
                                    </li>
                                    <li>
                                        <a href="#">Menu 4</a>
                                    </li>
                                    <li>
                                        <a href="#">Menu 5</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">Prüfungsinhalte</a></li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">Preise</a></li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">FAQ</a></li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">Rezensionen</a></li>
                        <li class="mobile-nav-item"><a href="#"
                                                       class="mobile-nav-link d-flex align-items-center">Kontakt</a></li>
                    </ul>
                    <a href="#" class="btn btn-outline header-btn mt-3">
                        Anmelden
                    </a>
                </nav>
            </div>

        </div>
    </div>
    <!-- =====Mobile Header Area End===== -->

    <!-- =====Header Area Start===== -->
    <header class="header bg-primary header-step position-relative z-3">
        <div class="container">
            <div
                class="header-wrapper d-flex flex-wrap align-items-center justify-content-center justify-content-md-between mx-auto position-relative">

                <!-- header-logo -->
                <div class="header-logo">
                    <a href="{{url('/')}}" class="logo d-inline-flex align-items-center gap-3">
                        <img src="{{ asset('theme-1/imgs/logos/logo.png') }}" alt="">
                    </a>
                </div>
                <!-- header-logo-end -->

                <!-- step-navigations -->
                <div class="step-navigation">
                    <button type="button" class="current">
                        <span class="ind"></span>
                        <span class="text">Fahrzeug</span>
                    </button>
                    <button type="button" class="">
                        <span class="ind"></span>
                        <span class="text">Check</span>
                    </button>
                    <button type="button" class="">
                        <span class="ind"></span>
                        <span class="text">Buchung</span>
                    </button>
                </div>
                <!-- step-navigations--end -->

            </div>
        </div>
    </header>
    <!-- =====Header Area End===== -->
@endsection
@section('content')
    <main class="main-area">

        <!------- step-wrapper Start ------->
        <section class="steps-area  pb-4 mb-4 pb-md-5">
            <div class="container mb-2">
                <div class="contentBox">
                    <div class="step-wrapper">
                        <!-- step-item -->
                        <div class="step-item show">
                            <div class="step-item--header pb-2">
                                <h2>Welchen <span>Fahrzeugtyp</span> möchtest du checken?</h2>
                            </div>
                            <div class="step-item-content">
                                <div class="type-vehicle row g-3">
                                    <div class="col-md-6">
                                        <div class="checkBtn">
                                            <input value="Auto/ PKW" name="type" type="radio" class="d-none" id="type1">
                                            <label for="type1">
                                                <span class="ind">
                                                    <span class="dot"></span>
                                                </span>
                                                <span class="text">
                                                    Auto/ PKW
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkBtn">
                                            <input type="radio" name="type" value="Transporter" class="d-none" id="type2">
                                            <label for="type2">
                                                <span class="ind">
                                                    <span class="dot"></span>
                                                </span>
                                                <span class="text">
                                                   Transporter
                                                </span>
                                                <span class="info">
                                                    <img src="{{ asset('theme-1/imgs/icons/info.svg') }}" alt="">
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkBtn">
                                            <input type="radio" name="type" value="Oldtimer" class="d-none" id="type3">
                                            <label for="type3">
                                                <span class="ind">
                                                    <span class="dot"></span>
                                                </span>
                                                <span class="text">
                                                   Oldtimer
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkBtn">
                                            <input type="radio" name="type" value="Sportwagen" class="d-none" id="type4">
                                            <label for="type4">
                                                <span class="ind">
                                                    <span class="dot"></span>
                                                </span>
                                                <span class="text">
                                                  Sportwagen
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkBtn">
                                            <input type="radio" name="type" value="Wohnmobil" class="d-none" id="type5">
                                            <label for="type5">
                                                <span class="ind">
                                                    <span class="dot"></span>
                                                </span>
                                                <span class="text">
                                                   Wohnmobil
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkBtn">
                                            <input type="radio" name="type" value="Sonstiges" class="d-none" id="type6">
                                            <label for="type6">
                                                <span class="ind">
                                                    <span class="dot"></span>
                                                </span>
                                                <span class="text">
                                                    Sonstiges
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-center pt-md-5 pt-4">
                                            <button type="button" class="nextStep btn btn-secondary ">
                                                Weiter
                                                <span class="btn-icon">
                                                    <img src="theme-1/imgs/icons/right-arrow.svg" alt="">
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- step-item-end -->
                    </div>
                </div>
            </div>
        </section>
        <!------- step-wrapper End ------->


    </main>
@endsection

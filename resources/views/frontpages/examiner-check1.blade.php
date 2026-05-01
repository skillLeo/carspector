@extends('mainpages.mainlayout')
@section('content')
    <main>
        <!-- step-info -->
        <section class="step-wrap">
            <div class="container-sm">
                
                <div class="step-cards pt-4 pt-md-0">
                  @if(count($examiners) > 0)
                    <div class="mb-5 mb-md-5 text-center text-lg-center">
                    <h3 class="fs-4">Wähle deinen Check</h3>
                </div>
                        <div class="row step-card-row">
                            <div class="col-lg-5">
                                <div class="bg-white step-card p-3 shadow-1 position-relative rounded-2 pb-5 pb-lg-4">
                                    <h5>LIVE-Komplett Check</h5>
                                    <p class="text-primary">
                                        Wir begleiten dich bei Besichtigung und prüfen dein gewünschtes Fahrzeug direkt beim Verkäufer vor Ort.
                                    </p>
                                    <p>Erhalte ein Gutachten nach <strong>TÜV</strong> Vorgaben und die einmalige Möglichkeit einen Experten an deiner Seite zu haben.</p>
                                    <ul class="mb-4">
                                    <li>
                                            <span class="icon"><img src="front/imgs/icons/check-mark.svg" alt=""></span>
                                            Komplett-Check
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-mark.svg" alt=""></span>
                                            LIVE während der Prüfung dabei
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-mark.svg" alt=""></span>
                                            Zertifiziertes Gutachten
                                        </li>                                    
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-mark.svg" alt=""></span>
                                            Probefahrt mit Prüfer
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-mark.svg" alt=""></span>
                                            Professionelle Kaufempfehlung
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-mark.svg" alt=""></span>
                                            Unterstützung in der Preisverhandlung
                                        </li>
                                        <li>
                                            <span class="icon"><img src="front/imgs/icons/check-mark.svg" alt=""></span>
                                            <span class="fw-bold">und vieles mehr ...</span>
                                        </li>
                                    </ul>

                                    <a href="{{route('vorteile')}}" class="btn btn-outline-primary">Alle Vorteile ansehen</a>

                                    <a href="{{route('examiners',['city'=>request('city')])}}" class="btn-next btn btn-secondary px-4 py-2 fs-5 shadow-1"><i class="fa-solid fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="text-center py-5">
                                    <span class="text-grey">oder</span>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="bg-white rounded-2 p-3 pb-4 shadow-1 step-card">
                                    <h5>Bald verfügbar.</h5>
                                    <p class="text-primary mb-0">
                                        Wir arbeiten täglich daran, unsere Dienstleistungen zu verbessern und zu optimieren. <br><br>Schon bald wird es von uns weitere Angebote geben.
                                    </p>

                                </div>
                            </div>
                        </div>
                  @endif



               @if(count($examiners) <= 0)
                <div class="mb-5 mb-md-5 text-center text-lg-center">
                    <h3 class="fs-4">Sorry.</h3>
                </div>
                        <div class="row py-lg-5">
                            <div class="col-lg-5 mx-auto">
                                <div class="bg-white rounded-2 step-card p-3 shadow-1 position-relative">
                                    <h5>Tut uns leid.</h5>
                                    <p class="text-primary">
                                        In dieser Stadt haben wir momentan leider keine verfügbaren Kapazitäten für dich.
                                    </p>
                                    <p>Nenne uns bitte deine E-Mail-Adresse und wir werden unser Bestes geben, um trotzdem noch eine Fahrzeugprüfung für dich zu organisieren.</p>

                                    <form action="{{route('examiner.city')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <p class="mb-0 text-black fs-6">E-Mail<sup class="text-secondary">*</sup></p>
                                                    <div class="input-box">
                                                        <input type="text" value="{{old('email')}}" name="email" class="form-control form-control-sm shadow">
                                                        @error('email')
                                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <p class="mb-0 text-black fs-6">Stadt</p>
                                                    <div class="input-box">
                                                        <input type="text" readonly value="{{request('city')}}" class="form-control form-control-sm shadow" name="city" placeholder="{{request('city')}}">
                                                        @error('city')
                                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @if(session('success'))
                                            <div class="col-12">
                                                <div class="alert alert-success">{{session('success')}}</div>
                                            </div>
                                            @endif
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-secondary shadow-1">Abschicken</button>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
               @endif
                </div>
            </div>
        </section>
        <!-- step-info-end -->



    </main>
@endsection

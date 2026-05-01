@extends('mainpages.mainfront')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
    <main>
        
        <section class="page-hero page-hero-shap-2 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-hero-step py-lg-5 text-center">
                            <h2 class="text-white mb-4">Werde jetzt Prüfer bei Carspector und profitiere von unseren Vorteilen</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <section class="section explain border-end">
            <div class="container-fluid">
                <div class="row gx-3">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="{{ asset('assets/img/explain/01.png') }}" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Prüfe Gebrauchtwagen</h5>
                                <p>Bei Carspector prüfst du Gebrauchtwagen und arbeitest unsere Checkliste ab. Berate den Kunden über das gewünschte Fahrzeug und beantworte seine Fragen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="{{ asset('assets/img/back-in-time.png') }}" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Arbeite dann, wann du willst</h5>
                                <p>Bestimme selber, wann du arbeiten möchtest. Auf Carspector kannst du deine verfügbaren Tage selber festlegen und jederzeit anpassen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="{{ asset('assets/img/icons/money.png') }}" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Bestimme deinen Verdienst</h5>
                                <p>Du bestimmst selbst, wie viel du pro Prüfung verdienen möchtest. Setze deine Preise entsprechend deinem Fachwissen und deinem Wert fest und steigere so deine Einkommensmöglichkeiten.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="{{ asset('assets/img/icons/vacation.png') }}" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Du bist flexibel</h5>
                                <p>Du möchtest nur am Wochenende arbeiten? Kein Problem. Auf Carspector bist du vollkommen flexibel und dein eigener Chef!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="{{ asset('assets/img/icons/guarantee.png') }}" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Reputation und Vertrauen</h5>
                                <p>Carspector ist bekannt für qualitativ hochwertige Gebrauchtwagenprüfungen und genießt das Vertrauen unserer Kunden. Als Teil unseres Teams wirst du von dieser Reputation profitieren.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="{{ asset('assets/img/icons/system.png') }}" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Nebenverdienst</h5>
                                <p>Carspector kann optimal als Nebenverdienst genutzt werden, falls du dir entspannt etwas dazu verdienen möchtest. Du kannst deine Verfügbaren Tage selbst bestimmen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="{{ asset('assets/img/icons/technical-support.png') }}" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Technologie</h5>
                                <p>Wir stellen dir modernste Technologie zur Verfügung, um deine Arbeit effizienter zu gestalten. Unsere Plattform bietet dir alles, was du brauchst.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="explain-item">
                            <div class="explain-item-icon">
                                <span>
                                    <img data-src="{{ asset('assets/img/icons/free_icon.png') }}" class="lazy" alt="">
                                </span>
                            </div>
                            <div class="explain-item-content">
                                <h5>Carspector ist gratis</h5>
                                <p>Die Registrierung und die Nutzung von Carspector ist für dich komplett kostenlos! Du behältst die volle Kontrolle über deine Preise und Gebühren für die Durchführung deiner Fahrzeugprüfungen.</p>
                            </div>
                        </div>
                    </div>
      
                </div>
            </div>
        </section>
        
        <section style="padding-bottom: 5px" class="section cta">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cta-content">
                            <div class="cta-info">
                                <h4>Du hast  Fragen?</h4>
                                <p>Dann kontaktiere gerne den Prüfer-Support unter <a href="mailto:kontakt@carspector.de">partner@carspector.de</a> oder schreibe uns ganz einfach eine
                                    <b>kostenlose</b> Nachricht via <a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20"><b>WhatsApp</b></a>.</p><br>       
                                    <div class="booking-form mb-5 text-center">
                                        <a href="https://wa.me/+4915774993273?text=Hey%20Carspector!%20Ich%20habe%20eine%20Frage:%20"><button style="background-color: #25D366" class="btn btn-primary-light w-100 shadow-none mb-lg-5 mb-4">Auf WhatsApp schreiben</button></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         
        <!-- form-step -->
        <section style="padding: 0px 5px" class="section booking">
            <form action="{{route('examiner.register')}}" method="POST">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 mx-auto">
                            <div class="booking-form">
                                <div class="container">
                                    <div class="title-wrapper">
                                        <h2>Registriere dich kostenlos und starte noch heute!</h2>
                                    </div>
                                </div>
                                <!-- single-booking -->
                                <div class="booking-form mb-5"><br><br>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/nutzer.png') }}" alt=""></span>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Vollständiger Name des Prüfers">
                                        @error('name')
                                        <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/email.png') }}" alt=""></span>
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="E-Mail">
                                        @error('email')
                                        <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/anruf.png') }}" alt=""></span>
                                        <input type="tel" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Telefon" pattern="\d*">
                                        @error('phone')
                                        <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                    
                                    <br><div class="mb-3 pt-2 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/passwort.png') }}" alt=""></span>
                                        <input type="password" name="password" class="form-control border-end-0" placeholder="Passwort">
                                        <span class="input-group-text password-eye"><img src="{{ asset('assets/img/icons/passwort-eye.png') }}" alt=""></span>
                                        @error('password')
                                        <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/passwort.png') }}" alt=""></span>
                                        <input type="password" name="password_confirmation" class="form-control border-end-0 " placeholder="Passwort wiederholen">
                                        <span class="input-group-text password-eye"><img src="{{ asset('assets/img/icons/passwort-eye.png') }}" alt=""></span>
                                    </div>
                                    
                                    <div class="mb-lg-5 mb-4 input-check">
                                        <input type="checkbox" name="terms_and_conditions" id="check-1">
                                        <label for="check-1">
                                            <span class="check-ind"></span>
                                            <span class="text">Ich akzeptiere die <a href="{{route('agb')}}"> AGB </a> und <a href="{{route('datenschutz')}}"> Datenschutzerklärung</a>. Zusätzlich bestätige ich die Korrektheit meiner Angaben und erteile Carspector die Erlaubnis, mich telefonisch oder per E-Mail zu kontaktieren.</span>
                                        </label>
                                        @error('terms_and_conditions')
                                        <div class="invalid-feedback d-block" style="text-align: left;" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5 text-center">
                                    <button type="submit" class="btn btn-primary-light w-100 shadow-none mb-lg-5 mb-4">Jetzt bewerben</button>
                                    <p>Bereits registriert? <a href="{{route('login')}}">Hier anmelden</a></p>
                                </div>
                                <!-- single-booking-end -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- form-step-end -->


        <!-- booking-footer -->
    </main>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function(){
            $("#datepicker").flatpickr();
            $('.user-type').on('change',function(e){
                var type=$(this).val();
                if(type=='user'){
                    window.location.href="{{route('register')}}";
                }else {
                    window.location.href="{{route('examiner.register')}}";
                }
            })
        })
    </script>
@endsection

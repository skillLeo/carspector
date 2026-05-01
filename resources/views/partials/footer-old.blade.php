<footer class="footer bg-primary">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer-content pe-lg-4">
                        <div class="footer-logo">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/logo/logowhite.png') }}" alt="" width="50px" height="35px">
                                <h2 class="text-white ps-3">Carspector</h2>
                            </div>
                            <p class="text-white">Gebrauchtwagen kauft man mit uns</p>
                        </div>
                        <div class="footer-newsletter">
                            <p class="text-white mb-3">Registriere dich jetzt für E-Mail Newsletter und erhalte Angebote, Rabtte und vieles mehr direkt in dein Postfach!</p>
                            <div class="newsletterForm position-relative">
                                <form action="{{route('register')}}" method="get">
                                    <input type="email" placeholder="Deine E-Mail" name="email" style="border-radius: 300px; border-color: #1877f2">
                                    <button type="submit" class="btn btn-primary">Anmelden</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer-widget">
                                <h4>Seiten</h4>
                                <ul>
                                    <li><a href="{{route('examiner.register')}}">Prüfer werden</a></li>
                                    <li><a href="{{route('vorteile')}}">Vorteile</a></li>
                                    <li><a href="{{route('support')}}">Support</a></li>
                                    <li><a href="{{route('login')}}">Anmelden</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget">
                                <h4>Rechtliches</h4>
                                <ul>
                                    <li><a href="{{route('impressum')}}">Impressum</a></li>
                                    <li><a href="{{route('agb')}}">AGB</a></li>
                                    <li><a href="{{route('datenschutz')}}">Datenschutzerklärung</a></li>
                                    <li><a href="{{route('widerruf')}}">Widerrufsbelehrung</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget">
                                <h4>Soziale Medien</h4>
                                <ul>
                                    <li><a href="https://www.instagram.com/carspector.de">Instagram</a></li>
                                    <li><a href="https://www.facebook.com/carspector">Facebook</a></li>
                                    <li><a href="https://www.twitter.com/carspector">Twitter</a></li>
                                    <li><a href="https://www.linkedin.com/company/carspector">LinkedIn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-copy text-center">
            <p class="mb-0">All rights reserved © Carspector 2024</p>
        </div>
    </div>
</footer>

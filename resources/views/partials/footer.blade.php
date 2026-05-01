<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <p class="paragraph footer-paragraph">Carspector bietet deutschlandweit Gebrauchtwagenchecks an, mit dem Ziel, den Gebrauchtwagenkauf transparenter und sicherer zu gestalten.</p>
            <br>
            <!-- <a href="{{route('index')}}" class="section-btn" style="width: 250px">Jetzt buchen</a> -->
            <div style="padding-top: 15px" class="footer-wrapper flex-wrap d-flex align-items-center justify-content-lg-between">
                <!-- footer-logo -->
                <div class="footer-logo d-flex align-items-center">
                    <a href="{{url('/')}}">
                        <img src="{{ asset('front/imgs/logo-2.png') }}" alt="Gebrauchtwagencheck" height="75px" width="75px">
                    </a>
                    <p style="font-size: 16px" class="paragraph">Carspector - dein Partner beim Fahrzeugkauf.</p>
                </div>
                <!-- footer-logo-end -->

                <!-- footer-social -->
                <div class="footer-end">
                    <div class="footer-social d-flex align-items-center justify-content-start gap-2 justify-content-end mb-3">
                        <a target="_blank" href="https://www.instagram.com/carspector.de"><img src="{{ asset('front/imgs/social/insta.svg') }}" alt="Carspector Instagram"></a>
                        <a target="_blank" href="https://www.facebook.com/carspector"><img src="{{asset('front/imgs/social/facebook.svg')}}" alt="Carspector Facebook"></a>
                        <a target="_blank" href="https://www.linkedin.com/company/carspector"><img src="{{ asset('front/imgs/social/linkdin.svg') }}" alt="Carspector LinkedIn"></a>
                        <a target="_blank" href="https://www.twitter.com/carspector"><img src="{{ asset('front/imgs/social/twitter.svg') }}" alt="Carspector Twitter X"></a>
                    </div>
                    <div class="footer-nav">
                        <ul class="d-flex align-items-center justify-content-center justify-content-end">
                            <li>
                                <a href="{{route('impressum')}}">Impressum</a>
                            </li>
                            <li>
                                <a href="{{route('agb')}}">AGB</a>
                            </li>
                            <li>
                                <a href="{{route('datenschutz')}}">Datenschutz</a>
                            </li>
                            <li>
                                <a href="{{route('widerruf')}}">Widerruf</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- footer-social--end -->
            </div>
        </div>
    </div>
</footer>

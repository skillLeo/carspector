@extends('mainpages.mainfront')
@section('content')
    <main>
        <!-- page-hero -->
        <section class="page-hero page-hero-shap-2 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-hero-step text-center">
                            <ul>
                                <li class="active"><span>1</span></li>
                                <li class="active"><span>2</span></li>
                                <li class="active"><span>3</span></li>
                            </ul>
                            <h4 class="text-white">Zahlung</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-hero-end -->

        <!-- form-step -->
        <section class="section booking">
            <form action="{{route('pay-now')}}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 mx-auto">
                            <div class="booking-form">
                                <!-- checkout -->
                                <div class="booking-checkout text-center">
                                    <h6 class="mb-3 text-dark">Wähle deine Zahlungsmethode</h6>
                                    <!-- payment-method -->
                                    <div class="payment-method">
                                        <!-- payment-method-item -->
                                        <div class="payment-method-item" style="display: none" id="safariDiv">
                                            <input type="radio"  id="radio-1" name="type" value="stripe">
                                            <label for="radio-1">
                                                <div class="pay-info">
                                                    <div class="pay-img">
                                                        <img src="{{ asset('assets/img/icons/ap2.png') }}" alt="">
                                                    </div>
                                                    <div class="pay-text">
                                                        ApplePay
                                                    </div>
                                                </div>
                                                <div class="pay-ind">
                                                    <span></span>
                                                </div>
                                            </label>
                                        </div>
                                        <!-- payment-method-item -->

                                        <!-- payment-method-item -->
                                        <div class="payment-method-item">
                                            <input type="radio" checked id="radio-2" name="type" value="stripe">
                                            <label for="radio-2">
                                                <div class="pay-info">
                                                    <div class="pay-img">
                                                        <img src="{{ asset('assets/img/icons/cc2.png') }}" alt="">
                                                    </div>
                                                    <div class="pay-text">
                                                        Kreditkarte
                                                    </div>
                                                </div>
                                                <div class="pay-ind">
                                                    <span></span>
                                                </div>
                                            </label>
                                        </div>
                                        <!-- payment-method-item -->

                                        <!-- payment-method-item -->
                                        <div class="payment-method-item">
                                            <input type="radio" id="radio-3" name="type" value="paypal">
                                            <label for="radio-3">
                                                <div class="pay-info">
                                                    <div class="pay-img">
                                                        <img src="{{ asset('assets/img/icons/pp4.png') }}" alt="">
                                                    </div>
                                                    <div class="pay-text">
                                                        PayPal
                                                    </div>
                                                </div>
                                                <div class="pay-ind">
                                                    <span></span>
                                                </div>
                                            </label>
                                        </div>
                                        <!-- payment-method-item -->
                                    </div>
                                    <!-- payment-method-end -->
                                </div>
                                <!-- checkout-end -->

                                <!-- Payment-bill -->
                                <div class="payment-bill">
                                    <h6 class="text-dark text-center mb-4">Prüfe alle Informationen</h6>
                                    <div class="card-bill bg-primary rounded-4 p-3">
                                        <div class="card-bill-header text-center pb-3 border-bottom">
                                            <h6 class="text-white mb-0">Buchungsübersicht</h6>
                                        </div>
                                        <div class="card-bill-body py-3">
                                            <ul>
                                                <li>
                                                    <span class="fw-bold">Art</span>
                                                    <span>Gebrauchtwagencheck</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Preis</span>
                                                    <span>{{$examiner->price}} €</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Prüfer</span>
                                                    <span>{{$examiner->name}}</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Datum</span>
                                                    <span>{{\Carbon\Carbon::createFromTimestamp(strtotime($booking['date']))->format('d-m-Y')}}</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Uhrzeit</span>
                                                    <span>{{$booking['time']}}</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Marke</span>
                                                    <span>{{$booking['brand']?$booking['brand']:'-'}}</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Fahrzeug</span>
                                                    <span>{{$booking['vehicle_model']?$booking['vehicle_model']:'-'}}</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Baujahr</span>
                                                    <span>{{$booking['make_year']?$booking['make_year']:'-'}}</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Link</span>
                                                    <span><a href="{{$booking['link']}}">{{$booking['link']?$booking['link']:'-'}}</a></span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Adresse</span>
                                                    <span>{{$booking['street']?$booking['street']:'-'}}</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Ort</span>
                                                    <span>{{$booking['postal_code']?$booking['postal_code']:'-'}} {{$booking['city']?$booking['city']:'-'}}</span>
                                                </li>
                                                <li>
                                                    <span class="fw-bold">Zusatz</span>
                                                    <span>{{$booking['addition']?$booking['addition']:'-'}}</span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="card-bill-footer border-top pt-3">
                                            <h6 class="text-white">Deine Wünsche und Vorstellungen:</h6>
                                            <p class="text-white" style="word-break: break-all;white-space: pre-wrap;">{{$booking['desc']?$booking['desc']:'-'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Payment-bill-end-->

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-6 mx-auto">
                            <!-- single-booking -->
                            <input type="hidden" name="amount" value="{{$examiner->price}}">
                            <div class="booking-form mb-lg-5 text-center">
                                <button type="submit" class="btn btn-secondary w-100 mb-4 py-3 rounded-4">Zahlungspflichtig buchen für {{$examiner->price}} €</button>
                                <p class="small"><img class="me-1" src="{{ asset('assets/img/icons/vorhangeschloss.png') }}" alt="">Die Zahlung ist durch eine 256-Bit starke SSL-Verbindung gesichert.</p>
                            </div>
                            <!-- single-booking-end -->
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
    <script>
        $(document).ready(function() {
            var isSafariApple = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

            console.log(isSafariApple);
            if (isSafariApple) {

                $('#safariDiv').css('display', 'block');
                $('#safariDiv > input').attr('checked',true);
            }
        });
    </script>
@endsection

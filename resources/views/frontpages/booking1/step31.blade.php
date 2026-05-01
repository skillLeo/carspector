@extends('mainpages.mainfront')
@section('style')
    <style>
        .type-border{
            border:2px solid red;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid pt-3">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>


    </div>
    <form method="POST" action="{{route('pay-now')}}">

    <div class="container pb-5 px-3" style="margin-top: -15px">


        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10 col-xl-10" style="border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black" >
                <div class="row ps-3  py-2" style="background-color: #f5f5f5">
                    <div class=" col-lg-5 px-0 mx-0 pt-0 pt-sm-3 pt-md-3 pt-lg-0">
                        <button class="btn rounded-circle text-white" style="background-color: #1877f2;height: 32px;width: 32px;font-size: 12px">1</button>
                        <span class="fw-bold" style="font-size: 12px">Informationen zur Prüfung</span>
                        <span><img src="{{ asset('assests/images/icons/Line%2088.png') }}" class="d-xl-inline-block d-lg-inline-block d-md-none d-none" style="width: 43%;"></span>
                    </div>
                    <div class=" col-lg-4 pt-1 pt-sm-3 pt-md-3 pt-lg-0  px-0 mx-0">
                        <button class="btn rounded-circle mx-0 text-white" style="background-color: #1877f2;height: 32px;width: 32px;font-size: 12px">2</button>
                        <span class="fw-bold" style="font-size: 12px">Informationen zur Prüfung</span>
                        <span><img src="{{ asset('assests/images/icons/Line%2088.png') }}" class="d-xl-inline-block d-lg-inline-block d-md-none d-none" style="width: 38%;"></span>
                    </div>
                    <div class="col-lg-3 px-0 pt-1 pt-sm-3 pt-md-3 pt-lg-0 mx-0">
                        <button class="btn rounded-circle text-white" style="background-color: #1877f2;height: 32px;width: 32px;font-size: 12px">3</button>
                        <span class="fw-bold" style="font-size: 12px">Informationen zur Prüfung</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row pt-2 ">
            <div class="col-12 mt-3 col-lg-7 col-xl-7 ps-lg-5 ps-xl-5  text-center">
                <h5 class=" px-0 px-md-5"> <span class="fw-bold">Fast geschafft!</span> Du erhältst alle Informationen zur Buchung und Bezahlung per E-Mail und auf deinem Benutzer-Profil.</h5>

                <div class="row  ps-lg-5  ps-xl-5 ">
                    <div class="col-md-12 pb-5  mx-lg-3 mx-xl-3 rounded" style="border: 1px solid black">

                        @csrf
                        <h6 class="fw-bolder pt-2" style="font-size:  18px">Wähle deine Zahlungsmethode</h6>

                        <div class="row justify-content-center pb-5">
                            <div class="col-10 col-sm-10 col-md-4 col-lg-4 col-xl-4  px-1 mx-0 pt-3">
                                <div data-type="stripe" class="px-0 py-3 pb-4 btn-payment-type mx-0 rounded" style="background-color: #1877f2">
                                    <p class="text-white">Kreditkarte</p>
                                    <img src="{{ asset('assests/images/image%202.png') }}" class="" style="width: 80%;">
                                </div>
                            </div>
                            <div class="col-10 col-sm-10 col-md-4  col-lg-4 px-1 mx-0 pt-3">
                                <div data-type="stripe" class="px-0 btn-payment-type py-3 pb-5 mx-0 rounded" style="background-color: #1877f2">
                                    <p class="text-white pb-1 border-5">Bankeinzug</p>
                                </div>
                            </div>
                            <div class="col-10 col-sm-10 col-md-4 col-lg-4 px-1 mx-0 pt-3">
                                <div data-type="paypal" class="px-0 py-3 pb-5 mx-0 btn-payment-type rounded" style="background-color: #1877f2;">
                                    <p class="text-white pb-1">PayPal</p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$examiner->price}}" name="amount">
                        <input type="hidden" class="payment-type"  name="type">
                        <div class="col-12 pb-2">
                            <button type="submit" class="btn col-12 text-white" style="background-color: #1877f2">Zahlungspflichtig buchen</button>
                            <p class="text-start pt-3" >Die Zahlung ist durch eine 256-Bit starke SSL-Verbindung gesichert.</p>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-12 mt-3 col-lg-5 col-xl-5 ">
                <div class="row  ps-lg-3 px-xl-3 mx-lg-3 mx-xl-3">
                    <div class="col-12 col-lg-10 col-xl-10 ">
                        <h6 class="fw-bolder text-center">Deine Buchungsübersicht</h6>
                    </div>
                    <div class="col-12 rounded col-lg-10 col-xl-10 mx-lg-0 mx-xl-0 mx-auto" style="border: 1px solid black">
                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Art </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">Gebrauchtwagencheck </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>
                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Prüfer </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$examiner->name}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>

                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Datum </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{date('d.m.Y',strtotime($booking['date']))}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>

                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Uhrzeit </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$booking['time']}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>


                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Fahrzeug </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$booking['vehicle_make_model']}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>


                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bold" style="font-size: 14px">Adresse der Prüfung </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$booking['street']}} house #{{$booking['house_no']}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>


                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Telefon </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$booking['phone']}} </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>
                        <div class="row px-1 pt-2 pb-1" >
                            <div class="col-5">
                                <h6 class="fw-bolder" style="font-size: 14px">Preis </h6>
                            </div>
                            <div class="col-7">
                                <p class=" py-0 my-0 text-end" style="font-size: 14px">{{$booking['price']}} € </p>
                            </div>
                            <hr class=" mt-1 mb-1 my-0">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn text-white" style="background-color: #1877f2" type="button" id="button-addon2">></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(e){
            $('.btn-payment-type').on('click',function(){
                var type=$(this).attr('data-type');
                $('.payment-type').val(type);
                $('.type-border').removeClass('type-border');
                $(this).addClass('type-border');
            })
        })
    </script>
@endsection

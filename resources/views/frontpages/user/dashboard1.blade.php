@extends('mainpages.mainfront')
@section('content')
    <div class="container-fluid">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>
        <div class="container px-lg-5 pt-5 pb-5">
            <div class="row px-2 justify-content-center">
                <div class="col-12 rounded col-md-10 col-lg-10 col-xl-10 text-center supportdiv">
                    <h3 class="fw-bold"> Mein Profil</h3>
                </div>
                <div class="col-12 rounded col-md-10 col-lg-10 col-xl-10 pb-4 text-center supportdiv" style="border: 1px solid gray;">
                    <div class="row mx-3 ms-lg-5 ms-xl-5 ">
                        <div class="col-12 col-lg-5 col-xl-5">
                            <h6 class="fw-bolder pt-4 pb-1" style="font-size: 18px">Meine Buchung</h6>
                            <div class="row">
                                <div class="col-md-12" style="border: 1px solid grey;background-color: #1877f2">
                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Uhrzeit </span>
                                        </div>
                                        <div class="col-7 pb-3 pt-2 text-end">
                                            <p class=" py-0 my-0 text-white" style="font-size: 14px">{{ date('d.m.Y',strtotime($order->date)) }} </p>
                                        </div>
                                        <hr class="text-white mt-1 mb-1 my-0">
                                    </div>


                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Adresse </span>
                                        </div>
                                        <div class="col-7 pb-3 pt-2 text-end">
                                            <p class=" py-0 my-0 text-white" style="font-size: 14px">{{$order->street}},
                                                {{$order->house_no}} {{$order->city}} </p>
                                        </div>
                                        <hr class="text-white mt-1 mb-1 my-0">
                                    </div>


                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Dein Name </span>
                                        </div>
                                        <div class="col-7 pb-3 pt-2 text-end">
                                            <p class=" py-0 my-0 text-white" style="font-size: 14px">{{$user->name}}</p>
                                        </div>
                                        <hr class="text-white mt-1 mb-1 my-0">
                                    </div>


                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Telefon </span>
                                        </div>
                                        <div class="col-7 pb-3 pt-2 text-end">
                                            <p class=" py-0 my-0 text-white" style="font-size: 14px">{{$order->phone}} </p>
                                        </div>
                                        <hr class="text-white mt-1 mb-1 my-0">
                                    </div>


                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Fahrzeug </span>
                                        </div>
                                        <div class="col-7 pb-3 pt-2 text-end">
                                            <p class=" py-0 my-0 text-white" style="font-size: 14px">{{$order->vehicle_make_model}}</p>
                                        </div>
                                        <hr class="text-white mt-1 mb-1 my-0">
                                    </div>


                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Baujahr </span>
                                        </div>
                                        <div class="col-7 pb-3 pt-2 text-end">
                                            <p class=" py-0 my-0 text-white" style="font-size: 14px">{{ $order->make_year }} </p>
                                        </div>
                                        <hr class="text-white mt-1 mb-1 my-0">
                                    </div>

                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0 text-white" style="font-size: 14px">Dein Prüfer </span>
                                        </div>
                                        <div class="col-7 pb-3 pt-2 text-end">
                                            <p class=" py-0 my-0 text-white" style="font-size: 14px">{{$order->examiner->name}} </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{$order->link}}" target="_blank" class="btn btn-link bg-white py-1 col-12">Online-Link des Fahrzeugs</a>
                                    </div>

                                    <div class="col-12 text-start">
                                        <h6 class="text-white pt-2" >Deine Wünsche:</h6>
                                        <p class="text-white ps-2 " style="font-size: 14px">{{$order->desc}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-xl-7 ">
                            <div class="row  mx-lg-3 mx-xl-3">
                                <h6 class="fw-bolder pt-4 pb-1" style="font-size: 18px">Meine Buchung</h6>
                                <div class="col-12" style="border: 1px solid black">
                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0" style="font-size: 14px">Nachname </span>
                                        </div>
                                        <div class="col-7 pb-1 pt-2 text-end">
                                            <p class=" py-0 my-0 " style="font-size: 14px">{{$user->last_name}} </p>
                                        </div>
                                        <hr class="mt-1 mb-1 my-0">
                                    </div>
                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0" style="font-size: 14px">E-Mail </span>
                                        </div>
                                        <div class="col-7 pb-1 pt-2 text-end">
                                            <p class=" py-0 my-0 " style="font-size: 14px">{{$user->email}} </p>
                                        </div>
                                        <hr class="mt-1 mb-1 my-0">
                                    </div>
                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0" style="font-size: 14px">Telefon </span>
                                        </div>
                                        <div class="col-7 pb-1 pt-2 text-end">
                                            <p class=" py-0 my-0 " style="font-size: 14px">{{$user->phone}} </p>
                                        </div>
                                        <hr class="mt-1 mb-1 my-0">

                                    </div>
                                    <div class="row px-0 mx-0 pt-2 pb-1" >
                                        <div class="col-5 pt-2 px-0 mx-0 text-start">
                                            <span class="fw-bolder px-0 mx-0" style="font-size: 14px">Vorname </span>
                                        </div>
                                        <div class="col-7 pb-1 pt-2 text-end">
                                            <p class=" py-0 my-0 " style="font-size: 14px">{{$user->first_name}}</p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-12 px-3 pt-2 ">
                                <a href="{{route('password.change')}}" type="button" class="btn col-12 text-white " style="background-color: #1877f2">Passwort ändern</a>
                            </div>
                            <div class="col-12 px-3 pt-2 ">
                                <button type="button" onclick="document.getElementById('logout-form').submit();" class="btn col-12 text-white " style="background-color: #1877f2">Abmelden</button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pt-4">
                        <a href="{{route('examiners')}}" type="button" class="btn col-8 text-white " style="background-color: #1877f2">Neuen Termin buchen</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

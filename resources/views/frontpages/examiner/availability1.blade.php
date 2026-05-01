@extends('mainpages.mainfront')
@section('style')
    <link href="{{ asset('assests/css/calender.css') }}" rel="stylesheet">

    <style>
        .calendar {
            padding: 0px !important;
        }
    </style>
    <style>

    </style>
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row  bg-primary d-none d-sm-none d-md-none d-lg-block d-xl-block text-center text-white">
            <div class="col-12">
                <p class="pb-0 pt-2 pb-2 "><span class="">Brauchst du Hilfe bei der Buchung? Kontaktiere uns:</span> <b> kontakt@carspector.de</b></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-bolder text-center">Meine Verfügbarkeit</h5>
                <p class="text-center py-0 my-0">Bei Fragen oder anderen Anliegen kannst du gerne jederzeit unseren </p>
                <p class="text-center py-0 my-0">Partnerservice via E-Mail an <span class="" style="color: #1877f2">partner@carspector.de</span> kontaktieren.</p>
                <div class="row px-3 pt-5 justify-content-center">
                    <div class="col-12  col-lg-10 col-xl-10 pb-5" style="border: 1px solid black;background-color: #f5f5f5">
                        <h6 class="text-center pt-4" style="color: #1877f2">Plane deine Verfügbarkeit für die nächsten 3 Monate</h6>
                        <h6 class="text-center py-0 my-0 " >Markiere deine verfügbaren Tage mit </h6>
                        <h6 class="text-center py-0 my-0 ">einem Klick!</h6>
                        <div class="row">
                            <div class="col-12 pt-5">
                                <div class="calendar mx-auto px-0 mx-0 col-12 col-lg-8 col-xl-8" style="border: 1px solid black" >
                                    <div id="calendar1"></div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="mx-auto mx-0 col-12 col-lg-8 col-xl-8">
                                        <p class="pt-5 my-0 text-center">Wähle deinen verfügbaren Zeiten am</p>
                                        <p class="py-0 my-0 text-center pb-5"> Mittwoch, dem 15. Juni 2022:</p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mx-auto  mx-0 col-12 col-lg-8 col-xl-8">
                                        <button type="button" class="btn btn-dark ms-2 d-block">Alle auswählen</button>
                                    </div>
                                    <div class="mx-auto pb-3 mx-0 col-12 col-lg-8 col-xl-8" style="text-align: justify">
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 " style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">07:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">07:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">08:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">08:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">09:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">09:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">10:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">10:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">11:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">11:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">12:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">12:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">13:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">13:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">14:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">14:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">15:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">15:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">16:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">16:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">17:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">17:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">18:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1 text-white" style="background-color: #1877f2;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">18:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">19:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">19:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">20:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">20:30</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">21:00</button>
                                        <button type="button" class="btn mt-3 px-4 ms-2 py-1" style="background-color: white;box-shadow: 0px 3px 2px 0px rgba(0,0,0,0.11);">21:30</button>

                                    </div>

                                </div>
                                <div class="col-12 pt-5 pb-5">
                                    <div class="calendar mx-auto px-0 mx-0 col-12 col-lg-8 col-xl-8" style="border: 1px solid black" >
                                        <div id="calendar"></div>
                                    </div>
                                </div>

                                <div class="col-12 pt-5 pb-5">
                                    <div class="calendar mx-auto px-0 mx-0 col-12 col-lg-8 col-xl-8" style="border: 1px solid black" >
                                        <div id="calendar2"></div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn text-white col-7 " style="background-color: #1877f2">Änderungen sichern</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assests/js/celender.js') }}"></script>
    <script src="{{ asset('assests/js/celender1.js') }}"></script>
    <script src="{{ asset('assests/js/celender2.js') }}"></script>
    <script src="{{ asset('assests/js/celender3.js') }}"></script>
@endsection

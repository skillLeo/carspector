@extends('mainpages.mainfront')
@section('style')
    <link href="{{ asset('assests/css/calender.css') }}" rel="stylesheet">
    <style>
        .time-active{
            color: #1877f2;
            text-shadow: 1px 1px 2px #1877f2;
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

    <div class="container pb-5 px-3" style="margin-top: -15px">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10 col-xl-10" style="border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black" >
                <div class="row ps-3  py-2 py-md-2" style="background-color: #f5f5f5">
                    <div class=" col-lg-5 px-0 mx-0 pt-0 pt-sm-3 pt-md-3 pt-lg-0">
                        <button class="btn rounded-circle text-white" style="background-color: #1877f2;height: 32px;width: 32px;font-size: 12px">1</button>
                        <span class="fw-bold" style="font-size: 12px">Informationen zur Prüfung</span>
                        <span><img src="{{ asset('assests/images/icons/Line%2088.png') }}" class="d-xl-inline-block d-lg-inline-block d-md-none d-none" style="width: 43%;"></span>
                    </div>
                    <div class=" col-lg-4 pt-1 pt-sm-3 pt-md-3 pt-lg-0  px-0 mx-0">
                        <button class="btn rounded-circle mx-0 text-white" style="background-color: #6A6A6A;height: 32px;width: 32px;font-size: 12px">2</button>
                        <span class="fw-bold" style="font-size: 12px">Informationen zur Prüfung</span>
                        <span><img src="{{ asset('assests/images/icons/Line%2088.png') }}" class="d-xl-inline-block d-lg-inline-block d-md-none d-none" style="width: 38%;"></span>
                    </div>
                    <div class="col-lg-3 px-0 pt-1 pt-sm-3 pt-md-3 pt-lg-0 mx-0">
                        <button class="btn rounded-circle text-white" style="background-color: #6A6A6A;height: 32px;width: 32px;font-size: 12px">3</button>
                        <span class="fw-bold" style="font-size: 12px">Informationen zur Prüfung</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col-12 col-md-12 col-lg-10 col-xl-10 pb-4" style="border: 1px solid black;" >
                <div class="row ps-3">
                    <div class="col-12 px-0 mx-0">
                        <h6 class="fw-bolder text-center pt-2">Dein Prüfer: {{$examiner->name}}</h6>
                        <h5 class="fw-bolder text-center pt-4" style="color: #1877f2">Wann soll dein Wunschfahrzeug geprüft werden?</h5>
                    </div>
                    <div class="row" style="margin-top: -20px">
                        <div class="col-12 px-0 mx-0 ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="calendar mx-auto px-0 mx-0 col-12 col-lg-6 col-xl-6" >
                                        <div id="calendar"></div>
                                        @error('date')
                                      <div class="invalid-feedback d-block">
                                          {{$message}}
                                      </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            Freie Termine am
                        </div>
                        <div class="col-12 text-center">
                            <span class="fw-bolder">Mittwoch</span>, dem <span class="fw-bolder">15. Juni 2022:</span>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6  col-xl-6" style="text-align: justify">
                            <button  class="btn btn-time  px-3 mt-3 " style="background-color: #f5f5f5" data-time="09:30">09:30</button>
                            <button class="btn btn-time px-3 mt-3 " style="background-color: #f5f5f5" data-time="10:30">10:30</button>
                            <button class="btn  btn-time px-3 mt-3 " style="background-color: #f5f5f5" data-time="11:30">11:30</button>
                            <button class="btn btn-time px-3 mt-3 " style="background-color: #f5f5f5" data-time="12:30">12:30</button>
                            <button class="btn  btn-time px-3 mt-3 " style="background-color: #f5f5f5" data-time="01:30">01:30</button>
                            <button class="btn btn-time px-3 mt-3 " style="background-color: #f5f5f5" data-time="02:30">02:30</button>
                            <button class="btn  btn-time px-3 mt-3 " style="background-color: #f5f5f5" data-time="03:30">03:30</button>
                            <button class="btn  btn-time px-3 mt-3 " style="background-color: #f5f5f5" data-time="04:30">04:30</button>
                            <button class="btn btn-time px-3 mt-3 " style="background-color: #f5f5f5" data-time="05:30">05:30</button>
                            <button class="btn btn-time px-3 mt-3 time-active " style="background-color: #f5f5f5;" data-time="06:30">06:30</button>
                            @error('time')
                            <div class="invalid-feedback d-block">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center pt-5">
                        <div class="col-10 pt-5" style="border-bottom: 1px solid black"></div>
                    </div>

                    <div class="row justify-content-center">
                        <form action="{{route('booking.step1')}}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$examiner->id}}">
                            <div class="col-12 col-md-10 mx-auto">
                                <h5 class="fw-bolder text-center pt-4" style="color: #1877f2">Wann soll dein Wunschfahrzeug geprüft werden?</h5>

                                <div class="row">
                                    <label class="form-label">Zum Fahrzeug</label>
                                    <div class="col-12 col-md-8 col-lg-8 col-xl-8 pt-3">
                                        <input type="text" name="vehicle_make_model" value="{{old('vehicle_make_model')}}" class="form-control input-bg-color"  placeholder="Fahrzeugmarke +  Modell">
                                        @error('vehicle_make_model')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 pt-3">
                                        <input type="text" name="make_year" value="{{old('make_year')}}" class="form-control input-bg-color" placeholder="Baujahr">
                                        @error('make_year')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="text" name="link" value="{{old('link')}}" class="form-control input-bg-color" placeholder="Link zur Online-Platform (z.B. mobile.de, autoscout24.de - falls vorhanden)">
                                        @error('link')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-4 pt-3">
                                    <label class="form-label">Deine persönlichen Wünsche bzw. Vorstellungen</label>
                                    <div class="col-12 ">
                                    <textarea rows="5" name="desc" class="form-control input-bg-color">{{old('desc')}}</textarea>
                                      @error('desc')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row ">
                                    <label class="form-label mt-5 pt-2">Adresse der Kfz-Prüfung (bitte mit Autoverkäufer besprechen)</label>
                                    <div class="row px-0 mx-0">
                                        <div class="col-12 col-md-7 col-lg-7 col-xl-7  pt-3 ">
                                            <input type="text" value="{{old('street')}}" name="street" class="form-control input-bg-color" placeholder="Straße">
                                            @error('street')
                                            <div class="invalid-feedback d-block">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-5 col-lg-5 col-xl-5 pt-3 ">
                                            <input type="text" value="{{ old('house_no') }}" name="house_no" class="form-control input-bg-color" placeholder="Hausnummer">
                                            @error('house_no')
                                            <div class="invalid-feedback d-block">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row  px-0 mx-0">
                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3 pt-3">
                                            <input type="text" value="{{old('postal_code')}}" name="postal_code" class="form-control input-bg-color" placeholder="Postleitzahl">
                                            @error('postal_code')
                                            <div class="invalid-feedback d-block">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-9 col-lg-9 col-xl-9 pt-3">
                                            <input type="text" value="{{ old('city') }}" name="city" class="form-control input-bg-color" placeholder="Stadt">
                                            @error('city')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 pt-3">
                                            <input type="text" value="{{ old('addition') }}" name="addition" class="form-control input-bg-color" placeholder="Zusatz (z.B. Etage)">
                                            @error('addition')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12  col-md-6 col-lg-6 col-xl-6">
                                        <label class="form-label mt-4 pt-4">Deine Telefonnummer für mögliche Rückfragen</label>
                                        <input type="text" value="{{ old('phone') }}" name="phone" class="form-control input-bg-color" placeholder="Telefon">
                                    </div>
                                </div>


                            </div>
                            <div class="row px-0 px-lg-5  text-white pt-5 ">
                                <div class="col-12   text-center rounded py-4" style="background-color: #1877f2">
                                    <h6>Preis inkl. Gebühren und Steuern: <span class="fw-bolder">{{$examiner->price}} €</span></h6>
                                    <h5 class="text-center">Jetzt buchen und sicher zum Gebrauchtwagen kommen!</h5>
                                    <button type="submit" class="btn col-10 mx-auto mt-4 text-white" style="background-color: #fd7e14">Los geht’s</button>
                                </div>
                            </div>
                            <input type="hidden" name="date" value="{{ old('date') }}" class="booking_date">
                            <input type="hidden" name="time" value="{{ old('time') }}" class="booking_time">
                            <input type="hidden" name="price" value="{{$examiner->price}}">
                            <input type="hidden" name="examiner_id" value="{{$examiner->id}}">
                        </form>
                        <div class="row pt-4 pb-4">
                            <div class="col-12 text-center">
                                Brauchst du Hilfe bei der Buchung? Kontaktiere uns gerne:<span class="fw-bolder"> kontakt@carspector.de</span>
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
    <script>
        $(document).ready(function(e){
            var time='';
            $(document).on('click','.btn-time',function(){
              $('.time-active').removeClass('time-active');
                $(this).addClass('time-active');
                time=$(this).attr('data-time');
                console.log(time);
                $('.booking_time').val(time);
            })
            $('#calendar').on('changeDate',function(e){
                console.log(e.date);
                var milliseconds = Date.parse(e.date);
                var date = new Date(milliseconds).format("mm/dd/yyyy");
                console.log(date);
                $('.booking_date').val(date);
            })
        })
    </script>
@endsection

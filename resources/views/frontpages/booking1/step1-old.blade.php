@extends('mainpages.mainfront')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/timepicker@1.14.0/jquery.timepicker.css" />
    <style>
        .ui-timepicker-select{
            width: 97%;
            border-radius: 50px;
            border: none;
            padding: 5px;
        }
        .ui-timepicker-select:focus-visible{
            border: none;
            outline: none;
        }
    </style>
    @endsection
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
                                <li><span>2</span></li>
                                <li><span>3</span></li>
                            </ul>
                            <h4 class="text-white">Informationen zur Prüfung</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-hero-end -->

        <!-- form-step -->
        <section class="section booking">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="booking-form">
                            <form action="{{route('booking.step1')}}" method="POST">
                                <input type="hidden" name="user_id" value="{{$examiner->id}}">
                                <input type="hidden" name="price" value="{{$examiner->price}}">
                                <!-- single-booking -->
                                @csrf
                                <div class="booking-form mb-5">
                                    <h6 class="fw-normal">Wann soll dein Wunschfahrzeug geprüft werden?</h6>

                                    <div class="date-select select-wrapper mb-3">
                                        <span class="picker-icon">
                                            <img src="{{ asset('assets/img/icons/datum.png') }}" alt="">
                                        </span>
                                        <div class="picker-input">
                                            <input type="text" name="date" value="{{old('date')}}" placeholder="Prüfdatum" class="datepicker" id="datepicker">

                                        </div>

                                    </div>
                                    @error('date')
                                    <div class="invalid-feedback d-inline">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div class="date-select select-wrapper mb-4">
                                        <span class="picker-icon">
                                            <img src="{{ asset('assets/img/icons/zeit.png') }}" alt="">
                                        </span>
                                        <div class="picker-input">
                                            <input type="text" name="time"  class="timepicker" placeholder="Prüfuhrzeit (optional)" value="{{old('time')}}">
                                        </div>
                                        @error('time')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5">
                                    <h6 class="fw-normal">Informationen zum Fahrzeug</h6>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/wagen.png') }}" alt=""></span>
                                        <input type="text" class="form-control" name="brand" value="{{old('brand')}}" placeholder="Marke">
                                        @error('brand')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/lenkrad.png') }}" alt=""></span>
                                        <input type="text" name="vehicle_model" class="form-control" placeholder="Modell">
                                        @error('vehicle_model')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/kalenderjahr.png') }}" alt=""></span>
                                        <input type="text" pattern="\d*" name="make_year" value="{{old('make_year')}}" class="form-control" placeholder="Baujahr">
                                        @error('make_year')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/verknupfung.png') }}" alt=""></span>
                                        <input name="link" value="{{old('link')}}"  type="url" class="form-control" placeholder="Link zu mobile.de, autoscout (optional)">
                                        @error('link')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5">
                                    <h6 class="fw-normal">Deine persönlichen Wünsche bzw. Vorstellungen</h6>
                                    <div class="mb-3 input-group">
                                        <textarea name="desc"  id="" class="form-control">{{old('desc')}}</textarea>
                                        @error('desc')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5">
                                    <h6 class="fw-normal">Adresse der Prüfung (bitte mit Autoverkäufer besprechen)</h6>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/karten-und-flaggen.png') }}" alt=""></span>
                                        <input type="text" value="{{old('street')}}" name="street" class="form-control" placeholder="Adresse">
                                        @error('street')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/flugzeug.png') }}" alt=""></span>
                                        <input type="text" pattern="\d*" value="{{old('postal_code')}}" name="postal_code"  class="form-control" placeholder="Postleitzahl">
                                        @error('postal_code')
                                        <div class="invalid-feedback d-block">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/stadt-dorf.png') }}" alt=""></span>
{{--                                        <input type="text" class="form-control" value="{{ old('city') }}" name="city"  placeholder="Stadt">--}}
                                        <select class="form-control" name="city">
                                            <option value="" selected>-- Stadt wählen --</option>
                                            @foreach($examiner->cities as $city)
                                                <option value="{{$city->name}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/plus2.png') }}" alt=""></span>
                                        <input type="text" class="form-control" value="{{ old('addition') }}" name="addition" placeholder="Zusatz (z.B. Hinterhof)">
                                        @error('addition')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5">
                                    <h6 class="fw-normal">Deine Telefonnummer für mögliche Rückfragen</h6>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><img src="{{ asset('assets/img/icons/anruf.png') }}" alt=""></span>
                                        <input type="tel" value="{{ old('phone') }}" name="phone" class="form-control" placeholder="Telefon">
                                        @error('phone')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                                <!-- single-booking-end -->

                                <!-- single-booking -->
                                <div class="booking-form mb-5">
                                    <button type="submit" class="btn btn-primary-light w-100 shadow-none">Nächster Schritt</button>
                                </div>
                                <!-- single-booking-end -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- form-step-end -->

    </main>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/timepicker@1.14.0/jquery.timepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // date-picker
        // $("#datepicker").datepicker({
        //     dateFormat: "yy-mm-dd"
        // });

        $("#datepicker").flatpickr({
            minDate: "today",
            dateFormat: "d-m-Y",
            defaultDate:"{{$firstDate->date1}}",
            enable: {!! $jsondates !!}
        });
        var availableTimeSlots = ['09:00', '09:30', '10:00', '10:30', '11:00'];




        $(".timepicker").timepicker({
            'noneOption': [
                {
                    'label': 'Zeit auswählen',
                    'className': 'shiby',
                    'value': '',
                    'selected':true,
                },
            ],
            useSelect:true,
            timeFormat: 'H:i',
            interval: 30,
            minTime: '07:00',
            maxTime: '21:30',
            dynamic: false,
            dropdown: true,
            scrollbar: true,
            disableTimeRanges:generateDisableTimeRanges([]),
        });

        function generateDisableTimeRanges(disabledTimeSlots) {
            var disableTimeRanges = [];

            console.log(disabledTimeSlots);
            disabledTimeSlots.forEach(function(timeSlot) {
                var startTime = timeSlot;
                var endTime = incrementTimeBy30Minutes(timeSlot);
                disableTimeRanges.push([startTime, endTime]);
            });

            return disableTimeRanges;
        }

        function incrementTimeBy30Minutes(time) {
            var timeParts = time.split(':');
            var hours = parseInt(timeParts[0]);
            var minutes = parseInt(timeParts[1]);

            minutes += 30;
            if (minutes >= 60) {
                minutes -= 60;
                hours += 1;
            }
            if (hours >= 24) {
                hours -= 24;
            }

            var formattedTime = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
            return formattedTime;
        }
        $(document).on('change','#datepicker',function(e){
            var date=$('#datepicker').val();
            $.ajax({
                url:"{{route('fetch.slots',['id'=>request('id')])}}",
                type:'GEt',
                data:{
                    date:date
                },
                success:function(data){
                    console.log(data);
                    $('.timepicker').timepicker('option', { disableTimeRanges: generateDisableTimeRanges(data) });
                },
                error:function(error){

                }
            })
        })
        $(document).ready(function(){
            $('#datepicker').trigger('change');
            $('.ui-timepicker-select').children().eq(0).attr('selected',true);
        })
    </script>
@endsection

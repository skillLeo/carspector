@extends('mainpages.mainfront')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .single-time-select input[type="checkbox"]:disabled + label {
            background-color: #5c5c5c; /* Change this to the desired gray color */
        }
    </style>
@endsection
@section('content')
    <main>

        <!-- availability-section -->
        <section class="section availability">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-xl-6 mx-auto">
                        <div class="availability-wrapper">
                            <!-- availability header -->
                            <div class="availability-header text-center">
                                <h5 class="mb-lg-5 mb-4">Meine Verfügbarkeit</h5>
                                <p>Wähle deine verfügbaren Zeiten für Tage deiner Wahl. Ohne festgelegte verfügbare Zeiten, kannst du nicht gebucht werden.</p>
                            </div>
                            <!-- availability-header-end -->

                            <!-- selct-day -->
                            <div class="availablity-day">
                                <div class="input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/datum.png') }}" alt=""></span>
                                    <input type="text" value="{{$availabilty->date1?$availabilty->date1:(\Carbon\Carbon::now()->format('d-m-Y'))}}" class="form-control border-start-0" name="" id="datepicker" placeholder="Tag auswählen">
                                </div>
                            </div>
                            <!-- selct-day-end -->

                            <!-- availability-time -->
                            <div class="availability-time">
                                <h6 class="fw-normal text-center mb-3">Wähle nun deine verfügbaren Zeiten für den ausgewählten Tag.</h6>
                                <div class="availability-time-wrappepr">
                                    <button type="button" class="btn btn-primary w-100 mb-3 btn-select-all">Alle auswählen</button>
                                    <div class="availability-time-select">
                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" {{check_time('07:00:00',$availabilty->date)?'checked':''}} id="rd-1" name="s-time">
                                            <label for="rd-1">07:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-2" {{check_time('07:30:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-2">07:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-3" {{check_time('08:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-3">08:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-4" {{check_time('08:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-4">08:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-5" {{check_time('09:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-5">09:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-6" {{check_time('09:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-6">09:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-7" {{check_time('10:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-7">10:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-8" {{check_time('10:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-8">10:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-9" {{check_time('11:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-9">11:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-10" {{check_time('11:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-10">11:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-11" {{check_time('12:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-11">12:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-12" {{check_time('12:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-12">12:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-13" {{check_time('13:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-13">13:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-14" {{check_time('13:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-14">13:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-15" {{check_time('14:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-15">14:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-151" {{check_time('14:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-151">14:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-16" {{check_time('15:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-16">15:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-17" {{check_time('15:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-17">15:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-18" {{check_time('16:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-18">16:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-19" {{check_time('16:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-19">16:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-20" {{check_time('17:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-20">17:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-21" {{check_time('17:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-21">17:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-22" {{check_time('18:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-22">18:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-23" {{check_time('18:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-23">18:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-24" {{check_time('19:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-24">19:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-241" {{check_time('19:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-241">19:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-25" {{check_time('20:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-25">20:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-26" {{check_time('20:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-26">20:30</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-27" {{check_time('21:00',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-27">21:00</label>
                                        </div>
                                        <!-- single-select-time-end -->

                                        <!-- single-select-time -->
                                        <div class="single-time-select">
                                            <input type="checkbox" id="rd-28" {{check_time('21:30',$availabilty->date)?'checked':''}} name="s-time">
                                            <label for="rd-28">21:30</label>
                                        </div>
                                        <!-- single-select-time-end -->


                                    </div>
                                    <button type="button" class="btn w-100 btn-submit btn-primary-light">Speichern und aktualisieren</button>

                                </div>
                            </div>
                            <!-- availability-time-end -->


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- availability-section-end -->

    </main>
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

        $("#datepicker").flatpickr({
            minDate: "today",
            dateFormat: "d-m-Y",
        });
        // date-picker
        // $("#datepicker").datepicker({
        //     dateFormat: "yy-mm-dd"
        // });

        var isSelectAll=false;
        $(document).on('click','.btn-select-all',function(){
            if(!isSelectAll){
            $('input[name=s-time]:not(:disabled)').prop('checked',true);
            isSelectAll=true;
                $(this).text('Alles wiederufen')
            $(this).text('Alle auswählen');
                }else {
                $(this).text('Alles wiederufen')
                $('input[name=s-time]:not(:disabled)').prop('checked',false);
            isSelectAll=false;

            }
            saveAvailabilty();
        });
        $(document).ready(function (e){
            $('#datepicker').trigger('change');
        })

        $(document).on('change','#datepicker',function(){
 isSelectAll=false;
            var date=$('#datepicker').val();
            $.ajax({
                url:"{{route('availability.times')}}",
                type:'GEt',
                data:{
                    date:date
                },
                success:function(data){
                    console.log(data);

                    if (data.times.length < 1){
                        $('input[name=s-time]').prop('checked',false);
                    }
                    var currentDate = new Date();
                    $('.single-time-select').each(function(index,value){
                        // var time=$(this).children().eq(1).html();

                        var checkboxTime = $(this).children().eq(1).text();
                        // console.log(checkboxTime);
                        var checkboxDateTime = new Date(data.date+" " + checkboxTime); // Assuming the date part is not important here

                        // Compare the checkbox time with the current time
                        if (checkboxDateTime <= currentDate) {
                            // Disable the checkbox
                            $(this).children().eq(0).attr('disabled', true);
                        } else {
                            // Enable the checkbox
                            $(this).children().eq(0).removeAttr('disabled');
                        }

                        var check=false;
                        for(let i=0;i<data.times.length;i++) {
                            console.log(data.times[i].time);
                            console.log($(this).children().eq(1).text());
                            if ($(this).children().eq(1).text()==data.times[i].time) {
                                check=true;
                            }
                        }
                        if(check){
                            $(this).children().eq(0).prop('checked',true)
                            console.log('In If',$(this).children().eq(0));
                        }else {
                            $(this).children().eq(0).prop('checked',false)
                        }
                    });
                },
                error:function(error){

                }
            })
        })
        $('.btn-submit').on('click',function(e){
            saveAvailabilty();
        });
        $(document).on('change','.single-time-select > input',function(){
            saveAvailabilty();
        })
        function saveAvailabilty(){
            var times=[];
            $('.single-time-select').each(function(index,value){
                var time=$(this).children().eq(1).html();
                if($(this).children().eq(0).is(':checked')){
                    times.push(time);
                }
            });
            $(this).find('.price-loading').show();

            var date=$('#datepicker').val();
            $.ajax({
                url:"{{route('examiner.save-availability')}}",
                type:'POST',
                data:{
                    date:date,times:times
                },
                success:function(data){
                    // swal.fire({
                    //     html: data.message,
                    //     icon: "success",
                    //     buttonsStyling: true,
                    //     confirmButtonText: "D'accord",
                    //
                    // })
                toastr.success('','Verfügbarkeit aktualisiert');
                },
                error:function(error){

                }
            })
            console.log(times)
        }

    </script>
@endsection

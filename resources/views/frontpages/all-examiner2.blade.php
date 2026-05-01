@extends('mainpages.mainfront')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        #datepicker{
            padding: 5px;
        }
        #datepicker1{
            padding: 5px;
        }
    </style>
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
        <section class="page-hero page-hero-examiner page-hero-shap-1 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-hero-filter d-none d-lg-block">
                            <form class="filter-form" action="{{route('examiners')}}">
                                <h4 class="text-white">Prüfer filtern</h4>
                                <div class="row align-items-end gx-2 mb-lg-5">
                                    <div class="col-2-5">
                                        <div class="filter-input">
                                            <label class="form-label text-white"  for="">Stadt</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-0 px-2"><img src="{{ asset('assets/img/icons/adresse.png') }}" alt=""></span>
                                                <input required type="text" value="{{request('city')}}" class="form-control city-filter border-start-0" placeholder="Düsseldorf" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label text-white" for="">Preis</label>
                                        <div class="row gx-1">
                                            <div class="col-6">
                                                <div class="filter-select">
                                                <span class="filter-select-icon">
                                                    <img src="{{ asset('assets/img/icons/euro.png') }}" alt="">
                                                </span>
                                                    <select class="form-select min-price w-100" aria-label="Default select example">
                                                        <option selected value="">von</option>
                                                        <option value="100">100€</option>
                                                        <option value="200">200€</option>
                                                        <option value="300">300€</option>
                                                        <option value="400">400€</option>
                                                        <option value="500">500€</option>
                                                        <option value="600">600€</option>
                                                        <option value="700">700€</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="filter-select">
                                                <span class="filter-select-icon">
                                                    <img src="{{ asset('assets/img/icons/euro.png') }}" alt="">
                                                </span>
                                                    <select class="form-select w-100 max-price" aria-label="Default select example">
                                                        <option selected value="">bis</option>
                                                        <option value="100">100€</option>
                                                        <option value="200">200€</option>
                                                        <option value="300">300€</option>
                                                        <option value="400">400€</option>
                                                        <option value="500">500€</option>
                                                        <option value="600">600€</option>
                                                        <option value="700">700€</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2-5">
                                        <label class="form-label text-white" for="">Bewertung</label>

                                        <div class="filter-select">
                                        <span class="filter-select-icon">
                                            <img src="{{ asset('assets/img/icons/star-o.png') }}" alt="">
                                        </span>
                                            <select class="form-select w-100 rating" aria-label="Default select example">
                                                <option selected value="">ab X Sterne</option>
                                                <option value="1">ab 1 Stern</option>
                                                <option value="2">ab 2 Sternen</option>
                                                <option value="3">ab 3 Sternen</option>
                                                <option value="4">ab 4 Sternen</option>
                                                <option value="5">ab 5 Sternen</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-2-5">
                                        <div class="filter-btns">
                                            <button type="submit" class="btn btn-white">neue Suche</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-lg-4 pe-lg-5">
                                    <div class="like-advantage">
                                        <a href="{{route('vorteile')}}"><button type="button" class="btn btn-primary btn-icon w-100"><span class="text text-start">Deine Vorteile
                                                mit Carspector</span> <span class="icon"><img src="assets/img/icons/like-white.png" alt=""></span></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row d-lg-none">
                            <div class="col-lg-4">
                                <div class="like-advantage like-advantage-mobo">
                                    <a href="/vorteile"> <button type="button" class="btn btn-primary btn-icon w-100 mb-3"><span class="text text-start">Deine Vorteile mit Carspector</span> <span class="icon"><img src="assets/img/icons/like.png" alt=""></span></button> </a>
                                    <button id="sortTimeDate" type="button" class="btn btn-primary btn-icon w-100"><span class="text text-start">Nach freien Terminen filtern</span> <span class="icon"><img src="assets/img/icons/geplanter-termin.png" alt=""></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-hero-end -->

        <!-- filter-area -->
        <section class="section filter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <div class="filter-title text-center">
                            <h4 class="fw-normal mb-4"><span class="total_number">{{$examiners->total()}}</span> Treffer in <span class="city_name" style="text-transform: capitalize">{{request('city')}}</span></h4>
                            <div class="row gx-3">
                                <div class="col-6 d-none d-lg-block">
                                    <div class="filter-btns dropdown">
                                        <button type="button" class="btn btn-primary-light btn-icon px-3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="text text-start">Nach Termin filtern</span>
                                            <span class="icon"><img src="{{ asset('assets/img/icons/termin2white.png') }}" alt=""></span>
                                        </button>
                                        <div class="dropdown-menu w-100">
                                            <div class="p-3">
                                                <p style="color:black;font-size:15px">Zeige mir nur Prüfer an, welche an folgenden Zeiten verfügbar sind. <br><br> Prüfuhrzeit ist optional. </p>
                                                <div class="date-select select-wrapper mb-3">
                                                    <span class="picker-icon">
                                                        <img src="{{ asset('assets/img/icons/datum.png') }}" alt="">
                                                    </span>
                                                    <div class="picker-input">
                                                        <input type="text"  placeholder="Prüfdatum" class="datepicker availability-date" id="datepicker">
                                                    </div>
                                                </div>

                                                <div class="date-select select-wrapper mb-4">
                                                    <span class="picker-icon">
                                                        <img src="{{ asset('assets/img/icons/zeit.png') }}" alt="">
                                                    </span>
                                                    <div class="picker-input">
                                                        <input type="text" class="timepicker availability-time" placeholder="Prüfuhrzeit (optional)">
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-primary-light btn-availability-search w-100">Treffer anzeigen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 d-lg-none">
                                    <div class="filter-btns">
                                        <button type="button" id="filterBtnMobo" class="btn btn-primary-light btn-icon px-3">
                                            <span class="icon"><img src="{{ asset('assets/img/icons/cog-white.png') }}" alt=""></span>
                                            <span class="text text-center">Filtern</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="filter-btns">

                                        <div class="filter-select bg-primary px-2">
                                            <span class="filter-select-icon">
                                                <img src="{{ asset('assets/img/icons/download.png') }}" alt="">
                                            </span>
                                            <select class="form-select w-100 bg-transparent sort-by" id="sortby" aria-label="Default select example">
                                                {{--                                                <option selected>Sortieren nach: Relevanz</option>--}}
                                                <option selected value="most_booked">Meist gebucht</option>
                                                <option value="best_rating">Beste Bewertung</option>
                                                <option value="price_up">Preis absteigend</option>
                                                <option value="price_down">Preis aufsteigend</option>
                                                {{--                                                <option value="name">Sortieren nach: name</option>--}}
                                                {{--                                                <option value="dob">Sortieren nach: BrithYear</option>--}}
                                                {{--                                                <option value="name">Sortieren nach: Name</option>--}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                    <div class="form-check">
                                        <input class="form-check-input future_available_examiners" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            nur verfügbare Prüfer anzeigen
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pagination_data">
                    @include('partials.examiners',['examiners'=>$examiners])
                </div>

            </div>
        </section>
        <!-- filter-area-end -->
        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog custum-model-width modal-xl modal-xl">
                <div class="modal-content" id="profile_data">

                </div>
            </div>
        </div>
        <!-- modal-end -->

        <!-- modal-for-all-reviews -->
        <div class="modal fade" id="writeReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="form-xhr" action="{{url('submit')}}" method="POST">
                @csrf
                <div class="modal-dialog modal-dialog-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body booking-form" style="width: 100%">
                            <div class="modal-header px-1 pt-2 pb-3">
                                <h6 class="mb-0 fw-normal">Bewertung schreiben</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="">
                                <div class="mb-3 input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/nutzer.png') }}" alt=""></span>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Vollständiger Name">
                                    @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="userReview-item" style="width: 100%;margin-bottom: 30px;">

                                <div class="userReview-ratting" style="text-align: center">
                                    <div class="">
                                        <div class="rating-box">
                                            <div class="rating-container">
                                                <input type="radio" name="rating" value="5" id="star-5"> <label for="star-5">&#9733;</label>

                                                <input type="radio" name="rating" value="4" id="star-4"> <label for="star-4">&#9733;</label>

                                                <input type="radio" name="rating" value="3" id="star-3"> <label for="star-3">&#9733;</label>

                                                <input type="radio" name="rating" value="2" id="star-2"> <label for="star-2">&#9733;</label>

                                                <input type="radio" name="rating" value="1" id="star-1"> <label for="star-1">&#9733;</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="userReview-item" style="width: 100%;margin-bottom: 30px">
                                <div class="userReview">
                                    <div class="userReview-form ">
                                        <textarea name="rating_about_examiner" id="rating_about_examiner" class="form-control" placeholder="Wie war deine Erfahrung mit deinem Prüfer und Carspector?"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="userReview-item" style="width: 100%;margin-bottom: 5px">
                                <div class="mb-lg-5 mb-4 input-check">
                                    <input type="checkbox" name="terms_and_conditions" id="check-1">
                                    <label for="check-1">
                                        <span class="check-ind"></span>
                                        <span class="text">Ich bestätige, dass meine Bewertung der Wahrheit entspricht und ich
bereits eine Prüfung bei diesem Prüfer gebucht habe.</span>
                                    </label>
                                </div>
                                <button type="button" class="btn btn-save btn-dark w-100">Abschicken</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- modal-for-all-reviews-end -->

    </main>

    <!-- sort-availability-mobile -->
    <div class="popup popup-sort" style="border-radius: 15px 15px 15px 15px">
        <div class="popup-wrapper flex-column">
            <div class="popup-header">
                <h6>Nach freien Terminen filtern</h6>
                <p>Zeige mir nur Prüfer an, welche an folgenden Zeiten verfügbar sind</p>
            </div>
            <div class="popup-content">

                <div class="date-select select-wrapper mb-3">
                    <span class="picker-icon">
                        <img src="{{ asset('assets/img/icons/datum.png') }}" alt="">
                    </span>
                    <div class="picker-input">
                        <input type="text" placeholder="Prüfdatum" class="datepicker m-date" id="datepicker1">
                    </div>
                </div>

                <div class="date-select select-wrapper mb-4">
                    <span class="picker-icon">
                        <img src="{{ asset('assets/img/icons/zeit.png') }}" alt="">
                    </span>
                    <div class="picker-input">
                        <input type="text" class="timepicker m-time" placeholder="Prüfuhrzeit (optional)">
                    </div>
                </div>

                <button type="button" class="btn btn-primary-light btn-search-availability w-100">Treffer anzeigen</button>

            </div>
        </div>
    </div>
    <!-- sort-availability-mobile -->
    <div class="popup popup-filter"  style="border-radius: 15px 15px 15px 15px">
        <div class="popup-wrapper">
            <div class="popup-header text-center w-100">
                <h6 class="text-center">Filtern</h6>
            </div>
            <div class="popup-content">
                <form class="filter-form" action="{{route('examiners')}}">
                    <div class="row">
                        <div class="col-12">
                            <div class="filter-input mb-3">
                                <label class="form-label text-dark" for="">Stadt</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white  px-2"><img src="{{ asset('assets/img/icons/adresse.png') }}" alt=""></span>
                                    <input type="text" class="form-control m-city border-start-0" value="{{request('city')}}" placeholder="Düsseldorf" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-end gx-2 mb-3">
                            <div class="col-6">
                                <label class="form-label text-dark" for="">Preis</label>
                                <div class="filter-select">
                                <span class="filter-select-icon">
                                    <img src="{{ asset('assets/img/icons/euro.png') }}" alt="">
                                </span>
                                    <select class="form-select w-100 m-price-from" aria-label="Default select example">
                                        <option selected value="">von</option>
                                        <option value="100">100€</option>
                                        <option value="200">200€</option>
                                        <option value="300">300€</option>
                                        <option value="400">400€</option>
                                        <option value="500">500€</option>
                                        <option value="600">600€</option>
                                        <option value="700">700€</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="filter-select">
                                <span class="filter-select-icon">
                                    <img src="{{ asset('assets/img/icons/euro.png') }}" alt="">
                                </span>
                                    <select class="form-select w-100 m-price-to" aria-label="Default select example">
                                        <option selected value="">bis</option>
                                        <option value="100">100€</option>
                                        <option value="200">200€</option>
                                        <option value="300">300€</option>
                                        <option value="400">400€</option>
                                        <option value="500">500€</option>
                                        <option value="600">600€</option>
                                        <option value="700">700€</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label text-dark" for="">Bewertung</label>
                            <div class="filter-select">
                            <span class="filter-select-icon">
                                <img src="{{ asset('assets/img/icons/star-o.png') }}" alt="">
                            </span>
                                <select class="form-select w-100 m-rating" aria-label="Default select example">
                                    <option selected value="">ab X Sternen</option>
                                    <option value="1">ab 1 Stern</option>
                                    <option value="2">ab 2 Sternen</option>
                                    <option value="3">ab 3 Sternen</option>
                                    <option value="4">ab 4 Sternen</option>
                                    <option value="5">ab 5 Sternen</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary-light w-100">Treffer anzeigen</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/timepicker@1.14.0/jquery.timepicker.js"></script>
    <script>
        $(document).on('click','#allReview',function(){
            $('.reviews-modal').addClass('show d-block');
        });
        $(document).on('click','.btn-close',function(){
            $('.reviews-modal').removeClass('show d-block');
        });

        // filter-popup
        $('#filterBtnMobo').click(function () {
            $('.popup-filter, .overlay').addClass('show');
        });

        $(document).ready(function(e){
            var examiner_id="";
            $(document).on('click','.btn-write-review',function(){
                examiner_id=$(this).attr('data-id');
            })
            $('.btn-save').on('click',function(e){
                var rating_with_examiner=$("input[name=rating]:checked").val();
                var rating_about_examiner=$("textarea[name=rating_about_examiner]").val();
                var name=$('input[name=name]').val();

                if(!$('input[name=terms_and_conditions]').is(":checked")){
                    swal.fire({
                        html:"Bitte Bewertung bestätigen",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    })
                    return;
                }
                console.log(rating_with_examiner);
                if(name.length < 3){
                    swal.fire({
                        html:"Bitte Namen eingeben",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    })
                    return;
                }
                if(rating_about_examiner.length < 3){
                    swal.fire({
                        html:"Bitte Bewertung angeben",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    })
                    return;
                }
                if(rating_with_examiner==''){
                    swal.fire({
                        html:"Bitte Sterne auswählen",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    })
                    return;
                }
                if(examiner_id==''){
                    swal.fire({
                        html:"Please select and examiner...",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "D'accord",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    })
                    return;
                }
                $.ajax({
                    url:"{{route('review.save')}}",
                    type:"POST",
                    data:{
                        examiner_id:examiner_id,
                        rating_with_examiner:rating_with_examiner,
                        rating_about_examiner:rating_about_examiner,
                        name:name,

                    },
                    success:function(data){
                        console.log(data);
                        if(data.success==true){
                            $('#writeReview').modal('hide');
                            //  $("input[name=rating]:checked").val();
                            $("textarea[name=rating_about_examiner]").val('');
                            $('input[name=name]').val('');
                            swal.fire({
                                html:"Danke für deine Bewertung!",
                                icon: "success",
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            })
                        }else {
                            swal.fire({
                                html:data.message,
                                icon: "success",
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            })
                        }
                    },
                    error:function(error){
                        console.log(error);
                        swal.fire({
                            html:"Please login to review",
                            icon: "error",
                            confirmButtonText: "D'accord",

                        })


                    }

                })
            });
        });
        $(".datepicker").flatpickr();
        $(function () {

            // Sort time date
            $('#sortTimeDate, #timeDateDesktop').click(function(){
                $('.popup-sort, .overlay').addClass('show');
            });
            $('.overlay').click(function(){
                $('.popup-sort, .popup-filter, .overlay').removeClass('show');
            });

            $('#allReview').click(function(){
                $('.reviews-modal').addClass('show d-block');
            });
            $('.btn-close').click(function(){
                $('.reviews-modal').removeClass('show d-block');
            });

            // filter-popup
            $('#filterBtnMobo').click(function () {
                $('.popup-filter, .overlay').addClass('show');
            });



            // date-picker
            // $("#datepicker").datepicker({
            //     dateFormat: "yy-mm-dd"
            // });
            // $("#datepicker1").datepicker({
            //     dateFormat: "yy-mm-dd"
            // });


            // date-picker
            $(".timepicker").timepicker({

                'noneOption': [
                    {
                        'label': 'Zeit auswählen (optional)',
                        'className': 'shiby',
                        'value': '',
                        'selected':true,
                    },
                ],
                useSelect: true,
                timeFormat: "H:i",
                interval: 30,
                minTime: "06",
                maxTime: "23:55pm",
                startTime: "01:00",
                dynamic: true,
                dropdown: true,
                scrollbar: false,

            });
        });

    </script>
    <script>
        $(document).ready(function(e){
            $(document).on('click','.future_available_examiners',function(e){
                searchExaminer();
            })
            var queries= getUrlVars();

            function getUrlVars()
            {
                var vars = [], hash;
                var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                for(var i = 0; i < hashes.length; i++)
                {
                    hash = hashes[i].split('=');
                    vars.push(hash[0]);
                    vars[hash[0]] = hash[1];
                }
                return vars;
            }

            $('.filter-form').submit(function(e){
                e.preventDefault();
                searchExaminer()
            })

            $(document).on("click","#pagination button,#search_btn",function(e){

                e.preventDefault();
                //get url and make final url for ajax
                var url=$(this).attr("href");
                var append=url.indexOf("?")==-1?"?":"&";
                var finalURL=url+append;
                var body = $("html, body");
                body.stop().animate({scrollTop:300}, 100, 'swing', function() {

                });
                //set to current url
                window.history.pushState({},null, finalURL);

                $('#pagination_data').html('');
                $('.loading-row').show();
                $.get(finalURL,function(data){
                    $('.loading-row').hide();
                    $("#pagination_data").html(data.html);
                    console.log($('.btn-examiner-profile').length);
                    $('.total_number').html(data.total)

                });
                return false;
            })
            $(document).on('change','#sortby',function(e){
                searchExaminer();
            })



            $(document).on('click','.btn-examiner-profile',function(e){
                var id=$(this).attr('data-id');
                $('#profile_data').html('');
                $.ajax({
                    type:"GET",
                    url:"{{url('/profile')}}/"+id,
                    data:{},
                    success:function(data){
                        $('#profile_data').html(data);

                    }
                })

            })

            $(document).on('click','.btn-availability-search',function(e){
                searchExaminer();
            });

            $(document).on('click','.btn-search-availability',function(e){
                searchExaminer();
            });



            function searchExaminer(){

                $('.popup-sort, .popup-filter, .overlay').removeClass('show');


                $('#pagination_data').html('');
                $('.loading-row').show();
                var sortBy="";
                var city="";
                var minprice="";
                var maxprice="";
                var rating="";
                var completedOrders="";
                var sortyBy="";
                var time="";
                var date="";
                var availibilitycheck=$('.future_available_examiners').is(':checked');
                if(window.innerWidth < 992){
                    console.log('Mobile');
                    sortBy=$('#sortby').val();
                    city=$('.m-city').val();
                    minprice=$('.m-price-from').val();
                    maxprice=$('.m-price-to').val();
                    rating=$('.m-rating').val();
                    completedOrders=$('.m-completed-orders').val();
                    sortyBy=$('.sort-by').val();
                    time=$('.m-time').val();
                    date=$('.m-date').val();

                }else{
                    sortBy=$('#sortby').val();
                    city=$('.city-filter').val();
                    minprice=$('.min-price').val();
                    maxprice=$('.max-price').val();
                    rating=$('.rating').val();
                    completedOrders=$('.completed-orders').val();
                    sortyBy=$('.sort-by').val();
                    time=$('.availability-time').val();
                    date=$('.availability-date').val();
                }

                var url='{{route('examiners')}}';
                url+='?city='+city+'&minprice='+minprice+'&maxprice'+maxprice+'&rating='+rating+'&completed_orders='+completedOrders+'&sortby='+sortyBy+'&date='+date+'&time='+time+'&availability='+availibilitycheck;
                var finalURL=url;
                window.history.pushState({},null, finalURL);
                if(city.length <3 ){
                    alert('Please enter city name greater than 3 characters');
                }

                $('.city_name').text(city);

                $.ajax({
                    url:'{{route('examiners')}}',
                    type:"GET",
                    data:{sortby:sortBy,
                        city:city,
                        minprice:minprice,
                        maxprice:maxprice,
                        rating:rating,
                        completed_orders:completedOrders,
                        date:date,
                        time:time,
                        availability:availibilitycheck,
                    },
                    success:function(data){
                        $('.loading-row').hide();
                        $("#pagination_data").html(data.html);
                        $('.total_number').html(data.total)
                        var body = $("html, body");
                        body.stop().animate({scrollTop:300}, 100, 'swing', function() {

                        });
                    }

                })
            }
            $(document).on('click','.btn-reset-filter',function(){
                resetFilter();
            });
            function resetFilter(){
                $('.property_min_price').val(0);
                $('.property_max_price').val(10000);
                $('.country').val('');
                category='';
                $('.area-min').val("");
                $('.area-max').val("");
                $('.property_type').prop('checked',false);
                $('.amenity-checkbox').prop('checked',false);
                $('.bathrooms').prop('checked',false);
                $('.bedrooms').prop('checked',false);

            }

        })
    </script>
@endsection

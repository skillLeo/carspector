@extends('mainpages.mainlayout')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/review.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">--}}
    <style>
        .dropdown-menu li a:hover{
            background: #01449A;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="step-wrap container top-breadcrumb">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('')}}">Carspector</a></li>
            <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Fahrzeugtyp</a></li>
            <li class="breadcrumb-item"><a href="{{route('examiner.check',['city'=>request('city')])}}">Auto</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kaufbegleitung</li>
        </ol>
    </nav>
    </div>
    <main>

        <!-- step-info -->
        <section class="step-wrap">
            <div class="container-sm">
                <div class="mb-5 text-center text-lg-center">
                    <h3 class="fs-4 pb-2 pb-lg-3">Wähle deinen Prüfer</h3>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-8 mx-auto">
                        <div class="mb-5 mb-lg-4 text-center text-lg-start pb-4 pb-md-0">

                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-white gap-4 px-3 dropdown-toggle">Meist gebucht</a>

                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="width: 176px;border: 0px;border-radius: 0px;box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;">
                                    <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['mostly_booked'=>'yes','city'=>request('city')])}}">Meist gebucht</a></li>
                                    <li><a class="dropdown-item" href="{{route('examiners',['sortby'=>'best_rating','city'=>request('city')])}}">Beste Bewertung</a></li>
                                    <li><a class="dropdown-item" href="{{route('examiners',['sortby'=>'price_up','city'=>request('city')])}}">Preis absteigend</a></li>
                                    <li><a class="dropdown-item" href="{{route('examiners',['sortby'=>'price_down','city'=>request('city')])}}">Preis aufsteigend</a></li>
                                </ul>
                        </div>
                        <div class="user-cards" id="pagination_data">
                            <!-- user-card-item -->
                            @include('partials.examiners',['examiners'=>$examiners])
                            <!-- user-card-item-end -->
                            <!-- user-card-item-end -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- step-info-end -->


        <div class="modal fade" id="writeReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="form-xhr" action="{{route('review.save')}}" method="POST">
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
    </main>
    <!-- Modal -->
    <div class="modal modal-about fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="profile_data">

            </div>
        </div>
    </div>
    <!-- modal -->

@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(e){

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

            $(document).on("click","#pagination a,#search_btn",function(e){

                e.preventDefault();
                //get url and make final url for ajax
                var url=$(this).attr("href");
                var append=url.indexOf("?")==-1?"?":"&";
                var finalURL=url+append;

                //set to current url
                window.history.pushState({},null, finalURL);

                $('#pagination_data').html('');
                $('.loading-row').show();
                $.get(finalURL,function(data){
                    $('.loading-row').hide();
                    $("#pagination_data").html(data);

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
                    url:"{{url('/profile1')}}/"+id,
                    data:{city:"{{request('city')}}",type:"{{request('type')}}"},
                    success:function(data){
                        $('#profile_data').html(data);
                    }
                })

            })




            function searchExaminer(){



                $('#pagination_data').html('');
                $('.loading-row').show();
                var sortBy=$('#sortby').val();
                var city=$('.city-filter').val();
                var minprice=$('.min-price').val();
                var maxprice=$('.max-price').val();
                var rating=$('.rating').val();
                var completedOrders=$('.completed-orders').val();

                var url='{{route('examiners')}}';
                url+='?city='+city+'&minprice='+minprice+'&maxprice'+maxprice+'&rating='+rating+'&completed_orders='+completedOrders;
                var finalURL=url;
                window.history.pushState({},null, finalURL);

                $.ajax({
                    url:'{{route('examiners')}}',
                    type:"GET",
                    data:{sortyBy:sortBy,
                        city:city,
                        minprice:minprice,
                        maxprice:maxprice,
                        rating:rating,
                        completed_orders:completedOrders,
                    },
                    success:function(data){
                        $('.loading-row').hide();
                        $("#pagination_data").html(data);

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
        })
    </script>
@endsection

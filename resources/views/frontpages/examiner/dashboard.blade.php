<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .filepond--list-scroller{
            min-height: 500px;
        }
        .filepond--drop-label{
            top:22px;
            z-index:99999;
        }
        .modal-footer{
            z-index: 99999999;
        }

        .image-upload {
            position: relative;
            display: inline-block;
        }

        .input-file {
            display: none;
        }

        .upload-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1877F2;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-button i {
            margin-right: 8px;
        }

        .upload-button:hover {
            background-color: #0F5DB9;
        }
        /*.btn-icon{*/
        /*    display: inline-block;*/
        /*    font-style: normal;*/
        /*    font-variant: normal;*/
        /*    text-rendering: auto;*/
        /*    -webkit-font-smoothing: antialiased;*/
        /*}*/
        .btn-after::after{
            content: "";
            background-image: url("{{asset('assets/img/icons/remove.png')}}");
            width: 13px;
            background-size: 100% 100%;
            height: 14px;
            display: inline-block;
            margin: -2px;
            position: relative;
            left: 14px;
        }

        .popup1 {
            position: relative;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* The actual popup */
        .popup1 .popuptext {
            visibility: hidden;
            width: 200px;
            background-color: white;
            color: black;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            padding-left: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
            box-shadow: 3px 2px 4px;

        }

        /* Popup arrow */
        .popup1 .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        /* Toggle this class - hide and show the popup */
        .popup1 .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
        }
        .profile-points{

        }
        .profile-points li{
            font-size: 13px;
            white-space: nowrap;
        }
    </style>



    <!-- css-start-end -->
</head>

<body>
@extends('mainpages.mainlayout')
@section('content')
    <!-- main -->
    <main>
        <!-- hero-area -->
        <section class="hero-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-wrapper">
                            <img src="{{ asset('exm/assets/imgs/main-bg.png') }}" class="hero-bg" alt="" />
                            <div class="hero-content">
                                <!-- hero-user -->
                                <div class="hero-user">
                                    <div class="hero-user--img portal-img">
                                        <img src="{{$user->image}}" alt="" />
                                        <button type="button" class="user-edit" data-bs-toggle="modal" data-bs-target="#profile-picture">
                                            <img src="{{ asset('exm/assets/imgs/pencil.svg') }}" alt="" />
                                        </button>
                                    </div>
                                    <div class="hero-user--content">
                                        <h4 class="fs-main">{{$user->name}}</h4>
                                        <div class="user-btns">
                                            @if($user->verify_status=='verified')
                                            <a href="" class="btn btn-primary">Verifiziert</a>
                                            @else
                                                <a href="" class="btn btn-danger">Not Verified</a>
                                            @endif
                                            <div class="dropdown">
                                                @if($user->image=='avatar.png' || strlen($user->about_me) < 350 || (!$availablity) || !count($user->cities) || $user->price=="" || !$user->price)
                                                <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    Nicht sichtbar
                                                </button>
                                                <ul class="dropdown-menu profile-points">
                                                    @if($user->image='avatar.png')
                                                        <li>- Profilbild auswählen</li>
                                                    @endif
                                                    @if(strlen($user->about_me) < 350)
                                                        <li>- Profil bearbeiten</li>
                                                    @endif
                                                    @if((!$availablity))
                                                        <li>- Verfügbarkeit angeben</li>
                                                    @endif
                                                    @if(!count($user->cities))
                                                        <li>- Arbeitsgebiet festlegen</li>
                                                    @endif
                                                    @if($user->price=="" || !$user->price)
                                                        <li>- Preis festlegen</li>
                                                    @endif
                                                </ul>
                                                @else
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                        Profil sichtbar
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="user-rattings">
                                            @php
                                                $rating = avg_reviews($user->id); // Replace this with your actual rating value
                                                $fullStars = floor($rating);
                                                $halfStar = ceil($rating - $fullStars);
                                                $emptyStars = 5 - $fullStars - $halfStar;
                                            @endphp

                                            <div class="user-rattings--stars">
                                                @for ($i = 0; $i < $fullStars; $i++)
                                                    <img src="{{ asset('exm/assets/imgs/star.svg') }}" alt="" />
                                                @endfor

                                                @if ($halfStar > 0)
                                                    <img src="{{ asset('exm/assets/imgs/star-o.svg') }}" alt="" />
                                                @endif

                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <img src="{{ asset('exm/assets/imgs/star-svg-gray.svg') }}" alt="" />
                                                @endfor
                                            </div>
                                            <span>{{avg_reviews($user->id)}}/5.0 </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- hero-user-end -->

                                <!-- hero-right -->
                                <div class="hero-right">
                                    <div class="d-flex align-items-center gap-2 gap-xxl-4 hero-btns">
                                        <button role="button"  data-id="{{$user->id}}" data-bs-toggle="modal" data-bs-target="#profile-modal" class="btn btn-white btn-examiner-profile">Profil anzeigen</button>
                                        <a href="{{route('examiner.edit-profile')}}" type="button" class="btn btn-white">
                                            <span><img src="{{ asset('exm/assets/imgs/pencil-sm.svg') }}" alt="" /></span>
                                            Profil bearbeiten
                                        </a>
                                        <a href="{{route('password.change')}}" type="button" class="btn btn-white">
                                            <span><img src="{{ asset('exm/assets/imgs/pencil-sm.svg') }}" alt="" /></span>
                                            Passwort Ändern
                                        </a>
                                        <a href="{{route('examiner.availability')}}" type="button" class="btn btn-white">
                                            <span><img src="{{ asset('exm/assets/imgs/pencil-sm.svg') }}" alt="" /></span>
                                            Meine Verfügbarkeit
                                        </a>
                                    </div>
                                    <h4 class="fs-main">Abgeschlossene Aufträge : {{completed_order($user->id)}}</h4>
                                </div>
                                <!-- hero-right-end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero-area-end -->

        <!-- main-content -->
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="box-white work-box" style="min-height: 508px;">
                            <h4 class="fs-main">Arbeitsgebeit</h4>
                            <div class="work-form" >
                                <form action="{{ route('examiner.update-cities') }}" class="form-xhr" method="POST">
                                    <input name="city" type="text" placeholder="Stadt" />
                                    <button type="submit" class="btn btn-secondary">
                                        Hinzufügen
                                    </button>
                                </form>
                                <div class="work-lists"  style="max-height: 468px;overflow: auto">
                                    <ul id="examiner-cities">
                                        @if(count($examinerCities) > 0)
                                        @foreach($examinerCities as $city)
                                        <li>
                                            <span>{{$city->name}}</span>
                                            <a href="{{route('examiner.delete-city',$city->id)}}" type="button" class="">
                                                <img style="margin-right: 15px" src="{{ asset('exm/assets/imgs/cross.svg') }}" alt="" />
                                            </a>
                                        </li>
                                        @endforeach
                                        @else
                                        <li class="text-center justify-content-center p-5 m-5"><h3 align="center">/</h3></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row gy-3">
                            <div class="col-12 order-1 order-md-0">
                                <div class="widget widget-credit">
                                    <h3 class="fs-main">Guthaben</h3>
                                    <div class="credit-items">
                                        <!-- credit-item -->
                                        <div class="credit-item">
                                            <h5 class="fs-main fw-normal">Mein Guthaben</h5>
                                            <h6>{{number_format($user->balance,2)}} €</h6>
                                        </div>
                                        <!-- credit-item-end -->
                                        <!-- credit-item -->
                                        <div class="credit-item">
                                            <h5 class="fs-main fw-normal">In Bearbeitung</h5>
                                            <h6>{{number_format($totalPending,2)}} €</h6>
                                        </div>
                                        <!-- credit-item-end -->
                                    </div>
                                    <a href="#withdrawModal" data-bs-toggle="modal" data-bs-target="#withdrawModal" class="btn btn-secondary w-100">Jetzt Auszahlen</a>
                                </div>
                            </div>
                            <div class="col-12 order-0 order-md-1">
                                <form action="{{ route('examiner.change-price') }}" class="form-xhr" method="POST">
                                <div class="widget widget-credit">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 class="fs-main">Preis</h3>
                                        <span class="fs-main fw-bold"><span id="price">{{$user->price}}</span> <span class="fw-normal">€</span></span>
                                    </div>
                                    <div class="price-input">


                                            @csrf
                                            <input type="text" name="new_price" pattern="\d*" placeholder="Neuer Preis" />

                                    </div>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <button type="submit" class="btn btn-secondary w-50">
                                            Speichern
                                        </button>
                                    </div>

                                </div>
                                </form>
                            </div>
                            <div class="col-12 order-2 order-md-2">
                                <div class="text-end mb-4 mb-lg-0">
                                    @if(auth()->user())
                                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-secondary">Abmelden</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-lg-8">
                        <div class="box-white bookigs">
                            <div class="d-flex align-items-center flex-wrap gap-4">
                                <h4 class="fs-main">Meine Buchungen</h4>
                                <h4 class="fs-main">Aktive Aufträge: {{count($orders)}}</h4>
                                <div class="my-orders-wrapper" style="width: 100%">
                                    @foreach($orders as $order)
                                        <div class="my-booking mb-3">
                                            <div class="date-info">
                                                <span class="date">{{ $order->brand }} </span>
                                                <span class="time">{{$order->vehicle_make_model}}</span>
                                            </div>
                                            <div class="my-booking-allInfo">
                                                <button type="button" data-id="{{$order->id}}" class="btn btn-white text-dark btn-order-details"  data-bs-toggle="modal" data-bs-target="#exampleModal">Alle Infos ansehen</button>
                                            </div>
                                        </div>

                                    @endforeach
                                    {{--                                    <div class="my-booking mb-0">--}}
                                    {{--                                        <div class="date-info">--}}
                                    {{--                                            <span class="date">{{date('d.m.Y',strtotime($order->date))}}</span>--}}
                                    {{--                                            <span class="time">{{date('h:i a',strtotime($order->date))}}</span>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="my-booking-allInfo">--}}
                                    {{--                                            <button type="button" class="btn btn-white text-dark" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Alle Infos ansehen</button>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <a href="{{route('examiner.bookings')}}" class="btn btn-secondary">Abgeschlossene Aufträge</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-end -->
    </main>
    <!-- main-end -->
</div>
<!-- main-end -->
<!-- pertner-portal-end -->
<div class="modal fade" id="profile-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog custum-model-width modal-xl modal-xl">
        <div class="modal-content" id="profile_data">

        </div>
    </div>
</div>
</main>

<div class="modal all-info-popup fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="booking_detail">

        </div>
    </div>
</div>




<div class="modal fade" id="profile-picture" tabindex="-1" >

    <div class="modal-dialog modal-md">
        <div class="modal-content" style="min-height: 350px">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container pb-4">
                    <div class="row d-flex justify-content-center ">
                        <div class="col-12 text-center">
                            <div class="image-upload">
                                <input type="file"  id="inputImage" class="input-file">
                                <label for="inputImage" class="upload-button">
                                    <i class="fas fa-upload"></i> Bild auswählen
                                </label>
                            </div>
                            <div class="crop-container mt-2">
                                <img style="width: 100%" src="" alt="" id="previewImage">
                            </div>
                        </div>
                    </div>


                    @csrf
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="background-color: #AD250A" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                <button type="button" style="background-color: #1877f2"class="btn btn-primary" id="cropButton">Speichern <span style="display: none;" class="spinner-border spinner-border-sm price-loading" role="status" aria-hidden="true"></span></button>
            </div>

        </div>

    </div>

</div>
<div class="modal fade" id="withdrawModal" tabindex="-1" >
    <form method="post" class="form-xhr" enctype="multipart/form-data" action="{{route('post-withdraw')}}">
        @csrf
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="min-height: 350px">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container pb-4">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-12">
                                <div class="mb-3 input-group">
                                    <div class="filter-select" style="width: 100%; border: 1px solid;border-radius: 10px;">
                                <span class="filter-select-icon">
                                    <img src="{{ asset('assets/img/icons/euro.png') }}" alt="">
                                </span>
                                        <select name="payment_type" class="form-select w-100 border-1 m-price-from payment-method-select" aria-label="Default select example">
                                            <option selected value="">Auszahlmethode</option>
                                            <option value="Bank">Banküberweisung</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/geschaft.png') }}" alt=""></span>
                                    <textarea name="desc" class="form-control " id="" placeholder="Notiz (optional)"></textarea>

                                </div>
                            </div>
                            <div class="col-12 type-paypal">
                                <div class="mb-3 input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/email.png') }}" alt=""></span>
                                    <input type="email" class="form-control" name="paypal_email"  placeholder="Paypal E-Mail">

                                </div>
                            </div>
                            <div class="col-12 type-bank">
                                <div class="mb-3 input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/kreditkarte.png') }}" alt=""></span>
                                    <input type="text" class="form-control" name="iban"  placeholder="IBAN">

                                </div>
                            </div>
                            <div class="col-12 type-bank">
                                <div class="mb-3 input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/kunde.png') }}" alt=""></span>
                                    <input type="text" class="form-control" name="account_title" value="{{old('email')}}" placeholder="Kontoinhaber">

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background-color: #AD250A" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="submit" style="background-color: #0AAD1D" class="btn btn-primary">Jetzt auszahlen <span style="display: none;" class="spinner-border spinner-border-sm price-loading" role="status" aria-hidden="true"></span></button>
                </div>

            </div>

        </div>
    </form>
</div>
<!-- scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('exm/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>

<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="{{asset('cropper/dist/cropper.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
    $(document).ready(function() {
        // Initialize Cropper.js
        var cropper;

        // Handle file input change event
        $('#inputImage').on('change', function(e) {
            var files = e.target.files;
            if (files.length > 0) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#previewImage').attr('src', event.target.result);

                    // Initialize Cropper.js
                    cropper = new Cropper($('#previewImage')[0], {
                        aspectRatio: 1, // Set desired aspect ratio for cropping
                        viewMode: 3, // Set the Cropper.js view mode
                        dragMode: 'move', // Enable dragging the crop box
                        autoCropArea: 0.8, // Set initial crop area size
                        cropBoxResizable: true, // Disable resizing of the crop box
                        cropBoxMovable: true, // Disable moving of the crop box
                    });
                };
                reader.readAsDataURL(files[0]);
            }
        });

        // Handle crop and upload button click event
        $('#cropButton').on('click', function() {
            // Get cropped image data
            cropper.getCroppedCanvas().toBlob((blob) => {
                const formData = new FormData();
                formData.append('image', blob/*, 'example.png' */);

                $('.price-loading').show();
                // Use `jQuery.ajax` method for example
                $.ajax('{{route('examiner.update-image')}}', {
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success(data) {
                        $('.price-loading').hide();
                        $("#profile-picture").modal('hide')
                        console.log('Upload success');
                        $('.portal-img > img').attr('src',data.url)
                    },
                    error() {
                        $('.price-loading').hide();
                        console.log('Upload error');
                    },
                });
            });
        });
    });
    $('.type-paypal').hide();
    $('.type-bank').hide();
    $(document).on('click','.btn-order-details',function(e){
        var id=$(this).attr('data-id');
        $.ajax({
            url:"{{url('order')}}/"+id,
            type:"GET",
            data:{},
            success:function(data){
                $('#booking_detail').html(data);
            },
            error:function(erorr){

            }
        })

    })
    $('.payment-method-select').on('change',function(){
        var paymentMethod=$(this).val();
        console.log(paymentMethod);
        if(paymentMethod=='Paypal'){
            $('.type-paypal').show();
            $('.type-bank').hide();
        }else{
            $('.type-paypal').hide();
            $('.type-bank').show();
        }
    })
</script>
<script>

    $(document).on('show.bs.modal','#profile-picture',function(){



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
    $('.form-xhr').submit(function(e){
        e.preventDefault();

        // KTUtil.btnRelease(btn);
        let f = $(this),
            dat = new FormData(f[0]);
        $(this).find('.price-loading').show();
        $.ajax({
            url: f.attr('action'),
            type: f.attr('method'),
            dataType: 'JSON',
            data: dat,
            processData: false,
            contentType: false,
            error: function(error) {
                $('.price-loading').hide();
                let txt = "";
                if(error.status == 422) {
                    txt += "<div class='text-left'>"
                    for(let m in error.responseJSON.errors) {
                        for (let n in error.responseJSON.errors[m]) {
                            txt += "- " + error.responseJSON.errors[m][n] + "<br>";
                        }
                    }
                    txt += "</div>"
                } else {
                    txt = error.responseJSON.message;
                }
                swal.fire({
                    html: txt,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "D'accord",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                }).then(function() {
                    // KTUtil.btnRelease(btn);
                });
            },
            success: function(data) {
                // KTApp.unblockPage();
                $('#price-modal').modal('hide');
                $('.price-loading').hide();
                $('#profile-picture').modal('hide');
                $('#withdrawModal').modal('hide');
                if(data.file){
                    $('.user-image').attr('src',data.file);
                }
                if(data.cities){
                    var cityHtml="";
                    for(var i=0;i<data.cities.length;i++) {

                        // cityHtml+=' <li style="text-transform: capitalize">'+data.cities[i].name+' <span class="float-end"><i class="fa fa-circle-xmark" style="color: red;font-size: 18px"></i></span> </li>';

                        cityHtml+='<li><span>'+data.cities[i].name+'</span><a href="#" type="button" class=""> <img src="{{ asset('exm/assets/imgs/cross.svg') }}" alt="" /></a></li>';
                    }
                    $('#examiner-cities').html(cityHtml);

                    $('.cities').attr('checked',false);
                    $('.cities').each(function (index,value){
                        // console.log(index);
                        // console.log(value);
                        for(var i=0;i<data.cities.length;i++) {
                            if($(this).val()==data.cities[i].id){
                                $(this).attr('checked',true);
                            }
                        }
                    })
                }
                if(data.success) {
                    $('#price').html(data.price);
                    $('#work-modal').modal('hide');
                    f[0].reset()
                    swal.fire({
                        html: "Aktualisiert.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {

                        if(typeof(data.redirect) != 'undefined')
                            document.location.href = data.redirect
                        else if (typeof(data.event_to_trigger) != 'undefined') {
                            console.log("Triggering "+data.event_to_trigger+" event ...");
                            $.event.trigger({
                                type: data.event_to_trigger,
                                parameters: data.parameters
                            })
                        } else {
                            console.log("No triggerable event.");
                            return true;
                        }
                    });
                } else if (typeof(data.event_to_trigger) != 'undefined') {
                    console.log("Triggering "+data.event_to_trigger+" event ...");
                    $.event.trigger({
                        type: data.event_to_trigger,
                        parameters: data.parameters
                    })
                } else {
                    swal.fire({
                        html: data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "D'accord",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        // KTUtil.btnRelease(btn);
                    });
                }
            }
        });
    });
</script>
</body>

</html>

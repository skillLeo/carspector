@extends('mainpages.mainlayout')
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/tutorials/timelines/timeline-1/assets/css/timeline-1.css">
    <style>
        /*@media screen and (max-width: 678px) {*/
            /*.shadow-1{*/
            /*    box-shadow: none;*/
            /*    padding: 0px !important;*/
            /*}*/
            .form-control.form-control-sm {
                height: 55px;
                font-size: 15px;

            }
            .form-login .form-wrapper, .form-profile .form-wrapper {
                max-width: 450px;
            }
            /*.option-box{*/
            /*    border:1px solid blue !important;*/
            /*    padding: 10px 5px !important;*/
            /*}*/
        /*}*/
        .form-select-type{
            height: 55px;
        }
        body{
            counter-reset: section;
        }

            .form-control.form-control-sm {
                height: 50px;
                font-size: 15px;
                margin-bottom: 15px;
            }


            .form-login .form-wrapper, .form-profile .form-wrapper {
                max-width: 450px;
            }

            @media (min-width: 768px) { 
            .df-top {
                padding-top: 30px;
            }
            .bg-c {
                padding-bottom: 40px;
            }
        }

        @media (max-width: 767px) { 
            .df-top {
                padding-top: 50px;
            }
            .bg-c {
                padding-bottom: 5px;
            }
        }


        .section-btn {
            border: 0px;
            height: 46px;
            color: black;
            background-color: white;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 17px;
            font-weight: 500;
            font-family: var(--font-1);
            border-radius: 5px;
            box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.25);
            transition: all .25s ease-in-out;
        }
        .section-btn:hover {
            background-color: var(--primary);
        }
        .btn-check:checked+.btn, .btn.active, .btn.show, .btn:first-child:active, :not(.btn-check)+.btn:active {
            background-color: var(--secondary) !important;
            color: white !important;
        }
        .btn-check:checked+.bntno, .bntno.active, .bntno.show, .bntno:first-child:active, :not(.btn-check)+.bntno:active {
            background-color:#d33131 !important;
            color: white !important;
        }

        .exam-card-header-icon {
            margin-right: 15px;
        }

        #city-input.success {
            border: 2px solid var(--secondary);
        }
        .bsb-timeline-1 .timeline>.timeline-item:before{
            counter-increment: section;
            content: ""counter(section)"";
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            color: white;
            padding: 12px;
            background-color: var(--primary);
        }

        .bsb-timeline-1 .timeline>.timeline-item:last-child:before {
            background-color: var(--secondary); 
        }

        .bsb-timeline-1 .timeline:after {
            background-color: var(--bsb-tl-color);
            bottom: 0;
            content: "";
            left: 0;
            margin-left: 16px;
            position: absolute;
            top: 0;
            width: 2px;
        }
        .bsb-timeline-1 .timeline>.timeline-item .timeline-content {
            padding: 0 0 1.2rem 2.5rem;
        }
        .btn-ablauf:hover {
        background-color: var(--secondary) !important;
        }

        .btn-zah:hover {
            background-color: var(--primary) !important;
            color: white !important;
        }
    </style>
@endsection
@section('content')
    
    <section class="bg-c" style="background-color: #f0f5fa">
    <div class="step-wrap container top-breadcrumb">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Carspector</a></li>
                <li class="breadcrumb-item"><a href="{{route('booking.option-page',['city'=>request('city')])}}">Fahrzeugtyp</a></li>
                <!-- <li class="breadcrumb-item"><a href="{{route('booking.options',['city'=>request('city')])}}">Weitere Fahrzeugklassen</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">{{ucfirst(request('type'))}}</li>
            </ol>
        </nav>
    </div>
    <main>
    @csrf
                <input type="hidden" name="id" value="{{request('id')}}">
                <div class="container-sm">
                <div class="df-top mb-5 mb-md-3 text-center text-lg-center">
                    @if(request('type')=='wohnmobil')
                        <h3 class="fs-4">{{ucfirst(request('type'))}}-Check</h3>
                            <p class="text-primary ml-2" style="line-height: 1.5; font-size: 17px;margin-left: 2px;">
                                <i class="fa-solid fa-star" style="color: #FFD43B; padding-right: 5px"></i> 4.7 (134 Bewertungen)
                            </p>
                            <br><button type="button" data-bs-target="#step_desc_modal" data-bs-toggle="modal" style="width: 300px; height: 50px; font-size: 16px; background-color: var(--primary); color: white" class="btn btn-ablauf btn-primary shadow">Ablauf ansehen</button>
                    @else
                        <h3 class="fs-4">{{ucfirst(request('type'))}}</h3>
                    @endif
                

        </div>
    </section>

        <!-- step-info -->
        <section class="step-wrap">

        <form action="{{route('booking.request.post')}}" class="row form-wrapper mx-auto" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{request('id')}}">
                <div class="container-sm">
                    <div class="row mb-5 pt-lg-5">
                        <div class="col-lg-7 mx-auto">
                            <div class="bg-white rounded-1 py-4 px-lg-5  p-3 pb-2 shadow-1 position-relative">
                                <div>

                                    <!-- @if(request('type')=='wohnmobil')
                                        <a href="{{route('vorteile5')}}" class="section-btn" style="width:100%; background-color: #01449A; height: 55px">Prüfungsinhalte ansehen</a><br>
                                    @elseif(request('type')=='sonstiges')
                                        <a href="{{route('kontakt')}}" class="section-btn" style="width:100%; background-color: #01449A; height: 55px">Support kontaktieren</a><br>
                                    @endif -->

                                        <div style="padding-top: 15px" class="row mb-5 mb-md-4">
                                            <div class="col-12">
                                                <h5>Details zum Fahrzeug</h5>
                                            </div>
                                            <div style="padding-top: 15px" class="">
                                                <div class="mb-3">
                                                    <p class="mb-0 text-black fs-6">Fahrzeugtyp<sup class="text-primary">*</sup></p>
                                
                                                    <div class="input-box">
                                                        <select class="form-select form-select-md form-select-type shadow" style="height: 55px" name="type">
                                                            <option value="wohnmobil">Wohnmobil</option>
                                                            <option value="sonstiges">Sonstiges</option>
                                                        </select>
                                                        @error('type')
                                                        <div class="invalid-feedback d-block">{{$message}}</div>
                                                        @enderror
                                                    </div> 
                                                </div>
                                                <br><hr style="padding-bottom: 25px">
                                            </div>
                                            
                                            <div  class="">
                                                <div class="mb-3 ">
                                                    <p class="mb-0 text-black fs-6">Marke & Modell<sup class="text-primary">*</sup></p>
                                                    <div class="input-box">
                                                        <input name="vehicle_make_model" type="text" value="{{old('vehicle_make_model')}}" style="height: 55px" class="form-control form-control-sm shadow">
                                                        @error('vehicle_make_model')
                                                        <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="mb-3">
                                                    <p class="mb-0 text-black fs-6">Link zum Inserat - z.B. mobile.de</p>
                                                    <div class="input-box">
                                                        <input name="advertisement_link"  value="{{old('advertisement_link')}}" type="text" style="height: 55px" class="form-control form-control-sm shadow">
                                                        @error('advertisement_link')
                                                        <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Standort: Stadt oder PLZ<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="city" value="{{request('city')}}" type="text" style="height: 55px" class="form-control form-control-sm shadow">
                                                    @error('city')
                                                    <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div style="padding-top: 15px" class="col-md-12">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Wünsche an die Prüfung<span style="color: gray; font-size: 15px"> (optional)</span></p>
                                                <div class="input-box">
                                                    <textarea name="desc" style="height: 150px; font-size:15px" class="form-control shadow" id="" cols="30" rows="20">{{old('desc')}}</textarea>
                                                    @error('desc')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        <br><hr>

                                        </div>
                                        </div>


                                    <div class="row">
                                        <div class="col-12">
                                            <h5>Deine Kontaktdaten</h5>
                                        </div>
                                        <div style="padding-top: 15px" class="">
                                                <div class="mb-3">
                                                    <p class="mb-0 text-black fs-6">Name<sup class="text-primary">*</sup></p>
                                                    <div class="input-box">
                                                        <input name="name" type="text" value="{{old('name')}}" style="height: 55px" class="form-control form-control-sm shadow">
                                                        @error('name')
                                                        <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="">
                                                <div class="mb-3 ">
                                                    <p class="mb-0 text-black fs-6">E-Mail<sup class="text-primary">*</sup></p>
                                                    <div class="input-box">
                                                        <input name="email" type="text" value="{{old('email')}}" style="height: 55px" class="form-control form-control-sm shadow">
                                                        @error('email')
                                                        <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        <p class="mb-0 text-black fs-6">Pflichtfelder mit <sup class="text-primary">*</sup> markiert.</p>
                                        <!-- <div style="padding-top: 25px" class="col-md-12">
                                            <div class="mb-0">

                                                <div class="form-check">
                                                    <input required style="margin-top: 2px; border-color: #01449A" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label mb-0 text-black fs-6" for="flexCheckDefault">
                                                        Ich bestätige, dass der Autoverkäufer mit der Prüfung einverstanden ist.<sup class="text-primary">*</sup>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>

                                    <br>
                                    <!-- <button type="submit" href="" class="btn-next btn btn-secondary btn-further px-5 mt-3 py-2 fs-5 shadow-1" >Preis anfragen</button> -->
                                    <br><button type="submit" href="" style="width: 100%; height: 55px; font-size: 17px" class="btn btn-zah btn-secondary shadow">Anfrage stellen</button>
                                    <p style="padding-top:30px; font-size: 16px; font-weight: 450; text-align: center; color: var(--primary)">Wir senden dir innerhalb weniger Stunden ein unverbindliches Angebot per E-Mail zu.</p>
                                        <br>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- step-info-end -->
        <div class="modal" id="step_desc_modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Anfragen-Ablauf</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Timeline 1 - Bootstrap Brain Component -->
                        <section class="bsb-timeline-1">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-12 col-xl-12">

                                        <ul class="timeline">
                                            <li class="timeline-item">
                                                <div class="timeline-body">
                                                    <div class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Infos + Anfrage</h4>
                                                                <p class="card-text" style="padding-left: 20px">Teile uns alle relevanten Fahrzeuginformationen mit und sende deine Anfrage ab.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-body">
                                                    <div class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Angebotsprüfung</h4>
                                                                <p class="card-text" style="padding-left: 20px">Wir prüfen deine Anfrage und senden dir zeitnah ein unverbindliches Angebot.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-body">
                                                    <div  class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Zahlung</h4>
                                                                <p class="card-text" style="padding-left: 20px">Sagt dir unser Angebot zu, kannst du die Zahlung vornehmen und erhältst alle Auftragsdetails übersichtlich zusammengefasst.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item tl-green">
                                                <div class="timeline-body">
                                                    <div class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Check des Fahrzeugs</h4>
                                                                <p class="card-text" style="padding-left: 20px">Wir führen vor Ort eine detaillierte Prüfung des Fahrzeugs durch und erstellen einen zertifizierten Bericht.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item tl-green">
                                                <div class="timeline-body">
                                                    <div class="timeline-content">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <h4 class="card-title" style="font-size: 20px; padding-top: 12px; padding-left: 20px">Zusendung des Gutachtens</h4>
                                                                <p class="card-text" style="padding-left: 20px">Wir senden dir das Prüfergebnis inklusive detaillierter Bilder, damit du eine fundierte und sichere Kaufentscheidung treffen kannst.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul><br>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('[name=type]').val('{{request('type')}}');
</script>
    @if(session('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Vielen Dank für deine Anfrage!",
                showConfirmButton: true,

            });
        </script>
    @endif
@endsection

@extends('mainpages.master-layout')
@section('header')
    @include('partials.index-header')
@endsection
@section('styles')
    <style>
        .modal-info .modal-content {
            border: none;
            padding: 15px 18px;
            border: 1px solid #ccc;
        }
        .modal-box {
            display: block;
        }
        .modal-info h4 {
            font-size: 23px;
            font-weight: 600;
            line-height: 34px;
        }
        .modal-info ul {
            margin-bottom: 15px;
        }
        .modal-info ul li {
            font-size: 17px;
            line-height: 25px;
        }
        .modal-info .modal-dialog {
            max-width: 375px;
        }
        button.modal-close {
            position: absolute;
            right: 0px;
            top: -8px;
            width: 24px;
            height: 24px;
            border: none;
            background: transparent;
            color: #000;
            font-size: 19px;
            background: #fff;
            padding: 0px;
            border-radius: 50%;
            line-height: 24px;
        }
    </style>
@endsection
@section('content')
    <main class="main-area">

        <!------- My-Profile-wrapper Start ------->
        <section class="myProfile-form">
            <div class="container">
                <div class="contentBox">
                    <div class="myProfile-wrapper">

                        <!-- My-profile -->
                        <div class="myProfile-inner">

                            <div class="certified-partner" style="max-width: 300px; margin: 0 auto; display: flex; align-items: center; justify-content: center; margin-bottom: 25px; padding: 15px; background: #e6f7e6; border-radius: 5px; border: 2px solid #28a745;">
                                <i class="fas fa-check" style="font-size: 20px; color: #28a745; margin-right: 8px;"></i>
                                <p style="font-size: 14px; color: #333; margin: 0; font-weight: bold;">Zertifizierter Partner</p>
                            </div>

                            <div class="step-item--header mb-5">
                                <h2 style="letter-spacing: -1.5px" class="mb-3 text-primary">Händler Dashboard</h2>
                                <p class="fs-6 text-grey">Hier findest du deine persönlichen Daten, Infos zu deinem Rabattcode und eine Übersicht zu Buchungen deiner Fahrzeuge.</p>
                            </div>

                            <form method="POST" action="{{route('change-phone')}}" >
                                @csrf

                                <div class="form-content myProfile">
                                    <div class="form-inpus">
                                    <div class="mb-3 input-box">
                                        <label class="pb-1" for="name">Name des Autohauses/ Firmenname</label>
                                        <input id="name" name="name" value="{{$user->name}}" type="text" class="form-control" placeholder="Vollständiger Name" disabled style="background-color: rgb(234, 233, 233); box-shadow: none; border: 1px solid #ddd;">
                                    </div>
                                    <div class="mb-3 input-box">
                                        <label class="pb-1" for="email">E-Mail-Adresse</label>
                                        <input id="email" name="email" type="text" value="{{$user->email}}" class="form-control" placeholder="E-Mail" disabled style="background-color:rgb(234, 233, 233); box-shadow: none; border: 1px solid #ddd;">
                                    </div>
                                    <div class="mb-3 input-box">
                                        <label class="pb-1" for="phone">Telefon</label>
                                        <input id="phone" name="phone" type="text" value="{{$user->phone}}" class="form-control" placeholder="Telefon" {{ (strlen($user->phone) > 3)?'disabled':'' }} style="background-color: #f8f8f8; box-shadow: none; border: 1px solid #ddd;">
                                    </div>
                                    <div class="col-12 mb-3">
                                            @if(strlen($user->phone) < 3)
                                                <button type="submit" class="btn btn-primary w-100"
                                                        style="height: 45px !important; font-size: 16px; padding: 5px 10px; line-height: 60px">
                                                    speichern
                                                </button>
                                            @endif
                                        </div>
                                        @php
                                            $now=\Carbon\Carbon::now();
                                            $from=\Carbon\Carbon::parse($user->created_at);
                                            $days=$now->diffInDays($from);
                                        @endphp
                                    <div class="mb-3 input-box">
                                        <label class="pb-1" for="phone">Partner seit</label>
                                        <input id="phone" name="phone" type="text" value="{{$user->created_at->format('d.m.Y')}} ({{$days}} Tage)" class="form-control" placeholder="Telefon" disabled style="background-color: rgb(234, 233, 233); box-shadow: none; border: 1.5px solid var(--primary);">
                                    </div>
                                        

                                        <div class="discount-code" style="border: 2px dashed #ff6600; padding: 15px; text-align: center; font-weight: bold; margin-top: 50px; border-radius: 10px; background: #fff5e6;">
                                            <p style="font-size: 18px; margin: 0;">🎉 Dein Rabattcode: <span style="color: #ff6600;">{{$user->promo_code}}</span></p>
                                            <p style="font-size: 14px; margin: 5px 0 0; color: #555;">10% Rabatt auf alle Buchungen!</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- My-profile-end -->

                    </div>

                    <div class="myProfile-bookins">
                        <div class="myProfile-booking-form">
                            <h2 style="letter-spacing: -1px">Gebuchte Checks</h2>
                            @if($orders->isEmpty())
                                <p style="color:rgb(192, 19, 19)">Keine vorhanden.</p>
                            @else
                                <p>Klicken, um Details anzusehen.</p>
                            @endif
                            @foreach($orders as $order)
                            <a href="" class="btn btn-outline-primary w-100  btn-order-details mb-2"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$order->id}}" >
                                {{$order->vehicle_make_model}}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <section class="py-5 link-area">
                        <div class="text-center">
                            <a href="#" onclick="document.getElementById('logout-form').submit();" class="link link-primary bg-white fw-semibold">Abmelden</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </section>
                </div>
            </div>
            </div>
        </section>
        <!------- My-Profile-wrapper End ------->


    </main>
    <!-- Modal -->
    <div class="modal modal-info fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="row modal-box clearfix g-3 position-relative">
                    <button type="button" class="modal-close shadow" style="margin-right: auto" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    <div class="col-12">
                        <div class="" id="booking_detail">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click','.btn-order-details',function(e){
            var id=$(this).attr('data-id');
            $.ajax({
                url:"{{url('order1')}}/"+id,
                type:"GET",
                data:{},
                success:function(data){
                    $('#booking_detail').html(data);
                },
                error:function(erorr){

                }
            })
        })
    </script>

    @if(session('success-message'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Vielen Dank für deine Buchung!",
                showConfirmButton: true,

            });
        </script>
    @endif
@endsection

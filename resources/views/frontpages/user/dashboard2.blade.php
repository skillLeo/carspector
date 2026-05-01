@extends('mainpages.mainfront')
@section('content')
    <main>
        <!-- page-hero -->
        <section class="page-hero page-hero-shap-2 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-hero-step text-center">
                            <h4 class="text-white">Mein Profil</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-hero-end -->

        <!-- form-step -->
        <section class="section booking">
            <form action="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 mx-auto">
                            <div class="booking-form">
                                <!-- checkout -->
                                <div class="booking-checkout text-center">
                                    <h6 class="mb-3 text-dark">Meine persönlichen Daten</h6>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text fw-bold">Name</span>
                                        <input type="text" class="form-control text-end" value="{{$user->name}}" placeholder="" disabled>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text fw-bold">E-Mail</span>
                                        <input type="text" class="form-control text-end" value="{{$user->email}}" placeholder="" disabled>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text fw-bold">Telefon</span>
                                        <input type="tel" class="form-control text-end changephone" value="{{$user->phone}}" placeholder="">
                                    </div>
                                </div>
                                <!-- checkout-end -->

                                <!-- booking-submit-btn -->
                                <div class="mb-5 input-group d-flex justify-content-between">
                                    <a href="{{route('password.change')}}"> <button type="button" class="btn btn-primary-light w-100 ">Passwort ändern</button> </a>
                                    @if(auth()->user())
                                        <button type="button"  class="btn btn-dark px-lg-5 rounded-4"
                                                onclick="document.getElementById('logout-form').submit();" >Abmelden</button>

                                    @endif

                                </div>

                                <!-- booking-submit-btn -->

                                <!-- my-bookings -->
                                <div class="my-booking-wrapper">
                                    <h6 class="text-dark text-center mb-4">Meine Buchungen</h6>
                                    @foreach($orders as $order)
                                        <div class="my-booking" style="border-radius: 300px">
                                            <div class="date-info">
                                                <span class="date">{{date('d-m-Y',strtotime($order->date))}}</span>
                                                <span class="time">{{date('H:i',strtotime($order->time))}}</span>
                                            </div>
                                            <div class="my-booking-allInfo">
                                                <button data-id="{{$order->id}}" class="btn btn-white btn-order-details text-dark" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Alle Infos ansehen</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- my-booking-end -->

                                <!-- New-book-button -->
                                <div class="mb-3">
                                    <a href="{{route('booking.new')}}"> <button type="button" class="btn btn-secondary w-100">Neue Prüfung buchen</button> </a>
                                </div>
                                <!-- New-book-button-end -->
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </section>
        <!-- form-step-end -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <!-- booking-footer -->
    </main>
    <!-- modal-start -->
    <div class="modal all-info-popup fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="booking_detail">



            </div>
        </div>
    </div>
    <!-- modal-start-end -->

@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session()->has('success-message'))
        <script>
            swal.fire({
                html: "Danke für deine Buchung!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary btn-primary"
                }
            }).then(function() {
                // KTUtil.btnRelease(btn);
            });
        </script>
    @endif
    <script>
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
        $(document).on('keyup','.changephone',function(e){
            var phone=$(this).val();
            $.ajax({
                url:"{{route('change-phone')}}",
                type:"GET",
                data:{phone:phone},
                success:function(data){
                    console.log(data);
                },
                error:function(erorr){

                }
            })
        })
    </script>
@endsection

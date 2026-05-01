@extends('mainpages.mainlayout')
@section('content')
    <main>
        <!-- step-info -->
        <section class="form-area form-profile">
            <div class="container-sm">
                <div class="mb-5 mb-md-5 text-center text-lg-center">
                    <h3 class="fs-4 mb-4">Mein Profil</h3>
                    @if(auth()->user())
                    <button onclick="document.getElementById('logout-form').submit();" class="btn btn-secondary shadow">Abmelden</button>
                    @endif
                </div>
                <div class="row mb-5">
                    <div class="col-lg-7 mx-auto">
                        <div class="bg-white rounded-1 py-4 px-lg-5  p-4 py-5 shadow-1 position-relative">
                            <form class="row form-wrapper mx-auto" method="POST" action="{{route('change-phone')}}">

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <p class="mb-0 text-black fs-6">Vollständiger Name</p>
                                        <div class="input-box">
                                            <input type="text" disabled value="{{$user->name}}" class="form-control form-control-sm shadow" placeholder="Vollständiger Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <p class="mb-0 text-black fs-6">E-Mail</p>
                                        <div class="input-box">
                                            <input type="text" disabled value="{{$user->email}}" class="form-control form-control-sm shadow" placeholder="E-Mail-Adresse">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-2 mb-lg-2">
                                        <p class="mb-0 text-black fs-6">Telefon</p>
                                        <div class="input-box">
                                            <input type="tel" name="phone" value="{{$user->phone}}" class="form-control form-control-sm shadow" placeholder="Zum Ausfüllen hier klicken">
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="col-md-12 text-end">
                                    <button type="submit" style="width: 100%; height: 35px" class="btn btn-secondary shadow">Nummer speichern</button>
                                </div>
                                <div style="padding-top: 25px" class="col-md-12">
                                    <div class="mb-0 pt-3">
                                        <h4 class="text-primary mb-3">Meine Buchungen</h4>
                                        @foreach($orders as $order)
                                            <button type="button" style="text-transform: capitalize; width: 250px" data-id="{{$order->id}}" class="btn btn-outline-primary btn-order-details mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                {{$order->vehicle_make_model}}
                                            </button>
                                        @endforeach

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- step-info-end -->


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </main>
    <!-- Modal -->
    <div class="modal modal-info fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="row modal-box clearfix g-3 position-relative">
                    <button type="button" class="modal-close shadow" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
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

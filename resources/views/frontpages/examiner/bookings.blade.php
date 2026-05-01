@extends('mainpages.mainfront')
@section('content')
    <main>
        <!-- edit-profile -->
        <section class="section editProfile">
            <div class="container">
                <div class="my-portal-orders">
                    <div class="my-booking-wrapper">
                        <h6 class="text-dark mb-1">Abgeschlossene Aufträge</h6>
                        <p class="mb-4 text-dark">: {{count($orders)}}</p>
                        <div class="my-orders-wrapper">
                            @foreach($orders as $order)
                                <div class="my-booking mb-3">
                                    <div class="date-info">
                                        <span class="date">{{ $order->brand }}</span>
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
                    </div>

                </div>
            </div>
        </section>

        <div class="modal all-info-popup fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" id="booking_detail">

                </div>
            </div>
        </div>

        <!-- edit-profile-end -->
    </main>
@endsection
@section('scripts')
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
    </script>
@endsection

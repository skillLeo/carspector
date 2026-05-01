<div class="modal-body">
    <div class="row">
        <div class="col-12 text-end pe-4">
            <h6 class="pb-0 mb-0" data-bs-dismiss="modal">X</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-3 col-md-2">
            <div class="profile-img">
                <img src="{{$user->image}}" alt="">
            </div>
        </div>
        <div class="col-7 col-md-3 pt-2 pt-md-3 pt-lg-3 pt-xl-3">
            <div class="profile-info ps-2 ps-sm-2 ps-lg-0 ps-md-0 ps-xl-0">
                <h6 class="pb-0 mb-0">{{$user->name}}</h6>
                <p><img src="{{ asset('assets/img/icons/star.png') }}" alt="">{{avg_reviews($user->id)}} ({{total_reviews($user->id)}})</p>
                <a data-id="{{$user->id}}"  href="#writeReview" data-target="#writeReview" data-bs-toggle="modal"  type="button" style="background-color: white; color: black; border: 1px solid black;width: 135px" class="btn py-2 btn-primary  btn-write-review d-none d-md-block d-lg-block d-xl-block mt-2" id="newReview">Bewerten</a>
            </div>
        </div>
        {{--  For Responsive Modal  --}}



        <div class="col-12  d-block d-md-none py-3 d-lg-none d-xl-none" style="border-bottom: 1px solid #C1C1C1">
            <div class="row">
                <div class="col-7 pe-0 me-0 ">
                    <a href="#" type="button" style="font-size: 12px;line-height: 13.5px" class="btn px-0 mx-0 btn-primary w-100" id="allReview">Bewertungen ansehen</a>
                </div>
                <div class="col-5 ">
                    <a data-id="{{$user->id}}"  href="#writeReview" data-target="#writeReview" data-bs-toggle="modal"  type="button" style="font-size: 12px;line-height: 17.5px;background-color: white; color: black; border: 1px solid black" class="btn py-2 btn-primary btn-write-review w-100" id="newReview">Bewerten</a>
                </div>
            </div>
        </div>





        {{-- End  For Responsive Modal --}}

        <div class="col-12 col-md-3 pt-3">
            <div class="profile-meta">
                <ul>
                    <li class="d-block d-md-none d-lg-none d-xl-none"><span><img src="{{ asset('assets/img/icons/star.png') }}" alt=""></span>{{total_reviews($user->id)}} Bewertungen</li>
                    <li><span><img src="{{ asset('assets/img/icons/euro-circle.png') }}" alt=""></span>{{$user->price}} €</li>
                    <li><span><img src="{{ asset('assets/img/icons/greencirclecheck.png') }}" alt=""></span>Bestätigt & verifiziert</li>
                </ul>
            </div>
        </div>

            <div class="col-12 d-block d-md-none d-lg-none d-xl-none g-0 px-0 mx-0 my-4" style="border-top: 1px solid #C1C1C1">
            </div>
        <div class="col-12 pb-2 d-block d-md-none  d-lg-none d-xl-none" >


            <div class="row">

                <div class="col-12 ">

                    <p class="text-start px-2" style="color:#074BA3;font-size: 14px;line-height: 18px;word-wrap: break-word;display: inline-block;width: 100%">{{$user->about_me}}</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 pt-3 text-center d-none d-md-block d-lg-block d-xl-block">
            <div class="profile-meta">
                <ul class="text-center justify-content-center">
                    <li class="text-center d-none d-md-block d-lg-block d-xl-block"><img src="{{ asset('assets/img/icons/star.png') }}" class="me-3" style="height: 20px;width: 20px" alt="">{{total_reviews($user->id)}} Bewertungen</li>
                    <li>
                        <button type="button" style="font-size: 14px" class="btn btn-primary py-2 px-0 w-100  d-none d-md-block d-lg-block d-xl-block " id="allReview">Bewertungen ansehen</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row pt-1 pt-md-4">
        <div class="col-lg-6 px-0 mx-0 pb-0 mb-0" style="border-bottom: 1px solid #C1C1C1">
            <div class="row  px-2"  >
                <div class="col-12 " style="border-top: 1px solid #C1C1C1">
                </div>
            </div>
            <div class="profile-info-item " style="border: none">
                <div class="profile-info-header">
                    <h6><img src="{{ asset('assets/img/icons/badge-certificate.png') }}" alt="">Ausbildungen & Können</h6>
                </div>
                <ul>
                    @if($user->experience_1)
                        <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>{{$user->experience_1}}</li>
                    @endif
                    @if($user->experience_2)
                        <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>{{$user->experience_2}}</li>
                    @endif
                    @if($user->experience_3)
                        <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>{{ $user->experience_3 }}</li>
                    @endif
                    @if($user->experience_4)
                        <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>{{ $user->experience_4 }}</li>
                    @endif
                </ul>
            </div>

            <div class="row px-2 "  >
                <div class="col-12" style="border-top: 1px solid #C1C1C1">
                </div>
            </div>
            <div class="profile-info-item w-100" style="border: none">
                <div class="profile-info-header">
                    <h6><img src="{{ asset('assets/img/icons/muskel.png') }}" alt="">Stärken</h6>
                </div>
                <ul>
                    @if($user->training_1)
                        <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>{{$user->training_1}}</li>
                    @endif
                    @if($user->training_2)
                        <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>{{$user->training_2}}</li>
                    @endif
                    @if($user->training_3)
                        <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>{{$user->training_3}}</li>
                    @endif
                </ul>
            </div>


        </div>


        <div class="col-lg-6 d-none d-md-block d-lg-block d-xl-block pe-4">
            <div class="row" style="background: #1877F2;border-radius: 15px">
                <div class="col-12" style="border-bottom: 1px solid white">
                    <h6 class="text-center py-3 text-white " >Über mich:</h6>
                </div>
                <div class="col-12 ">
                    <p class="text-white text-center p-2" style="font-size: 16px;line-height: 20px;word-wrap: break-word;display: inline-block;width: 100%">{{$user->about_me}}</p>
                </div>
            </div>

        </div>


    </div>

    <div class="row">
        <div class="col-lg-6">

            <div class="profile-info-item">
                <div class="row">
                    <div class="col-12 pb-4 d-block d-md-none d-lg-none d-xl-none">
                        <a href="{{route('booking.request',['id'=>$user->id,'city'=>request('city','type'=>request('type'))])}}" type="button" class="btn mt-3 py-4 btn-secondary btn-icon btn-shadow w-100 rounded-4">
                            <span class="text text-center text-white" style="font-size: 14px">Nächster Schritt</span>
                        </a>
                    </div>
                    <div class="col-12 pt-4">
                        <button type="button" class="btn py-2 w-100 btn-white btn-icon" style="border:1px solid black">
                            <span class="text text-dark  text-start"><a href="{{route('vorteile')}}" class="text-dark" style="font-size: 14px;display: block;height: 100%;width: 100%">Deine Vorteile mit Carspector</a></span>
                            <span class="icon "><img src="{{ asset('assets/img/icons/die-info-dark.png') }}" alt=""></span>
                        </button>
                    </div>
                    <div class="col-12 pt-2">
                        <button type="button" class="btn py-2 w-100 btn-primary btn-icon" style="border:1px solid black">
                            <span class="text text-white  text-start"><a href="{{route('support')}}" style="color: white;font-size: 14px;display: block;height: 100%;width: 100%">Fragen? Support</a></span>
                            <span class="icon "><img src="{{ asset('assets/img/icons/telefone.png') }}" alt=""></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 pt-4 d-none d-md-block d-lg-block d-xl-block" style="vertical-align: center">
            <div class="profile-info-item">
                <a href="{{route('booking.step1',['id'=>$user->id,'city'=>request('city')])}}" type="button" class="btn mt-2  btn-secondary btn-icon w-100 rounded-4">
                    <span class="text text-start text-white">Nächster Schritt</span>
                    <span class="icon"><img src="{{ asset('assets/img/icons/next-arrow.png') }}" alt=""></span>
                </a>
            </div>
        </div>
    </div>

</div>
<div class="modal reviews-modal fade" id="modalReviews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header px-1 pt-2 pb-3">
                    <h6 class="mb-0 fw-normal">Alle Bewertungen ansehen</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="reviews-list overflow-auto">
                    <div class="profile-reviews-wrapper">
                        @if(count(examiner_review($user->id)) > 0)
                            @foreach(examiner_review($user->id) as $review)

                                <div class="profile-review-item">
                                    <div class="profile-review-header">
                                        <h6>{{$review->name}}</h6>
                                        <div class="profile-review-star ms-auto">
                                            <div class="d-flex align-items-center gap-2 me-3">
                                                <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                                <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                                <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                                <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                                <img src="{{ asset('assets/img/icons/star.png') }}" alt="">
                                            </div>
                                            <p>{{$review->rating_with_examiner}}/5</p>
                                        </div>
                                    </div>
                                    <div class="profile-review-desc">
                                        <p>“{{$review->rating_about_examiner}}”</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center">Keine Rezension</p>
                        @endif
                        <!-- profile-review-item-end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

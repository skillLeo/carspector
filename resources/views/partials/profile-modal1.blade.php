<div class="row modal-box clearfix g-3 position-relative">
    <button type="button" class="modal-close shadow" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
    <div class="col-lg-6 float-start">
        <!-- user-card-item -->
        <div class="user-card flex-column bg-white rounded-2 w-100 shadow-1">
            <div class="user-card-content d-flex align-items-center justify-content-start w-100 mb-2">
                <div class="user-card-img">
                    <img src="{{$user->image}}" alt="">
                </div>
                <div class="user-card-info flex-grow-1">
                    <div class="mb-2">
                        <h5>{{$user->name}}</h5>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="ratting">
                                <span><i class="fa-sharp fa-solid fa-star"></i></span>
                                <p class="mb-0 text-primary">{{avg_reviews($user->id)}} ({{total_reviews($user->id)}})</p>
                            </div>
                            <h6 class="fw-bold">{{$user->price}} €</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-card-btns w-100 flex-row d-flex gap-2">
                <a href="#writeReview" data-id="{{$user->id}}" data-target="#writeReview" data-bs-toggle="modal"  class="btn btn-outline-primary px-2 btn-write-review">Bewerten</a>
                <a href="#modalReviews-{{$user->id}}" data-target="#modalReviews-{{$user->id}}" data-bs-toggle="modal"   class="btn btn-outline-primary px-0 flex-grow-1">Bewertungen ansehen</a>
            </div>
        </div>
        <!-- user-card-item-end -->
    </div>
    <div class="col-lg-6 float-end">
        <div class="about-me">
            <div class="about-content shadow-1 flex-grow-1 bg-white rounded-2 p-3 mb-lg-3">
                <h6>Über mich:</h6>
                <p>“{{$user->about_me}}“</p>
            </div>
            <div class="about-btn d-none d-lg-block">
                <a style=" background: #0A8216FF;border-color: #0A8216FF" href="{{route('booking.step1',['id'=>$user->id,'city'=>request('city')])}}" class="btn btn btn22 btn-secondary position-relative w-100">auswählen <span class="icon"><i class="fa-solid fa-angle-right"></i></span> </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 float-start mb-3 mb-lg-0">
        <div class="bg-white shadow-1 rounded-2 about-info p-3">
            <div class="about-info-card mb-3">
                <div class="info-card-header">
                    <span class="icon"><img src="{{ asset('front/imgs/icons/icon-list.svg') }}" alt=""></span>
                    <h6 class="mb-0">Ausbildung & Können</h6>
                </div>
                <div class="info-card-body">
                    <ul>
                        @if($user->training_1)
                            <li>
                                <span class="icon"><img src="{{ asset('front/imgs/icons/tick.svg') }}" alt=""></span>
                                {{$user->training_1}}
                            </li>
                        @endif
                        @if($user->training_2)
                            <li>
                                <span class="icon"><img src="{{ asset('front/imgs/icons/tick.svg') }}" alt=""></span>
                                {{$user->training_2}}
                            </li>
                        @endif
                        @if($user->training_3)
                            <li>
                                <span class="icon"><img src="{{ asset('front/imgs/icons/tick.svg') }}" alt=""></span>
                                {{$user->training_3}}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="about-info-card">
                <div class="info-card-header">
                    <span class="icon"><img src="{{ asset('front/imgs/icons/icon-list.svg') }}" alt=""></span>
                    <h6 class="mb-0">Ausbildung & Können</h6>
                </div>
                <div class="info-card-body">
                    <ul>
                        @if($user->experience_1)
                            <li>
                                <span class="icon"><img src="{{ asset('front/imgs/icons/tick.svg') }}" alt=""></span>
                                {{$user->experience_1}}
                            </li>
                        @endif
                        @if($user->experience_2)
                            <li>
                                <span class="icon"><img src="{{ asset('front/imgs/icons/tick.svg') }}" alt=""></span>
                                {{$user->experience_2}}
                            </li>
                        @endif
                        @if($user->experience_3)
                            <li>
                                <span class="icon"><img src="{{ asset('front/imgs/icons/tick.svg') }}" alt=""></span>
                                {{$user->experience_3}}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 d-lg-none">
        <div class="about-btn">
            <a style=" background: #0A8216FF;border-color: #0A8216FF" href="{{route('booking.step1',['id'=>$user->id,'city'=>request('city')])}}" class="btn btn22 btn-secondary2 btn-secondary w-100">auswählen <span class="icon"><i class="fa-solid fa-angle-right"></i></span> </a>
        </div>
    </div>
</div>

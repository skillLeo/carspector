@if($examiners->count() > 0)
    @foreach($examiners as $user)
<div class="user-card bg-white rounded-2 w-100 shadow-1">
    <div class="user-card-content">
        <div class="user-card-img">
            <img src="{{ $user->image }}" alt="">
        </div>
        <div class="user-card-info">
            <div class="mb-2">
                <h5>{{$user->name}}</h5>
                <div class="ratting">
                    <span><i class="fa-sharp fa-solid fa-star"></i></span>
                    <p class="mb-0 text-primary">{{avg_reviews($user->id)}} ({{total_reviews($user->id)}})</p>
                </div>
            </div>
            <h6 class="fw-bold">{{$user->price}} €</h6>
        </div>
    </div>
    <div class="user-card-btns">
        <a href="" class="btn btn-outline-primary btn-examiner-profile" data-id="{{$user->id}}"  data-bs-toggle="modal" data-bs-target="#exampleModal">Profil ansehen</a>
        <a href="{{route('booking.step1',['id'=>$user->id,'city'=>request('city')])}}" class="btn btn-secondary justify-content-between px-3">
            auswählen
            <span class="icon"><i class="fa-solid fa-angle-right"></i></span>
        </a>
    </div>
</div>
<div class="modal reviews-modal fade" id="modalReviews-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    @endforeach
@endif

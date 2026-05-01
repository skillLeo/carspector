<div class="popup-wrapper position-relative">
    <!-- aside -->
    <aside class="profile-sidebar">
        <!-- sidebar-header -->
        <div class="profile-sidebar-header">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <!-- profile-header -->
            <div class="profile-card">
                <div class="profile-img">
                    <img src="{{ $user->image }}" alt="">
                </div>
                <div class="profile-info">
                    <h6>{{ $user->name }}</h6>
                    <p><img src="{{ asset('assets/img/icons/star.png') }}" alt="">{{avg_reviews($user->id)}} ({{total_reviews($user->id)}})</p>
                </div>
            </div>
            <!-- profile-header-end -->

            <!-- profile-meta -->
            <div class="profile-meta">
                <ul>
                    <li><span><img src="{{ asset('assets/img/icons/star.png') }}" alt=""></span>{{total_reviews($user->id)}} Bewertungen</li>
                    <li><span><img src="{{ asset('assets/img/icons/euro-circle.png') }}" alt=""></span>{{$user->price}} €</li>
                    @if($user->verify_status=='verified')
                        <li><span><img src="{{ asset('assets/img/icons/check-circle.png') }}" alt=""></span>Bestätigt & verifiziert</li>
                    @else
                        <li><span><img src="{{ asset('assets/img/icons/check-circle.png') }}" alt=""></span>Nicht verifiziert und unbestätigt</li>
                    @endif

                </ul>
            </div>
            <!-- profile-meta-end -->
        </div>
        <!-- sidebar-header-end -->

        <!-- informations -->
        <div class="profile-info-wrapper">

            <!-- single-info -->
            <div class="profile-info-item d-md-none">
                <p>“{{$user->about_me}}”</p>
            </div>
            <!-- single-info-end -->

            <!-- single-info -->
            <div class="profile-info-item">
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
            <!-- single-info-end -->

            <!-- single-info -->
            <div class="profile-info-item">
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
            <!-- single-info-end -->

            <!-- single-info -->
            <div class="profile-info-item d-none d-md-block border-bottom-0">
                <div class="profile-info-header">
                    <h6>Hilfe benötigt?</h6>
                </div>
                <p>Kontaktiere gerne unseren
                    persönlichen Kundenservice via E-Mail an <a href="mailto:kontakt@carspector.de">kontakt@carspector.de</a> oder schreibe uns via WhatsApp an <a href="tel:01577-4993273">01577-4993273</a>.</p>
            </div>
            <!-- single-info-end -->

            <!-- single-info -->
            <div class="profile-info-item d-md-none">
                <button type="button" class="btn btn-secondary w-100">Jetzt buchen</button>
            </div>
            <!-- single-info-end -->

        </div>
        <!-- informations-end -->
    </aside>
    <!-- aside-end -->

    <!-- profile-popup-content -->
    <div class="profile-content">
        <div class="profile-content-wrapper">
            <!-- profile-descriptions -->
            <div class="profile-desc d-none d-md-block">
                <p>“{{$user->about_me}}”</p>
            </div>
            <!-- profile-descriptions-end -->

            <!-- profile-reviews -->
            <div class="row profile-content-info px-3 px-md-4">
                <!-- profile-reviews -->
                <div class="profile-reviews mb-4 mb-xl-0">
                    <h6>Das sagen Kunden über {{$user->name}}</h6>
                    <div class="profile-reviews-wrapper mb-4">
                        <!-- profile-review-item -->
                        @if(count(examiner_review($user->id)) > 0)
                            @foreach(three_reviews($user->id) as $review)

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
                        @if(count(examiner_review($user->id)) > 3)
                            <hr>

                            <button type="button"  class="btn btn-primary w-100" id="allReview">Alle Bewertungen ansehen</button>
                        @endif
                    </div>
                    <hr>
                    <a data-id="{{$user->id}}"  href="#writeReview" data-target="#writeReview" data-bs-toggle="modal" type="button" style="background-color: white; color: black; border: 1px solid black" class="btn btn-primary w-100 btn-write-review" id="newReview">Bewertung schreiben</a>


                </div>
                <!-- profile-reviews-end -->

                <!-- profile-service -->
                <div class="profile-service ms-xl-auto">
                    <div class="profile-service-header text-center">
                        <h6>Bei Carspector erhältst du:</h6>
                    </div>
                    <div class="profile-service-content">
                        <ul>
                            <li><strong>ein zertifiziertes Gebrauchtwagen-Gutachten</strong></li>
                            <li>die Möglichkeit deinem Prüfer vor Ort Fragen zu stellen</li>
                            <li>die Meinung von einem Experten zu hören</li>
                            <li>die Chance deine Wünsche zu äußern</li>
                            <li>einen sicheren und überprüften Gebrauchtwagen</li>
                            <li>eine Zufriedenheitsgarantie</li>
                            <li>24/7 persönlichen Kundensupport</li>
                            <li>du wählst deinen Prüfer selber</li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-white btn-icon">
                        <span class="text text-dark text-start"><a href="/vorteile">Mehr erfahren</a></span>
                        <span class="icon"><img src="{{ asset('assets/img/icons/die-info-dark.png') }}"  alt=""></span>
                    </button>
                </div>
                <!-- profile-service-end -->

            </div>
            <!-- profile-reviews-end -->

            <!-- single-info -->
            <div class="profile-info-item d-md-none border-0 mb-4">
                <div class="profile-info-header">
                    <h6>Hilfe benötigt?</h6>
                </div>
                <p>Kontaktiere gerne unseren
                    persönlichen Kundenservice via E-Mail an <a href="mailto:kontakt@carspector.de">kontakt@carspector.de</a> oder
                    schreibe uns via WhatsApp an <a href="tel:01577-4993273">01577-4993273</a>.</p>
            </div>
            <!-- single-info-end -->

            <!-- book-now-car -->
            <div class="book-now" style="padding-top: 20px;">
                <a  href="{{route('booking.step1',['id'=>$user->id])}}" type="button" class="btn btn-secondary btn-icon w-100 rounded-4">
                    <span class="text text-start text-white">Jetzt buchen und sicher Gebrauchtwagen kaufen</span>
                    <span class="icon"><img src="{{ asset('assets/img/icons/verifiziert-white.png') }}" alt=""></span>
                </a>
            </div>
            <!-- book-now-car-end -->
        </div>
    </div>
    <!-- profile-popup-content-end -->

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

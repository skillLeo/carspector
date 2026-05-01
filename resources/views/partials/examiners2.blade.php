<div class="row">
    @if($examiners->count() > 0)
        <div class="col-xl-10 mx-auto">
            <div class="row gx-lg-5 profileItem-wrapper">

                @foreach($examiners as $user)

                @if(!check_2hour_availability($user->id))
                    <div class="col-lg-6">
                        <div class="card card-mecanik">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="card-header-left d-flex align-items-center">
                                    <div class="mk-img">
                                        <img src="{{ $user->image }}" alt="">
                                    </div>
                                    <div class="mk-meta">
                                        <h5>{{$user->name}} </h5>
                                        <p><img src="{{ asset('assets/img/icons/star.png') }}" alt="">{{avg_reviews($user->id)}} ({{total_reviews($user->id)}}) </p>

                                    </div>
                                </div>
                                <h5 class="mb-0 text-primary">{{$user->price}} €</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-desc">
                                    <p>“{{$user->about_me}}”</p>
                                </div>
                                <div class="card-info">
                                    <h5 class="icon-text mb-2">
                                        <span class="me-2"><img src="{{ asset('assets/img/icons/badge-certificate.png') }}" alt=""></span>
                                        Ausbildungen & Können
                                    </h5>
                                    <ul>
                                        @if($user->experience_1)
                                            <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>{{ $user->experience_1 }}</li>
                                        @endif
                                        @if($user->experience_2)

                                            <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>{{ $user->experience_2 }}</li>
                                        @endif
                                        <li><span><img src="{{ asset('assets/img/icons/uberpruft.png') }}" alt=""></span>...</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-bottom d-flex align-items-center justify-content-between gap-2">
                                <button data-id="{{$user->id}}"  type="button" class="btn btn-outline-dark w-50 btn-examiner-profile" data-bs-toggle="modal" data-bs-target="#exampleModal">Vollständiges Profil ansehen</button>
                                <a type="button" href="{{route('booking.step1',['id'=>$user->id])}}" class="btn btn-secondary btn-icon w-50 border-0"> <span class="text text-start">Jetzt buchen</span> <span class="icon"><img src="assets/img/icons/verifiziert-white.png" alt=""></span></a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach



            </div>
            <div class="pagination-wrapper mx-auto" id="pagination">
                <div class="row gx-2 align-items-lg-stretch">
                    <div class="col-8 col-md-5 order-1 order-md-0">
                       @if(!$examiners->onFirstPage())
                        <button href="{{$examiners->withQueryString()->previousPageUrl()}}" class="btn btn-icon btn-dark w-100 px-4 rounded-4">
                            <span class="icon"><img src="{{ asset('assets/img/icons/rechter-pfeil-left.png') }}" alt=""></span>
                            <span class="text text-end">Zurück</span>
                        </button>
                        @endif
                    </div>
                    @if($examiners->hasPages())
                    <div class="col-4 col-md-2 order-2 order-md-1">
                        <div class="pagination-text h-100">
                            Seite <br>
                            {{$examiners->currentPage()}} von {{$examiners->lastPage()}}
                        </div>
                    </div>
                    @endif
                    <div class="col-12 col-md-5 order-0 order-md-2 mb-3 mb-md-0">
                        @if( $examiners->hasMorePages())

                            <button href="{{$examiners->withQueryString()->nextPageUrl()}}" class="btn btn-primary-light btn-icon w-100 px-4 rounded-4">
                                <span class="text text-start">Nächste Seite</span>
                                <span class="icon"><img src="{{ asset('assets/img/icons/rechter-pfeil-right.png') }}" alt=""></span>
                            </button>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-xl-10 mx-auto">
        <h3>Kein Prüfer gefunden</h3>
        </div>
    @endif
</div>

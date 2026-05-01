@foreach($examiners as $user)
<div class="row mx-1 ms-lg-1 ms-xl-1 mt-4 pt-2" style="border: 1px solid black;box-shadow: 2px 2px 7px 0px rgba(0,0,0,0.29);">

    <div class="col-4 col-sm-2 col-md-2 col-lg-2 col-xl-2  px-0 mx-0">
        <div class="rounded-circle ps-3">
            <img src="{{ $user->image }}" class="img img-fluid profile-img" style="height: 100px;width: 100px;border-radius: 50%;">
        </div>
    </div>
    <div class="col-5 col-sm-8 col-md-8 col-xl-4 col-lg-4 ps-1 text-md-start text-lg-start text-xl-start  px-0 mx-0 pt-2">
        <h4 class="fw-bolder mx-0 my-0 px-0 py-0 profile-text">{{$user->name}}</h4>
        <span style="font-size: 16px" class="pt-0"><span><i class="fa fa-star"></i> </span> <span>4.8 (39)</span></span>
        <p class="pt-1 d-none d-xl-block d-lg-block"><span class=""> <img src="{{ asset('assests/images/icons/check%202.png') }}" style="height: 20px;width: 20px"></span> <span class="fw-bold pt-2" style="color: #1877f2">verifiziert & überprüft</span></p>
    </div>
    <!--                FOR MOBILE SCREEN-->
    <div class="col-3 col-md-2 col-sm-2 text-end col-xl-4  d-block d-lg-none d-xl-none text-center text-sm-center text-md-center text-lg-start text-xl-start">
        <h4 class="fw-bolder pt-3 mx-0 my-0 px-0 py-0" style="font-weight: 900;font-size: 20px;font-family: sans-serif;color: #1877f2">{{$user->prce}} €</h4>
    </div>
    <div class="col-12 ps-4 d-block d-xl-none d-lg-none">
        <p class="pt-2 "><span class=""> <img src="{{ asset('assests/images/icons/check%202.png') }}" style="height: 20px;width: 20px"></span> <span class="fw-bold pt-2" style="color: #1877f2">verifiziert & überprüft</span></p>
        <p class="pt-2 pb-0 mb-0" style="font-size: 15px;font-weight: bold">Aufträge abgeschlossen: {{completed_order($user->id)}} </p>
        <p class="py-0" style="font-size: 15px;font-weight: bold">Angemeldet seit: {{date('Y',strtotime($user->created_at))}}</p>
    </div>

    <div class="col-4 d-none d-lg-block d-xl-block  text-end">
        <h4 class="fw-bolder mx-0 my-0 px-0 py-0" style="font-weight: 900;font-size: 24px;font-family: sans-serif;color: #1877f2">{{$user->price}} €</h4>
        <p class="pt-2 pb-0 mb-0" style="font-size: 15px;font-weight: bold">Aufträge abgeschlossen: {{completed_order($user->id)}}</p>
        <p class="py-0" style="font-size: 15px;font-weight: bold">Angemeldet seit: {{date('Y',strtotime($user->created_at))}}</p>
    </div>
    <div class="col-12 py-0 px-4 pt-3" >
        <div class="row">
            <div class="col-12 " style="border-bottom: 1px solid black"></div>
        </div>
    </div>

    <div class="row pt-3 pb-4">
        <div class="col-12 col-lg-7 col-xl-7">
            <h4 class="fw-bolder mx-0 my-0 px-0 py-0" style="font-weight: 700;font-size: 20px;font-family: sans-serif;">Über mich:</h4>

            <p class="py-0 my-0" style="font-size: 14px;font-weight: 400;">
                {{$user->about_me}}
            </p>
        </div>
        <div class="col-12 col-lg-5 col-xl-5 ps-0  ps-lg-3 ps-xl-3">
            <h4 class="fw-bolder mx-0 my-0 ps-3 pt-3  py-0" style="font-weight: 700;font-size: 20px;font-family: sans-serif;">Erfahrung & Ausbildung</h4>
            <ul class="pt-3">
              @if($user->experience_1)
                <li style="font-size: 14px">{{ $user->experience_1 }}</li>
              @endif
                  @if($user->experience_2)
                <li style="font-size: 14px">{{ $user->experience_2 }}</li>
                @endif
                      <li style="font-size: 14px">....</li>
            </ul>
            <div class="row ps-3">
                <div class="col-6 text-end">
                    <button data-id="{{$user->id}}" class="btn btn-examiner-profile col-12 px-0 mx-0 btn-outline-dark " data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 12px">Vollständiges Profil ansehen</button>
                </div>
                @if(auth()->user())
                   @if(auth()->user()->id!=$user->id)
                    <div class="col-6 px-0 mx-0 text-start">
                        <button href="{{route('booking.step1',['id'=>$user->id])}}" class="btn col-12 px-0 mx-0 btn-success" style="font-size: 12px">Jetzt buchen</button>
                    </div>
                       @endif
                @else
                    <div class="col-6 px-0 mx-0 text-start">
                    <a href="{{route('booking.step1',['id'=>$user->id])}}" class="btn col-12 px-0 mx-0 btn-success" style="font-size: 12px">Jetzt buchen</a>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endforeach
<div id="pagination" class="mt-2">
    {!! $examiners->appends(request()->all())->links() !!}

</div>

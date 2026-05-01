@extends('mainpages.mainlayout')
@section('content')
    <main>
        <!-- step-info -->
        <section class="step-wrap">

            <form action="{{route('booking.step2')}}" class="row form-wrapper mx-auto" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{request('id')}}">
                <div class="container-sm">
                    <div class="mb-5 mb-md-5 text-center text-lg-center">
                        <h3 class="fs-4">Dein Account</h3>
                    </div>
                    <div class="row mb-5 pt-lg-5">
                        <div class="col-lg-7 mx-auto">
                            <div class="bg-white rounded-1 py-4   p-1 pb-4 shadow-1 position-relative">
                                <div>
                                    <div class="row mb-5 mb-md-4">
                                        <div class="col-12">
                                            <h5>Persönliche Daten</h5>
                                        </div>
                                        <div class="">
                                            <div style="padding-top: 15px" class="mb-3">
                                                <p class="mb-0 text-black fs-6">Dein vollständiger Name<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input type="text"  {{auth()->user()?'disabled':''}} value="{{auth()->user()?auth()->user()->name:old('name')}}" name="name" class="form-control form-control-sm shadow">
                                                    @error('name')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">E-Mail<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input type="text" {{auth()->user()?'disabled':''}}  value="{{auth()->user()?auth()->user()->email:old('email')}}"  name="email" class="form-control form-control-sm shadow">
                                                    @error('email')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="mb-3">
                                                <p class="mb-0 text-black fs-6">Telefon<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="phone"  {{auth()->user()?'disabled':''}} value="{{auth()->user()?auth()->user()->phone:old('phone')}}" type="text" class="form-control form-control-sm shadow">
                                                    @error('phone')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="mb-0 mb-lg-4">
                                                <p class="mb-0 text-black fs-6">Passwort für deinen Account<sup class="text-primary">*</sup></p>
                                                <div class="input-box">
                                                    <input name="password" {{auth()->user()?'disabled':''}} value="{{old('password')}}" type="password" class="form-control form-control-sm shadow">
                                                    @error('password')
                                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @guest()
                                        <div class="row mb-1 mb-md-4">
                                            <div class="col-md-12"><span class="mb-1">Bereits registriert?</span><br>
                                                <a class="btn btn-outline-primary" href="{{route('tologin',request()->all())}}">Hier anmelden</a></div>
                                        </div><br>
                                    @endguest

                                    <div class="row mb-5 faq-wrapper gx-0 mx-auto">
                                        <div class="col-lg-12 mx-auto" id="faq-section">
                                            <div class="faq-accordion">
                                                <div class="accordion accordion-flush" id="accordionFlushExample">

                                                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#faq-three" aria-expanded="false" aria-controls="faq-three">
                                                                <span style="font-size:16px; font-weight: normal">Warum muss ich einen Account erstellen?</span>
                                                            </button>
                                                        </h2>
                                                        <div id="faq-three" class="accordion-collapse collapse"
                                                             data-bs-parent="#accordionFlushExample">
                                                            <div style="background-color: white; color: black" class="accordion-body"><br>
                                                                blaba
                                                            </div><br>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" href="" class="btn-next btn btn-secondary btn-further btn-further1 px-5 py-2 fs-5 shadow-1" >weiter</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </section>
        <!-- step-info-end -->
    </main>
@endsection

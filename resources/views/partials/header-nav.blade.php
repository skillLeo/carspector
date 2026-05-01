<header class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid ">
            <div class="col-lg-1"></div>
            <a class="navbar-brand navbar-brand1 ps-3 ms-3    d-none d-sm-none d-md-none d-lg-block d-xl-block" href="{{ url('/') }}">
                <img src="{{ asset('assests/images/logo.png') }}" style="height: 40px">
            </a>
            <button class="navbar-toggler ps-0 ms-1 ms-sm-2 ms-md-3 mx-0 py-0 my-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""><i class="fa-solid fa-bars" style="color: #1877f2;font-size: 30px"></i></span>
            </button>
            <div class="mx-auto d-sm-block d-block d-md-block d-lg-none d-xl-none">
                <a class="navbar-brand " href="{{url('/')}}">
                    <img src="{{ asset('assests/images/logo.png') }}" style="height: 30px">
                </a>
            </div>
            <div class="collapse me-5 navbar-collapse  " id="navbarSupportedContent">
                <ul class="navbar nav ms-auto mb-lg-0 me-3" style="border-right:1px solid black ">
                   @if(auth()->user())
                        <li class="nav-item">
                            <a class="nav-link text-muted" aria-current="page" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @if(auth()->user()->type=='user')
                        <li class="nav-item">
                            <a class="nav-link text-muted" aria-current="page" href="{{route('user.dashboard')}}">Dashboard</a>

                        </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-muted" aria-current="page" href="{{route('examiner.dashboard')}}">Dashboard</a>

                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-muted" aria-current="page" href="{{route('login')}}">Login</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="{{route('examiner.register')}}">Kfz-Prüfer werden</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-muted" href="{{route('support')}}">Support</a>
                    </li>
                       <li class="nav-item">
                        <a class="nav-link text-white btn me-4" style="background: #1877f2" href="{{route('support')}}">Was bringt mir Carspector?</a>
                    </li>


                </ul>
                <ul class="navbar nav pe-5 ">
                    <li class="nav-item px-1">
                        <!-- Instagram -->
                        <a class="btn py-2 px-2 btn-primary rounded-circle social-icon "  href="#!" role="button"
                        ><i class="fab fa-instagram" style="font-size: 24px"></i
                            ></a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="btn py-2  px-2 btn-primary rounded-circle social-icon" href="#!" role="button"
                        ><i class="fab fa-facebook-f" style="font-size: 24px"></i
                            ></a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="btn py-2 px-2 btn-primary rounded-circle social-icon"  href="#!" role="button"
                        ><i class="fab fa-twitter" style="font-size: 24px"></i
                            ></a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="btn py-2  px-2 btn-primary rounded-circle social-icon" href="#!" role="button"
                        ><i class="fab fa-whatsapp" style="font-size: 24px"></i
                            ></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="offcanvas offcanvas-start" style="width: 100%" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <img src="{{ asset('assests/images/logo.png') }}" class="ms-3" style="height: 30px">
            <button type="button" class="btn  " data-bs-dismiss="offcanvas" ><span><i class="fa fa-x" style="color: #1877f2;font-size: 16px"></i></span></button>
        </div>
        <div class="offcanvas-body">
            <ul class=" nav flex-column">
                <li class="nav-item fw-bold" style="font-size: 18px;color: #1877f2" ><a href="{{route('support')}}" class="nav-link">Support</a>
                    <hr class=" mx-3">
                </li>
                <li class="nav-item fw-bold" style="font-size: 18px;color: #1877f2"><a href="{{route('examiner.register')}}" class="nav-link">Kfz-Prüfer werden</a>
                    <hr class=" mx-3">
                </li>
                @if(auth()->user())
                    <li class="nav-item fw-bold" style="font-size: 18px;color: #1877f2"><a href="{{ route('logout') }}"
                                                                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
                        <hr class="mx-3">
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else

                <li class="nav-item fw-bold" style="font-size: 18px;color: #1877f2">
                    <a href="{{route('login')}}" class="nav-link">Login</a>
                    <hr class="mx-3">
                </li>
                    @endif

                <li class="nav-item">
                    <a class="nav-link mx-3 text-white btn" style="font-size: 18px;background: #1877f2" href="{{route('support')}}">Was bringt mir Carspector?</a>
                    <hr class="mx-3">
                </li>
            </ul>
            <ul class="nav ps-2">
                <li class="nav-item px-1">
                    <!-- Instagram -->
                    <a class="btn py-2 px-2 btn-primary rounded-circle social-icon "  href="#!" role="button"
                    ><i class="fab fa-instagram" style="font-size: 24px"></i
                        ></a>
                </li>
                <li class="nav-item px-1">
                    <a class="btn py-2  px-2 btn-primary rounded-circle social-icon" href="#!" role="button"
                    ><i class="fab fa-facebook-f" style="font-size: 24px"></i
                        ></a>
                </li>
                <li class="nav-item px-1">
                    <a class="btn py-2 px-2 btn-primary rounded-circle social-icon"  href="#!" role="button"
                    ><i class="fab fa-twitter" style="font-size: 24px"></i
                        ></a>
                </li>
                <li class="nav-item px-1">
                    <a class="btn py-2  px-2 btn-primary rounded-circle social-icon" href="#!" role="button"
                    ><i class="fab fa-whatsapp" style="font-size: 24px"></i
                        ></a>
                </li>
            </ul>

        </div>
    </div>



</header>

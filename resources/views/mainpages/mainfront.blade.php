<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gebrauchtwagencheck vor Ort für dein gewünschtes Fahrzeug  ✓ TÜV-Zertifiziert  ✓ Gutachten   ✓ Sicher und günstig Gebrauchtwagen kaufen  ✓ Garantie">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Carspector - DER Gebrauchtwagencheck</title>

    <!-- Chrome, Firefox OS & Opera -->
    <meta name="theme-color" content="#01449A">
    <!-- Windos-Phone -->
    <meta name="msapplication-navbutton-color" content="#01449A">
    <!-- Safari & iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#01449A">

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon/faivon_2c.png') }}">

    <!-- css-start -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}" />
    <!-- css-end -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css">
    @yield('style')
    <style>

        #blue-hero .header-wrapper {
            max-width: 1325px !important;
        }
        /*#blue-hero .hero-area {*/
        /*    background-color: var(--primary) !important;*/
        /*}*/
        #blue-hero .header-nav {
            margin-right: 0;
        }
        /*#blue-hero .hero-content {*/
        /*    max-width: 640px;*/
        /*    margin: auto;*/
        /*}*/
        #blue-hero .hero-content.hero-content-two h1 {
            margin-top: 0;
        }
        #blue-hero .hero-content ul {
            padding: 31px 0;
            padding-top: 45px;
        }
        #blue-hero .hero-content ul li {
            gap: 6px;
        }
        #blue-hero .hero-content.hero-content-two .hero-form form {
            width: auto;
            margin-left: 35px;
        }
        .blue-hero-form {
            padding: 0px 0 27px;
        }
        .blue-hero-form .input-box-icon input {
            width: 329px;
        }
        .header{
            padding: 30px 0px;
            position: relative;
            z-index: 1;
        }
        .header-wrapper {
            max-width: 1295px;
            margin: auto;
            padding: 8px 0;
        }
        .header.header-primary::after{
            background-color: #01449A;
        }
        .header.header-primary a.btn{
            background-color: rgba(255, 255, 255, 0.5);
            color: #fff;
        }
        .header.header-primary a.btn.btn-primary:hover{
            background-color: var(--secondary);
            color: #fff;
        }
        .header.header-primary .header-nav ul li a{
            color: #fff;
        }
        .header.header-two {
            padding: 17px 0px;
            background-color: #01449A;
        }
        .header.header-two::after{
            display: none;
        }
        .header::after {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            content: "";
            background-color: #fff;
            clip-path: polygon(0 0, 100% 0, 100% 66%, 0% 100%);
            height: 241px;
            z-index: -1;
        }

        .header-logo a img {
            max-width: 64px;
        }
        .header-logo a {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 18px;
            color: white !important;
            text-decoration: none;
        }
        .header-end a.btn{
            min-width: 145px;
        }
        .header-nav ul li a{
            font-size: 16px;
            color: var(--white-color);
            line-height: 27px;
            text-decoration: none;
            display: block;
        }
        .header-nav ul li a:hover{
            color: var(--secondary);
        }
        .header-nav ul{
            gap: 65px;
        }
        .header-nav{
            margin-right: 40px;
        }
        .header-btn a {
            width: 145px;
            height: 44px;
            line-height: 41px;
            border-radius: 5px;
            background-color: var(--white-color);
            font-size: 18px;
            font-family: var(--font-1);
            color: var(--primary);
            font-weight: 400;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            margin-left: 60px;
        }
        @media (max-width: 767px) {
            .bar {
                position: absolute;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
            }
        }
        button.offcanvas-close {
            position: absolute;
            right: 30px;
            top: 30px;
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 28px;
            line-height: 1;
            padding: 0px;
        }

        img.offcanvas-logo {
            margin-bottom: 10px;
        }

        .offcanvas-title {
            font-size: 35px;
            color: #fff;
            font-weight: normal;
            line-height: 35px;
            margin-bottom: 10px;
        }

        .offcanvas h6 {
            font-size: 19px;
            color: #fff;
            margin-bottom: 3px;
            line-height: 28px;
        }

        .offcanvas-header {
            padding-bottom: 20px;
            border-bottom: 1px solid #fff;
            padding: 0px;
            padding-bottom: 25px;
        }

        .offcanvas {
            padding: 24px;
        }
        .offcanvas-menu ul li a{
            text-decoration: none;
            color: #fff !important;
            font-size: 19px;
            line-height: 28px;
            display: block;
            padding: 4px 0px;
            font-weight: bold;
        }
        .offcanvas-menu ul li a:hover{
            text-decoration: underline;
        }
        .offcanvas-link ul li a {
            text-decoration: none;
            color: #fff !important;
            font-size: 16px;
            line-height: 28px;
            display: block;
            padding: 4px 0px;
        }
        .offcanvas-link ul li a:hover {
            color: var(--secondary);
        }
        .offcanvas-step span.count{
            flex: 0 0 auto;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 1px solid var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            font-size: 19px;
            font-weight: bold;
            line-height: 1;
        }
        .offcanvas-step p{
            color: #fff !important;
            font-size: 17px;
            line-height: 25px;
            font-weight: 500;
        }
        .offcanvas-step{
            margin-bottom: 30px;
        }
        .bg-primary {
            --bs-bg-opacity: 1;
            background-color:#01449A !important;
        }

        /* ======== footer style start ============ */
        .footer .footer-paragraph {
            max-width: 745px;
            padding-bottom: 8px;
            margin-left: 0px;
        }
        .footer-nav ul li a {
            display: block;
            position: relative;
            text-decoration: none;
            font-size: 16px;
            color: var(--primary);
            padding: 0px 8px;
            transition: all .25s ease-in-out;
        }
        .footer-nav ul li:last-child a {
            padding-right: 0px;
        }

        .footer-nav ul li:first-child a {
            padding-left: 0px;
        }

        .footer-nav ul li a::after {
            position: absolute;
            left: 0px;
            top: 50%;
            width: 1px;
            height: 58%;
            content: "";
            background: var(--primary);
            transform: translateY(-50%);
        }

        .footer-nav ul li:first-child a::after {
            display: none;
        }
        .footer-nav ul li a:hover {
            color: var(--secondary);
        }
        footer.footer {
            padding: 35px 0px 35px;
            background: #f0f5fa;
        }
        footer.footer .footer-content {
            max-width: 980px;
            margin: auto;
        }
        .footer.footer-primary{
            background-color: var(--primary);
        }
        .footer.footer-primary .footer-nav ul li a{
            color: var(--white-color);
        }
        .footer-end a img {
            transition: all .25s ease-in-out;
        }
        .footer-end a img:hover {
            opacity: .75;
        }
        /* ======== footer style end ============ */

    </style>
</head>
<body id="blue-hero">

<!-- overlay -->
{{--<div class="overlay"></div>--}}
<!-- overlay-end -->

<!-- offcanvas-menu -->
{{--<div class="offcanvas-wrapper">--}}
    <div class="offcanvas  offcanvas-end bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header flex-column">
            <img src="{{ asset('front/imgs/logos/offcanvas-logo.svg') }}" class="offcanvas-logo" alt="">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Carspector</h5>
            <h6>Auto gecheckt, sicher gekauft.</h6>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas-body p-0">



            <!-- offcanvas-link -->
            <div class="offcanvas-link py-4 border-bottom border-white">
                <ul>
                    <li><a href="{{route('faq')}}">Meist gestellte Fragen</a></li>
                    <li><a href="{{route('faq')}}">Dein Check</a></li>
                    <li><a href="https://www.blog.carspector.de">Blog</a></li> 
                    <li><a href="{{route('faq')}}">Kontakt</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                    
                </ul>
            </div>
            <!-- offcanvas-link-end -->

            <!-- offcanvas-social -->
            <div class="offcanvas-social py-4 d-flex align-items-center gap-4 ">
                <a target="_blank" href="https://www.instagram.com/carspector.de"><img src="{{ asset('front/imgs/icons/facebook-white.svg') }}" alt=""></a>
                <a target="_blank" href="https://www.facebook.com/carspector"><img src="{{ asset('front/imgs/icons/insta-white.svg') }}" alt=""></a>
                <a target="_blank" href="https://www.linkedin.com/company/carspector"><img src="{{ asset('front/imgs/icons/linkdin-white.svg') }}" alt=""></a>
                <a target="_blank" href="https://www.twitter.com/carspector"><img src="{{ asset('front/imgs/icons/twitter-white.svg') }}" alt=""></a>
            </div>
            <!-- offcanvas-social-end -->

        </div>
    </div>
{{--</div>--}}
<!-- offcanvas-menu-end -->

<!-- header-start -->
<header class="header header-two">
    <div class="header-wrapper container d-flex align-items-center justify-content-center justify-content-md-between">
        <!-- header-logo -->
        <div class="header-logo">
            <a href="{{url('/')}}"><img src="{{ asset('front/imgs/logos/logo-2.png') }}" alt=""> <span class="d-none d-lg-block">Auto gecheckt, sicher gekauft.</span></a>
        </div>
        <!-- header-logo-end -->

        <!-- header-right -->
        <div class="header-end align-items-center d-none d-lg-flex">
            <div class="header-nav">
                <ul class="d-flex align-items-center justify-content-end">
                    <li><a href="{{route('faq')}}">Meist gestellte Fragen</a></li>
                    <li><a href="{{route('faq')}}">Dein Check</a></li>
                    <li><a href="https://www.blog.carspector.de">Blog</a></li> 
                    <li><a href="{{route('faq')}}">Kontakt</a></li>
                </ul>
            </div>
            <div class="header-btn">
                @if(auth()->user())
                    @if(auth()->user()->type=='examiner')
                        <a href="{{route('examiner.dashboard')}}">Dashboard</a>
                    @else
                        <a href="{{route('user.dashboard')}}">Dashboard</a>
                    @endif

                @else
                    <a href="{{route('login')}}">Login</a>
                @endif
            </div>
        </div>
        <!-- header-right-end -->

        <!-- menu-bar -->
        <div class="bar d-lg-none">
            <button class="bg-transparent border-0 p-0 text-white fs-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <!-- menu-bar-end -->
    </div>
</header>

<!-- header-start-end -->

<!-- main -->
@yield('content')
<!-- main-end -->

<!-- footer-start -->
{{--@if(request()->route()->getName()=='index')--}}
{{--    @include('partials.footer')--}}
{{--    @elseif(request()->route()->getName()=='booking.step3')--}}
{{--    @include('partials.footer-3')--}}
{{--@else--}}
{{--    @include('partials.footer-2')--}}
{{--@endif--}}
<!-- footer-start-end -->
@include('partials.footer')

<!-- scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{asset('/lazy/jquery.lazy.js')}}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(function() {
        $('.lazy').lazy();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Initialize popover component
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
    $(document).ready(function(e){

        var is_open=false;
        $(document).on('click','.password-eye',function(e){
           is_open=$(this).attr('data-open')==="true"?true:false;
           console.log($(this).attr('data-open'));
            if(!is_open){
                $(this).attr('data-open',"true");
                $(this).parent().find('input').attr('type','text');
                $(this).find('img').attr('src','{{ asset('assets/img/icons/passwort-eye-close.png') }}')

            }else {
                $(this).attr('data-open',"false");
                $(this).parent().find('input').attr('type','password');
                $(this).find('img').attr('src','{{ asset('assets/img/icons/passwort-eye.png') }}')

            }
        })
    })
</script>
@yield('scripts')

@if(session('success'))
    <script>
        toastr.success('', '{{session('success')}}')
    </script>
@endif
</body>
</html>

<!-- Carspector is represented by Sebastian Stock - A Carspector Production. All rights reserved - copyright © Carspector 2024 -->

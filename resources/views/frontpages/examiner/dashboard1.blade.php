<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prüfer Profil</title>
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <!-- css-start -->
    <link rel="stylesheet" href="{{ asset('exm/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('exm/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('exm/assets/css/responsive.css') }}" />
    <link href="{{asset('cropper/src/css/cropper.css')}}" type="text/css" rel="stylesheet">
    <style>
        .filepond--list-scroller{
            min-height: 500px;
        }
        .filepond--drop-label{
            top:22px;
            z-index:99999;
        }
        .modal-footer{
            z-index: 99999999;
        }

        .image-upload {
            position: relative;
            display: inline-block;
        }

        .input-file {
            display: none;
        }

        .upload-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1877F2;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-button i {
            margin-right: 8px;
        }

        .upload-button:hover {
            background-color: #0F5DB9;
        }
        /*.btn-icon{*/
        /*    display: inline-block;*/
        /*    font-style: normal;*/
        /*    font-variant: normal;*/
        /*    text-rendering: auto;*/
        /*    -webkit-font-smoothing: antialiased;*/
        /*}*/
        .btn-after::after{
            content: "";
            background-image: url("{{asset('assets/img/icons/remove.png')}}");
            width: 13px;
            background-size: 100% 100%;
            height: 14px;
            display: inline-block;
            margin: -2px;
            position: relative;
            left: 14px;
        }

        .popup1 {
            position: relative;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* The actual popup */
        .popup1 .popuptext {
            visibility: hidden;
            width: 200px;
            background-color: white;
            color: black;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            padding-left: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
            box-shadow: 3px 2px 4px;

        }

        /* Popup arrow */
        .popup1 .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        /* Toggle this class - hide and show the popup */
        .popup1 .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
        }
        .profile-points{

        }
        .profile-points li{
            font-size: 13px;
            white-space: nowrap;
        }




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
            padding: 2px 0px;
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
        .check-box-order{
            /*width: 100%;*/
            display: none;
        }


        .btn-primary:hover{
            color:white !important;

        }



        .modal .modal-xl{
            max-width: 1341px;
        }
        .modal .modal-content{
            border: none;
            border-radius: 20px;
            box-shadow: 0px 2px 24px rgba(0, 0, 0, 0.25);
        }
        .popup-wrapper{
            display: flex;
            align-items: stretch;
            border-radius: 20px;
        }

        .profile-sidebar{
            background-color: #fff;
            flex: 0 0 auto;
            width: 347px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .profile-sidebar-header{
            padding: 15px 17px 30px 15px;
            border-bottom: 1px solid #C1C1C1;
        }

        .profile-card{
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-img{
            height: 120px;
            width: 120px;
            border-radius: 50%;
            margin-right: 30px;
        }
        .profile-img img{
            height: 100%;
            width: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
        }
        .profile-info h6{
            font-size: 18px;
            margin-bottom: 8px;
        }
        .profile-info-header h6 img {
            max-width: 25px;
        }
        .profile-info p{
            display: flex;
            align-items: center;
            font-size: 15px;
            font-weight: 400;
            color: #000;
        }
        .profile-info p img {
            margin-right: 4px;
            max-width: 16px;
        }


        .profile-meta ul li {
            position: relative;
            padding: 5px 0px;
            padding-left: 31px;
            font-size: 15px;
            font-weight: 400;
            color: #000;
        }
        .profile-meta ul li span {
            position: absolute;
            left: 0px;
            top: 4px;
        }
        .profile-meta ul li span img {
            max-width: 20px;
            width: 20px;
            height: 20px;
        }

        .profile-info-item{
            padding: 15px 15px 15px 20px;
            border-bottom: 1px solid #C1C1C1;
        }
        .profile-info-item:last-child{
            border-bottom: none;
        }
        .profile-info-header h6 {
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            margin-bottom: 0px;
            margin-bottom: 15px;
        }
        .profile-info-header h6 img{
            flex: 0 0 auto;
            margin-right: 10px;
        }
        .profile-info-item ul li{
            font-size: 14px;
            font-weight: 400;
            line-height: 18px;
            position: relative;
            padding: 3px 0px;
            padding-left: 26px;
        }
        .profile-info-item ul li span{
            height: 15px;
            width: 15px;
            position: absolute;
            left: 0px;
            top: 3px;
        }
        .profile-info-item ul li span img{
            max-width: 100%;
        }
        .profile-info-item p{
            font-size: 15px;
            line-height: 18px;
        }
        .profile-info-item p a{
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        .profile-info p {
            margin-bottom: 0px;
        }


        .all-info-popup .modal-dialog {
            max-width: 345px;
            margin: 0 auto;
        }

        .reviews-modal.modal .modal-dialog{
            max-width: 350px;
        }
        .reviews-list{
            height: 400px;
            overflow-y: scroll;
        }

        /* popup-sidebar-end */


        /* popup-content-start */

        .profile-content {
            flex-grow: 1;
            background-color: #F5F5F5;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        .profile-sidebar-header button{
            position: absolute;
            right: 10px;
            top: 10px;
            box-shadow: none !important;
        }

        .profile-desc p{
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            color: #6A6A6A;
        }
        .profile-desc{
            margin-bottom: 42px;
            min-height: 90px;
        }
        .profile-content-wrapper{
            padding: 24px 19px 18px 15px;
        }


        .profile-reviews{
            flex: 0 0 auto;
            width: 343px;
        }
        .profile-reviews h6{
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            margin-bottom: 6px;
        }
        .profile-review-item{
            background: #FFFFFF;
            border-radius: 15px;
            margin-bottom: 8px;
            padding: 12px 11px;
        }
        .profile-review-header{
            display: flex;
            align-items: center;
        }
        .profile-review-header h6{
            font-weight: 500;
            font-size: 17px;
            line-height: 21px;
            margin-bottom: 0px;
        }
        .profile-review-star{
            display: flex;
            align-items: center;

        }
        .profile-review-star img{
            max-width: 16px;
            width: 16px;
        }
        .profile-review-star p{
            font-weight: 400;
            font-size: 15px;
            line-height: 18px;
            margin-bottom: 0px;
        }
        .profile-review-desc {
            margin-top: 10px;
        }
        .profile-review-desc p{
            font-weight: 400;
            font-size: 15px;
            line-height: 18px;
            margin-bottom: 0px;
        }

        .profile-service {
            display: flex;
            align-items: stretch;
            flex-direction: column;
            justify-content: space-between;
            padding: 17px 8px;
            border-radius: 15px;
            background-color: var(--primary);
            flex: 0 0 auto;
            max-width: 350px;
            width: 100%;
        }
        .profile-service-header h6{
            color: var(--white-color);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 0px;
        }
        .profile-service-content ul li{
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            color: var(--white-color);
            padding: 3px 0px;
            padding-left: 15px;
            position: relative;
        }
        .profile-service-content ul li::after {
            position: absolute;
            left: 0px;
            top: 12px;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background-color: var(--white-color);
            content: "";
        }
        .profile-service-content ul li strong{
            font-weight: 600;
        }
        .profile-content-info{
            margin-bottom: 57px;
        }
        .book-now button.btn{
            font-size: 16px;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        .profile-service{
            background-image: url('../img/logo-bgs/logo-bg-city.png');
            background-size: 300px;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* popup-content-start-end */

        .overlay.show{
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            content: "";
            background-color: rgba(0, 0, 0, 0.25);
            z-index: 10;
        }


        /* popup-css */
        .popup {
            position: fixed;
            right: inherit;
            top: 50%;
            width: 319px;
            padding: 17px 15px 24px 15px;
            background: #F5F5F5;
            border: 1px solid #6A6A6A;
            z-index: 111;
            opacity: 0;
            visibility: hidden;
            transition: .3s;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .popup.popup-sort.show{
            opacity: 1;
            visibility: visible;
        }

        .popup.popup-filter.show{
            opacity: 1;
            visibility: visible;
        }



        .popup-header{
            margin-bottom: 24px;
            text-align: center;
        }
        .popup-header h6{
            font-size: 16px;
            margin-bottom: 8px;
        }
        .popup-header p{
            font-size: 14px;
            margin-bottom: 0px;
            line-height: 18px;
        }


        .select-wrapper{
            width: 100%;
            height: 38px;
            background: #FFFFFF;
            border: 1px solid #6A6A6A;
            border-radius: 15px;
            display: flex;
            align-items: stretch;

        }
        .input-group-text:first-child{
            border-right: none !important;
        }
        .input-group-text:last-child{
            border-left: none !important;
        }
        .input-group-text{
            background: #fff;
            border-color: var(--black-color) !important;
        }
        input.form-control,
        textarea.form-control{
            box-shadow: none !important;
            border-color: var(--black-color) !important;
        }


        /* input-group-default-end */

        .navbar-toggler-icon{
            background-image: url('../img/icons/bar.svg');
            height: 25px;
            width: 25px;
        }
        filter-input input{
            border-radius: 16px;
            height: 38px;
            border: none;
            box-shadow: none !important;
        }

        .modal.modal-about .modal-dialog{
            max-width: 830px;
        }
        .modal-box{
            display: block;
        }
        .modal-about .modal-content{
            border: 0px;
            padding: 19px 20px;
            background-color: #fff;
        }
        .modal-about .modal-content .user-card-img{
            flex: 0 0 auto;
            width: 100px;
            height: 100px;
        }
        .modal-about .modal-content .user-card-img img{
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .modal-about .modal-content .user-card-btns a.btn{
            font-size: 15px;
            padding: 6px 5px;
            font-weight: 400;
        }
        .modal-about .modal-content .about-btn a.btn span.icon{
            position: absolute;
            right: 18px;
        }
        .info-card-header span.icon {
            width: 40px;
            height: 40px;
            background: #E4EDFC;
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }
        .info-card-header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 10px;
        }
        .info-card-body ul li {
            padding: 3px 0px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 14px;
            color: #000;
        }
        .about-content{
            min-height: 420px;
        }
        button.modal-close {
            position: absolute;
            right: -47px;
            top: -20px;
            width: 24px;
            height: 24px;
            border: none;
            background: transparent;
            color: #000;
            font-size: 19px;
            background: #fff;
            padding: 0px;
            border-radius: 50%;
            line-height: 24px;
        }
        button.modal-close {
            right: 16px;
            top: 7px;
        }



        /* modal-info */
        .modal-info .modal-dialog{
            max-width: 375px;
        }
        .modal-info .modal-content{
            border: none;
            padding: 15px 18px;
            border: 1px solid #ccc;
        }
        .modal-info h4{
            font-size: 23px;
            font-weight: 600;
            line-height: 34px;
        }
        .modal-info ul li {
            font-size: 17px;
            line-height: 25px;
        }
        .modal-info ul{
            margin-bottom: 15px;
        }
        .modal-info ul li a{
            font-size: 15px;
            text-decoration: none;
            color: #000;
        }
        .modal-info h6{
            margin-bottom: 0px;
            font-weight: normal;
            font-size: 17px;
        }
        .modal-info p{
            font-size: 15px;
            font-weight: 400;
            line-height: 22px;
            margin-bottom: 20px;
            color: #000;
        }
        .modal-info a.btn.btn-primary{
            font-size: 17px;
            font-weight: 500;
        }
        .modal-about .modal-content .user-card-img{
            flex: 0 0 auto;
            width: 100px;
            height: 100px;
        }
        .modal-about .modal-content .user-card-img img{
            width: 100px;
            height: 100px;
        }
        .modal-about .modal-content .user-card-btns a.btn{
            font-size: 15px;
            padding: 6px 5px;
            font-weight: 400;
        }
        .modal-about .modal-content .about-btn a.btn span.icon{
            position: absolute;
            right: 18px;
        }
        .info-card-header span.icon {
            width: 40px;
            height: 40px;
            background: #E4EDFC;
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }
        .info-card-header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 10px;
        }
        .info-card-body ul li {
            padding: 3px 0px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 14px;
            color: #000;
        }
        .about-content{
            min-height: 420px;
        }

        .btn-lighter {
            background-color: rgba(255, 255, 255, 0.65);
        }
        .btn-lighter:hover{
            background-color: rgba(255, 255, 255, 0.85);
        }
        .section-btn {
            height: 46px;
            color: var(--white-color);
            background-color: var(--secondary);
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 17px;
            font-weight: 500;
            font-family: var(--font-1);
            border-radius: 5px;
            box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.25);
            transition: all .25s ease-in-out;
        }
        .section-btn:hover {
            background-color: var(--primary);
        }
        .container-sm{
            max-width: 1060px;
            margin: 0 auto;
        }
        .shadow{
            box-shadow: 0px 4px 4px #00000026 !important;
        }
        .shadow-1{
            box-shadow: 0px 4px 25px #00000040;
        }
        .shadow-2{
            box-shadow: 0px 4px 50px rgba(0, 0, 0, 0.50);
        }
        .border-primary{
            border-color: var(--primary) !important;
        }
        .modal-about .modal-content .user-card-img{
            flex: 0 0 auto;
            width: 100px;
            height: 100px;
        }
        .modal-about .modal-content .user-card-img img{
            width: 100px;
            height: 100px;
        }
        .modal-about .modal-content .user-card-btns a.btn{
            font-size: 15px;
            padding: 6px 5px;
            font-weight: 400;
        }
        .modal-about .modal-content .about-btn a.btn span.icon{
            position: absolute;
            right: 18px;
        }
        .info-card-header span.icon {
            width: 40px;
            height: 40px;
            background: #E4EDFC;
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }
        .info-card-header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 10px;
        }
        .info-card-body ul li {
            padding: 3px 0px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 14px;
            color: #000;
        }
        .about-content{
            min-height: 420px;
        }
        button.modal-close {
            position: absolute;
            right: -47px;
            top: -20px;
            width: 24px;
            height: 24px;
            border: none;
            background: transparent;
            color: #000;
            font-size: 19px;
            background: #fff;
            padding: 0px;
            border-radius: 50%;
            line-height: 24px;
        }
        button.modal-close {
            right: 16px;
            top: 7px;
        }
        .user-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 17px;
            border-radius: 5px !important;
        }
        .user-card-info .ratting{
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .user-card-info .ratting span{
            color: rgba(255, 199, 20, 1);
        }
        .user-card-info h5{
            font-size: 21px;
            line-height: 30px;
            font-weight: 500;
            margin-bottom: 0px;
        }
        .user-card-info p{
            font-size: 15px;
            font-weight: 500;
            line-height: 22px;
        }
        .user-card-info h6{
            font-size: 19px;
            line-height: 28px;
            margin-bottom: 0px;
        }
        .user-card-btns{
            flex: 0 0 auto;
            width: 204px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* user-card-end */

        .btn-next{
            position: absolute;
            right: 40px;
            bottom: -24px;

        }

        .btn22 {
            font-size: 17px;
            font-weight: 500;
            padding: 10px 40px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-secondary2 {
            background-color: #0A8216FF !important;
            border-color: #0A8216FF !important;
            color: #fff;
        }

        .btn22 span {
            line-height: 1;
            position: relative;
            bottom: 13px;
        }
        .checkbox-order label{
            color: white;
            font-weight: 500;
        }
        .checkbox-order{
            width: 210px;
            margin-left: 0;
            padding-left: 13px;
        }
        .checkbox-order input{
            float: right !important;
        }
        .date-info{
            font-weight: 700;
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
            color: #01449A !important;
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
        .paragraph {
            font-size: 18px;
            line-height: 1.3;
            font-weight: 400;
            font-family: Poppins, sans-serif;
            color: #01449A;
            margin-bottom: 0;
        }
        @media screen and (min-width: 420px) {
            .header.header-two {
                padding: 17px 0px;
            }
        }
    </style>



    <!-- css-start-end -->
</head>

<body id="blue-hero">
<!-- main -->
<div class="root">
    <!-- offcanvas-menu -->
    <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header flex-column">
            <img src="{{ asset('front/imgs/logos/logo-2.png') }}" class="offcanvas-logo" alt="carspector gebrauchtwagencheck" "width=50" height="50">
            <br>
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
                    <li><a href="{{route('faq')}}">FAQ</a></li>
                    <li><a href="{{route('vorteile')}}">Vorteile</a></li>
                    <li><a href="https://blog.carspector.de">Blog</a></li>
                    <li><a href="{{route('kontakt')}}">Kontakt</a></li>
                    <li><a href="{{route('login')}}">Login</a></li><br>
                    <li><a href="{{route('examiner.home')}}">Prüfer werden</a></li>
                </ul>
            </div>
            <!-- offcanvas-link-end -->

            <!-- offcanvas-social -->
            <div class="offcanvas-social py-4 d-flex align-items-center gap-4 ">
                <a href=""><img src="{{ asset('front/imgs/icons/facebook-white.svg') }}" alt=""></a>
                <a href=""><img src="{{ asset('front/imgs/icons/insta-white.svg') }}" alt=""></a>
                <a href=""><img src="{{ asset('front/imgs/icons/linkdin-white.svg') }}" alt=""></a>
                <a href=""><img src="{{ asset('front/imgs/icons/twitter-white.svg') }}" alt=""></a>
            </div>
            <!-- offcanvas-social-end -->

        </div>
    </div>
    <!-- offcanvas-menu-end -->



    <!-- header -->
{{--    <header class="header">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="header-wrapper d-flex align-items-center justify-content-between">--}}
{{--                        <!-- header-logo -->--}}
{{--                        <div class="header-logo">--}}
{{--                            <a href="{{url('/')}}">--}}
{{--                                <img src="{{ asset('exm/assets/imgs/logo.svg') }}" alt="" />--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <!-- header-logo-end -->--}}

{{--                        <!-- header-nav -->--}}
{{--                        <div class="header-nav d-none d-md-block">--}}
{{--                            <nav>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="{{route('examiner.register')}}">Prufer Werden</a></li>--}}
{{--                                    <li><a href="{{route('vorteile')}}">Vorteile</a></li>--}}
{{--                                    <li><a href="{{route('support')}}">Support</a></li>--}}
{{--                                    @guest()--}}
{{--                                        <a href="{{route('login')}}" class="btn btn-white">Anmelden</a>--}}
{{--                                    @else--}}
{{--                                        @if(auth()->user()->type=='examiner')--}}
{{--                                            <a href="{{route('examiner.dashboard')}}" class="btn btn-white">Dashboard</a>--}}
{{--                                        @else--}}
{{--                                            <a href="{{route('user.dashboard')}}" class="btn btn-white">Dashboard</a>--}}
{{--                                        @endif--}}
{{--                                    @endguest--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
{{--                        </div>--}}
{{--                        <!-- header-nav-end -->--}}

{{--                        <!-- header-bar -->--}}
{{--                        <button type="button" class="bg-transparent border-0 p-0 d-md-none bar" data-bs-toggle="offcanvas"--}}
{{--                                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">--}}
{{--                            <img src="{{ asset('exm/assets/imgs/bar.svg') }}" alt="" />--}}
{{--                        </button>--}}
{{--                        <!-- header-bar-end -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}
    <!-- header-end -->

    <header class="header header-two">
        <div class="header-wrapper container d-flex align-items-center justify-content-center justify-content-md-between">
            <!-- header-logo -->
            <div class="header-logo">
                <a href="{{url('/')}}"><img src="{{ asset('front/imgs/logos/logo-2.png') }}" alt=""> <span class="d-none d-lg-block">Auto gecheckt,<br>sicher gekauft.</span></a>
            </div>
            <!-- header-logo-end -->

            <!-- header-right -->
            <div class="header-end align-items-center d-none d-lg-flex">
                <div class="header-nav">
                    <ul style="letter-spacing: 0.5px" class="d-flex align-items-center justify-content-end">
                        <li><a href="{{route('examiner.home')}}">Prüfer werden</a></li>
                        <li><a href="{{route('faq')}}">FAQ</a></li>
                        <li><a href="{{route('vorteile')}}">Vorteile</a></li>
                        <li><a href="https://blog.carspector.de">Blog</a></li>
                        <li><a href="{{route('kontakt')}}">Kontakt</a></li>
                    </ul>
                </div>
                <div class="header-btn">
                    @if(auth()->user())
                        @if(auth()->user()->type=='examiner')
                            <a href="{{route('examiner.dashboard')}}">Mein Profil</a>
                        @else
                            <a href="{{route('user.dashboard')}}">Mein Profil</a>
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

    <!-- main -->
    <main>
        <!-- hero-area -->
        <section class="hero-area" style="margin-top: 10px;">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-11">
                        <div class="hero-wrapper " style="margin-top: 100px">

                            <div class="hero-content">
                                <!-- hero-user -->
                                <div class="hero-user">
                                    <div class="hero-user--img portal-img">
                                        <img src="{{$user->image}}" alt="" />
                                        <button type="button" class="user-edit" data-bs-toggle="modal" data-bs-target="#profile-picture">
                                            <img src="{{ asset('exm/assets/imgs/pencil.svg') }}" alt="" />
                                        </button>
                                    </div>
                                    <div class="hero-user--content">
                                        <h4 class="fs-main">{{$user->name}}</h4>
                                        <div class="user-btns">
                                            <div class="dropdown">
                                                @if($user->image=='avatar.png' || strlen($user->about_me) < 350  || !count($user->cities) || $user->price=="" || !$user->price)
                                                <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    Nicht sichtbar
                                                </button>
                                                <ul class="dropdown-menu profile-points">
                                                    @if($user->image=='avatar.png')
                                                        <li>- Profilbild auswählen</li>
                                                    @endif
                                                    @if(strlen($user->about_me) < 350)
                                                        <li>- Profil bearbeiten</li>
                                                    @endif
                                                    @if(!count($user->cities))
                                                        <li>- Arbeitsgebiet festlegen</li>
                                                    @endif
                                                    @if($user->price=="" || !$user->price)
                                                        <li>- Preis festlegen</li>
                                                    @endif
                                                </ul>
                                                @else
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                        Profil sichtbar
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        <!--<div class="user-rattings">
                                            @php
                                                $rating = avg_reviews($user->id); // Replace this with your actual rating value
                                                $fullStars = floor($rating);
                                                $halfStar = ceil($rating - $fullStars);
                                                $emptyStars = 5 - $fullStars - $halfStar;
                                            @endphp

                                            <div class="user-rattings--stars">
                                                @for ($i = 0; $i < $fullStars; $i++)
                                                    <img src="{{ asset('exm/assets/imgs/star.svg') }}" alt="" />
                                                @endfor

                                                @if ($halfStar > 0)
                                                    <img src="{{ asset('exm/assets/imgs/star-o.svg') }}" alt="" />
                                                @endif

                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <img src="{{ asset('exm/assets/imgs/star-svg-gray.svg') }}" alt="" />
                                                @endfor
                                            </div>
                                            <span>{{avg_reviews($user->id)}}/5.0 </span>
                                        </div>-->
                                    </div>
                                </div>
                                <!-- hero-user-end -->

                                <!-- hero-right -->
                                <div class="hero-right">
                                    <div class="d-flex align-items-center gap-2 gap-xxl-4 hero-btns">
                                    @if($user->available)
                                            <a href="{{route('examiner.update-available')}}" data-toggle="tooltip" data-placement="top" title="Klicken Sie hier, um sich nicht verfügbar zu machen" style="border-radius: 12px !important;" type="button" class="btn btn-primary">
                                                verfügbar
                                            </a>
                                        @else

                                            <a href="{{route('examiner.update-available')}}" data-toggle="tooltip" data-placement="top" title="Klicken Sie hier, um sich zur Verfügung zu stellen" style="border-radius: 12px !important;color:white !important;" type="button" class="btn  btn-danger">
                                                Nicht verfügbar
                                            </a>
                                        @endif
                                        <button role="button"  data-id="{{$user->id}}" data-bs-toggle="modal" data-bs-target="#profile-modal" class="btn btn-white btn-examiner-profile">Profil anzeigen</button>
                                        <a href="{{route('examiner.edit-profile')}}" type="button" class="btn btn-white">
                                            <span><img src="{{ asset('exm/assets/imgs/pencil-sm.svg') }}" alt="" /></span>
                                            Profil bearbeiten
                                        </a>
                                        <a href="{{route('password.change')}}" type="button" class="btn btn-white">
                                            <span><img src="{{ asset('exm/assets/imgs/pencil-sm.svg') }}" alt="" /></span>
                                            Passwort ändern
                                        </a>


                                    </div><br>
                                    <!--<h4 class="fs-main">Abgeschlossene Auftrage : {{completed_order($user->id)}}</h4>-->
                                </div>
                                <!-- hero-right-end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero-area-end -->

        <!-- main-content -->
        <div class="main-content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7">
                        <div class="box-white work-box" style="min-height: 508px;">
                            <h4 class="fs-main">Arbeitsgebiet</h4>
                            <div class="work-form" >
                                <form action="{{ route('examiner.update-cities') }}" class="form-xhr" method="POST">
                                    <input name="city" type="text" placeholder="Stadt" />
                                    <button type="submit" class="btn btn-secondary">
                                        Hinzufügen
                                    </button>
                                </form>
                                <div class="work-lists"  style="max-height: 468px;overflow: auto">
                                    <ul id="examiner-cities">
                                        @if(count($examinerCities) > 0)
                                        @foreach($examinerCities as $city)
                                        <li>
                                            <span>{{$city->name}}</span>
                                            <a href="{{route('examiner.delete-city',$city->id)}}" type="button" class="">
                                                <img style="padding-right: 15px" src="{{ asset('exm/assets/imgs/cross.svg') }}" alt="" />
                                            </a>
                                        </li>
                                        @endforeach
                                        @else
                                        <li class="text-center justify-content-center p-5 m-5"><h3 align="center">No Cities</h3></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row gy-3">
                            <div class="col-12 order-1 order-md-0">
                                <div class="widget widget-credit">
                                    <h3 class="fs-main">Guthaben</h3>
                                    <div class="credit-items">
                                        <!-- credit-item -->
                                        <div class="credit-item">
                                            <h5 class="fs-main fw-normal">Mein Guthaben</h5>
                                            <h6>{{number_format($user->balance,2)}} €</h6>
                                        </div>
                                        <!-- credit-item-end -->
                                        <!-- credit-item -->
                                        <div class="credit-item">
                                            <h5 class="fs-main fw-normal">In Bearbeitung</h5>
                                            <h6>0.00 €</h6>
                                            <!-- <h6>{{number_format($totalPending,2)}} €</h6> -->
                                        </div>
                                        <!-- credit-item-end -->
                                    </div>
                                    <a href="#withdrawModal" data-bs-toggle="modal" data-bs-target="#withdrawModal" class="btn btn-secondary w-100">Jetzt Auszahlen</a>
                                </div>
                            </div>
                            <div class="col-12 order-0 order-md-1">
                                <form action="{{ route('examiner.change-price') }}" class="form-xhr" method="POST">
                                <div class="widget widget-credit">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 class="fs-main">Preis</h3>
                                        <span class="fs-main fw-bold"><span id="price">{{$user->price}}</span> <span class="fw-normal">€</span></span>
                                    </div>
                                    <div class="price-input">


                                            @csrf
                                            <input type="text" name="new_price" pattern="\d*" placeholder="Neuer Preis" />

                                    </div>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <button type="submit" class="btn btn-secondary w-50">
                                            Speichern
                                        </button>
                                    </div>

                                </div>
                                </form>
                            </div>
                            <div class="col-12 order-2 order-md-2">
                                <div class="text-end mb-4 mb-lg-0">
                                    @if(auth()->user())
                                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-secondary">Abmelden</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1 d-flex justify-content-center">
                    <div class="col-lg-7">
                        <div class="box-white bookigs">
                            <div class="d-flex align-items-center flex-wrap gap-3">
                                <h4 class="fs-main" style="font-size: 15px !important">Meine Buchungen</h4>
                                <h4 class="fs-main" style="font-size: 15px !important">Aktive Aufträge: {{count($orders)}}</h4>


                                <div class="my-orders-wrapper" style="width: 100%">
                                    @foreach($orders as $order)
                                        <div class="my-booking mb-3">
                                            <div class="date-info">
                                                <span class="date">Check in:<span style="text-transform: capitalize"> {{ $order->city }}</span></span>
                                            </div>
                                            <div class="my-booking-allInfo">
                                                <button type="button" data-id="{{$order->id}}" class="btn btn-white text-dark btn-order-details"  data-bs-toggle="modal" data-bs-target="#exampleModal">Alle Infos ansehen</button>
                                            </div>
                                        </div>
{{--                                        <div class="my-booking mb-3" style="max-width:250px;">--}}
{{--                                            <div class="date-info">--}}
{{--                                                <span class="date">{{ $order->brand }}</span>--}}
{{--                                                <span class="time">{{$order->vehicle_make_model}}</span>--}}

{{--                                            </div>--}}

{{--                                            <div  class="btn-check-right">--}}

{{--                                                <div class="form-check checkbox-order ">--}}
{{--                                                    <label>Termin verienbart?</label>--}}
{{--                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}

{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div  class="btn-check-right">--}}
{{--                                            <div class="form-check checkbox-order">--}}
{{--                                                <label>Auto gecheckt</label>--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}

{{--                                            </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="my-booking-allInfo" style="width: 100%;flex-basis: 100%">--}}
{{--                                                <button  type="button" style="width: 100%" data-id="{{$order->id}}" class="btn btn-white btn-info-booking text-dark btn-order-details"  data-bs-toggle="modal" data-bs-target="#exampleModal">Alle Infos ansehen</button>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}


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
                                <a href="{{route('examiner.bookings')}}" class="btn btn-secondary">Abgeschlossene Aufträge</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </div>
        <!-- main-content-end -->
    </main>
    <!-- main-end -->
</div>
@include('partials.footer')
<!-- main-end -->
<!-- pertner-portal-end -->

<div class="modal modal-about fade" id="profile-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="profile_data">

        </div>
    </div>
</div>
</main>

<div class="modal all-info-popup fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="booking_detail">

        </div>
    </div>
</div>




<div class="modal fade" id="profile-picture" tabindex="-1" >

    <div class="modal-dialog modal-md">
        <div class="modal-content" style="min-height: 350px">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container pb-4">
                    <div class="row d-flex justify-content-center ">
                        <div class="col-12 text-center">
                            <div class="image-upload">
                                <input type="file"  id="inputImage" class="input-file">
                                <label for="inputImage" class="upload-button">
                                    <i class="fas fa-upload"></i> Bild auswählen
                                </label>
                            </div>
                            <div class="crop-container mt-2">
                                <img style="width: 100%" src="" alt="" id="previewImage">
                            </div>
                        </div>
                    </div>


                    @csrf
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="background-color: #AD250A" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                <button type="button" style="background-color: #1877f2"class="btn btn-primary" id="cropButton">Speichern <span style="display: none;" class="spinner-border spinner-border-sm price-loading" role="status" aria-hidden="true"></span></button>
            </div>

        </div>

    </div>

</div>
<div class="modal fade" id="withdrawModal" tabindex="-1" >
    <form method="post" class="form-xhr" enctype="multipart/form-data" action="{{route('post-withdraw')}}">
        @csrf
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="min-height: 350px">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container pb-4">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-12">
                                <div class="mb-3 input-group">
                                    <div class="filter-select" style="width: 100%; border: 1px solid;border-radius: 10px;">
                                <span class="filter-select-icon">
                                    <img src="{{ asset('assets/img/icons/euro.png') }}" alt="">
                                </span>
                                        <select name="payment_type" class="form-select w-100 border-1 m-price-from payment-method-select" aria-label="Default select example">
                                            <option selected value="">Auszahlmethode</option>
                                            <option disabled value="Paypal">Paypal (momentan nicht verfügbar)</option>
                                            <option value="Bank">Banküberweisung</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/geschaft.png') }}" alt=""></span>
                                    <textarea name="desc" class="form-control " id="" placeholder="Notiz (optional)"></textarea>

                                </div>
                            </div>
                            <div class="col-12 type-paypal">
                                <div class="mb-3 input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/email.png') }}" alt=""></span>
                                    <input type="email" class="form-control" name="paypal_email"  placeholder="Paypal E-Mail">

                                </div>
                            </div>
                            <div class="col-12 type-bank">
                                <div class="mb-3 input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/kreditkarte.png') }}" alt=""></span>
                                    <input type="text" class="form-control" name="iban"  placeholder="IBAN">

                                </div>
                            </div>
                            <div class="col-12 type-bank">
                                <div class="mb-3 input-group">
                                    <span class="input-group-text"><img src="{{ asset('assets/img/icons/kunde.png') }}" alt=""></span>
                                    <input type="text" class="form-control" name="account_title" value="{{old('email')}}" placeholder="Kontoinhaber">

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background-color: #AD250A" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="submit" style="background-color: #0AAD1D" class="btn btn-primary">Jetzt auszahlen <span style="display: none;" class="spinner-border spinner-border-sm price-loading" role="status" aria-hidden="true"></span></button>
                </div>

            </div>

        </div>
    </form>
</div>
<!-- scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('exm/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>

<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="{{asset('cropper/dist/cropper.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
    $(document).ready(function() {
        // Initialize Cropper.js
        var cropper;

        // Handle file input change event
        $('#inputImage').on('change', function(e) {
            var files = e.target.files;
            if (files.length > 0) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#previewImage').attr('src', event.target.result);

                    // Initialize Cropper.js
                    cropper = new Cropper($('#previewImage')[0], {
                        aspectRatio: 1, // Set desired aspect ratio for cropping
                        viewMode: 3, // Set the Cropper.js view mode
                        dragMode: 'move', // Enable dragging the crop box
                        autoCropArea: 0.8, // Set initial crop area size
                        cropBoxResizable: true, // Disable resizing of the crop box
                        cropBoxMovable: true, // Disable moving of the crop box
                    });
                };
                reader.readAsDataURL(files[0]);
            }
        });

        // Handle crop and upload button click event
        $('#cropButton').on('click', function() {
            // Get cropped image data
            cropper.getCroppedCanvas().toBlob((blob) => {
                const formData = new FormData();
                formData.append('image', blob/*, 'example.png' */);

                $('.price-loading').show();
                // Use `jQuery.ajax` method for example
                $.ajax('{{route('examiner.update-image')}}', {
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success(data) {
                        $('.price-loading').hide();
                        $("#profile-picture").modal('hide')
                        console.log('Upload success');
                        $('.portal-img > img').attr('src',data.url)
                    },
                    error() {
                        $('.price-loading').hide();
                        console.log('Upload error');
                    },
                });
            });
        });
    });
    $('.type-paypal').hide();
    $('.type-bank').hide();
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
    $('.payment-method-select').on('change',function(){
        var paymentMethod=$(this).val();
        console.log(paymentMethod);
        if(paymentMethod=='Paypal'){
            $('.type-paypal').show();
            $('.type-bank').hide();
        }else{
            $('.type-paypal').hide();
            $('.type-bank').show();
        }
    })
</script>
<script>

    $(document).on('show.bs.modal','#profile-picture',function(){



    })
    $(document).on('click','.btn-examiner-profile',function(e){
        var id=$(this).attr('data-id');
        $('#profile_data').html('');
        $.ajax({
            type:"GET",
            url:"{{url('/profile1')}}/"+id,
            data:{},
            success:function(data){
                $('#profile_data').html(data);
            }
        })

    })

    {{--$(document).on('click','.btn-examiner-profile',function(e){--}}
    {{--    var id=$(this).attr('data-id');--}}
    {{--    $('#profile_data').html('');--}}
    {{--    $.ajax({--}}
    {{--        type:"GET",--}}
    {{--        url:"{{url('/profile1')}}/"+id,--}}
    {{--        data:{},--}}
    {{--        success:function(data){--}}
    {{--            $('#profile_data').html(data);--}}
    {{--        }--}}
    {{--    })--}}

    {{--})--}}
    $('.form-xhr').submit(function(e){
        e.preventDefault();

        // KTUtil.btnRelease(btn);
        let f = $(this),
            dat = new FormData(f[0]);
        $(this).find('.price-loading').show();
        $.ajax({
            url: f.attr('action'),
            type: f.attr('method'),
            dataType: 'JSON',
            data: dat,
            processData: false,
            contentType: false,
            error: function(error) {
                $('.price-loading').hide();
                let txt = "";
                if(error.status == 422) {
                    txt += "<div class='text-left'>"
                    for(let m in error.responseJSON.errors) {
                        for (let n in error.responseJSON.errors[m]) {
                            txt += "- " + error.responseJSON.errors[m][n] + "<br>";
                        }
                    }
                    txt += "</div>"
                } else {
                    txt = error.responseJSON.message;
                }
                swal.fire({
                    html: txt,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "D'accord",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                }).then(function() {
                    // KTUtil.btnRelease(btn);
                });
            },
            success: function(data) {
                // KTApp.unblockPage();
                $('#price-modal').modal('hide');
                $('.price-loading').hide();
                $('#profile-picture').modal('hide');
                $('#withdrawModal').modal('hide');
                if(data.file){
                    $('.user-image').attr('src',data.file);
                }
                if(data.cities){
                    var cityHtml="";
                    for(var i=0;i<data.cities.length;i++) {

                        // cityHtml+=' <li style="text-transform: capitalize">'+data.cities[i].name+' <span class="float-end"><i class="fa fa-circle-xmark" style="color: red;font-size: 18px"></i></span> </li>';

                        cityHtml+='<li><span>'+data.cities[i].name+'</span><a href="#" type="button" class=""> <img src="{{ asset('exm/assets/imgs/cross.svg') }}" alt="" /></a></li>';
                    }
                    $('#examiner-cities').html(cityHtml);

                    $('.cities').attr('checked',false);
                    $('.cities').each(function (index,value){
                        // console.log(index);
                        // console.log(value);
                        for(var i=0;i<data.cities.length;i++) {
                            if($(this).val()==data.cities[i].id){
                                $(this).attr('checked',true);
                            }
                        }
                    })
                }
                if(data.success) {
                    $('#price').html(data.price);
                    $('#work-modal').modal('hide');
                    f[0].reset()
                    swal.fire({
                        html: "Aktualisiert.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {

                        if(typeof(data.redirect) != 'undefined')
                            document.location.href = data.redirect
                        else if (typeof(data.event_to_trigger) != 'undefined') {
                            console.log("Triggering "+data.event_to_trigger+" event ...");
                            $.event.trigger({
                                type: data.event_to_trigger,
                                parameters: data.parameters
                            })
                        } else {
                            console.log("No triggerable event.");
                            return true;
                        }
                    });
                } else if (typeof(data.event_to_trigger) != 'undefined') {
                    console.log("Triggering "+data.event_to_trigger+" event ...");
                    $.event.trigger({
                        type: data.event_to_trigger,
                        parameters: data.parameters
                    })
                } else {
                    swal.fire({
                        html: data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "D'accord",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        // KTUtil.btnRelease(btn);
                    });
                }
            }
        });
    });
</script>
</body>

</html>

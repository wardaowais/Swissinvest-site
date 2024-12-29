<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{translate('Doctor Directory')}}</title>

    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">

    <link href="{{ asset('assets/img/logo.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.css') }}">
    
    <!-- custome class -->
    <style>
        .banner .row {
            height: unset !important;
        }
        .banner::before {
            position: relative !important;
        }
        .banner {
            background-color: #f1f8ff !important;
            background-position: right top;
        }
        .mx-35 {
            margin-left: 1.28rem !important;
            margin-right: 1.28rem !important;
        }
        .header .content a img {
            left: 15px !important;
        }
        #nav-icon1 span {
            height: 3px !important;
        }
        #nav-icon1 span:nth-child(1) {
            top: 0px !important;
        }
        #nav-icon1 span:nth-child(2) {
            top: 8px !important;
        }
        #nav-icon1 span:nth-child(3) {
            top: 16px !important;
        }
        #nav-icon1 {
            width: 24px !important;
            height: 20px !important;
        }
        .header .drp li {
            margin-left: 25px !important;
        }
        .header .drp li a {
            font-weight: 400 !important;
        }
        .header .drp li a.btn-danger {
            background: #fff;
            color: #133197;
            font-weight: 400;
            padding: 11px 20px;
            display: inline-block;
            width: unset;
        }
        .header .drp li a.btn-secondary {
            padding: 11px 20px !important;
            padding-left: 0px !important;
            padding-right: 10px !important;
            width: unset !important;
            line-height: 1;
        }
        .header .drp li a.btn {
            box-shadow: none !important;
        }
        .header .drp li a.btn:focus {
            box-shadow: none !important;
        }
        .m-0 {
            margin: 0 !important;
        }

        .m-1 {
            margin: 0.25rem !important;
        }

        .m-2 {
            margin: 0.5rem !important;
        }

        .m-3 {
            margin: 1rem !important;
        }

        .m-4 {
            margin: 1.5rem !important;
        }

        .m-5 {
            margin: 3rem !important;
        }

        .m-auto {
            margin: auto !important;
        }

        .mx-0 {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }

        .mx-1 {
            margin-right: 0.25rem !important;
            margin-left: 0.25rem !important;
        }

        .mx-2 {
            margin-right: 0.5rem !important;
            margin-left: 0.5rem !important;
        }

        .mx-3 {
            margin-right: 1rem !important;
            margin-left: 1rem !important;
        }

        .mx-4 {
            margin-right: 1.5rem !important;
            margin-left: 1.5rem !important;
        }

        .mx-5 {
            margin-right: 3rem !important;
            margin-left: 3rem !important;
        }

        .mx-auto {
            margin-right: auto !important;
            margin-left: auto !important;
        }

        .my-0 {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        .my-1 {
            margin-top: 0.25rem !important;
            margin-bottom: 0.25rem !important;
        }

        .my-2 {
            margin-top: 0.5rem !important;
            margin-bottom: 0.5rem !important;
        }

        .my-3 {
            margin-top: 1rem !important;
            margin-bottom: 1rem !important;
        }

        .my-4 {
            margin-top: 1.5rem !important;
            margin-bottom: 1.5rem !important;
        }

        .my-5 {
            margin-top: 3rem !important;
            margin-bottom: 3rem !important;
        }

        .my-auto {
            margin-top: auto !important;
            margin-bottom: auto !important;
        }

        .mt-0 {
            margin-top: 0 !important;
        }

        .mt-1 {
            margin-top: 0.25rem !important;
        }

        .mt-2 {
            margin-top: 0.5rem !important;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mt-auto {
            margin-top: auto !important;
        }

        .me-0 {
            margin-right: 0 !important;
        }

        .me-1 {
            margin-right: 0.25rem !important;
        }

        .me-2 {
            margin-right: 0.5rem !important;
        }

        .me-3 {
            margin-right: 1rem !important;
        }

        .me-4 {
            margin-right: 1.5rem !important;
        }

        .me-5 {
            margin-right: 3rem !important;
        }

        .me-auto {
            margin-right: auto !important;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .mb-1 {
            margin-bottom: 0.25rem !important;
        }

        .mb-2 {
            margin-bottom: 0.5rem !important;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .mb-5 {
            margin-bottom: 3rem !important;
        }

        .mb-auto {
            margin-bottom: auto !important;
        }

        .ms-0 {
            margin-left: 0 !important;
        }

        .ms-1 {
            margin-left: 0.25rem !important;
        }

        .ms-2 {
            margin-left: 0.5rem !important;
        }

        .ms-3 {
            margin-left: 1rem !important;
        }

        .ms-4 {
            margin-left: 1.5rem !important;
        }

        .ms-5 {
            margin-left: 3rem !important;
        }

        .ms-auto {
            margin-left: auto !important;
        }

        .p-0 {
            padding: 0 !important;
        }

        .p-1 {
            padding: 0.25rem !important;
        }

        .p-2 {
            padding: 0.5rem !important;
        }

        .p-3 {
            padding: 1rem !important;
        }

        .p-4 {
            padding: 1.5rem !important;
        }

        .p-5 {
            padding: 3rem !important;
        }

        .px-0 {
            padding-right: 0 !important;
            padding-left: 0 !important;
        }

        .px-1 {
            padding-right: 0.25rem !important;
            padding-left: 0.25rem !important;
        }

        .px-2 {
            padding-right: 0.5rem !important;
            padding-left: 0.5rem !important;
        }

        .px-3 {
            padding-right: 1rem !important;
            padding-left: 1rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .px-5 {
            padding-right: 3rem !important;
            padding-left: 3rem !important;
        }

        .py-0 {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        .py-1 {
            padding-top: 0.25rem !important;
            padding-bottom: 0.25rem !important;
        }

        .py-2 {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
        }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .py-4 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
        }

        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }

        .pt-0 {
            padding-top: 0 !important;
        }

        .pt-1 {
            padding-top: 0.25rem !important;
        }

        .pt-2 {
            padding-top: 0.5rem !important;
        }

        .pt-3 {
            padding-top: 1rem !important;
        }

        .pt-4 {
            padding-top: 1.5rem !important;
        }

        .pt-5 {
            padding-top: 3rem !important;
        }

        .pe-0 {
            padding-right: 0 !important;
        }

        .pe-1 {
            padding-right: 0.25rem !important;
        }

        .pe-2 {
            padding-right: 0.5rem !important;
        }

        .pe-3 {
            padding-right: 1rem !important;
        }

        .pe-4 {
            padding-right: 1.5rem !important;
        }

        .pe-5 {
            padding-right: 3rem !important;
        }

        .pb-0 {
            padding-bottom: 0 !important;
        }

        .pb-1 {
            padding-bottom: 0.25rem !important;
        }

        .pb-2 {
            padding-bottom: 0.5rem !important;
        }

        .pb-3 {
            padding-bottom: 1rem !important;
        }

        .pb-4 {
            padding-bottom: 1.5rem !important;
        }

        .pb-5 {
            padding-bottom: 3rem !important;
        }

        .ps-0 {
            padding-left: 0 !important;
        }

        .ps-1 {
            padding-left: 0.25rem !important;
        }

        .ps-2 {
            padding-left: 0.5rem !important;
        }

        .ps-3 {
            padding-left: 1rem !important;
        }

        .ps-4 {
            padding-left: 1.5rem !important;
        }

        .ps-5 {
            padding-left: 3rem !important;
        }
        .fixed-header {
            margin: 12px !important;
            z-index: 1000 !important;
            border-radius: 18px !important;
            position: relative;
        }

        body {
            overflow-x: hidden !important;
            padding-top: 0px !important;
            font-family: "Raleway", sans-serif !important;
            background: #fff !important;
        }
        .banner {
            margin: 12px !important;
            border-radius: 18px !important;
        }
        .banner::before {
            border-radius: 18px !important;
        }
        .small {
            font-size: 60% !important;
        }

        .ui-tabs .ui-tabs-nav li {
            border-radius: 15px 15px 0px 0px !important;
            margin-right: 1px;
        }

        .ui-tabs .ui-tabs-nav {
            background: #ffffff00;
            top: -56px;
            z-index: 1;
            /* border-bottom: 3px solid #ffffff; */
        }

        .bform form {
            border-radius: 0px 15px 15px 15px;
        }

        .ui-tabs .ui-tabs-nav li {
            background: transparent;
            color: #262729;
        }
        .ui-tabs .ui-tabs-nav li a {
            color: #262729;
        }

        .tabs .ui-state-active,
        .ui-widget-content .ui-state-active,
        .ui-widget-header .ui-state-active,
        a.ui-button:active,
        .ui-button:active,
        .ui-button.ui-state-active:hover {
            background: transparent !important;
            color: #009688 !important;
        }

        .ui-tabs .ui-tabs-nav li a:hover {
            background: transparent !important;
            color: #006ce4 !important;
        }

        .ui-state-default a,
        .ui-state-default a:link,
        .ui-state-default a:visited,
        a.ui-button,
        a:link.ui-button,
        a:visited.ui-button,
        .ui-button {
            color: #ffffff;
            border-bottom-color: #009688 !important;
        }

        .ui-state-active a,
        .ui-state-active a:link,
        .ui-state-active a:visited {
            color: #009688 !important;
            border-bottom-color: white !important;
        }

        .banner .container .a-center .col h1 {
            display: inline-block;
            color: #009688;
            /* background: #ffffffab; */
            border-radius: 8px;
            padding: 0px 10px;
            text-shadow: 2px 0px 3px black;
        }

        #banner-slider h1 {
            color: #009688 !important;
            font-size: 62px;
        }

        .banner h1 {
            font-size: 48px !important;
            color: #000a2d !important;
            padding-left: 0px !important;
            text-transform: unset !important;
            font-weight: 800 !important;
        }

        .banner .owl-carousel .owl-stage-outer {
            height: 80px;
        }

        .consultations-img {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 320px;
            max-height: 400px;
            border-radius: 5px;
        }

        .img-btn {
            margin-top: 3rem;
            margin-bottom: 2rem;
            /* text-align: end; */
        }

        .img-btn a {
            background-color: #ff8800;
        }
        @media (min-width: 1140px) {
            .mob-menu {
                display: none;
            }
        }
        @media (max-width: 1140.98px) {
            .desk-menu {
                display: none;
            }
            .header .drp {
                justify-content: end !important;
            }
            .side-menu .content {
                top: 12px;
                background: #141b29 !important;
            }
            .side-menu ul li a {
                font-size: 15px !important;
            }
            .side-menu ul.sec-menu {
                top: 210px !important;
            }
        }

        @media (max-width: 1199.98px) {
            .banner h1 {
                font-size: 45px !important;
                line-height: normal;
            }
            .img-btn {
                margin-top: 0rem !important;
            }
        }

        /* Extra small devices (portrait phones, less than 576px) */

        @media (max-width: 575.98px) {
            /* CSS rules for extra small devices */
            .banner .a-center {
                align-items: baseline;
            }
            .banner {
                padding-top: 7rem;
            }
            .bform {
                bottom: -150px;
            }
            .img-btn {
                margin-top: 3rem !important;
            }
            .consultations {
                margin-top: 7rem !important;
            }
        }

        /* Small devices (landscape phones, 576px and up) */

        @media (min-width: 576px) and (max-width: 767.98px) {
            /* CSS rules for small devices */
            .banner .a-center {
                align-items: baseline;
            }
            .banner {
                padding-top: 9rem;
            }
            .img-btn {
                margin-top: 2rem !important;
            }
        }

        /* Medium devices (tablets, 768px and up) */

        @media (min-width: 768px) and (max-width: 991.98px) {
            /* CSS rules for medium devices */
            .banner .a-center {
                align-items: baseline;
            }
            .banner {
                padding-top: 5rem;
                padding-top: 4rem;
            }
        }

        /* Large devices (desktops, 992px and up) */

        @media (min-width: 992px) and (max-width: 1199.98px) {
            /* CSS rules for large devices */
            .banner .a-center {
                align-items: baseline;
            }
            .banner {
                padding-top: 6rem;
                padding-bottom: 3rem;
            }
        }

        /* Extra large devices (large desktops, 1200px and up) */

        @media (min-width: 1200px) {
            /* CSS rules for extra large devices */
            .banner .a-center {
                align-items: center;
            }
            .banner {
                padding-top: 7rem;
                padding-bottom: 3rem;
            }
        }

        @media (min-width: 1400px) {
            /* CSS rules for extra large devices */
            .banner .a-center {
                align-items: center;
            }
            .banner {
                padding-top: 0rem;
                padding: 35px 25px !important;
            }
        }

        @media (min-width: 1600px) {
            /* CSS rules for extra large devices */
            .banner .a-center {
                align-items: center;
            }
            .banner {
                padding-top: 17rem;
            }
        }

        @media (min-width: 1800px) {
            /* CSS rules for extra large devices */
            .banner .a-center {
                align-items: center;
            }
            .banner {
                padding-top: 22rem;
            }
        }

        @media (min-width: 2000px) {
            /* CSS rules for extra large devices */
            .banner .a-center {
                align-items: center;
            }
            .banner {
                padding-top: 30rem;
            }
        }
        .bform {
            position: relative !important;
            bottom: unset !important;
            left: unset !important;
            transform: unset !important;
            width: unset !important;
            max-width: unset !important;
            z-index: 9 !important;
            margin-top: 20px;
        }
        .hr-top {
            background-color: #fff;
            padding: 9px 12px;
            border-radius: 4px;
            display: inline-block;
        }
        .hr-top span {
            color: #3267ff;
            font-weight: 600;
        }
        .hr-bottom {
            background-color: #fff;
            padding: 12px 35px;
            border-radius: 100px;
            display: inline-block;
            color: #3267ff;
            font-weight: 700;
            font-size: 17px;
            text-transform: capitalize;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.08);
        }
        .ui-tabs .ui-tabs-nav {
            position: unset !important;
            margin-bottom: 22px;
            margin-left: 35px;
        }
        .bform {
            background-color: rgba(174, 195, 255, 0.4);
            border-radius: 24px;
            padding: 24px;
            max-width: 800px !important;
        }
        .bform form {
            border: 0px !important;
            border-radius: 100px !important;
        }
        .bform form ul li button {
            position: absolute;
            top: 11px !important;
            right: 13px !important;
            width: 100%;
            max-width: 50px !important;
            height: 50px !important;
            border: navajowhite;
            background: #152c5b !important;
            color: #fff !important;
            border-radius: 100px !important;
            font-size: 26px;
        }
        .ui-tabs .ui-tabs-nav li a {
            border: 0px !important;
        }
        .ui-tabs .ui-tabs-nav li {
            position: relative;
        }
        .ui-state-active a,
        .ui-state-active a:link,
        .ui-state-active a:visited {
            background: transparent !important;
            color: #006ce4 !important;
        }
        .ui-tabs .ui-tabs-nav .ui-tabs-anchor {
            padding: 5px 0px !important;
            margin-right: 20px;
        }
        .ui-tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor:before {
            content: "";
            position: absolute;
            left: 0px;
            bottom: 0px;
            width: 68px;
            height: 3px;
            background: #006ce4;
        }
        .bform form ul li {
            padding-left: 30px !important;
        }
        @media (max-width: 960px) {
            .banner {
                background-position: center;
                padding-bottom: 15px !important;
            }
            .bform {
                background-color: transparent;
                border-radius: 0;
                padding: 0px !important;
                max-width: unset !important;
                margin-bottom: 12px;
            }
            .bform form {
                border: 0px !important;
                border-radius: 7px !important;
            }
            .ui-tabs .ui-tabs-nav {
                margin-left: 2px !important;
            }
            .bform form ul li button {
                position: relative;
                right: 14px !important;
                width: 100%;
                max-width: unset !important;
                height: unset !important;
                border: navajowhite;
                background: #152c5b !important;
                color: #fff !important;
                border-radius: 10px !important;
                font-size: 20px;
            }
            .sbm-btuttom {
                padding-left: 0px !important;
            }
        }
        @media (max-width: 767.98px) {
            .bform form ul li button {
                top: unset !important;
            }
            .banner {
                background-position: left;
                padding-top: 2rem !important;
            }
            .banner h1 {
                font-size: 30px !important;
            }
            .banner .owl-carousel .owl-stage-outer {
                height: 76px;
            }
        }
        .appoinment_widget {
            background: #fff;
            padding-top: 100px !important;
        }
        .main-ttl {
            position: relative;
            text-align: center;
        }
        .my-swiss {
            margin-top: 3rem;
        }
        .my-pad2 {
            padding-top: 25px;
            padding-bottom: 30px;
        }
        .main-ttl h1,
        .same-h1 {
            font-size: 50px;
            font-weight: 700;
        }
        .main-ttl-44,
        .same-h1 {
            font-size: 44px;
            font-weight: 700;
        }
        .head-success {
            color: #009688 !important;
        }
        .main-ttl h1:first-child {
            position: relative;
            display: inline;
        }
        .main-ttl h1:nth-child(2) {
            color: #009688;
            position: relative;
            display: inline-block;
        }
        .top-right-line:before {
            background-image: url("{{ asset('assets/home/imgs/updated/draw-line.png') }}");
            background-size: 61px 65px;
            content: "";
            width: 61px;
            height: 65px;
            position: absolute;
            right: -60px;
            top: -33px;
        }
        .top-left-line:before {
            background-image: url("{{ asset('assets/home/imgs/updated/draw-line.png') }}");
            background-size: 61px 65px;
            content: "";
            width: 61px;
            height: 65px;
            position: absolute;
            left: -59px;
            top: -28px;
            transform: rotate(255deg);
        }
        .main-ttl p {
            color: #262729 !important;
            font-weight: 600;
            margin-top: 10px;
        }
        .has-pills:before {
            background-image: url("{{ asset('assets/home/imgs/updated/pills.png') }}");
            background-size: 153px 110px;
            content: "";
            width: 153px;
            height: 110px;
            position: absolute;
            left: 40px;
            top: 90px;
        }
        .has-thermo:before {
            background-image: url("{{ asset('assets/home/imgs/updated/thermo.png') }}");
            background-size: 224px 201px;
            content: "";
            width: 224px;
            height: 201px;
            position: absolute;
            left: 40px;
            top: 90px;
        }
        .has-indic:before {
            background-image: url("{{ asset('assets/home/imgs/updated/indic.png') }}");
            background-size: 205px 314px;
            content: "";
            width: 205px;
            height: 314px;
            position: absolute;
            right: -0px;
            top: -80px;
        }
        .has-injec:before {
            background-image: url("{{ asset('assets/home/imgs/updated/injec.png') }}");
            background-size: 216px 391px;
            content: "";
            width: 216px;
            height: 391px;
            position: absolute;
            left: 0px;
            bottom: -120px;
        }
        .has-bottom-arrow:before {
            content: url("{{ asset('assets/home/imgs/updated/arrows2.png') }}");
            width: 162px;
            height: 84px;
            position: absolute;
            left: 60px;
            bottom: -50px;
        }
        .has-arrow3:before {
            content: url("{{ asset('assets/home/imgs/updated/arrows3.png') }}");
            position: absolute;
            right: 60px;
            top: -95px;
        }
        .main-ttl .has-arrow.head-success {
            position: relative;
            display: inline-block;
        }
        .main-ttl .has-arrow.head-success:before {
            content: url("{{ asset('assets/home/imgs/updated/arrows.png') }}");
            width: 80px;
            height: 80px;
            position: absolute;
            left: -150px;
            top: 20px;
        }
        .ico-two-font {
            width: 70px;
            height: 70px;
            min-width: 70px;
            min-height: 70px;
            border-radius: 4px;
            background: #f1f8ff;
            border: 1px solid rgba(152, 179, 255, 0.23);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 16px;
        }
        .in-icon {
            width: 35px;
            height: 35px;
            border-radius: 100px;
            background: #3267ff;
            color: #fff;
            display: flex;
            justify-content: center;
            font-weight: 600;
            align-items: center;
        }
        .in-icon span {
            margin-top: -2px;
        }
        .sec-btn {
            padding: 12px 28px;
            border-radius: 8px;
            text-transform: capitalize;
            font-weight: 600;
        }
        .docs-service {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 350px;
            width: 100%;
            display: flex;
            align-items: flex-end;
            margin-bottom: 30px;
        }
        .service-content {
            background: #fff;
            padding: 25px 20px;
            width: 75%;
        }
        .service-content h6 {
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 25px;
        }
        .has-three {
            margin-right: -12rem;
        }
        .directory p {
            color: unset !important;
        }
        .directory .content .box1 {
            background: #e8f6ff;
            color: #055d81 !important;
            top: 0.5rem !important;
            left: -0.5rem !important;
            border-radius: 18px !important;
        }
        .directory .content .box3 {
            background: #e8ffea;
            color: #068211 !important;
            bottom: 5rem !important;
            left: -4rem !important;
            border-radius: 18px !important;
        }
        .directory .content .box2 {
            background: #ffebcf;
            color: #6c440b !important;
            top: 90% !important;
            right: -2rem !important;
            border-radius: 18px !important;
        }
        .directory .content .box {
            width: 300px !important;
            padding: 24px 24px !important;
        }
        .directory .content .box h4 {
            font-size: 20px !important;
        }
        .directory .content .box p {
            font-size: 16px !important;
            margin-top: 15px !important;
        }
        .bg-none {
            background: transparent !important;
        }
        .top-pad1 {
            padding-top: 180px;
        }
        .doc-circle {
            position: relative;
            display: flex;
            justify-content: center;
        }
        .dc-item {
            background: #fff;
            width: 350px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            padding: 15px;
            position: absolute;
        }
        .dc-item.item-1 {
            left: 55px;
            top: 5%;
        }
        .dc-item.item-2 {
            left: 0;
            top: 45%;
        }
        .dc-item.item-3 {
            left: 55px;
            top: 80%;
        }
        .dc-item.item-4 {
            right: 55px;
            top: 5%;
        }
        .dc-item.item-5 {
            right: 0px;
            top: 45%;
        }
        .dc-item.item-6 {
            right: 55px;
            top: 80%;
        }
        .discover-app {
            background: #e9f4fe;
            border-radius: 8px;
            padding: 30px 50px;
            position: relative;
            margin-top: 70px;
        }
        .lftrt {
            display: flex;
            justify-content: space-between;
        }
        .absolute-img img {
            position: absolute;
            top: -105px;
            width: 422px;
        }
        .rtdit {
            text-align: right;
        }
        .dapp {
            margin-top: 50px;
        }
        .rtdit h4 {
            font-weight: 700;
            font-size: 26px;
            margin-top: 20px;
        }
        .text-end {
            text-align: right;
        }
        .copyright {
            padding: 5px 0 !important;
        }
        .footer,
        .copyright {
            background: #000a2d !important;
        }
        .footer .container {
            border-bottom: 1px solid rgba(255, 255, 255, 0.3) !important;
            padding-bottom: 35px !important;
            padding-top: 10px !important;
        }
        .footer-widget h5 {
            position: relative;
            margin-bottom: 35px !important;
        }
        .footer-widget h5:before {
            content: "";
            position: absolute;
            width: 70px;
            height: 2px;
            background: #3267ff;
            top: 38px;
            left: 0px;
        }
        .testimonial {
            padding-top: 160px;
            padding-bottom: 100px;
        }
        .directory p {
            font-size: unset !important;
        }
        .text-dark-title {
            color: #212529 !important;
        }
        .spark-left {
            position: absolute;
            left: -70px;
            top: -30px;
        }
        .spark-right {
            position: absolute;
            right: -80px;
            bottom: 180px;
        }
        .top-pad-4 {
            padding-top: 3rem;
        }
        .text-end-lg a:first-child {
            margin-right: 8px;
        }
        .tm-card {
            background: linear-gradient(to right, #C0EAFF, #3267FF);
            border-radius: 20px;
            padding: 2px;
            margin-bottom: 15px;
        }
        .tm-inner {
            background: linear-gradient(to right, #EBF8FF, #FDFEFF);
            width: 100%;
            border-radius: 18px;
            padding: 20px 22px;
        }
        .tm-content {
            display: flex;
            align-items: center;
        }
        .tm-img img {
            min-height: 75px;
            min-width: 75px;
            max-height: 75px;
            max-width: 75px;
            margin-right: 16px;
        }
        .tm-stats {
            text-align: center;
            margin-bottom: 15px;
        }
        .tm-stats p {
            font-weight: 600;
            color: #6D6D6D;
            font-size: 15px;
        }
        .tm-stats h1 {
            font-weight: 800;
            font-size: 38px;
            font-family: "Manrope", sans-serif;
            margin-bottom: 2px;
            background: -webkit-linear-gradient(#3267FF, #000A2D);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
        }
        .cus-pad1, .cus-pad2, .cus-pad3 {
            padding-top: 50px;
        }
        .gx-cus1 .col-md-6:first-child {
            padding-right: 40px;
        }
        .gx-cus1 .col-md-6:last-child {
            padding-left: 40px;
        }
        .has-left-circle, .has-right-circle {
            position: relative;
        }
        .has-left-circle:before {
            background-image: url("{{ asset('assets/home/imgs/updated/cball.png') }}");
            background-size: 126px 124px;
            content: "";
            width: 126px;
            height: 124px;
            position: absolute;
            left: -28px;
            top: -7px;
        }
        .has-right-circle:before {
            background-image: url("{{ asset('assets/home/imgs/updated/cball.png') }}");
            background-size: 126px 124px;
            content: "";
            width: 126px;
            height: 124px;
            position: absolute;
            right: -24px;
            bottom: -39px;
        }
        .bform form ul li input {
            padding-top: 0px !important;
            font-size: 16px;
        }
        .bform form ul li {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }
        .bform form ul li:last-child {
            height: 73px;
        }
        @media (max-width: 992px) {
            .main-ttl .has-arrow.head-success:before,
            .has-bottom-arrow:before,
            .has-arrow3:before {
                display: none;
            }
            .consultations {
                margin-top: 0rem !important;
            }
            .main-ttl p {
                font-size: 14px;
            }
            .cus-pad1, .cus-pad2, .cus-pad3 {
                padding-top: 25px;
            }
        }
        @media (min-width: 769px) {
            .text-end-lg {
                text-align: right;
            }
        }
        @media (min-width: 993px) and (max-width: 1300px) {
            .directory .content .box {
                width: 242px !important;
                padding: 20px 20px !important;
            }
            .has-three {
                margin-right: 0px;
            }
            .directory .content .box1 {
                left: -1.5rem !important;
            }
            .directory .content .box2 {
                right: 6rem !important;
            }
            .spark-left {
                left: 0px;
                top: -70px;
            }
            .spark-right {
                right: 0px;
                bottom: 0px;
            }
        }
        @media (min-width: 769px) and (max-width: 960px) {
            .bform form ul li button {
                top: 16px !important;
            }
        }
        @media (min-width: 769px) and (max-width: 992.98px) {
            .directory .content .box {
                position: absolute !important;
            }
            .has-thermo:before {
                background-size: 144px 121px;
                content: "";
                width: 144px;
                height: 121px;
                left: 15px;
                top: 35px;
            }
            .testimonial {
                padding-top: 100px;
                padding-bottom: 90px;
            }
            .spark-left {
                left: 0px;
                top: -70px;
            }
            .spark-right {
                right: 0px;
                bottom: 0px;
            }
            .directory .content .box1 {
                top: 1.5rem !important;
                left: 2rem !important;
            }
            .directory .content .box2 {
                top: 87% !important;
                right: 9rem !important;
            }
            .directory .content .box3 {
                bottom: 7rem !important;
                left: 3rem !important;
            }
            .dc-item.item-1 {
                left: 10px;
            }
            .dc-item.item-3 {
                left: 10px;
            }
            .dc-item.item-4 {
                right: 10px;
            }
            .dc-item.item-6 {
                right: 10px;
            }
            .main-ttl h1,
            .same-h1 {
                font-size: 38px;
            }
            .top-pad1 {
                padding-top: 110px;
            }
            .has-three {
                margin-right: 0rem;
            }
            .top-right-line:before {
                background-size: 31px 35px;
                content: "";
                width: 31px;
                height: 35px;
                right: -32px;
                top: -19px;
            }
            .top-left-line:before {
                background-size: 31px 35px;
                content: "";
                width: 31px;
                height: 35px;
                left: -29px;
                top: -16px;
            }
            .has-pills:before {
                background-size: 103px 60px;
                content: "";
                width: 103px;
                height: 60px;
                left: 30px;
                top: 20px;
            }
            .appoinment_widget {
                padding-top: 70px !important;
            }
        }
        @media (max-width: 768.98px) {
            .gx-cus1 .col-md-6:first-child {
                padding-right: 15px;
            }
            .gx-cus1 .col-md-6:last-child {
                padding-left: 15px;
            }
            .has-three {
                width: 80%;
                margin-right: 0px;
                margin-top: 35px;
            }
            .has-injec:before {
                background-size: 80px 191px;
                content: "";
                width: 80px;
                height: 199px;
                left: 0px;
                bottom: -50px;
            }
            .top-left-line:before {
                background-size: 21px 25px;
                content: "";
                width: 21px;
                height: 25px;
                left: -22px;
                top: -9px;
            }
            .main-ttl h1,
            .same-h1 {
                font-size: 23px;
            }
            .top-right-line:before {
                background-size: 21px 25px;
                content: "";
                width: 21px;
                height: 25px;
                right: -23px;
                top: -10px;
            }
            .has-pills:before {
                background-size: 75px 49px;
                content: "";
                width: 75px;
                height: 49px;
                left: 10px;
                top: 2px;
            }
            .has-indic:before {
                background-size: 56px 114px;
                content: "";
                width: 56px;
                height: 114px;
                right: 0px;
                top: -10px;
                z-index: 0;
            }
            .directory .content .box1,
            .directory .content .box2,
            .directory .content .box3 {
                width: 100% !important;
                top: unset !important;
                left: unset !important;
                right: unset !important;
                box-shadow: none;
                bottom: unset !important;
            }
            .main-ttl-44,
            .same-h1 {
                text-align: center !important;
            }
            .doc-circle {
                display: block;
                text-align: center;
            }
            .dc-item {
                position: unset;
                box-shadow: none;
                border: 1px solid #ddddddad;
                margin-top: 10px;
                width: 100%;
                border-radius: 10px;
            }
            .doc-circle img {
                width: 80%;
                margin-bottom: 30px;
            }
            .lftrt {
                display: block;
            }
            .absolute-img {
                text-align: center;
            }
            .absolute-img img {
                position: unset;
                margin-top: -120px;
                margin-bottom: 40px;
                width: 85%;
            }
            .rtdit {
                text-align: center;
            }
            .discover-app {
                margin-top: 90px;
            }
            .has-thermo:before {
                background-size: 104px 91px;
                content: "";
                width: 104px;
                height: 91px;
                left: 10px;
                top: 10px;
            }
            .testimonial {
                padding-top: 80px;
                padding-bottom: 75px;
            }
            .hr-bottom {
                font-size: 16px !important;
            }
            .appoinment_widget {
                padding-top: 60px !important;
            }
            .top-pad1 {
                padding-top: 10px;
            }
            .my-swiss {
                margin-top: 0rem;
            }
            .my-pad2 {
                padding-top: 15px;
                padding-bottom: 10px;
            }
            .service-content {
                width: 85%;
            }
            .top-pad-4 {
                padding-top: 1rem;
            }
            .directory.my-swiss {
                padding-top: 0px;
            }
            .text-end-lg a:first-child {
                margin-right: 0px;
                margin-bottom: 7px;
                display: block;
            }
            .spark-left {
                left: -10px;
            }
            .spark-right {
                right: 10px;
                bottom: unset;
                top: 32%;
            }
        }
        .manage-two-btn a:first-child {
            margin-right: 8px;
        }
        @media (max-width: 687.98px) {
            .manage-two-btn a:first-child {
                margin-right: 0px;
                margin-bottom: 8px;
            }
        }
        @media (max-width: 687.98px) {
            .manage-two-btn a:first-child {
                margin-right: 0px;
                margin-bottom: 8px;
            }
        }
        @media (min-width: 1250px) {
            .banner {
                padding: 55px 25px !important;
                background-size: 85%;
                background-repeat: no-repeat;
            }
        }
        @media (min-width: 1250px) and (max-width: 1418px) {
            .banner {
                background-size: 100% !important;
            }
        }
    </style>

</head>

<body>

    <!-- header -->
    <header class="header fixed-header">
        <div class="container-fluid">
            <div class="row a-center px-3">
                <div class="col-3">
                    <div class="content">
                        <a href="{{route('home')}}"><img src="{{ asset('assets/frontend/images/logo.png') }}"  alt="Logo"></a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="content">
                        <ul class="drp">
                            <li class="desk-menu"><a href="{{route('register')}}">{{translate (getPageContent('register_Member')) }}</a></li>
                            <li class="desk-menu"><a href="{{route('patientsRegister')}}">{{translate (getPageContent('patients_Register')) }}</a></li>
                            <li class="desk-menu"><a href="{{route('companyRegistrationForm')}}">{{translate ('Register As Company') }}</a></li>
                            <li class="desk-menu">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">{{translate (getPageContent('help_menu')) }} </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{route('careerPost')}}">{{translate (getPageContent('career_menu')) }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">{{translate (getPageContent('FAQ_menu')) }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="desk-menu">
                                <a href="{{route('login')}}" class="btn btn-danger" type="button">
                                    <span class="">{{translate (getPageContent('Top_menu_button')) }}</span>
                                </a>
                            </li>
                            <li class="desk-menu">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle ps-0" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-globe me-1"></i> {{ getLanguages()->firstWhere('code', session('locale', 'en'))->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach(getLanguages() as $language)
                                        @if($language->translation_status != null)
                                                <li>
                                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('locale-form-{{ $language->code }}').submit();">
                                                        {{ $language->name }}
                                                    </a>
                                                    <form id="locale-form-{{ $language->code }}" action="{{ route('setLocale') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="locale" value="{{ $language->code }}">
                                                    </form>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>

                            <li class="mob-menu">
                                <div id="nav-icon1">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="side-menu">
        <div class="overlay"></div>
        <div class="content">
            <ul class="sec-menu">
                <li><a href="{{route('register')}}">{{translate (getPageContent('register_Member')) }}</a></li>
                <li><a href="{{route('patientsRegister')}}">{{translate (getPageContent('patients_Register')) }}</a></li>
                <li><a href="{{route('companyRegistrationForm')}}">{{translate ('Register As Company') }}</a></li>
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">{{translate (getPageContent('help_menu')) }} </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{route('careerPost')}}">{{translate (getPageContent('career_menu')) }}</a>
                            </li>
                            <li> 
                                <a class="dropdown-item" href="#">{{translate (getPageContent('FAQ_menu')) }}</a>
                            </li>
                        </ul>
                    </div> 
                </li>
                <li class="mb-2 mt-1 mx-35">
                    <a href="{{route('login')}}" class="btn btn-danger" type="button">
                        <span class="">{{translate (getPageContent('Top_menu_button')) }}</span>
                    </a>
                </li>
                <li class="mx-35">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle ps-0" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-globe me-1"></i> {{ getLanguages()->firstWhere('code', session('locale', 'en'))->name }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(getLanguages() as $language)
                                @if($language->translation_status != null)
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('locale-form-{{ $language->code }}').submit();">
                                            {{ $language->name }}
                                        </a>
                                        <form id="locale-form-{{ $language->code }}" action="{{ route('setLocale') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="locale" value="{{ $language->code }}">
                                        </form>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- end header -->
    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <a href="{{route('home')}}"><img src="{{ asset('assets/frontend/images/logo.png') }}" style="height: 70px; width: auto;" alt="Logo" /></a>
                        <p class="mt-2 mb-4 pb-2">{{translate (getPageContent('Footer_Text')) }}</p>
                        <ul>
                            <li>
                                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5>Helpfull Link</h5>
                        <ol>
                            <li>
                                <a href="#" class="text-white">Register as professional</a>
                            </li>
                        </ol>
                        <ol>
                            <li>
                                <a href="#" class="text-white">Patient Register</a>
                            </li>
                        </ol>
                        <ol>
                            <li>
                                <a href="#" class="text-white">Company Registraion</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget ">
                        <h5>Support</h5>
                        <ol>
                            <li>
                                <a href="#" class="text-white">Help Center</a>
                            </li>
                        </ol>
                        <ol>
                            <li>
                                <a href="#" class="text-white">Job offer</a>
                            </li>
                        </ol>
                        <ol>
                            <li>
                                <a href="#" class="text-white">FAQ</a>
                            </li>
                        </ol>
                        <ol>
                            <li>
                                <a href="#" class="text-white">Terms & Conditions</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h5>Contact Us</h5>
                        <ol>
                            <li class="text-white"><i class="fa-solid fa-map me-2"></i> <span>Reseau Alpha SA, Montreux-Switzerland</span></li>
                            <li class="text-white"><i class="fa-solid fa-square-phone-flip me-2"></i> <span>+41 (0) 21 883 00 00</span></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- end footer -->

    <!-- copyright -->
    <section class="copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="content">
                        <p class="text-white mb-0">{{translate (getPageContent('copy_right')) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <div class="text-end"><a href="#" class="me-2"><img src="{{ asset('assets/home/imgs/updated/g-play.png') }}"></a><a href="#"><img src="{{ asset('assets/home/imgs/updated/a-store.png') }}"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery-ui.js') }}"></script>

    <script src="{{ asset('assets/home/js/custom.js') }}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/home/js/wow.js') }}"></script>
    <script>
  $(document).ready(function() {
    $('#nav-icon1').click(function() {
        $(this).toggleClass('open');
        $('.side-menu').toggleClass('side-menu-active');
    });
    $('.side-menu .overlay, .open').click(function() {
        $('.side-menu').removeClass('side-menu-active');
        $('#nav-icon1').removeClass('open');
    });
});
    $(document).ready(function(){
        console.log("jQuery and Bootstrap are working.");
        $('.dropdown-toggle').dropdown();
    });
</script>
@yield('scripts')
<script>
  $(document).ready(function() {
    $('#bannerSlider').carousel();
    $('#bannerSlider').carousel({
      interval: 300
    });
  });
</script>
</body>

</html>

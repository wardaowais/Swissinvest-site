@extends('home.layouts.app')
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

    .cus-pad1,
    .cus-pad2,
    .cus-pad3 {
        padding-top: 50px;
    }

    .gx-cus1 .col-md-6:first-child {
        padding-right: 40px;
    }

    .gx-cus1 .col-md-6:last-child {
        padding-left: 40px;
    }

    .has-left-circle,
    .has-right-circle {
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

        .cus-pad1,
        .cus-pad2,
        .cus-pad3 {
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
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">


            <div class="page-container">
                <h1>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Advertising formats and rates</font>
                    </font>
                </h1>
                <div class="row advert-container-wrapper">
                    <section class="col col-12 col-md-8 p-l-0">
                        <div class="form">
                            
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">An offer tailored to your needs</font>
                            </font>
                            </h3>
                            <p>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        Would you like a </font>
                                </font><b>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">personalized study</font>
                                    </font>
                                </b>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> to optimize your visibility? Do not
                                        hesitate to send
                                        us a detailed request of your wishes and we will provide you with a quote
                                        adapted to
                                        your needs.
                                    </font>
                                </font>
                            </p>
                            <a href="#" class="button">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Complete the application form</font>
                                </font>
                            </a>
                        </div>
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#digital_offer"
                                    data-js="digital_offer">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">DIGITAL OFFER</font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#printed_offer" data-js="printed_offer">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">PRINTED OFFER</font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#combined_offers"
                                    data-js="combined_offers">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">COMBINED OFFERS</font>
                                    </font>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane container active" id="digital_offer">
                                <div class="grid-items list-layout container-fluid" id="widget-news-list">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab"
                                                href="#standard_digital_offer" data-js="standard_digital_offer">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">For advertiser</font>
                                                </font>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#exclusive_digital_offer"
                                                data-js="exclusive_digital_offer">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">For leisure provider
                                                    </font>
                                                </font>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane container active" id="standard_digital_offer">
                                            <div class="grid-items list-layout container-fluid"
                                                id="widget-news-list">
                                                <div class="standard-digital-offer">
                                                    <Br>
                                                    <h3 class="text-one mt-4">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Banners | Minimum
                                                                insertion:
                                                                20,000 impressions.</font>
                                                        </font>
                                                    </h3>

                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Simultaneous delivery
                                                            on
                                                        </font>
                                                    </font><span class="orange">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">desktop, tablet
                                                                and
                                                                mobile</font>
                                                        </font>
                                                    </span>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;"> | Cost per 1000
                                                            impressions
                                                            (CPM)</font>
                                                    </font>
                                                    </h4>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Rectangle</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/rectangle-300x250.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Desktop: 300 × 250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Maxi-leaderboard
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/maxi-leaderboard-994x118.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Desktop: 994 × 118 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Wideboard</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/wideboard-994x250.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Desktop: 994 × 250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/rectangle-300x250.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Tablet: 300 × 250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/maxi-leaderboard-994x118.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Tablet: 994 × 118 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/wideboard-994x250.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Tablet: 994 × 250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/rectangle-300x250.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Mobile: 300 × 250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            80.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/maxi-leaderboard-320x100.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Mobile: 320 × 100 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            70.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/wideboard-320x160.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Mobile: 320 × 160 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            90.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Broadcast only on
                                                        </font>
                                                    </font><span class="orange">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">desktop</font>
                                                        </font>
                                                    </span>
                                                    </h4>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Skyscraper</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/skyscraper-160x600.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            160 × 600 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            70.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Maxi-Leaderboard
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/maxi-leaderboard-994x118.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            994 × 118 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            70.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Monstersky</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/monstersky-245x770.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            245 × 770 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            70.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Rectangle</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/rectangle-300x250.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            300 × 250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            80.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Halfpage</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/halfpage-300x600.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            300 × 600 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            90.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Wideboard</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/wideboard-994x250.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            994 x 250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            90.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Wallpaper</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/wallpaper-2250x1440.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            2560 x 1440 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            100.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Broadcast only on
                                                        </font>
                                                    </font><span class="orange">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">tablet</font>
                                                        </font>
                                                    </span>
                                                    </h4>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Rectangle</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/rectangle-300x250.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            300 × 250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            80.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Maxi-Leaderboard
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/maxi-leaderboard-994x118.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            994 × 118 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            70.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Wideboard</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/wideboard-994x250.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            994x250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            90.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <font style="vertical-align: inherit;"><span class="orange">
                                                            <font style="vertical-align: inherit;">Mobile</font>
                                                        </span>
                                                        <font style="vertical-align: inherit;"> only broadcast
                                                        </font>
                                                    </font><span class="orange">
                                                        <font style="vertical-align: inherit;"></font>
                                                    </span>
                                                    </h4>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Rectangle</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/rectangle-mobile.svg">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            300 × 250 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            80.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Maxi-leaderboard
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/maxi-leaderboard-mobile.svg">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            320 × 100 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            70.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Wideboard</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/wideboard-320x160.png">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            320 × 160 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            90.-</font>
                                                                    </font>
                                                                </span>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> (CPM)
                                                                    </font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Sponsoring the
                                                                Loisirs.ch
                                                                &amp; Freizeit.ch Newsletters</font>
                                                        </font>
                                                    </h5>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                Sent on the first Wednesday of each month to more
                                                                than 75,000
                                                                qualified addresses, the monthly newsletter
                                                                highlights upcoming
                                                                good deals. It can be sponsored, just like the
                                                                “Promo Alerts”
                                                                newsletter, which communicates the best offers from
                                                                leisure
                                                                providers every two weeks.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            monthly
                                                                            newsletter</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/newsletter-mensuelle.svg">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Banner: 600 × 160 px (native) or 994 x
                                                                            250 px
                                                                            (wideboard)
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            3,500.-
                                                                        </font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            monthly promo
                                                                            alert</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img">
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/newsletter-mensuelle.svg">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            1 sponsorship
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            2,000.-
                                                                        </font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                            <div class="content" style="border-bottom: none;">
                                                                <div class="details" style="border-top: none;">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            3 sponsorships
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            5,000.-
                                                                        </font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Main partnership
                                                            </font>
                                                        </font>
                                                    </h5>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                Increased visibility in the form of a 90 x 45 px
                                                                logo, as a
                                                                hyperlink.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                The partner is present on all pages of the site and
                                                                thus
                                                                benefits from a continuous presence at the bottom of
                                                                the page in
                                                                a fixed position (3 partners maximum) on the desktop
                                                                version and
                                                                in navigation on the tablet and mobile versions.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items special">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            desktop + tablet
                                                                            + mobile</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <span>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/partenariat-principal-desktop.svg">
                                                                </span>
                                                                <span>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/partenariat-principal-tablette.svg">
                                                                </span>
                                                                <span>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/partenariat-principal-mobile.svg">
                                                                </span>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            90 × 45 px
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">6
                                                                            months</font>
                                                                    </font>
                                                                </div>
                                                                <span><strong>
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">
                                                                                CHF 9,000.-
                                                                            </font>
                                                                        </font>
                                                                    </strong></span>
                                                            </div>
                                                            <div class="content-two">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1
                                                                            year</font>
                                                                    </font>
                                                                </div>
                                                                <span><strong>
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">
                                                                                CHF 15,000.-
                                                                            </font>
                                                                        </font>
                                                                    </strong></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane container" id="exclusive_digital_offer">
                                            <div class="grid-items list-layout container-fluid"
                                                id="widget-news-list">
                                                <div class="exclusive-digital-offer mt-4">
                                                    <div class="title-wrapper">
                                                        <h3 class="text-one ">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Favorites
                                                                </font>
                                                            </font>
                                                        </h3>
                                                        <a href="#" class="btn btn-default" target="_blank">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">offer details
                                                                </font>
                                                            </font>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                The "Favorites" section allows your business to
                                                                appear in the main navigation and in other strategic
                                                                locations. Highlighted by a photo and a description,
                                                                your service becomes essential. The Internet user
                                                                accesses the detailed file of your business via a
                                                                hyperlink.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">rate
                                                                            for 1 month</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            900.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">rate
                                                                            for 2 months</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            1,400.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">rate
                                                                            for 4 months</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            2,600.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title-wrapper">
                                                        <h3 class="text-one">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">TOP Native
                                                                    Performance: </font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Activity /
                                                                    News / Agenda</font>
                                                            </font>
                                                        </h3>
                                                        <a href="#"
                                                            class="btn btn-default" target="_blank">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">offer details
                                                                </font>
                                                            </font>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                Highlighted by a different color code and a “TOP”
                                                                pictogram, your content stands out from the others
                                                                in the news feed and benefits from priority
                                                                promotion in search results. As a bonus, qualitative
                                                                traffic acquisition campaigns (geography, behaviors,
                                                                interests, browsing history, etc.) are carried out,
                                                                these including 1 hook subject per campaign,
                                                                according to the predetermined promotion duration.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1
                                                                            month</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            2,600.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">2
                                                                            months</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            5,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title-wrapper">
                                                        <h3 class="text-one">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">PREMIUM
                                                                    Native Multicanal: </font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Activity /
                                                                    News / Sponsored Agenda</font>
                                                            </font>
                                                        </h3>
                                                        <a href="#"
                                                            class="btn btn-default" target="_blank">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">offer details
                                                                </font>
                                                            </font>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                Enhanced by a specific design and placed in
                                                                strategic locations on the homepage (sidebar block
                                                                and “Latest trends” section) and other pages of the
                                                                site, your sponsored content benefits from increased
                                                                visibility. If several service providers sponsor
                                                                content at the same time, a rotation is carried out
                                                                (max. 5 simultaneously). As a bonus, qualitative
                                                                traffic acquisition campaigns (geography, behaviors,
                                                                interests, browsing history, etc.) are carried out,
                                                                including a post shared on Facebook every two weeks,
                                                                according to the predetermined highlighting
                                                                duration.</font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">2
                                                                            weeks</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            2,600.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1
                                                                            month</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            5,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title-wrapper">
                                                        <h3 class="text-one">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">PREMIUM
                                                                    Native Multichannel: </font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Web
                                                                    advertorial</font>
                                                            </font>
                                                        </h3>
                                                        <a href="#"
                                                            class="btn btn-default" target="_blank">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">offer details
                                                                </font>
                                                            </font>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                The web advertorial guarantees visibility for 4
                                                                months on the site (the page written remains active
                                                                there). It is possible to integrate outgoing links
                                                                into the page (5 max.). A personalized URL is also
                                                                created. This is also highlighted in the sidebar
                                                                block and in the news section. If several service
                                                                providers sponsor content at the same time, a
                                                                rotation is carried out in the sidebar blocks and in
                                                                the news section (max. 4 simultaneously).
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Creation and </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            diffusion</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Editing and posting online</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            4,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Translation of </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            content</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Translation into FR or DE</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            1,500.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                In addition to this amount, there are the TOP Native
                                                                Performance or PREMIUM Native Multichannel promotion
                                                                packages (see prices above).
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="title-wrapper">
                                                        <h3 class="text-one">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Dedicated
                                                                    newsletter</font>
                                                            </font>
                                                        </h3>
                                                        <a href="#"
                                                            class="btn btn-default" target="_blank">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">offer details
                                                                </font>
                                                            </font>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                Perfect for promoting a destination or a regional
                                                                offer, the dedicated newsletter is targeted to a
                                                                file of qualified addresses. Personalized, the
                                                                newsletter is composed as follows: an incentive
                                                                editorial, as well as a selection of four activities
                                                                and four events, each enhanced by a visual, a
                                                                descriptive text and a URL redirecting to the
                                                                dedicated page on our platform.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Creation for loisirs.ch</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            6,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Creation for freizeit.ch</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            3,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title-wrapper">
                                                        <h3 class="text-one">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Facebook
                                                                    Posts</font>
                                                            </font>
                                                        </h3>
                                                        <a href="#"
                                                            class="btn btn-default" target="_blank">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">offer details
                                                                </font>
                                                            </font>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                Give yourself visibility with the Loisirs.ch and
                                                                Freizeit.ch communities. Nearly 127,000 fans react
                                                                in French-speaking Switzerland and 65,000 in
                                                                German-speaking Switzerland.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Option 1 </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1
                                                                            post, boost extra</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            500.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Option 2 </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1
                                                                            post, boost extra</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            800.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item no-content">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Option 3 </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1
                                                                            post, boost extra</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            1,200.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title-wrapper">
                                                        <h3 class="text-one">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Competition
                                                                    Offer</font>
                                                            </font>
                                                        </h3>
                                                        <a href="#"
                                                            class="btn btn-default" target="_blank">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">offer details
                                                                </font>
                                                            </font>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                The promotion and dissemination of contests offers
                                                                dynamic visibility at a low price to a qualitative
                                                                community. In addition to the sympathy factor,
                                                                contests allow you to acquire targeted contacts
                                                                (Opt-In leads) in order to build a qualified
                                                                database for your communication. They offer a fun
                                                                alternative to classic advertising campaigns.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Pack
                                                                        </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1
                                                                            platform</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            1,500.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Top
                                                                            pack </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            concours.ch</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            800.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item no-content">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Top
                                                                            pack + </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1
                                                                            platform</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            2,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title-wrapper">
                                                        <h3 class="text-one">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Videos</font>
                                                            </font>
                                                        </h3>
                                                        <a href="#"
                                                            class="btn btn-default" target="_blank">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">offer details
                                                                </font>
                                                            </font>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                Our YouTubers scour Switzerland, camera on their
                                                                shoulder to bring you the latest trends in leisure.
                                                                Between reports or humorous capsules, take advantage
                                                                of this turnkey offer to promote your product!
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Rates
                                                                            for </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            loisirs.ch</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            7,500.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            German subtitle supplement</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            3,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p><strong>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">The prices
                                                                    displayed are net, no additional discounts
                                                                    possible.</font>
                                                            </font>
                                                        </strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="printed_offer">
                                <div class="grid-items list-layout container-fluid" id="widget-news-list">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab"
                                                href="#standard_printed_offer" data-js="standard_printed_offer">
                                                For advertiser</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#exclusive_printed_offer"
                                                data-js="exclusive_printed_offer">For leisure provider</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane container active" id="standard_printed_offer">
                                            <div class="grid-items list-layout container-fluid"
                                                id="widget-news-list">
                                                <div class="standard-printed-offer mt-4">
                                                    <h3>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Summer &amp;
                                                                Winter Magazine | Formats and prices</font>
                                                        </font>
                                                    </h3>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">2/1
                                                                        </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            panoramic</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/2-1-panoramique.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            350 x 250 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            12,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/1
                                                                        </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">page
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/1-1-page.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            175 x 250 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            7,500.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">2x
                                                                            1/2 </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            panoramic page</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/2x1-2-page-panoramique.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            350 x 125 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            8,200.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;"></font>
                                                                    <br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/2
                                                                            horizontal </font>
                                                                        <font style="vertical-align: inherit;">page
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/1-2-page-horizontale.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            175 x 125 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            3,900.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/2
                                                                            page vertical</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/1-2-page-verticale.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            85 x 250 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            3,900.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/3
                                                                            horizontal page</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/1-3-page-horizontale.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            175 x 90 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            3,100.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/3
                                                                            vertical page</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/1-3-page-verticale.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            58 x 250 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            3,100.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/4
                                                                            page square</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/1-4-page-carre.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            85 x 125 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            2,200.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;"></font>
                                                                    <br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/4
                                                                            horizontal </font>
                                                                        <font style="vertical-align: inherit;">page
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="https://cdn.loisirs.ch/public/ads/1-4-page-horizontale-bas.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            175 x 60 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            2,200.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;"></font>
                                                                    <br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/4
                                                                            vertical </font>
                                                                        <font style="vertical-align: inherit;">page
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/1-4-page-verticale.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            45 x 250 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            2,200.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">2nd
                                                                        </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">cover
                                                                            page</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/2e-page-couv.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            175 x 250 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            9,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">3rd
                                                                        </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">cover
                                                                            page</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/3e-page-conv.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            175 x 250 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            9,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">4th
                                                                        </font>
                                                                    </font><br>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">cover
                                                                            page</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <img
                                                                        src="assets/home/imgs/dimensions/4e-page-couv.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            175 x 250 mm
                                                                        </font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            11,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                    </p>
                                                    <h3>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Inserts</font>
                                                        </font>
                                                    </h3>
                                                    <ul>
                                                        <li>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Possibility
                                                                    of inserting, card glued in the complete or
                                                                    partial print run</font>
                                                            </font>
                                                        </li>
                                                        <li>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Prices
                                                                    according to weight (max. 50 g), appearance and
                                                                    format of the insert (max. A5)</font>
                                                            </font>
                                                        </li>
                                                        <li>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Offer &amp;
                                                                    price on request</font>
                                                            </font>
                                                        </li>
                                                    </ul>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane container" id="exclusive_printed_offer">
                                            <div class="grid-items list-layout container-fluid"
                                                id="widget-news-list">
                                                <div class="exclusive-printed-offer mt-4">
                                                    <h3>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Advertorial Print
                                                            </font>
                                                        </font>
                                                    </h3>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                To define an editorial, informative and eye-catching
                                                                communication, we provide you with the experience of
                                                                professionals in order to construct a complete and
                                                                meaningful message.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                The price includes writing, layout and a proof. The
                                                                basic elements must be provided, as well as a high
                                                                definition photo*.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/1
                                                                            page</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div><img
                                                                        src="assets/home/imgs/dimensions/1-1-page.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">175 x
                                                                            250 mm</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            6,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/2
                                                                            horizontal page</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div><img
                                                                        src="assets/home/imgs/dimensions/1-2-page-horizontale.svg">
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">175 x
                                                                            125 mm</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            3,000.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Zoom -
                                                                Advertorial</font>
                                                        </font>
                                                    </h3>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                The “Zoom (advertorial)” format offers the
                                                                possibility of being highlighted in the “Leisure
                                                                Guide” section by a particular graphic presentation:
                                                                more space, photo, detailed editorial text and
                                                                direct link to your website.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                The price includes writing, layout and a proof. The
                                                                basic elements must be provided, as well as a high
                                                                definition photo*.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1/4
                                                                            horizontal page</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="img"><img
                                                                        src="assets/home/imgs/dimensions/1-4-page-horizontale-bas.svg">
                                                                </div>
                                                                <div class="details">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">151 x
                                                                            52 mm</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">1
                                                                            publication</font>
                                                                    </font>
                                                                </div>
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            1,200.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                            <div class="content-two">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">2
                                                                            publications</font>
                                                                    </font>
                                                                </div>
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            2,200.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Displays</font>
                                                        </font>
                                                    </h3>
                                                    <p>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                Space-saving displays containing copies of the
                                                                magazine are available for single-issue sale.
                                                            </font>
                                                        </font>
                                                    </p>
                                                    <div class="list-items">
                                                        <div class="item">
                                                            <div class="head">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            displays with copies</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Commercial value CHF 90.-</font>
                                                                    </font>
                                                                </div>
                                                                <div>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Recommended retail price for the
                                                                            magazine individually: CHF 6.–</font>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="content-two">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">CHF
                                                                            30.-</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p><strong>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">The prices
                                                                    displayed are net, no additional discounts
                                                                    possible.</font>
                                                            </font>
                                                        </strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="combined_offers">
                                <div class="grid-items list-layout container-fluid" id="widget-news-list">
                                    <div class="combined-offers">
                                        <div class="info">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    Advertising exclusively reserved for leisure providers
                                                </font>
                                            </font>
                                        </div>
                                        
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Pool Offer</font>
                                        </font>
                                        </h3>
                                        <p>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    This combination allows to reinforce the advertising impact
                                                    thanks to a
                                                    combined promotion:
                                                </font>
                                            </font><strong>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">mag + site</font>
                                                </font>
                                            </strong>
                                        </p>
                                        <div class="list-items">
                                            <div class="item">
                                                <div class="head">
                                                    <div>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Tariff 1</font>
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                1x Zoom (advertorial) in the Mag
                                                            </font>
                                                        </font>
                                                    </div>
                                                    <div>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                2 months of Favorites on the site
                                                            </font>
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="content-two">
                                                    <span>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">CHF 2,200.-
                                                            </font>
                                                        </font>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="head">
                                                    <div>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Tariff 2</font>
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                2x Zoom (advertorial) in the Mag
                                                            </font>
                                                        </font>
                                                    </div>
                                                    <div>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">
                                                                4 months of Favorites on the site
                                                            </font>
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="content-two">
                                                    <span>
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">CHF 4,000.-
                                                            </font>
                                                        </font>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">MAG: Zoom - Advertorial</font>
                                        </font>
                                        </h3>
                                        <p>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    The “Zoom (advertorial)” format offers the possibility of being
                                                    highlighted
                                                    in the “Leisure Guide” section by a particular graphic
                                                    presentation: more
                                                    space, photo, detailed editorial text and direct link to your
                                                    website.
                                                </font>
                                            </font>
                                        </p>
                                        <p>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    The price includes writing, layout and a proof. The basic
                                                    elements must be
                                                    provided, as well as a high definition photo*.
                                                </font>
                                            </font>
                                        </p>
                                        
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">SITE: Favorite</font>
                                        </font>
                                        </h3>
                                        <p>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    The "Favorites" section allows your activity to appear randomly
                                                    in a
                                                    strategic location on the homepage as well as in the "Our
                                                    selection" section
                                                    of the search result. Highlighted by a photo and a description,
                                                    your service
                                                    becomes essential. The Internet user accesses the detailed sheet
                                                    of your
                                                    activity via a hyperlink.
                                                </font>
                                            </font>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <aside class="col col-12 col-md-4 p-r-0">
                        <div class="widget-aside-pro visible" id="widget-lexique-pro">
                            <div class="title">
                                <h2 class="content-text">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Lexicon</font>
                                    </font>
                                </h2>
                            </div>
                            <div class="content">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Impression:</font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            Number of times the ad is displayed
                                        </font>
                                    </font>
                                </p>
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">CPM:</font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            Cost per 1000 impressions
                                        </font>
                                    </font>
                                </p>
                            </div>
                        </div>
                        <div class="widget-aside-pro visible" id="widget-technical-data">
                            <div class="title">
                                <h2 class="content-text">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Technical data</font>
                                    </font>
                                </h2>
                            </div>
                            <div class="content">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Image format:</font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            GIF, JPG, PNG, HTML5
                                        </font>
                                    </font>
                                </p>
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Delivery of equipment:</font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            5 working days before the start of broadcast, weight 40KB depending on
                                            format.
                                        </font>
                                    </font>
                                </p>
                            </div>
                        </div>
                        <div class="widget-aside-pro visible" id="widget-discount-policy">
                            <div class="title">
                                <h2 class="content-text">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Our discount policy</font>
                                    </font>
                                </h2>
                            </div>
                            <div class="content">
                                <p class="d-block">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            We build customer loyalty at GeneralMedia SA. That is why we have
                                            implemented
                                        </font>
                                    </font><strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">a discount policy</font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"> based on your visibility achieved on
                                        </font>
                                    </font><span class="text-primary"><a href="https://doctomed.ch/">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">doctomed.ch</font>
                                            </font>
                                        </a></span>
                                
                                </p>
                                
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Discount based on the amount ordered
                                    </font>
                                </font>
                                </h3>
                                <ul>
                                    <li>
                                        <span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">CHF 4,000.- ordered: </font>
                                            </font>
                                        </span>
                                        <span class="red">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">5% discount</font>
                                            </font>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">CHF 8,000.- ordered: </font>
                                            </font>
                                        </span>
                                        <span class="red">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">10% discount + 10% more
                                                    visibility</font>
                                            </font>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">CHF 12,000.- ordered: </font>
                                            </font>
                                        </span>
                                        <span class="red">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">15% discount + 20% more
                                                    visibility</font>
                                            </font>
                                        </span>
                                    </li>
                                </ul>
                                
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Cumulative visibility</font>
                                </font>
                                </h3>
                                <ul>
                                    <li>
                                        <span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Visibility on doctomed.ch
                                                    &amp;
                                                     </font>
                                            </font>
                                        </span>
                                        <span class="red">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">5% discount</font>
                                            </font>
                                        </span>
                                    </li>
                                </ul>
                                
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Commission</font>
                                </font>
                                </h3>
                                <ul>
                                    <li>
                                        <span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Agency Commission (CC):
                                                </font>
                                            </font>
                                        </span>
                                        <span class="red">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">5% discount</font>
                                            </font>
                                        </span>
                                    </li>
                                </ul>
                                
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Leisure provider</font>
                                </font>
                                </h3>
                                <ul>
                                    <li>
                                        <span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Traditional Advertising
                                                    Discount: </font>
                                            </font>
                                        </span>
                                        <span class="red">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">20% off</font>
                                            </font>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-aside-pro" id="widget-publication-plan">
                            <div class="title">
                                <h2 class="content-text">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Release plan</font>
                                    </font>
                                </h2>
                            </div>
                            <div class="content">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Draw:</font>
                                        </font>
                                    </strong>
                                    <span>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">30,000 copies per edition</font>
                                        </font>
                                    </span>
                                </p>
                                <p class="orange">
                                    <strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Summer 2020 Edition</font>
                                        </font>
                                    </strong>
                                </p>
                                <ul class="orange">
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Release: 05/27/2020</font>
                                        </font>
                                    </li>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Reservation: 04/14/2020</font>
                                        </font>
                                    </li>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Material: 04/21/2020</font>
                                        </font>
                                    </li>
                                </ul>
                                <p></p>
                                <p class="sky">
                                    <strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Winter Edition 2020-2021</font>
                                        </font>
                                    </strong>
                                </p>
                                <ul class="sky">
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Release: 02/12/2020</font>
                                        </font>
                                    </li>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Reservation: 10/23/2020</font>
                                        </font>
                                    </li>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Material: 10/30/2020</font>
                                        </font>
                                    </li>
                                </ul>
                                <p></p>
                            </div>
                        </div>
                        <div class="widget-aside-pro" id="widget-printed-offer-technical-data">
                            <div class="title">
                                <h2 class="content-text">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Technical data</font>
                                    </font>
                                </h2>
                            </div>
                            <div class="content">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Magazine format:</font>
                                        </font>
                                    </strong>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            175 x 250 mm (freeboard) (+ 3 mm overhang for trimming)
                                        </font>
                                    </font>
                                </p>
                                <ul>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Rotary offset printing</font>
                                        </font>
                                    </li>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Square back glued, laminated
                                                cover</font>
                                        </font>
                                    </li>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Resolution and color: 300dpi,
                                                four-color
                                            </font>
                                        </font>
                                    </li>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Maximum ink rate: 300%</font>
                                        </font>
                                    </li>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Color proof to be provided</font>
                                        </font>
                                    </li>
                                    <li>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Overhang: 3 mm, internal margin:
                                                5 mm</font>
                                        </font>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection


@section('scripts')



@endsection
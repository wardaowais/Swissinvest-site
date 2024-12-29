@extends('home.layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
    <!-- ======= Hero Section ======= -->
    <section class="banner" style="background-image:url('{{ asset($homeWebImages->first()->image) }}'); text-align:center;">
        <div class="container-fluid">
            <div class="row a-center">
                <div class="col">
                    <h1 class="mt-4 mt-ms-3 pb-1" style="max-width: 500px">{{translate (getPageContent('main_cover_title')) }}</h1>

                    <div class="owl-carousel owl-theme" id="banner-slider">
                        @foreach ($specialties as $speacility)
                        <div class="item">
                            <h1>{{translate($speacility->name)}}</h1>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="bform">
                <div class="tabs">
                    <ul>
                        <li><a href="#tabs-1"><span><i class="fa-solid fa-house me-1"></i></span> {{translate('on site')}}</a></li>
                        <li><a href="#tabs-2"><span><i class="fa-solid fa-earth-americas me-1"></i></span> {{translate('Remote')}} </a></li>
                        {{-- <li><a href="#tabs-3"><span><i class="fa-solid fa-earth-americas"></i></span> Institute</a></li> --}}
                    </ul>
                    <div id="tabs-1">
                        <form action="{{ route('search.users') }}" method="GET">
                            <ul>
                                <li>
                                    <div class="search-container">
                                        <input type="text" class="search-input search-input-2" placeholder="{{translate (getPageContent('search_lebel1')) }}" required>
                                        <div class="dropdownn dropdownn-2">
                                            <input type="hidden" name="specialty" id="specialtyId">
                                            @foreach($specialties as $specialty)
                                            <div class="suggestion" data-att="{{encrypt($specialty->id)}}">{{ translate($specialty->name)}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="search-container2">
                                        <input type="text" class="search-input search-input-3" placeholder="{{translate (getPageContent('search_lebel2')) }}" required>
                                        <div class="dropdown dropdown-3">
                                            <input type="hidden" id="locationId" name="city">
                                            @foreach ($locations as $city)
                                            <div class="option" data-att="{{encrypt($city->id)}}">{{ translate($city->name) }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div id="tabs-2">
                        <form action="{{ route('search.users') }}" method="GET">
                            <ul>
                                <li>
                                    <div class="search-container">
                                        <input type="text" class="search-input search-input-7" placeholder="{{translate (getPageContent('search_lebel1')) }}" required>
                                        <div class="dropdownn dropdownn-7">
                                            <input type="hidden" name="specialty" id="remotespecialtyId">
                                            @foreach($specialties as $specialty)
                                            <div class="suggestion" data-att="{{encrypt($specialty->id)}}">{{ translate($specialty->name)}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="search-container2">
                                        <input type="text" class="search-input search-input-8" placeholder="{{translate (getPageContent('search_lebel2')) }}" required>
                                        <div class="dropdown dropdown-8">
                                            <input type="hidden" id="remotelocationId" name="city">
                                            @foreach ($locations as $city)
                                            <div class="option" data-att="{{encrypt($city->id)}}">{{ translate($city->name) }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <!-- Hidden field to indicate remote service type -->
                                    <input type="hidden" name="service_type" value="remote">
                                    <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </li>
                            </ul>
                        </form>
                    </div>
                    {{-- <div id="tabs-3">
                        <form action="{{ route('search.institutes') }}" method="GET">
                    <ul>
                        <li>
                            <p>{{ translate(getPageContent('search_label1')) }}</p>
                            <div class="search-container">
                                <input type="text" name="institutes" class="search-input search-input-11" placeholder="{{ translate(getPageContent('placeholder_search')) }}...">
                            </div>
                        </li>
                        <li>
                            <p>{{ translate(getPageContent('search_label2')) }}</p>
                            <div class="search-container2">
                                <input type="text" class="search-input search-input-12" placeholder="{{ translate(getPageContent('placeholder_search')) }}...">
                                <div class="dropdown dropdown-12">
                                    <input type="hidden" id="institutelocationId" name="city">
                                    @foreach ($locations as $city)
                                    <div class="option" data-att="{{ $city->id }}">{{ translate($city->name) }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li>
                            <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </li>
                    </ul>
                    </form>

                </div> --}}

            </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <section class="appoinment_widget pb-3 has-pills">
            <div class="container">
                <div class="">
                    <!-- content -->
                    <div class="main-ttl ">
                        <h1 class="top-right-line">Have you already considered</h1><br>
                        <h1 class="has-arrow head-success">Video consultations ?</h1>
                        <p>Equip yourself with the Doctomed Directory to make your work more comfortable.</p>
                    </div>
                    <div class="row my-pad2 justify-content-center">
                        <div class="col-lg-4 col-md-6 mb-3 text-center">
                            <div class="d-flex justify-content-center">
                                <div class="ico-two-font">
                                    <div class="in-icon"><span>1</span></div>
                                </div>
                            </div>
                            <p>Book an appointment with just a few clicks on allomed.ch or on our Website.</p>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3 text-center">
                            <div class="d-flex justify-content-center">
                                <div class="ico-two-font">
                                    <div class="in-icon"><span>2</span></div>
                                </div>
                            </div>
                            <p>Consult with your practitioner while reducing your travel and waiting times.</p>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3 text-center">
                            <div class="d-flex justify-content-center">
                                <div class="ico-two-font">
                                    <div class="in-icon"><span>3</span></div>
                                </div>
                            </div>
                            <p>Be reimbursed by your basic insurance, as a physical consultation.</p>
                        </div>
                    </div>
                    <div class="text-center manage-two-btn">
                        <a class="btn sec-btn btn-primary" href="https://allomed.ch/">Book an appointment with expert</a>
                        <a class="btn sec-btn btn-outline-primary" href="https://allomed.ch/how-it-works/">More information about allomed.ch</a>
                    </div>                    
                </div>
            </div>
        </section>
        <section class="appoinment_widget has-indic">
            <div class="has-injec">
                <div class="container">
                    <div class="">
                        <div class="sec-services">
                        <!-- content -->
                            <div class="main-ttl ">
                                <h1 class="top-left-line"> Services</h1>
                                <p>Konsultationen per Telefon oder Videokonferenz 24/24-365 Tage</p>
                            </div>
                            <div class="row top-pad-4">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="docs-service" style="background-image: url('{{ asset('assets/home/imgs/updated/service1.png') }}')">
                                        <div class="service-content">
                                            <h6>{{translate (getPageContent('small_card1_title')) }}</h6>
                                            <p class="mb-0">{{translate (getPageContent('small_card1_description')) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="docs-service" style="background-image: url('{{ asset('assets/home/imgs/updated/service2.png') }}')">
                                        <div class="service-content">
                                            <h6>{{translate (getPageContent('small_card2_title')) }}</h6>
                                            <p class="mb-0">{{translate (getPageContent('small_card2_description')) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="docs-service" style="background-image: url('{{ asset('assets/home/imgs/updated/service3.png') }}')">
                                        <div class="service-content">
                                            <h6>{{translate (getPageContent('small_card3_title')) }}</h6>
                                            <p class="mb-0">{{translate (getPageContent('small_card3_description')) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="docs-service" style="background-image: url('{{ asset('assets/home/imgs/updated/service4.png') }}')">
                                        <div class="service-content">
                                            <h6>{{translate (getPageContent('small_card4_title')) }}</h6>
                                            <p class="mb-0">{{translate (getPageContent('small_card4_description')) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="docs-service" style="background-image: url('{{ asset('assets/home/imgs/updated/service5.png') }}')">
                                        <div class="service-content">
                                            <h6>{{translate (getPageContent('small_card5_title')) }}</h6>
                                            <p class="mb-0">{{translate (getPageContent('small_card5_description')) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="docs-service" style="background-image: url('{{ asset('assets/home/imgs/updated/service6.png') }}')">
                                        <div class="service-content">
                                            <h6>{{translate (getPageContent('small_card6_title')) }}</h6>
                                            <p class="mb-0">{{translate (getPageContent('small_card6_description')) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a class="btn sec-btn btn-primary me-2" href="https://allomed.ch/">Book an appointment</a>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="directory my-swiss" style="overflow: unset;">
            <div class="container has-bottom-arrow">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="main-ttl main-ttl-44 text-left">
                            <h1 class="top-right-line">You are a Swiss</h1>
                            <h2 class="same-h1">healthcare professional ?</h2>
                            <h1 class="head-success">Join us for free !</h1>
                            <a class="btn sec-btn btn-primary mt-4" href="#">Job offers</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <div class="text-center">
                                <img src="{{ asset('assets/home/imgs/Frame.png') }}" class="has-three" alt="">
                            </div>
                            <div class="box box1">
                                <h4>{{translate (getPageContent('center_image_left_bottom')) }}</h4>
                                <p>{{translate (getPageContent('center_image_left_bottom_desc')) }}</p>
                            </div>
                            <div class="box box2">
                                <h4>{{translate (getPageContent('center_image_right_top')) }}</h4>
                                <p>{{translate (getPageContent('center_image_right_top_description')) }}</p>
                            </div>
                            <div class="box box3">
                                <h4>{{translate (getPageContent('center_image_left_right')) }}</h4>
                                <p>{{translate (getPageContent('center_image_left_bottom_description')) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="directory top-pad1">
            <div class="container">
                <div class="main-ttl ">
                    <h1 class="top-right-line"> <span class="head-success">Are you a health professional?</span></h1>
                    <p>{{translate (getPageContent('health_professional_bottom')) }}</p>
                </div>
                <div class="doc-circle mt-5">
                    <span class="spark-left"><img src="{{ asset('assets/home/imgs/updated/spark-left.png') }}"></span>
                    <span class="spark-right"><img src="{{ asset('assets/home/imgs/updated/spark-right.png') }}"></span>
                    <img src="{{ asset('assets/home/imgs/updated/doc-circle.png') }}">
                    <div>
                        <div class="dc-item item-1">{{translate (getPageContent('health_professional_text1')) }}</div>
                        <div class="dc-item item-2">{{translate (getPageContent('health_professional_text2')) }}</div>
                        <div class="dc-item item-3">{{translate (getPageContent('health_professional_text3')) }}</div>
                        <div class="dc-item item-4">{{translate (getPageContent('health_professional_text4')) }}</div>
                        <div class="dc-item item-5">{{translate (getPageContent('health_professional_text5')) }}</div>
                        <div class="dc-item item-6">{{translate (getPageContent('health_professional_text6')) }}</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="dapp" style="overflow: unset;">
            <div class="container">
                <div class="discover-app">
                    <div class="lftrt">
                        <div class="absolute-img"><img src="{{ asset('assets/home/imgs/updated/ab-docs.png') }}"></div>
                        <div class="rtdit">
                            <img src="https://panel.allomed.ch/frontend/images/logo.png" width="238">
                            <h4>{{translate (getPageContent('discover_app_header')) }}</h4>
                            <p>{{translate (getPageContent('discover_app_text')) }}</p>
                            <div class="text-end-lg"><a href="{{getPageContent('download_app_googlePlay_url')}}"><img src="{{ asset('assets/home/imgs/updated/g-play.png') }}"></a><a href="{{getPageContent('download_app_apple_url')}}"><img src="{{ asset('assets/home/imgs/updated/a-store.png') }}"></a></div>
                            <button class="btn sec-btn btn-primary mt-4">Download Here</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonial has-thermo">
            <div class="container has-arrow3">
                <div class="">
                    <!-- content -->
                    <div class="main-ttl ">
                        <h1 class="top-right-line head-success">Patient Testimonials:</h1><br>
                        <h1 class="text-dark-title">Hear from Those We’ve Cared For</h1>
                        <p>Discover the difference we make through the voices of those we’ve served:</p>
                    </div>

                    <div class="row gx-cus1 has-left-circle cus-pad1">
                        <div class="col-md-6">
                            <div class="tm-card">
                                <div class="tm-inner">
                                    <div class="tm-content">
                                        <div class="tm-img"><img src="{{ asset('assets/home/imgs/updated/user1.png') }}"></div>
                                        <div class="tm-desc">
                                            <p class="mb-1">{{translate (getPageContent('testimonial1')) }}</p>
                                            <h6 class="mb-0 fw-medium">{{translate (getPageContent('testimonial1_patient_name')) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tm-card">
                                <div class="tm-inner">
                                    <div class="tm-content">
                                        <div class="tm-img"><img src="{{ asset('assets/home/imgs/updated/user2.png') }}"></div>
                                        <div class="tm-desc">
                                            <p class="mb-1">{{translate (getPageContent('testimonial2')) }}</p>
                                            <h6 class="mb-0">{{translate (getPageContent('testimonial2_patient_name')) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row cus-pad2">
                        <div class="col-lg-3 col-md-6">
                            <div class="tm-stats">
                                <h1>200+</h1>
                                <p class="mb-0">Successful Consultations</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="tm-stats">
                                <h1>70+</h1>
                                <p class="mb-0">Healthcare Professionals</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="tm-stats">
                                <h1>98%</h1>
                                <p class="mb-0">Patient Satisfaction Rate</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="tm-stats">
                                <h1>52+</h1>
                                <p class="mb-0">Top Specialists</p>
                            </div>
                        </div>
                    </div>

                    <div class="row gx-cus1 has-right-circle cus-pad3">
                        <div class="col-md-6">
                            <div class="tm-card">
                                <div class="tm-inner">
                                    <div class="tm-content">
                                        <div class="tm-img"><img src="{{ asset('assets/home/imgs/updated/user3.png') }}"></div>
                                        <div class="tm-desc">
                                            <p class="mb-1">{{translate (getPageContent('testimonial3')) }}</p>
                                            <h6 class="mb-0 fw-medium">{{translate (getPageContent('testimonial3_patient_name')) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tm-card">
                                <div class="tm-inner">
                                    <div class="tm-content">
                                        <div class="tm-img"><img src="{{ asset('assets/home/imgs/updated/user4.png') }}"></div>
                                        <div class="tm-desc">
                                            <p class="mb-1">{{translate (getPageContent('testimonial4')) }}</p>
                                            <h6 class="mb-0">{{translate (getPageContent('testimonial4_patient_name')) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <a class="btn sec-btn btn-primary me-2" href="https://allomed.ch/">Get in touch</a>
                    </div>                    
                </div>
            </div>
        </section>

        <!-- <section class="get-in-touch">
            <div class="container">
                <h5 class="headline text-left">
                    <span>Get in touch</span> Let’s Work together!
                </h5>
                <form action="#">
                    <div class="row gx-5">
                        <div class="col-md-6">
                            <div class="content">
                                <span><i class="fa-solid fa-user"></i></span>
                                <input type="text" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <span><i class="fa-regular fa-envelope-open"></i></span>
                                <input type="email" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <span><i class="fa-solid fa-building"></i></span>
                                <input type="text" placeholder="Company/Organization">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <span><i class="fa-solid fa-mobile"></i></span>
                                <input type="text" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="content">
                                <span><i class="fa-solid fa-location-dot"></i></span>
                                <input type="text" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </form>
            </div>
        </section> -->

        <!-- ======= Testimonials Section ======= -->
        
        <!-- End Testimonials Section -->
    </main>
    <!-- End #main -->

    @endsection

    @section('scripts')
    <script>
        $('#banner-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            items: 1,
            animateOut: 'slideOutUp',
            animateIn: 'slideInUp'
        });
    </script>
    <script src="{{ asset('assets/home/js/custom.js') }}"></script>
    @endsection


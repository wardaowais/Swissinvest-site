@extends('layouts.app')

@section('content')

<section class="section  sync_sec">
    <div class="row">
        <div class="col-lg-3">

            <div class="card">
                <div class="card-body profile-card pt-4 ">

                    <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->



                    <h6 class="fw-bold">Connect/ Sync</h6>
                    <!-- <p>Phase 3B-2, Sector 60, Sahibzada Ajit Singh Nagar, Punjab, India, </p> -->

                    <!-- <button type="submit" class="btn btn-primary w-100 book_app ">Book Appointment</button> -->

                    <div class="mt-4">
                        <a href="#">
                            <div class="d-flex justify-content-between mb-3 ">
                                <div class="health_category">
                                    <span class="ps-2 fw-bold text-black red">{{translate('Partners List')}}</span>
                                </div>


                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                        <path d="M15.7208 14.3534L16.0744 13.9999L15.7208 13.6463L10.2994 8.22486L11.242 7.2823L17.9595 13.9999L11.242 20.7174L10.2994 19.7749L15.7208 14.3534Z" fill="#6B7A84" stroke="#6B7A84"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>


                        <h6 class="fw-bold mb-3">{{translate('Connected Partners')}}</h6>

                        <a href="">
                            <div class="d-flex justify-content-between mb-3 ">
                                <div class="health_category">
                                    <span class="ps-2 fw-bold ">{{translate('All Med-ch')}}</span>
                                </div>

                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                        <path d="M15.7208 14.3534L16.0744 13.9999L15.7208 13.6463L10.2994 8.22486L11.242 7.2823L17.9595 13.9999L11.242 20.7174L10.2994 19.7749L15.7208 14.3534Z" fill="#6B7A84" stroke="#6B7A84"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <hr>

                        <a href="">
                            <div class="d-flex justify-content-between mb-3 ">
                                <div class="health_category">
                                    <span class="ps-2 fw-bold text-dark">Alpha Network</span>
                                </div>

                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                        <path d="M15.7208 14.3534L16.0744 13.9999L15.7208 13.6463L10.2994 8.22486L11.242 7.2823L17.9595 13.9999L11.242 20.7174L10.2994 19.7749L15.7208 14.3534Z" fill="#6B7A84" stroke="#6B7A84"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <hr>

                        <a href="">
                            <div class="d-flex justify-content-between mb-3 ">
                                <div class="health_category">
                                    <span class="ps-2 fw-bold text-dark">polso</span>
                                </div>

                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                        <path d="M15.7208 14.3534L16.0744 13.9999L15.7208 13.6463L10.2994 8.22486L11.242 7.2823L17.9595 13.9999L11.242 20.7174L10.2994 19.7749L15.7208 14.3534Z" fill="#6B7A84" stroke="#6B7A84"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <hr>


                    </div>




                </div>
            </div>

        </div>
        <!-- Left side columns -->
        <div class="col-lg-9">
            <div class="row">

                <div class="green_banner">
                    <img src="assets/img/greenbanner.png" alt="banner" class="img-fluid mb-3">
                </div>

                <!-- Data Available -->
                <div class="col-12 mb-2 ">
                    <div class="card  p-3">
                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <img src="assets/img/logo_.png" class="card-img-top" alt="...">
                                </div>

                                <div>
                                    <div class="Save_btn">
                                        <button type="submit" class="btn text-white">Disconnect</button>
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-title fw-bold">About Me </h5>

                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>

                            <h5 class="card-title fw-bold">Features</h5>

                            <div class="cancle_sec me-3 ">
                                <h6 class="text-uppercase">Doctor Connect </h6>
                            </div>
                            <div class="cancle_sec me-3 ">
                                <h6 class="text-uppercase">bookings </h6>
                            </div>


                        </div>



                    </div>


                </div>
                <!-- End Top Selling -->

                <!-- Data Available -->
                <div class="col-12 mb-3 ">
                    <div class="card p-3">
                        <div class="card-body pb-0">

                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-sm-5">
                                    <img src="assets/img/map.png" alt="map" class="img-fluid w-100">
                                </div>
                                <div class="col-sm-7">
                                    <div class="map_text">
                                        <h5 class="fw-bold">Headquarter Location</h5>
                                        <p class="mb-0">Médicentre Balexert - Centre commercial de Balexert</p>
                                        <p class="mb-0">Avenue Louis-Casaï 27</p>
                                        <p class="mb-0">1209 Geneva</p>
                                        <button type="button" class="btn btn-primary">View on Google Map</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- End Top Selling -->


                <div class="col-12">
                    <div class="card p-3">
                    <h5 class="card-title fw-bold">FAQ</h5>
                        <div class="card-body pb-0">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       <h6 class="fw-bold"> Why use AlloMed?</h6>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                       <h6 class="fw-bold"> What languages does Dr. Florence Leuba speak?</h6>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <h6 class="fw-bold"> What languages does Dr. Florence Leuba speak?</h6>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Left side columns -->


    </div>
</section>



@endsection


@extends('layouts.app')

@section('content')
<style>
    body {
    background-color: #f8f8f8;
  }
  .copun-stroes-heading h1 {
    font-size: 32px;
    font-weight: 600;
  }
  .Stores-card {
    background-color: #e8f1f5;
    border-radius: 10px;
  }
  
  .Stores-card img {
    max-width: 160px;
  }
  .Stores-card h5 {
    font-size: 20px;
    color: #333333;
  }
  .five-star i {
    color: #ffff00;
    font-size: 17px;
  }
  .Stores-card p {
    font-size: 16px;
  }
  
  .stores-more-btn {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .stores-more-btn button {
    background-color: #e50f25 !important;
  }
  .custom-dropdown-btn {
    background-color: #fff; /* Light background color */
    color: #007bff; /* Bootstrap primary color for text */
    border-radius: 20px; /* Rounded edges */
    border: none;
    padding: 8px 16px;
    font-weight: 500;
  }
  
  .custom-dropdown-btn .fa {
    margin-left: 8px;
  }
  
  .custom-dropdown-btn:focus {
    box-shadow: none;
  }
  
  /* Remove Bootstrap default caret */
  .custom-dropdown-btn::after {
    display: none;
  }
  
  .dropdown-menu {
    border-radius: 8px; /* Soft rounded edges for the dropdown */
  }
  
  .custom-offer-card {
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow for card */
    border: none;
  }
  
  .badge-secondary {
    font-size: 12px;
    background-color: #eef3fc; /* Light blue background */
    color: #0a387a; /* Slightly darker text */
    border-radius: 50px;
    font-weight: 400;
  }
  
  .offer-details h6 {
    font-size: 20px;
    color: #333;
  }
  
  .text-muted .fa {
    font-size: 10px; /* Small icons */
    vertical-align: middle;
  }
  .docotomed-badge-container {
    border-right: 1px solid #eeeeee;
    height: 100%;
  }
  .docotomed-badge-container p {
    font-size: 33px;
    color: #333;
    text-transform: uppercase;
    font-weight: 600;
  }
  
  .docotomed-sales-btn button {
    width: 172px;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 700;
  }
  .page_feature_coupon {
    max-width: 1115px;
    margin: 0 auto;
    width: 100%;
  }
  .verify i {
    font-size: 14px !important;
  }
  
  .custom-info-card {
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow for card */
  }
  
  .custom-card-header {
    border-top-left-radius: 8px; /* Match card corner radius */
    border-top-right-radius: 8px; /* Match card corner radius */
    padding: 8px 16px;
  }
  
  .card-title {
    font-size: 16px; /* Heading font size */
    font-weight: bold;
    margin: 0;
  }
  
  .custom-card-body {
    background-color: #ffffff; /* Body background color */
    border-bottom-left-radius: 8px; /* Match card corner radius */
    border-bottom-right-radius: 8px; /* Match card corner radius */
  }
  
  .card-text {
    font-size: 12px; /* Text font size */
  }
  
  .star-rating .fa {
    font-size: 18px; /* Size of the stars */
  }
/*   
  .card-body{
    display: flex;
    flex-wrap: wrap;

  } */
   @media screen and (max-width: 578px) {
    .card-body{
        flex-wrap: wrap;
        display: flex;
        justify-content: center;
    }
    .offer-details{
        text-align: center;
    }
    .Stores-card {
        background-color: #e8f1f5;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
   }
}
</style>
<div class="container-fluid muko_cont">
    <div class="outer-contain-search">
      <div class="heading-contain">
        <div class="page-feature page_feature_coupon">
          <span class="feature-text">Page Feature:</span>
          <span>Members can link their profile to other applications like
            Allomed (telemedicine) with a single click. All
            relevant...</span>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
<section id="copun-Stores">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="copun-stroes-heading my-4">
                    <h1>Stores with the Best Deals, Coupons & Promo Codes</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-3 mt-3 Stores-card">
                    <img src="{{asset('assets/img/amazone.png')}}" class="img-fluid" alt="">
                    <h5 class="mt-4"><strong>Amazon</strong></h5>
                    <h5 class="mt-3">16 Coupons</h5>
                    <div class="five-star py-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>4.3 Based on Ratings</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-3 mt-3 Stores-card">
                    <img src="{{asset('assets/img/amazone.png')}}" class="img-fluid" alt="">
                    <h5 class="mt-4"><strong>Amazon</strong></h5>
                    <h5 class="mt-3">16 Coupons</h5>
                    <div class="five-star py-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>4.3 Based on Ratings</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-3 mt-3 Stores-card">
                    <img src="{{asset('assets/img/amazone.png')}}" class="img-fluid" alt="">
                    <h5 class="mt-4"><strong>Amazon</strong></h5>
                    <h5 class="mt-3">16 Coupons</h5>
                    <div class="five-star py-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>4.3 Based on Ratings</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-3 mt-3 Stores-card">
                    <img src="{{asset('assets/img/amazone.png')}}" class="img-fluid" alt="">
                    <h5 class="mt-4"><strong>Amazon</strong></h5>
                    <h5 class="mt-3">16 Coupons</h5>
                    <div class="five-star py-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>4.3 Based on Ratings</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-3 mt-3 Stores-card">
                    <img src="{{asset('assets/img/amazone.png')}}" class="img-fluid" alt="">
                    <h5 class="mt-4"><strong>Amazon</strong></h5>
                    <h5 class="mt-3">16 Coupons</h5>
                    <div class="five-star py-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>4.3 Based on Ratings</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-3 mt-3 Stores-card">
                    <img src="{{asset('assets/img/amazone.png')}}" class="img-fluid" alt="">
                    <h5 class="mt-4"><strong>Amazon</strong></h5>
                    <h5 class="mt-3">16 Coupons</h5>
                    <div class="five-star py-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>4.3 Based on Ratings</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-3 mt-3 Stores-card">
                    <img src="{{asset('assets/img/amazone.png')}}" class="img-fluid" alt="">
                    <h5 class="mt-4"><strong>Amazon</strong></h5>
                    <h5 class="mt-3">16 Coupons</h5>
                    <div class="five-star py-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>4.3 Based on Ratings</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="p-3 mt-3 Stores-card">
                    <img src="{{asset('assets/img/amazone.png')}}" class="img-fluid" alt="">
                    <h5 class="mt-4"><strong>Amazon</strong></h5>
                    <h5 class="mt-3">16 Coupons</h5>
                    <div class="five-star py-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>4.3 Based on Ratings</p>
                </div>
            </div>
        </div>
        <div class="row"></div>
        <div class="col-12">
            <div class="stores-more-btn my-4">
                <button class="btn btn-danger">More</button>
            </div>
        </div>
    </div>
    </div>
</section>
<section id="Docotomed-copun" class="pt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="copun-stroes-heading my-4">
                    <h1>Docotomed Coupon Codes for November , 2024</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <div class="Docotomed-dropdowns d-flex">
                    <div class="dropdown mr-5">
                        <button class="btn custom-dropdown-btn" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter: Sales & Discounts <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Option 1</a>
                            <a class="dropdown-item" href="#">Option 2</a>
                            <a class="dropdown-item" href="#">Option 3</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn custom-dropdown-btn" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort: Newest Offers <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Option 1</a>
                            <a class="dropdown-item" href="#">Option 2</a>
                            <a class="dropdown-item" href="#">Option 3</a>
                        </div>
                    </div>
                </div>

                <div class="Docotomed-copun-sales py-4">
                    <div class="card custom-offer-card mt-4">
                        <div class="card-body p-0 d-flex align-items-center">
                            <!-- SALE Tag -->
                            <div class="text-center  docotomed-badge-container py-4 px-3">
                                <p class="mb-0">Sale</p>
                                <div class="badge badge-secondary p-2 px-3">SALE</div>
                            </div>

                            <!-- Offer Details -->
                            <div class="offer-details flex-grow-1 px-3 py-4">
                                <h6 class="font-weight-bold mb-1">Teacher Discount - Get docotomed Premium for Only
                                    $2.99/mo for 12 Months</h6>
                                <div class="text-muted small mt-3 verify">
                                    <span class="text-success mr-2"><i class="fa fa-check-circle"></i> Verified 3
                                        Days Ago</span>
                                    <span class="mr-2"><i class="fa fa-info-circle"></i> 14 Used Today</span>
                                </div>
                            </div>

                            <!-- Get Offer Button -->
                            <div class="docotomed-sales-btn py-4 px-3">
                                <button class="btn btn-primary">Get Offer</button>
                            </div>
                        </div>
                    </div>
                    <div class="card custom-offer-card mt-4">
                        <div class="card-body p-0 d-flex align-items-center">
                            <!-- SALE Tag -->
                            <div class="text-center  docotomed-badge-container py-4 px-3">
                                <p class="mb-0">Sale</p>
                                <div class="badge badge-secondary p-2 px-3">SALE</div>
                            </div>

                            <!-- Offer Details -->
                            <div class="offer-details flex-grow-1 px-3 py-4">
                                <h6 class="font-weight-bold mb-1">Student Discount: Get 1 Year of
                                    checkup Premium For Only $1.99/mo</h6>
                                <div class="text-muted small mt-3 verify">
                                    <span class="text-success mr-2"><i class="fa fa-check-circle"></i> Verified 3
                                        Days Ago</span>
                                    <span class="mr-2"><i class="fa fa-info-circle"></i> 14 Used Today</span>
                                </div>
                            </div>

                            <!-- Get Offer Button -->
                            <div class="docotomed-sales-btn py-4 px-3">
                                <button class="btn btn-primary">Get Offer</button>
                            </div>
                        </div>
                    </div>
                    <div class="card custom-offer-card mt-4">
                        <div class="card-body p-0 d-flex align-items-center">
                            <!-- SALE Tag -->
                            <div class="text-center  docotomed-badge-container py-4 px-3">
                                <p class="mb-0">Sale</p>
                                <div class="badge badge-secondary p-2 px-3">SALE</div>
                            </div>

                            <!-- Offer Details -->
                            <div class="offer-details flex-grow-1 px-3 py-4">
                                <h6 class="font-weight-bold mb-1">Get Peacock Premium Plus For $11.99 a
                                    Month</h6>
                                <div class="text-muted small mt-3 verify">
                                    <span class="text-success mr-2"><i class="fa fa-check-circle"></i> Verified 3
                                        Days Ago</span>
                                    <span class="mr-2"><i class="fa fa-info-circle"></i> 14 Used Today</span>
                                </div>
                            </div>

                            <!-- Get Offer Button -->
                            <div class="docotomed-sales-btn py-4 px-3">
                                <button class="btn btn-primary">Get Offer</button>
                            </div>
                        </div>
                    </div>
                    <div class="card custom-offer-card mt-4">
                        <div class="card-body p-0 d-flex align-items-center">
                            <!-- SALE Tag -->
                            <div class="text-center  docotomed-badge-container py-4 px-3">
                                <p class="mb-0">Sale</p>
                                <div class="badge badge-secondary p-2 px-3">SALE</div>
                            </div>

                            <!-- Offer Details -->
                            <div class="offer-details flex-grow-1 px-3 py-4">
                                <h6 class="font-weight-bold mb-1">Sign Up For Telemedicine - Now
                                    Only $5.99 a Month</h6>
                                <div class="text-muted small mt-3 verify">
                                    <span class="text-success mr-2"><i class="fa fa-check-circle"></i> Verified 3
                                        Days Ago</span>
                                    <span class="mr-2"><i class="fa fa-info-circle"></i> 14 Used Today</span>
                                </div>
                            </div>

                            <!-- Get Offer Button -->
                            <div class="docotomed-sales-btn py-4 px-3">
                                <button class="btn btn-primary">Get Offer</button>
                            </div>
                        </div>
                    </div>
                    <div class="card custom-offer-card mt-4">
                        <div class="card-body p-0 d-flex align-items-center">
                            <!-- SALE Tag -->
                            <div class="text-center  docotomed-badge-container py-4 px-3">
                                <p class="mb-0">Sale</p>
                                <div class="badge badge-secondary p-2 px-3">SALE</div>
                            </div>

                            <!-- Offer Details -->
                            <div class="offer-details flex-grow-1 px-3 py-4">
                                <h6 class="font-weight-bold mb-1">Health Tips <br>
                                    for November 2024</h6>
                                <div class="text-muted small mt-3 verify">
                                    <span class="text-success mr-2"><i class="fa fa-check-circle"></i> Verified 3
                                        Days Ago</span>
                                    <span class="mr-2"><i class="fa fa-info-circle"></i> 14 Used Today</span>
                                </div>
                            </div>

                            <!-- Get Offer Button -->
                            <div class="docotomed-sales-btn py-4 px-3">
                                <button class="btn btn-primary">Get Offer</button>
                            </div>
                        </div>
                    </div>
                    <div class="card custom-offer-card mt-4">
                        <div class="card-body p-0 d-flex align-items-center">
                            <!-- SALE Tag -->
                            <div class="text-center  docotomed-badge-container py-4 px-3">
                                <p class="mb-0">Sale</p>
                                <div class="badge badge-secondary p-2 px-3">SALE</div>
                            </div>

                            <!-- Offer Details -->
                            <div class="offer-details flex-grow-1 px-3 py-4">
                                <h6 class="font-weight-bold mb-1">Get 4 months of Medicine for $4.99/mo</h6>
                                <div class="text-muted small mt-3 verify">
                                    <span class="text-success mr-2"><i class="fa fa-check-circle"></i> Verified 3
                                        Days Ago</span>
                                    <span class="mr-2"><i class="fa fa-info-circle"></i> 14 Used Today</span>
                                </div>
                            </div>

                            <!-- Get Offer Button -->
                            <div class="docotomed-sales-btn py-4 px-3">
                                <button class="btn btn-primary">Get Offer</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card custom-info-card">
                    <!-- Header with background color -->
                    <div class="card-header custom-card-header py-3">
                        <h6 class="card-title mb-0">Docotomed Clinic</h6>
                    </div>
                    <!-- Body with different background color -->
                    <div class="card-body custom-card-body">
                        <p class="card-text my-2">Patients Today: <span class="font-weight-bold">2526</span></p>
                        <p class="card-text my-2">Total Offers: <span class="font-weight-bold">6</span></p>
                        <p class="card-text my-2">Coupon Codes: <span class="font-weight-bold">0</span></p>
                        <hr>
                        <p class="font-weight-bold card-text mb-1">User Ratings:</p>
                        <!-- Star Rating -->
                        <div class="d-flex align-items-center">
                            <div class="star-rating mr-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                            </div>
                            <span class="font-weight-bold card-text">3.4</span>
                        </div>
                        <p class="small text-muted">71 Ratings (Click stars to rate)</p>
                    </div>
                </div>
                <div class="card custom-info-card mt-3">
                    <!-- Header with background color -->
                    <div class="card-header custom-card-header py-3">
                        <h6 class="card-title mb-0">FAQs About Docotomed</h6>
                    </div>
                    <!-- Body with different background color -->
                    <div class="card-body custom-card-body">
                        <p class="card-text my-2"><strong>What devices can I use to Docotomed?</strong></p>

                        <p class="card-text my-2">is simply dummy text of the printing and typesetting industry.
                            Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic</p>

                        <p class="card-text my-2"><strong>What content is available on docotomed TV?</strong></p>

                        <p class="card-text my-2">is simply dummy text of the printing and typesetting industry.
                            Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic</p>

                        <p class="card-text my-2"><strong>Can I download content on docotomed offline?</strong></p>

                        <p class="card-text my-2">is simply dummy text of the printing and typesetting industry.
                            Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic</p>

                        <p class="card-text my-2"><strong>Can I cancel my Docotomed subscription at any
                                time?</strong>
                        </p>

                        <p class="card-text my-2">is simply dummy text of the printing and typesetting industry.
                            Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="health_bottom_img mb-3" style="display: flex;
      justify-content: center;">
    <img src="{{ asset('assets/doctor-panel/imgs/dashboard/allomed-dashboar-banner doctomed.jpg') }}" style="max-width: 1110px;" alt="" class="img-fuild" />
</div>
</div>
@endsection
@section('scripts')
@endsection
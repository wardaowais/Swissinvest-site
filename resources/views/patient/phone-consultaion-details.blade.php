@extends('patient.layouts.app')

@section('content')
<style type="text/css">
.card {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.btn-primary {
    background-color: #00B2FF !important;
    padding: 10px;
    color: #fff !important;
}

/* Box container styling */
.image-box {
    width: 100%;
    /* Full width or adjust as needed */
    height: 100% !important;
    /* Full width or adjust as needed */
    /* max-width: 600px; You can set a maximum width if needed */
    /* margin: 20px auto; Center the box horizontally with some margin */
    border-radius: 20px;
    /* Rounded corners */
    overflow: hidden;
    /* Ensure the image fits inside the rounded box */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Add a soft shadow for depth */
    border: 1px solid #ddd;
}

/* Image styling */
.image-content {
    width: 100%;
    /* Make sure the image fills the entire container */
    height: 100% !important;
    /* Keep the image's aspect ratio */
    display: block;
    border-radius: inherit;
    /* Inherit the border radius from the parent box */
}

.rating-box {
    background: linear-gradient(135deg, #629FFF, #FFFFFF);
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    text-align: left !important;
}

.rating-stars i {
    font-size: 24px;
    color: #FFFF00;
}

.rating-stars .fa-star-half-alt {
    color: white;
}

.comment-box {
    width: 100%;
    background-color: #F7F7F7;
    border: 2px solid #ddd;
    border-radius: 10px;
    padding: 10px;
    height: 150px;
    resize: none;
}

.submit-btn {
border-radius: 20px;
padding: 10px 30px;
border: none;
cursor: pointer;
float: right;
}

.profile-img {
    width: 96px;
    height: 96px;
    border-radius: 50%;
}
.profile-container {
display: flex;
align-items: center;
}
.profile-container h5 {
margin-bottom: 0;
margin-left: 15px;
}

@media (max-width: 576px) {
    .main-container {
        margin: 10px !important;
        padding: 10px !important;
    }
}
</style>
<!-- STATUS CARDS -->
<div class="container-fuild">
    <span class="mt-3" style="font-size: 29px;">Phone Consultation</span>
    <div class="row mt-3 ms-0 px-0 d-flex align-items-stretch">
        <!-- First box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-5 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class=" d-flex align-items-center mt-3">
                    <img src="{{asset('assets/patient-panel/new-d/images/icons/person.png')}}" alt="Nutrition" class="me-2"
                        style="width: 33px; height: 33px;">
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5" style="color: #000; text-align: center; font-size: 19px; font-weight: 600;">
                    Book Appointment</p>
                <!-- Button below everything -->
                <button class="btn btn-primary btn-sm mb-3 col-7">Book Appointment</button>
            </div>
        </div>

        <!-- Second box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-5 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class=" d-flex align-items-center mt-3">
                    <img src="{{asset('assets/patient-panel/new-d/images/icons/person.png')}}" alt="Nutrition" class="me-2"
                        style="width: 33px; height: 33px;">
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5" style="color: #000; text-align: center; font-size: 19px; font-weight: 600;">
                    Check Schedule</p>
                <!-- Button below everything -->
                <button class="btn btn-primary btn-sm mb-3 col-7">Check</button>
            </div>
        </div>

        <!-- Third box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-5 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class=" d-flex align-items-center mt-3">
                    <img src="{{asset('assets/patient-panel/new-d/images/icons/fe-person.png')}}" alt="Nutrition" class="me-2"
                        style="width: 33px; height: 33px;">
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5" style="color: #000; text-align: center; font-size: 19px; font-weight: 600;">
                    Consult Doctor</p>
                <!-- Button below everything -->
                <button class="btn btn-primary btn-sm mb-3 col-7">Consult</button>
            </div>
        </div>

        <!-- Fourth box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-5 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class=" d-flex align-items-center mt-3">
                    <img src="{{asset('assets/patient-panel/new-d/images/icons/person.png')}}" alt="Nutrition" class="me-2"
                        style="width: 33px; height: 33px;">
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5" style="color: #000; text-align: center; font-size: 19px; font-weight: 600;">
                    History</p>
                <!-- Button below everything -->
                <button class="btn btn-primary btn-sm mb-3 col-7">See History</button>
            </div>
        </div>
    </div>
    <h3 class="mt-4" style="font-size: 29px;">Submit Feedback</h3>
    <div class="row mt-2 ms-0 px-0 d-flex align-items-stretch">

        <!-- First box -->
        <div class="col-md-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6 ps-0 pe-5 my-2">
            <div class="card rating-box text-center p-4">
            <!-- Profile Image and Title -->
            <div class="d-flex w-100">
                <!-- Profile Image and Title -->
                <div class="profile-container-large mx-3">
                    <img src="{{asset('assets/patient-panel/new-d/images/icons/stars.png')}}" alt="Profile Image" class="profile-img">
                    
                </div>
                <div class="my-3">
                <h5 style="font-size: 14px; font-weight: 400;">How Would You Rate Our Healthcare Services?</h5>
                <!-- Star Rating -->
                <div class="rating-stars mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            </div>

            <div class="mb-4">
                <textarea class="form-control comment-box" placeholder="Comment...."></textarea>
            </div>
            
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary col-3">Submit</button>
            </div>
        </div>
        </div>

        <!-- Second box -->
        <div class="col-md-12 col-xl-6 col-xxl-6 col-lg-6 col-sm-12 ps-0 pe-5 my-2">
            <div class="card d-flex align-items-center  mb-3 p-4"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <!-- <div class=" d-flex align-items-center mt-3">
                    <img src="{{asset('assets/patient-panel/new-d/images/icons/6.png')}}" alt="Exercise" class="me-2"
                        style="width: 39px; height: 39px;">
                    <span class="" style="font-weight: 600; font-size: 22.5px;">Exercise</span>
                </div> -->
                <!-- Paragraph below the icon and text -->
                <h3 class="px-5"
                    style="text-align: center; font-size: 32px; font-weight: 600;">Contact us from anywhere at any time </h3>
                    <div class="image-box mt-5" style="max-height: 170px !important; width: 70%;">
                        <img src="{{asset('assets/patient-panel/new-d/images/icons/image.png')}}" alt="Basket of Fruits and Vegetables"
                            class="image-content">
                    </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 ms-0 px-0 d-flex align-items-stretch">
    
        <div class="col-md-12 col-xl-12 col-xxl-12 ps-0 my-2 pe-5" style="max-height: 320px;">
            <div class="card d-flex flex-column align-items-center justify-content-between"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="image-box">
                    <img src="{{asset('assets/patient-panel/new-d/images/icons/fruits.png')}}" alt="Basket of Fruits and Vegetables"
                        class="image-content">
                    <!-- Overlay div -->
                    <div class="overlay-div">
                        <img class="img-fluid appointment-img1"
                            src="https://doctomed.ch/assets/img/layer1-background.png"
                            alt="Background Image">
                        <a href="https://nimativs.com" target="_blank">
                            <img class="img-fluid appointment-img2 hover-animate"
                                src="https://doctomed.ch/assets/patient-panel/new-d/images/logo-phone-footer.png"
                                alt="Logo Image">
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>
<br><Br><br><br><Br>
<!-- /STATUS CARDS -->
@endsection
@extends('patient.layouts.app')

@section('content')
<style>
    

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

.input-group-prepend .input-group-text {
    background-color: white;
    border: none;
    padding-right: 0;
}

.input-group-text i {
    font-size: 20px;
}


.form-control-search {
    border: none;
    border-radius: 30px;
    /* Rounded corners */

}



.input-group-text {
    background: none;
    border: none;
}

.input-group-search .form-control:focus {
    box-shadow: 0 0;
    /* Blue outline on focus */
}

.input-group-search {
    border-radius: 30px;
    /* Rounded corners */
    padding-left: 10px;
    border: 1px solid #999;
}

.image-container {
    width: 100%;
    height: 200px;
    /* Adjust height as needed */
    overflow: hidden;
    /* Hide overflow for cropping effect */
    border-radius: 10px;
    /* Optional: rounded corners */
}

.image-content {
    object-fit: cover;
    /* Cover the container, cropping if necessary */
    width: 100%;
    height: 100%;
}

.list-messages .card {

    margin: auto;
}

.list-messages .input-group-text {
    background-color: transparent;
    border: none;
}

.list-messages .form-control {
    border: none;
    box-shadow: none;
}

.list-messages .list-group-item {
    border: none;
    border-bottom: 1px solid #c0c5c5;

}

.list-messages .list-group-item:hover {
    background-color: #f8f9fa;
    /* Optional: background on hover */
}

.billing-box {
    border-radius: 15px;
    /* Rounded corners */
    background-color: #fff;
    margin: auto;
    padding: 15px;
}

.billing-title {
    text-align: center;
    margin-bottom: 10px;
    font-weight: bold;
}

.billing-date {
    text-align: center;
    font-size: 14px;
    color: #333;
    margin-bottom: 20px;
}

.paid-item,
.unpaid-item {
    font-size: 14px;
    margin-bottom: 10px;
}

.billing-pay-btn {
    border-radius: 10px;
    font-weight: bold;
}


.overlay-div {
    position: absolute;
    top: 0;
    left: 0;
    width: 40%;
    height: 30%;
    background: transparent; /* Ensure background is transparent */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    top:20%;
    left: 40px;
    bottom: 20px;
    
    /* Adjust z-index if necessary */
    }
    
    .overlay-div .appointment-img1,
    .overlay-div .appointment-img2 {
    position: absolute;
    }
    
    .overlay-div .appointment-img1 {
    /* Positioning the first image */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Adjust if needed */
    }
    
    .overlay-div .appointment-img2 {
    /* Positioning the second image (logo) */
    /* Adjust positioning as needed */
    width: 45%;
    height: 90%;
    left: 40px;
    bottom: 15px;
    transform: none;
    }
    
    .hover-animate:hover {
    /* Add any hover animations if needed */
    }

@media (max-width: 576px) {
    .main-container {
        margin: 10px !important;
        padding: 10px !important;
    }
}
</style>
<div class="container-fuild">
    <div class="row ms-0 px-0 d-flex align-items-stretch">
        <div class=" col-md-12 col-xl-6 col-lg-6 col-sm-12 ps-0">
            <span class="mt-3" style="font-size: 29px;">My Appointments</span>
            <div class="row mt-3 ms-0 px-0 d-flex align-items-stretch">
                <!-- First box -->
                <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12 ps-0 pe-4 my-2">
                    <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                        style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                        <div class="btn d-flex align-items-center mt-3">
                            <img src="{{asset('assets/patient-panel/new-d/images/icons/doctor.png')}}" alt="Nutrition" class="me-2"
                                style="width: 40px; height: 40px;">
                            <span style="font-weight: 600; font-size: 23.5px;">Dr Mathews</span>
                        </div>
                        <!-- Paragraph below the icon and text -->
                        <p class="px-5"
                            style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">
                            Nutrition</p>
                        <div class="d-flex justify-content-between ">
                            <div class="date mx-3">
                                <!-- Left side: Date -->
                                <p style="text-align: center; font-size: 14px; font-weight: 600;">1 Jun 2024
                                </p>
                            </div>
                            <div class="time mx-3">
                                <!-- Right side: Time -->
                                <p style="text-align: center; font-size: 14px; font-weight: 600;">12: 00 AM
                                </p>
                            </div>
                        </div>
                        <div class="btn btn-primary btn-sm d-flex align-items-center mb-3">

                            <span style="font-weight: 600; font-size: 15px;">Join Now</span>
                            <img src="{{asset('assets/patient-panel/new-d/images/icons/video.png')}}" alt="Nutrition" class="ms-2"
                                style="width: 26px; height: 17px;">
                        </div>
                    </div>
                </div>

                <!-- Second box -->
                <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12 ps-0 pe-4 my-2">
                    <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                        style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                        <div class="btn d-flex align-items-center mt-3">
                            <img src="{{asset('assets/patient-panel/new-d/images/icons/doctor.png')}}" alt="Nutrition" class="me-2"
                                style="width: 40px; height: 40px;">
                            <span style="font-weight: 600; font-size: 23.5px;">Dr Annie</span>
                        </div>
                        <!-- Paragraph below the icon and text -->
                        <p class="px-5"
                            style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">
                            Mental Health</p>
                        <div class="d-flex justify-content-between">
                            <div class="date mx-3">
                                <!-- Left side: Date -->
                                <p style="text-align: center; font-size: 14px; font-weight: 600;">1 Jun 2024
                                </p>
                            </div>
                            <div class="time mx-3">
                                <!-- Right side: Time -->
                                <p style="text-align: center; font-size: 14px; font-weight: 600;">12: 00 AM
                                </p>
                            </div>
                        </div>
                        <div class="btn btn-primary btn-sm d-flex align-items-center mb-3">

                            <span style="font-weight: 600; font-size: 15px;">Join Now</span>
                            <img src="{{asset('assets/patient-panel/new-d/images/icons/video.png')}}" alt="Nutrition" class="ms-2"
                                style="width: 26px; height: 17px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-6 col-lg-6 col-sm-12 mx-0 ps-0">
            <span class="mt-3" style="font-size: 29px;">Past Appointments</span>
            <div class="row mt-3 ms-0 px-0 d-flex align-items-stretch">
                <!-- First box -->
                <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12 ps-0 pe-4 my-2">
                    <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                        style="background-color: #80FF6B; border: 1px solid #80FF6B; border-radius: 20px; height: 100%;">
                        <div class="btn d-flex align-items-center mt-3">
                            <img src="{{asset('assets/patient-panel/new-d/images/icons/doctor.png')}}" alt="Nutrition" class="me-2"
                                style="width: 40px; height: 40px;">
                            <span style="font-weight: 600; font-size: 23.5px;">Dr Ali Khan</span>
                        </div>
                        <!-- Paragraph below the icon and text -->
                        <p class="px-5"
                            style="color: #000; text-align: center; font-size: 14px; font-weight: 600;">
                            Preventative care</p>
                        <div class="d-flex justify-content-between">
                            <div class="date mx-3">
                                <!-- Left side: Date -->
                                <p style="text-align: center; font-size: 14px; font-weight: 600;">1 Jun 2024
                                </p>
                            </div>
                            <div class="time mx-3">
                                <!-- Right side: Time -->
                                <p style="text-align: center; font-size: 14px; font-weight: 600;">12: 00 AM
                                </p>
                            </div>
                        </div>
                        <div class="btn btn-primary btn-sm d-flex align-items-center mb-3">

                            <span style="font-weight: 600; font-size: 15px;">Join Now</span>
                            <img src="{{asset('assets/patient-panel/new-d/images/icons/video.png')}}" alt="Nutrition" class="ms-2"
                                style="width: 26px; height: 17px;">
                        </div>
                    </div>
                </div>

                <!-- Second box -->
                <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12 ps-0 pe-4 my-2">
                    <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                        style="background-color: #80FF6B; border: 1px solid #80FF6B; border-radius: 20px; height: 100%;">
                        <div class="btn d-flex align-items-center mt-3">
                            <img src="{{asset('assets/patient-panel/new-d/images/icons/doctor.png')}}" alt="Nutrition" class="me-2"
                                style="width: 40px; height: 40px;">
                            <span style="font-weight: 600; font-size: 23.5px;">Dr Thomas</span>
                        </div>
                        <!-- Paragraph below the icon and text -->
                        <p class="px-5"
                            style="color: #000; text-align: center; font-size: 14px; font-weight: 600;">
                            Physical Health</p>
                        <div class="d-flex justify-content-between">
                            <div class="date mx-3">
                                <!-- Left side: Date -->
                                <p style="text-align: center; font-size: 14px; font-weight: 600;">1 Jun 2024
                                </p>
                            </div>
                            <div class="time mx-3">
                                <!-- Right side: Time -->
                                <p style="text-align: center; font-size: 14px; font-weight: 600;">12: 00 AM
                                </p>
                            </div>
                        </div>
                        <div class="btn btn-primary btn-sm d-flex align-items-center mb-3">

                            <span style="font-weight: 600; font-size: 15px;">Join Now</span>
                            <img src="{{asset('assets/patient-panel/new-d/images/icons/video.png')}}" alt="Nutrition" class="ms-2"
                                style="width: 26px; height: 17px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ms-0 px-0 d-flex align-items-stretch px-0 mx-0 my-2">
        <div class="col-sm-12 col-xl-8 col-xxl-8 col-lg-6 col-md-12 ms-0 ps-0">
            <div class="card d-flex flex-column mb-1 p-2 px-4"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px;">
                <h3 class="mt-4" style="font-size: 23px;">Find A Doctor</h3>
                <div class="input-group input-group-search mb-3  w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="search-icon">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control form-control-search"
                        placeholder="Search Doctors By Speciality" aria-label="Search Doctors By Speciality"
                        aria-describedby="search-icon">
                </div>

                <div class="row mt-2 ms-0 px-0 d-flex align-items-stretch">
                    <!-- First box -->
                    <div class="col-md-6 col-xl-4 col-xxl-4 col-lg-6 pe-4 ps-0 my-2">
                        <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                            style="background-color: #F7F7F7; border: 1px solid #F7F7F7; border-radius: 20px; height: 100%;">
                            <div class="btn d-flex align-items-center flex-column mt-1">
                                <img src="{{asset('assets/patient-panel/new-d/images/icons/person2.png')}}" alt="Nutrition"
                                    style="width: 33px; height: 33px;">
                                <span style="font-weight: 600; font-size: 18px;" class="pt-1">Dr
                                    Mathews</span>
                            </div>
                            <!-- Paragraph below the icon and text -->
                            <p class="px-4 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                psychiatrists</p>
                            <p class="px-2 py-0 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Available : Next Monday</p>
                            <button class="btn btn-primary mb-3">Book Appointment</button>
                        </div>
                    </div>

                    <!-- Second box -->
                    <div class="col-md-6 col-xl-4 col-xxl-4 col-lg-6 ps-0 pe-4 my-2">
                        <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                            style="background-color: #F7F7F7; border: 1px solid #F7F7F7; border-radius: 20px; height: 100%;">
                            <div class="btn d-flex align-items-center flex-column mt-1">
                                <img src="{{asset('assets/patient-panel/new-d/images/icons/person2.png')}}" alt="Nutrition"
                                    style="width: 33px; height: 33px;">
                                <span style="font-weight: 600; font-size: 18px;" class="pt-1">Dr
                                    Willam</span>
                            </div>
                            <!-- Paragraph below the icon and text -->
                            <p class="px-4 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Dietician</p>
                            <p class="px-2 py-0 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Available : Next Friday</p>
                            <button class="btn btn-primary mb-3">Book Appointment</button>
                        </div>
                    </div>

                    <!-- Third box -->
                    <div class="col-md-6 col-xl-4 col-xxl-4 col-lg-6 ps-0 pe-3 my-2">
                        <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                            style="background-color: #F7F7F7; border: 1px solid #F7F7F7; border-radius: 20px; height: 100%;">
                            <div class="btn d-flex align-items-center flex-column mt-1">
                                <img src="{{asset('assets/patient-panel/new-d/images/icons/fe-person.png')}}" alt="Nutrition"
                                    style="width: 33px; height: 33px;">
                                <span style="font-weight: 600; font-size: 18px;" class="pt-1">Dr
                                    Marie</span>
                            </div>
                            <!-- Paragraph below the icon and text -->
                            <p class="px-4 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Prophylaxis</p>
                            <p class="px-2 py-0 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Available : Fri/Sat</p>
                            <button class="btn btn-primary mb-3">Book Appointment</button>
                        </div>
                    </div>
                </div>
                <h3 class="mt-4" style="font-size: 23px;">Consultation History</h3>

                <div class="row mt-2 ms-0 px-0 d-flex align-items-stretch">
                    <!-- First box -->
                    <div class="col-md-6 col-xl-4 col-xxl-4 col-lg-6 ps-0 pe-4 my-2">
                        <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                            style="background-color: #F7F7F7; border: 1px solid #F7F7F7; border-radius: 20px; height: 100%;">
                            <div class="btn d-flex align-items-center flex-column mt-1">
                                <img src="{{asset('assets/patient-panel/new-d/images/icons/fe-person.png')}}" alt="Nutrition"
                                    style="width: 33px; height: 33px;">
                                <span style="font-weight: 600; font-size: 18px;" class="pt-1">Dr
                                    Marie</span>
                            </div>
                            <!-- Paragraph below the icon and text -->
                            <p class="px-4 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Prophylaxis</p>
                            <p class="px-2 py-0 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Available : Fri/Sat</p>
                            <button class="btn btn-primary mb-3">Book Appointment</button>
                        </div>
                    </div>


                    <!-- Second box -->
                    <div class="col-md-6 col-xl-4 col-xxl-4 col-lg-6 ps-2 pe-4 my-2">
                        <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                            style="background-color: #F7F7F7; border: 1px solid #F7F7F7; border-radius: 20px; height: 100%;">
                            <div class="btn d-flex align-items-center flex-column mt-1">
                                <img src="{{asset('assets/patient-panel/new-d/images/icons/person2.png')}}" alt="Nutrition"
                                    style="width: 33px; height: 33px;">
                                <span style="font-weight: 600; font-size: 18px;" class="pt-1">Dr
                                    Mathews</span>
                            </div>
                            <!-- Paragraph below the icon and text -->
                            <p class="px-4 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                psychiatrists</p>
                            <p class="px-2 py-0 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Available : Next Monday</p>
                            <button class="btn btn-primary mb-3">Book Appointment</button>
                        </div>
                    </div>


                    <!-- Third box -->
                    <div class="col-md-6 col-xl-4 col-xxl-4 col-lg-6 ps-0 pe-3 my-2">
                        <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                            style="background-color: #F7F7F7; border: 1px solid #F7F7F7; border-radius: 20px; height: 100%;">
                            <div class="btn d-flex align-items-center flex-column mt-1">
                                <img src="{{asset('assets/patient-panel/new-d/images/icons/person2.png')}}" alt="Nutrition"
                                    style="width: 33px; height: 33px;">
                                <span style="font-weight: 600; font-size: 18px;" class="pt-1">Dr
                                    Willam</span>
                            </div>
                            <!-- Paragraph below the icon and text -->
                            <p class="px-4 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Dietician</p>
                            <p class="px-2 py-0 mb-1"
                                style="color: #FF3A3A; text-align: center; font-size: 12px; font-weight: 600;">
                                Available : Next Friday</p>
                            <button class="btn btn-primary mb-3">Book Appointment</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-1 ms-0 px-0 d-flex align-items-stretch">

                <div class="col-md-12 col-xl-12 col-xxl-12 ps-0 my-2" style="max-height: 140px;">
                    <div class="card d-flex flex-column align-items-center justify-content-between"
                        style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                        <div class="image-box">
                            <div class="image-container">
                                <img src="{{asset('assets/patient-panel/new-d/images/icons/fruits.png')}}" alt="Basket of Fruits and Vegetables"
                                    class="image-content img-fluid">
                            </div>
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
        <div class="col-sm-12 col-xl-4 col-xxl-4 col-lg-6 col-md-12 pe-2">
            <div class="row mt-0 list-messages px-0">
                <div class="col-12 w-100">
                    <div class="card shadow-sm w-100" style="border-radius: 15px;">
                        <!-- Profile and Title -->
                        <div class="card-body">
                            <h5 class="text-center">Messages</h5>

                            <!-- Search Box -->
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text bg-light border-0" id="search-addon">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" class="form-control bg-light border-0"
                                    placeholder="Search for conversation"
                                    aria-label="Search for conversation" aria-describedby="search-addon">
                            </div>

                            <!-- Messages List -->
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center mb-5">
                                    <div class="d-flex">
                                        <img src="{{asset('assets/patient-panel/new-d/images/doctor1.png')}}" alt="Dr Henery"
                                            class="rounded-circle me-3" style="width: 39px; height: 39px;">
                                        <div>
                                            <strong>Dr Henery</strong>
                                            <p class="mb-0 text-muted" style="font-size: 12px;">Dont be late
                                                on appointment.</p>
                                        </div>
                                    </div>
                                    <div class="message-info d-flex align-items-center">
                                        <div class="text-end me-2">
                                            <p class="mb-0 text-muted chat-time">01:00</p>
                                            <i class="fas fa-check-circle text-primary"></i>
                                        </div>
                                        <img src="{{asset('assets/patient-panel/new-d/images/icons/comment.png')}}" alt="Dr John"
                                            class="rounded-circle ms-1 me-1"
                                            style="width: 20px; height: 20px;">
                                    </div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center mb-5">
                                    <div class="d-flex">
                                        <img src="{{asset('assets/patient-panel/new-d/images/doctor2.png')}}" alt="Dr John"
                                            class="rounded-circle me-3" style="width: 39px; height: 39px;">
                                        <div>
                                            <strong>Dr John</strong>
                                            <p class="mb-0 text-muted" style="font-size: 12px;">Take care
                                                bye.</p>
                                        </div>
                                    </div>
                                    <div class="message-info d-flex align-items-center">
                                        <div class="text-end me-2">
                                            <p class="mb-0 text-muted chat-time">03:20</p>
                                            <i class="fas fa-check-circle text-primary"></i>
                                        </div>
                                        <img src="{{asset('assets/patient-panel/new-d/images/icons/comment.png')}}" alt="Dr John"
                                            class="rounded-circle ms-1 me-1"
                                            style="width: 20px; height: 20px;">
                                    </div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center mb-5">
                                    <div class="d-flex">
                                        <img src="{{asset('assets/patient-panel/new-d/images/doctor3.png')}}" alt="Dr Steff"
                                            class="rounded-circle me-3" style="width: 39px; height: 39px;">
                                        <div>
                                            <strong>Dr Steff</strong>
                                            <p class="mb-0 text-muted" style="font-size: 12px;">Dont forget
                                                to workout befo....</p>
                                        </div>
                                    </div>
                                    <div class="message-info d-flex align-items-center">
                                        <div class="text-end me-2">
                                            <p class="mb-0 text-muted chat-time">04:00</p>
                                            <i class="fas fa-check-circle text-primary"></i>
                                        </div>
                                        <img src="{{asset('assets/patient-panel/new-d/images/icons/comment.png')}}" alt="Dr John"
                                            class="rounded-circle ms-1 me-1"
                                            style="width: 20px; height: 20px;">
                                    </div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex">
                                        <img src="{{asset('assets/patient-panel/new-d/images/doctor4.png')}}" alt="Dr Ben Wilson"
                                            class="rounded-circle me-3" style="width: 39px; height: 39px;">
                                        <div>
                                            <strong>Dr Ben Wilson</strong>
                                            <p class="mb-0 text-muted" style="font-size: 12px;">Do yoga in
                                                the morning.</p>
                                        </div>
                                    </div>
                                    <div class="message-info d-flex align-items-center">
                                        <div class="text-end me-2">
                                            <p class="mb-0 text-muted chat-time">07:56</p>
                                            <i class="fas fa-check-circle text-primary"></i>
                                        </div>
                                        <img src="{{asset('assets/patient-panel/new-d/images/icons/comment.png')}}" alt="Dr John"
                                            class="rounded-circle ms-1 me-1"
                                            style="width: 20px; height: 20px;">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3 list-messages px-0">
                <div class="billing-box card shadow-sm">
                    <div class="card-body pb-0">
                        <h5 class="billing-title">Billing and payment</h5>
                        <p class="billing-date"><strong>Date:</strong> July 15, 2023</p>
                        <div class="row d-flex   justify-content-between">
                            <!-- Paid Section -->
                            <div class="col-6 ps-4">
                                <p class="paid-item"><strong>Paid:</strong> <span
                                        class="text-success ms-4">$150</span></p>
                                <p class="paid-item"><strong>Paid:</strong> <span
                                        class="text-success ms-4">$95</span></p>
                                <p class="paid-item"><strong>Paid:</strong> <span
                                        class="text-success ms-4">$121</span></p>
                                <p class="paid-item"><strong>Paid:</strong> <span
                                        class="text-success ms-4">$67</span></p>
                            </div>
                            <!-- Unpaid Section -->
                            <div class="col-6">
                                <p class="unpaid-item"><strong>Unpaid:</strong> <span
                                        class="text-danger ms-4">$150</span></p>
                                <p class="unpaid-item"><strong>Unpaid:</strong> <span
                                        class="text-danger ms-4">$130</span></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button class="btn btn-primary billing-pay-btn">Pay now</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>




</div>


<br><Br><br><br><Br>
@endsection
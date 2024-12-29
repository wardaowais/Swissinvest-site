@extends('patient.layouts.app')

@section('content')
<div class="container-fuild">
    <span class="mt-3" style="font-size: 29px;">All Health Tips</span>
    <div class="row">
        <!-- Use col-12 to make it a row with responsive boxes based on content length -->
        <div class="col-md-12 col-xl-12">
            <div class="row">
                <!-- First box -->
                <div class="col-auto d-flex align-items-center justify-content-center mb-2">
                    <div class="btn btn-light d-flex align-items-center">
                        <img src="{{ asset('assets/patient-panel/new-d/images/icons/1.png') }}" alt="Nutrition" class="me-2"
                            style="width: 28px; height: 28px;">
                        <span style="font-size: 16px;">Nutrition</span>
                    </div>
                </div>

                <!-- Second box -->
                <div class="col-auto d-flex align-items-center justify-content-center mb-2">
                    <div class="btn btn-light d-flex align-items-center">
                        <img src="{{ asset('assets/patient-panel/new-d/images/icons/5.png') }}" alt="Hydration" class="me-2"
                            style="width: 28px; height: 28px;">
                        <span style="font-size: 16px;">Exercise</span>
                    </div>
                </div>

                <!-- Third box -->
                <div class="col-auto d-flex align-items-center justify-content-center mb-2">
                    <div class="btn btn-light d-flex align-items-center">
                        <img src="{{ asset('assets/patient-panel/new-d/images/icons/3.png') }}" alt="Fitness" class="me-2"
                            style="width: 28px; height: 28px;">
                        <span style="font-size: 16px;">Mental Health</span>
                    </div>
                </div>

                <!-- Fourth box -->
                <div class="col-auto d-flex align-items-center justify-content-center mb-2">
                    <div class="btn btn-light d-flex align-items-center">
                        <img src="{{ asset('assets/patient-panel/new-d/images/icons/4.png') }}" alt="Well-being" class="me-2"
                            style="width: 28px; height: 28px;">
                        <span style="font-size: 16px;">Preventative Care</span>
                    </div>
                </div>

                <!-- Fifth box -->
                <div class="col-auto d-flex align-items-center justify-content-center mb-2">
                    <div class="btn btn-light d-flex align-items-center">
                        <img src="{{ asset('assets/patient-panel/new-d/images/icons/2.png') }}" alt="Sleep" class="me-2"
                            style="width: 28px; height: 28px;">
                        <span style="font-size: 16px;">Vitamin & Minerals</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid my-3 ps-0 pe-3">
        <div class="filter-bar d-flex align-items-center ps-0 flex-wrap">
            <img src="{{ asset('assets/patient-panel/new-d/images/icons/filter.png') }}" alt="Filter Icon"
                class="filter-icon ms-3 me-2 my-1 img-fluid" style="max-width: 20px;">
            <span class="fw-bold me-5 fs-6">Filter by Categories</span>
            <div class="d-flex flex-wrap">
                <button class="btn btn-primary btn-round mx-1 my-1 active">Nutrition</button>
                <button class="btn btn-primary btn-round mx-1 my-1">Exercise</button>
                <button class="btn btn-primary btn-round mx-1 my-1">Mental Health</button>
                <button class="btn btn-primary btn-round mx-1 my-1 inactive">Preventative care</button>
                <button class="btn btn-primary btn-round mx-1 my-1">Vitamin</button>
            </div>
        </div>
    </div>
    <div class="row mt-3 ms-0 px-0 d-flex align-items-stretch">
        <!-- First box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-4 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="btn d-flex align-items-center mt-3">
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/1.png') }}" alt="Nutrition" class="me-2"
                        style="width: 28px; height: 28px;">
                    <span style="font-weight: 600; font-size: 22.5px;">Nutrition</span>
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5"
                    style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">Boost
                    Your Health with Balanced Eating</p>
                <!-- Button below everything -->
                <button class="btn btn-primary mb-3">Learn More</button>
            </div>
        </div>

        <!-- Second box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-4 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="btn d-flex align-items-center mt-3">
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/6.png') }}" alt="Exercise" class="me-2"
                        style="width: 39px; height: 39px;">
                    <span class="" style="font-weight: 600; font-size: 22.5px;">Exercise</span>
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5"
                    style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">Stay
                    Active, Stay Strong</p>
                <!-- Button below everything -->
                <button class="btn btn-primary mb-3">Learn More</button>
            </div>
        </div>

        <!-- Third box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-4 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="btn d-flex align-items-center mt-3">
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/1.png') }}" alt="Mental Health" class="me-2"
                        style="width: 39px; height: 39px;">
                    <span class="" style="font-weight: 600; font-size: 22.5px;">Mental Health</span>
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5"
                    style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">Calm
                    Mind, Healthy Life</p>
                <!-- Button below everything -->
                <button class="btn btn-primary mb-3">Learn More</button>
            </div>
        </div>

        <!-- Fourth box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-4 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="btn d-flex align-items-center mt-3">
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/2.png') }}" alt="Vitamin" class="me-2"
                        style="width: 39px; height: 39px;">
                    <span class="" style="font-weight: 600; font-size: 22.5px;">Vitamin</span>
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5"
                    style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">
                    Convenient Care Anytime, Anywhere</p>
                <!-- Button below everything -->
                <button class="btn btn-primary mb-3">Learn More</button>
            </div>
        </div>
    </div>
    <h3 class="mt-4" style="font-size: 29px;">My saved tips</h3>
    <div class="row mt-2 ms-0 px-0 d-flex align-items-stretch">
        <!-- First box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-4 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="btn d-flex align-items-center mt-3">
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/1.png') }}" alt="Nutrition" class="me-2"
                        style="width: 28px; height: 28px;">
                    <span style="font-weight: 600; font-size: 22.5px;">Nutrition</span>
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5"
                    style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">Boost
                    Your Health with Balanced Eating</p>
                <!-- Delete icon and button wrapper -->
                <div class="position-relative w-100 mb-3">
                    <!-- Centered Learn More button -->
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary">Learn More</button>
                    </div>

                    <!-- Delete icon, positioned absolutely to the left -->
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/delete.png') }}" alt="Delete Icon" class="delete-icon">
                </div>
            </div>
        </div>

        <!-- Second box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-4 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="btn d-flex align-items-center mt-3">
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/6.png') }}" alt="Exercise" class="me-2"
                        style="width: 39px; height: 39px;">
                    <span class="" style="font-weight: 600; font-size: 22.5px;">Exercise</span>
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5"
                    style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">Stay
                    Active, Stay Strong</p>
                <!-- Delete icon and button wrapper -->
                <div class="position-relative w-100 mb-3">
                    <!-- Centered Learn More button -->
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary">Learn More</button>
                    </div>

                    <!-- Delete icon, positioned absolutely to the left -->
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/delete.png') }}" alt="Delete Icon" class="delete-icon">
                </div>
            </div>
        </div>

        <!-- Third box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-4 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="btn d-flex align-items-center mt-3">
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/1.png') }}" alt="Mental Health" class="me-2"
                        style="width: 39px; height: 39px;">
                    <span class="" style="font-weight: 600; font-size: 22.5px;">Mental Health</span>
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5"
                    style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">Calm
                    Mind, Healthy Life</p>
                <!-- Delete icon and button wrapper -->
                <div class="position-relative w-100 mb-3">
                    <!-- Centered Learn More button -->
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary">Learn More</button>
                    </div>

                    <!-- Delete icon, positioned absolutely to the left -->
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/delete.png') }}" alt="Delete Icon" class="delete-icon">
                </div>
            </div>
        </div>

        <!-- Fourth box -->
        <div class="col-md-6 col-xl-3 col-xxl-3 ps-0 pe-4 my-2">
            <div class="card d-flex flex-column align-items-center justify-content-between mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="btn d-flex align-items-center mt-3">
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/2.png') }}" alt="Vitamin" class="me-2"
                        style="width: 39px; height: 39px;">
                    <span class="" style="font-weight: 600; font-size: 22.5px;">Vitamin</span>
                </div>
                <!-- Paragraph below the icon and text -->
                <p class="px-5"
                    style="color: #FF3A3A; text-align: center; font-size: 14px; font-weight: 600;">
                    Convenient Care Anytime, Anywhere</p>
                <!-- Delete icon and button wrapper -->
                <div class="position-relative w-100 mb-3">
                    <!-- Centered Learn More button -->
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary">Learn More</button>
                    </div>

                    <!-- Delete icon, positioned absolutely to the left -->
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/delete.png') }}" alt="Delete Icon" class="delete-icon">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 ms-0 px-0 d-flex align-items-stretch">
        <!-- First box -->
        <div class="col-sm-12 col-md-5 col-xl-5 col-xxl-5 ps-0 my-2" style="max-height: 320px;">
            <div class="card d-flex flex-column  mb-3 p-2"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="w-100 p-4">
                    <!-- Title -->
                    <h4 class="" style="font-size: 20px; font-weight: 400;">Submit A Health Tip</h4>

                    <!-- Category and Dropdown Row -->
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <label for="category" class="fw-bold">Category</label>
                        <select id="category" class="form-select w-auto">
                            <option selected>Nutrition</option>
                            <option value="1">Exercise</option>
                            <option value="2">Mental Health</option>
                            <option value="3">Vitamins</option>
                        </select>
                    </div>

                    <!-- Text Area -->
                    <div class="form-group mb-4">
                        <textarea class="form-control" id="tipDetails" rows="5"
                            placeholder="Tip Details ..." style="background-color: #F7F7F7;"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary col-xl-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second box -->
        <div class="col-md-7 col-xl-7 col-xxl-7 ps-0 my-2" style="max-height: 320px;">
            <div class="card d-flex flex-column align-items-center justify-content-between"
                style="background-color: white; border: 1px solid #ddd; border-radius: 20px; height: 100%;">
                <div class="image-box">
                    <img src="{{ asset('assets/patient-panel/new-d/images/icons/fruits.png') }}" alt="Basket of Fruits and Vegetables"
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
@endsection
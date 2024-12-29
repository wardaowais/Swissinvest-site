@extends('patient.layouts.app')

@section('content')
<style>
    @media (min-width: 768px) {
  .container-fluid,
  .container-sm,
  .container-md,
  .container-lg,
  .container-xl,
  .container-xxl {
    padding: 0 0rem !important;
  }
}
::-webkit-scrollbar {
    width: 6px;
    background: transparent;
    height: 4pc;
}
::-webkit-scrollbar-thumb {
    background: black;
}
.appointment-img1{
    margin-top: 3pc;
    width: 44%;
}
.full-width-bg{
    height: 40vh;
}
.appointment-img2{
    width: 21%;
    margin-left: -26pc;
    margin-top: 3pc;

}

@media only screen and (max-width:786px){
    .appointment-img2 {
        width: 51%;
        margin-left: 6pc;
        margin-top: -9pc;
    }
    
.appointment-img1 {
    margin-top: 3pc;
    width: 100% !important;
}
}
.hero-section {
    position: relative !;
    padding: 5pc;
    color: #fff !important;
    background-position: top !important;
}
</style>
<section class="hero-section position-relative mt-2" style="padding: 5pc">
    <img src="{{asset('assets/patient-panel/new-d/images/patient/logo.png')}}" class="img-fluid logo">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content text-white">
                    <h1 class="display-4 fw-bold banner-text">Your Guide to a Healthier, Happier Life.</h1>
                    <a href="#" class="style3 th-btn th-icon mt-3">
                        Subscribe for Weekly Health Tips <i class="fas fa-arrow-right"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Background Image -->
    <div class="bg-overlay"></div>
</section>

<section class="section-space">
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="about-content">
                        <h1 class="patient-text-color">Welcome to Our Health Tips!</h1>
                        <p class="patient-text-details">Staying healthy doesn't have to be hard. Our expert
                            tips will help you make small changes that lead to big improvements in your
                            well-being. Whether it's nutrition, fitness, or mental health, we've got you
                            covered</p>
                        <a href="{{url('patients/health-tips-details')}}" class="btn btn-primary">Details Health Tips</a>

                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="about-image-wrap">

                        <div class="about-inner-box">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <img class="img-fluid"
                                        src="{{asset('assets/patient-panel/new-d/images/patient/healthy-tips.png')}}" alt="image">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <img class="img-fluid appointment-img" 
                                        src="{{asset('assets/patient-panel/new-d/images/patient/healthy-tips1.png')}}" alt="image">
                                    <br>
                                    <img class="mt-4 img-fluid"
                                        src="{{asset('assets/patient-panel/new-d/images/patient/healthy-tips2.png')}}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class=" overflow-hidden space shape-mockup-wrap section-space">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-end">
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="blog-grid th-ani">
                    <div class="blog-img global-img">
                        <img class="img-fluid importance-sleep" src="{{asset('assets/patient-panel/new-d/images/patient/importance-of-sleep.png')}}"
                            alt="image">
                    </div>
                    <div class="blog-grid_content mt-3">
                        <h3 class="patient-text-color">The Importance of Sleep for Mental<br> Health</h3>
                        <p class="patient-text-details">Getting enough sleep isn’t just about feeling<br>
                            rested it’s critical for your mental health. <br>Find out how to improve your
                            sleep habits.</p>
                        <a href="#" class="style3 th-btn th-icon mt-2">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <h2 class="patient-text-color">Latest Health Tips Section</h2>
                <p class="patient-text-details">Easy Steps to Boost Your Immune System<br>
                    A healthy immune system is your first line of defense. Learn simple <br> changes to
                    strengthen your body’s natural defenses
                </p>

                <div class="health-tip-grid th-ani">
                    <div class="blog-img global-img">
                        <img class="img-fluid" src="{{asset('assets/patient-panel/new-d/images/patient/busy-schedule.png')}}"
                            alt="image">
                    </div>
                    <div class="blog-grid_content mt-2">
                        <h4 class="patient-text-color">How to Stay Active with a Busy Schedule</h4>
                        <p class="patient-text-details">Struggling to find time for exercise? These quick
                            tips will help you stay active, no matter how hectic your day is.</p>
                        <a href="#" class="style3 th-btn th-icon mt-1">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="health-tip-grid th-ani mt-4">
                    <div class="blog-img global-img">
                        <img class="img-fluid" src="{{asset('assets/patient-panel/new-d/images/patient/healthy-tip.png')}}"
                            alt="image">
                    </div>
                    <div class="blog-grid_content">
                        <h4 class="patient-text-color">Healthy Eating on a Budget</h4>
                        <p class="patient-text-details">Eating well doesn’t have to be expensive. Discover
                            how to create nutritious meals without breaking the bank.</p>
                        <a href="#" class="style3 th-btn th-icon mt-1">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class=" overflow-hidden space shape-mockup-wrap section-space">
    <div class="container">
        <div class="title-area text-center">
            <h1 class="patient-text-color category-text">Categories </h1>
        </div>
        <div class="row gy-4 gx-4 mt-4">
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="destination-item th-ani">
                    <div class="destination-item_img global-img"><img
                            src="{{asset('assets/patient-panel/new-d/images/patient/nutration.png')}}" alt="image"></div>
                    <div class="destination-content">
                        <h3 class="category-heading mt-3">Nutrition Tips:</h3>
                        <p class="category-paragraph">Practical advice on eating healthy and maintaining a
                            balanced diet.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="destination-item th-ani">
                    <div class="destination-item_img global-img"><img
                            src="{{asset('assets/patient-panel/new-d/images/patient/fitness.png')}}" alt="image"></div>
                    <div class="destination-content">
                        <h3 class="category-heading mt-3">Fitness Tips:</h3>
                        <p class="category-paragraph">Workout routines and tips to keep your body moving.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="destination-item th-ani">
                    <div class="destination-item_img global-img"><img
                            src="{{asset('assets/patient-panel/new-d/images/patient/mental-health.png')}}" alt="image"></div>
                    <div class="destination-content">
                        <h3 class="category-heading mt-3">Mental Health:</h3>
                        <p class="category-paragraph">Mindfulness techniques and advice on how to reduce
                            stress and anxiety.</p>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="destination-item th-ani">
                    <div class="destination-item_img global-img"><img
                            src="{{asset('assets/patient-panel/new-d/images/patient/family-heatlh.png')}}" alt="image"></div>
                    <div class="destination-content">
                        <h3 class="category-heading mt-3">Family Health:</h3>
                        <p class="category-paragraph">Tips for keeping your whole family healthy, from kids
                            to seniors.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <br><br><br><br>
                <div class="blog-grid_content">
                    <h1 class="commuinity-text">Join Our Health Community</h1>
                    <p class="patient-text-details mt-3">Stay up-to-date with the latest in health and
                        wellness. Join our community of health-conscious individuals today</p>
                    <a href="#" class="style3 th-btn th-icon mt-4">
                        Join Us For Free <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

            </div>
            <div class="col-md-6">
                <img class="img-fluid community-img" src="{{asset('assets/patient-panel/new-d/images/patient/community.png')}}" alt="image">

            </div>
        </div>
    </div>
</section>


<section class="section-space">
    <div class="container">
        <div class="row">

            <p class="appointment-text text-center">Got questions about your health? Our experts are here to
                help! Book<br> an appointment with a medical professional for personalized<br> guidance
            </p>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <img class="img-fluid" src="{{asset('assets/patient-panel/new-d/images/patient/appointment1.png')}}" alt="image">

            </div>
            <div class="col-md-3 appointment-btn">
                <a href="#" class="style3 th-btn th-icon appointment-button">Book An Appointment</a>
            </div>


            <div class="col-md-3">
                <img class="img-fluid" src="{{asset('assets/patient-panel/new-d/images/patient/appointment2.png')}}" alt="image">

            </div>
            <div class="col-md-1"></div>

        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img class="img-fluid appointment-img" src="{{asset('assets/patient-panel/new-d/images/patient/appointment3.png')}}" alt="image">

            </div>
            <div class="col-md-4"></div>
        </div>
</section>


<section class="section-space full-width-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid appointment-img1" src="{{ asset('assets/img/layer1-background.png') }}" alt="image">
                <a href="https://nimativs.com" target="_blank">
                    <img class="img-fluid appointment-img2 hover-animate" src="{{ asset('assets/patient-panel/new-d/images/logo-phone-footer.png') }}" alt="image">
                </a>
            </div>
        </div>
    </div>
  </section>

<style>
    .hover-animate {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .hover-animate:hover {
        transform: scale(1.1); /* Zoom effect */
        opacity: 0.8; /* Slight opacity change */
    }
</style>


<br><Br><br><br><Br>
@endsection
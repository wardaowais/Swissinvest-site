@extends('patient.layouts.app')
@section('content')

<style>
    .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl {
        padding: 0 0rem;
    }
    .hero-section {
    position: relative;
    padding: 1pc !important;
    background-size: cover;
    background-position: top;
}

.call-icon-one {
    margin-left: -2px;
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
    .profile-img{
        width: 15%;
    }

     .social-icon-img{
        width: 45%;
    }
    .th-btn {
    position: relative;
    z-index: 2;
    overflow: hidden;
    vertical-align: middle;
    text-align: center;
    font-family: var(--body-font);
    display: -webkit-inline-box;
    display: -webkit-inline-flex;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    text-transform: capitalize;
    border: none;
    font-size: 12px;
    font-weight: 400;
    padding: 11px 35px;
    border-radius: 18px;
    -webkit-transition: all 0.3s 0s ease-out;
    transition: all 0.3s 0s ease-out;
    gap: 8px;
}
.shape-img {
        background-image: url('../images/tele-medicine/shape.png');
        position: relative;
        /* margin-top: -25pc; */
        padding: 2pc;
        color: #fff;
        display: none;
        background-size: ;
        background-position: top;
    }
    .hero-section-two {
    position: relative;
    padding: 5pc;
    color: #fff;
    /* background-image: url('../images/tele-medicine/banner.png'); */
    background-size: cover;
    background-position: top;
    /* height: 46pc; */
}

    
.appointment-img1 {
    margin-top: 3pc;
    width: 100% !important;
}
}

@media (min-width: 1850px) and (max-width: 4000px) {
    .hero-section-two {
        position: relative;
        padding: 5pc;
        color: #fff;
        background-size: auto;
        background-position: top;
    }
}


.appointment-img1{
    margin-top: 3pc;
    width: 44%;
}

.shape-img{
    padding: 20px !important;
    margin-top: -10pc !important;
}
</style>
<!-- [ breadcrumb ] start -->

<section class="hero-section-two position-relative mt-2">
  <div class="container-fluid">
      <div class="row align-items-center">
          <div class="col-lg-6 banner-contentt" >
              <div class="hero-content-two text-white" style="margin-left:1pc">
                <img src="{{asset('assets/patient-panel/new-d/images/tele-medicine/logo.png')}}" class="img-fluid ">


                  <h1 class="banner-text" >Healthcare Anytime Anywhere</h1>
                  <a href="#" class="style3 th-btn th-icon mb-2">
                    Book Your Online Consultation Now<i class="fas fa-arrow-right"></i>
                </a>

              </div>
          </div>
          <div class="col-lg-6">
        <img src="{{asset('assets/patient-panel/new-d/images/tele-medicine/logo-icon.png')}}" class="logo-icon" style="float: inline-end;margin-top:-11pc" class="img-fluid">
    
          </div>
      </div>
  </div>

  <!-- Background Image -->
  <div class="bg-overlay-two"></div>
</section>
<div class="shape-img">
  <div class="row">
    <div class="col-md-6 d-flex " style="gap: 4pc;margin-top:7pc;">
      <div class="text-center">
        <img src="{{asset('assets/patient-panel/new-d/images/tele-medicine/message.png')}}" class="img-fluid social-icon-img">
        <p>Message</p>
      </div>
      <div class="text-center">
        <img src="{{asset('assets/patient-panel/new-d/images/tele-medicine/invite.png')}}" class="img-fluid social-icon-img">
        <p>Invite</p>
      </div>
      <div class="text-center">
        <img src="{{asset('assets/patient-panel/new-d/images/tele-medicine/mute.png')}}" class="img-fluid social-icon-img">
        <p>Mute</p>
      </div>
      <div class="text-center">
        <img src="{{asset('assets/patient-panel/new-d/images/tele-medicine/camera.png')}}" class="img-fluid social-icon-img">
        <p>Camera</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="call-container-one callbutton"  style="">
           
        <div class="call-icon-one" style="margin-left: 0px;">
            <img src="{{asset('assets/patient-panel/new-d/images/tele-medicine/phone.png')}}" alt="Call Icon">
        </div>
    </div>
      <img src="{{asset('assets/patient-panel/new-d/images/tele-medicine/banner-profile.png')}}" class="img-fluid profile-img" style="float: inline-end;margin-top:-8pc" >
      <div class="me d-flex mt-5" style="float: inherit;margin-right: 2pc;
    justify-self: self-end;">

      <img src="{{asset('assets/patient-panel/new-d/images/tele-medicine/time.png')}}" class="img-fluid" >
        <div >  00:45</div>
      </div>
      
      
      <a href="#" class="style3 th-btn th-icon mt-4" style="float: inline-end">
        
      Register Now
    </a>
    </div>
  </div>
</div>






<section class="section-space2">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <br><br><br><br>
              <div class="blog-grid_content">
                  <h1 class="tele-heading">What is Telemedicine?</h1>
                  <br>
                  <h3 class="tele-heading">Get Medical Care Without Leaving Your Home</h3>
                 
                 <p>Telemedicine allows you to consult with our healthcare professionals from the comfort of your own home. Whether you need a routine check-up, prescription refills, or advice on a specific health issue, our doctors are here to help via video calls, phone consultations, or secure messaging.</p>
                 <a href="{{url('patients/telemedicine-details')}}" class="btn btn-primary">Details Telemedicine</a>
              </div>
          </div>
          <div class="col-md-6 mb-5" style="text-align: center">
            <br><br><br><br>
              <img class="img-fluid " src="{{asset('assets/patient-panel/new-d/images/tele-medicine/about.png')}}"  alt="image">

          </div>
      </div>
  </div>
</section>

<section class="section-space1 mt-5" style="background: white">
  <div class="container">
      <div class="row">
      <br><br>
        <div class="col-md-6">
            <img class="img-fluid " src="{{asset('assets/patient-panel/new-d/images/tele-medicine/work.png')}}" alt="image">

        </div>
          <div class="col-md-6">
              <div class="step mt-3">
                <h2>1: Choose Your Doctor</h2>
                <p>Browse our list of certified healthcare professionals and select
                    the one that best suits your needs.</p>
            </div>
        
            <div class="step mt-3">
                <h2>2: Book an Appointment</h2>
                <p>Select a time that works for you and book your
                    consultation online</p>
            </div>
        
            <div class="step mt-3">
                <h2>3: Consult Online</h2>
                <p>Join your appointment via video call, phone, or chat. Discuss
                    your health concerns and receive expert advice.</p>
            </div>
        
            <div class="step mt-3">
                <h2>4: Receive Your Treatment Plan</h2>
                <p>After the consultation, your doctor will provide a
                    personalized treatment plan, and if necessary, send your
                    prescriptions to your preferred pharmacy.</p>
            </div>
          </div>
        
      </div>
  </div>
</section>

<br>
<section class=" overflow-hidden space shape-mockup-wrap section-space2">
  <br><br><br>
  <div class="container">
      <div class="title-area text-center">
          <h1 class="patient-text-color category-text" style="text-align: justify;">Why Choose Telemedicine </h1>
      </div>
      <div class="row gy-4 gx-4 mt-4">
          <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="destination-item-one  th-ani">
                  <div class="destination-item_img global-img"><img
                          src="{{asset('assets/patient-panel/new-d/images/tele-medicine/1.png')}}" class="service-img-size" alt="image"></div>
                  <div class="destination-content">
                      <h3 class="category-heading mt-3">Quick Access</h3>
                      <p class="category-paragraph">Same-day appointments and 24/7 availability.
                      </p>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="destination-item-one  th-ani">
                  <div class="destination-item_img global-img"><img
                          src="{{asset('assets/patient-panel/new-d/images/tele-medicine/2.png')}}"  class="service-img-size" alt="image"></div>
                  <div class="destination-content">
                      <h3 class="category-heading mt-3">Affordable Care</h3>
                      <p class="category-paragraph">Competitive pricing for virtual consultations, with insurance options available.
                      </p>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="destination-item-one  th-ani">
                  <div class="destination-item_img global-img"><img
                          src="{{asset('assets/patient-panel/new-d/images/tele-medicine/3.png')}}" class="service-img-size" alt="image"></div>
                  <div class="destination-content">
                      <h3 class="category-heading mt-3">Secure & Private</h3>
                      <p class="category-paragraph">Our platform uses encrypted, HIPAA-compliant technology to ensure your privacy</p>

                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="destination-item-one  th-ani">
                  <div class="destination-item_img global-img"><img
                          src="{{asset('assets/patient-panel/new-d/images/tele-medicine/4.png')}}" class="service-img-size" alt="image"></div>
                  <div class="destination-content">
                      <h3 class="category-heading mt-3">Conditions We Treat</h3>
                      <p class="category-paragraph">Telemedicine is ideal for non-emergency conditions. Here are some common issues we can help with:</p>
                  </div>
              </div>
          </div>
      </div>
<br><br>
      <div class="title-area text-center">
        <h2 class="patient-text-color category-text"  style="text-align: justify;">Conditions We Treat</h2>
        <h5  style="text-align: justify;">Telemedicine is ideal for non-emergency conditions.</h5>
    </div>
    <div class="row gy-4 gx-4 mt-4">
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="destination-item-one th-ani">
                <div class="destination-item_img global-img"><img
                        src="{{asset('assets/patient-panel/new-d/images/tele-medicine/5.png')}}"  class="service-img-size" alt="image"></div>
                <div class="destination-content">
                    <h3 class="category-heading mt-3">General Consultations</h3>
                    <p class="category-paragraph">Cold, flu, fever, allergies
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="destination-item-one  th-ani">
                <div class="destination-item_img global-img"><img
                        src="{{asset('assets/patient-panel/new-d/images/tele-medicine/6.png')}}" class="service-img-size" alt="image"></div>
                <div class="destination-content">
                    <h3 class="category-heading mt-3">Chronic Conditions</h3>
                    <p class="category-paragraph">Diabetes, hypertension, asthma management
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="destination-item-one  th-ani">
                <div class="destination-item_img global-img"><img
                        src="{{asset('assets/patient-panel/new-d/images/tele-medicine/7.png')}}" class="service-img-size" alt="image"></div>
                <div class="destination-content">
                    <h3 class="category-heading mt-3">Mental Health</h3>
                    <p class="category-paragraph">"Stress, anxiety, depression</p>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="destination-item-one  th-ani">
                <div class="destination-item_img global-img"><img
                        src="{{asset('assets/patient-panel/new-d/images/tele-medicine/8.png')}}" class="service-img-size" alt="image"></div>
                <div class="destination-content">
                    <h3 class="category-heading mt-3">Skin Issues</h3>
                    <p class="category-paragraph">Rashes, acne, eczema</p>
                </div>
            </div>
        </div>
      

    </div>
    <div class="row mt-4">
      <div class="col-md-3"></div>
      <div class="col-xl-3 col-lg-3 col-md-6">
        <div class="destination-item-one  th-ani">
            <div class="destination-item_img global-img"><img
                    src="{{asset('assets/patient-panel/new-d/images/tele-medicine/9.png')}}" class="service-img-size" alt="image"></div>
            <div class="destination-content">
                <h3 class="category-heading mt-3">Women Health</h3>
                <p class="category-paragraph">Menstrual issues, menopause advice, pregnancy guidance</p>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6">
        <div class="destination-item-one  th-ani">
            <div class="destination-item_img global-img"><img
                    src="{{asset('assets/patient-panel/new-d/images/tele-medicine/10.png')}}" class="service-img-size" alt="image"></div>
            <div class="destination-content">
                <h3 class="category-heading mt-3">Prescription Refills</h3>
                <p class="category-paragraph">Easy access to medication renewals</p>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>

    </div>
<Br><br>

  </div>
</section>

<br><br><br><br>
<section class="section-space1">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <div class="blog-grid_content">
                  <h1 class="doctor-text">Telemedicine Visits Vs In person Visits</h1>
                  <br>
                  <h3 class="tele-normal-heading">Telemedicine Visits</h3>
                  <p >Perfect for non-urgent issues, follow-ups, and consultations. Available from anywhere.</p>
                  <br>
                  <h3 class="tele-normal-heading">In Person Visits</h3>
                  <p >Recommended for emergencies, physical exams, and specific procedures. Book an appointment for face-to-face care if needed.</p>
              </div>
          </div>
          <div class="col-md-6">
              <img class="img-fluid" src="{{asset('assets/patient-panel/new-d/images/tele-medicine/visit1.png')}}" style="margin-right: 10px;" alt="image">
              <img class="img-fluid" src="{{asset('assets/patient-panel/new-d/images/tele-medicine/visit2.png')}}"  alt="image">
          </div>
      </div>
  </div>
</section>
<br><Br>

<section class=" overflow-hidden space shape-mockup-wrap section-space2">
  <div class="container">
    <br><br><br>
      <div class="title-area text-center">
          <h1 class="patient-text-color category-text " style="text-align: justify">Meet Our Doctors </h1>
      </div>
      <div class="row gy-4 gx-4 mt-4">
          <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="destination-item-one  th-ani" style="background: transparent">
                  <div class="destination-item_img global-img"><img
                          src="{{asset('assets/patient-panel/new-d/images/tele-medicine/doc1.png')}}" alt="image"></div>
                  <div class="destination-content" style="    text-align: start;">
                      <h3 class="tele-normal-heading mt-3">Dr Annie Marie</h3>
                      <p class="category-paragraph">Pediatrician<br>
                        MBBS, MD, DO
                      </p>
                  </div>
              </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6" >
              <div class="destination-item-one  th-ani"  style="background: transparent">
                  <div class="destination-item_img global-img"><img
                          src="{{asset('assets/patient-panel/new-d/images/tele-medicine/doc2.png')}}" alt="image"></div>
                  <div class="destination-content" style="    text-align: start;">
                      <h3 class="tele-normal-heading mt-3">Dr Henery Adam</h3>
                      <p class="category-paragraph">Cardiothoracic Surgeon<br>MBBS, MD, DO
                      </p>
                  </div>
              </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="destination-item-one  th-ani"  style="background: transparent">
                  <div class="destination-item_img global-img"><img
                          src="{{asset('assets/patient-panel/new-d/images/tele-medicine/doc3.png')}}" alt="image"></div>
                  <div class="destination-content" style="    text-align: start;">
                      <h3 class="tele-normal-heading mt-3">Dr Thomas Adison</h3>
                      <p class="category-paragraph">Otolaryngologist<br>MBBS, MD, DO</p>

                  </div>
              </div>
          </div>
          
     
      </div>
      <center>
      <a href="#" class="style3 th-btn th-icon mt-4">
        Start Your Telemedicine Consultation<i class="fas fa-arrow-right"></i>
    </a>&nbsp;&nbsp;&nbsp;
    <a href="#" class="style3 th-btn th-icon mt-4">
     Subscribe
  </a>
      </center>
      <br><br>
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
</script>
<br><br><br>
<!-- [ Main Content ] end -->
@endsection
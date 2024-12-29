@extends('patient.layouts.app')
@section('content')

<style>
    .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl {
        padding: 0 0rem;
    }

  
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
.error-text {
    font-size: 23px;
    font-weight: 600;
    color: #000;
    line-height: 44px;
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
.appointment-img1{
    margin-top: 3pc;
    width: 44%;
}
.custom-margin {
    margin-right: 0 !important;
}


</style>

<!-- [ breadcrumb ] start -->
<section class="hero-section-one position-relative mt-5">
  <div class="container-fluid">
      <div class="row align-items-center">
          <div class="col-lg-6">
              <div class="hero-content-one text-white" style="margin-left:2pc">
                <img src="{{asset('assets/patient-panel/new-d/images/phone-consultation/logo.png')}}" class="img-fluid logo-new">
                <br>

                  <h1 class="banner-text-phone" style="color:black">Dial Phone Medical Consultations </h1>
                  <h2 class="consultation">We are here 24/7, consultations by phone </h2>
                    <p style="color:black;font-weight:600">Online payments</p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="payment-section">
                          <h5 style="color:black">
                            Credit Card Information
                            <span class="toggle-icon" onclick="toggleCardInfo()">&#x25B6;</span>
                        </h5>
                        
                          <div class="card-info-container" id="card-info-container" >
                              <form>
                                  <div class="card-info">
                                      <label for="card-number">Card Number:</label>
                                      <input type="text" id="card-number" placeholder="1234 5678 9012 3456">
                                  </div>
                                  <div class="card-info">
                                      <label for="card-owner">Card Owner:</label>
                                      <input type="text" id="card-owner" placeholder="John Doe">
                                  </div>
                                  <div class="card-info">
                                      <label for="expiry-date">Expiry Date:</label>
                                      <input type="text" id="expiry-date" placeholder="MM/YY">
                                  </div>
                                  <button class="add-card-btn">Add New Card</button>
                              </form>
                          </div>
                      </div>
                      </div>
                      <div class="col-md-6 mt-5">
                        <h5 class="banner-new-content1" style="background:#8FCCE6;padding:1pc;font-size:18px;color:black; line-height:1.6;">
                          Call Directly the Web Phone : 
                          <span style="color:#FF0000"> 4.25 Frs / min </span> to 19h00 & 
                          <span style="color:#FF0000">8.30 Frs </span>/ min from 19h00 to 07h00
                      </h5>
                      
                      </div>
                    </div>
                   
                  

              </div>
          </div>
          <div class="col-lg-6">
            <br>
           <img src="{{asset('assets/patient-panel/new-d/images/phone-consultation/logo2.png')}}" class="small-logo" style="    width: 10%;
    margin-bottom: -4pc;
    margin-left: 4pc;
    position: absolute;" class="img-fluid">
        <img src="{{asset('assets/patient-panel/new-d/images/phone-consultation/banner.png')}}" class="img-fluid bannerimg">
        <h4 class="text-center text-black">Click and Call here!</h2>
          <div class="call-container">
            <Center>
                <img src="{{asset('assets/patient-panel/new-d/images/phone-consultation/action.png')}}" class="img-fluid">
            </Center>
            <a href="tel:433434343">
            <div class="call-icon">
             
                <img src="{{asset('assets/patient-panel/new-d/images/phone-consultation/call.png')}}" alt="Call Icon">
            </div>
          </a>

        </div>
        
      
          


          </div>
      </div>
  </div>

  <!-- Background Image -->
  {{-- <div class="bg-overlay-one"></div> --}}
</section>

<section class="section-space1">
  <div class="container">
      <div class="row">
          <div class="col-md-12 d-flex align-items-center" style="    display: flex !important; flex-wrap: wrap;align-content: flex-end;justify-content: center;">
              <img class="img-fluid  custom-margin" src="{{asset('assets/patient-panel/new-d/images/phone-consultation/phone-icon.png')}}" alt="image">
              <h1 class="phone-text mb-1" style="margin-left: 40px;"> 0900 0900 90 *</h1>

          </div>
          <div class="col-md-2">

          </div>
          <div class="col-md-8">
            <h4 class="emergency-text"><b>For vital emergencies, call 144</b></h4>

          </div>
          <div class="col-md-1"></div>

      </div>
  </div>
</section>
<br>

<section class="section-space1">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <div class="contact-details">
             <p class="paragrpah-text" style="font-size: 25px">If you know your contact extension please dial it now OR press # to talk with a doctor </p>
              <p class="paragrpah-text" style="font-size: 25px">*by dialling this premium number you will be charged 4.95 Frs/min from 07h00 to    
                19h00 and 9.95 Frs/min from 19h00 to 07h00 </p>
          </div>
          </div>
      </div>
  </div>
        

</section>


<section class="section-space1">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <br><br>
              <div class="blog-grid_content">
                  <h3 class="doctor-text">Doctors practicing in Switzerland <br> are available to help you in 7 languages:</h3>
                 
                  <ul class="main-doctor-languages">
                    <li class="doctor-li">French</li>
                    <li class="doctor-li">German</li>
                    <li class="doctor-li">Italian</li>
                    <li class="doctor-li">English</li>
                    <li class="doctor-li">Spanish</li>
                    <li class="doctor-li">Portuguese</li>
                    <li class="doctor-li">Arabic</li>
                </ul>
                <a href="{{url('patients/phone-consulation-details')}}" class="btn btn-primary">Phone Consultant Details</a>
              </div>
          </div>
          <div class="col-md-6" style="text-align: center">
            
              <img class="img-fluid " src="{{asset('assets/patient-panel/new-d/images/phone-consultation/doctors.png')}}" style="width:70%" alt="image">

          </div>
      </div>
  </div>
</section>

<br><br>
<section class="section-space1">
  <div class="container">
      <div class="row">
        <br><br><br><br>  <br>
          <div class="col-md-6">
              <br><br>
              <div class="blog-grid_content">
                  <h3 class="doctor-text">Accessible from abroad</h3>
                  <Br>
                  <p class="abroad">Telephone or telemedicine  </p>
                  <p class="abroad">medical consultation with a doctor </p>
                  <p class="abroad"> practicing in Switzerland.  </p>

                 
        
              </div>
          </div>
          <div class="col-md-6" style="text-align: center">
              <img class="img-fluid " src="{{asset('assets/patient-panel/new-d/images/phone-consultation/abroad.png')}}" style="width:85%"  alt="image">

          </div>
      </div>
  </div>
</section>

<br><br><br><br>
<section class="section-space1">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <div class="blog-grid_content">
                  <h3 class="doctor-text">Diagnostic and second medical opinion</h3>
                  <Br>
                  <p class="error-text">The doctor is capable of making decisions based on the description of your symptoms. They will be able to provide you with a prescription, put you on medical leave for a defined period, or refer you to a colleague better suited to manage your condition.  </p>


                 
        
              </div>
          </div>
          <div class="col-md-6" style="text-align: center">
              <img class="img-fluid " src="{{asset('assets/patient-panel/new-d/images/phone-consultation/medical-error.png')}}" style="width:70%"  alt="image">

          </div>
      </div>
  </div>
</section>

<section class="section-space1">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
            <br><br><br>

              <div class="blog-grid_content">
                  <h3 class="doctor-text">E-Medicine</h3>
                 <br>
                  <ul class="main-doctor-languages">
                    <li class="doctor-li">Medical Certificate</li>
                    <li class="doctor-li">Sick Leave</li>
                    <li class="doctor-li">Medical prescription</li>
                    <li class="doctor-li">Recommendations</li>
                    <li class="doctor-li">Second medical opinion</li>

                </ul>
              </div>
          </div>
          <div class="col-md-6" style="text-align: center">
            <br><br><br>
              <img class="img-fluid " src="{{asset('assets/patient-panel/new-d/images/phone-consultation/e-medicine.png')}}" style="width:100%" alt="image">

          </div>
      </div>
  </div>
</section>

<br><br><br><br><br><br>
<section class="section-space1">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <div class="blog-grid_content">
                  <h3 class="doctor-text">Enjoy your vacation, take care of yourself anywhere in the world!</h3>
                  <Br>
                  <p class="error-text">The doctor is capable of making decisions based on the description of your symptoms. They will be able to provide you with a prescription, put you on medical leave for a defined period, or refer you to a colleague better suited to manage your condition. <br> Moreover, the doctors are reimbursed by your basic health insurance,with no additional costs as you are insured in Switzerland. </p>
              </div>
          </div>
          <div class="col-md-6" style="text-align: center">

              <img class="img-fluid vacaction-grid" src="{{asset('assets/patient-panel/new-d/images/phone-consultation/vacaction.png')}}" style="width:77%"  alt="image">
              <img class="img-fluid vaction-img" src="{{asset('assets/patient-panel/new-d/images/phone-consultation/air.png')}}" style=""  alt="image">


          </div>
      </div>
  </div>
</section>

<br><br>
<section class="section-space1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table>
          <thead>
            <tr>
              <th class="compare-text">Compare Both allo! </th>
              <th style="background: white;width:30%;"> <img class="img-fluid price-img" src="{{asset('assets/patient-panel/new-d/images/phone-consultation/drch2.png')}}"  alt="image">              </th>
              <th style="width:30%;">  <img class="img-fluid price-img " src="{{asset('assets/patient-panel/new-d/images/phone-consultation/drch1.png')}}"   alt="image">
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="compare">Faster</td>
              <td class="negative">X</td>
              <td class="positive">✓</td>
            </tr>
            <tr>
              <td class="compare">Simple Consultation</td>
              <td class="negative">X</td>
              <td class="positive">✓</td>
            </tr>
            <tr>
              <td class="compare">More Doctors Availability</td>
              <td class="negative">X</td>
              <td class="positive">✓</td>
            </tr>
            <tr>
              <td class="compare">Flexible</td>
              <td class="negative">X</td>
              <td class="positive">✓</td>
            </tr>
            <tr>
              <td class="compare">Need App Or Pc</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
            <tr>
              <td class="compare">Covered By Lamel</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
            <tr>
              <td class="compare">Satisfy all kinds of consultations</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
            <tr>
              <td class="compare">Can see the doctor</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
            <tr>
              <td class="compare">Follow Up</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
            <tr>
              <td class="compare">Complex Second Opinion</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
            <tr>
              <td class="compare">Specialist Online</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
            <tr>
              <td class="compare">Extrem Privacy</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
            <tr>
              <td class="compare">Management of medical documents</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
            <tr>
              <td class="compare">More languages</td>
              <td class="positive">✓</td>
              <td class="negative">X</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
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
<br><br>

<style>
  .hover-animate {
      transition: transform 0.3s ease, opacity 0.3s ease;
  }

  .hover-animate:hover {
      transform: scale(1.1); /* Zoom effect */
      opacity: 0.8; /* Slight opacity change */
  }
</style>




<script>
  function toggleCardInfo() {
    var container = document.getElementById("card-info-container");
    var icon = document.querySelector(".toggle-icon");
    if (container.style.display === "none") {
        container.style.display = "block"; // Show the card info
        icon.innerHTML = "&#x25BC;"; // Change icon to down arrow
    } else {
        container.style.display = "none"; // Hide the card info
        icon.innerHTML = "&#x25B6;"; // Change icon to right arrow
    }
}

</script>
<br><br><br>
<!-- [ Main Content ] end -->
@endsection
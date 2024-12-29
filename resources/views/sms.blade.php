@extends('layouts.app')

@section('content')
<style>
    
/* sms page starts from here  */
.sms-page-second{
    height: auto;
    width: 100%;
    max-width: 1030px;
    margin: 20px auto;
}
.sms-page-second h4{
    font-size: 30px;
    font-weight: 600;
    color: #141B29;
    padding-bottom: 10px;
}
.sms-page-second p{
    font-size: 14px;
    color: #141B29;
    font-weight: 400;
    line-height: 25px !important;
    word-spacing: 5px;
}
.booking-schedule-main {
    max-width: 1030px;
    width: 100%;
    margin: 0 auto;
}
.sms-notification-area h5, .booking-schedule-inner h5{
    font-size: 20px;
    font-weight: 600;
    color: #141B29;
}

.sms-second-bg {
    height: 250px;
    border-radius: 20px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-bottom: 20px;
    padding: 20px;
}
.booking-schedule-main h5{
    font-size: 22px;
    color: #141B29;
    font-weight: 600;
}

.booking-schedule-inner{
    background-color: #E8F1F5;
    border-radius: 20px;
    padding: 20px;
}
.booking-schedule-inner-left, .booking-schedule-inner-right{
    background-color: #fff;
    border-radius: 15px;
    padding: 20px;
    margin-top: 10px;
}

.booking-schedule-inner-left h5, .booking-schedule-inner-right h5{
    font-size: 15px;
    font-weight: 600;
    color: #000;
}
.booking-schedule-inner-left h5 span, .booking-schedule-inner-right h5 span{
    font-size: 10px;
    font-weight: 400;
    color: #009688;
}

.booking-schedule-inner-left ul,.booking-schedule-inner-right ul{
    list-style: disc;
    margin-left: 20px;
    font-size: 13px;
    font-weight: 400;
    margin-top: 10px;
}
/* .booking-schedule-inner-left ul li,.booking-schedule-inner-right ul li{
    list-style: disc;
    margin-left: 20px;
} */

.booking-subs-btn{
    border: none;
    width: 110px;
    padding: 8px 10px;
    border-radius: 5px;
    background-color: #E50F25;
    color: #fff;
    font-size: 14px;
}

.sms-notification-area-right {
    height: 250px;
    border-radius: 20px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-bottom: 20px;
    padding: 20px;
}
.sms-notification-area{
    margin-top: 30px;
}
.sms-notification-area-left{
    background-color: #fff;
    border-radius: 20px;
}
.sms-notification-area-left-inner{
    background-color: #F8F8F8;
    border-radius: 20px;
    padding: 10px;
}

.sms-notification-area-left-inner img{
    height: 45px;
    width: 45px;
    border-radius: 50%;
    margin-right: 15px;
}
.sms-notification-area-left-inner h3{
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin: 0;
}
.sms-notification-area-left-inner p{
    font-size: 10px;
    font-weight: 400;
    color: #333;
    margin: 0;
}

.sms-notification-area-left .subs-status{
    margin: 0;
    margin-top: 10px;
    font-size: 10px;
    text-align: right;
    font-weight: 400;
    margin-right: 10px;
    color: #009688;
}
.sms-notification-area-left-inner-two{
    padding: 0px 10px;
    margin: 10px 0;
}
.sms-notification-area-left-inner-two img{
    height: 45px;
    width: 45px;
    border-radius: 50%;
    margin-right: 15px;
}

.sms-notification-area-left-inner-two h3{
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin: 0;
}
.sms-notification-area-left-inner-two p{
    font-size: 10px;
    font-weight: 400;
    color: #333;
    margin: 0;
}

.doc-note{
    font-size: 13px !important;
    line-height: 20px;
    color: #333333;
    margin: 8px 0 !important;
}

.warn-btn{
    width: 150px;
    padding: 5px 10px;
    border-radius: 10px;
    font-size: 12px;
    font-weight: 600;
    text-align: center;
    background-color: #0C6BFF;
    color: #fff;
}
.renew-warning p {
    margin: 0;
    font-size: 10px;
    color:#FF0000;
    font-weight: 400;
}
.subs-time-date p{
    font-size: 12px;
    color: #808080;
}
.sms_plab_fp {
    width: 100%;
    max-width: 1030px;
    margin: 0 auto;
}
.subs-time{
    font-size: 14px !important;
    color: #9CADCE !important;
}
.upcoming-appoinments-main {
    padding: 30px 0;
}
.upcoming-appoinments-main h3{
    font-size: 22px;
    color: #141B29;
    font-weight: 600;
    margin-top: 10px;
    margin-bottom: 5px;
}
.upcoming-appoinments h3{
    color: #141B29;
    font-size: 20px;
    font-weight: 600;
}

.upcoming-appoinments{
    height: auto;
    width: 100%;
    background-color: #E8F1F5;
    border-radius: 20px;
    padding: 15px 5px 15px 10px;
}
.upcoming-appoinments table{
    width: 100%;
    background-color: #E8F1F5;
    border-radius: 20px;
    color: #141B29;
    padding: 30px;
}
.upcoming-appoinments table tr td, .upcoming-appoinments table tr th{
    padding: 7px 10px;
    width: auto;
    text-align: center;
}
.upcoming-appoinments table tr th{
    padding-bottom: 15px;
}

@media screen and (max-width: 767px) {
    .booking-schedule-inner {
        padding: 20px 10px;
    }
    .booking-schedule-inner-left, .booking-schedule-inner-right {
        padding: 15px 10px;
    }
    .booking-subs-btn{
        width: 80px;
        font-size: 12px;
    }
    .booking-schedule-inner-left h5, .booking-schedule-inner-right h5{
        font-size: 16px;
    }
    .warn-btn{
        width: 130px;
        font-size: 10px;
        padding: 5px;
    }
    .sms-notification-area-right{
        margin-top: 20px;
    }
    .upcoming-appoinments table tr th{
        padding-bottom: 0;
    }
    .upcoming-appoinments table tr td, .upcoming-appoinments table tr th{
        padding: 5px;
    }
    .booking-schedule-main h5{
        font-size: 18px;
    }
    .upcoming-appoinments-main h3{
        font-size: 16px;
    }
}

/* sms page starts from here  */
</style>
<div class="my-dashboard">
  <div class="marquee-area sms_plab_fp">
                  <ul>
                    <li><span>Page Feature:</span></li>
                    <li><p><marquee behavior="" direction="">Verified members can send SMS notifications and
                            reminders to patients through the 'SMS' menu. They can manage their
                            contacts and schedule messages.</marquee></p></li>
                  </ul>
        </div>
        <div style="background-image: url('{{asset('assets/doctor-panel/imgs/job-list-banner.png')}}');" class="job-list-banner"></div>

        <div class="sms-page-main">
          <div class="sms-page-second">
              <div class="row">
                  <div class="col-md-6">
                      <h4>How SMS Works :</h4>
                      <p>A paid SMS service for a medical website lets doctors send patients appointment reminders, test results, and health tips via text. It's fast, secure, and ensures patients stay informed. By automating messages through an SMS provider, healthcare centers improve engagement while staying compliant with data privacy rules. Simple and efficient, it keeps communication clear and patients on track with their care.</p>
                  </div>
                  <div class="col-md-6">
                      <div class="sms-second-bg" style="background-image: url('{{asset('assets/doctor-panel/imgs/job-list-banner.png')}}');"></div>
                  </div>
                </div>
          </div>
          <!-- booking schedule  -->
           <div class="booking-schedule-main">
              <h3>Booking Schedule</h3>
              <div class="booking-schedule-inner">
                  <h5>Select Any Premium</h5>
                  <div class="row">
                    @foreach ($plans as $plan)
                      <div class="col-md-6">
                          <div class="booking-schedule-inner-left ">
                              <div>
                                  <div class="d-flex align-items-start justify-content-between">
                                      <h5><h5>{{ $plan->name }} {{ $plan->duration }} Subscription</h5> <span style="font-size: 13px">${{ $plan->amount }} Per {{ $plan->duration }}</span></h5>
                                      <a href="{{route('stripe.checkout',['price'=>$plan->amount,'product'=>$plan->name,'plan_id'=>$plan->id,'feature'=>$plan->feature,])}}" class="booking-subs-btn btn">Pay Now</a>
                                  </div>
                                  <ul>
                                    @foreach (explode('•', $plan->details) as $detail)
                                        @if (!empty(trim($detail)))
                                            <li>{{ trim($detail) }}</li>
                                        @endif
                                    @endforeach
                                  </ul>
                              </div>
                              
                          </div>
                      </div>
                      @endforeach
                  </div>
                  <!-- notification area  -->
                  <div class="sms-notification-area">
                      <h5>Notification</h5>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="sms-notification-area-left p-2">
                                  <div class="sms-notification-area-left-inner d-flex align-items-center justify-content-between">
                                      <div class="d-flex align-items-center ">
                                          <img src="{{asset('assets/doctor-panel/imgs/chats-avatar-2.png')}}" alt="">
                                          <div>
                                              <h3>Doctor John</h3>
                                              <p>From doctor</p>
                                          </div>
                                      </div>
                                      <div>
                                          <a href="#" style="text-align: right; float: right;" data-bs-toggle="dropdown" aria-expanded="false"><span class="contact-three-dot">...</span></a>
                                          <div class="dropdown-new">
                                              <ul class="dropdown-menu">
                                                  <a class="dropdown-item" href="#">
                                                      Make Best
                                                  </a>
                                                  <a class="dropdown-item" href="#">
                                                      Block
                                                  </a>
                                              </ul>
                                          </div>
                                          <p>10/10/2024  9:45 Pm</p>
                                      </div>
                                  </div>
                                  <p class="subs-status">Monthly Subscription</p>
                                  <div class="sms-notification-area-left-inner-two">
                                      <div class="d-flex align-items-center ">
                                          <img src="{{asset('assets/doctor-panel/imgs/chats-avatar-2.png')}}" alt="">
                                          <div>
                                              <h3>Doctomed </h3>
                                              <p>10 Oct 2024 - 12:00 pm</p>
                                          </div>
                                      </div>
                                      <p class="doc-note">Your appointment with Dr. [Doctor's Name] is scheduled for 10:00 AM tomorrow at [Clinic Name]. Please arrive a few minutes early. If you need to reschedule, call us at [Contact Number].
                                          Let me know if you need adjustments!</p>
                                  </div>
                                  <div class="sms-notification-area-left-inner-two">
                                      <div class="d-flex align-items-center ">
                                          <img src="{{asset('assets/doctor-panel/imgs/chats-avatar-2.png')}}" alt="">
                                          <div>
                                              <h3>Doctomed </h3>
                                              <p>11 Oct 2024 - 9:00 pm</p>
                                          </div>
                                      </div>
                                      <p class="doc-note">Your appointment with Dr. [Doctor's Name] is scheduled for 10:00 AM Today at .....</p>
                                  </div>
                                  <div class="renew-warning d-flex align-items-center justify-content-between p-2">
                                      <p>15 Days left before your Monthly Subscription Expires</p>
                                      <a href="#"><div class="warn-btn">Renew Subscription</div></a>
                                  </div>
                                  <div class="subs-time-date d-flex align-items-center justify-content-between p-2">
                                      <p class="subs-time"><i class="fa-solid fa-clock"></i> <b>14:35:30</b></p>
                                      <p>9 September, 2022</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="sms-notification-area-right" style="background-image: url('{{asset('assets/doctor-panel/imgs/sms-notification.png')}}');"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- upcoming appointments -->
               <div class="upcoming-appoinments-main">
                  <h3>Upcoming Appointments and Details</h3>
                  <div class="upcoming-appoinments">
                      <table>
                          <tr>
                              <th class="text-start">No#</th>
                              <th>Name</th>
                              <th>Appointment</th>
                              <th>Subscription</th>
                              <th>Last Appointment</th>
                          </tr>
                          <tr>
                              <td class="text-start">01</td>
                              <td class="">Altaf Hassan</td>
                              <td class="">Next Meeting 06:30 am</td>
                              <td>Monthly</td>
                              <td>14 Sep 2023</td>
                          </tr>
                          <tr>
                              <td class="text-start">02</td>
                              <td class=" ">Alice Jordan</td>
                              <td class=" ">Next Meeting 06:30 am</td>
                              <td>Monthly</td>
                              <td>08 Jan 2024</td>
                          </tr>
                          <tr>
                              <td class="text-start">03</td>
                              <td>Nesha</td>
                              <td>Next Meeting 06:30 am</td>
                              <td>Monthly</td>
                              <td>01 Feb 2023</td>
                          </tr>
                          <tr>
                              <td class="text-start">04</td>
                              <td>Lenda</td>
                              <td>Next Meeting 06:30 am</td>
                              <td>Yearly</td>
                              <td>01 Feb 2024</td>
                          </tr>
                          
                      </table>
                 </div>
               </div>
           </div>
        </div>
    

        <!-- chats banner 2 -->
        <div class="section_top_img col-12">
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
        </div>
        <div class="dash-ad d-none" style="margin-top: 20px;">
            <div class="dash-ad">
                <div id="bannerSlider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                @if($slider->banner_name)
                                    <div class="section_top_img">
                                         <a href="{{ $slider->banner_name }}" target="_blank">
                                                <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" class="img-fluid">
                                            </a>
                                    </div>
                                    
                                @else
                                    <div class="section_top_img">
                                         <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" class="img-fluid">
                                      
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#bannerSlider" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#bannerSlider" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
             <br>
             <br>


                             </div>
@endsection

@section('scripts')
@endsection
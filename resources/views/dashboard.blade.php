@extends('layouts.app')

@section('content')
 <div class="content">
          <div class="container-fluid muko_cont">
            <div class="page-feature">
              <span class="feature-text">Page Feature:</span>
              <span
                >Members can link their profile to other applications like
                Allomed (telemedicine) with a single click. All
                relevant...</span
              >
            </div>
          </div>

          <div class="section_top_img">
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/alpha-dashboar-banner.jpg') }}" alt="" class="img-fuild" />
          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12" style="display: flex; flex-direction: column; justify-content: space-between;">
                <div class="row text-center pt-3">
                  <div class="col-4 px-1">
                    <div class="site w-100 h-100 ms-4">
                      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/onsite.png') }}" alt="" />
                      <p>On Site Consultation</p>
                      <h1>{{$onsite}}</h1>
                    </div>
                  </div>
                  <div class="col-4 px-1">
                    <div class="site w-100">
                      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/call.png') }}" alt="" />
                      <p>Remote Consultation</p>
                      <h1>{{$remote}}</h1>
                    </div>
                  </div>
                  <div class="col-4 px-1">
                    <div class="site w-100 h-100">
                      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/patient.png') }}" alt="" />
                      <p>Total Patients</p>
                      <h1>{{$totalCount}}</h1>
                    </div>
                  </div>
                </div>
                <div class="row pt-5 mt-1">
                  <div class="col-sm-6 col-12 pr-0">
                    <div
                      class="caroline-main d-flex flex-column align-items-center"
                    >
                      <div
                        class="caroline d-flex flex-column align-items-center text-center"
                      >
                        <h1>Caroline ⭐⭐⭐⭐⭐ 5.0</h1>
                        <p>
                          "I am a dedicated dentist, specializing in providing
                          comprehensive oral care and treatment for healthy
                          smiles
                        </p>
                        <button onclick="window.location.href='{{ route('doctorBookingHistory') }}'">Check your Appointment</button>
                      </div>
                      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/wire.png') }}" alt="" />
                    </div>
                  </div>
                  <div class="col-sm-6 col-12 pl-0">
                    <div
                      class="doct d-flex justify-content-center align-items-end h-100"
                    >
                      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/doctor.png') }}" class="w-100" alt="" />
                    </div>
                  </div>
                </div>
              </div> 

              <div class="col-lg-6 col-md-12" style="padding-top: 12px;">
                <div class="d-flex justify-content-around align-items-center p-3 mt-1" style="background-color: #E8F1F5; border-radius: 10px;"> 
                  <div>
                    <h1 style="font-size: 17px;">Hello {{$user->first_name}}</h1>
                    <h1 class="mt-3" style="font-size: 17px; color: #4F4F4F;">{{translate('Wallet Balance')}}</h1>
                    @php
                      $dollars = $user->wallet ?? 0; 
                      $points = $dollars * 100; 
                  @endphp

                  <p class="mt-3"> <b>{{ number_format($points, 2) }} PTS</b> <b>= {{ number_format($dollars, 1) }} CHF</b></p>
                  </div>
                  <div>
                    <img style="width: 85px;" src="{{ asset('assets/doctor-panel/imgs/dashboard/managment.png') }}" alt="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card-main text-center w-100 mt-4">
                      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/managment.png') }}" alt="" />
                      <h2 class="mt-3">Ads Management</h2>
                      <p>
                        Promote your services with <br />
                        targeted ads to reach more <br />patients and grow your
                        practice
                      </p>
                      <button onclick="window.location.href='{{ route('createAds') }}'">Start Advertising </button>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card-main text-center w-100 mt-4">
                      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/personal.png') }}" alt="" />
                      <h2 class="mt-3">Personal Web Page</h2>
                      <p>
                        Promote your services with <br />
                        targeted ads to reach more <br />patients and grow your
                        practice
                      </p>
                      <button onclick="window.location.href='{{ route('admin.home-page') }}'">Create Web Page</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card-main text-center w-100 mt-4">
                      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/health.png') }}" alt="" />
                      <h2 class="mt-3">Health Care Hiring</h2>
                      <p>
                        Promote your services with <br />
                        targeted ads to reach more <br />patients and grow your
                        practice
                      </p>
                      <button onclick="window.location.href='{{ route('jobPost') }}'">Find A Job </button>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card-main text-center w-100 mt-4">
                      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/real.png') }}" alt="" />
                      <h2 class="mt-3">Real Time Chat</h2>
                      <p>
                        Promote your services with <br />
                        targeted ads to reach more <br />patients and grow your
                        practice
                      </p>
                      <button onclick="window.location.href='{{ route('userChat', 'chat') }}'">Start Chatting</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div>
            @if ($user->role=='user')
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="calender-container">
                    <div class="calender-header text-center my-5">
                      <h1>Onsite Booking</h1>
                      <p>
                        Patients listed for on-site consultations and check-ups
                        as per the daily appointments.
                      </p>
                    </div>
                    <div class="calenderInner-container mt-5">
                      <div class="calendar mx-auto p-2 py-3 mt-4">
                        <div class="text-center calendar-inner-head">
                          <h2>{{date('F Y')}}</h2>
                        </div>
                        <div class="calenderDay-container d-flex p-2">
                        @php 
                        	$mydays = array('Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
                        @endphp
                        @foreach($mydays as $day)
                          <div class="calendar-day sun px-4 py-1">
                            <p>{{$day}}</p>
                           
                            <!-- <img src="img/3arrow.png" alt=""> -->
                          </div>
                        @endforeach 
                         <!-- <div class="calendar-day mon px-4 py-1">
                            <p>MON</p>
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/3arrow.png') }}" alt="" />
                          </div>
                          <div class="calendar-day tue px-4 py-1">
                            <p>TUE</p>
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/2arrow.png') }}" alt="" />
                          </div>
                          <div class="calendar-day wed px-4 py-1">
                            <p>WED</p>
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/1arrow.png') }}" alt="" />
                          </div>
                          <div class="calendar-day mon px-4 py-1">
                            <p>THU</p>
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/3arrow.png') }}" alt="" />
                          </div>
                          <div class="calendar-day tue px-4 py-1">
                            <p>FRI</p>
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/2arrow.png') }}" alt="" />
                          </div>
                          <div class="calendar-day sat px-4 py-1">
                            <p>SAT</p>
                          </div>-->
                        </div>

                        <div class="event-container d-flex @if(empty($remote_array)) align-items-center justify-content-center @endif pt-2 px-5">
                         @if(!empty($onsite_array))
                          @foreach($onsite_array as $onsitebook)
                          <div
                            class="event-{{$onsitebook['dayname']}}  event-checkup d-flex align-items-center p-2"
                          >
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/calender1.png') }}" alt="Checkup Icon" />
                            <div>
                              <p class="p-0 m-0">Checkup</p>
                              <span class="patients"
                                >{{$onsitebook['count']}} patients registered</span
                              >
                            </div>
                          </div>
                          @endforeach
                          @else
		                      <div
		                            class="event-Noevente  event-checkup d-flex align-items-center justify-content-center p-2"
		                          >
		                            
		                            <div>
		                              
		                              <span class="patients"
		                                >No Booking Found</span
		                              >
		                            </div>
		                          </div>
	                      @endif
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="calender-container">
                    <div class="calender-header text-center my-5">
                      <h1>Remote Booking</h1>
                      <p>
                        Patients listed for Remote consultations and check-ups
                        as per the daily appointments.
                      </p>
                    </div>
                    <div class="calenderInner-container">
                      <div class="calendar mx-auto p-2 py-3">
                        <div class="text-center calendar-inner-head">
                          <h2>{{date('F Y')}}</h2>
                        </div>
                        <div class="calenderDay-container d-flex p-2">
                          @php 
                        	$mydays = array('Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
                          @endphp
	                        @foreach($mydays as $day)
	                          <div class="calendar-day sun px-4 py-1">
	                            <p>{{$day}}</p>
	                           
	                            <!-- <img src="img/3arrow.png" alt=""> -->
	                          </div>
	                        @endforeach 
                        </div>

                        <div class="event-container d-flex @if(empty($remote_array)) align-items-center justify-content-center @endif pt-2 px-5">
                           @if(!empty($remote_array))
                           @foreach($remote_array as $remotebook)
	                          <div
	                            class="event-{{$remotebook['dayname']}}  event-checkup d-flex align-items-center p-2"
	                          >
	                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/calender1.png') }}" alt="Checkup Icon" />
	                            <div>
	                              <p class="p-0 m-0">Checkup</p>
	                              <span class="patients"
	                                >{{$remotebook['count']}} patients registered</span
	                              >
	                            </div>
	                          </div>
	                      @endforeach
	                      @else
		                      <div
		                            class="event-Noevente  event-checkup d-flex align-items-center justify-content-center p-2"
		                          >
		                            
		                            <div>
		                              
		                              <span class="patients"
		                                >No Booking Found</span
		                              >
		                            </div>
		                          </div>
	                      @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center mt-5">
                <h2 style="font-size: 32px; font-weight: 600">
                  Upcoming Medical Events
                </h2>
                <p>
                  Patients listed for on-site consultations and check-ups as per
                  the daily appointments.
                </p>
              </div>
            </div>
          </div>
          @else
          <section class="Docters-table">
            <div class="container mt-5">
              <div class="doctors-table-heading">
                <div class="doctors-table-heading-left">
                  <h2 class="mt-5 partner_title text-capitalize">Booking Requests</h2>
                  <p>Best doctors of our institute</p>
                </div>
                <form class="form-inline search-bar">
                  <input
                    class="form-control"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  />
                </form>
              </div>
                <div class="table-responsive"> <!-- Add this div to enable horizontal scrolling -->
                   
                    <table class="table table-hover table-doctors">
                        <thead>
                            <tr style="background-color: transparent !important; border: none !important;">
                                <th style="text-align: left;">Name</th>
                                <th>Role</th>
                                <th>Date & Time</th>
                                <th>Location</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="mt-3x">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/doctorImg.png')}}" alt="Profile" class="profile-img mr-2">
                                        <div style="text-align: left;">
                                            <strong>Dr Robert</strong> <br> ABC Hospital
                                        </div>
                                    </div>
                                </td>
                                <td><strong>Physician</strong> <br> Medical</td>
                                <td><strong>25 Aug - 27 Aug @2024</strong> <br> 10AM - 8PM</td>
                                <td><strong>Miami, Florida</strong> <br>#1 Street 2nd Building</td>
                                <td class="doctor-check">
                                    <img src="{{asset('assets/img/doctor-check.png')}}" alt="">
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
          @endif
          @if ($user->role=='user')
          <section id="calendar-main-slider"
          style="background-color: #e8f1f5;"
          class="pt-5 pb-5"
        >
          <div class="container-fluid" style="border-radius: 20pxٖ !important">
            <div class="row">
              <div class="col-md-7 col-lg-6">
                <div
                  class="container progress-container text-center bg-white p-3 "
                  style="border-radius: 20px; display: flex; flex-wrap: wrap;"
                >
                  <div class=" d-flex justify-content-center calender_wrap" style="min-width: 100%;">
                    <div class="position-relative chart-container mb-5">
                      <canvas id="youngPatientsChart"></canvas>
                      
                      <div
                        class="chart-percentage"
                        id="youngPatientsPercentage"
                      >
                        {{$count_percent_2}}%
                      </div>
                      <p class="mt-2"><strong>{{$count_percent_2}}% Young Patients</strong></p>
                    </div>

                    <div class=" position-relative chart-container">
                      <canvas id="oldPatientsChart"></canvas>
                      <div
                        class="chart-percentage2"
                        id="oldPatientsPercentage"
                      >
                        {{$count_percent_1}}%
                      </div>
                      <p class="mt-2"><strong>{{$count_percent_1}}% Old Patients</strong></p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-5 col-lg-6">
                <div class="d-flex justify-content-center">
                  <div
                    class="calendar-container p-2 rounded shadow"
                    style="border-radius: 20px"
                  >
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                      <button
                        class="btn btn-outline-secondary"
                        id="prev-month"
                      >
                        &lt;
                      </button>
                      <h4 id="month-year" class="mb-0"></h4>
                      <button
                        class="btn btn-outline-secondary"
                        id="next-month"
                      >
                        &gt;
                      </button>
                    </div>

                    <table class="table table-borderless text-center">
                      <thead>
                        <tr class="text-secondary">
                          <th>S</th>
                          <th>M</th>
                          <th>T</th>
                          <th>W</th>
                          <th>T</th>
                          <th>F</th>
                          <th>S</th>
                        </tr>
                      </thead>
                      <tbody id="calendar-body"></tbody>
                    </table>

                    <div>
                      <p class="text-success mb-0">
                        <strong>08:00 am</strong> Take Ellie for a walk
                      </p>
                      <p class="text-info mb-0">
                        <strong>10:00 am</strong> Dial into morning Check-In
                      </p>
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>
        </section>
          @else
         @endif
          <div class="section_top_img">
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild" />
          </div>
        </div>
    
@endsection

@section('scripts')
    

    <script>
        
    </script>

    <script>
        $(document).ready(function() {
            function extractAndConvertTime(datetime) {
                // Extract the time part from the datetime string
                let timePart = datetime.split(' ')[1];

                // Convert the 24-hour format time to 12-hour format with AM/PM
                return convertTo12HourFormat(timePart);
            }

            function convertTo12HourFormat(time) {
                const [hour, minute] = time.split(':');
                let period = 'AM';
                let adjustedHour = parseInt(hour);

                if (adjustedHour >= 12) {
                    period = 'PM';
                    if (adjustedHour > 12) {
                        adjustedHour -= 12;
                    }
                } else if (adjustedHour === 0) {
                    adjustedHour = 12;
                }

                return `${adjustedHour.toString().padStart(2, '0')}:${minute} ${period}`;
            }

            // Usage in your AJAX success function
            function loadPendingBookings() {
                $.ajax({
                    url: '{{ route('getPendingBookings') }}',
                    method: 'GET',
                    success: function(data) {
                        console.log(data); // Log the data to inspect it

                        let tbody = $('#bookingLists tbody');
                        tbody.empty();

                        $.each(data, function(index, booking) {
                            let date = new Date(booking.booking_date).toLocaleDateString();
                            let time = extractAndConvertTime(booking.from_time);
                            let status = booking.status === null ? 'Pending' : booking.status;

                            tbody.append(`
                    <tr> 
                        <td>#${booking.id}</td>
                        <td><a href="#" class="table_anchor" data-booking-id="${booking.id}">${booking.patient.first_name}</a></td>
                        <td>${booking.specialty.name}</td>
                        <td>${date}</td>
                        <td>${time}</td>
                        <td><span class="status">${status}</span></td>
                        <td style="vertical-align: unset;">
                            <div class="dcontent">
                                <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li><a class="dropdown-item view-details" href="#" data-id="${booking.id}">View Details</a></li>
                                    <li><a class="dropdown-item accept-booking" href="#" data-id="${booking.id}" data-status="accept">Accept</a></li>
                                    <li><a class="dropdown-item cancel-booking" href="#" data-id="${booking.id}" data-status="cancel">Cancel</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                `);
                        });
                    }
                });
            }

            // Call the function to load pending bookings
            loadPendingBookings();

            // Function to open booking details modal
            function openBookingDetailsModal(bookingId) {
                $.ajax({
                    url: `/get-booking-details/${bookingId}`, // Replace with actual route to fetch booking details
                    method: 'GET',
                    success: function(bookingDetails) {
                        $('#bookingDetailsContent').html(`
                    <p><strong>Booking ID:</strong> ${bookingDetails.id}</p>
                    <p><strong>Patient Name:</strong> ${bookingDetails.patient.first_name}</p>
                      <p><strong>Patient Gender:</strong> ${bookingDetails.patient.gender || 'NILL'}</p>
                    
                    <p><strong>Patient Reason:</strong> ${bookingDetails.reason || 'NILL'}</p>
                    <p><strong>Date:</strong> ${new Date(bookingDetails.booking_date).toLocaleDateString()}</p>
                    <p><strong>Time:</strong> ${convertTo12HourFormat(bookingDetails.from_time)}</p>
                    <p><strong>Status:</strong> ${bookingDetails.status === null ? 'Pending' : bookingDetails.status}</p>
                `);

                        $('#bookingDetailsModal').modal('show');
                    },
                    error: function() {
                        alert('Failed to fetch booking details.');
                    }
                });
            }

            // Click event handler for accepting bookings
            $(document).on('click', '.accept-booking', function(e) {
                // alert('test')
                e.preventDefault();
                let bookingId = $(this).data('id');
                let status = $(this).data('status');

                console.log(status);

                $.ajax({
                    url: '{{ route('updateBookingStatus') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        booking_id: bookingId,
                        status: 'accepted'
                    },
                    success: function(response) {
                        if (response.success) {
                            loadPendingBookings();
                        } else {
                            alert('Failed to update booking status.');
                        }
                    },
                    error: function() {
                        alert('Failed to update booking status.');
                    }
                });
            });

            $(document).on('click', '.cancel-booking', function(e) {
                e.preventDefault();
                let bookingId = $(this).data('id');
                let status = $(this).data('status');

                console.log(status);
                $.ajax({
                    url: '{{ route('updateBookingStatus') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        booking_id: bookingId,
                        status: 'cancelled'
                    },
                    success: function(response) {
                        if (response.success) {
                            loadPendingBookings();
                        } else {
                            alert('Failed to update booking status.');
                        }
                    },
                    error: function() {
                        alert('Failed to update booking status.');
                    }
                });
            });

            // booking details
            $(document).on('click', '.view-details', function(e) {
                e.preventDefault();
                let bookingId = $(this).data('id');
                openBookingDetailsModal(bookingId);
            });
        });
    </script>

    <script>
        // const currentDate = new Date();
        let selectedDate = null;

        function generateCalendar(month, year) {
            const monthYearElement = document.getElementById('month-year');
            const calendarBody = document.getElementById('calendar-body');
            calendarBody.innerHTML = ''; // Clear the current calendar

            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const firstDayOfMonth = new Date(year, month, 1).getDay();

            // Set month and year in the header
            monthYearElement.textContent = `${monthNames[month]} ${year}`;

            let date = 1;
            for (let i = 0; i < 6; i++) { // 6 rows max
                let row = document.createElement('tr');

                for (let j = 0; j < 7; j++) { // 7 columns (days)
                    let cell = document.createElement('td');

                    if (i === 0 && j < firstDayOfMonth) {
                        cell.innerHTML = ''; // Empty cell before first day of the month
                    } else if (date > daysInMonth) {
                        break; // Exit loop if date exceeds the month days
                    } else {
                        cell.innerHTML = date;

                        // Change the color for Sundays
                        if (j === 0) {
                            cell.classList.add('sunday'); // Sundays in red
                        }

                        // Check if it's the current day
                        if (date === currentDate.getDate() && month === currentDate.getMonth() && year === currentDate
                            .getFullYear()) {
                            cell.classList.add('current-day'); // Add class for the current day
                        }

                        // Add click event for selecting the date
                        cell.addEventListener('click', function() {
                            if (selectedDate) {
                                selectedDate.classList.remove('selected');
                            }
                            cell.classList.add('selected');
                            selectedDate = cell;
                        });

                        date++;
                    }

                    row.appendChild(cell);
                }

                calendarBody.appendChild(row);
            }
        }

        // Initialize the calendar with current month and year
        generateCalendar(currentDate.getMonth(), currentDate.getFullYear());
        
        
         // Chart Rendering
 document.addEventListener('DOMContentLoaded', function () {
    const youngPatientsCtx = document.getElementById('youngPatientsChart').getContext('2d');
    new Chart(youngPatientsCtx, {
        type: 'doughnut',
        data: {
            labels: ['Young Patients 2', 'Others'],
            datasets: [{
                data: [70, 30],
                backgroundColor: ['#00bfff', '#ff0000'],
                hoverOffset: 4,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false },
                datalabels: { display: false }
            },
            cutout: '70%'
        }
    });

    const oldPatientsCtx = document.getElementById('oldPatientsChart').getContext('2d');
    new Chart(oldPatientsCtx, {
        type: 'doughnut',
        data: {
            labels: ['Old Patients', 'Others'],
            datasets: [{
                data: [34, 66],
                backgroundColor: ['#ff0000', '#00bfff'],
                hoverOffset: 4,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false },
                datalabels: { display: false }
            },
            cutout: '70%'
        }
    });
});
    </script>
@endsection

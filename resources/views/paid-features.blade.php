@extends('layouts.app')

@section('content')
<style>
    .feature-content{
        margin-left: -40px;
        margin-top: 1pc;
    }
    .main-div1{
        background: white;
    display: flex;
    align-items: center;
    width: 95%;
    margin-left: 15px;
    }
    .text-color{
        color: #00d1ed;
    }
    .text-size{
        font-size: 16px;
    font-weight: 300;
    }
    .image-container{
        margin-left: 5px
    }
    
@media only screen and (max-width:758px){
    .image-container{
        width: 36% !important;
    }
}
@media (max-width: 768px) {
    .premium-feature {
        margin-top: auto;
        overflow: hidden;
    }
    .feature-content {
    margin-left: 0 !important;
    margin-top: 1pc;
}
}

    </style>
<div id="content">

    <!-- Main Content -->
    <div class="container-fluid px-md-5" style="margin-top: -6pc">
        <!-- profile area start -->
        <div class="doctor-area"> 
            <div class="row">
                <div class="col-lg-6 col-md-12 mt-lg-5 text-center">
                    <div class="main-container">
                        <div class="laptop">
                            <img src="{{asset('assets/img/feature/main.png')}}" alt="" >
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                            <img src="{{asset('assets/img/feature/left.png')}}" alt="" class="laptop-img">

                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                            <img src="{{asset('assets/img/feature/right.png')}}" alt="" class="laptop-img">

                            </div>

                        </div>
                        
                    
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-12 pl-md-5 premium-feature ">
                    <br><Br>
                    <h2 class="text-center title"><b>Unlock Premium Access</b></h2>
                    <p class="text-center sub-title"> Start your <span class="text-color">7-day free</span> trial today and unlock exclusive features. No payment required for the first 7 days, then choose a plan that works for you</p>
                    
                    <div class="main-div shadow" style="background: white; padding: 10px;">
                        <div class="row main-div1 shadow align-items-center" style="background: white;">
                            <div class="col-md-2 image-container">
                                <img src="{{asset('assets/img/feature/Event Accepted.png')}}" alt="" style="max-width: 60%; height: auto;">
                            </div>
                            <div class="col-md-10 col-sm-12 text-container feature-content">
                                <p class="text-size">Unlock exclusive events and webinars, gaining insights from global healthcare experts. <span class="text-color">$10/month </span>or <span class="text-color"> $100%/ year</span> for full access.</p>
                            </div>
                        </div>
                        <br>
                    
                        <div class="row main-div1 shadow align-items-center" style="background: white;">
                            <div class="col-md-2 image-container">
                                <img src="{{asset('assets/img/feature/Website.png')}}" alt="" style="max-width: 60%; height: auto;">
                            </div>
                            <div class="col-md-10 col-sm-12 text-container feature-content">
                                <p class="text-size">Build and showcase your personal profile on My Web, sharing your expertise, research, and achievements with the global medical community. <span class="text-color">$8/month</span> or <span class="text-color">$85/year</span>.</p>
                            </div>
                        </div>
                        <br>
                    
                        <div class="row main-div1 shadow align-items-center" style="background: white;">
                            <div class="col-md-2 image-container">
                                <img src="{{asset('assets/img/feature/people.png')}}" alt="" style="max-width: 60%; height: auto;">
                            </div>
                            <div class="col-md-10 col-sm-12 text-container feature-content">
                                <p class="text-size">Find top talent or your next job with our hiring portal focused on the medical field. <span class="text-color">$15/month</span> or <span class="text-color">$140/year</span></p>
                            </div>
                        </div>
                        <br>
                    
                        <div class="row main-div1 shadow align-items-center" style="background: white;">
                            <div class="col-md-2 image-container">
                                <img src="{{asset('assets/img/feature/Radio.png')}}" alt="" style="max-width: 60%; height: auto;">
                            </div>
                            <div class="col-md-10 col-sm-12 text-container feature-content">
                                <p class="text-size">Get premium medical news updates and early access to the latest research and developments. <span class="text-color">$6/month </span>or <span class="text-color"> $60/year</span></p>
                            </div>
                        </div>
                        <br>
                    
                        <div class="row main-div1 shadow align-items-center" style="background: white;">
                            <div class="col-md-2 image-container">
                                <img src="{{asset('assets/img/feature/Messaging.png')}}" alt="" style="max-width: 60%; height: auto;">
                            </div>
                            <div class="col-md-10 col-sm-12 text-container feature-content">
                                <p class="text-size">Chat directly with medical experts for advice and real-time consultations on the latest healthcare topics. <span class="text-color">$12/month </span> or <span class="text-color">$110/year</span></p>
                            </div>
                        </div>
                        <br>
                    
                        <div class="row main-div1 shadow align-items-center" style="background: white;">
                            <div class="col-md-2 image-container">
                                <img src="{{asset('assets/img/feature/World-Markets.png')}}" alt="" style="max-width: 60%; height: auto;">
                            </div>
                            <div class="col-md-10 col-sm-12 text-container feature-content">
                                <p class="text-size">Build your professional network with doctors and specialists worldwide, expanding your connections effortlessly. <span class="text-color">$8/month</span> or <span class="text-color">$85/year</span></p>
                            </div>
                        </div>
                        <br>
                    
                        <div class="row main-div1 shadow align-items-center" style="background: white;">
                            <div class="col-md-2 image-container">
                                <img src="{{asset('assets/img/feature/Remove ADS.png')}}" alt="" style="max-width: 60%; height: auto;">
                            </div>
                            <div class="col-md-10 col-sm-12 text-container feature-content">
                                <p class="text-size">Promote your services with targeted advertisements to reach the right medical audience. $20/month or $180/year</p>
                            </div>
                        </div>
                        <br>
                    </div>
                    
                    
                </div>

                    
                        
                </div>
            </div>
        </div>


 

    </div>
</div>
@endsection

@section('scripts')


@endsection

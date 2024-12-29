

@extends('layouts.app')

@section('content')
<style>
    #jahed_slider{
    background-color: #E8F1F5;
}
.jahed_main1{
    display: flex;
    justify-content: space-between;
    background-color: #E8F1F5;
    padding: 10px 20px;
    border-radius: 20px;
    height: 222px;
}
.jahed_main1 h1{
    font-size: 32px;
}
.jahed_main1 h2{
    font-size: 32px;
    color: #4F4F4F;
}
.jahed_main{
    display: flex;
    justify-content: space-between;
    padding: 10px 20px;
    border-radius: 20px;
    color: #FFF;
}
.div_circle{
    height: 66px;
    width: 66px;
    background-color: #D9D9D9;
    border-radius: 50%;
}
.health{
    background-color: #6395EC;
    color: #FFF;
    padding: 10px 20px;
    border-radius: 20px;
    text-align: center;
}
.food{
    background-color: #8A41AA;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #FFF;
    padding: 10px 0px;
    border-radius: 10px;
}
.Education{
    background-color: #FF8B00;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #FFF;
    padding: 10px 0px;
    border-radius: 10px; 
}
.Travel{
    background-color: #29B463;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #FFF;
    padding: 10px 0px;
    border-radius: 10px; 
}
.Lifestyle{
    background-color: #FE6347;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #FFF;
    padding: 10px 0px;
    border-radius: 10px; 
}
.Medicine{
    background-color: #D73332;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #FFF;
    padding: 10px 0px;
    border-radius: 10px; 
}
.Fitness{
    background-color: #D6C81D;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #FFF;
    padding: 10px 0px;
    border-radius: 10px;  
}
.Details_btn{
    display: flex;
    justify-content: space-between;
}
.Details_btn button{
    background-color: #009688;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    color: #FFF;
}
.mainservey{
    width: 100% !important;
    max-width: 1117px !important;

}
</style>
<section>
    <div class="container-fluid muko_cont">
        <div class="outer-contain-search">
          <div class="heading-contain mainservey">
            <div class="page-feature page_feature_coupon ">
              <span class="feature-text">Page Feature:</span>
              <span>Members can link their profile to other applications like
                Allomed (telemedicine) with a single click. All
                relevant...</span>
            </div>
          </div>
        </div>
      </div>
      <section>
        <div class="container mt-3">
            <h2 class="px-1">Wallet</h2>
        </div>
      </section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="jahed_main1 mt-3">
                    <div>
                        <h1>Hello {{$user->first_name}}</h1>
                        <h2 class="mt-3">Welcome Back</h2>
                        {{-- <p class="mt-3">Total <b>245.00PTS</b> <b>=49.0$</b></p> --}}
                        @php
                        $dollars = $user->wallet ?? 0; 
                        $points = $dollars * 100; 
                    @endphp
                        <p class="mt-3"> <b>{{ number_format($points, 2) }} PTS</b> <b>= {{ number_format($dollars, 1) }} CHF</b></p>
                    </div>
                    <div class="div_circle">

                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mt-3">
                <div class="text-center p-3" style="background-color: #E8F1F5; border-radius: 10px;">
                    <h2 style="font-size: 24px;">Categories</h2>
               <div class="health">
                <h2>Health</h2>
                <div class="jahed_main">
                    <a href="{{ route('promeberSurvey') }}" class=" text-white">
                        <div>
                            <h2 class="mt-3">3 Available</h2>
                        </div>
                    </a>

                    <div class="div_circle">

                    </div>
                </div>
               </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="m-4" >
    <section>
        <div class="container mt-3">
           <div class="p-4" style="background-color: #E8F1F5; border-radius: 15px;">
            <div class="row">
                <div class="col-md-4 mt-3">
                    <div class="food">
                        <div class="div_circle">
                        </div>
                        <h2 class="mt-2">Food</h2>
                        <h3 class="mt-3">1 Available</h3>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="Education">
                        <div class="div_circle">
                        </div>
                        <h2 class="mt-2">Education</h2>
                        <h3 class="mt-3">1 Available</h3>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="Travel">
                        <div class="div_circle">
                        </div>
                        <h2 class="mt-2">Trevel</h2>
                        <h3 class="mt-3">0 Available</h3>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 mt-3" >
                    <div class="Lifestyle">
                        <div class="div_circle">
                        </div>
                        <h2 class="mt-2">Lifestyle</h2>
                        <h3 class="mt-3">1 Available</h3>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="Medicine">
                        <div class="div_circle">
                        </div>
                        <h2 class="mt-2">Medicine</h2>
                        <h3 class="mt-3">1 Available</h3>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="Fitness">
                        <div class="div_circle">
                        </div>
                        <h2 class="mt-2">Fitness</h2>
                        <h3 class="mt-3">0 Available</h3>
                    </div>
                </div>
            </div>
           </div>
        </div>
    </section>
    <section>
        <div class="container mt-3">
           
        </div>
    </section>
</section>
<section>
    <div class="container mb-3">
        <div class="Details_btn">
            <button>Survey Details ></button>
            <button>Wallet ></button>
        </div>
    </div>
</section>
<div class="health_bottom_img mb-3" style="display: flex;
justify-content: center;">
<img src="{{ asset('assets/doctor-panel/imgs/dashboard/allomed-dashboar-banner doctomed.jpg') }}" style="max-width: 1110px;" alt="" class="img-fuild" />
</div>
@endsection
@section('scripts')
@endsection
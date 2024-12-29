@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<style> 
  
/* medical news starts from here  */
.latest-medical-news-main{
    margin: 20px 0;
}
.latest-medical-news-main h3{
    font-size: 30px;
    font-weight: 600;
    color: #141B29;
}
.latest-medical-news-main p{
    font-size: 15px;
    font-weight: 400;
    color: #333;
}
.medical-news-inner-main{
    height: auto;
    width: 100%;
    background-color: #E8F1F5;
    border-radius: 20px;
    padding: 30px 15px;
}
.medical-news-inner-main h3{
    font-size: 22px;
    font-weight: 600;
    color: #141B29;
}
.medical-news-inner-main p{
    font-size: 15px;
    font-weight: 400;
    color: #333333;
}
.news-purchase-section{
    height: auto;
    background-color: #F8F8F8;
    width: 100%;
    padding-bottom: 15px;
    border-radius: 20px;
    margin-top: 10px;
}
.news-card-header{
    background-color: #55DCDF;
    border-radius: 20px;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom-right-radius: 0;
}
.news-card-header h5{
    font-size: 18px;
    margin: 0;
    font-weight: 600;
}
.news-card-header h4{
    font-size: 20px;
    margin: 0;
    font-size: 35px;
    font-weight: 600;
}

.news-card-header-two-right{
    border-radius: 20px;
    padding: 15px 20px;
    text-align: center;
    background-color: #55DCDF;
    border-top-right-radius: 0;
    border-top-left-radius: 0;
    margin-top: -10px;
}
.individual-purchase-card ul{
    list-style: disc;
    margin-left: 20px;
    color: #141B29;
    margin-bottom: 20px;
    padding: 0 15px;
}
.individual-purchase-card ul li{
    padding: 5px 0;
    font-size: 15px;
    
}

.news-purchase-btn{
    border: none;
    padding: 8px 10px;
    width: 150px;
    border-radius: 6px;
    align-items: center;
    background-color: #E50F25;
    color: #fff;
    display: flex;
    flex-direction: column;
    margin:  0 auto !important;
}
.medical-news-banner {
    height: 200px;
    border-radius: 20px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-bottom: 20px;
    padding: 20px;
}

@media screen and (max-width: 767px) {
    .news-purchase-section {
        margin-top: 25px;
    }
}
</style>

<div class="my-dashboard">
    <div class="latest-medical-news-main">
        <h4>@if($plans->isNotEmpty())
            
            <h4>
                <h3>See Latest {{ ucfirst(Str::replace('_', ' ', optional($plans->first())->feature ?? '')) }}
                </h3>
            <p>Stay connected and Enjoy the services</p> <br>
            @else
              <p>No plans available.</p>
            @endif</h4>
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif
        <div class="medical-news-inner-main">
            <h3>See Latest {{ ucfirst(Str::replace('_', ' ', optional($plans->first())->feature ?? '')) }}
            </h3>
            <p>Stay connected and Enjoy the services</p>
            <div class="row">
                @foreach ($plans as $plan)
                <div class="col-md-4">
                    <div class="news-purchase-section">
                        <div class="individual-purchase-card">
                            <div class="news-card-header">
                                <h5>{{ $plan->name }}</h5>
                                <h4>${{ $plan->amount }}</h4>
                            </div>
                            <div class="news-card-header-two d-flex justify-content-between">
                                <div class="news-card-header-empty"> </div>
                                <h4 class="news-card-header-two-right">{{ $plan->duration }}</h4>
                            </div>
                            <ul>
                                @foreach (explode('•', $plan->details) as $detail)
                                @if (!empty(trim($detail)))
                                    <li>{{ trim($detail) }}</li>
                                @endif
                            @endforeach
                            </ul>
                            <a href="{{route('stripe.checkout',['price'=>$plan->amount,'product'=>$plan->name,'plan_id'=>$plan->id,'feature'=>$plan->feature,])}}" class="news-purchase-btn btn">Purchase</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
   </div>

</div>
@endsection

@section('scripts')
<script>
    $(function() {
        // Add any additional JS functionality if needed

        $('.car-single .subscribe').click(function() {
            $('.payment-method').addClass('payment-method-active');
        });

        $('.overlay').click(function() {
            $('.payment-method').removeClass('payment-method-active');
        });
    });
</script>
@endsection

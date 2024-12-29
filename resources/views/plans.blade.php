@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<style> 
    .payment-method button {
    background: #009688;
    border: 2px solid #009688 !important;
    color: #fff;
    text-transform: uppercase;
    width: 100%;
    padding: 10px 0;
}
</style>
<div class="my-dashboard">
    <div class="row">
        <div class="col-12">
            <!-- card options -->
            <div class="dash-content">
                <!-- current subscription -->
                <div class="current-subscription">
                                 <!-- heading -->
                             <div class="heading">
                                <h4>{{translate('Present Status')}}</h4>
                                <ol>
                                    <li>
                                        <a href="#tabs" id="updatebtn" class="btn">{{translate('Update Plan')}}</a>
                                    </li>
                                </ol>
                             </div>
                            <!-- end heading -->
                             <!-- content -->
                             <div class="content">
                             @if($subscription)
                                <h5>{{translate('Current Subscription')}} : <span>{{ $currentPlan->name }}</span></h5>
                                <h6>{{translate('Subscription Deadline')}}: <span>{{ \Carbon\Carbon::parse($subscription->end_date)->format('jS F Y') }}</span></h6>
                            @else
                            <h5>{{translate('Current Subscription')}}: <span>{{translate('Free Plan')}}</span></h5>
                            <h6>{{translate('Subscription Deadline')}}: <span>N/A</span></h6>
                        @endif
                    </div>
                             <!-- end content -->
                             </div>

                <!-- heading -->
                <div class="heading">
                    <h4>{{translate('Choose your plans')}}</h4>
                    <ol></ol>

                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif
                
                </div>
                <!-- end heading -->

                <!-- our plans -->
                <div class="our-plans">
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">{{translate('Monthly')}}</a></li>
                            <li><a href="#tabs-2">{{translate('Yearly')}}</a></li>
                        </ul>
                        <!-- monthly plan -->
                        <div id="tabs-1">
                            <div class="row">
                                @foreach ($monthlyPlans as $plan)
                                    <div class="col-lg-3 col-md-6">
                                        <!-- card single -->
                                        <div class="car-single">
                                            <h5>{{ $plan->name }}</h5>
                                            <h1>${{ $plan->amount }} <span>/{{translate('Monthly')}}</span></h1>
                                            <ul>
                                            <p>
                                            @foreach (explode('•', $plan->details) as $detail)
                                                @if (!empty(trim($detail)))
                                                    <li>{{ trim($detail) }}</li>
                                                @endif
                                            @endforeach
                                            <!-- Add more features as needed -->
                                            </p>
                                            <!-- Add more features as needed -->
                                        </ul>
                                
                                            <a class="btn subscribe" href="{{route('stripe.checkout',['price'=>$plan->amount,'product'=>$plan->name,'plan_id'=>$plan->id,'feature'=>$plan->feature,])}}">{{translate('Pay')}}</a>
                                        </div>
                                        <!-- end card single -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- end monthly plan -->

                        <!-- yearly plan -->
                        <div id="tabs-2">
                            <div class="row">
                                @foreach ($yearlyPlans as $plan)
                                    <div class="col-lg-3 col-md-6">
                                        <!-- card single -->
                                        <div class="car-single">
                                            <h5>{{ $plan->name }}</h5>
                                            <h1>${{ $plan->amount }} <span>/{{translate('Yearly')}}</span></h1>
                                            <p>
                                            @foreach (explode('•', $plan->details) as $detail)
                                                @if (!empty(trim($detail)))
                                                    <li>{{ trim($detail) }}</li>
                                                @endif
                                            @endforeach
                                            <!-- Add more features as needed -->
                                            </p>
                                            <a class="btn subscribe" href="{{route('stripe.checkout',['price'=>$plan->amount,'product'=>$plan->name,'plan_id'=>$plan->id])}}">{{translate('Pay')}}</a>
                                        </div>
                                        <!-- end card single -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- end yearly plan -->
                    </div>
                </div>
                <!-- end our plans -->

                <!-- dash ad -->
                <div class="dash-ad">
                             <div id="bannerSlider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($sliders as $key => $slider)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    @if($slider->banner_name)
                                        <a href="{{ $slider->banner_name }}" target="_blank">
                                            <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" style="height: 200px; width:100%;">
                                        </a>
                                    @else
                                        <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" style="height: 200px; width:100%;">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#bannerSlider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">{{translate('Previous')}}</span>
                        </a>
                        <a class="carousel-control-next" href="#bannerSlider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">{{translate('Next')}}</span>
                        </a>
                    </div>
                             </div>
                <!-- end dash ad -->

            </div>
            <!-- end card options -->
        </div>
    </div>
</div>
{{-- 
<!-- payment method -->
<div class="payment-method">
    <div class="overlay"></div>
    <div class="wrapper">
        <div id="accordion">
            <h3>{{translate('Payment')}}</h3>
            <div>
                <form action="{{ route('subscription.store') }}" method="post">
                    @csrf
                    <div class="input-field">
                        <input type="text" id="cardPlanId" name="plan_id">
                        <input type="text" name="payment_method" value="card">
                    </div>
                    <!-- Add other card-specific fields here -->
                    <input type="text" name="full_name" placeholder="Full Name">
                    <input type="text" name="card_no" placeholder="Card Number">
                    <input type="text" name="expiration" placeholder="Expiration Date">
                    <input type="text" name="security_code" placeholder="Security Code">
                    <br>
                    <br>
                    <button type="submit">{{translate('Submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script>
    $( function() {
        $( ".our-plans #tabs" ).tabs();
    });

    $(function() {
        $("#accordion").accordion({
            collapsible: false,
            heightStyle: "content"
        });

        $('.car-single .subscribe').click(function() {
            $('.payment-method').addClass('payment-method-active');
            $('#nav-icon1').removeClass('open');
        });

        $('.overlay').click(function() {
            $('.payment-method').removeClass('payment-method-active');
        });
    });

    // $(document).ready(function() {
    //     $('.subscribe').on('click', function() {
    //         var planId = $(this).attr('data-plan-id');
    //         $('#cashPlanId').val(planId);
    //         $('#cardPlanId').val(planId);
    //         $('.payment-method').addClass('payment-method-active');
    //     });
    // });
</script>
@endsection

@extends('layouts.app')

@section('content')
<style>
.ads-img-vertical {
    height: 300px;
    width: 100%;
    border: none;
    border-radius: 24px;
}
.ads-img {
    width: 100%;
    height: 260px;
    border:none;
    border-radius: 24px;
}
.sync_cards {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%; /* Ensures all cards are the same height */
}

.sync_cards .content {
    flex-grow: 1; /* Makes content expand to fill the available space */
    text-align: justify; /* Justifies the text */
}

.sync_cards p {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 10; /* Adjust this number to control the number of lines */
    -webkit-box-orient: vertical;
}

</style>
      
        <div class="my-dashboard ads_pages">
        <div class="container-fluid">
<div class="marquee-area">
                  <ul>
                    <li><span>{{translate('Page Feature')}} :</span></li>
                    <li><p><marquee behavior="" direction=""> Members can link their profile to other applications like
                                                Allomed (telemedicine) with a single click. All relevant data is
                                                transferred automatically,</marquee></p></li>
                  </ul>
        </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- dash content -->
                         <div class="dash-content">
                            <!-- hading -->
                             <div class="heading mt-4">
                                <h4>See Advertisement</h4>
                             </div>
                            <!-- end heading -->
                            <!-- dash ad -->
                             
                            <!-- end dash ad -->

                            <!-- booking list -->
                             <div class="booking-list">
                                <h5>Free Ads</h5>
                               <!-- connect box -->
                                <div class="ads-connect-box">
                                <div class="row">
                                
                                    @foreach($freeadvertisements as $advertisement)
                                    <div class="col-lg-4 col-md-4 mb-4">
	                                    <div class="sync_cards">
	                                        <div class="content">
	                                            <p>
	                                                {{ $advertisement->details }}
	                                            </p>
	                                        </div>
	                                    </div>
	                                </div>
	                               @endforeach 
                                </div>
                                
                                </div>
                               <!-- end connect box -->
                             </div>
                            <!-- end booking list -->

                         </div>
                        <!-- end dash content -->
                    </div>
                </div>

                <div class="row mt-3 p-3">
                    <div class="heading mb-1">
                        <h4>Paid Ads</h4>
                     </div>

                     <div class="row mt-4">
                     @foreach($paidadvertisements as $index => $padvertisement)
                     	@if ($padvertisement->images != null)

                     		@if($index == 0)
		                    <div class="col-md-12 col-lg-12 mb-3">
                                <div class="banner-img">
		                        <a href="#" target="_blank">
		                            <img class="ads-img" src="{{asset('images/ads/'.$padvertisement->images)}}" alt="ads">
		                        </a>
                            </div>
		                    </div>
		                    @elseif($index == 1 || $index == 2)
		                    	<div class="col-lg-6 col-md-6 mb-3">
                                    <div class="banner-slider-img">
		                            <img class="ads-img-vertical" src="{{asset('images/ads/'.$padvertisement->images)}}" alt="ads">
		                        </div>
		                        </div>

		                    @elseif($index == 3)
		                    	<div class="col-md-12 col-lg-12 mb-3">
                                    <div class="banner-slider-img">

		                        <a href="#" target="_blank">
		                            <img class="ads-img" src="{{asset('images/ads/'.$padvertisement->images)}}" alt="ads">
		                        </a>
		                    </div>    
		                    </div>    

		                    @endif
                    	@endif
                    @endforeach
                    </div>
                    
                </div>
             </div>
         </div>    



       
    
      
@endsection
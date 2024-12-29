@extends('layouts.app')

@section('content')
<style>
    /* Hide the default radio button */
.custom-radio input[type="radio"] {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 16px;
  height: 16px;
  margin-right: 8px;
  position: relative;
  vertical-align: middle;
  background-color: #fff;
  border: 2px solid #ccc;
  border-radius: 50%;
  cursor: pointer;
  outline: none;
  transition: background-color 0.2s ease, border-color 0.2s ease;
}

/* Style when the radio button is checked */
.custom-radio input[type="radio"]:checked {
  background-color: #70e27a;
  border-color: #70e27a;
}

.custom-radio label {
  vertical-align: middle;
  font-size: 16px;
  color: #333;
}

</style>
<div class="content" style="padding: 10px;">
    <div class="container-fluid muko_cont ">
        <div class="page-feature feedback_fp">
            <span class="feature-text">Page Feature:</span>
            <span>Please leave your feedback for the better services</span>
        </div>
        <div class="my-dashboard pl-2 pe-md-0 pe-3 pt-0">
          
	<div class="">
              

                <!-- Start Center section area -->
                <div >
                    <div class="row">
                        <div class="col-12">
                            <!-- dash content -->
                             @if (session('success'))
				                <div class="alert alert-success">
				                    {{ session('success') }}
				                </div>
				            @endif
                            <div class="dash-content">
                                <form action="{{route('sendFeedback')}}" method="post">
                        			@csrf
                                    <div class="border-none" style="padding-bottom: 0">
                                        <h4 class="mt-3 mb-3 ml-1"><strong>Your Feedback</strong></h4>

                                        <div class="row main-rw">
                                            <div class="col-12">
                                                <!-- input field -->
                                                <div class="container">
                                                    <label class="form-label">Overall how much would
                                                        you rate your experience?</label>
                                                    <!-- Box 1: Excellent and Poor -->
                                                    <div class="rating-box">
                                                        <div class=" d-md-flex justify-content-between">
                                                            <div class="form-check-inline col-12 col-md-6 custom-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="rating" id="excellent" value="excellent">
                                                                <label class="form-check-label"
                                                                    for="excellent">Excellent</label>
                                                            </div>
                                                            <div class=" form-check-inline col-12 col-md-6 custom-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="rating" id="poor" value="poor">
                                                                <label class="form-check-label" for="poor">Poor</label>
                                                            </div>
                                                        </div>
                                                        <div class="pt-md-4 d-md-flex justify-content-between">
                                                            <div class="form-check-inline col-12 col-md-6 custom-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="rating" id="good" value="good">
                                                                <label class="form-check-label" for="good">Good</label>
                                                            </div>
                                                            <div class="form-check-inline col-12 col-md-6 custom-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="rating" id="terrible" value="terrible">
                                                                <label class="form-check-label"
                                                                    for="terrible">Terrible</label>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <!-- input field -->
                                            </div>

                                            <div class="col-12">
                                                <!-- input field -->
                                                <div class="container">
                                                    <label class="form-label">Would you recommend our
                                                        services to others?</label>
                                                    <!-- Yes and No in one box -->
                                                    <div>
                                                        <div class="rating-box d-md-flex justify-content-between">
                                                            <div class="form-check-inline col-12 col-md-6 custom-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="recommend" id="yes" value="yes">
                                                                <label class="form-check-label" for="yes">Yes</label>
                                                            </div>
                                                            <div class="form-check-inline  col-12 col-md-6 custom-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="recommend" id="no" value="no">
                                                                <label class="form-check-label" for="no">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- input field -->
                                            </div>

                                            
                                                <div class="col-12">
                                                <div class="container">
                                                    <!-- input field -->
                                                    <label for="feedback" class="form-label">Help Us Improve
                                                        Our Services By Giving Us A
                                                        FeedBack</label>
                                                    <div class="mb-3">
                                                        <textarea class="form-control" name="details"
                                                            placeholder="Type Something......" required
                                                            style="min-height: 100px;"></textarea>
                                                    </div>
                                                    <!-- input field -->
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                            <div class="container">
                                                <button class="btn btn-danger" type="submit">
                                                    Submit
                                                </button>
                                            </div>    
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                            <!-- end dash content -->
                            <br>
                            <div class="section_top_img">
					            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/pexels-padrinan-806427.png') }}" alt="" class="img-fuild">
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
                        </div>
                    </div>
                </div>


                <!-- End Center section area -->
            </div>
</div>
    </div>

</div>

@endsection

@section('scripts')




@endsection

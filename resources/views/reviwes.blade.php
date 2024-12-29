@extends('layouts.app')
@section('content')
<style> 
     .profile-detail-pic {
    width: 170px;
    height: 170px;
    border-radius: 50%;
    object-fit: cover;
}
   
.doc-image {
    width: 100px; /* Set the width */
    height: 100px; /* Set the height */
    object-fit: cover; /* Ensure the image covers the area */
}

.dash-content form {
    background: #E8F1F5;
    margin-top: 1pc;
    padding: 20px;
    border-radius: 12px;
}
.title_section
{
	background: #00B2FF;
    border-radius: 12px;
    height: 3pc;
    display: flex;
    align-items: center;
}

.title_section h5
{
	margin-bottom: 0;
}

.card-body {
    background-color: #e8f1f6;
    height: auto !important;
    border-radius: 10px;
    padding: 0;
    margin-top: 1pc;
    margin-left: 5px;
}

</style>

<div class="container-fluid px-md-5">
    <div class="marquee-area">
        <ul>
          <li><span>Page Feature:</span></li>
          <li><p><marquee behavior="" direction=""> Keeps members informed about relevant events and
                                      opportunities.</marquee></p></li>
                                          </ul>
    </div>
    <div class="row">
        <div class="col-md-3">
        <br>
            <h2><strong>Reviews</strong></h2>
            <!-- doc profile -->
			@include('myprofilesidebar')
<!-- End doc profile -->

{{-- <img class="mt-1 img-fluid" src="{{ asset('assets/doctor-panel/imgs/ads.png') }}"  alt="Verified Icon"  > --}}


        </div>

        <div class="col-md-9 p-1" style="margin-top: 5em">
            <div class="row">
                <!-- Slider Section (8 columns wide) -->
                <div class="col-md-12">
                    <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="doc-profile-inner d-flex align-items-center p-3">
                                    <img src="{{ asset($user->profile_pic ? 'images/users/' . $user->profile_pic : 'assets/img/profile-img.jpg') }}" class="img-fluid doc-image rounded-circle" alt="{{$user->first_name}} {{$user->last_name}}">
                                    <div class="ml-3" style="margin-left: 1pc">
                                        <h5>{{$user->first_name}} {{$user->last_name}}</h5>
                                        <h6>
                                        @foreach (explode(',', $user->specialties) as $specialtyId)
					                        @php
					                        $specialty = App\Models\Specialty::find($specialtyId);
					                        @endphp
					                        @if ($specialty)

					                        {{ $specialty->name }}
					                        @endif
					                        @endforeach
                                        </h6>
                                        <div class="d-flex justify-content-center align-items-center verify-section mt-2" style="margin-right: 3pc">
                                            

                                            <h6 class="mb-0 mr-2" style="color:#00B2FF">
                                            @php
                                            $verification = \App\Models\Verification::where('user_id', $user->id)->latest()->first();
                                   			@endphp
											@if (!$verification)
                                                {{translate('Verify documents')}}
                                            @elseif ($verification->verify_code == 'verified')
                                                <img src="{{ asset('assets/doctor-panel/imgs/verify.png') }}"  alt="Verified Icon"  class="verify-icon">
                                                    {{translate('Verified')}} 
                                                    
                                            @elseif ($verification->verify_code == 'progress')
                                                <{{translate('Verification in progress')}}
                                            @else
                                                {{translate('Verification in progress')}}
                                            @endif
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                        <div class="dash-content mt-3 " style="background: #E8F1F5;padding-top: 7px;border-radius:10px">
                            <div class="card-header text-center newcardheader title_section" style="background:#00B2FF;border-radius:12px;height:4pc;margin-top:-10px">
                                <h5 class="text-left"><span style="">{{translate('Reviews')}}</span> </h5>
                            </div>
                            @foreach($reviews as $review)
                                <div class="card mb-3" style="background: #E8F1F5; border:none; border-radius:10px">
                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="col-sm-12">
                                                    <!-- Old Password Input Group -->
                                                    <div class="form-group">
                                                        <p><b>{{translate('Name')}}</b></p>
                                                        <input type="text" class="form-control" value="{{ $review->patient_name }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-1">
                                                    <!-- New Password Input Group -->
                                                    <div class="form-group">
                                                        <p><b>{{translate('Email')}}</b></p>
                                                        <input type="text" class="form-control" readonly value="{{ $review->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-1">
                                                    <!-- New Password Input Group -->
                                                    <div class="form-group">
                                                        <p><b>{{translate('Rating')}} </b></p>
	                                                        <div class="rating">
	                                                        <ul>
	                                                            @for($i = 1; $i <= 5; $i++)
	                                                                <li>
	                                                                    <i class="fa{{ $i <= $review->rating ? '-solid' : '-regular' }} fa-star"></i>
	                                                                </li>
	                                                            @endfor
	                                                        </ul>
	                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 mt-1">
                                                    <!-- New Password Input Group -->
                                                    <div class="form-group">
                                                        <p><b>{{translate('Comment')}}</b></p>
                                                        <input type="text" class="form-control" value="{{ $review->comments }}" readonly>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
							@endforeach
                            
                              
                        </div>
                    
        
                </div>
            </div>
        </div>

      


    </div>

</div>


<div class="container-fluid">
    <div class="row">

 

        <div class="section_top_img  col-md-12">
            <img src="{{ asset('assets/doctor-panel/imgs/newfooter.png') }}" alt="" class="img-fuild">
        </div>
    </div>
</div>
@endsection
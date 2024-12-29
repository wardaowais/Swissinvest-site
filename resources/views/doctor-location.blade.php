@extends('layouts.app')
@section('content')
<style> 

body{
    overflow-x: hidden;
}
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


#map
{
	height : 400px;
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
    margin-left: -10px;
    margin-top: 1pc;
}

.dash-content form {
    background: #E8F1F5;
    padding: 10px;
    border-radius: 9px;
}

</style>

<div class="my-dashboard">
    <div class="marquee-area">
        <ul>
          <li><span>Page Feature:</span></li>
          <li><p><marquee behavior="" direction=""> Keeps members informed about relevant events and
                                      opportunities.</marquee></p></li>
                                          </ul>
    </div>
    <div class="row">
        <div class="col-md-3 ">
        <br>
            <h2><strong>Location</strong></h2>
            <!-- doc profile -->
			 @include('myprofilesidebar')
<!-- End doc profile -->


        </div>

        <div class="col-md-9 p-1" style="margin-top: 3em">
            <div class="row">
                <!-- Slider Section (8 columns wide) -->
                <div class="col-md-12 mt-4">
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
        
                        <div class="dash-content mt-3 location_section" style="background: #E8F1F5;padding-top: 7px;border-radius:10px">
                            <div class="card-header text-center newcardheader title_section" style="background:#00B2FF;border-radius:12px;height:4pc;margin-top:-1pc">
                                <h5 class="text-left" ><span >Location Detail</span> </h5>
                            </div>
                          
                                <form method="POST" action="" class="location_form">
                                    <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <!-- Old Password Input Group -->
                                                        <div class="form-group">
                                                            <p><b>Update Location</b></p>
                                                            <textarea rows="4" cols="4" type="text" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                   
    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="text-align: end;margin-top:10px">
	                                        <div class="col-sm-12">
	                                            <button type="submit" class="btn btn-danger">Update</button>
	                                        </div>
	                                    </div>
                                    </div>
                                    
                                    <!-- Submit Button Row -->
                                    
                                </form>
                        </div>
                    
        
                </div>
            </div>
        </div>
		<div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="">
                    <div class="card">
                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <!-- Old Password Input Group -->
                                        <div class="form-group">
                                            <p><b>Map / Satellite</b></p>
                                            <div class="document_single" style="margin-top: 30px;">
                                                <div id="map"></div>
                                            </div>
                                        </div>
                                    </div>
                                   
        
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
                </form>
                
            </div>
        </div>
    </div>
    <div class="section_top_img  col-12">
        <img src="{{ asset('assets/doctor-panel/imgs/newfooter.png') }}" alt="" class="img-fuild">
    </div>


    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA04JvWuCNqU5FBAZGBHY-i_iGtaPELbTA&callback=initMap" async defer></script>
    <!-- Initialize the map after the document is ready -->
    <script>
        function initMap() {
            var geocoder = new google.maps.Geocoder();
            var address = '{{ $user->address }},{{ $user->house_number }} ,{{ $user->postal_code }},{{ $user->city }}';

            geocoder.geocode({ 'address': address }, function(results, status) {
                if (status === 'OK') {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 16,
                        center: results[0].geometry.location
                    });

                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        // Use jQuery to initialize the map after the document is ready
        $(document).ready(function() {
            if (typeof google === 'object' && typeof google.maps === 'object') {
                initMap();
            }
        });
    </script>
    @endsection
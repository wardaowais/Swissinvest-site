@extends('home.layouts.app')
@section('content')
<style>
        .map-full {
    background: #fff;
    transition: all .4s;
}
.map-full .container{
    position: relative;
}
.map-full-active{
    width: 100%;
    height: 100%;
    display: block;
}
.map-full .map-content {
  position: relative;
  width: 100%;
  background: #ffffffe3;
  padding: 20px;
  position: absolute;
  top: 50%;
  left: 20px;
  max-width: 275px;
  transform: translateY(-50%);
  z-index: 9;
}
.map-full .map-content h1 {
    text-transform: uppercase;
    font-size: 25px;
    color: #2E92AB;
}
.map-full .map-content h6 {
    color: #009688;
    font-size: 14px;
}
.map-full .map-content .box {
    margin-top: 20px;
}
.map-full .map-content .box h4 {
    color: #2E92AB;
    text-transform: uppercase;
    font-size: 19px;
    margin-bottom: 0;
}
.map-full .map-content .box ul{
    padding: 0;
    margin: 0;
}
.map-full .map-content .box ul li {
  padding: 4px 0;
  font-weight: 500;
  text-transform: capitalize;
  display: flex;
  justify-content: space-between;
  font-size: 12px;
}

.map-full .map-content .box ul li a {
    text-decoration: none;
    color: #555151;
}
.map-full .gm-style .place-card-large{
    display: none !important;
}
#map {
    height: 45rem;
    width: 100%;
}
.map-full iframe {
    width: 100%;
    height: 100%;
}
.map-full .close {
    position: absolute;
    top: 0px;
    right: 10px;
    font-size: 40px;
    color: #e02e2e;
    cursor: pointer;
    transition: .3s;
}
.map-full .close:hover{
    transform: scale(1.1);
}



.map-profile {
    position: relative;
    top: inherit;
    left: inherit;
    transform: inherit;
    display: block;
    width: 100%;
    padding: 50px 0;
}

.map-full .map-content .btn {
    background: #009688;
    border: none;
    padding: 8px 24px;
    border-radius: 8px;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    transition: .3s;
    text-decoration: none;
    width: 100%;
    margin-top: 10px;
}

.place-card.place-card-large {
    display: none !important;
}
.extra-content {
    background: #FAFAFA;
    padding-bottom: 10px;
}
.extra-content .box {
    margin: 28px 0;
    background: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 9px;
    box-shadow: 0px 0px 10px #00000021;
    padding: 44px;
}
.extra-content h4 {
    margin-bottom: 19px;
    text-transform: uppercase;
    color: #2E92AB;
    font-size: 23px;
}

/* ratings*/
.review-content {
    padding-bottom: 40px;
}
.review-content .box {
    background: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 9px;
    box-shadow: 0px 0px 10px #00000021;
    padding: 44px;
}
.review-content h4 {
    margin-bottom: 19px;
    text-transform: uppercase;
    color: #2E92AB;
    font-size: 23px;
}
.rating {
    display: inline-block;
    padding: 0 15px;
}
  
  .rating input {
    display: none;
  }
  
  .rating label {
    float: right;
    cursor: pointer;
    color: #ccc;
    transition: color 0.3s;
  }
  
  .rating label:before {
    content: '\2605';
    font-size: 30px;
  }
  
  .rating input:checked ~ label,
  .rating label:hover,
  .rating label:hover ~ label {
    color: #009688;
    transition: color 0.3s;
  }
  #submit-review {
    background: #009688;
    padding: 10px 30px;
    border-radius: 8px;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: .3s;
    border: none;
  }
  #submit-review:hover{
    transform: scale(1.1);
  }

.map-full .map-content h1 {
  text-transform: uppercase;
  font-size: 19px;
  color: #2E92AB;
  display: flex;
  align-items:center;
}
.map-content h3 p {
    margin: 0 !important;
    color: #fff;
    font-size: 13px;
    background: #ff6b6b;
    padding: 3px 6px;
    border-radius: 10px;
    line-height: normal;
    display: inline-block;
}
    </style>
<div class="map-full map-profile">
    <div class="container">
        <div class="map-content">
            @php
            // Retrieve the latest verification record for this user
            $verification = \App\Models\Verification::where('user_id', $user->id)->latest()->first();
        @endphp
        
        @if ($verification && $verification->verify_code == 'verified')
            <h1>{{ $user->title }} {{ $user->first_name }} {{ $user->last_name }}
                <img src="https://doctors.allomed.ch/assets/doctor-panel/imgs/approved.png" alt="" class="verified-icon" title="Verified">
            </h1>
            @else
                <h3>{{ $user->title }} {{ $user->first_name }} {{ $user->last_name }}</h3>
            @endif

            <h6><span><i class="fa-solid fa-circle-check"></i></span>  
                @if ($user->patient_status == 1)
                    {{ translate('New patients accepted') }} 
                @else
                    {{ translate('New patients not accepted') }}  
                @endif
            </h6>

            <div class="box">
                <h4>{{translate (getPageContent('address_header')) }}</h4>
                <ul>
                    <li>{{translate (getPageContent('placeholder_address')) }}
                        <span>
                            {{ translate(!empty($user->address) ? $user->address : 'Address Not Updated') }} 
                            {{$user->house_number}}, 
                            <br>{{$user->postal_code}},  
                            @if ($user->cityRelation)
                                {{$user->cityRelation->name}}
                            @else
                                {{ 'City Not Updated' }}
                            @endif
                        </span>
                    </li>
                    <li>{{translate (getPageContent('Telephone')) }}
                        <span>
                            <a href="tel:+41227892000">
                                {{ translate(!empty($user->fax_phone_number) ? $user->fax_phone_number : 'Not Updated') }}
                            </a>
                        </span>
                    </li>
                    <li>{{translate (getPageContent('Fax')) }} 
                        <span>
                            <a href="tel:+41227892000">
                                {{ translate(!empty($user->fax_number) ? $user->fax_number : 'Not Updated') }}
                            </a>
                        </span>
                    </li>
                </ul>  
            </div>

            <div class="box">
                <h4>{{translate (getPageContent('specialty_header')) }}</h4>
                <ul>
                    @foreach (explode(',', $user->specialties) as $specialtyId)
                        @php
                            $specialty = App\Models\Specialty::find($specialtyId);
                        @endphp
                        @if ($specialty)
                            <li>{{ $specialty->name }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="box">
                <h4>{{translate (getPageContent('Languages_text')) }}</h4>
                <ul>
                    @foreach (explode(',', $user->language) as $languageId)
                        @php
                            $language = App\Models\Language::find($languageId);
                        @endphp
                        @if ($language)
                            <li>{{ $language->name }}</li>
                        @endif
                    @endforeach
                </ul>
            </div> 

            <a href="https://www.google.com/maps?q={{ urlencode($user->address . ' ' . $user->house_number . ' ' . $user->postal_code . ' ' . ($user->cityRelation->name ?? 'Switzerland')) }}" class="btn" style="margin-top:40px">{{translate (getPageContent('access_map')) }}</a>
            
            <a class="btn" id="leftfeedback">{{translate (getPageContent('Feedback')) }}</a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div id="map">
            <!-- Map will be here -->
        </div>
    </div>
</div>


 <!-- review content -->
 <div class="review-content">
      <div class="overlay"></div>
        <div class="box">
            <span class="close"><i class="fa-solid fa-circle-xmark"></i></span>
            <h4>{{translate (getPageContent('Leave_Feedback')) }}</h4>
            <!-- start form -->
            <form action="{{ route('submit-review') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <!-- input field -->
            <div class="input-field">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <p>{{translate('Name')}}</p>
                <input type="text" name="patient_name" placeholder="{{translate (getPageContent('placeholder_name')) }}" required>
            </div>
            <!-- end input field -->
        </div>
        <div class="col-md-6">
            <!-- input field -->
            <div class="input-field">	
                <p>{{translate('Email')}}</p>
                <input type="text" name="email" placeholder="{{translate (getPageContent('Place_holder_Email_Address')) }}" required>
            </div>
            <!-- end input field -->
        </div>
        <div class="col-12">
            <!-- input field -->
            <div class="input-field">
                <p>{{translate (getPageContent('Your_Rating	')) }}</p>
                <div class="rating">
                    <input value="5" name="rating" id="star5" type="radio">
                    <label for="star5"></label>
                    <input value="4" name="rating" id="star4" type="radio">
                    <label for="star4"></label>
                    <input value="3" name="rating" id="star3" type="radio">
                    <label for="star3"></label>
                    <input value="2" name="rating" id="star2" type="radio">
                    <label for="star2"></label>
                    <input value="1" name="rating" id="star1" type="radio">
                    <label for="star1"></label>
                </div>
            </div>
            <!-- end input field -->
        </div>
        <div class="col-12">
            <!-- input field -->
            <div class="input-field">
                <p>{{translate (getPageContent('comments')) }}</p>
                <textarea name="comments" placeholder="{{translate (getPageContent('comments')) }}"></textarea>
            </div>
            <!-- end input field -->
        </div>
        <div class="col-12">
            <button type="submit" id="submit-review">{{translate (getPageContent('Feedback_submit')) }}</button>
        </div>
    </div>
</form>

            <!-- end form -->
        </div>
     </div>

     <br>
    <!-- end content -->
@endsection


@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA04JvWuCNqU5FBAZGBHY-i_iGtaPELbTA&callback=initMap" async defer></script>

<script>
    function initMap() {
        // Construct the address string from PHP variables
        const address = "{{ $user ? $user->address : '' }}, " +
                        "{{ $user ? $user->house_number : '' }}, " +
                        "{{ $user ? $user->postal_code : '' }}, " +
                        "{{ $user ? $user->city : '' }}";

        console.log('Geocoding address:', address); // Log the address string for debugging

        // Create a new instance of the Geocoder
        const geocoder = new google.maps.Geocoder();

        // Geocode the address
        geocoder.geocode({ 'address': address }, function(results, status) {
            console.log('Geocoding response:', results, status); // Log the response for debugging
            if (status === 'OK') {
                // Create a new map centered on the geocoded location
                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: results[0].geometry.location
                });

                // Add a marker at the geocoded location
                new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map
                });
            } else {
                console.error('Geocode was not successful for the following reason:', status);
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    document.getElementById('leftfeedback').addEventListener('click', function() {
        document.querySelector('.review-content').classList.add('review-content-active');
    });

    document.querySelector('.review-content .overlay').addEventListener('click', function() {
        document.querySelector('.review-content').classList.remove('review-content-active');
    });

    document.querySelector('.review-content .close').addEventListener('click', function() {
        document.querySelector('.review-content').classList.remove('review-content-active');
    });
</script>
@endsection
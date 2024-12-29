@extends('home.layouts.app')

@section('content')
<section class="profile-hero">
    <div class="cover-photo">
    <img src="{{ $heroWebImage ? asset($heroWebImage->image) : '' }}" alt="" style="height: 350px;">

    </div>
    <div class="profile_pic">
        @php
        // Define the image directories and get an array of image paths
        $femaleImages = glob(public_path('assets/home/imgs/female-avi/*.jpg'));
        $maleImages = glob(public_path('assets/home/imgs/male-avi/*.jpg'));
    
        // Convert absolute paths to relative URLs and replace backslashes with forward slashes
        $femaleImages = array_map(function($path) {
            return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
        }, $femaleImages);
    
        $maleImages = array_map(function($path) {
            return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
        }, $maleImages);
    @endphp
    
    @if($user->gender == "female")
        <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($femaleImages) }}"
             alt="Profile Picture" class="img-fluid rounded-circle" style="width: 200px; height: 200px;">
    @else
        <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($maleImages) }}"
             alt="Profile Picture" class="img-fluid rounded-circle" style="width: 200px; height: 200px;">
    @endif
            <h1>{{$user->title}} {{$user->first_name}} {{$user->last_name}}</h1>
        <ul class="tags">
            <li>{{translate($user->speciality)}}</li>
        </ul>
        
        <p><span><i class="fa-solid fa-location-dot"></i></span>{{translate(!empty($user->address) ? $user->address : 'Address Not Updated')}}</p>                   
    </div>
 </section>

 <section class="profile-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- right content -->
                 <div class="right-content">
                    <!-- content -->
                     <div class="content">
                        <div class="box" id="sdkld">
                            <div class="text">
                                <h4>{{translate('Book Appointment')}}</h4>
                               
                            </div>
                            <div class="gray-box">
                                <div class="row g-0">
                                    <div class="col-sm-12">
                                        <div class="g-box">
                                            <p>{{translate('Specialty')}} :
                                            @foreach (explode(',', $user->specialties) as $specialtyId)
                                                @php
                                                    $specialty = App\Models\Specialty::find($specialtyId);
                                                @endphp
                                                @if ($specialty)
                                        
                                                    <span>{{ $specialty->name }}</span>
                                                @endif
                                            @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @php
                    $patientName = '';
                    $patientEmail = '';
                    $patientphone = '';
                    $patientbirth_date ='';
                    $patientgender ='';
                    if (session()->has('patient_id')) {
                        $booking_patient = App\Models\Patient::find(session('patient_id'));
                        if ($booking_patient) {
                            $patientFirstName = $booking_patient->first_name; // Adjust according to your database field
                            $patientLastName = $booking_patient->first_name;
                            $patientName = $patientFirstName .' '. $patientLastName;
                            $patientEmail = $booking_patient->email;
                            $patientphone = $booking_patient->phone;
                            $patientbirth_date = $booking_patient->birth_date;
                            $patientgender = $booking_patient->gender;
                        }
                    }
                @endphp
                        <div class="box border-none" style="padding-bottom: 0;">
                            <h4>{{translate('Your Details')}}</h4>
                        <form id="patient-booking-form" method="POST" action="{{ route('appointments.store') }}">
                                @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- input field -->
                                     <div class="input-field">
                                        <p>{{translate('Full name')}}</p>
                                        <input type="text" id="full-name" name="first_name" value="{{$patientName}}" placeholder="{{translate('Write your full name')}}" required>
                                        <span><i class="fa-solid fa-circle-check"></i></span>
                                     </div>
                                    <!-- input field -->
                                </div>
                                <div class="col-sm-12">
                                    <!-- input field -->
                                 
                                    <!-- input field -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{translate('Email')}}</p>
                                        <input type="email" id="email" name="email" value="{{$patientEmail}}" placeholder="{{translate('Email Address')}}" required>
                                        <span><i class="fa-solid fa-circle-check"></i></span>
                                     </div>
                                    <!-- input field -->
                                </div>
                                @if($user->role == 'institute')
                                <div class="col-sm-6">
                                    <!-- input field -->
                                    <div class="input-field select">
                                        <p>{{translate('Select Specialty')}}</p>
                                        <select class="form-select" name="specialty_institute_id">
                                            <option value="">{{translate('Specialty')}}</option>
                                            @foreach ($specialties as $specialty)
                                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                            @endforeach
                                        </select>
                                        <span><i class="fa-solid fa-sort-down"></i></span>
                                    </div>
                                    <!-- input field -->
                                </div>
                            @endif
                            
                                <div class="col-sm-6">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{translate('Phone number')}}</p>
                                        <input type="text" id="phone-number" name="phone_number" value="{{$patientphone}}" placeholder="{{translate('Phone Number')}}" required>
                                        <span><i class="fa-solid fa-circle-check"></i></span>
                                     </div>
                                    <!-- input field -->
                                </div>
                               
                                <div class="col-sm-6">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{translate('Date of birth')}}</p>
                                        <input type="date" id="date-of-birth" name="date_of_birth" value="{{$patientbirth_date}}" required>
                                     </div>
                                    <!-- input field -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- input field -->
                                    <div class="input-field select">
                                        <p>{{translate('Gender')}}</p>
                                        <select class="form-select" name="gender">
                                        <option value="">{{translate('Select Gender')}}</option>
                                        <option value="male" {{ $patientgender === 'male' ? 'selected' : '' }}>{{ translate('male') }}</option>
                                        <option value="female" {{ $patientgender === 'female' ? 'selected' : '' }}>{{ translate('female') }}</option>

                                    </select>
                                        <span><i class="fa-solid fa-sort-down"></i></i></span>
                                     </div>
                                    <!-- input field -->
                                </div>
                                <div class="col-sm-12">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{translate('Book Appointment')}} {{translate('Notes')}}</p>
                                        <textarea name="additional_info"></textarea>
                                     </div>
                                    <!-- input field -->
                                </div>
                            </div>
                            <br>
                            <div class="buttons">
                                    <button type="submit">{{translate('Submit')}}</button>
                                    <button type="button" onclick="window.location.href='{{ route('home') }}'">{{translate('Cancel')}}</button>

                                </div>
                            </form>
                        </div>

                     </div>
                    <!-- end contnent -->
                 </div>
                <!-- end right content -->
            </div>

        </div>
        <div class="add-banner">
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
    </div>
 </section>
 


@endsection


@section('scripts')



@endsection
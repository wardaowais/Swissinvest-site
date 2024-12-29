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
            width: 100px;
            /* Set the width */
            height: 100px;
            /* Set the height */
            object-fit: cover;
            /* Ensure the image covers the area */
        }

        .dash-content form {
    background: #E8F1F5;
    margin-top: 15px;
    padding: 10px;
    border-radius: 12px;
}
.card-body {
    background-color: #e8f1f6;
    height: auto;
    border-radius: 10px;
    padding: 0;
}
.card{
    margin-left:-6px !important;
}
    </style>

    <div class="my-dashboard">
        <div class=" demo-content">
            <div class="marquee-area">
                <ul>
                    <li><span>Page Feature:</span></li>
                    <li>
                        <p>
                            <marquee behavior="" direction=""> Keeps members informed about relevant events and
                                opportunities.</marquee>
                        </p>
                    </li>
                </ul>
            </div>
            <br>
            <div><h4><strong>Change Password</strong></h4></div>
           
            <div class="row">
                <div class="col-md-3">
                    
                    @include('myprofilesidebar')
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <!-- Slider Section (8 columns wide) -->
                        <div class="col-md-12 mt-4">
                            <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="doc-profile-inner d-flex align-items-center p-3">
                                            <img src="{{ asset($user->profile_pic ? 'images/users/' . $user->profile_pic : 'assets/img/profile-img.jpg') }}"
                                                class="img-fluid doc-image rounded-circle"
                                                alt="{{ $user->first_name }} {{ $user->last_name }}">
                                            <div class="ml-3" style="margin-left: 1pc">
                                                <h5>{{ $user->first_name }} {{ $user->last_name }}</h5>
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
                                                <div class="d-flex justify-content-center align-items-center verify-section mt-2"
                                                    style="margin-right: 3pc">


                                                    <h6 class="mb-0 mr-2" style="color:#00B2FF">
                                                        @php
                                                            $verification = \App\Models\Verification::where(
                                                                'user_id',
                                                                $user->id,
                                                            )
                                                                ->latest()
                                                                ->first();
                                                        @endphp
                                                        @if (!$verification)
                                                            {{ translate('Verify documents') }}
                                                        @elseif ($verification->verify_code == 'verified')
                                                            <img src="{{ asset('assets/doctor-panel/imgs/verify.png') }}"
                                                                alt="Verified Icon" class="verify-icon">
                                                            {{ translate('Verified') }}
                                                        @elseif ($verification->verify_code == 'progress')
                                                        <{{ translate('Verification in progress') }} @else
                                                                {{ translate('Verification in progress') }} @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dash-content">
                                <form method="POST" action="{{ route('update.password') }}" class="change_password_form">
                                    @csrf
                                    <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <!-- Old Password Input Group -->
                                                        <div class="form-group">
                                                            <p><b>Enter Your Old Password</b></p>
                                                            <input type="password" class="form-control" name="old_password">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mt-2">
                                                        <!-- New Password Input Group -->
                                                        <div class="form-group">
                                                            <p><b>Enter Your New Password</b></p>
                                                            <input type="password" class="form-control" name="new_password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit Button Row -->
                                    <div class="row" style="margin-top: 40px;margin-bottom:20px; text-align: center;">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-danger">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="section_top_img col-12">
		            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
		        </div>
				


            </div>
        </div>
    </div>
@endsection

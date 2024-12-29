@extends('layouts.app')
@section('content')
<style type="text/css">
@media screen and (max-width: 600px) {
	.profile-detail-pic
	{
		width: 100px;
    	height: 100px;
	}
	.verify-section
	{
		margin-right : 0px !important
	}
	.get-verification-code
	{
		padding-left: 0;
	}
	.doc-profile-inner
	{
		align-items : center;
	}
}	
</style>
<div class="my-dashboard">

                <h4><strong>Doctor Details</strong></h4>
                <div class="row">
                    <div class="col-md-3">
                        <!-- doc profile -->
                        @include('myprofilesidebar')
                        <!-- end doc profile -->
                    </div>
                    <div class="col-md-9">

                        <!-- dash content -->
                        <div class="dash-content mt-4">
                            <!-- form -->
                            
                                    <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="doc-profile-inner d-flex p-3">
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
					                            <img id="imagePreview" {{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($femaleImages) }}"
					                                 class="profile-detail-pic">
					                        @else
					                            <img id="imagePreview" src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($maleImages) }}"
					                                 class="profile-detail-pic">
					                        @endif
					                        <div class="upload-icon" id="uploadIcon">
                                                <i class="fa fa-camera"></i>
                                            </div>
                                            <input type="file" id="imageUpload" class="d-none" accept="image/*">
                                            
                                            <div class="ml-3 mt-3" style="margin-left: 1pc">
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


                                                    <div class="verifications">
														 @php
							                            // Retrieve the latest verification record for this user
							                                 $verification = \App\Models\Verification::where('user_id', $user->id)->latest()->first();
							                            @endphp
														@if (!$verification)
	                                                    <a href="{{ route('verification_form', ['id' => $user->id]) }}" class="btn get-verified d-none">{{translate('Verify documents')}}</a>
		                                                @elseif ($verification->verify_code == 'verified')
		                                                    <h6>
		                                                        {{translate('Verified')}} 
		                                                        <img src="{{ asset('assets/doctor-panel/imgs/approved.png') }}" alt="" class="verified-icon" title="Verified">
		                                                    </h6>
		                                                @elseif ($verification->verify_code == 'progress')
		                                                    <p>{{translate('Verification in progress')}}</p>
		                                                @else
		                                                    <a class="btn get-verification-code">{{translate('Get verification code')}}</a>
		                                                    <p>{{translate('Verification in progress')}}</p>
		                                                @endif
	                                                    

	                                                    <!-- verification code -->
	                                                    <div class="verification-code">
				                                            <div class="overlay"></div>
				                                            <div class="content">
				                                            <div class="close"><i class="fa-solid fa-circle-xmark"></i></div>
				                                            <form action="{{ route('verification.verify') }}" method="POST">
				                                            @csrf
				                                            <div class="form-group">
				                                                <p>{{translate('Verification code')}}</p>
				                                                <input type="text" name="verify_code" placeholder="{{translate('Enter valid code')}}" required>
				                                                <button type="submit">{{translate('Submit')}}</button>
				                                            </div>
				                                         </form>

				                                        </div>
														</div>
	                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('user.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="container-fluid">

                                    
                                    <div class="row box-fields">
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="firstName" class="form-label">
                                                @if($user->role=='user')
                                                	{{ translate('First Name') }} &nbsp;<span> *</span>
                                                @else
                                                	{{ translate('Company’s Name') }} &nbsp;<span> *</span>
                                                @endif
                                            </label>
                                            <div class="form-group">

                                                <input type="text"
                                                    placeholder="{{ translate('Responsible Full Name') }}" name="first_name" value="{{ $user->first_name }}"
                                                    class="form-control">

                                            </div>
                                            <!-- input field -->
                                        </div>

										@if($user->role=='user')
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="lastName" class="form-label">{{ translate('Last Name') }} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <input type="text" placeholder="{{ translate('Name') }}" name="last_name" value="{{ $user->last_name }}"
                                                    class="form-control">

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        @endif
                                        <div class="col-sm-6">
											@if($user->role=='user')
                                            <!-- input field -->
                                            <label for="memberTitle" class="form-label">{{ translate('Member Title') }} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <select name="title" class="form-control" required>
                                                    <option value="">{{translate('Select title')}}</option>
                                                    @foreach ($titles as $title)
                                                        <option value="{{ $title->name }}" {{ $user->title == $title->name ? 'selected' : '' }}>{{ $title->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            @elseif($user->role=='institute')
                                            
                                            <label for="memberTitle" class="form-label">{{translate('Core Business')}} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <input type="text" name="title" class="form-control" placeholder="{{ translate('Core Business') }}" value="{{ $user->title}}">

                                            </div>
                                            @endif
                                            <!-- input field -->

                                        </div>

                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="email" class="form-label">{{translate('Email')}} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <input type="email" name="email" placeholder="{{ translate('email') }}" value="{{ $user->email }}" class="form-control">

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        @if($user->role=='institute')
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="website" class="form-label">{{translate('Zefix IDE')}} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <input type="text" name="zefix_ide" placeholder="{{ translate('Zefix IDE') }}" value="{{ $user->zefix_ide ?: 'CHE-'}}" class="form-control">

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        @endif
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="website" class="form-label">{{translate('Website')}} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <input type="text" name="web_url" placeholder="{{ translate('Your Website') }}" value="{{ $user->web_url }}" class="form-control">

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="mobileNumber" class="form-label">{{ translate('Mobile Phone number') }}</label>
                                            <div class="form-group">

                                                <input class="form-control" type="text"
                                                    placeholder="+41XX XXX XX XX" name="phone"
                                                    value="{{ $user->phone }}" 
                                                    pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$"
                                                    title="Please enter the phone number in the format +41XX XXX XX XX"
                                                    required="">
                                            </div>
                                            <span class="mobile-format"><b>{{translate('Note')}}</b>: {{translate('Phone number will not show on web')}}  &amp; {{translate('Please follow the number format')}} +41XX XXX XX XX</span>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="newPatient" class="form-label">{{ translate('New Patients') }} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <select name="new_patient" required class="form-control">
                                                    <option value="">{{ translate('Select new patient') }}</option>
                                                    <option value="1" {{ $user->patient_status == 1 ? 'selected' : '' }}>{{ translate('Accepted') }}</option>
                                                    <option value="0" {{ $user->patient_status == 0 ? 'selected' : '' }}>{{ translate('Not Accepted') }}</option>
                                                </select>

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        @if($user->role=='user')
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="gender" class="form-label">{{ translate('Gender') }} &nbsp;<span> *</span></label>
                                            <div class="form-group select">


                                                <select name="gender" class="form-control">
                                                <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>{{ translate('Male') }}</option>
                                                    <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>{{ translate('Female') }}</option>
        
                                                </select>
                                                <span><i class="fa-solid fa-sort-down"></i></span>
                                            </div>
                                            <!-- input field -->
                                        </div>
                                        @endif
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="country" class="form-label">{{ translate('Country') }}</label>
                                            <div class="form-group">

                                                <select name="country" class="form-control">
	                                                @foreach($countries as $country)
	                                                    <option value="{{ $country->id }}" {{ in_array($country->id, explode(',', $user->country)) ? 'selected' : '' }}>
	                                                        {{translate($country->name)}}
	                                                    </option>
	                                                @endforeach
	                                            </select>

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="language"
                                                class="form-label">{{ translate('Language') }} &nbsp;<span style="color: #fc4b4b;"> *</span></label>

                                            <div>

                                                <select id="js--languages-multi-select" name="language[]" multiple="multiple" class="form-control">
                                                @foreach($languages as $language)
                                                    <option value="{{ $language->id }}" {{ in_array($language->id, explode(',', $user->language)) ? 'selected' : '' }}>
                                                        {{translate($language->name)}}
                                                    </option>
                                                @endforeach
                                            </select>

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="canton" class="form-label">{{ translate('Canton') }} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <select name="canton" required class="form-control">
                                                    <option value="">{{ translate('Select Canton') }}</option>
                                                @foreach($cantons as $canton)
                                                    <option value="{{ $canton->id }}" {{ in_array($canton->id, explode(',', $user->zip_code)) ? 'selected' : '' }}>
                                                        {{ translate($canton->name) }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="city" class="form-label">{{ translate('City') }} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <select name="city" class="form-control">
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" {{ in_array($city->id, explode(',', $user->city)) ? 'selected' : '' }}>
                                                        {{ translate($city->name) }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="address" class="form-label">{{ translate('Address') }} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <input class="form-control" type="text" id="age" name="address" class="form-control" value="{{ $user->address }}">

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="postalCode" class="form-label">{{ translate('Postal code') }} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <input type="text" id="age" name="postal_code" class="form-control" value="{{ $user->postal_code}}">

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="buildingNumber" class="form-label">{{ translate('Building Number') }} &nbsp;<span> *</span></label>
                                            <div class="form-group">

                                                <input type="text" id="age" name="house_number" class="form-control" value="{{ $user->house_number }}">

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="dob" class="form-label">
                                            	@if($user->role=='user')
                                                {{ translate('Date of Birth') }}
                                                @else
                                                {{ translate('Date of Incorporation') }}
                                                @endif
                                            </label>
                                            <div class="form-group">

                                                <input type="text" id="age" name="age" class="form-control" value="{{ \Carbon\Carbon::parse($user->age)->format('d.m.Y') }}">

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="specialty" class="form-label">{{ translate('Specialty') }} &nbsp;<span> *</span></label>
                                            <div class="form-group">

	                                        <select  name="specialties" class="form-control">
	                                            @foreach($specialties as $specialty)
	                                            <option value="{{ $specialty->id }}" {{ in_array($specialty->id, explode(',', $user->specialties)) ? 'selected' : '' }}>
	                                                            {{ translate($specialty->name) }}
	                                                        </option>
	                                            @endforeach
	                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="extraSpecialty" class="form-label">{{ translate('Extra Specialties') }} &nbsp;<span style="color: #fc4b4b;"> *</span></label>
                                            <div>

                                                <select id="js--specialties-multi-select" class="form-control" name="speciality[]" multiple="multiple" required>
                                            @foreach($diseases as $disease)
                                            <option value="{{ $disease->name }}" {{ in_array($disease->name, explode(',', $user->speciality)) ? 'selected' : '' }}>
                                                            {{ translate($disease->name) }}
                                                        </option>
                                            @endforeach
                                        </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="expertise" class="form-label">{{ translate('Expertises') }} &nbsp;<span style="color: #fc4b4b;"> *</span></label>

                                            <div>

                                                <select id="js--sxpertise-multi-select" name="sxpertise[]" multiple="multiple" class="form-control" data-placeholder="Add Expertises" required>
                                                @foreach($expertises as $expertise)
                                                <option value="{{ $expertise->id }}" {{ in_array($expertise->id, explode(',', $user->sxpertise)) ? 'selected' : '' }}>
                                                      {{ translate($expertise->name) }}
                                                        </option>
                                        
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="hinMail" class="form-label">{{ translate('HIN Email') }}</label>
                                            <div class="form-group">

                                                <input class="form-control" type="text" placeholder="{{ translate('Name') }}" name="hin_email" value="{{ $user->hin_email }}">

                                            </div>
                                            <!-- input field -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="telephone" class="form-label">{{ translate('Telephone') }}</label>
                                            <div class="form-group">

                                                <input class="form-control" type="text"
                                                    placeholder="+41XX XXX XX XX"
                                                    name="fax_phone_number" value="{{ $user->fax_phone_number }}" 
                                                    pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$"
                                                    title="Please enter the phone number in the format +41XX XXX XX XX">
                                            </div>
                                            <span class="mobile-format"><b>{{translate('Note')}}</b>: {{translate('Please follow the number format')}} +41XX XXX XX XX</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- input field -->
                                            <label for="faxNumber" class="form-label">{{ translate('Fax number') }}</label>
                                            <div class="form-group">

                                                <input class="form-control" type="text"
                                                    placeholder="+41XX XXX XX XX" name="fax_number"
                                                    value="{{ $user->fax_number }}" 
                                                    pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$"
                                                    title="Please enter the Fax number in the format +41XX XXX XX XX">
                                            </div>
                                            <span class="mobile-format"><b>{{translate('Note')}}</b>: {{translate('Please follow the number format')}} +41XX XXX XX XX</span>
                                            <!-- input field -->
                                        </div>

                                        <div class="col-sm-12">
                                            <!-- input field -->
                                            <label for="note" class="form-label">{{translate('Notes')}}</label>
                                            <div class="form-group">

                                                <textarea name="about_me" class="form-control" id="about_me" placeholder="{{translate('Write more about you')}}" rows="8">{{ $user->about_me }}</textarea>
                                            </div>
                                            <!-- input field -->
                                            
                                        </div>
                                        
                                        <div class="col-12 mt-4 mb-4 text-right">
                                        	<button type="submit"
                                                class="btn btn-danger mb-2 submit">Submit</button>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- end dash content -->
                    </div>
                    
                

                </div>
            </div>
<div class="container-fluid">

            <div class="row">
                <div class="section_top_img col-md-12">
                   <img src="{{ asset('assets/doctor-panel/imgs/slider-footer.png') }}" alt="" class="img-fuild">
                </div> 
             </div>
</div>


@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
     document.querySelector('input[name="fax_phone_number"]').addEventListener('input', function(e) {
        const value = e.target.value;

        // Automatically convert leading 0 to +41
        if (value.startsWith('0') && value.length >= 10) {
            const newValue = '+41' + value.slice(1);
            e.target.value = newValue.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }

        const regex = /^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;
        if (value !== '' && !regex.test(value)) {
            e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
        } else {
            e.target.setCustomValidity('');
        }
    });
    document.querySelector('input[name="fax_number"]').addEventListener('input', function(e) {
        const value = e.target.value;

// Automatically convert leading 0 to +41
        if (value.startsWith('0') && value.length >= 10) {
            const newValue = '+41' + value.slice(1);
            e.target.value = newValue.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }

        const regex = /^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;
        if (value !== '' && !regex.test(value)) {
            e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
        } else {
            e.target.setCustomValidity('');
        }
    });
    document.querySelector('input[name="phone"]').addEventListener('input', function(e) {
        const value = e.target.value;

        // Automatically convert leading 0 to +41
        if (value.startsWith('0') && value.length >= 10) {
            const newValue = '+41' + value.slice(1);
            e.target.value = newValue.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }

        const regex = /^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;
        if (value !== '' && !regex.test(value)) {
            e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
        } else {
            e.target.setCustomValidity('');
        }
    });

    document.querySelector('input[name="phone"]').addEventListener('invalid', function(e) {
        if (e.target.value === '') {
            e.target.setCustomValidity('');
        }
    });
    

</script>
<script>
$(document).ready(function() {

    $('#js--specialties-multi-select').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Add Specialties",
            allowClear: true
        });
        $('#js--sxpertise-multi-select').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Add Specialties",
            allowClear: true
        });
        $('#js--languages-multi-select').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Add Languages",
            allowClear: true
        });
   
    $('#uploadIcon').on('click', function() {
                $('#imageUpload').click();
            });

            $('#imageUpload').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);

                    var formData = new FormData();
                    formData.append('profile_pic', file);

                    $.ajax({
                        url: '{{ route('upload.profile.pic') }}',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#imagePreview').attr('src', response.profile_pic_url);
                                location.reload();
                            } else {
                                alert('Failed to update profile picture.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while uploading the profile picture.');
                        }
                    });
                }
            });
});

    $('.get-verification-code').click(function() {
    $('.verification-code').addClass('verification-code-active');
    });
    $('.verification-code .overlay, .verification-code .close').click(function() {
    $('.verification-code').removeClass('verification-code-active');
    });
</script>

<script>
function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

window.onload = function() {
    @if(session('success'))
        document.getElementById('popup-message').innerText = "{{ session('success') }}";
        document.getElementById('popup').style.display = 'block';
    @elseif(session('error'))
        document.getElementById('popup-message').innerText = "{{ session('error') }}";
        document.getElementById('popup').style.display = 'block';
    @endif
}
</script>
@endsection
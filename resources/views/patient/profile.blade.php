@extends('patient.layouts.app')
@section('content')

@php
// Define the image directories and get an array of image paths
$femaleImages = glob(public_path('assets/home/imgs/female-avi/f3.jpg'));
$maleImages = glob(public_path('assets/home/imgs/male-avi/male-avi2.jpg'));

// Convert absolute paths to relative URLs and replace backslashes with forward slashes
$femaleImages = array_map(function($path) {
return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
}, $femaleImages);

$maleImages = array_map(function($path) {
return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
}, $maleImages);
@endphp
<div class="row">
    <div class="col-md-12 col-xl-3">
        <div class="card mt-3">
            <div class="card-body position-relative">
                <div class="text-center mt-3">
                    <div class="chat-avtar d-inline-flex mx-auto">
                        @if($user->gender == "female")
                        <img style="width: 100%" id="imagePreview" class="profile-detail-pic rounded-circle img-fluid wid-90 img-thumbnail" src="{{ $user->profile_pic ? asset('images/patients/' . $user->profile_pic) : getRandomImage($femaleImages) }}" alt="User image" />
                        @else
                        <img style="width: 100%" id="imagePreview" class="profile-detail-pic rounded-circle img-fluid wid-90 img-thumbnail" src="{{ $user->profile_pic ? asset('images/patients/' . $user->profile_pic) : getRandomImage($maleImages) }}" alt="User image" />
                        @endif
                        <input type="file" id="imageUpload" style="display: none;">
                    </div>
                    <h5 class="mb-0 mt-2">{{$user->first_name}} {{$user->last_name}}</h5>
                    
                    <ul class="list-inline mx-auto mt-2 mb-1">
                        <li class="list-inline-item">
                            <a href="#" class="avtar avtar-s btn-light-secondary upload-icon" id="uploadIcon">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-9">
        <div class="card">
            <div class="card-header">
                <h5>{{ translate('Patient Details') }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('updatePatientProfile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-xl-6">
                            <label class="form-label">{{ translate('First Name') }} &nbsp;<span> *</span></label>
                            <input type="text" class="form-control" placeholder="{{ translate('Name') }}" name="first_name" value="{{ $user->first_name }}">
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <label class="form-label">{{ translate('Last Name') }} &nbsp;<span> *</span></label>
                            <input type="text" class="form-control" placeholder="{{ translate('Name') }}" name="last_name" value="{{ $user->last_name }}">
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label">{{translate('Email')}} &nbsp;<span> *</span></label>
                            <input type="email" class="form-control" name="email" placeholder="{{ translate('email') }}" value="{{ $user->email }}">
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label">{{ translate('Mobile Phone number') }}</label>
                            <input type="text" class="form-control" placeholder="{{ translate('+41XX XXX XX XX') }}" name="phone" value="{{ $user->phone }}" pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$" title="Please enter the phone number in the format +41XX XXX XX XX" required aria-describedby="phoneInfo">
                            <small id="phoneInfo" class="form-text text-muted">{{translate('Note: Please follow the number format')}} +41XX XXX XX XX</small>
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label" for="gender">{{ translate('Gender') }} &nbsp;<span> *</span></label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>{{ translate('Male') }}</option>
                                <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>{{ translate('Female') }}</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label" for="country">{{ translate('Country') }}</label>
                            <select class="form-select" id="country" name="country">
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ in_array($country->id, explode(',', $user->country)) ? 'selected' : '' }}>
                                    {{translate($country->name)}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label" for="choices-multiple-remove-button">{{ translate('Language') }} &nbsp;<span style="color: #fc4b4b;"> *</span></label>
                            <select class="form-control" name="language[]" id="choices-multiple-remove-button" multiple>
                                @foreach($languages as $language)
                                <option value="{{ $language->id }}" {{ in_array($language->id, explode(',', $user->language)) ? 'selected' : '' }}>
                                    {{translate($language->name)}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label" for="city">{{ translate('City') }} &nbsp;<span> *</span></label>
                            <select class="form-select" id="city" name="city">
                                @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ in_array($city->id, explode(',', $user->city)) ? 'selected' : '' }}>
                                    {{ translate($city->name) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label">{{ translate('Address') }} &nbsp;<span> *</span></label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label">{{ translate('Postal code') }} &nbsp;<span> *</span></label>
                            <input type="text" name="postal_code" class="form-control" value="{{ $user->postal_code}}">
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label">{{ translate('Date of Birth') }}</label>
                            <input type="text" id="age" name="birth_date" class="form-control" value="{{ \Carbon\Carbon::parse($user->birth_date)->format('d.m.Y') }}">
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label">{{ translate('Insurance name') }}</label>
                            <select class="form-select" name="insurance_name" id="insurance_name">
                                <option value="">{{ translate('Select Insurance') }}</option>
                                <option value="Private" {{ $user->insurance_name === 'Private' ? 'selected' : '' }}>{{ translate('Private') }}</option>
                                <option value="Government" {{ $user->insurance_name === 'Government' ? 'selected' : '' }}>{{ translate('Government') }}</option>
                            </select>
                
                        </div>
                        <div class="col-md-12 col-xl-6 mt-3">
                            <label class="form-label">{{ translate('Insurance Card Number') }}</label>
                            <input type="text" id="age" name="insurance_number" class="form-control" value="{{ $user->insurance_number }}">
                        </div>
                        <div class="col-md-12 col-xl-12 mt-3">
                            <label class="form-label" for="note">Notes</label>
                            <textarea name="about_me" class="form-control" id="about_me" placeholder="Write more about you" rows="8">{{ $user->about_me }}</textarea>
                        </div>
                        <div class="col-md-12 col-xl-12 mt-3">
                            <button type="submit" class="btn btn-danger my-4">Update</button>
                        </div>
                    </div>
                </form>
            </div>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> -->
<script src="https://html.phoenixcoded.net/light-able/bootstrap/assets/js/plugins/choices.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true
      });
    });
  </script>
<script>
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

        // $('#js--languages-multi-select').select2({
        //     tags: true,
        //     tokenSeparators: [',', ' '],
        //     placeholder: "Add Languages",
        //     allowClear: true
        // });

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
                    url: '{{ route('uploadProfilePatientPic') }}',
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
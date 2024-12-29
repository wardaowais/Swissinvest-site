<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="{{ asset('images/apps/favicon.ico') }}">
  <title>
    Hey Pal
  </title>
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
  .background-image {
    background-image: url('{{ asset("images/apps/loginbg.jpg") }}');
    background-size: cover; /* Cover the entire background */
    background-position: center; /* Center the background image */
  }
</style>

<body class="bg-gray-200">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <!-- Background Image Column -->
          <div class="col-8 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 justify-content-end flex-column" style="background-image: url('../assets/img/registerback.jpeg'); background-size: cover; background-position: center;">
            <!-- Logo and Text Overlay -->
            <div class="position-relative w-100 h-100">
              <div class="text-center position-absolute" style="bottom: 100px; left: 50%; transform: translateX(-50%);">
                <h6>
                  <img src="{{ asset('images/apps/logo.png') }}" height="90px" width="270px" alt="Logo">
                </h6>
                <p class="mb-0 mt-2" style="color: white; font-size: 14px;"><b>HeyPal Make Friends World wide</b></p>
              </div>
            </div>
          </div>
          <!-- Registration Form Column -->
          <div class="col-lg-3 d-flex flex-column ms-auto">
            <div class="card card-plain">
              @if ($errors->any())
              <div class="alert alert-danger text-white">
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
              </div>
              @endif
              <div class="card-body">
                @if($status == 'accepted')
                  @if($emailNotFound)
                    <div class="alert alert-danger text-white">
                      Sorry, we didn't find your information in the system. Please fill the required fields to join the program.
                    </div>
                  @else
                    <div class="alert alert-success text-white">
                      Thanks for accepting.
                    </div>
                  @endif
                @elseif($status == 'deny')
                  <div class="alert alert-warning text-white">
                    Thanks for your kind response. We respect your opinion that you don't want to join the program.
                  </div>
                @endif
                <h2>Registration</h2>
                <form method="POST" action="{{ route('userRegister') }}">
                  @csrf
                  <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control" name="first_name" required placeholder="First Name" value="{{ $user->first_name ?? '' }}">
                    <input type="text" class="form-control" name="last_name" required placeholder="Last Name" value="{{ $user->last_name ?? '' }}">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <select class="form-control" name="gender">
                      <option value="">Select Gender</option>
                      <option value="male" {{ isset($user) && $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                      <option value="female" {{ isset($user) && $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                      <option value="others" {{ isset($user) && $user->gender == 'others' ? 'selected' : '' }}>Other</option>
                    </select>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control" id="date_of_birth" name="age" required placeholder="Select Date of Birth" value="{{ $user->age ?? '' }}">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <select class="form-control" name="country">
                      <option value="">Select Country</option>
                      @foreach($countries as $country)
                      <option value="{{ $country->id }}" {{ isset($user) && $user->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                      @endforeach
                    </select>
                    <select class="form-control" name="language">
                      <option value="">Select Native Language</option>
                      @foreach($languages as $language)
                      <option value="{{ $language->id }}" {{ isset($user) && $user->language_id == $language->id ? 'selected' : '' }}>{{ $language->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input type="email" class="form-control" name="email" required placeholder="Email" value="{{ $user->email ?? '' }}">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                  </div>
                  <div class="form-check form-check-info text-start ps-0">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree to the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                    </label>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                  </div>
                </form>
              </div>
              <div class="card-footer pt-0 px-lg-2 px-1">
                <p class="mb-2 text-sm mx-auto">
                  Already have an account?
                  <a href="/login" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Core JS Files -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#date_of_birth').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
      });
    });
  </script>
  <script>

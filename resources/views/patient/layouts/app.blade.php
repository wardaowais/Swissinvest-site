@php
    $admin = auth()->user();
    $user = $admin->patient;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patient Dashbaord</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/color-calendar@1.0.7/dist/bundle.min.js"></script>
    <link href=" https://cdn.jsdelivr.net/npm/color-calendar@1.0.7/dist/css/theme-basic.min.css"rel="stylesheet" />
    <link href="{{ asset('assets/patient-panel/new-d/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css">
</head>

<body>
    <div class="d-flex">
        <div class="offcanvas offcanvas-start bd-sidebar" tabindex="-1" id="sideNav"
            aria-labelledby="blogDashboardSideNavination">
            <a class="bd-logo" href="#">
                <img src="{{ asset('assets/patient-panel/new-d/images/logo.svg') }}" alt="" />
            </a>
            <div class="bd-sidebar-nav">
                <ul>
                    <li>
                        <a class="active" data-bs-toggle="tooltip" data-bs-title="Dashbaord" href="{{route('patient.dashboard')}}">
                            <img src="{{ asset('assets/patient-panel/new-d/images/icons/dashboard.svg') }}"
                                alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="{{route('listFavoriteDoctor')}}" data-bs-toggle="tooltip" data-bs-title="My Favorite">
                            <img src="{{ asset('assets/patient-panel/new-d/images/icons/star.svg') }}" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="{{route('healthTips')}}" data-bs-toggle="tooltip" data-bs-title="Health Tips">
                            <img src="{{ asset('assets/patient-panel/new-d/images/icons/heathtips.svg') }}"
                                alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="{{route('showtelemedicine')}}" data-bs-toggle="tooltip" data-bs-title="Telemedicine">
                            <img src="{{ asset('assets/patient-panel/new-d/images/icons/telemedicine.svg') }}" />
                        </a>
                    </li>
                    <li>
                        <a href="{{route('showPhoneConsultaion')}}" data-bs-toggle="tooltip" data-bs-title="Phone Consultation">
                            <img src="{{ asset('assets/patient-panel/new-d/images/icons/phonee-colsultation.svg') }}"
                                alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="{{route('bookspagePatient')}}" data-bs-toggle="tooltip" data-bs-title="Book Sharing">
                            <img src="{{ asset('assets/patient-panel/new-d/images/icons/booksharing.svg') }}"
                                alt="" />
                        </a>
                    </li>
                    <li>
                        <a  href="{{ route('logout') }}" data-bs-toggle="tooltip" data-bs-title="Log Out">
                            <img src="{{ asset('assets/patient-panel/new-d/images/icons/log-in.svg') }}" alt="" />
                        </a>
                    </li>
                </ul>
               
            </div>
        </div>

        <div class="container-fluid">
            <!-- TOP NAV -->
            <div class="bd-top-nav">
                <div class="bd-top-nav-offcanvas-control">
                    <button class="btn p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideNav"
                        aria-controls="offcanvasExample">
                        <img src="{{ asset('assets/patient-panel/new-d/images/icons/menu.svg') }}" alt="" />
                    </button>
                </div>
                <div class="bd-top-nav-search">
                    <div class="input-group">
                        <span class="input-group-text" id="nav-search">
                            <img src="{{ asset('assets/patient-panel/new-d/images/icons/search.svg') }}"
                                alt="" />
                        </span>
                        <input type="text" class="form-control" placeholder="Search for anything.."
                            aria-label="Search" aria-describedby="nav-search" />
                    </div>
                </div>
                <div class="bd-top-nav-calender">
                    <button type="button" class="btn btn-link bd-btn-link">
                        <img class="calendar-icon"
                            src="{{ asset('assets/patient-panel/new-d/images/icons/calendar.svg') }}" alt="" />
                        <span class="day">Today </span>
                        <span>{{ now()->format('F j') }}</span>
                        <img class="chevron-down"
                            src="{{ asset('assets/patient-panel/new-d/images/icons/chevron-down.svg') }}"
                            alt="" />
                    </button>
                </div>
    

                <div class="bd-top-nav-userinfo">
                    <button
                      data-bs-toggle="dropdown"
                      class="btn btn-link bd-btn-link user-dropdown"
                    >
                      <span> {{ getLanguages()->firstWhere('code', session('locale', 'en'))->name }}</span>
                      <img src="{{ asset('assets/patient-panel/new-d/images/icons/chevron-down.svg') }}" alt="" />
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end bd-dropdown-menu">
                        @foreach(getLanguages() as $language)
                        @if($language->translation_status != null)
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('locale-form-{{ $language->code }}').submit();">
                            {{ $language->name }}
                        </a>
                        <form id="locale-form-{{ $language->code }}" action="{{ route('setLocale') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="locale" value="{{ $language->code }}">
                        </form>
                        @endif
                        @endforeach
                    </ul>
        
                    {{-- <button class="btn btn-link bd-btn-link notification">
                      <img src="images/icons/bell.svg" alt="" />
                      <span>8</span>
                    </button> --}}
                    <button
                      data-bs-toggle="dropdown"
                      class="btn btn-link bd-btn-link user-dropdown"
                    >@php
                    // Define the image directories and get an array of image paths
                    $femaleImages = glob(public_path('assets/home/imgs/female-avi/f3.jpg'));
                    $maleImages = glob(public_path('assets/home/imgs/male-avi/male-avi2.jpg'));
    
                    // Convert absolute paths to relative URLs and replace backslashes with forward slashes
                    $femaleImages = array_map(function ($path) {
                        return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
                    }, $femaleImages);
    
                    $maleImages = array_map(function ($path) {
                        return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
                    }, $maleImages);
                @endphp
    
                @if ($user->gender == 'female')
                    <img height="26" width="26" class="rounded" src="{{ $user->profile_pic ? asset('images/patients/' . $user->profile_pic) : getRandomImage($femaleImages) }}">
                @else
                    <img height="26" width="26" class="rounded" src="{{ $user->profile_pic ? asset('images/patients/' . $user->profile_pic) : getRandomImage($maleImages) }}">
                @endif
                      <img src="{{ asset('assets/patient-panel/new-d/images/icons/chevron-down.svg') }}" alt="" />
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end bd-dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('patientProfile') }}">{{translate('Profile')}}</a></li>
                      <li><a class="dropdown-item" href="#">Menu item</a></li>
                      <li><a class="dropdown-item" href="#">Menu item</a></li>
                    </ul>
                  </div>
            </div>
            <!-- /TOP NAV -->
            @yield('content')
        </div>
        <script src="{{asset('assets/patient-panel/new-d/js/scripts.js')}}"></script>
        @yield('scripts')
</body>

</html>

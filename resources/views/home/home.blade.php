@extends('home.layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/easyui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/calendar-icon.css') }}">
    <style>
        /* .fixed-header {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
            }

            body {
                padding-top: 70px;
            } */
        .calendar-selected {
            background-color: #a8efa9;
            border: 1px solid #009688;
        }

        .profile-picture {
            width: 100%;
            height: 200px;
            border-radius: 5%;
            object-fit: cover;
        }

        .scroll-list {
            width: 100%;
            /* margin-left: 5%; */
            text-align: center;
            /* margin: 50px auto; */
            height: 200px;
            /* Set the height of the list */
            overflow: auto;
            /* Enable scrolling */
            padding: 20px;
            background: #f1f1f1;
            border: 1px solid #9dbae7;
            border-radius: 8px;
            /* box-shadow: 0px 7px 16px 0px rgba(41,53,108,0.25); */
        }


        .scroll-list::-webkit-scrollbar {
            width: 0;
            /* Hide scrollbar for Webkit browsers */
        }

        .scroll-list {
            -ms-overflow-style: none;
            /* Hide scrollbar for Internet Explorer and Edge */
            scrollbar-width: none;
            /* Hide scrollbar for Firefox */
        }

        .scroll-list__item {
            padding: 5px;
            margin-bottom: 5px;
            background: #ffffff;
            border-radius: 8px;
            color: #000000;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .active {
            padding: 5px;
            margin-bottom: 5px;
            background: #009688;
            border-radius: 8px;
            color: #fff;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
        }

        /* .calendar_holder{
                margin-inline-start: auto;
                display: flex;
            } */
        .text-teal {
            color: #009688;
        }

        .bg-teal {
            background-color: #009688;
            border: #009688;
        }

        .card-body {
            border-radius: 10px;
        }
    </style>
    <section class="banner height-auto"
        style="background-image: url('./imgs/01/banner.png');
     background-size: cover; text-align: center;">
        <div class="container">
            <div class="row a-center ">
                <div class="col d-none">
                    <h1>{{ translate('Ophthalmologist') }}</h1>
                    <p>{{ translate('An ophthalmologist is an eye care specialist. Unlike optometrists and opticians, ophthalmologists are doctors of medicine (MD) or doctors of osteopathy (DO) with specific training and experience in diagnosing and treating eye and vision conditions.') }}
                    </p>
                </div>
            </div>
            <div class="bform">
                <div class="tabs">
                    <ul>
                        <li><a href="#tabs-1" id="tab-onsite"><span><i class="fa-solid fa-house"></i></span> {{translate('on site')}}</a></li>
                        <li><a href="#tabs-2" id="tab-remote"><span><i class="fa-solid fa-earth-americas"></i></span>{{translate('Remote')}} </a></li>
                        {{-- <li><a href="#tabs-3"><span><i class="fa-solid fa-earth-americas"></i></span> Institute</a></li> --}}
                    </ul>
                    <div id="tabs-1">
                        <form action="{{ route('search.users') }}" method="GET">
                            <ul>
                                <li>
                                    {{-- <p>{{translate (getPageContent('search_lebel1')) }}</p> --}}
                                    <div class="search-container">
                                        <input type="text" class="search-input search-input-2" placeholder="{{translate ('Profession') }}" required>
                                        <div class="dropdownn dropdownn-2">
                                            <input type="hidden" name="specialty" id="specialtyId">
                                            @foreach($specialties as $specialty)
                                            <div class="suggestion" data-att="{{encrypt($specialty->id)}}">{{ translate($specialty->name)}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    {{-- <p>{{translate (getPageContent('search_lebel2')) }}</p> --}}
                                    <div class="search-container2">
                                        <input type="text" class="search-input search-input-3" placeholder="{{translate ('Location') }}" required>
                                        <div class="dropdown dropdown-3">
                                            <input type="hidden" id="locationId" name="city">
                                            @foreach ($locations as $city)
                                            <div class="option" data-att="{{encrypt($city->id)}}">{{ translate($city->name) }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div id="tabs-2">
                        <form action="{{ route('search.users') }}" method="GET">
                            <ul>
                                <li>
                                    {{-- <p>{{translate (getPageContent('search_lebel1')) }}</p> --}}
                                    <div class="search-container">
                                        <input type="text" class="search-input search-input-7" placeholder="{{translate ('Profession') }}" required>
                                        <div class="dropdownn dropdownn-7">
                                            <input type="hidden" name="specialty" id="remotespecialtyId">
                                            @foreach($specialties as $specialty)
                                            <div class="suggestion" data-att="{{encrypt($specialty->id)}}">{{ translate($specialty->name)}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    {{-- <p>{{translate (getPageContent('search_lebel2')) }}</p> --}}
                                    <div class="search-container2">
                                        <input type="text" class="search-input search-input-8" placeholder="{{translate ('Location') }}" required>
                                        <div class="dropdown dropdown-8">
                                            <input type="hidden" id="remotelocationId" name="city">
                                            @foreach ($locations as $city)
                                            <div class="option" data-att="{{encrypt($city->id)}}">{{ translate($city->name) }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <!-- Hidden field to indicate remote service type -->
                                    <input type="hidden" name="service_type" value="remote">
                                    <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </li>
                            </ul>
                        </form>
                    </div>
    
            </div>

            </div>
            </div>
        </div>
    </section>

    <section class="doc-list" style="margin-top: 25px;">
        <div class="container">
            @if (isset($instituteName))
                <div class="alert alert-info">
                    {{ translate('Searching by Institute') }}: <strong>{{ $instituteName }}</strong>
                </div>
            @endif
            @if (isset($specialtyName))
                <div class="alert alert-info">
                    {{ translate('Searching by Institute') }}: <strong>{{ $specialtyName }}</strong>
                </div>
            @endif
            <div class="row a-center">

                <div class="col-lg-6 col-md-4">

                    <h1 class="headline">{{ translate(getPageContent('list_header')) }}</h1>
                    <div class="bcontent">
                        <p>{{ $totalDoctors }} {{ translate(getPageContent('available_member')) }}</p>
                        <a href="{{ route('allDoctormap') }}" class="btn btn-danger">{{ translate('Show in Map') }}
                            <span><i class="fa-solid fa-location-dot"></i></span></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="cat">
                        <ul>
                            <li>
                                <span><i class="fa-solid fa-angle-down"></i></span>
                                <select id="newPatientsSelect" name="new_patients">
                                    <option value="" selected>{{ translate(getPageContent('new_patients')) }}
                                    </option>
                                    <option value="1">{{ translate('Accepted') }}</option>
                                </select>
                            </li>
                            <li>
                                <span><i class="fa-solid fa-angle-down"></i></span>
                                <select id="languageSelect" name="language">
                                    <option value="" selected>{{ translate(getPageContent('Languages_text')) }}
                                    </option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <span><i class="fa-solid fa-angle-down"></i></span>
                                <select id="genderSelect" name="gender">
                                    <option value="" selected>{{ translate(getPageContent('Gender')) }}</option>
                                    <option value="male">{{ translate('Male') }}</option>
                                    <option value="female">{{ translate('Female') }}</option>
                                </select>
                            </li>
                            <li>
                                <span><i class="fa-solid fa-angle-down"></i></span>
                                <select id="networkSelect" name="network">
                                    <option value="" selected>{{ translate(getPageContent('Network')) }}</option>
                                    @foreach ($networks as $network)
                                        <option value="{{ $network->id }}">{{ $network->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- list single -->
            <div class="dlist_single">
                <div class="containerr">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($noDoctorsFound)
                                <h1>
                                    {{ translate('No Members found.') }}
                                </h1>
                            @endif
                            <!-- content -->
                            @foreach ($users as $user)
                                <div class="row my-lg-4 my-2">
                                    <div class="col-md-12">
                                        <div class="card card-body shadow-sm">
                                            <div class="row">
                                                <div class="col-md-2 col-12 d-flex align-items-center">
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
                                                         class="profile-picture m-auto">
                                                @else
                                                    <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($maleImages) }}"
                                                         class="profile-picture m-auto">
                                                @endif
                                                
                                                   
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    @if ($user->role == 'institute')
                                                        <h3 class="text-teal">{{ $user->first_name }}
                                                            {{ $user->last_name }}
                                                        @else
                                                            <h3 class="text-teal">{{ $user->title }}
                                                                {{ $user->first_name }} {{ $user->last_name }}
                                                    @endif
                                                    @php
                                                        $verification = \App\Models\Verification::where(
                                                            'user_id',
                                                            $user->id,
                                                        )
                                                            ->latest()
                                                            ->first();
                                                    @endphp
                                                    @if ($user->payment_method && $verification && $verification->verify_code == 'verified')
                                                        <img src="https://directory.doctomed.ch/assets/doctor-panel/imgs/approved.png"
                                                            alt="" class="verified-icon" title="Verified">
                                                    @endif
                                                    </h3>
                                                    <h6><span><i class="fa-solid fa-location-dot"></i></span>
                                                        {{ !empty($user->address) ? $user->address : 'Address Not Updated' }}
                                                        {{ $user->house_number }}, {{ $user->postal_code }},
                                                        @foreach (explode(',', $user->city) as $cityId)
                                                            @php
                                                                $city = App\Models\City::find($cityId);
                                                            @endphp
                                                            @if ($city)
                                                                {{ $city->name }}
                                                            @endif
                                                        @endforeach
                                                    </h6>
                                                    <span class="badge badge-light bg-light p-2">
                                                        @foreach (explode(',', $user->specialties) as $specialtyId)
                                                            @php
                                                                $specialty = App\Models\Specialty::find($specialtyId);
                                                            @endphp
                                                            @if ($specialty)
                                                                {{ $specialty->name }}
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                    <div class="profile-rating">
                                                        <ul class="tags">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <li>
                                                                    @if ($i <= floor($user->average_rating))
                                                                        <i class="fa-solid fa-star"></i>
                                                                    @elseif($i == ceil($user->average_rating) && $user->average_rating - floor($user->average_rating) >= 0.5)
                                                                        <i class="fa-solid fa-star-half-alt"></i>
                                                                    @else
                                                                        <i class="fa-regular fa-star"></i>
                                                                    @endif
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                        <p class="mb-2">Rating: {{ $user->average_rating }}
                                                            ({{ $user->review_count }} reviews)</p>
                                                        <a href="{{ url('doctor-map/' . encrypt($user->id)) }}"
                                                            class="btn btn-success mt-2 bg-teal">{{ translate(getPageContent('profile_button')) }}</a>
                                                        @if ($user->role == 'institute')
                                                            <!-- <a href="{{ route('search.users', ['institute' => encrypt($user->id)]) }}" class="btn btn-success">
                                                            {{ translate('search by institute') }}
                                                        </a> -->
                                                            <a class="btn btn-success mt-2" data-toggle="collapse"
                                                                data-institute-id="{{ $user->id }}"
                                                                href="#collapseMember{{ $user->id }}" role="button"
                                                                aria-expanded="false" aria-controls="collapseExample">
                                                                see members
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if ($user->is_active == 1)
                                                    <div class="col-md-5 col-12">
                                                        <div class="row">
                                                            <div class="col-md-7 col-12 mt-lg-0 mt-3 px-1">
                                                                <div class="easyui-calendar"
                                                                    data-user-id="{{ $user->id }}"
                                                                    style="width: 100%; height: 200px;border-radius: 10px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 col-12 mt-lg-0 mt-3 pl-0">
                                                                <div class="scroll-list"
                                                                    data-user-id="{{ $user->id }}">
                                                                    <!-- Time slots will be dynamically populated here -->
                                                                    <button
                                                                        class="next-available-date btn btn-danger">{{ translate('Next availability date') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($user->role == 'institute')
                                                        @php
                                                            // Retrieve members for this institute user dynamically
                                                            $members = \App\Models\User::whereIn(
                                                                'id',
                                                                \App\Models\MemberGroup::where(
                                                                    'host_id',
                                                                    $user->id,
                                                                )->pluck('user_id'),
                                                            )->get();
                                                        @endphp
                                                        <div class="collapse show col-md-12 col-12"
                                                            id="collapseMember{{ $user->id }}">
                                                            @if ($members->isNotEmpty())
                                                                <div class="row my-lg-4 my-2">
                                                                    <div class="ml-auto col-md-11 col-12 mt-2">
                                                                        <h4>{{ translate('Member list of') }}
                                                                            {{ $user->first_name }}</h4>
                                                                    </div>
                                                                    @foreach ($members as $member)
                                                                        <div class="ml-auto col-md-11 col-12 mt-3">
                                                                            <div class="card card-body shadow-sm">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-md-2 col-12 d-flex align-items-center">
                                                                                        @if($member->gender == "female")
                                                    <img src="{{ $member->profile_pic ? asset('images/users/' . $member->profile_pic) : getRandomImage($femaleImages) }}"
                                                         class="profile-picture m-auto">
                                                @else
                                                    <img src="{{ $member->profile_pic ? asset('images/users/' . $member->profile_pic) : getRandomImage($maleImages) }}"
                                                         class="profile-picture m-auto">
                                                @endif
                                                                                        {{-- <img src="{{ $member->profile_pic ? asset('images/users/' . $member->profile_pic) : asset('assets/home/imgs/02/3.png') }}"
                                                                                            class="profile-picture m-auto"> --}}
                                                                                    </div>
                                                                                    <div class="col-md-5 col-12">
                                                                                        <h3 class="text-teal">
                                                                                            {{ $member->first_name }}
                                                                                            {{ $member->last_name }}
                                                                                            @php
                                                                                                $verification = \App\Models\Verification::where(
                                                                                                    'user_id',
                                                                                                    $member->id,
                                                                                                )
                                                                                                    ->latest()
                                                                                                    ->first();
                                                                                            @endphp
                                                                                            @if ($member->payment_method && $verification && $verification->verify_code == 'verified')
                                                                                                <img src="https://directory.doctomed.ch/assets/doctor-panel/imgs/approved.png"
                                                                                                    alt=""
                                                                                                    class="verified-icon"
                                                                                                    title="Verified">
                                                                                            @endif
                                                                                        </h3>

                                                                                        <h6><span><i
                                                                                                    class="fa-solid fa-location-dot"></i></span>
                                                                                            {{ !empty($member->address) ? $member->address : 'Address Not Updated' }}
                                                                                            {{ $member->house_number }},
                                                                                            {{ $member->postal_code }},
                                                                                            @foreach (explode(',', $member->city) as $cityId)
                                                                                                @php
                                                                                                    $city = App\Models\City::find(
                                                                                                        $cityId,
                                                                                                    );
                                                                                                @endphp
                                                                                                @if ($city)
                                                                                                    {{ $city->name }}
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </h6>

                                                                                        <span
                                                                                            class="badge badge-light bg-light p-2">
                                                                                            @foreach (explode(',', $member->specialties) as $specialtyId)
                                                                                                @php
                                                                                                    $specialty = App\Models\Specialty::find(
                                                                                                        $specialtyId,
                                                                                                    );
                                                                                                @endphp
                                                                                                @if ($specialty)
                                                                                                    {{ $specialty->name }}
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </span>

                                                                                        <div class="profile-rating">
                                                                                            <ul class="tags">
                                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                                    <li>
                                                                                                        @if ($i <= floor($member->average_rating))
                                                                                                            <i
                                                                                                                class="fa-solid fa-star"></i>
                                                                                                        @elseif($i == ceil($member->average_rating) && $member->average_rating - floor($member->average_rating) >= 0.5)
                                                                                                            <i
                                                                                                                class="fa-solid fa-star-half-alt"></i>
                                                                                                        @else
                                                                                                            <i
                                                                                                                class="fa-regular fa-star"></i>
                                                                                                        @endif
                                                                                                    </li>
                                                                                                @endfor
                                                                                            </ul>
                                                                                            @if ($member->average_rating > 0)
                                                                                                <p class="mb-2">Rating:
                                                                                                    {{ $member->average_rating }}
                                                                                                    ({{ $member->review_count }}
                                                                                                    reviews)</p>
                                                                                            @else
                                                                                                <p class="mb-2">Rating: 0
                                                                                                    (0 reviews)</p>
                                                                                            @endif
                                                                                            <a href="{{ url('doctor-map/' . encrypt($member->id)) }}"
                                                                                                class="btn btn-success mt-2 bg-teal">{{ translate(getPageContent('profile_button')) }}</a>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-5 col-12">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-md-7 col-12 mt-lg-0 mt-3 px-1">
                                                                                                <div class="easyui-calendar collapse-calender"
                                                                                                    data-user-id="{{ $member->id }}"
                                                                                                    style="width: 100%; height: 200px; border-radius: 10px;">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-md-5 col-12 mt-lg-0 mt-3 pl-0">
                                                                                                <div class="scroll-list"
                                                                                                    data-user-id="{{ $member->id }}">
                                                                                                    <!-- Time slots will be dynamically populated here -->
                                                                                                    {{-- <button
                                                                                                        class="next-available-date btn btn-danger">Next
                                                                                                        availability
                                                                                                        date</button> --}}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <p>No members found for this institute.</p>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @else
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $users->links('vendor.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end list single -->

            <!-- add banner -->
            <div class="add-banner">
                <div id="bannerSlider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                @if ($slider->banner_name)
                                    <a href="{{ $slider->banner_name }}" target="_blank">
                                        <img src="{{ asset('images/apps/' . $slider->image) }}" alt="ads"
                                            style="height: 200px; width:100%;">
                                    </a>
                                @else
                                    <img src="{{ asset('images/apps/' . $slider->image) }}" alt="ads"
                                        style="height: 200px; width:100%;">
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#bannerSlider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{ translate('Previous') }}</span>
                    </a>
                    <a class="carousel-control-next" href="#bannerSlider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{ translate('Next') }}</span>
                    </a>
                </div>
            </div>

            <!-- end ad banner -->


        </div>
    </section>

@endsection


@section('scripts')
    <script src="{{ asset('assets/home/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/home/js/jquery.easyui.min.js') }}"></script>


    <script>
        $(document).ready(function() {

            const generateDateOptions = () => {
                const today = new Date();
                const dateOptions = [];
                for (let i = 0; i < 100; i++) {
                    const date = new Date(today);
                    date.setDate(today.getDate() + i);
                    dateOptions.push(date.toISOString().split('T')[0]);
                }
                return dateOptions;
            };

            const formatDate = (date) => {
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                return `${year}-${month}-${day}`;
            };


            const fetchTimeSlots = (date, userId) => {
                $.ajax({
                    url: '/get-time-slots',
                    method: 'GET',
                    data: {
                        date: date,
                        user_id: userId
                    },
                    success: function(response) {
                        const timeOptionsContainer = $(`.scroll-list[data-user-id="${userId}"]`);
                        const nextAvailableDateButton = $(
                            `.next-available-date[data-user-id="${userId}"]`);

                        if (response.timeSlots && response.timeSlots.length > 0) {
                            let slotsHtml = '';
                            response.timeSlots.forEach((slot) => {

                                const time = $('<div>').text(moment(slot.from_time,
                                    'HH:mm:ss').format('h:mm A')).html();
                                slotsHtml +=
                                    `<div class="scroll-list__item" data-slot-id="${slot.id}">${time}</div>`;
                            });
                            timeOptionsContainer.html(slotsHtml);
                            nextAvailableDateButton.hide();
                        } else {
                            timeOptionsContainer.html('');
                            nextAvailableDateButton.show();
                        }
                    },
                    error: function() {
                        const timeOptionsContainer = $(`.scroll-list[data-user-id="${userId}"]`);
                        timeOptionsContainer.html('');
                        const nextAvailableDateButton = $(
                            `.next-available-date[data-user-id="${userId}"]`);
                        nextAvailableDateButton.show();
                    }
                });
            };

            const fetchNextAvailableDate = (currentIndex, dates, userId) => {
                const nextIndex = currentIndex + 1;
                if (nextIndex < dates.length) {
                    $.ajax({
                        url: '/get-time-slots',
                        method: 'GET',
                        data: {
                            date: dates[nextIndex],
                            user_id: userId
                        },
                        success: function(response) {
                            if (response.timeSlots && response.timeSlots.length > 0) {
                                const dateOptionsContainer = $(
                                    `.scroll-list[data-user-id="${userId}"]`);
                                const nextAvailableDateButton = $(
                                    `.next-available-date[data-user-id="${userId}"]`);

                                dateOptionsContainer.html('');
                                fetchTimeSlots(dates[nextIndex], userId);
                                nextAvailableDateButton.hide();
                            } else {
                                fetchNextAvailableDate(nextIndex, dates, userId);
                            }
                        },
                        error: function() {
                            console.error('Error fetching the next available date.');
                        }
                    });
                } else {
                    $(`.next-available-date[data-user-id="${userId}"]`).hide();
                }
            };

            $('.easyui-calendar').each(function() {
                const userId = $(this).data('user-id');
                const dates = generateDateOptions();
                const nextAvailableDateButton = $(`.next-available-date[data-user-id="${userId}"]`);

                $(this).calendar({
                    onSelect: function(date) {
                        const formattedDate = formatDate(date);
                        fetchTimeSlots(formattedDate, userId);
                    }
                });

                // Set initial date
                const currentDate = formatDate(new Date());
                fetchTimeSlots(currentDate, userId);

                // Handle next available date button click
                nextAvailableDateButton.click(function() {
                    fetchNextAvailableDate(0, dates, userId);
                });

                $('#tab-onsite').on('click', function(e) {
                    e.preventDefault();
                    console.log("Onsite tab detected"); 
                    $(this).addClass('active');
                    $('#tab-remote').removeClass('active');
                    sessionStorage.setItem('service_type', 'onsite');
                  
                });

                $('#tab-remote').on('click', function(e) {
                    e.preventDefault();
                    console.log("Remote tab detected"); 
                    $('#tab-onsite').removeClass('active');
                    sessionStorage.setItem('service_type', 'remote');
                    
                });
                // Handle time slot click events
                $(document).on('click', '.scroll-list__item', function() {
                    const slotId = $(this).data('slot-id');
                    const userId = $(this).closest('.scroll-list').data('user-id');
                    const serviceType = sessionStorage.getItem('service_type') || 'onsite';

                    $.ajax({
                        url: '{{ route('storeUserIdInSession') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for protection
                            user_id: userId,
                            slot_id: slotId,
                            service_type: serviceType,
                        },
                        success: function() {
                            // Redirect to patient booking page
                            window.location.href = '{{ route('patientBooking') }}';
                        },
                        error: function() {
                            alert('Error setting session data.');
                        }
                    });
                });
            });

            // Optionally hide any initially open collapses
            $('.collapse').removeClass('show');
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);

            // Utility function to sanitize text to prevent XSS
            function sanitize(text) {
                const element = document.createElement('div');
                element.textContent = text;
                return element.innerHTML;
            }

            // Function to safely get a value from a data attribute
            function getSafeAttribute(selector, attribute) {
                const element = document.querySelector(selector);
                return element ? sanitize(element.getAttribute(attribute)) : null;
            }

            // Set the initial values based on the URL parameters
            const specialtyId = sanitize(urlParams.get('specialty'));
            const cityId = sanitize(urlParams.get('city'));
            const newPatients = sanitize(urlParams.get('new_patients'));
            const language = sanitize(urlParams.get('language'));
            const gender = sanitize(urlParams.get('gender'));
            const network = sanitize(urlParams.get('network'));

            // Set hidden inputs and text fields based on URL parameters
            if (specialtyId) {
                document.getElementById('specialtyId').value = specialtyId;
                const specialtyText = getSafeAttribute(`.dropdownn-2 .suggestion[data-att="${specialtyId}"]`,
                    'textContent');
                if (specialtyText) {
                    document.getElementById('specialtyText').value = specialtyText;
                }
            }

            if (cityId) {
                document.getElementById('locationId').value = cityId;
                const locationText = getSafeAttribute(`.dropdown-3 .option[data-att="${cityId}"]`, 'textContent');
                if (locationText) {
                    document.getElementById('locationText').value = locationText;
                }
            }

            // Add click event listeners to the dropdown suggestions
            document.querySelectorAll('.dropdownn-2 .suggestion').forEach(function(item) {
                item.addEventListener('click', function() {
                    const id = sanitize(this.getAttribute('data-att'));
                    const text = sanitize(this.textContent);
                    document.getElementById('specialtyId').value = id;
                    document.getElementById('specialtyText').value = text;
                });
            });

            document.querySelectorAll('.dropdown-3 .option').forEach(function(item) {
                item.addEventListener('click', function() {
                    const id = sanitize(this.getAttribute('data-att'));
                    const text = sanitize(this.textContent);
                    document.getElementById('locationId').value = id;
                    document.getElementById('locationText').value = text;
                });
            });

            // Set sub-filter values based on URL parameters
            if (newPatients) {
                document.getElementById('newPatientsSelect').value = newPatients;
            }
            if (language) {
                document.getElementById('languageSelect').value = language;
            }
            if (gender) {
                document.getElementById('genderSelect').value = gender;
            }
            if (network) {
                document.getElementById('networkSelect').value = network;
            }

            // Function to update form action with current filter values
            function updateFormAction() {
                const form = document.getElementById('filterForm');
                const url = new URL(form.action, window.location.origin);

                url.searchParams.set('specialty', sanitize(document.getElementById('specialtyId').value));
                url.searchParams.set('city', sanitize(document.getElementById('locationId').value));
                url.searchParams.set('new_patients', sanitize(document.getElementById('newPatientsSelect').value));
                url.searchParams.set('language', sanitize(document.getElementById('languageSelect').value));
                url.searchParams.set('gender', sanitize(document.getElementById('genderSelect').value));
                url.searchParams.set('network', sanitize(document.getElementById('networkSelect').value));

                form.action = url.toString();
            }

            // Add event listeners to sub-filters to update form action and submit the form on change
            document.getElementById('newPatientsSelect').addEventListener('change', function() {
                updateFormAction();
                document.getElementById('filterForm').submit();
            });

            document.getElementById('languageSelect').addEventListener('change', function() {
                updateFormAction();
                document.getElementById('filterForm').submit();
            });

            document.getElementById('genderSelect').addEventListener('change', function() {
                updateFormAction();
                document.getElementById('filterForm').submit();
            });

            document.getElementById('networkSelect').addEventListener('change', function() {
                updateFormAction();
                document.getElementById('filterForm').submit();
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize the EasyUI calendar

        });
    </script>
@endsection

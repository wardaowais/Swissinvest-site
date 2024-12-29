@extends('patient.layouts.app')
@section('content')
<!-- [ breadcrumb ] start -->
<link rel="stylesheet" type="text/css" href="https://doctomed.ch/assets/home/css/easyui.css">
<link rel="stylesheet" type="text/css" href="https://doctomed.ch/assets/home/css/calendar-icon.css">
<style>
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
        scrollbar-width: none;
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
    /* .active {
        padding: 5px;
        margin-bottom: 5px;
        background: #009688;
        border-radius: 8px;
        color: #fff;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
    } */
    .bg-teal {
        background-color: #009688;
        border: #009688;
    }
    .btn-success.bg-teal {
        color: #fff !important;
    }
    .profile-picture {
        width: 100%;
        height: 200px;
        border-radius: 5%;
        object-fit: cover;
    }
    .breadcrumb {
        display: flex;
        padding-left: 0px;
        list-style: none;
        margin-top: 10px;
    }
    .breadcrumb .breadcrumb-item {
        margin-right: 24px;
    }
    .breadcrumb a {
        text-decoration: none;
    }
    .breadcrumb .breadcrumb-item.active a {
        color: #9CA3AF !important
    }
    .breadcrumb-item+.breadcrumb-item::before {
        content: "\f054";
        font-weight: 900;
        font-family: "Font Awesome 6 Free";
        position: absolute;
        margin-left: -17px;
        font-size: 10px;
        margin-top: 5px;
    }
    .tags {
        display: flex;
        gap: 10px;
        align-items: center;
        padding-left: 0px !important;
        margin-bottom: 3px !important;
    }
    .tags,
    .tags li {
        list-style-type: none;
    }
    .profile-rating {
        margin-top: 5px;
    }
    .profile-rating ul li {
        background: transparent !important;
        padding: 0 !important;
        font-size: 19px !important;
        color: #009688 !important;
    }
    .profile-rating p {
        margin-bottom: 0 !important;
        color: #009688 !important;
        font-size: 14px !important;
        font-weight:Â 500;
    }
    .text-teal {
        color: #009688;
    }
</style>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Availability</a></li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="main-ttl py-4">
                    <h2 class="top-left-line"> Doctor Availability</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <div class="row">
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
                        <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($femaleImages) }}" class="profile-picture m-auto">
                        @else
                        <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($maleImages) }}" class="profile-picture m-auto">
                        @endif
                    </div>
                    <div class="col-md-5 col-12">
                        @php
                        $verification = \App\Models\Verification::where('user_id', $user->id)->latest()->first();
                        @endphp
                        <h3 class="text-teal">
                            @if ($user->role == 'institute')
                            {{ $user->first_name }} {{ $user->last_name }}
                            @else
                            {{ $user->title }} {{ $user->first_name }} {{ $user->last_name }}
                            @endif 
                            @if ($user->payment_method && $verification && $verification->verify_code == 'verified')
                            <img src="https://directory.doctomed.ch/assets/doctor-panel/imgs/approved.png" width="25" alt="" class="" title="Verified">
                            @endif
                        </h3>
                        <h6>
                            <span><i class='fa-solid fa-location-dot'></i></span>
                            {{ !empty($user->address) ? $user->address : 'Address Not Updated' }},
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
                        <span class="badge badge-light text-dark bg-light p-2">
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
                                @if ($i <= floor($user->average_rating))
                                <li><i class="fa-solid fa-star text-teal"></i></li>
                                @elseif($i == ceil($user->average_rating) && $user->average_rating - floor($user->average_rating) >= 0.5)
                                <li><i class="fa-regular fa-star-half-stroke text-teal"></i></li>
                                @else
                                <li><i class="fa-regular fa-star text-teal"></i></li>
                                @endif
                                @endfor
                            </ul>
                            <p class="mb-2">Rating: {{ $user->average_rating }} ({{ $user->review_count }} reviews)</p>
                            <a href="{{ url('doctor-map/' . encrypt($user->id)) }}"
                            class="btn btn-success mt-2 bg-teal">{{ translate(getPageContent('profile_button')) }}</a>
                        </div>
                    </div>
                    @if ($user->is_active == 1)
                    <div class="col-md-5 col-12">
                        <div class="row">
                            <div class="col-md-7 col-12 mt-lg-0 mt-3 px-1">
                                <div class="easyui-calendar" data-user-id="{{ $user->id }}" style="width: 100%; height: 200px; border-radius: 10px;">
                                </div>
                            </div>
                            <div class="col-md-5 col-12 mt-lg-0 mt-3 pl-0">
                                <div class="scroll-list" data-user-id="{{ $user->id }}">
                                    <!-- Time slots will be dynamically populated here -->
                                    <!-- <button class="next-available-date btn btn-danger">{{ translate('Next availability date') }}</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- [ Main Content ] end -->
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

                // Handle time slot click events
                $(document).on('click', '.scroll-list__item', function() {
                    const slotId = $(this).data('slot-id');
                    const userId = $(this).closest('.scroll-list').data('user-id');

                    $.ajax({
                        url: '{{ route('storeUserIdInSession') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for protection
                            user_id: userId,
                            slot_id: slotId,
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
        $(document).ready(function () {
          $('.easyui-calendar').calendar({
            current: new Date()
          });
          $('.collapse').removeClass('show');
        })
      </script>
@endsection
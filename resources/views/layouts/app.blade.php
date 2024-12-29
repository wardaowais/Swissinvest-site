@php
    $admin = auth()->user();
    $user = $admin->user;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <!-- favicon -->
    <link href="https://doctomed.ch/assets/img/logo.png" rel="icon">
    <link href="https://doctomed.ch/assets/img/logo.png" rel="apple-touch-icon">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- dropify -->
    <link rel="stylesheet" href="https://doctomed.ch/panel_admin/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/css/dropify.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- select 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- full calendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- media query css -->
    <link rel="stylesheet" href="{{ asset('assets/doctor-panel/css/media.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/doctor-panel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/doctor-panel/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('panel_admin/iziToast/dist/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/doctor-panel/css/calendar.style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/doctor-panel/css/professional.style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/doctor-panel/newcss/styles.css') }}" />
    <script src="{{ asset('assets/doctor-panel/js/jquery.min.js') }}"></script>


 
    <title>{{ translate('Dashboard') }}</title>
</head>

<body>
    <div class="main_layout">
        <div class="sidebarrr">
            <div class="sidebar" id="sidebar">
                <div class="logo">
                    <img src="{{ asset('assets/frontend/images/logo.png') }}" />
                </div>
                <nav class="nav flex-column" style="overflow: hidden">
                    <a href="{{ route('dashboard') }}" class="nav-link dashboard_tab ml-2">
                        <i class="fas fa-tachometer-alt"></i> {{ translate('Dashboard') }}</a>
                    <a href="{{ route('user.profile') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('user.profile') ? 'active' : '' }}"><i class="fas fa-user"></i>
                        {{ translate('My Account') }}</a>

                    <a href="{{ route('doctorBookingHistory') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('doctorBookingHistory') ? 'active' : '' }}"><i
                            class="fas fa-history"></i> {{ translate('Appointments') }}</a>
                    <a href="{{ route('allAds') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('allAds') ? 'active' : '' }}"><i class="fas fa-briefcase"></i>
                        {{ translate('Member Ads') }}</a>


                    <a href="#" class="nav-link dashboard_tab my-0 " id="professionalTools"
                        onclick="toggleProfessionalTools()">
                        <i class="fas fa-tools"></i> {{ translate('Professional Tools') }}
                        <i class="fas fa-chevron-down pro_che_icon" id="chevronIcon"></i>
                    </a>
                    
                    @if(request()->route()->uri == 'job-posting' || request()->route()->uri == 'view-jobs' || request()->route()->uri == 'medical-news' || request()->route()->uri == 'bookspage' || request()->route()->uri == 'events' || request()->route()->uri == 'sms-plan/{feature}' || request()->route()->uri == 'plans/{feature}' || request()->route()->uri == 'create/ads' || request()->route()->uri == 'friends-lists')
                    	
                    	@php $active_status = 'active' ; @endphp
                    @else
                    	@php $active_status = '';	@endphp
                    @endif
                    <div class="sub-menu {{$active_status}}" id="professionalToolsMenu">

                        <a href="{{ route('admin.home-page') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('admin.home-page') ? 'active' : '' }}"><i
                                class="fas fa-globe"></i>{{ translate('My Web') }} </a>
                        @if ($user->role === 'institute')
                            <a href="{{ route('group.members') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('group.members') ? 'active' : '' }}"><i
                                    class="fas fa-sync"></i> {{ translate('Member Group') }}</a>
                        @endif
                        <a href="{{ route('createAds') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('createAds') ? 'active' : '' }}"><i class="fas fa-ad"></i>
                            {{ translate('Create Ads') }}</a>
                        {{-- <a href="{{ route('userChat', 'chat') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('userChat') ? 'active' : '' }}"><i
                                class="fas fa-sync"></i> {{ translate('Chat') }}</a> --}}
                        <a href="{{ route('friendsList') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('friendsList') ? 'active' : '' }}"><i class="fas fa-network-wired"></i>
                            {{ translate('My Network') }}</a>
                        <a href="{{ route('jobPost') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('jobPost') ? 'active' : '' }}"><i class="fas fa-sync"></i>
                            {{ translate('Create Job') }}</a>
                        <a href="{{ route('jobList') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('jobList') ? 'active' : '' }}"><i
                                class="fas fa-calendar-alt"></i> {{ translate('Job List') }}</a>
                        <a href="{{ route('medical.news') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('medical.news') ? 'active' : '' }}"><i
                                class="fas fa-newspaper"></i> {{ translate('Medical News') }}</a>
                        <a href="{{ route('bookspage') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('bookspage') ? 'active' : '' }}"><i
                                class="fas fa-book"></i>
                            {{ translate('Book Sharing') }}</a>
                        <a href="{{ route('memberEvent') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('memberEvent') ? 'active' : '' }}"><i class="fas fa-ad"></i>
                            {{ translate('Events') }}</a>
                        {{-- <a href="{{ route('fax.index') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('fax.index') ? 'active' : '' }}"><i class="fas fa-ad"></i>
                            {{ translate('Fax') }}</a> --}}


                            <a href="{{ route('userSms') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('userSms') ? 'active' : '' }}"><i
                                class="fas fa-comments"></i> {{ translate('Send SMS') }}</a>

                            <a href="{{ route('useradvertisement') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('useradvertisement') ? 'active' : '' }}"><i
                                class="fas fa-newspaper"></i> {{ translate('User Advertisement') }}</a>
                           
                    </div>

                    <a href="{{ route('syncApps') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('syncApps') ? 'active' : '' }}"><i class="fas fa-link"></i>
                        {{ translate('Useful Links') }}</a>
            

                    <a href="{{ route('userFeedback') }}" class="nav-link dashboard_tab ml-2 {{ request()->routeIs('userFeedback') ? 'active' : '' }}"><i
                            class="fas fa-comment-dots"></i> {{ translate('User Feedback') }}</a>
                    <a class="nav-link sidebar-link ml-2 dashboard_tab dashboard_tab-hid-show" href="{{ route('promeberCoupon') }}">
         
			          <img src="{{ asset('assets/doctor-panel/imgs/menu/sidelogo1.png') }}" class="medica-img" alt="">
			        </a>

			         <a href="{{ route('promeberSurveyCate') }}" class="nav-link sidebar-link ml-2 dashboard_tab dashboard_tab-hid-show"
			          >
			          <img src="{{ asset('assets/doctor-panel/imgs/menu/sidelogo.png') }}" class="medica-img" alt="">
			          
			          </a>        
                    
                    <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-sign-out-alt"></i>
                        {{ translate('Logout') }}</a>

                    <div class="side_img">
                        <img src="{{ asset('assets/doctor-panel/imgs/dashboard/1.png') }}" alt="" />
                    </div>

                    <div class="side_img">
                        <img src="{{ asset('assets/doctor-panel/imgs/dashboard/2.png') }}" alt="" />
                    </div>

                    <div class="side_img">
                        <img src="{{ asset('assets/doctor-panel/imgs/dashboard/1.png') }}" alt="" />
                    </div>

                    <div class="side_img">
                        <img src="{{ asset('assets/doctor-panel/imgs/dashboard/2.png') }}" alt="" />
                    </div>
                </nav>
            </div>
            <button class="toggle-btn open" onclick="toggleSidebar()">
                <i class="fas fa-bars" id="hamburgerIcon"></i>
            </button>
            <button class="toggle-btn band" onclick="toggleSidebar()">
                <i class="fas fa-times" id="closeIcon" style="display: none"></i>
            </button>
        </div>

        <div class="main_navbar">
            <nav class="navbar navbar-expand-lg navbar-custom">
                <a class="navbar-brand" href="#">Welcome back</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">&#9776;</span>
                </button>

                <div class="collapse navbar-collapse py-3" id="navbarContent">
                    <div class="d-flex align-items-center nav-column w-100">
                        <div class="navbar-center mx-auto margin">
                            <form class="form-inline search-bar position-relative">
                                <input class="form-control" id="username" type="search" placeholder="Search"
                                    aria-label="Search" />
                                    <div id="searchResults" class="dropdown-menu w-100 text-center"></div>
                            </form>
                        </div>
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item dropdown profile_button">
                                <a class="nav-link dropdown-toggle" href="#" id="LangugaeDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ getLanguages()->firstWhere('code', session('locale', 'en'))->name }}

                                </a>
                                <div class="dropdown-menu dropdown-menu-right my-menu"
                                    aria-labelledby="LangugaeDropdown">
                                    @foreach (getLanguages() as $language)
                                        @if ($language->translation_status != null)
                                            <a class="dropdown-item" href="javascript:void(0)"
                                                onclick="event.preventDefault(); document.getElementById('locale-form-{{ $language->code }}').submit();">{{ $language->name }}</a>
                                            <form
                                                id="locale-form-{{ $language->code }}"action="{{ route('setLocale') }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="locale" value="{{ $language->code }}">
                                            </form>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item notification_icon bell">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-bell"></i>
                                </a>
                            </li>
                            @php
                                $femaleImages = glob(public_path('assets/home/imgs/female-avi/*.jpg'));
                                $maleImages = glob(public_path('assets/home/imgs/male-avi/*.jpg'));
                                $femaleImages = array_map(function ($path) {
                                    return str_replace('\\', '/', str_replace(public_path(), '', $path));
                                }, $femaleImages);
                                $maleImages = array_map(function ($path) {
                                    return str_replace('\\', '/', str_replace(public_path(), '', $path));
                                }, $maleImages);
                            @endphp
                            <li class="nav-item dropdown profile_button">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if ($user->gender == 'female')
                                        <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($femaleImages) }}"
                                            class="user-avatar" alt="Profile Picture">
                                    @else
                                        <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($maleImages) }}"
                                            class="user-avatar" alt="Profile Picture">
                                    @endif

                                </a>
                                <div class="dropdown-menu dropdown-menu-right my-menu" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                                    <a class="dropdown-item"  href="{{ route('walletdetails') }}" >Payment Settings</a>
                                   
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')

        </div>
    </div>
    <!-- dashboard content -->
    
    



    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/doctor-panel/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="{{ asset('assets/doctor-panel/newjs/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- moment js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- custom js -->
    <script src="{{ asset('assets/doctor-panel/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/doctor-panel/js/wow.js') }}"></script>

    <script src="{{ asset('assets/doctor-panel/js/custom.js') }}"></script>

    <script>
        const menuItems = document.querySelectorAll('.nav-link');
        menuItems.forEach(item => {
        item.addEventListener('click', () => {
            menuItems.forEach(menu => menu.classList.remove('active'));

            item.classList.add('active');
        });
        })
        /* When the user clicks on the button,
                                                            toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <script>
        const monthNames = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];

        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();

        const calendarBody = document.getElementById('calendar-body');
        const monthYearDisplay = document.getElementById('month-year');
        const prevMonthBtn = document.getElementById('prev-month');
        const nextMonthBtn = document.getElementById('next-month');

        function generateCalendar(month, year) {
            // Clear previous calendar body
            calendarBody.innerHTML = '';

            // Get the first day of the month
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            // Display the month and year
            monthYearDisplay.textContent = `${monthNames[month]} ${year}`;

            // Create a new row for the calendar
            let date = 1;
            for (let i = 0; i < 6; i++) {
                let row = document.createElement('tr');

                // Create 7 days for each week
                for (let j = 0; j < 7; j++) {
                    let cell = document.createElement('td');

                    if (i === 0 && j < firstDay) {
                        cell.textContent = '';
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        cell.textContent = date;

                        // Highlight the current day
                        if (
                            date === currentDate.getDate() &&
                            month === currentDate.getMonth() &&
                            year === currentDate.getFullYear()
                        ) {
                            cell.classList.add('today');
                        }

                        date++;
                    }
                    row.appendChild(cell);
                }

                calendarBody.appendChild(row);
            }
        }

        prevMonthBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentMonth, currentYear);
        });

        nextMonthBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });

        // Initialize the calendar on page load
        generateCalendar(currentMonth, currentYear);
    </script>

    <script>
       

        $(document).ready(function() {
            $('.menu-item > a').click(function(event) {
                event.preventDefault(); // Prevent default anchor behavior
                var $submenu = $(this).siblings('.submenu');
                $submenu.slideToggle(); // Toggle submenu visibility

                $(this).find('.arrow').toggleClass('open'); // Rotate arrow
            });
        });

        $(".select2").select2();
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function() {
            readURL(this);
        });

        $(document).ready(function() {
            // Show/hide notifications
            $('#notification-toggle').click(function() {
                $(this).siblings('.dropdown-menu').toggle();
            });

            // Show/hide profile dropdown
            $('#profile-toggle').click(function() {
                $(this).siblings('.dropdown-menu').toggle();
            });

            // Close dropdowns when clicking outside
            $(document).click(function(event) {
                if (!$(event.target).closest('.dropdown').length) {
                    $('.dropdown-menu').hide();
                }
            });
        });
        
        $(document).ready(function() {

            $('#username').keyup(function() {
                var query = $(this).val().trim();
                var token = $('meta[name="csrf-token"]').attr('content');
                console.log('test')
                if (query.length > 0) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        url: '{{ route('searchByUsername') }}',
                        method: 'POST',
                        data: {
                            username: query
                        },
                        dataType: 'json',
                        success: function(response) {
                            var html = '';
                            if (response.users.length > 0) {
                                response.users.slice(0, 5).forEach(function(user) {
                                    var url = '/match-details/' + encodeURIComponent(user.encrypted_id);
                                    const userProfilePicBasePath = "{{ asset('images/users/') }}";
                                    const defaultProfilePic = "{{ asset('assets/img/profile-img.jpg') }}";
                                    let profilePicUrl = user.profile_pic ? `${userProfilePicBasePath}/${user.profile_pic}` : defaultProfilePic;
                                    html += `<div class="dropdown-item " align="center" >
                             <div class="friend-single">
                                                <div class="picture">
                                     <img src="${profilePicUrl}">
                                                </div>
                                                <div class="user-name">
                                                <h4>${user.first_name} ${user.last_name}</h4>
                                                   <a href="${url}" class="btn btn-sm btn-danger">Details</a>
                                                </div>
                                            </div>

                                    </div>`;
                                });
                            } else {
                                html = '<div class="dropdown-item"><p>No users found</p></div>';
                            }
                            $('#searchResults').html(html);
                            $('#searchResults').show();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#searchResults').html('');
                    $('#searchResults').hide();
                }
            });
            $(document).click(function(e) {
                if (!$(e.target).closest('#username').length) {
                    $('#searchResults').hide();
                }
            });
        });
    </script>

    @yield('scripts')
    
    {{-- Mini web --}}
<script src="{{asset('panel_admin/iziToast/dist/js/iziToast.min.js')}}"></script>
@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position:'topRight',
                message: '{{$error}}',
            });
        </script>
    @endforeach

@endif
<script>
    $(document).ready(function() {
      $('#bannerSlider').carousel();
      $('#bannerSlider').carousel({
        interval: 300
      });
    });
  </script>
@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position:'topRight',
            message: '{{session()->get('success')}}',
        });

    </script>
@endif
</body>

</html>

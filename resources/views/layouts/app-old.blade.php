@php
    $admin = auth()->user();
    $user = $admin->user;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="">

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
    <link rel="stylesheet" href="{{ asset('assets/doctor-panel/css/custom.css') }}" />

    <!-- media query css -->
    <link rel="stylesheet" href="https://doctomed.ch/assets/doctor-panel/css/media.css">

    <title>Dashboard</title>
</head>

<body>

    <!-- dashboard content -->
    <main class="dashboard-content">
        <div id="openSidebar" class="sidebar-toggler">
            <i class="fas fa-bars"></i>
        </div>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="https://doctomed.ch/assets/frontend/images/logo.png" style="max-width: 220px;" alt="logo">
            </div>

            <div id="closeSidebar" class="sidebar-toggler">
                <i class="fas fa-bars"></i>
            </div>

            <nav class="sidebar-nav">
                <ul class="sidebar-menu">
                    <li>
                        <a href="https://doctomed.ch/dashboard" class="active sidebar-link">
                            <div class="active-circle active-circle-top"></div>
                            <div class="active-circle active-circle-bottom"></div>

                            <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/dashboard.png"
                                alt="">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-link" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseProfessionalTools">
                            <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/profesional.png"
                                alt="">
                            <span>
                                Professional Tools
                                <i class="fas fa-chevron-right arrow-toggle"></i>
                            </span>
                        </a>

                        <ul class="sidebar-submenu collapse" id="collapseProfessionalTools">
                            <li>
                                <a class="sidebar-link" href="https://doctomed.ch/admin/home-page">
                                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/web.png"
                                        alt="">
                                    My Web
                                </a>
                            </li>
                            @if ($user->role === 'institute')
                                <li><a class="sidebar-link" href="{{ route('group.members') }}"><img
                                            src="{{ asset('assets/doctor-panel/imgs/dashboard/group-member.png') }}"
                                            alt="">{{ translate('Member Group') }}</a></li>
                            @endif
                            <li>
                                <a class="sidebar-link" href="https://doctomed.ch/create/ads">
                                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/adss.png"
                                        alt="">
                                    Create Ads
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-link" href="https://doctomed.ch/chat/chat">
                                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/chat.png"
                                        alt="">
                                    Chat
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-link" href="https://doctomed.ch/friends-lists">
                                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/network.png"
                                        alt="">
                                    My Network
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-link" href="https://doctomed.ch/job-posting">
                                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/hiring.png"
                                        alt="">
                                    Create Job
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-link" href="https://doctomed.ch/view-jobs">
                                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/hiring.png"
                                        alt="">
                                    Job List
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-link" href="https://doctomed.ch/medical-news">
                                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/medical-news.png"
                                        alt="">
                                    Medical News
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-link" href="https://doctomed.ch/bookspage">
                                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/book.png"
                                        alt="">
                                    Book Sharing
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-link" href="https://doctomed.ch/events?events">
                                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/event.png"
                                        alt="">
                                    Events
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="sidebar-link" href="https://doctomed.ch/booking-hystory">
                            <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/history.png"
                                alt="">
                            History
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-link" href="https://doctomed.ch/profile">
                            <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/user.png"
                                alt="">My
                            Profile
                        </a>
                    </li>


                    <li>
                        <a class="sidebar-link" href="https://doctomed.ch/sync">
                            <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/connect.png"
                                alt="">
                            Connect/ Sync
                        </a>
                    </li>


                    <li>
                        <a class="sidebar-link" href="https://doctomed.ch/ads">
                            <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/see.png" alt="">
                            See Ads
                        </a>
                    </li>
                    <li>
                        <a class="sidebar-link" href="https://doctomed.ch/feedback">
                            <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/feedback.png"
                                alt="">
                            Feedback
                        </a>
                    </li>
                    <li>
                        <a class="sidebar-link" href="{{ route('userSms') }}">
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/sms.png') }}" alt="" style="filter: none; color: inherit;">
                            {{ translate('Send SMS') }}
                        </a>
                    </li>
                    <li><a  class="sidebar-link" href="{{ route('fax.index') }}">
                        <img src="{{ asset('assets/doctor-panel/imgs/dashboard/fax.png') }}" alt=""> Fax</a>
                    </li>
                    <li>
                        <a class="sidebar-link" href="https://doctomed.ch/logout">
                            <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/logout.png"
                                alt="">
                            Logout
                        </a>
                    </li>

                    <br>

                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/1.png"
                        class="img-fluid w-100 mb-3" alt="">
                    <br>
                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/2.png"
                        class="img-fluid w-100 mb-3" alt="">
                    <br>
                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/1.png"
                        class="img-fluid w-100 mb-3" alt="">
                    <br>
                    <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/2.png" class="img-fluid w-100"
                        alt="">
                </ul>
            </nav>
        </div>
        <!-- End Sidebar -->

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Menu -->
            <div class="header-top-menu">
                <div class="container-lg">
                    <div class="action-menu">
                        <div class="d-flex align-items-center" style="gap: 20px;flex-grow: 1;">
                            <h4 class="custom-text-primary mb-0">Welcome back</h4>
                            <div class="search-box">
                                <div class="d-flex justify-content-end">
                                    <div id="closeSearch">
                                        <i class="fas fa-close"></i>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="Search" class="custom-input"
                                        autocomplete="off">
                                    <button type="submit" id="search-icon"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center" style="gap: 10px;">
                            <!-- <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="flexSwitchCheckChecked" checked>
                            </div> -->
                            <div>
                                <div class="dropdown">
                                    <button type="button" class="btn-base-rounded dropdown-toggle"
                                        id="language-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ getLanguages()->firstWhere('code', session('locale', 'en'))->name }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach (getLanguages() as $language)
                                            @if ($language->translation_status != null)
                                                <li>
                                                    <a class="dropdown-item" href="#"
                                                        onclick="event.preventDefault(); document.getElementById('locale-form-{{ $language->code }}').submit();">
                                                        {{ $language->name }}
                                                    </a>
                                                    <form id="locale-form-{{ $language->code }}"
                                                        action="{{ route('setLocale') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="locale"
                                                            value="{{ $language->code }}">
                                                    </form>
                                                </li>
                                            @endif
                                        @endforeach
                                        <!-- Add more languages as needed -->
                                    </ul>
                                </div>
                            </div>

                            <div class="notification-box">
                                <button type="button" id="openSearch" class="rounded-action-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                            <div class="notification-box">
                                <div class="dropdown">
                                    <button type="button" id="notification-toggle"
                                        class="rounded-action-btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="far fa-bell"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"
                                        style="display: none; width: 300px;">
                                        <div class="p-3 border-bottom">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-0">Notifications</h6>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#!"
                                                        class="small text-reset text-decoration-underline">Unread
                                                        (3)</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="max-height: 230px; overflow-y: auto;">
                                            <!-- Notification Item -->
                                            <a href="#!" class="text-reset notification-item">
                                                <div class="d-flex align-items-start p-2">
                                                    <div class="flex-shrink-0 me-3">
                                                        <img src="https://via.placeholder.com/50"
                                                            class="rounded-circle avatar-sm" alt="user-pic">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">James Lemire</h6>
                                                        <p class="text-muted mb-1">It will seem like simplified
                                                            English.</p>
                                                        <p class="mb-0 text-muted"><i
                                                                class="mdi mdi-clock-outline"></i> <span>1 hour
                                                                ago</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- More notifications as needed -->
                                        </div>
                                        <div class="p-2 border-top d-grid">
                                            <a class="btn btn-sm btn-link font-size-14 text-center"
                                                href="javascript:void(0)">
                                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View
                                                    More...</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-box">
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
                                <div class="dropdown">
                                    @if ($user->gender == 'female')
                                        <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($femaleImages) }}"
                                            class="profile-picture rounded-circle" alt="Profile Picture">
                                    @else
                                        <img src="{{ $user->profile_pic ? asset('images/users/' . $user->profile_pic) : getRandomImage($maleImages) }}"
                                            class="profile-picture rounded-circle" alt="Profile Picture">
                                    @endif

                                    <button class="btn" id="profile-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div id="profile-dropdown" class="dropdown-menu dropdown-menu-end"
                                    style="display: none;top:70px;right:30px;">
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        Logout
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @yield('content')

        </div>
    </main>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- moment js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- custom js -->
    <script src="{{ asset('assets/doctor-panel/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/doctor-panel/js/wow.js') }}"></script>

    <script src="{{ asset('assets/doctor-panel/js/custom.js') }}"></script>

    <script>
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
        document.addEventListener('DOMContentLoaded', function() {
            const profileToggle = document.getElementById('profile-toggle');
            const profileDropdown = document.getElementById('profile-dropdown');

            // Toggle dropdown visibility when clicking the profile or arrow icon
            profileToggle.addEventListener('click', function(event) {
                event.preventDefault();
                // Toggle the display of the dropdown
                profileDropdown.style.display = profileDropdown.style.display === 'none' ? 'block' : 'none';
            });

            // Hide the dropdown when clicking outside of it
            document.addEventListener('click', function(event) {
                if (!profileToggle.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.style.display = 'none';
                }
            });
        });

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
    </script>

    @yield('scripts')
</body>

</html>

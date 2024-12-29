@php
$admin = auth()->user();
        $user = $admin->user;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- CSS includes -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://fullcalendar.io/releases/fullcalendar/3.10.0/fullcalendar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <!-- Header -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="logo">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search here..." title="Enter search keyword">
                <button type="submit" title="Search here..."><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          
          <form action="{{ route('setLocale') }}" method="POST">
          @csrf
          <select name="locale" onchange="this.form.submit()" class="search__box form-control">
              @foreach(getLanguages() as $language)
                  @if($language->translation_status != null)
                      <option value="{{ $language->code }}"
                          {{ (session('locale', 'en') == $language->code) ? 'selected' : '' }}>
                          {{ $language->name }}
                      </option>
                  @endif
              @endforeach
          </select>
      </form>

          </div>
                </li>
                <li>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Online</label>
                    </div>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <div class="profile_text">
                        <p class="mb-0" style="font-size: 12px; font-weight: bold;">{{ $user->first_name }}</p>
            <p class="mb-0" style="font-size: 11px;">{{ $user->email }}</p>
                        </div>
                        @if($user->profile_pic)
                      <img src="{{ asset('images/users/' . $user->profile_pic) }}" class="rounded-circle ms-1" height="40px" width="40px">
                    @else
                      <img src="{{ asset('images/users/avatar.jpg') }}" class="rounded-circle ms-1" height="40px" width="40px">
                    @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">

                            <span>{{ $user->first_name }}</span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="">{{translate('My Account')}}</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">{{translate('Logout')}}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>{{ translate('Dashboard') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('web-content.show') ? 'active' : '' }}" href="{{ route('web-content.show') }}">
            <i class="bi bi-globe"></i>
            <span>{{ translate('Web content') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('banners') ? 'active' : '' }}" href="{{ route('banners') }}">
            <i class="bi bi-signpost"></i>
            <span>Banner</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('adsList') ? 'active' : '' }}" href="{{ route('adsList') }}">
            <i class="bi bi-megaphone"></i>
            <span>Advertise</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('boost.requests') ? 'active' : '' }}" href="{{ route('boost.requests') }}">
            <i class="bi bi-arrow-up-circle"></i>
            <span>Boost request</span>
        </a>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('institutes.index') ? 'active' : '' }}" href="{{ route('institutes.index') }}">
            <i class="bi bi-building"></i>
            <span>View Institutes</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('specialties.index') ? 'active' : '' }}" href="{{ route('specialties.index') }}">
            <i class="bi bi-award"></i>
            <span>Specialties</span>
        </a> 
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('jobCategories.index') ? 'active' : '' }}" href="{{ route('jobCategories.index') }}">
            <i class="bi bi-list-ul"></i>
            <span>Job Categories</span>
        </a> 
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('expertises.index') ? 'active' : '' }}" href="{{ route('expertises.index') }}">
            <i class="bi bi-lightbulb"></i>
            <span>Expertises</span>
        </a> 
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.send-email') ? 'active' : '' }}" href="{{ route('admin.send-email') }}">
            <i class="bi bi-envelope"></i>
            <span>{{ translate('Send Email') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('sliders') ? 'active' : '' }}" href="{{ route('sliders') }}">
            <i class="bi bi-sliders"></i>
            <span>Sliders</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('AdminNecessaryLink') ? 'active' : '' }}" href="{{ route('AdminNecessaryLink') }}">
            <i class="bi bi-link-45deg"></i>
            <span>Useful Links</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('health_tip_details.index') ? 'active' : '' }}" href="{{ route('health_tip_details.index') }}">
            <i class="bi bi-link-45deg"></i>
            <span>Health Tips</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('partners.index') ? 'active' : '' }}" href="{{ route('partners.index') }}">
            <i class="bi bi-people"></i>
            <span>Partners</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('books.index') ? 'active' : '' }}" href="{{ route('books.index') }}">
            <i class="bi bi-tag"></i>
            <span>Books</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('survey.index') ? 'active' : '' }}" href="{{ route('survey.index') }}">
            <i class="bi bi-tag"></i>
            <span>Survey</span>
        </a>
    </li>
    <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('member-titles.index') ? 'active' : '' }}" href="{{ route('member-titles.index') }}">
        <i class="bi bi-tag"></i>
        <span>Member Title</span>
    </a>
</li>
<li class="nav-item">
        <a class="nav-link {{ request()->routeIs('memberEventAdmin') ? 'active' : '' }}" href="{{ route('memberEventAdmin') }}">
            <i class="bi bi-calendar-event"></i>
            <span>Events</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('verification.requests.admin') ? 'active' : '' }}" href="{{ route('verification.requests.admin') }}">
            <i class="bi bi-shield-check"></i>
            <span>Verification request</span>
        </a>
    </li>
<li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.feedback') ? 'active' : '' }}" href="{{ route('admin.feedback') }}">
            <i class="bi bi-envelope"></i>
            <span>Check Feedback</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('faqsAdmin') ? 'active' : '' }}" href="{{ route('faqsAdmin') }}">
            <i class="bi bi-question-circle"></i>
            <span>Add FAQ</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('trnaslationView') ? 'active' : '' }}" href="{{ route('trnaslationView') }}">
            <i class="bi bi-translate"></i>
            <span>Translations</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('transLanguageList') ? 'active' : '' }}" href="{{ route('transLanguageList') }}">
            <i class="bi bi-list"></i>
            <span class="nav-link-text ms-1">Language List</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.upload') ? 'active' : '' }}" href="{{ route('admin.upload') }}">
            <i class="bi bi-cloud-upload"></i>
            <span class="nav-link-text ms-1">Upload Data</span>
        </a>
    </li>
    <li class="nav-item">
          <a class="nav-link" href="{{route('AdminPlans')}}">
            <i class="bi bi-card-checklist"></i>
            <span class="nav-link-text ms-1">Plans</span>
          </a>
        </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('logout') ? 'active' : '' }}" href="{{ route('logout') }}">
            <i class="bi bi-box-arrow-in-left"></i>
            <span>{{ translate('Logout') }}</span>
        </a>
    </li>
</ul>

    </aside>
    <!-- End Sidebar -->

    <!-- Main Content -->
    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End Main Content -->

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajax/1.0.0/jquery.ajax.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/frontend/assets-panel/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets-panel/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/frontend/js/jquery.signature.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.toast.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/frontend/assets-panel/js/main.js') }}"></script> 
 
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@yield('scripts')


<script>
  $(document).ready(function(){
   $('#onlineStatus').change(function(){
        var isOnline = $(this).prop('checked') ? 1 : 0;
        var onlineText = isOnline ? 'Online' : 'Offline';
        $('#onlineText').text(onlineText);
        
        $.ajax({
            url: "{{ route('update.online.status') }}",
            method: 'POST',
            data: {
                is_online: isOnline,
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
            },
            error: function(xhr, status, error){

            }
        });
    });
});
</script>
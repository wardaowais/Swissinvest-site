@extends('home.layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/home/css/easyui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/home/css/calendar-icon.css')}}">
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
            height: 200px; /* Set the height of the list */
            overflow: auto; /* Enable scrolling */
            padding: 20px;
            background: #f1f1f1;
            border: 1px solid #9dbae7;
            border-radius: 8px;
            /* box-shadow: 0px 7px 16px 0px rgba(41,53,108,0.25); */
        }


        .scroll-list::-webkit-scrollbar {
            width: 0; /* Hide scrollbar for Webkit browsers */
        }

        .scroll-list {
            -ms-overflow-style: none; /* Hide scrollbar for Internet Explorer and Edge */
            scrollbar-width: none; /* Hide scrollbar for Firefox */
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
        .active{
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
        .text-teal{
            color: #009688;
        }
        .bg-teal{
            background-color: #009688;
            border: #009688;
        }
        .card-body{
            border-radius: 10px;
        }
    </style>
<section class="banner height-auto" style="background-image: url('./imgs/01/banner.png');
     background-size: cover; text-align: center;">
        <div class="container">
            <div class="row a-center ">
                <div class="col d-none">
                    <h1>{{translate('Ophthalmologist')}}</h1>
                    <p>{{translate('An ophthalmologist is an eye care specialist. Unlike optometrists and opticians, ophthalmologists are doctors of medicine (MD) or doctors of osteopathy (DO) with specific training and experience in diagnosing and treating eye and vision conditions.')}}</p>
                </div>
            </div>
            <div class="bform">
                <div class="tabs">
                    <ul style="opacity: 0;">
                      <li><a href="#tabs-1"><span><i class="fa-solid fa-house-flag"></i></span> on site</a></li>
                    </ul>
                    <div id="tabs-1">

                    <form id="filterForm" action="{{ route('search.users') }}" method="GET">
                        <ul>
                            <li>
                                <p>{{translate (getPageContent('search_lebel1')) }}</p>
                                <div class="search-container">
                                    <input type="text" class="search-input search-input-2" placeholder="{{translate (getPageContent('placeholder_search')) }}..." id="specialtyText">
                                    <div class="dropdownn dropdownn-2">
                                        <input type="hidden" name="specialty" id="specialtyId">
                                        @foreach($specialties as $specialty)
                                            <div class="suggestion" data-att="{{encrypt($specialty->id)}}">{{translate($specialty->name)}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li>
                                <p>{{translate (getPageContent('search_lebel2')) }}</p>
                                <div class="search-container2">
                                    <input type="text" class="search-input search-input-3" placeholder="{{translate (getPageContent('placeholder_search')) }}..." id="locationText">
                                    <div class="dropdown dropdown-3">
                                        <input type="hidden" id="locationId" name="city">
                                        @foreach ($locations as $city)
                                            <div class="option" data-att="{{encrypt($city->id)}}">{{ translate($city->name) }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li>
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </li>
                        </ul>
                        
                    
                    </div>
                  </div>
                
            </div>
        </div>
     </section>

     <section class="doc-list" style="margin-top: 25px;">
        <div class="container">

        <div class="row a-center">
                <div class="col-lg-6 col-md-4">
                <h1 class="headline">{{translate ('Institutes') }}</h1>
                    <div class="bcontent">
                    <p>{{ $totalDoctors }} {{translate ('Available Institute') }}</p>
                        <a href="{{route('allDoctormap')}}" class="btn btn-danger">{{translate('Show in Map')}} <span><i class="fa-solid fa-location-dot"></i></span></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                <div class="cat">
      
    </div>
                </div>
            </div>
            <!-- list single -->
             <div class="dlist_single">
                <div class="col-md-12">
                    @if($institutes->isEmpty())
                        <h1>{{ translate('No Institutes found.') }}</h1>
                    @else
                    @foreach($institutes as $institute)
                    <div class="row my-lg-4 my-2">
                        <div class="col-md-12">
                            <div class="card card-body shadow-sm">
                                <div class="row">
                                    <!-- Institute Image -->
                                    <div class="col-md-2 col-12 d-flex align-items-center">
                                        @if($institute->profile_pic)
                                        <img src="{{ asset('images/users/' . $institute->profile_pic) }}" class="profile-picture">
                                        @else
                                        <img src="{{ asset('assets/img/profile-img.jpg') }}" class="profile-picture">
                                        @endif
                                    </div>
                                    
                                    <!-- Institute Details -->
                                    <div class="col-md-10 col-12">
                                        <h3 class="text-teal">{{ $institute->first_name }} {{ $institute->last_name }}</h3>
                                        
                                        <h6>
                                            <span><i class="fa-solid fa-location-dot"></i></span> 
                                            {{ $institute->address ?? 'Address Not Updated' }},
                                            {{ $institute->postal_code ?? 'Address Not Updated'}},
                                            {{ $institute->cityRelation->name ?? 'City Not Available' }},
                                            {{ $institute->Country->name ?? 'City Not Available' }},
                                        </h6>
                                        
                                        <p>{{ $institute->contact_info }}</p>
                                        <p><i class="fa-solid fa-phone"></i> {{ $institute->phone }}</p>
                                        <p><i class="fa-solid fa-envelope"></i> {{ $institute->email }}</p>
                                        
                                        <p>{{ Str::limit($institute->details, 150, '...') }}</p>
                                        <a href="{{ route('search.users', ['institute' => encrypt($institute->id)]) }}" class="btn btn-success">
                                            {{ translate('search by institute') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                    @endif
                    {{ $institutes->links('vendor.pagination') }}
                </div>
             </div>
            <!-- end list single -->

            <!-- add banner -->
            <div class="add-banner">
                <div id="bannerSlider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                @if($slider->banner_name)
                                    <a href="{{ $slider->banner_name }}" target="_blank">
                                        <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" style="height: 200px; width:100%;">
                                    </a>
                                @else
                                    <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" style="height: 200px; width:100%;">
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#bannerSlider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{translate('Previous')}}</span>
                    </a>
                    <a class="carousel-control-next" href="#bannerSlider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{translate('Next')}}</span>
                    </a>
                </div>
            </div>
            
            <!-- end ad banner -->


        </div>
      </section>

@endsection




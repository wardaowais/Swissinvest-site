@extends('frontEnd.master')
@section('title')
{{ $userDetails->title.' '.$userDetails->first_name.' '.$userDetails->last_name ?? "" }}
@endsection
@section('meta')
    <link rel="shortcut icon" href="{{asset($website->fav_icon ?? "") }}">
    <meta name="description" content="{{$website->description  ?? ""}}" />
    <meta name="keywords" content="{{$website->keywords  ?? ""}}" />
    <meta name="author" content="{{$website->author  ?? ""}}" />
    <meta name="description" content="{{$website->description  ?? ""}}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$website->name  ?? ""}}">
    <meta property="og:description" content="{{$website->description  ?? ""}}">
    <meta property="og:keywords" content="{{$website->keywords  ?? ""}}">
    <meta property="og:tags" content="{{$website->tags  ?? ""}}">
    <meta property="og:url" content="{{url('/')  ?? ""}}">
    <meta property="og:site_name" content="{{$website->name  ?? ""}}">
    <meta property="og:image" content="{{asset($website->website_logo  ?? "")}}">
    <meta property="og:image:secure_url" content="{{asset($website->fav_icon ?? "") }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{$website->description  ?? ""}}">
    <meta name="twitter:title" content="{{$website->title  ?? ""}}">
    <meta name="twitter:image" content="{{asset($website->fav_icon ?? "") }}">
@endsection

@section('content')

    <!-- Start Navbar -->
    @include('frontEnd.inc.header', ['user_id' => $userDetails->id])

    <!-- End Navbar -->


    @if(optional($personInfo)->slider_status == 1)
    <!-- START HOME -->
    <section class="h-100vh align-items-center d-flex" id="home">
        <div class="bg-overlay"></div>
        <div class="container z-2">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center header-content mx-auto">
                        <h4 class="text-white first-title mb-4">Welcome</h4>
                        <h1 class="header-name text-white text-capitalize mb-0">I'M <span class="fw-bold">{{$userDetails->title.' '.$userDetails->first_name.' '.$userDetails->last_name ?? ""}}</span></h1>
                        <br>
                        <h4 class="text-white first-title mb-4">{{$personInfo->mini_upper_subtitle ?? ""}}</h4>
                        <p class="text-white mx-auto header-desc mt-4">{!! $personInfo->header_paragraph ?? ""!!}</p>
                        @if(optional($personInfo)->contact_status == 1)
                        <div class="mt-4 pt-2">
                            <a href="#contact" class="btn btn-outline-white rounded-pill">Contact</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll_down">
            <a href="#about" class="scroll">
                <i class="text-white"></i>
            </a>
        </div>
    </section>
    <!-- END HOME -->
    @endif

    @if(optional($personInfo)->about_status == 1)
    <!-- START ABOUT -->
    <section class="section bg-white" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mt-3">
                        
                        @if($personInfo->about_image)
                        <img src="{{ asset($personInfo->about_image ?? "") }}" class="img-fluid mx-auto d-block img-thumbnail" style="width: 300px;">
                        @else
                        <img src="{{ asset('assets/img/profile-img.jpg') }}" class="img-fluid mx-auto d-block img-thumbnail">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-3">
                        <h2><span class="fw-bold">{{ $personInfo->about_header ?? "" }}</span></h2>
                        <h4 class="mt-4">Hello! <span class="text-primary fw-bold">{{$userDetails->title.' '.$userDetails->first_name.' '.$userDetails->last_name ?? ""}}.</span></h4>
                        <p class="text-muted mt-4">{!! $personInfo->about_description ?? "" !!}</p>

                        @if ($personInfo->social_status == 1)
                        <div>
                            <ul class="mb-0 about-social list-inline mt-4">
                                @php
                                    $socialLinks = [
                                        'facebook' => 'mdi mdi-facebook',
                                        'youtube' => 'fa-brands fa-youtube',
                                        'linkedin' => 'mdi mdi-linkedin',
                                        'twitter' => 'mdi mdi-twitter',
                                        'whatsapp' => 'mdi mdi-whatsapp',
                                        'instagram' => 'mdi mdi-instagram',
                                        'tiktok' => 'fa-brands fa-tiktok',
                                        'telegram' => 'mdi mdi-telegram',
                                        'snapchat' => 'mdi mdi-snapchat',
                                        'pinterest' => 'mdi mdi-pinterest',
                                    ];
                                @endphp

                                @foreach($socialLinks as $platform => $icon)
                                    @if(!empty($social->$platform))
                                        <li class="list-inline-item">
                                            <a href="{{ $social->$platform }}" target="_blank">
                                                <i class="{{ $icon }}"></i>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT -->
    @endif

    @if(optional($personInfo)->our_service_status == 1)
    <!-- START SERVICES -->
    <section class="section bg-light" id="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2><span class="fw-bold">{{$personInfo->our_service_header ?? ""}}</span></h2>
                        <p class="text-muted mx-auto section-subtitle mt-3">{!! $personInfo->our_service_description ?? "" !!}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                @foreach($services as $row)
                    <div class="col-lg-4">
                        <div class="text-center services-boxes rounded p-4 mt-4">
                            <div class="services-boxes-icon">
                                <i class="{{$row->icon}} text-primary display-4"></i>
                            </div>
                            <div class="mt-4">
                                <h5 class="mb-0">{{$row->title}}</h5>
                                <div class="services-title-border"></div>
                                <p class="text-muted mt-3">{!! $row->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- END SERVICES -->
    @endif

    @if(optional($personInfo)->working_hours_status == 1)
    <!-- START working_hours -->
    <section class="section bg-light" id="working_hours">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2><span class="fw-bold"> {{$personInfo->working_hours ?? ""}}<span></h2>
                        <p class="text-muted mx-auto section-subtitle mt-3">{!! $personInfo->working_hours_description ?? "" !!}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-hover table-responsive table-bordered">
                        <tbody class="text-center">
                            <tr>
                                <th>
                                    Day
                                </th>
                                <th>
                                    Time
                                </th>
                            </tr>
                            @foreach($workHours as $row)
                                <tr>
                                    <th>
                                        {{$row->day}}
                                    </th>
                                    <th>
                                        {{$row->time}}
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
    <!-- END working_hours -->
    @endif

    @if(optional($personInfo)->section_status == 1)
        
    @foreach($sections as $row)
        <!-- START customMenu -->
        <section class="section bg-white" id="customMenu{{$row->id}}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <img src="{{asset($row->image ?? "")}}" alt="" class="img-fluid mx-auto d-block img-thumbnail">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <h2><span class="fw-bold">{{ $row->title ?? "" }}</span></h2>
                            <h4 class="mt-4"><span class="text-primary fw-bold"> {{$row->long_title}}</span></h4>
                            <p class="text-muted mt-4">{!! $row->description ?? "" !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END customMenu -->
    @endforeach
    @endif




    @if(optional($personInfo)->blog_header_status == 1)

    <!-- START BLOG -->
    <section class="section bg-light" id="blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2>Our <span class="fw-bold">{{$personInfo->blog_header ?? ""}}</span></h2>
                        <p class="text-muted mx-auto section-subtitle mt-3">{!! $personInfo->blog_description ?? "" !!}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                @foreach($blogs as $row)
                    <div class="col-lg-4 mt-3">
                        <div class="card border-0 rounded p-2">
                            <div class="img_blog">
                                <img src="{{asset($row->image)}}" alt="{{$row->name}}" class="img-fluid rounded mx-auto d-block">
                            </div>
                            <div class="content_blog p-3">
                                <div>
                                    <h5 class="fw-bold mb-0"><a href="{{ route('home.blog',$row->slug) }}" class="text-body">{{$row->name}}</a></h5>
                                </div>
                                <div class="mt-3">
                                    <p class="h6 text-muted date_blog mb-0">{{$row->created_at->format('d M Y')}}<a href="{{ route('home.blog',$row->slug) }}" class="text-primary fw-bold"> By
                                        {{$row->user->name}}</a></p>
                                    <p class="mt-3 desc_blog text-muted">{!! \Illuminate\Support\Str::limit($row->description,132) !!}</p>
                                    <p class="h6 mb-0"><a href="{{ route('home.blog',$row->slug) }}" class="text-muted fw-bold">Read More...</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END BLOG -->
    @endif

    @if(optional($personInfo)->contact_status == 1)
    <!-- START CONTACT -->
    <section class="section bg-white" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2><span class="fw-bold">{{$personInfo->contact_header ?? ""}}</span></h2>
                        <p class="text-muted mx-auto section-subtitle mt-3">{!! $personInfo->contact_description ?? "" !!}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="text-center">
                        <div>
                            <i class="mbri-mobile2 text-primary h1"></i>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0 contact_detail-title fw-bold">{{$personInfo->mobile_header ?? ""}}</h5>
                            <p class="text-muted">{{$personInfo->mobile ?? ""}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-center">
                        <div>
                            <i class="mbri-letter text-primary h1"></i>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0 contact_detail-title fw-bold">{{$personInfo->email_header ?? ""}}</h5>
                            <p class="text-muted">{{$personInfo->email ?? ""}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-center">
                        <div>
                            <i class="mbri-pin text-primary h1"></i>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0 contact_detail-title fw-bold">{{$personInfo->address_header ?? ""}}</h5>
                            <p class="text-muted">{{$personInfo->address ?? ""}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12" >
                    <div class="form-kerri contact_form">
                        <div id="message">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                     
                        </div>
                        <form method="post" action="{{route('contact.store',$personInfo->user_id ?? "")}}" name="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Your name..." required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Your email..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-2">
                                    <input type="text" class="form-control" name="subject" placeholder="Your Subject.." required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <textarea name="message" id="comments" rows="4" class="form-control" placeholder="Your message..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-end mt-2">
                                    <button type="submit" class="submitBnt btn btn-primary">Send Massage</button>
                                    <div id="simple-msg"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTACT -->
    @endif


    <!--START FOOTER-->
    @include('frontEnd.inc.footer',['user_id' => $userDetails->id])
    <!--END FOOTER-->


@endsection

@section('script')
@if(optional($personInfo)->slider_status == 1)
        <script>
        $(document).ready(function(){
            // Fetch slider data using AJAX
            $.ajax({
                url: "{{ route('get-slider',$userDetails->id ?? "") }}", // URL to your route
                method: "GET",
                success: function(response) {
                // Assuming the response contains an array of image objects
                var images = response.images.map(function(image) {
                    return image.image;
                });

                // Use the backstretch plugin to display images
                $.backstretch(images, {
                    duration: 3500,
                    fade: 750
                });
            },
            error: function() {
                console.error("Failed to fetch slider data.");
            }
        });

            // Example of using a text rotator if needed
            $(".simple-text-rotate").textrotator({
                animation: "fade",
                speed: 3500
            });
        });
    </script>

@endif

@endsection

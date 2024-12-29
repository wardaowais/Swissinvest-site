@extends('frontEnd.master')
@section('title')
    {{ $blog->name }}
@endsection
@section('meta')
    <meta name="description" content="{{$blog->seo_description}}">
    <link rel="canonical" href="{{url('/')}}/blog/{{$blog->slug}}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$blog->name}}">
    <meta property="og:description" content="{{$blog->seo_description}}">
    <meta property="og:tags" content="{{$blog->seo_tags}}">
    <meta property="og:keywords" content="{{$blog->seo_keywords}}">
    <meta property="og:url" content="{{url('/')}}/blog/{{$blog->slug}}">
    <meta property="og:image" content="{{asset($blog->image)}}">
    <meta property="og:image:secure_url" content="{{asset($blog->image)}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{$blog->name}}">
    <meta name="twitter:title" content="{{$blog->name}}">
    <meta name="twitter:image" content="{{asset($blog->image)}}">
@endsection

@section('content')

    <!-- Start Navbar -->
    @include('frontEnd.inc.header', ['user_id' => $user->id])
    <!-- End Navbar -->

    <!-- START ABOUT -->
    <section class="section bg-white" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mt-3">
                        <img src="{{asset($blog->image ?? "")}}" alt="" class="img-fluid mx-auto d-block img-thumbnail">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-3">
                        <h2><span class="fw-bold">{{ $blog->name ?? "" }}</span></h2>
                        <span>{{$blog->created_at->format('d M Y')}}</span>
                        <p class="text-muted mt-4">{!! $blog->description ?? "" !!}</p>
                    </div>
                </div>
            </div>
            <p>{!! $blog->main_content !!}</p>
        </div>
    </section>
    <!-- END ABOUT -->

    <!-- START BLOG -->
    <section class="section bg-light" id="blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2><span class="fw-bold">Latest Blogs</span></h2>
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
                                    <h5 class="fw-bold mb-0"><a href="javascript:void(0)" class="text-body">{{$row->name}}</a></h5>
                                </div>
                                <div class="mt-3">
                                    <p class="h6 text-muted date_blog mb-0">{{$row->created_at->format('d M Y')}}<a href="javascript:void(0)" class="text-primary fw-bold"> By
                                            {{$row->user->name}}</a></p>
                                    <p class="mt-3 desc_blog text-muted">{!! \Illuminate\Support\Str::limit($row->description,132) !!}</p>
                                    <p class="h6 mb-0"><a href="javascript:void(0)" class="text-muted fw-bold">Read More...</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END BLOG -->


    <!--START FOOTER-->
    @include('frontEnd.inc.footer',['user_id' => $user->id])
    <!--END FOOTER-->


@endsection


@extends('home.layouts.app')

@section('content')
<section class="ls-form">
        
        <div class="hero-section" style="background-image: url('https://www.marqeta.com/resource-hero-bg.svg');">
            <h1>{{translate (getPageContent('career_header')) }}</h1>
            <p>{{translate (getPageContent('career_header_bellow')) }}</p>
 
        </div>
        
        <div class="container">
            <div class="search-bar">
                <form action="{{ route('jobSearch') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4 mb-lg-0 mb-3">
                            <select class="form-select" name="category">
                                <option selected disabled>{{translate (getPageContent('career_filter1')) }}</option>
                                @foreach($jobCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-lg-0 mb-3">
                            <select class="form-select" name="location">
                                <option selected disabled>{{translate (getPageContent('career_filter2')) }}</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-lg-0 mb-3">
                            <select class="form-select" name="type">
                                <option selected disabled>{{translate (getPageContent('career_filter3')) }}</option>
                                <option value="Fulltime">{{translate('Full time')}}</option>
                                <option value="Parttime">{{translate('Part time')}}</option>
                                <option value="Contractual">{{translate('Contractual')}}</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-lg-0 mb-3">
                            <button class="btn btn-success w-100" type="submit">{{translate (getPageContent('search_button')) }}</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        
        <!-- Job Listings -->
        <div class="container">
            <div class="row justify-content-center pt-5">
                <div class="col-md-12 col-12">

                    <div class="row mb-4 m-1 m-lg-0">
                        <div class="col-md-8 col-12">
                            <h5 class="">#{{ $jobPosts->count() }} {{translate (getPageContent('available_post')) }}</h5>
                            <p class="small">{{translate (getPageContent('available_post_bellow')) }}</p>
                        </div>
                    </div>
                    @foreach($jobPosts as $jobPost)
                   
                    <!-- Job Card 1 -->
                    <div class="row job-card mb-4 mx-1 mx-lg-0">
                        <div class="col-md-8 col-12 d-flex align-items-center">
                       
                            <h3><img src="{{asset('images/briefcase.png')}}" alt="job-img" width="15%"
                                    class="rounded bg-light-subtle mr-2 py-1 px-2"> {{ translate($jobPost->job_title ?? '') }}</h3>
                        </div>
                        <div class="col-md-4 col-12 d-flex align-items-center">
                            <h5 class="ml-lg-auto ml-0">${{$jobPost->salary ?? ''}} <span class="text-secondary">/ Year</span></h5>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">
                            <p class="py-3">{!! limitHtmlContent($jobPost->job_details, 400) !!}</p>
                        </div>
                        <div class="col-md-8 col-12 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge badge-light bg-light-subtle text-dark mr-2 py-2 px-3">{{$jobPost->job_contract ?? ''}}</span>
                                <span
                                    class="badge badge-light bg-light-subtle text-dark mr-2 py-2 px-3">{{$jobPost->jobCategory->name ?? ''}}</span>
                                <span class="badge badge-light bg-light-subtle text-dark mr-2 py-2 px-3">{{$jobPost->city->name ?? ''}}</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 text-right">
                            <a href="{{ route('jobPostdetails', encrypt($jobPost->id)) }}" class="btn btn-apply btn-success">{{translate('Details')}}</a>
                        </div>
                    </div>
                    @endforeach
                    <!-- Additional job cards can be added similarly -->
                    <!-- Additional job cards can be added similarly -->

                    <div class="row">
                        <div class="col-12 text-center py-3">
                            {{-- pagination --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

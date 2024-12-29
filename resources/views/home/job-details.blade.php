@extends('home.layouts.app')

@section('content')
<style>
    body{
        background-color: #fff;
    }
    .card-body{
        border-color: #ccc;
        border-radius: 15px;
    }
</style>

<div class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="job-header mb-lg-5 mb-2">
                    <h1>{{$jobPost->job_title}}</h1>
                    <p class="small"><a href="#" class="me-2 text-danger text-decoration-none">{{$jobPost->start_date ?? ''}} </a><span class="text-muted"> <i class="fa-solid fa-location-dot"></i> {{$jobPost->city->name ?? ''}} </span> <span class="text-muted">|</span> <i class="fa-solid fa-clock"></i> {{ $jobPost->created_at->diffForHumans() }}</p>
                    <div>
                        <span class="badge badge-light bg-primary-subtle text-dark me-2 py-2 px-3">{{$jobPost->priority ?? ''}}</span>
                        <span class="badge badge-light bg-danger-subtle text-dark me-2 py-2 px-3">{{$jobPost->job_contract ?? ''}}</span>
                        <span class="badge badge-light bg-warning-subtle text-dark me-2 py-2 px-3">{{ ucfirst($jobPost->type) ?? ''}}
                        </span>
                    </div>
                </div>
                <div class="job-details">
                    <div class="row mb-4 rounded-4 pt-3 pb-2">
                        <div class="col-md-4 col-6 my-lg-3 my-2 text-start">
                            <h5><i class="fa-solid fa-briefcase"></i> {{translate (getPageContent('Job_Type')) }}</h5>
                            <p>{{$jobPost->job_contract ?? ''}} / {{ ucfirst($jobPost->type) ?? ''}}</p>
                        </div>
                        <div class="col-md-4 col-6 my-lg-3 my-2">
                            <h5><i class="fa-solid fa-location-dot"></i> {{translate (getPageContent('career_filter2')) }}</h5> 
                            <p>{{ ucfirst($jobPost->address) ?? ''}},  {{$jobPost->city->name ?? ''}}</p>
                        </div>
                        <div class="col-md-4 col-6 my-lg-3 my-2">
                            <h5><i class="fa-solid fa-sack-dollar"></i> {{translate (getPageContent('Salary')) }}</h5>
                            <p>${{$jobPost->salary ?? ''}}</p>
                        </div>
                        <div class="col-md-4 col-6 my-lg-3 my-2 text-start">
                            <h5><i class="fa-solid fa-calendar-days"></i> {{translate (getPageContent('job_date')) }}</h5>
                            <p>{{ $jobPost->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="col-md-4 col-6 my-lg-3 my-2">
                            <h5><i class="fa-solid fa-clock"></i> {{translate (getPageContent('Expiration_date')) }}</h5> 
                            <p>{{ \Carbon\Carbon::parse($jobPost->end_date)->format('F j, Y') }}
                            </p>
                        </div>
                        <div class="col-md-4 col-6 my-lg-3 my-2">
                            <h5><i class="fa-solid fa-computer-mouse"></i> {{translate (getPageContent('Job_Title')) }}</h5>
                            <p>{{$jobPost->jobCategory->name ?? ''}}</p>
                        </div>
                    </div>
                    {!! $jobPost->job_details !!}
                   
                </div>
            </div>

            <div class="col-lg-4 sidebar">
                <!-- <div class="card card-body rounded-4">
                    <h5><img src="imgs/avatar-job.png" alt="" width="10%" class="">
                    AliStudio, Inc</h5>
                    <p class="text-muted">alithemes.com</p>
                    <p>We’re looking to add more product designers to our growing teams.</p>
                    <div class="footer-btns d-flex justify-content-left">
                        <a href="#" class="btn btn-success px-3">Apply Now</a>
                        <a href="#" class="btn btn-light border px-3 ms-1"><i class="fa-regular fa-heart text-danger"></i> Save job</a>
                    </div>
                </div> -->

                <div class="card card-body rounded-4 mt-3">
                    <h5><i class="fa-solid fa-briefcase"></i>{{translate (getPageContent('Job_card')) }}</h5>
                    <hr>
                    <p><strong>{{translate (getPageContent('Job_Type')) }}:</strong> {{$jobPost->job_contract ?? ''}} / {{ ucfirst($jobPost->type) ?? ''}}</p>
                    <p><strong>{{translate (getPageContent('career_filter2')) }}:</strong> {{ ucfirst($jobPost->address) ?? ''}},  {{$jobPost->city->name ?? ''}}</p>
                    <p><strong>{{translate (getPageContent('Salary')) }}:</strong> ${{$jobPost->salary}}</p>
                    <p><strong>{{translate (getPageContent('job_date')) }}:</strong> {{ $jobPost->created_at->diffForHumans() }}</p>
                    <p><strong>{{translate (getPageContent('Expiration_date')) }}:</strong> {{ \Carbon\Carbon::parse($jobPost->end_date)->format('F j, Y') }}</p>
                </div>

                <div class="card card-body rounded-4 mt-3">
                    <h5><i class="fa-solid fa-phone-volume"></i> {{translate (getPageContent('contact_info')) }}</h5>
                    <hr>
                    <p>{{translate (getPageContent('contact_info_address')) }}: {{$jobPost->address ?? ''}}</p>
                    <p>{{translate (getPageContent('contact_info_phone')) }}:   {{$jobPost->phone ?? ''}}</p>
                    <p>{{translate (getPageContent('contact_info_email')) }}:   {{$jobPost->email ?? ''}}</p> 
                    <p>{{translate (getPageContent('contact_info_Opening_Hour')) }}:  {{$jobPost->opening_hour ?? ''}}</p>
                </div>

            </div>
        </div>
    </div>

@endsection

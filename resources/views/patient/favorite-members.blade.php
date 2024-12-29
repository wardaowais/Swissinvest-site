@extends('patient.layouts.app')
@section('content')
<!-- [ breadcrumb ] start -->

<!-- Style For Breadcrumb -->
<style>
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
    .page-header-title h2 {
        font-size: 24px;
        font-weight: 600;
    }
    .title-icon, .title-icon i {
        color: #FF7917;
    }
</style>
<div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript: void(0)">Favourite List</a></li>
          </ul>
        </div>
        <div class="col-md-12">
          <div class="page-header-title mb-4">
            <h2 class="mb-0 title-icon"><i class="fa-solid fa-star me-1"></i> Favourite List</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- [ breadcrumb ] end -->

<style>
    .card.fav-mem {
        box-shadow: 0px 2px 12px rgba(0, 0, 0, .05)
    }
    .fav-mem a {
        text-decoration: none;
    }
    .fav-mem h6 {
        font-size: 1.1rem !important;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }
    .fav-mem .user-avtar.wid-45{
        max-height: 64px;
        max-width: 64px;
        min-height: 64px;
    }
    .badge-soft-success {
        background: rgba(34, 197, 84, .1);
        color: #22C55E;
    }
    .fm-buttoms {
        display: flex;
        border-top: 1px solid rgb(234, 236, 240);
    }
    .fm-buttoms .fm-item:first-child {
        border-right: 1px solid rgb(234, 236, 240);
    }
    .fm-buttoms .fm-item {
        flex-grow: 1;
        text-align: center;
        padding: 11px 0px;
    }
</style>

<!-- [ Main Content ] start -->
<div class="row">
    @foreach ($favoriteDoctors as $favoriteDoctor)
        <div class="col-md-6 col-xl-3">
        <div class="card fav-mem">
            <div class="card-body position-relative p-0">
                <div class="d-flex align-items-center p-3">
                    <div class="flex-shrink-0">
                        @php
                        // Define the image directories and get an array of image paths
                        $femaleImages = glob(public_path('assets/home/imgs/female-avi/*.jpg'));
                        $maleImages = glob(public_path('assets/home/imgs/male-avi/*.jpg'));
        
                        // Convert absolute paths to relative URLs and replace backslashes with forward slashes
                        $femaleImages = array_map(function ($path) {
                            return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
                        }, $femaleImages);
        
                        $maleImages = array_map(function ($path) {
                            return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
                        }, $maleImages);
                    @endphp
                        @if ($favoriteDoctor->doctor->gender == 'female')
                        <img src="{{ $favoriteDoctor->doctor->profile_pic ? asset('images/users/' . $favoriteDoctor->doctor->profile_pic) : getRandomImage($femaleImages) }}"
                            class="user-avtar wid-45 rounded">
                    @else
                        <img src="{{ $favoriteDoctor->doctor->profile_pic ? asset('images/users/' . $favoriteDoctor->doctor->profile_pic) : getRandomImage($maleImages) }}"
                            class="user-avtar wid-45 rounded">
                    @endif
    
                        {{-- <img class="user-avtar wid-45 rounded" src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="Doctor image"> --}}
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">{{ $favoriteDoctor->doctor->first_name }} {{ $favoriteDoctor->doctor->last_name }}</h6>
                        <p class="mb-0 badge badge-soft-success d-inline-block" title="{{ $favoriteDoctor->doctor->specialty->name }}" data-bs-toggle="tooltip" data-bs-placement="top">
                            {{ \Illuminate\Support\Str::limit($favoriteDoctor->doctor->specialty->name, 15) }}
                        </p>
                    </div>
                </div>
                <div class="flex-shrink-0 text-end">
                    <div class="fm-buttoms">
                        <a class="fm-item text-primary" href="{{route('doctorAvailability',[$favoriteDoctor->doctor_id])}}"><i class="fa-solid fa-calendar-check me-2"></i>{{translate('Book Appointment')}}</a>
                        <a class="fm-item text-danger" href="#"><i class="fa-solid fa-trash-can me-2"></i>Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- [ Main Content ] end -->
@endsection
@php
    $sections = \App\Models\Section::where('user_id',$user_id)->latest()->whereStatus(1)->get();
    $personal = \App\Models\Personal::whereUserId($user_id)->first();
    $website = \App\Models\Setting::whereUserId($user_id)->first();
    $userdd = \App\Models\User::find($user_id);
@endphp
<nav class="navbar navbar-expand-lg custom-nav navbar-light fixed-top sticky">
    <div class="container">
        <a class="navbar-brand pt-0 logo" href="{{ route('home.user', ['id' =>  $userdd->id, 'first_name' =>   $userdd->first_name, 'last_name' =>   $userdd->last_name]) }}/#home">
            <img src="{{asset(optional($website)->website_logo)}}" alt="" class="img-fluid logo-light" style="width: 160px;">
            <img src="{{asset(optional($website)->website_logo)}}" alt="" class="img-fluid logo-dark"  style="width: 160px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto" id="main_nav">
            @if(optional($personal)->slider_status == 1)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home.user', ['id' =>  $userdd->id, 'first_name' =>   $userdd->first_name, 'last_name' =>   $userdd->last_name]) }}/#home">Home</a>
    </li>
@endif
@if(optional($personal)->about_status == 1)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home.user', ['id' =>  $userdd->id, 'first_name' =>   $userdd->first_name, 'last_name' =>   $userdd->last_name]) }}/#about">About</a>
    </li>
@endif
@if(optional($personal)->our_service_status == 1)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home.user', ['id' =>  $userdd->id, 'first_name' =>   $userdd->first_name, 'last_name' =>   $userdd->last_name]) }}/#services">Services</a>
    </li>
@endif
@if(optional($personal)->working_hours_status == 1)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home.user', ['id' =>  $userdd->id, 'first_name' =>   $userdd->first_name, 'last_name' =>   $userdd->last_name]) }}/#working_hours">Working Hours</a>
    </li>
@endif

@if(optional($personal)->section_status == 1)
@foreach($sections as $row)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home.user', ['id' =>  $userdd->id, 'first_name' =>   $userdd->first_name, 'last_name' =>   $userdd->last_name]) }}/#customMenu{{$row->id}}">{{$row->title}}</a>
    </li>
@endforeach
@endif
@if(optional($personal)->blog_header_status == 1)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home.user', ['id' =>  $userdd->id, 'first_name' =>   $userdd->first_name, 'last_name' =>   $userdd->last_name]) }}/#blog">Blog</a>
    </li>
@endif
@if(optional($personal)->contact_status == 1)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home.user', ['id' =>  $userdd->id, 'first_name' =>   $userdd->first_name, 'last_name' =>   $userdd->last_name]) }}/#contact">Contact</a>
    </li>
@endif

            </ul>
        </div>
    </div>
</nav>

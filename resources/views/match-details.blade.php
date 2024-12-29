@extends('layouts.app')

@section('content')
<div class="my-dashboard">
    <div class="friends-content">
        <!-- friend single -->
        <div class="col-lg-12 col-md-12">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
            <div class="friend-single">
                <div class="picture">
                    <img src="{{ $chatuser->profile_pic ? asset('images/users/' . $chatuser->profile_pic) : asset('images/users/avatar.jpg') }}" alt="">
                </div>
                <div class="user-name">
                <h4>{{ $chatuser->first_name }} {{ $chatuser->last_name }}</h4>
                <a class="btn" href="{{ route('addFriends', ['userId' => encrypt($chatuser->id)]) }}">
                        {{translate('Send request')}}
                    </a>
                </div>
                <h4>{{translate('Country')}}: {{ $countryName }}</h4>
                <h4>{{translate('Language')}}: {{ $languageName }}</h4>
            
            </div>
            </div>
        </div>
        <div>
            
        <!-- end friend single -->
    </div>
</div>
@endsection

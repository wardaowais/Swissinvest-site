@extends('layouts.app')

@section('content')
<div class="row">
<div class="d-flex">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-primary">{{translate('Pending Requests')}}</h5>   
    </div>
</div>

<div class="row justify-content-center">
@if (count($pendingFriends) > 0)
@foreach ($pendingFriends as $pendings)
    <div class="col-lg-2 col-md-2 col-sm-3 mt-2 mb-2">
        <div class="card bg-transparent shadow-xl position-relative" style="height: auto;">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <a href="{{ route('match.details', ['userId' => encrypt($pendings['friend']->id)]) }}" class="text-decoration-none">
                <div class="overflow-hidden border-radius-xl text-center">
                    <img src="{{ asset($pendings['friend']->profile_pic ? 'images/users/' . $pendings['friend']->profile_pic : 'images/users/avatar.jpg') }}" 
                         class="rounded-circle" 
                         height="80px" 
                         width="80px">
                    <div class="mt-3">
                        <h5 class="card-title">{{ $pendings['friend']->first_name }} {{ $pendings['friend']->last_name }}</h5>
                        <p>{{ $pendings['country_name'] ?? 'Unknown' }}</p> 
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('unBlock', ['friendId' => encrypt($pendings['friend']->id), 'status' => encrypt('accepted')]) }}" class="btn btn-sm btn-success" id="blockRequest" style="height: 25px; padding: 0.25rem 0.5rem;">Confirm</a>
                            <a href="{{ route('unBlock', ['friendId' => encrypt($pendings['friend']->id), 'status' => encrypt('cancelled')]) }}" class="btn btn-sm btn-primary" id="blockRequest" style="height: 25px; padding: 0.25rem 0.5rem; margin-left: 5px;">Cancel</a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endforeach
@else
<div> {{translate('You have no pending requests')}}</div>
@endif
</div>




@endsection


@section('scripts')


@endsection

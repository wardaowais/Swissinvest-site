@extends('layouts.app')

@section('content')
<div class="row">
    <table class="table text-center bordered table-responsive">
        <thead>
            <tr>
                <th>{{ translate('Image') }}</th>
                <th>{{ translate('Name') }}</th>
                <th>{{ translate('Re-Call') }}</th>
                <th>{{ translate('Call Type') }}</th>
                <th>{{ translate('Date') }}</th>
            </tr>
        </thead>
        <tbody> 
        @foreach($callHistory as $call)
        <tr>
            <td>
                <img src="{{ asset($call->user->profile_pic ? 'images/users/' . $call->user->profile_pic : 'images/users/avatar.png') }}"
                     class="rounded-circle" 
                     height="40px" 
                     width="40px">
            </td>
            <td>{{ $call->user->first_name }} {{ $call->user->last_name }}</td>
            <td><a href="{{ route('match.details', ['userId' => encrypt($call->user->id)]) }}" class="btn btn-sm btn-primary" id="makeCall">{{ translate('Call') }}</a></td>
            <td>{{ $call->receiver_id == $user->id ? translate('Received') : translate('Outgoing') }}</td>
            <td>{{ $call->created_at->format('d.m.Y') }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {{ $callHistory->links('vendor.pagination') }} 
</div>
@endsection

@section('scripts')
@endsection

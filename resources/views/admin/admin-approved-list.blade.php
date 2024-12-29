@extends('admin/layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <h5 class="text-center mt-5 mb-3">Approved Verifications</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Email</th>
                    <th>Verified Code</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approvedVerifications as $verification)
                <tr>
                    <td>{{ $verification->user->first_name }} {{ $verification->user->last_name }}</td>
                    <td>{{ $verification->user->email }}</td>
                    <td>{{ $verification->verify_code }}</td>
                    <td>{{ $verification->created_at }}</td>
                    <td>
                        <a href="{{ route('verification.show', ['id' => $verification->id]) }}" class="btn btn-primary btn-sm">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

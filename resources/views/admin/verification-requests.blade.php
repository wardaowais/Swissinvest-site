@extends('admin/layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
    <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
            <h5>Verification Requests</h5>
            <a href="{{ route('admin.approved.list') }}" class="btn btn-danger">Approved List</a>
        </div>
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
                    <th>Document Image</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($verifications as $verification)
                <tr>
                    <td>{{ $verification->user->first_name }} {{ $verification->user->last_name }}</td>
                    <td>{{ $verification->user->email }}</td>
                    <td>
                        <img src="{{ asset('images/documents/' . $verification->doctor_id_image) }}" class="rounded-circle ms-1" height="40px" width="40px">
                    </td>
                    <td>{{ $verification->created_at }}</td>
                    <td>
                    <a href="{{ route('verification.show', ['id' => $verification->id]) }}" class="btn btn-primary btn-sm">View</a>
                    <form action="{{ route('verification.deny', ['id' => $verification->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Deny</button>
                    </form>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('scripts')

@endsection
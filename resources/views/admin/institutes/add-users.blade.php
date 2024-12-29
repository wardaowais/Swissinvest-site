@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Add Users to {{ $institute->name }}</h1>

    <form method="GET" action="{{ route('institutes.addUsers', $institute->id) }}" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" placeholder="Search by name, email, or phone" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(isset($users) && $users->isNotEmpty())
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if($user->institute_id)
                                <span class="badge badge-secondary text-info">Already in a group</span>
                            @else
                                <form action="{{ route('institutes.addUserToInstitute', [$institute->id, $user->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Add</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No users found.</p>
    @endif
</div>
@endsection

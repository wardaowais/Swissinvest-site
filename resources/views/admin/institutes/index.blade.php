@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Institutes</h1>
    <a href="{{ route('institutes.create') }}" class="btn btn-primary mb-3">Add Institute</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Country</th>
                <th>Area Code</th>
                <th>Address</th>
                <th>Contact Info</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Details</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($institutes as $institute)
                <tr>
                    <td>{{ $institute->name }}</td>
                    <td>{{ $institute->city->name ?? 'N/A' }}</td>
                    <td>{{ $institute->country->name ?? 'N/A' }}</td>
                    <td>{{ $institute->area_code ?? 'N/A' }}</td>
                    <td>{{ $institute->address ?? 'N/A' }}</td>
                    <td>{{ $institute->contact_info ?? 'N/A' }}</td>
                    <td>{{ $institute->phone ?? 'N/A' }}</td>
                    <td>{{ $institute->email ?? 'N/A' }}</td>
                    <td>{{ $institute->details ?? 'N/A' }}</td>
                    <td>
                        @if($institute->image)
                            <img src="{{ asset($institute->image) }}" alt="{{ $institute->name }}" style="width: 100px; height: auto;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('institutes.edit', $institute->id) }}">Edit</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('institutes.addUsers', $institute->id) }}">Add Users</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('institutes.members', $institute->id) }}">Member List</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('institutes.destroy', $institute->id) }}" method="POST" style="display: flex; align-items: center; padding: 0; margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" style="border: none; background: none; width: 100%; text-align: center; padding: 8px 16px;">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    

    <div class="pagination justify-content-center">
        {{ $institutes->links('vendor.pagination') }}
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Feature Details List</h2>
        <a href="{{ route('features.create') }}" class="btn btn-primary">Create New Feature</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($features->isEmpty())
        <div class="alert alert-info">No data exists</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($features as $feature)
                <tr>
                    <td>{{ $feature->id }}</td>
                    <td>{{ $feature->name }}</td>
                    <td>{{ $feature->description }}</td>
                    <td>{{ $feature->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                      
                        <a href="{{ route('features.edit', $feature->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('features.destroy', $feature->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <!-- Hidden row for showing Feature Details dynamically -->
                <tr id="details_{{ $feature->id }}" style="display: none;">
                    <td colspan="4">
                        <ul>
                            <li><strong>Description:</strong> {{ $feature->description }}</li>
                            <li><strong>Key Name:</strong> {{ $feature->key_name }}</li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
    function toggleDetails(id) {
        const detailsRow = document.getElementById('details_' + id);
        detailsRow.style.display = (detailsRow.style.display === 'none') ? 'table-row' : 'none';
    }
</script>
@endsection

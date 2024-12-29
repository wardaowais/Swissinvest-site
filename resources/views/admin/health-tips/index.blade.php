@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Health Tips List</h2>
        <a href="{{ route('health_tip_details.create') }}" class="btn btn-primary">Create New Tip</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Header</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($healthTips as $healthTip)
            <tr>
                <td>{{ $healthTip->id }}</td>
                <td>{{ $healthTip->tips_header }}</td>
                <td>
                    @if($healthTip->image)
                        <img src="{{ asset('images/tips/' . $healthTip->image) }}" alt="Health Tip Image" style="width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <button class="btn btn-info btn-sm" onclick="toggleDetails({{ $healthTip->id }})">Show Details</button>
                    <a href="{{ route('health_tip_details.edit', $healthTip->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('health_tip_details.destroy', $healthTip->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Hidden row for showing Health Tip Details dynamically -->
            <tr id="details_{{ $healthTip->id }}" style="display: none;">
                <td colspan="4">
                    <ul>
                        @foreach($healthTip->healthTipDetails as $detail)
                            <li>{{ $detail->tips }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function toggleDetails(id) {
        const detailsRow = document.getElementById('details_' + id);
        if (detailsRow.style.display === 'none') {
            detailsRow.style.display = 'table-row';
        } else {
            detailsRow.style.display = 'none';
        }
    }
</script>
@endsection

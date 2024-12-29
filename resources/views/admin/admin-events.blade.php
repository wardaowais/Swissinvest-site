<!-- resources/views/admin/admin-events.blade.php -->

@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="d-flex justify-content-between align-items-center">
    <h2>Add New Event</h2>
    <a class="btn btn-danger" href="{{ route('memberEventAdminList') }}">Events</a>
</div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{route('addEvents')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="speciality" class="form-label">Specialty</label>
            <select class="form-select" id="speciality" name="specialities_id" required>
                <option value="" disabled selected>Select Specialty</option>
                @foreach($specialities as $speciality)
                    <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <select class="form-select" id="title" name="ttile_id" required>
                <option value="" disabled selected>Select Title</option>
                @foreach($titles as $title)
                    <option value="{{ $title->id }}">{{ $title->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="eventTitle" class="form-label">Event Title</label>
            <input type="text" class="form-control" id="eventTitle" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="eventUrl" class="form-label">Event URL</label>
            <input type="url" class="form-control" id="eventUrl" name="event_url" required>
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Event Images (Up to 5)</label>
            <div id="image-inputs">
                <input type="file" class="form-control mb-2" name="images[]" accept="image/*" required>
            </div>
            <button type="button" id="add-image" class="btn btn-secondary">Add Another Image</button>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var maxImages = 5;
    var imageCount = 1;

    $('#add-image').click(function() {
        if (imageCount < maxImages) {
            imageCount++;
            $('#image-inputs').append('<input type="file" class="form-control mb-2" name="images[]" accept="image/*" required>');
        } else {
            alert('You can only add up to 5 images.');
        }
    });
});
</script>
@endsection

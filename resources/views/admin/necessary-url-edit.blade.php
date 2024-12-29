@extends('admin/layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-6 mx-auto">
        <h5 class="text-center">Edit Necessary URL</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('necessary-urls.update', $necessaryUrl->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category_id" class="mb-1">Category</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $necessaryUrl->cat_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title" class="mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ $necessaryUrl->title }}" placeholder="Enter title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description" class="mb-1">Description</label>
                <textarea id="description" name="description" placeholder="Enter description" class="form-control" required>{{ $necessaryUrl->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="phone" class="mb-1">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ $necessaryUrl->phone }}" placeholder="Enter phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email" class="mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ $necessaryUrl->email }}" placeholder="Enter email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address" class="mb-1">Address</label>
                <input type="text" id="address" name="address" value="{{ $necessaryUrl->address }}" placeholder="Enter address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image" class="mb-1">Profile Image</label>
                <input type="file" id="image" name="image" class="form-control">
                @if($necessaryUrl->image)
                    <img src="{{ asset('images/apps/' . $necessaryUrl->image) }}" alt="Profile Image" width="100" class="mt-2">
                @endif
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

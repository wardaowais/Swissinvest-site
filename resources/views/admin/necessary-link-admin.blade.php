@extends('admin.layouts.app')

@section('content')
<!-- index.blade.php -->
<section class="section dashboard">
<div class="row">
<div class="container">
<div class="row">
    <div class="col-6">
        <h4>Add useful URL details</h4>
    </div>
    <div class="col-6 text-end">
        <a class="btn btn-primary me-2" href="{{ route('necessaryCategorylist') }}">Category lists</a>
        <a class="btn btn-primary" href="{{ route('sponseredDetailsAdmin') }}">UsefulLink lists</a>
    </div>
</div>
@if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <h5 class="text-center">Add Category</h5>
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="category_name" class="mb-1">Category Name</label>
                    <input type="text" id="category_name" name="category_name" placeholder="Enter category name" class="form-control" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="col-xl-6">
            <h5 class="text-center">Add Necessary URL</h5>
            <form method="POST" action="{{ route('necessary-urls.store') }}" enctype="multipart/form-data">
                @csrf   

            <div class="form-group">
                <label for="profile_image" class="mb-1">Profile Image</label>
                <input type="file" id="profile_image" name="profile_image" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category_id" class="mb-1">Category</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title" class="mb-1">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description" class="mb-1">Description</label>
                <textarea id="description" name="description" placeholder="Enter description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="phone" class="mb-1">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email" class="mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address" class="mb-1">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter address" class="form-control" required>
            </div>

            <div id="sliderImages">
                <div class="form-group slider-image">
                    <label for="image1" class="mb-1">Slider Image 1</label>
                    <input type="file" id="image1" name="slider_images[]" class="form-control slider-image-file" required>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-success" id="addSliderImage">Add Slider Image</button>
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
    </div>
</div>
</div>



</section>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var imageIndex = 2;
        $('#addSliderImage').click(function() {
            var newImageField = `
                <div class="form-group slider-image">
                    <label for="image${imageIndex}" class="mb-1">Slider Image ${imageIndex}</label>
                    <input type="file" id="image${imageIndex}" name="slider_images[]" class="form-control slider-image-file" required>
                </div>`;
            $('#sliderImages').append(newImageField);
            imageIndex++;
        });
    });
</script>

@endsection
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Institute</h1>

    <form action="{{ route('institutes.update', $institute->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Institute Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $institute->name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="city_id">City</label>
            <select name="city_id" class="form-control">
                <option value="">Select City</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ $city->id == $institute->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="country_id">Country</label>
            <select name="country_id" class="form-control">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $country->id == $institute->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="area_code">Area Code</label>
            <input type="text" name="area_code" class="form-control" value="{{ old('area_code', $institute->area_code) }}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $institute->address) }}">
        </div>

        <div class="form-group">
            <label for="contact_info">Contact Info</label>
            <input type="text" name="contact_info" class="form-control" value="{{ old('contact_info', $institute->contact_info) }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $institute->phone) }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $institute->email) }}">
        </div>

        <div class="form-group">
            <label for="details">Details</label>
            <textarea name="details" class="form-control">{{ old('details', $institute->details) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file">
            @if($institute->image)
                <img src="{{ asset($institute->image) }}" alt="{{ $institute->name }}" style="width: 150px; height: auto;" class="mt-2">
                <p>Current Image</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Institute</button>
    </form>
</div>
@endsection

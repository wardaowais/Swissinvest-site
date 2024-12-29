@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Feature</h2>
    <form action="{{ route('features.update', $feature->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $feature->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $feature->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="key_name">Key Name</label>
            <input type="text" name="key_name" class="form-control" value="{{ $feature->key_name }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $feature->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$feature->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Feature</button>
    </form>
</div>
@endsection

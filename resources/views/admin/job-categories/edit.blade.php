{{-- resources/views/admin/job-categories/edit.blade.php --}}
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Job Category</h1>
    <form action="{{ route('jobCategories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Category</button>
    </form>
</div>
@endsection

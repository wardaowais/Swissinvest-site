@extends('admin.layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('jobCategories.index') }}" class="btn btn-primary mt-2">Back to List</a>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        
    </div>
@endif
    <h1>Add Job Category</h1>
    <form action="{{ route('jobCategories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add Category</button>
    </form>
</div>
@endsection

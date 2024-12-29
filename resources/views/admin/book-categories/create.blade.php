@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Category</h1>

        <form action="{{ route('book-categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection

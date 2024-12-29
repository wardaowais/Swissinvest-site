@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Books List</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Create New Book</a>
        <a href="{{ route('book-categories.index') }}" class="btn btn-success mb-3">View Categories</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Book PDF</th>
                    <th>Category</th> <!-- New column for Category -->
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->description }}</td>
                        <td><img src="{{ asset($book->image) }}" alt="Book Image" width="50"></td>
                        <td><a href="{{ asset($book->book_pdf) }}" target="_blank">Download PDF</a></td>
                        <td>{{ $book->category ? $book->category->name : 'N/A' }}</td> <!-- Display category name -->
                        <td>{{ $book->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

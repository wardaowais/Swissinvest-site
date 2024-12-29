@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>

        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Book Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $book->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $book->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($book->image)
                    <img src="{{ asset($book->image) }}" alt="Book Image" width="50">
                @endif
            </div>

            <div class="form-group">
                <label for="book_pdf">Book PDF</label>
                <input type="file" name="book_pdf" id="book_pdf" class="form-control">
                @if ($book->book_pdf)
                    <a href="{{ asset($book->book_pdf) }}" target="_blank">Download PDF</a>
                @endif
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ $book->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $book->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
@endsection
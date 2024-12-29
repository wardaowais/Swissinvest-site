@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Content</h1>

        <form action="{{ route('pages.content.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="page_name">Page Name</label>
                <input type="text" name="page_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="content_key">Content Key</label>
                <input type="text" name="content_key" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="content_type">Content Type</label>
                <select name="content_type" class="form-control" required>
                    <option value="text">Text</option>
                    <option value="button">Button</option>
                    <option value="url">Url</option>
                </select>
            </div>

            <div class="form-group">
                <label for="content_value">Content Value</label>
                <textarea name="content_value" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit page Content</h1>

        <form action="{{ route('pages.content.update', $content->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- <div class="form-group">
                <label for="page_name">Page Name</label>
                <input type="text" name="page_name" class="form-control" value="{{ $content->page_name }}" required>
            </div>

            <div class="form-group">
                <label for="content_key">Content Key</label>
                <input type="text" name="content_key" class="form-control" value="{{ $content->content_key }}" required>
            </div>

            <div class="form-group">
                <label for="content_type">Content Type</label>
                <select name="content_type" class="form-control" required>
                    <option value="text" {{ $content->content_type == 'text' ? 'selected' : '' }}>Text</option>
                    <option value="button" {{ $content->content_type == 'button' ? 'selected' : '' }}>Button</option>
                    <option value="image" {{ $content->content_type == 'url' ? 'selected' : '' }}>URL</option>
                </select>
            </div> --}}

            <div class="form-group">
                <label for="content_value">Content Value</label>
                <textarea name="content_value" class="form-control" required>{{ $content->content_value }}</textarea>
            </div>
<br>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
<!-- index.blade.php -->
<section class="section dashboard">
    <div class="container">
        <h1>Edit Web Content</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('web-content.update') }}" method="POST">
            @csrf
            @foreach ($webContent->getFillable() as $field)
                <div class="form-group">
                    <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                    <textarea class="form-control" id="{{ $field }}" name="{{ $field }}" rows="4">{{ $webContent->$field }}</textarea>
                    @if ($errors->has($field))
                        <span class="text-danger">{{ $errors->first($field) }}</span>
                    @endif
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</section>
@endsection

@section('scripts')
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Survey List</h1>
        <a href="{{ route('survey.create') }}" class="btn btn-primary mb-3">Create Survey</a>
        <a href="{{ route('survey_categories.index') }}" class="btn btn-success mb-3">View Categories</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surveys as $survey)
                    <tr>
                        <td>{{ $survey->question }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $survey->type)) }}</td>
                        <td>{{ $survey->category->name }}</td>
                        <td>
                            <a href="{{ route('survey.edit', $survey->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('survey.destroy', $survey->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

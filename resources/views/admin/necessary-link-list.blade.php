@extends('admin/layouts.app')

@section('content')
<div class="row">
<div class="row mt-5">
    <div class="col-xl-12 mx-auto">
        <h5 class="text-center">All Necessary URLs</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Profile Image</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($necessaryUrls as $url)
                    <tr>
                        <td>
                            <img src="{{ asset('images/apps/' . $url->image) }}" alt="Profile Image" width="50">
                        </td>
                        <td>{{ $url->necessaryUrlCategory->name }}</td>
                        <td>{{ $url->title }}</td>
                        <td>{{ $url->description }}</td>
                        <td>{{ $url->phone }}</td>
                        <td>{{ $url->email }}</td>
                        <td>{{ $url->address }}</td>
                        <td>
                            <a href="{{ route('necessary-urls.edit', $url->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('necessary-urls.destroy', $url->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

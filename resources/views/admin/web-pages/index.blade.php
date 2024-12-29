@extends('admin.layouts.app')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@section('content')
    <div class="container">
        <h1>Manage Page Content</h1>

        <a href="{{ route('pages.content.create') }}" class="btn btn-primary mb-3">Add New Content</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filter Dropdown -->
        <form method="GET" action="{{ route('contentList') }}" class="mb-3">
            <div class="form-group">
                <label for="page_name">Filter by Page:</label>
                <select name="page_name" id="page_name" class="form-control" onchange="this.form.submit()">
                    <option value="">All Pages</option>
                    @foreach($pageNames as $pageName)
                        <option value="{{ $pageName->page_name }}" {{ $selectedPage == $pageName->page_name ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $pageName->page_name)) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <table class="table table-bordered" id="transTable">
            <thead>
                <tr>
                    <th>Page Name</th>
                    <th>Content Section</th>
                    <th>Content Type</th>
                    <th>Content Value</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                    <tr>
                        <td>{{ ucfirst(str_replace('_', ' ', $content->page_name)) }}</td>
                        <td>{{ $content->content_key }}</td>
                        <td>{{ $content->content_type }}</td>
                        <td>{{ $content->content_value }}</td>
                        <td>
                            <a href="{{ route('pages.content.edit', $content->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#transTable').DataTable({
        "paging": true,
        "searching": true
    });
})
    @endsection
@extends('admin.layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-xl-12 mx-auto">
        <h5 class="text-center">Partners</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add New Partner</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>API URL</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $partner)
                    <tr>
                        <td>{{ $partner->name }}</td>
                        <td>{{ $partner->title }}</td>
                        <td><img src="{{asset('images/apps/' . $partner->image) }}" alt="{{ $partner->name }}" width="50"></td>
                        <td>{{ $partner->description }}</td>
                        <td>{{ $partner->api_url }}</td>
                        <td>{{ $partner->status }}</td>
                        <td>
                            <!-- <button class="btn btn-sm btn-primary edit-btn" 
                                    data-id="{{ $partner->id }}" 
                                    data-name="{{ $partner->name }}" 
                                    data-title="{{ $partner->title }}" 
                                    data-image="{{asset('images/apps/' . $partner->image) }}" 
                                    data-description="{{ $partner->description }}" 
                                    data-api_url="{{ $partner->api_url }}" 
                                    data-status="{{ $partner->status }}">
                                Edit
                            </button> -->
                            <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" style="display:inline-block;">
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


<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="POST" action="{{ route('addPartner') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add New Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Logo</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="mb-3">
                    <!-- <label for="api_url" class="form-label">API URL</label> -->
                    <input type="hidden" class="form-control" id="api_url" name="api_url" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Partner</button>
            </div>
        </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection

@extends('admin.layouts.app')

@section('content')
<!-- index.blade.php -->
<section class="section dashboard">
   
    <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
    
    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add Image</button>
    <a href="{{ route('contentList') }}" class="btn btn-sm btn-primary">Edit web page content</a>
</div>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Page</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($webImages as $webImage)
                <tr>
                    <td>{{ $webImage->id }}</td>
                    <td><img src="{{ asset($webImage->image) }}" width="100" alt="Image"></td>
                    <td>{{ $webImage->page }}</td>
                    <td>
                        <form action="{{ route('web-images.destroy', $webImage->id) }}" method="POST" class="d-inline-block">
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
</section>
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{ route('web-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addImageModalLabel">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group">
                        <label for="page">Page</label>
                            <select class="form-control" name="page">
                            <option value="home">Home page</option>
                            <option value="search">Doctor list page</option>
                            <option value="about">about page</option>
                            <option value="login">Login Page</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Add Image Modal -->

<!-- Edit Image Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{ route('web-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addImageModalLabel">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group">
                        <label for="page">Page</label>
                            <select class="form-control" name="page">
                            <option value="home">Home page</option>
                            <option value="search">Doctor list page</option>
                            <option value="about">about page</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editImageForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editImageModalLabel">Edit Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                        <img id="currentImage" src="" width="100" alt="Current Image" class="mt-2">
                    </div>
                    <div class="form-group">
                        <label for="page">Page</label>
                        <input type="text" class="form-control" name="page" id="editPage">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            $.get('/admin/web-images/' + id + '/edit', function(data) {
                $('#editImageForm').attr('action', '/admin/web-images/' + id);
                $('#editPage').val(data.page);
                $('#currentImage').attr('src', '{{ asset('') }}' + data.image);
                $('#editImageModal').modal('show');
            });
        });
    });
</script>
@endsection

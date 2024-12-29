@extends('admin.layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-xl-12 mx-auto">
        <h5 class="text-center">Member Titles</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Add New Title</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($titles as $title)
                    <tr>
                        <td>{{ $title->name }}</td>
                        <td>{{ $title->created_at }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $title->id }}" data-name="{{ $title->name }}">Edit</button>
                            <form action="{{ route('member-titles.destroy', $title->id) }}" method="POST" style="display:inline-block;">
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
            <form id="createForm" method="POST" action="{{ route('member-titles.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add New Member Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="create-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="create-name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST" action="{{ route('member-titles.update', ['member_title' => ':id']) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Member Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="edit-id" name="id" required>
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            var titleId = $(this).data('id');
            var titleName = $(this).data('name');

            $('#edit-name').val(titleName);
            $('#edit-id').val(titleId);
            $('#editForm').attr('action', '{{ route("member-titles.update", ":id") }}'.replace(':id', titleId));
            $('#editModal').modal('show');
        });
    });
</script>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-xl-12 mx-auto">
        <h5 class="text-center">Specialties</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add New Specialty</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($specialties as $specialty)
                    <tr>
                        <td>{{ $specialty->name }}</td>
                        <td>{{ $specialty->created_at}}</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $specialty->id }}" data-name="{{ $specialty->name }}">Edit</button>
                            <form action="{{ route('specialties.destroy', $specialty->id) }}" method="POST" style="display:inline-block;">
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST" action="{{ route('specialties.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Specialty</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="specialty-id" name="specialty_id" required>
                    <div class="mb-3">
                        <label for="specialty-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="specialty-name" name="name" required>
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

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('specialties.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add New Specialty</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="new-specialty-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="new-specialty-name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Specialty</button>
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
            var specialtyId = $(this).data('id');
            var specialtyName = $(this).data('name');

            $('#specialty-name').val(specialtyName);
            $('#specialty-id').val(specialtyId);
        

            $('#editModal').modal('show');
        });
    });
</script>
@endsection

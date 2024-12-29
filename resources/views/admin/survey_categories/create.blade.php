@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Add Survey Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('survey_categories.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
                            </div>
                            <div class="mb-3">
                                <label for="background_color" class="form-label">Background Color</label>
                                <input type="color" name="background_color" id="background_color" class="form-control" value="#ffffff">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Create Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


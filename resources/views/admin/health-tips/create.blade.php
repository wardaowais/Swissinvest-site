@extends('admin.layouts.app')

@section('content')

<div class="container">
    <h2>Create Health Tip</h2>

    <form action="{{ route('health_tip_details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Header Field -->
        <div class="form-group">
            <label for="tips_header">Header</label>
            <input type="text" class="form-control" name="tips_header" id="tips_header" placeholder="Enter Header">
        </div>

        <!-- Footer Field -->
        <div class="form-group">
            <label for="tips_footer">Footer</label>
            <input type="text" class="form-control" name="tips_footer" id="tips_footer" placeholder="Enter Footer">
        </div>

        <!-- Image Upload Field -->
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>

        <!-- Tips Fields (Dynamic Appendable) -->
        <div class="form-group">
            <label for="tips">Tips</label>
            <div id="tips-container">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="tips[]" placeholder="Enter Tip">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-success add-tip">Add More</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // Add new tip field
        $('.add-tip').click(function () {
            $('#tips-container').append(`
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="tips[]" placeholder="Enter Tip">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-tip">Remove</button>
                    </div>
                </div>
            `);
        });

        // Remove tip field
        $(document).on('click', '.remove-tip', function () {
            $(this).closest('.input-group').remove();
        });
    });
</script>
@endsection
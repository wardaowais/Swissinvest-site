@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h2>Edit Health Tip</h2>
    <form action="{{ route('health_tip_details.update', $healthTip->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Health Tip Header -->
        <div class="form-group">
            <label for="tips_header">Tips Header:</label>
            <input type="text" name="tips_header" class="form-control" value="{{ old('tips_header', $healthTip->tips_header) }}" required>
        </div>

        <!-- Health Tip Footer -->
        <div class="form-group">
            <label for="tips_footer">Tips Footer:</label>
            <input type="text" name="tips_footer" class="form-control" value="{{ old('tips_footer', $healthTip->tips_footer) }}">
        </div>

        <!-- Current Image -->
        <div class="form-group">
            <label for="current_image">Current Image:</label>
            @if($healthTip->image)
                <div>
                    <img src="{{ asset('images/tips/' . $healthTip->image) }}" alt="Health Tip Image" style="width: 200px;">
                </div>
            @else
                <p>No image uploaded</p>
            @endif
        </div>

        <!-- Upload New Image -->
        <div class="form-group">
            <label for="image">Upload New Image (optional):</label>
            <input type="file" name="image" class="form-control">
        </div>

        <!-- Tips (Dynamically Add/Remove Tips) -->
        <div class="form-group">
            <label for="tips">Tips:</label>
            <div id="tips_container">
                @foreach($healthTip->healthTipDetails as $index => $tipDetail)
                    <div class="tip-item" id="tip_item_{{ $index }}">
                        <textarea name="tips[]" class="form-control" required>{{ old('tips.' . $index, $tipDetail->tips) }}</textarea>
                        <button type="button" class="btn btn-danger remove-tip" onclick="removeTip({{ $index }})">Remove</button>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-primary mt-2" id="add_tip_button">Add Tip</button>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="active" {{ $healthTip->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $healthTip->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update Health Tip</button>
    </form>
</div>

<!-- jQuery for dynamic tips -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let tipIndex = {{ $healthTip->healthTipDetails->count() }};

        // Add new tip field dynamically
        $('#add_tip_button').on('click', function() {
            $('#tips_container').append(`
                <div class="tip-item" id="tip_item_${tipIndex}">
                    <textarea name="tips[]" class="form-control" required></textarea>
                    <button type="button" class="btn btn-danger remove-tip" onclick="removeTip(${tipIndex})">Remove</button>
                </div>
            `);
            tipIndex++;
        });

        // Remove tip field
        window.removeTip = function(index) {
            $('#tip_item_' + index).remove();
        }
    });
</script>
@endsection

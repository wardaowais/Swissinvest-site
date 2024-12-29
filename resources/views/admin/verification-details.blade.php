<!-- resources/views/admin/verification-details.blade.php -->

@extends('admin/layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <h5 class="text-center mt-5 mb-3">Verification Details</h5>
        <div class="card">
            <div class="card-body text-center">
                <p><strong>Member Name:</strong> {{ $verification->user->first_name }} {{ $verification->user->last_name }}</p>
                <p><strong>Email:</strong> {{ $verification->user->email }}</p>
                <p><strong>Specialty:</strong> {{ $verification->user->specialty->name }}</p>
                <p><strong>Address:</strong> {{ $verification->user->address }}, {{ $verification->user->house_number }}, {{ $verification->user->postal_code }} {{ $verification->user->cityRelation->name }}</p>
                <p><strong>Doctor ID Image:</strong></p>
                <img src="{{ asset('images/documents/' . $verification->doctor_id_image) }}" class="img-fluid mb-2" style="max-width: 200px;" data-toggle="modal" data-target="#imageModal" data-src="{{ asset('images/documents/' . $verification->doctor_id_image) }}">

                <!-- Display Doctor Certificates -->
                <p class="mt-3"><strong>Certificates:</strong></p>
                @foreach ($doctorCertificates as $certificate)
                    <img src="{{ asset('images/documents/' . $certificate->image) }}" class="img-fluid mb-2 me-2" style="max-width: 200px;" data-toggle="modal" data-target="#imageModal" data-src="{{ asset('images/documents/' . $certificate->image) }}">
                @endforeach
            </div>
        </div>

        <div class="mt-3 text-center">
            <form action="{{ route('verification.approve', ['id' => $verification->id]) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-success">Approve</button>
            </form>

            <form action="{{ route('verification.deny', ['id' => $verification->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deny</button>
            </form>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="fullImage" src="" class="img-fluid" style="max-width: 100%; max-height: 100vh;">
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('img[data-toggle="modal"]').on('click', function() {
            var src = $(this).data('src');
            $('#fullImage').attr('src', src);
        });
    });
</script>
@endsection



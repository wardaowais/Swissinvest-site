@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
            <h5>Ads Requests</h5>
            <a href="{{ route('adsPlanlist') }}" class="btn btn-danger">Price settings</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Ad Details</th>
                    <th>Ads Image</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingList as $ads)
                <tr>
                    <td>{{ $ads->user->first_name }} {{ $ads->user->last_name }}</td>
                    <td>{{ $ads->details }}</td>
                    <td>
                        @if ($ads->images)
                            {{ translate('Paid') }}
                        @else
                            {{ translate('Free ads') }}
                        @endif
                    </td>
                    <td>{{ $ads->created_at }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adModal" data-id="{{ $ads->id }}" data-details="{{ $ads->details }}" data-images="{{ $ads->images }}" data-date="{{ $ads->created_at }}">View</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="adModal" tabindex="-1" role="dialog" aria-labelledby="adModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adModalLabel">Ad Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Details:</strong> <span id="adDetails"></span></p>
                <p><strong>Image:</strong> <span id="adImage"></span></p>
                <p><strong>Date:</strong> <span id="adDate"></span></p>
            </div>
            <div class="modal-footer">
                <form id="approveForm" method="POST" action="{{route('ads.approve')}}" style="display:inline;">
                    @csrf
                    <input type="hidden" name="adsId">
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
                <form id="denyForm" method="POST" action="{{route('cancelledAds')}}" style="display:inline;">
                    @csrf
                
                    <input type="hidden" name="adsId">
                    <button type="submit" class="btn btn-danger">Deny</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#adModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var details = button.data('details')
        var images = button.data('images')
        var date = button.data('date')
        
        var modal = $(this)
        modal.find('.modal-title').text('Ad Details - ID: ' + id)
        modal.find('#adDetails').text(details)
        if (images) {
            modal.find('#adImage').html('<img src="/images/ads/' + images + '" class="img-fluid">')
        } else {
            modal.find('#adImage').text('No image available')
        }
        modal.find('#adDate').text(date)
        
        
        // Set ad ID in hidden inputs
        modal.find('#approveForm input[name="adsId"]').val(id)
        modal.find('#denyForm input[name="adsId"]').val(id)
    })
</script>
@endsection

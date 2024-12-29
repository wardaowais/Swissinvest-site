@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
            <h5>Price plan settings</h5>
            <div>
                <a href="{{ route('adsList') }}" class="btn btn-danger">Ads list</a>
                {{-- <button class="btn btn-success" data-toggle="modal" data-target="#addAdModal">Add Ads Plan</button> --}}
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ads type</th>
                    <th>Ads price</th>
                    <th>Duration</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($advertisementsPlans as $ads)
                <tr>
                    <td>{{ $ads->ads_type }}</td>
                    <td>{{ $ads->payment }}</td>
                    <td>{{ $ads->duration }} days</td>
                    <td>{{ $ads->created_at }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adModal" data-id="{{ $ads->id }}" data-payment="{{ $ads->payment }}" data-duration="{{ $ads->duration }}">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Ads Plan Modal -->
<div class="modal fade" id="adModal" tabindex="-1" role="dialog" aria-labelledby="adModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adModalLabel">Edit Ads Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('update.ads.plan') }}">
                    @csrf
                    <input type="hidden" name="adsPlanId" id="adsPlanId">
                    <div class="form-group">
                        <label for="payment">Ads Price</label>
                        <input type="text" class="form-control" name="payment" id="payment">
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration (days)</label>
                        <input type="text" class="form-control" name="duration" id="duration">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="editForm" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Ads Plan Modal -->
<div class="modal fade" id="addAdModal" tabindex="-1" role="dialog" aria-labelledby="addAdModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdModalLabel">Add Ads Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" method="POST" action="{{ route('store.ads.plan') }}">
                    @csrf
                    <div class="form-group">
                        <label for="ads_type">Ads Type</label>
                        <input type="text" class="form-control" name="ads_type" id="ads_type" required>
                    </div>
                    <div class="form-group">
                        <label for="payment">Ads Price</label>
                        <input type="text" class="form-control" name="payment" id="payment" required>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration (days)</label>
                        <input type="text" class="form-control" name="duration" id="duration" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="addForm" class="btn btn-success">Add Plan</button>
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
        var payment = button.data('payment')
        var duration = button.data('duration')
        
        var modal = $(this)
        modal.find('.modal-title').text('Edit Ads Plan - ID: ' + id)
        modal.find('#adsPlanId').val(id)
        modal.find('#payment').val(payment)
        modal.find('#duration').val(duration)
    })
</script>
@endsection

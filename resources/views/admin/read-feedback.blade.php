@extends('admin.layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-xl-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Feedback Details</h3>
            </div>
            <div class="card-body">
            <p class="card-text" align="right">Date: {{ $feedback->created_at->format('Y-m-d') }}</p>
                <h5 class="card-title">Subject: {{ $feedback->subject }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">From: {{ $feedback->user->first_name }} {{ $feedback->user->last_name }} ({{ $feedback->user->email }})</h6>
                <p class="card-text">Specialties: {{ $feedback->user->specialty->name }}</p>
                <p class="card-text">Details:</p>
                <div class="card">
                    <p> {{ $feedback->details }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection

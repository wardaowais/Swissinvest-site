@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-75 my-5">
        <div class="card-header text-center">
            <h3>Booking Details</h3>
        </div>
        <div class="card-body text-center">
            <!-- Member Information -->
            <div class="mb-4">
                <h4 class="card-title">Member Information</h4>
                @if($member->profile_pic)
                <img src="{{ asset('images/users/' . $member->profile_pic) }}" class="member-profile-picture mb-3" style="width: 100px; height: 100px; border-radius: 50%;">
                @else
                <img src="{{ asset('assets/img/profile-img.jpg') }}" class="member-profile-picture mb-3" style="width: 100px; height: 100px; border-radius: 50%;">
                @endif
                <p><strong>Name:</strong> {{ $member->first_name }} {{ $member->last_name }}</p>
                <p><strong>Speciality:</strong> {{ $member->Specialty->name ?? 'N/A' }}</p>
                <p><strong>Address:</strong> {{ $member->address }} {{ $member->house_number }}, {{ $member->postal_code }} {{ $member->cityRelation->name }}</p>
            </div>

            <!-- Patient Information -->
            <div class="mb-4">
                <h4 class="card-title">Patient Information</h4>
                <p><strong>Name:</strong> {{ $patient->first_name }} {{ $patient->last_name }}</p>
                <p><strong>Address:</strong> {{ $patient->address }} {{ $patient->house_number }}, {{ $patient->postal_code }} {{ $patient->cityRelation->name }}</p>
                <p><strong>Date of Birth:</strong> {{ $patient->birth_date }}</p>
            </div>

            <!-- Booking Information -->
            <div class="mb-4">
                <h4 class="card-title">Booking Information</h4>
                <p><strong>Appointment Type:</strong> {{ $booking->specialty->name ?? 'N/A' }}</p>
                <p><strong>Appointment Date:</strong> {{ $booking->booking_date }}</p>
                <p><strong>Appointment Time:</strong> {{ \Carbon\Carbon::parse($booking->from_time)->format('h:i A') }}</p>
                <p><strong>Status:</strong> {{ $booking->status ?? 'Pending' }}</p>
                <p><strong>Desies Details:</strong> {{ $booking->reason ?? 'N/A' }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="mt-4 d-flex justify-content-center">
                <form action="{{ route('booking.accept', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success mx-2">Accept</button>
                </form>
                <form action="{{ route('booking.cancel', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger mx-2">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
<!-- index.blade.php -->
<div class="row justify-content-center">
    <div class="col-6">
        <div align="right"><a class="btn btn-sm btn-info" href="{{ route('addPlans') }}">Add Plan</a></div>
    </div>

        <div class="col-6">
        <div align="left"><a class="btn btn-sm btn-info" href="{{ route('features.index') }}">Premium features</a></div>
    </div>
    
<div class="container">

    <table id="plansTable" class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Feature Name</th>
            <th>Duration</th>
            <th>Amount</th>
            <th>Details</th>
            {{-- <th>Ads Interval</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($plans as $plan)
            <tr>
                <td>{{ $plan->name }}</td>
                <td>{{ ucfirst(Str::replace('_', ' ', $plan->feature)) }}</td>
                <td>{{ $plan->duration }} Days</td>
                <td>{{ $plan->amount }}</td>
                <!-- Use white-space: pre-wrap; to allow wrapping -->
                <td style="white-space: pre-wrap;">{{ $plan->details }}</td>
                {{-- <td>{{ $plan->ads_times }} Min</td> --}}
                <td>
                <a class="btn btn-sm btn-primary" href="{{ route('editPlan', ['id' => $plan->id]) }}">Edit</a>
                <a class="btn btn-sm btn-primary" href="{{ route('removePlan', ['id' => $plan->id]) }}">Remove</a>
            </td>

            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>


@endsection


@section('scripts')
<script>
$(document).ready(function() {
    $('#plansTable').DataTable({
        "paging": true, // Enable pagination
        "searching": true // Enable search functionality
    });
});

</script>
@endsection
@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <h5>Boost Requests</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Boost Plan</th>
                    <th>Paid Amount</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boostRequests as $request)
                <tr>
                    <td>{{ $request->user->first_name }} {{ $request->user->last_name }}</td>
                    <td>{{ $request->boostSetting->ads_type }}</td>
                    <td>${{ $request->paid_amount }}</td>
                    <td>{{ $request->end_date }}</td>
                    <td>{{ ucfirst($request->status) }}</td>
                    <td>
                        @if ($request->status === 'pending')
                            <form action="{{ route('boost.approve') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="boostId" value="{{ $request->id }}">
                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                            <form action="{{ route('boost.deny') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="boostId" value="{{ $request->id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Deny</button>
                            </form>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

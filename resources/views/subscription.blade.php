@extends('layouts.app')

@section('content')
<div class="row">
<table class="table text-center borderd table-responsive">
            <thead>
                <tr>
                    <th>{{ translate('Plan name') }}</th>
                    <th>{{ translate('Type') }}</th>
                    <th>{{ translate('Paid') }}</th>
                    <th>{{ translate('End date') }}</th>
                    <th>{{ translate('Start date') }}</th>
                </tr>
            </thead>
            <tbody>
    @foreach($subscriptions as $subscription)
        <tr>
            <td>{{ translate($subscription->plan->name) }}</td>
            <td>{{ translate($subscription->plan->duration) }}</td>
            <td>{{ $subscription->plan->amount }}$</td>
            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $subscription->end_date)->format('d.m.y') }}</td>
            <td>{{ $subscription->created_at->format('d.m.Y') }}</td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>



@endsection


@section('scripts')


@endsection

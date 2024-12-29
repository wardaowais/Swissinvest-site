@extends('admin.layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-xl-12 mx-auto">
        <h1>Feedback List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->subject }}</td>
                    <td>{{ $feedback->created_at->format('Y-m-d') }}</td>
                    <td>
                            <a class="btn btn-primary btn-view" href="{{ route('admin.feedback.read', ['id' => $feedback->id]) }}">
                                    {{ $feedback->is_read != 1 ? 'Unread' : 'Viewed' }}
                                </a>
                        <form action="{{ route('admin.feedback.delete', ['id' => $feedback->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')

@endsection

@extends('admin.layouts.app')

@section('content')

<div class="row mt-5">
    <div class="col-xl-12 mx-auto">
        <h1>Event List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>URL</th>
                    <th>date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->event_url }}</td>
                    <td>{{ $event->created_at->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('admin.event.delete', ['id' => $event->id]) }}" method="POST" style="display:inline;">
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

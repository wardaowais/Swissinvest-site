@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Members of {{ $institute->name }}</h1>

    @if($members->isEmpty())
        <p>No members found for this institute.</p>
    @else
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>
                            <form action="{{ route('institutes.removeUser', [$institute->id, $member->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('institutes.index') }}" class="btn btn-primary">Back to Institutes</a>
</div>
@endsection

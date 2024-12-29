@extends('admin/layouts.app')

@section('content')
<!-- index.blade.php -->
<div class="row justify-content-center">
<h5>FAQ Questions</h5>
        <div class="col-xl-6">
            <h5 class="text-center">Add Questions</h5>
            <form method="POST" action="{{ route('faq.store') }}">
                @csrf
                <div class="form-group">
                    <label for="question" class="mb-1">Questions</label>
                    <input type="text" id="question" name="question" placeholder="Enter category name" class="form-control" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
 <div class="card col-6">
 @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
 <table class="table table-striped">
    <thead>
        <tr>
        <th>Questions</th>
        <th>Action</th>
        <th>Date</th>
        </tr>
    </thead>
        <tbody>
            @foreach ( $faqQuestions as $faq)
            <tr>
                <td>{{$faq->question}}</td>
                <td>{{$faq->created_at}}</td>
                <td>
                            <!-- <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-sm btn-primary">Edit</a> -->
                            <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
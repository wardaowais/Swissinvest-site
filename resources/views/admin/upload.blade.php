<!-- resources/views/admin/upload.blade.php -->

@extends('admin/layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ translate('Upload user list CSV file') }}</div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.upload.csv') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="csv_file">{{ __('CSV File') }}</label>
                            <input id="csv_file" type="file" class="form-control-file @error('csv_file') is-invalid @enderror" name="csv_file" required>

                            @error('csv_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Upload') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('home.layouts.app')

@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="content text-center">
                <h3>{{ __('Two-Factor Authentication') }}</h3>

                @if(isset($qrImage))
                    <div class="text-center mb-3">
                        <img src="{{ $qrImage }}" alt="2FA QR Code">

                    </div>
                @else
                    <p>{{ __('QR Code not generated.') }}</p>
                @endif

            
                <form method="POST" action="{{ route('verify2FA') }}">
                    @csrf
                    <div class="input-field mb-3">
                        <label for="one_time_password">{{ __('Enter the 6-digit code from your authenticator app') }}</label>
                        <input type="text" name="one_time_password" class="form-control" required>
                        @error('one_time_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Verify') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


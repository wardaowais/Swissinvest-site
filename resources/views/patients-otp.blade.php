@extends('home.layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-12">
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
<div class="box border-none" style="height: 300px; margin-top: 10%;"> 

<form id="verify-otp-form" method="POST" action="{{ route('patientOtpverify') }}">
    @csrf
    <div class="input-field">
        <p>{{translate('Enter OTP')}}</p>
        <input type="text" id="otp" name="otp" placeholder="{{translate('Enter the OTP')}}" required>
        <span><i class="fa-solid fa-circle-check"></i></span>
    </div>
    <div align="center"><button type="submit" class="btn btn-success">{{translate('Verify OTP')}}</button></div>
    
</form>

</div>
</div>
</div>
</div>

@endsection


@section('scripts')



@endsection
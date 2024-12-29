@extends('layouts.app')

@section('content')
<div class="my-dashboard">
    <div class="row d-flex justify-content-center">
        <div align="center" style="margin-top:5px">
            <div class="col-lg-12 col-md-8 col-12 mx-auto" align="center">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
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
                    
                    <div class="card-body">
                        <h6><img src="{{ asset('assets/frontend/images/logo.png') }}" height="90px" width="270px"></h6>
                        <!-- <p style="font-size:16px" class="text-warning">Hey Pal</p> -->
                        <p style="font-size: 12px;">{{translate('Please check your email and submit the document access OTP')}}</p>
                        <form method="POST" action="{{ route('verifyDocumentOtp') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter your OTP" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-warning">{{translate('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
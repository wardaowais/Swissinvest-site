@extends('layouts.app')

@section('content')
<div class="my-dashboard">
    <div class="main-content demo-content">
        <div class="marquee-area">
            <ul>
                <li><span>{{translate('Page Feature')}} :</span></li>
                <li>
                    <p>
                        <marquee behavior="" direction="">{{translate('Verified members can send large volumes of emails to their contacts through the Emails menu. This includes newsletters, appointment reminders, and promotional emails.')}}</marquee>
                    </p>
                </li>
            </ul>
        </div>
        <div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('userdashboard.sendEmails') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-field">
                    <label for="emails">{{translate('Enter Email Addresses (comma-separated)')}} :</label>
                    <textarea id="emails" name="emails" class="form-control" rows="5"></textarea>
                </div>
                <div class="input-field">
                    <label for="csv_file">{{translate('Or Upload CSV File')}} :</label>
                    <input type="file" id="csv_file" name="csv_file" class="form-control">
                </div>
                <div class="input-field">
                    <label for="subject">{{translate('Subject')}} :</label>
                    <input type="text" id="subject" name="subject" class="form-control" required>
                </div>
                <div class="input-field">
                    <label for="body">{{translate('Email Body')}} :</label>
                    <textarea id="body" name="body" class="form-control" rows="10" required></textarea>
                </div>
                <div align="center"> <button type="submit" class="btn btn-primary">{{translate('Send Emails')}}</button>
                </div>

            </form>
        </div>
<br>
        <div class="dash-ad">
            <div id="bannerSlider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" style="height: 200px; width:100%;">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#bannerSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{translate('Previous')}}</span>
                </a>
                <a class="carousel-control-next" href="#bannerSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{translate('Next')}}</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
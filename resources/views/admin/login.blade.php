@extends('home.layouts.app')
@section('content')
    <!-- content here -->
    <section class="ls-form">
        <div class="row a-center">
            <div class="col-sm-6"> 
                @if ($bottomBanner = getBannerByPosition('loginLeft'))
                @if ($bottomBanner['site_url'])
                    <a href="{{ $bottomBanner['site_url'] }}" target="_blank">
                        <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100" alt="Bottom Banner">
                    </a>
                @else
                    <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100 " alt="Bottom Banner">
                @endif
            @endif
            </div>
            <div class="col-sm-6">
                <div class="content">
                    <h4>{{ translate(getPageContent('login_url')) }}</h4>
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> -->
                    <form method="POST" action="{{ route('adminLoginCheck') }}" class="login100-form validate-form">
                        @csrf
                        <div class="input-field">
                            <p>{{ translate(getPageContent('register_filed8')) }}</p>
                            <input type="text" name="email" id="username" placeholder="{{ translate(getPageContent('username_placeholder')) }}" required="" aria-invalid="true" class="is-invalid" aria-describedby="username-error">
                         </div>
                        <!-- input field -->
                        <div class="input-field">
                            <p>{{ translate(getPageContent('register_filed9')) }}</p>
                            <input type="password" name="password" id="password" placeholder="{{ translate(getPageContent('password_placeholder')) }}" required="" aria-invalid="true" class="is-invalid" aria-describedby="password-error">
                         </div>
                        <!-- input field -->
                        <div class="check">
                            <input type="checkbox" checked>
                            <label for="">{{ translate(getPageContent('password_remember')) }}</label>
                        </div>
                        <button type="submit">{{ translate(getPageContent('submission_button')) }}</button>
                    </form>

                </div>
                <p align="center">{{ translate(getPageContent('account_not_exist')) }}<a href="{{ route('register') }}"> {{ translate(getPageContent('Register')) }}</a></p>
            </div>
        </div>
    </section>
@endsection

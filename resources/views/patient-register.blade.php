@extends('home.layouts.app')
@section('content')
    <style>
        .content {
            padding: 0;
            margin: 0;
        }

        .content img {
            display: block;
            width: 100%;
            margin: 0 auto;
        }

        .banner-container {
            height: 100px;
            /* or whatever height you want */
            overflow: hidden;
            /* to hide any overflowing content */
        }

        .banner-image {
            margin: 15px 0;
            height: 100px;
            /* fixed height */

            width: 100%;
            /* fills the width of the container */
        }
        .ls-form .content{
            max-width: 100% !important;
            margin: auto;
            padding: 20px;
        }
    </style>
    <section class="ls-form register">
        <div class="container-fluid">

            <div class="row gy-0 a-center">
                <div class="col-sm-6 mb-auto">
                    @if ($bottomBanner = getBannerByPosition('ptrLeft'))
                        @if ($bottomBanner['site_url'])
                            <a href="{{ $bottomBanner['site_url'] }}" target="_blank">
                                <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100" alt="Bottom Banner">
                            </a>
                        @else
                            <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100 " alt="Bottom Banner">
                        @endif
                    @endif
                </div>
                <div class="col-sm-6 ">
                    <div class="content">

                        <h4>{{ translate(getPageContent('Patient_Register')) }}</h4>

                        <form method="POST" action="{{ route('patientsRegistration') }}"
                            class="login100-form validate-form">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-success">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{ translate(getPageContent('register_filed1')) }}</p>
                                        <input type="text" name="first_name" id="username"
                                            placeholder="{{ translate(getPageContent('register_filed1')) }}"
                                            value="{{ $user->first_name ?? '' }}" required="">
                                    </div>
                                    <!-- input field -->
                                </div>
                                <div class="col-md-6">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{ translate(getPageContent('register_filed2')) }}</p>
                                        <input type="text" name="last_name" id="Familyname"
                                            placeholder="{{ translate(getPageContent('register_filed2')) }}"
                                            value="{{ $user->last_name ?? '' }}" required="" aria-invalid="true"
                                            class="is-invalid" aria-describedby="username-error">
                                    </div>
                                    <!-- input field -->
                                </div>
                                <div class="col-md-6">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{ translate(getPageContent('register_filed3')) }}</p>
                                        <input type="text" placeholder="{{ translate('+41XX XXX XX XX') }}"
                                            name="phone" value="{{ $user->phone ?? '' }}"
                                            pattern="^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$"
                                            title="Please enter the phone number in the format +41XX XXX XX XX" required>

                                    </div>
                                    <!-- input field -->
                                </div>
                                <div class="col-md-6">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{ translate(getPageContent('register_filed8')) }}</p>
                                        <input type="email" name="email" value="{{ $user->email ?? '' }}"
                                            id="username"
                                            placeholder="{{ translate(getPageContent('username_placeholder')) }}"
                                            required="">
                                    </div>
                                    <!-- input field -->
                                </div>
                                <div class="col-md-12">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{ translate(getPageContent('register_filed9')) }}</p>
                                        <input type="Password" name="password" id="Password" placeholder="********"
                                            required="">

                                    </div>
                                    <!-- input field -->
                                </div>
                            </div>
                            <!-- input field -->
                            <p style="font-size: 14px;">{{ translate(getPageContent('password_text')) }}</p>
                            <div class="check">
                                <input type="checkbox" checked>
                                <label for="">{{ translate(getPageContent('password_remember')) }}</label>
                            </div>
                            <button type="submit">{{ translate(getPageContent('submission_button')) }}</button>
                        </form>

                        <p align="center">{{ translate(getPageContent('account_existing')) }}<a
                                href="{{ route('login') }}"> {{ translate(getPageContent('login_url')) }}</a></p>
                        <h3 align="center">{{ translate('Our partners') }}</h3>
                        <div class="banner-container">
                            @if ($bottomBanner = getBannerByPosition('ptrBottom'))
                                @if ($bottomBanner['site_url'])
                                    <a href="{{ $bottomBanner['site_url'] }}" target="_blank">
                                        <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100 banner-image"
                                            alt="Bottom Banner" height="200px">
                                    </a>
                                @else
                                    <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100 banner-image"
                                        alt="Bottom Banner">
                                @endif
                            @endif
                        </div>
                        <br>
                        <div class="banner-container">
                            @if ($bottomBanner = getBannerByPosition('ptrBottom2'))
                                @if ($bottomBanner['site_url'])
                                    <a href="{{ $bottomBanner['site_url'] }}" target="_blank">
                                        <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100 banner-image"
                                            alt="Bottom Banner">
                                    </a>
                                @else
                                    <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100 banner-image"
                                        alt="Bottom Banner">
                                @endif
                            @endif
                        </div>
                        <br>
                        <div class="banner-container">
                            @if ($bottomBanner = getBannerByPosition('ptrBottom3'))
                                @if ($bottomBanner['site_url'])
                                    <a href="{{ $bottomBanner['site_url'] }}" target="_blank">
                                        <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100 banner-image"
                                            alt="Bottom Banner">
                                    </a>
                                @else
                                    <img src="{{ $bottomBanner['image_url'] }}" class="img-fluid w-100 banner-image"
                                        alt="Bottom Banner">
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelector('input[name="phone"]').addEventListener('input', function(e) {
            let value = e.target.value;

            // Remove any non-digit characters except '+'
            value = value.replace(/(?!^\+)\D/g, '');

            // Automatically convert leading 0 to +41
            if (value.startsWith('0') && value.length >= 10) {
                value = '+41' + value.slice(1);
            } else if (!value.startsWith('+41')) {
                value = '+41' + value;
            }

            // Format the phone number as +41XX XXX XX XX
            if (value.length > 3) {
                value = value.replace(/^(\+\d{2})(\d{2})(\d{0,3})(\d{0,2})(\d{0,2})/, '$1$2 $3 $4 $5');
            }

            // Ensure the value doesn't exceed the expected length
            e.target.value = value.slice(0, 16);

            // Validate the phone number format
            const regex = /^\+41\d{2} \d{3} \d{2} \d{2}$/;
            if (e.target.value !== '' && !regex.test(e.target.value)) {
                e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
            } else {
                e.target.setCustomValidity('');
            }
        });

        document.querySelector('input[name="phone"]').addEventListener('invalid', function(e) {
            if (e.target.value === '') {
                e.target.setCustomValidity('');
            }
        });
    </script>
@endsection

@extends('layouts.app')
@section('content')
    <div class="my-dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="dash-content">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('jobs.update', $jobs->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Job Category -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Job Category') }}:</p>
                                    <select id="cat_id" name="cat_id" class="form-control" required>
                                        <option value="" disabled>{{ translate('Select Category') }}</option>
                                        @foreach ($jobCategories as $category)
                                            <option value="{{ $category->id }}" {{ $jobs->cat_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Job Location -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('City') }}:</p>
                                    <select id="city_id" name="city_id" class="form-control" required>
                                        <option value="" disabled>{{ translate('Select Location') }}</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ $jobs->city_id == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Job Title -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Job Title') }}:</p>
                                    <input type="text" id="job_title" name="job_title" class="form-control" value="{{ $jobs->job_title }}" required>
                                </div>
                            </div>

                            <!-- Organization -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Organization') }}:</p>
                                    <input type="text" id="organization" name="organization" class="form-control" value="{{ $jobs->start_date }}" required>
                                </div>
                            </div>

                            <!-- Job Description -->
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <p>{{translate('Job description')}} <small class="text-danger">(*)</small></p>
                                    <textarea name="job_details" id="summernote" class="form-control" required>{{ $jobs->job_details }}</textarea>
                                </div>
                            </div>

                            <!-- Job Type -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Job Type') }}:</p>
                                    <select id="job_type" name="type" class="form-control" required>
                                        <option value="" disabled>{{translate('Select Job Type')}}</option>
                                        <option value="onsite" {{ $jobs->type == 'onsite' ? 'selected' : '' }}>{{translate('Onsite')}}</option>
                                        <option value="hybrid" {{ $jobs->type == 'hybrid' ? 'selected' : '' }}>{{translate('Hybrid')}}</option>
                                        <option value="remote" {{ $jobs->type == 'remote' ? 'selected' : '' }}>{{translate('Remote')}}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Job Contract -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Job Contract') }}:</p>
                                    <select id="job_contract" name="job_contract" class="form-control" required>
                                        <option value="" disabled>{{translate('Select Contract')}}</option>
                                        <option value="Fulltime" {{ $jobs->job_contract == 'Fulltime' ? 'selected' : '' }}>{{translate('Full Time')}}</option>
                                        <option value="Parttime" {{ $jobs->job_contract == 'Parttime' ? 'selected' : '' }}>{{translate('Part Time')}}</option>
                                        <option value="Contractual" {{ $jobs->job_contract == 'Contractual' ? 'selected' : '' }}>{{translate('Contractual')}}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Priority -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Priority') }}:</p>
                                    <select id="priority" name="priority" class="form-control" required>
                                        <option value="" disabled>{{translate('Select priority')}}</option>
                                        <option value="Urgent" {{ $jobs->priority == 'Urgent' ? 'selected' : '' }}>{{translate('Urgent')}}</option>
                                        <option value="Normal" {{ $jobs->priority == 'Normal' ? 'selected' : '' }}>{{translate('Normal')}}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Salary -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Salary range per year') }}:</p>
                                    <input type="text" id="salary" name="salary" class="form-control" value="{{ $jobs->salary }}" placeholder="100k-150k optional" required>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Address') }}:</p>
                                    <input type="text" name="address" class="form-control" value="{{ $jobs->address }}" placeholder="{{translate('Enter Organization address')}}">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Email') }}:</p>
                                    <input type="text" name="email" class="form-control" value="{{ $jobs->email }}" placeholder="{{translate('Enter contact email')}}">
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Phone') }}:</p>
                                    <input type="text" name="phone" class="form-control" value="{{ $jobs->phone }}" placeholder="{{translate('Enter a contact phone number')}}">
                                </div>
                            </div>

                            <!-- Office Opening -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('Office opening') }}:</p>
                                    <input type="text" name="opening_hour" class="form-control" value="{{ $jobs->opening_hour }}" placeholder="10:00 - 18:00, Mon - Sat">
                                </div>
                            </div>

                            <!-- End Date -->
                            <div class="col-sm-6">
                                <div class="input-field">
                                    <p>{{ translate('End Date') }}:</p>
                                    <input type="date" name="end_date" class="form-control" value="{{ $jobs->end_date }}">
                                </div>
                            </div>
                        </div>

                        <div align="center">
                            <button type="submit" class="btn btn-success">{{ translate('Update Job') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/') }}dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="{{ asset('panel_admin') }}/summernote/dist/summernote-lite.min.css">
@endsection

@section('script')
    <script src="{{ asset('/') }}dropify/dist/js/dropify.min.js"></script>
    <script src="{{ asset('panel_admin') }}/summernote/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });

            function uploadImage(file) {
                let data = new FormData();
                data.append("image", file);
                $.ajax({
                    url: '{{ route('summernote.upload') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response.data);
                        $('#summernote').summernote('insertImage', response.url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });
    </script>
@endsection

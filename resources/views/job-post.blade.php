@extends('layouts.app')
@section('content')
    <div class="main-content">
       
        <div class="my-dashboard">
        <div class="container-fluid">
<div class="marquee-area">
                  <ul>
                    <li><span>{{translate('Page Feature')}}:</span></li>
                    <li><p><marquee behavior="" direction="">{{translate('Post job to hire employees')}}</marquee></p></li>
                  </ul>
        </div>
        <div class="section_top_img">
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
        </div>
                <div class="row mb-4 mt-4">
                    <div class="col-md-12">
                        <!-- dash content -->
                        <div class="dash-content">
                            <!-- hading -->
                            @if (session('success'))
		                        <div class="alert alert-success">
		                            {{ session('success') }}
		                        </div>
		                    @endif
                            <div class="heading">
                                <h4>Create Job</h4>
                                <div class="books-dropdown">
                                 <button class="btn btn-danger" onclick="window.location.href='{{ route('jobList') }}'">
                                    JOB LISTINGS <i class="fa fa-angle-right text-white" aria-hidden="true"></i>
                                 </button>
                                  </div>
                            </div>
                            <!-- end heading -->
                			
                            <!-- booking list -->
                            <div class="booking-list" style="background: #E8F1F5;">
                                <!-- connect box -->
                                <div class="connect-box">
                                    <form id="create-job-form" style="background-color: transparent; padding: 0px;" action="{{ route('jobPosts.store') }}" method="POST">
                                    @csrf
                                        <div class="row mb-4">
                                            <div class="col-md-6" style="margin-bottom: 15px !important;"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Job Category') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <select class="create-job-dropdown" id="cat_id" name="cat_id" class="form-control" required>
                                                        <option value="" disabled selected>{{ translate('Select Category') }}</option>
				                                        @foreach ($jobCategories as $category)
				                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
				                                        @endforeach
                                                      </select>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('City') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <select class="create-job-dropdown" id="city_id" name="city_id" class="form-control" required>
                                                        <option value="" disabled selected>{{ translate('Select Location') }}</option>
				                                        @foreach ($cities as $city)
				                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
				                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-3"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Job Title') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <input type="text" id="job_title" name="job_title" placeholder="Designation" class="create-job-dropdown" required>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Organiztion') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <input class="create-job-dropdown" type="text" id="organization" name="organization"  placeholder="{{translate('Write your Organization name')}}" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        

                                        <div class="row mb-4">
                                            <div class="col-12 col-md-12 col-lg-12">
                                                <label for="job-description">{{translate('Job description')}} <small class="text-danger">(*)</small></label>
                                                <textarea class="textArea-content bg-white create-job-h-160" name="job_details" id="summernote" cols="30" rows="10" placeholder="{{translate('Write the job description')}}">
                                                </textarea>
                                              </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Job Type') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <select class="create-job-dropdown" id="job_type" name="type"  required>
                                                         <option value="" disabled selected>{{translate('Select Job Type')}}</option>
				                                        <option value="onsite">{{translate('Onsite')}}</option>
				                                        <option value="hybrid">{{translate('Hybrid')}}</option>
				                                        <option value="remote">{{translate('Remote')}}</option>
                                                      </select>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Job Contract') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <select class="create-job-dropdown" id="job_type" name="job_contract"  required>
                                                        <option value="" disabled selected>{{translate('Select Contract')}}</option>
				                                        <option value="Fulltime">{{translate('Full Time')}}</option>
				                                        <option value="Parttime">{{translate('Part Time')}}</option>
				                                        <option value="Contractual">{{translate('Contractual')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-3"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Priority') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <select class="create-job-dropdown" id="priority" name="priority"  required>
                                                        <option value="" disabled selected>{{translate('Select priority')}}</option>
				                                        <option value="Urgent">{{translate('Urgent')}}</option>
				                                        <option value="Normal">{{translate('Normal')}}</option>
                                                      </select>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Salary Range') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <input type="text" id="organization" name="salary" class="create-job-dropdown"
                                        placeholder="100k-150k optional" required>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-3"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Address') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                <input type="text" name="address" class="create-job-dropdown" placeholder="{{translate('Enter Organization address')}}">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Email') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <input type="text" name="email" placeholder="{{translate('Enter contact email')}}" class="create-job-dropdown">
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Phone') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <input type="text" name="phone" placeholder="{{translate('Enter a contact phone number')}}" class="create-job-dropdown">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('Office opening') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <input type="text" name="opening_hour" placeholder="10:00 - 18:00, Mon - Sat" class="create-job-dropdown">
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-6"> 
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-md-4 col-lg-4 col-form-label col-form-label-sm">{{ translate('End Date') }}:</label>
                                                <div class="col-sm-9 col-md-8 col-lg-8">
                                                    <input type="date" name="end_date" class="create-job-dropdown">
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12 text-right text-end"> 
                                                <button class="btn btn-danger" style="background: crimson;">Post Job</button>
                                            </div>
                                        </div>
                                      </form>
                                </div>
                                <!-- end connect box -->
                            </div>
                            <!-- end booking list -->
                        </div>
                        <!-- end dash content -->
                    </div>
                </div>
   
                <div class="section_top_img">
		            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
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

    <script>
        $("#summernote1").summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
        });
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
@endsection

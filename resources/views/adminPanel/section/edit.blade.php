@extends('layouts.app')
@section('title')
    Edit Section
@endsection
@section('content')

    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9">
        <!-- dash content -->
        <div class="dash-content">
            <div class="box border-none" style="padding-bottom: 0;">
                <ul class="fheading">
                    <li><h4>Edit Section</h4></li>
                    <li><a href="{{route('admin-section.index')}}"><button type="submit">Section List</button></a></li>
                </ul>
                <div class="container">
                    <form method="post" action="{{ route('admin-section.update', $section->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-field">
                                    <p>Section Header <small class="text-primary">(Optional)</small></p>
                                    <input type="text" name="title" value="{{ old('title', $section->title) }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-field">
                                    <p>Section Title <small class="text-primary">(Optional)</small></p>
                                    <input type="text" name="long_title" value="{{ old('long_title', $section->long_title) }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-field">
                                    <p>Section Description <small class="text-primary">(Optional)</small></p>
                                    <textarea name="description" cols="30" rows="10">{{ old('description', $section->description) }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="">
                                    <p>Image</p>
                                    <input type="file" name="image" class="dropify"
                                           data-default-file="{{ asset($section->image) }}">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="input-field select">
                                    <p>Status</p>
                                    <select name="status">
                                        <option value="1" {{ $section->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="2" {{ $section->status == 2 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end dash content -->
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('panel_admin/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('script')
    <script src="{{asset('panel_admin/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Upload Image',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happened.'
            }
        });
    </script>
@endsection

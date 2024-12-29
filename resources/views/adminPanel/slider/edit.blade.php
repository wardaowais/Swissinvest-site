@extends('layouts.app')
@section('title')
    Create Slider
@endsection
@section('content')
<style  type="text/css">
	.card-body
	{
		height : auto
	}
	.table .thead-dark th
	{
		background-color: #e8f1f6;
		color : #000;
		    border: 0px;
   
	}
</style>
<div class="my-dashboard">
   <br><Br>
   <div class="">
      <div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9 mt-1 p-1">
            <div class="= ">
               <!-- Slider Section (8 columns wide) -->
               <div class="col-md-12">
                  <div class="dash-content">
                     <form action="{{route('admin.slider.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$slider->id}}">
                        <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                        <div class="  card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;">
                           <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                              <span style="position: relative; top: 10px; left: 1pc">Edit Slider</span>
                           </h5>
                        </div>
                        
                           <div class="card-body">
                              <div class="col-sm-12">
                                    <div class="form-group">
                                        <p>Slider Title <small class="text-primary">(Optional)</small></p>
                                        <input type="text" name="title" value="{{ old('title', $slider->title) }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <div class="">
                                        <p>Slider Image</p>
                                        <div class="document_single" style="text-align:center;">
                                     <!-- Hidden file input -->
                                     <input type="file" name="image" id="fileInput" style="display: none;" onchange="previewImage(this)">
                                     
                                     <!-- Clickable area with image and text -->
                                     <div onclick="document.getElementById('fileInput').click()" 
                                          style="cursor: pointer; border: 1px solid #ddd; text-align: center; background: white; border-radius: 13px; padding: 20px;">
                                       <img src="{{ asset($slider->image) }}" id="previewImage" style="width: 8%;" alt="">
                                       <h5 id="uploadText" class="mt-3">Upload Image</h5>
                                     </div>
                                   </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <div class="form-group select">
                                        <p>Status</p>
                                        <select name="status"  class="form-control">
                                            <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="2" {{ $slider->status == 2 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-danger submit">Update</button>
                                    </div>
                                </div>
                           </div>
                        </div>
                        <!-- Submit Button Row -->
                        
                     </form>
                  </div>
               </div>
               <!-- Image Advertisement Section (4 columns wide) -->
               
            </div>
          
         </div>
    </div>
   </div>
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
                'error':   'Ooops, something wrong happended.'
            }
        });
    </script>
@endsection

@extends('layouts.app')
@section('title')
    About
@endsection
@section('content')
<style type="text/css">
	.dropify-wrapper
	{
		    border-radius: 13px;
	}
	.dropify-wrapper .dropify-message p
	{
		font-size: 1.25rem;
	    color: #000;
	    font-weight: 500;
	}
	 
	 .card-body
	 {
	 	height : auto;
	 }
	 .paid-ads-attachment
	 {
	 	background :#fff;
	 }
	 textarea
	 {
	 	 border-radius: 24px !important;
	 }
</style>
<div  class="my-dashboard">
   <br>
   <br>
   <div >
   <div class="row">
    @include('adminPanel.inc.middleSidebar')
	<div class="col-md-9 mt-1">
            <div class="row ">
               <!-- Slider Section (8 columns wide) -->
               <div class="col-md-12">
                  <div class="dash-content p-3">
                   <form action="{{route('storeOrUpdate.setting')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                     <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                      
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-body">
                                 <div class="col-sm-12 mt-4">
                                    <!-- New Password Input Group -->
                                    <div class="form-group">
                                       <p><b>About Header</b></p>
                                       <textarea type="text" rows="5" cols="5" class="form-control" name="about_header" value=""> {{ $row->about_header ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                       <p><b>About Image</b></p>
                                       
                                       <div class="image-upload paid-ads-attachment">
			                                <label for="file" class="file-upload-label" style="border: 0;background: transparent;">
			                                    <div class="file-upload-design">
			                                        <span><i class="fa-solid fa-cloud-arrow-up"></i></span>
			                                        <p class="text-center">Drag and Drop <br> or</p>
			                                        <span class="browse-button browse-btn">Browse Image File</span>
			                                    </div>
			                                    <input id="file" type="file" name="about_image" required="" style="display:none">
			                                </label>
			                            </div>
                                    </div>
                                 </div>
                                 <div class="" style="text-align: end;margin-top:20px">
                                    <div class="col-sm-12">
                                       <button type="submit" class="btn btn-primary" style="background: #E50F25;border:none">Submit</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Submit Button Row -->
                    
                  
                    <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                     
                       <div class="row">
                          <div class="col-md-12">
                             <div class="card-body">
                                <div class="col-sm-12 mt-4">
                                   <!-- New Password Input Group -->
                                   <div class="form-group">
                                      <p><b>About Paragraph :</b></p>
                                      <textarea type="text" rows="5" cols="5" class="form-control" name="about_description">{{ $row->about_description ?? '' }}</textarea>
                                   </div>
                                
                                </div>
                                <div class="" style="text-align: end;margin-top:20px">
                                    <div class="col-sm-12">
                                     <button type="button" class="btn btn-primary" style="background: #E50F25;border:none">Exit</button>
             
                                       <button type="submit" class="btn btn-danger" >Submit</button>
                                    </div>
                                 </div>
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
            <Br><Br>
        
         </div>
    
    </div>
    
    <div class="section_top_img col-12">
        <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
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

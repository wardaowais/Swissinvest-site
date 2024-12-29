@extends('layouts.app')
@section('title')
    Update Website Setting
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
	input[type="file"]
	{
		display: none;
	}
</style>
<div class="my-dashboard">
 <br><Br>
 <div class="">
    <div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9 p-1" style="margin-top: 10px">
         <div class="">
            <!-- Slider Section (8 columns wide) -->
            <div class="col-md-12">
            
               <div class="dash-content mx-3">
                  <form method="post" action="{{route('update.setting')}}" enctype="multipart/form-data">
                        @csrf
                     <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                        <div class=" mt-3 card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;margin-top: -10px !important;">
                           <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                              <span style="position: relative; top: 10px; left: 1pc">Settings</span>
                           </h5>
                        </div>
                        <div class="">
                           <div class="col-md-12">
                              <div class="card-body">
                                 <div class="col-sm-12 mt-2">
                                    <!-- New Password Input Group -->
                                    <div class="form-group">
                                       <p class="formtext"><b>Enter website name</b></p>
                                       <input type="text" class="form-control" name="name" value="{{$row->name ?? ""}}" required>

                                    </div>
                                    

                                    <div class="form-group">
                                        <p class="formtext"><b>Enter Website footer text</b></p>
                                        <input type="text" class="form-control" name="footer" placeholder="All Rights Reserved Powered by websiteowner" value="{{$row->footer ?? ""}}">
 
                                     </div>
                                 


                                   

                                     <div class="form-group">
                                        <p class="formtext"><b>Enter website Aurthor name</b></p>
                                        <input type="text" class="form-control" name="author" value="{{$row->author ?? "" }}">
 
                                     </div>
                                


                                     

                                     <div class="form-group">
                                        <p class="formtext"><b>Enter website URL</b></p>
                                        <input type="url" name="url" class="form-control" value="{{$row->url  ?? ""}}">
 
                                     </div>
                                  


                                     

                                     <div class="form-group">
                                        <p class="formtext"><b>Enter websiteKeyword</b></p>
                                        <input type="text" class="form-control" name="keywords" value="{{$row->keywords  ?? ""}}">
 
                                     </div>
                                   

                                     

                                     <div class="form-group">
                                        <p class="formtext"><b>Enter website Tags</b></p>
                                        <input type="text" class="form-control" name="tags" value="{{$row->tags  ?? ""}}">
 
                                     </div>
                                    


                                     


                                     <div class="form-group">
                                        <p class="formtext"><b>Enter website Google verification Code</b></p>
                                        <input type="text" class="form-control" name="google"  value="{{$row->google  ?? ""}}">
 
                                     </div>
                                    



                                    

                                     <div class="form-group">
                                        <p class="formtext"><b>Enter a short description</b></p>
                                       <textarea name="description" id="" cols="10" rows="5" class="form-control" placeholder="Write a short Description">{{$row->description  ?? ""}}</textarea>
 
                                     </div>
                                   

                                     

                                     <div class="form-group">
                                        <p class="formtext"><b>Enter contact header</b></p>
                                        <input type="text" class="form-control">
 
                                     </div>
                                    
										
                                    
                                 </div>
                                 <div class="row" style="padding: 1pc;">
                                  <div class="col-md-6">
		                              <p>Logo Image</p>


		                              <div class="document_single">
		                                   
				                                <input type="file" class="website_logo" name="website_logo" onchange="previewImage(this)">
				                                    <div style="border:1px solid black;text-align:center" class="click_image">
				                                        <br>
				                                        <img src="{{asset('assets/img/Upload to the Cloud.png')}}" style="width:16%" alt="">
				                                        <h6>Upload Image</h6>
				                                        <br><br>

				                                    </div>
				                            </div>
				                     </div>
		                            <div class="col-md-6">
			                              <p>Favicon Website Image</p>

			                              <div class="document_single">
			                                   
			                                <input type="file" name="fav_icon"  class="fav_icon"  onchange="previewImage(this)">
			                                    <div style="border:1px solid black;text-align:center" class="click_image2">
			                                        <br>
			                                        <img src="{{asset('assets/img/Upload to the Cloud.png')}}" style="width:16%" alt="">
			                                        <h6>Upload Image</h6>
			                                        <br><br>

			                                    </div>
			                            </div>   
			                         </div>
			                     </div>  
			                     <div class="row">
		                        	<div class="col-md-6">
						              <h4> Existing Logo Image</h4>
						              <img src="{{asset($row->website_logo ?? "")}}" class="img-fluid"  width="80px" height="80px">
						            </div>
						            <div class="col-md-6">  
						              <h4> Existing Favicon Image</h4>
						               <img src="{{asset($row->fav_icon ?? "")}}" alt="" width="80px" height="80px">
						             </div>
		                        </div>  
                                 <div class="row" style="text-align: end;margin-top:20px">
                                    <div class="col-sm-12">
                                       <button type="submit" class="btn btn-primary" style="background: #E50F25;border:none">Submit</button>
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
         </div>
      </div>
 
      <div class="section_top_img col-md-12">
         <img src="{{ asset('assets/doctor-panel/imgs/footer-banner.png') }}" alt="" class="img-fuild">
     </div>
</div>
</div>
</div>    
<script type="text/javascript">
	$('.click_image2').click(function(){
        	
        	$('.fav_icon').trigger('click');
        })
        $('.click_image').click(function(){
        	$('.website_logo').trigger('click');
        })
</script>
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


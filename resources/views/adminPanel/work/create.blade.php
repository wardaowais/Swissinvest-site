@extends('layouts.app')
@section('title')
    Create Working Hours
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
                     <form action="{{route('admin-work.store')}}" method="POST">
                        @csrf
                        <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                        <div class="  card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;">
                           <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                              <span style="position: relative; top: 10px; left: 1pc">Create Working Hours</span>
                           </h5>
                           <a href="" class="btn btn-danger" > Working Hours List</a>

                        </div>
                        
                           <div class="card-body">
                              <div class="col-sm-12">
                                    <div class="form-group">
                                        <p>Day <small class="text-danger">*</small></p>
                                        <input type="text" name="day"  placeholder="Day" id="weekday" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <div class="form-group">
                                      <p>Time <small class="text-danger">*</small></p>
                                      <input type="text" name="time"  placeholder="Time" class="form-control">
                                   </div>
                                    </div>
                                
                                <div class="col-sm-12 mb-2">
                                    <div class="form-group select">
                                        <p>Status</p>
                                        <select name="status"  class="form-control">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="">
                                    <div class="col-sm-12 text-right" style="margin-top:13.5pc">
                                        <button type="submit" class="btn btn-danger submit">Submit</button>
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
         
         <div class="section_top_img col-12">
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
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

@extends('layouts.app')
@section('title')
    Home Page Setting
@endsection
@section('content')
    <style>
        input[type=checkbox] {
            height: 0;
            width: 0;
            visibility: hidden;
        }

        label {
            cursor: pointer;
            text-indent: -9999px;
            width: 60px;  /* Adjusted width */
            height: 30px; /* Adjusted height */
            background: grey;
            display: block;
            border-radius: 30px; /* Adjusted border-radius */
            position: relative;
        }

        label:after {
            content: '';
            position: absolute;
            top: 3px; /* Adjusted position */
            left: 3px; /* Adjusted position */
            width: 24px;  /* Adjusted width */
            height: 24px; /* Adjusted height */
            background: #fff;
            border-radius: 24px; /* Adjusted border-radius */
            transition: 0.3s;
        }

        input:checked + label {
            background: #bada55;
        }

        input:checked + label:after {
            left: calc(100% - 3px);
            transform: translateX(-100%);
        }

        label:active:after {
            width: 34px; /* Adjusted width */
        }
    </style>
    <div class="my-dashboard">
    <div class="row">
    	<div class="col-md-12">
    		<div class="marquee-area books_fp">
	            <ul>
	                <li><span>Page Feature :</span></li>
	                <li>
	                    <p>
	                        <marquee behavior="" direction=""> Members can link their profile to other applications like
	                            Allomed (telemedicine) with a single click. All relevant data is
	                            transferred automatically,</marquee>
	                    </p>
	                </li>
	            </ul>
	        </div>
	        
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    	<br>
    		<h2 class="ml-3"><strong>Customize sections and settings</strong></h2>
    	</div>
    </div>
<div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9">
   		 
    	<div class="doc-profile choot_class p-5 mt-1">
    	<form action="{{route('storeOrUpdate.setting')}}" method="POST">
    	 @csrf
    		<div class="row">
    			<div class="col-md-6">
    				<div class="d-flex align-item-center justify-content-between">
    					<div>
    						<p><strong>Slider Section</strong></p>
    					</div>
    					<div class="d-flex">
    						<input type="hidden" name="slider_status" value="0">
                                            <input type="checkbox" id="switch5" name="slider_status" value="1" {{ isset($row) && $row->slider_status == 1 ? 'checked' : '' }}/><label for="switch5">Toggle</label>
    					</div>
    					
    				</div>
    				
    			</div>
    			<div class="col-md-6">
    				<div class="d-flex align-item-center justify-content-between">
    					<div>
    						<p><strong>About Section</strong></p>
    					</div>
    					<div class="d-flex">
    						 <input type="hidden" name="about_status" value="0">
                            <input type="checkbox" id="switch4" name="about_status" value="1" {{ isset($row) && $row->about_status == 1 ? 'checked' : '' }}/><label for="switch4">Toggle</label>
    					</div>
    					
    				</div>
    				
    			</div>
    		</div>
    		<div class="row mt-5">
    			<div class="col-md-6">
    				<div class="d-flex align-item-center justify-content-between">
    					<div>
    						<p><strong>Service Section</strong></p>
    					</div>
    					<div class="d-flex">
    						<input type="hidden" name="our_service_status" value="0">
                            <input type="checkbox" id="switch3" name="our_service_status" value="1" {{ isset($row) && $row->our_service_status == 1 ? 'checked' : '' }}/><label for="switch3">Toggle</label>
    					</div>
    					
    				</div>
    				
    			</div>
    			<div class="col-md-6">
    				<div class="d-flex align-item-center justify-content-between">
    					<div>
    						<p><strong>Working Hours Section</strong></p>
    					</div>
    					<div class="d-flex">
    						<input type="hidden" name="working_hours_status" value="0">
                                            <input type="checkbox" id="switch7" name="working_hours_status" value="1" {{ isset($row) && $row->working_hours_status == 1 ? 'checked' : '' }}/><label for="switch7">Toggle</label>
    					</div>
    					
    				</div>
    				
    			</div>
    		</div>
    		<div class="row mt-5">
    			<div class="col-md-6">
    				<div class="d-flex align-item-center justify-content-between">
    					<div>
    						<p><strong>Social media</strong></p>
    					</div>
    					<div class="d-flex">
    						<input type="hidden" name="social_status" value="0">
                                            <input type="checkbox" id="social_status" name="social_status" value="1" {{ isset($row) && $row->social_status == 1 ? 'checked' : '' }} /><label for="social_status">Toggle</label>
    					</div>
    					
    				</div>
    				
    			</div>
    			<div class="col-md-6">
    				<div class="d-flex align-item-center justify-content-between">
    					<div>
    						<p><strong>Create Section</strong></p>
    					</div>
    					<div class="d-flex">
    						 <input type="hidden" name="section_status" value="0">
                                            <input type="checkbox" id="section_status" name="section_status" value="1" {{ isset($row) && $row->section_status == 1 ? 'checked' : '' }} /><label for="section_status">Toggle</label>
    					</div>
    					
    				</div>
    				
    			</div>
    		</div>
    		<div class="row mt-5">
    			<div class="col-md-6">
    				<div class="d-flex align-item-center justify-content-between">
    					<div>
    						<p><strong>Blog Section</strong></p>
    					</div>
    					<div class="d-flex">
    						<input type="hidden" name="blog_header_status" value="0">
                                            <input type="checkbox" id="switch2" name="blog_header_status" value="1" {{ isset($row) && $row->blog_header_status == 1 ? 'checked' : '' }} /><label for="switch2">Toggle</label>
    					</div>
    					
    				</div>
    				
    			</div>
    			<div class="col-md-6">
    				<div class="d-flex align-item-center justify-content-between">
    					<div>
    						<p><strong>Contact Section</strong></p>
    					</div>
    					<div class="d-flex">
    						 <input type="hidden" name="contact_status" value="0">
                                            <input type="checkbox" name="contact_status"  id="switch1" value="1" {{ isset($row) && $row->contact_status == 1 ? 'checked' : '' }}  ><label for="switch1">Toggle</label>
    					</div>
    					
    				</div>
    				
    			</div>
    		</div>
    		<div class="row mt-5">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </div>
         </form>   
    	</div>
        
        <!-- end dash content -->
    </div>
</div>   
<div class="row">
	<div class="section_top_img col-md-12">
		<img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
	</div> 
</div>
</div>

@endsection

@extends('layouts.app')
@section('title')
    Service Section
@endsection
@section('content')
<style  type="text/css">

body{
   overflow-x:hidden; 
}
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
<div  class="my-dashboard">
   <br><Br>
   <div class="">
      <div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9 mt-1">
            <div class="row ">
               <!-- Slider Section (8 columns wide) -->
               <div class="col-md-12">
                  <div class="dash-content p-3">
                      <form action="{{route('storeOrUpdate.setting')}}" method="POST">
                        @csrf
                        <div class="card">
                           
                           <div class="card-body p-3">
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <p>After Name Mini Subtitle</p>
                                    <textarea name="our_service_header" rows="5" class="form-control">{{ $row->our_service_header ?? '' }}</textarea>
                                 </div>
                              </div>
                              <div class="col-sm-12 mt-4">
                                 <div class="form-group">
                                    <p>Header Paragraph</p>
                                    <textarea name="our_service_description" rows="5" class="form-control">{{ $row->our_service_description ?? '' }}</textarea>
                                 </div>
                              </div>
                              <div class="" style="margin-top: 20px; text-align: end;">
	                           <div class="col-sm-12 text-right">
	                              <button type="submit" class="btn btn-danger">Submit</button>
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
            <div class="dash-content p-3">
               <!-- Header Section -->
               
               <div class="d-flex justify-content-between align-items-center mb-4">
                  <h5 style="visibility: hidden">Create Slider</h5>
                  <a href="{{route('admin-services.create')}}" class="btn btn-danger">Create Service</a>
               </div>
               <!-- Slider Table -->
               <table class="table">
                  <thead class="thead-dark">
                     <tr>
                        <th class="col" scope="col">#</th>
                        <th class="col" scope="col">Title</th>
                        <th class="col" scope="col">Status</th>
                        <th class="col" scope="col">Action</th>
                        <th class="col" scope="col">Image</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        @foreach($services as $service)
                            <!-- start row -->
                            <tr>
                                <td class="col">{{ $loop->iteration }}</td>
                                
                                <td class="col">{{ $service->title }}</td>
                                <td class="col">
                                    @if($service->status == 1)
                                        <span class="badge bg-secondary">Active</span>
                                    @elseif($service->status == 2)
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="col">
                                    <a href="{{route('admin-services.edit', $service->id)}}" class="btn btn-sm btn-primary" style="color: white;">
                                        Edit
                                    </a>
                                    <a href="#"
                                       onclick="event.preventDefault();
                                           if (confirm('Are you sure you want to delete?'))
                                           document.getElementById('delete-form-{{ $service->id }}').submit();"
                                       class="text-white btn btn-sm btn-danger delete ms-2">
                                        Delete
                                    </a>

                                    <form id="delete-form-{{ $service->id }}" action="{{ route('admin-services.destroy', $service->id) }}" method="post" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                                <td class="col"><i class="{{ $service->icon }}" style="font-size: 50px;"></i></td>
                            </tr>
                        @endforeach
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
</div>
<div class="row">
   <div class="section_top_img col-md-12">
      <img src="{{ asset('assets/doctor-panel/imgs/slider-footer.png') }}" alt="" class="img-fuild">
   </div> 
</div>
</div>
</div>    
@endsection

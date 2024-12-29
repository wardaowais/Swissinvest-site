@extends('layouts.app')
@section('title')
   Working Hours Section
@endsection
@section('content')
<style type="text/css">
	.card-body
	{
		height : auto;
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

    <div class="col-md-9 mt-1">
    	
    
            <div class="row ">
               <!-- Slider Section (8 columns wide) -->
               <div class="col-md-12">
                  <div class="dash-content p-3">
                     <form action="{{route('storeOrUpdate.setting')}}" method="POST">
                        @csrf
                        <div class="card">
                           
                           <div class="card-body">
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <p>WORKING HOURS HEADER</p>
                                    <textarea name="working_hours" class="form-control" rows="5">{{ $row->working_hours ?? '' }}</textarea>
                                 </div>
                              </div>
                              <div class="col-sm-12 mt-4">
                                 <div class="form-group">
                                    <p>WORKING HOURS DESCRIPTION</p>
                                     <textarea name="working_hours_description" rows="5" class="form-control">{{ $row->working_hours_description ?? '' }}</textarea>
                                 </div>
                              </div>
                              <!-- Submit Button Row -->
		                        <div class="" style="margin-top: 20px;">
		                           <div class="col-sm-12 text-right">
		                              <button type="submit" class="btn btn-danger"   >Submit</button>
		                           </div>
		                        </div>
                           </div>
                           
                        </div>
                        
                     </form>
                  </div>
               </div>
               
            </div>
            <Br><Br>
            <div class="dash-content p-3">
               <!-- Header Section -->
               
               <div class="d-flex justify-content-between align-items-center mb-4">
                  <h5 style="visibility: hidden">Create Slider</h5>
                  <a href="{{route('admin-work.create')}}" class="btn btn-danger">Creating Working Hours</a>
               </div>
               <!-- Slider Table -->
               <table class="table">
                  <thead class="thead-dark">
                     <tr>
                        <th class="col" scope="col">#</th>
                        <th class="col" scope="col">DAY</th>
                        <th class="col" scope="col">TIME</th>
                        <th class="col" scope="col">STATUS</th>
                        
                        <th class="col" scope="col">ACTION</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($works as $row)
                     <tr>
                        <td class="col">{{$loop->iteration}}</td>
                        <td class="col">{{$row->day}}</td>
                        <td class="col">{{$row->time}}</td>
                        <td class="col">
                            @if($row->status == 1)
                                <span class="badge bg-success">Active</span>
                            @elseif($row->status == 2)
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="col">
                            <a href="{{route('admin-work.edit', $row->id)}}" class="btn btn-sm btn-primary" style="color: white;">
                                Edit
                            </a>
                            <a href="#"
                               onclick="event.preventDefault();
                                   if (confirm('Are you sure you want to delete?'))
                                   document.getElementById('delete-form-{{ $row->id }}').submit();"
                               class="text-white btn btn-sm btn-danger delete ms-2">
                                Delete
                            </a>

                            <form id="delete-form-{{ $row->id }}" action="{{ route('admin-work.destroy', $row->id) }}" method="post" style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    
                     </tr>
                   @endforeach  
                  </tbody>
               </table>
            </div>
         </div>
         
         <div class="section_top_img col-12">
	        <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
	    </div>
</div>
   </div>
</div>       
@endsection

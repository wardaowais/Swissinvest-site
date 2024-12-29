@extends('layouts.app')
@section('title')
    Blog Section
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

    <div class="col-md-9 mt-2">
            <div class="row ">
               <!-- Slider Section (8 columns wide) -->
               <div class="col-md-12">
                  <div class="dash-content">
                  <form action="{{route('storeOrUpdate.setting')}}" method="POST">
                  @csrf
                     <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                        <div class="  card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;">
                           <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                              <span style="position: relative; top: 10px; left: 1pc">Main Blog Section</span>
                           </h5>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-body">
                                 <div class="col-sm-12 mt-4">
                                    <!-- New Password Input Group -->
                                    <div class="form-group">
                                       <p><b>Blog Header</b></p>
                                       <textarea type="text" rows="5" cols="5" class="form-control" name="blog_header">{{ $row->blog_header ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                       <p><b>Blog Header</b></p>
                                       <textarea type="text" rows="5" cols="5" class="form-control" name="blog_description">{{ $row->blog_description ?? '' }}</textarea>
                                    </div>
                                 </div>
                                 <div class="" style="text-align: end;margin-top:6.5pc">
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
   </div>
  </div>
  
</div> 
<div class="container-fluid"><div class="row">
   <div class="col-md-12 ">
      <div class="dash-content " style="    background: #E8F1F5;border-radius: 12px;">
         <!-- Header Section -->
         <div class="card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;margin-top:-10px">
             <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                 <span style="position: relative; top: 10px; left: 1pc">Create blog</span>
             </h5>
             <a type="button" class="btn btn-secondary" href="{{route('blog.create')}}" style="background: #EB3C3C;position: relative; left: -1pc;border:none">Create blog </a>
         </div>
        
         <!-- Slider Table -->
         <div class="newwbg " style="background:transparent;border-radius:12px;padding:1pc">
         <table class="table "  >
            <thead class="thead-dark">
               <tr >
                 <th class="col" scope="col">#</th>
                 <th class="col" scope="col">NAME</th>
                 <th class="col" scope="col">STATUS</th>
                 <th class="col" scope="col">Description</th>
                 <th class="col" scope="col">IMAGE</th>

                 <th class="col" scope="col">ACTION</th>
               </tr>
            </thead>
            <tbody>
              @foreach($blogs as $row)
                  <tr>
                     <td class="col">{{$loop->iteration}}</td>
                     <td class="col">{{\Illuminate\Support\Str::limit($row->name,20)}}</td>
                     <td class="col">
                         @if($row->status == 1)
                            <span class="badge bg-secondary">Active</span>
                        @elseif($row->status == 2)
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                     </td>
                     <td class="col">
                        {{\Illuminate\Support\Str::limit($row->description,20)}}
                       
                     </td>
                     <td class="col">
                        <img src="{{asset($row->image)}}" alt="" class="img-fluid w-50">
                       
                     </td>
                     <td class="col" style="    text-align: -webkit-right;">
                        <div class="action-btn">
                             <a style="color: white;" href="{{route('blog.edit',$row->id)}}" class="btn btn-sm btn-primary">
                                 Edit
                             </a>
                             <a href="#"
                                onclick="event.preventDefault();
                                    if (confirm('Are you sure you want to delete?'))
                                    document.getElementById('delete-form-{{ $row->id }}').submit();"
                                class="btn btn-sm btn-danger text-white delete ms-2">
                                 Delete
                             </a>

                             <form id="delete-form-{{ $row->id }}" action="{{ route('blog.delete', $row->id) }}" method="get" style="display: none;">
                                 @csrf
                             </form>

                         </div>
                     </td>
                     
                   
                 
                  </tr>
                @endforeach 
            </tbody>
         </table>
         <!-- Pagination buttons -->
         <div class="row mt-5">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <button class="btn btn-outline-secondary" style="color: black; border: 1px solid black;" disabled>Previous</button>
            </div>
            <div class="col-md-6 ">
                <button class="btn" style="background: #EB3C3C; color: white;float:inline-end" disabled>Next</button>
            </div>
        </div>
        
         </div>
         <br>
      </div></div></div>

<div class="row">
   <div class="section_top_img col-md-12">
      <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
   </div> 
</div>
</div>   
@endsection

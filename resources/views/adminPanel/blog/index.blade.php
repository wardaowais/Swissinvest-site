@extends('layouts.app')
@section('title')
    Blogs
@endsection
@section('content')
<div id="content">
   <br><Br>
   <div class="container-fluid px-md-5">
      <div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9 mt-5 shadow p-1">
            <div class="row ">
               <!-- Slider Section (8 columns wide) -->
               <div class="dash-content " style="    background: #E8F1F5;padding: 1pc;border-radius: 12px;">
            <!-- Header Section -->
            <div class="card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;margin-top:">
                <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                    <span style="position: relative; top: 10px; left: 1pc">Create blog</span>
                </h5>
                <a type="button" class="btn btn-secondary" href="{{route('blog.create')}}" style="background: #EB3C3C;position: relative; left: -1pc;border:none">Create blog </a>
            </div>
           
            <!-- Slider Table -->
            <div class="newwbg mt-5" style="background:#F8F8F8;border-radius:12px;padding:1pc">
            <table class="table mt-4"  >
               <thead class="thead-dark">
                  <tr >
                    <th class="col" scope="col">#</th>
                    <th class="col" scope="col">NAME</th>
                    <th class="col" scope="col">STATUS</th>
                    <th class="col" scope="col">ACTION</th>
                    <th class="col" scope="col">IMAGE</th>
                    <th class="col" scope="col">Description</th>
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
                        <td class="col">
                           <img src="{{asset($row->image)}}" alt="" class="img-fluid w-50">
                          
                        </td>
                        <td class="col">
                            {{\Illuminate\Support\Str::limit($row->description,20)}}
                           
                         </td>
                    
                     </tr>
                   @endforeach 
               </tbody>
            </table>
            <!-- Pagination buttons -->
            
            </div>
            <br>
         </div>
</div>
</div>
</div>  
</div>
</div>  
@endsection


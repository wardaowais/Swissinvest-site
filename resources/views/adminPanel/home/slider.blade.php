@extends('layouts.app')
@section('title')
    Slider Section
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

    <div class="col-md-9 mt-1">
            <div class="= ">
               <!-- Slider Section (8 columns wide) -->
               <div class="col-md-12">
                  <div class="dash-content">
                     <form action="{{route('storeOrUpdate.setting')}}" method="POST">
                        @csrf
                        <div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                        <div class="  card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;">
                           <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                              <span style="position: relative; top: 10px; left: 1pc">Main Slider Section</span>
                           </h5>
                        </div>
                        
                           <div class="card-body">
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <p>After Name Mini Subtitle</p>
                                    <textarea  name="mini_upper_subtitle" class="form-control" rows="5" value="">{{ $row->mini_upper_subtitle ?? '' }}</textarea>
                                 </div>
                              </div>
                              <div class="col-sm-12 mt-4">
                                 <div class="form-group">
                                    <p>Header Paragraph</p>
                                    <textarea name="header_paragraph" class="form-control" rows="5">{{ $row->header_paragraph ?? '' }}</textarea>
                                 </div>
                              </div>
                              <div class="" style="margin-top: 20px; text-align: end;">
		                           <div class="col-sm-12">
		                              <button type="submit" class="btn btn-danger" >Submit</button>
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
             <div class="col-md-12 mt-5">
            <div class="dash-content p-3" style="    background: #E8F1F5;padding: 1pc;border-radius: 12px;">
               <!-- Header Section -->
               <div class="card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc">
                <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                    <span style="position: relative; top: 10px; left: 1pc">Create Slider</span>
                </h5>
                <a type="button" class="btn btn-secondary" href="{{route('admin-slider.create')}}" style="background: #EB3C3C;position: relative; left: -1pc;border:none">Create Slider </a>
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
                  	 @foreach($slider as $row)
                     <tr>
                        <td class="col">{{$loop->iteration}}</td>
                        <td class="col">{{$row->title}}</td>
                        <td class="col" style="    text-align: -webkit-right;">
                           <!-- Toggle Switch for Status -->
                           <input type="checkbox" style="    position: absolute;" id="switch2" name="blog_header_status" value="1" checked=""><label for="switch2"></label>
                        </td>
                        <td class="col">
                           <!-- Action Buttons -->
                           <a href="{{route('admin-slider.edit', $row->id)}}" class="btn btn-success btn-sm" >
                                Edit
                            </a>
                            <a href="#"
                               onclick="event.preventDefault();
                                   if (confirm('Are you sure you want to delete?'))
                                   document.getElementById('delete-form-{{ $row->id }}').submit();"
                               class="btn btn-danger btn-sm delete">
                                Delete
                            </a>

                            <form id="delete-form-{{ $row->id }}" action="{{ route('admin-slider.destroy', $row->id) }}" method="post" style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                           
                        </td>
                        <td class="col">
                           <!-- Image -->
                           <img  src="{{asset($row->image)}}"  alt="Slider Image" class="img-fluid rounded-circle" width="50">
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            </div>
         </div>
    </div>
   </div>
   <div class="row">
      <div class="section_top_img col-md-12">
         <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
      </div> 
   </div>
</div>    
@endsection

@extends('layouts.app')
@section('title')
    Messages
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
	.card-body p
	{
		margin-bottom: 5px;
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
                  <div class="dash-content px-3">
                     <form action="{{route('storeOrUpdate.setting')}}" method="POST">
                        @csrf
                        <div class="">
							<div class="card" style="background: #E8F1F5; border:none; border-radius:10px">
                        <div class="  card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;">
                           <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                              <span style="position: relative; top: 10px; left: 1pc"> Main Contact Section</span>
                           </h5>
                        </div>
                           
                                <div class="card-body">

                                    <div class="row">


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <p>Contact Header</p>
                                                <input type="text" class="form-control" name="contact_header" value="{{ $row->contact_header ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <p>Contact Description</p>
                                                <textarea name="contact_description" rows="3" class="form-control">{{ $row->contact_description ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <p>Mobile Header</p>
                                                <input type="text" name="mobile_header" class="form-control" value="{{ $row->mobile_header ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <p>Mobile</p>
                                                <input type="text" name="mobile" class="form-control" value="{{ $row->mobile ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <p>Email Header</p>
                                                <input type="text" name="email_header" class="form-control" value="{{ $row->email_header ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <p>Email</p>
                                                <input type="email" name="email" class="form-control" value="{{ $row->email ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <p>Address Header</p>
                                                <input type="text" name="address_header" class="form-control" value="{{ $row->address_header ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <p>Address</p>
                                                <input type="text" class="form-control" name="address" value="{{ $row->address ?? '' }}">
                                            </div>
                                        </div>
                                        
				                            <div class="col-md-12 text-right mt-4">
				                                <button type="submit" class="btn btn-danger">Submit</button>
				                            </div>
				                        
                                    </div>

                                </div>
                            </div>

                        </div>


                        
                    </form>
                  </div>
               </div>
               <!-- Image Advertisement Section (4 columns wide) -->
               
            </div>
            <Br><Br>
            <div class="dash-content shadow">
            	<div class="card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc">
                <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                    <span style="position: relative; top: 10px; left: 1pc">Contact Detail</span>
                </h5>
                
            </div>
             
             
               <!-- Slider Table -->
               <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th class="col" scope="col">#</th>
                    <th class="col" scope="col">NAME</th>
                    <th class="col" scope="col">SUBJECT</th>
                    <th class="col" scope="col">MESSAGES</th>
                    <th class="col" scope="col">DATE</th>
                    <th class="col" scope="col">EMAIL</th>
                    <th class="col" scope="col">STATUS</th>
                    <th class="col" scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach($message as $row)
                            <!-- start row -->
                        <tr>
                            <td class="col">{{$loop->iteration}}</td>
                            <td class="col">{{\Illuminate\Support\Str::limit($row->name,20)}}</td>
                            
                            <td class="col">{{\Illuminate\Support\Str::limit($row->subject,20)}}</td>
                            <td class="col">{{\Illuminate\Support\Str::limit($row->message,20)}}</td>
                            <td class="col">{{$row->created_at->format('d M Y')}}</td>
                            <td class="col">{{\Illuminate\Support\Str::limit($row->email,20)}}</td>
                            <td class="col">
                                @if($row->status == 1)
                                    <span class="badge bg-secondary">Active</span>
                                @elseif($row->status == 2)
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="col">
                                <div class="action-btn">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}">
                                        View
                                    </button>
                                    <a href="#"
                                       onclick="event.preventDefault();
                                           if (confirm('Are you sure you want to delete?'))
                                           document.getElementById('delete-form-{{ $row->id }}').submit();"
                                       class="btn btn-sm btn-danger text-white delete ms-2">
                                        Delete
                                    </a>

                                    <form id="delete-form-{{ $row->id }}" action="{{ route('contact.message.delete', $row->id) }}" method="get" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </td>
                        </tr>
                        <!-- end row -->
                    @endforeach
                  </tr>
                </tbody>
              </table>
              
              <!-- Pagination buttons -->
              <br><br><br><Br>

              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="">
                        <button class="btn btn-outline-secondary" style="color:black" disabled="">Previous</button>
                      </div>
                </div>
                <div class="col-md-5">
                    <div class=""  style="float: inline-end;">
                        <button disabled="" class="btn" style="background: #009688;color:white">Next</button>
                      </div>
                </div>
                <div class="col-md-1"></div>


              </div>
              <br>
            </div>
         </div>

    @foreach($message as $row)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Message Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-responsive table-bordered">
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{$row->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$row->email}}</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td>{{$row->subject}}</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td>{{$row->message}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
  </div>
 </div>
 <div class="row">
    <div class="section_top_img col-md-12">
       <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
    </div> 
 </div>
</div>    
@endsection


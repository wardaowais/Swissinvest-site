@extends('layouts.app')
@section('title')
    Messages
@endsection
@section('content')
<div id="content">
   <br><Br>
   <div class="container-fluid px-md-5">
      <div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9 mt-5 shadow p-1">
           
            <Br><Br>
            <div class="dash-content shadow">
               <!-- Header Section -->
               <div class="d-flex justify-content-between align-items-center mb-4" style="background-color:#141B29">
                  <h5 style="    color: white;
                     padding: 1pc;">Contact Detail</h5>
                  {{-- <button class="btn btn-primary">Create Slider</button> --}}
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
</div>    
@endsection


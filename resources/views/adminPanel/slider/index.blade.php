@extends('layouts.app')
@section('title')
Sliders
@endsection
@section('content')
<div id="content">
   <br><Br>
   <div class="container-fluid px-md-5">
      <div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9 shadow">
        <!-- dash content -->
        <div class="dash-content shadow">

            <div class="dash-content shadow">
               <!-- Header Section -->
               <div class="d-flex justify-content-between align-items-center mb-4" style="background-color:#141B29">
                  <h5 style="    color: white;
                     padding: 1pc;">Create Slider</h5>
                  {{-- <button class="btn btn-primary">Create Slider</button> --}}
               </div>
               <div class="d-flex justify-content-between align-items-center mb-4">
                  <h5 style="visibility: hidden">Create Slider</h5>
                  <a href="{{route('admin-slider.create')}}" class="btn btn-primary" style="background: #005E9E">Create Slider</a>
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
        <!-- end dash content -->
    </div>
</div>
</div>
</div>    
@endsection


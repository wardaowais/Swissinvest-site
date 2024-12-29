@extends('layouts.app')
@section('title','Services')
@section('content')
<div id="content">
   <br><Br>
   <div class="container-fluid px-md-5">
      <div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9  mt-5 shadow p-1"">
        <!-- dash content -->
        <div class="dash-content shadow">
               <!-- Header Section -->
               <div class="d-flex justify-content-between align-items-center mb-4" style="background-color:#141B29">
                  <h5 style="    color: white;
                     padding: 1pc;">Create Slider</h5>
                  {{-- <button class="btn btn-primary">Create Slider</button> --}}
               </div>
               <div class="d-flex justify-content-between align-items-center mb-4">
                  <h5 style="visibility: hidden">Create Slider</h5>
                  <a href="{{route('admin-services.create')}}" class="btn btn-primary" style="background: #005E9E">Create Slider</a>
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
        <!-- end dash content -->
    </div>
   </div>
  </div>
</div>    
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('homePage')}}/assets/css/mobiriseicons.css">
@endsection
@section('script')
    <link rel="stylesheet" type="text/css" href="{{asset('homePage')}}/assets/css/mobiriseicons.css">
@endsection



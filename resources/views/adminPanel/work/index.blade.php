@extends('layouts.app')
@section('title','Working Hours')
@section('content')
<div id="content">
   <br><Br>
   <div class="container-fluid px-md-5">
   <div class="row">
    @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9  mt-5 shadow p-1">
        <!-- dash content -->
        <div class="dash-content shadow">
               <!-- Header Section -->
               <div class="d-flex justify-content-between align-items-center mb-4" style="background-color:#141B29">
                  <h5 style="    color: white;
                     padding: 1pc;">Create Working Hours</h5>
                  {{-- <button class="btn btn-primary">Create Slider</button> --}}
               </div>
               <div class="d-flex justify-content-between align-items-center mb-4">
                  <h5 style="visibility: hidden">Create Slider</h5>
                  <a href="{{route('admin-work.create')}}" class="btn btn-primary" style="background: #005E9E">Creating Working Hours</a>
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
        <!-- end dash content -->
    </div>
    </div>
  </div>
</div>    
@endsection



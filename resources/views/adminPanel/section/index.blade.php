@extends('layouts.app')
@section('title')
    Section
@endsection
@section('content')

    @include('adminPanel.inc.middleSidebar')


        <div class="col-md-9">
        <!-- dash content -->
        <div class="dash-content">

            <div class="dash-content">
                <div class="dash-ad">
                    <img src="imgs/ad-big.png" alt="">
                </div>
                <!-- reviews table -->
                <div class="booking-list">
                    <ul class="fheading">
                        <li><h4>Sections </h4></li>
                        <li><a href="{{route('admin-section.create')}}"><button type="submit">Create Section</button></a></li>
                    </ul>
                    <!-- table -->
                    <table class="rev-table">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Image</td>
                            <td>Section Header</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td width="250"><img src="{{asset($row->image)}}" alt="" class="img-fluid w-50"></td>
                                <td>{{$row->title}}</td>
                                <td>
                                    @if($row->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @elseif($row->status == 2)
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin-section.edit', $row->id)}}" class="btn btn-sm btn-primary" style="color: white;">
                                        Edit
                                    </a>
                                    <a href="#"
                                       onclick="event.preventDefault();
                                           if (confirm('Are you sure you want to delete?'))
                                           document.getElementById('delete-form-{{ $row->id }}').submit();"
                                       class="text-white btn btn-sm btn-danger delete ms-2">
                                        Delete
                                    </a>

                                    <form id="delete-form-{{ $row->id }}" action="{{ route('admin-section.destroy', $row->id) }}" method="post" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->

                    <!-- pagi -->
                    <div class="pagi">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Showing Results : {{ $sections->firstItem() }} to {{ $sections->lastItem() }} out of {{ $sections->total() }}</h6>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    @if ($sections->onFirstPage())
                                        <li><button disabled>previous</button></li>
                                    @else
                                        <li><a href="{{ $sections->previousPageUrl() }}"><button>previous</button></a></li>
                                    @endif
                                    <li>{{ $sections->currentPage() }}</li>
                                    @if ($sections->hasMorePages())
                                        <li><a href="{{ $sections->nextPageUrl() }}"><button>next</button></a></li>
                                    @else
                                        <li><button disabled>next</button></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end pagi -->


                </div>
                <!-- end reviews table -->
            </div>
        </div>
        <!-- end dash content -->
    </div>

    
@endsection


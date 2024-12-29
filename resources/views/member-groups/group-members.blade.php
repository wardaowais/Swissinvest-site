@extends('layouts.app')

@section('content')


<div class="main-content">
       
        <div class="my-dashboard">
        <div class="container-fluid">
<div class="marquee-area">
                  <ul>
                    <li><span>Page Feature :</span></li>
                    <li><p><marquee behavior="" direction=""> Members can link their profile to other applications like
                                                Allomed (telemedicine) with a single click. All relevant data is
                                                transferred automatically,</marquee></p></li>
                  </ul>
        </div>
        <div class="row">
        	<div class="section_top_img col-12">
	            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/main.png') }}" alt="" class="img-fuild">
	        </div>
        </div>
        
                <div class="row mb-4 mt-4">
                    <div class="col-md-12">
                        <!-- dash content -->
                        <div class="dash-content">
                            <!-- hading -->
                            <div class="heading">
                                <h4>Group Members</h4>
                            </div>
                            <!-- end heading -->
                
                            <!-- booking list -->
                            <div class="booking-list mt-4" style="background: #E8F1F5;">
                                <!-- connect box -->
                                <div class="connect-box">
                                    <!-- <form id="group-member-form" style="background-color: transparent; padding: 0px;"> -->
                
                                      <!-- </form> -->
                                      <div class="row mb-2">
                                           <div class="col-12 col-md-5 col-lg-5"> 
                                                <div class="input-search">
                                                    <input type="text" class="member-group-input" placeholder="Search Member Here" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <i class="fa fa-search member-search-icon" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="col"> 
                                                <div class="member-btn">
                                                    <a href="{{route('createGroupmember')}}" class="btn btn-danger" style="background: crimson; padding: 13px;">Add New Member</a>
                                                </div>
                                            </div>
                                      </div>
									  @if(session('success'))
									    <div class="alert alert-success">
									        {{ session('success') }}
									    </div>
									    @endif
									    
									    

									    @if($members->isEmpty())
									        <p>No members found.</p>
									    @else
                                      <div class="row mb-2">
                                        @foreach($members as $member)
                                        <div class="col-lg-6 col-md-6 mb-2">
                                            <div class="sync_cards">
                                                <div class="member-content p-3">
                                                    <div class="d-flex">
                                                        <div class="memeber-img">
                                                            @if($member->profile_pic)
												            <img src="{{ asset('images/users/' . $member->profile_pic) }}" class="rounded-img img-fluid">
												            @else
												            <img src="{{ asset('assets/img/profile-img.jpg') }}" class="rounded-img">
												            @endif
                                                        </div>
                                                        <div class="member-text">
                                                            <h5>{{ $member->first_name }} {{ $member->last_name }}</h5>
                                                           <span class="d-flex align-items-baseline">
                                                                <i class="fa fa-at" aria-hidden="true"></i>
                                                                <p class="member-padding">{{ $member->email }}</p>
                                                          </span> 
                                                           <span class="d-flex align-items-baseline">
                                                                <i class="fa fa-phone phone" aria-hidden="true"></i>
                                                                <p class="member-padding">{{ $member->phone }}</p>
                                                           </span>
                                                        </div> 
                                                    </div>
                                               
                                                    <div class="member-dropdown">
                                                   
                                                        <div class="dropdown ">
								                            <button class="btn btn-secondary dropdown-toggle member-category" type="button" id="actionDropdown" data-toggle="dropdown" aria-expanded="false">
								                                Actions
								                            </button>
								                            <ul class="dropdown-menu" aria-labelledby="actionDropdown">
								                                <!-- View Details -->
								                                <li><a class="dropdown-item" href="{{ route('group.user.edit', encrypt($member->id)) }}">{{translate('Edit Details')}}</a></li>
								                                <!-- Update Member Profile -->
								                                <li><a class="dropdown-item" href="{{ route('group.user.details', encrypt($member->id)) }}">{{translate('View Details')}}</a></li>
								                                <!-- Remove Member Profile -->
								                                <li>
								                                    <form action="{{ route('group.user.remove', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this member?');">
								                                        @csrf
								                                        @method('DELETE')
								                                        <button type="submit" class="dropdown-item  member-category ">Remove Member Profile</button>
								                                    </form>
								                                </li>
								                            </ul>
								                        </div>
                                                      </div>     
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                      </div>
										@endif
                                </div>
                                <!-- end connect box -->
                            </div>
                            <!-- end booking list -->
                        </div>
                        <!-- end dash content -->
                    </div>
                </div>
                <div class="row">
	   				<div class="section_top_img col-12">
			            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
			        </div>
		        </div>
                
             </div>
       
    </div>
</div>
@endsection

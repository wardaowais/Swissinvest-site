
@extends('layouts.app')

@section('content')
<style>
    .my-dashboard .connect-box .sync_cards
	{
		    
		    border-radius: 24px;
		    padding: 0px;
	}

    .ads-img{
            width: 100% !important;
         }

         .ads-img {
    width: 100%;
    height: 357px;
    border:none !important;
    border-radius: 24px;
}

.social-icon {
    font-size: 1.5rem; /* Adjust font size as needed */
    margin-right: 15px; /* Adds 15px gap between icons */
}

.social-icon .fa-facebook-f {
    color: #1877F2; /* Facebook blue */
}

.social-icon .fa-instagram {
    color: #E4405F; /* Instagram pink */
}

.social-icon .fa-twitter {
    color: #1DA1F2; /* Twitter blue */
}


.my-dashboard .connect-box .sync_cards .content {
    text-align: center !important;
}


    @media only screen and (max-width:768px){
         .ads-img{
            width: 100% !important;
         }
    }
    a:hover {
    color: #0056b3;
    text-decoration: none;
}
p {
    font-size: 16px;
}
 </style>   
<div class="my-dashboard"> 
<div class="marquee-area">
                  <ul>
                    <li><span>{{translate('Page Feature')}}:</span></li>
                    <li><p><marquee behavior="" direction="">{{translate('Admins can add links to important resources such as
                                                hospitals, telemedicine services, political action committees,
                                                ambulance services, and care agencies. These links are displayed in
                                                the Useful Links menu.')}}</marquee></p></li>
                  </ul>
        </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- dash content -->
                         <div class="dash-content">
                            <div class="booking-list parter-list-page" style="background: #E8F1F5;">
                                <h5>{{ translate('Connect') }}!</h5>
                                <!-- connect box -->
                                <div class="connect-box">
                                    <div class="row">
                                  
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="sync_cards" style="background:  #F8F8F8;">
                                                    <div class="content">
                                                        <img src="https://doctomed.ch/images/apps/1719026273_66764261460dd.png"
                                                            style="height: 150px; width:150px;object-fit: contain;">
                                                        <h6><b style="color: #009688;">All Med-ch</b> <span> Available </span>
                                                        </h6>
                                                        <a href="#" class="btn btn-danger">Connect/Sync</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="sync_cards">
                                                    <div class="content p-0">
                                                        <img  src="{{ asset('assets/doctor-panel/imgs/dashboard/2.png') }}"
                                                            class="ads-img" >
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        
        
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="sync_cards" style="background:  #F8F8F8;">
                                                <div class="content">
                                                    <img src="{{asset("assets/doctor-panel/imgs/fb70217cbfd29e3d77bf8844383545fa.png")}}"
                                                        style="height: 150px; width:150px;object-fit: contain;">
                                                    <h6><b style="color: #009688;">Polso </b><span> Available </span>
                                                    </h6>
                                                    <a href="#" class="btn btn-danger">Connect/Sync</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="sync_cards">
                                                <div class="content p-0">
                                                    <img  src="{{ asset('assets/doctor-panel/imgs/dashboard/1.png') }}"
                                                            class="ads-img" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end connect box -->
                            </div>
                           
                           <!-- hospital lists -->
                           <div class="mt-4">
                            <!-- Start Partner List -->
                            <div class="tab-area">
                            <div class="row p-2 d-flex align-items-center">
    <!-- Title -->
    <div class="col-md-2 col-sm-3 col-12">
        <span>Useful Links</span>
    </div>

    <!-- Loop through items -->
    <div class="col-md-10 col-sm-9 col-12">
        {{-- <div class="row d-flex align-items-center h-100">
            @foreach ($categories as $index => $category)
                @if ($category->id == $category->id) 
                    <div class="col-md-2">
                        <a class="tab-area-anchor {{ $category->id == $category->id ? 'active' : '' }}"
                        href="{{ route('sponser.catebasedList', ['cat_id' => $category->id]) }}">
                            <span>{{ $category->name }}</span>
                        </a>
                    </div>
                @endif
            @endforeach
        </div> --}}
    </div>
</div>

                            <!-- End Partner List -->
                        </div>

                        <h4 class="mt-3">Search</h4><Br>
                         <!-- Search Bar -->
                <form class="form-inline search-bar position-relative" style="margin-top: -15px">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="hospitalSearch">
                </form>

            <!-- Hospital Lists -->
                <div class="hospital-lists mt-4" style="background: #E8F1F5; padding: 10px; border-radius: 14px !important;">
                    @if ($useFulLists->isEmpty())
                        <div class="text-center py-3">
                            <p>No data available</p>
                        </div>
                    @else
                        <!-- Hospital Single -->
                         <div style="background-color: white !important; padding: 20px" >
                        @foreach ($useFulLists as $useFulList)

                            <div class="hospital-single mb-2 m " data-title="{{ strtolower($useFulList->title) }}">
                                <!-- <h4 class="mt-2">MAYO HOSPITAL AND EMERGENCY ROOMS</h4> -->

                                <div class="row mt-3">
                                    <!-- Image Section -->
                                    <div class="col-md-5 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('images/apps/' . $useFulList->image) }}" style="width: 45%" alt="">
                                    </div>

                                    <!-- Content Section -->
                                    <div class="col-md-7">
                                        <div class="text">
                                            <h3><a href="" style="color: black">{{ $useFulList->title }}</a></h3>
                                            <p class="mb-0 mt-2">{{ $useFulList->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                        <!-- End Hospital Single -->
                    @endif
                </div>

                        
                           <!-- end hospital lists -->
                         </div>
                        <!-- end dash content -->
                      
                             </div> 
                    </div>
                    <div class="section_top_img col-md-12 p-1" >
                        <img src="{{ asset('assets/doctor-panel/imgs/sync-footer.png') }}" style="border-radius: 24px;" alt="" class="img-fuild">
                    </div>
                </div>
               
             </div>
             
             <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" id="modalBody">
      </div>
    </div>
  </div>
 
</div>

@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('hospitalSearch');
    const hospitalList = document.querySelector('.hospital-lists');
    const hospitals = hospitalList.querySelectorAll('.hospital-single');

    searchInput.addEventListener('input', function() {
        let searchQuery = this.value.toLowerCase();
        
        let found = false; 

        hospitals.forEach(function(hospital) {
            let hospitalTitle = hospital.getAttribute('data-title');
            
            // If the hospital title includes the search query, show it; otherwise, hide it
            if (hospitalTitle.includes(searchQuery)) {
                hospital.style.display = '';
                found = true;
            } else {
                hospital.style.display = 'none';
            }
        });

        let noResultsMessage = document.getElementById('noResultsMessage');
        if (!found && searchQuery.trim() !== "") {
            if (!noResultsMessage) {
                noResultsMessage = document.createElement('div');
                noResultsMessage.id = 'noResultsMessage';
                noResultsMessage.style.color = 'red';
                noResultsMessage.style.marginTop = '10px';
                noResultsMessage.style.textAlign = 'center';
                noResultsMessage.textContent = 'No hospitals found.';
                
                // Insert it into the hospital list
                hospitalList.appendChild(noResultsMessage);
            }
        } else {
            if (noResultsMessage) {
                noResultsMessage.remove();
            }
        }
    });
});

  </script>  


<script>
function showModal(info, type) {
  var modalBody = document.getElementById('modalBody');
  modalBody.textContent = type + ": " + info;
  $('#infoModal').modal('show');
}

function hideModal() {
  $('#infoModal').modal('hide');
}
</script>
@endsection
@extends('layouts.app')

@section('content')
<style type="text/css">
p {
    font-size: 16px;
}

h5{
    font-weight: 700;
}
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

.my-dashboard .connect-box .sync_cards .content {
    text-align: center !important;
}

a:hover {
    color: #333333;
    text-decoration: none;

}

p {
    font-size: 16px;
}

.imggs{
    width: 50% !important;
 }

    @media only screen and (max-width:768px){
         .ads-img{
            width: 100% !important;
         }
         .imggs{
            width: 100% !important;

         }
    }
    .tab-area-anchor {
    color: #333333;
    font-size: 16px !important;
    text-decoration: none;
}
    .tab-title {
    color: #141B29;
    font-size: 24px;
    font-weight: 600;
}
.sync_page_categories_lits
{
	-webkit-column-count: 3;
    -moz-column-count: 3;
    column-count: 3;
    list-style-type: none;
}
.tab-area ul li:first-child
{
	
}

.sync_page_categories_lits li {
    text-align: left;
}

.sync_page_categories_lits li a {
    font-weight: normal;
    text-align: left;
}
.sync_page_categories_lits {
    text-align: left;
}

</style>
<div class="content">
    <div class="container-fluid muko_cont">
      <div class="outer-contain-search">
        <div class="heading-contain">
          <div class="page-feature">
            <span class="feature-text">Page Feature:</span>
            <span
              >Members can link their profile to other applications like
              Allomed (telemedicine) with a single click. All
              relevant...</span
            >
          </div>
        </div>
      </div>
    </div>
  
    <div class="container">

        <div class="partners-container">
          <h5 class="partner_title">Partners list</h5>
          <div class="row">
            <!-- Partner 1 -->
            <div class="col-sm-6 mb-4">
              <div class="partner-card">
                <img
                  src="{{asset('assets/img/allo.png')}}"
                  alt="AlloMed.ch Logo"
                  class="img-fluid"
                  style="max-width: 240px"
                />
                <p class="title">All Med-Ch</p>
                <p class="status">Available</p>
                <button class="btn btn-connect">Connect/Sync</button>
              </div>
            </div>

            <!-- Partner 2 -->
            <div class="col-sm-6 mb-4">
              <div class="partner-card">
                <img
                  src="{{asset('assets/img/clinics.png')}}"
                  alt="Physio Clinics Logo"
                  class="img-fluid"
                />
              </div>
            </div>

            <!-- Partner 3 -->
            <div class="col-sm-6 mb-4">
              <div class="partner-card">
                <img
                  src="{{asset('assets/img/polso.png')}}"
                  alt="Polso Logo"
                  class="img-fluid mb-3"
                  style="max-width: 120px"
                />
                <p class="title">Polso</p>
                <p class="status">Not Available</p>
                <button class="btn btn-coming-soon">Coming Soon</button>
              </div>
            </div>

            <!-- Partner 4 -->
            <div class="col-sm-6 mb-4">
              <div class="partner-card jandars_card">
                <img
                  src="{{asset('assets/img/jandars.png')}}"
                  alt="Healthcare Logo"
                  class="img-fluid"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
       
      <div class="container">
        <div class="mt-4">
            <div class="col-md-2 col-sm-3 col-12" style="background: #E8F1F5;border-radius:20px">
                <h4><b>Useful Links</b></h4>
            </div>
            <h4 class="mt-3">Search</h4><Br>
             <!-- Search Bar -->
             <form class="form-inline search-bar position-relative" style="margin-top: -10px">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="categorySearch">
                <!-- Add a div to display the "Not Found" message -->
                <div id="noResultsMessage" style="display:none; color: red; margin-top: 10px;">
                    No categories found.
                </div>
            </form>
            
            <!-- Categories List -->
            <div class="tab-area mt-3">
    <div class="row p-2" id="categoryList">
    	<div class="col-12 p-4">
    		<ul class="list-unstyled sync_page_categories_lits">
    			@php  $counter = 1;  @endphp
	    		@if (count($categories) > 0)
	            @foreach ($categories as $index => $category)
	    		<li class="mb-3 {{$counter}}">
	    			 @if($counter % 35 == 0)
			             <img src="{{ asset('assets/doctor-panel/imgs/dashboard/sync2.png') }}" alt="Static Image 1" class="img-fluid  mb-2" >
			        @else
			        <a style="text-decoration: none;" 
	                           class="tab-area-anchor mt-2" 
	                           href="{{ route('sponser.catebasedList', ['cat_id' => $category->id]) }}" 
	                           data-category="{{ strtolower($category->name) }}">
	                           <span>{{ $category->name }}</span>
	                        </a>
			        @endif
	    			
	    		</li>
	    		@php $counter++; @endphp
	    		@endforeach
	    		@else
		            <li class="col-12">
		                <p class="text-center">No categories found</p>
		            </li>
		        @endif
	    	</ul>
    	</div>
    	
        @if (count($categories) > 0)
            @foreach ($categories as $index => $category)
                <div class="col-md-4 mb-3 d-none">
                    <div class="d-flex flex-column align-items-start">
                        @if ($index == 8)
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/sync2.png') }}" alt="Static Image 1" class="img-fluid imggs mb-2" style="max-height: 150px;">
                        @elseif ($index == 15)
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/sync1.png') }}" alt="Static Image 2" class="img-fluid imggs mb-2" style="max-height: 150px;">
                        @elseif ($index == 29)
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/3.png') }}" alt="Static Image 3" class="img-fluid imggs mb-2" style="max-height: 150px;">
                            @elseif ($index == 39)
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/4.png') }}" alt="Static Image 3" class="img-fluid imggs mb-2" style="max-height: 150px;">
                            @endif

                        <a style="margin-left: 1pc; text-decoration: none;" 
                           class="tab-area-anchor mt-2" 
                           href="{{ route('sponser.catebasedList', ['cat_id' => $category->id]) }}" 
                           data-category="{{ strtolower($category->name) }}">
                           <span>{{ $category->name }}</span>
                        </a>
                    </div>
                </div>
                
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">No categories found</p>
            </div>
        @endif
    </div>
</div>


            
            
            <!-- End Partner List -->
        </div>

        <div class="section_top_img col-12 p-1" >
            <img src="{{ asset('assets/doctor-panel/imgs/sync-footer.png') }}" style="border-radius: 24px;" alt="" class="img-fuild">
        </div>
        <div class="dash-ad d-none" style="margin-top: 20px;">
            <div class="dash-ad">
                <div id="bannerSlider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                @if ($slider->banner_name)
                                    <a href="{{ $slider->banner_name }}" target="_blank">
                                        <img src="{{ asset('images/apps/' . $slider->image) }}" alt="ads"
                                            style="height: 200px; width:100%;">
                                    </a>
                                @else
                                    <img src="{{ asset('images/apps/' . $slider->image) }}" alt="ads"
                                        style="height: 200px; width:100%;">
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#bannerSlider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{ translate('Previous') }}</span>
                    </a>
                    <a class="carousel-control-next" href="#bannerSlider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{ translate('Next') }}</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" id="modalBody">
                </div>
            </div>
        </div>
    </div>
@endsection
@yield('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('categorySearch');
    const categoryList = document.getElementById('categoryList');
    
    searchInput.addEventListener('input', function() {
        let searchQuery = this.value.toLowerCase();
        
        let categories = document.querySelectorAll('.tab-area-anchor');
        
        let found = false; 

        categories.forEach(function(category) {
            let categoryName = category.getAttribute('data-category').toLowerCase();
            
            if (categoryName.includes(searchQuery)) {
                category.closest('.col-md-4').style.display = '';
                found = true;
            } else {
                category.closest('.col-md-4').style.display = 'none';
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
                noResultsMessage.style.marginLeft = '10px';
                noResultsMessage.textContent = 'No categories found.';
                categoryList.appendChild(noResultsMessage);
            }
        } else {
            if (noResultsMessage) {
                noResultsMessage.remove();
            }
        }
    });
});

</script>


@yield('script')

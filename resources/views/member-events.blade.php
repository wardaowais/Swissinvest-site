@extends('layouts.app')
@section('content')
<style> 
   .profile-detail-pic {
   width: 170px;
   height: 170px;
   border-radius: 50%;
   object-fit: cover;
   }
   .card {
    border-radius: 8px;
    border: none;
    background-color: white !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.card-body {
    background-color: white !important;
    height: auto !important;
    border-radius: 10px;
}

.book-event-plan {
    background: white !important;
    border-radius: 24px;
    padding: 10px;
    /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */

}
.all-text{
    font-size: 16px;
    position: relative;
    bottom: 0px;
}

@media only screen and (max-width:768px) {
    .event-img{
    height: auto !important;
    }

    .event-main-img{
   height: 100% !important;
   width: 100% !important;
}

}
.event-main-img{
   height: 15pc !important;
   width: 100%;
}
</style>
<!-- my dashboard -->
<div class="my-dashboard">
   <div class="container-fluid">
      <div class="marquee-area">
         <ul>
            <li><span>{{translate('Page Feature')}}:</span></li>
            <li>
               <p>
                  <marquee behavior="" direction=""> {{translate('Keeps members informed about relevant events and
                     opportunities.')}}
                  </marquee>
               </p>
            </li>
         </ul>
      </div>
      <div class="dash-content">
         <!-- hading -->
         <div class="heading mt-3">
            <h4>Book Your Plans Events</h4>
         </div>
         <!-- end heading -->
         <!-- dash ad -->
         <!-- end dash ad -->
         <!-- booking list -->
         <div class="booking-list" style="background: #E8F1F5;">
            <form action="{{ route('memberEvent') }}" method="GET" id="eventFilterForm">
               <div class="book-event-plan ">
                  <div class="row">
                     <div class="col-12 col-md-2 book-all-btn mb-2">
                        <a href="{{ route('memberEvent') }}" class="btn"><span class="all-text">All </span><img src="{{ asset('assets/doctor-panel/imgs/dashboard/event-header.png') }}" style="padding-left:10px"></a>
                     </div>
                     <div class="col-12 col-md-3 book-select-speciality mb-2">
                        <select name="speciality_id" id="specialitySelect" class="book-select-input">
                           <option value="" disabled selected>{{translate('Select Specialty')}}</option>
                           @foreach($specialities as $speciality)
                           <option value="{{ $speciality->id }}" {{ request('speciality_id') == $speciality->id ? 'selected' : '' }}>
                           {{ $speciality->name }}
                           </option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-12 col-md-2 book-title mb-2">
                        <select name="title_id" id="titleSelect" class="book-select-input">
                           <option value="0" selected>{{translate('Title')}}</option>
                           @foreach($titles as $title)
                           <option value="{{ $title->id }}" {{ request('title_id') == $title->id ? 'selected' : '' }}>
                           {{ $title->name }}
                           </option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-12 col-md-2 book-date mb-2">
                        <input class="book-date-input" type="date" name="event_date" id="eventDate" placeholder="mm/dd/yyyy">
                     </div>
                  </div>
               </div>
            </form>
            <h5 class="mt-3">Upcoming Events </h5>
            <!-- connect box -->
            <div class="ads-connect-box">
               <div class="row mb-4">
                  <!-- Card 1 -->
                  @foreach ($events as $event)
                  <div class="col-md-4 mb-4">
                     <div class="card">
                        @foreach($event->eventSliders as $slider)
                        @php $image_event = $slider->image @endphp
                        <div class="item d-none"><img src="{{ asset($slider->image) }}" class="img-fluid " alt="Image 1"></div>
                        @endforeach
                        <img src="{{ asset($image_event) }}" class="img-fluid event-img event-main-img">
                        <div class="card-body">
                           <h6 class="card-text font-weight-bold">{{ \Carbon\Carbon::parse($event->created_at)->format('F d, Y') }}</h6>
                           {{ $event->description }}
                           <div class="col-12 text-right mt-3">
                              <a href="{{ $event->event_url }}" class="btn btn-danger">Book Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @if($loop->iteration % 6 === 0)
                  <div class="col-md-12 mb-3">
                     <a href="https://physio-clinics.ch" target="_blank">
                     <img class="ads-img" src="https://doctomed.ch/images/apps/1724942929_66d08a5139ac3.jpg" alt="ads">
                     </a>
                  </div>
                  @endif
                  @endforeach  
                  <!-- end connect box -->
               </div>
               <!-- end booking list -->
            </div>
            <!-- end dash content -->
         </div>
      </div>
   </div>

       <div class="section_top_img col-12">
          <img src="{{ asset('assets/doctor-panel/imgs/dashboard/event-footer.png') }}" alt="" class="img-fuild" style="width: 100%">
   
 </div>
</div>

<!-- end my dashboard -->
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
       $('#specialitySelect, #titleSelect, #eventDate').on('change', function() {
           $('#eventFilterForm').submit();
       });
   });
</script>
@endsection
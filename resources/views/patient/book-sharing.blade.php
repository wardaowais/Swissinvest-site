@extends('patient.layouts.app')
@section('content')
<style>
  
   .marquee-area {
   background-color: #e6f9fb;
   position: relative;
   top: 0px;
   left: 0;
   width: 100%;
   border-radius: 15px;
   }
   .marquee-area ul li:first-child {
   max-width: 135px;
   }
   .marquee-area ul {
   display: flex;
   gap: 00px;
   padding-left: 0px;
   list-style: none;
   margin-bottom: 0px;
   }
   .marquee-area ul li:first-child {
   font-size: 14px;
   background: #141B29;
   border-radius: 26px;
   margin-top: 2px;
   padding: 1pc;
   color: #fff;
   height: 4pc;
   text-transform: uppercase;
   }
   .marquee-area ul li {
   width: 100%;
   padding: 10px;
   }
   .books-page {
   background: #E8F1F5 !important;
   }
   .booking-list {
   padding: 20px;
   margin-top: 20px;
   background: #fff;
   border-radius: 12px;
   }
   .my-dashboard .connect-box .sync_cards {
   background-color: #e8f1f5;
   padding: 20px;
   border-radius: 20px;
   border-bottom-right-radius: 0;
   height: 100%;
   }
   .connect-box .sync_cards {
   border-radius: 24px !important;
   }
   .sync_cards {
   background: #fff !important;
   }
   .btn-danger{
   color: white;
   }
   a{
   text-decoration: none !important;
   }
   .heading {
   display: flex;                 
   justify-content: space-between; 
   align-items: center;       
   margin-bottom: 20px;         
   }
   .dropdown-container {
   margin-left: auto;             
   }
   .books-dropdown {
   padding: 5px 10px;            
   border-radius: 5px;           
   border: 1px solid #ccc;      
   cursor: pointer;              
   }
   .fa-share-alt{
   color:black;
   }
   .booking-list h5 {
   display: flex;
   justify-content: space-between;
   align-items: center;
   font-size: 20px;
   font-weight: 700;
   margin-bottom: 20px;
   }
   media only screen and (max-width:1024px)
   {

   .books-img {
      width: 100% !important;
      max-height: 180px;
      margin-right: 8px;
      border-radius: 24px;
      height: 100%;
   }
}

.books-img {
    width: -webkit-fill-available;
    max-height: 180px;
    margin-right: 8px;
    border-radius: 24px;
    height: 100%;
}
</style>
<div class="my-dashboard mt-3">
   <div class="marquee-area">
      <ul>
         <li><span>Page Feature :</span></li>
         <li>
            <p>
               <marquee behavior="" direction="">
                  Members can link their profile to other applications like Allomed (telemedicine) with a single click. All relevant data is transferred automatically,
               </marquee>
            </p>
         </li>
      </ul>
   </div>
   <div class="row mt-4 mb-4">
      <div class="col-md-12">
         <div class="dash-content">
            <div class="heading d-flex justify-content-between align-items-center">
               <h4>Books</h4>
               <div class="dropdown-container">
                <select id="category" name="category" class="books-dropdown">
                    <option value="AllCategories">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
               </div>
            </div>
            <!-- Booking list -->
        @foreach ($categories as $category)
            <div class="booking-list mt-4 books-page">
               <h5>{{ $category->name }}</h5>
               <div class="connect-box">
                  <div class="row">
                     @foreach ($category->books as $book)
                     <div class="col-lg-6 col-md-6">
                        <div class="sync_cards">
                           <div class="content">
                              <div class="row">
                                 <div class="col-12 col-md-3 col-lg-3">
                                    <img class="books-img img-fluid" src="{{ asset($book->image) }}" alt="{{ $book->name }}">
                                 </div>
                                 <div class="col-12 col-md-9 col-lg-9">
                                    <div class="content text-start p-1">
                                     <h4>{{ $book->name }}</h4>
                                                  <p>{{ $book->description }}</p>
                                       <div class=" mt-4 d-flex justify-content-between align-items-center">
                                          <a href="{{ route('showbookspage', encrypt($book->id)) }}" class="btn btn-danger">Read More</a>
                                          {{-- <a href="#"> --}}
                                          <i class="fa fa-share-alt" aria-hidden="true"></i>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
            @endforeach
            <!-- end booking list -->
         </div>
      </div>
   </div>
   <div class="section_top_img col-12">
      <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg" alt="" style="width:100%" class="img-fuild">
   </div>
   <br>
   <br>
</div>
@endsection
@extends('layouts.app')
@section('content')
<style> 
   .profile-detail-pic {
   width: 170px;
   height: 170px;
   border-radius: 50%;
   object-fit: cover;
   }
   .doc-image {
   width: 100px; /* Set the width */
   height: 100px; /* Set the height */
   object-fit: cover; /* Ensure the image covers the area */
   }
   .dash-content form {
   background: #E8F1F5;
   margin-top: 1pc;
   padding: 20px;
   border-radius: 12px;
   }
   .news-container {
   display: flex;
   flex-direction: column;
   gap: 15px;
   }
   .news-card {
   background-color: white;
   border-radius: 12px;
   padding: 20px;
   box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
   display: flex;
   flex-direction: column;
   }
   .news-header {
   display: flex;
   justify-content: flex-start; /* Align items to the start */
   align-items: center; /* Vertically center the elements */
   gap: 10px; /* Add some space between title and badge */
   }
   h3 {
   margin: 0;
   font-size: 1.1em;
   font-weight: 600;
   }
   .badge {
   background-color: #4DA9E5;
   color: white;
   padding: 5px 10px;
   border-radius: 15px;
   font-size: 0.9em;
   }
   .press-release {
   background-color: #007BFF;
   }
   .news-description {
   margin: 10px 0;
   font-size: 0.95em;
   color: #444;
   }
   .news-footer {
   display: flex;
   justify-content: space-between;
   align-items: center;
   }
   .news-date {
   color: #999;
   font-size: 0.9em;
   }
   .read-more {
   color: #007BFF;
   text-decoration: none;
   font-size: 0.9em;
   display: flex;
   align-items: center;
   }
   .news-date img {
   margin-right: 5px; 
   }
   .verify-icon {
   width: 16px;
   height: 16px;
   object-fit: contain;
   }
   .read-more span {
   margin-left: 5px;
   font-size: 12px;
   transition: transform 0.3s ease;
   }
   .read-more:hover span {
   transform: rotate(180deg);
   }
   .custom-list {
    list-style-type: disc; /* Bullet points */
    padding-left: 20px; /* Indentation for bullets */
    margin-top: 10px;
}

.custom-list li {
    margin-bottom: 15px; /* Adds space after each <li> */
    font-size: 1rem; /* Adjusts font size */
    line-height: 1.5; /* Adds spacing within each <li> */
    margin-left: 15px;
}
.custom-list li a{
    color: #212529;
    text-decoration: none;
}



</style>
<div class="my-dashboard">
<div class="container-fluid">
   <div class="page-feature">
            <span class="feature-text">Page Feature:</span>
            <span>Please leave your feedback for the better services</span>
        </div>
   <div class="">
      <div class="col-12">
       
      	<h3 class="mt-4">See Latest Medical News</h3>
      	<p class="mt-3">Stay updated with the latest news around the world</p>
      </div>
      <div class="col-md-12 q p-1" >
         <div class="row">
            <div class="col-md-12">
               <div class="card-medical" style="background: #E8F1F5;border-radius:20px;padding:1pc">
                  <div class="news-container">
                    @foreach($data as $key => $news)
                    <div class="news-card">
                        <div class="news-header">
                           <h3>{{googleTranslate($news['title'])}}</h3>
                           <span class="badge">News</span>
                        </div>
                        <p class="news-description">
                           {{googleTranslate($news['summary'])}}
                        </p>
                        <div class="news-footer">
                            <span class="news-date">
                                <img class="verify-icon" src="{{ asset('assets/doctor-panel/imgs/calendar.png') }}" alt="Calendar Icon"> 
                                @php
                                $date=date_create($news['date']);
                                $date = date_format($date,"d M Y");
                                @endphp
                                {{ googleTranslate($date) }}
                            </span>
                            @php
                                $param = request()->get('lang');
                                if(str_contains($news['link'],'/en/news')) $news['link'] = $news['link'];
                                $link = encrypt($news['link']);
                            @endphp
                           <a href="{{ url('/news/'.$link)}}" class="read-more">{{googleTranslate('Read more')}} <span>▼</span></a>
                        </div>
                     </div>
                    @endforeach

                  </div>
               </div>
            </div>
            <br><br>
            
                <div class="col-md-6">
                   
                    <img class="mt-5 " src="{{ asset('assets/doctor-panel/imgs/latest-news.png') }}" width="100%" alt="Verified Icon">
                    <div class="card" style="background: #E8F1F5;border:none;border-radius:12px">
                    <ul class="custom-list mt-3">
                        @foreach($data as $key => $news)
                        <li><a href="">Information for the industry FDA</a></li>
                        @endforeach
                    </ul>
                </div>
                </div>
                
                <div class="col-md-6" style="text-align: end">
                    <img  class="mt-5 img-fluid" src="{{ asset('assets/doctor-panel/imgs/medical-news.png') }}"   alt="Verified Icon"  class="verify-icon img-fluid">

                </div>

           
         </div>
      </div>
    

    </div>
</div>
    <div class="section_top_img col-md-12">
        <img src="{{ asset('assets/doctor-panel/imgs/footer-banner.png') }}" alt="" class="img-fuild">
    </div>

</div>

@endsection
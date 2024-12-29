@extends('layouts.app')
@section('content')
<style> 
   .profile-detail-pic {
   width: 170px;
   height: 170px;
   border-radius: 50%;
   object-fit: cover;
   background-color: white; /* Set profile background color */
   border: 2px solid black; /* Black border for profile */
   }
   
   .doc-image {
   width: 100px; 
   height: 100px; 
   object-fit: cover; 
   }
   
   .dash-content form {
   background: #E8F1F5;
   margin-top: 1pc;
   padding: 20px;
   border-radius: 12px;
   }
   
   .news-section {
    display: flex;
    gap: 20px;
    font-family: Arial, sans-serif;
}

.covid-news {
    flex: 2;
    background-color: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.related-news {
    flex: 1;
    background-color: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.news-img {
    width: 100%; /* Make image full width */
    height: auto; 
    object-fit: cover; 
    border-radius: 10px;
}

.news-info {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.badge {
    background-color: #4A5D6F;
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.9em;
    display: inline-block;
}

.press-release {
    font-size: 0.75em; /* Smaller badge size for press news */
    padding: 3px 8px; /* Adjust padding */
}

.news-stats {
    display: flex;
    gap: 15px;
    font-size: 0.9em;
    color: #666;
    align-items: center; /* Align in one row */
}

.news-actions {
    margin-top: 10px;
    display: flex;
    gap: 10px; /* Add space between buttons */
}

.btn {
    background-color: white;
    color: black;
    border: none;
    border: 1px solid;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}
.btn-red {
    background-color: red;
}

.news-content {
    margin-top: 20px;
}

.news-content h3 {
    font-size: 1.2em;
    font-weight: 600;
}

.news-header{
    background: white;
    padding: 1pc;
    border-radius: 10px;
}
.news-content p {
    font-size: 1em;
    color: #333;
    margin-bottom: 15px;
}

.article-img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 15px;
}

.related-news h4 {
    font-size: 1.2em;
    margin-bottom: 20px;
}

.related-news a {
    font-size: 0.9em;
    text-decoration: none;
    color: #007BFF;
}

.related-card {
    margin-bottom: 20px;
    border: none;
    border-radius: 10px;
}
.related-card img {
    width: 100%;
    /* height: 120px; */
    object-fit: cover;
    border-radius: 10px;
}

.related-card p {
    font-size: 0.95em;
    margin: 10px 0;
    color: #333;
}

.related-card .badge {
    display: inline-block;
    margin-top: 10px;
}

.related-card .news-stats {
    font-size: 0.9em;
    color: #666;
    margin-top: 5px;
}

.custom-list {
    list-style-type: disc;
    padding-left: 20px !important;
    margin-top: 10px;
}

.custom-list li {
    margin-bottom: 15px;
    font-size: 1rem;
    line-height: 1.5;
}

/* Icon styles */
.download-icon:before {
    content: "\f019"; /* Font Awesome download icon */
    font-family: FontAwesome;
    margin-right: 5px;
}

.share-icon:before {
    content: "\f1e0"; /* Font Awesome share icon */
    font-family: FontAwesome;
    margin-right: 5px;
}

.news-top {
    display: flex;
    justify-content: space-between; /* This pushes the items to opposite ends */
    align-items: center; /* Aligns the items vertically in the center */
}

.news-stats {
    display: flex;
    gap: 15px;
    font-size: 0.9em;
    color: #666;
    align-items: center;
}

.action-buttons-vertical {
    display: flex;
    flex-direction: column; /* Stack buttons vertically */
}

.action-buttons-vertical .btn {
    margin-bottom: 10px; /* Add space between buttons */
    width: 100%; /* Ensure buttons take up full width */
}

.stats-container {
    display: flex;
    justify-content: space-between; /* Puts the badge on the left and heart on the right */
    align-items: center; /* Aligns items vertically in the center */
}

.badge {
    margin-right: auto; /* Ensures the badge stays on the left */
}

.news-stats {
    margin-left: auto; /* Ensures the heart stays on the right */
}

@media only screen and (max-width:767px) {
    .news-section {
    display: block !important;
    gap: 20px;
    font-family: Arial, sans-serif;
}
.advirtisment{
    width: 100% !important;
}
}


</style>
<div class="container-fluid px-md-5">
   <div class="marquee-area">
      <ul>
         <li><span>Page Feature:</span></li>
         <li>
            <p>
               <marquee behavior="" direction=""> Keeps members informed about relevant events and
                  opportunities.
               </marquee>
            </p>
         </li>
      </ul>
   </div>
   <div class="row" style="    padding: 9px;">
     
      <br>
      <div class="col-md-12 q p-1">
       
         <div class="row">
            <div class="col-md-12">
                <h3 class="mt-3">See Latest Medical Ads</h3>
                <p class="mt-3">Stay updated with the latest Ads around the world</p>
          
                <div class="news-section">
                    <div class="covid-news" style="background: #E8F1F5;border:none;border-radius:13px;padding:1pc">
                        <div class="news-header">
                            <h3>Covid Ads</h3>
                            <img class="news-img" src="{{ asset('assets/doctor-panel/imgs/covid.png') }}" alt="">

                            <div class="news-info">
                                <div class="news-header">
                                    <div class="news-top">
                                        <span class="badge press-release">Press Ads</span>
                                        <div class="news-stats">
                                            <span class="stat-item">
                                             <img  src="{{ asset('assets/doctor-panel/imgs/like.png') }}" /> 20K
                                            </span>
                                            <span class="stat-item">
                                                <img  src="{{ asset('assets/doctor-panel/imgs/comment.png') }}" style="width: 40%" /> 10K
                                               </span>
                                               <span class="stat-item">
                                                <img  src="{{ asset('assets/doctor-panel/imgs/share.png') }}" style="width: 40%"  /> 9.5k
                                               </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="news-header mt-3">
                                            <h5>Understanding COVID-19: A Comprehensive Overview</h5>
                                           
                                        </div>
                                       
                                        <p style=" padding-left: 1pc;">By John William, Parley Johnson And Katharine Lang, <br>16 Oct 2024 08:30 AM EST</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="action-buttons-vertical">
                                            <button class="btn download-icon">Save in Profile</button>
                                            <button class="btn btn-red share-icon" style="color:white">Share on Media</button>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                              
                             
                                
                            </div>
                        </div>
                        <div class="news-content">
                            <h3>Could some diets help manage long COVID?</h3>
                            <p>
                                For many people, particularly following vaccination, infection with SARS-CoV-2, the virus that causes COVID-19, resolves within a few days. But for others, it results in long COVID...
                                For many people, particularly following vaccination, infection with SARS-CoV-2, the virus that causes COVID-19, resolves within a few days. But for others, it results in long COVID, a variety of often debilitating symptoms that persist for weeks, months or even years. Why this happens in some is unclear, and there are currently no effective treatments. Some experts believe diet could be key to symptom management. What is the evidence for this?
                            </p>
                            <img class="news-img" src="{{ asset('assets/doctor-panel/imgs/covid2.png') }}" alt="Calendar Icon">
                            <p class="mt-4">Misfiring immune system may play a role in long COVID
                                Dr. Adupa Rao, a medical director at the Keck Medicine COVID Recovery Clinic, told MNT that “there is no clear signal why certain people develop long COVID.“
                                However, according to him, a misfiring immune system, triggered by SARS-CoV-2, may prolong the state of illness indefinitely for some people.
                                “We suspect that the underlying problem is that the immune system gets activated after COVID infection and stays on after the infection has resolved,” said Dr. Rao.
                                “The continuous activation of the immune system means that the body is very active seeking to fight infection and is in the high-inflammatory state,” he explained.</p>
                        </div>
                    </div>
                    <div class="related-news" style="background: #E8F1F5;border:none;border-radius:13px;padding:1pc">
                        <h4>Related Ads <a href="#">See All</a></h4>
                        <div class="related-card card" style="padding:1pc">
                            <img src="{{ asset('assets/doctor-panel/imgs/detail1.png') }}" alt="Calendar Icon">
                            <div class="stats-container">
                                <span class="badge">Conference</span>
                                <span class="stat-item">
                                    <img  src="{{ asset('assets/doctor-panel/imgs/like.png') }}" style="width: 30%" /> 20K
                                   </span>
                            </div>
                            <br>
                            <p>Morning Briefing: A Comprehensive Overview</p>
                        </div>
                        <div class="related-card card" style="padding:1pc">
                            <img src="{{ asset('assets/doctor-panel/imgs/detail2.png') }}" alt="Calendar Icon">
                            <div class="stats-container">
                                <span class="badge">Conference</span>
                                <span class="stat-item">
                                    <img  src="{{ asset('assets/doctor-panel/imgs/like.png') }}" style="width: 30%" /> 20K
                                   </span>
                            </div>
                            <p>Morning Briefing: COVID-19 Vacation Comprehensive Overview</p>
                        </div>
                        <div class="related-card card" style="padding:1pc">
                            <img src="{{ asset('assets/doctor-panel/imgs/detail3.png') }}" alt="Calendar Icon">
                            <div class="stats-container">
                                <span class="badge">Conference</span>
                                <span class="stat-item">
                                    <img  src="{{ asset('assets/doctor-panel/imgs/like.png') }}" style="width: 30%" /> 20K
                                   </span>
                            </div>
                            <p>Evening Briefing: A Physical Improvement Breakthrough</p>
                           
                        </div>
                    </div>
                </div>
            </div>
          
            
         </div>
         <div class="row">
            <div class="col-md-6">
                <img class="mt-5" src="{{ asset('assets/doctor-panel/imgs/latest-news-details.png') }}" style="width:100%" alt="Verified Icon">
                <div class="card" style="background: #E8F1F5;border:none;border-radius:12px">
                <ul class="custom-list mt-3 p-3">
                    <li>Some diets are more accessible...</li>
                    <li>New research suggests...</li>
                    <li>Dietary patterns have been shown...</li>
                    <li>Long COVID presents unique challenges...</li>
                </ul>
            </div>
            </div>
            <div class="col-md-6" style="text-align: end">
                <img  class="mt-5 img-fluid advirtisment" src="{{ asset('assets/doctor-panel/imgs/advirtisment.png') }}" style="width:80%"  alt="Verified Icon"  class=" img-fluid">

            </div>
        </div>

        
      </div>
    

   </div>

</div>
<div class="section_top_img user_adv_bottom_img">
    <img src="{{ asset('assets/doctor-panel/imgs/medical-footer.png') }}" alt="" class="img-fuild">
</div>
@endsection

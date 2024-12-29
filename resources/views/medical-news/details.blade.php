@extends('layouts.app')

@section('content')
<style>
    .feature-content{
        margin-left: -40px;
        margin-top: 1pc;
    }
    .main-div1{
        background: white;
        display: flex;
        align-items: center;
        width: 95%;
        margin-left: 15px;
    }
    .text-color{
        color: #31e4fc;
    }
    .text-size{
        font-size: 16px;
        font-weight: 300;
    }
    .image-container{
        margin-left: 5px
    }

    .category-paragraph1 {
        font-size: 15px;
    }

    .tag{
        /* position: absolute; */
        background: #3166FCED;
        color: #fff;
        padding: 5px 10px;
        border-radius: 25px;
        font-size: 14px;
        top: 10px;
        left: 10px;
    }
    .mybtn{
        color: #3166FCED;
        font-size: 16px;
    }

    .text-read{
        text-align: center;
    }

    #content {
        width: 100%;
        flex-grow: 1;
        /* padding-left: 100px; */
        background-color: #fff;
        min-height: 100vh;
        margin-top: 0;
    }


    .author-section {
        display: flex;
        align-items: center; /* Align items vertically centered */
    }

    .author-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 15px; /* Space between the image and text */
    }

    .author-info p {
        margin: 0;
        font-family: Arial, sans-serif;
    }



    .author-name, .fact-checker {
        font-weight: bold;
        color:#3166FCED;
    }

    .date {
        color: gray;
    }

    .divider {
        border: none;
        border-bottom: 1px solid #ccc;
        margin: 20px 0;
    }

    .latest-news h3 {
        font-family: Arial, sans-serif;
        font-weight: bold;
    }

    .news-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .news-img {
        width: 80px;
        height: 80px;
        margin-right: 10px;
    }

    .news-content > a > p {
        margin: 0;
    }

    .source {
        font-size: 0.85em;
        color: gray;
    }

    .ad-section {
        text-align: left;
    }

    .ad-img {
        width: 100%;
        max-width: 300px;
        height: auto;
    }

    .social-feedback-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
        border-top: 2px solid #007bff; /* Blue line at the top */
        padding-top: 15px;
    }

    .social-icons p {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .social-icons a {
        display: inline-block;
        margin-right: 10px;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 8px;
    }

    .social-icons img {
        width: 20px;
        height: 20px;
    }

    .feedback-question {
        text-align: right;
    }

    .feedback-question p {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .feedback-btn {
        border: 1px solid;
        padding: 5px 15px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
    }

    .feedback-btn.yes {
        color: #00c4ff;
        border-color: #00c4ff;
        margin-right: 10px;
    }

    .feedback-btn.no {
        color: #ff0000;
        border-color: #ff0000;
    }

</style>
<section class="hero-section-news position-relative mt-2" style="background-image: url('{{ asset('assets/img/corona blue.png') }}');padding: 6pc;
    background-position: center;
    background-size: cover;">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="hero-content text-white">
                    <h2 class="display-4 fw-bold banner-text text-white text-center">Latest Updates on COVID-19</h2>
                </div>
            </div>

        </div>
    </div>

    <!-- Background Image -->

</section>
<div id="content">
    <br><br>
    <div class="container-fluid px-md-5">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-9">
                @foreach($data as $key => $news)
                    <!-- Article Title -->
                    <h3>{{googleTranslate($news['heading'])}}</h3>
                    <br>
                    <!-- Subtitle -->
                    <h5>News In Brief</h5>
                    @php
                        // Split content by sentence
                        $sentences = preg_split('/(?<=[.?!])\s+/', $news['details']);
                        $totalSentences = count($sentences);
                        $sentencesPerParagraph = ceil($totalSentences / 6);
                        $paragraphs = array_chunk($sentences, $sentencesPerParagraph);
                    @endphp

                    @foreach($paragraphs as $paragraph)
                        <p style="text-align: justify; text-indent: 2em;">{{ googleTranslate(implode(' ', $paragraph)) }}</p>
                    @endforeach
                @endforeach
            </div>
            <div class="col-md-3">
                <div class="author-section">
                    <div class="author-info" style="display:flex">
                        <img src="{{asset('assets/img/blog-main.png')}}" alt="Author Image" class="author-img">
                        <p>
                            Written by <span class="author-name">Katharine Lang</span> on
                            <span class="date">October 18, 2023</span> —
                            Fact checked by <span class="fact-checker">Hannah Flynn</span>
                        </p>
                    </div>
                </div>

                <hr class="divider">

                <div class="latest-news">
                    <h3>Latest News</h3>
                    @foreach($latest as $key => $news)
                        @php $link = encrypt($news['link']); @endphp
                        <div class="news-item">
                            <img src="{{asset('assets/img/Group 165.png')}}" alt="News Image" class="news-img">
                            <div class="news-content">
                                <a class="text-dark text-decoration-none fw-bold" href="{{url('/news/'.$link)}}">
                                    <p>{{ $news['title'] }}</p>
                                </a>
                                <p class="source">{{ \Carbon\Carbon::make($news['date'])->format('F d, Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr class="divider">

                <div class="ad-section">
                    <h3>AD HERE</h3>

                    <img src="{{asset('assets/img/doc.png')}}" alt="Ad Image" class="ad-img">
                </div>

            </div>

            <div class="social-feedback-section">
                <div class="social-icons">
                    <p>Find us on</p>
                    <a href="#"><img src="{{asset('assets/img/Twitter.png')}}"  alt="Twitter"></a>
                    <a href="#"><img   src="{{asset('assets/img/facebook.png')}}" alt="Facebook"></a>
                    <a href="#"><img src="{{asset('assets/img/TwitterX.png')}}" alt="X"></a>
                    <a href="#"><img src="{{asset('assets/img/LinkedIn.png')}}" alt="LinkedIn"></a>
                </div>
                <div class="feedback-question">
                    <h4 class="mb-2">Was this article helpfull?</h4>
                    <a href="#" class="feedback-btn yes">Yes</a>
                    <a href="#" class="feedback-btn no">No</a>
                </div>
            </div>

        </div>
    </div>
</div>

@endSection

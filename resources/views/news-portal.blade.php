@extends('layouts.app')

@section('content')
<div class="my-dashboard">
<div class="main-content demo-content">
  <div class="marquee-area">
                  <ul>
                    <li><span>{{translate('Page Feature')}}:</span></li>
                    <li><p><marquee behavior="" direction="">{{translate('Verified members receive updates on the latest
                    medical news in their dashboard.')}}</marquee></p></li>
                  </ul>
        </div>
              <div class="textt">
                <h2>Medical News:</h2>
                <h1>Coming Soon</h1>
              </div>
          </div>
          <div class="dash-ad">
                             <div id="bannerSlider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                            @foreach($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" style="height: 200px; width:100%;">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#bannerSlider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">{{translate('Previous')}}</span>
                        </a>
                        <a class="carousel-control-next" href="#bannerSlider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">{{translate('Next')}}</span>
                        </a>
                    </div>
                             </div>
                             </div>
@endsection

@section('scripts')
@endsection
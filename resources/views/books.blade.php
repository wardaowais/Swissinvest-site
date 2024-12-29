@extends('layouts.app')

@section('content')
<style>
    .books-img {
    width: 150px;
    max-height: 180px;
    margin-right: 8px;
    border-radius: 24px;
    height: 100%;
}
.book-card-text {display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 4; overflow: hidden; text-overflow: ellipsis; }
</style>
    <div class="my-dashboard">
        <div class="marquee-area books_fp">
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
                    <div class="heading">
                        <h4>Books</h4>
                        <div >
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
                                        <div class="col-lg-6 col-md-6 mb-4">
                                            <div class="sync_cards">
                                                <div class="content">
                                                    <div class="row">
                                                    	<div class="col-12 col-md-3 col-lg-3">
                                                    		<img class="books-img img-fluid" src="{{ asset($book->image) }}" alt="{{ $book->name }}">
                                                    	</div>
                                                    	<div class="col-12 col-md-9 col-lg-9">
                                                    		<div class="content text-start p-1">
		                                                        <h6>{{ $book->name }}</h6>
		                                                        <p class="book-card-text">{{ $book->description }}</p>
		                                                        <div class="btn-link mt-4 d-flex justify-content-between align-items-center">
		                                                            <a href="{{ route('showbookspage', encrypt($book->id)) }}" class="btn btn-danger">Read More</a>
		                                                            <a href="#">
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
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
        </div>
    </div>

@endsection

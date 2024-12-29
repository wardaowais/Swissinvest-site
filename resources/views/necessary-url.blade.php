
@extends('layouts.app')

@section('content')
<section class="section  sync_sec">
    <div class="row">
        <div class="col-lg-3">

            <div class="card">
                <div class="card-body profile-card pt-4 ">

                    <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->



                    <h6 class="fw-bold">{{translate('Connected Partners')}}</h6>
                    <!-- <p>Phase 3B-2, Sector 60, Sahibzada Ajit Singh Nagar, Punjab, India, </p> -->

                    <!-- <button type="submit" class="btn btn-primary w-100 book_app ">Book Appointment</button> -->

                    <div class="mt-4">
                    @foreach ($categories as $category)
                    <a href="{{ route('sponser.catebasedList', ['cat_id' => $category->id]) }}">
                <div class="d-flex justify-content-between mb-3">
                    <div class="health_category">
                        <span class="ps-2 fw-bold text-black red">{{ $category->name }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                            <path d="M15.7208 14.3534L16.0744 13.9999L15.7208 13.6463L10.2994 8.22486L11.242 7.2823L17.9595 13.9999L11.242 20.7174L10.2994 19.7749L15.7208 14.3534Z" fill="#6B7A84" stroke="#6B7A84"></path>
                        </svg>
                    </div>
                </div>
            </a>
            <hr>
        @endforeach
                    </div>

                    <img src="assets/img/" alt="">



                </div>
            </div>

        </div>
        <!-- Left side columns -->
        <div class="col-lg-9">
            <div class="row">

                <div class="green_banner">
                <div class="mb-3">
                <div id="bannerSlider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($sliders as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('images/apps/'.$slider->image) }}" alt="ads" class="img-fluid fixed-height-carousel">
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

                <!-- Data Available -->
                @foreach ($randomLists as $random)
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">

                        <div class="row">
                            <div class="col-lg-10">
                                <div class="d-flex">
                                    <div class="me-3">
                                        <img src="{{ asset('images/apps/' . $random->image) }}" alt="banner" class="img-fluid mb-3" style="height: 70px; width: 70px;">
                                    </div>
                                    <div>
                                        <h6 class="red fw-bold">{{ $random->title }}</h6>
                                        <p class="mb-0"><small>{{ $random->description }}</small></p>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.56567 20.3596L8.56581 20.3597C9.52994 21.2875 10.7646 21.75 11.9991 21.75C13.2341 21.75 14.4676 21.2872 15.4207 20.3614L15.4226 20.3596C18.2551 17.636 21.2398 13.4489 20.1316 8.56081L8.56567 20.3596ZM8.56567 20.3596C5.73344 17.6363 2.74841 13.4392 3.85669 8.55081L8.56567 20.3596ZM11.9991 2.25C15.365 2.25 19.1453 4.22167 20.1315 8.56057L3.85674 8.55057C4.84273 4.21277 8.63187 2.25 11.9891 2.25H11.9892H11.9892H11.9893H11.9894H11.9894H11.9895H11.9895H11.9896H11.9896H11.9897H11.9897H11.9898H11.9899H11.9899H11.99H11.99H11.9901H11.9901H11.9902H11.9902H11.9903H11.9904H11.9904H11.9905H11.9905H11.9906H11.9906H11.9907H11.9907H11.9908H11.9908H11.9909H11.9909H11.991H11.991H11.9911H11.9911H11.9912H11.9912H11.9913H11.9913H11.9914H11.9914H11.9915H11.9915H11.9916H11.9916H11.9917H11.9917H11.9918H11.9918H11.9919H11.9919H11.992H11.992H11.9921H11.9921H11.9921H11.9922H11.9922H11.9923H11.9923H11.9924H11.9924H11.9925H11.9925H11.9926H11.9926H11.9926H11.9927H11.9927H11.9928H11.9928H11.9929H11.9929H11.9929H11.993H11.993H11.9931H11.9931H11.9932H11.9932H11.9932H11.9933H11.9933H11.9934H11.9934H11.9934H11.9935H11.9935H11.9936H11.9936H11.9936H11.9937H11.9937H11.9938H11.9938H11.9938H11.9939H11.9939H11.9939H11.994H11.994H11.9941H11.9941H11.9941H11.9942H11.9942H11.9942H11.9943H11.9943H11.9944H11.9944H11.9944H11.9945H11.9945H11.9945H11.9946H11.9946H11.9946H11.9947H11.9947H11.9947H11.9948H11.9948H11.9948H11.9949H11.9949H11.9949H11.995H11.995H11.995H11.9951H11.9951H11.9951H11.9952H11.9952H11.9952H11.9953H11.9953H11.9953H11.9953H11.9954H11.9954H11.9954H11.9955H11.9955H11.9955H11.9956H11.9956H11.9956H11.9956H11.9957H11.9957H11.9957H11.9958H11.9958H11.9958H11.9958H11.9959H11.9959H11.9959H11.996H11.996H11.996H11.996H11.9961H11.9961H11.9961H11.9961H11.9962H11.9962H11.9962H11.9962H11.9963H11.9963H11.9963H11.9963H11.9964H11.9964H11.9964H11.9964H11.9965H11.9965H11.9965H11.9965H11.9966H11.9966H11.9966H11.9966H11.9967H11.9967H11.9967H11.9967H11.9967H11.9968H11.9968H11.9968H11.9968H11.9969H11.9969H11.9969H11.9969H11.9969H11.997H11.997H11.997H11.997H11.997H11.9971H11.9971H11.9971H11.9971H11.9971H11.9972H11.9972H11.9972H11.9972H11.9972H11.9973H11.9973H11.9973H11.9973H11.9973H11.9974H11.9974H11.9974H11.9974H11.9974H11.9974H11.9975H11.9975H11.9975H11.9975H11.9975H11.9976H11.9976H11.9976H11.9976H11.9976H11.9976H11.9977H11.9977H11.9977H11.9977H11.9977H11.9977H11.9977H11.9978H11.9978H11.9978H11.9978H11.9978H11.9978H11.9979H11.9979H11.9979H11.9979H11.9979H11.9979H11.9979H11.998H11.998H11.998H11.998H11.998H11.998H11.998H11.998H11.9981H11.9981H11.9981H11.9981H11.9981H11.9981H11.9981H11.9982H11.9982H11.9982H11.9982H11.9982H11.9982H11.9982H11.9982H11.9982H11.9983H11.9983H11.9983H11.9983H11.9983H11.9983H11.9983H11.9983H11.9983H11.9984H11.9984H11.9984H11.9984H11.9984H11.9984H11.9984H11.9984H11.9984H11.9984H11.9985H11.9985H11.9985H11.9985H11.9985H11.9985H11.9985H11.9985H11.9985H11.9985H11.9985H11.9986H11.9986H11.9986H11.9986H11.9986H11.9986H11.9986H11.9986H11.9986H11.9986H11.9986H11.9986H11.9987H11.9987H11.9987H11.9987H11.9987H11.9987H11.9987H11.9987H11.9987H11.9988H11.9988H11.9988H11.9988H11.9988H11.9988H11.9988H11.9988H11.9989H11.9989H11.9989H11.9989H11.9989H11.9989H11.9989H11.9989H11.9989H11.9989H11.9989H11.999H11.999H11.999H11.999H11.999H11.999H11.999H11.999H11.999H11.999H11.999H11.999H11.9991H11.9991H11.9991H11.9991H11.9991H11.9991H11.9991H11.9991H11.9991ZM8.34912 10.31C8.34912 12.3261 9.98298 13.96 11.9991 13.96C14.0153 13.96 15.6491 12.3261 15.6491 10.31C15.6491 8.29386 14.0153 6.66 11.9991 6.66C9.98298 6.66 8.34912 8.29386 8.34912 10.31Z" fill="#6B7A84" stroke="#6B7A84" />
                                                </svg>
                                        <span>
                                            <small>{{ $random->address }}</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                            <div class="message_btn mb-2">
                                <button type="button" class="btn btn-primary" onclick="showModal('{{ $random->email }}', 'Email')">{{translate('Message')}}</button>
                            </div>
                            <div class="message_btn1">
                                <button type="button" class="btn btn-primary" onclick="showModal('{{ $random->phone }}', 'Phone')">{{translate('Phone')}}</button>
                            </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold">{{translate('Photos')}} </h5>
                            </div>

                            <div class="page_nav">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link prev" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo; {{translate('Previous')}}</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link next" href="#" aria-label="Next">
                                    <span aria-hidden="true">{{translate('Next')}} &raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                        </div>

                        <hr>

                        <div id="carousel{{ $random->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($random->necessarySliders as $index => $slider)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
    <img src="{{ asset('images/apps/' . $slider->image) }}" class="d-block w-100" alt="Slider Image" style="height: 200px; width: 250px;">
</div>

                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $random->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $random->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                    </div>
                </div>
            </div>
        @endforeach
                <!-- End Top Selling -->
                  <!-- Data Available -->
                <!-- End Top Selling -->

            </div>
        </div>
        <!-- End Left side columns -->


    </div>

    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" id="modalBody">
      </div>
    </div>
  </div>
</div>
</section>

@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        // Initialize carousel
        $('.carousel').carousel();

        // Handle next and previous button clicks
        $('.page-link.prev').on('click', function(e) {
            e.preventDefault();
            $(this).closest('.card-body').find('.carousel').carousel('prev');
        });

        $('.page-link.next').on('click', function(e) {
            e.preventDefault();
            $(this).closest('.card-body').find('.carousel').carousel('next');
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
@extends('home.layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
        .faq-container {
            max-width: 100%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        .faq-item {
            border: 1px solid #ccc;
            margin-bottom: 5px;
            border-radius: 5px;
            overflow: hidden;
        }

        .faq-question {
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .faq-question:hover {
            background-color: #e9e9e9;
        }

        .faq-answer {
            display: none;
            padding: 10px;
            border-top: 1px solid #ccc;
            background-color: #fff;
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-icon.open {
            transform: rotate(180deg);
        }
    </style>
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<section class="profile-hero">
    <div class="cover-photo">
    <img src="{{ $heroWebImage->first() ? asset($heroWebImage->image) : '' }}" alt="" style="height: 350px;">

    </div>
    <div class="profile_pic">
    @if ($user->profile_pic)
                <img src="{{ asset('images/users/' . $user->profile_pic) }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 180px; height: 180px;">
                @else
                <img src="{{ asset('assets/home/imgs/02/3.png') }}">
            @endif
            <h1>{{$user->first_name}}</h1>
        <ul class="tags">
        @foreach (explode(',', $user->specialties) as $specialtyId)
                        @php
                            $specialty = App\Models\Specialty::find($specialtyId);
                        @endphp
                        @if ($specialty)
                
                            <li>{{ $specialty->name }}</li>
                        @endif
                    @endforeach
            
        </ul>
        <p><span><i class="fa-solid fa-location-dot"></i></span>{{translate(!empty($user->address) ? $user->address : 'Address Not Updated')}}</p>
    </div>
 </section>
<!-- end profile hero -->


 <!-- add banner -->
 <!-- <div class="add-banner">
    <div class="container">
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
 </div> -->
<!-- end ad banner -->


<!-- profile details -->
 <section class="profile-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <!-- left content -->
                 <div class="left-content">

                    <div class="content">
                        <ul class="menu">
                        <li class="py-3 border-bottom"><a href="#" class="active">{{translate('Summary')}}</a></li>
                        <li class="py-3 border-bottom"><a href="#location">{{translate('Location')}}</a></li>
                        <li class="py-3 border-bottom"><a href="#appointment">{{translate('Book Appointment')}}</a></li>
                        <li class="py-3 border-bottom"><a href="#faq">{{translate('FAQ')}}</a></li>
                        </ul>
                    </div>
               
                    <!-- end add banner -->

                 </div>
                <!-- end left content -->
            </div>
            <div class="col-lg-9 col-md-8">
                <!-- right content -->
                 <div class="right-content">
                    <!-- content -->
                     <div class="content">
                        <div class="box" id="summary">
                            <h4>{{translate('About Me')}}</h4>
                            <p>{{$user->about_me}}</p>
                        </div>

                        <div class="box">
                            <h4>{{translate('Specialties')}}</h4>
                            <ul class="tags">
                            @foreach(explode(',', $user->speciality) as $speciality)
                            <li>{{ translate($speciality) }}</li>
                        @endforeach

                            </ul>
                        </div>

                        <div class="box border-none" style="padding-bottom: 0;">
                            <h4>{{translate('Expertises')}}</h4>
                            <ul class="tags">
                            @foreach (explode(',', $user->sxpertise) as $expertiseId)
                        @php
                            $expertise = App\Models\Expertise::find($expertiseId);
                        @endphp
                        @if ($expertise)
                
                            <li>{{translate ($expertise->name) }}</li>
                        @endif
                    @endforeach
                            </ul>
                        </div>

                     </div>
                    <!-- end contnent -->
                    <div class="content d-flex">
                    <div class="col-sm-6">
                                    <!-- input field -->
                                    <div class="input-field">
                                    <select  id="specialty" name="specialty" aria-label="Floating label select example" required>
                                        @foreach (explode(',', $user->specialties) as $specialtyId)
                                            @php
                                                $specialty = App\Models\Specialty::find($specialtyId);
                                            @endphp
                                            @if ($specialty)
                                                <option value="{{ $specialty->id }}">{{translate( $specialty->name)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                        <span><i class="fa-solid fa-circle-check"></i></span>
                                     </div>
                                    <!-- input field -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- input field -->
                                    <div class="input-field">
                                        <p>{{translaet('Visit reason')}}</p>
                                        <input type="text"  id="visit-reason" name="visit_reason" required>
                                        <span><i class="fa-solid fa-circle-check"></i></span>
                                     </div>
                                    <!-- input field -->
                                </div>
                        </div>
                    <!-- content -->
                     <div class="content" id="appoinment">
                        <!-- box -->
                        <div class="schedule box border-none" style="padding-bottom: 0;">
                            <div class="stext">
                                <h4>{{translate('Time Slot')}}</h4>
                                <h6>
                                    <span id="prev-date"><i class="fa-solid fa-caret-left"></i></span>
                                    <span id="current-date">{{ now()->format('l, F j, Y') }}</span>
                                    <span id="next-date"><i class="fa-solid fa-caret-right"></i></span>
                                </h6>
                            </div>
                            <ul class="stime" id="timeSlots">
                                <!-- Time slots will be injected here -->
                            </ul>
                        </div>

                        <!-- end box -->
                     </div>
                    <!-- end content -->

                    <!-- content -->
                     <div class="content">
                        <!-- map -->
                        <div class="box map" id="location">
                            <div class="row a-center">
                                <div class="col-sm-6">
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($user->address) }}" target="_blank">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2760.529421936095!2d6.111138675501008!3d46.21981548270795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c6497d1b1b3e7%3A0x3e7f8d3d9eed8837!2sAv.%20Louis-Casa%C3%AF%2027%2C%201216%20Gen%C3%A8ve%2C%20Switzerland!5e0!3m2!1sen!2s!4v1717501475101!5m2!1sen!2s"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </a>
                                </div>
                                <div class="col-sm-6">
                                    <h4>{{ translate('Map and access information') }}</h4>
                                    <p>{{ $user->address }}</p>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($user->address) }}" target="_blank">
                        <button class="btn btn-danger w-100 map-btn">{{ translate('View on Google Map') }}</button>
                    </a>
                                </div>
                            </div>
                         </div>
                        <!-- end map -->
                     </div>
         
                  
                    <div class="faq-container">
                        @foreach ($faqQuestions as $question)
                        <div class="faq-item">
                            <div class="faq-question" data-question-id="{{ $question->id }}" data-user-id="{{ $user->id }}">
                                <span>{{translate($question->question) }}</span>
                                <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                            </div>
                            <div class="faq-answer" id="faq-list-{{ $question->id }}">
                                @foreach ($question->answers as $answer)
                                {{ $answer->answer }}
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- end content -->
                 </div>
                <!-- end right content -->
            </div>
        </div>
        <div class="add-banner">
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
 </section>
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateElement = document.getElementById('current-date');
        let currentDate = new Date(dateElement.textContent);

        document.getElementById('prev-date').addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() - 1);
            updateDateDisplay();
        });

        document.getElementById('next-date').addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() + 1);
            updateDateDisplay();
        });

        function updateDateDisplay() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            dateElement.textContent = currentDate.toLocaleDateString('en-US', options);
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
$(document).ready(function () {
    var userId = {{ $user->id }};
    let currentDate = moment().format('YYYY-MM-DD');
    console.log(currentDate);
    console.log(userId);

    function formatDisplayDate(date) {
        return moment(date).format('dddd, MMMM D, YYYY');
    }

    function fetchTimeSlots(date) {
        $.ajax({
            url: '/get-time-slots',
            method: 'GET',
            data: { date: date, user_id: userId },
            success: function (response) {
                if (response.timeSlots && response.timeSlots.length > 0) {
                    let slotsHtml = '';
                    response.timeSlots.forEach((slot, index) => {
                        slotsHtml += `
                            <li data-slot-id="${slot.id}" data-date="${slot.date}" data-time="${slot.from_time}">
                                <input type="hidden" id="radio${index + 1}" name="slot_id" value="${slot.id}" data-date="${slot.date}" data-time="${slot.from_time}" class="selector-item_radio">
                                ${moment(slot.from_time, 'HH:mm:ss').format('h:mm A')}
                            </li>`;
                    });
                    $('#timeSlots').html(slotsHtml);
                } else {
                    $('#timeSlots').html('No time slots available');
                }
            },
            error: function () {
                $('#timeSlots').html('No time slots available');
            }
        });
    }

    // Initialize with the current date
    fetchTimeSlots(currentDate);
    $('#current-date').text(formatDisplayDate(currentDate));

    $('#prev-date').on('click', function (e) {
        e.preventDefault();
        currentDate = moment(currentDate).subtract(1, 'days').format('YYYY-MM-DD');
        $('#current-date').text(formatDisplayDate(currentDate));
        fetchTimeSlots(currentDate);
    });

    $('#next-date').on('click', function (e) {
        e.preventDefault();
        currentDate = moment(currentDate).add(1, 'days').format('YYYY-MM-DD');
        $('#current-date').text(formatDisplayDate(currentDate));
        fetchTimeSlots(currentDate);
    });

    // Handle click on time slot
    $(document).on('click', '#timeSlots li', function () {
        const slotId = $(this).data('slot-id');
        const specialty = document.getElementById('specialty').value;
        const visitReason = document.getElementById('visit-reason').value;

        $(this).find('input[type="radio"]').prop('checked', true);
        // Send data to the server to set session variables
        $.ajax({
            url: '{{ route("storeUserIdInSession") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                user_id: userId,
                slot_id: slotId,
                specialty: specialty,
                visit_reason: visitReason
            },
            success: function (response) {
                // Redirect to patient booking page
                window.location.href = '{{ route("patientBooking") }}';
            },
            error: function () {
                alert('Error setting session data.');
            }
        });
    });
    
});



document.addEventListener('DOMContentLoaded', function () {
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', function () {
                const questionId = this.getAttribute('data-question-id');
                const userId = this.getAttribute('data-user-id');
                const answerContainer = document.getElementById(`faq-list-${questionId}`);
                const icon = this.querySelector('.faq-icon i');

                // Close all other answers
                const openAnswers = document.querySelectorAll('.faq-answer');
                openAnswers.forEach(answer => {
                    if (answer.id !== `faq-list-${questionId}`) {
                        answer.style.display = 'none';
                        answer.dataset.loaded = false;
                    }
                });

                // Toggle current answer display
                const isOpen = answerContainer.style.display === 'block';
                answerContainer.style.display = isOpen ? 'none' : 'block';
                icon.classList.toggle('open', !isOpen);
                icon.classList.toggle('fa-chevron-down', isOpen);
                icon.classList.toggle('fa-chevron-up', !isOpen);

                // If not already loaded
                if (!answerContainer.dataset.loaded) {
                    fetch(`/faq/answers?question_id=${questionId}&user_id=${userId}`)
                        .then(response => response.json())
                        .then(data => {
                            answerContainer.innerHTML = data.answer;
                            answerContainer.dataset.loaded = true; // Mark as loaded
                        });
                }
            });
        });
    });


</script>



@endsection
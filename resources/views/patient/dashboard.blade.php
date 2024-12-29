@extends('patient.layouts.app')
@section('content')
<style>
  /* Custom style for calendar event dates */
  .cal-event {
      background-color: rgb(59, 130, 246) !important; /* Same as primaryColor */
      color: white !important;
      border-radius: 50%; /* To make it look like a full circle */
      border: none;
  }
  
  /* Optional: Customize hover state for event dates */
  .cal-event:hover {
      background-color: rgb(45, 105, 200); /* A darker shade on hover */
      cursor: pointer;
  }
  </style>
 <!-- Welcome Message -->
 <div class="bd-welcome-message">
  <div class="d-flex">
    <h2>Welcome Back!</h2>
    <img src="{{ asset('assets/patient-panel/new-d/images/hello.png') }}" alt="Hello Image" />
  </div>
  <p id="greeting-message"></p> <!-- Empty initially, to be filled by JS -->
</div>
<!-- /Welcome Message -->

<!-- STATUS CARDS -->
<div class="container-fuild">
  <div class="row">
    <div class="col-md-12 col-xxl-4">
      <div class="bd-user-card">
          @if($latestBooking)
              <div class="card shadow-lg">
                  <div class="card-heading">
                      <h4>{{ translate('Upcoming Appointments') }}</h4>
                      <span>{{ translate('Scheduled Appointments') }}</span>
                  </div>
  
                  @php
                      // Initialize images
                      $femaleImages = glob(public_path('assets/home/imgs/female-avi/*.jpg'));
                      $maleImages = glob(public_path('assets/home/imgs/male-avi/*.jpg'));
  
                      // Convert absolute paths to relative URLs and normalize slashes
                      $femaleImages = array_map(function($path) {
                          return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
                      }, $femaleImages);
  
                      $maleImages = array_map(function($path) {
                          return str_replace('\\', '/', str_replace(public_path(), '', $path)); // Normalize slashes
                      }, $maleImages);
  
                      // Date and time processing
                      $bookingDate = \Carbon\Carbon::parse($latestBooking->booking_date); // Parse booking date
                      $fromTime = \Carbon\Carbon::parse($latestBooking->from_time); // Parse from_time
                      $formattedTime = $fromTime->format('g:i A'); // Format time to 12-hour format
                      $now = \Carbon\Carbon::now(); // Get current date and time
                  @endphp
  
                  <div class="bd-card-body">
                      <div class="card-stats">
                          @if($latestBooking->user->gender == "female")
                              <img src="{{ $latestBooking->user->profile_pic ? asset('images/users/' . $latestBooking->user->profile_pic) : getRandomImage($femaleImages) }}">
                          @else
                              <img src="{{ $latestBooking->user->profile_pic ? asset('images/users/' . $latestBooking->user->profile_pic) : getRandomImage($maleImages) }}">
                          @endif
  
                          <div>
                              <h4>{{ $latestBooking->user->title }} {{ $latestBooking->user->first_name }} {{ $latestBooking->user->last_name }}</h4> <!-- Show the doctor's name -->
                              <span>{{ $latestBooking->user->specialty->name ?? 'N/A' }}</span> <!-- Optional: Show specialization -->
  
                              <span class="text-primary">
                                  @if($fromTime->isToday() && $fromTime->isFuture())
                                      Today @ {{ $formattedTime }}
                                  @elseif($fromTime->isTomorrow() && $fromTime->isFuture())
                                      Tomorrow @ {{ $formattedTime }}
                                  @elseif($fromTime->isFuture())
                                      {{ $bookingDate->format('F j, Y') }} @ {{ $formattedTime }} <!-- Format as: September 14, 2024 -->
                                  @else
                                      Appointment has passed.
                                  @endif
                              </span>
  
                              <span>{{ $latestBooking->user->address ?? 'Clinic Address' }}</span> <!-- Show clinic address -->
                          </div>
                      </div>
                  </div>
              </div>
          @else
              <p>No upcoming appointments.</p>
          @endif
      </div>
  </div>
  
  
    <div class="col-md-6 col-lg-3 col-xxl-2 d-flex">
      <div class="card bd-status-card bd-shadow-xs">
        <img
          class="appointment-pending"
          src="{{ asset('assets/patient-panel/new-d/images/hourglass.png') }}"
          alt=""
        />
        <span>Appointment Pending</span>
        <h4 class="mb-0 text-primary counter-count">{{ $pendingCount }}</h4>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xxl-2 d-flex">
      <div class="card bd-status-card bd-shadow-xs">
        <img class="appointment-cancel" src="{{ asset('assets/patient-panel/new-d/images/close.png') }}" alt="" />
        <span>Appointment Cancelled</span>
        <h4 class="mb-0 text-danger counter-count">{{$cancelledCount}}</h4>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xxl-2 d-flex">
      <div class="card bd-status-card bd-shadow-xs">
        <img
          class="appointment-completed"
          src="{{ asset('assets/patient-panel/new-d/images/completed.png') }}"
          alt=""
        />
        <span>Appointment Completed</span>
        <h4 class="mb-0 text-success counter-count">{{ $completedCount }}</h4>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xxl-2 d-flex">
      <div class="card bd-status-card bd-shadow-xs">
        <img
          class="appointment-resheduled"
          src="{{ asset('assets/patient-panel/new-d/images/rescheduled.png') }}"
          alt=""
        />
        <span>Appointment Rescheduled</span>
        <h4 class="mb-0 text-warning counter-count">{{$rescheduledCount}}</h4>
      </div>
    </div>
  </div>
</div>
<!-- /STATUS CARDS -->

<!-- GRAPH AND BLOG LIST -->
<div class="row mt-4 mb-4">
  <div class="col-xl-8">
    <h5 class="">List of appointments</h5>

    <div class="bd-appointment-list-wrapper">
      <div class="bd-calender-wrapper">
        <div id="color-calendar"></div>
      </div>
      <div class="appointment-list-wrapper">
        <ul class="appointment-list gap-2 d-flex flex-column">
            <!-- List items will be dynamically added here by JavaScript -->
        </ul>
    </div>
    </div>
  </div>
  <div class="col-xl-4">
    <h5>Upcoming Medince to Take</h5>
    <div class="bd-medicine-wrapper">
      <p class="mb-1">Today • 2:00PM</p>
      <div class="bd-medicine d-flex gap-2 flex-column">
        <div
          class="bd-medicine-item d-flex justify-content-between align-items-center"
        >
          <div
            class="d-flex justify-content-between gap-3 align-items-center"
          >
            <p class="mb-0">01</p>
            <div class="d-flex justify-content-between">
              <span class="mx-3">Omega 3</span>
              <span><em>2.5</em>&nbsp;mg</span>
            </div>
          </div>
          <div class="img-wrapper">
            <img class="img-fluid" src="images/D3.png" alt="" />
          </div>
        </div>
        <div
          class="bd-medicine-item d-flex justify-content-between align-items-center"
        >
          <div
            class="d-flex justify-content-between gap-3 align-items-center"
          >
            <p class="mb-0">01</p>
            <div class="d-flex justify-content-between">
              <span class="mx-3">Omega 3</span>
              <span><em>2.5</em>&nbsp;mg</span>
            </div>
          </div>
          <div class="img-wrapper">
            <img class="img-fluid" src="images/c.png" alt="" />
          </div>
        </div>
        <div
          class="bd-medicine-item d-flex justify-content-between align-items-center"
        >
          <div
            class="d-flex justify-content-between gap-3 align-items-center"
          >
            <p class="mb-0">01</p>
            <div class="d-flex justify-content-between">
              <span class="mx-3">Omega 3</span>
              <span><em>2.5</em>&nbsp;mg</span>
            </div>
          </div>
          <div class="img-wrapper">
            <img class="img-fluid" src="images/cap.png" alt="" />
          </div>
        </div>
      </div>
      <p class="mt-3 text-muted">Today • 9:00PM</p>
      <div class="bd-medicine d-flex gap-2 flex-column">
        <div
          class="bd-medicine-item d-flex justify-content-between align-items-center"
        >
          <div
            class="d-flex justify-content-between gap-3 align-items-center"
          >
            <p class="mb-0">01</p>
            <div class="d-flex justify-content-between">
              <span class="mx-3">Omega 3</span>
              <span><em>2.5</em>&nbsp;mg</span>
            </div>
          </div>
          <div class="img-wrapper">
            <img class="img-fluid" src="images/D3.png" alt="" />
          </div>
        </div>
        <div
          class="bd-medicine-item d-flex justify-content-between align-items-center"
        >
          <div
            class="d-flex justify-content-between gap-3 align-items-center"
          >
            <p class="mb-0">01</p>
            <div class="d-flex justify-content-between">
              <span class="mx-3">Omega 3</span>
              <span><em>2.5</em>&nbsp;mg</span>
            </div>
          </div>
          <div class="img-wrapper">
            <img class="img-fluid" src="images/D3.png" alt="" />
          </div>
        </div>
        <div
          class="bd-medicine-item d-flex justify-content-between align-items-center"
        >
          <div
            class="d-flex justify-content-between gap-3 align-items-center"
          >
            <p class="mb-0">01</p>
            <div class="d-flex justify-content-between">
              <span class="mx-3">Omega 3</span>
              <span><em>2.5</em>&nbsp;mg</span>
            </div>
          </div>
          <div class="img-wrapper">
            <img class="img-fluid" src="images/D3.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')

<script>
  $(document).ready(function() {
    // Test alert to check if the script is running
    
    function extractAndConvertTime(datetime) {
    // Extract the time part from the datetime string
    let timePart = datetime.split(' ')[1];
    
    // Convert the 24-hour format time to 12-hour format with AM/PM
    return convertTo12HourFormat(timePart);
}

function convertTo12HourFormat(time) {
    const [hour, minute] = time.split(':');
    let period = 'AM';
    let adjustedHour = parseInt(hour);

    if (adjustedHour >= 12) {
        period = 'PM';
        if (adjustedHour > 12) {
            adjustedHour -= 12;
        }
    } else if (adjustedHour === 0) {
        adjustedHour = 12;
    }

    return `${adjustedHour.toString().padStart(2, '0')}:${minute} ${period}`;
}

    function loadPendingBookings() {
      $.ajax({
          url: '{{ route('getPatientsPendingBookings') }}',
          method: 'GET',
          success: function(data) {
              let appointmentList = $('.appointment-list');
              appointmentList.empty();  // Clear existing list

              $.each(data, function(index, booking) {
                  let date = new Date(booking.booking_date).toLocaleDateString();
                  let time = extractAndConvertTime(booking.from_time);
                  let status = booking.booking_status === null ? 'Pending' : booking.booking_status;
                  let doctorName = booking.user.first_name + ' ' + booking.user.last_name;
                  let doctorId = booking.user_id;
                  let specialty = booking.specialty.name;
                  let bookingId = booking.id;
                  let doctorAvailabilityUrl = `{{ url('doctor-availability') }}/${doctorId}`;
                  let profilePic = booking.user.profile_pic 
                    ? `{{ asset('images/users/') }}/${booking.user.profile_pic}` 
                    : (booking.user.gender === 'female' 
                        ? `{{ asset('assets/home/imgs/female-avi/f3.jpg') }}`
                        : `{{ asset('assets/home/imgs/male-avi/male-avi2.jpg') }}`);
                  // Append new list item
                  appointmentList.append(`
                      <li class="appointment-list-item">
                           <img src="${profilePic}" alt="Doctor's Profile Picture" class="doctor-image" />
                          <div class="right-items">
                              <div class="item-meta">
                                  <h5>${doctorName}</h5>
                                  <p>${specialty}</p>
                                  <p class="text-primary mt-2">${date} - ${time}</p>
                              </div>
                              <div>
                                  <span class="status ${status.toLowerCase()}">${status}</span>
                                  <button class="btn btn-link p-1" data-bs-toggle="dropdown">
                                      <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <mask id="mask0_379_7" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="25" height="25">
                                              <rect x="0.201538" y="0.542603" width="24" height="24" fill="#D9D9D9" />
                                          </mask>
                                          <g mask="url(#mask0_379_7)">
                                               <path
                                        d="M12.2015 20.5426C11.6515 20.5426 11.1807 20.3468 10.789 19.9551C10.3974 19.5634 10.2015 19.0926 10.2015 18.5426C10.2015 17.9926 10.3974 17.5218 10.789 17.1301C11.1807 16.7384 11.6515 16.5426 12.2015 16.5426C12.7515 16.5426 13.2224 16.7384 13.614 17.1301C14.0057 17.5218 14.2015 17.9926 14.2015 18.5426C14.2015 19.0926 14.0057 19.5634 13.614 19.9551C13.2224 20.3468 12.7515 20.5426 12.2015 20.5426ZM12.2015 14.5426C11.6515 14.5426 11.1807 14.3468 10.789 13.9551C10.3974 13.5634 10.2015 13.0926 10.2015 12.5426C10.2015 11.9926 10.3974 11.5218 10.789 11.1301C11.1807 10.7384 11.6515 10.5426 12.2015 10.5426C12.7515 10.5426 13.2224 10.7384 13.614 11.1301C14.0057 11.5218 14.2015 11.9926 14.2015 12.5426C14.2015 13.0926 14.0057 13.5634 13.614 13.9551C13.2224 14.3468 12.7515 14.5426 12.2015 14.5426ZM12.2015 8.5426C11.6515 8.5426 11.1807 8.34677 10.789 7.9551C10.3974 7.56344 10.2015 7.0926 10.2015 6.5426C10.2015 5.9926 10.3974 5.52177 10.789 5.1301C11.1807 4.73844 11.6515 4.5426 12.2015 4.5426C12.7515 4.5426 13.2224 4.73844 13.614 5.1301C14.0057 5.52177 14.2015 5.9926 14.2015 6.5426C14.2015 7.0926 14.0057 7.56344 13.614 7.9551C13.2224 8.34677 12.7515 8.5426 12.2015 8.5426Z"
                                        fill="#878787"
                                      />
                                          </g>
                                      </svg>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-end bd-dropdown-menu">
                                      <li><a class="dropdown-item add-fav-doctor" href="#" data-id="${doctorId}">Add to Favorite</a></li>
                                      <li><a class="dropdown-item cancel-booking" href="#" data-id="${bookingId}">Cancel</a></li>
                                      <li><a class="dropdown-item" href="#">Set Reminder</a></li>
                                      <li><a class="dropdown-item" href="${doctorAvailabilityUrl}">Book Appointment</a></li>
                                  </ul>
                              </div>
                          </div>
                      </li>
                  `);
              });
          }
      });
    }

    // Call the function to load pending bookings
    loadPendingBookings();

    // Cancel booking functionality
    $(document).on('click', '.cancel-booking', function(e) {
        e.preventDefault();
        let bookingId = $(this).data('id');

        $.ajax({
            url: '{{ route('bookingCancelledBypatient') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                booking_id: bookingId,
                status: 'cancelled'
            },
            success: function(response) {
                if (response.success) {
                    loadPendingBookings();  // Reload the bookings
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('Failed to update booking status.');
            }
        });
    });

    // Add doctor to favorites functionality
    $(document).on('click', '.add-fav-doctor', function(e) {
        e.preventDefault();

        let doctorId = $(this).data('id');
        let button = $(this);

        button.prop('disabled', true);

        $.ajax({
            url: '{{ route('addfavdoctor') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                doctor_id: doctorId
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('The doctor is already in favorites.');
            },
            complete: function() {
                button.prop('disabled', false);
            }
        });
    });

  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      // Fetch booking dates for the current month from the server
      fetch('{{ route('getBookingsCurrentMonth') }}')
          .then(response => response.json())
          .then(bookingDates => {
              // Prepare events data for the calendar
              const events = bookingDates.map(date => ({
                  start: new Date(date + 'T00:00:00'),
                  end: new Date(date + 'T23:59:59'),
                  title: 'Booking'
              }));
  
              // Initialize the calendar with event data and custom options
              let calB = new Calendar({
                  id: "#color-calendar",
                  theme: "glass",
                  primaryColor: "rgb(59, 130, 246)",
                  headerBackgroundColor: "rgb(59, 130, 246)",
                  calendarSize: "small",
                  layoutModifiers: ["month-left-align"],
                  eventsData: events
              });
          })
          .catch(error => {
              console.error("Error fetching booking dates: ", error);
          });
  });



    // Function to detect the current time and update the greeting message
    function updateGreeting() {
    const now = new Date();
    const hours = now.getHours();
    let greeting;

    if (hours < 12) {
      greeting = "Good Morning!";
    } else if (hours < 18) {
      greeting = "Good Afternoon!";
    } else {
      greeting = "Good Evening!";
    }

    // Update the greeting message in the <p> tag
    document.getElementById('greeting-message').textContent = greeting;
  }

  // Call the function to update the greeting when the page loads
  document.addEventListener('DOMContentLoaded', updateGreeting);
  </script>

@endsection
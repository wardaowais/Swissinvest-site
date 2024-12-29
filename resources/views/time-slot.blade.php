@extends('layouts.app')
@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>

</head>
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


.date-navigation {
    display: flex;
    justify-content: space-between; /* Space between elements */
    align-items: center;
    background-color: #E8F1F5; /* Light background color */
    padding: 10px 20px; /* Add padding for better spacing */
    border-radius: 12px;
    width: 100%; /* Full width */
    box-sizing: border-box; /* Ensure padding doesn't exceed width */
}

.nav-btn {
    background-color: white;
    /* border: none; */
    padding: 5px 10px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.today-btn {
    display: flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 12px;
    margin: 0 10px;
    cursor: pointer;
}

.today-btn img {
    width: 20px;
    height: 20px;
    margin-left: 8px; /* Space between icon and text */
}

select {
    background-color: white;
    border: none;
    padding: 5px;
    margin: 0 5px;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    font-size: 14px;
}

select:focus {
    outline: none;
}



.fc-toolbar.fc-header-toolbar {
    margin-bottom: 1em;
    /* display: none; */
}

.large-radio {
    width: 20px; /* Adjust width as needed */
    height: 20px; /* Adjust height as needed */
    cursor: pointer; /* Change cursor to pointer for better UX */
  }
  .fc-left{
    margin-top:1pc;
    padding-left: 1pc;
  }
  .fc-center{
    padding-top: 1pc;
  }
  .fc .fc-toolbar>*>:first-child {
    margin-left: 0;
    font-size: 20px;
    background: center;
}
.fc-right{
    padding-top: 1pc !important; 
    padding-right: 1pc;

}

.fc .fc-button-group>:first-child {
    margin-left: 0;
    background: #3A87AD;
    color: white;
}

.fc .fc-button-group>* {
    float: left;
    margin: 0 0 0 -1px;
    background: #3A87AD;
    color: white;
}
.fc-agendaWeek-button {
    background: #3A87AD !important;
    color: white;
}
.table td.current-day {
    background-color: #3A87AD;
    color: white !important;
    border-radius: 50%;
}

.large-radio {
    width: 20px; /* Adjust width as needed */
    height: 20px; /* Adjust height as needed */
    cursor: pointer; /* Change cursor to pointer for better UX */
  }

  .message-bubble {
    background-color: #f1f1f1;
    border-radius: 15px;
    padding: 15px;
    border: 1px solid #ddd;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 16px;
}

.sms-btn {
    border-radius: 50px;
    padding: 8px 20px;
    font-size: 16px;
}

h3 {
    font-weight: bold;
}

.message-bubble p {
    margin: 0;
}

/* Styled select dropdown */
.styled-select select {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 8px 12px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    appearance: none; /* Remove default arrow */
    width: 100%;
    color: #495057;
}

/* Custom arrow */
.styled-select {
    position: relative;
}

.styled-select::after {
    content: "▼";
    font-size: 12px;
    color: #888;
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
}

/* Radio button styling */
.large-radio {
    transform: scale(1.3);
    margin-right: 5px;
}

.radio-label {
    position: relative;
    top: -3px;
    font-size: 15px;
}

.calendar-container {
    max-width: 400px;
    background-color: white;
    border-radius: 12px !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
}

.document_single {
    background: white;
    border-radius: 20px;
    border: none;
}

#day-view, #week-view, #month-view{
    background: #3A87AD;
    color: white;
    border:none;
}

</style>

<div class="container-fluid px-md-5">
    <div class="marquee-area">
        <ul>
          <li><span>Page Feature:</span></li>
          <li><p><marquee behavior="" direction=""> Keeps members informed about relevant events and opportunities.</marquee></p></li>
      </ul>
    </div>
    <img class="mt-3" src="{{ asset('assets/doctor-panel/imgs/dashboard/main.png') }}" alt="" style="width: 100%">

    <div class="row">
       <div class="container-fluid mb-2">
        {{-- <div class="row align-items-center mb-2">
            <div class="col-md-6">
                <h3 class="mt-3">Time Slot Management</h3>
            </div>
            <div class="col-md-3">
                <!-- Styled Select Dropdown -->
                <div class="styled-select">
                    <select class="form-select" aria-label="Time Slot Options">
                        <option selected>Select a time slot</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex justify-content-between">
                    <div class="mt-2">
                        <!-- Radio Button 1 -->
                        <label>
                            <input type="radio" name="slotOption" value="option1" class="large-radio"> 
                            <span class="radio-label">Option 1</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <!-- Radio Button 2 -->
                        <label>
                            <input type="radio" name="slotOption" value="option2" class="large-radio"> 
                            <span class="radio-label">Option 2</span>
                        </label>
                    </div>
                </div>
            </div>
        </div> --}}
        
              
                <div class="row align-items-center mb-2">
                    <div class="col-md-4">
                        <h3 class="mt-3">Time Slot Management</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="message-bubble mt-3">
                            <p>Here you can manage your time slots efficiently. Choose the appropriate time slots for your appointments and ensure that all bookings are handled seamlessly.</p>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <button class="btn btn-danger sms-btn mt-3">Send SMS</button>
                    </div>
                </div>
        
        
        

        <div class="row">
            <div class="col-md-3 ">

                    <!-- doc profile -->
         @include('myprofilesidebar')
    		</div>

        <div class="col-md-6  mt-3" >
            <div class="row">
                <!-- Slider Section (8 columns wide) -->
                <div class="col-md-12">
        
                    <div class="document_single" >
                        <div style="    float: right;margin-top: 1pc;margin-right:1pc;">
                            <button id="day-view">Day</button>
                            <button id="week-view">Week</button>
                            <button id="month-view">Month</button>
                        </div>
                        <div id="calendar"></div>
                    </div>

        
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-center mt-3">
                <div
                  class="calendar-container p-2 rounded shadow"
                  style="border-radius: 20px"
                >
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <button
                      class="btn btn-outline-secondary"
                      id="prev-month"
                    >
                      &lt;
                    </button>
                    <h4 id="month-year" class="mb-0"></h4>
                    <button
                      class="btn btn-outline-secondary"
                      id="next-month"
                    >
                      &gt;
                    </button>
                  </div>

                  <table class="table table-borderless text-center">
                    <thead>
                      <tr class="text-secondary">
                        <th>S</th>
                        <th>M</th>
                        <th>T</th>
                        <th>W</th>
                        <th>T</th>
                        <th>F</th>
                        <th>S</th>
                      </tr>
                    </thead>
                    <tbody id="calendar-body"></tbody>
                  </table>

                  <div>
                    <h5 class="text-black mb-0">
                      <strong>Appointments</strong> 
                    </h5>
                    <p class="text-black mb-0 mt-2">
                       No Appointment Found
                    </p>
                  </div>
                </div>
              </div>
        </div>
        </div>
    
        </div>
        <div class="section_top_img col-md-12">
            <img src="{{ asset('assets/doctor-panel/imgs/slider-footer.png') }}" alt="" class="img-fuild" style="width: 100%">

        </div>
    </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/doctor-panel/js/jquery.min.js') }}"></script>
<!-- bootstrap js -->


<script src="{{ asset('assets/doctor-panel/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
    $(document).ready(function() {
        const calendarEl = $('#calendar');
    
        // Function to refresh events on the calendar
        function refreshCalendar() {
            $.ajax({
                url: '{{ route("index.timeSlot") }}', 
                method: 'GET',
                success: function(response) {
                    calendarEl.fullCalendar('removeEvents');
                    calendarEl.fullCalendar('addEventSource', response);
                    calendarEl.fullCalendar('refetchEvents');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    
        // Initialize FullCalendar with default settings
        $.ajax({
            url: '{{ route("index.timeSlot") }}',
            method: 'GET',
            success: function(response) {
                calendarEl.fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: '' // Remove default right controls to use custom view buttons
                    },
                    views: {
                        month: { 
                            columnFormat: 'ddd' // Short day name (e.g., "Sun", "Mon") in month view
                        },
                        agendaWeek: { 
                            columnFormat: 'ddd' // Short day name (e.g., "Sun", "Mon") in week view
                        },
                        agendaDay: {
                            columnFormat: 'dddd' // Full day name (e.g., "Sunday") in day view
                        }
                    },
                    defaultView: 'agendaWeek', // Set the initial view to week
                    events: response,
                    timeZone: 'local',
                    slotDuration: '00:30:00',
                    selectable: true,
                    selectHelper: true,
                    editable: true,
                    eventLimit: true,
                    slotEventOverlap: false,
                    eventOverlap: false,
                    minTime: '08:00:00',
                    maxTime: '21:00:00',
                    allDaySlot: false,
                    select: function(start, end) {
                        // Handle selection for creating time slots
                        const startDateTime = start.format();
                        const endDateTime = end.format();
    
                        $.ajax({
                            url: '{{ route("store.time.slot") }}',
                            method: 'POST',
                            data: {
                                start_datetime: startDateTime,
                                end_datetime: endDateTime,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                alert(response.message);
                                calendarEl.fullCalendar('refetchEvents');
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
    
                        calendarEl.fullCalendar('unselect');
                    },
                    eventRender: function(event, element) {
                        element.addClass('booked');
                    },
                    defaultDate: new Date() // Initialize to today's date
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    
        // Event listeners for custom view buttons
        $('#day-view').click(function() {
            calendarEl.fullCalendar('changeView', 'agendaDay');
        });
    
        $('#week-view').click(function() {
            calendarEl.fullCalendar('changeView', 'agendaWeek');
        });
    
        $('#month-view').click(function() {
            calendarEl.fullCalendar('changeView', 'month');
        });
    });
    </script>


  @endsection


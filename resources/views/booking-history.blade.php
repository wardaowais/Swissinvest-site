
@extends('layouts.app')

@section('content')


<style type="text/css">
@media screen and (max-width: 600px) {
  table {
    border: 0;
  }
  
  .table-row td {
    text-align: center;
    vertical-align: revert;
    text-align: right !important;
    width: 100%;
    height: 100%;
}

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table .table-row td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table .table-row td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 15px;
  }
  
  table .table-row td:last-child {
    border-bottom: 0;
  }
}
.card-body
{
	height : auto !important
}

@media screen and (-webkit-min-device-pixel-ratio: 0) and (min-resolution: 0.001dpcm) {
  #bookingDate {
    margin-right: 10px;
  }

  #filterButton {
    margin-top: 0;
  }
}
</style>
      
<div class="my-dashboard">
<div class="container-fluid">
<div class="page-feature">
            <span class="feature-text">Page Feature:</span>
            <span>Please leave your feedback for the better services</span>
        </div>
<div class="mt-2">
        <div class="card p-2">
            <div class="d-block d-md-flex d-lg-flex justify-content-between align-items-center">
                <h3 class="patient-txt">{{translate('List of Booking')}}</h3>
                <ol class="list-inline mb-3 mb-md-0 d-flex align-items-center">
                    <li class="list-inline-item me-2">
                        <input type="date" id="bookingDate" class="form-control" placeholder="dd/mm/yyyy">
                    </li>
                    <li class="list-inline-item">
                        <button id="filterButton" class="btn btn-danger">Filter</button>
                    </li>
                </ol>
            </div>

            <div class="card-body p-0">
                <div class="card-header rounded m-1">
                    <h5>{{translate('Patient Request')}}</h5>
                </div>
                <div class="">
                    <table class="table table-borderless text-center" id="pendingbookingList">
                        <thead class="table-header">
                            <tr>
                                <th scope="col">{{ translate('Booking ID') }}</th>
                                <th scope="col"  style="text-align: left">{{ translate('Patient Name') }}</th>
                                <th scope="col"  style="text-align: left">{{ translate('Patient Type') }}</th>
                                <th scope="col">{{ translate('Type') }}</th>
                                <th scope="col">{{ translate('Date') }}</th>
                                <th scope="col">{{ translate('Time') }}</th>
                                <th scope="col">{{ translate('Status') }}</th>
                                <th scope="col">{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="card  p-2 mt-4">

	        <div class="card-body py-0 px-0">
	            <div class="card-header text-black rounded m-1">
	                <h5>List of Booking</h5>
	            </div>
	            <div class="table-responsive">
	                <table class="table table-borderless text-center" id="bookingLists">
	                    <thead class="table-header">
	                        <tr>
	                            <th scope="col">{{ translate('Booking ID') }}</th>
                                <th scope="col" style="text-align: left">{{ translate('Patient Name') }}</th>
                                <th scope="col"  style="text-align: left">{{ translate('Patient Type') }}</th>
                                <th scope="col">{{ translate('Type') }}</th>
                                <th scope="col">{{ translate('Date') }}</th>
                                <th scope="col">{{ translate('Time') }}</th>
                                <th scope="col">{{ translate('Status') }}</th>
                               
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr class="table-row">
	                            <td data-label="{{ translate('Booking ID') }}"><span class="pill">928210</span></td>
	                            <td data-label="{{ translate('Patient Name') }}"><span class="pill">Shehbaz</span></td>
	                            <td data-label="{{ translate('Type') }}"><span class="pill">On_Site</span></td>
	                            <td data-label="{{ translate('Date') }}"><span class="pill">08 Oct 2024</span></td>
	                            <td data-label="{{ translate('Time') }}"><span class="pill">05:45 AM</span></td>
	                            <td data-label="{{ translate('Status') }}"><span class="pill">Attended</span></td>
	                        </tr>
	                        
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
    </div>
 
                
</div> 
<div class="section_top_img col-md-12">
    <img src="{{ asset('assets/doctor-panel/imgs/dashboard/Group-2147224826.png') }}" alt="" class="img-fuild">
</div>
</div>            
@endsection



@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    console.log('test');

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
function loadBookingHistory(date = null) {
	console.log('work');
    $.ajax({
        url: '{{ route('getBookingHistory') }}',
        method: 'GET',
        data: { date: date }, // Pass the date parameter
        success: function(data) {
            let tbody = $('#bookingLists tbody');
            tbody.empty();

            $.each(data, function(index, booking) {
                let bookingDate = new Date(booking.booking_date).toLocaleDateString();
                let time = extractAndConvertTime(booking.from_time);
                let status = booking.status === null ? 'Pending' : booking.status;

                tbody.append(`
                    <tr class="table-row">
                        <td data-label="{{ translate('Booking ID') }}"><span class="pill">#${booking.id}</span></td>
                        <td data-label="{{ translate('Patient Name') }}" style="text-align:left"><span style="background:transparent;" class="pill"><a href="#" class="table_anchor" data-booking-id="${booking.id}">${booking.patient.first_name}</a></span></td>
                        <td data-label="{{ translate('Patient Type') }}"  style="text-align:left"><span style="background:transparent;"  class="pill">${booking.specialty.name}</span></td>
                         <td data-label="{{ translate('Type') }}"><span class="pill">${booking.payment_method}</span></td>
                        <td data-label="{{ translate('Date') }}"><span class="pill">${bookingDate}</span></td>
                        <td data-label="{{ translate('Time') }}"><span class="pill">${time}</span></td>
                        <td data-label="{{ translate('Status') }}"><span class="pill"><span class="status">${status}</span></span></td>
                    </tr>
                `);
            });
            
        }
    });
}

$('#filterButton').click(function() {
    let selectedDate = $('#bookingDate').val();
    loadBookingHistory(selectedDate);
});

// Initial load
loadBookingHistory();

});




</script>





<script>
    $(document).ready(function() {
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

        // Usage in your AJAX success function
        function loadPendingBookings() {
            $.ajax({
                url: '{{ route('getPendingBookings') }}',
                method: 'GET',
                success: function(data) {
                    console.log(data); // Log the data to inspect it

                    let tbody = $('#pendingbookingList tbody');
                    tbody.empty();

                    $.each(data, function(index, booking) {
                        let date = new Date(booking.booking_date).toLocaleDateString();
                        let time = extractAndConvertTime(booking.from_time);
                        let status = booking.status === null ? 'Pending' : booking.status;
                        tbody.append(`
                <tr class="table-row"> 
                    <td data-label="{{ translate('Booking ID') }}"><span class="pill">#${booking.id}</span></td>
                    <td data-label="{{ translate('Patient Name') }}" style="text-align:left"><a href="#" class="table_anchor" data-booking-id="${booking.id}">${booking.patient.first_name}</a></td>
                    <td style="text-align:left" data-label="{{ translate('Patient Name') }}">${booking.specialty.name}</td>

                     <td data-label="{{ translate('Type') }}"><span class="pill">${booking.payment_method}</span></td>
                    <td data-label="{{ translate('Date') }}"><span class="pill">${date}</span></td>
                    <td data-label="{{ translate('Time') }}"><span class="pill">${time}</span></td>
                    <td data-label="{{ translate('Status') }}"><span class="status"><span class="pill">${status}</span></span></td>
                   <td style="vertical-align: unset;" data-label="{{ translate('Action') }}">
                    <div class="dcontent dropdown">
                        <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item view-details" href="#" data-id="${booking.id}">View Details</a></li>
                            <li><a class="dropdown-item accept-booking" href="#" data-id="${booking.id}" data-status="accept">Accept</a></li>
                            <li><a class="dropdown-item cancel-booking" href="#" data-id="${booking.id}" data-status="cancel">Cancel</a></li>
                        </ul>
                    </div>
                </td>
           </tr>
            `);
                    });
                }
            });
        }

        // Call the function to load pending bookings
        loadPendingBookings();

        // Function to open booking details modal
        function openBookingDetailsModal(bookingId) {
            $.ajax({
                url: `/get-booking-details/${bookingId}`, // Replace with actual route to fetch booking details
                method: 'GET',
                success: function(bookingDetails) {
                    $('#bookingDetailsContent').html(`
                <p><strong>Booking ID:</strong> ${bookingDetails.id}</p>
                <p><strong>Patient Name:</strong> ${bookingDetails.patient.first_name}</p>
                  <p><strong>Patient Gender:</strong> ${bookingDetails.patient.gender || 'NILL'}</p>
                
                <p><strong>Patient Reason:</strong> ${bookingDetails.reason || 'NILL'}</p>
                <p><strong>Date:</strong> ${new Date(bookingDetails.booking_date).toLocaleDateString()}</p>
                <p><strong>Time:</strong> ${convertTo12HourFormat(bookingDetails.from_time)}</p>
                <p><strong>Status:</strong> ${bookingDetails.status === null ? 'Pending' : bookingDetails.status}</p>
            `);

                    $('#bookingDetailsModal').modal('show');
                },
                error: function() {
                    alert('Failed to fetch booking details.');
                }
            });
        }

        // Click event handler for accepting bookings
        $(document).on('click', '.accept-booking', function(e) {
            // alert('test')
            e.preventDefault();
            let bookingId = $(this).data('id');
            let status = $(this).data('status');

            console.log(status);

            $.ajax({
                url: '{{ route('updateBookingStatus') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    booking_id: bookingId,
                    status: 'accepted'
                },
                success: function(response) {
                    if (response.success) {
                        loadPendingBookings();
                    } else {
                        alert('Failed to update booking status.');
                    }
                },
                error: function() {
                    alert('Failed to update booking status.');
                }
            });
        });

        $(document).on('click', '.cancel-booking', function(e) {
            e.preventDefault();
            let bookingId = $(this).data('id');
            let status = $(this).data('status');

            console.log(status);
            $.ajax({
                url: '{{ route('updateBookingStatus') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    booking_id: bookingId,
                    status: 'cancelled'
                },
                success: function(response) {
                    if (response.success) {
                        loadPendingBookings();
                    } else {
                        alert('Failed to update booking status.');
                    }
                },
                error: function() {
                    alert('Failed to update booking status.');
                }
            });
        });

        // booking details
        $(document).on('click', '.view-details', function(e) {
            e.preventDefault();
            let bookingId = $(this).data('id');
            openBookingDetailsModal(bookingId);
        });
    });
</script>
@endsection
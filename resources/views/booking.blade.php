
@extends('layouts.app')

@section('content')
<div class="my-dashboard">
                <div class="row">
                    <div class="col-md-12">
                        <!-- dash content -->
                         <div class="dash-content">
                            <!-- hading -->
                             <div class="heading">
                                <h4>{{translate('Booking List')}}</h4>
                                <ol>
                                <li><input type="date" id="bookingDate" placeholder="dd/mm/yyyy"></li>
                                    <li><button id="filterButton" class="btn btn-primary">{{translate('Filter')}}</button>
                                   
                                    
                                </ol>
                             </div>
                            <!-- end heading -->
                            <!-- dash ad -->
                             <div class="dash-ad">
                                <img src="imgs/ad-big.png" alt="">
                             </div>
                            <!-- end dash ad -->

                            <!-- booking list -->
                             <div class="booking-list">
                                <h5>{{translate('Patient Request')}}</h5>
                                <!-- table -->
                                 <table id="bookingLists">
                                 <thead>
                                    <tr>
                                    <th scope="col">{{ translate('Booking ID') }}</th>
                                    <th scope="col">{{ translate('Patient Name') }}</th>
                                    <th scope="col">{{ translate('Type') }}</th>
                                    <th scope="col">{{ translate('Date') }}</th>
                                    <th scope="col">{{ translate('Time') }}</th>
                                    <th scope="col">{{ translate('Status') }}</th>
                                    <th scope="col">{{ translate('Action') }}</th>
                                    </tr>
                            </thead>
                                    <tbody>
                                <!-- Data will be loaded here via AJAX -->
                            </tbody>
                                 </table>
                                <!-- end table -->
                             </div>
                            <!-- end booking list -->

                         </div>
                        <!-- end dash content -->
                    </div>
                </div>
             </div>
@endsection

@section('scripts')

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
function loadPendingBookings(date = null) {
    $.ajax({
        url: '{{ route('getBookinglist') }}',
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
                    <tr>
                        <td>#${booking.id}</td>
                        <td><a href="#"  class="table_anchor" data-booking-id="${booking.id}">${booking.patient.first_name}</a></td>
                        <td>${booking.specialty.name}</td>
                        <td>${bookingDate}</td>
                        <td>${time}</td>
                        <td><span class="status">${status}</span></td>
                        <td style="vertical-align: unset;">
                            <div class="dcontent">
                                <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li><a class="dropdown-item view-details" href="#" data-id="${booking.id}">View Details</a></li>
                                    <li><a class="dropdown-item accept-booking" href="#" data-id="${booking.id}">Accept</a></li>
                                    <li><a class="dropdown-item cancel-booking" href="#" data-id="${booking.id}">Cancel</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                `);
            });
        }
    });
}

$('#filterButton').click(function() {
    let selectedDate = $('#bookingDate').val();
    loadPendingBookings(selectedDate);
});

// Initial load
loadPendingBookings();


    // loadPendingBookings();

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
                    <p><strong>Patient Category:</strong> ${bookingDetails.patient_category || 'NILL'}</p>
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
        e.preventDefault();
        let bookingId = $(this).data('id');

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
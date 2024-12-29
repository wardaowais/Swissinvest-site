@extends('patient.layouts.app')

@section('content')
<div class="my-dashboard">
                <div class="row">
                    <div class="col-md-12">
                        <!-- dash content -->
                         <div class="dash-content">
                            <!-- hading -->
                            <div class="heading">
                                <h4>Booking Hystory</h4>
                                <ol>
                                <li><input type="date" id="bookingDate" placeholder="dd/mm/yyyy"></li>
                                    <li><button id="filterButton" class="btn btn-primary">Filter</button></li>
                                   
                                    
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
                                <h5>Patient Request</h5>
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
function loadBookingHistory(date = null) {
    $.ajax({
        url: '{{ route('getPatientBookingHistory') }}',
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
                        <td><a href="#" class="table_anchor" data-booking-id="${booking.id}">${booking.user.first_name} ${booking.user.last_name}</a></td>
                        <td>${booking.specialty.name}</td>
                        <td>${bookingDate}</td>
                        <td>${time}</td>
                        <td><span class="status">${status}</span></td>
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

@endsection
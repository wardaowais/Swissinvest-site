@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="page-feature mb-4">
            <span>Page Feature:</span>
            <div class="content">
                <p>Keeps members informed
                    about relevant events and
                    opportunities.</p>
            </div>
        </div>

        <img class="mb-4" src="{{ asset('assets/doctor-panel/imgs/dashboard/main.png') }}" draggable="false"
            alt="dashboard image" style="width: 100%; height:300px;object-fit: cover;border-radius: 20px;overflow:hidden;">

        <div class="row mb-5">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-4">
                        <div class="why-us-box">
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/onsite.png') }}" alt="Ads Management"
                                style="align-self: center">
                            <p class="text-center small">On Site Consultation</p>
                            <h5 class="text-center" style="font-size:30px;">45</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="why-us-box">
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/call.png') }}" alt="Ads Management"
                                style="align-self: center">
                            <p class="text-center small">Remote Consultation</p>
                            <h5 class="text-center" style="font-size:30px;">55</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="why-us-box">
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/patient.png') }}" alt="Ads Management"
                                style="align-self: center">
                            <p class="text-center small">Total Patients</p>
                            <h5 class="text-center" style="font-size:30px;">40</h5>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="review-box">
                            <div class="review-header">
                                <h4>Caroline</h4>
                                <img src="{{ asset('assets/doctor-panel/imgs/dashboard/star.png')}}" width="120"
                                    alt="reviews">
                            </div>
                            <div class="review-body">
                                <p>"I am a dedicated dentist, specializing in providing comprehensive oral care
                                    and treatment for healthy smiles</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-danger btn-sm px-1">Book your Appointment</a>
                                </div>
                            </div>
                        </div>
                        <div class="doctor-assets">
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/doc-asset-1.png') }}" alt="">
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/doc-asset-2.png') }}" class="flip-x" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="doc-images">
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bg.png') }}" class="bg-re"
                                alt="">
                            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/doc.png') }}" class=""
                                alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row mt-3">
                    <h1><b>Premium Feature</b></h1>
                    <p>Join and get premium Feature</p>
                    <div class="connect-box mt-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="sync_cards">
                                    <div class="content ">
                                        <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/managment.png"
                                            alt="Ads Management">
                                        <h6>Ads Management</h6>
                                        <p>Promote your services with targeted ads
                                            to reach more patients and grow your
                                            practice.</p>
                                        <a href="#" class="btn btn-danger">Start
                                            Advertising</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="sync_cards">
                                    <div class="content ">
                                        <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/personal.png"
                                            alt="Personal Web Page">
                                        <h6>Personal Web Page</h6>
                                        <p>Create and manage your personalized
                                            healthcare webpage to enhance your
                                            online presence.</p>
                                        <a href="#" class="btn btn-danger">Create
                                            Web Page</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-6 col-md-6">
                                <div class="sync_cards">
                                    <div class="content ">
                                        <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/health.png"
                                            alt="Health Care Hiring">
                                        <h6>Health Care Hiring</h6>
                                        <p>Promote your services with targeted ads
                                            to reach more patients and grow your
                                            practice.</p>
                                        <a href="#" class="btn btn-danger">Find A
                                            Job</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="sync_cards">
                                    <div class="content ">
                                        <img src="https://doctomed.ch/assets/doctor-panel/imgs/dashboard/real.png"
                                            alt="Real Time Chat">
                                        <h6>Real Time Chat</h6>
                                        <p>Communicate instantly with patients for
                                            consultations, follow-ups, and
                                            inquiries.</p>
                                        <a href="#" class="btn btn-danger">Start
                                            Chatting</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <h2 class="text-center mb-0 fw-semibold">Member Booking</h2>
            <p class="text-center">
                Patients listed for on-site consultations and check-ups as
                per the daily appointments.
            </p>
            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/memberbooking.PNG') }}" draggable="false" alt=""
                class="w-100">
        </div>
        @if($user->role == "institute")
        <div class="mb-5">
            <div class="section-header">
                <h2 class="text-center mb-0 fw-semibold">Institute Booking</h2>
                <p class="text-center">
                    Patients listed for on-site consultations and check-ups as
                    per the daily appointments.
                </p>
            </div>

            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/insituitebooking.PNG') }}" draggable="false"
                alt="" class="w-100">
        </div>
        @endif
        <h2 class="text-center">Upcoming Medical Events</h2>
        <p class="text-center mb-4">Patients listed for on-site consultations and
            check-ups as per the daily appointments.</p>

        <div class="row mb-5 g-0 p-4 custom-bg-light" style="border-radius: 20px;">
            <div class="col-md-6 mb-md-0 mb-3">
                <div class="col-md-12 mb-md-0 mb-3">
                    <div class="chart-card">
                        <div class="card-body p-0 px-3">
                            <h5 class="text-left mt-4 fw-semibold">
                                Booking History
                            </h5>

                            <!-- Row for both charts -->
                            <div class="row">
                                <!-- First chart (Young Patients) -->
                                <div class="col-md-6">
                                    <div class="chart-container pb-2">
                                        <canvas id="myChart" height="400" style="height: 270px;"></canvas>
                                    </div>
                                    <div class="canvas-lebel">
                                        <p class="text-center">76% Young Patients
                                        </p>
                                    </div>
                                </div>

                                <!-- Second chart (Elderly Patients) -->
                                <div class="col-md-6">
                                    <div class="chart-container pb-2">
                                        <canvas id="secondChart" height="200" style="height: 150px;"></canvas>
                                    </div>
                                    <div class="canvas-lebel">
                                        <p class="text-center">34% Elderly Patients
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ps-md-4">
                <div class="calendar-container">
                    <table class="calendar">
                        <thead>
                            <tr>
                                <th colspan="7" style="color: black;" id="month-year" class="text-center">
                                    October 2024</th>
                            </tr>
                            <tr>
                                <th class="sunday">S</th>
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

                    <div class="calendar-footer mt-3">
                        <div class="mb-1">
                            <span class="small time-text custom-text-primary">10:00 am</span>
                            <span>Dial into morning check-in</span>
                        </div>
                        <div class="mb-1">
                            <span class="small time-text custom-text-primary">80:00 am</span>
                            <span>Take Ellie for a walk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img class="mb-4" src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" draggable="false"
            alt="dashboard image"
            style="width: 100%; height:300px;object-fit: cover;border-radius: 20px;overflow:hidden;">

    </div>
    
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <script>
        // Custom plugin to display the total value at the center of the chart
        Chart.register({
            id: 'centerTextPlugin',
            afterDraw: function(chart) {
                if (chart.config.options.elements.center) {
                    var ctx = chart.ctx;
                    var centerConfig = chart.config.options.elements.center;
                    var fontStyle = centerConfig.fontStyle || 'Arial';
                    var txt = centerConfig.text;
                    var color = centerConfig.color || '#000';
                    var maxFontSize = centerConfig.maxFontSize || 75;
                    var sidePadding = centerConfig.sidePadding || 20;
                    var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2);

                    ctx.font = "bold " + maxFontSize + "px " + fontStyle;

                    var stringWidth = ctx.measureText(txt).width;
                    var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

                    // Find the width of the string and set the font size accordingly
                    var widthRatio = elementWidth / stringWidth;
                    var newFontSize = Math.floor(maxFontSize * widthRatio);
                    var elementHeight = (chart.innerRadius * 2);

                    // Set the font to the newly calculated size
                    ctx.font = newFontSize + "px " + fontStyle;
                    ctx.fillStyle = color;

                    // Draw text in the center
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
                    var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
                    ctx.fillText(txt, centerX, centerY);
                }
            }
        });

        // First chart (Young Patients - 76%)
        const ctx1 = document.getElementById('myChart').getContext('2d');
        const myDoughnutChart1 = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [76, 24], // Data values for each section
                    backgroundColor: ['#50CDFF', '#FF0000'], // Updated colors
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                elements: {
                    center: {
                        text: '76%', // This text will appear at the center
                        color: '#000', // Text color
                        fontStyle: 'Arial', // Font family
                        sidePadding: 20, // Padding on sides
                        maxFontSize: 50 // Max font size
                    }
                }
            },
            plugins: ['centerTextPlugin'] // Removed ChartDataLabels
        });

        // Second smaller chart (Elderly Patients - 34%)
        const ctx2 = document.getElementById('secondChart').getContext('2d');
        const myDoughnutChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [34, 66], // Data values for each section
                    backgroundColor: ['#50CDFF', '#FF0000'], // Updated colors
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                elements: {
                    center: {
                        text: '34%', // This text will appear at the center
                        color: '#000', // Text color
                        fontStyle: 'Arial', // Font family
                        sidePadding: 20, // Padding on sides
                        maxFontSize: 30 // Max font size (smaller for this chart)
                    }
                }
            },
            plugins: ['centerTextPlugin'] // Removed ChartDataLabels
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

                        let tbody = $('#bookingLists tbody');
                        tbody.empty();

                        $.each(data, function(index, booking) {
                            let date = new Date(booking.booking_date).toLocaleDateString();
                            let time = extractAndConvertTime(booking.from_time);
                            let status = booking.status === null ? 'Pending' : booking.status;

                            tbody.append(`
                    <tr> 
                        <td>#${booking.id}</td>
                        <td><a href="#" class="table_anchor" data-booking-id="${booking.id}">${booking.patient.first_name}</a></td>
                        <td>${booking.specialty.name}</td>
                        <td>${date}</td>
                        <td>${time}</td>
                        <td><span class="status">${status}</span></td>
                        <td style="vertical-align: unset;">
                            <div class="dcontent">
                                <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
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

    <script>
        // const currentDate = new Date();
        let selectedDate = null;

        function generateCalendar(month, year) {
            const monthYearElement = document.getElementById('month-year');
            const calendarBody = document.getElementById('calendar-body');
            calendarBody.innerHTML = ''; // Clear the current calendar

            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const firstDayOfMonth = new Date(year, month, 1).getDay();

            // Set month and year in the header
            monthYearElement.textContent = `${monthNames[month]} ${year}`;

            let date = 1;
            for (let i = 0; i < 6; i++) { // 6 rows max
                let row = document.createElement('tr');

                for (let j = 0; j < 7; j++) { // 7 columns (days)
                    let cell = document.createElement('td');

                    if (i === 0 && j < firstDayOfMonth) {
                        cell.innerHTML = ''; // Empty cell before first day of the month
                    } else if (date > daysInMonth) {
                        break; // Exit loop if date exceeds the month days
                    } else {
                        cell.innerHTML = date;

                        // Change the color for Sundays
                        if (j === 0) {
                            cell.classList.add('sunday'); // Sundays in red
                        }

                        // Check if it's the current day
                        if (date === currentDate.getDate() && month === currentDate.getMonth() && year === currentDate
                            .getFullYear()) {
                            cell.classList.add('current-day'); // Add class for the current day
                        }

                        // Add click event for selecting the date
                        cell.addEventListener('click', function() {
                            if (selectedDate) {
                                selectedDate.classList.remove('selected');
                            }
                            cell.classList.add('selected');
                            selectedDate = cell;
                        });

                        date++;
                    }

                    row.appendChild(cell);
                }

                calendarBody.appendChild(row);
            }
        }

        // Initialize the calendar with current month and year
        generateCalendar(currentDate.getMonth(), currentDate.getFullYear());
    </script>
@endsection

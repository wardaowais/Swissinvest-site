@extends('layouts.app')

@section('content')
<style>

    .user-profile {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-header {
        display: inline-block;
        margin-bottom: 20px;
    }

    .member-profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .user-details {
        list-style-type: none;
        padding: 0;
        margin: 0;
        text-align: left;
        max-width: 400px;
        margin: 0 auto;
    }

    .user-details li {
        margin-bottom: 10px;
        font-size: 16px;
    }

    .user-details strong {
        font-weight: 600;
    }

    .btn-secondary {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #6c757d;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .dash-content {
        margin-top: 30px;
    }

    .fheading h4 {
        font-size: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .document_single {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #calendar {
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
    }
</style>

<style type="text/css">
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

td.fc-head-container.fc-widget-header {
    background: #E8F1F5;
    padding: 1pc;
    font-size: large;
}
th.fc-day-header.fc-widget-header.fc-sun {
    background: white;
    padding: 1pc;
    font-size: large;
}
th.fc-day-header.fc-widget-header.fc-mon {
    background: white;
    padding: 17px;
    font-size: large;
}

th.fc-day-header.fc-widget-header.fc-mon  {
    background: white !important;
    padding: 17px;
    font-size: large;
}


th.fc-day-header.fc-widget-header.fc-tue{
    background: white !important;
    padding: 17px;
    font-size: large;
}
th.fc-day-header.fc-widget-header.fc-wed {
    background: white !important;
    padding: 17px;
    font-size: large;
}
th.fc-day-header.fc-widget-header.fc-thu.fc-today {
    background: white !important;
    padding: 17px;
    font-size: large;
}

th.fc-day-header.fc-widget-header.fc-tue{
    background: white;
    padding: 17px;
    font-size: large;
}

th.fc-day-header.fc-widget-header.fc-wed {
    background: white;
    padding: 17px;
    font-size: large;
}


th.fc-day-header.fc-widget-header.fc-thu {
    background: white;
    padding: 17px;
    font-size: large;
}

th.fc-day-header.fc-widget-header.fc-fri {
    background: white;
    padding: 23px;
    font-size: large;
}
th.fc-day-header.fc-widget-header.fc-sat {
    background: white;
    padding: 22px;
    font-size: large;
}
.fc-time-grid .fc-slats td {
    height: 1.5em;
    border-bottom: 0;
    padding: 10px;
}
td.fc-axis.fc-time.fc-widget-content {
    width: 30px !important;
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
    border: none;
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
    display: none;
}
</style>
<div class="main-content">
       
        <div class="my-dashboard">
<div class="marquee-area">
                  <ul>
                    <li><span>Page Feature :</span></li>
                    <li><p><marquee behavior="" direction=""> Members can link their profile to other applications like
                                                Allomed (telemedicine) with a single click. All relevant data is
                                                transferred automatically,</marquee></p></li>
                  </ul>
        </div>
        <div class="row">
	        <div class="section_top_img col-12">
	            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/main.png') }}" alt="" class="img-fuild">
	        </div>
        </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <!-- dash content -->
                        <div class="dash-content">
                            <!-- hading -->
                            <div class="heading">
                                <h4>{{ translate('Member Details') }}</h4>
                            </div>
                            <!-- end heading -->
                
                            <!-- booking list -->
                            <div class=" mt-4" style="background: #E8F1F5;">
                                <!-- connect box -->
                                <div class="connect-box">
                                    <form id="create-job-form" action="{{ route('group.updateMember', encrypt($member->id)) }}" method="POST" enctype="multipart/form-data" style="background-color: transparent; padding: 0px 25px;">
                                       @csrf
                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-md-6 mb-2">
                                                <div class="sync_cards">
                                                    <div class="member-content p-3" style="width: 95%;">
                                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                                            <div class="memeber-img" style="margin: 25px auto;">
                                                                @if($member->profile_pic)
													            <img src="{{ asset('images/users/' . $member->profile_pic) }}" class="rounded-img">
													            @else
													            <img src="{{ asset('assets/img/profile-img.jpg') }}" class="rounded-img">
													            @endif
                                                                
                                                            </div>
                                                            <div class="member-text mt-2">
                                                                <h5 class="d-flex align-items-baseline justify-content-center">{{ $member->first_name }} {{ $member->last_name }}</h5>
                                                               <span class="d-flex align-items-baseline justify-content-center">
                                                                    <i class="fa fa-at" aria-hidden="true"></i>
                                                                    <p class="member-padding">{{ $member->email }}</p>
                                                              </span> 
                                                               <span class="d-flex align-items-baseline justify-content-center">
                                                                    <i class="fa fa-phone phone" aria-hidden="true"></i>
                                                                    <p class="member-padding">{{ $member->phone }}</p>
                                                               </span> 
                                                               <span class="d-flex align-items-baseline justify-content-center">
                                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                    <p class="member-padding">{{ $member->address }}</p>
                                                               </span>
                                                               
                                                            </div> 
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-12" style="margin-bottom: 15px !important;"> 
                                            	<div class="dash-content" align="encter">
											        <h4>{{ translate('Time Slot Management') }}</h4>

											        <div id="calendar" style="width: 100%; height: 800px;"></div>

											      
											    </div>
                                            </div>
                                            
                                            
                                        </div>
										

                                      </form>
                                </div>
                                <!-- end connect box -->
                            </div>
                            <!-- end booking list -->
                        </div>
                        <!-- end dash content -->
                    </div>
                </div>
   
                <div class="section_top_img col-12">
		            <img src="{{ asset('assets/doctor-panel/imgs/dashboard/bottom-banners.jpeg') }}" alt="" class="img-fuild">
		        </div>
             </div>
       
    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
     document.querySelector('input[name="fax_phone_number"]').addEventListener('input', function(e) {
        const value = e.target.value;

        // Automatically convert leading 0 to +41
        if (value.startsWith('0') && value.length >= 10) {
            const newValue = '+41' + value.slice(1);
            e.target.value = newValue.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }

        const regex = /^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;
        if (value !== '' && !regex.test(value)) {
            e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
        } else {
            e.target.setCustomValidity('');
        }
    });
    document.querySelector('input[name="fax_number"]').addEventListener('input', function(e) {
        const value = e.target.value;

// Automatically convert leading 0 to +41
        if (value.startsWith('0') && value.length >= 10) {
            const newValue = '+41' + value.slice(1);
            e.target.value = newValue.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }

        const regex = /^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;
        if (value !== '' && !regex.test(value)) {
            e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
        } else {
            e.target.setCustomValidity('');
        }
    });
    document.querySelector('input[name="phone"]').addEventListener('input', function(e) {
        const value = e.target.value;

        // Automatically convert leading 0 to +41
        if (value.startsWith('0') && value.length >= 10) {
            const newValue = '+41' + value.slice(1);
            e.target.value = newValue.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }

        const regex = /^\+41[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;
        if (value !== '' && !regex.test(value)) {
            e.target.setCustomValidity('Please enter the phone number in the format +41XX XXX XX XX');
        } else {
            e.target.setCustomValidity('');
        }
    });

    document.querySelector('input[name="phone"]').addEventListener('invalid', function(e) {
        if (e.target.value === '') {
            e.target.setCustomValidity('');
        }
    });
    

</script>
<script>
$(document).ready(function() {

    $('#js--specialties-multi-select').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Add Specialties",
            allowClear: true
        });
        $('#js--sxpertise-multi-select').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Add Specialties",
            allowClear: true
        });
        $('#js--languages-multi-select').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "Add Languages",
            allowClear: true
        });
   
    $('#uploadIcon').on('click', function() {
                $('#imageUpload').click();
            });

            $('#imageUpload').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);

                    var formData = new FormData();
                    formData.append('profile_pic', file);
                    formData.append('member_id', '{{ encrypt($member->id) }}');
                  
                    
                    $.ajax({
                        url: '{{ route('group.uploadMemberProfilePic') }}',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#imagePreview').attr('src', response.profile_pic_url);
                                location.reload();
                            } else {
                                alert('Failed to update profile picture.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while uploading the profile picture.');
                        }
                    });
                }
            });
});


</script>

<script>
function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

window.onload = function() {
    @if(session('success'))
        document.getElementById('popup-message').innerText = "{{ session('success') }}";
        document.getElementById('popup').style.display = 'block';
    @elseif(session('error'))
        document.getElementById('popup-message').innerText = "{{ session('error') }}";
        document.getElementById('popup').style.display = 'block';
    @endif
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
function refreshCalendar(userId) {
    $.ajax({
        url: '{{ route('group.user.timeSlot', $member->id) }}', 
        method: 'GET',
        success: function(response) {
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', response);
            $('#calendar').fullCalendar('refetchEvents');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'agendaWeek'
        },
        timeZone: 'local', 
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: '{{ route('group.user.timeSlot', $member->id) }}',
                method: 'GET',
                success: function(response) {
                    callback(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        },
        slotDuration: '00:30:00',
        defaultView: 'agendaWeek',
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
            var startDateTime = start.format(); 
            var endDateTime = end.format();

            $.ajax({
                url: '{{ route('store.group.user.timeSlot', $member->id) }}',
                method: 'POST',
                data: {
                    start_datetime: startDateTime,
                    end_datetime: endDateTime,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    $('#calendar').fullCalendar('refetchEvents');
                    refreshCalendar(userId);
                },
                error: function(xhr, status, error) {
                    console.error(error); 
                    alert(xhr.responseJSON.message);
                }
            });

            $('#calendar').fullCalendar('unselect');
        },
        eventRender: function(event, element) {
            element.addClass('booked'); 
        },
        defaultDate: new Date()
    });
});
</script>
@endsection



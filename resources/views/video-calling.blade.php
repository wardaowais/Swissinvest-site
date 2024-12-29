@extends('layouts.app')

@section('content')
<style>


</style>
<div class="row">
    <object data="{{ route('startMeet') }}" type="text/html" width="100%" height="600px"></object>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <p id="timer"></p>
            <div class="modal-body p-0" align="center">
                <img style="margin-top: 0;" src="{{ asset($user->profile_pic ? 'images/users/' . $user->profile_pic : 'images/users/avatar.jpg') }}" 
                 class="rounded-circle" 
                 height="500px" 
                 width="500px">
            </div>
            <!-- Close button -->
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 d-none" aria-label="Close"></button>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
$(document).ready(function(){

    $.ajax({
        url: '{{ route("checkad") }}',
        type: 'GET',
        success: function(response) {
            if (response.ads_times) {
                var intervalInMinutes = response.ads_times; // Interval in minutes
                var intervalInMilliseconds = intervalInMinutes * 60 * 1000; // Convert to milliseconds
                plans(intervalInMilliseconds); 
                console.error('active subscription');              
            } else {
                var interval = 5000;
                plans(interval);
                console.error('No active subscription');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });

    function plans(interval){
        var modal = $('#exampleModal');
        var closeButton = modal.find('.btn-close'); // Get the close button
        var timerElement = $('#timer'); // Get the timer element
        modal.modal({ backdrop: 'static', keyboard: false }); // Initialize modal

        setInterval(function () {
            modal.modal('show'); 
        }, interval);

        var secondsLeft = 10;
        var timerInterval;
        modal.on('shown.bs.modal', function (e) { // When modal is shown
            secondsLeft = 10; // Reset the countdown
            updateTimer(); // Update the timer display
            clearInterval(timerInterval); // Clear any existing timer
            timerInterval = setInterval(function () {
                secondsLeft--;
                updateTimer(); // Update the timer display

                if (secondsLeft <= 0) {
                    clearInterval(timerInterval); // Stop the timer when it reaches 0
                    closeButton.removeClass('d-none'); // Show the close button
                }
            }, 1000);
        });

        closeButton.on('click', function() { // When close button is clicked
            clearInterval(timerInterval); // Stop the timer
            modal.modal('hide'); // Hide the modal
        });

        modal.on('hidden.bs.modal', function (e) { // When modal is hidden
            closeButton.addClass('d-none'); // Hide the close button
        });

        function updateTimer() {
            var minutes = Math.floor(secondsLeft / 60);
            var seconds = secondsLeft % 60;
            timerElement.text(minutes + ':' + (seconds < 10 ? '0' : '') + seconds); // Update the timer display
        }
    }

});
</script>







@endsection

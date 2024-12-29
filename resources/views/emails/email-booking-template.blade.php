<!DOCTYPE html>
<html>
<head>
    <title>Appointment Request</title>
</head>
<body>
    <p>Dear Dr. {{ $doctor_name }},</p>

    <p>We are pleased to inform you that a new appointment has been requested by a patient through the Allomed platform. Please find the details of the booking below:</p>

    <p><strong>Patient Information:</strong></p>
    <p><strong>Patient Name:</strong> {{ $patient_name }}</p>
    <p><strong>Patient Email:</strong> {{ $patient_email }}</p>

    <p><strong>Appointment Details:</strong></p>
    <p><strong>Date:</strong> {{ $bookingDate }}</p>
    <p><strong>Time:</strong> {{ $fromTime }}</p>
 
    <p><strong>To review and accept this booking, please click on the link below:</strong> </p>


    <p><strong>Login URL:</strong> <a href="{{ $url }}">Click here to log in to Allomed</a></p>

    <p>If you have any questions or need assistance, please feel free to contact us at  allomedirectory@gmail.com.</p>

    <p>Thank you for being a part of the Allomed community and for your dedication to providing excellent care to your patients.</p>

    <p>Best regards,</p>

    <p>Allomed Support Team<br>
    allomedirectory@gmail.com<br>
    <a href="https://doctors.allomed.ch/">https://doctors.allomed.ch/</a></p>
</body>
</html>

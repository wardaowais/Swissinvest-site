<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <p>Dear {{ $patient_name }},</p>

    <p>We are pleased to inform you that your appointment request with Dr. {{ $doctor_name }} has been confirmed. Please find the details of your appointment below:</p>

    <p><strong>Appointment Details::</strong></p>
    <p><strong>Doctor Name:</strong>Dr. {{ $doctor_name }}</p>
    <p><strong>Date:</strong> {{ $bookingDate }}</p>
    <p><strong>Time:</strong> {{ $fromTime }}</p>
    <p><strong>Doctor Location:</strong> {{ $doctor_address }}</p>

    <p>If you have any questions or need to reschedule, please feel free to contact us at  allomedirectory@gmail.com.</p>

    <p>Thank you for using Allomed Doctor Directory. We look forward to assisting you with your healthcare needs.</p>

    <p>Best regards,</p>

    <p>Allomed Support Team<br>
    allomedirectory@gmail.com<br>
    <a href="https://doctors.allomed.ch/">https://doctors.allomed.ch/</a></p>
</body>
</html>

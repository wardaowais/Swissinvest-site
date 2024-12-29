<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <p>Dear {{ $patient_name }},</p>

    <p>We are regret to inform you that your appointment request with Dr. {{ $doctor_name }} could not be confirmed at this time. Please find the details of your request below:</p>
    <p><strong>Requested Appointment Details::</strong></p>
    <p><strong>Doctor Name:</strong>Dr. {{ $doctor_name }}</p>
    <p><strong>Date:</strong> {{ $bookingDate }}</p>
    <p><strong>Time:</strong> {{ $fromTime }}</p>


    <p>We encourage you to book another appointment through the Allomed Doctor Directory. If you have any questions or need assistance, please feel free to contact us at allomedirectory@gmail.com.</p>

    <p>Thank you for using Allomed Doctor Directory. We apologize for any inconvenience and hope to assist you with your healthcare needs soon.</p>

    <p>Best regards,</p>

    <p>Allomed Support Team<br>
    allomedirectory@gmail.com<br>
    <a href="https://doctors.allomed.ch/">https://doctors.allomed.ch/</a></p>
</body>
</html>

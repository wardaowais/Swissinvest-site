<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Allomed Doctor Directory - Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #0bbaac;
            color: #ffffff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .card {
            padding: 20px;
            border: 1px solid #ddd;
            border: #0bbaac;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
        .footer {
            background-color: #0bbaac;
            color: #ffffff;
            padding: 15px;
            border-radius: 0 0 8px 8px;
            text-align: center;
        }
        .footer a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }
        .footer p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Allomed Doctor Directory</h1>
        </div>

        <div class="card">
        <p>Greetings,</p>
        <p>{{ $body }}</p>
        </div>

        <p>Best Regards,</p>
        <p><strong>{{ $title }} {{ $first_name }} {{ $last_name }}</strong></p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Address:</strong> {{ $address }}</p>

        <div class="footer">
            <p>For more information, visit our website:</p>
            <a href="https://doctors.allomed.ch/">https://doctors.allomed.ch/</a>
        </div>
    </div>
</body>
</html>

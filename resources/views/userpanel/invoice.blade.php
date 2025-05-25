<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Light background for contrast */
        }
        .container {
            background-color: #ffffff; /* White background for the invoice */
            padding: 15px; /* Reduced padding */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto; /* Reduced margin */
            max-width: 600px; /* Set a maximum width */
        }
        h1 {
            color: #343a40; /* Darker color for headings */
            margin-bottom: 15px; /* Reduced bottom margin */
            font-size: 22px; /* Reduced font size */
        }
        p {
            font-size: 14px; /* Decreased font size for better compactness */
            margin: 5px 0; /* Reduced margins */
        }
        strong {
            color: #495057; /* Slightly lighter color for strong text */
        }
        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border: none;
            padding: 5px 10px; /* Adjusted padding */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .btn-center {
            display: block; /* Make the button a block element */
            margin: 20px auto; /* Center the button horizontally */
            text-align: center; /* Center text within the button */
        }
        .alert {
            margin: 10px 0; /* Reduced margin */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Appointment Invoice</h1>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <p><strong>Appointment ID:</strong> {{ $appointment->id }}</p>
        <p><strong>Patient Name:</strong> {{ $appointment->patient_name }}</p>
        <p><strong>Doctor:</strong> {{ $appointment->doctor->first_name . ' ' . $appointment->doctor->last_name }}</p>
        <p><strong>Department:</strong> {{ $appointment->department->department_name }}</p>
        <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
        <p><strong>Time:</strong> {{ $appointment->appointment_time }}</p>
        <p><strong>Status:</strong> {{ $appointment->status }}</p>

        <h3 class="text-center mt-3">Thank you for choosing our health care services!</h3>
        <a href="{{ url('/') }}" class="btn btn-primary btn-center">Back to Home</a>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

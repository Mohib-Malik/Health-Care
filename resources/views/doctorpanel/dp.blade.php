<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Favicon -->
     <link href="img/favicon.ico" rel="icon">

     <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  
 
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
 
     <!-- Libraries Stylesheet -->
     <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
 
     <!-- Customized Bootstrap Stylesheet -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
 
     <!-- Template Stylesheet -->
     <link href="css/style.css" rel="stylesheet">

     <!-- Doctor Css -->
    <style>
        .panel-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        .appointment-table {
            margin-top: 30px;
        }
        .panel-footer {
            margin-top: 50px;
            text-align: center;
            padding: 10px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    
      <!-- Navbar Start -->
      <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="{{url('/')}}" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Health Care</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href=" {{url('/')}}" class="nav-item nav-link ">Home</a>
                        <a href=" {{url('/about')}}" class="nav-item nav-link active">About</a>
                        <a href="{{url('/service')}}" class="nav-item nav-link">Service</a>
                        <a href="{{url('/price')}}" class="nav-item nav-link">Pricing</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{url('/details')}}" class="dropdown-item">Blog Detail</a>
                                <a href="{{url('/team')}}" class="dropdown-item">The Team</a>
                                <a href="{{url('/find-doctor')}}" class="dropdown-item">Find Doctor</a>
                                
                            </div>
                        </div>
                        <a href="{{url('/contact')}}" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <div class="container my-5">
        <!-- Doctor Panel Header -->
        <div class="panel-header">
            <h1>Doctor's Appointment Panel</h1>
        </div>

        <!-- Appointments Table -->
        <div class="appointment-table">
            <h4>Your Appointments</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody id="appointmentData">
                    <!-- Appointment rows will be dynamically added here -->
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="panel-footer">
            <p>Contact administration for further assistance.</p>
            <button class="btn btn-primary" onclick="logout()">Logout</button>
        </div>
    </div>

    <!-- Doctor Js Start -->
    <script>
        // Doctor's name from localStorage (or you can hardcode it if needed)
        document.getElementById('doctorName').textContent = localStorage.getItem('doctor') || 'John Doe';

        // Mock data for appointments (you can replace this with data from a database or an API)
        const appointments = [
            { patientName: 'Ali Khan', date: '2024-10-15', time: '09:00', phone: '0321-1234567' },
            { patientName: 'Sara Ahmed', date: '2024-10-15', time: '11:30', phone: '0332-9876543' },
            { patientName: 'Usman Tariq', date: '2024-10-16', time: '14:00', phone: '0345-6789123' },
        ];

        // Function to format date to DD/MM/YYYY
        function formatDateToPakistaniFormat(dateString) {
            const date = new Date(dateString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        }

        // Function to format time to 24-hour format
        function formatTimeTo24Hour(time) {
            const [hour, minute] = time.split(':');
            return `${hour}:${minute}`;
        }

        // Function to display appointments in the table
        function displayAppointments() {
            const appointmentData = document.getElementById('appointmentData');
            appointmentData.innerHTML = ''; // Clear existing rows

            appointments.forEach((appointment, index) => {
                const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${appointment.patientName}</td>
                        <td>${formatDateToPakistaniFormat(appointment.date)}</td>
                        <td>${formatTimeTo24Hour(appointment.time)}</td>
                        <td>${appointment.phone}</td>
                    </tr>
                `;
                appointmentData.innerHTML += row;
            });
        }

        // Call the function to display appointments on page load
        displayAppointments();

        // Logout function to clear localStorage or perform any logout operations
        function logout() {
            alert('You have successfully logged out.');
            // Here you can add logic to clear local storage or redirect to the login page
            window.location.href = './login.php'; // Assuming you have a login page
        }
        function logout() {
    alert('You have successfully logged out.');
    // Clear local storage if necessary
    localStorage.clear(); // Optional: Clears all stored data (e.g., doctor's name)
    window.location.href = './index.php'; // Redirect to the index page
}
    </script>

     <!-- Doctor Js End -->

  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Get In Touch</h4>
                    <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>123 Street, Pakistan, Karachi</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>Ibrahim&Mohib@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>+92 3322460245</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{url('/')}}"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="{{url('/about')}}"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="{{url('/service')}}"><i class="fa fa-angle-right me-2"></i>Our Services</a>
                        <a class="text-light mb-2" href="{{url('/team')}}"><i class="fa fa-angle-right me-2"></i>Meet The Team</a>
                        <a class="text-light mb-2" href="{{url('/details')}}"><i class="fa fa-angle-right me-2"></i>Blog Details</a>
                        <a class="text-light" href="{{url('/contact')}}"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Popular Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{url('/')}}"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="{{url('/about')}}"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="{{url('/service')}}"><i class="fa fa-angle-right me-2"></i>Our Services</a>
                        <a class="text-light mb-2" href="{{url('/team')}}"><i class="fa fa-angle-right me-2"></i>Meet The Team</a>
                        <a class="text-light mb-2" href="{{url('/details')}}"><i class="fa fa-angle-right me-2"></i>Blog Details</a>
                        <a class="text-light" href="{{url('/contact')}}"><i class="fa fa-angle-right me-2 "></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Newsletter</h4>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-primary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" ><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" ><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" ><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" ><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" >Your Site Name</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">This Website Designed by <a class="text-primary" >M.Ibrahim @ M.Mohib Malik</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

     <!-- Template Javascript -->
     <script src="js/main.js"></script>
</body>
</html>

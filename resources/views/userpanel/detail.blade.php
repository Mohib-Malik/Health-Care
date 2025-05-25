<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Health Care</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
                        <a href=" {{url('/about')}}" class="nav-item nav-link">About</a>
                        <a href="{{url('/service')}}" class="nav-item nav-link">Service</a>
                        <a href="{{url('/price')}}" class="nav-item nav-link">Pricing</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{url('/details')}}" class="dropdown-item active">Blog Detail</a>
                                <a href="{{url('/team')}}" class="dropdown-item">The Team</a>
                                <a href="{{url('/find-doctor')}}" class="dropdown-item">Find Doctor</a>
                                
                            </div>
                        </div>
                        <a href="{{url('/contact')}}" class="nav-item nav-link">Contact</a>
                        @if (Route::has('login'))
                        @auth
                            <!-- Dropdown for authenticated users -->
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ route('profile.show') }}" class="dropdown-item">Profile</a>
                                    <!-- Logout -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                           onclick="event.preventDefault(); this.closest('form').submit();">
                                           Logout
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <!-- Dropdown for guests (Login & Register) -->
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ route('login') }}" class="dropdown-item">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                                    @endif
                                </div>
                            </div>
                        @endauth
                    @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Blog Start -->
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-100 rounded mb-5" src="img/Cardiovascular Disease.webp" alt="">
                    <h1 class="mb-4">Cardiovascular Disease: Duniya Bhar ki Sabse Aam aur Mohlik Bimari Hai</h1>
                    
                    <p>The most popular or widespread disease globally is cardiovascular disease (CVD). It refers to a group of disorders of the heart and blood vessels, including conditions such as coronary artery disease, stroke, heart failure, and hypertension (high blood pressure).</p>
                    <p>Cardiovascular diseases are primarily caused by the build-up of fatty deposits in the arteries, known as atherosclerosis, which can reduce or block blood flow to the heart and brain. This condition is often exacerbated by risk factors such as poor diet, lack of physical activity, smoking, excessive alcohol use, and obesity. Other contributing factors include high blood pressure, high cholesterol, and diabetes.
                    </p>
                    <p>Symptoms of cardiovascular disease can vary depending on the type, but they often include chest pain (angina), shortness of breath, dizziness, and fatigue. For strokes, symptoms can include sudden weakness or numbness in the face, arms, or legs, difficulty speaking, and confusion.
                    </p>
                    <P>CVD is the leading cause of death globally, accounting for more than 17 million deaths each year. Prevention strategies include promoting heart-healthy diets, regular physical activity, smoking cessation, managing stress, and regular health check-ups to monitor and control blood pressure and cholesterol levels. Early detection and treatment are critical for improving outcomes and reducing mortality rates associated with cardiovascular disease.  
                    </P>
                </div>
                <!-- Blog Detail End -->

                <!-- Comment Form Start -->
                <div class="bg-light rounded p-5">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-white mb-4">Leave a comment</h4>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control bg-white border-0" placeholder="Website" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">

                <!-- Category Start -->
                <div class="mb-5">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">services</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="h5 bg-light rounded py-2 px-3 mb-2" ><i class="fa fa-angle-right me-2"></i>Emergency Care</a>
                        <a class="h5 bg-light rounded py-2 px-3 mb-2" ><i class="fa fa-angle-right me-2"></i>Operation & Surgery</a>
                        <a class="h5 bg-light rounded py-2 px-3 mb-2" ><i class="fa fa-angle-right me-2"></i>Outdoor Checkup</a>
                        <a class="h5 bg-light rounded py-2 px-3 mb-2" ><i class="fa fa-angle-right me-2"></i>Ambulance Service</a>
                        <a class="h5 bg-light rounded py-2 px-3 mb-2" ><i class="fa fa-angle-right me-2"></i>Medicine & Pharmacy</a>
                        <a class="h5 bg-light rounded py-2 px-3 mb-2" ><i class="fa fa-angle-right me-2"></i>Blood Testing</a>
                    </div>
                </div>
                <!-- Category End -->

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">Recent Post</h4>
                    <div class="d-flex rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="img/Typhoid.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="img">
                        <a class="h5 d-flex align-items-center bg-light px-3 mb-0">Surge in Typhoid Fever Cases Sparks Health Concerns in pakistan
                        </a>
                    </div>
                    <div class="d-flex rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="img/Malaria.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="img">
                        <a  class="h5 d-flex align-items-center bg-light px-3 mb-0">Malaria Outbreak Grips Flood-Affected Areas in Pakistan
                        </a>
                    </div>
                    <div class="d-flex rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="img/Chikungunya.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="img">
                        <a  class="h5 d-flex align-items-center bg-light px-3 mb-0">Surge in Chikungunya Cases Raises Alarm in Pakistan's Urban Centers
                        </a>
                    </div>
                    <div class="d-flex rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="img/Hepatitis.webp" style="width: 100px; height: 100px; object-fit: cover;" alt="img">
                        <a  class="h5 d-flex align-items-center bg-light px-3 mb-0">
                            Rise in Hepatitis Cases Sparks Concern in Pakistan's Urban Areas
                        </a>
                    </div>
                    <div class="d-flex rounded overflow-hidden mb-3">
                        <img class="img-fluid" src="img/Tuberculosis.webp" style="width: 100px; height: 100px; object-fit: cover;" alt="img">
                        <a  class="h5 d-flex align-items-center bg-light px-3 mb-0">Surge in Tuberculosis Cases Raises Alarm in Pakistan's Urban Areas
                        </a>
                    </div>
                </div>
                <!-- Recent Post End -->

            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->
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
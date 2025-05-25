<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

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
                        <a href=" {{url('/about')}}" class="nav-item nav-link ">About</a>
                        <a href="{{url('/service')}}" class="nav-item nav-link">Service</a>
                        <a href="{{url('/price')}}" class="nav-item nav-link">Pricing</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active " data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{url('/details')}}" class="dropdown-item">Blog Detail</a>
                                <a href="{{url('/team')}}" class="dropdown-item">The Team</a>
                                <a href="{{url('/find-doctor')}}" class="dropdown-item active" >Find Doctor</a>
                                
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
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Doctors</h5>
                <h1 class="display-4">Qualified Healthcare Professionals</h1>
            </div>
            <!-- card 1 -->
            <div class="row g-5">
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 5.jpg" alt="img">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Amir Liaqat (Cardiologist)</a>
                            <p class="m-0">Dr. Amir Liaqat is a highly regarded cardiologist in Pakistan, known for his extensive experience in diagnosing and treating various cardiovascular diseases. With a focus on preventive cardiology, Dr. Liaqat has dedicated his career to improving the lives of patients with heart-related conditions, including hypertension, coronary artery disease, and arrhythmias.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                            
                        </div>
                    </div>
                </div>
                <!-- card 2 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 2.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Asim Yusuf (Psychiatrist)</a>
                            <p class="m-0">Dr. Asim Yusuf is a prominent psychiatrist in Pakistan, renowned for his expertise in mental health and his dedication to improving the quality of psychiatric care. With extensive training in psychiatry, he specializes in treating a variety of mental health conditions, In addition to his clinical practice, including depression, anxiety disorders, bipolar disorder, and schizophrenia.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                <!-- card 3 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 3.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Farid Ahmed Khan (Plastic Surgeon)</a>
                            <p class="m-0">Dr. Farid Ahmed Khan is a distinguished plastic surgeon based in Pakistan, recognized for his extensive expertise in both reconstructive and cosmetic surgery. With years of experience, he specializes in a wide range of procedures, including breast reconstruction, facial rejuvenation, burn treatments, and body contouring surgeries.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                <!-- card 4 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="./img/card 4.jpg" alt="img">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Yasmeen Rashid (Gynecologist)</a>
                            <p class="m-0">
                                Dr. Yasmeen Rashid is a prominent gynecologist and women's health advocate in Pakistan, known for her expertise in obstetrics and gynecology. With a career spanning several decades, she has dedicated herself to improving women's health through comprehensive care in areas such as prenatal and postnatal care, family planning, and the management of reproductive health disorders.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                        </div>
                    </div>
                </div>
                <!-- card 5 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 12.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Fouzia Siddiqui (Neurologist)</a>
                            <p class="m-0">Dr. Fouzia Siddiqui is a highly esteemed neurologist from Pakistan, specializing in the diagnosis and treatment of disorders affecting the brain, spinal cord, and nervous system. With expertise in managing conditions such as epilepsy, Parkinson’s disease, stroke, and neuromuscular disorders, Dr. Siddiqui is known for her comprehensive approach to neurological care.She has extensive training in both clinical neurology.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                <!-- card 6 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 15.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Farzana Bari (Public Health Expert)</a>
                            <p class="m-0">Dr. Farzana Bari is a respected public health expert from Pakistan, renowned for her contributions to health policy, gender equality, and social justice. With a background in sociology and public health, marginalized communities, and underserved populations. Her work focuses on addressing social determinants of health and improving the equity and inclusivity of health services across the country.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                <!-- card 7 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 11.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Mahmood Bhutta (ENT Specialist)</a>
                            <p class="m-0">
                                Dr. Mahmood Bhutta is a distinguished ENT (Ear, Nose, and Throat) specialist from Pakistan, known for his expertise in treating a wide range of conditions related to the head and neck, including hearing disorders, sinus problems, throat infections, and balance issues. With advanced training in otolaryngology, Dr. Bhutta is skilled in both medical and surgical treatments,  and tonsillectomies.
                                
                                </p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                <!-- card 8 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 1.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Saeed Akhtar (Transplant Surgeon)</a>
                            <p class="m-0">
                                Dr. Saeed Akhtar is a prominent transplant surgeon from Pakistan, known for his expertise in performing kidney transplants and advancing the field of organ transplantation in the country. As the founder of the Pakistan Kidney and Liver Institute and Research Center (PKLI)Dr. Akhtar has been instrumental in establishing a world-class facility that provides free transplantation services </p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                <!-- card 9 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 14.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Tahir Shamsi (Hematologist)</a>
                            <p class="m-0">Dr. Tahir Shamsi was a pioneering hematologist from Pakistan, renowned for his groundbreaking work in bone marrow transplantation and blood disorders. He was instrumental in establishing Pakistan’s first bone marrow transplant program and made significant strides in treating conditions like leukemia, lymphoma, thalassemia, and anemia. </p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                <!-- card 10 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 18.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Shireen Khan (Dermatologist)</a>
                            <p class="m-0">Dr. Shireen Khan is a highly skilled dermatologist from Pakistan, specializing in the diagnosis and treatment of skin, hair, and nail disorders. With extensive expertise in managing conditions like acne, eczema, psoriasis, skin allergies, and pigmentation disorders,  chemical peels, and anti-aging procedures.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                <!-- card 11 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/card 17.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Shazia Siddiqui (Radiologist)</a>
                            <p class="m-0">
                                Dr. Shazia Siddiqui is an accomplished radiologist from Pakistan, specializing in the use of advanced imaging techniques to diagnose and monitor a wide range of medical conditions. With expertise in X-rays, ultrasound, CT scans, MRI, and mammography, Dr. Siddiqui plays a crucial role in detecting diseases such as cancers, and cardiovascular conditions.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                
               <!-- card 12 -->
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img//card 16.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" >Dr. Asma Humayun (Psychiatrist)</a>
                            <p class="m-0">
                                Dr. Asma Humayun is a renowned psychiatrist from Pakistan, highly respected for her expertise in treating a wide range of mental health conditions. With a deep commitment to improving mental well-being, she specializes in managing disorders such as depression, anxiety, bipolar disorder, schizophrenia, and stress-related disorders.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                           
                        </div>
                    </div>
                </div>
                    <!-- card 13 -->
                    <div class="col-xl-4 col-lg-6">
                        <div class="bg-light rounded overflow-hidden">
                            <img class="img-fluid w-100" src="img/card 6.jpg" alt="">
                            <div class="p-4">
                                <a class="h3 d-block mb-3" >Dr. Adeeb Rizvi (Urologist)</a>
                                <p class="m-0">Dr. Adeeb Rizvi is a renowned urologist from Pakistan, best known for founding and leading the Sindh Institute of Urology and Transplantation (SIUT), one of the largest public healthcare institutions in the country, providing free medical care. Dr. Rizvi's contributions to the fields of urology and organ transplantation are significant, particularly in pioneering kidney transplants in Pakistan.</p>
                            </div>
                            <div class="d-flex justify-content-between border-top p-4">
                            
                            </div>
                        </div>
                    </div>
                    <!-- card 14 -->
                    <div class="col-xl-4 col-lg-6">
                        <div>
                        <div class="bg-light rounded overflow-hidden">
                            <img class="img-fluid w-100" src="img/card 7.jpg" alt="">
                            <div class="p-4">
                                <a class="h3 d-block mb-3" >Dr. Sheharyar Malik (Neurosurgeon)</a>
                                <p class="m-0">Dr. Sheharyar Malik is a highly skilled and accomplished neurosurgeon from Pakistan, recognized for his expertise in treating complex conditions related to the brain, spine, and nervous system. With years of rigorous training and experience, Dr. Malik has gained a reputation for handling intricate neurosurgical procedures, neurovascular diseases, and traumatic brain injuries.</p>
                            </div>
                            <div class="d-flex justify-content-between border-top p-4">
                            
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- card 15 -->
                    <div class="col-xl-4 col-lg-6">
                        <div class="bg-light rounded overflow-hidden">
                            <img class="img-fluid w-100" src="img/card 8.jpg" alt="">
                            <div class="p-4">
                                <a class="h3 d-block mb-3" >Dr. Feroze Khan (General Surgeon)</a>
                                <p class="m-0">Dr. Feroze Khan is a highly regarded general surgeon from Pakistan, known for his expertise in performing a wide range of surgical procedures. As a general surgeon, Dr. Khan is proficient in treating conditions related to the abdomen, digestive system, soft tissues, a, as well as performing emergency surgeries like appendectomies, hernia repairs, and gallbladder removals.

                                </p>
                            </div>
                            <div class="d-flex justify-content-between border-top p-4">
                            </div>
                        </div></span>
                    </div>
                
                </div>
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


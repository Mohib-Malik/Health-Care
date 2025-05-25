<!DOCTYPE html>
<html lang="en">


<!-- add-patient24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Health Care</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        .input-container {
            position: relative;
        }

        .input-container input {
            padding-right: 40px; /* Space for the icon */
        }

        .toggle-password {
            position: absolute;
            right: 30px; /* Adjust this value as needed */
            top: 53%;
            transform: translateY(-50%);
            pointer-events: none; /* Prevent clicking on the icon from affecting the input */
        }

        .toggle-password i {
            pointer-events: auto; /* Allow clicking the icon */
        }
    </style>
</head>
@extends('master')
<body>
    <div class="main-wrapper">
     
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                <div class="container">
                        {{-- Display validation errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Patient</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{url('/submit-patient')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name"  value="{{old('first_name')}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="last_name" value="{{old('last_name')}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="username" value="{{old('username')}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="{{old('email')}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                            <span class="toggle-password" id="togglePassword" style="cursor: pointer;">
                                                <i class="fa fa-eye" id="eyeIcon"></i>
                                            </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                            
                                        <span class="toggle-password" id="toggleConfirmPassword">
                                                <i class="fa fa-eye" id="confirmEyeIcon"></i>
                                            </span>
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="date_of_birth" value="{{old('date_of_birth')}}" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="number" class="form-control" id="age" name="age" min="1" max="120" required>
                                        </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender:</label>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" value="Male" required id="Male">
                                            <label class="form-check-label" for="Male">Male</label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" name="gender" class="form-check-input" value="Female" required id="Female">
                                            <label class="form-check-label" for="Female">Female</label>
                                        </div>
                                    </div>
                                </div>


								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" name="address" value="{{old('address')}}" required>
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Country</label>
                                                <input type="text" class="form-control" name="country" value="{{old('country')}}" required>
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>City</label>
												<input type="text" class="form-control" name="city" value="{{old('city')}}" required>
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>State/Province</label>
                                                <input type="text" class="form-control" name="state_province" value="{{old('state_province')}}" required>
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Postal Code</label>
												<input type="text" class="form-control" name="postal_code" value="{{old('postal_code')}}" required>
											</div>
										</div>
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="phone" value="{{old('phone')}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Avatar</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="assets/img/user.jpg">
											</div>
											<div class="upload-input">
                                                <input type="file" class="form-control" name="avatar" accept="image/*" required> 											
                                            </div>
										</div>
									</div>
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_active" value="option1" required>
									<label class="form-check-label" for="patient_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_inactive" value="option2">
									<label class="form-check-label" for="patient_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                
                                <input type="submit" value="Create Doctor" class="btn btn-primary submit-btn btn-center" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        // Eye toggle Function
        document.querySelectorAll('.toggle-password').forEach(function (toggle) {
            toggle.addEventListener('click', function () {
                const passwordInput = this.previousElementSibling; // Get the input field before the icon

                // Toggle the type attribute
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle the eye icon
                const eyeIcon = this.querySelector('i');
                eyeIcon.classList.toggle('fa-eye');
                eyeIcon.classList.toggle('fa-eye-slash');
            });
        });
    </script>
    <script>
            $(document).ready(function() {
                var today = new Date(); // Current date
                var minAgeInDays = 7; // Minimum age in days (1 week)
                
                // Calculate the maximum selectable date (1 week before today)
                var maxSelectableDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() - minAgeInDays);

                $('.datetimepicker').datepicker({
                    format: 'dd/mm/yyyy',         // Date format
                    autoclose: true,              // Automatically close the calendar after selecting the date
                    todayHighlight: true,         // Highlight today
                    endDate: maxSelectableDate,   // Maximum selectable date (1 week ago)
                    startDate: '-100y',           // Optional: limit past dates (e.g., max 100 years back)
                    clearBtn: true                // Clear button to reset date
                });
            });
    </script>

</body>


<!-- add-patient24:07-->
</html>

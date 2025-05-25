<!DOCTYPE html>
<html lang="en">

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
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

@extends('master')

<body>
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Schedule</h4>
                </div>
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
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <form method="POST" action="{{ url('/submit-schedule') }}">
                        @csrf 

                        <div class="form-group">
                            <label>Doctor Name</label>
                            <select name="doctor_name" class="select">
                                <option value="">Select Doctor</option>
                                @foreach ($doctors as $doctor) <!-- Use $doctors instead of $schedule -->
                                    <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Department Name</label>
                            <select name="department" class="select"> <!-- This should match the controller -->
                                <option value="">Select Department</option>
                                @foreach ($departments as $dep) <!-- Use $departments correctly -->
                                    <option value="{{ $dep->id }}">{{ $dep->department_name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label>Available Days</label>
                            <select name="available_days[]" class="select" multiple>
                                <option value="Monday" {{ (in_array('Monday', old('available_days', []))) ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ (in_array('Tuesday', old('available_days', []))) ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ (in_array('Wednesday', old('available_days', []))) ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ (in_array('Thursday', old('available_days', []))) ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ (in_array('Friday', old('available_days', []))) ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ (in_array('Saturday', old('available_days', []))) ? 'selected' : '' }}>Saturday</option>
                                <option value="Sunday" {{ (in_array('Sunday', old('available_days', []))) ? 'selected' : '' }}>Sunday</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Available Time</label>
                            <input type="text" name="available_time" class="form-control" id="datetimepicker3">
                        </div>

                        <div class="form-group">
                            <label>End Time</label>
                            <input type="text" name="end_time" class="form-control" id="datetimepicker4">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <div>
                                <input type="radio" name="status" value="Active" checked> Active
                                <input type="radio" name="status" value="Inactive"> Inactive
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Schedule</button>
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
        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
            $('#datetimepicker4').datetimepicker({
                format: 'LT'
            });
        });
    </script>
</body>

</html>

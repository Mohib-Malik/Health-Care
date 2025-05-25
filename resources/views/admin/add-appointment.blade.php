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
</head>
@extends('master')
<body>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
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
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Appointment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ url('/submit-appointments') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Appointment ID -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment ID</label>
                                        <input class="form-control" type="text" value="APT-{{ sprintf('%04d', $nextAppointmentId) }}" readonly="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Name</label>
                                        <input class="form-control" type="text" name="patient_name" value="{{ old('patient_name') }}" required>
                                    </div>
                                </div>




                 





                                <!-- Patient Age -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Age</label>
                                        <input type="number" name="patient_age" class="form-control" min="0" max="130" required>
                                    </div>
                                </div>

                                <!-- Department -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="select" name="department_id" onchange="updateDepartmentName(this.value)" required>
                                            <option value="">Select</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="department_name" id="department_name">


                                <!-- Doctor -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="select" name="doctor_id" id="doctor" required>
                                            <option>Select</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->first_name . ' ' . $doctor->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Doctor Schedule -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor's Schedule</label>
                                        <select class="select" name="doctor_schedule_id" id="schedule">
                                            <option>Select Doctor First</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="appointment_date" class="form-control" min="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <div class="time-icon">
                                        <input type="text" name="appointment_time" class="form-control" id="appointment_time" required>

                                        </div>
                                    </div>
                                </div>

                                <!-- Patient Contact Info -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Email</label>
                                        <input class="form-control" type="email" name="patient_email" value="{{ old('patient_email') }}" required>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Phone Number</label>
                                        <input class="form-control" type="text" name="patient_phone" value="{{ old('patient_phone') }}" required>
                                    </div>
                                </div>

                                <!-- Appointment Status -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="display-block">Appointment Status</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="Active" required> Active
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="Inactive"> Inactive
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <input type="submit" value="Create Appointment" class="btn btn-primary submit-btn btn-center" name="submit">
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
        $(document).ready(function() {
            // Initialize the time picker
            $('#appointment_time').datetimepicker({
                format: 'LT',
                icons: {
                    time: 'fa fa-clock',
                    date: 'fa fa-calendar',
                    up: 'fa fa-arrow-up',
                    down: 'fa fa-arrow-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-calendar-check-o',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });

            // Setting minimum date for appointment
            let today = new Date();
            let tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            
            let dd = String(tomorrow.getDate()).padStart(2, '0');
            let mm = String(tomorrow.getMonth() + 1).padStart(2, '0'); // January is 0!
            let yyyy = tomorrow.getFullYear();
            
            let minDate = yyyy + '-' + mm + '-' + dd;
            
            document.querySelector('input[name="appointment_date"]').setAttribute('min', minDate);
        });
    </script>
  

<script>
    function updateDepartmentName(departmentId) {
        const departments = @json($departments); // Pass the departments array from Laravel to JavaScript
        const department = departments.find(d => d.id == departmentId);
        if (department) {
            document.getElementById('department_name').value = department.department_name;
        } else {
            document.getElementById('department_name').value = '';
        }
    }
</script>
<script>
    $(function () {
    $('#appointment_time').datetimepicker({
        format: 'HH:mm', // Use 24-hour format
        icons: {
            time: 'fa fa-clock',
            date: 'fa fa-calendar',
            up: 'fa fa-arrow-up',
            down: 'fa fa-arrow-down',
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-calendar-check-o',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        }
    });

    // Ensure the form submits time in correct format
    $('form').on('submit', function() {
        var timeValue = $('#appointment_time').val(); 
        if (timeValue) {
            // Convert the time to HH:mm:ss format
            var formattedTime = moment(timeValue, 'HH:mm').format('HH:mm:ss');
            $('#appointment_time').val(formattedTime); // Update the input value
        }
    });
});

    </script>


</body>
</html>

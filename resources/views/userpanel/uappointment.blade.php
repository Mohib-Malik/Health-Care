<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Health Care</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./appointmant.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<a href="{{url('/')}}"></a>
    <div class="container form">
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
        <h1>Doctor Appointment Form</h1>
    
        <form action="{{ url('/submit-uappointment') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Appointment ID -->
                                    <div >
                                        <div class="form-group">
                                            <label>Appointment ID</label>
                                            <input class="form-control" type="text" value="APT-{{ sprintf('%04d', $nextAppointmentId) }}" readonly="">
                                        </div>
                                    </div>

                                    <!-- Patient Name (selecting patient_id) -->
                                    <div >
                                        <div class="form-group">
                                            <label>Patient Name</label>
                                            <input class="form-control" type="text" name="patient_name" value="{{ old('patient_name') }}" required>
                                        </div>
                                    </div>

                                    <!-- Patient Age -->
                                    <div >
                                        <div class="form-group">
                                            <label>Patient Age</label>
                                            <input type="number" name="patient_age" class="form-control" min="0" max="130" required>
                                        </div>
                                    </div>

                                    <!-- Department -->
                                    <div >
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="select" name="department_id"  required>
                                                <option >Select</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="department_name" id="department_name">


                                    <!-- Doctor -->
                                    <div >
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
                                    <div >
                                        <div class="form-group">
                                            <label>Doctor's Schedule</label>
                                            <select class="select" name="doctor_schedule_id" id="schedule">
                                                <option>Select Doctor First</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <div>
                                                <label>Date</label>
                                                <input type="date" name="appointment_date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label>Time</label>
                                        <div>
                                            <label>Time</label>
                                            <input type="time" name="appointment_time" class="form-control" required>
                                        </div>
                                    </div>


                                    <!-- Patient Contact Info -->
                                    <div >
                                        <div class="form-group">
                                            <label>Patient Email</label>
                                            <input class="form-control" type="email" name="patient_email" value="{{ old('patient_email') }}" required>
                                            </div>
                                    </div>
                                    <div >
                                        <div class="form-group">
                                            <label>Patient Phone Number</label>
                                            <input class="form-control" type="text" name="patient_phone" value="{{ old('patient_phone') }}" required>
                                        </div>
                                    </div>

                                    <!-- Appointment Status -->
                                    <div >
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
                                <a href="{{ url('/') }}" class="btn btn-secondary">Back</a>
                                    <input type="submit" value="Book Appointment" class="btn btn-primary submit-btn btn-center" name="submit">
                                </div>
                            </form>
    </div>
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
        });        
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

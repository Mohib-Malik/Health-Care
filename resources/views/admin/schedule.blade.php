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
    <style>
        .status-green {
            background-color: green; /* Or your desired green shade */
            color: white; /* Optional: text color */
        }

        .status-red {
            background-color: red; /* Or your desired red shade */
            color: white; /* Optional: text color */
        }

    </style>
</head>
@extends('master')
<body>
    <div class="main-wrapper">
      
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Schedule</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{url('/add-schedule')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>Doctor Name</th>
										<th>Department</th>
										<th>Available Days</th>
										<th>Available Time</th>
										<th>Status</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
                                        @foreach($schedules as $schedule)
                                        <tr>
                                            <td>
                                                <img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> {{ $schedule->doctor_name }}
                                            </td>
                                            
                                            <td>
                                                {{ $schedule->department_name }}
                                            </td>

                                            <td>
                                                @php
                                                    // Decode the available_days only if it's a string
                                                    $availableDays = is_string($schedule->available_days) ? json_decode($schedule->available_days, true) : $schedule->available_days;
                                                @endphp

                                                {{ is_array($availableDays) ? implode(', ', $availableDays) : $availableDays }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($schedule->available_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                                            </td>


                                            <td>
                                                <span class="custom-badge {{ $schedule->status === 'Active' ? 'status-green' : 'status-red' }}">
                                                    {{ $schedule->status }}
                                                </span>
                                            </td>
                                            
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <!-- Edit Schedule Link -->
                                                   <!-- Edit Schedule Link -->
                                                   <a class="dropdown-item" href="{{ route('edit.schedule', $schedule->id) }}">
                                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                                    </a>

                                                                    
                                                        <!-- Delete Schedule Link -->
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_schedule_{{ $schedule->id }}">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Delete Schedule Modal -->
                                                <div class="modal fade" id="delete_schedule_{{ $schedule->id }}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Schedule</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this schedule?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('delete.schedule', $schedule->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>

                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        @endforeach
                                </tbody>
							</table>
						</div>
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
</body>
</html>

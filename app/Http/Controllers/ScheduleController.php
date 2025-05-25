<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctors; // Correct the model import to singular
use App\Models\Department; 
use App\Models\DoctorSchedule; 
use Carbon\Carbon;

class ScheduleController extends Controller
{
    // Add Schedule Method
    public function addSchedule()
    {
        $doctors = doctors::all(); // Fetch all doctors
        $departments = Department::all(); // Fetch all departments
        return view('admin.add-schedule', compact('doctors', 'departments')); 
    }

    // Submit Schedule Method
    public function submit(Request $request)
    {
        // Validation of form inputs
        $validatedData = $request->validate([
            'doctor_name' => 'required|exists:doctors,id',
            'department' => 'required|exists:departments,id',
            'available_days' => 'required|array',
            'available_time' => 'required|string',
            'end_time' => 'required|string|after:available_time', // Ensure end time is after available time
            'status' => 'required|in:Active,Inactive',
        ]);
    
        // Check for duplicate entries
        $existingSchedule = DoctorSchedule::where('doctor_name', $validatedData['doctor_name'])
            ->where('department_name', $validatedData['department'])
            ->where('available_days', json_encode($validatedData['available_days']))
            ->where('available_time', Carbon::createFromFormat('g:i A', $validatedData['available_time'])->format('H:i:s'))
            ->where('end_time', Carbon::createFromFormat('g:i A', $validatedData['end_time'])->format('H:i:s'))
            ->first();
    
        if ($existingSchedule) {
            return redirect()->back()->withErrors(['duplicate' => 'This schedule entry already exists.']);
        }
    
        // Fetching the doctor's name and department name
        $doctor = doctors::find($validatedData['doctor_name']);
        $department = Department::find($validatedData['department']);
    
        // Convert time to 24-hour format
        $availableTime = Carbon::createFromFormat('g:i A', $validatedData['available_time'])->format('H:i:s');
        $endTime = Carbon::createFromFormat('g:i A', $validatedData['end_time'])->format('H:i:s');
    
        // Create a new schedule entry
        $schedule = new DoctorSchedule();
        $schedule->doctor_name = $doctor->first_name . ' ' . $doctor->last_name; // Full name
        $schedule->department_name = $department->department_name; // Save department name
        $schedule->available_days = json_encode($validatedData['available_days']);
        $schedule->available_time = $availableTime; // Save in 24-hour format
        $schedule->end_time = $endTime; // Save in 24-hour format
        $schedule->status = $validatedData['status'];
    
        // Save the schedule
        if ($schedule->save()) {
            return redirect("/schedule")->with('success', 'Schedule created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create schedule.');
        }
    }
    

    // Schedule Method
    public function schedule()
    {
        // Fetch all schedule records
        $schedules = DoctorSchedule::all(); // You can get all records directly here
        return view('admin.schedule', compact('schedules'));
    }

    // Edit Schedule Method
    public function editSchedule($id)
    {
        // Fetch the schedule by ID
        $schedule = DoctorSchedule::find($id);
    
        // Check if schedule exists
        if (!$schedule) {
            return redirect('/schedule')->with('error', 'Schedule not found.');
        }
    
        // Pass the schedule data to the edit view
        return view('admin.edit-schedule', compact('schedule'));
    }
    

// Update Schedule Method
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'doctor_name' => 'required|exists:doctors,id',
        'department' => 'required|exists:departments,id',
        'available_days' => 'required|array',
        'available_time' => 'required|string',
        'end_time' => 'required|string|after:available_time',
        'status' => 'required|in:Active,Inactive',
    ]);

    $schedule = DoctorSchedule::findOrFail($id);
    
    $doctor = doctors::find($validatedData['doctor_name']);
    $department = Department::find($validatedData['department']);

    $schedule->doctor_name = $doctor->first_name . ' ' . $doctor->last_name;
    $schedule->department_name = $department->department_name;
    $schedule->available_days = json_encode($validatedData['available_days']);
    $schedule->available_time = Carbon::createFromFormat('g:i A', $validatedData['available_time'])->format('H:i:s');
    $schedule->end_time = Carbon::createFromFormat('g:i A', $validatedData['end_time'])->format('H:i:s');
    $schedule->status = $validatedData['status'];

    if ($schedule->save()) {
        return redirect("/schedule")->with('success', 'Schedule updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update schedule.');
    }
}

// Delete Schedule Method
public function deleteSchedule($id)
{
    $schedule = DoctorSchedule::findOrFail($id);
    if ($schedule->delete()) {
        return redirect("/schedule")->with('success', 'Schedule deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to delete schedule.');
    }
}


    // Edit Schedule Method
    // public function editSchedule()
    // {
    //     return view('admin.edit-schedule');
    // }
}

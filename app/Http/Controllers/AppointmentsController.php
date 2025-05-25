<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\patients;
use App\Models\doctors;
use App\Models\Department;
use Carbon\Carbon;

class AppointmentsController extends Controller
{
    // Method to show the Add Appointment form
    // public function addAppointment()
    // {
    //     $patients = patients::all();
    //     $doctors = doctors::all();
    //     $departments = Department::all();
    //     $lastAppointment = Appointments::orderBy('id', 'desc')->first();
    //     $nextAppointmentId = $lastAppointment ? (int) substr($lastAppointment->id, 4) + 1 : 1;
    //     $nextAppointmentId = 'APT-' . sprintf('%04d', $nextAppointmentId);

    //     return view('admin.add-appointment', compact('patients', 'doctors', 'departments', 'nextAppointmentId'));
    // }

    // Method to show all appointments
    public function appointments()
    {
        // Fetch appointments sorted in ascending order by ID
        $appointments = Appointments::with(['patient', 'doctor', 'department'])->orderBy('id', 'asc')->get();
        return view('admin.appointments', compact('appointments'));
    }

    // Method to show the Edit Appointment form
    public function editAppointment($id)
    {
        $appointment = Appointments::find($id); // Find appointment by ID
        $patients = patients::all();
        $doctors = doctors::all();
        $departments = Department::all();

        return view('admin.edit-appointment', compact('appointment', 'patients', 'doctors', 'departments'));
    }

    // Method to delete an appointment
    public function deleteAppointment($id)
    {
        $appointment = Appointments::find($id);

        if ($appointment) {
            $appointment->delete();
            return redirect('/appointments')->with('success', 'Appointment deleted successfully!');
        } else {
            return redirect('/appointments')->withErrors('Appointment not found.');
        }
    }

    // Method to store appointment data into the database
    // public function submit(Request $request)
    // {
    //     $request->validate([
    //         'doctor_id' => 'required|exists:doctors,id',
    //         'department_id' => 'required|exists:departments,id',
    //         'appointment_date' => 'required|date|after:today',
    //         'appointment_time' => 'required|string',
    //         'patient_age' => 'required|integer|between:0,130',
    //         'status' => 'required',
    //     ]);
    
    //     // Prevent duplicate appointments
    //     $duplicate = Appointments::where('appointment_date', $request->input('appointment_date'))
    //         ->exists();
    
    //     if ($duplicate) {
    //         return redirect()->back()->withErrors('The patient already has an appointment on this date.');
    //     }
    
    //     try {
    //         $appointment = new Appointments();
    
    //         // Generate next appointment ID
    //         $nextId = (int) Appointments::count() + 1;
    //         $appointment->id = 'APT-' . sprintf('%04d', $nextId); // Generate ID
    
    //         // Save appointment details
    //         $appointment->patient_name = $request->input('patient_name');
    //         $appointment->doctor_id = $request->input('doctor_id');
    //         $appointment->department_id = $request->input('department_id');
    
    //         // Convert appointment date using Carbon
    //         $appointment->appointment_date = Carbon::createFromFormat('d/m/Y', $request->input('appointment_date'))->format('Y-m-d');
            
    //         // Time conversion: Check if time is in 12-hour format and convert if needed
    //         $appointment->appointment_time = Carbon::createFromFormat('h:i A', $request->input('appointment_time'))->format('H:i:s');
            
    //         $appointment->patient_email = $request->input('patient_email');
    //         $appointment->patient_phone = $request->input('patient_phone');
    //         $appointment->patient_age = $request->input('patient_age');
    //         $appointment->status = $request->input('status');
    
    //         $appointment->save();
    
    //         return redirect('/appointments')->with('success', 'Appointment created successfully!');
    //     } catch (\Exception $e) {
    //         \Log::error('Error creating appointment: ' . $e->getMessage());
    //         return redirect()->back()->withErrors('Failed to create appointment: ' . $e->getMessage());
    //     }
    // }
}

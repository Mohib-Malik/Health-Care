<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Make sure this line is included
use App\Models\Appointments;
use App\Models\patients;
use App\Models\doctors;
use App\Models\Department;
use Carbon\Carbon;


class UserPanelController extends Controller
{
    public function index()
    {
        return view('userpanel.index');
    }

    public function about()
    {
        return view('userpanel.about');
    }

    public function uappointment()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        $patients = patients::all();
        $doctors = doctors::all();
        $departments = Department::all();
        $lastAppointment = Appointments::orderBy('id', 'desc')->first();
        $nextAppointmentId = $lastAppointment ? (int) substr($lastAppointment->id, 4) + 1 : 1; // Extract numeric part and increment
        $nextAppointmentId = 'APT-' . sprintf('%04d', $nextAppointmentId); // Format as APT-XXXX

        return view('userpanel.uappointment', compact('patients', 'doctors', 'departments', 'nextAppointmentId'));
    }

    public function submit(Request $request)
    {
        // Log all request data
        \Log::info('Raw request data:', $request->all());
    
        // Validate input
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'department_id' => 'required|exists:departments,id',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required|string',
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|integer|between:0,130',
            'patient_email' => 'nullable|email|max:255',
            'patient_phone' => 'nullable|string|max:15',
            'status' => 'required',
        ]);
    
        try {
            $appointment = new Appointments();
    
            // Log the appointment date and time before parsing
            $date = trim($request->input('appointment_date'));
            $time = trim($request->input('appointment_time'));
            \Log::info('Appointment date:', ['date' => $date]);
            \Log::info('Appointment time:', ['time' => $time]);
    
            // Parse the appointment date
            $parsedDate = Carbon::createFromFormat('Y-m-d', $date);
            $appointment->appointment_date = $parsedDate->format('Y-m-d');
    
            // Parse the appointment time
            $parsedTime = Carbon::createFromFormat('H:i', $time);
            $appointment->appointment_time = $parsedTime->format('H:i:s');
    
            // Populate other fields
            $appointment->patient_name = $request->input('patient_name');
            $appointment->doctor_id = $request->input('doctor_id');
            $appointment->department_id = $request->input('department_id');
            $appointment->patient_age = $request->input('patient_age');
            $appointment->patient_email = $request->input('patient_email');
            $appointment->patient_phone = $request->input('patient_phone');
            $appointment->status = $request->input('status');
    
            // Save appointment
            $appointment->save();
    
            session(['last_appointment_id' => $appointment->id]);
            \Log::info('Stored appointment ID in session:', ['appointment_id' => $appointment->id]);
    
            return redirect()->route('user.invoice')->with('success', 'Appointment created successfully!');
        } catch (\Exception $e) {
            \Log::error('Error creating appointment: ' . $e->getMessage());
            return redirect()->back()->withErrors('Failed to create appointment: ' . $e->getMessage());
        }
    }
    

    
    
    
    
    



    public function contact()
    {
        return view('userpanel.contact');
    }

    public function detail()
    {
        return view('userpanel.detail');
    }

    public function findDoctor()
    {
        return view('userpanel.finddoctor');
    }

    public function invoice()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }
    
        // Retrieve the last created appointment ID from the session
        $appointmentId = session('last_appointment_id');
    
        \Log::info('Retrieved appointment ID from session:', ['appointment_id' => $appointmentId]);
    
        if (!$appointmentId) {
            return redirect()->route('user.uappointment')->withErrors('No appointment found.');
        }
    
        // Fetch the appointment details
        $appointment = Appointments::with('doctor', 'department')
            ->where('id', $appointmentId)
            ->first();
    
        if (!$appointment) {
            return redirect()->route('user.uappointment')->withErrors('Appointment not found.');
        }
    
        return view('userpanel.invoice', compact('appointment'));
    }
    
    
    
    
    

    public function price()
    {
        return view('userpanel.price');
    }

    public function service()
    {
        return view('userpanel.service');
    }

    public function team()
    {
        return view('userpanel.team');
    }
}

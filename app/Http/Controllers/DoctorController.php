<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\doctors;
use App\Models\Department;

class DoctorController extends Controller
{
    // Add Doctor Method
    public function addDoctor()
    {
        $departments = Department::all(); // Fetch all departments
        return view('admin.add-doctor', compact('departments')); // Pass departments to the view
    }

    // Store the submitted doctor
    public function submit(Request $request)
    {
        // Form validation
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|unique:doctors',
            'email' => 'required|email|unique:doctors|regex:/^.+@gmail\.com$/',
            'department' => 'required|exists:departments,id',
            'password' => 'required|string|min:6|confirmed',
            'date_of_birth' => 'required|date_format:d/m/Y',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'state_province' => 'nullable|string',
            'postal_code' => 'nullable|regex:/^[0-9]+$/',
            'phone' => 'nullable|regex:/^\+?[0-9]{7,15}$/',
            'short_biography' => 'nullable|string',
            'status' => 'required|in:option1,option2',
        ]);
        
        // Create a new doctor instance
        $doctor = new Doctors();
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->username = $request->username;
        $doctor->email = $request->email;
        $doctor->password = bcrypt($request->password); // Save hashed password
        $department = Department::find($request->department); // Get the department instance by ID
        $doctor->department_name = $department ? $department->department_name : null; // Save department name
        $doctor->date_of_birth = Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d');
        $doctor->gender = $request->gender === 'option1' ? 'Male' : 'Female';
        $doctor->address = $request->address;
        $doctor->country = $request->country;
        $doctor->city = $request->city;
        $doctor->state_province = $request->state_province;
        $doctor->postal_code = $request->postal_code;
        $doctor->phone = $request->phone;
        $doctor->status = $request->status === 'option1' ? 'Active' : 'Inactive';

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $doctor->avatar = $request->file('avatar')->store('images', 'public');
        }
    
        $doctor->short_biography = $request->short_biography;

        // Save the doctor
        if ($doctor->save()) {
            return redirect("/doctors")->with('success', 'Doctor created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create doctor.');
        }
    }

    // Method to get the list of doctors
    public function doctors()
    {
        $doctors = Doctors::all(); // Make sure model name is correct
        return view('admin.doctors', compact('doctors'));
    }

    // Edit Doctor Method (fetch doctor by id)
    public function editDoctor($id)
    {
        $doctor = Doctors::find($id);
        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor not found.');
        }
        $departments = Department::all(); // Fetch departments for editing
        return view('admin.edit-doctor', compact('doctor', 'departments')); // Pass departments to the view
    }

    // Method to delete a doctor
    public function deleteDoctor($id)
    {
        $doctor = Doctors::find($id);

        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor not found.');
        }

        // Delete the doctor
        $doctor->delete();

        return redirect('/doctors')->with('success', 'Doctor deleted successfully.');
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patients; // Import the correct model
use Carbon\Carbon;

class PatientsController extends Controller
{
    // Add Patient Method
    public function addPatient()
    {
        return view('admin/add-patient');
    }
    
    public function submit(Request $request)
{
    // Form validation
    $request->validate([
        // ... other validation rules ...
        'gender' => 'required|in:Male,Female',
        // ... other validation rules ...
    ]);

    // Create a new patient instance
    $add = new patients();

    // Fill the model with request data
    $add->first_name = $request->first_name;
    $add->last_name = $request->last_name;
    $add->username = $request->username;
    $add->email = $request->email;
    $add->password = bcrypt($request->password);
    $add->date_of_birth = Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d');
    $add->age = $request->age;
    $add->gender = $request->gender; // This will now be "Male" or "Female"
    $add->address = $request->address;
    $add->country = $request->country;
    $add->city = $request->city;
    $add->state_province = $request->state_province;
    $add->postal_code = $request->postal_code;
    $add->phone = $request->phone;

    // Handle avatar upload
    if ($request->hasFile('avatar')) {
        $add->avatar = $request->file('avatar')->store('images', 'public');
    }

    // Save the model
    if ($add->save()) {
        return redirect("/patients")->with('success', 'Patient created successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to create patient.');
    }
}


    // Patients Method - Fetch all patients from the database
    public function patients()
    {
        // Fetch all patients from the 'patients' table
        $patients = patients::all();

        // Pass the patients data to the view
        return view('admin/patients', compact('patients'));
    }

    // Edit Patients Method
    public function editpatient()
    {
        return view('admin/edit-patient');
    }

    // Method to delete a patient
    public function deletePatient($id)
    {
        // Find the patient by ID
        $patient = patients::find($id);

        // Check if the patient exists
        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found.');
        }

        // Delete the patient
        $patient->delete();

        // Redirect back with a success message
        return redirect('/patients')->with('success', 'Patient deleted successfully.');
    }
}

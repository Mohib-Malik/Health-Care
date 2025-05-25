<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
     // Add Department Method

     public function addDepartment()
     {
        return view('admin/add-department');
     }

    
     public function submit(Request $request)
     {
         // Validation of form inputs
         $validatedData = $request->validate([
             'department_name' => 'required|string|max:255',
             'status' => 'required|in:Active,Inactive',
         ]);
     
         // Create new department entry
         $department = new Department();
         $department->department_name = $validatedData['department_name'];
         $department->status = $validatedData['status']; // Save directly as Active or Inactive
         
         // Save the department
         if ($department->save()) {
             return redirect("/departments")->with('success', 'Department created successfully.');
         } else {
             return redirect()->back()->with('error', 'Failed to create department.');
         }
     }
     
     
    

     
 
     // Departments Method
     public function departments()
     {
         // Fetch all departments from the database
         $departments = Department::all();
     
         // Pass the $departments variable to the view
         return view('admin.departments', compact('departments'));
     }
     
 
     // Edit Department Method
     public function editDepartment()
     {
         return view('admin/edit-department');
     }
}

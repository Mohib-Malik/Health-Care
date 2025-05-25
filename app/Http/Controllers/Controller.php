<?php

namespace App\Http\Controllers;
use App\Models\Role;


abstract class Controller
{
    public function showRegistrationForm()
    {
        // Fetch all roles from the database
        $roles = Role::all();  // This assumes you have a 'Role' model and 'roles' table
    
        // Pass the roles to the view
        return view('auth.register', compact('roles'));
    }
    //
}

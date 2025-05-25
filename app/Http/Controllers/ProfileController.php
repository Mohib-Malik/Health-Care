<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
        // Profile Method
        public function profile()
        {
            return view('admin/profile');
        }
    
        // Edit Profile Method
        public function editProfile()
        {
            return view('admin/edit-profile');
        }
}

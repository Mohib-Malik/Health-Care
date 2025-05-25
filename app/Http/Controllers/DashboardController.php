<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    
    public function admindashboard()
    {
        return view('admin/dashboard');
    }
    public function index2()
    {
        return view('admin/index2');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorPanelController extends Controller
{
    public function dp()
    {
        return view('doctorpanel.dp');
    }
}

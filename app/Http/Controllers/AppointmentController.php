<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Availability;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{


    public function show()
    {

        return view('appointments.show');


    }
}

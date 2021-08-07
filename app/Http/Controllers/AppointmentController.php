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

    public function store(Request $request)
    {
//        $attributes = $request->validate([
//
//        ]);
        $appointment = Appointment::create([
            'user_id' => $request->user_id,
            'counsellor_id' => $request->counsellor_id,
            'user_name' => $request->user_name,
            'start' => $request->start,
            'end' => $request->end,
            'comments' => $request->comments

        ]);


    }
}

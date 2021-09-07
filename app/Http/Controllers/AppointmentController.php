<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller {

    public function show()
    {
        $appointments = Appointment::where('user_id', auth()->user()->id)->get();

        return view('appointments.show', compact('appointments'));
    }

    public function book()
    {

        return view('appointments.book');


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

    public function jsonFeed()
    {
        $appointments = Appointment::where('user_id', auth()->user()->id)->get();

        return response()->json($appointments);
    }
}

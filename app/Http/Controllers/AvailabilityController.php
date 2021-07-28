<?php

namespace App\Http\Controllers;

use Acaronlex\LaravelCalendar\Calendar;
use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AvailabilityController extends Controller
{
    public function show()
    {

        return view('availability.show');


    }


    public function store(Request $request)
    {

        $availability = Availability::create([
            'user_id' => $request->user_id,
            'start' => $request->start,
            'end' => $request->end
        ]);

//        return response()->json($availability);


    }

    public function destroy(Request $request)
    {
        Availability::find($request->id)->delete();

    }

    public function jsonFeed()
    {
        $data = ['id', 'user_id', 'start', 'end'];

        $events = Availability::get($data);

        return response()->json($events);
    }

}

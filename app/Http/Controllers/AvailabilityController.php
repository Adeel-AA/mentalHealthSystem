<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function show()
    {

//        if(! Gate::allows('create-availability')){
//            abort(403);
//        }
        return view('availability.show');


    }


    public function store(Request $request)
    {

        $availability = Availability::create([
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
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
        $data = ['id', 'user_id', 'user_name', 'start', 'end'];

        $events = Availability::get($data);

        return response()->json($events);
    }

}

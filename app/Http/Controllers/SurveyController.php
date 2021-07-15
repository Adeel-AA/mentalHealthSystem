<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Assessment $assessment, $slug)
    {
        $assessment->load('questions.answers');

        return view('survey.show', compact('assessment'));
    }

    public function store(Assessment $assessment)
    {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required'
        ]);
//        dd($data);
        $survey = $assessment->surveys()->create(['user_id' => auth()->id()]);
        $survey->responses()->createMany($data['responses']);

        return redirect('/assessments/' . $assessment->id);
    }
}

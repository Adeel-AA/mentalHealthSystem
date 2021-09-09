<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;

class SurveyController extends Controller {

    public function show(QuestionCategory $questionCategory)
    {
        $questionCategory->load('questions.answers');

        return view('survey.show', compact('questionCategory'));
    }

    public function store(QuestionCategory $questionCategory)
    {

        $data = request()->validate([
            'responses.*.question_id' => 'required',
            'responses.*.answer_id' => 'required',
            'responses.*.user_id' => 'required',
            'uuid' => 'required|uuid',
            'notes' => 'max:600'
        ]);

//        ddd($data);

        $survey = $questionCategory->surveys()->create([
            'uuid' => $data['uuid'],
            'user_id' => auth()->id(),
            'notes' => $data['notes']
        ]);


        $survey->responses()->createMany($data['responses']);

        return redirect(route('show-self-assessments'));
    }
}

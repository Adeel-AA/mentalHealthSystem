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
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'notes' => 'max:600'
        ]);

        $survey = $questionCategory->surveys()->create(['user_id' => auth()->id(), 'notes' => $data['notes']]);
        $survey->responses()->createMany($data['responses']);

        return redirect(route('my-self-assessments'));
    }
}

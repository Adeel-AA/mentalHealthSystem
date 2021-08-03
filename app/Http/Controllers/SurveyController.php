<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(QuestionCategory $questionCategory, $slug)
    {
        $questionCategory->load('questions.answers');

        return view('survey.show', compact('questionCategory'));
    }

    public function store(QuestionCategory $questionCategory)
    {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required'
        ]);
//        dd($data);
        $survey = $questionCategory->surveys()->create(['user_id' => auth()->id()]);
        $survey->responses()->createMany($data['responses']);

        return redirect('/question-categories/' . $questionCategory->id);
    }
}

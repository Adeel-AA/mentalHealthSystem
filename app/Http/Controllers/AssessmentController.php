<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function create()
    {
        return view('assessments.create');
    }

    public function store()
    {
        $data = request()->validate([
            'question_type' => 'required | max:255',
            'purpose' => 'required | max:255'
        ]);

        $assessment = auth()->user()->assessments()->create($data);

        return redirect('/assessments/' . $assessment->id);
    }

    public function show(Assessment $assessment)
    {
        //Lazy load questions and answers
        $assessment->load('questions.answers.responses');

        return view('assessments.show', compact('assessment'));
    }
}

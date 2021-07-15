<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Assessment $assessment)
    {
        return view('questions.create', compact('assessment'));
    }

    public function store(Assessment $assessment)
    {
        $data = request()->validate([
            'question.question' => 'required | max:255',
            'answers.*.answer' => 'required | max:255'
        ]);


        $question = $assessment->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/assessments/' . $assessment->id);
    }
}

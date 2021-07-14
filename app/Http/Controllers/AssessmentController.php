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

        $assessment = Assessment::create([
            'user_id' => auth()->id(),
            'question_type' => $data['question_type'],
            'purpose' => $data['purpose']
        ]);

        return redirect('/assessments/' . $assessment->id);
    }

    public function show(Assessment $assessment)
    {
        return view('assessments.show', compact('assessment'));
    }
}

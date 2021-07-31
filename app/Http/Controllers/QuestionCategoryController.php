<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class QuestionCategoryController extends Controller
{
    public function create()
    {
        return view('questionCategories.create');
    }

    public function store()
    {
        $data = request()->validate([
            'question_type' => 'required | max:255',
            'purpose' => 'required | max:255'
        ]);

        $questionCategory = auth()->user()->questionCategories()->create($data);

        return redirect('/questionCategories/' . $questionCategory->id);
    }

    public function show(QuestionCategory $questionCategory)
    {
        //Lazy load questions and answers
        $questionCategory->load('questions.answers.responses');

        return view('questionCategories.show', compact('questionCategory'));
    }
}

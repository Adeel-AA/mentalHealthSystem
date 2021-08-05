<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class QuestionCategoryController extends Controller
{
    public function index()
    {
        $questionCategories = QuestionCategory::all();
        return view('question-categories.index', compact('questionCategories'));
    }

    public function create()
    {
        return view('question-categories.create');
    }

    public function store()
    {
        $data = request()->validate([
            'question_type' => 'required | max:255',
            'purpose' => 'required | max:255'
        ]);

        $questionCategory = auth()->user()->questionCategories()->create($data);

        return redirect('/question-categories/' . $questionCategory->id);
    }

    public function show(QuestionCategory $questionCategory)
    {
        //Lazy load questions and answers
        $questionCategory->load('questions.answers.responses');

        return view('question-categories.show', compact('questionCategory'));
    }
}

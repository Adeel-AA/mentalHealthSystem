<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use App\Models\Survey;
use Illuminate\Http\Request;

class SelfAssessmentController extends Controller
{
    public function index()
    {
        $questionCategories = QuestionCategory::all();
        return view('self-assessments.index', compact('questionCategories'));
    }

    public function show()
    {
        $responses = Survey::where('user_id', auth()->user()->id)->get();

        $questionCategories = QuestionCategory::all();

        return view('self-assessments.show', compact('responses', 'questionCategories'));
    }
}

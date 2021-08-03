<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
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
        $questionCategories = QuestionCategory::all();

        return view('self-assessments.show', compact('questionCategories'));
    }
}

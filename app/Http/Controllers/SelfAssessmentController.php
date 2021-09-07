<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use App\Models\Survey;
use App\Models\SurveyResponse;

class SelfAssessmentController extends Controller {

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

    public function showById(QuestionCategory $questionCategory)
    {
        $questionCategory->load('questions.answers.responses');
        $response_ids = [];

        $responses = Survey::where('user_id', auth()->user()->id)->get();

        foreach ($responses as $response)
        {
            $response->id = $response_ids;
        }

        $surveyResponses = SurveyResponse::where('survey_id', $response_ids)->get();

        $questionCategories = QuestionCategory::all();

        return view('self-assessments.show-by-id', compact('questionCategory', 'responses', 'surveyResponses'));
    }
}

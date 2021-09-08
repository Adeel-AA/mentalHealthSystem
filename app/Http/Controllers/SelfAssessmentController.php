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

    public function showAssessment()
    {
        $questionCategories = QuestionCategory::all();
        $responses = Survey::where('user_id', auth()->user()->id)->get();
        $surveyResponses = SurveyResponse::where('user_id', auth()->user()->id)->get();
        foreach ($responses as $response)
        {
            foreach ($surveyResponses as $surveyResponse)
            {

                if ($response->user_id === auth()->user()->id && $surveyResponse->user_id === auth()->user()->id)
                {
                    return view('self-assessments.show-assessment', compact('questionCategories', 'responses', 'surveyResponses'));

                }

            }

        }
        abort(404);

    }
}

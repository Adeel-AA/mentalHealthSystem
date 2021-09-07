<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionCategory;

class QuestionController extends Controller {

    public function create(QuestionCategory $questionCategory)
    {
        return view('questions.create', compact('questionCategory'));
    }

    public function store(QuestionCategory $questionCategory)
    {
        $data = request()->validate([
            'question.question' => 'required | max:255',
            'answers.*.answer' => 'required | max:255'
        ]);


        $question = $questionCategory->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/question-categories/' . $questionCategory->id);
    }

    public function destroy(QuestionCategory $questionCategory, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionCategory->path());
    }
}

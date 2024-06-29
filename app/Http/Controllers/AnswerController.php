<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index(Question $question)
    {
        $answers = $question->answers;
        return view('backend.admin.answers.index', compact('question', 'answers'));
    }

    public function create(Question $question)
    {
        return view('backend.admin.answers.create', compact('question'));
    }

    public function store(Request $request, Question $question)
    {
        $request->validate([
            'answer_text' => 'required|string',
            'is_correct' => 'required|boolean',
        ]);

        $question->answers()->create($request->all());

        return redirect()->route('answers.index', $question);
    }
}

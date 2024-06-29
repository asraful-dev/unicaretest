<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Exam $exam)
    {
        $questions = $exam->questions;
        return view('backend.admin.questions.index', compact('exam', 'questions'));
    }

    public function create(Exam $exam)
    {
       
        if ($exam->questions()->exists()) {
            $notification = array(
                'message' => 'Already Question Created.',
                'alert-type' => 'error'
            );
        
            return redirect()->route('exams.index')->with($notification);
        }
        return view('backend.admin.questions.create', compact('exam'));
    }

    public function store(Request $request, Exam $exam)
    {
        // Validate the request
        $request->validate([
            'questions.*.question_text' => 'required|string',
            'questions.*.answers' => 'required|array',
            'questions.*.correct_answer' => 'required|integer|min:0|max:3',
        ]);
    
        // Loop through each question
        foreach ($request->questions as $questionData) {
            // Create the question
            $question = $exam->questions()->create([
                'question_text' => $questionData['question_text'],
            ]);
            foreach ($questionData['answers'] as $index => $answerText) {
                // Determine if this answer is the correct one
                $isCorrect = $index == $questionData['correct_answer'];

                $question->answers()->create([
                    'answer_text' => $answerText,
                    'is_correct' => $isCorrect,
                ]);
            }
        }
        return redirect()->route('questions.index', $exam);
    }

    public function createQuestion(){
        $exams =Exam::all();
        return view('backend.admin.questions.create_ques', compact('exams'));
    }

    public function destroy($id)
{
    // Find the question
    $question = Question::find($id);
    
    if (!$question) {
       
        return redirect()->back()->with('error', 'Question not found.');
    }
    $question->userAnswers()->delete();
    $question->delete();
    return redirect()->back()->with('success', 'Question deleted successfully.');
}

public function edit($id)
{
    $question = Question::with('answers')->find($id);
    return view('backend.admin.questions.edit', compact('question'));
}



public function update(Request $request, $id)
{
    $request->validate([
        'question_text' => 'required|string',
        'answers' => 'required|array|min:4',
        'answers.*' => 'required|string',
        'correct_answer' => 'required|integer|min:0|max:3',
    ]);

    $question = Question::find($id);
    if (!$question) {
        return redirect()->route('exams.index')->with('error', 'Question not found');
    }

    $question->question_text = $request->question_text;
    $question->save();

    foreach ($question->answers as $index => $answer) {
        $answer->answer_text = $request->answers[$index];
        $answer->is_correct = ($index == $request->correct_answer);
        $answer->save();
    }

    return redirect()->back()->with('success', 'Question updated successfully');
}

}

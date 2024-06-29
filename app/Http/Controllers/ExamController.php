<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Category;
use App\Models\UserAnswer;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('backend.admin.exams.index', compact('exams'));
    }

    public function create()
    {
        return view('backend.admin.exams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required|string',
            'title' => 'required|string',
            'total_mark' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        Exam::create($request->all());

        return redirect()->route('exams.index');
    }

    public function submit(Request $request, $examId)
    {
        // Check if the user already submitted the exam
        if (UserAnswer::where('user_id', auth()->id())->where('exam_id', $examId)->exists()) {
            return redirect()->back()->with('error', 'You have already submitted the exam.');
        }
    
        // Fetch categories for sidebar
        $categories = Category::where('status', 1)->orderBy('id', 'ASC')->limit(7)->get();
        
        // Validate request
        $request->validate([
            '_token' => 'required|string',
        ]);
    
        // Find the exam
        $exam = Exam::findOrFail($examId);
        $questions = $exam->questions;
    
        // Get user answers from the request
        $userAnswers = $request->except('_token');
    
        // Initialize variables to track correct and wrong answers
        $totalCorrectAnswers = 0;
        $totalWrongAnswers = 0;
    
        // Loop through each question
        foreach ($questions as $question) {
            // Get the correct answer ID for the question
            $correctAnswerId = Question::find($question->id)->answers()->where('is_correct', true)->pluck('id')->first();
            
            // Check if user provided an answer for the question
            if (isset($userAnswers['question_' . $question->id])) {
                $userAnswerId = $userAnswers['question_' . $question->id];
    
                // Save user's answer to the database
                UserAnswer::create([
                    'user_id' => auth()->id(),
                    'exam_id' => $examId,
                    'question_id' => $question->id,
                    'answer_id' => $userAnswerId,
                ]);
    
                // Check if user's answer is correct or wrong
                if ($userAnswerId == $correctAnswerId) {
                    $totalCorrectAnswers++;
                } else {
                    $totalWrongAnswers++;
                }
            }
        }
    
        // Return the view with exam result and other data
        return view('exam.result', compact('exam', 'questions', 'userAnswers', 'totalCorrectAnswers', 'totalWrongAnswers', 'categories'));
    }
    
    public function userResult($examId)
    {
        // Fetch categories for sidebar
        $categories = Category::where('status', 1)->orderBy('id', 'ASC')->limit(7)->get();
        
        // Fetch the authenticated user's answers for the specified exam
        $userAnswers = UserAnswer::where('user_id', auth()->id())
                                 ->where('exam_id', $examId)
                                 ->with('question', 'answer')
                                 ->get();
        
        // Initialize variables to track correct and wrong answers
        $totalCorrectAnswers = 0;
        $totalWrongAnswers = 0;
        
        // Loop through each user answer to calculate the results
        foreach ($userAnswers as $userAnswer) {
            if ($userAnswer->answer->is_correct) {
                $totalCorrectAnswers++;
            } else {
                $totalWrongAnswers++;
            }
        }
        
        // Fetch the exam details
        $exam = Exam::findOrFail($examId);
        
        // Pass data to the view
        return view('exam.user_result', compact('categories', 'userAnswers', 'totalCorrectAnswers', 'totalWrongAnswers', 'exam'));
    }

    public function join(){
        
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
    
        // Convert start_time and end_time to Carbon instances if they are not null
        if ($exam->start_time) {
            $exam->start_time = Carbon::parse($exam->start_time);
        }
        if ($exam->end_time) {
            $exam->end_time = Carbon::parse($exam->end_time);
        }
       return view('backend.admin.exams.edit',compact('exam'));

    }

    public function destroy($id)
    {
        // Exam খুঁজে বের করা
        $exam = Exam::find($id);
    
        // যদি ঐ exam_id দ্বারা কোন প্রশ্ন না থাকে, তবে ডিলিট করব
        if ($exam->questions()->count() == 0) {
            $exam->delete();
    
            $notification = array(
                'message' => 'Exam Deleted Successfully.', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Exam cannot be deleted because it has related questions.', 
                'alert-type' => 'error'
            );
        }
    
        return redirect()->back()->with($notification);
    }

   public function update(Request $request, $id)
   {
    $request->validate([
        'unit' => 'required',
        'title' => 'required',
        'total_mark' => 'required',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
    ]);

    $exam = Exam::findOrFail($id);
    $exam->update($request->all());

    $notification = array(
        'message' => 'Exam Updated Successfully.',
        'alert-type' => 'success'
    );

    return redirect()->route('exams.index')->with($notification);
}

public function totalResult($id)
{
    // Fetch all user answers for the given exam along with user information
    $userAnswers = UserAnswer::where('exam_id', $id)->with('user')->get();

    // Initialize arrays to store user scores and names
    $studentScores = [];
    $userNames = [];

    foreach ($userAnswers as $userAnswer) {
        $userId = $userAnswer->user_id;
        $questionId = $userAnswer->question_id;
        $answerId = $userAnswer->answer_id;

        // Check if the answer is correct
        $correctAnswer = $userAnswer->question->answers()->where('is_correct', true)->first();
        $isCorrect = $correctAnswer && $correctAnswer->id === $answerId;

        // Increment the score for the student
        if (!isset($studentScores[$userId])) {
            $studentScores[$userId] = ['correct' => 0, 'incorrect' => 0];
        }
        if ($isCorrect) {
            $studentScores[$userId]['correct']++;
        } else {
            $studentScores[$userId]['incorrect']++;
        }

        // Store user names
        if (!isset($userNames[$userId])) {
            $userNames[$userId] = $userAnswer->user->name;
        }
    }

    // Sort the students by their scores
    arsort($studentScores);

    // Create a ranking array
    $ranking = [];
    $position = 0; // Start position from 0

    foreach ($studentScores as $userId => $scores) {
        $position++; // Increment position before assigning
        $ranking[] = [
            'user_id' => $userId,
            'name' => $userNames[$userId],
            'position' => $position,
            'correct_answers' => $scores['correct'],
            'incorrect_answers' => $scores['incorrect'],
        ];
    }

    return view('exam.total_result', compact('ranking'));
}
}

@extends('layouts.frontend')
@section('content-frontend')
<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Arial', sans-serif;
    }
    .breadcrumb-header {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        margin-bottom: 20px;
    }
    .right-page {
        border-left: 1px solid #e9ecef;
        padding-left: 20px;
    }
    .label {
        font-weight: bold;
        color: #6c757d;
    }
    .value {
        font-size: 1.5rem;
        font-weight: bold;
        color: #343a40;
    }
    .card {
        border-radius: 8px;
        border: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card-header {
        background-color: #000407;
        color: #fff;
        border-radius: 8px 8px 0 0;
        border-bottom: none;
    }
    .card-header .btn {
        color: #fff;
    }
    .question {
        font-weight: bold;
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }
    .form-check-label {
        font-size: 1rem;
        color: #495057;
    }
    .font-weight-bolder {
        font-weight: bolder;
    }
    .breadcrumb {
        margin-bottom: 0;
    }
    .breadcrumb-item a {
        color: #000407;
        text-decoration: none;
    }
    .breadcrumb-item a:hover {
        text-decoration: underline;
    }
    .form-check-input:checked~.form-check-label::before {
        background-color: #000407;
    }
    .form-check-label::before, .form-check-label::after {
        top: 0.3rem;
    }
    .text-success {
        color: #28a745 !important;
    }
    .text-info {
        color: #17a2b8 !important;
    }
    .text-danger {
        color: #dc3545 !important;
    }
    .card-body {
        background-color: white;
    }
    .exam-details-container {
        border: 2px solid #000407;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .exam-details-header {
        background-color: #000407;
        color: white;
        padding: 10px 20px;
        border-radius: 8px 8px 0 0;
    }
    .exam-details-body {
        padding: 20px;
    }
</style>
<div class="container mt-4">
    <!-- Main content -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <div class="exam-details-container">
              
                <div class="text-center mt-4">
                    <h3>Total correct answers: {{ $totalCorrectAnswers }}</h3>
                    <h3>Total wrong answers: {{ $totalWrongAnswers }}</h3>
                </div>
              </div>
           
            <hr>
            <div class="row">
                <div class="col-12">
                    @foreach ($userAnswers as $userAnswer)
                        <div class="mb-4">
                            <h5 class="question">{{ $userAnswer->question->question_text }}</h5>
                            <div class="row">
                                @foreach ($userAnswer->question->answers as $answer)
                                    <div class="col-6">
                                        <div class="form-check">
                                           
                                            <input class="form-check-input" type="radio"  name="question_{{ $userAnswer->question->id }}" id="answer_{{ $answer->id }}" value="{{ $answer->id }}" disabled
                                            @if($answer->id == $userAnswer->answer_id) checked @endif>
                                            <label class="form-check-label @if($answer->is_correct) text-success @elseif($answer->id == $userAnswer->answer_id) text-danger @endif" for="answer_{{ $answer->id }}">
                                                {{ $answer->answer_text }}
                                                @if($answer->is_correct)
                                                    <i class="fa fa-check"></i>
                                                @elseif($answer->id == $userAnswer->answer_id)
                                                    <i class="fa fa-times"></i>
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Display total number of correct answers here -->
          
        </div>
    </div>
</div>
@endsection

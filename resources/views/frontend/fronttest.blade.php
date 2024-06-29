@extends('layouts.frontend')
@section('content-frontend')
@php
function convertToBengaliNumber($number) {
    $bn_digits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    $en_digits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    return str_replace($en_digits, $bn_digits, $number);
}
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
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
</head>
<body>

<div class="container mt-4">
    <!-- Main content -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <div class="exam-details-container">
                <div class="exam-details-header text-center">
                  <h4 class="text-uppercase text-light" style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">Unit: {{ $exam->unit }}</h4>
                  <h4 class="text-uppercase text-light" style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">Exam Title: {{ $exam->title }}</h4>
                </div>
                <div class="exam-details-body text-center">
                  <h4 style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">Class: 10</h4>
                  <h4 style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">Subject Name: Mathematics</h4>
                </div>
              </div>
            <div class="row text-center">
                <div class="col-md-4 col-sm-4">
                    <div><b>Exam Date: {{ date('d-m-Y', strtotime($exam->start_time)) }}</b></div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div><b>Total Time:{{ $hours }} hours {{ $minutes }} minutes</b></div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div><b>Full Marks:{{ $exam->total_mark }}</b></div>
                </div>
            </div>
            <hr>
            <form action="{{ route('exam.submit', $exam->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        @foreach ($questions as  $key=> $question)
                            <div class="mb-4">
                                <h5 class="question">({{ ($key+1) }}). {{ $question->question_text }}</h5>
                                <div class="row">
                                    @foreach ($question->answers as $answer)
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="answer_{{ $answer->id }}" value="{{ $answer->id }}">
                                                <label class="form-check-label" for="answer_{{ $answer->id }}">
                                                    {{ $answer->answer_text }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Submit Button -->
              <!-- Submit Button -->
<!-- Submit Button -->
<div class="text-center mt-4">
    @if (!isset($alreadySubmitted))
        <button class="btn btn-primary btn-lg" style="color:white;background-color:#E02252;">Submit</button>
    @else
        <script>
            alert("You have already submitted the exam.");
        </script>
    @endif
</div>



            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
{{-- convertToBengaliNumber --}}
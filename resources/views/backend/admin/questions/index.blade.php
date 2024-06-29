@extends('layouts.backend')
@section('content')
@php
    $startTime = strtotime($exam->start_time);
    $endTime = strtotime($exam->end_time);
    $totalTime = ($endTime - $startTime) / 60; // Convert to minutes
    $hours = floor($totalTime / 60);
    $minutes = $totalTime % 60;

    function convertToBengaliNumber($number) {
        $bn_digits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        $en_digits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($en_digits, $bn_digits, $number);
    }
  
@endphp
<!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Exam Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exam Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="exam-details-container">
              <div class="exam-details-header text-center">
                <h4 class="text-uppercase text-dark" style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">Unit:{{ $exam->unit }}</h4>
                <h4 class="text-uppercase text-dark" style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">Exam Title: {{ $exam->title }}</h4>
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
                <div><b>Total Time: {{ $hours }} hours {{ $minutes }} minutes</b></div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div><b>Full Marks: 100</b></div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-12">
                @foreach ($questions as $key=> $question)
                <div class="mb-4">
                  <h5 class="question"> <h5 class="question">({{ ($key+1) }}). {{ $question->question_text }}
                    <div class="d-flex justify-content-end">
                      <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary btn-sm mr-2">
                        <i class="fas fa-edit"></i>
                      </a>
                      
                      <a href="{{ route('questions.delete', $question->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                        <i class="fa fa-trash"></i>
                      </a>
                    </div>
                    

                  </h5>
                  <div class="row">
                    @foreach ($question->answers as $answer)
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="question_{{ $question->id }}" id="answer_{{ $answer->id }}" value="{{ $answer->id }}" @if($answer->is_correct) checked @endif>
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
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

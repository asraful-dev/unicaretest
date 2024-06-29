@extends('layouts.backend')
@section('content')

<style>
   .bg-light {
      background-color: #28a745!important;
   }
   .bg-light, .bg-light>a {
      color: #fff!important;
   }
</style>
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <!-- Optional content header -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Page Heading -->
         <div class="row offset-1">
            <div class="col-10">
               <div class="card card-primary card-outline shadow-lg">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3 class="card-title">
                              Edit Question
                           </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                           <a href="{{ route('exams.index') }}" class="btn btn-danger">
                           <i class="fas fa-long-arrow-alt-left"></i>
                           Back to List
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{ route('questions.update', $question->id) }}" method="POST" onsubmit="return validateForm()">
                         @csrf
                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="question_text" class="col-form-label" style="font-weight: bold;">Question Text:<span class="text-danger">*</span></label>
                                <input type="text" id="question_text" name="question_text" class="form-control" value="{{ old('question_text', $question->question_text) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="answers" class="text-success">Give Options &amp; Tick Answer:</label>
                            @foreach ($question->answers as $index => $answer)
                                <div class="form-row mb-3">
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input type="radio" name="correct_answer" value="{{ $index }}" {{ $answer->is_correct ? 'checked' : '' }} required>
                                                </span>
                                            </div>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ chr(65 + $index) }}</span>
                                            </div>
                                            <input type="text" name="answers[{{ $index }}]" class="form-control" value="{{ old("answers.$index", $answer->answer_text) }}" required>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 text-left">
                            <div class="form-group">
                               <button id="submit-button" class="btn btn-success" type="submit">Submit</button>
                            </div>
                         </div>
                     </form>
                 </div>
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>

<!-- JavaScript for form validation -->
<script>
    function validateForm() {
        const questions = document.querySelectorAll('.question-group');
        for (let i = 0; i < questions.length; i++) {
            const radios = questions[i].querySelectorAll('input[type="radio"]');
            let radioChecked = false;
            for (let j = 0; j < radios.length; j++) {
                if (radios[j].checked) {
                    radioChecked = true;
                    break;
                }
            }
            if (!radioChecked) {
                alert('অনুগ্রহ করে প্রতিটি প্রশ্নের জন্য একটি সঠিক উত্তর নির্বাচন করুন।');
                return false;
            }
        }
        return true;
    }
</script>
@endsection

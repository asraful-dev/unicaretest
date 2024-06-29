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
                              Create Question for {{ $exam->unit }}
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
                     <form action="{{ route('questions.store', $exam) }}" method="POST" onsubmit="return validateForm()">
                         @csrf
                         <div class="form-group">
                             <label for="question_count" class="text-success">Number of Questions *:</label>
                             <input type="number" name="question_count" id="question_count" class="form-control form-control-sm" min="1" required>
                         </div>
                         <div id="questions-container"></div> <!-- Container to hold dynamically generated questions -->
                         <div class="col-md-12 text-right">
                           <div class="form-group" id="generate-button">
                               <button type="button" onclick="generateQuestions()" class="btn btn-success">Generate Questions</button>
                           </div>
                           <div class="form-group" id="submit-button" style="display:none;">
                               <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
   function generateQuestions() {
       const questionCount = document.getElementById('question_count').value;
       const container = document.getElementById('questions-container');
       container.innerHTML = ''; // Clear previous content

       for (let i = 0; i < questionCount; i++) {
           const questionNumber = i + 1;
           const questionDiv = document.createElement('div');
           questionDiv.classList.add('form-group', 'question-group');
           questionDiv.innerHTML = `
               <label for="question_text_${questionNumber}" class="text-success">Question ${questionNumber} *:</label>
               <input type="text" name="questions[${i}][question_text]" id="question_text_${questionNumber}" class="form-control form-control-sm" required>
               <br>
               <label for="answer" class="text-success">Give Options &amp; Tick Answer:</label>
               <div class="form-row mb-3">
                   <div class="col">
                       <div class="input-group">
                           <div class="input-group-prepend">
                               <span class="input-group-text">
                                   <input type="radio" name="questions[${i}][correct_answer]" value="0" required>
                               </span>
                           </div>
                           <div class="input-group-prepend">
                               <span class="input-group-text">A</span>
                           </div>
                           <input type="text" name="questions[${i}][answers][0]" class="form-control" required>
                       </div>
                   </div>
                   <div class="col">
                       <div class="input-group">
                           <div class="input-group-prepend">
                               <span class="input-group-text">
                                   <input type="radio" name="questions[${i}][correct_answer]" value="1" required>
                               </span>
                           </div>
                           <div class="input-group-prepend">
                               <span class="input-group-text">B</span>
                           </div>
                           <input type="text" name="questions[${i}][answers][1]" class="form-control" required>
                       </div>
                   </div>
               </div>
               <div class="form-row mb-3">
                   <div class="col">
                       <div class="input-group">
                           <div class="input-group-prepend">
                               <span class="input-group-text">
                                   <input type="radio" name="questions[${i}][correct_answer]" value="2" required>
                               </span>
                           </div>
                           <div class="input-group-prepend">
                               <span class="input-group-text">C</span>
                           </div>
                           <input type="text" name="questions[${i}][answers][2]" class="form-control" required>
                       </div>
                   </div>
                   <div class="col">
                       <div class="input-group">
                           <div class="input-group-prepend">
                               <span class="input-group-text">
                                   <input type="radio" name="questions[${i}][correct_answer]" value="3" required>
                               </span>
                           </div>
                           <div class="input-group-prepend">
                               <span class="input-group-text">D</span>
                           </div>
                           <input type="text" name="questions[${i}][answers][3]" class="form-control" required>
                       </div>
                   </div>
               </div>
           `;
           container.appendChild(questionDiv);
       }

       // Hide the number of questions field and the generate questions button
       document.getElementById('question_count').style.display = 'none';
       document.getElementById('generate-button').style.display = 'none';
       // Show the submit button
       document.getElementById('submit-button').style.display = 'block';
   }
</script>
@endsection

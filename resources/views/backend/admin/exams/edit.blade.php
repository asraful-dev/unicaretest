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
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Edit Exam</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit Exam</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
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
                        Edit Exam
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
                  <form action="{{ route('exam.update', $exam->id) }}" method="POST">
                    @csrf
                     <div class="card-body">
                        <div class="form-group">
                           <label for="unit">Unit:</label>
                           <input type="text" name="unit" id="unit" class="form-control" value="{{ $exam->unit }}" required>
                        </div>
                        <div class="form-group">
                           <label for="exam_title">Exam Title:</label>
                           <input type="text" name="title" id="title" class="form-control" value="{{ $exam->title }}" required>
                        </div>
                        <div class="form-group">
                           <label for="total_mark">Total Mark:</label>
                           <input type="text" name="total_mark" id="total_mark" class="form-control" value="{{ $exam->total_mark }}" required>
                        </div>
                        <div class="form-group">
                           <label for="start_time">Start Time:</label>
                           <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ $exam->start_time->format('Y-m-d\TH:i') }}" required>
                        </div>
                        <div class="form-group">
                           <label for="end_time">End Time:</label>
                           <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ $exam->end_time->format('Y-m-d\TH:i') }}" required>
                        </div>
                     </div>
                     <div class="col-md-12 text-right">
                        <div class="form-group">
                           <button class="btn btn-success" type="submit">Update</button>
                        </div>
                     </div>
                  </form>
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
@endsection

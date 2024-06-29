@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>instructors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">instructors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline shadow-lg mb-4">
            <div class="card-header py-3">
               <div class="row">
                  <div class="col-sm-6">
                     <h3 class="card-title m-0 font-weight-bold text-primary">
                        instructors Details
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('instructor.index') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <tr>
                        <td>instructor Name </td>
                        <td>{{ $instructor->instructor_name ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Course Name </td>
                        <td>{{ $instructor->course_name ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Department</td>
                        <td>{{ $instructor->department ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Experience</td>
                        <td>{{ $instructor->experience ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Study</td>
                        <td>{{ $instructor->study ?? 'NULL' }}</td>
                     </tr>
                    
                     <tr>
                        
                      </tr>
                      <td>Status</td>
                      <td>
                          @if ($instructor->status == 1)
                          <span class="badge badge-success">Active</span>
                          @else
                          <span class="badge badge-danger">Disable</span>
                          @endif
                      </td>
                     
                     
                      <tr>
                        <td>instructor Image</td>
                        <td>
                           <img src="{{ asset($instructor->image) }}" alt="" style="height:70px; width:80px;">
                        </td>
                     </tr>
                     </tr>
                  </table>
               </div>
            </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 </div>
@endsection

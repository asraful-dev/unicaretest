@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>meritoriouss</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">meritoriouss</li>
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
                        meritoriouss Details
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('meritorious.index') }}" class="btn btn-danger">
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
                        <td>meritorious Student Name </td>
                        <td>{{ $meritorious->name ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Exam Year</td>
                        <td>{{ $meritorious->admission_exam ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Achieve Of Place</td>
                        <td>{{ $meritorious->achieve_place ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Student Opinion</td>
                        <td>{{ $meritorious->comment_of_meritorious ?? 'NULL' }}</td>
                     </tr>
                
                     <tr>
                        
                      </tr>
                      <td>Status</td>
                      <td>
                          @if ($meritorious->status == 1)
                          <span class="badge badge-success">Active</span>
                          @else
                          <span class="badge badge-danger">Disable</span>
                          @endif
                      </td>
                     
                     
                      <tr>
                        <td>meritorious Image</td>
                        <td>
                           <img src="{{ asset($meritorious->image) }}" alt="" style="height:70px; width:80px;">
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

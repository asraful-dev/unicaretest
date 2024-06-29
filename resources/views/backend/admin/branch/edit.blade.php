@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>branch</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">branch</li>
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
                        Edit branch
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('branch.index') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <form action="{{ route('branch.update',$branch->id) }}" method="POST" enctype="multipart/form-data">
              @csrf 
                <div class="row m-4">
                <div class="col-md-12">
                     <div class="form-group">
                       <label for="name">Branch Name: <span class="text-danger">*</span></label>
                        <input type="text" name="branch_name" value="{{ $branch->branch_name }}" id="name" class="form-control" placeholder="Write branch name">
                        @error('branch_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                       <label for="name">Contact No: <span class="text-danger">*</span></label>
                        <input type="text" name="contact_no" value="{{ $branch->contact_no }}" id="name" class="form-control" placeholder="Write Contact no name">
                        @error('contact_no')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                       <label for="name">Contract No Extra<span class="text-danger">*</span></label>
                        <input type="text" name="contact_no_optional" value="{{ $branch->contact_no_optional }}" id="name" class="form-control" placeholder="Write Extra Contact No">
                        @error('contact_no_optional')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                       <label for="name">Area Link: <span class="text-danger">*</span></label>
                        <input type="text" name="area_link" value="{{ $branch->area_link }}" id="name" class="form-control" placeholder="Please give Area Link">
                        @error('area_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="status">Status:</label>
                        <span class="text-danger">*</span>
                        <select name="status" id="status" class="form-control">
                           @if ($branch->status == 1)
                              <option value="1" selected>Active</option>
                              <option value="0">Disable</option>
                           @else
                              <option value="1">Active</option>
                              <option value="0" selected>Disable</option>
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 text-right">
                     <div class="form-group">
                        <button class="btn btn-success" type="submit">Update</button>
                     </div>
                  </div>
               </div>
            </form>
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

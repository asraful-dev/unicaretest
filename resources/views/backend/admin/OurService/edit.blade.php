@extends('layouts.backend')
@section('content')
<style>
    .bg-light {
        background-color: #28a745!important;
        /* color: white; */
    }
    .bg-light, .bg-light>a {
        /* color: #1f2d3d!important; */
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
             <h1> Our Success</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Our Success</li>
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
                        Edit Our success
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('success.index') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <form action="{{ route('success.update',$success->id) }}" method="POST" enctype="multipart/form-data">
              @csrf 
                <div class="row m-4">
                <div class="col-md-12">
                           <div class="form-group">
                              <label for="name">Total Student<span class="text-danger">*</span></label>
                              <input type="text" name="total_student" value="{{ $success->total_student }}" id="name" class="form-control" placeholder="Enter success Name">
                              @error('total_student')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="name">Description Of Chance<span class="text-danger">*</span></label>
                              <input type="text" name="chance_student" value="{{ $success->chance_student }}" id="chance_student" class="form-control" placeholder="Enter Description Of chance">
                              @error('chance_student')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                        <label for="slider_image">Image of success Student<span class="text-danger">(Size:150,55):</span></label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input image" name="image" id="slider_img">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-2 mt-3">
                           <img id="showImage" class="rounded avatar-lg showImage" src="{{ asset($success->image) }}" alt="No Image" width="100px" height="80px;">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="status">Status:</label>
                        <span class="text-danger">*</span>
                        <select name="status" id="status" class="form-control">
                            @if ($success->status == 1)
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

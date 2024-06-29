@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Video</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Video</li>
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
                        Add New Video
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('video.index') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
              @csrf 
                <div class="row m-4">
                 
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="video_url">Video Embed Link: <span class="text-danger">*</span></label>
                        <input type="text" name="video_url" value="{{ old('video_url') }}" id="video_url" class="form-control" placeholder="Enter video Embed link">
                        @error('video_url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="teacher_qualification">Teacher Name & Qualification: </label>
                        <input type="text" name="teacher_qualification" value="{{ old('teacher_qualification') }}" id="teacher_qualification" class="form-control" placeholder="Enter teacher qualification">
                        @error('teacher_qualification')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="about_class">About Class: </label>
                        <input type="text" name="about_class" value="{{ old('about_class') }}" id="about_class" class="form-control" placeholder="Enter about class">
                        @error('about_class')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="publish_date">Publish Date: </label>
                        <input type="date" name="publish_date" value="{{ old('publish_date') }}" id="publish_date" class="form-control">
                        @error('publish_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="status">Status:</label>
                        <span class="text-danger">*</span>
                        <select name="status" id="status" class="form-control">
                           <option value="1">Active</option>
                           <option value="0">Disable</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 text-right">
                     <div class="form-group">
                        <button class="btn btn-success" type="submit">Submit</button>
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

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
               <h1>Our Events</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Our Events</li>
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
                           <h3 class="card-name">
                              Add Our Event
                           </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                           <a href="{{ route('event.index') }}" class="btn btn-danger">
                           <i class="fas fa-long-arrow-alt-left"></i>
                           Back to List
                           </a>
                        </div>
                     </div>
                  </div>
                  <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf 
                     <div class="row m-4">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="event_title">Event Title<span class="text-danger">*</span></label>
                              <input type="text" name="event_title" value="{{ old('event_title') }}" id="event_title" class="form-control" placeholder="Enter Event Title">
                              @error('event_title')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="date">Date<span class="text-danger">*</span></label>
                              <input type="date" name="date" value="{{ old('date') }}" id="date" class="form-control" placeholder="Enter Date">
                              @error('date')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="duration">Duration<span class="text-danger">*</span></label>
                              <input type="text" name="duration" value="{{ old('duration') }}" id="duration" class="form-control" placeholder="Enter Duration">
                              @error('duration')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="image">Event Image<span class="text-danger">(Size: 1920x1280):</span></label>
                              <span class="text-danger">*</span>
                              <div class="input-group">
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input image" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                 </div>
                                 <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                 </div>
                              </div>
                              @error('image')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <div class="mb-2 mt-3">
                                 <img id="showImage" class="rounded avatar-lg showImage" src="{{ url('upload/no_image.jpg') }}" alt="No Image" width="100px" height="80px;">
                              </div>
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

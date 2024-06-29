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
               <h1>Instructor</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Instructor</li>
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
                              Add New Instructor
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
                  <form action="{{ route('instructor.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf 
                     <div class="row m-4">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="course_name">Course Name: <span class="text-danger">*</span></label>
                              <input type="text" name="course_name" value="{{ old('course_name') }}" id="course_name" class="form-control" placeholder="Enter Course Name">
                              @error('course_name')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="instructor_name">Instructor Name: <span class="text-danger">*</span></label>
                              <input type="text" name="instructor_name" value="{{ old('instructor_name') }}" id="instructor_name" class="form-control" placeholder="Enter Instructor Name">
                              @error('instructor_name')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="department">Department: <span class="text-danger">*</span></label>
                              <input type="text" name="department" value="{{ old('department') }}" id="department" class="form-control" placeholder="Enter Department">
                              @error('department')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="experience">Experience: <span class="text-danger">*</span></label>
                              <input type="text" name="experience" value="{{ old('experience') }}" id="experience" class="form-control" placeholder="Enter Experience">
                              @error('experience')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="study">Qualification: <span class="text-danger">*</span></label>
                              <input type="text" name="study" value="{{ old('study') }}" id="study" class="form-control" placeholder="Enter your Qualification">
                              @error('study')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="facebook_link">Facebook Link: <span class="text-danger">*</span></label>
                              <input type="text" name="facebook_link" value="{{ old('facebook_link') }}" id="facebook_link" class="form-control" placeholder="Enter Facebook Link">
                              @error('facebook_link')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="whatsapp_link">WhatsApp Link: <span class="text-danger">*</span></label>
                              <input type="text" name="whatsapp_link" value="{{ old('whatsapp_link') }}" id="whatsapp_link" class="form-control" placeholder="Enter WhatsApp Link">
                              @error('whatsapp_link')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="slider_image">Image of Instructor <span class="text-danger">(Size: 1920x1280):</span></label>
                              <span class="text-danger">*</span>
                              <div class="input-group">
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input image" name="image" id="slider_image">
                                    <label class="custom-file-label" for="slider_image">Choose file</label>
                                 </div>
                                 <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                 </div>
                              </div>
                              @error('image')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <div class="mb-2 mt-3">
                                 <img id="showImage" class="rounded avatar-lg showImage" src="{{ (!empty($editData->profile_image)) ? url('upload/admin_images/'.$editData->profile_image) : url('upload/no_image.jpg') }}" alt="No Image" width="100px" height="80px;">
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

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
               <h1>meritorious</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Meritorious</li>
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
                              Add New Meritorious
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
                  <form action="{{ route('meritorious.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf 
                     <div class="row m-4">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="name">Meritorious Name: <span class="text-danger">*</span></label>
                              <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="Enter Meritorious Name">
                              @error('name')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="admission_exam">Admission Exam Year: <span class="text-danger">*</span></label>
                              <input type="text" name="admission_exam" value="{{ old('admission_exam') }}" id="admission_exam" class="form-control" placeholder="Enter Meritorious Admission Exam Year">
                              @error('admission_exam')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="achieve_place">Number of Places Achieved: <span class="text-danger">*</span></label>
                              <input type="text" name="achieve_place" value="{{ old('achieve_place') }}" id="achieve_place" class="form-control" placeholder="Enter Number of Places Achieved">
                              @error('achieve_place')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="comment_of_meritorious">Student Opinion: <span class="text-danger">*</span></label>
                              <input type="text" name="comment_of_meritorious" value="{{ old('comment_of_meritorious') }}" id="comment_of_meritorious" class="form-control" placeholder="Enter Student Opinion">
                              @error('comment_of_meritorious')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="slider_image">Image Of Meritorious Student<span class="text-danger">(Size: 1920x1280):</span></label>
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
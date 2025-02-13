@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Banner</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Banner</li>
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
                        Add New Banner
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('banner.index') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
              @csrf 
              <div class="row m-4">
               <div class="col-md-12">
                   <div class="form-group">
                       <label for="unit" class="col-form-label" style="font-weight: bold;"> Category Page:<span class="text-danger">*</span></label>
                       <div class="custom_select">
                        <select class="form-control select-active w-100 form-select select-nice" name="category_id">
                            <option value="" disabled selected>Page Select</option>
                            @foreach($categories as $key => $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="form-group">
                       <label for="slider_image">Banner<span class="text-danger">(Size: 1920x1280):</span></label>
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
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

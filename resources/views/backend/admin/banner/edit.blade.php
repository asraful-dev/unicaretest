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
                        Edit Banner
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
            <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
              @csrf 
              <div class="row m-4">
               <div class="col-md-12">
                   <div class="form-group">
                       <label for="unit" class="col-form-label" style="font-weight: bold;"> Category Page:<span class="text-danger">*</span></label>
                       <div class="custom_select">
                           <select class="form-control select-active w-100 form-select select-nice" name="category_id">
                               <option disabled>Select Page</option>
                               @foreach($categories as $category)
                               <option value="{{ $category->id }}" {{ $banner->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                        <img id="showImage" class="rounded avatar-lg showImage" src="{{ (!empty($banner->image) && file_exists(public_path($banner->image))) ? asset($banner->image) : asset('upload/no_image.jpg') }}" alt="No Image" width="100px" height="80px;">
                    </div>
                    
                   </div>
               </div>
                 
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="status">Status:</label>
                        <span class="text-danger">*</span>
                        <select name="status" id="status" class="form-control">
                           <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Active</option>
                           <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Disable</option>
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

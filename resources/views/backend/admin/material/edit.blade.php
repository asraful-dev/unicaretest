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
                    <h1>Material</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Material</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
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
                                    <h3 class="card-title">Edit Material</h3>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="{{ route('material.index') }}" class="btn btn-danger">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                        Back to List
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('material.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="row m-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="book_title">Book Title: <span class="text-danger">*</span></label>
                                        <input type="text" name="book_title" value="{{ $material->book_title }}" id="book_title" class="form-control" placeholder="Enter Book Title">
                                        @error('book_title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="author">Author: <span class="text-danger">*</span></label>
                                        <input type="text" name="author" value="{{ $material->author }}" id="author" class="form-control" placeholder="Enter Author">
                                        @error('author')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="related_topics">Related Topics: <span class="text-danger">*</span></label>
                                        <input type="text" name="related_topics" value="{{ $material->related_topics }}" id="related_topics" class="form-control" placeholder="Enter Related Topics">
                                        @error('related_topics')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="image">Book Image<span class="text-danger">(Size: 1920x1280):</span></label>
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
                                       <img id="showImage" class="rounded avatar-lg showImage" src="{{ asset($material->image) }}" alt="No Image" width="100px" height="80px;">
                                    </div>
                                 </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status: <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $material->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $material->status == 0 ? 'selected' : '' }}>Disable</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-success" type="submit">Update</button>
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

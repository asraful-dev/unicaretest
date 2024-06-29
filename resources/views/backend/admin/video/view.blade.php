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
                        Video Details
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
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <tr>
                        <td>Video URL</td>
                        <td>
                            <video width="320" height="240" controls>
                                <source src="{{$video->video_url}}" type="video/mp4">
                            </video>
                        </td>
                     </tr>
                     <tr>
                        <td>Teacher Qualification</td>
                        <td>{{ $video->teacher_qualification ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>About Class</td>
                        <td>{{ $video->about_class ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td>Publish Date</td>
                        <td>{{ $video->publish_date ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                      <td>Status</td>
                      <td>
                          @if ($video->status == 1)
                          <span class="badge badge-success">Active</span>
                          @else
                          <span class="badge badge-danger">Disable</span>
                          @endif
                      </td>
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

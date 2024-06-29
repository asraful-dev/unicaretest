@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Our Services</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Our Services</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Our Services List</h3>
                     <div class="card-tools">
                        <a href="{{ route('OurService.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add New Service
                        </a>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                     <table class="table table-hover text-nowrap">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Unit</th>
                              <th>One Facility</th>
                              <th>Two Facility</th>
                              <th>Three Facility</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($OurService as $service)
                           <tr>
                              <td>{{ $service->id }}</td>
                              <td>{{ $service->unit }}</td>
                              <td>{{ $service->one_facility }}</td>
                              <td>{{ $service->two_facility }}</td>
                              <td>{{ $service->three_facility }}</td>
                              <td><img src="{{ asset($service->image) }}" alt="Image" width="100" height="70"></td>
                              <td>
                                 @if($service->status == 1)
                                 <span class="badge badge-success">Active</span>
                                 @else
                                 <span class="badge badge-danger">Disabled</span>
                                 @endif
                              </td>
                              <td>
                                 <a href="{{ route('OurService.edit', $service->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                 <a href="{{ route('OurService.view', $service->id) }}" class="btn btn-info btn-sm">View</a>
                                 <form action="{{ route('OurService.delete', $service->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                                 </form>
                                 @if($service->status == 1)
                                 <a href="{{ route('OurService.in_active', $service->id) }}" class="btn btn-warning btn-sm">Disable</a>
                                 @else
                                 <a href="{{ route('OurService.active', $service->id) }}" class="btn btn-success btn-sm">Activate</a>
                                 @endif
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
@endsection

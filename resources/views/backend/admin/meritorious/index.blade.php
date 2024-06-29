@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Meritorious</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Meritorious</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-right">
            <a href="{{ route('meritorious.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
        </h1>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">meritorious Student List</h3>
                <span class="badge badge-success rounded-pill ml-2" style="font-size: 17px;"> {{ count($meritorious) }} </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Exam Year</th>
                    <th>Achieve Of Place</th>
                    <th>Student Opinion</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($meritorious as $key => $item)
                      <tr>
                        <td> {{ $key+1}} </td>
                        <td class="col-2">
                          <img src="{{ asset($item->image) }}" class="justify-content-center" width="80px" height="70px;" alt="No Image">
                        </td>
                        <td>{{ $item->name ?? 'NULL' }}</td>
                        <td>{{ $item->admission_exam ?? 'NULL' }}</td>
                        <td>{{ $item->achieve_place ?? 'NULL' }}</td>
                        <td>{{ $item->comment_of_meritorious ?? 'NULL' }}</td>
                       
                      <td>
                         @if($item->status == 1)
                          <a href="{{ route('meritorious.in_active',['id'=>$item->id]) }}" class="badge badge-success">Active</a>
                          @else
                            <a href="{{ route('meritorious.active',['id'=>$item->id]) }}" class="badge badge-danger">Disable</a>
                          @endif
                       </td>
                      <td class="col-5">
                        <a href="{{ route('meritorious.view',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                        <a href="{{ route('meritorious.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                        <a href="{{ route('meritorious.delete',$item->id) }}"class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                      </td>

                      </tr>
                    @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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

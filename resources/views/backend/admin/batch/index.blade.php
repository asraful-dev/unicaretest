@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Batch</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $pageTitle ?? 'N/A'}}</li>
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
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus" aria-hidden="true"></i> Create
        </a>
        </h1>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Batch Add Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form  action="{{ route('batch.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="className">Class Name</label>
                        @error('class_name')
                            <span class="text-danger font-weight-bolder">{{ $message }}</span>
                        @enderror
                        <select name="class_id" class="custom-select" id="inputGroupSelect01" required>
                            <option selected>Choose Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="batch_no">Batch No</label>
                        @error('batch_no')
                            <span class="text-danger font-weight-bolder">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" id="batch_no" name="batch_no" placeholder="Enter batch no" required>
                    </div>
                    <div class="form-group">
                        <label for="batch_time">Batch Time</label>
                        @error('batch_time')
                            <span class="text-danger font-weight-bolder">{{ $message }}</span>
                        @enderror
                        <input type="time" class="form-control" id="batch_time" name="batch_time" placeholder="Enter batch time">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">Batch List</h3>
                <span class="badge badge-success rounded-pill ml-2" style="font-size: 17px;"> {{ count($batches) }} </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Class Name</th>
                    <th>Batch No</th>
                    <th>Batch Time</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($batches as $key => $batch)
                      <tr>
                        <td class="col-1">{{ $key+1}} </td>
                        <td>{{ $batch->batchClass->class_name ?? "N/A" }}</td>
                        <td>{{ $batch->batch_no ?? "N/A" }}</td>
                        <td>{{ $batch->batch_time ?? "N/A" }}</td>
                        <td>
                            @if($batch->status == 'Running')
                                <a href="#" class="badge badge-success"><span class="badge bg-success">Running</span></a>
                            @else
                              <a href="#" class="badge badge-danger"><span class="badge bg-danger">Not Running</span></a>
                            @endif
                        </td>
                       <td>
                          <a href="#" data-toggle="modal" data-target="#exampleModalEdit{{ $batch->id }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                          <a href="{{ route('batch.delete',$batch->id) }}"class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                       </td>
                      </tr>
                      <!-- Edit Modal -->
                      <div class="modal fade" id="exampleModalEdit{{ $batch->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Batch Edit Now</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form  action="{{ route('batch.update',$batch->id) }}" method="POST">
                              @csrf
                              <div class="modal-body">
                                <div class="form-group">
                                    <label for="className">Class Name</label>
                                    @error('class_name')
                                        <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                    @enderror
                                    <select name="class_id" class="custom-select" id="inputGroupSelect01">
                                        <option selected>Choose Class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}" {{ $batch->class_id == $class->id ? 'selected' : '' }}>{{ $class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="batch_no">Batch No</label>
                                    @error('batch_no')
                                        <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                    @enderror
                                    <input type="text" value="{{ $batch->batch_no }}" class="form-control" id="batch_no" name="batch_no" placeholder="Enter batch no" >
                                </div>
                                <div class="form-group">
                                    <label for="batch_time">Batch Time</label>
                                    @error('batch_time')
                                        <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                    @enderror
                                    <input type="time" value="{{ \Carbon\Carbon::parse($batch->batch_time)->format('H:i') }}" class="form-control" id="batch_time" name="batch_time" placeholder="Enter batch time" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="custom-select" id="inputGroupSelect01">
                                        <option>Choose Status</option>
                                        <option value="Running" {{ $batch->status == 'Running' ? 'selected' : '' }}>Running</option>
                                        <option value="Not Running" {{ $batch->status == 'Not Running' ? 'selected' : '' }}>Not Running</option>
                                    </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
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

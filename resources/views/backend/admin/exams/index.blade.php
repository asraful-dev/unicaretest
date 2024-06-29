@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exams</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Exams</li>
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
              <a href="{{ route('exams.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i>Exam Create</a>
          </h1>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Exam List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Unit</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                      </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $key => $item)
                                    <tr>
                                        <td class="col-2"> {{ $key+1}}</td>
                                        <td class="col-2">
                                        {{ $item->unit }}
                                        </td>
                                        <td class="col-2">
                                        {{ $item->title }}
                                        </td>
                                       
                                        <td class="col-2">
                                            <a href="{{ route('questions.index', $item) }}" class="btn btn-success btn-sm">Total QS</a>
                                            <a href="{{ route('questions.create', $item) }}" class="btn btn-success btn-sm" id="questionButton">Add Question</a>
                                            <a href="{{ route('total.result', $item) }}" class="btn btn-success btn-sm" id="questionButton">Result</a>
                                            <a href="{{ route('exam.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('exam.destroy',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection

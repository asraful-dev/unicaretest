@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Materials</h1> <!-- Changed heading to "Materials" -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Materials</li> <!-- Changed breadcrumb to "Materials" -->
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
                <a href="{{ route('material.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
            </h1>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h3 class="card-title">Materials</h3> <!-- Changed card title to "Materials" -->
                            <span class="badge badge-success rounded-pill ml-2" style="font-size: 17px;"> {{ count($materials) }} </span>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image</th>
                                        <th>Book Title</th>
                                        <th>Author</th>
                                        <th>Related Topic</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materials as $key => $item)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td class="col-2">
                                            <img src="{{ asset($item->image) }}" class="justify-content-center" width="80px" height="70px;" alt="No Image">
                                        </td>
                                        <td>{{ $item->book_title ?? 'NULL' }}</td>
                                        <td>{{ $item->author ?? 'NULL' }}</td>
                                        <td>{{ $item->related_topic ?? 'NULL' }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <a href="{{ route('material.in_active',['id'=>$item->id]) }}" class="badge badge-success">Active</a>
                                            @else
                                            <a href="{{ route('material.active',['id'=>$item->id]) }}" class="badge badge-danger">Disable</a>
                                            @endif
                                        </td>
                                        <td class="col-5">
                                            <a href="{{ route('material.view',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                            <a href="{{ route('material.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                            <a href="{{ route('material.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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

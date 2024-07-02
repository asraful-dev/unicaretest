@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class</h1>
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
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Class Add Now</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="unit">Unit Name</label>
                                        <select name="unit_id" class="custom-select" id="unitSelect">
                                            <option selected>Choose Unit</option>
                                            @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">
                                                @if ($unit->unit == 1)
                                                ক ইউনিট
                                                @elseif ($unit->unit == 2)
                                                খ ইউনিট
                                                @elseif ($unit->unit == 3)
                                                গ ইউনিট
                                                @elseif ($unit->unit == 4)
                                                মেডিকেল GK
                                                @else
                                                ICT HSC
                                                @endif
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="subject_id">Subject Name</label>
                                        @error('subject_id')
                                        <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                        @enderror
                                        <select name="subject_id" class="custom-select" id="subjectSelect">
                                            <option selected>Choose Subject</option>
                                            @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" data-unit="{{ $subject->our_service_id }}">{{ ucfirst($subject->subject) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    @php
                                    $uclasses = App\Models\UClass::where('subject_id', $subject->id)->get();
                                    @endphp
                                    
                                    <div class="form-group col-md-4">
                                        <label for="subject_id">Class Topics</label>
                                        @error('topics_name')
                                        <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                        @enderror
                                        <select name="subject_id" class="custom-select" id="subjectSelect">
                                            <option selected>Choose Class topics</option>
                                            @foreach ($uclasses as $class)
                                            <option value="{{ $class->id }}"> {{ $class->class_topic ?? 'N/A' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 
                                    <div class="form-group col-md-4">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" class="form-control" id="start_time" name="start_time" placeholder="Enter batch start time" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="end_time">End Time</label>
                                        <input type="time" class="form-control" id="end_time" name="end_time" placeholder="Enter batch end time" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="status">Status</label>
                                        <select name="status" class="custom-select" id="statusSelect">
                                            <option value="1">Active</option>
                                            <option value="0" selected>Inactive</option>
                                        </select>
                                    </div>
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
                            <h3 class="card-title">Class List</h3>
                            <span class="badge badge-success rounded-pill ml-2" style="font-size: 17px;">N/A</span>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Unit Name</th>
                                        <th>Subject Name</th>
                                        <th>Class Topic</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-1">1</td>
                                        <td>ক ইউনিট</td>
                                        <td>Math</td>
                                        <td>Algebra Basics</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-1">2</td>
                                        <td>খ ইউনিট</td>
                                        <td>Science</td>
                                        <td>Physics Fundamentals</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-1">3</td>
                                        <td>গ ইউনিট</td>
                                        <td>English</td>
                                        <td>Grammar Basics</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Unit Name</th>
                                        <th>Subject Name</th>
                                        <th>Class Topic</th>
                                        <th>Action</th>
                                    </tr>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const unitSelect = document.getElementById('unitSelect');
        const subjectSelect = document.getElementById('subjectSelect');

        unitSelect.addEventListener('change', function () {
            const selectedUnit = this.value;

            // Clear previous subjects
            subjectSelect.innerHTML = '<option selected>Choose Subject</option>';

            @foreach ($subjects as $subject)
            if (selectedUnit == "{{ $subject->our_service_id }}") {
                const option = document.createElement('option');
                option.value = "{{ $subject->id }}";
                option.textContent = "{{ ucfirst($subject->subject) }}";
                subjectSelect.appendChild(option);
            }
            @endforeach
        });
    });
</script>
@endsection

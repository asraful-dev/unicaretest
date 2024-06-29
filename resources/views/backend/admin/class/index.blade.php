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
                        <form action="{{ route('class.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="unit_id">Unit Name</label>
                                    @error('unit_id')
                                    <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                    @enderror
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
                                <div class="form-group">
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
                                <div class="form-group">
                                    <label for="class_topic">Class Topic</label>
                                    @error('class_topic')
                                    <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" id="class_topic" name="class_topic" placeholder="Enter class topic" required>
                                </div>
                                <div class="form-group">
                                    <label for="video_link">Video Link</label>
                                    @error('video_link')
                                    <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" id="video_link" name="video_link" placeholder="Enter video link" required>
                                </div>
                                <div class="form-group">
                                    <label for="lecture_shit">Lecture Shit <span class="text-danger font-weight-bolder">(PDf File Allowed)</span></label>
                                    @error('lecture_shit')
                                    <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="form-control" id="lecture_shit" name="lecture_shit" placeholder="Enter lecture shit">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description (Optional)</label>
                                    @error('description')
                                    <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                    @enderror
                                    <textarea name="description" class="form-control" id="" cols="10" rows="5"></textarea>
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
                            <span class="badge badge-success rounded-pill ml-2" style="font-size: 17px;"> {{ count($classes) }} </span>
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
                                    @foreach($classes as $key => $class)
                                    <tr>
                                        <td class="col-1">{{ $key+1}} </td>
                                        <td>
                                            @if ($class->unit)
                                            @switch($class->unit->unit)
                                            @case(1)
                                            ক ইউনিট
                                            @break

                                            @case(2)
                                            খ ইউনিট
                                            @break

                                            @case(3)
                                            গ ইউনিট
                                            @break

                                            @case(4)
                                            মেডিকেল GK
                                            @break

                                            @default
                                            ICT HSC
                                            @endswitch
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>
                                            {{ ucfirst($class->subject->subject ?? 'N/A') }}
                                        </td>
                                        <td>{{ $class->class_topic ?? 'N/A' }}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#exampleModalEdit{{ $class->id }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModalView{{ $class->id }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('class.delete',$class->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="exampleModalEdit{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Class Edit Now</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('class.update',$class->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="className">Class Name</label>
                                                            @error('class_name')
                                                            <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                                            @enderror
                                                            <input type="text" value="{{ $class->class_name }}" class="form-control" id="className" name="class_name" placeholder="Enter class name">
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

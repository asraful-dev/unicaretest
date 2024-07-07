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
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="h3 mb-2 text-gray-800 text-right">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus" aria-hidden="true"></i> Create
                        </a>
                    </h1>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
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
                                    <span class="text-danger font-weight-bolder d-block">{{ $message }}</span>
                                    @enderror
                                    <select name="unit_id" class="custom-select @error('unit_id') is-invalid @enderror" id="unitSelect">
                                        <option selected>Choose Unit</option>
                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subject_id">Subject Name</label>
                                    @error('subject_id')
                                    <span class="text-danger font-weight-bolder d-block">{{ $message }}</span>
                                    @enderror
                                    <select name="subject_id" class="custom-select @error('subject_id') is-invalid @enderror" id="subjectSelect">
                                        <option selected>Choose Subject</option>
                                        <!-- Options will be dynamically populated using JavaScript -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="class_topic">Class Topic</label>
                                    @error('class_topic')
                                    <span class="text-danger font-weight-bolder d-block">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control @error('class_topic') is-invalid @enderror" id="class_topic" name="class_topic" placeholder="Enter class topic" required>
                                </div>
                                <div class="form-group">
                                    <label for="video_link">Video Link</label>
                                    @error('video_link')
                                    <span class="text-danger font-weight-bolder d-block">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control @error('video_link') is-invalid @enderror" id="video_link" name="video_link" placeholder="Enter video link" required>
                                </div>
                                <div class="form-group">
                                    <label for="lecture_shit">Lecture Shit <span class="text-danger font-weight-bolder">(PDF File Allowed)</span></label>
                                    @error('lecture_shit')
                                    <span class="text-danger font-weight-bolder d-block">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="form-control @error('lecture_shit') is-invalid @enderror" id="lecture_shit" name="lecture_shit" placeholder="Enter lecture shit">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description (Optional)</label>
                                    @error('description')
                                    <span class="text-danger font-weight-bolder d-block">{{ $message }}</span>
                                    @enderror
                                    <textarea name="description" class="form-control" id="description" cols="10" rows="5"></textarea>
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

            <!-- Class List Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Class List</h3>
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
                                           @php
                                               $unit = App\Models\Unit::where('id',$class->unit_id)->first();
                                           @endphp
                                           {{ $unit->unit_name }}
                                        </td>
                                        <td>
                                            {{ ucfirst($class->subject->subject ?? 'N/A') }}
                                        </td>
                                        <td>{{ $class->class_topic ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('class.edit',$class->id) }}"  class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModalView{{ $class->id }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('class.delete',$class->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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

            // Reset subject options
            subjectSelect.innerHTML = '<option selected>Choose Subject</option>';

            // Fetch subjects via AJAX
            fetchSubjects(selectedUnit);
        });

        function fetchSubjects(unitId) {
            // AJAX request to fetch subjects based on unit ID
            fetch('{{ route('getSubjectsByUnit') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ unit_id: unitId })
            })
            .then(response => response.json())
            .then(data => {
                // Populate subject select options dynamically
                data.forEach(subject => {
                    const option = document.createElement('option');
                    option.value = subject.id;
                    option.innerText = subject.subject;
                    subjectSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching subjects:', error));
        }
    });
</script>
@endsection
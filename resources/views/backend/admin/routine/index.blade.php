@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class Routine</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $pageTitle ?? 'N/A' }}</li>
                    </ol>
                </div>
            </div>
        </div>
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
                        <form action="{{ route('routine.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="unit">Unit Name</label>
                                        <select name="unit" class="custom-select" id="unitSelect">
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
                                    <div class="form-group col-md-4">
                                        <label for="class_topic">Class Topics</label>
                                        @error('class_topic')
                                        <span class="text-danger font-weight-bolder">{{ $message }}</span>
                                        @enderror
                                        <select name="class_topic" class="custom-select" id="classTopicSelect">
                                            <option selected>Choose Class topics</option>
                                            @foreach ($uclasses as $subjectId => $classes)
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}" data-subject="{{ $subjectId }}">{{ $class->class_topic ?? 'N/A' }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="start_time">Start Time</label>
                                        <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="end_time">End Time</label>
                                        <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="status">Status</label>
                                        <select name="status" class="custom-select" id="statusSelect">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
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
                            <h3 class="card-title">Class Routine List</h3>
                            <span class="badge badge-success rounded-pill ml-2" style="font-size: 17px;">N/A</span>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Unit Name</th>
                                        <th>Subject Name</th>
                                        <th>Class Topic</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($class_routine as $routine)
                                        @php
                                            $unit = App\Models\OurService::find($routine->unit);

                                            $subject = App\Models\ServiceDetail::find($routine->subject_id);

                                            $class_topic = App\Models\UClass::find($routine->class_topic);
                                        @endphp
                                        <tr>
                                            <td class="col-1">{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($unit)
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
                                                @else
                                                    <!-- Handle case where unit is not found -->
                                                    Unit Not Found
                                                @endif
                                            </td>
                                            <td>{{ ucwords($subject->subject) }}</td>
                                            <td>{{ ucwords($class_topic->class_topic) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($routine->start_time)->format('j M Y, g:i a') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($routine->end_time)->format('j M Y, g:i a') }}</td><td>
                                                <a href="{{ route('routine.edit', $routine->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('routine.show', $routine->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                                <a href="{{ route('routine.delete',$routine->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<script>
    // Prepare the subjects and class topics data
    const subjects = @json($subjects);
    const uclasses = @json($uclasses);

    document.addEventListener('DOMContentLoaded', function() {
        const subjectSelect = document.getElementById('subjectSelect');
        const classTopicSelect = document.getElementById('classTopicSelect');

        // Populate subjects based on selectedUnit
        function populateSubjects(selectedUnit) {
            // Clear previous subjects
            subjectSelect.innerHTML = '<option selected>Choose Subject</option>';

            subjects.forEach(subject => {
                if (selectedUnit == subject.our_service_id) {
                    const option = document.createElement('option');
                    option.value = subject.id;
                    option.textContent = ucfirst(subject.subject);
                    subjectSelect.appendChild(option);
                }
            });
        }

        // Populate class topics based on selected subject
        function populateClassTopics(selectedSubject) {
            // Clear previous class topics
            classTopicSelect.innerHTML = '<option selected>Choose Class topics</option>';

            if (uclasses[selectedSubject]) {
                uclasses[selectedSubject].forEach(classTopic => {
                    const option = document.createElement('option');
                    option.value = classTopic.id;
                    option.textContent = classTopic.class_topic ?? 'N/A';
                    classTopicSelect.appendChild(option);
                });
            }
        }

        // Event listener for unit selection
        document.getElementById('unitSelect').addEventListener('change', function() {
            const selectedUnit = this.value;
            populateSubjects(selectedUnit);

            // Clear previous class topics
            classTopicSelect.innerHTML = '<option selected>Choose Class topics</option>';
        });

        // Event listener for subject selection
        subjectSelect.addEventListener('change', function() {
            const selectedSubject = this.value;
            populateClassTopics(selectedSubject);
        });

        // Utility function to capitalize the first letter
        function ucfirst(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    });
</script>

@endsection

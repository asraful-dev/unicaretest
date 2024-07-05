@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Class Routine</h1>
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
                <a href="{{ route('routine.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i> Back
                </a>
            </h1>
            <!-- Form for Editing Class Routine -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Class Routine</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('routine.update', $class_routine->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="unit">Unit Name</label>
                                <select name="unit" class="custom-select" id="unitSelect">
                                    <option selected>Choose Unit</option>
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" {{ $class_routine->unit == $unit->id ? 'selected' : '' }}>
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
                                    <option value="{{ $subject->id }}" {{ $class_routine->subject_id == $subject->id ? 'selected' : '' }} data-unit="{{ $subject->our_service_id }}">{{ ucfirst($subject->subject) }}</option>
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
                                            <option value="{{ $class->id }}" {{ $class_routine->class_topic == $class->id ? 'selected' : '' }} data-subject="{{ $subjectId }}">{{ $class->class_topic ?? 'N/A' }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="start_time">Start Time</label>
                                <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ $class_routine->start_time }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="end_time">End Time</label>
                                <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ $class_routine->end_time }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="status">Status</label>
                                <select name="status" class="custom-select" id="statusSelect">
                                    <option value="1" {{ $class_routine->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $class_routine->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const subjects = @json($subjects);
        const uclasses = @json($uclasses);
        const subjectSelect = document.getElementById('subjectSelect');
        const classTopicSelect = document.getElementById('classTopicSelect');

        function populateSubjects(selectedUnit) {
            subjectSelect.innerHTML = '<option selected>Choose Subject</option>';
            subjects.forEach(subject => {
                if (selectedUnit == subject.our_service_id) {
                    const option = document.createElement('option');
                    option.value = subject.id;
                    option.textContent = ucfirst(subject.subject);
                    option.selected = subject.id == '{{ $class_routine->subject_id }}';
                    subjectSelect.appendChild(option);
                }
            });
        }

        function populateClassTopics(selectedSubject) {
            classTopicSelect.innerHTML = '<option selected>Choose Class topics</option>';
            if (uclasses[selectedSubject]) {
                uclasses[selectedSubject].forEach(classTopic => {
                    const option = document.createElement('option');
                    option.value = classTopic.id;
                    option.textContent = classTopic.class_topic ?? 'N/A';
                    option.selected = classTopic.id == '{{ $class_routine->class_topic }}';
                    classTopicSelect.appendChild(option);
                });
            }
        }

        document.getElementById('unitSelect').addEventListener('change', function() {
            const selectedUnit = this.value;
            populateSubjects(selectedUnit);
            classTopicSelect.innerHTML = '<option selected>Choose Class topics</option>';
        });

        subjectSelect.addEventListener('change', function() {
            const selectedSubject = this.value;
            populateClassTopics(selectedSubject);
        });

        function ucfirst(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        populateSubjects(document.getElementById('unitSelect').value);
        populateClassTopics(subjectSelect.value);
    });
</script>

@endsection

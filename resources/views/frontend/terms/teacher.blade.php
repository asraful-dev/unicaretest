@extends('layouts.frontend')

@section('content-frontend')


    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
        }
        .card-header {
            background-color: #111D5E;
        }
        .btn-primary {
            background-color: #E32845;
            border-color: #E32845;
        }
        .btn-primary:hover {
            background-color: #c71c39;
            border-color: #c71c39;
        }
        .form-label {
            color: #111D5E;
        }
        .form-control {
            border: 2px solid #E32845;
        }
    </style>


    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card rounded-lg shadow-sm">
                    <div class="card-header text-center text-white">
                        <h4 class="text-white">REGISTRATION</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            {{-- <div class="form-group mb-3">
                                <label for="mobileNumber" class="form-label text-white">Course Name:<i class="fas fa-phone-alt"></i></label>
                                <input type="text" name="course_name" value="{{ old('course_name') }}" id="course_name" class="form-control" placeholder="Enter Course Name">
                                @error('course_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="mobileNumber" class="form-label text-white">Teacher Name:<i class="fas fa-phone-alt"></i></label>
                                <input type="text" name="instructor_name" value="{{ old('instructor_name') }}" id="instructor_name" class="form-control" placeholder="Enter Instructor Name">
                                @error('instructor_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="mobileNumber" class="form-label text-white">Department:<i class="fas fa-phone-alt"></i></label>
                              <input type="text" name="department" value="{{ old('department') }}" id="department" class="form-control" placeholder="Enter Your Department">
                              @error('department')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div> --}}
                            <div class="form-group mb-3">
                                <label for="mobileNumber" class="form-label text-white">Enter Your Mobile Number <i class="fas fa-phone-alt"></i></label>
                                <input type="text" class="form-control" id="mobileNumber" aria-describedby="mobileNumberHelp" placeholder="Enter your Number">
                            </div>
                            {{-- <div class="form-group mb-3">
                                <label for="mobileNumber" class="form-label text-white">Experience Year<i class="fas fa-phone-alt"></i></label>
                                <input type="text" name="experience" value="{{ old('experience') }}" id="experience" class="form-control" placeholder="Enter Experience">
                                @error('experience')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="mobileNumber" class="form-label text-white">Experience Year<i class="fas fa-phone-alt"></i></label>
                                <input type="text" name="experience" value="{{ old('experience') }}" id="experience" class="form-control" placeholder="Enter Experience">
                                @error('experience')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <button type="submit" class="btn btn-primary text-white">Next</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection
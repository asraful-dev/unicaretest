@extends('layouts.frontend')
@section('content-frontend')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
       .form-check-input {
        width: 20px;
        height: 20px;
    }

    .form-check-label {
        font-size: 18px;
        margin-left: 10px;
    }

    .card-footer {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .btn-enroll {
        transition: background-color 0.3s ease;
    }

    .btn-enroll:hover {
        background: linear-gradient(to right, #562270, #111D5E) !important;
    }
        .card-body h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .card-footer .btn {
            margin: 0 5px;
        }
        .btn-details {
            color: #fff;
        }
       
       

        .course-home-section {
            background-image: url({{asset('courseBefore.jpg')}});
            background-size: cover;
            background-position: center;
        }
        .course-home-section .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .course-home-section .row {
            justify-content: center;
        }
    </style>
</head>
<body>
<section class="course-home-section m-5">
    <div class="container">
        <div class="head d-flex justify-content-center">
            <h1 class="head1">Course About</h1>
        </div>
        <div class="row d-flex justify-content-center">
            <!-- Example Program Card 1 -->
            <div class="col-lg-12 col-md-6 col-sm-6 course mb-4" data-class="Admission" data-program="in-branch,online" data-payment="paid">
                <div class="card shadow">
                    <div class="card-body">
                        {{-- <h3>
                            <span>মেডিকেল + ভার্সিটি Math এডমিশন প্রোগ্রাম 2024</span>
                        </h3> --}}
                       
                    
                        <form action="{{ route('check.out', $service->id) }}" method="GET" class="p-3">

                            
                            <div class="card-footer text-center border-0 pb-3 d-flex justify-content-center align-items-center flex-column">
                                <div class="form-check form-check-inline mb-3 d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="course_status" value="0">
                                    <label class="form-check-label" for="offline" style="color: #111D5E; font-weight: bold; margin-left: 8px;">Offline</label>
                                </div>
                                <div class="form-check form-check-inline mb-3 d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="course_status" value="1">
                                    <label class="form-check-label" for="online_combo" style="color: #E02252; font-weight: bold; margin-left: 8px;">Online</label>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-enroll shadow" style="color: white; background: linear-gradient(to right, #111D5E, #562270) !important; padding: 10px 20px; font-size: 16px; border-radius: 5px;">Submit</button>
                            </div>
                        </form>
                        
                    
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Include SweetAlert 2 -->


</body>
</html>

@endsection

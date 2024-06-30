@extends('layouts.frontend')
@section('content-frontend')

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fa;
        }
        .panel.panel-default {
            border-top-width: 3px;
        }
        .panel {
            box-shadow: 0 3px 1px -2px rgba(0,0,0,.14),0 2px 2px 0 rgba(0,0,0,.098),0 1px 5px 0 rgba(0,0,0,.084);
            border: 0;
            border-radius: 4px;
            margin-bottom: 16px;
        }
        .thumb128 {
            width: 300px!important;
            height: 200px!important;
            border-radius: 8px;
        }
        .list-group-item {
            border: none;
            padding: 5px 10px;
            margin-bottom: 10px;
            background: #E32845;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
            transition: background 0.3s ease, color 0.3s ease;
            text-align: center;
        }
        .list-group-item:hover {
            background: #111D5E;
            color: #fff;
        }
        .list-group-item a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .list-group-item a:hover {
            text-decoration: none;
            color: white;
        }
        .btn-info {
            background: #E32845;
            border-color: #E32845;
            color: white;
            transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        .btn-info:hover {
            background: #111D5E;
            border-color: #111D5E;
            color: white;
        }
    </style>

<div class="container bootstrap snippets bootdey mt-5">
    <div class="row ng-scope">
        <div class="col-md-4">
            @include('frontend.common.sidenav')
        </div>
        <div class="col-md-8">
            
                <div class="container-fluid">
                    <div class="card card-light card-outline shadow-lg mb-4" style="background-color: white;">
                        <div class="card-header py-3" style="background-color: white;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title m-0 font-weight-bold text-dark">
                                        Course Details
                                    </h3>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body" style="background-color: white;">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-dark">Course Unit</td>
                                        <td class="text-dark">
                                        @if ($course->unit == 1)
                                            ক ইউনিট
                                        @elseif ($course->unit == 2)
                                            খ ইউনিট
                                        @elseif ($course->unit == 3)
                                            গ ইউনিট
                                        @elseif ($course->unit == 4)
                                            মেডিকেল GK
                                        @else
                                            ICT HSC
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">Course Amount</td>
                                        <td class="text-dark"> ৳{{ number_format($course->total_amount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">Payment Status</td>
                                        <td>
                                            @if($course->payment_status == 1)
                                            <span class="badge badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-danger">Unpaid</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">Payment Date</td>
                                        <td>
                                            {{ $course->created_at->format('d M Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">Payment Method</td>
                                        <td>
                                            {{ ucfirst($course->payment_method) }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">Course Status</td>
                                        <td>
                                            @if ($course->course_status == 1)
                                                Online
                                            @else
                                                Offline
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">Course Photo</td>
                                        <td>
                                            <img src="{{ asset($serviceImage ?? 'frontend/default-image.png') }}" alt="" style="height:70px; width:80px;">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          
            
        </div>
    </div>
</div>



<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection

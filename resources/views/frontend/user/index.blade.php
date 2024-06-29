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

        @php
        $current_user = Auth::user()->id;
        $courselists = App\Models\Payment::where('user_id', $current_user)->latest()->get();
    @endphp
    
    <div class="col-md-8">
        <div class="panel panel-default shadow-lg">
            <div class="panel-body">
                <div class="h4 text-center font-weight-bolder" style="text-decoration: underline;">My Course List</div><br>
                <div class="row pv-lg">
                    <div class="col-lg-12">
                        @if($courselists->isEmpty())
                            <div class="alert alert-warning text-center">No courses found</div>
                        @else
                            <table class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Course Photo</th>
                                        <th>Course Unit</th>
                                        <th>Amount</th>
                                        {{-- <th>Payment Method</th> --}}
                                        <th>Payment Status</th>
                                        <th>Payment Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courselists as $index => $course)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @php
                                                $serviceImage = App\Models\OurService::where('unit', $course->unit)->pluck('image')->first();
                                            @endphp
                                            <img src="{{ asset($serviceImage ?? 'frontend/default-image.png') }}" width="70" height="60" alt="No Photo">
                                        </td>
                                        <td>
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
                                        <td class="col-2 font-weight-bolder">
                                            ৳{{ number_format($course->total_amount, 2) }}
                                        </td>
                                        <td class="text-center">
                                            @if($course->payment_status == 1)
                                                <a href="#" class="btn btn-success btn-sm">Paid</a>
                                            @else
                                                <a href="#" class="btn btn-danger btn-sm">Unpaid</a>
                                            @endif
                                        </td>
                                        <td>{{ $course->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('course.details',$course->id) }}" class="btn btn-primary btn-sm">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#111D5E; color:white">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('passwordUpdate') }}">
            @csrf

            <div class="form-group row">
                <label for="old_password" class="col-md-4 col-form-label text-md-right">Old Password</label>

                <div class="col-md-6">
                    <input id="old_password" type="password" class="form-control" name="old_password" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button class="btn btn-info">
                        Change Password
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection

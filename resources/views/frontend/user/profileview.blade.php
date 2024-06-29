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
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="h4 text-center">Contact Information</div>
                    <div class="row pv-lg">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <form class="form-horizontal ng-pristine ng-valid" method="" action="#">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="inputContact1">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="inputContact1" type="text" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="inputContact2">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="inputContact2" type="email" name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="inputContact3">Phone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="inputContact3" type="text" name="phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="inputContact6">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputContact6" name="address" rows="4">{{ Auth::user()->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button class="btn btn-info" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
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

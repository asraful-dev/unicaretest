@extends('layouts.frontend')
@section('content-frontend')

@php
$branchs = App\Models\Branch::where('status', 1)->latest()->get();
@endphp
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card {
          border-radius:15px; 
        }
      </style>
    <title>Hello, world!</title>
  </head>
  <body style="background-color: #1F2C75;">
    <div class="py-5">
        <div class="container">
           <h2 class="text-light font-weight-bold">দেশব্যাপী আামাদের শাখা সমুহ </h2><br>
          
           <div class="row">
            @foreach($branchs as $branch)
            <div class="col-md-4 mt-4">
              <div class="card p-3">
                <div class="card-block">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title font-weight-bold">{{ $branch->branch_name}}</h4>
                            </div>
                            <div class="col text-right">
                                <h4 class="card-title right"><a href="{{ $branch->area_link }}">
                                    <img src="{{ asset('mapicon.png') }}" alt="">
                                </a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title d-inline">
                                    <a href="facebook.com">
                                        <i class="fa-solid fa-phone"></i>
                                    </a>
                                </h4>
                                <p class="d-inline">{{ $branch->contact_no}}</p>
                            </div>
                            <div class="col text-left">
                                <h4 class="card-title d-inline">
                                    <a href="facebook.com">
                                        <i class="fa-solid fa-phone"></i>
                                    </a>
                                </h4>
                                <p class="d-inline">{{ $branch->contact_no_optional }}</p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
           @endforeach
           
          </div><br>
          
        </div>
      </div>

  

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>

@endsection

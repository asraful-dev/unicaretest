@extends('layouts.backend')
@section('content')

<style>
    body {
      background-color: #111D5E;
    }
    .container {
      margin-top: 50px;
    }
    .card {
      border-radius: 10px;
      margin-bottom: 20px;
    }
    .card-header{
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      color: white;
      background-color: #17A2B8;
    }
    .first-place .card-header {
      background-color: #FFD700;
    }

   
  </style>
<!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Total Result</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Brand</li>
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
            <a href="{{ route('brand.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
        </h1>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">Total Result List</h3>
                <span class="badge badge-success rounded-pill ml-2" style="font-size: 17px;"></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="container">
                    <h1 class="text-center text-white">User Ranking</h1>
                    <div class="row">
                        @foreach ($ranking as $rank)
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5>{{ $rank['position'] }}</h5>
                                </div>
                                <div class="card-body">
                                    <p>Name: {{ $rank['name'] }}</p>
                                    <p>Correct Answers: {{ $rank['correct_answers'] }}</p>
                                    <p>Incorrect Answers: {{ $rank['incorrect_answers'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    </div>
                   
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
@endsection

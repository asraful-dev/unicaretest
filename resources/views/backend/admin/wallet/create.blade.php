@extends('layouts.backend')
@section('content')
@php
       $wallet = App\Models\Wallet::first();
@endphp
<style>
   .bg-light {
   background-color: #28a745!important;
   /* color: white; */
   }
   .bg-light, .bg-light>a {
   /* color: #1f2d3d!important; */
   color: #fff!important;
   }
</style>
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Our Wallet</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Our Wallet</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Page Heading -->
         <div class="row offset-1">
            <div class="col-10">
               <div class="card card-primary card-outline shadow-lg">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-sm-6">
                           <h3 class="card-name">
                              Add Our Wallet
                           </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                           <a href="{{ route('success.index') }}" class="btn btn-danger">
                           <i class="fas fa-long-arrow-alt-left"></i>
                           Back to List
                           </a>
                        </div>
                     </div>
                  </div>
                  <form action="{{ route('update.wallet',$wallet->id) }}" method="POST" enctype="multipart/form-data">
                     @csrf 
                     <div class="row m-5">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="name">Bkash<span class="text-danger">*</span></label>
                              <input type="number" name="bkash" value="{{ $wallet->bkash }}" id="name" class="form-control">
                              @error('bkash')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="name">Nagad<span class="text-danger">*</span></label>
                              <input type="number" name="nagad" value="{{ $wallet->nagad }}" id="name" class="form-control" >
                              @error('nagad')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="name">Rocket<span class="text-danger">*</span></label>
                              <input type="number" name="rocket" value="{{ $wallet->rocket }}" id="name" class="form-control"placeholder="{{ $wallet->rocket }}">
                              @error('rocket')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12 text-right">
                           <div class="form-group">
                              <button class="btn btn-success" type="submit">Submit</button>
                           </div>
                        </div>
                     </div>
                  </form>
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
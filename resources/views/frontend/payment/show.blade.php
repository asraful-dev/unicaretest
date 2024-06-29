@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline shadow-lg mb-4">
            <div class="card-header py-3">
               <div class="row">
                  <div class="col-sm-6">
                     <h3 class="card-title m-0 font-weight-bold text-primary">
                       Payemnt Details
                     </h3>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="{{ route('payment.details') }}" class="btn btn-danger">
                     <i class="fas fa-long-arrow-alt-left"></i>
                     Back to List
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered">
                    @php
                            $user = App\Models\User::find($payment->user_id);
                            $userName = $user ? $user->name : 'User Not Found';
                        @endphp
                         <tr>
                           <td>Unit Image</td>
                           <td>
                              @php
                                  $serviceImage = App\Models\OurService::where('unit', $payment->unit)->pluck('image')->first();
                              @endphp
                              <img src="{{ asset($serviceImage ?? 'frontend/default-image.png') }}" width="70" height="60" alt="No Photo">
                          </td>
                        </tr>
                        <tr>
                           <td class="text-dark">Course Unit</td>
                           <td class="text-dark">
                           @if ($payment->unit == 1)
                              ক ইউনিট
                           @elseif ($payment->unit == 2)
                              খ ইউনিট
                           @elseif ($payment->unit == 3)
                              গ ইউনিট
                           @elseif ($payment->unit == 4)
                              মেডিকেল GK
                           @else
                              ICT HSC
                           @endif
                        </tr>
                     <tr>
                        <td>Student Name</td>
                        <td>{{ Str::ucfirst($userName) }}</td>
                     </tr>
                    
                     <tr>
                        <td class="text-dark">Course Status</td>
                        <td>
                            @if ($payment->course_status == 1)
                                Online
                            @else
                            Offline
                            @endif
                        </td>
                     </tr>
                     
                     <tr>
                        <td>Transaction ID</td>
                        <td> {{ $payment->transaction_id }}</td>
                     </tr>
                     <tr>
                        <td>Total Amount</td>
                        <td>  ৳{{ number_format($payment->total_amount, 2) }}</td>
                     </tr>
                     <tr>
                        <td>Payment Method</td>
                        <td>{{ Str::ucfirst($payment->payment_method) }}</td>
                     </tr>
                      <td>Payemnt Status</td>
                      <td>
                        @if($payment->payment_status == 1)
                        <span class="badge badge-success">Paid</span>
                        @else
                        <span class="badge badge-danger">Unpaid</span>
                        @endif

                      </td>
                      <tr>
                        <td>Screenshot</td>
                        <td>
                            <img src="{{ asset($payment->screenshot) }}" class="justify-content-center" width="80px" height="70px;" alt="No Image">
                        </td>
                     </tr>
                    
                  </table>
               </div>
            </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 </div>
@endsection

@extends('layouts.backend')
@section('content')
<!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Payment</li>
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
            <a href="#" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
        </h1>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">payment List</h3>
                <span class="badge badge-success rounded-pill ml-2" style="font-size: 17px;"> {{ count($payment) }} </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Screenshot</th>
                    <th>Transaction ID</th>
                    <th>Total Amount</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($payment as $key => $item)
                    <tr>
                        <td class="col-1"> {{ $key+1 }} </td>
                
                        @php
                            $user = App\Models\User::find($item->user_id);
                            $userName = $user ? $user->name : 'User Not Found';
                        @endphp
                        <td class="col-2">
                            {{ Str::ucfirst($userName) }}
                        </td>
                        <td class="col-1">
                            <img src="{{ asset($item->screenshot) }}" class="justify-content-center" width="80px" height="70px;" alt="No Image">
                        </td>
                        
                        <td class="col-2">
                            {{ $item->transaction_id }}
                        </td>
                        <td class="col-2 font-weight-bolder">
                          ৳{{ number_format($item->total_amount, 2) }}
                        </td>
                        <td class="col-1">
                          {{ Str::ucfirst($item->payment_method) }}
                        </td>
                        <td class="col-1">
                          @if($item->payment_status == 1)
                              <a href="#" data-toggle="modal" data-target="#payment-change{{ $item->id }}" class="badge badge-success" style="pointer-events: none; cursor: default;">Paid</a>
                          @else
                              <a href="#" data-toggle="modal" data-target="#payment-change{{ $item->id }}" class="badge badge-danger">UnPaid</a>
                          @endif
                      </td>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="payment-change{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="statusModalLabel">Confirm Status Change</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      Are you sure you want to change the payment status to 
                                      @if($item->payment_status == 1)
                                          <span>UnPaid</span>?
                                      @else
                                          <span>Paid</span>?
                                      @endif
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      <a href="{{ route('payment.change', $item->id) }}" class="btn btn-primary">Confirm</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                        <td class="col-2">
                            <a href="{{ route('payment.show',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                            {{-- <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> --}}
                            <a href="#" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                
                  </tfoot>
                </table>
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

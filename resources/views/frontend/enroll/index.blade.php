
@extends('layouts.frontend')
@section('content-frontend')

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
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if ($service->unit == 1)
                                            ক ইউনিট
                                        @elseif ($service->unit == 2)
                                            খ ইউনিট
                                        @elseif ($service->unit == 3)
                                            গ ইউনিট
                                        @elseif ($service->unit == 4)
                                            মেডিকেল GK
                                        @else
                                            ICT HSC
                                        @endif
                                    </td>
                                    <td id="priceField">{{ $service->price }}</td>
                                    @if($service->discount_price)
<<<<<<< HEAD
                                        <td>{{ $service->discount_price }}</td>
=======
                                        <td id="discountPrice">{{ $service->discount_price }}</td>
>>>>>>> d378bc4efd200d7eac89ebfaaa96a4caeca9e9ef
                                    @else
                                        <td>No Discount</td>
                                    @endif
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="cart_total_label" colspan="2">
                                        <h6 class="text-muted">SUBTOTAL</h6>
                                    </td>
                                    <td id="subtotalField">
                                        @if($service->discount_price)
                                            {{ number_format($service->price - $service->discount_price) }}
                                        @else
                                            {{ number_format($service->price) }}
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    
<<<<<<< HEAD
                        <form action="{{ route('check.out', $service->id) }}" method="GET" class="p-3">
=======
                        <form action="{{ route('check.out', $service->id) }}" method="GET" class="p-3" id="checkoutForm">
>>>>>>> d378bc4efd200d7eac89ebfaaa96a4caeca9e9ef
                            <div class="card-footer text-center border-0 pb-3 d-flex justify-content-center align-items-center flex-column">
                                <div class="form-check form-check-inline mb-3 d-flex align-items-center">
                                    <input class="form-check-input" id="offline" type="radio" name="course_status" value="0" onclick="updatePrice('offline')" style="cursor: pointer;">
                                    <label class="form-check-label" for="offline" style="color: #111D5E; font-weight: bold; margin-left: 8px; cursor: pointer;">Offline</label>
                                </div>
                                <div class="form-check form-check-inline mb-3 d-flex align-items-center">
                                    <input class="form-check-input" id="online_combo" type="radio" name="course_status" value="1" onclick="updatePrice('online')" style="cursor: pointer;">
                                    <label class="form-check-label" for="online_combo" style="color: #E02252; font-weight: bold; margin-left: 8px; cursor: pointer;">Online</label>
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Include SweetAlert 2 -->
<script>
    function updatePrice(type) {
        var priceField = document.getElementById('priceField');
        var subtotalField = document.getElementById('subtotalField');
        var discountPrice = document.getElementById('discountPrice');
        var coursetype = type === 'online' ? 1 : 0; // Assuming 1 is online, 0 is offline
        // alert(coursetype);
        // Make an AJAX request to fetch price based on coursetype
        $.ajax({
            url: "{{ route('fetch.price') }}", // Replace with your route to fetch price
            type: 'GET',
            data: { coursetype: coursetype },
            success: function(response) {
                priceField.textContent = response.price;
                subtotalField.textContent = response.subtotal;
                discountPrice.textContent = response.discountPrice;
                // Show success message using SweetAlert
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'The price has been change successfully.',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
                // Handle error if needed
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Something went wrong! Please try again later.',
                    // confirmButtonText: 'OK'
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }
</script>
@endsection
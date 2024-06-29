@extends('layouts.frontend')
@section('content-frontend')
@php
    $service = App\Models\OurService::findOrFail($ser_id);
@endphp
<section class="ps-section--account ps-checkout d-flex justify-content-center align-items-center" style="min-height: 100vh; background: #f8f9fa;">
    <div class="container m-4">
        <div class="ps-section__content">
            <div class="ps-form__content">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <!-- Merged Payment Information and Rocket Payment Section -->
                        <div class="payment-section border rounded p-4 mb-5 shadow-sm bg-white">
                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-8 col-md-12 mb-4 mb-lg-0">
                                    <h2 class="text-danger">রকেট পেমেন্ট</h2>
                                    <p>আপনার রকেট মেনু থেকে পেমেন্ট নির্বাচন করতে হবে</p>
                                </div>
                                <div class="col-lg-4 col-md-12 text-center">
                                    <img class="img-fluid" src="https://eshopttka.com/frontend/payment/rocket.png" alt="Rocket Payment">
                                </div>
                            </div>
                            <h2 class="bg-danger text-light text-center p-3 rounded">To Pay by Rocket Follow the Instructions Below:</h2>
                            <div class="mt-4">
                                <h3>Payment Procedure:</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">01. *322# ডায়াল করে রকেট মোবাইল মেনু্তে যান</li>
                                    <li class="list-group-item">02. "পেমেন্ট সিলেক্ট করুন"</li>
                                    <li class="list-group-item">03. আমাদের মার্চেন্ট রকেট একাউন্ট নাম্বারটি প্রবেশ <span class="text-danger">({{ $wallet->rocket }})</span> করুন</li>
                                    <li class="list-group-item">04. ইনভয়েস এর মোট @if($service->discount_price) {{ number_format($service->price - $service->discount_price) }} @else {{ number_format($service->price) }} @endif টাকা প্রবেশ করুন</li>
                                    <li class="list-group-item">05. রেফারেন্স হিসেবে 112 এই নাম্বারটি প্রবেশ করুন</li>
                                    <li class="list-group-item">06. আপনার রকেট মোবাইল মেনু পিনটি দিয়ে পেমেন্ট সম্পন্ন করুন</li>
                                    <h2 class="text-center mt-3">AND Then Click "Make payment" Button</h2>
                                </ul>
                            </div>

                            <!-- Shipping & User Information Section -->
                            <div class="shipping-info mt-4" style="border: 1px solid #ddd; padding: 20px;">
                                <h4>Shipping & User Information</h4>
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div>
                                        <small>Username:</small>
                                        <p><a href="#">{{ Auth::user()->name }}</a></p>
                                    </div>
                                    <div>
                                        <small>Email:</small>
                                        <p><a href="#">{{ Auth::user()->email }}</a></p>
                                    </div>
                                    <div>
                                        <small>Phone:</small>
                                        <p><a href="#">{{ Auth::user()->phone }}</a></p>
                                    </div>
                                    <div>
                                        <small>Total Amount:</small>
                                        <p>
                                            <strong>
                                                @if($service->discount_price)
                                                    {{ number_format($service->price - $service->discount_price) }}
                                                @else
                                                    {{ number_format($service->price) }}
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Rocket Payment Form -->
                            <div class="payment-method-section mt-4">
                                <h4 class="text-primary">Rocket Payment</h4>
                                <div class="ps-block--payment-method">
                                    <form  class="ps-form--visa" action="{{ route('process.payment') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                      
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="payment_method" value="rocket">
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                        <input type="hidden" name="unit" value="{{ $service->unit }}">
                                        <input type="hidden" name="course_status" value="{{ $course_status}}">
                                        <div class="form-group">
                                            <label for="sender_number">Sender Number</label>
                                            <input class="form-control" id="sender_number" name="sender_number" type="number" placeholder="Enter Sender Number" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_amount">Order Amount</label>
                                            <input class="form-control" id="total_amount" name="total_amount" type="text" value="@if($service->discount_price)
                                                {{ number_format($service->price - $service->discount_price) }}
                                            @else
                                                {{ number_format($service->price) }}
                                            @endif">
                                        </div>
                                        <div class="form-group">
                                            <label>Personal Bkash Number</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $wallet->bkash }}" readonly id="copyWallet">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-info" onclick="copyToClipboard()">Copy Bkash Number</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="transaction_id">Transaction ID</label>
                                            <input class="form-control" id="transaction_id" name="transaction_id" type="text" placeholder="Enter Transaction ID" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="screenshot">Screenshot</label>
                                            <input class="form-control-file" id="screenshot" name="screenshot" type="file" onchange="previewImage(event)" required>
                                        </div>
                                        <div class="form-group">
                                            <img width="200" height="100" class="mt-3" src="https://eshopttka.com/upload/no_image.jpg" id="item_output" alt="No Image">
                                        </div>
                                        <div class="form-group submit mt-3">
                                            <button class="btn btn-enroll shadow" style="color:white;background: linear-gradient(to right, #E02252,#c0123d) !important" type="submit">Order Now</button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- You can add a sidebar or additional content here if needed -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function copyToClipboard() {
    var copyText = document.getElementById("copyWallet");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    document.execCommand("copy");
    alert("Copied the Rocket number: " + copyText.value);
}

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('item_output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection

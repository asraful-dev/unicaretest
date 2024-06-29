@extends('layouts.frontend')
@section('content-frontend')
<style>
    .card-img-top {
      width: 100%;
      height: auto;
      object-fit: contain;
      background: white;
    }
    .card {
      cursor: pointer;
      transition: transform 0.3s;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 10px;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .payment-box {
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #f9f9f9;
      margin-top: 20px;
      width: 100%; /* Ensures the payment box is full width */
      max-width: 800px; /* Limits the maximum width */
    }
    .card-body {
      padding: 10px;
      background:white;
    }
    .card-title {
      margin-bottom: 0;
      font-size: 1rem;
    }
    .form-check-input {
      display: none;
    }
    .form-check-input:checked + .card {
      border-color: #0d6efd;
      box-shadow: 0 0 10px rgba(13, 110, 253, 0.5);
    }
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .row {
      justify-content: center;
    }
  </style>
  
  <div class="container mt-5">
    <h2>Select a payment option:</h2>
    <form action="{{ route('payment.method',$ser_id) }}" method="post">
      @csrf
      <input type="hidden" name="course_status" value="{{ $course_status }}">
      <div class="payment-box">
        <div class="row g-3"> <!-- Changed g-2 to g-3 for better spacing -->
          <div class="col-12 col-md-4"> <!-- Adjusted column size for better responsiveness -->
            <input type="radio" class="form-check-input" id="bkash" name="payment_method" value="1">
            <label for="bkash" class="card text-center">
              <img src="https://eshopttka.com/frontend/payment/bkash.png" class="card-img-top" alt="bKash Logo">
              <div class="card-body">
                <h5 class="card-title">bKash</h5>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-4"> <!-- Adjusted column size for better responsiveness -->
            <input type="radio" class="form-check-input" id="nagad" name="payment_method" value="2">
            <label for="nagad" class="card text-center">
              <img src="https://eshopttka.com/frontend/payment/nagad.png" class="card-img-top" alt="Nagad Logo">
              <div class="card-body">
                <h5 class="card-title">Nagad</h5>
              </div>
            </label>
          </div>
          <div class="col-12 col-md-4"> <!-- Adjusted column size for better responsiveness -->
            <input type="radio" class="form-check-input" id="rocket" name="payment_method" value="3">
            <label for="rocket" class="card text-center">
              <img src="https://eshopttka.com/frontend/payment/rocket.png" class="card-img-top" alt="Rocket Logo">
              <div class="card-body">
                <h5 class="card-title">Rocket</h5>
              </div>
            </label>
          </div>
        </div>
      </div>
      <div class="text-center m-3">
        <button type="submit" class="btn btn-enroll shadow " style="color:white;background: linear-gradient(to right, #E02252, #c0123d) !important">Proceed to checkout</button>
      </div>
    </form>
  </div>
@endsection

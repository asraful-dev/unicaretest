@extends('layouts.frontend')
@section('content-frontend')
@php
      $categories = App\Models\Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
      $instructors = App\Models\Instructor::where('status', 1)->orderBy('id', 'ASC')->get();
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <style>
      /* Importing fonts from Google */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.container .row .col-lg-4 {
    display: flex;
    justify-content: center;
}

.card {
    position: relative;
    padding: 0;
    margin: 0 !important;
    border-radius: 20px;
    overflow: hidden;
    max-width: 280px;
    max-height: 340px;
    cursor: pointer;
    border: none;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);

}

.card .card-image {
    width: 100%;
    max-height: 340px;
}

.card .card-image img {
    width: 100%;
    max-height: 340px;
    object-fit: cover;
}

.card .card-content {
    position: absolute;
    bottom: -180px;
    color: #fff;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(15px);
    min-height: 140px;
    width: 100%;
    transition: bottom .4s ease-in;
    box-shadow: 0 -10px 10px rgba(255, 255, 255, 0.1);
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.card:hover .card-content {
    bottom: 0px;
}

.card:hover .card-content h4,
.card:hover .card-content h5 {
    transform: translateY(10px);
    opacity: 1;
}

.card .card-content h4,
.card .card-content h5 {
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 3px;
    text-align: center;
    transition: 0.8s;
    font-weight: 500;
    opacity: 0;
    transform: translateY(-40px);
    transition-delay: 0.2s;
}

.card .card-content h5 {
    transition: 0.5s;
    font-weight: 200;
    font-size: 0.8rem;
    letter-spacing: 2px;
}

.card .card-content .social-icons {
    list-style: none;
    padding: 0;
}


.card .card-content .social-icons li {
    margin: 10px;
    transition: 0.5s;
    transition-delay: calc(0.15s * var(--i));
    transform: translateY(50px);
}


.card:hover .card-content .social-icons li {
    transform: translateY(20px);
}

.card .card-content .social-icons li a {
    color: #fff;
}

.card .card-content .social-icons li a span {
    font-size: 1.3rem;
}

@media(max-width: 991.5px) {
    .container {
        margin-top: 20px;
    }

    .container .row .col-lg-4 {
        margin: 20px 0px;
    }
}
   </style>

   <div class="container p-5">
    <h2 class="text-center text-dark mb-5">Our Instructor</h2>
      <div class="row">
         @foreach($instructors as $instructor)
          <div class="col-lg-4 mt-4">
              <div class="card p-0">
                  <div class="card-image">
                      <img src="{{  asset($instructor->image) }}"
                          alt="">
                  </div>
                  <div class="card-content d-flex flex-column align-items-center">
                    <h4 class="pt-2">{{  $instructor->instructor_name }}</h4>
                    <h5 class="my-3 text-danger font-weight-bold">Qualification:{{ $instructor->study }}</h5>

                      <h5 class="text-light d-inline">Deparment:{{  $instructor->department }}</h5>

                      <ul class="social-icons d-flex justify-content-center">
                          <li style="--i:1">
                              <a href="{{  $instructor->facebook_link }}">
                                  <span class="fab fa-facebook"></span>
                              </a>
                          </li>
                          <li style="--i:2">
                              <a href="{{  $instructor->whatsapp_link }}">
                                  <span class="fab fa-whatsapp"></span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
         @endforeach

      </div>
  </div>

@endsection
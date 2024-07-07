@extends('layouts.frontend')
@section('content-frontend')
@php
    $category = App\Models\Category::where('slug', 'our-service')->first();
@endphp

<style>
   table {
       width: 100%;
       border-collapse: collapse;
       border: 1px solid #111D5E;
       overflow: hidden;
   }

   th,
   td {
       padding: 10px;
       text-align: left;
       border-bottom: 1px solid #111D5E;
       transition: background-color 0.3s;
   }

   th {
       background-color: #111D5E;
       color: #fff;
   }

   tr:nth-child(even) {
       background-color: #be3a4e;
       color: #ffffff;
   }

   tr:nth-child(odd) {
       background-color: #E32845;
   }

   tr:hover {
       background-color: #F7CAC9;
   }
   tr:hover {
      color:white;
   }

   tr:hover td {
       color: #fcfcfc;
   }

   @keyframes fadeIn {
       from {
           opacity: 0;
       }
       to {
           opacity: 1;
       }
   }

   tr {
       animation: fadeIn 0.5s ease-in-out;
   }

   .subject-table {
       width: 100%;
       border-collapse: collapse;
   }

   .subject-table th,
   .subject-table td {
       border: 1px solid #ddd;
       padding: 8px;
       text-align: left;
   }

   .subject-table th {
       background-color: #042449;
   }

   .subject-table tbody tr:nth-child(even) {
       background-color: #042449;
   }

   /* Responsive styles */
   @media only screen and (max-width: 600px) {
       .subject-table {
           border: 0;
       }

       .subject-table thead {
           display: none;
       }

       .subject-table tbody td {
           display: block;
           border: none;
           position: relative;
           padding-left: 50%;
       }

       .subject-table tbody td:before {
           content: attr(data-label);
           position: absolute;
           left: 0;
           width: 50%;
           padding-left: 15px;
           font-weight: bold;
       }
   }
</style>

<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
       <button type="button" class="close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>
       <div class="modal-body">
          <a href="/">
          <img src="{{ ('frontend') }}/assets/images/logo.png" class="main-logo" alt="logo">
          <img src="{{ ('frontend') }}/assets/images/white-logo.png" class="white-logo" alt="logo">
          </a>
          <div class="sidebar-content">
             <h3>About Us</h3>
             <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
             <div class="sidebar-btn">
                <a href="contact.html" class="default-btn">Let’s Talk</a>
             </div>
          </div>
          <div class="sidebar-contact-info">
             <h3>Contact Information</h3>
             <ul class="info-list">
                <li><i class="ri-phone-fill"></i> <a href="tel:9901234567">+990-123-4567</a></li>
                <li><i class="ri-mail-line"></i><a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#ff979a939390bf8c9e918ad19c9092"><span class="__cf_email__" data-cfemail="4028252c2c2f0033212e356e232f2d">[email&#160;protected]</span></a></li>
                <li><i class="ri-map-pin-line"></i> 413 North Las Vegas, NV 89032</li>
             </ul>
          </div>
          <ul class="sidebar-social-list">
             <li>
                <a href="https://www.facebook.com/" target="_blank"><i class="flaticon-facebook"></i></a>
             </li>
             <li>
                <a href="https://www.twitter.com/" target="_blank"><i class="flaticon-twitter"></i></a>
             </li>
             <li>
                <a href="https://linkedin.com/?lang=en" target="_blank"><i class="flaticon-linkedin"></i></a>
             </li>
             <li>
                <a href="https://instagram.com/?lang=en" target="_blank"><i class="flaticon-instagram"></i></a>
             </li>
          </ul>
          <div class="contact-form">
             <h3>Ready to Get Started?</h3>
             <form id="contactForm">
                <div class="row">
                   <div class="col-lg-12 col-md-6">
                      <div class="form-group">
                         <input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Your name">
                         <div class="help-block with-errors"></div>
                      </div>
                   </div>
                   <div class="col-lg-12 col-md-6">
                      <div class="form-group">
                         <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Your email address">
                         <div class="help-block with-errors"></div>
                      </div>
                   </div>
                   <div class="col-lg-12 col-md-12">
                      <div class="form-group">
                         <input type="text" name="phone_number" class="form-control" required data-error="Please enter your phone number" placeholder="Your phone number">
                         <div class="help-block with-errors"></div>
                      </div>
                   </div>
                   <div class="col-lg-12 col-md-12">
                      <div class="form-group">
                         <textarea name="message" class="form-control" cols="30" rows="6" required data-error="Please enter your message" placeholder="Write your message..."></textarea>
                         <div class="help-block with-errors"></div>
                      </div>
                   </div>
                   <div class="col-lg-12 col-md-12">
                      <button type="submit" class="default-btn">Send Message<span></span></button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div>
                      <div class="clearfix"></div>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
</div>

@if ($category && $category->banners->count() > 0)
@foreach ($category->banners as $banner)
<div class="page-banner-area bg-1" style="position: relative; background: url('{{ $banner->image }}') no-repeat center center; background-size: cover;">
 <div class="container">
    <div class="page-banner-content">
       <ul>
          <li><a href="/">Home</a></li>
          <li>Service Details</li>
       </ul>
    </div>
 </div>
</div>
@endforeach
@else
    <p>No banners found for the 'our-service' category.</p>
@endif

<div class="description mt-5">
   <div class="container p-0">
      <nav>
          <div class="nav nav-tabs d-flex justify-content-between" id="nav-tab" role="tablist">
              @foreach($units as $index => $unit)
                  <button class="nav-link @if($index === 0) active @endif" id="nav-{{ $unit->id }}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ $unit->id }}" type="button" role="tab" aria-controls="nav-{{ $unit->id }}" aria-selected="true">{{ $unit->unit_name }}</button>
              @endforeach
          </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
          @foreach($units as $index => $unit)
            @php
                $service = App\Models\OurService::where('unit', $unit->id)->first();
            @endphp
              <div class="tab-pane fade @if($index === 0) show active @endif" id="nav-{{ $unit->id }}" role="tabpanel" aria-labelledby="nav-{{ $unit->id }}-tab">
                  <div class="campus-information-area pb-70">
                     <div class="container">
                         <div class="row align-items-center">
                             <div class="col-lg-6">
                                 <div class="campus-image">
                                     <img src="{{ asset($unit->unit_image) }}" alt="Image">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="campus-content style-2">
                                     <div class="campus-title">
                                         <table class="subject-table">
                                             <thead>
                                                 <tr>
                                                     <th>বিষয়</th>
                                                     <th>টোটাল ক্লাস সংখ্যা</th>
                                                     <th>এক্সাম টেস্ট সংখ্যা</th>
                                                     <th>কাউন্ট সংখ্যা</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                @foreach($service->serviceDetails as $serviceDetail)
                                                <tr>
                                                   <td>{{ $serviceDetail->subject ?? 'NULL' }}</td>
                                                   <td>{{ $serviceDetail->total_class ?? 'NULL' }}</td>
                                                   <td>{{ $serviceDetail->exam_test ?? 'NULL' }}</td>
                                                   <td>{{ $serviceDetail->count ?? 'NULL' }}</td>
                                                </tr>
                                                @endforeach
                                             </tbody>
                                         </table>
                                     </div>
                                     <div class="list">
                                         <div class="row">
                                             <div class="col-lg-6 col-md-6">
                                                 <ul>
                                                     <li>
                                                         <i class="ri-check-fill"></i>
                                                         <p>{{ $service->one_facility }}</p>
                                                     </li>
                                                     <li>
                                                         <i class="ri-check-fill"></i>
                                                         <p>{{ $service->two_facility }}</p>
                                                     </li>
                                                     <li>
                                                         <i class="ri-check-fill"></i>
                                                         <p>{{ $service->three_facility }}</p>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </div>
                                         <a href="{{ route('enroll.details',$unit->id) }}" class="default-btn btn btn-danger">Enroll Courses</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
              </div>
          @endforeach
      </div>
  </div>
</div>
  
<script>
   // প্রথম ইউনিটটি সক্রিয় হিসেবে নির্ধারণ করুন
   document.addEventListener('DOMContentLoaded', function() {
       const firstTab = document.querySelector('.nav-link');
       const firstPane = document.querySelector('.tab-pane');
       if (firstTab && firstPane) {
           firstTab.classList.add('active');
           firstPane.classList.add('show', 'active');
       }
   });
</script>
@endsection

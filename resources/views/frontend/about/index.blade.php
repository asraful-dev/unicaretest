@extends('layouts.frontend')
@section('content-frontend')
@php
$events = App\Models\Event::where('status', 1)->latest()->get();

$category = App\Models\Category::where('slug','about')->first();
@endphp
        
      
         <div class="others-option-for-responsive">
            <div class="container">
               <div class="dot-menu">
                  <div class="inner">
                     <div class="icon">
                        <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <button type="button" class="close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>
               <div class="modal-body">
                  <a href="index.html">
                  <img src="{{asset('frontend') }}/assets/images/logo.png" class="main-logo" alt="logo">
                  <img src="{{asset('frontend') }}/assets/images/white-logo.png" class="white-logo" alt="logo">
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
                        <li><i class="ri-mail-line"></i><a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#2a424f4646456a594b445f04494547"><span class="__cf_email__" data-cfemail="c9a1aca5a5a689baa8a7bce7aaa6a4">[email&#160;protected]</span></a></li>
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
                <li>About</li>
             </ul>
          </div>
       </div>
      </div>
      @endforeach
      @else
          <p>No banners found for the 'instructor' category.</p>
      @endif
     
      <div class="alumni-area pt-100 pb-70">
         <h3 class="text-center p-3">Our Events</h3>
         <div class="container">
            <div class="row">
              @foreach($events as $event)
               <div class="col-lg-6">
                  <div class="alumni-right-content">
                     <h3></h3>
                     <div class="single-alumoni-updates-card">
                        <div class="row align-items-center">
                           <div class="col-lg-5 col-md-5">
                              <div class="update-image">
                                 <img src="{{ $event->image }}" alt="Image">
                              </div>
                           </div>
                           <div class="col-lg-7 col-md-7">
                              <div class="updates-content">
                                 <div class="date">
                                    <p>{{ \Carbon\Carbon::parse($event->date)->diffForHumans() }}</p>
                                    <h3>{{ $event->event_title }}s</h3>
                                    <div class="time">
                                       <p><i class="flaticon-time"></i>{{ $event->duration }}</p>
                                    </div>
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
      <div class="alumni-interview-area pb-100">
         <div class="container">
            <div class="interview-content ptb-100">
               <div class="interview">
                  <span>Alumni Interview</span>
                  <h2>Eliana Brooklyn</h2>
                  <p>Lorem ipsum dolor sit amet cons ctetur adip iscing elit sed do eiusmod tem incid idunt ut labore et dolore magna ali q ua. Ut enim ad minim ven iam quis nostrud xerci tation mco laboris nisi ut Lorem ipsum dolor </p>
                  <a href="#" class="default-btn btn">See Eliana Story<i class="flaticon-next"></i></a>
               </div>
            </div>
         </div>
      </div>
  
@endsection
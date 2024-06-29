@extends('layouts.frontend')
@section('content-frontend')
@php
$meritiorious = App\Models\Meritorious::where('status', 1)->latest()->get();
$success = App\Models\Success::where('status', 1)->latest()->get();
$sliders = App\Models\Slider::where('status', 1)->latest()->get();
$videos = App\Models\Video::where('status',1)->latest()->get();
@endphp
<style>
   .single-stories-card {
       background-color: #f9f9f9; /* Set your desired background color */
       padding: 20px;
       border-radius: 10px;
       margin-bottom: 20px;
   }
   .single-stories-card h3 {
       color: #333; /* Set your desired text color */
       font-size: 18px; /* Set your desired font size */
       margin-bottom: 10px;
   }
   .single-stories-card h5 {
       color: #555; /* Set your desired text color */
       font-size: 16px; /* Set your desired font size */
       margin-bottom: 5px;
   }
   .single-stories-card strong {
       color: #f00; /* Set your desired text color */
       font-size: 14px; /* Set your desired font size */
   }
</style>

<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <button type="button" class="close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>
         <div class="modal-body">
            <a href="index.html">
            <img src="{{ asset('frontend') }}/assets/images/logo.png" class="main-logo" alt="logo">
            <img src="{{ asset('frontend') }}/assets/images/white-logo.png" class="white-logo" alt="logo">
            </a>
            <div class="sidebar-content">
               <h3>About Us</h3>
               <p>Discover boundless opportunities at Unicare Admission, where inspiration meets opportunity for your academic journey.</p>
               <div class="sidebar-btn">
                  <a href="contact" class="default-btn">Let’s Talk</a>
               </div>
            </div>
            <div class="sidebar-contact-info">
               <h3>Contact Information</h3>
               <ul class="info-list">
                  <li><i class="ri-phone-fill"></i> <a href="tel:9901234567">+990-123-4567</a></li>
                  <li><i class="ri-mail-line"></i><a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#bcd4d9d0d0d3fccfddd2c992dfd3d1"><span class="__cf_email__" data-cfemail="e68e838a8a89a695878893c885898b">[email&#160;protected]</span></a></li>
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
<div class="banner-area pb-100">
   <div class="container-fluid mb-4">
      <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">
      @foreach($sliders as $slider)
    <div class="slider-item banner-bg-1" style="position: relative; background: url('{{ $slider->slider_img }}') no-repeat center center; background-size: cover;">
        <!-- Overlay -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5);"></div>
        <!-- Slider Content -->
        <div class="slider-content" style="position: relative; z-index: 1;">
           <h1>{{ $slider->title }}</h1>
           <p>{{ $slider->description }}</p>
          <a href="our-service" class="default-btn btn-danger">Start a Journey <i class="flaticon-next"></i></a>
        </div>
    </div>
@endforeach
      </div>
   </div>
</div>



         <div class="students-stories-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <h2>Check Student stories</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut elit tellus luctus nec ullamcorper mattis
                    </p>
                </div>
                <div class="row justify-content-center">
                  @foreach($videos as $video)
                      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200" data-aos-once="true">
                          <div class="single-stories-card style2">
                              <div class="stories-content">
                                 <h5 class="my-3 d-inline">{{$video->about_class}}</h5>
                              </div>
                              {!! $video->video_url !!}
                              <h5 class="my-3 d-inline">{{$video->teacher_qualification}}</h5>
                              <br>
                              <strong class="text-danger">
                                 <span><i class="flaticon-time"></i></span> {{ \Carbon\Carbon::parse($video->publish_date)->diffForHumans() }}
                              </strong>
                              
                          </div>
                      </div>
                  @endforeach
              </div>
              
                  
                 
                </div>
            </div>
        </div>







         <div class="custom-background-div">
            <h1 class="text-center p-4">Our Success</h1>
            <div class="container">
               <div class="row">
                  @foreach($success as $item)
                  <div class="col-md-3">
                     <div class="card custom-user-card">
                        <div class="custom-card-block">
                           <div class="custom-user-image">
                              <img src="{{asset($item->image) }}" class="custom-img-radius" alt="User-Profile-Image">
                           </div>
                           <h5 class="text-">{{ $item->total_student}}</h5>
                           <p class="m-t-15 text-muted">{{ $item->chance_student}}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>

         <div class="background-image-div">
            <h1 class="text-center m-4">Meritorious Student</h1>
            <div class="container">
               <div class="row">
                  @foreach($meritiorious as $merit)
                  <div class="col-md-4">
                     <div class="card user-card">
                        <div class="card-header">
                           <img src="{{ asset('speakup.png') }}" alt="" class="float-right logo">
                        </div>
                        <div class="card-block">
                           <div class="user-image">
                              <img src="{{ asset($merit->image) }}" class="img-radius" alt="User-Profile-Image">
                           </div>
                           <h5 class="f-w-600 m-t-25 m-b-10 text-light">{{ $merit->name }}</h5>
                           <p class="font-weight-bold" style="color:#DCE7FA">ভর্তি পরীক্ষা:{{$merit->admission_exam }}</p>
                           <h5 class="text">{{ $merit->achieve_place}}</h5>
                           <hr>
                           <ul class="list-unstyled activity-leval">
                              <li class="active"></li>
                              <li class="active"></li>
                              <li class="active"></li>
                              <li></li>
                              <li></li>
                           </ul>
                           <p class="m-t-15" style="color:#F4F6F9;text-align:justify;">{{ $merit->comment_of_meritorious}}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

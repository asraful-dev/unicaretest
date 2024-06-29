@extends('layouts.frontend')
@section('content-frontend')
@php
    $category = App\Models\Category::where('slug','contact-us')->first();
@endphp
<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <button type="button" class="close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>
               <div class="modal-body">
                  <a href="/">
                  <img src="assets/images/logo.png" class="main-logo" alt="logo">
                  <img src="assets/images/white-logo.png" class="white-logo" alt="logo">
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
                        <li><i class="ri-phone-fill"></i> <a href="{{ get_setting('phone')->value ?? 'null' }}">{{ get_setting('phone')->value ?? 'null' }}</a></li>
                        <li><i class=""></i><a href=""><span >{{ get_setting('email')->value ?? 'null' }}</span></a></li>
                        <li><i class="ri-map-pin-line"></i> 413 North Las Vegas, NV 89032</li>
                     </ul>
                  </div>
                  <ul>
                   
                     <li>
                        <a href="{{ get_setting('facebook_url')->value ?? 'null' }}" target="_blank"><i class="ri-facebook-fill"></i></a>
                     </li>
                     <li>
                        <a href="{{ get_setting('twitter_url')->value ?? 'null' }}" target="_blank"><i class="ri-twitter-fill"></i></a>
                     </li>
                     <li>
                        <a href="{{ get_setting('instagram_url')->value ?? 'null' }}" target="_blank"><i class="ri-instagram-line"></i></a>
                     </li>
                     <li>
                        <a href="{{ get_setting('linkedin_url')->value ?? 'null' }}" target="_blank"><i class="ri-linkedin-fill"></i></a>
                     </li>
                  </ul>
                  <div class="contact-form">
                     <h3>Ready to Get Started?</h3>
                     <form>
                        <div class="row">
                           <div class="col-lg-12 col-md-6 mb-3">
                              <div class="form-group mb-20">
                                 <input type="text" name="name" class="form-control" placeholder="Your name">
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-6 mb-3">
                              <div class="form-group">
                                 <input type="email" name="email" class="form-control" placeholder="Your email address">
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12 mb-3">
                              <div class="form-group">
                                 <input type="text" name="phone_number" class="form-control" placeholder="Your phone number">
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12 mb-3">
                              <div class="form-group">
                                 <textarea name="message" class="form-control" cols="30" rows="6" placeholder="Write your message..."></textarea>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <button type="submit" class="default-btn">Send Message<span></span></button>
                              <div class="h3 text-center hidden"></div>
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
                <li>Contact Us</li>
             </ul>
          </div>
       </div>
      </div>
      @endforeach
      @else
          <p>No banners found for the 'instructor' category.</p>
      @endif
      <div class="contact-us-area pt-100 pb-70">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="contacts-form">
                     <h3>Leave a message</h3>
                     <form id="contactForm">
                        <div class="row">
                           <div class="col-lg-6 col-sm-6">
                              <div class="form-group">
                                 <label>Your name</label>
                                 <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-sm-6">
                              <div class="form-group">
                                 <label>Your email</label>
                                 <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-sm-6">
                              <div class="form-group">
                                 <label>Your phone</label>
                                 <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-sm-6">
                              <div class="form-group">
                                 <label>Subject</label>
                                 <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-group">
                                 <label>Your message</label>
                                 <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message"></textarea>
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="form-check">
                                 <input name="gridCheck" value="I agree to the terms and privacy policy." class="form-check-input" type="checkbox" id="gridCheck" required>
                                 <label class="form-check-label" for="gridCheck">
                                 I agree to the <a href="terms-conditions.html">terms</a> and <a href="privacy-policy.html">privacy policy</a>
                                 </label>
                                 <div class="help-block with-errors gridCheck-error"></div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <button type="submit" class="default-btn">
                              <span>Send message</span>
                              </button>
                              <div id="msgSubmit" class="h3 text-center hidden"></div>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="contact-and-address">
                     <h2>Let's Contact Us</h2>
                     <p>Get in touch with us for any inquiries or support, we're here to help!</p>
                     <div class="contact-and-address-content">
                        <div class="row">
                           <div class="col-lg-6 col-md-6">
                              <div class="contact-card">
                                 <div class="icon">
                                    <i class="ri-phone-line"></i>
                                 </div>
                                 <h4>Contact</h4>
                                 <p>Mobile: <a href="tel:{{ get_setting('phone')->value ?? 'null' }}">{{ get_setting('phone')->value ?? 'null' }}</a></p>
                                 <p>Mail:<a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#61020e0f15000215210405140c000d0d4f020e0c"><span>{{ get_setting('email')->value ?? 'null' }}</span></a></p>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="contact-card">
                                 <div class="icon">
                                    <i class="ri-map-pin-line"></i>
                                 </div>
                                 <h4>Address</h4>
                                 <p>{{ get_setting('business_address')->value ?? 'null' }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="social-media">
                        <h3>Social Media</h3>
                        <p>Connect with us on social media for the latest updates and support!</p>
                        <ul>
                           <li>
                              <a href="https://www.facebook.com/" target="_blank"><i class="flaticon-facebook"></i></a>
                           </li>
                           <li>
                              <a href="https://www.twitter.com/" target="_blank"><i class="flaticon-twitter"></i></a>
                           </li>
                           <li>
                              <a href="https://instagram.com/?lang=en" target="_blank"><i class="flaticon-instagram"></i></a>
                           </li>
                           <li>
                              <a href="https://linkedin.com/?lang=en" target="_blank"><i class="flaticon-linkedin"></i></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   
     

@endsection

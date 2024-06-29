<div class="footer-area pt-100 pb-70">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-sm-6">
            <div class="footer-logo-area">
               <a href="index.html"><img src="{{ asset(get_setting('site_footer_logo')->value ?? 'null')}}" alt="Image"></a>
               <p>Sanu University was established</p>
               <div class="contact-list">
                  <ul>
                     <li><a href="tel:+01987655567685">+01-9876-5556-7685
                        </a>
                     </li>
                     <li><a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#d5b4b1b8bcbb95a6b4bba0fbb0b1a0"><span class="__cf_email__" data-cfemail="19787d747077596a78776c377c7d6c">{{ get_setting('email')->value ?? 'null' }}</span></a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="footer-widjet">
               <h3>Help</h3>
               <div class="list">
                  <ul>
                     <li><a href="about">About</a></li>
                     <li><a href="branch">Branch List</a></li>
                     <li><a href="privacy-policy">Privacy Policy</a></li>
                     <li><a href="terms-conditions">Term & Conditions</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="footer-widjet">
               <h3>Explore</h3>
               <div class="list">
                  <ul>
                     <li><a href="about">Event</a></li>
                     <li><a href="teacher-registration">Teacher Registration</a></li>
                     <li><a href="{{ route('join.exam') }}">Join Our Online Exam</a></li>
                    
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-2 col-sm-6">
            <div class="footer-widjet">
               <h3>Academics</h3>
               <div class="list">
                  <ul>
                     <li><a href="academics.html">Address: {{ get_setting('business_address')->value ?? 'null' }}</a></li>
                     <li><a href="academics.html">Helpline: {{ get_setting('phone')->value ?? 'null' }}</a></li>
                     <li><a href="academics.html">Email: {{ get_setting('email')->value ?? 'null' }}</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="shape">
         <img src="{{ asset('frontend') }}/assets/images/shape-1.png" alt="Image">
      </div>
   </div>
</div>
<div class="copyright-area">
   <div class="container">
      <div class="copyright">
         <div class="row">
            <div class="col-lg-6 col-md-4">
               <div class="social-content">
                  <ul>
                     <li><span>Follow Us On</span></li>
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
               </div>
            </div>
            <div class="col-lg-6 col-md-8">
               <div class="copy">
                  <p>Copyright © Unicare Academic All rights reserved. 2024 <a href="{{ get_setting('developer_link')->value ?? 'null' }}">Unicare</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
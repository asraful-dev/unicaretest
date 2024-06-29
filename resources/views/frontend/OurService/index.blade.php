@extends('layouts.frontend')
@section('content-frontend')
@php
    $category = App\Models\Category::where('slug','our-service')->first();
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
@php
   $services1 = App\Models\OurService::where('unit', '1')->where('course_type', '1')->first();
	$services2 = App\Models\OurService::where('unit', '2')->where('course_type', '1')->first();
	$services3 = App\Models\OurService::where('unit', '3')->where('course_type', '1')->first();
	$services4 = App\Models\OurService::where('unit', '4')->where('course_type', '1')->first();
	$services5 = App\Models\OurService::where('unit', '5')->where('course_type', '1')->first();
@endphp
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
    <p>No banners found for the 'instructor' category.</p>
@endif
<div class="description mt-5">
    <div class="container p-0">
       <nav>
          <div class="nav nav-tabs d-flex justify-content-between" id="nav-tab" role="tablist">
             <button class="nav-link active" id="nav-overview-tab" data-bs-toggle="tab" data-bs-target="#nav-overview" type="button" role="tab" aria-controls="nav-overview" aria-selected="true">ক ইউনিট</button>
             <button class="nav-link" id="nav-curriculum-tab" data-bs-toggle="tab" data-bs-target="#nav-curriculum" type="button" role="tab" aria-controls="nav-curriculum" aria-selected="false">খ ইউনিট</button>
             <button class="nav-link" id="nav-instructor-tab" data-bs-toggle="tab" data-bs-target="#nav-instructor" type="button" role="tab" aria-controls="nav-instructor" aria-selected="false">গ ইউনিট</button>
             <button class="nav-link" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" type="button" role="tab" aria-controls="nav-reviews" aria-selected="false">মেডিকেল GK</button>
             <button class="nav-link" id="nav-ict-tab" data-bs-toggle="tab" data-bs-target="#nav-ict" type="button" role="tab" aria-controls="nav-ict" aria-selected="false">ICT HSC</button>
           
       </nav>
       <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
            <div class="campus-information-area pb-70">
                <div class="container">
                   <div class="row align-items-center">
                      <div class="col-lg-6">
                         <div class="campus-image">
                            @foreach($banner1 as $image)
                            <img src="{{ ('frontend') }}/assets/images/campus-information/campus-2.jpg" alt="Image">
                            @endforeach
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
                                        @foreach($OurService1 as $item)
                                        @foreach($item->serviceDetails as $serviceDetail)
                                        <tr>
                                            <td>{{ $serviceDetail->subject ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->total_class ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->exam_test ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->count ?? 'NULL' }}</td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                    <tbody>
                                        @foreach($OurService1 as $item)
                                        @foreach($item->serviceDetails as $serviceDetail)
                                        <tr>
                                            <td>{{ $serviceDetail->subject ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->total_class ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->exam_test ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->count ?? 'NULL' }}</td>
                                        </tr>
                                        @endforeach
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
                                           <p>{{ $services1->one_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services1->two_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services1->three_facility }}</p>
                                        </li>
                                     </ul>
                                  </div>
                                 
                               </div>
                                <a href="{{ route('enroll.details',1) }}" class="default-btn btn btn-danger">Enroll Courses</a>
                            </div>
                          
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="tab-pane fade" id="nav-curriculum" role="tabpanel" aria-labelledby="nav-curriculum-tab">
            <div class="campus-information-area pb-70">
                <div class="container">
                   <div class="row align-items-center">
                      <div class="col-lg-6">
                         <div class="campus-image">
                            @foreach($banner2 as $image)
                            <img src="{{ ('frontend') }}/assets/images/campus-information/campus-2.jpg" alt="Image">
                            @endforeach
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
                                        @foreach($OurService2 as $item)
                                        @foreach($item->serviceDetails as $serviceDetail)
                                        <tr>
                                            <td>{{ $serviceDetail->subject ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->total_class ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->exam_test ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->count ?? 'NULL' }}</td>
                                        </tr>
                                        @endforeach
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
                                           <p>{{ $services2->one_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services2->two_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services2->three_facility }}</p>
                                        </li>
                                     </ul>
                                  </div>
                                 
                               </div>
                               <a href="{{ route('enroll.details',2) }}" class="default-btn btn btn-danger">Enroll Courses</a>
                            </div>
                          
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="tab-pane fade" id="nav-instructor" role="tabpanel" aria-labelledby="nav-instructor-tab">
            <div class="campus-information-area pb-70">
                <div class="container">
                   <div class="row align-items-center">
                      <div class="col-lg-6">
                         <div class="campus-image">
                            @foreach($banner3 as $image)
                            <img src="{{ ('frontend') }}/assets/images/campus-information/campus-2.jpg" alt="Image">
                            @endforeach
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
                                        @foreach($OurService3 as $item)
                                        @foreach($item->serviceDetails as $serviceDetail)
                                        <tr>
                                            <td>{{ $serviceDetail->subject ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->total_class ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->exam_test ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->count ?? 'NULL' }}</td>
                                        </tr>
                                        @endforeach
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
                                           <p>{{ $services3->one_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services3->two_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services3->three_facility }}</p>
                                        </li>
                                     </ul>
                                  </div>
                                 
                               </div>
                               <a href="{{ route('enroll.details',3) }}" class="default-btn btn btn-danger">Enroll Courses</a>
                            </div>
                          
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
            <div class="campus-information-area pb-70">
                <div class="container">
                   <div class="row align-items-center">
                      <div class="col-lg-6">
                         <div class="campus-image">
                            @foreach($banner4 as $image)
                            <img src="{{ ('frontend') }}/assets/images/campus-information/campus-2.jpg" alt="Image">
                            @endforeach
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
                                        @foreach($OurService4 as $item)
                                        @foreach($item->serviceDetails as $serviceDetail)
                                        <tr>
                                            <td>{{ $serviceDetail->subject ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->total_class ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->exam_test ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->count ?? 'NULL' }}</td>
                                        </tr>
                                        @endforeach
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
                                           <p>{{ $services4->one_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services4->two_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services4->three_facility }}</p>
                                        </li>
                                     </ul>
                                  </div>
                                
                               </div>
                               <a href="{{ route('enroll.details',4) }}" class="default-btn btn btn-danger">Enroll Courses</a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="tab-pane fade" id="nav-ict" role="tabpanel" aria-labelledby="nav-ict-tab">
            <div class="campus-information-area pb-70">
                <div class="container">
                   <div class="row align-items-center">
                      <div class="col-lg-6">
                         <div class="campus-image">
                            @foreach($banner5 as $image)
                            <img src="{{ ('frontend') }}/assets/images/campus-information/campus-2.jpg" alt="Image">
                            @endforeach
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
                                        @foreach($OurService5 as $item)
                                        @foreach($item->serviceDetails as $serviceDetail)
                                        <tr>
                                            <td>{{ $serviceDetail->subject ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->total_class ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->exam_test ?? 'NULL' }}</td>
                                            <td>{{ $serviceDetail->count ?? 'NULL' }}</td>
                                        </tr>
                                        @endforeach
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
                                           <p>{{ $services5->one_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services5->two_facility }}</p>
                                        </li>
                                        <li>
                                           <i class="ri-check-fill"></i>
                                           <p>{{ $services5->three_facility }}</p>
                                        </li>
                                     </ul>
                                  </div>
                              </div>
                            </div>
                            <a href="{{ route('enroll.details',5) }}" class="default-btn btn btn-danger">Enroll Courses</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 
{{-- <div class="courses-details-area pt-100 pb-70">
 <div class="container">
    <div class="row">
       <div class="col-lg-8">
          <div class="courses-details">
             <div class="courses-card">
                <h2>Python Programming For Data Science</h2>
                <div class="img">
                   <img src="{{ ('frontend') }}/assets/images/courses/courses-4.jpg" alt="Image">
                </div>
                <div class="list">
                   <ul>
                      <li>
                         <div class="teacher">
                            <img src="{{ ('frontend') }}/assets/images/courses/admin-1.jpg" alt="Image">
                            <p>Teacher: <a href="#">Jessica Hamson</a></p>
                         </div>
                      </li>
                      <li><i class="flaticon-clock"></i><span>Last Update:</span>September 29, 2021</li>
                   </ul>
                </div>
             </div>
            
             <div class="reply-area">
                <div class="reply-form">
                   <h3>Leave a Reply</h3>
                   <p>Your email address will not be published.</p>
                   <form>
                      <div class="row">
                         <div class="col-lg-12">
                            <div class="form-group">
                               <textarea class="form-control" id="review2" rows="4" placeholder="Comment"></textarea>
                            </div>
                         </div>
                         <div class="col-lg-4">
                            <div class="form-group">
                               <input type="text" class="form-control" id="name2" placeholder="Name">
                            </div>
                         </div>
                         <div class="col-lg-4">
                            <div class="form-group">
                               <input type="email" class="form-control" id="email2" placeholder="Email">
                            </div>
                         </div>
                         <div class="col-lg-4">
                            <div class="form-group">
                               <input type="text" class="form-control" id="website" placeholder="Website">
                            </div>
                         </div>
                      </div>
                      <div class="form-check">
                         <input class="form-check-input" type="checkbox" value id="flexCheckDefault">
                         <label class="form-check-label" for="flexCheckDefault">
                         Save my name, email, and website in this browser for the next time I comment.
                         </label>
                      </div>
                      <button type="submit" class="default-btn btn">Post a Comment <i class="flaticon-paper-plane"></i></button>
                   </form>
                </div>
             </div>
          </div>
       </div>
       <div class="col-lg-4">
          <div class="course-details-right-content">
             <div class="serch-content">
                <h3>Search</h3>
                <div class="form-group">
                   <input type="text" class="form-control" placeholder="Find Your Course">
                   <button type="submit" class="src-btn">
                   <i class="flaticon-search"></i>
                   </button>
                </div>
             </div>
          </div>
          <div class="enroll-courses">
             <div class="enroll-img">
                <img src="{{ ('frontend') }}/assets/images/courses/courses-4.jpg" alt="Image">
                <div class="icon">
                   <a class="popup-youtube play-btn" href="https://www.youtube.com/watch?v=6WQCJx_vEX4"><i class="ri-play-fill"></i></a>
                </div>
             </div>
             <div class="list">
                <ul>
                   <li><span>Instructor :</span>Lewis</li>
                   <li><span>Lectures :</span>12</li>
                   <li><span>Duration :</span>20h 41m 32s</li>
                   <li><span>Enrolled :</span>2 students</li>
                   <li><span>Course level :</span>Intermediate</li>
                   <li><span>Language :</span>English</li>
                </ul>
             </div>
             <a href="courses.html" class="default-btn btn">Enroll Courses</a>
          </div>
          <div class="related-download">
             <h3>Related Downloads</h3>
             <ul>
                <li><a href="#"><i class="flaticon-pdf-file"></i>Brochure Department</a></li>
                <li><a href="#"><i class="flaticon-pdf-file"></i>Department Details</a></li>
                <li><a href="#"><i class="flaticon-pdf-file"></i>Journals Departments</a></li>
             </ul>
          </div>
       </div>
    </div>
 </div>
</div> --}}

{{-- {{ asset($image) }} --}}

@endsection

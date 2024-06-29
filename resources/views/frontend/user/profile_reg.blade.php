@extends('layouts.frontend')
@section('content-frontend')
<style>
    /* Style for submit button */
.btn-fill-out {
    background-color: #E32845;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover effect for submit button */
.btn-fill-out:hover {
    background-color: #111D5E;
    color:white;
}
</style>
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
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <div class="sidebar-btn">
                            <a href="contact.html" class="default-btn">Let’s Talk</a>
                        </div>
                    </div>
                    <div class="sidebar-contact-info">
                        <h3>Contact Information</h3>
                        <ul class="info-list">
                            <li><i class="ri-phone-fill"></i> <a href="tel:9901234567">+990-123-4567</a></li>
                            <li><i class="ri-mail-line"></i><a
                                    href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#7f171a1313103f0c1e110a511c1012"><span
                                        class="__cf_email__"
                                        data-cfemail="1d75787171725d6e7c7368337e7270">[email&#160;protected]</span></a>
                            </li>
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
                            <a href="https://linkedin.com/?lang=en" target="_blank"><i
                                    class="flaticon-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="https://instagram.com/?lang=en" target="_blank"><i
                                    class="flaticon-instagram"></i></a>
                        </li>
                    </ul>
                    <div class="contact-form">
                        <h3>Ready to Get Started?</h3>
       
                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" id="contactForm">
                        @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="Your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required
                                            data-error="Please enter your email" placeholder="Your email address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" class="form-control" required
                                            data-error="Please enter your phone number" placeholder="Your phone number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" cols="30" rows="6" required
                                            data-error="Please enter your message"
                                            placeholder="Write your message..."></textarea>
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


    <div class="page-banner-area bg-2">
        <div class="container">
            <div class="page-banner-content">
                <h1>Student Register</h1>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>Register</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="register-area pt-100 pb-70">
        <div class="container">
            <div class="register">
                <h3>Student Register</h3>
                <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Student Name <span class="required">*</span></label>
                            <input required="" class="form-control" name="username" type="text" value="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Full Name <span class="required">*</span></label>
                            <input required="" class="form-control" name="name" value="" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Email <span class="required">*</span></label>
                            <input required="" class="form-control" name="email" type="text" value="" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Phone <span class="required">*</span></label>
                            <input required="" class="form-control" name="phone" type="text" value="" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Institute <span class="required">*</span></label>
                            <input required="" class="form-control" name="institute" type="text" value="" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Address <span class="required">*</span></label>
                            <input required="" class="form-control" name="address" type="text" value="" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Password <span class="required">*</span></label>
                            <div class="input-group">
                                <input required="" class="form-control" name="password" id="password" type="password" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i id="togglePassword" class="fa fa-eye-slash" aria-hidden="true" onclick="togglePasswordVisibility('password')"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group col-md-12">
                            <label>Confirm Password <span class="required">*</span></label>
                            <div class="input-group">
                                <input required="" class="form-control" name="confirm_password" id="confirmPassword" type="password" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i id="toggleConfirmPassword" class="fa fa-eye-slash" aria-hidden="true" onclick="togglePasswordVisibility('confirmPassword')"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group col-md-12">
                            <label>User Photo <span class="required">*</span></label>
                            <input class="form-control" name="photo" type="file" id="image" onchange="previewImage(event)" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>  <span class="required">*</span></label>
                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="User" class="rounded-circle p-1 bg-primary" width="110">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                        </div>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('showImage');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        function togglePasswordVisibility(fieldId) {
            var passwordInput = document.getElementById(fieldId);
            var toggleIcon = document.getElementById("toggle" + fieldId.charAt(0).toUpperCase() + fieldId.slice(1));
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
@endsection
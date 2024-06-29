<!DOCTYPE html>
<html lang="zxx">
   <!-- Mirrored from templates.hibootstrap.com/sanu/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 May 2024 09:53:45 GMT -->
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/meanmenu.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/flaticon.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/remixicon.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/odometer.min.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/aos.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/dark.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">
      <link rel="icon" type="image/png" href="{{ asset('frontend') }}/assets/images/favicon.png">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
         <!-- Toastr css -->
    
      <title>Unicare</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
      <style>
         .background-image-div1{
         background-color:#F4F6FF;
         }
         .background-image-div{
         background-image: url({{ asset('successBg.png') }}); /* Set the path to youbackground image */
         background-size: cover; /* Cover the entire viewport */
         background-repeat: no-repeat; /* Prevent the background image from repeating */
         background-attachment: fixed;
         }
         .card.user-card {
         border-top: none;
         -webkit-box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
         box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
         -webkit-transition: all 150ms linear;
         transition: all 150ms linear;
         }
         .card {
         border-radius: 15px;
         -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
         box-shadow: 0 1px 2.94px 0.06px rgba(18, 48, 88, 0.16);
         border: none;
         background-color: #2F3562;
         margin-bottom: 30px;
         -webkit-transition: all 0.3s ease-in-out;
         transition: all 0.3s ease-in-out;
         }
         .card .card-header {
         background-color: transparent;
         border-bottom: none;
         padding: 25px;
         }
         .card .card-header h5 {
         margin-bottom: 0;
         color: #222;
         font-size: 14px;
         font-weight: 600;
         display: inline-block;
         margin-right: 10px;
         line-height: 1.4;
         }
         .card .card-header+.card-block, .card .card-header+.card-block-big {
         padding-top: 0;
         }
         .user-card .card-block {
         text-align: center;
         }
         .card .card-block {
         padding: 25px;
         }
         .user-card .card-block .user-image {
         position: relative;
         margin: 0 auto;
         display: inline-block;
         padding: 5px;
         width: 110px;
         height: 110px;
         }
         .user-card .card-block .user-image img {
         z-index: 20;
         position: absolute;
         top: 5px;
         left: 5px;
         width: 100px;
         height: 100px;
         }
         .img-radius {
         border-radius: 50%;
         }
         .user-card {
         border: 1px solid #E32845; /* কার্ডের বর্ডার সেট করুন */
         border-radius: 15px; /* কার্ডের বর্ডার এর গোলায় রেডিউস */
         overflow: hidden; /* কার্ডের অবশ্যই হিডেন হওয়া উচিত কারণ সামগ্রিক ছবির আকার আপনার কার্ডের অবস্থানের চেয়ে বড় হতে পারে। */
         }
         .user-card .card-block .user-image img {
         border-radius: 50px; /* বর্ডার রেডিউস */
         border: 3px solid #E32845; /* বর্ডার রং এবং মাপ */
         }
         .text{
         color:#E32845;
         }
         .logo{
         width:60px;
         heigh:60px;
         }
         .custom-background-div{
         background-color:#F4F6FF;
         }
         .custom-user-card{
         border:none;
         }
         .custom-user-card .custom-card-block {
         text-align: center;
         background-color:#F4F6FF;
         }
         .custom-card .custom-card-block {
         padding: 25px;
         }
         .custom-user-card .custom-card-block .custom-user-image {
         position: relative;
         margin: 0 auto;
         display: inline-block;
         padding: 5px;
         width: 110px;
         height: 110px;
         }
         .custom-user-card .custom-card-block .custom-user-image img {
         z-index: 20;
         position: absolute;
         top: 5px;
         left: 5px;
         width: 100px;
         height: 100px;
         }
         .custom-img-radius {
         border-radius: 50%;
         }
      </style>
   </head>
   <body>
      <!-- <div class="preloader-area">
         <div class="spinner">
            <div class="inner">
               <div class="disc"></div>
               <div class="disc"></div>
               <div class="disc"></div>
            </div>
         </div>
      </div> -->
      @include('frontend.body.header')
      @yield('content-frontend')
      @include('frontend.body.footer')
      <div class="go-top">
         <i class="ri-arrow-up-s-line"></i>
         <i class="ri-arrow-up-s-line"></i>
      </div>
      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/jquery.meanmenu.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/carousel-thumbs.min.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/jquery.magnific-popup.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/aos.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/odometer.min.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/appear.min.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/form-validator.min.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/contact-form-script.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/ajaxchimp.min.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/custom.js"></script>
      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
       <!-- Toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- all toastr message show  Update-->
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>
   </body>
   <!-- Mirrored from templates.hibootstrap.com/sanu/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 May 2024 09:54:13 GMT -->
</html>
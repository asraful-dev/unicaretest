<!DOCTYPE html>
<html lang="zxx">
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
      <!-- Toastr css -->
      <title>Unicare</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

      {{-- new added jquery --}}
      {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      <script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
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

    @stack('frontend-js')
   </body>
</html>
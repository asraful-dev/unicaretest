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
   .slider-item {
      height: 500px; /* Default height for desktop */
   }

   @media (max-width: 768px) {
      .slider-item {
         height: 200px; /* Adjust height for smaller screens */
      }
   }
   .custom-user-card {
    position: relative;
    overflow: hidden;
    transition: transform 0
   }

.custom-img-radius {
    border-radius: 50%; /* Example: Rounded image */
}
</style>

{{-- Slider Area Start --}}
<div class="banner-area">
   <div class="hero-slider2 owl-carousel owl-theme">
      @foreach($sliders as $slider)
      <div class="slider-item banner-bg-4" style="position: relative; background: url('{{ $slider->slider_img }}') no-repeat center center; background-size: cover;">
         <div class="container-fluid">
            <div class="slider-content">
               {{-- <h1>Start Your Beautiful & Bright Future From Here</h1>
               <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Ut elit tellus luctus nec ullamcorper mattis pulvinar dapibus dolor sit amet consec</p> --}}
               {{-- <a href="courses.html" class="default-btn btn">Start a Journey <i class="flaticon-next"></i></a> --}}
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>

{{-- Video Area Start --}}
<div class="students-stories-area pt-100 pb-70">
   <div class="container">
      <div class="section-title">
         <h2>Check Student stories</h2>
         <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut elit tellus luctus nec ullamcorper mattis </p>
      </div>
      <div class="row">
         @foreach($videos as $video)
         <div class="col-md-4">
            <div class="card custom-user-card border-0 shadow-lg text-center mt-3 rounded">
               <div class="card-header">
                  <h3 class="text-center">{{ ucfirst($video->about_class) }}</h3>
               </div>
               <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 200px;">
                  {!! $video->video_url !!}
               </div>
               <div class="card-footer">
                  <h5 class="my-3 d-inline">{{$video->teacher_qualification}}</h5>
                  <br>
                  <strong class="text-danger">
                  <span><i class="flaticon-time"></i></span> {{ \Carbon\Carbon::parse($video->publish_date)->diffForHumans() }}
                  </strong>
               </div> 
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>

{{-- Video Area Start --}}
<div class="students-stories-area pb-70">
   <div class="container">
      <div class="section-title">
         <h2>Our Success</h2>
         <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut elit tellus luctus nec ullamcorper mattis </p>
      </div>
      <div class="row">
         @foreach($success as $item)
         <div class="col-md-3">
            <div class="card custom-user-card border-0 shadow-lg text-center mt-3 rounded">
               <img src="{{ asset($item->image) }}" class="card-img-top custom-img-radius img-fluid rounded-circle mx-auto mt-3" alt="User Profile Image" style="width: 150px; height: 150px;">
               <div class="card-body">
                  <h5 class="card-title">{{ $item->total_student }}</h5>
                  <p class="card-text text-muted">{{ $item->chance_student }}</p>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>

{{-- Meritorious Student Area Start --}}
<div class="students-stories-area pb-70">
   <div class="container">
      <div class="section-title">
         <h3>Our Meritorious Student</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut elit tellus luctus nec ullamcorper mattis </p>
      </div>
      <div class="row">
         @php
            // Define specific background colors and image border colors for each card
            $cardColors = [
               '#fefff6',   // Color for the first card
               '#e6f7ff',   // Color for the second card
               '#fff6e6',   // Color for the third card
               // Add more colors as needed for each card
            ];

            // Define specific image border colors for each card
            $imageBorderColors = [
               '#b3c022',   // Border color for the first image
               '#ff5733',   // Border color for the second image
               '#5bc0de',   // Border color for the third image
               // Add more colors as needed for each image
            ];

            // Define specific card border colors for each card
            $cardBorderColors = [
               '#b3c022',   // Border color for the first card
               '#f95850',   // Border color for the second card
               '#fcb700',   // Border color for the third card
               // Add more colors as needed for each card
            ];
         @endphp

         @foreach($meritiorious as $index => $merit)
            <div class="col-md-4 mt-3">
               <div class="card text-center pt-2 shadow-lg" style="background-color: {{ $cardColors[$index % count($cardColors)] }}; border: 3px solid {{ $cardBorderColors[$index % count($cardBorderColors)] }}; border-radius: 5%;">
                     <div class="card-header d-flex justify-content-center align-items-center border-0">
                        <img src="{{ asset($merit->image) }}" alt="" class="img-fluid rounded-circle mx-auto mt-3" style="border: 4px solid {{ $imageBorderColors[$index % count($imageBorderColors)] }}; width: 150px; height: 150px;">
                     </div>
                     <div class="card-body">
                        <h3>{{ $merit->name }}</h3>
                        <h5>ভর্তি পরীক্ষা: {{ $merit->admission_exam }}</h5>
                        <h6 style="color: #b3c022;">{{ $merit->achieve_place }}</h6>
                        <div class="quote" style="position: relative;">
                           <span style="background-color: #b3c022; border-bottom: 15px solid {{ $cardColors[$index % count($cardColors)] }};"></span>
                           <span style="background-color: #b3c022; border-bottom: 15px solid {{ $cardColors[$index % count($cardColors)] }};"></span>
                        </div>
                        <p>
                           {{ Str::limit($merit->comment_of_meritorious ?? 'N/A', 600) }}
                        </p>
                     </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
</div>

@endsection
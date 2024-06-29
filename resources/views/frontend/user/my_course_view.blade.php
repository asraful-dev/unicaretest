@extends('layouts.frontend')
@section('content-frontend')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<style>
   body {
   background: #f5f7fa;
   }
   .panel.panel-default {
   border-top-width: 3px;
   }
   .panel {
   box-shadow: 0 3px 1px -2px rgba(0,0,0,.14),0 2px 2px 0 rgba(0,0,0,.098),0 1px 5px 0 rgba(0,0,0,.084);
   border: 0;
   border-radius: 4px;
   margin-bottom: 16px;
   }
   .thumb128 {
   width: 300px!important;
   height: 200px!important;
   border-radius: 8px;
   }
   .list-group-item {
   border: none;
   padding: 5px 10px;
   margin-bottom: 10px;
   background: #E32845;
   border-radius: 4px;
   box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
   transition: background 0.3s ease, color 0.3s ease;
   text-align: center;
   }
   .list-group-item:hover {
   background: #111D5E;
   color: #fff;
   }
   .list-group-item a {
   color: white;
   text-decoration: none;
   transition: color 0.3s ease;
   }
   .list-group-item a:hover {
   text-decoration: none;
   color: white;
   }
   .btn-info {
   background: #E32845;
   border-color: #E32845;
   color: white;
   transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease;
   }
   .btn-info:hover {
   background: #111D5E;
   border-color: #111D5E;
   color: white;
   }
   /* course accourdian */
   .faq-left-content {
   padding-left: 20px;
   }
   .faq-title h2 {
   font-size: 24px;
   margin-bottom: 10px;
   }
   .faq-title p {
   font-size: 16px;
   color: #666;
   }
   .course-lesson ul {
   list-style: none;
   padding: 0;
   }
   .course-lesson li {
   display: flex;
   justify-content: space-between;
   align-items: center;
   padding: 10px 0;
   border-bottom: 1px solid #ddd;
   }
   .course-lesson .text {
   display: flex;
   align-items: center;
   }
   .course-lesson .text i {
   margin-right: 10px;
   }
   .course-lesson .icon i {
   font-size: 18px;
   color: #007bff;
   }
   .badge-list {
   display: flex;
   gap: 10px;
   }
</style>
<div class="container bootstrap snippets bootdey mt-5">
   <div class="row ng-scope">
      <div class="col-md-4">
         @include('frontend.common.sidenav')
      </div>
      <style>
         .faq-left-content .course-lesson ul li {
         border: 1px solid #dad8d9; /* Border color */
         margin-bottom: 10px; /* Adjust spacing as needed */
         padding: 10px; /* Optional: Add padding for better spacing */
         }
      </style>
      @php
         $classses = App\Models\UClass::latest()->get();
      @endphp
      <div class="col-lg-8">
         <div class="faq-left-content">
            <div class="accordion shadow-lg" id="accordionExample">
               @php
                  $groupedClasses = $classses->groupBy(function($class) {
                     return ucfirst($class->subject->subject ?? 'N/A');
                  });
               @endphp
               @foreach ($groupedClasses as $subjectName => $classes)
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="heading{{ $loop->index }}">
                           <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                              {{ $subjectName }}
                           </button>
                     </h2>
                     <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->index }}" data-parent="#accordionExample">
                           <div class="accordion-body">
                              <div class="course-lesson">
                                 <ul>
                                       @foreach ($classes->sortBy('id') as $class)
                                       @php
                                          $current_user = Auth::user()->id;
                                          $payment = App\Models\Payment::where('user_id', $current_user)
                                                                     ->where('unit_id', $class->unit_id)
                                                                     ->where('subject_id', $class->subject_id)
                                                                     ->latest()
                                                                     ->first();
                                          $payment_status = $payment ? $payment->payment_status : 0; // Assuming 0 means no payment or failed payment
                                       @endphp
                                          <li data-toggle="collapse" data-target="#video{{ $class->id }}" style="cursor: pointer;">
                                             <div class="">
                                                   <i class="fas fa-video"></i> {{ $class->class_topic ?? 'N/A'}}
                                             </div>
                                             @if ($payment_status == 1)
                                                <div class="icon"><i class="fa-solid fa-eye"></i></div>
                                             @else
                                                <div class="icon"><i class="fa-solid fa-lock"></i></div>
                                             @endif
                                          </li>
                                          @if ($payment_status == 1)
                                             <div class="embed-responsive embed-responsive-16by9">
                                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ Str::replace('=', '', strrchr($class->video_link, '=')) }}" title="" frameborder="1" allow="autoplay; clipboard-write; gyroscope;" allowfullscreen></iframe>
                                             </div>
                                          @else
                                             <div class="alert alert-warning" role="alert">
                                                You need to make a payment to view this video.
                                                <a href="{{ route('enroll.details',$class->unit_id)}}" class="btn btn-primary btn-sm mb-3">Enroll Now</a>
                                             </div>
                                          @endif
                                       @endforeach
                                       <!-- Add more items as needed -->
                                 </ul>
                              </div>
                           </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
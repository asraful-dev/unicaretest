@extends('layouts.frontend')
@section('content-frontend')

@php
    $exams = App\Models\Exam::all();
@endphp

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<style>
    .panel-default {
        border-color: #ddd;
        box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    }
    .panel-heading {
        background-color: #111D5E;
        color: white;
        padding: 15px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .list-group-item {
        background-color: #111D5E;
        color: white !important;
        border: none;
        margin-bottom: 5px;
        transition: background-color 0.3s, color 0.3s;
    }
    .list-group-item:hover,
    .list-group-item:focus {
        background-color: #D45956 !important;
        color: white !important;
    }
    .list-group-item.active {
        background-color: #D45956 !important;
        color: black !important;
    }
    .btn-custom {
        background-color: #D45956;
        color: white;
        border: none;
        transition: background-color 0.3s;
    }
    .btn-custom:hover {
        background-color: #C03E3A;
        color: white;
    }
    .btn-success-custom {
        background-color: #111D5E;
        color: white;
        border: none;
        transition: background-color 0.3s;
    }
    .btn-success-custom:hover {
        background-color: #0F174A;
        color:white
    }
    #contactInfoContainer {
        border-top: 2px solid #111D5E;
        padding-top: 20px;
        margin-top: 20px;
    }
    #unitInfo {
        margin: 20px 0;
    }
    .list-group {
        max-height:300px; /* Adjust this value as needed */
        overflow-y: auto;
    }
</style>

<div class="container mt-5">
   <div class="row">
      <div class="col-md-4">
         <div class="panel panel-default">
            <div class="panel-heading text-center">
               <h4>Please Choose Unit For Exam</h4>
            </div>
            <div class="panel-body text-center">
               <div class="list-group" id="myList" role="tablist">
                  @foreach ($exams as $item)
                     <a class="list-group-item list-group-item-action unit-link" data-unit="{{ $item->unit }}" data-unit-id="{{ $item->id }}" data-start-time="{{ $item->start_time }}" data-exam-time="{{ $item->exam_time }}" href="#">{{ $item->unit }}</a>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="panel panel-default" id="contactInfoContainer" style="display: none;">
            <div class="panel-body text-center">
               <div id="unitInfo"></div>
               <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
       $('.unit-link').on('click', function(e){
           e.preventDefault(); // Prevent default action of anchor tag
           var unitName = $(this).data('unit'); // Get the unit name from data attribute
           var startTime = new Date($(this).data('start-time')); // Get the start time from data attribute
           var examTime = $(this).data('exam-time'); // Get the exam time from data attribute
           var unitId = $(this).data('unit-id'); // Get the unit ID from data attribute

           // Format the start time
           var day = startTime.getDate();
           var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
           var month = monthNames[startTime.getMonth()];
           var year = startTime.getFullYear();
           var hours = startTime.getHours();
           var minutes = String(startTime.getMinutes()).padStart(2, '0');
           var ampm = hours >= 12 ? 'pm' : 'am';
           hours = hours % 12;
           hours = hours ? hours : 12; // the hour '0' should be '12'
           var formattedDate = day + ' ' + month + ' ' + year + ', ' + hours + ':' + minutes + ' ' + ampm;

           $('#selectedUnit').val(unitId); // Populate hidden input field with unit ID
           $('#unitInfo').html('<b><p>Your Unit: ' + unitName + '</p></b><br><p>Your Exam Date: ' + formattedDate + '</p><br><a href="/go-ahead/' + unitId + '" class="btn btn-custom">Click For Exam</a>&nbsp;<a href="/exam/' + unitId + '/result" class="btn btn-success-custom">Result</a><br>'); // Display unit information below contact information
           $('#contactInfoContainer').show(); // Show contact information section
       });
   });
</script>

@endsection

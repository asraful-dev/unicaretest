@extends('layouts.frontend')

@section('content-frontend')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f5f7fa;
    }
    .panel.panel-default {
        border-top-width: 3px;
    }
    .panel {
        box-shadow: none; /* Removed shadow */
        border: 0;
        border-radius: 4px;
        margin-bottom: 16px;
    }
    .thumb128 {
        width: 300px !important;
        height: 200px !important;
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
    .faq-left-content {
        padding-left: 20px;
        width: 100%;
        overflow-y: auto; /* Add scrollbar */
        max-height: 600px; /* Adjust max-height as needed */
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
    .faq-left-content .course-lesson ul li {
        border: 1px solid #dad8d9;
        margin-bottom: 10px;
        padding: 10px;
    }
</style>

@php
    $current_user = Auth::user()->id;
    $courselists = App\Models\Payment::where('user_id', $current_user)->where('course_status', 1)->latest()->get();
@endphp

<div class="container bootstrap snippets bootdey mt-5">
    <div class="row ng-scope">
        <div class="col-md-4">
            @include('frontend.common.sidenav')
        </div>
        <div class="col-lg-8">
            <div class="board">
                <div class="board-inner">
                    @if($courselists->isEmpty())
                        <div class="alert alert-warning text-center">No courses found</div>
                    @else
                        <ul class="nav nav-tabs" id="myTab">
                            <div class="liner"></div>
                            @foreach($courselists as $index => $course)
                                <li class="{{ $index === 0 ? 'active' : '' }}">
                                    <a href="#unit-{{ $course->unit }}" data-toggle="tab" title="Unit {{ $course->unit }}">
                                        <span class="round-tabs one">
                                            <i class="glyphicon glyphicon-home p-3">  
                                                @if ($course->unit == 1)
                                                    ক ইউনিট
                                                @elseif ($course->unit == 2)
                                                    খ ইউনিট
                                                @elseif ($course->unit == 3)
                                                    গ ইউনিট
                                                @elseif ($course->unit == 4)
                                                    মেডিকেল GK
                                                @else
                                                    ICT HSC
                                                @endif
                                            </i>
                                        </span> 
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="tab-content mt-5">
                    @foreach($courselists as $index => $course)
                        <div class="tab-pane fade {{ $index === 0 ? 'in active' : '' }}" id="unit-{{ $course->unit }}">
                            <div class="col-lg-12"> <!-- Changed from col-lg-8 to col-lg-12 -->
                                <div class="faq-left-content">
                                    <div class="accordion" id="accordionExample-{{ $index }}">
                                        @php
                                            $services = App\Models\OurService::where('unit', $course->unit)->where('course_type', 1)->get();
                                        @endphp
                                        @foreach ($services as $serviceIndex => $service)
                                            @php
                                                $subjects = App\Models\ServiceDetail::where('our_service_id', $service->id)->get();
                                            @endphp
                                            @foreach ($subjects as $subjectIndex => $subject)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{ $index }}-{{ $serviceIndex }}-{{ $subjectIndex }}">
                                                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}-{{ $serviceIndex }}-{{ $subjectIndex }}" aria-expanded="false" aria-controls="collapse{{ $index }}-{{ $serviceIndex }}-{{ $subjectIndex }}">
                                                            {{ ucfirst($subject->subject) }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $index }}-{{ $serviceIndex }}-{{ $subjectIndex }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}-{{ $serviceIndex }}-{{ $subjectIndex }}" data-parent="#accordionExample-{{ $index }}">
                                                        <div class="accordion-body">
                                                            <div class="course-lesson">
                                                                <ul>
                                                                    @php
                                                                        $uclasses = App\Models\UClass::where('subject_id', $subject->id)->get();
                                                                    @endphp

                                                                    @forelse ($uclasses as $class)
                                                                        <li data-toggle="collapse" data-target="#video{{ $class->id }}" style="cursor: pointer;">
                                                                            <div>
                                                                                <i class="fas fa-video"></i> {{ $class->class_topic ?? 'N/A' }}
                                                                            </div>
                                                                            @if ($course->payment_status == 1)
                                                                                <div class="icon"><i class="fa-solid fa-eye"></i></div>
                                                                            @else
                                                                                <div class="icon"><i class="fa-solid fa-lock"></i></div>
                                                                            @endif
                                                                        </li>
                                                                        @if ($course->payment_status == 1)
                                                                            <div id="video{{ $class->id }}" class="collapse">
                                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ Str::afterLast($class->video_link, '=') }}" title="" frameborder="1" allow="autoplay; clipboard-write; gyroscope;" allowfullscreen></iframe>
                                                                                </div>

                                                                                <div class="p-3 text-center">
                                                                                    <a href="{{ asset($class->lecture_shit) }}" class="btn btn-primary btn-sm" download>Lecture Sheet <i class="fas fa-download"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <div id="video{{ $class->id }}" class="collapse">
                                                                                <div class="alert alert-warning" role="alert">
                                                                                    You need to make a payment to view this video.
                                                                                    <a href="{{ route('enroll.details', $course->unit) }}" class="btn btn-primary btn-sm mb-3">Enroll Now</a>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @empty
                                                                        <li>No class found please wait coming soon</li>
                                                                    @endforelse
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
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

<!-- Bootstrap JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection

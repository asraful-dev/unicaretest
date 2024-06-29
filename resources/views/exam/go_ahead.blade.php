@extends('layouts.frontend')
@section('content-frontend')
@php
    use Carbon\Carbon;
@endphp
<div class="coming-soon-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="coming-soon">
                    @if(Carbon::parse($endDate)->isPast())
                        <h2 class="text-light">Your Exam Is Over</h2>
                    @elseif(Carbon::parse($startDate)->isFuture())
                        <a href="index.html"><img src="{{ asset(get_setting('site_logo')->value ?? 'null')}}" class="main-logo" alt="Images"></a>
                        <h2 class="text-light">Your Exam Coming Soon Please Wait</h2>
                        <div class="list">
                            <ul id="timer" class="flex-wrap d-flex justify-content-center">
                                <div>
                                    <li id="countdown-days" class="align-items-center flex-column d-flex justify-content-center"></li>
                                    <h5 class="text-light">Days</h5>
                                </div>
                                <div>
                                    <li id="countdown-hours" class="align-items-center flex-column d-flex justify-content-center"></li>
                                    <h5 class="text-light">Hours</h5>
                                </div>
                                <div>
                                    <li id="countdown-minutes" class="align-items-center flex-column d-flex justify-content-center"></li>
                                    <h5 class="text-light">Minutes</h5>
                                </div>
                                <div>
                                    <li id="countdown-seconds" class="align-items-center flex-column d-flex justify-content-center"></li>
                                    <h5 class="text-light">Seconds</h5>
                                </div>
                            </ul>
                        </div>
                    @else
                        <a class="default-btn active" href="{{ route('join.ques', $exam->id) }}">
                            Join Now
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Get the event date from the PHP variable
    var startDate = new Date("{{ $startDate }}").getTime();
    var endDate = new Date("{{ $endDate }}").getTime();

    // Update the countdown every 1 second
    var x = setInterval(function() {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the start date
        var distanceToStart = startDate - now;
        var distanceToEnd = endDate - now;

        if (distanceToStart > 0) {
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distanceToStart / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distanceToStart % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distanceToStart % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distanceToStart % (1000 * 60)) / 1000);

            // Display the result in the corresponding HTML elements
            document.getElementById("countdown-days").innerHTML = days;
            document.getElementById("countdown-hours").innerHTML = hours;
            document.getElementById("countdown-minutes").innerHTML = minutes;
            document.getElementById("countdown-seconds").innerHTML = seconds;
        } else if (distanceToEnd > 0) {
            // Exam started, show join button
            document.querySelector('.coming-soon').innerHTML = '<a class="default-btn active" href="{{ route('join.ques', $exam->id) }}">Join Now</a>';
        } else {
            // Exam ended
            document.querySelector('.coming-soon').innerHTML = '<h2 class="text-light">Your Exam Is Over</h2>';
        }

        // If the countdown is finished, clear the interval
        if (distanceToEnd < 0) {
            clearInterval(x);
        }
    }, 1000);
</script>
@endsection

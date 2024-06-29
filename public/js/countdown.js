// public/js/countdown.js
const countdownElement = document.getElementById('countdown');

function formatTime(time) {
    return time < 10 ? `0${time}` : time;
}

function formatCountdown(hours, minutes, seconds) {
    return `${formatTime(hours)}:${formatTime(minutes)}:${formatTime(seconds)}`;
}

function updateCountdown() {
    fetch('/get-countdown-time')
        .then(response => response.json())
        .then(data => {
            const remainingTime = data.remainingTime;
            const days = Math.floor(remainingTime / 86400);
            const hours = Math.floor((remainingTime % 86400) / 3600);
            const minutes = Math.floor((remainingTime % 3600) / 60);
            const seconds = remainingTime % 60;

            countdownElement.innerHTML = `
                <div style="font-size: 15px; color: #FD6524;">
                    ${days} Days ${formatTime(hours)} Hrs ${formatTime(minutes)} Mins ${formatTime(seconds)} Secs
                </div>
            `;
        });
}


// Update the countdown every second
setInterval(updateCountdown, 1000);

// Initial update
updateCountdown();

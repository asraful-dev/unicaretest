@extends('layouts.frontend')

@section('content-frontend')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for additional styling */
        body {
            background-color: #f0f2f5;
        }
        .privacy-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
        .privacy-container h2 {
            color: #111D5E;
            text-align: center;
            margin-bottom: 20px;
        }
        .privacy-container p {
            color: #333;
            line-height: 1.6;
        }
        .privacy-container ul {
            padding-left: 20px;
        }
        .privacy-container li {
            margin-bottom: 10px;
        }
        .contact-info {
            margin-top: 20px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mb-5">
        <div class="privacy-container">
            <h2>Privacy Policy</h2>
            <p>At Unicare Coaching Center, we are committed to protecting your privacy. This Privacy Policy outlines how we collect, use, and safeguard your information when you visit our website.</p>
            <ul>
                <li><strong>Information Collection:</strong> We collect personal information that you voluntarily provide to us when you register on our site, subscribe to our newsletter, or fill out a form. This may include your name, email address, phone number, and any other information you choose to provide.</li>
                <li><strong>Use of Information:</strong> The information we collect is used to provide and improve our services, respond to your inquiries, and send periodic emails with updates and promotions. We do not sell, trade, or otherwise transfer your personal information to outside parties.</li>
                <li><strong>Data Security:</strong> We implement a variety of security measures to maintain the safety of your personal information. However, no method of transmission over the internet or electronic storage is 100% secure, so we cannot guarantee its absolute security.</li>
                <li><strong>Cookies:</strong> Our website uses cookies to enhance your experience. Cookies are small files that a site or its service provider transfers to your computer's hard drive through your web browser (if you allow) that enables the site's systems to recognize your browser and capture and remember certain information.</li>
                <li><strong>Third-Party Links:</strong> Occasionally, at our discretion, we may include or offer third-party products or services on our website. These third-party sites have separate and independent privacy policies. We, therefore, have no responsibility or liability for the content and activities of these linked sites.</li>
                <li><strong>Changes to Privacy Policy:</strong> We may update this Privacy Policy from time to time. Any changes will be posted on this page, and the revised policy will take effect immediately upon posting.</li>
            </ul>
            <div class="contact-info">
                <h5>Contact Information</h5>
                <p>If you have any questions about this Privacy Policy, please contact us at:</p>
                <p>Unicare Coaching Center<br>{{ get_setting('business_address')->value ?? 'null' }}<br>{{ get_setting('email')->value ?? 'null' }}<br>{{ get_setting('phone')->value ?? 'null' }}</p>
                <p>Please replace placeholders like {{ get_setting('business_address')->value ?? 'null' }}, {{ get_setting('email')->value ?? 'null' }}, and {{ get_setting('phone')->value ?? 'null' }} with your actual contact information.</p>
            </div>
        </div>
    </div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
@extends('layouts.frontend')

@section('content-frontend')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for additional styling */
        body {
            background-color: #f0f2f5;
        }
        .terms-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
        .terms-container h2 {
            color: #111D5E;
            text-align: center;
            margin-bottom: 20px;
        }
        .terms-container p {
            color: #333;
            line-height: 1.6;
        }
        .terms-container ul {
            padding-left: 20px;
        }
        .terms-container li {
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
        <div class="terms-container">
            <h2>Terms and Conditions</h2>
            <p>Welcome to Unicare Coaching Center. By accessing and using our website, you agree to comply with and be bound by the following terms and conditions. Please read them carefully.</p>
            <ul>
                <li><strong>Acceptance of Terms:</strong> By using our website, you accept these terms and conditions in full. If you disagree with any part of these terms, please do not use our website.</li>
                <li><strong>Services:</strong> Unicare Coaching Center provides educational content and coaching services. We reserve the right to modify or discontinue any service at any time without notice.</li>
                <li><strong>Registration:</strong> To access certain services, you may be required to register and provide personal information. You agree to provide accurate and complete information and to update your information as necessary.</li>
                <li><strong>Privacy:</strong> We value your privacy. Please review our Privacy Policy, which also governs your visit to our website, to understand our practices.</li>
                <li><strong>User Conduct:</strong> You agree not to use the website for any unlawful purpose or in a way that could damage, disable, overburden, or impair the site. You also agree not to attempt to gain unauthorized access to any part of the website or its related systems.</li>
                <li><strong>Intellectual Property:</strong> All content on this website, including text, graphics, logos, and images, is the property of Unicare Coaching Center or its content suppliers and is protected by intellectual property laws. Unauthorized use of any material is prohibited.</li>
                <li><strong>Payments and Refunds:</strong> All fees for our services must be paid in advance. If you are not satisfied with our services, you may request a refund within 14 days of payment, subject to our discretion.</li>
                <li><strong>Limitation of Liability:</strong> Unicare Coaching Center is not liable for any indirect, incidental, or consequential damages arising out of or in connection with the use of our website or services.</li>
                <li><strong>Changes to Terms:</strong> We may update these terms from time to time. Any changes will be posted on this page, and your continued use of the website after such changes will constitute your acceptance of the new terms.</li>
                <li><strong>Governing Law:</strong> These terms and conditions are governed by and construed in accordance with the laws of the jurisdiction in which Unicare Coaching Center operates.</li>
            </ul>
            <div class="contact-info">
                <h5>Contact Information</h5>
                <p>If you have any questions about these terms, please contact us at:</p>
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

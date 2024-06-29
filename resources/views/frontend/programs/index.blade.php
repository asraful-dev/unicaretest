@extends('layouts.frontend')
@section('content-frontend')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .head1 {
            margin: 20px 0;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card-body h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .card-footer .btn {
            margin: 0 5px;
        }
        .btn-details {
            color: #fff;
        }
        .btn-more {
            margin-top: 20px;
            background-color: #1F2C75;
            color: #fff;
        }
        .load-more {
            margin-top: 20px;
        }

        .course-home-section {
            background-image: url({{asset('courseBefore.jpg')}});
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
<section class="course-home-section m-5">
    <div class="container">
        <div class="head d-flex justify-content-center">
            <h1 class="head1">সময়োপযোগী প্রোগ্রামসমূহ</h1>
        </div>
        <div class="row options mb-4">
            <div class="col-md-4 mb-3 mb-md-0">
                <select id="ClassType" class="form-select shadow">
                    <option value="0">All Class</option>
                    <option value="Six">Six</option>
                    <option value="Seven">Seven</option>
                    <option value="Eight">Eight</option>
                    <option value="Nine">Nine</option>
                    <option value="Ten">Ten</option>
                    <option value="Eleven">Eleven</option>
                    <option value="Twelve">Twelve</option>
                    <option value="Model Test">Model Test</option>
                    <option value="Admission">Admission</option>
                </select>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <select class="form-select shadow" id="ProgramType">
                    <option value="0">All Program</option>
                    <option value="in-branch">Offline Program</option>
                    <option value="online">Online Program</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select shadow" id="PaymentType">
                    <option value="0">All Type</option>
                    <option value="paid">Paid Program</option>
                    <option value="free">Free Program</option>
                </select>
            </div>
        </div>

        <div class="row d-flex">
            <!-- Example Program Card 1 -->
            <div class="col-lg-4 col-md-6 col-sm-6 course mb-4" data-class="Admission" data-program="in-branch,online" data-payment="paid">
                <div class="card shadow">
                    <div class="card-header p-0">
                        <img src="https://via.placeholder.com/150" alt="image">
                    </div>
                    <div class="card-body">
                        <h3>
                            <span>মেডিকেল + ভার্সিটি Math এডমিশন প্রোগ্রাম 2024</span>
                        </h3>
                        <ul>
                            <li>মেধাবী ও অভিজ্ঞ শিক্ষক দ্বারা ক্লাস</li>
                            <li>লাইভ ম্যারাথন ক্লাস</li>
                            <li>প্রশ্নব্যাংক মাস্টার ক্লাস ও কুইজ</li>
                            <li>পর্যাপ্ত সংখ্যক স্ট্যান্ডার্ড এক্সাম</li>
                            <li>মানসম্মত সকল স্টাডি ম্যাটেরিয়ালস</li>
                            <li>ডাউট সলভিংয়ে সার্বক্ষণিক Q & A সেবা</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center border-0 pb-3 d-flex justify-content-center align-items-center">
                        <a class="btn btn-enroll btn-details shadow d-block" style="background: linear-gradient(to right, #111D5E,#562270) !important" href="https://unmesh.com/Program/Details/map2024offline">Offline</a>
                        <a class="btn btn-enroll shadow" style="color:white;background: linear-gradient(to right, #E02252,#c0123d) !important" href="https://unmesh.com/Program/Details/map2024online">Online/Combo</a>
                    </div>
                </div>
            </div>

            <!-- Example Program Card 2 -->
            <div class="col-lg-4 col-md-6 col-sm-6 course mb-4" data-class="Ten" data-program="in-branch" data-payment="free">
                <div class="card shadow">
                    <div class="card-header p-0">
                        <img src="https://via.placeholder.com/150" alt="image">
                    </div>
                    <div class="card-body">
                        <h3>
                            <span>SSC প্রস্তুতি প্রোগ্রাম 2024</span>
                        </h3>
                        <ul>
                            <li>অভিজ্ঞ শিক্ষক দ্বারা প্রশিক্ষণ</li>
                            <li>বিস্তারিত স্টাডি ম্যাটেরিয়ালস</li>
                            <li>নিয়মিত মডেল টেস্ট</li>
                            <li>লাইভ কুইজ ও প্রশ্নোত্তর</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center border-0 pb-3 d-flex justify-content-center align-items-center">
                        <a class="btn btn-enroll btn-details shadow d-block" style="background: linear-gradient(to right, #111D5E,#562270) !important" href="https://unmesh.com/Program/Details/map2024offline">Offline</a>
                        <a class="btn btn-enroll shadow" style="color:white;background: linear-gradient(to right, #E02252,#c0123d) !important" href="https://unmesh.com/Program/Details/map2024online">Online/Combo</a>
                    </div>
                </div>
            </div>

            <!-- Example Program Card 3 -->
            <div class="col-lg-4 col-md-6 col-sm-6 course mb-4" data-class="Eleven" data-program="online" data-payment="paid">
                <div class="card shadow">
                    <div class="card-header p-0">
                        <img src="https://via.placeholder.com/150" alt="image">
                    </div>
                    <div class="card-body">
                        <h3>
                            <span>কলেজ প্রথম বর্ষ প্রস্তুতি প্রোগ্রাম 2024</span>
                        </h3>
                        <ul>
                            <li>বিনামূল্যে স্টাডি ম্যাটেরিয়ালস</li>
                            <li>অভিজ্ঞ শিক্ষক দ্বারা লাইভ ক্লাস</li>
                            <li>নিয়মিত ডাউট সলভিং সেশন</li>
                            <li>প্রশ্নব্যাংক কুইজ</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center border-0 pb-3 d-flex justify-content-center align-items-center">
                        <a class="btn btn-enroll btn-details shadow d-block" style="background: linear-gradient(to right, #111D5E,#853baa) !important" href="https://unmesh.com/Program/Details/map2024offline">Offline</a>
                        <a class="btn btn-enroll shadow" style="color:white;background: linear-gradient(to right, #E02252,#c0123d) !important" href="https://unmesh.com/Program/Details/map2024online">Online/Combo</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center load-more">
            <a class="btn btn-more shadow">আরও দেখুন <i class="bi bi-chevron-down"></i></a>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection

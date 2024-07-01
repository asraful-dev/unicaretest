<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Pages;
use App\Models\Blog;
use App\Models\Payment;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\OurService;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Wallet;
use App\Models\About;
use App\Models\Service;
use App\Models\Product;
use App\Models\Property;
use App\Models\Tour;
use Carbon\Carbon;
use Image;

class FrontendController extends Controller
{
    /*=================== Start Index Methoed ===================*/
    public function index(Request $request)
    {
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();

        $home_view = 'frontend.home';
        // dd($home_view);
        return view($home_view, compact('categories'));
    } // end method

    /*=================== End Index Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function pageAbout($slug){
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        $page = Pages::where('slug', $slug)->first();
        return view('frontend.page.index',compact('page','categories'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function categoryShow($slug){
        $categoryShow = Category::where('slug', $slug)->first();
        // dd($categoryShow);
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.category.index',compact('categories','categoryShow'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function contactusShow(){
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.contact.index',compact('categories'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/
     
    /*=================== Start pageAbout Methoed ===================*/
    public function pageProperty($slug){
        $propertyShow = Property::where('slug', $slug)->first();
        // dd($propertyShow);
        $propertyShow->views=$propertyShow->views +1;
        $propertyShow->save();

        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.property.index',compact('propertyShow','categories'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function pageBlog($slug){
        $blogShow = Blog::where('slug', $slug)->first();
        // dd($propertyShow);
        $blogShow->view=$blogShow->view +1;
        $blogShow->save();

        $blogCategogry = BlogCategory::latest()->get();
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        $RecenProperty = Blog::latest()->get();
        return view('frontend.blog.index',compact('blogShow','categories','blogCategogry','RecenProperty'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function pageTour($slug){
        $tour = Tour::where('slug', $slug)->first();
        // dd($propertyShow);
        $tour->views=$tour->views +1;
        $tour->save();

        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.tour.index',compact('tour','categories'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    public function our_branch()
    {   $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.branch.branch_view',compact('categories'));
    } 

    public function our_service()
    {   $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        $OurService1 = OurService::where('unit', '1')
        ->where('course_type', '1')
        ->orderBy('id', 'desc')
        ->get();

        $OurService2 = OurService::where('unit', '2')
        ->where('course_type', '1')
        ->orderBy('id', 'desc')
        ->get();

       $OurService3 = OurService::where('unit', '3')
        ->where('course_type', '1')
        ->orderBy('id', 'desc')
        ->get();

        $OurService4 = OurService::where('unit', '4')
        ->where('course_type', '1')
        ->orderBy('id', 'desc')
        ->get();

         $OurService5 = OurService::where('unit', '5')
        ->where('course_type', '1')
        ->orderBy('id', 'desc')
        ->get();
        
        $banner1 = OurService::where('unit', '1')->where('course_type', '1')->pluck('image');
        $banner2 = OurService::where('unit', '2')->where('course_type', '1')->pluck('image');
        $banner3 = OurService::where('unit', '3')->where('course_type', '1')->pluck('image');
        $banner4 = OurService::where('unit', '4')->where('course_type', '1')->pluck('image');
        $banner5 = OurService::where('unit', '5')->where('course_type', '1')->pluck('image');
        return view('frontend.OurService.index', compact('banner1', 'categories', 'OurService1', 'OurService2', 'OurService3','OurService4','OurService5','banner2','banner3','banner4','banner5'));
    } 
    public function terms_conditions()
    {   
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.terms.index',compact('categories'));
    } 
    public function teacher()
    {   
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.terms.teacher',compact('categories'));
    } 
    public function programs()
    {   
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.programs.index',compact('categories'));
    } 
    public function contact()
    {   
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.contact.index',compact('categories'));
    } 
    public function privacy_policy()
    {   
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.privacy.index',compact('categories'));
    } 
    public function our_courses()
    {   
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.courses.index',compact('categories'));
    } 
    public function about()
    {   
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.about.index',compact('categories'));
    } 
    public function instructor()
    {   
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.instructor.index',compact('categories'));
    } 

    public function profileRegister(){
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        return view('frontend.user.profile_reg',compact('categories'));
    }
    public function joinExam() {
        $categories = Category::where('status', 1)->orderBy('id', 'ASC')->limit(7)->get();
        $auth = Auth::user(); // Retrieve the authenticated user
        return view('exam.join', compact('categories', 'auth'));
    }

    public function joinQues($id){
    
     $categories = Category::where('status', 1)->orderBy('id', 'ASC')->limit(7)->get();
     $exam = Exam::findOrFail($id);  // Use appropriate exam ID
     $questions = $exam->questions;

     $startTime = strtotime($exam->start_time);
     $endTime = strtotime($exam->end_time);
     $totalTime = ($endTime - $startTime) / 60; // Convert to minutes
     $hours = floor($totalTime / 60);
     $minutes = $totalTime % 60;

        return view('frontend.fronttest',compact('categories','exam','questions','startTime','endTime','totalTime','hours','minutes'));
    }
    
    public function goAhead($id){
        $categories = Category::where('status', 1)->orderBy('id', 'ASC')->limit(7)->get();
        $exam = Exam::findOrFail($id);
        $startDate = Carbon::parse($exam->start_time)->format('Y-m-d H:i:s');
        $endDate = Carbon::parse($exam->end_time)->format('Y-m-d H:i:s');
        return view('exam.go_ahead', compact('categories', 'exam', 'startDate', 'endDate'));
    }
    
    
    public function enrollDetails($id)
    {
        $service = OurService::with('serviceDetails')
        ->where('unit', $id)
        ->where('course_type',1)
        ->first();

        $categories = Category::where('status', 1)->orderBy('id', 'ASC')->limit(7)->get();
    
        if (!$service) {
            // Handle the case where the service is not found (optional)
            return redirect()->back()->with('error', 'Service not found.');
        }
    
        return view('frontend.enroll.index', compact('categories', 'service'));
    }

   
    public function checkOut(Request $request,$id)
    {   
        $ser_id = $id;
        $service = OurService::with('serviceDetails')->where('unit', $id)->first();
        $course_status = $request->course_status;
        $categories = Category::where('status', 1)->orderBy('id', 'ASC')->limit(7)->get();

        
        return view('frontend.enroll.check_out', compact('categories','service','ser_id','course_status'));
    }
    public function paymentMethod(Request $request,$id)
    {    
       
        $ser_id = $id;
        $course_status = $request->course_status;
     
        $wallet = Wallet::first();

        $categories = Category::where('status', 1)->orderBy('id', 'ASC')->limit(7)->get();
    
        if ($request->payment_method == 1) {
            return view('frontend.enroll.bkash', compact('categories','wallet','ser_id','course_status'));
        } elseif ($request->payment_method == 2) {
            return view('frontend.enroll.nagad', compact('categories','wallet','ser_id','course_status'));
        } elseif ($request->payment_method == 3) {
            return view('frontend.enroll.rocket', compact('categories','wallet','ser_id','course_status'));
        } else {
            return redirect()->back()->with('error', 'Invalid payment method selected.');
        }
    }

    public function fetchPrice(Request $request){

        $coursetype = $request->get('coursetype');
        $service = OurService::where('course_type', $coursetype)->first();
        // dd($service);
    
        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }
    
        $price = $service->price;
        $discountPrice = $service->discount_price ? $service->discount_price : 0;
        $subtotal = $price - $discountPrice;
    
        return response()->json([
            'price' => $price,
            'discountPrice' => $discountPrice,
            'subtotal' => number_format($subtotal),
        ]);
    }
  
    
}

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\AgentController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\MeritoriousController;
use App\Http\Controllers\Backend\MaterialController;
use App\Http\Controllers\Backend\InstructorController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\SuccessController;
use App\Http\Controllers\Backend\OurServiceController;
use App\Http\Controllers\Backend\CounterController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\UClassController;
use App\Http\Controllers\Backend\UBatchController;
// online exam er jonne
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  
});


/*================== Start Frontend All Route ==============*/
Route::middleware(['auth'])->group(function () {
    Route::get('/join-exam/{id}', [FrontendController::class, 'joinQues'])->name('join.ques');
    Route::get('/go-ahead/{id}', [FrontendController::class, 'goAhead'])->name('go.ahead');
    Route::get('/enroll/details/{id}', [FrontendController::class, 'enrollDetails'])->name('enroll.details');
});
// web.php



Route::post('/payment-method/{id}', [FrontendController::class,'paymentMethod'])->name('payment.method');


Route::post('/process', [PaymentController::class, 'process'])->name('process.payment');

Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');


Route::get('/check-out/{id}', [FrontendController::class,'checkOut'])->name('check.out');

Route::get('/total/result/{id}', [ExamController::class, 'totalResult'])->name('total.result');
Route::post('/exam/{exam}/submit', [ExamController::class, 'submit'])->name('exam.submit');
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/profile-register', [FrontendController::class, 'profileRegister'])->name('profile.register');
Route::get('/branch', [FrontendController::class, 'our_branch']);
Route::get('/terms-conditions', [FrontendController::class, 'terms_conditions']);
Route::get('/teacher-registration', [FrontendController::class, 'teacher']);
Route::get('/our-programs', [FrontendController::class, 'programs']);
Route::get('/contact-us', [FrontendController::class, 'contact']);
Route::get('/privacy-policy', [FrontendController::class, 'privacy_policy']);
Route::get('/our-service', [FrontendController::class, 'our_service']);
Route::get('/our-materials', [FrontendController::class, 'our_courses']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/instructor', [FrontendController::class, 'instructor']);
Route::get('/join-online-exam', [FrontendController::class, 'joinExam'])->name('join.exam');


// category Setting
Route::get('/category/{slug}',[FrontendController::class, 'categoryShow'])->name('user.category.show');
// contact us Setting
Route::get('/contact',[FrontendController::class, 'contactusShow'])->name('user.contactus.show');

// Page Setting
Route::get('/page/{slug}',[FrontendController::class, 'pageAbout'])->name('page.about');

// Page Property Single Page //
Route::get('/property/single/{slug}',[FrontendController::class, 'pageProperty'])->name('property.single.page');
// Page Blog Single Page //

// tour.details //
Route::get('/tours/details/{slug}',[FrontendController::class, 'pageTour'])->name('tour.details');

Route::get('/tour/blog/{slug}',[FrontendController::class, 'pageBlog'])->name('tour.single.blog');


/*================== Start Backend All Route ==============*/
Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
    Route::get('/my/profile/view', [UserController::class, 'MyProfileView'])->name('my.profile.view');
    Route::get('/course/details/{id}', [UserController::class, 'courseDetails'])->name('course.details');
    Route::get('/logout', [AdminController::class, 'AminLogout'])->name('admin.logout');
    Route::get('/general-setting', [SettingController::class, 'index'])->name('general.setting');
    Route::post('/update', [SettingController::class, 'update'])->name('update.setting');
    Route::get('/student/course/view', [UserController::class, 'courseView'])->name('student.course.view');


    Route::get('/my/course', [UserController::class, 'myCourseView'])->name('my_course_view');
});


// online exam er jonne 
Route::get('/exam/{examId}/result', [ExamController::class, 'userResult'])->name('exam.userResult');

Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
Route::get('/exams/create', [ExamController::class, 'create'])->name('exams.create');
Route::post('/exams', [ExamController::class, 'store'])->name('exams.store');
Route::get('exam/edit/{id}', [ExamController::class, 'edit'])->name('exam.edit');

Route::post('exam/update/{id}', [ExamController::class, 'update'])->name('exam.update');
Route::get('exam/delete/{id}', [ExamController::class, 'destroy'])->name('exam.destroy');

Route::get('/exams/{exam}/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/exams/{exam}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/exams/{exam}/questions', [QuestionController::class, 'store'])->name('questions.store');

Route::get('question/delete/{id}', [QuestionController::class, 'destroy'])->name('questions.delete');

Route::get('question/edit/{id}', [QuestionController::class, 'edit'])->name('questions.edit');
Route::post('question/update/{id}', [QuestionController::class, 'update'])->name('questions.update');

Route::get('/questions/{question}/answers', [AnswerController::class, 'index'])->name('answers.index');
Route::get('/questions/{question}/answers/create', [AnswerController::class, 'create'])->name('answers.create');
Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');

// online exam er jonne 


Route::get('/questionscreate', [QuestionController::class, 'createQuestion'])->name('create.question');



/* ==================== Admin Pages  All Routes =================== */
Route::prefix('pages')->group(function(){
    Route::get('/index', [PagesController::class, 'index'])->name('pages.index');
    Route::get('/create', [PagesController::class, 'create'])->name('pages.create');
    Route::post('/store', [PagesController::class, 'store'])->name('pages.store');
    Route::get('/view/{id}', [PagesController::class, 'show'])->name('pages.view');
    Route::get('/edit/{id}', [PagesController::class, 'edit'])->name('pages.edit');
    Route::post('/update/{id}',[PagesController::class, 'update'])->name('pages.update');
    Route::get('/delete/{id}', [PagesController::class, 'destroy'])->name('pages.delete');
    Route::get('/pages_active/{id}', [PagesController::class, 'active'])->name('pages.active');
    Route::get('/pages_inactive/{id}', [PagesController::class, 'inactive'])->name('pages.in_active');
});





/* ==================== Admin Slider All Routes =================== */
Route::prefix('slider')->group(function(){
    Route::get('/index', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::get('/view/{id}', [SliderController::class, 'view'])->name('slider.view');
    Route::post('/update/{id}',[SliderController::class, 'update'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('/slider_active/{id}', [SliderController::class, 'active'])->name('slider.active');
    Route::get('/slider_inactive/{id}', [SliderController::class, 'inactive'])->name('slider.in_active');
});

/* ==================== Admin Category All Routes =================== */
Route::prefix('categories')->group(function(){
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/view/{id}', [CategoryController::class, 'view'])->name('category.view');
    Route::post('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/categories_active/{id}', [CategoryController::class, 'active'])->name('category.active');
    Route::get('/categories_inactive/{id}', [CategoryController::class, 'inactive'])->name('category.in_active');
});

/* ==================== Admin About All Routes =================== */
Route::prefix('about-us')->group(function(){
    Route::get('/index', [AboutController::class, 'index'])->name('about.index');
    Route::get('/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::get('/view/{id}', [AboutController::class, 'view'])->name('about.view');
    Route::post('/update/{id}',[AboutController::class, 'update'])->name('about.update');
    Route::get('/delete/{id}', [AboutController::class, 'destroy'])->name('about.delete');
    Route::get('/about_active/{id}', [AboutController::class, 'active'])->name('about.active');
    Route::get('/about_inactive/{id}', [AboutController::class, 'inactive'])->name('about.in_active');
});

   
   
Route::get('/admin/profile/view', [UserController::class, 'profileView'])->name('profile.view');

Route::post('/profile/update', [UserController::class, 'profileUpdate'])->name('profile.updated');
Route::post('/password-update',[UserController::class, 'passwordUpdate'])->name('passwordUpdate');
Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

/* ==================== Admin Services All Routes =================== */
Route::prefix('services')->group(function(){
    Route::get('/index', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::get('/view/{id}', [ServiceController::class, 'view'])->name('service.view');
    Route::post('/update/{id}',[ServiceController::class, 'update'])->name('service.update');
    Route::get('/delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
    Route::get('/service_active/{id}', [ServiceController::class, 'active'])->name('service.active');
    Route::get('/service_inactive/{id}', [ServiceController::class, 'inactive'])->name('service.in_active');
});

/* ==================== Admin Agent All Routes =================== */
Route::prefix('agents')->group(function(){
    Route::get('/index', [AgentController::class, 'index'])->name('agent.index');
    Route::get('/create', [AgentController::class, 'create'])->name('agent.create');
    Route::post('/store', [AgentController::class, 'store'])->name('agent.store');
    Route::get('/edit/{id}', [AgentController::class, 'edit'])->name('agent.edit');
    Route::get('/view/{id}', [AgentController::class, 'view'])->name('agent.view');
    Route::post('/update/{id}',[AgentController::class, 'update'])->name('agent.update');
    Route::get('/delete/{id}', [AgentController::class, 'destroy'])->name('agent.delete');
    Route::get('/agent_active/{id}', [AgentController::class, 'active'])->name('agent.active');
    Route::get('/agent_inactive/{id}', [AgentController::class, 'inactive'])->name('agent.in_active');
});

/* ==================== Admin Testimonial All Routes =================== */
Route::prefix('testimonials')->group(function(){
    Route::get('/index', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::get('/view/{id}', [TestimonialController::class, 'view'])->name('testimonial.view');
    Route::post('/update/{id}',[TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.delete');
    Route::get('/testimonial_active/{id}', [TestimonialController::class, 'active'])->name('testimonial.active');
    Route::get('/testimonial_inactive/{id}', [TestimonialController::class, 'inactive'])->name('testimonial.in_active');
});


/* ==================== Admin BrandController All Routes =================== */
Route::prefix('brands')->group(function(){
    Route::get('/index', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::get('/view/{id}', [BrandController::class, 'view'])->name('brand.view');
    Route::post('/update/{id}',[BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');
    Route::get('/brand_active/{id}', [BrandController::class, 'active'])->name('brand.active');
    Route::get('/brand_inactive/{id}', [BrandController::class, 'inactive'])->name('brand.in_active');
});

/* ==================== Admin branchController All Routes =================== */
Route::prefix('branch')->group(function(){
    Route::get('/index', [BranchController::class, 'index'])->name('branch.index');
    Route::get('/create', [BranchController::class, 'create'])->name('branch.create');
    Route::post('/store', [BranchController::class, 'store'])->name('branch.store');
    Route::get('/edit/{id}', [BranchController::class, 'edit'])->name('branch.edit');
    Route::get('/view/{id}', [BranchController::class, 'view'])->name('branch.view');
    Route::post('/update/{id}',[BranchController::class, 'update'])->name('branch.update');
    Route::get('/delete/{id}', [BranchController::class, 'destroy'])->name('branch.delete');
    Route::get('/branch_active/{id}', [BranchController::class, 'active'])->name('branch.active');
    Route::get('/branch_inactive/{id}', [BranchController::class, 'inactive'])->name('branch.in_active');
});

/* ==================== Admin MeritoriousController All Routes =================== */
Route::prefix('meritorious')->group(function(){
    Route::get('/index', [MeritoriousController::class, 'index'])->name('meritorious.index');
    Route::get('/create', [MeritoriousController::class, 'create'])->name('meritorious.create');
    Route::post('/store', [MeritoriousController::class, 'store'])->name('meritorious.store');
    Route::get('/edit/{id}', [MeritoriousController::class, 'edit'])->name('meritorious.edit');
    Route::get('/view/{id}', [MeritoriousController::class, 'view'])->name('meritorious.view');
    Route::post('/update/{id}',[MeritoriousController::class, 'update'])->name('meritorious.update');
    Route::get('/delete/{id}', [MeritoriousController::class, 'destroy'])->name('meritorious.delete');
    Route::get('/meritorious_active/{id}', [MeritoriousController::class, 'active'])->name('meritorious.active');
    Route::get('/meritorious_inactive/{id}', [MeritoriousController::class, 'inactive'])->name('meritorious.in_active');
});
/* ==================== Admin SuccessController All Routes =================== */
Route::prefix('success')->group(function(){
    Route::get('/index', [SuccessController::class, 'index'])->name('success.index');
    Route::get('/create', [SuccessController::class, 'create'])->name('success.create');
    Route::post('/store', [SuccessController::class, 'store'])->name('success.store');
    Route::get('/edit/{id}', [SuccessController::class, 'edit'])->name('success.edit');
    Route::get('/view/{id}', [SuccessController::class, 'view'])->name('success.view');
    Route::post('/update/{id}',[SuccessController::class, 'update'])->name('success.update');
    Route::get('/delete/{id}', [SuccessController::class, 'destroy'])->name('success.delete');
    Route::get('/success_active/{id}', [SuccessController::class, 'active'])->name('success.active');
    Route::get('/success_inactive/{id}', [SuccessController::class, 'inactive'])->name('success.in_active');
});
/* ==================== Admin OurServiceController All Routes =================== */
Route::prefix('our-service')->group(function(){
    Route::get('/index', [OurServiceController::class, 'index'])->name('OurService.index');
    Route::get('/create', [OurServiceController::class, 'create'])->name('OurService.create');
    Route::post('/store', [OurServiceController::class, 'store'])->name('OurService.store');
    Route::get('/edit/{id}', [OurServiceController::class, 'edit'])->name('OurService.edit');
    Route::get('/view/{id}', [OurServiceController::class, 'view'])->name('OurService.view');
    Route::post('/update/{id}',[OurServiceController::class, 'update'])->name('OurService.update');
    Route::get('/delete/{id}', [OurServiceController::class, 'destroy'])->name('OurService.delete');
    Route::get('/OurService_active/{id}', [OurServiceController::class, 'active'])->name('OurService.active');
    Route::get('/OurService_inactive/{id}', [OurServiceController::class, 'inactive'])->name('OurService.in_active');

// here for wallet 
Route::get('/create/wallet', [OurServiceController::class, 'createWallet'])->name('create.wallet');
Route::post('/update/wallet/{id}', [OurServiceController::class, 'updateWallet'])->name('update.wallet');




});
/* ==================== Admin MaterialController All Routes =================== */
Route::prefix('our-materials')->group(function(){
    Route::get('/index', [MaterialController::class, 'index'])->name('material.index');
    Route::get('/create', [MaterialController::class, 'create'])->name('material.create');
    Route::post('/store', [MaterialController::class, 'store'])->name('material.store');
    Route::get('/edit/{id}', [MaterialController::class, 'edit'])->name('material.edit');
    Route::get('/view/{id}', [MaterialController::class, 'view'])->name('material.view');
    Route::post('/update/{id}',[MaterialController::class, 'update'])->name('material.update');
    Route::get('/delete/{id}', [MaterialController::class, 'destroy'])->name('material.delete');
    Route::get('/material_active/{id}', [MaterialController::class, 'active'])->name('material.active');
    Route::get('/material_inactive/{id}', [MaterialController::class, 'inactive'])->name('material.in_active');
});
/* ==================== Admin InstructorController All Routes =================== */
Route::prefix('instructor')->group(function(){
    Route::get('/index', [InstructorController::class, 'index'])->name('instructor.index');
    Route::get('/create', [InstructorController::class, 'create'])->name('instructor.create');
    Route::post('/store', [InstructorController::class, 'store'])->name('instructor.store');
    Route::get('/edit/{id}', [InstructorController::class, 'edit'])->name('instructor.edit');
    Route::get('/view/{id}', [InstructorController::class, 'view'])->name('instructor.view');
    Route::post('/update/{id}',[InstructorController::class, 'update'])->name('instructor.update');
    Route::get('/delete/{id}', [InstructorController::class, 'destroy'])->name('instructor.delete');
    Route::get('/instructor_active/{id}', [InstructorController::class, 'active'])->name('instructor.active');
    Route::get('/instructor_inactive/{id}', [InstructorController::class, 'inactive'])->name('instructor.in_active');
});
/* ==================== Admin BannerController All Routes =================== */
Route::prefix('banner')->group(function(){
    Route::get('/index', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::get('/view/{id}', [BannerController::class, 'view'])->name('banner.view');
    Route::post('/update/{id}',[BannerController::class, 'update'])->name('banner.update');
    Route::get('/delete/{id}', [BannerController::class, 'destroy'])->name('banner.delete');
    Route::get('/banner_active/{id}', [BannerController::class, 'active'])->name('banner.active');
    Route::get('/banner_inactive/{id}', [BannerController::class, 'inactive'])->name('banner.in_active');
});


Route::get('/payment/details', [PaymentController::class, 'paymentDetails'])->name('payment.details');
Route::get('/payment/details', [PaymentController::class, 'paymentDetails'])->name('payment.details');
Route::get('/payment/show/{id}', [PaymentController::class, 'show'])->name('payment.show');
Route::get('/payment/change/{id}', [PaymentController::class, 'changeStatus'])->name('payment.change');


Route::get('/payment_active/{id}', [PaymentController::class, 'active'])->name('payment.active');
Route::get('/payment_inactive/{id}', [PaymentController::class, 'inactive'])->name('payment.in_active');



/* ==================== Admin EventController All Routes =================== */
Route::prefix('event')->group(function(){
    Route::get('/index', [EventController::class, 'index'])->name('event.index');
    Route::get('/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::get('/view/{id}', [EventController::class, 'view'])->name('event.view');
    Route::post('/update/{id}',[EventController::class, 'update'])->name('event.update');
    Route::get('/delete/{id}', [EventController::class, 'destroy'])->name('event.delete');
    Route::get('/event_active/{id}', [EventController::class, 'active'])->name('event.active');
    Route::get('/event_inactive/{id}', [EventController::class, 'inactive'])->name('event.in_active');
});


/* ==================== Admin Video All Routes =================== */
Route::prefix('videos')->group(function(){
    Route::get('/index', [VideoController::class, 'index'])->name('video.index');
    Route::get('/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/store', [VideoController::class, 'store'])->name('video.store');
    Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
    Route::get('/view/{id}', [VideoController::class, 'view'])->name('video.view');
    Route::post('/update/{id}',[VideoController::class, 'update'])->name('video.update');
    Route::get('/delete/{id}', [VideoController::class, 'destroy'])->name('video.delete');
    Route::get('/video_active/{id}', [VideoController::class, 'active'])->name('video.active');
    Route::get('/video_inactive/{id}', [VideoController::class, 'inactive'])->name('video.in_active');
});

/* ==================== Admin Class All Routes =================== */
Route::prefix('uclass')->group(function(){
    Route::get('/index', [UClassController::class, 'index'])->name('class.index');
    Route::get('/create', [UClassController::class, 'create'])->name('class.create');
    Route::post('/store', [UClassController::class, 'store'])->name('class.store');
    Route::get('/edit/{id}', [UClassController::class, 'edit'])->name('class.edit');
    Route::post('/update/{id}',[UClassController::class, 'update'])->name('class.update');
    Route::get('/delete/{id}', [UClassController::class, 'destroy'])->name('class.delete');
});

/* ==================== Admin Batch All Routes =================== */
Route::prefix('ubatch')->group(function(){
    Route::get('/index', [UBatchController::class, 'index'])->name('batch.index');
    Route::get('/create', [UBatchController::class, 'create'])->name('batch.create');
    Route::post('/store', [UBatchController::class, 'store'])->name('batch.store');
    Route::get('/edit/{id}', [UBatchController::class, 'edit'])->name('batch.edit');
    Route::post('/update/{id}',[UBatchController::class, 'update'])->name('batch.update');
    Route::get('/delete/{id}', [UBatchController::class, 'destroy'])->name('batch.delete');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/admin/dashboard', [UserController::class, 'AdminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth','role:vendor'])->group(function() {
   Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashobard');
});
Route::get('/join/{id}', [ExamController::class, 'join'])->name('join');


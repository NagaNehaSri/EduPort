<?php

use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\ServiceController;
use App\Http\Controllers\frontend\ServiceViewController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\SuccesStoriesController;
use App\Http\Controllers\frontend\StudyAbroadController;
use App\Http\Controllers\frontend\VisionMissionController;
use App\Http\Controllers\frontend\CeoController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\StudentServicesController;
use App\Http\Controllers\frontend\TestExamsController;
use App\Http\Controllers\frontend\VisaController;
use App\Http\Controllers\frontend\GovernaceController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\ContactUsController;
use App\Http\Controllers\frontend\ProjectViewController;
use App\Http\Controllers\frontend\ProjectController;
use App\Http\Controllers\frontend\UpcomingProjectsController;
use App\Http\Controllers\frontend\OngoingProjectsController;
use App\Http\Controllers\frontend\BenefitsAdblueController;
use App\Http\Controllers\frontend\FillingLocationController;
use App\Http\Controllers\frontend\GalleryController;
use App\Http\Controllers\SignupFormController;
use App\Http\Controllers\frontend\ChapterController;
use App\Http\Controllers\Admin\PaymentController;
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


// Route::prefix('/user')->group(function () {
//     Route::get('login', [\App\Http\Controllers\website\UsersController::class, 'login'])->name('users.login');
//     Route::get('otp', [\App\Http\Controllers\website\UsersController::class, 'otp'])->name('users.otp');
// });

//Website Routes 
Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/services", [ServiceController::class, "index"])->name("services");
Route::get("/service-view/{slug}", [ServiceController::class, "view"])->name("service-view");

Route::get("/contact", [ContactUsController::class, "index"])->name("contact");
Route::get("/terms-conditions", [ContactUsController::class, "terms"])->name("terms-conditions");

Route::get("/privacy-policy", [ContactUsController::class, "privacy"])->name("privacy-policy");

Route::get("/refund-policy", [ContactUsController::class, "refund"])->name("refund-policy");

Route::middleware(['auth.session'])->group(function () {
    Route::get("/chapter-view/{slug}", [ChapterController::class, "view"])->name("chapter-view");
    Route::get("quiz/{slug}", [ChapterController::class, "quiz"])->name("quiz");
    Route::get("quiz-info", [ChapterController::class, "quizinfo"])->name("quizinfo");
   


    Route::post('/handle-payment-status', [PaymentController::class, 'handlePaymentStatus'])->name('payment.verify');

   

    // Process Payment (Create Razorpay Order)
    Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');
    
    // Handle Successful Payment
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    
    // Handle Failed Payment
    Route::get('/payment/failure', [PaymentController::class, 'failure'])->name('payment.failure');
    
    // Handle Pending Payment
    Route::get('/payment/pending', [PaymentController::class, 'pending'])->name('payment.pending');

    // Route::post('/process-payment', [PaymentController::class, 'processPayment']);

// Fetch a single question dynamically
Route::get('/get-question', [ChapterController::class, 'getQuestion'])->name('quiz.get-question');

// Submit an answer
Route::post('/submit-answer', [ChapterController::class, 'submitAnswer'])->name('quiz.submit-answer');

// Calculate the score
Route::post('/calculate-score', [ChapterController::class, 'calculateScore'])->name('quiz.calculate-score');


Route::get('/quiz-results/{slug}', [ChapterController::class, 'showResults'])->name('quiz.results');
Route::get('/quiz-review/{slug}', [ChapterController::class, 'reviewQuiz'])->name('quiz.review');

Route::post('/logout/student', [SignupFormController::class, 'logout'])->name('student.logout');
});

Route::get("chapters", [ChapterController::class, "index"])->name("chapters");


Route::get("chapters/search", [ChapterController::class, 'searchChapters'])->name('chapters.search');


Route::get('/login/student', [SignupFormController::class, 'login'])->name('student.login');

Route::post('/studentloginform', [SignupFormController::class, 'studentlogin'])->name('auth.login');

Route::get('/signup', [SignupFormController::class, 'create'])->name('signup'); 

Route::post('/signup/store', [SignupFormController::class, 'store'])->name('signup.store'); 

// FORGOT PASSWORD ROUTES - DO NOT CHANGE
Route::get('/forgot-password', [SignupFormController::class, 'showForgotPasswordForm'])->name('forgot.password');
Route::post('/forgot-password/send-otp', [SignupFormController::class, 'sendOtp'])->name('forgot.password.sendOtp');
Route::get('/verify-otp', [SignupFormController::class, 'showVerifyOtpForm'])->name('verify.otp');
Route::post('/verify-otp-submit', [SignupFormController::class, 'verifyOtp'])->name('verify.otp.submit');
Route::get('/reset-password', [SignupFormController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password', [SignupFormController::class, 'resetPassword'])->name('reset.password.update');


Route::get("succes-stories", [SuccesStoriesController::class, "index"])->name("succes-stories");

Route::get("governace", [GovernaceController::class, "index"])->name("governace");

Route::get("/study-in-usa/{slug}", [StudyAbroadController::class, "index"])->name("study-in-usa");
Route::get("/student-services/{slug}", [StudentServicesController::class, "index"])->name("student-services");
Route::get("/test-exams/{slug}", [TestExamsController::class, "index"])->name("test-exams");

Route::get("/visa/{slug}", [VisaController::class, "index"])->name("visa");

Route::get("/filling-location", [FillingLocationController::class, "index"])->name("filling-location");

Route::get("/certificate", [GalleryController::class, "index"])->name("certificate");

Route::get("/ceo-message", [CeoController::class, "index"])->name("ceomessage");

Route::get("/vision-mission", [VisionMissionController::class, "index"])->name("vision-mission");
Route::get("/benefits-adblue", [BenefitsAdblueController::class, "index"])->name("benefits-adblue");

Route::get("/about", [AboutController::class, "index"])->name("about");
Route::get("/blog", [BlogController::class, "index"])->name("blog");
Route::get("/blog-view/{slug}", [BlogController::class, "view"])->name("blog-view");

Route::get("/projects/{slug}", [ProjectController::class, "index"])->name("Projects");

Route::get("/Project-view/{slug}", [ProjectViewController::class, "index"])->name("Project-view");


// projects
Route::get("/upcoming-projects", [ProjectController::class, "upcoming"])->name("upcoming-projects");
Route::get("/ongoing-projects", [ProjectController::class, "ongoing"])->name("ongoing-projects");


Route::get("/product-view/{slug}", [ProductController::class, "index"])->name("products");

Route::any("/contact-save", [ContactUsController::class, "save"])->name("contact-save");
Route::any('/inquiry-save', [ContactUsController::class, 'inquiry'])->name('inquiry-save');
Auth::routes();
Route::group(['middleware' => ['isAdmin', 'auth']], function () {
    Route::get('admin', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('admin/profile', [\App\Http\Controllers\Admin\AdminController::class, 'profile'])->name('admin_profile');

    Route::get('admin/logs', [\App\Http\Controllers\Admin\AdminController::class, 'logs'])->name('logs');
    Route::put('admin/profile', [\App\Http\Controllers\Admin\AdminController::class, 'updateAdminProfile'])->name('update_admin_profile');
    Route::get('logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('logout');

    Route::resource('admin/about_image_slider', '\App\Http\Controllers\Admin\AboutImageController');
    Route::resource('admin/chapters', '\App\Http\Controllers\Admin\ChapterController');
    Route::resource('admin/chapter_content', '\App\Http\Controllers\Admin\ChapterContentController');
    Route::resource('admin/quiz', '\App\Http\Controllers\Admin\QuizController');

    Route::resource('admin/who_we_are', '\App\Http\Controllers\Admin\WhoWeAreController');
    Route::resource('admin/banner', '\App\Http\Controllers\Admin\BannerController');

    Route::resource('admin/banner_feature', '\App\Http\Controllers\Admin\BannerFeatureController');

    Route::resource('admin/countries', '\App\Http\Controllers\Admin\CountriesController');
    // Route::resource('admin/home_services', '\App\Http\Controllers\Admin\HomeServicesController');


    Route::resource('admin/resortbanner', '\App\Http\Controllers\Admin\ResortBannerController');
    Route::resource('admin/benefit', '\App\Http\Controllers\Admin\BenefitController');
    Route::resource('admin/home_about', '\App\Http\Controllers\Admin\HomeAboutController');
    Route::resource('admin/location', '\App\Http\Controllers\Admin\LocationController');
    Route::resource('admin/content', '\App\Http\Controllers\Admin\ContentController');
    Route::resource('admin/image_cms', '\App\Http\Controllers\Admin\ImageCMSController');
    Route::resource('admin/cms', '\App\Http\Controllers\Admin\CmsController');

    Route::resource('admin/count', '\App\Http\Controllers\Admin\CountController');
    Route::resource('admin/work', '\App\Http\Controllers\Admin\WorkController');
    Route::resource('admin/career', '\App\Http\Controllers\Admin\CareerController');
    Route::resource('admin/partnership', '\App\Http\Controllers\Admin\PartnershipController');
    Route::resource('admin/testimonial', '\App\Http\Controllers\Admin\TestimonialController');
    Route::resource('admin/promotion', '\App\Http\Controllers\Admin\PromotionController');

    Route::resource('admin/property', '\App\Http\Controllers\Admin\PropertyController');

    Route::any('admin/property/slide_index/{id}', '\App\Http\Controllers\Admin\PropertyController@slide_index')->name('property.slide_index');
    Route::any('admin/property/slide_edit/{id}', '\App\Http\Controllers\Admin\PropertyController@slide_edit')->name('property.slide_edit');
    Route::any('admin/property/slide_store', '\App\Http\Controllers\Admin\PropertyController@slide_store')->name('property.slide_store');
    Route::any('admin/property/slide_update/{id}', '\App\Http\Controllers\Admin\PropertyController@slide_update')->name('property.slide_update');
    Route::any('admin/property/slide_destroy/{id}', '\App\Http\Controllers\Admin\PropertyController@slide_destroy')->name('property.slide_destroy');

    Route::resource('admin/flat', '\App\Http\Controllers\Admin\FlatController');


    Route::any('admin/flat/slide_index/{id}', '\App\Http\Controllers\Admin\FlatController@slide_index')->name('flat.slide_index');
    Route::any('admin/flat/slide_edit/{id}', '\App\Http\Controllers\Admin\FlatController@slide_edit')->name('flat.slide_edit');
    Route::any('admin/flat/slide_store', '\App\Http\Controllers\Admin\FlatController@slide_store')->name('flat.slide_store');
    Route::any('admin/flat/slide_update/{id}', '\App\Http\Controllers\Admin\FlatController@slide_update')->name('flat.slide_update');
    Route::any('admin/flat/slide_destroy/{id}', '\App\Http\Controllers\Admin\FlatController@slide_destroy')->name('flat.slide_destroy');

    Route::resource('admin/gallery', '\App\Http\Controllers\Admin\GalleryController');
    Route::resource('admin/gallery_images', '\App\Http\Controllers\Admin\GalleryImagesController');

    Route::resource('admin/video_gallery_page', '\App\Http\Controllers\Admin\VideoGalleryPageController');
    Route::resource('admin/video_gallery', '\App\Http\Controllers\Admin\VideoGalleryController');
    Route::resource('admin/partner_with_us', '\App\Http\Controllers\Admin\PartnerWithUsController');


    Route::resource('admin/adblue_benefits', '\App\Http\Controllers\Admin\AdblueBenefitController');
    Route::resource('admin/adblue_solutions', '\App\Http\Controllers\Admin\AdblueSolutionsController');

    Route::resource('admin/adblue_specifications', '\App\Http\Controllers\Admin\AdblueSpecificationController');



    Route::resource('admin/resortgallery', '\App\Http\Controllers\Admin\ResortGalleryController');
    Route::resource('admin/youtube_video', '\App\Http\Controllers\Admin\YoutubeVideoController');

    Route::resource('admin/why_choose_us', '\App\Http\Controllers\Admin\WhyChooseUsController');

    Route::resource('admin/home_page_services', '\App\Http\Controllers\Admin\HomeServicesController');
    Route::resource('admin/what_we_provide', '\App\Http\Controllers\Admin\WhatWeProvideController');
    Route::resource('admin/home_page_enquiry', '\App\Http\Controllers\Admin\HomePageEnquiryController');


    Route::resource('admin/why_choose_us_about', '\App\Http\Controllers\Admin\WhyChooseUsAboutController');
    Route::resource('admin/ceomessage', '\App\Http\Controllers\Admin\CEOMessageController');
    Route::resource('admin/vision_mission', '\App\Http\Controllers\Admin\VisionMissionController');
    Route::resource('admin/vision_mission_spec', '\App\Http\Controllers\Admin\VisionMissionSpecificationsController');
    Route::resource('admin/succes_stories', '\App\Http\Controllers\Admin\SuccesStoriesController');
    Route::resource('admin/succes_stories_spec', '\App\Http\Controllers\Admin\SuccesStoriesSpecController');
    Route::resource('admin/adblue', '\App\Http\Controllers\Admin\AdblueController');

    Route::resource('admin/student_services', '\App\Http\Controllers\Admin\StudentServiceController');
    Route::resource('admin/visa', '\App\Http\Controllers\Admin\VisaController');
    Route::resource('admin/test_exams', '\App\Http\Controllers\Admin\TestExamsController');
    Route::resource('admin/filling_station_locations', '\App\Http\Controllers\Admin\FillingStationLocationsController');
    
    Route::resource('admin/filling_station_location_names', '\App\Http\Controllers\Admin\FillingStationLocationNamesController');

    Route::resource('admin/structures_processes_faq', '\App\Http\Controllers\Admin\StructuresProcessesFaqController');
    Route::resource('admin/faq', '\App\Http\Controllers\Admin\FaqController');


    Route::resource('admin/spot_admissions', '\App\Http\Controllers\Admin\SpotAdmissionsController');

    Route::resource('admin/social_intiatives', '\App\Http\Controllers\Admin\SocialInitiativeController');
    Route::resource('admin/accreditations', '\App\Http\Controllers\Admin\AccreditationsController');
    Route::resource('admin/accreditations_images', '\App\Http\Controllers\Admin\AccreditationsImagesController');
    Route::resource('admin/scholarship_faq', '\App\Http\Controllers\Admin\ScholarshipFaqController');


    Route::resource('admin/facility', '\App\Http\Controllers\Admin\FacilityController');
    Route::resource('admin/highlight', '\App\Http\Controllers\Admin\HighlightController');
    Route::resource('admin/resort_section', '\App\Http\Controllers\Admin\ResortSectionController');
    Route::resource('admin/explore', '\App\Http\Controllers\Admin\ExploreController');
    // Route::resource('admin/management', '\App\Http\Controllers\Admin\ResortSectionController');

    Route::resource('admin/site-settings', '\App\Http\Controllers\Admin\SettingsController');
    Route::resource('admin/social-media-settings', '\App\Http\Controllers\Admin\SocialMediaSettingsController');
    Route::resource('admin/active-ad', '\App\Http\Controllers\Admin\ActiveAdController');
    Route::resource('admin/seo-settings', '\App\Http\Controllers\Admin\SeoSettingsController');

    Route::resource('admin/service', '\App\Http\Controllers\Admin\ServiceController');
    Route::resource('admin/service_images_slider', '\App\Http\Controllers\Admin\ServiceImageSliderController');
    Route::resource('admin/service_benefits', '\App\Http\Controllers\Admin\ServiceBenefitController');
    Route::resource('admin/projects', '\App\Http\Controllers\Admin\ProjectController');
    Route::resource('admin/project_images', '\App\Http\Controllers\Admin\ProjectImageController');

    Route::resource('admin/home_about_image_slider', '\App\Http\Controllers\Admin\HomeAboutImageController');
    Route::resource('admin/service_feature', '\App\Http\Controllers\Admin\ServiceFeatureController');
    Route::resource('admin/about', '\App\Http\Controllers\Admin\AboutController');
    Route::resource('admin/team', '\App\Http\Controllers\Admin\TeamController');
    Route::resource('admin/roles', '\App\Http\Controllers\Admin\RolesController');
    Route::resource('admin/user', '\App\Http\Controllers\Admin\UserController');

    Route::resource('admin/blog', '\App\Http\Controllers\Admin\BlogController');
    Route::resource('admin/blog_slider_image', '\App\Http\Controllers\Admin\BlogSliderImageController');
    Route::resource('admin/portfolio', '\App\Http\Controllers\Admin\PortfolioController');
    Route::resource('admin/categories', '\App\Http\Controllers\Admin\CategoryController');
    Route::resource('admin/youtube', '\App\Http\Controllers\Admin\YoutubeController');
    Route::resource('admin/portfolio_image', '\App\Http\Controllers\Admin\PortfolioImageController');
    Route::resource('admin/board_of_director', '\App\Http\Controllers\Admin\BoardOfDirectorController');
    Route::resource('admin/milestone', '\App\Http\Controllers\Admin\MilestoneController');
    Route::resource('admin/product', '\App\Http\Controllers\Admin\ProductController');

    Route::resource('admin/product_feature', '\App\Http\Controllers\Admin\ProductFeatureController');
    Route::resource('admin/job', '\App\Http\Controllers\Admin\JobController');
    Route::resource('admin/room', '\App\Http\Controllers\Admin\RoomController');
    Route::resource('admin/management', '\App\Http\Controllers\Admin\ManagementController');
    Route::get('admin/room/{flat_id}/{room_id}/edit', '\App\Http\Controllers\Admin\RoomController@edit_room')->name('edit_room.edit');

    Route::delete('admin/portfolio-images/{id}', 'PortfolioImageController@destroy')->name('portfolio-images.destroy');

    // Route::resource('admin/dashboard', '\App\Http\Controllers\Admin\DashboardController');
    // Define routes for Contact resource
    Route::get('admin/dashboard', '\App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
    Route::delete('admin/dashboard/{id}', '\App\Http\Controllers\Admin\DashboardController@destroy')->name('admin.dashboard.destroy');

    // Define routes for Inquiry resource
    Route::get('admin/dashboard/inquiry', '\App\Http\Controllers\Admin\DashboardController@inquiryIndex')->name('admin.dashboard.inquiry.index');
    Route::delete('admin/dashboard/inquiry/{id}', '\App\Http\Controllers\Admin\DashboardController@inquiryDestroy')->name('admin.dashboard.inquiry.destroy');
});

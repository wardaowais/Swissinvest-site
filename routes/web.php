<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EmailController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\NecessaryCategoryController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\WebContentController;
use App\Http\Controllers\MemberTitleController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MemberEventController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\ScraperController;
use App\Http\Controllers\Admin\InstituteController;
// Mini web
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\MiniHomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Admin\NewPageController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SocialMediaLinksController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WorkTimeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HealthTipController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\FaxController; 
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\SurveyCategoryController;
use App\Http\Controllers\SurveyController;

// end mini web


// Route::get('/user/{id}', [WebController::class,'userHomePage'])->name('home.user');
Route::get('/user/{id}/{first_name}{last_name}', [WebController::class, 'userHomePage'])->name('home.user');
Route::get('/get-slider/{user_id}', [SliderController::class, 'getSlider'])->name('get-slider');
Route::post('/summernote/upload', [WebController::class, 'upload'])->name('summernote.upload');
Route::post('/contact/store/{user_id}', [ContactController::class, 'store'])->name('contact.store');
Route::get('/blog/{slug}', [WebController::class, 'blogDetails'])->name('home.blog');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('set-locale', function (Illuminate\Http\Request $request) {
    $locale = $request->input('locale');
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLocale');


Route::middleware(['suspicious'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/doctor-availability', [HomeController::class, 'doctorAvailability'])->name('doctorAvailability');
    Route::get('/doctor-list', [HomeController::class, 'doctorLists'])->name('doctorLists');
    Route::get('/getTimeSlots', [HomeController::class, 'getTimeSlots'])->name('getTimeSlots');
    Route::get('/doctor/{encrypted_id}', [HomeController::class, 'aboutDoctor'])->name('doctor.about');
    Route::get('/doctor-map/{encrypted_id}', [HomeController::class, 'aboutDoctorMap'])->name('aboutDoctorMap');
    Route::get('/doctor-maps', [HomeController::class, 'allDoctormap'])->name('allDoctormap');
    Route::get('/get-user-details', [HomeController::class, 'getUserDetails'])->name('getUserDetails');
    Route::get('/booking', [AppointmentController::class, 'patientBooking'])->name('patientBooking');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::post('/storeUserIdInSession', [AppointmentController::class, 'storeUserIdInSession'])->name('storeUserIdInSession');
    Route::get('/verify-otp', [AppointmentController::class, 'patientsOtp'])->name('patientsOtp');

    Route::post('/booking-verify-otp', [AppointmentController::class, 'verifyOtp'])->name('verifyOtp');

    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/userRegister', [AdminAuthController::class, 'userRegister'])->name('userRegister');
    Route::post('/otpverification', [AdminAuthController::class, 'otpVerification'])->name('otpVerification');
    Route::get('/admin/login', [AdminAuthController::class, 'showAdminLoginForm'])->name('showAdminLoginForm');
    Route::post('/admin/logincheck', [AdminAuthController::class, 'adminLoginCheck'])->name('adminLoginCheck');
    Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');
    // Display the 2FA verification form
    Route::get('/admin/2fa', [AdminAuthController::class, 'show2FAForm'])->name('admin.2fa.verify');

    // Verify 2FA code
    Route::post('/admin/2fa', [AdminAuthController::class, 'verify2FA'])->name('verify2FA');


    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/logincheck', [AdminAuthController::class, 'login'])->name('logincheck');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    // web.php or routes.php
    Route::get('/price', [HomeController::class, 'showPrice'])->name('showPrice');
    Route::get('/doctor/{userId}/time-slots', [HomeController::class, 'getTimeSlots'])->name('doctor.time_slots');
    Route::get('fetchFaqAnswer', [HomeController::class, 'fetchFaqAnswer'])->name('fetchFaqAnswer');
    Route::get('/search', [HomeController::class, 'search'])->name('search.users');

    Route::get('/doctor/{userId}/availability/{date?}', [HomeController::class, 'showAvailability'])
        ->name('user.availability');
    Route::get('/get-time-slots', [HomeController::class, 'getTimeSlots'])->name('get-time-slots');
    Route::get('/faq/answers', [HomeController::class, 'getAnswers']);
    Route::post('/submit-review', [VerificationController::class, 'submitReview'])->name('submit-review');
    Route::get('/patients/register', [AdminAuthController::class, 'patientsRegister'])->name('patientsRegister');
    Route::post('/patients/registration', [AdminAuthController::class, 'patientsRegistration'])->name('patientsRegistration');
    Route::get('/patients/verify-otp', [AdminAuthController::class, 'patientsRegisterOtp'])->name('patientsRegisterOtp');
    Route::post('/patients/verify-otp', [AdminAuthController::class, 'patientOtpverify'])->name('patientOtpverify');
    Route::get('/career', [JobPostController::class, 'careerPost'])->name('careerPost');
    Route::get('/job-post/{id}', [JobPostController::class, 'jobPostdetails'])->name('jobPostdetails');
    Route::get('/job-search', [JobPostController::class, 'jobSearch'])->name('jobSearch');
    Route::get('/company/register', [AdminAuthController::class, 'companyRegistrationForm'])->name('companyRegistrationForm');
    Route::post('/companyRegister', [AdminAuthController::class, 'companyRegister'])->name('companyRegister');
    // institute search
    Route::get('/search-institutes', [HomeController::class, 'searchInstitutes'])->name('search.institutes');
    Route::get('/institute/{userId}/members', [HomeController::class, 'showInstituteMembers'])->name('institute.members');
});

Route::middleware(['auth', 'role:user', 'suspicious'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    Route::get('/booking-doctor', [UserDashboardController::class, 'doctorPanelBooking'])->name('doctorPanelBooking');
    Route::get('/booking-hystory', [UserDashboardController::class, 'doctorBookingHistory'])->name('doctorBookingHistory');
    Route::get('/sync', [UserDashboardController::class, 'syncApps'])->name('syncApps');
    Route::get('/bookspage', [BookController::class, 'bookspage'])->name('bookspage');
    // Book Categories Routes
    Route::get('/member-survey-cate', [SurveyController::class, 'promeberSurveyCate'])->name('promeberSurveyCate');
    Route::get('/member-survey', [SurveyController::class, 'promeberSurvey'])->name('promeberSurvey');
    Route::get('/member-coupon', [SurveyController::class, 'promeberCoupon'])->name('promeberCoupon');
    // Route::get('/meet', [UserDashboardController::class, 'startMeet'])->name('startMeet');
    // Route::post('/make-call', [UserDashboardController::class, 'makeCall'])->name('make.call');
    Route::get('/match-details/{userId}', [UserDashboardController::class, 'inviteFriends'])->name('doctor.details');
    Route::post('/store-time-slot', [TimeSlotController::class, 'storeTimeSlot'])->name('store.time.slot');
    Route::post('/updateProfile', [UserDashboardController::class, 'updateProfile'])->name('user.update');
    Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
    Route::post('/subscription/store', [SubscriptionController::class, 'store'])->name('subscription.store');
    Route::get('/plans', [PlanController::class, 'index'])->name('plans');
    Route::get('/plans/checkout', [PlanController::class, 'checkout'])->name('stripe.checkout');
    Route::get('/subscription/success', [PlanController::class, 'success'])->name('subscription.success');
    Route::get('/wallet/checkout', [PlanController::class, 'walletCheckout'])->name('wallet.checkout');
    Route::get('/wallet/success', [PlanController::class, 'walletSuccess'])->name('wallet.success');


    Route::get('/premium-features', [PlanController::class, 'premiumFeature'])->name('premiumFeature');

    Route::post('/subscribe', [PlanController::class, 'subscribe'])->name('subscribe');
    Route::post('/incoming-calls', [UserDashboardController::class, 'checkPendingCalls'])->name('incoming.calls');
    Route::post('/accept-call', [UserDashboardController::class, 'acceptCall'])->name('accept.call');
    Route::post('/reject-call', [UserDashboardController::class, 'rejectCall'])->name('reject.call');
    Route::post('/update-country', [UserDashboardController::class, 'updateLanguage'])->name('update.country');
    Route::post('/update-online-status', [UserDashboardController::class, 'updateOnlineStatus'])->name('update.online.status');
    Route::get('/conversation-history', [UserDashboardController::class, 'getCallHistory'])->name('conversation.history');


    Route::post('adspoints', [UserDashboardController::class, 'adsPoints'])->name('adsPoints');
    Route::get('/video-calling', [UserDashboardController::class, 'showVideoCallingView'])->name('videoCalling');
    Route::get('/get-ads-times', [ChatController::class, 'getAdsTimes'])->name('checkad');
    Route::post('/upload-profile-pic', [UserDashboardController::class, 'uploadProfilePic'])->name('upload.profile.pic');
    Route::get('/filter-plans', [PlanController::class, 'filterPlans'])->name('filter.plans');
    Route::get('/myfriend-lists', [FriendController::class, 'myFriendList'])->name('myFriendList');
    Route::post('/search-by-username', [FriendController::class, 'searchByUsername'])->name('searchByUsername');
    // doctor routes
    Route::get('doctors/timeslots', [TimeSlotController::class, 'timeSlot'])->name('timeSlot');
    Route::get('doctors/rowtimeslots', [TimeSlotController::class, 'index'])->name('index.timeSlot');
    Route::get('/profile', [UserDashboardController::class, 'userProfile'])->name('user.profile');
    Route::get('/time-slot', [UserDashboardController::class, 'doctorTimeSlot'])->name('doctorTimeSlot');
    Route::get('/location', [UserDashboardController::class, 'doctorLocationUpdate'])->name('doctorLocationUpdate');
    Route::get('/connet-allomed', [UserDashboardController::class, 'allomedSync'])->name('allomedSync');
    Route::get('/get-pending-bookings', [UserDashboardController::class, 'getPendingBookings'])->name('getPendingBookings');
    Route::post('/update-booking-status', [UserDashboardController::class, 'updateBookingStatus'])->name('updateBookingStatus');
    Route::get('/get-booking-details/{bookingId}', [UserDashboardController::class, 'getBookingDetails'])->name('getBookingDetails');
    Route::get('/get-bookings-list', [UserDashboardController::class, 'getBookinglist'])->name('getBookinglist');
    Route::get('/get-bookings-history', [UserDashboardController::class, 'getBookingHistory'])->name('getBookingHistory');
    Route::get('/necessary-info', [NecessaryCategoryController::class, 'sponseredDetails'])->name('sponseredDetails');
    Route::get('necessary-list/{cat_id}', [NecessaryCategoryController::class, 'sponserCatebasedList'])->name('sponser.catebasedList');
    Route::get('/doctor-faq', [UserDashboardController::class, 'doctorFaq'])->name('doctorFaq');
    Route::post('/faqs/update', [UserDashboardController::class, 'updateFaqs'])->name('faqs.update');
    Route::delete('/faqs/{id}', [UserDashboardController::class, 'destroyFaq'])->name('faqs.destroy');
    Route::post('/update-address', [UserDashboardController::class, 'updateAddress'])->name('user.updateAddress');
    Route::get('/security-settings', [UserDashboardController::class, 'passwordview'])->name('passwordview');
    Route::post('/update-password', [UserDashboardController::class, 'updatePassword'])->name('update.password');
    Route::get('/user-advertisement', [UserDashboardController::class, 'useradvertisement'])->name('useradvertisement');
    Route::get('/coupon', [UserDashboardController::class, 'coupon'])->name('coupon');
    Route::get('/wallet-details', [UserDashboardController::class, 'walletdetails'])->name('walletdetails');
    Route::get('/user-profile-detail', [UserDashboardController::class, 'userprofiledetail'])->name('userprofiledetail');



    Route::get('/feedback', [FeedbackController::class, 'userFeedback'])->name('userFeedback');
    Route::post('/send-feedback', [FeedbackController::class, 'sendFeedback'])->name('sendFeedback');

    Route::get('/verification_form/{id}', [VerificationController::class, 'showForm'])->name('verification_form');
    Route::get('/documents/otp/verification', [VerificationController::class, 'documnetsOtp'])->name('documentsOtp');

    Route::post('/document-access-verify', [VerificationController::class, 'verifyDocumentOtp'])->name('verifyDocumentOtp');
    Route::get('/reviwes', [VerificationController::class, 'reviwes'])->name('reviwes');
    Route::post('/verification/store', [VerificationController::class, 'store'])->name('verification.store');
    Route::post('/verification/verify', [VerificationController::class, 'verifyCode'])->name('verification.verify');
    Route::get('/ads', [AdvertiseController::class, 'allAds'])->name('allAds');

    Route::get('/group-members', [InstituteController::class, 'showGroupMembers'])->name('group.members');
    Route::get('/group-user-details/{id}', [InstituteController::class, 'showGroupUserDetails'])->name('group.user.details');
    Route::get('/group-user-time-slots/{id}', [TimeSlotController::class, 'getGroupUserTimeSlots'])->name('group.user.timeSlot');
    Route::post('/group-user-time-slots/{id}', [TimeSlotController::class, 'storeGroupUserTimeSlot'])->name('store.group.user.timeSlot');

    // Routes for managing group members
    Route::group(['prefix' => 'group', 'as' => 'group.'], function () {

        Route::get('/member/{id}/edit', [InstituteController::class, 'editMember'])->name('user.edit');
        Route::post('/member/{id}/update', [InstituteController::class, 'updateMember'])->name('updateMember');
        Route::post('/member/profile-pic/upload', [InstituteController::class, 'uploadMemberProfilePic'])->name('uploadMemberProfilePic');

        // Remove Member Profile
        Route::delete('/member/{id}/remove', [InstituteController::class, 'removeMember'])->name('user.remove');
    });
    
    Route::get('/plans/{feature}', [PlanController::class, 'showPlansByFeature'])->name('plans.byFeature');

    Route::get('/sms-plan/{feature}', [PlanController::class, 'paidSmsPlan'])->name('sms.byFeature');
    // ********************************************************************************** these are paid too
    // routes/web.php
    Route::get('/create-group-members', [InstituteController::class, 'createGroupmember'])->name('createGroupmember');
    Route::post('/store-group-member', [InstituteController::class, 'storeGroupMember'])->name('storeGroupMember');
    Route::get('/group-member-booking-details/{booking_id}', [InstituteController::class, 'showGroupmemberbookingDetails'])->name('showGroupmemberbookingDetails');

    Route::post('/booking/{id}/accept', [InstituteController::class, 'accept'])->name('booking.accept');
    Route::post('/booking/{id}/cancel', [InstituteController::class, 'cancel'])->name('booking.cancel');
    // Route for showing plans based on the feature

    Route::get('/create/ads', [AdvertiseController::class, 'createAds'])->name('createAds');
    Route::post('/advertise', [AdvertiseController::class, 'store'])->name('advertise.store');
    // Route::post('/advertise-with-image', [AdvertiseController::class, 'storeWithImage'])->name('advertise.storeWithImage');
    Route::post('/advertise/checkout', [AdvertiseController::class, 'checkout'])->name('advertise.checkout');
    Route::get('/advertise/store-after-payment', [AdvertiseController::class, 'storeAfterPayment'])->name('advertise.storeAfterPayment');
    Route::get('/job-posting', [JobPostController::class, 'jobPost'])->name('jobPost');
    Route::post('/job-posts', [JobPostController::class, 'store'])->name('jobPosts.store');
    Route::get('/view-jobs', [JobPostController::class, 'jobList'])->name('jobList');
    Route::get('/job-post/{id}/edit', [JobPostController::class, 'edit'])->name('jobPosts.edit');
    Route::delete('/job-post/{id}', [JobPostController::class, 'destroy'])->name('jobPosts.destroy');
    Route::put('/jobs/{id}', [JobPostController::class, 'update'])->name('jobs.update');
    Route::get('/fax', [FaxController::class, 'index'])->name('fax.index');

    // **********************************************************************************
    Route::get('/booster', [AdvertiseController::class, 'accountBoost'])->name('accountBoost');
    Route::post('/booster-request', [AdvertiseController::class, 'boostRequest'])->name('boost.request');
    Route::get('/boost/store-after-payment', [AdvertiseController::class, 'boostStoreAfterPayment'])->name('boost.storeAfterPayment'); // Add this route
    // Paid services
    Route::middleware(['verify.user'])->group(function () {



        // Route::get('/website', [AdvertiseController::class, 'userWebsite'])->name('userWebsite');
        // Route::get('/news', [AdvertiseController::class, 'newsPortal'])->name('newsPortal');

        Route::get('/email/{feature}', [AdvertiseController::class, 'bulkEmail'])->name('bulkEmail');


        Route::get('/chat/{feature}', [MessageController::class, 'userChat'])->name('userChat');
        Route::get('/load-chat-history/{contact_id}', 'MessageController@loadChatHistory')->name('load-chat-history');
        Route::post('/send-message/{feature}', [MessageController::class, 'sendMessage'])->name('send.message');
        Route::get('/chat/{userId}/{feature}', [MessageController::class, 'chatFriends'])->name('match.details');


        Route::post('/send-emails/{feature}', [UserDashboardController::class, 'sendEmails'])->name('userdashboard.sendEmails');
    });
    Route::middleware(['sms'])->group(function () {
    Route::get('sms-settings', [AdvertiseController::class, 'userSms'])->name('userSms');
    });
    Route::middleware(['Events'])->group(function () {
        Route::get('/events', [MemberEventController::class, 'memberEvent'])->name('memberEvent');
    });
    Route::middleware(['BookShare'])->group(function () {
        Route::get('/read-book/{id}', [BookController::class, 'show'])->name('showbookspage');
    });
    Route::middleware(['myweb'])->group(function () {
        // Mini web
        Route::get('/admin/home-page', [PersonalController::class, 'index'])->name('admin.home-page');
        Route::post('/admin/home-page/update/', [PersonalController::class, 'storeOrUpdate'])->name('storeOrUpdate.setting');


        //========== Blog Routes =================
        Route::get('admin/blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::get('admin/blog', [BlogController::class, 'index'])->name('blog.list');
        Route::post('admin/blog/save', [BlogController::class, 'save'])->name('blog.save');
        Route::get('admin/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
        Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('admin/blog/update', [BlogController::class, 'update'])->name('blog.update');

        // ============ Personal Update ==========
        Route::get('admin/personal-details', [AdminController::class, 'index'])->name('personal.details');

        //================ Website Setting =====================
        Route::get('admin/website/settings/', [SettingController::class, 'index'])->name('admin.setting');
        Route::post('admin/website/settings/update', [SettingController::class, 'update'])->name('update.setting');

        // ================= Contact Message =================
        Route::get('/admin/contact/message', [AdminController::class, 'message'])->name('contact.message');
        Route::get('/admin/delete/message/{id}', [AdminController::class, 'messageDelete'])->name('contact.message.delete');


        //Route::post('admin/website/settings/update', [SettingController::class, 'update'])->name('update.setting');

        Route::get('update-socials-links', [SocialMediaLinksController::class, 'index'])->name('update-socials-links');
        Route::post('update-socials-save', [SocialMediaLinksController::class, 'store'])->name('update-socials-save');

        Route::post('ckeditor-upload', [AdminController::class, 'ckeditorUpload'])->name('ckeditor.upload');
        // Route::post('/summernote/upload', [AdminController::class, 'summernoteUpload'])->name('summernote.upload');


        // Route::resource('new-page', NewPageController::class);
        // Route::resource('socials',SocialController::class);
        Route::resource('admin-slider', SliderController::class);
        Route::resource('admin-work', WorkTimeController::class);
        Route::resource('admin-services', ServiceController::class);
        Route::resource('admin-section', SectionController::class);
        
        Route::post('admin-slider/update', [SliderController::class, 'update'])->name('admin-slider.update');
        Route::post('admin-services/update', [ServiceController::class, 'update'])->name('admin-services.update');
        Route::post('admin-work/update', [WorkTimeController::class, 'update'])->name('admin-work.update');

        // Latest Routes
        Route::get('admin/slider/update', [MiniHomeController::class, 'sliderUpdate'])->name('admin.slider.update');
        Route::get('admin/about/update', [MiniHomeController::class, 'aboutUpdate'])->name('admin.about.update');
        Route::get('admin/work/update', [MiniHomeController::class, 'workUpdate'])->name('admin.work.update');
        Route::get('admin/service/update', [MiniHomeController::class, 'serviceUpdate'])->name('admin.service.update');
        Route::get('admin/blog/update', [MiniHomeController::class, 'blogUpdate'])->name('admin.blog.update');
        Route::get('admin/contact/update', [MiniHomeController::class, 'contactUpdate'])->name('admin.contact.update');
    });

    Route::middleware(['MyNetwork'])->group(function () {
        Route::get('/add-friends/{userId}', [FriendController::class, 'addFriends'])->name('addFriends');
        Route::get('/blockuser/{userId}', [FriendController::class, 'blockUsers'])->name('blockUsers');
        Route::get('/block-lists', [FriendController::class, 'blockList'])->name('blockList');
        Route::get('/friends-connection/{friendId}/{status}', [FriendController::class, 'friendshipAction'])->name('friendshipAction');
        Route::get('/friends-lists', [FriendController::class, 'friendsList'])->name('friendsList');
        Route::get('/blockfriend/{friendId}/{status}', [FriendController::class, 'unBlock'])->name('unBlock');
        Route::get('/pending-requests', [FriendController::class, 'pendingList'])->name('pendingList');
        Route::get('/best-friends', [FriendController::class, 'bestFriends'])->name('bestFriends');
    });

    Route::middleware(['MedicalNews'])->group(function () {
        Route::get('/medical-news', [ScraperController::class, 'scrape'])->name('medical.news');
        Route::get('/{lang}', [ScraperController::class, 'scrape']);
        Route::get('/news/{link}', [ScraperController::class, 'detailsScrape']);
    });
    // Medical News Routes 

    // Route::post('/verification/requestOtp', [VerificationController::class, 'requestOtp'])->name('verification.requestOtp');
    // Route::post('/verification/verifyOtp', [VerificationController::class, 'verifyOtp'])->name('verification.verifyOtp');


//survey




});

// Routes for admin  
Route::middleware(['auth', 'role:admin', 'suspicious'])->prefix('admin')->group(function () {
    Route::middleware(['auth', '2fa'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
    // Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('features', FeatureController::class);
    Route::get('/admin/send-email', [EmailController::class, 'showForm'])->name('admin.send-email');
    Route::post('/admin/send-email', [EmailController::class, 'sendEmail'])->name('admin.send-email.post');
    Route::get('/admin/upload', [AdminDashboardController::class, 'showUploadForm'])->name('admin.upload');
    Route::post('/admin/upload', [AdminDashboardController::class, 'uploadCsv'])->name('admin.upload.csv');
    Route::get('/sliders', [AdminDashboardController::class, 'sliders'])->name('sliders');
    Route::post('/add-banner', [AdminDashboardController::class, 'addBanner'])->name('add.banner');
    Route::get('/banners', [AdminDashboardController::class, 'banners'])->name('banners');
    Route::post('/add-site-banner', [AdminDashboardController::class, 'addSiteBanners'])->name('add.addSiteBanners');
    Route::get('/faqs', [AdminDashboardController::class, 'faqsAdmin'])->name('faqsAdmin');
    Route::post('/faqs-store', [AdminDashboardController::class, 'faqStore'])->name('faq.store');
    Route::patch('/faqs/{id}', [AdminDashboardController::class, 'faqUpdate'])->name('faqs.edit');
    Route::delete('/faqs/{id}', [AdminDashboardController::class, 'faqDestroy'])->name('faqs.destroy');
    Route::delete('/sliders/{id}', [AdminDashboardController::class, 'deleteSlider'])->name('delete.slider');
    Route::get('/translations', [AdminDashboardController::class, 'trnaslationView'])->name('trnaslationView');
    Route::get('/translate', [AdminDashboardController::class, 'addTranslation'])->name('addTranslation');
    Route::post('save-translations', [AdminDashboardController::class, 'saveTranslations'])->name('saveTranslations');
    Route::get('trans-language-list', [TranslationController::class, 'transLanguageList'])->name('transLanguageList');
    Route::patch('/updateTranslationStatus/{id}', [TranslationController::class, 'updateTranslationStatus'])->name('updateTranslationStatus');
    Route::post('update-translation', [TranslationController::class, 'updateTranslation'])->name('update.translation');
    Route::delete('remove-translation', [TranslationController::class, 'removeTranslation'])->name('remove.translation');
    Route::get('/necessary-link', [NecessaryCategoryController::class, 'AdminNecessaryLink'])->name('AdminNecessaryLink');
    Route::get('/necessary-categories-list', [NecessaryCategoryController::class, 'necessaryCategorylist'])->name('necessaryCategorylist');
    Route::post('/categories', [NecessaryCategoryController::class, 'store'])->name('categories.store');
    Route::post('/necessary-urls/store', [NecessaryCategoryController::class, 'storeNecessaryUrl'])->name('necessary-urls.store');
    Route::get('/necessary-info-admin', [NecessaryCategoryController::class, 'sponseredDetailsAdmin'])->name('sponseredDetailsAdmin');
    Route::get('/necessary-urls/{id}/edit', [NecessaryCategoryController::class, 'edit'])->name('necessary-urls.edit');
    Route::put('/necessary-urls/{id}', [NecessaryCategoryController::class, 'update'])->name('necessary-urls.update');
    Route::delete('/necessary-urls/{id}', [NecessaryCategoryController::class, 'destroy'])->name('necessary-urls.destroy');

    Route::put('/necessary-cate', [NecessaryCategoryController::class, 'necessaryCatupdate'])->name('necessary-cate.update');
    Route::delete('/necessary-cate/{id}', [NecessaryCategoryController::class, 'cateDestroy'])->name('cateDestroy');


    Route::get('/specialties', [SpecialtyController::class, 'index'])->name('specialties.index');
    Route::post('/specialties', [SpecialtyController::class, 'store'])->name('specialties.store');
    Route::put('/specialties', [SpecialtyController::class, 'update'])->name('specialties.update');
    Route::delete('/specialties/{id}', [SpecialtyController::class, 'destroy'])->name('specialties.destroy');

    Route::get('/expertises', [ExpertiseController::class, 'index'])->name('expertises.index');
    Route::post('/expertises', [ExpertiseController::class, 'store'])->name('expertises.store');
    Route::put('/expertises', [ExpertiseController::class, 'update'])->name('expertises.update');
    Route::delete('/expertises/{id}', [ExpertiseController::class, 'destroy'])->name('expertises.destroy');
    Route::get('partners', [PartnerController::class, 'index'])->name('partners.index');
    Route::post('add/partners', [PartnerController::class, 'addPartner'])->name('addPartner');
    Route::put('partners', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');

    Route::get('/web-contents', [WebContentController::class, 'show'])->name('web-content.show');
    Route::post('/admin/web-images', [WebContentController::class, 'store'])->name('web-images.store');
    Route::get('/admin/web-images/{webImage}/edit', [WebContentController::class, 'edit'])->name('web-images.edit');
    Route::put('/admin/web-images/{webImage}', [WebContentController::class, 'update'])->name('web-images.update');
    Route::delete('/admin/web-images/{webImage}', [WebContentController::class, 'destroy'])->name('web-images.destroy');
    Route::get('/web-content/edit', [WebContentController::class, 'webContenPageEdit'])->name('web-content.edit');
    Route::post('/web-contents', [WebContentController::class, 'webContenPageUpdate'])->name('web-content.update');
    Route::post('/manual-account', [AdminDashboardController::class, 'createManualAccount'])->name('createManualAccount');
    Route::resource('member-titles', MemberTitleController::class);


    Route::get('/admin-feedback', [FeedbackController::class, 'index'])->name(name: 'admin.feedback');
    Route::get('/admin-feedback/{id}/read', [FeedbackController::class, 'updateIsRead'])->name('admin.feedback.read');
    Route::delete('/admin-feedback/{id}', [FeedbackController::class, 'deleteFeedback'])->name('admin.feedback.delete');
    Route::get('/admin-event', [MemberEventController::class, 'memberEventAdmin'])->name('memberEventAdmin');
    Route::get('events/create', [MemberEventController::class, 'create'])->name('events.create');
    Route::post('events/store', [MemberEventController::class, 'addEvents'])->name('addEvents');
    Route::get('/admin-list', [MemberEventController::class, 'memberEventAdminList'])->name('memberEventAdminList');
    Route::delete('/admin-event/{id}', [MemberEventController::class, 'deleteEvent'])->name('admin.event.delete');

    Route::get('/admin-plans', [AdminDashboardController::class, 'AdminPlans'])->name('AdminPlans');
    Route::get('/add-plans', [AdminDashboardController::class, 'addPlans'])->name('addPlans');
    Route::get('/edit-plan/{id}', [AdminDashboardController::class, 'editPlan'])->name('editPlan');
    Route::post('/update-plan', [AdminDashboardController::class, 'updatePlans'])->name('updatePlans');
    Route::get('/remove-plan/{id}', [AdminDashboardController::class, 'removePlan'])->name('removePlan');
    Route::post('/add-subs', [AdminDashboardController::class, 'addSub'])->name('addSub');
    Route::get('/verification-requests', [VerificationController::class, 'verificationRequestsAdmin'])->name('verification.requests.admin');
    Route::delete('/verification-deny/{id}', [VerificationController::class, 'deny'])->name('verification.deny');
    Route::get('/verification/{id}', [VerificationController::class, 'show'])->name('verification.show');
    Route::post('/verification/approve/{id}', [VerificationController::class, 'approve'])->name('verification.approve');
    Route::get('/admin/approved-list', [VerificationController::class, 'approvedList'])->name('admin.approved.list');
    Route::get('/admin/ads-list', [AdvertiseController::class, 'adsRequestsAdmin'])->name('adsList');
    Route::get('/admin/ads-approved', [AdvertiseController::class, 'adsApproved'])->name('ads.approved');
    Route::get('/admin/ads/{id}', [AdvertiseController::class, 'show'])->name('ads.show');
    Route::post('/admin/ads/deny', [AdvertiseController::class, 'cancelledAds'])->name('cancelledAds');
    Route::post('/admin/ads/approve', [AdvertiseController::class, 'approve'])->name('ads.approve');
    Route::get('/admin/ads-plan-list', [AdvertiseController::class, 'adsPlanlist'])->name('adsPlanlist');
    Route::post('/update-ads-plan', [AdvertiseController::class, 'updateAdsPlan'])->name('update.ads.plan');
    Route::post('/admin/ads-plan/store', [AdvertiseController::class, 'storeAdsPlan'])->name('store.ads.plan');


    Route::prefix('admin/job-categories')->name('jobCategories.')->group(function () {
        Route::get('/', [JobPostController::class, 'indexCategories'])->name('index'); // List categories
        Route::get('/create', [JobPostController::class, 'createCategory'])->name('create'); // Show form to add a category
        Route::post('/', [JobPostController::class, 'storeCategory'])->name('store'); // Store new category
        Route::get('/{id}/edit', [JobPostController::class, 'editCategory'])->name('edit'); // Show form to edit a category
        Route::put('/{id}', [JobPostController::class, 'updateCategory'])->name('update'); // Update category
        Route::delete('/{id}', [JobPostController::class, 'deleteCategory'])->name('delete'); // Delete category
    });
    Route::get('/admin/web-content/manage', [PageContentController::class, 'contentList'])->name('contentList');

    Route::get('/admin/web-content/manage/create', [PageContentController::class, 'create'])->name('pages.content.create');
    Route::post('/admin/web-content/manage', [PageContentController::class, 'store'])->name('pages.content.store');
    Route::get('/admin/web-content/manage/{id}/edit', [PageContentController::class, 'edit'])->name('pages.content.edit');
    Route::put('/admin/web-content/manage/{id}', [PageContentController::class, 'update'])->name('pages.content.update');
    Route::get('/admin/page-content/search', [PageContentController::class, 'search'])->name('pages.content.search');
    Route::resource('health_tip_details', HealthTipController::class);
    //account boositng
    // Route to display boost requests
    Route::get('/admin/boost-requests', [AdvertiseController::class, 'showBoostRequests'])->name('boost.requests');

    // Route to approve a boost request
    Route::post('/admin/boost-requests/approve', [AdvertiseController::class, 'approveBoostRequest'])->name('boost.approve');
    // Route to deny a boost request
    Route::post('/admin/boost-requests/deny', [AdvertiseController::class, 'denyBoostRequest'])->name('boost.deny');


    Route::prefix('list')->group(function () {
        Route::resource('institutes', InstituteController::class);
    });

    Route::get('institutes/{id}/add-users', [InstituteController::class, 'addUsers'])->name('institutes.addUsers');
    Route::post('institutes/{id}/add-user/{userId}', [InstituteController::class, 'addUserToInstitute'])->name('institutes.addUserToInstitute');
    Route::get('institutes/{id}/members', [InstituteController::class, 'members'])->name('institutes.members');
    Route::patch('institutes/{institute_id}/remove-user/{user_id}', [InstituteController::class, 'removeUser'])->name('institutes.removeUser');
    Route::resource('books', BookController::class);
    Route::resource('/book-categories', BookCategoryController::class);
    Route::resource('survey', SurveyController::class);
    Route::resource('/survey_categories', SurveyCategoryController::class);
});

Route::middleware(['auth', 'role:patient', 'suspicious'])->group(function () {
    Route::get('/patients/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');

    Route::get('/patients/profile', [PatientController::class, 'patientProfile'])->name('patientProfile');
    Route::post('/patients/upload-profile-pic', [PatientController::class, 'uploadProfilePatientPic'])->name('uploadProfilePatientPic');
    Route::post('/patients/updatePatientProfile', [PatientController::class, 'updatePatientProfile'])->name('updatePatientProfile');
    Route::get('/patients/get-patients-pending-bookings', [PatientController::class, 'getPatientsPendingBookings'])->name('getPatientsPendingBookings');
    Route::get('/patients/booking-history', [PatientController::class, 'patientsBookingHistory'])->name('patientsBookingHistory');
    Route::get('/patients/get-bookings-history', [PatientController::class, 'getPatientBookingHistory'])->name('getPatientBookingHistory');
    Route::post('/booking/cancelled-by-patient', [PatientController::class, 'bookingCancelledByPatient'])->name('bookingCancelledBypatient');
    Route::post('/add-favorite-doctor', [PatientController::class, 'addFavoriteDoctor'])->name('addfavdoctor');
    Route::get('/patients/favorite-members', [PatientController::class, 'listFavoriteDoctor'])->name('listFavoriteDoctor');
    Route::get('/doctor-availability/{doctor_id}', [PatientController::class, 'doctorAvailability'])->name('doctorAvailability');
    Route::get('/patients/health-tips', [HealthTipController::class, 'showHealthTips'])->name('healthTips');
    Route::get('/patients/health-tips-details', [HealthTipController::class, 'healthTipsDetails'])->name('healthTipsDetails');
    Route::get('/patients/telemedicine', [HealthTipController::class, 'showtelemedicine'])->name('showtelemedicine');
    Route::get('/patients/telemedicine-details', [HealthTipController::class, 'telemedicineDetails'])->name('telemedicineDetails');
    Route::get('/patients/phone-consulation', [HealthTipController::class, 'showPhoneConsultaion'])->name('showPhoneConsultaion');
    Route::get('/patients/phone-consulation-details', [HealthTipController::class, 'showPhoneConsultaionDetails'])->name('showPhoneConsultaionDetails');
    Route::get('/patients/current-bookings', [PatientController::class, 'getBookingsCurrentMonth'])->name('getBookingsCurrentMonth');
    Route::get('/patients/books-sharing', [BookController::class, 'bookspagePatient'])->name('bookspagePatient');
    Route::middleware(['BookShare'])->group(function () {
        Route::get('/patients/read-book/{id}', [BookController::class, 'showBookpatient'])->name('showBookpatient');
    });
});

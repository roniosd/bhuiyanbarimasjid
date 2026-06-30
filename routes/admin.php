<?php

use App\Http\Controllers\admin\ActivitiesController;
use App\Http\Controllers\admin\AdminActivityController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminloginController;
use App\Http\Controllers\admin\AlbumController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CollectorController;
use App\Http\Controllers\admin\CommitteeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DonationBookController;
use App\Http\Controllers\admin\DonerController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\ForgotPasswordController;
use App\Http\Controllers\admin\FundController;
use App\Http\Controllers\admin\ImageGalleryController;
use App\Http\Controllers\admin\LogoutController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\ReceiptController;
use App\Http\Controllers\admin\SessionYearController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\SubscribersController;
use App\Http\Controllers\PdfController;
use App\Models\Media;
use Illuminate\Support\Facades\Route;

// ?Admin Part
// ! Go to login Page
Route::get('/login', [DashboardController::class, 'index'])->name('login');

//! Admin Log in without (middleware)
Route::post('/login', [AdminloginController::class, 'login']);



Route::get('/admin/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('forgot.form');
Route::post('/admin/forgot-password', [ForgotPasswordController::class, 'sendNewPassword'])->name('forgot.send');


Route::middleware(['auth:admin'])->group(function () {

    //! Dashboard Controller..

    Route::get('/adminpanel', [DashboardController::class, 'index'])->name('dashboard');


    //! Setting Controller
    Route::get('/setting', [SettingController::class, 'index'])->name('siteSetting');
    Route::get('/socialSetting', [SettingController::class, 'social'])->name('socialSetting');
    Route::get('/homepageSetting', [SettingController::class, 'homepage'])->name('homepageSetting');
    Route::get('/orgContact', [SettingController::class, 'orgContact'])->name('orgContact');

    // !Add setting
    Route::post('/update', [SettingController::class, 'update']);
    Route::post('/socialUpdate', [SettingController::class, 'socialUpdate']);
    Route::post('/homepageUpdate', [SettingController::class, 'homepageUpdate']);
    Route::post('/orgContactUpdate', [SettingController::class, 'orgContactUpdate']);

    // ! Category Controller
    Route::resource('category', CategoryController::class);

    //! Post Controller
    Route::resource('post', PostController::class);

    // ! Set a cover for album
    Route::get('setCover/{id}', function ($id) {
        $media = Media::find($id);
        $media->album()->update(['cover' => $media->media]);
        return back()->with(['success' => 'Cover Add Successfully']);
    })->name('setCover');
    //! Album Controller
    Route::resource('album', AlbumController::class);

    //! Page Controller
    Route::resource('page', PageController::class);

    //! Media Controller
    Route::resource('media', MediaController::class);

    //! Fund Controller
    Route::resource('fund', FundController::class);

    //! Session Controller
    Route::resource('session', SessionYearController::class);

    //! Committee Controller
    Route::resource('committee', CommitteeController::class);


    //! Collector Controller
    Route::resource('collector', CollectorController::class);

    //! Slider Controller
    Route::resource('slider', SliderController::class);


    //! Parmition Controller
    Route::resource('permission', PermissionController::class);
    Route::get('/donor/find', [ReceiptController::class, 'findDonor']);

    //! Receipt Controller
    Route::resource('receipt', ReceiptController::class);

    //! Donation Book Controller
    Route::resource('donationBook', DonationBookController::class);


    //! Page Controller
    Route::resource('event', EventController::class);


    //! Activity Controller
    Route::resource('allactivity', ActivitiesController::class);

    //! Admin Controller
    Route::resource('adminmanage', AdminController::class);

    //! Member Controller
    Route::resource('member', MemberController::class);

    //! Student Controller
    Route::resource('student', StudentController::class);

    Route::get('/dstd/{id}', [PdfController::class, 'show'])->name('download.student');

    Route::get('/download-member/{id}', [PdfController::class, 'membershow'])->name('download.member');



    //! Member Controller
    Route::resource('menu', MenuController::class);

    //! Subscribers List
    Route::get('subscribers', [SubscribersController::class, 'index'])->name('subscribers');

    //! Doner List
    Route::get('doners', [DonerController::class, 'index'])->name('doners');

    //! Feedback List
    Route::get('feedbacks', [FeedbackController::class, 'index'])->name('feedbacks');
    Route::post('/feedback/{id}/reply', [FeedbackController::class, 'reply'])->name('feedback.reply');
    Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback');


    Route::get('/gallery', [ImageGalleryController::class, 'index'])->name('gallery.all');
    Route::delete('/gallery/{image}', [ImageGalleryController::class, 'destroy'])
        ->where('image', '.*')
        ->name('gallery.delete');

    //! Logout Route
    Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

    Route::get('/activitylog', [AdminActivityController::class, 'index'])->name('activitylog');

});

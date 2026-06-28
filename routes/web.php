<?php
use App\Http\Controllers\front\DetailsPageController;
use App\Http\Controllers\front\FrontPageController;
use App\Http\Controllers\front\GetdataController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


//* Provides all necessary database data to the frontend through AppServiceProvider
//! _______________________________________________
Route::get('/storage-link', function () {
    $target = storage_path('app/public');
    $link = $_SERVER['DOCUMENT_ROOT'] . '/public/storage';

    if (!file_exists($link)) {
        symlink($target, $link);
        return "Storage link created successfully!";
    } else {
        return "Storage link already exists.";
    }
});

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');

    return response()->json([
        'success' => true,
        'message' => 'Cache cleared successfully'
    ]);
}); // 🔥 must protect

// !Frontend Roote.....
Route::get('/', [FrontPageController::class, 'index'])->name('homePage');


Route::get('/about/{slug}', [FrontPageController::class, 'about'])->name('aboutDetails');



Route::get('/activity/{slug}', [DetailsPageController::class, 'activity'])->name('activityDetails');


Route::get('/member-registration', [FrontPageController::class, 'member'])->name('member');

Route::get('/admission', [FrontPageController::class, 'admission'])->name('admission');

Route::get('/collector-list', [DetailsPageController::class, 'collector'])->name('collectorlist');


Route::get('/fundlist/{slug}', [DetailsPageController::class, 'fund'])->name('fundDetails');


Route::get('/gallay/{slug}', [DetailsPageController::class, 'photoGallary'])->name('photoGallary');


Route::get('/news/{slug}', [DetailsPageController::class, 'news'])->name('newsDetails');

Route::get('/eventlist/{slug}', [DetailsPageController::class, 'event'])->name('eventDetails');


// !Store all data in database
Route::post('/donation', [GetdataController::class, 'storeDonation']);

Route::post('/subscribe', [GetdataController::class, 'storeSubscribe']);

Route::post('/storeMember', [GetdataController::class, 'storeMember']);

Route::post('/storeStudent', [GetdataController::class, 'storeStudent']);

Route::post('/storeFeedback', [GetdataController::class, 'storeFeedback']);



//Show all page like আরো দেখুন

Route::get('/seemore/{type}', function ($type) {
    $titles = [
        'activity' => 'কার্যক্রম সমূহ',
        'event' => 'অনুষ্ঠানসমূহ',
        'news' => 'খবর',
        'gallery' => 'গ্যালারী',
    ];

    $views = [
        'activity' => 'frontend.views.templates.activity',
        'event' => 'frontend.views.templates.event',
        'news' => 'frontend.views.templates.news',
        'gallery' => 'frontend.views.templates.gallary',
    ];

    if (!array_key_exists($type, $views)) {
        abort(404);
    }

    $pageDetails = (object) ['title' => $titles[$type]];

    return view($views[$type], compact('pageDetails'));
})->name('seemore.type');




// !Show ing Page...
Route::get('/{slug}', [FrontPageController::class, 'show'])->name('page.show');












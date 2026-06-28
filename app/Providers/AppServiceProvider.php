<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\HomepageSetting;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ImageManager::class, function () {
            return new ImageManager(new Driver());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination');

        View::share('setting', Setting::first());
        View::share('homepageSetting', HomepageSetting::first());
        View::share('contact', Contact::first());
    }
}
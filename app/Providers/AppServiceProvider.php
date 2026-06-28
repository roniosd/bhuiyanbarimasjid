<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\HomepageSetting;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
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

        try {

            View::share(
                'setting',
                Cache::rememberForever('setting', function () {
                    return Setting::first();
                })
            );

            View::share(
                'homepageSetting',
                Cache::rememberForever('homepage_setting', function () {
                    return HomepageSetting::first();
                })
            );

            View::share(
                'contact',
                Cache::rememberForever('contact', function () {
                    return Contact::first();
                })
            );

            View::share(
                'menus',
                Cache::rememberForever('menus', function () {
                    return Menu::where('status', 'active')->get();
                })
            );

        } catch (\Throwable $e) {

            report($e);

            View::share('setting', null);
            View::share('homepageSetting', null);
            View::share('contact', null);
            View::share('menus', collect());
        }
    }
}
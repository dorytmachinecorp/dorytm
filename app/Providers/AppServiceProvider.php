<?php

namespace App\Providers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SiteSetting;
use App\Observers\BlogPostObserver;
use App\Observers\CategoryObserver;
use App\Observers\ProductObserver;
use App\Observers\SiteSettingObserver;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Product::observe(ProductObserver::class);
        Category::observe(CategoryObserver::class);
        BlogPost::observe(BlogPostObserver::class);
        SiteSetting::observe(SiteSettingObserver::class);

        // Share global site settings with layout partials
        View::composer(['components.partials.header', 'components.partials.footer'], function ($view) {
            $settings = Cache::rememberForever('global_site_settings', function () {
                return Setting::all()->mapWithKeys(function ($setting) {
                    return [$setting->group.'.'.$setting->key => $setting->value];
                })->toArray();
            });
            $view->with('siteSettings', $settings);
        });
    }
}

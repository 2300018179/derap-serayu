<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\View;

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
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by(
                Str::transliterate(Str::lower($request->string('login')).'|'.$request->ip())
            );
        });

        RateLimiter::for('password-reset', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        ViewFacade::composer('*', function (View $view): void {
            $settings = SiteSetting::currentSettings();

            $view->with('siteSettings', $settings);
            $view->with(
                'siteLogoUrl',
                $settings['logo_path']
                    ? Storage::disk('public')->url($settings['logo_path'])
                    : asset('images/logo.png')
            );
        });
    }
}

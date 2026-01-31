<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

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
        Schema::defaultStringLength(191);

        // Apply timezone setting from database
        $this->applyTimezoneFromSettings();
    }

    /**
     * Apply the timezone setting from database
     */
    protected function applyTimezoneFromSettings(): void
    {
        try {
            // Only run if the settings table exists
            if (Schema::hasTable('settings')) {
                $timezone = Setting::get('timezone', config('app.timezone'));
                
                if ($timezone && in_array($timezone, timezone_identifiers_list())) {
                    Config::set('app.timezone', $timezone);
                    date_default_timezone_set($timezone);
                }
            }
        } catch (\Exception $e) {
            // Silently fail if settings table doesn't exist yet (during migrations)
        }
    }
}

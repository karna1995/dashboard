<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\GoogleCalendar\GoogleCalendarServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $suggested = [
        GoogleCalendarServiceProvider::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        foreach($this->suggested as $serviceProvider) {
            if (class_exists($serviceProvider)) {
                $this->app->register($serviceProvider);
            }
        }
    }
}

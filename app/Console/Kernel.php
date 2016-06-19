<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Components;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Components\GitHub\FetchGitHubFileContent::class,
        Components\GoogleCalendar\FetchGoogleCalendarEvents::class,
        Components\InternetConnectionStatus\SendHeartbeat::class,
        Components\LastFm\FetchCurrentTrack::class,
        Components\Packagist\FetchTotals::class,
        Components\RainForecast\FetchRainForecast::class,
        Components\NewRelic\FetchApplicationHostsHealth::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('dashboard:lastfm')->everyMinute();
        $schedule->command('dashboard:calendar')->everyFiveMinutes();
        $schedule->command('dashboard:github')->everyFiveMinutes();
        $schedule->command('dashboard:heartbeat')->everyMinute();
        $schedule->command('dashboard:packagist')->hourly();
        $schedule->command('dashboard:rain')->everyMinute();
    }
}

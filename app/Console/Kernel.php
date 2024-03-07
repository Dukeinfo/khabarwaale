<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // protected $commands = [
    //     \App\Console\Commands\ProcessQueue::class,
    //     // Add other commands here if needed
    // ];

    protected $commands = [
        // Other commands...
        \App\Console\Commands\ClearLogs::class,
    ];


    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('queue:process')->everyMinute();
        $schedule->command('logs:clear')->weekly();
        $schedule->command('capture:webpage')->dailyAt('20:00');

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

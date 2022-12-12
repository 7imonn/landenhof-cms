<?php

namespace App\Console;

use App\Jobs\GenerateSitemap;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(GenerateSitemap::class)->hourly();

        $schedule->command('horizon:snapshot')->everyFiveMinutes();
        $schedule->command('queue:prune-failed --hours=96')->daily();
        // enable this, if you are using batches (Batches table needs to be published with `php artisan queue:batches-table`)!
        $schedule->command('queue:prune-batches --hours=96 --unfinished=8')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

<?php

namespace App\Console;

use App\Campaign;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\RunCampaignNow::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $campaigns = Campaign::all();
            foreach ($campaigns as $campaign) {
                if ($campaign->autostart_at) {
                    if ( Carbon::parse($campaign->autostart_at)->format('Y-m-d H:i') == Carbon::now()->format('Y-m-d H:i')) {
                        Campaign::runCampaign($campaign->id);
                    } 
                }
            }
        })->everyMinute()
        ->runInBackground();
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

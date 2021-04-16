<?php

namespace App\Console;

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
        'App\Console\Commands\resetCaloriesAlcohol',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('reset:CalAlc')->daily();
        $schedule->call(function() {
            DB::table('users')->update([                
                'groente' => 0,
                'fruit' => 0,
                'brood' => 0,
                'aardappelen' => 0,
                'noten' => 0,
                'melk' => 0,
                'kaas' => 0,
                'vetten' => 0,
            ]);
        })->daily();

        $schedule->call(function() {
            DB::table('users')->update([                
                'vis' => 0,
                'peulvruchten' => 0,
                'vlees' => 0,
                'ei' => 0,
            ]);
        })->weekly();
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

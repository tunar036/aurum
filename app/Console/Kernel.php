<?php

namespace App\Console;

use App\Console\Commands\MakeTrait;
use App\Console\Commands\WorkCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        WorkCommand::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('images:work')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}

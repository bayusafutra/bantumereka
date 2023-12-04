<?php

namespace App\Console;

use App\Models\Donasi;
use App\Models\Program;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;

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
        $schedule->call(function () {
            $donasi = Donasi::where('deadlinePaid', '<=', Carbon::now())->get();
            foreach ($donasi as $don) {
                $swap['status'] = 3;
                $don->update($swap);
            }

            $program = Program::where('deadline', '<=', Carbon::now())->get();
            foreach ($program as $prog) {
                $change['status'] = 5;
                $prog->update($change);
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

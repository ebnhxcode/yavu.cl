<?php

namespace yavu\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use yavu\Http\Controllers\SorteoController;
use yavu\Sorteo;

class Kernel extends ConsoleKernel
{
    private $raffle;
    private $raffleController;

    private function loadVars(SorteoController $raffleController, Sorteo $raffle){
        $this->raffleController = $raffleController;
        $this->raffle = $raffle;
    }

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function(){
            $this->loadVars(SorteoController::class, Sorteo::class);

        })->dailyAt('21:00');


        /*
        $schedule->command('inspire')
                 ->hourly();
        */

    }
}

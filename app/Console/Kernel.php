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

    public function __construct(SorteoController $raffleController, Sorteo $raffle){
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



        })->dailyAt('21:00');


        /*
        $schedule->command('inspire')
                 ->hourly();
        */

    }
}

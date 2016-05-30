<?php

namespace yavu\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use yavu\Http\Controllers\SorteoController;
use yavu\Pop;
use yavu\Sorteo;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    private $day;
    private $month;
    private $year;
    private $raffle;
    private $raffleLists;
    private $raffleController;

    private function checkRafflesToToday(){
        $this->day = strlen(Carbon::now()->day)<2?'0'.Carbon::now()->day:Carbon::now()->day;
        $this->month = strlen(Carbon::now()->month)<2?'0'.Carbon::now()->month:Carbon::now()->month;
        $this->year = Carbon::now()->year;
        return Sorteo::where('fecha_inicio_sorteo', $this->month.'/'.$this->day.'/'.$this->year)->get();
    }

    private function performRaffle($raffleLists){
        foreach ($raffleLists as $raffleList) {
            $this->raffle = new Pop();
            $this->raffle->estado = $raffleList->id.'yes/'.count($raffleLists[0]);
            //$this->raffle->save();

        }
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
            #Verifica los sorteos para el dia
            //$this->raffle = new Pop();
            //$this->raffleLists = $this->checkRafflesToToday();

            #Tengo toda la lista de sorteos para el día en $this->raffleLists[0]
            #$this->raffle->estado=count($this->raffleLists[0]);

            //count($this->raffleLists[0])>0?$this->performRaffle($this->raffleLists[0]):$this->raffle->estado='error';
            //$this->raffle->save();


            #OBJETIVOS
            /*
                -Verificar si hay sorteos que se lancen en el día
                -Definir que por cada sorteo activo se busque a sus ganadores
                -Traer a los ganadores
                -Sortear a los ganadores
                -Registrar ganadores
            */




        })->dailyAt('21:00');//->everyMinute();//->dailyAt('21:00');
        /*$schedule->command('inspire')->hourly();*/
    }
}

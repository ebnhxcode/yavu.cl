<?php

namespace yavu\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use yavu\Http\Controllers\SorteoController;
use yavu\Pop;
use yavu\User;
use yavu\Winner;
use yavu\Sorteo;
use yavu\ParticipanteSorteo;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{

    /*
    private $day;
    private $month;
    private $year;
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
    */

    public function cronjob(){
        $this->day = strlen(Carbon::now()->day)<2?'0'.Carbon::now()->day:Carbon::now()->day;
        $this->month = strlen(Carbon::now()->month)<2?'0'.Carbon::now()->month:Carbon::now()->month;
        $this->year = Carbon::now()->year;
        $raffles = Sorteo::where('fecha_inicio_sorteo', $this->month.'/'.$this->day.'/'.$this->year)->where('estado_sorteo','Activo')->get();
        foreach ($raffles as $raffle){
            //array_push($this->raffleIdListTo, $raffle->id);
            $var = $this->loadRaffleDetails($raffle->id);
            if(count($var)>2){
                $this->registerWinner($var[rand(0,count($var))]);
            }
        }


        #dd($this->raffleIdListTo); #-> Aquí tengo los sorteos que se van a lanzar hoy
        //$var = $this->loadRaffleDetails($this->raffleIdListTo[1]); #le doy a $var el listado de los participantes en un arreglo json
        #dd($var);
        #dd($var[rand(0,count($var))]); #obtengo un random desde el valor 0 hasta el ultimo del arreglo
        //$this->registerWinner($var[rand(0,count($var))]);


    }

    #<DEPENDENCIAS DEL CRON JOB>


    public function loadRaffleDetails($sorteo_id){
        $this->participantes = ParticipanteSorteo::where('sorteo_id', $sorteo_id)->get();
        $OpcionesParticipantes = [];
        foreach($this->participantes as $participante){
            array_push($OpcionesParticipantes, $participante->id);
        }
        return $OpcionesParticipantes;
    }

    public function registerWinner($key){
        $this->sorteado = ParticipanteSorteo::where('id', $key)->first();
        $this->ganador = User::where('id', $this->sorteado->user_id)->get();

        $this->sorteo = Sorteo::find($this->sorteado->sorteo_id);
        $this->sorteo->estado_sorteo = 2;
        $this->sorteo->save();

        if($this->ganador[0]) {
            $this->registrar_ganador = new Winner(['user_id' => $this->sorteado->user_id, 'sorteo_id' => $this->sorteado->sorteo_id, 'participante_sorteo_id' => $key, 'nombre' => $this->ganador[0]->nombre, 'apellido' => $this->ganador[0]->apellido]);
            $this->registrar_ganador->save();

            $this->pop = new Pop(['user_id' => $this->sorteado->user_id, 'empresa_id' => 1, 'tipo' => 'coins', 'estado' => 'pendiente', 'contenido' => 'Haz sido el ganador del sorteo ' . $this->sorteo->nombre_sorteo . '!', 'created_at' => strftime("%Y-%m-%d-%H-%M-%S", time()), 'updated_at' => strftime("%Y-%m-%d-%H-%M-%S", time())]);
            $this->pop->save();
        }





    }



    #</DEPENDENCIAS DEL CRON JOB>





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

            //$this->cronjob();



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
                -Notificar a los ganadores (personalizar esta notificacion)
                -Enviar Mail a los ganadores
            */




        })->everyMinute();//->dailyAt('21:00');
        /*$schedule->command('inspire')->hourly();*/
    }
}

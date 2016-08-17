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

class Kernel extends ConsoleKernel{

	public function cronjob(){
		$this->day = strlen(Carbon::now()->day)<2?'0'.Carbon::now()->day:Carbon::now()->day;
		$this->month = strlen(Carbon::now()->month)<2?'0'.Carbon::now()->month:Carbon::now()->month;
		$this->year = Carbon::now()->year;
		$raffles = Sorteo::where('fecha_inicio_sorteo', $this->month.'/'.$this->day.'/'.$this->year)->where('estado_sorteo','Activo')->get(
			);
					
		foreach ($raffles as $raffle){
			$this->registerWinner($raffle->participant_to_win_id[0]->id );
		}

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
	protected function schedule(Schedule $schedule){
		$schedule->call(function(){
			$this->cronjob();
			#OBJETIVOS
			#-Enviar Mail a los ganadores
		})->dailyAt('21:00');#->weekly()
		  #->tuesdays()
		  #->at('15:44');//->everyMinute();//->dailyAt('21:00');
		/*$schedule->command('inspire')->hourly();*/
	}
}

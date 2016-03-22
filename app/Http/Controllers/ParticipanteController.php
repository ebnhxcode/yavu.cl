<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use DB;
class ParticipanteController extends Controller
{
		public function index()
		{
				
		}
		public function create()
		{
				
		}
		public function ContarParticipantes($sorteo_id)
		{

				$participantes = DB::table('participante_sorteos')
					->select(DB::raw('count(sorteo_id) as opciones, count(distinct user_id) as participantes'))
					->where('sorteo_id', '=', $sorteo_id)   
					->groupBy('sorteo_id')
					->get();   
				return response()->json(
						$participantes
				);        
		}
		public function store(Request $request)
		{
				
		}
		public function show($id)
		{
				
		}
		public function edit($id)
		{
				
		}
		public function update(Request $request, $id)
		{
				
		}
		public function destroy($id)
		{
				
		}
}

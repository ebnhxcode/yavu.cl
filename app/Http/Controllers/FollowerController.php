<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use yavu\Follower;
class FollowerController extends Controller{
  public function index(){
  }
  public function create(){
  }
  public function ContarSeguidores($empresa_id){
    $followers = DB::table('followers')
      ->select(DB::raw('sum(user_id) as follow'))
      ->where('empresa_id', '=', $empresa_id)
      ->where('estado', '=', 'activo')
      ->groupBy('user_id')
      ->get();    
    return response()->json(
      $followers
    );  
  }
  public function store(Request $request){
  }
  public function SeguirEmpresa($empresa_id, $user_id){
    $ExisteSeguimiento = Follower::where('user_id', $user_id)->where('empresa_id', $empresa_id)->first();
    if ($ExisteSeguimiento){
      DB::table('followers')
        ->where('user_id', $user_id)
        ->where('empresa_id', $empresa_id)
        ->update(['estado' => 'activo']);
    }else{
      DB::table('followers')->insert(
        ['user_id' => $user_id, 
        'empresa_id' => $empresa_id,
        'estado' => 'activo',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()]);             
    }
    return response()->json(
      'Estado: Siguiendo'
    );
  }
  public function NoSeguirEmpresa($empresa_id, $user_id){
    DB::table('followers')
      ->where('user_id', $user_id)
      ->where('empresa_id', $empresa_id)
      ->update(['estado' => 'inactivo']);
    return response()->json(
      'Estado: Se dejo de seguir'
    );
  }    
  public function show($id){
  }
  public function edit($id){
  }
  public function update(Request $request, $id){
  }
  public function VerificarSeguidores($empresa_id, $user_id){
    $follow = DB::table('followers')
      ->select(DB::raw('count(user_id) as follow'))
      ->where('empresa_id', '=', $empresa_id)
      ->where('user_id', '=', $user_id)   
      ->where('estado', '=', 'activo')
      ->groupBy('user_id')
      ->get();        
    return response()->json(
      $follow
    );     
  }    
  public function destroy($id){
  }
}

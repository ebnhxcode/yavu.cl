<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use yavu\Follower;
use yavu\Empresa;
use yavu\User;
class FollowerController extends Controller{
  public function __construct(){
    if(Auth::user()->check()){
      $this->user = User::findOrFail(Auth::user()->get()->id);
    }
  }

  public function create(){
  }

  public function ContarSeguidores($empresa_id){
    if(isset($empresa_id) && isset($this->user)){

      $empresa_id = addslashes($empresa_id);

      /*
      $this->empresas = Empresa::where('user_id', $this->user->id)->where('id', $empresa_id)->get();
      foreach($this->empresas as $this->empresa){
        dd($this->empresa->followers()->get());
      }
      */

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
    return response()->json('Acceso denegado');
  }
  public function destroy($id){
  }
  public function edit($id){
  }
  public function index(){
  }
  public function NoSeguirEmpresa($empresa_id, $user_id){
    if(isset($empresa_id) && isset($user_id) && Auth::user()->check()) {
      $empresa_id = addslashes($empresa_id);
      $user_id = addslashes($user_id);
      if(Auth::user()->get()->id == $user_id){
        DB::table('followers')
          ->where('user_id', $user_id)
          ->where('empresa_id', $empresa_id)
          ->update(['estado' => 'inactivo']);
        return response()->json(
          'Estado: Se dejo de seguir'
        );
      }
    }
    return response()->json('Acceso denegado');
  }
  public function SeguirEmpresa($empresa_id, $user_id){
    if(isset($empresa_id) && isset($user_id) && Auth::user()->check()){
      $empresa_id = addslashes($empresa_id);
      $user_id = addslashes($user_id);
      if(Auth::user()->get()->id == $user_id){
        $ExisteSeguimiento = Follower::where('user_id', $user_id)->where('empresa_id', $empresa_id)->first();
        if ($ExisteSeguimiento){
          DB::table('followers')->where('user_id', $user_id)->where('empresa_id', $empresa_id)->update(['estado' => 'activo']);
        }else{
          DB::table('followers')->insert(['user_id' => $user_id,'empresa_id' => $empresa_id,'estado' => 'activo','created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        }
        return response()->json(
          'Estado: Siguiendo'
        );
      }
    }
    return response()->json('Acceso denegado');
  }
  public function show($id){
  }
  public function store(Request $request){
  }
  public function update(Request $request, $id){
  }
  public function VerificarSeguidores($empresa_id, $user_id){
    if(isset($empresa_id) && isset($user_id) && Auth::user()->check()){
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
    return response()->json('Acceso denegado');
  }
}

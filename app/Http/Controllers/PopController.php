<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\RegistroCoin;
use Auth;
use Illuminate\Routing\Route;
use DB;
class PopController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function find(Route $route){
    $this->pop = Pop::find($route->getParameter('pops'));
    //return $this->user;
  }
  public function index(){
    return view('pops.index');
  }
  public function CargarPops($idUltima, $user_id, $tipo){
    if($tipo == 'todas'){
      if((int) $idUltima == "0"){
        $pops = DB::table('pops')
          ->join('empresas'  , 'empresas.id', '=', 'pops.empresa_id')
          ->join('users'  , 'users.id', '=', 'pops.user_id')
          ->select('pops.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa', 'users.nombre as nombreUsu', 'users.imagen_perfil as imagen_perfil_usuario')
          ->where('pops.id', '>', (int) $idUltima)
          ->where('pops.user_id', '=', $user_id)
          ->orderBy('pops.created_at','desc')
          ->limit('20')
          ->get();
      }elseif((int) $idUltima <> "0"){
        $pops = DB::table('pops')
          ->join('empresas'  , 'empresas.id', '=', 'pops.empresa_id')
          ->join('users'  , 'users.id', '=', 'pops.user_id')
          ->select('pops.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa', 'users.nombre as nombreUsu', 'users.imagen_perfil as imagen_perfil_usuario')
          ->where('pops.id', '<', (int) $idUltima)
          ->where('pops.user_id', '=', $user_id)
          ->orderBy('pops.created_at','desc')
          ->limit('20')
          ->get();
      }
      if(!$pops){
        if ((int) $idUltima == "0"){
          $pops = DB::table('pops')
            ->join('users'  , 'users.id', '=', 'pops.user_id')
            ->select('pops.*', 'users.nombre as nombreUsu', 'users.imagen_perfil as imagen_perfil_usuario')
            ->where('pops.id', '>', (int) $idUltima)
            ->where('pops.user_id', '=', $user_id)
            ->orderBy('pops.created_at','desc')
            ->limit('20')
            ->get();
        }elseif((int) $idUltima <> "0"){
          $pops = DB::table('pops')
            ->join('users'  , 'users.id', '=', 'pops.user_id')
            ->select('pops.*', 'users.nombre as nombreUsu', 'users.imagen_perfil as imagen_perfil_usuario')
            ->where('pops.id', '<', (int) $idUltima)
            ->where('pops.user_id', '=', $user_id)
            ->orderBy('pops.created_at','desc')
            ->limit('20')
            ->get();
        }
      }
      $this->MarcarVistas($user_id);
    }elseif ($tipo == 'novistas') {
        //hacer un select count y retornar el numero directamente
      if((int) $idUltima == "0"){
        $pops = DB::table('pops')
          ->where('estado', 'pendiente')
          ->where('user_id', $user_id)
          ->where('id', '>', (int) $idUltima)
          ->count('estado');
      }elseif((int) $idUltima <> "0"){
        $pops = DB::table('pops')
          ->where('estado', 'pendiente')
          ->where('user_id', $user_id)
          ->where('id', '<', (int) $idUltima)
          ->count('estado');
      }
    }
    return response()->json(
        $pops
    );
  }
  public function MarcarVistas($user_id){
    if(isset($user_id)){
      $user_id = addslashes($user_id);
      if(DB::table('pops')->where('user_id', $user_id)->update(['estado' => 'visto'])){
        return response()->json('Visto');
      }
    }
    return response()->json('Acceso denegado');
  }
  public function create(){
  }
  public function store(Request $request){
  }
  public function show($id){
  }
  public function edit($id){
  }
  public function update(Request $request, $id){
  }
  public function destroy($id){
    }
}

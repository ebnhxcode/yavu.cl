<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\FeedCreateRequest;
use yavu\Http\Requests\FeedUpdateRequest;
use Session;
use Redirect;
use yavu\Feed;
use yavu\EstadoEmpresa;
use Auth;
use Illuminate\Routing\Route;
use DB;
class FeedController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }

  public function CargarFeeds($idUltima){
    if(isset($idUltima) && Auth::user()->check()){
      $idUltima = addslashes($idUltima);

      if((int) $idUltima == "0"){
        $feeds = DB::table('estado_empresas')
          ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
          ->select('estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa')
          ->where('estado_empresas.id', '>', (int) $idUltima)
          ->orderBy('estado_empresas.created_at','desc')
          ->limit('10')
          ->get();

      }elseif((int) $idUltima <> "0"){
        $feeds = DB::table('estado_empresas')
          ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
          ->select('estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa')
          ->where('estado_empresas.id', '<', (int) $idUltima)
          ->orderBy('estado_empresas.created_at','desc')
          ->limit('10')
          ->get();
      }
      return response()->json($feeds);
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function CargarFeedsEmpresa($idUltima, $empresa){
    return Redirect::to('/');
    return 'Cargar feeds empresa';
  }
  public function create(){
    return Redirect::to('/');
  }
  public function destroy($id){
    return response()->json(["Mensaje: " => "Acceso denegado"]);
    if(isset($this->feed)){
      $this->feed->delete();
      Session::flash('message', 'Feed eliminado correctamente');
      return Redirect::to('/feeds');
    }
  }
  public function edit($id){
    return Redirect::to('/');
    //return view('feeds.edit', ['feed' => $this->feed]);
  }
  public function EliminarFeed($id){

    if(isset($id) && $id !== "" && Auth::user()->check()){
      $id = addslashes($id);
      $feed = EstadoEmpresa::find($id);
      if($feed->user_id == Auth::user()->get()->id){
        DB::table('estado_empresas')->where('id', '=', $id)->delete();
        return response()->json(["Mensaje: " => "Eliminado"]);
      }else{
        return response()->json(["Mensaje: " => "Acceso denegado"]);
      }
    }
  }
  public function find(Route $route){
    $this->feed = Feed::find($route->getParameter('feeds'));
    //return $this->user;
  }
  public function index(){
    if(Auth::user()->check()){
      return view('feeds.index');
    }
    return Redirect::to('/');
  }
  public function show($id){
    return Redirect::to('/');
  }
  public function store(FeedCreateRequest $request){
    if(isset($request) && $request->ajax()){
      EstadoEmpresa::create($request->all());
      return response()->json(["Mensaje: " => "Creado"]);
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function update(FeedUpdateRequest $request, $id){
    return Redirect::to('/');
    $this->feed->fill($request->all());
    $this->feed->save();
    Session::flash('message', 'Feed editado correctamente');
    return Redirect::to('/feeds');
  }
}

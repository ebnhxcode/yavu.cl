<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Estado;
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
use yavu\User;

class
FeedController extends Controller{
  private $id;
  private $user_id;
  public function __construct(){

    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    if(Auth::user()->check()){
      $this->user = User::find(Auth::user()->get()->id);
    }
  }

  public function CargarFeeds($idUltima){
    if(isset($idUltima)){
      $idUltima = addslashes($idUltima);

      if((int) $idUltima == "0"){
        $feeds = DB::table('estado_empresas')
          ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
          ->select('estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa', 'empresas.id as idEmpresa')
          ->where('estado_empresas.id', '>', (int) $idUltima)
          ->orderBy('estado_empresas.created_at','desc')
          ->limit('10')
          ->get();

      }elseif((int) $idUltima <> "0"){
        $feeds = DB::table('estado_empresas')
          ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
          ->select('estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa', 'empresas.id as idEmpresa')
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
    return view('feeds.edit', ['feed' => EstadoEmpresa::find($id)]);
  }
  public function EliminarFeed($id){

    if(isset($id) && $id !== ""){
      $id = addslashes($id);
      $feed = EstadoEmpresa::find($id);
      $feed->delete();
      return response()->json(["Mensaje: " => "Eliminado"]);
    }
  }
  public function find(Route $route){
    $this->feed = Feed::find($route->getParameter('feeds'));
    //return $this->user;
  }
  public function index(){

    if(count($this->user->empresas)>0){
      $this->user_id = $this->user->empresas[0]->user_id; $this->id = $this->user->empresas[0]->id;
      return view('feeds.index', ['user_id' => $this->user_id], ['empresa_id' => $this->id]);
    }else{
      return view('feeds.index');
    }



  }
  public function show($id){


  }
  public function store(FeedCreateRequest $request){
    if(isset($request) && $request->ajax()){
      EstadoEmpresa::create($request->all());
      return response()->json(["Mensaje: " => "Creado"]);
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function update(FeedUpdateRequest $request, $id){
    $this->feed = EstadoEmpresa::find($id);
    $this->feed->fill($request->all());
    $this->feed->save();
    Session::flash('message', 'Feed editado correctamente');
    return Redirect::to('/feeds');
  }
}

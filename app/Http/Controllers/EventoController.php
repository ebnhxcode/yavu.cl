<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\EventoCreateRequest;
use yavu\Http\Requests\EventoUpdateRequest;
use yavu\Evento;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class EventoController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function create(){
    if(Auth::admin()->check()){
      return view('eventos.create');
    }
    return response()>json(["Mensaje: " => "Acceso denegado"]);
  }
  public function destroy($id){
    if(isset($this->evento)){
      $this->evento->delete();
      Session::flash('message', 'Evento eliminado correctamente');
      return Redirect::to('/eventos');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function edit($id){
    if(isset($this->evento) && Auth::admin()->check()){
      return view('eventos.edit', ['evento' => $this->evento]);
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function findOrFail(Route $route){
    $this->evento = Evento::findOrFail($route->getParameter('eventos'));
  }
  public function index(){
    if(Auth::admin()->check()){
      $eventos = Evento::paginate(5);
      return view('eventos.index', compact('eventos'));
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function show($id){
    return Redirect::to('/');
  }
  public function store(EventoCreateRequest $request){
    if(isset($request)){
      Evento::create($request->all());
      Session::flash('message', 'Evento creado correctamente');
      return Redirect::to('/eventos');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function update(EventoUpdateRequest $request, $id){
    if(isset($request) && Auth::admin()->check()){
      $this->evento->fill($request->all());
      $this->evento->save();
      Session::flash('message', 'Evento editado correctamente');
      return Redirect::to('/eventos');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
}

<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\PreguntaCreateRequest;
use yavu\Http\Requests\PreguntaUpdateRequest;
use yavu\Pregunta;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class PreguntaController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function find(Route $route){
    $this->pregunta = Pregunta::findOrFail($route->getParameter('preguntas'));
  }
  public function index(){
    $preguntas = Pregunta::paginate(5);
    return view('preguntas.index', compact('preguntas'));
  }
  public function create(){
      return view('preguntas.create');
  }
  public function store(PreguntaCreateRequest $request){
      Pregunta::create($request->all());
      Session::flash('message', 'Pregunta creada correctamente');
      return Redirect::to('/preguntas');
  }
  public function show($id){

  }
  public function edit($id){
    if(isset($id)){
      return view('preguntas.edit', ['pregunta' => $this->pregunta]);
    }
    return response()->json('Acceso denegado');
  }
  public function update(PreguntaUpdateRequest $request, $id){
    $this->pregunta->fill($request->all());
    $this->pregunta->save();
    Session::flash('message', 'Pregunta editada correctamente');
    return Redirect::to('/preguntas');
  }
  public function destroy($id){
    if(isset($id)){
      $this->pregunta->delete();
      Session::flash('message', 'Pregunta eliminada correctamente');
      return Redirect::to('/preguntas');
    }
    return response()->json('Acceso denegado');
  }
}

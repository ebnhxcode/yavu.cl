<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\BeneficioCreateRequest;
use yavu\Http\Requests\BeneficioUpdateRequest;
use yavu\Beneficio;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class BeneficioController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function find(Route $route){
    if(Auth::admin()->check()){
      $this->beneficio = Beneficio::find($route->getParameter('beneficios'));
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function index(){
    if(Auth::admin()->check()){
      $beneficios = Beneficio::paginate(5);
      return view('beneficios.index', compact('beneficios'));
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function create(){
    if(Auth::admin()->check()){
      return view('beneficios.create');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function store(BeneficioCreateRequest $request){
    if(Auth::admin()->check()){
      Beneficio::create($request->all());
      Session::flash('message', 'Beneficio creado correctamente');
      return Redirect::to('/beneficios');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function show($id){

  }
  public function edit($id){
    if(Auth::admin()->check()){
      return view('beneficios.edit', ['beneficio' => $this->beneficio]);
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function update(BeneficioUpdateRequest $request, $id){
    if(Auth::admin()->check()){
      $this->beneficio->fill($request->all());
      $this->beneficio->save();
      Session::flash('message', 'Beneficio editado correctamente');
      return Redirect::to('/beneficios');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function destroy($id){
    if(Auth::admin()->check()){
      $this->beneficio->delete();
      Session::flash('message', 'Beneficio eliminado correctamente');
      return Redirect::to('/beneficios');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
}

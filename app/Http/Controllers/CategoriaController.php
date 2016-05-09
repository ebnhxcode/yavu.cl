<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\CategoriaCreateRequest;
use yavu\Http\Requests\CategoriaUpdateRequest;
use yavu\Categoria;
use yavu\Empresa;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;

class CategoriaController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function find(Route $route){
    if(Auth::user()->check()){
      $this->categoria = Categoria::find($route->getParameter('categorias'));
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function index(){
    if(Auth::user()->check()){
      $categorias = Categoria::all();
      return view('categorias.index', compact('categorias'));
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function create(){
    if(Auth::user()->check()){
      return view('categorias.create');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }

  public function store(Request $request){
    if(Auth::user()->check()){
      Categoria::create($request->all());
      Session::flash('message', 'Categoria creado correctamente');
      return Redirect::to('/categorias/create');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function show($id){

  }
  public function edit($id){
    if(Auth::user()->check()){
      return view('categorias.edit', ['categoria' => $this->categoria]);
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }

  public function update(CategoriaUpdateRequest $request, $id){
    if(Auth::user()->check()){
      $this->categoria->fill($request->all());
      $this->categoria->save();
      Session::flash('message', 'Categoria editada correctamente');
      return Redirect::to('/categorias');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function destroy($id){
    if(Auth::user()->check()){
      $this->categoria->delete();
      Session::flash('message', 'categoria eliminado correctamente');
      return Redirect::to('/categorias');
    }
    return Redirect::to("/");
    //return response()->josn(["Mensaje: " => "Acceso denegado"]);
  }
}
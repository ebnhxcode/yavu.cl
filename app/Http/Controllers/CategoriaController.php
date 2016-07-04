<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\CategoryList;
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
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function index(){
    $categorias = CategoryList::all();
    return view('categorias.index', compact('categorias'));
  }
  public function create(){
    return view('categorias.create');
  }

  public function store(Request $request){
    CategoryList::create($request->all());
    Session::flash('message', 'Categoria creada correctamente');
    return Redirect::to('/categorias/create');
  }
  public function show($id){

  }
  public function edit($id){
    $this->categoria = CategoryList::findOrFail($id);
    return view('categorias.edit', ['categoria' => $this->categoria]);
  }

  public function update(CategoriaUpdateRequest $request, $id){
    $this->categoria = CategoryList::create($request->all());
    $this->categoria->save();
    Session::flash('message', 'Categoria editada correctamente');
    return Redirect::to('/categorias');
  }
  public function destroy($id){
    $this->categoria = CategoryList::findOrFail($id);
    $this->categoria->delete();
    Session::flash('message', 'categoria eliminado correctamente');
    return Redirect::to('/categorias');
  }
}
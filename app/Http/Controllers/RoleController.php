<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\RoleCreateRequest;
use yavu\Http\Requests\RoleUpdateRequest;
use yavu\Role;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class RoleController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function create(){
    return view('roles.create');
  }
  public function destroy($id){
    if(isset($id)){
      $this->role->delete();
      Session::flash('message', 'Role eliminado correctamente');
      return Redirect::to('/roles');
    }
    return response()->json('Acceso denegado');
  }
  public function edit($id){
    if(isset($id)){
      return view('roles.edit', ['role' => $this->role]);
    }
    return response()->json('Acceso denegado');
  }
  public function findOrFail(Route $route){
    $this->role = Role::findOrFail($route->getParameter('roles'));
  }
  public function index(){
    $roles = Role::paginate(5);
    return view('roles.index', compact('roles'));
  }
  public function show($id){
  }
  public function store(RoleCreateRequest $request){
    Role::create($request->all());
    Session::flash('message', 'Role creado correctamente');
    return Redirect::to('/roles');
  }
  public function update(RoleUpdateRequest $request, $id){
    $this->role->fill($request->all());
    $this->role->save();
    Session::flash('message', 'Role editado correctamente');
    return Redirect::to('/roles');
  }
}

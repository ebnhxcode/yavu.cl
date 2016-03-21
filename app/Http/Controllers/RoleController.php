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
class RoleController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->role = Role::find($route->getParameter('roles'));
    }      
    public function index()
    {
        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'));     
    }
    public function create()
    {
        return view('roles.create');
    }
    public function store(RoleCreateRequest $request)
    {
        Role::create($request->all());
        Session::flash('message', 'Role creado correctamente');
        return Redirect::to('/roles');
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        return view('roles.edit', ['role' => $this->role]);
    }
    public function update(RoleUpdateRequest $request, $id)
    {
        $this->role->fill($request->all());
        $this->role->save();
        Session::flash('message', 'Role editado correctamente');
        return Redirect::to('/roles');
    }
    public function destroy($id)
    {
        $this->role->delete();
        Session::flash('message', 'Role eliminado correctamente');
        return Redirect::to('/roles');
    }
}

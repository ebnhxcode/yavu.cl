<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\InteraccionCreateRequest;
use yavu\Http\Requests\InteraccionUpdateRequest;
use yavu\Interaccion;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class InteraccionController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->interaccion = Interaccion::find($route->getParameter('interacciones'));
    }      
    public function index()
    {
        $interacciones = Interaccion::paginate(5);
        return view('interacciones.index', compact('interacciones')); 
    }
    public function create()
    {
        return view('interacciones.create');
    }
    public function store(InteraccionCreateRequest $request)
    {
        Interaccion::create($request->all());
        Session::flash('message', 'Interaccion creada correctamente');
        return Redirect::to('/interacciones'); 
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        return view('interacciones.edit', ['interaccion' => $this->interaccion]);
    }
    public function update(InteraccionUpdateRequest $request, $id)
    {
        $this->interaccion->fill($request->all());
        $this->interaccion->save();
        Session::flash('message', 'Interaccion editada correctamente');
        return Redirect::to('/interacciones');
    }
    public function destroy($id)
    {
        $this->interaccion->delete();
        Session::flash('message', 'Interaccion eliminada correctamente');
        return Redirect::to('/interacciones');
    }
}

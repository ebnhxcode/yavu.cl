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
class EventoController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->evento = Evento::find($route->getParameter('eventos'));
    }      
    public function index()
    {
        $eventos = Evento::paginate(5);
        return view('eventos.index', compact('eventos')); 
    }
    public function create()
    {
        return view('eventos.create');
    }
    public function store(EventoCreateRequest $request)
    {
        Evento::create($request->all());
        Session::flash('message', 'Evento creado correctamente');
        return Redirect::to('/eventos'); 
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        return view('eventos.edit', ['evento' => $this->evento]);
    }
    public function update(EventoUpdateRequest $request, $id)
    {
        $this->evento->fill($request->all());
        $this->evento->save();
        Session::flash('message', 'Evento editado correctamente');
        return Redirect::to('/eventos');
    }
    public function destroy($id)
    {
        $this->evento->delete();
        Session::flash('message', 'Evento eliminado correctamente');
        return Redirect::to('/eventos');
    }
}

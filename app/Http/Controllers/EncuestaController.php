<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\EncuestaCreateRequest;
use yavu\Http\Requests\EncuestaUpdateRequest;
use yavu\Encuesta;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class EncuestaController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->encuesta = Encuesta::find($route->getParameter('encuestas'));
    }    
    public function index()
    {
        $encuestas = Encuesta::paginate(5);
        return view('encuestas.index', compact('encuestas'));
    }
    public function create()
    {
        return view('encuestas.create');
    }
    public function store(EncuestaCreateRequest $request)
    {
        Encuesta::create($request->all());
        Session::flash('message', 'Encuesta creada correctamente');
        return Redirect::to('/encuestas');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        return view('encuestas.edit', ['encuesta' => $this->encuesta]);
    }
    public function update(EncuestaUpdateRequest $request, $id)
    {
        $this->encuesta->fill($request->all());
        $this->encuesta->save();
        Session::flash('message', 'Encuesta editada correctamente');
        return Redirect::to('/encuestas');
    }
    public function destroy($id)
    {
        $this->encuesta->delete();
        Session::flash('message', 'Encuesta eliminada correctamente');
        return Redirect::to('/encuestas');
    }
}

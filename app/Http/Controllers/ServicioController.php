<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\ServicioCreateRequest;
use yavu\Http\Requests\ServicioUpdateRequest;
use yavu\Servicio;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class ServicioController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->servicio = Servicio::find($route->getParameter('servicios'));
    }    
    public function index()
    {
        $servicios = Servicio::paginate(5);
        return view('servicios.index', compact('servicios'));
    }
    public function create()
    {
        return view('servicios.create');
    }
    public function store(ServicioCreateRequest $request)
    {
        Servicio::create($request->all());
        Session::flash('message', 'Servicio creado correctamente');
        return Redirect::to('/servicios');  
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        return view('servicios.edit', ['servicio' => $this->servicio]);
    }
    public function update(ServicioUpdateRequest $request, $id)
    {
        $this->servicio->fill($request->all());
        $this->servicio->save();
        Session::flash('message', 'Servicio editado correctamente');
        return Redirect::to('/servicios');        
    }
    public function destroy($id)
    {
        $this->servicio->delete();
        Session::flash('message', 'Servicio eliminado correctamente');
        return Redirect::to('/servicios');
    }
}

<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\InteresCreateRequest;
use yavu\Http\Requests\InteresUpdateRequest;
use yavu\Interes;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class InteresController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->interes = Interes::find($route->getParameter('intereses'));
    }      
    public function index()
    {
        $intereses = Interes::paginate(5);
        return view('intereses.index', compact('intereses')); 
    }
    public function create()
    {
        return view('intereses.create');
    }
    public function store(InteresCreateRequest $request)
    {
        Interes::create($request->all());
        Session::flash('message', 'Interes creado correctamente');
        return Redirect::to('/intereses'); 
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        return view('intereses.edit', ['interes' => $this->interes]);
    }
    public function update(InteresUpdateRequest $request, $id)
    {
        $this->interes->fill($request->all());
        $this->interes->save();
        Session::flash('message', 'Interes editado correctamente');
        return Redirect::to('/intereses');
    }
    public function destroy($id)
    {
        $this->interes->delete();
        Session::flash('message', 'Interes eliminado correctamente');
        return Redirect::to('/intereses');
    }
}

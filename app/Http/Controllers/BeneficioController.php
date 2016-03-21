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
class BeneficioController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->beneficio = Beneficio::find($route->getParameter('beneficios'));
    }      
    public function index()
    {
        $beneficios = Beneficio::paginate(5);
        return view('beneficios.index', compact('beneficios'));        
    }
    public function create()
    {
        return view('beneficios.create');
    }
    public function store(BeneficioCreateRequest $request)
    {
        Beneficio::create($request->all());
        Session::flash('message', 'Beneficio creado correctamente');
        return Redirect::to('/beneficios');
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        return view('beneficios.edit', ['beneficio' => $this->beneficio]);
    }
    public function update(BeneficioUpdateRequest $request, $id)
    {
        $this->beneficio->fill($request->all());
        $this->beneficio->save();
        Session::flash('message', 'Beneficio editado correctamente');
        return Redirect::to('/beneficios');
    }
    public function destroy($id)
    {
        $this->beneficio->delete();
        Session::flash('message', 'Beneficio eliminado correctamente');
        return Redirect::to('/beneficios');
    }
}

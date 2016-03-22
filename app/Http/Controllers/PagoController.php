<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\PagoCreateRequest;
use yavu\Http\Requests\PagoUpdateRequest;
use yavu\Pago;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class PagoController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->pago = Pago::find($route->getParameter('pagos'));
    }      
    public function index()
    {
        $pagos = Pago::paginate(5);
        return view('pagos.index', compact('pagos'));   
    }
    public function create()
    {
        return view('pagos.create');
    }
    public function store(PagoCreateRequest $request)
    {
        Pago::create($request->all());
        Session::flash('message', 'Pago realizado correctamente');
        return Redirect::to('/pagos');
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        return view('pagos.edit', ['pago' => $this->pago]);
    }
    public function update(PagoUpdateRequest $request, $id)
    {
        $this->pago->fill($request->all());
        $this->pago->save();
        Session::flash('message', 'Pago editado correctamente');
        return Redirect::to('/pagos');
    }
    public function destroy($id)
    {
        $this->pago->delete();
        Session::flash('message', 'Pago eliminado correctamente');
        return Redirect::to('/pagos');        
    }
}

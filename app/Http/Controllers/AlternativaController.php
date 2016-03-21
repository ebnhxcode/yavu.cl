<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\AlternativaCreateRequest;
use yavu\Http\Requests\AlternativaUpdateRequest;
use yavu\Alternativa;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class AlternativaController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->alternativa = Alternativa::find($route->getParameter('alternativas'));
    }        
    public function index()
    {
        $alternativas = Alternativa::paginate(5);
        return view('alternativas.index', compact('alternativas'));
    }
    public function create()
    {
        return view('alternativas.create');
    }
    public function store(AlternativaCreateRequest $request)
    {
        Alternativa::create($request->all());
        Session::flash('message', 'Alternativa creada correctamente');
        return Redirect::to('/alternativas');
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        return view('alternativas.edit', ['alternativa' => $this->alternativa]);
    }
    public function update(AlternativaUpdateRequest $request, $id)
    {
        $this->alternativa->fill($request->all());
        $this->alternativa->save();
        Session::flash('message', 'Alternativa editada correctamente');
        return Redirect::to('/alternativas');
    }
    public function destroy($id)
    {
        $this->alternativa->delete();
        Session::flash('message', 'Alternativa eliminada correctamente');
        return Redirect::to('/alternativas');
    }
}

<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Gmap;
use yavu\Empresa;
use Carbon\Carbon;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;

class GmapsController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function create(){
  }
  public function destroy($id){
  }
  public function edit($id){
  }
  public function find(Route $route){
    $this->gmap = Gmap::find($route->getParameter('gmaps'));
  }
  public function index(){
  }
  public function show($id){
  }
  public function store(Request $request){
    if(isset($request)){
      $userGmap = Gmap::where('user_id', $request->user_id)->where('empresa_id', $request->empresa_id)->first();
      if($userGmap){
        DB::table('gmaps')
          ->where('id', $userGmap->id)
          ->update([
            'title' => $request->title,
            'address' => $request->address,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'updated_at' => Carbon::now(),
          ]);
        $empresa = Empresa::find($request->empresa_id);
        Session::flash('message', 'Mapa modificado correctamente');
        return Redirect::to('/empresa/'.$empresa->nombre);
      }else{
        Gmap::create($request->all());
        $empresa = Empresa::find($request->empresa_id);
        Session::flash('message', 'Mapa registrado correctamente');
        return Redirect::to('/empresa/'.$empresa->nombre);
      }
    }
    return Redirect::to('/');
  }
  public function update(Request $request, $id){
    $this->gmap->fill($request->all());
    $this->gmap->save();
    Session::flash('message', 'Mapa modificado correctamente');
    $empresa = Empresa::find($request->empresa_id);
    return Redirect::to('/empresa/'.$empresa->nombre);
  }
}

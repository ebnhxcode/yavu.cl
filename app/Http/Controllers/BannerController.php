<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\BannerCreateRequest;
use yavu\Http\Requests\BannerUpdateRequest;
use yavu\Banner;
use Empresa;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;

class BannerController extends Controller{

  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function find(Route $route){
    if(Auth::admin()->check()){
      $this->banner = Banner::findOrFail($route->getParameter('banners'));
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function index(){
  }

  public function create(){
    if(Auth::admin()->check()){
      return view('admins.banneradmin.bannercreate');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }

  public function store(Request $request){
    if(Auth::admin()->check()){
      Banner::create($request->all());
      Session::flash('message', 'Banner creado correctamente');
      return Redirect::to('/banners/create');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function show($id){
    return Redirect::to("/");
  }
  public function edit($id){
    if(Auth::admin()->check()){
      return view('banners.edit', ['banner' => $this->banner]);
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }

  public function update(BannerUpdateRequest $request, $id){
    if(Auth::admin()->check()){
      $this->banner->fill($request->all());
      $this->banner->save();
      Session::flash('message', 'banner validado correctamente');
      return Redirect::to('/banners');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function destroy($id){
    if(Auth::admin()->check()){
      $this->banner->delete();
      Session::flash('message', 'banner eliminado correctamente');
      return Redirect::to('/banners');
    }
    return Redirect::to("/");
    //return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
}
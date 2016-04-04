<?php

namespace yavu\Http\Controllers;

use Illuminate\Http\Request;

use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Gmap;
use Session;
use Auth;
use Redirect;
use Illuminate\Routing\Route;

class GmapsController extends Controller{

  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function find(Route $route){
    $this->gmap = Gmap::find($route->getParameter('gmaps'));
  }
  public function index(){
  }
  public function create(){
  }
  public function store(Request $request){
    Gmap::create($request->all());
    Session::flash('message', 'Mapa registrado correctamente');
    return Redirect::to('/');
  }
  public function show($id){
  }
  public function edit($id){
  }
  public function update(Request $request, $id){
  }
  public function destroy($id){
  }
}

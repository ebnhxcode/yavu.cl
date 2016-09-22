<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Admin;
use yavu\Coin;
use yavu\Http\Requests;
use yavu\Http\Requests\CoinCreateRequest;
use yavu\Http\Requests\CoinUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\RegistroCoin;
use Auth;
use yavu\User;
use Illuminate\Routing\Route;
use DB;

class CoinController extends Controller{
  public function __construct(){

    if(Auth::user()->check()){
      $this->user = User::findOrFail(Auth::user()->get()->id);
    }
    if(Auth::admin()->check()){
      $this->admin = Admin::findOrFail(Auth::admin()->get()->id);
    }
  }
  public function index(){
    return view('coins.index', ['historialcoins' => $this->user->registro_coins()->limit('20')->get(), 'userSession'=>$this->user]);
  }
  public function ContarCoins(){
    return response()->json($this->user->registro_coins->sum('cantidad'));
  }
  public function HistorialCoins(){
    return view('coins.index', ['historialcoins' => $this->user->registro_coins()->limit('20')->get()]);
  }
  public function store(CoinCreateRequest $request){
    if(isset($this->admin)){
      RegistroCoin::create($request->all());
      Session::flash('message', 'Carga creada correctamente');
      return Redirect::to('/coins/create');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function edit($id){
    if(isset($this->admin)){
      return view('coins.edit', ['coin' => $this->coin]);
    }
    Session::flash('message-warning', 'No se ha encontrado la página que buscabas.');
    return Redirect::to("/dashboard");
  }
  public function update(CoinUpdateRequest $request, $id){
    if(isset($this->admin)){
      $this->coin->fill($request->all());
      $this->coin->save();
      Session::flash('message', 'Carga editada correctamente');
      return Redirect::to('/coins');
    }
    Session::flash('message-warning', 'No se ha encontrado la página que buscabas.');
    return Redirect::to("/dashboard");
  }
  public function destroy($id){
    if(isset($this->admin)){
      $this->coin->delete();
      Session::flash('message', 'Carga eliminada correctamente');
      return Redirect::to('/coins');
    }
    Session::flash('message-warning', 'No se ha encontrado la página que buscabas.');
    return Redirect::to("/dashboard");
  }
  public function VerificarYavuCoins(Request $request){
    return response()->json($this->user->coins->sum('cantidad'));
  }
}

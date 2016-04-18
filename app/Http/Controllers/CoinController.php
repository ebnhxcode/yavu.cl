<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Admin;
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
    //$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    if(Auth::user()->check()){
      $this->user = User::find(Auth::user()->get()->id);
    }
    if(Auth::admin()->check()){
      $this->admin = Admin::find(Auth::admin()->get()->id);
    }
  }
  public function find(Route $route){
    $this->coin = RegistroCoin::find($route->getParameter('coins'));
  }
  public function index(){
    
    $historialcoins = DB::table('registro_coins')
      ->join('users', 'users.id', '=', 'registro_coins.user_id')
      ->select('registro_coins.*', 'users.nombre')
      ->where('user_id', '=', $this->user->id)
      ->orderBy('created_at','desc')
      //->limit('10')
      ->get();
    return view('coins.index', compact('historialcoins'));
  }
  public function create(){
    if(isset($this->admin)){
      return view('coins.create');
    }
    Session::flash('message-error', 'Usted está ingresando a un lugar que no existe.');
    return Redirect::to('/dashboard');
  }
  public function ContarCoins(){
    return response()->json($this->user->registro_coins->sum('cantidad'));
  }
  public function HistorialCoins(){
    $historialcoins = DB::table('registro_coins')
      ->join('users', 'users.id', '=', 'registro_coins.user_id')
      ->select('registro_coins.*', 'users.nombre')
      ->where('user_id', '=', $this->user->id)
      ->orderBy('created_at','desc')
      ->limit('5')
      ->get();
    return response()->json(
      $historialcoins
    );
  }
  public function store(CoinCreateRequest $request){
    if(isset($this->admin)){
      RegistroCoin::create($request->all());
      Session::flash('message', 'Carga creada correctamente');
      return Redirect::to('/coins/create');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function show($id){

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
}

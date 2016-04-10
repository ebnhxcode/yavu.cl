<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Requests\CoinCreateRequest;
use yavu\Http\Requests\CoinUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\RegistroCoin;
use Auth;
use Illuminate\Routing\Route;
use DB;

class CoinController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function find(Route $route){
    $this->coin = RegistroCoin::find($route->getParameter('coins'));
  }
  public function index(){
    if(Auth::user()->check()){
      $historialcoins = DB::table('registro_coins')
        ->join('users', 'users.id', '=', 'registro_coins.user_id')
        ->select('registro_coins.*', 'users.nombre')
        ->where('user_id', '=', Auth::user()->get()->id)
        ->orderBy('created_at','desc')
        //->limit('10')
        ->get();
      return view('coins.index', compact('historialcoins'));
    }
    Session::flash('message', 'Para ver tu historial de coins debes iniciar sesión.');
    return Redirect::to('/login');
  }
  public function create(){
    if(Auth::admin()->check()){
      return view('coins.create');
    }
    Session::flash('message-error', 'Usted está ingresando a un lugar que no existe.');
    if(Auth::user()->check()) {
      return Redirect::to('/');
    }else{
      return Redirect::to('/login');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function ContarCoins(){
    if(Auth::user()->check()){
      $coins = DB::table('registro_coins')
        ->select(DB::raw('sum(cantidad) as coins'))
        ->where('user_id', '=', Auth::user()->get()->id)
        ->groupBy('user_id')
        //->orderBy('created_at','desc')
        ->get();
      return response()->json($coins);
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function HistorialCoins(){
    if(Auth::user()->check()){
      $historialcoins = DB::table('registro_coins')
        ->join('users', 'users.id', '=', 'registro_coins.user_id')
        ->select('registro_coins.*', 'users.nombre')
        ->where('user_id', '=', Auth::user()->get()->id)
        ->orderBy('created_at','desc')
        ->limit('5')
        ->get();
      return response()->json(
        $historialcoins
      );
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function store(CoinCreateRequest $request){
    if(Auth::admin()->check()){
      RegistroCoin::create($request->all());
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function show($id){

  }
  public function edit($id){
    if(Auth::admin()->check()){
      return view('coins.edit', ['coin' => $this->coin]);
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function update(CoinUpdateRequest $request, $id){
    if(Auth::admin()->check()){
      $this->coin->fill($request->all());
      $this->coin->save();
      Session::flash('message', 'Carga editada correctamente');
      return Redirect::to('/coins');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function destroy($id){
    if(Auth::admin()->check()) {
      $this->coin->delete();
      Session::flash('message', 'Carga eliminada correctamente');
      return Redirect::to('/coins');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
}

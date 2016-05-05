<?php
namespace yavu\Http\Controllers;
use Auth;
use Hash;
use yavu\User;
use yavu\Empresa;
use yavu\RegistroCoin;
use yavu\Coin;
use yavu\Admin;
use Input;
use Session;
Use Redirect;
use yavu\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use DB;
class LogController extends Controller{
  public function index(){
  }
  public function CargarCoinSesion(){
    if(isset($this->user->id)){
      $fechaRegistro = "";
      $fechaActual = strftime( "%m/%d/%Y", time());
      $cargaDiaria = RegistroCoin::where('user_id', $this->user->id)
        ->where('motivo', 'Inicio sesión')
        ->orderby('created_at', 'desc')
        ->limit('1')
        ->first();
      if($cargaDiaria){
        $fechaRegistro = $cargaDiaria->created_at->format('m/d/Y');
      }
      if( $fechaRegistro != $fechaActual ){
        DB::table('registro_coins')->insert(
          ['user_id'    => $this->user->id,
          'cantidad'    => '10',
          'motivo'      => 'Inicio sesión',
          'created_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time()),
          'updated_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time())]
        );
        //Ahora notifico al cliente
        DB::table('pops')->insert(
          ['user_id'    => $this->user->id,
          'empresa_id'  => 1,
          'tipo'        => 'coins',
          'estado'      => 'pendiente',
          'contenido'   => 'Tienes una nueva carga diaria!',
          'created_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time()),
          'updated_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time())]
        );
      }
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function create(){
    }
  public function destroy($id){
  }
  public function edit($id){
  }
  public function logout(){
    if(Auth::user()->check()){
      Auth::user()->logout();
      Session::flash('message-warning', 'Se ha cerrado la sesión correctamente');
      Session::flash('message', '¡Esperamos volver a verte!');
      return Redirect::to('/login');
    }elseif(Auth::admin()->check()){
      Auth::admin()->logout();
      Session::flash('message-warning', 'Se ha cerrado la sesión correctamente');
      return Redirect::to('/');
    }else{
      Session::flash('message-error', 'Ocurrió un error al cerrar la sesión.');
      return Redirect::to('/');
    }
  }
  public function show($id){
  }
  public function store(LoginRequest $request){
      if(Auth::user()->check()){
        return $this->logout();
      }
      if(!Input::get('_token')){
        Session::flash('message-error', 'El tiempo de espera para el inicio de sesión ha caducado, por favor intente nuevamente.');
        Redirect::to('/login');
      }
      $userEmail = User::where('email', Input::get('email'))->first();
      if(!$userEmail){
        $empresaEmail = Empresa::where('email', Input::get('email'))->first();
        if(!$empresaEmail){
          $adminEmail = Admin::where('email', Input::get('email'))->first();
          if(!$adminEmail){
            Session::flash('message-error', 'El email ingresado no se encuentra registrado.');
            return Redirect::back();//->withInput()->withFlashMessage('Unknown username.');
          }else{
            if(Auth::admin()->attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){
              return Redirect::to('/admins');
            }
            Session::flash('message-error', 'Datos son incorrectos para admin');
            return Redirect::to('/login');
          }
        }else{
          if(Auth::empresa()->attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){
            return Redirect::to('/empresas');
          }
          Session::flash('message-error', 'Datos son incorrectos');
          return Redirect::to('/login');
        }
      }else{
        $sesion = Auth::user()->attempt(['email' => Input::get('email'), 'password' => Input::get('password'), 'estado' => 'activo']);
        if($sesion){
          $this->user = User::find(Auth::user()->get()->id);
          $this->CargarCoinSesion();
          /*
          $this->coins = $this->user->registro_coins;
          $bolsaCoins = [];
          foreach($this->coins as $coin){
            array_push($bolsaCoins, $coin->cantidad);
          }
          array_push($bolsaCoins, 10);
          //dd(array_sum($bolsaCoins));
          */
          Session::flash('message-info', '¡Hay publicaciones nuevas, cobra tus coins <a class="btn-warning btn-xs" href="/feeds">YA</a>!');
          return Redirect::to('/feeds');
        }else{
          //dd($sesion);

          Session::flash('message-warning', 'Se requiere validar la cuenta');
          return Redirect::to('/');
        }
      }
      Session::flash('message-error', 'Datos son incorrectos');
      return Redirect::to('/login');
    }
  public function update(Request $request, $id){
    }

  
}

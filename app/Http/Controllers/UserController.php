<?php
namespace yavu\Http\Controllers;
use Auth;
use yavu\Http\Requests;
use yavu\Http\Requests\UserCreateRequest;
use yavu\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use yavu\Pop;
use yavu\RegistroCoin;
use yavu\User;
use DB;
use RUT;
use Mail;
use Carbon\Carbon;
class UserController extends Controller{
  private $user;
  public function __construct(){
    if(Auth::user()->check()){
      return $this->user = $this->getSessionData();
    }
  }

  public function BuscarUsuarios($nombre){
    if(isset($nombre)){
      $nombre = addslashes($nombre);
      $usuarios = DB::table('users')
        ->select('*')
        ->where('nombre', 'like', '%'.$nombre.'%')
        ->orwhere('apellido', 'like', '%'.$nombre.'%')
        ->orwhere('email', 'like', '%'.$nombre.'%')
        ->orwhere('ciudad', 'like', '%'.$nombre.'%')
        ->orwhere('region', 'like', '%'.$nombre.'%')
        ->orwhere('pais', 'like', '%'.$nombre.'%')
        ->orderBy('created_at','desc')
        ->get();
      return response()->json($usuarios);
    }
    return response()->json(["Mensaje: " => "No se encontró la búsqueda."]);
  }

  public function create(){
    return view('usuarios.create');
  }

  public function dashboard(){
    return view('usuarios.dashboard', ['users' => $this->user]);
  }

  public function destroy($id){
      $this->user->estado = 'Inactivo';
      $this->user->save();
      //$this->user->delete();
      Session::flash('message-error', 'Se inhabilitó tu cuenta, lamentamos tu decisión, éxito !');
      Auth::user()->logout();
      return Redirect::to('/login');
  }

  public function edit($id){
    if($id == $this->user->id){
      return view('usuarios.edit', ['user' => $this->user]);
    }else{
      return Redirect::to('/usuarios/'.$this->user->id.'/edit');
    }
  }

  public function getCodigoVerificacion(){
    return Carbon::now()->day.Carbon::now()->minute.Carbon::now()->hour."V";
  }

  private function getSessionData(){
    return User::find(Auth::user()->get()->id);
  }

  public function index(){
    return $this->profile();
  }

  public function InfoEmpresas($user_id){
    return response()->json($this->user->empresas);
  }

  public function profile(){
    return view('usuarios.profile', ['user' => $this->user]);
  }

  public function reset(Request $request){
    dd($request);
  }

  public function show($id){
    return $this->profile();
  }

  public function store(UserCreateRequest $request){
    //User::create($request->all());
    //$existeReferente = User::where('referente', $request->referido)->first();
    $existeReferente = false;
    if ($existeReferente){
      //CUANDO EXISTE REFERENTE
      $this->newuser = new User(["nombre"=>$request->nombre,"apellido"=>$request->apellido,"email"=>$request->email,"password"=>$request->password,"estado"=>"inactivo","referido"=>$request ->referido,"referente"=>Carbon::now()->minute.Carbon::now()->hour.Carbon::now()->year.Carbon::now()->month.Carbon::now()->day."RY","validacion"=> $this->getCodigoVerificacion(),"ciudad"=>$request->ciudad]);
      $this->newuser->save();
      $this->registro_coins = new RegistroCoin(['user_id'=>$this->newuser->id,'cantidad'=>'70','motivo'=>'Uso de código referido','created_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time())]);
      $this->registro_coins->save();
      $this->pop = new Pop(['user_id'=>$this->newuser->id,'empresa_id'=>1,'tipo'=>'referido','estado'=>'pendiente','contenido'=>'Se cargaron coins por código de referido! ','created_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time())]);
      $this->pop->save();

      Mail::send('emails.register', ['email' => $this->newuser->email, 'nombre' => $this->newuser->nombre, 'codigo' => $this->getCodigoVerificacion() ], function($msj){
        $msj->subject('Correo de Contacto');
        $msj->to($this->newuser->email);
        return true;
      });

      Session::flash('message', 'Usuario creado correctamente. Debes validar tu cuenta para entrar a yavu.');
      Session::flash('message-warning', 'Para validar tu cuenta revisa el correo con el te acabas de registrar y encontrarás las instrucciones.');
      return Redirect::to('/login');
    }else{
      //CUANDO NO EXISTE REFERENTE
      $this->newuser = new User(["nombre"=>$request->nombre,"apellido"=>$request->apellido,"email"=>$request->email,"password"=>$request->password,"estado"=>"inactivo","referido"=>"","referente"=>Carbon::now()->minute.Carbon::now()->hour.Carbon::now()->year.Carbon::now()->month.Carbon::now()->day."RY","validacion"=>$this->getCodigoVerificacion(),"ciudad"=>$request->ciudad]);
      $this->newuser->save();

      Mail::send('emails.register', ['email'=>\Input::get('email'), 'nombre' => \Input::get('nombre'), 'codigo' => $this->getCodigoVerificacion()], function($msj){
        $msj->subject('Correo de Contacto');
        $msj->to(\Input::get('email'));
      });

      Session::flash('message', 'Usuario creado correctamente. Debes validar tu cuenta para entrar a yavu.');
      Session::flash('message-warning', 'Para validar tu cuenta revisa el correo con el te acabas de registrar y encontrarás las instrucciones.');
      return Redirect::to('/login');
    }
    Session::flash('error', 'Ocurrio un error inesperado');
    return Redirect::to('/usuarios');
  }

  public function update($id, UserUpdateRequest $request){
    if(RUT::check($request->rut)){
      $this->user->fill($request->all());
      $this->user->save();
      Session::flash('message', 'Usuario editado correctamente');
      return Redirect::to('/profile');
    }else{
      Session::flash('message-error', 'El rut ingresado no es válido.');
      return Redirect::to('/profile');
    }
  }

  public function ValidarRutUsuario($rut){
    if(RUT::check($rut)){
      return RUT::clean($rut);
    }else{
      return "false";
    }
  }

  public function VerificarUsuario($codigo){
    if(isset($this->user)){
      return $this->profile();
    }
    $user = User::where('validacion', $codigo)->first();
    if($user){
      $user->estado = 'Activo';
      $user->save();
      Session::flash('message', 'Su cuenta ha sido verificada. Disfrute.');
      return Redirect::to('/login');
    }
    Session::flash('error', 'No se ha encontrado registros de este usuario');
    return redirect()->to('/login');
  }
}

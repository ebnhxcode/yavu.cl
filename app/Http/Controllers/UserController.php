<?php
namespace yavu\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Requests\UserCreateRequest;
use yavu\Http\Requests\UserUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\User;
use yavu\Estado;
use Illuminate\Routing\Route;
use DB;
use RUT;
use Mail;
use Carbon\Carbon;
use Malahierba\ChileRut\ChileRut;
class UserController extends Controller{
  public function __construct(){
    //$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    if(Auth::user()->check()){
      $this->user = User::find(Auth::user()->get()->id);
    }
  }
  /*
  public function find(Route $route){
    $this->user = User::find($route->getParameter('usuarios'));
  }
  */
  public function BuscarUsuarios($nombre){
    if(!$this->user){
      Session::flash('message-warning', '¡Creemos que no estas encontrando lo que necesitas!');
      return Redirect::to('/');
    }
    $nombre = addslashes($nombre);
    if(isset($nombre)){
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
    if(!isset($this->user)){
      return view('usuarios.create');
    }else{
      Session::flash('message-warning', '¡Creemos que es esto lo que andabas buscando!');
      return Redirect::to('/usuarios/'.$this->user->id.'/edit');
    }
    return view('usuarios.create');
  }
  public function dashboard(){
    if(isset($this->user)){
      return view('usuarios.dashboard', ['users' => $this->user]);
    }
    Session::flash('message-warning', '¡Creemos que estabas un poco perdido por esto te trajimos hasta acá :)!');
    return Redirect::to('/');
  }
  public function destroy($id){
    if($this->user){
      $this->user->estado = 'Inactivo';
      $this->user->save();
      //$this->user->delete();
      Session::flash('message-error', 'Se inhabilitó tu cuenta, lamentamos tu decisión, éxito !');
      Auth::user()->logout();
      return Redirect::to('/login');
    }
    return response()->json(['Mensaje: '=>'No se encontró el usuario']);
  }
  public function edit($id){
    if(isset($id) && $this->user){
      if($id == $this->user->id){
        return view('usuarios.edit', ['user' => $this->user]);
      }else{
        Session::flash('message-warning', '¡Creemos que es esto lo que andabas buscando!');
        return Redirect::to('/usuarios/'.$this->user->id.'/edit');
      }
    }
    Session::flash('message-warning', '¡Creemos que es esto lo que andabas buscando!');
    return Redirect::to('/');
  }
  public function getCodigoVerificacion(){
    if(!$this->user){
      $codigo = Carbon::now()->second.
        Carbon::now()->minute.
        Carbon::now()->hour."V";
      return $codigo;
    }
    Session::flash('message-warning', '¡Creemos que es esto lo que andabas buscando!');
    return Redirect::to('/usuarios/create');
  }
  public function index(){
    if(Auth::admin()->check()){
      $users = User::paginate(10);
      //$users = User::onlyTrashed()->paginate(5);
      return view('usuarios.index', compact('users'));
    }elseif (isset($this->user)){
      Session::flash('message-warning', '¡Creemos que estabas un poco perdido por esto te trajimos hasta acá :)!');
      return Redirect::to('/dashboard');
    }
    Session::flash('message-warning', '¡Creemos que estabas un poco perdido por esto te trajimos hasta acá :)!');
    return Redirect::to('/');
  }
  public function InfoEmpresas($user_id){
    if(isset($user_id)){
      $info = DB::table('empresas')
        ->select('*')
        ->where('user_id', '=', $user_id)
        ->orderBy('created_at','desc')
        ->get();
      return response()->json($info);
    }
    return response()->json(
      'No se encontró la empresa'
    );
  }
  public function profile(){
    return view('usuarios.profile');
  }
  public function show($id){
    if(isset($id)){
      return Redirect::to('/profile');
    }
    return response()->json('Acceso denegado');
  }
  public function store(UserCreateRequest $request){
    //User::create($request->all());
    $existeReferente = User::where('referente', $request->referido)->first();
    if ($existeReferente){
      $CodigoVerificacion = $this->getCodigoVerificacion();
      User::create([
        "nombre"    => $request->nombre,
        "apellido"  => $request->apellido,
        "email"     => $request->email,
        "password"  => $request->password,
        "estado"    => "inactivo",
        "referido"  => $request ->referido,
        "referente" =>  Carbon::now()->second.
          Carbon::now()->minute.
          Carbon::now()->hour.
          Carbon::now()->year.
          Carbon::now()->month.
          Carbon::now()->day."RY",
        "validacion"=> $CodigoVerificacion,
        "ciudad"    => $request->ciudad,
      ])->first()->save();
      Mail::send('emails.register', ['email' => \Input::get('email'), 'nombre' => \Input::get('nombre'), 'codigo' => $CodigoVerificacion ], function($msj){
        $msj->subject('Correo de Contacto');
        $msj->to(\Input::get('email'));
        return true;
      });
      $usuario = User::where('email', \Input::get('email'))->first();
      if($usuario){
        DB::table('registro_coins')->insert(
          ['user_id'    => $usuario->id,
            'cantidad'    => '70',
            'motivo'      => 'Uso de código referido',
            'created_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time()),
            'updated_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time())]
        );
        DB::table('pops')->insert(
          ['user_id'    => $usuario->id,
            'empresa_id'  => 1,
            'tipo'        => 'referido',
            'estado'      => 'pendiente',
            'contenido'   => 'Se cargaron coins por código de referido! ',
            'created_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time()),
            'updated_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time())]
        );
        Session::flash('message', 'Usuario creado correctamente. Debes validar tu cuenta para entrar a yavu.');
        Session::flash('message-warning', 'Para validar tu cuenta revisa el correo con el te acabas de registrar y encontrarás las instrucciones.');
        return Redirect::to('/login');
      }
    }else{
      //CUANDO NO EXISTE REFERENTE
      $CodigoVerificacion = $this->getCodigoVerificacion();
      Mail::send('emails.register', ['email' => \Input::get('email'), 'nombre' => \Input::get('nombre'), 'codigo' => $CodigoVerificacion ], function($msj){
        $msj->subject('Correo de Contacto');
        $msj->to(\Input::get('email'));
      });
      User::create([
        "nombre"      =>  $request->nombre,
        "apellido"    =>  $request->apellido,
        "email"       =>  $request->email,
        "password"    =>  $request->password,
        "estado"      =>  "inactivo",
        "referido"    =>  "",
        "referente"   =>  Carbon::now()->second.
          Carbon::now()->minute.
          Carbon::now()->hour.
          Carbon::now()->year.
          Carbon::now()->month.
          Carbon::now()->day."RY",
        "validacion"  =>  $CodigoVerificacion,
        "ciudad"      =>  $request->ciudad
      ])->save();
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
    $this->user = User::where('validacion', $codigo)->first();
    if($this->user){
      $this->user->estado = 'Activo';
      $this->user->save();
      Session::flash('message', 'Su cuenta ha sido verificada. Disfrute.');
      return Redirect::to('/login');
    }
    return response()->json(['Mensaje: ' => 'No se encontró el usuario']);
  }
}

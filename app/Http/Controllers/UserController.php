<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Requests\UserCreateRequest;
use yavu\Http\Requests\UserUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Auth;
use Redirect;
use yavu\User;
use yavu\Estado;
use Illuminate\Routing\Route;
use DB;
use RUT;
use Carbon\Carbon;
use Malahierba\ChileRut\ChileRut;
class UserController extends Controller
{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function find(Route $route){
    $this->user = User::find($route->getParameter('usuarios'));
    //return $this->user;
  }
  public function index()
  {
    $users = User::paginate(10);
    //$users = User::onlyTrashed()->paginate(5);
    return view('usuarios.index', compact('users'));
  }
  public function BuscarUsuarios($nombre){
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

    //dd($usuarios);
    return response()->json(
        $usuarios
    );
  }
  public function create()
  {
    return view('usuarios.create');
  }
  public function store(UserCreateRequest $request)
  {
    //User::create($request->all());
    $existeReferente = User::where('referente', $request->referido)->first();

    if ($existeReferente){

      User::create([
      'nombre' => $request->nombre,
      'apellido' => $request->apellido,
      'email' => $request->email,
      'password' => $request->password,
      'referido' => $request ->referido,
      'referente' => Carbon::now()->second.Carbon::now()->minute.Carbon::now()->hour.Carbon::now()->year.Carbon::now()->month.Carbon::now()->day."RY",
      'ciudad' => $request->ciudad
      ])->first()->save();

      $usuario = User::where('email', $request->email)->first();

      //echo $usuario->id;

      DB::table('registro_coins')->insert(
          ['user_id' => $usuario->idid, 
          'cantidad' => '70', 
          'motivo'   => 'Uso de código referido',
          'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
          'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
      );

      if($usuario){
        DB::table('pops')->insert(
                  ['user_id' => $usuario->id, 
                  'empresa_id' => 1,
                  'tipo' => 'referido', 
                  'estado'   => 'pendiente',
                  'contenido' => 'Se cargaron coins por código de referido! ',
                  'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
                  'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
              );    

        Session::flash('message', 'Usuario creado correctamente');
        return Redirect::to('/usuarios');        
      }
      
    
    }else{

       User::create([
      'nombre' => $request->nombre,
      'apellido' => $request->apellido,
      'email' => $request->email,
      'password' => $request->password,
      'referido' => '',
      'referente' => Carbon::now()->second.Carbon::now()->minute.Carbon::now()->hour.Carbon::now()->year.Carbon::now()->month.Carbon::now()->day."RY",
      'ciudad' => $request->ciudad
      ])->save();

      Session::flash('message', 'Usuario creado correctamente');
      return Redirect::to('/usuarios');       
     
    }
   
    Session::flash('error', 'Ocurrio un error inesperado');
    return Redirect::to('/usuarios');
  }
  public function show($id)
  {

  }

  public function InfoEmpresas($user_id)
  {
    $info = DB::table('empresas')     
                ->join('followers', 'empresas.id', '=', 'followers.empresa_id')
                ->select('*')    
                ->where('user_id', '=', $user_id)   
                ->orderBy('created_at','desc')   
                ->get();

    return response()->json(
      $info    
    );
  }

  public function dashboard()
  {
    $users = DB::table('users')                    
                ->select('*')    
                ->where('id', '=', Auth::user()->get()->id)   
                ->get();

    return view('usuarios.dashboard', compact('users'));    
  }  
  public function profile()
  {
    return view('usuarios.profile'); 
  }    
  public function edit($id)
  {
    return view('usuarios.edit', ['user' => $this->user]); 
  }
  public function update($id, UserUpdateRequest $request)
  {
    if(RUT::check($request->rut)){
      $this->user->fill($request->all());
      $this->user->save();
      Session::flash('message', 'Usuario editado correctamente');
      return Redirect::to('/usuarios');      
    }else{
      Session::flash('message-error', 'El rut ingresado no es válido.');
      return Redirect::to('/profile');   
    }
  }
  public function ValidarRutUsuario($rut)
  {
    if(RUT::check($rut)){
      return RUT::clean($rut);
    }else{
      return "false";
    }
  }
  
  public function destroy($id)
  {
    $this->user->delete();
    Session::flash('message', 'Usuario eliminado correctamente');
    return Redirect::to('/usuarios');
  }

}

<?php
namespace yavu\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Requests\UserCreateRequest;
use yavu\Http\Requests\UserUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;
use Redirect;
use yavu\Pop;
use yavu\Empresa;
use yavu\RegistroCoin;
use yavu\CategoryList;
use yavu\UserInterest;
use yavu\User;
use DB;
use RUT;
use Mail;
use Carbon\Carbon;
class UserController extends Controller{
  private $id;
  private $user;
  private $email;
  private $login;
  private $nombre;
  private $apellido;
  private $password;
  private $ciudad;
  private $referido;
  private $typeNotification;
  private $contentNotification;
  private $coinsMount;
  private $reason;
  private $arrayToSendEmailAndNotify;
  private $viewName;
  private $emailSubject;
  public function __construct(){
    if(Auth::user()->check()){
      return $this->user = $this->getNormalSessionData();
    }
  }

  public function addInterest(Request $request){
    /*
      Valida si existe la categoría
      Valida si el usuario la tiene sinó la agrega, si la tiene la saca
    */
    try {
      $this->category = CategoryList::findOrFail((int)$request->category_id);
      if($this->category){


        if(count(UserInterest::where('user_id',$this->user->id)->where('categorylist_id',$this->category->id)->get())<1){
          $this->userInterest = UserInterest::create(['user_id'=>$this->user->id, 'categorylist_id' => $request->category_id]);
        }else{
          $this->userInterest = UserInterest::where('user_id',$this->user->id)->where('categorylist_id',$this->category->id)->delete();
        }

        return response()->json([count(UserInterest::where('user_id',$this->user->id)->get()), $request->category_id]);
      }
    } catch (ModelNotFoundException $ex) {
      return response()->json(['mensaje: ' => 'no existe la categoria: '.$request->category_id]);
    }

  }

  public function selectInterestsForCreatedUser(){
    return view('usuarios.interestsOnCreatedUser', ['categoryList' => CategoryList::all()]);
  }

  public function BuscarUsuarios($nombre){
    /*
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
    */
    return response()->json(["Mensaje: " => "No se encontro la busqueda."]);
  }

  public function create(){
    return view('usuarios.create');
  }

  public function dashboard(){
    //['sorteos'=>Sorteo::orderByRaw('RAND()')->where('estado_sorteo','Activo')->paginate(6), 'rtickets' => $this->registro_tickets, 'bannersRandom' => BannerData::orderByRaw('RAND()')->take(2)->get(), ,]
    return view('usuarios.dashboard', ['companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(), 'userSession' => $this->user]);
  }

  public function destroy($id){
      $this->user->estado = 'Inactivo';
      $this->user->save();
      //$this->user->delete();
      Session::flash('message-warning', 'Se inhabilitó tu cuenta, lamentamos tu decisión. Esperamos volverte a ver pronto.');
      Auth::user()->logout();
      return Redirect::to('/login');
  }

  public function edit($id){
    if($id == $this->user->id){
      return view('usuarios.edit', ['user' => $this->getFullSessionData(), 'userSession' => $this->user]);
    }else{
      return Redirect::to('/usuarios/'.$this->user->id.'/edit');
    }
  }

  public function getCodigoVerificacion(){
    return Carbon::now()->day.Carbon::now()->minute.Carbon::now()->hour."V";
  }

  /**
   * @private
   */
  private function getNormalSessionData(){
    return User::where('estado', 'Activo')->where('id', Auth::user()->get()->id)->select('id','nombre','apellido','email','ciudad','imagen_perfil','imagen_portada')->get()->first();
  }

  /**
   * @private
   */
  private function getFullSessionData(){
    return User::where('estado', 'Activo')->where('id', Auth::user()->get()->id)->select('id','nombre','apellido','password','email','ciudad','imagen_perfil','imagen_portada','rut','login','direccion','region','pais','fono','fono_2','sexo','fecha_nacimiento')->get()->first();
  }

  /**
   * @private
   */
  private function GiveCoinsBy($id, $coinsMount, $reason){
    $this->id = $id;
    $this->coinsMount = $coinsMount;
    $this->reason = $reason;
    $this->registro_coins = new RegistroCoin(['user_id'=>$this->id,'cantidad'=>$this->coinsMount,'motivo'=>$this->reason,'created_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time())]);
    $this->registro_coins->save();
  }

  public function index(){
    return $this->profile();
  }

  public function InfoEmpresas(){
    return response()->json($this->user->empresas);
  }

  /**
   * @private
   */
  private function notify($id, $typeNotification, $contentNotification){
    $this->id = $id;
    $this->typeNotification = $typeNotification;
    $this->contentNotification = $contentNotification;
    $this->pop = new Pop(['user_id'=>$this->id,'empresa_id'=>1,'tipo'=>$this->typeNotification,'estado'=>'pendiente','contenido'=>$this->contentNotification,'created_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time())]);
    return $this->pop->save();
  }

  public function profile(){
    return view('usuarios.profile', ['user' => $this->user, 'userSession' => $this->user]);
  }

  public function reset(Request $request){
    if(count($this->user = User::where('email', $request->emailRenovarClave)->get())>0) {

      $this->user[0]->password = $pass = 'yavu2016#'.Carbon::now()->day;
      $this->user[0]->save();

      $this->SendEmailForResetPassword($this->user[0]->email, $this->user[0]->nombre, $pass,'emails.forResetPassword', 'Correo de Reestablecimiento de claves');

      Session::flash('message-info', '¡Hemos enviado tu nueva clave al correo con el que te haz registrado!. ¡Gracias!.');
      return redirect()->to('/login');
    }else{
      Session::flash('message-error', 'Usuario no registrado.');
      return redirect()->to('/login');
    }
  }


  /**
   * @private
   */
  private function RecordUser($nombre, $apellido, $email, $password, $ciudad, $referido, $login){
    $this->nombre = $nombre ; $this->apellido = $apellido; $this->email = $email; $this->password = $password; $this->ciudad = $ciudad; $this->login = $login; $this->referido = $referido;
    $this->newuser = new User(["nombre"=>$this->nombre,"apellido"=>$this->apellido,"email"=>$this->email,"password"=>$this->password,"estado"=>"Activo","referido"=>$this->referido,"login"=>$this->login,"referente"=>Carbon::now()->minute.Carbon::now()->hour.Carbon::now()->year.Carbon::now()->month.Carbon::now()->day."RY","validacion"=>$this->getCodigoVerificacion(),"ciudad"=>$this->ciudad]);
    $this->newuser->save();
    return ['id' => $this->newuser->id, 'nombre' => $this->newuser->nombre, 'email' => $this->newuser->email];

  }

  /**
   * @private
   */
  public function SendEmailForRegisterSuccessfully($email, $nombre, $viewName, $emailSubject){
    $this->email = $email; $this->nombre = $nombre; $this->viewName = $viewName; $this->emailSubject = $emailSubject;
    Mail::send($this->viewName, ['email' => $this->email, 'nombre' => $this->nombre, 'codigo' => $this->getCodigoVerificacion()], function($msj){
      $msj->subject($this->emailSubject);
      $msj->to($this->email);
    });
  }
  private function SendEmailForResetPassword($email, $nombre, $password,$viewName, $emailSubject){
    $this->email = $email; $this->nombre = $nombre; $this->password = $password; $this->viewName = $viewName; $this->emailSubject = $emailSubject;
    Mail::send($this->viewName, ['email' => $this->email, 'nombre' => $this->nombre, 'clave' => $this->password], function($msj){
      $msj->subject($this->emailSubject);
      $msj->to($this->email);
    });

  }

  public function show($id){
    return $this->profile();
  }

  public function store(UserCreateRequest $request){

    $this->arrayToSendEmailAndNotify = $this->RecordUser($request->nombre,$request->apellido,$request->email,$request->password,$request->ciudad,'',$request->login);

    if ($this->GiveCoinsBy($this->arrayToSendEmailAndNotify['id'], 500, 'Carga por registro en el Yavü')){
      $this->notify($this->arrayToSendEmailAndNotify['id'],'carga_inicial','Se cargaron coins por registro en Yavü');
    }
    $this->SendEmailForRegisterSuccessfully($this->arrayToSendEmailAndNotify['email'], $this->arrayToSendEmailAndNotify['nombre'], 'emails.register', 'Correo de Contacto');

    $this->user = User::findOrFail($this->arrayToSendEmailAndNotify['id']);

    if($this->user){
      Auth::user()->login($this->user);
      Session::flash('message', 'Usuario creado correctamente. Debes validar tu correo electr&oacute;nico en el enlace que ha sido enviado a tu correo con el que te acabas de registrar.');
      return $this->selectInterestsForCreatedUser();
      //return Redirect::to('/dashboard');
    }else{
      return Redirect::to('/login');
    }
    //Session::flash('message-warning', 'Para validar tu cuenta revisa el correo con el te acabas de registrar y encontrarás las instrucciones.');
    //return Redirect::to('/login');
  }

  public function update($id, UserUpdateRequest $request){
    if(RUT::check($request->rut) || !$request->rut){
      $this->user->fill($request->all());
      $this->user->save();
      Session::flash('message', 'Usuario editado correctamente');
      return Redirect::to('/profile');
    }else{
      //Session::flash('message-error', 'El rut ingresado no es válido.');
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

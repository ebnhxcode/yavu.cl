<?php

namespace yavu\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use yavu\DBRegisters;
use yavu\EstadoEmpresa;
use yavu\Http\Requests;
use yavu\Http\Requests\EmpresaCreateRequest;
use yavu\Http\Requests\EmpresaUpdateRequest;
use yavu\Http\Requests\AdminCreateRequest;
use yavu\Http\Requests\AdminUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\Admin;
use yavu\RegistroCoin;
use yavu\Sorteo;
use yavu\Ticket;
use yavu\User;
use RUT;
use DB;
use yavu\Empresa;
use yavu\BannerData;
use yavu\LinkBannerData;
use yavu\CategoryBannerData;
use Illuminate\Routing\Route;
use yavu\UserSession;

class AdminController extends Controller{
  private $bannerdata;
  private $linkbannerdata;
  private $categorybannerdata;
  private $existeEmpresa;
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
  }
  public function find(Route $route){
  $this->admin = Admin::findOrFail($route->getParameter('admins'));
  //return $this->user;
  }

  public function inscribe(){
    return view('admins.inscribe',[
      'admins' => Admin::select('id','nombre','apellido','email')->get(),
      'users' => User::select('id')->get(), 'companies' => Empresa::select('id')->get(),
      'raffles' => Sorteo::select('id','estado_sorteo')->get(), 'feeds' => EstadoEmpresa::select('id')->get(),
      'coins' => RegistroCoin::select('cantidad')->get(),
      'tickets' => Ticket::select('cantidad_tickets')->get(),
      'sessions' => UserSession::select('id')->get(),
      'registers' => DBRegisters::select('id')->get()
    ]);
  }

  public function saveUser(Request $request){
    $this->newuser = new User(["nombre"=>$request->nombre,
      "apellido"=>$request->apellido,
      "login"=>$request->login,
      "email"=>$request->email,
      "password"=>$request->password,
      "fecha_nacimiento"=>$request->fecha_nacimiento,
      "estado"=>"Activo",
      "fono"=>$request->fono,
      "sexo"=>$request->sexo,
      "referente"=>Carbon::now()->minute.Carbon::now()->hour.Carbon::now()->year.Carbon::now()->month.Carbon::now()->day."RY",
      "validacion"=>"by_adm",
      "ciudad"=>$request->ciudad]);
    $this->newuser->save();
    Session::flash('message','Inscripcion realizada con éxito.');
    return view('admins.inscribe',[
      'admins' => Admin::select('id','nombre','apellido','email')->get(),
      'users' => User::select('id')->get(), 'companies' => Empresa::select('id')->get(),
      'raffles' => Sorteo::select('id','estado_sorteo')->get(), 'feeds' => EstadoEmpresa::select('id')->get(),
      'coins' => RegistroCoin::select('cantidad')->get(),
      'tickets' => Ticket::select('cantidad_tickets')->get(),
      'sessions' => UserSession::select('id')->get(),
      'registers' => DBRegisters::select('id')->get()
    ]);
  }

  public function mailing(){
    return view('admins.mailing',[
      'admins' => Admin::select('id','nombre','apellido','email')->get(),
      'users' => User::select('id')->get(), 'companies' => Empresa::select('id')->get(),
      'raffles' => Sorteo::select('id','estado_sorteo')->get(), 'feeds' => EstadoEmpresa::select('id')->get(),
      'coins' => RegistroCoin::select('cantidad')->get(),
      'tickets' => Ticket::select('cantidad_tickets')->get(),
      'sessions' => UserSession::select('id')->get(),
      'registers' => DBRegisters::select('id')->get()
    ]);
  }
  public function index(){
    return view('admins.index',[
      'admins' => Admin::select('id','nombre','apellido','email')->get(),
      'users' => User::select('id')->get(), 'companies' => Empresa::select('id')->get(),
      'raffles' => Sorteo::select('id','estado_sorteo')->get(), 'feeds' => EstadoEmpresa::select('id')->get(),
      'coins' => RegistroCoin::select('cantidad')->get(),
      'tickets' => Ticket::select('cantidad_tickets')->get(),
      'sessions' => UserSession::select('id')->get(),
      'registers' => DBRegisters::select('id')->get()
    ]);
  }

  public function indexbanner(){

      // return view('admins.banneradmin.index', ['empresas' => BannerData::where('estado_banner', 'Creado')->get()]);

      $empresas = DB::table('empresas')
          ->select(['empresas.nombre', 'banner_data.id', 'banner_data.banner', 'banner_data.titulo_banner','banner_data.descripcion_banner', 'banner_data.estado_banner'])
          ->where('estado_banner', '=', 'Creado')
          ->join('banner_data', 'banner_data.id', '=', 'empresas.id')
          ->get();



          return view('admins.banneradmin.index', compact('empresas'));
  }


  public function bannercreate($empresa_id){
    $this->existeEmpresa = Empresa::find(addslashes($empresa_id));
    if($this->existeEmpresa){
      $this->bannerdata = BannerData::where('empresa_id', $empresa_id)->where('estado_banner', 'Creando')->get();
      if(count($this->bannerdata)>0){
        return view('admins.banneradmin.bannercreate', ['bannerdata' => BannerData::find($this->bannerdata[0]->id)]);
      }else{
        $this->bannerdata = new BannerData();
        $this->bannerdata->empresa_id = addslashes($empresa_id);
        $this->bannerdata->estado_banner = 'Creando';
        $this->bannerdata->save();
        return view('admins.banneradmin.bannercreate', ['bannerdata' => $this->bannerdata]);
      }
    }else{
      Session::flash('message-error', 'La empresa no existe');
      return Redirect::to('/admins/empresas/index');
    }
  }

  public function bannerstore(Request $request){
    $this->bannerdata = BannerData::findOrFail($request->banner_data_id);
    $this->bannerdata->titulo_banner = $request->titulo;
    $this->bannerdata->descripcion_banner = $request->descripcion;
    $this->bannerdata->banner = $request->banner;
    $this->bannerdata->estado_banner = 'Creado';
    $this->bannerdata-> save();

    LinkBannerData::create(['link'=>$request->link1,'titulo_link'=>$request->titulo_link1,'banner_data_id'=>$this->bannerdata->id])->save();
    LinkBannerData::create(['link'=>$request->link2,'titulo_link'=>$request->titulo_link2,'banner_data_id'=>$this->bannerdata->id])->save();

    $this->categorybannerdata = new CategoryBannerData();
    $this->categorybannerdata->category = addslashes($request->category);
    $this->categorybannerdata->banner_data_id = addslashes($this->bannerdata->id);
    $this->categorybannerdata-> save();

    Session::flash('message', 'Banner para la empresa creado correctamente');
     return Redirect::to('/admins/banneradmin/');
    //return view('admins.banneradmin.index');
  }

  public function banneredit($id){
    $this->bannerdata = BannerData::find($id);
    return view('admins.banneradmin.banneredit', ['bannerdata' => $this->bannerdata]);
  }
  public function bannerupdate(Request $request, $id){
    $this->bannerdata = BannerData::findOrFail($request->banner_data_id);
    $this->bannerdata->titulo_banner = $request->titulo;
    $this->bannerdata->descripcion_banner = $request->descripcion;
    $this->bannerdata->banner = $request->banner;
    $this->bannerdata->estado_banner = 'Creado';
    $this->bannerdata-> save();

    LinkBannerData::create(['link'=>$request->link1,'titulo_link'=>$request->titulo_link1,'banner_data_id'=>$this->bannerdata->id])->save();
    LinkBannerData::create(['link'=>$request->link2,'titulo_link'=>$request->titulo_link2,'banner_data_id'=>$this->bannerdata->id])->save();

    $this->categorybannerdata = new CategoryBannerData();
    $this->categorybannerdata->category = addslashes($request->category);
    $this->categorybannerdata->banner_data_id = addslashes($this->bannerdata->id);
    $this->categorybannerdata-> save();

    return Redirect::to('/admins/banneradmin/');
  }

  public function empresasindex(){
    return view('admins.empresasadmin.index', ['empresas' => Empresa::paginate(20)]);
  }

  public function empresascreate(){
    return view('admins.empresasadmin.create');
  }

  public function empresasedit($id){
    $this->empresa = Empresa::findOrFail($id);
    $this->user = User::findOrFail($this->empresa->user_id);
    return view('admins.empresasadmin.edit', ['empresa' => $this->empresa], ['user_email' => $this->user->email]);
  }

  public function empresasupdate(Request $request, $id){
    //AQUI VOY
    if(RUT::check($request->rut)){
        $this->empresa = Empresa::find($request->id);
        $this->empresa->fill($request->all());
        $this->empresa->save();
        Session::flash('message', 'Empresa editada correctamente');
        return Redirect::to('/admins/');
    }else{
        Session::flash('message-error', 'El rut ingresado no es válido.');
        return Redirect::to('admins/empresas/'.$request->id.'/edit');
    }
  }
  public function empresasstore(EmpresaCreateRequest $request)
  {
      $this->user = User::where('email', $request->user_email)->get();
      if (count($this->user) > 0) {
          $this->empresa = Empresa::create($request->all());
          $this->empresa->user_id = $this->user[0]->id;
          $this->empresa->save();
          Session::flash('message', 'La empresa se creó correctamente.');
      } else {
          Session::flash('message-error', 'El cliente "' . $request->user_email . '" no existe');
      }
      return redirect()->to('/admins/empresas/create');
  }
  public function create()
  {
      return view('admins.create', [
        'admins' => Admin::select('id','nombre','apellido','email')->get(),
        'users' => User::select('id')->get(), 'companies' => Empresa::select('id')->get(),
        'raffles' => Sorteo::select('id','estado_sorteo')->get(), 'feeds' => EstadoEmpresa::select('id')->get(),
        'coins' => RegistroCoin::select('cantidad')->get(),
        'tickets' => Ticket::select('cantidad_tickets')->get(),
        'sessions' => UserSession::select('id')->get(),
        'registers' => DBRegisters::select('id')->get()
      ]);
  }
  public function store(AdminCreateRequest $request)
  {
      Admin::create($request->all());
      Session::flash('message', 'Aministrador creado correctamente');
      return Redirect::to('/admins');
  }
  public function show($id)
  {

  }
  public function edit($id)
  {
      return view('admins.edit', ['admin' => $this->admin], [
        'admins' => Admin::select('id','nombre','apellido','email')->get(),
        'users' => User::select('id')->get(), 'companies' => Empresa::select('id')->get(),
        'raffles' => Sorteo::select('id','estado_sorteo')->get(), 'feeds' => EstadoEmpresa::select('id')->get(),
        'coins' => RegistroCoin::select('cantidad')->get(),
        'tickets' => Ticket::select('cantidad_tickets')->get(),
        'sessions' => UserSession::select('id')->get(),
        'registers' => DBRegisters::select('id')->get()
      ]);
  }
  public function update(AdminUpdateRequest $request, $id)
  {
      $this->admin->fill($request->all());
      $this->admin->save();
      Session::flash('message', 'Admin editado correctamente');
      return Redirect::to('/admins');
  }

  public function destroy($id)
  {
      $this->admin->delete();
      Session::flash('message', 'Admin eliminado correctamente');
      return Redirect::to('/admins');
  }


}

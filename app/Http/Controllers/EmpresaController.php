<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Requests\EmpresaCreateRequest;
use yavu\Http\Requests\EmpresaUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\Empresa;
use yavu\User;
use Illuminate\Routing\Route;
use Auth;
use DB;
use RUT;
class EmpresaController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    if(Auth::user()->check()){
      $this->user = User::find(Auth::user()->get()->id);
    }
  }
  public function find(Route $route){
    $this->empresa = Empresa::find($route->getParameter('empresas'));
  }
  public function index(Request $request){
    $empresas = Empresa::nombre($request->get('nombre'))->orderBy('id', 'DESC')->paginate(10);
    return view('empresas.index', compact('empresas'));
  }
  public function create(){

    if(isset($this->user)){
      $empresa = Empresa::find($this->user->id);
      if(!$empresa){
        return view('empresas.create');
      }else{
        Session::flash('message-error', 'Usted ya tiene registrada una empresa');
        Session::flash('message-warning', 'Si desea registrar una nueva empresa comuniquese con el administrador');
        return Redirect::to('/dashboard');
      }
    }
    return Redirect::to('/');
  }
  public function store(EmpresaCreateRequest $request){
    if(isset($request)){
      DB::table('pops')->insert(
        ['user_id' => $request->user_id,
          'empresa_id' => 1,
          'tipo' => 'activacion',
          'estado'   => 'pendiente',
          'contenido' => 'Se ha registrado tu pyme! '.$request->nombre,
          'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
          'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
      );
      Empresa::create($request->all());
      Session::flash('message', 'Empresa creada correctamente');
      return Redirect::to('/empresas/create');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function show($id){
    Redirect::to("/");
  }
  public function edit($id){

    if(isset($this->empresa) && Auth::user()->check()){
      if($this->empresa->user_id == Auth::user()->get()->id){
        return view('empresas.edit', ['empresa' => $this->empresa]);
      }
    }
    return Redirect::to('/');
  }
  public function update(EmpresaUpdateRequest $request, $id){
    if(isset($request)){
      if(RUT::check($request->rut)){
        $this->empresa->fill($request->all());
        $this->empresa->save();
        Session::flash('message', 'Empresa editada correctamente');
        return Redirect::to('/empresas');
      }else{
        Session::flash('message-error', 'El rut ingresado no es válido.');
        return Redirect::to('/dashboard');
      }
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function MostrarEmpresaPublica($empresa){
    if(isset($empresa)){
      $empresa = addslashes($empresa);

      $empresa = DB::table('empresas')
        ->join('users', 'users.id', '=', 'empresas.user_id')
        ->select('empresas.*', 'users.id as user_id')
        ->where('empresas.nombre', '=', $empresa)
        ->orderBy('empresas.created_at','desc')
        ->get();

      $mapa = Empresa::find($empresa[0]->id)->gmaps;

      if($mapa){
        return view('empresas.publicProfile', compact('empresa'), compact('mapa'));
      }else{
        return view('empresas.publicProfile', compact('empresa'));
      }
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function SolicitarEliminacion($id){
    if(isset($id)){
      $id = addslashes($id);
      DB::table('empresas')
        ->where('id', $id)
        ->update(['estado' => 'eliminar']);
      return Redirect::to('/profile');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }

  public function ValidarRutEmpresa($rut){
    if(isset($rut)){
      $rut = addslashes($rut);
      if(RUT::check($rut)){
        return RUT::clean($rut);
      }else{
        return "false";
      }
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function BuscarEmpresas($nombre = null){
    if(isset($nombre)){
      $nombre = addslashes($nombre);
      $nombreCompleto="";
      $nombre = explode('+', $nombre);
      $sqlAdd = "SELECT * FROM (SELECT id, user_id, rut, email, fono, nombre, descripcion, direccion, ciudad, region, pais, estado, imagen_perfil, imagen_portada, created_at FROM empresas)newTable";
      foreach ($nombre as $key => $value) {
        $nombreCompleto .= $value.' ';
        if ($key == 0){
          $sqlAdd .= " WHERE newTable.user_id like '%".$value."%' OR newTable.rut like '%".$value."%' OR newTable.email like '%".$value."%' OR newTable.nombre like '%".$value."%'  OR newTable.descripcion like '%".$value."%' OR newTable.direccion like '%".$value."%' OR newTable.ciudad like '%".$value."%' OR newTable.region like '%".$value."%' OR newTable.pais like '%".$value."%' OR newTable.estado like '%".$value."%'";
        }else{
          $sqlAdd .= " OR newTable.rut like '%".$value."%' OR newTable.email like '%".$value."%' OR newTable.nombre like '%".$value."%' OR newTable.descripcion like '%".$value."%' OR newTable.direccion like '%".$value."%' OR newTable.ciudad like '%".$value."%' OR newTable.region like '%".$value."%' OR newTable.pais like '%".$value."%' OR newTable.estado like '%".$value."%'";
        }
      }
      $sqlAdd .= " OR newTable.rut like '%".$nombreCompleto."%' OR newTable.email like '%".$nombreCompleto."%' OR newTable.nombre like '%".$nombreCompleto."%' OR newTable.descripcion like '%".$value."%' OR newTable.direccion like '%".$nombreCompleto."%' OR newTable.ciudad like '%".$nombreCompleto."%' OR newTable.region like '%".$nombreCompleto."%' OR newTable.pais like '%".$nombreCompleto."%' OR newTable.estado like '%".$nombreCompleto."%'";
      $sqlAdd .= "ORDER BY newTable.created_at DESC";
      $empresas = DB::select($sqlAdd);
    }else{
      $sqlAdd = 'SELECT * FROM (SELECT id, user_id, rut, email, fono, nombre, descripcion, direccion, ciudad, region, pais, estado, imagen_perfil, imagen_portada, created_at FROM empresas)newTable WHERE newTable.rut like "%7%" OR newTable.email like "%@%" OR newTable.nombre like "%empresa%" OR newTable.estado like "%activo%" ';
      $empresas = DB::select($sqlAdd);
      return response()->json(
          $empresas
      );
    }
    return response()->json($empresas);

  }


  public function searchcat(){
    $categories = \Input::get('categories');
    $vacancies = \Vacancy::whereIn('category_id', $categories)->get();
    return \View::make('vacancies.empty')->with('vacancies', $vacancies);
}

  public function destroy($id){
    $this->empresa->delete();
    Session::flash('message', 'Empresa eliminada correctamente');
    return Redirect::to('/empresas');
  }
  
}

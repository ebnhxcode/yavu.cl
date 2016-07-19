<?php
namespace yavu\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;
use yavu\Empresa;
use yavu\Http\Requests;
use Session;
use Redirect;
use Auth;
use yavu\CompanyImageStatus;
use yavu\EstadoEmpresa;
use yavu\Http\Controllers\Controller;
use DB;
class EstadoEmpresaController extends Controller{
  public function __construct(){
    if(Auth::user()->check()){
      $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    Redirect::to("/");
  }
  public function find(Route $route){
    if(Auth::user()->check()){
      $this->user = User::findOrFail($route->getParameter('usuarios'));
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function store(Request $request){
    $request->status = addslashes($request->status);
    $companyStatus = EstadoEmpresa::create($request->all());
    if($request->company_image_status){
      CompanyImageStatus::create(['status_id'=>$companyStatus->id, 'company_image_status'=>$request->company_image_status]);
    }
    return redirect()->to('/feeds');
  }
  public function CargarEstadoEmpresa($idUltima, $empresa){
    if(isset($idUltima) && isset($empresa)){
      $this->company = Empresa::where('nombre', $empresa)->first();

      if((int) $idUltima == "0"){
        $estado_empresas = DB::table('estado_empresas')
          ->join('users', 'users.id', '=', 'estado_empresas.user_id')
          ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
          ->select('users.*', 'estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa', 'empresas.id as idEmpresa')
          ->where('estado_empresas.user_id', '=', $this->company->user_id)
          ->where('empresas.nombre', '=', $empresa)
          ->where('estado_empresas.id', '>', (int) $idUltima)
          ->orderBy('estado_empresas.created_at','desc')
          ->limit('5')
          ->get();

      }elseif((int) $idUltima <> "0"){
        $estado_empresas = DB::table('estado_empresas')
          ->join('users'  , 'users.id', '=', 'estado_empresas.user_id')
          ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
          ->select('users.*', 'estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa', 'empresas.id as idEmpresa')
          ->where('estado_empresas.user_id', '=', $this->company->user_id)
          ->where('estado_empresas.id', '<', (int) $idUltima)
          ->orderBy('estado_empresas.created_at','desc')
          ->limit('5')
          ->get();
      }
      return response()->json($estado_empresas);
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
}

<?php
namespace yavu\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Requests\EmpresaCreateRequest;
use yavu\Http\Requests\EmpresaUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\Empresa;
use yavu\User;
use yavu\Sorteo;
use Illuminate\Routing\Route;
use Auth;
use DB;
use RUT;
use yavu\Visit;

class EmpresaController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    if(Auth::user()->check()){
      $this->user = User::find(Auth::user()->get()->id);
      $this->empresa = Empresa::where('user_id', $this->user->id);
    }
  }
  public function find(Route $route){
    $this->empresa = Empresa::find($route->getParameter('empresas'));
  }
  public function index(Request $request){
    return view('empresas.index', ['empresas' => Empresa::paginate(15)]);
  }
  public function create(){

    if(isset($this->user)){
      $empresa = Empresa::where('user_id', '=', $this->user->id)->get();
      if(count($empresa) < 1){
        return view('empresas.create');
      }else{
        Session::flash('message-info', 'Usted ya tiene registrada una empresa');
        Session::flash('message-warning', 'Si desea registrar una nueva empresa comuniquese con el administrador');
        return view('categorias.create', ['empresa' => $empresa[0]]);
      }
    }
    return Redirect::to('/');
  }

  public function EstadisticasDeMiEmpresa(){
    $this->empresa = Empresa::where('user_id', $this->user->id)->get();
    $this->data = $this->empresa[0]->visits()->get();
    $this->cMasculino = 0; $this->cFemenino = 0; $this->cSinDefinir = 0;

    $this->coinsOtorgadas = $this->empresa[0]->coins_otorgadas()->get()->count('user_id');

    foreach ($this->data as $d){
      if($d->sexo == 'Masculino'){
        $this->cMasculino+=1;
      }else if($d->sexo == 'Femenino'){
        $this->cFemenino+=1;
      }else{
        $this->cSinDefinir+=1;
      }
    }

    $this->statistics = [
      0 => $this->cMasculino,
      1 => $this->cFemenino,
      2 => $this->cSinDefinir,
      3 => $this->cMasculino+$this->cFemenino+$this->cSinDefinir,
      4 => $this->coinsOtorgadas,
    ];

    ///dd( $this->statistics );
    return view('empresas.companyStatistics', ['statistics' => $this->statistics]);

  }

  public function store(EmpresaCreateRequest $request){
    if(isset($request) && isset($this->user)){
      DB::table('pops')->insert(
        ['user_id' => $this->user->id,
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
    $this->empresa = Empresa::find($id);
    if ($this->empresa) {
      return $this->MostrarEmpresaPublica($this->empresa->nombre);
    }else{
      return redirect()->to('/empresas');
    }


  }
  public function edit($id){

    if(isset($this->empresa) && isset($this->user)){
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

      $empresa = DB::table('empresas')
        ->join('users', 'users.id', '=', 'empresas.user_id')
        ->select('empresas.*', 'users.id as user_id')
        ->where('empresas.nombre', '=', addslashes($empresa))
        ->orderBy('empresas.created_at','desc')
        ->get();

      $this->visita = new Visit(['user_id'=>$this->user->id, 'empresa_id' => $empresa[0]->id, 'sexo' => $this->user->sexo, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ]);
      if($empresa[0]->user_id != $this->user->id){
        $this->visita->save();
      }

      $mapa = Empresa::find($empresa[0]->id)->gmaps;

      if($mapa){
        return view('empresas.publicProfile', compact('empresa'), compact('mapa'));
      }else{
        return view('empresas.publicProfile', compact('empresa'));
      }
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function RaffleList($empresa){
      $empresa = addslashes($empresa);
      $this->empresa = Empresa::where('nombre', $empresa)->get();
      $this->user = User::find($this->empresa[0]->user_id);
      return view('empresas.raffleList', ['sorteos' => $this->user->sorteos()->get()->where('estado_sorteo', 'Lanzado')], ['empresa' => $this->empresa]);


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
    $exist = Empresa::where('rut', '=', RUT::clean($rut))->first();
    if($exist){
      return "registrado";
    }
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

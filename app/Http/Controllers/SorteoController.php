<?php

namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Requests\SorteoCreateRequest;
use yavu\Http\Requests\SorteoUpdateRequest;
use yavu\Http\Controllers\Controller;
use yavu\ParticipanteSorteo;
use yavu\Sorteo;
use yavu\Empresa;
use yavu\User;
use Session;
use Redirect;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Routing\Route;

class SorteoController extends Controller{
  public function __construct(){
    //$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy', 'show']]);
    if(Auth::user()->check()){
      return $this->user = User::find(Auth::user()->get()->id);
    }

  }
  public function BuscarSorteos(){
    if(isset($nombre)){
      $nombre = addslashes($nombre);
      $nombreCompleto="";
      $nombre = explode('+', $nombre);
      $sqlAdd = "SELECT * FROM (SELECT id, estado_sorteo,imagen_sorteo, nombre_sorteo, descripcion FROM sorteos)newTable";
      foreach ($nombre as $key => $value) {
        $nombreCompleto .= $value.' ';
        if ($key === 0){
          $sqlAdd .= " WHERE newTable.nombre_sorteo like '%".$value."%' OR newTable.descripcion like '%".$value."%' OR newTable.estado_sorteo like '%".$value."%'";
        }else{
          $sqlAdd .= " OR newTable.nombre_sorteo like '%".$value."%' OR newTable.descripcion like '%".$value."%' OR newTable.estado_sorteo like '%".$value."%'";
        }
      }
      $sqlAdd .= " OR newTable.nombre_sorteo like '%".$nombreCompleto."%' OR newTable.descripcion like '%".$nombreCompleto."%' OR newTable.estado_sorteo like '%".$nombreCompleto."%'";
      $sqlAdd .= "ORDER BY newTable.nombre_sorteo DESC";
      $sorteos = DB::select($sqlAdd);
    }else{
      $sqlAdd = 'SELECT * FROM (SELECT id, estado_sorteo,imagen_sorteo, nombre_sorteo, descripcion FROM sorteos)newTable WHERE newTable.nombre_sorteo like "%sorteo%" OR newTable.descripcion like "%sorteo%" OR newTable.estado_sorteo like "%activo%" ';
      $sorteos = DB::select($sqlAdd);
      return response()->json(
        $sorteos
      );
    }
    return response()->json(
      'Acceso denegado'
    );
  }
  public function CanjearTicket($user_id){
    if(isset($user_id)){
      $coinsUsuario = DB::table('registro_coins')
        ->where('user_id', $user_id)
        ->sum('cantidad');
      if($coinsUsuario >= 100){
        DB::table('registro_coins')->insert(
          ['user_id'      => $user_id,
            'motivo'      => 'Canje (compra) de ticket',
            'cantidad'    => '-100',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
          ]
        );

        DB::table('tickets')->insert(
          ['user_id'            => $user_id,
            'cantidad_tickets'  => 1,
            'monto'             => 100,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
          ]
        );

        DB::table('pops')->insert(
          ['user_id' => $user_id,
            'empresa_id'  => 1,
            'tipo'        => 'ticket',
            'estado'      => 'pendiente',
            'contenido'   => 'Se canjeado un ticket por coins!',
            'created_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time()),
            'updated_at'  => strftime( "%Y-%m-%d-%H-%M-%S", time())
          ]
        );
        return response()->json([
          "Mensaje: " => "Creado"
        ]);
      }else{
        return response()->json(
          "Sin saldo para el servicio"
        );
      }
    }
    return response()-json(
      'Acceso denegado'
    );
  }
  public function CargarDetallesSorteo($sorteo_id){
    if(isset($sorteo_id)){
      $ganador = DB::table('participante_sorteos')
        ->where('sorteo_id', $sorteo_id)
        ->get();
      return response()->json($ganador);
    }
    return response()->json(
      'Acceso denegado'
    );
  }
  public function ContarTicketsEnSorteo($id){
    if(isset($id)){
      return response()->json(Sorteo::find($id)->participante_sorteos);
    }
    return response()->json('Acceso denegado');
  }
  public function create(){
    if(isset($this->user)){
      $empresa = Empresa::find($this->user->id);
      if(!$empresa){
        return view('sorteos.create');
      }
      Session::flash('message', '¡Para crear un sorteo para tus clientes debes tener una empresa creada, creala <a href="/empresas/create">Aquí</a>!');
      return Redirect::to("/dashboard");
    }
    Session::flash('message', '¡Para crear un sorteo para tus clientes debes iniciar sesión!');
    return Redirect::to("/login");
  }
  public function destroy($id){
    if(isset($id)){
      $this->sorteo->delete();
      Session::flash('message', 'Sorteo eliminado correctamente');
      return Redirect::to('/sorteos');
    }
    return responde()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function edit($id){
    if(isset($id)){
      return view('sorteos.edit', ['sorteo' => $this->sorteo]);
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function find(Route $route){
      $this->sorteo = Sorteo::find($route->getParameter('sorteos'));
      //return $this->user;
    }
  public function index(){
    if(Auth::user()->check()){
      $sorteos = DB::table('sorteos')->paginate(10);
      return view('sorteos.index', compact('sorteos'));
    }
    Session::flash('message', '¡Para mirar los sorteos que yavu tiene para ti, debes iniciar sesión!');
    return Redirect::to("/login");
  }
  public function MostrarGanador($ganador){
    if(isset($ganador)){
      $ganador = ParticipanteSorteo::find($ganador)->users;
      return response()->json($ganador);
    }
    return responde()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function RegistrarGanadorSorteo(){
    return "true wn";
  }
  public function show($id){
    if(!Auth::user()->check()){
      Session::flash('message', '¡Debes iniciar sesión!');
      return Redirect::to("/login");
    }
    if(isset($id)){
      return view('sorteos.show', ['sorteo' => $this->sorteo]);
    }
    return responde()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function store(Request $request){
      if(Sorteo::create($request->all())){
        DB::table('pops')->insert(
          ['user_id' => $request->user_id,
          'empresa_id' => 1,
          'tipo' => 'sorteo',
          'estado'   => 'pendiente',
          'contenido' => 'Haz creado un nuevo sorteo!',
          'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
          'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
        );
        Session::flash('message', 'Sorteo creado correctamente');
        return Redirect::to('/sorteos/create');
      }
      return response()->json('Acceso denegado');
    }
  public function update($id, SorteoUpdateRequest $request){
      $this->sorteo->fill($request->all());
      $this->sorteo->save();
      Session::flash('message', 'sorteo validado correctamente');
      return Redirect::to('/sorteos');
    }
  public function UsarTicket($user_id, $sorteo_id){
      $ticketsUsuario = DB::table('tickets')
        ->where('user_id', $user_id)
        ->sum('cantidad_tickets');
      if($ticketsUsuario > 0){
        DB::table('tickets')->insert(
          ['user_id' => $user_id,
          'cantidad_tickets' => -1,
          'monto' => -100,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
          ]
        );
        //Ahora rindo el ticket
        DB::table('participante_sorteos')->insert(
          ['user_id' => $user_id,
          'sorteo_id' => $sorteo_id,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
          ]
        );
        //Ahora notifico
        DB::table('pops')->insert(
          ['user_id' => $user_id,
          'empresa_id' => 1,
          'tipo' => 'ticket',
          'estado'   => 'pendiente',
          'contenido' => 'Haz usado un ticket!',
          'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
          'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
        );
        return 'Exito';
      }else{
        return 'sin saldo de tickets';
      }
      return 'hola '.$user_id;
    }
}

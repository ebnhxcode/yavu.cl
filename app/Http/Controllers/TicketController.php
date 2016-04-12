<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\TicketCreateRequest;
use yavu\Ticket;
use yavu\User;
use Session;
use Carbon\Carbon;
use Auth;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class TicketController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    if(Auth::user()->check()){
      $this->user = User::find(Auth::user()->get()->id);
    }
    if(Auth::admin()->check()){
      $this->admin = Admin::find(Auth::admin()->get()->id);
    }
  }
  public function create(){
    if(Auth::user()->check()){
      return view('tickets.create');
    }
    Session::flash('message', '¡Para comprar tickets debes iniciar sesión!');
    return Redirect::to('/login');
  }
  public function ContarTickets(){
    if(Auth::user()->check()){
      $tickets = DB::table('tickets')
        ->select(DB::raw('sum(cantidad_tickets) as tickets'))
        ->where('user_id', '=', Auth::user()->get()->id)
        ->groupBy('user_id')
        ->get();
      return response()->json(
        $tickets
      );
    }else{
      return response()->json(
        'Registrate o inicia sesión'
      );
    }
  }
  public function EfectuarCompra($user_id, $cantidadtickets){
    if(isset($user_id) && isset($cantidadtickets)){
      $coinsUsuario = DB::table('registro_coins')
        ->where('user_id', $user_id)
        ->sum('cantidad');
      $valorCompra = (int) $cantidadtickets*100;
      if((int) $coinsUsuario >= (int) $valorCompra ){
        DB::table('registro_coins')->insert(
          ['user_id' => $user_id,
            'motivo' => 'Compra de ticket'.(($cantidadtickets>1)?'s':''),
            'cantidad' => $valorCompra*-1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]
        );
        DB::table('tickets')->insert(
          ['user_id' => $user_id,
            'cantidad_tickets' => $cantidadtickets,
            'monto' => ((int) $cantidadtickets * 100),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]
        );
        DB::table('pops')->insert(
          ['user_id' => $user_id,
            'empresa_id' => 1,
            'tipo' => 'ticket',
            'estado'   => 'pendiente',
            'contenido' => 'Haz comprado 1 ticket!',
            'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
            'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
        );
        return response()->json(
          'Exito'
        );
      }else{
        return response()->json(
          'Sin saldo para el servicio'
        );
      }
    }
    return response()->json(
      'Acceso inconrrecto'
    );
  }
  public function find(Route $route){
    $this->ticket = Ticket::find($route->getParameter('tickets'));
  }
  public function index(){

    if(Auth::user()->check()){
      $tickets = Ticket::paginate(5);
      return view('tickets.index', compact('tickets'));
    }
    Session::flash('message', '¡Para comprar tickets debes iniciar sesión!');
    return Redirect::to('/login');
  }
  public function show($id){
  }
  public function store(TicketCreateRequest $request){
    Ticket::create($request->all());
    Session::flash('message', 'Ticket creado correctamente');
    return Redirect::to('/tickets');
  }
  public function VerificarTickets($user_id){
    if(isset($user_id)){
      $ticketsUsuario = DB::table('tickets')
        ->where('user_id', $user_id)
        ->sum('cantidad_tickets');
      return response()->json(
        $ticketsUsuario
      );
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
}

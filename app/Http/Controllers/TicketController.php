<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\TicketCreateRequest;
use yavu\RegistroCoin;
use yavu\Ticket;
use yavu\User;
use yavu\Pop;
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
    if(isset($this->user)){
      return view('tickets.create');
    }
    Session::flash('message', '¡Para comprar tickets debes iniciar sesión!');
    return Redirect::to('/login');
  }
  public function ContarTickets(){
    if(isset($this->user)){
      return response()->json($this->user->tickets->sum('cantidad_tickets'));
    }else{
      return response()->json(['Mensaje: ' => 'Registrate o inicia sesión']);
    }
  }
  public function EfectuarCompra($user_id, $cantidadtickets){
    if(isset($this->user) && isset($cantidadtickets)){
      $valorCompra = (int) $cantidadtickets*100;
      if($this->user->registro_coins->sum('cantidad') >= (int) $valorCompra ){
        $this->registro_coins = new RegistroCoin(['user_id' => $this->user->id,'motivo' => 'Compra de ticket'.(($cantidadtickets>1)?'s':''),'cantidad' => $valorCompra*-1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        $this->user->registro_coins()->save($this->registro_coins);
        $this->ticket = new Ticket(['user_id' => $this->user->id,'cantidad_tickets' => $cantidadtickets,'monto' => ((int) $cantidadtickets * 100),'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        $this->user->tickets()->save($this->ticket);
        $this->pop = new Pop(['user_id' => $this->user->id,'empresa_id' => 1,'tipo' => 'ticket','estado'   => 'pendiente','contenido' => 'Haz comprado '.$cantidadtickets.' ticket'.(($cantidadtickets>1)?'s!':'!'),'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]);
        $this->user->pops()->save($this->pop);
        return response()->json(['Mensaje: ' => 'Exito']);
      }else{
        return response()->json(['Mensaje: ' => 'Sin saldo para el servicio']);
      }
    }
    return response()->json(['Mensaje: ' => 'Acceso inconrrecto']);
  }
  public function find(Route $route){
    $this->ticket = Ticket::find($route->getParameter('tickets'));
  }
  public function index(){
    if(isset($this->user)){
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
    if(isset($this->user)){
      return response()->json($this->user->tickets->sum('cantidad_tickets'));
    }else{
      return response()->json(['Mensaje: ' => 'Registrate o inicia sesión']);
    }
  }
}

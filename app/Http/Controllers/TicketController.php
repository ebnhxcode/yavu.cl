<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\TicketCreateRequest;
use yavu\RegistroCoin;
use yavu\Ticket;
use yavu\BannerData;
use yavu\User;
use yavu\Sorteo;
use yavu\Empresa;
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
      $this->user = User::findOrFail(Auth::user()->get()->id);
    }
    if(Auth::admin()->check()){
      $this->admin = Admin::findOrFail(Auth::admin()->get()->id);
    }
  }
  public function create(){
    return view('tickets.history');
  }
  public function ContarTickets(){
    return response()->json($this->user->tickets->sum('cantidad_tickets'));
  }
  public function EfectuarCompra(Request $request){
    if(isset($request->cantidadtickets)){
      $valorCompra = (int)$request->cantidadtickets*100;

      if($this->user->registro_coins->sum('cantidad') >= (int) $valorCompra ){
        $this->registro_coins = new RegistroCoin(['user_id' => $this->user->id,'motivo' => 'Compra de ticket'.(($request->cantidadtickets>1)?'s':''),'cantidad' => $valorCompra*-1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        $this->user->registro_coins()->save($this->registro_coins);
        $this->ticket = new Ticket(['user_id' => $this->user->id,'cantidad_tickets' => $request->cantidadtickets,'monto' => ((int) $request->cantidadtickets * 100),'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        $this->user->tickets()->save($this->ticket);
        //$this->pop = new Pop(['user_id' => $this->user->id,'empresa_id' => 1,'tipo' => 'ticket','estado'   => 'pendiente','contenido' => 'Haz comprado '.$cantidadtickets.' ticket'.(($cantidadtickets>1)?'s!':'!'),'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]);
        //$this->user->pops()->save($this->pop);
        return response()->json(['Mensaje: ' => 'Exito']);
      }else{
        return response()->json(['Mensaje: ' => 'Sin saldo para el servicio']);
      }
    }
    return response()->json(['Mensaje: ' => 'Acceso inconrrecto']);
  }
  public function find(Route $route){
    $this->ticket = Ticket::findOrFail($route->getParameter('tickets'));
  }
  public function history(){
    $this->registros_participante = $this->user->registro_participante_sorteos()->orderBy('created_at', 'desc')->limit('20')->get();
    $this->registro_tickets = $this->user->registro_tickets()->orderBy('created_at', 'desc')->limit('20')->get();


    return view('tickets.history', ['registros_participante' => $this->registros_participante, 'rtickets' => $this->registro_tickets, 'userSession'=>$this->user]);
  }
  public function index(){
    $tickets = Ticket::paginate(5);
    $cantidadtickets = ['1'=>1];
    for($n=1;$n<10;$n+=1){
      $cantidadtickets += [$n*5=>$n*5];
    }
    return view('tickets.index', ['tickets' => $tickets, 'cantidadtickets' => $cantidadtickets, 'sorteos'=>Sorteo::orderByRaw('RAND()')->where('estado_sorteo','Activo')->get(), 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(), 'userSession' => $this->user, 'bannersRandomLeft' => BannerData::orderByRaw('RAND()')->take(2)->get()]);
  }
  public function show($id){
  }
  public function store(TicketCreateRequest $request){
    Ticket::create($request->all());
    Session::flash('message', 'Ticket creado correctamente');
    return Redirect::to('/tickets/history');
  }
  public function VerificarTickets($user_id){
    return response()->json($this->user->tickets->sum('cantidad_tickets'));
  }
}

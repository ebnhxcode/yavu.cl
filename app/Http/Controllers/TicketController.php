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
class TicketController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->ticket = Ticket::find($route->getParameter('tickets'));
    }    
    public function index()
    {
        $tickets = Ticket::paginate(5);
        return view('tickets.index', compact('tickets'));
    }
    public function create()
    {
        return view('tickets.create');
    }

    public function ContarTickets()
    {
        $tickets = DB::table('tickets')
                    ->select(DB::raw('sum(cantidad_tickets) as tickets'))
                    ->where('user_id', '=', Auth::user()->get()->id)   
                    ->groupBy('user_id')
                    //->orderBy('created_at','desc')   
                    ->get();        
        return response()->json(
            $tickets
        );        
    }

    public function EfectuarCompra($user_id, $cantidadtickets)
    {
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
            return response()->json(
               'Exito'
            );                       

        }else{
            return response()->json(
               'Sin salido para el servicio'               
            );                      
        }
        return true;
    }
  
    public function store(TicketCreateRequest $request)
    {
        Ticket::create($request->all());
        Session::flash('message', 'Ticket creado correctamente');
        return Redirect::to('/tickets');
    }
    public function show($id)
    {

    }   
    public function VerificarTickets($user_id)
    {
        $ticketsUsuario = DB::table('tickets')
                ->where('user_id', $user_id)
                ->sum('cantidad_tickets');           
        return response()->json(
            $ticketsUsuario
        );
    }
}

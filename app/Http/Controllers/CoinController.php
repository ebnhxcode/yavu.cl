<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Requests\CoinCreateRequest;
use yavu\Http\Requests\CoinUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\RegistroCoin;
use Auth;
use Illuminate\Routing\Route;
use DB;

class CoinController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->coin = RegistroCoin::find($route->getParameter('coins'));
        //return $this->user;   
    }     
    public function index()
    {
        //$coin = new CoinController;
        //$historialcoins = $this->HistorialCoins();
        //dd($historialcoins);
        $historialcoins = DB::table('registro_coins')
                    ->join('users', 'users.id', '=', 'registro_coins.user_id')   
                    ->select('registro_coins.*', 'users.nombre')
                    ->where('user_id', '=', Auth::user()->get()->id)   
                    ->orderBy('created_at','desc')   
                    //->limit('10')
                    ->get();  

        return view('coins.index', compact('historialcoins'));   
    }
    public function create()
    {
        return view('coins.create');
    }
    public function ContarCoins(){   
        $coins = DB::table('registro_coins')
                    ->select(DB::raw('sum(cantidad) as coins'))
                    ->where('user_id', '=', Auth::user()->get()->id)   
                    ->groupBy('user_id')
                    //->orderBy('created_at','desc')   
                    ->get();        
        return response()->json(
            $coins
        );
    }    
    public function HistorialCoins(){   
        $historialcoins = DB::table('registro_coins')
                    ->join('users', 'users.id', '=', 'registro_coins.user_id')   
                    ->select('registro_coins.*', 'users.nombre')
                    ->where('user_id', '=', Auth::user()->get()->id)   
                    ->orderBy('created_at','desc')   
                    ->limit('5')
                    ->get();        
        return response()->json(
            $historialcoins
        );
    }  
    public function store(CoinCreateRequest $request)
    {
        RegistroCoin::create($request->all());
        Session::flash('message', 'Carga creada correctamente');
        return Redirect::to('/coins/create');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
		return view('coins.edit', ['coin' => $this->coin]); 
    }
    public function update(CoinUpdateRequest $request, $id)
    {
      $this->coin->fill($request->all());
      $this->coin->save();
      Session::flash('message', 'Carga editada correctamente');
      return Redirect::to('/coins');
    }
    public function destroy($id)
    {
	    $this->coin->delete();
	    Session::flash('message', 'Carga eliminada correctamente');
	    return Redirect::to('/coins');
    }
}

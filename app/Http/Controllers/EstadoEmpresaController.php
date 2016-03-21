<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use Session;
use Redirect;
use Auth;
use yavu\Estado;
use yavu\EstadoEmpresa;
use yavu\Http\Controllers\Controller;
use DB;
class EstadoEmpresaController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
        global $Nempresa;
    }
    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuarios'));
        //return $this->user;   
    }        
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        if($request->ajax()){
            EstadoEmpresa::create($request->all());
            //Session::flash('message', 'Publicacion creada correctamente');
            return response()->json([
                "Mensaje: " => "Creado"                
            ]);
            //CargarEstadoEmpresa();
        }
        /*
        Estado::create($request->all());
        Session::flash('message', 'Publicacion creada correctamente');
        return Redirect::to('/profile');  
        */           
    }
    public function CargarEstadoEmpresa($idUltima, $empresa){
        //$estados = Estado::All();
        //$estados = DB::select('select * from estados where user_id = :id', ['id' => 1]);


        $nombreEmp;
        $nombreEmp = DB::table('empresas')
                            ->select('user_id')
                            ->where('nombre', '=', $empresa)
                            ->limit('1')
                            ->get();

        //dd($nombreEmp[0]->user_id);

        if((int) $idUltima == "0"){
            $estado_empresas = DB::table('estado_empresas')                    
                        ->join('users', 'users.id', '=', 'estado_empresas.user_id')
                        ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
                        ->select('users.*', 'estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa')    
                        ->where('estado_empresas.user_id', '=', $nombreEmp[0]->user_id)
                        ->where('empresas.nombre', '=', $empresa)
                        ->where('estado_empresas.id', '>', (int) $idUltima)
                        ->orderBy('estado_empresas.created_at','desc')   
                        ->limit('5')
                        ->get();  

        }elseif((int) $idUltima <> "0"){
            $estado_empresas = DB::table('estado_empresas')                    
                        ->join('users'  , 'users.id', '=', 'estado_empresas.user_id')
                        ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
                        ->select('users.*', 'estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa')    
                        ->where('estado_empresas.user_id', '=', $nombreEmp[0]->user_id)   
                        ->where('estado_empresas.id', '<', (int) $idUltima)
                        ->orderBy('estado_empresas.created_at','desc')   
                        ->limit('5')
                        ->get();
        }
        

        //dd($estados);
        return response()->json(
            $estado_empresas
        );
        /*
            return response()->json(
                $estados->toArray()
            );        
        */
    }    
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    
}

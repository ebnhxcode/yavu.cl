<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use Auth;
use yavu\Estado;
use yavu\InteraccionEstado;
use yavu\EstadoEmpresa;
use DB;
class InteraccionEstadoController extends Controller
{
    public function index()
    {
    }
    public function create()
    {
    }
    public function ContarInteracciones($status_id){
        $interacciones = DB::table('interaccion_estados')                    
                ->select('status_id', 'user_id')   
                ->where('status_id', '=', $status_id)   
                ->get();  

        return response()->json(
                $interacciones
            );
    }
    public function store(Request $request)
    {
        $estado = InteraccionEstado::where('user_id', $request->user_id)->where('status_id', $request->status_id)->first();

        if($request->ajax() && !$estado){
            InteraccionEstado::create($request->all());
    

            DB::table('registro_coins')->insert(
                ['user_id' => $request->user_id, 
                'cantidad' => '10', 
                'motivo'   => 'Cobro de coins',
                'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
                'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
            );            
            //Ahora notifico al cliente
            DB::table('pops')->insert(
                ['user_id' => $request->user_id, 
                'empresa_id' => 1,
                'tipo' => 'coins', 
                'estado'   => 'pendiente',
                'contenido' => 'Tienes coins cobrados de una publicación!',
                'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
                'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
            );    

            return response()->json([
                "Mensaje: " => "Creado"                
            ]);                    

        }else{
            DB::table('interaccion_estados')
                ->where('status_id', '=', $request->status_id)
                ->where('user_id', '=', $request->user_id)
                ->delete();  
        }           
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}

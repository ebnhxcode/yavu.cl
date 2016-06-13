<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use Auth;
use yavu\Estado;
use yavu\Pop;
use yavu\RegistroCoin;
use yavu\User;
use yavu\InteraccionEstado;
use yavu\EstadoEmpresa;
use DB;
class InteraccionEstadoController extends Controller{
  public function __construct(){
    if(Auth::user()->check()){
      $this->user = User::findOrFail(Auth::user()->get()->id);
    }
  }
  public function index(){
  }
  public function create(){
  }
  public function ContarInteracciones($status_id){
    if(isset($status_id)){
      $status_id = addslashes($status_id);

      $interacciones = DB::table('interaccion_estados')
        ->select('status_id', 'user_id')
        ->where('status_id', '=', $status_id)
        ->where('estado', '=', 'activo')
        ->get();
      return response()->json(
        $interacciones
      );
    }
    return response()->json('Acceso denegado');
  }
  public function destroy($id){
  }
  public function edit($id){
  }
  public function show($id){
  }
  public function store(Request $request){



    $estado = InteraccionEstado::where('user_id', $request->user_id)
      ->where('status_id', $request->status_id)
      ->first();


    if($request->ajax() && !$estado) {
      //InteraccionEstado::create($request->all());

      

      DB::table('interaccion_estados')->insert(
        ['user_id' => $request->user_id,
          'status_id' => $request->status_id,
          'empresa_id' => $request->empresa_id,
          'estado' => 'activo',
          'created_at' => strftime("%Y-%m-%d-%H-%M-%S", time()),
          'updated_at' => strftime("%Y-%m-%d-%H-%M-%S", time())]
      );

      $this->interaccion = EstadoEmpresa::findOrFail(addslashes($request->status_id));

      if($this->interaccion->user_id == $this->user->id){

        return response()->json(["Mensaje: " => "No puedes cobrar coins de tus propias publicaciones"]);

      }else{
        $this->registro_coins = new RegistroCoin(['user_id' => $request->user_id,'cantidad' => '40','motivo' => 'Cobro de coins','created_at' => strftime("%Y-%m-%d-%H-%M-%S", time()),'updated_at' => strftime("%Y-%m-%d-%H-%M-%S", time())]);
        $this->registro_coins->save();
        $this->pop = new Pop(['user_id' => $request->user_id,'empresa_id' => 1,'tipo' => 'coins','estado' => 'pendiente','contenido' => 'Tienes coins cobrados de una publicación!','created_at' => strftime("%Y-%m-%d-%H-%M-%S", time()),'updated_at' => strftime("%Y-%m-%d-%H-%M-%S", time())]);
        $this->pop->save();
        //Ahora notifico al cliente
        return response()->json(["Mensaje: " => "Creado"]);
      }



  }else{
    if($estado->estado == "activo"){
      DB::table('interaccion_estados')
        ->where('user_id', $estado->user_id)
        ->where('status_id', $estado->status_id)
        ->update(['estado' => 'desactivado']);
    }else{
      DB::table('interaccion_estados')
        ->where('user_id', $estado->user_id)
        ->where('status_id', $estado->status_id)
        ->update(['estado' => 'activo']);
    }


      /*
            DB::table('interaccion_estados')
              ->where('status_id', '=', $request->status_id)
              ->where('user_id', '=', $request->user_id)
              ->delete();
      */

    }
  }
  public function update(Request $request, $id){
  }
}

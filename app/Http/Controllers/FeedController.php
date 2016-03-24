<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\FeedCreateRequest;
use yavu\Http\Requests\FeedUpdateRequest;
use Session;
use Redirect;
use yavu\Feed;
use yavu\EstadoEmpresa;
use Auth;
use Illuminate\Routing\Route;
use DB;
class FeedController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
        $this->feed = Feed::find($route->getParameter('feeds'));
        //return $this->user;   
    }       
    public function index()
    {
        return view('feeds.index');
    }

    //select * from estado_empresas where empresa_id in (select empresa_id from followers where user_id = 18)

    public function CargarFeeds($idUltima){
          if((int) $idUltima == "0"){
          $feeds = DB::table('estado_empresas')
              ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
              ->select('estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa')
              ->where('estado_empresas.id', '>', (int) $idUltima)
              ->orderBy('estado_empresas.created_at','desc')
              ->limit('10')
              ->get();

          }elseif((int) $idUltima <> "0"){
          $feeds = DB::table('estado_empresas')
              ->join('empresas'  , 'empresas.id', '=', 'estado_empresas.empresa_id')
              ->select('estado_empresas.*', 'empresas.nombre as nombreEmp', 'empresas.imagen_perfil as imagen_perfil_empresa')
              ->where('estado_empresas.id', '<', (int) $idUltima)
              ->orderBy('estado_empresas.created_at','desc')
              ->limit('10')
              ->get();
          }

      return response()->json(
        $feeds
      );
    }

    public function CargarFeedsEmpresa($idUltima, $empresa){
      return 'Cargar feeds empresa';
    }

    public function create()
    {
          return view('feeds.create');
    }

    public function store(FeedCreateRequest $request)
    {
		    if($request->ajax()){
			    EstadoEmpresa::create($request->all());
			    //Session::flash('message', 'Publicacion creada correctamente');
			    return response()->json([
				    "Mensaje: " => "Creado"
			    ]);
			    //CargarEstadoEmpresa();
		    }
    }
    public function show($id)
    {
        
    }
    public function EliminarFeed($id)
    {
      $id = addslashes($id);
      if(isset($id) && $id !== ""){
        DB::table('estado_empresas')->where('id', '=', $id)->delete();
        return response()->json([
          "Mensaje: " => "Eliminado"
        ]);
      }
      return response()->json([
        "Mensaje: " => "Error"
      ]);
    }
    public function edit($id)
    {
        return view('feeds.edit', ['feed' => $this->feed]);
    }
    public function update(FeedUpdateRequest $request, $id)
    {
        $this->feed->fill($request->all());
        $this->feed->save();
        Session::flash('message', 'Feed editado correctamente');
        return Redirect::to('/feeds');
    }
    public function destroy($id)
    {
        $this->feed->delete();
        Session::flash('message', 'Feed eliminado correctamente');
        return Redirect::to('/feeds');           
    } 

    
}

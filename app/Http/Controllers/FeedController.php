<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use PhpSpec\Exception\Example\ExampleException;
use yavu\BannerDisplay;
use yavu\Empresa;
use yavu\Http\Requests;
use yavu\Http\Controllers\Controller;
use yavu\Http\Requests\FeedCreateRequest;
use yavu\Http\Requests\FeedUpdateRequest;
use Session;
use Redirect;
use yavu\BannerData;
use yavu\EstadoEmpresa;
use Auth;
use Illuminate\Routing\Route;
use DB;
use yavu\User;

class
FeedController extends Controller{
  private $id;
  private $user_id;
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    if(Auth::user()->check()){
      $this->user = User::findOrFail(Auth::user()->get()->id);
    }
  }
  public function create(){
    return $this->index();
    //falta terminar
    //return view('feeds.create', ['mostrarbanner' => $this->MostrarBannerPublico()]);
  }
  public function destroy($id){
    $this->feed = EstadoEmpresa::findOrFail($id);
    $this->feed->delete();
    Session::flash('message', 'Feed eliminado correctamente');
    return Redirect::to('/feeds');
  }
  public function edit($id){
    $this->feed = EstadoEmpresa::findOrFail($id);
    if( $this->feed->user_id == $this->user->id ){

      foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
        BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

      return view('feeds.edit', ['feed' => EstadoEmpresa::findOrFail($id), 'bannersRandomLeft' => $bannersRandomLeft, 'userSession' => $this->user, 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get()]);
    }else{
      return $this->index();
    }

  }
  public function EliminarFeed($id){

    if(isset($id) && $id !== ""){
      $id = addslashes($id);
      $feed = EstadoEmpresa::findOrFail($id);
      $feed->delete();
      return response()->json(["Mensaje: " => "Eliminado"]);
    }
  }
  public function find(Route $route){
    //$this->feed = Feed::findOrFail($route->getParameter('feeds'));
    //return $this->user;
  }
  public function index(){

    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    foreach($bannersRandomCenter = BannerData::orderByRaw('RAND()')->take(3)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    if(count($this->user->empresas)>0){
      $this->user_id = $this->user->empresas[0]->user_id; $this->id = $this->user->empresas[0]->id;
      return view('feeds.index', ['companyStatuses' => EstadoEmpresa::orderBy('created_at', 'desc')->paginate(15), 'myCompanies' => $this->user->empresas, 'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter, 'userSession' => $this->user, 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get()] ); //cambiar EstadoEmpresa por CompanyStatus
    }else{
      return view('feeds.index', ['companyStatuses' => EstadoEmpresa::orderBy('created_at', 'desc')->paginate(15), 'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter, 'userSession' => $this->user, 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get()]);
    }
  }
  public function show($id){

    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    return view('feeds.show', ['feed' => EstadoEmpresa::findOrFail($id), 'bannersRandomLeft' => $bannersRandomLeft, 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(), 'userSession' => $this->user]);
  }
  public function store(FeedCreateRequest $request){

    $this->estado = EstadoEmpresa::create($request->all());
    return Redirect::to('/feeds/'.$this->estado->id);
      //return response()->json(["Mensaje: " => "Creado"]);
  }
  public function update(FeedUpdateRequest $request, $id){
    $this->feed = EstadoEmpresa::findOrFail($id);
    $this->feed->fill($request->all());
    $this->feed->save();
    Session::flash('message', 'Feed editado correctamente');
    return Redirect::to('/feeds/'.$this->feed->id);
  }
}

<?php
namespace yavu\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use yavu\BannerDisplay;
use yavu\Http\Requests;
use yavu\Http\Requests\EmpresaCreateRequest;
use yavu\Http\Requests\EmpresaUpdateRequest;
use Session;
use Redirect;
use yavu\Empresa;
use yavu\EstadoEmpresa;
use yavu\CategoryList;
use yavu\CompanyCategory;
use yavu\BannerData;
use yavu\RaffleRequest;
use yavu\User;
use Illuminate\Routing\Route;
use Auth;
use DB;
use RUT;
use yavu\Visit;

class EmpresaController extends Controller{
  public function __construct(){
    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    if(Auth::user()->check()){
      $this->user = User::findOrFail(Auth::user()->get()->id);
      $this->empresa = Empresa::where('user_id', $this->user->id);
    }
  }

  public function addCategory(Request $request){
    try {
      $this->category = CategoryList::findOrFail((int)$request->category_id);
      if($this->category){

        if(count(CompanyCategory::where('empresa_id',$request->empresa_id)->where('categorylist_id',$request->category_id)->get())<1){
          $this->companyCategory = CompanyCategory::create(['empresa_id'=>$request->empresa_id, 'categorylist_id' => $request->category_id]);
        }else{
          $this->companyCategory = CompanyCategory::where('empresa_id',$request->empresa_id)->where('categorylist_id',$request->category_id)->delete();
        }

        return response()->json([count(CompanyCategory::where('empresa_id',$request->empresa_id)->get()), $request->category_id]);
      }
    } catch (ModelNotFoundException $ex) {
      return response()->json(['mensaje: ' => 'no existe la categoria: '.$request->category_id]);
    }
  }

  public function find(Route $route){
    $this->empresa = Empresa::findOrFail($route->getParameter('empresas'));
  }
  public function index(Request $request){

    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    foreach($bannersRandomCenter = BannerData::orderByRaw('RAND()')->take(3)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    return view('empresas.index', ['empresas' => Empresa::paginate(15), 'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter, 'companies' => Empresa::select('id','nombre','descripcion','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(), 'userSession' => $this->user]);
  }
  
  public function create(){

    if(isset($this->user)){
      $empresa = Empresa::where('user_id', '=', $this->user->id)->get();
      if(count($empresa) < 1){
        return view('empresas.create');
      }else{
        //Refactorizar[!]
        $this->categorias = $empresa[0]->categorias()->get()->count('empresa_id'); 
        if($this->categorias == 3) {
            Session::flash('message-info', 'Usted ya tiene registrada una empresa');
            Session::flash('message-error', 'Ya ha registrado un numero maximo de categorias y empresa ');
            Session::flash('message-warning', 'Si desea registrar una nueva empresa comuniquese con el administrador');
            return Redirect::to('/empresas');
        }
        else{
          Session::flash('message-info', 'Usted ya tiene registrada una empresa');
          Session::flash('message-warning', 'Si desea registrar una nueva empresa comuniquese con el administrador');
          return view('empresas.categoriesOfTheCreatedCompany', ['empresa' => $empresa[0], 'categoryList' => CategoryList::all()]);
        }
      }
    }
    return Redirect::to('/');
  }

  public function EstadisticasDeMiEmpresa($id){
    $this->empresa = Empresa::where('user_id', $this->user->id)->get();
    $this->data = $this->empresa[0]->visits()->get();
    $this->cMasculino = 0; $this->cFemenino = 0; $this->cSinDefinir = 0;

    $this->coinsOtorgadas = $this->empresa[0]->coins_otorgadas()->get()->count('user_id');

    foreach ($this->data as $d){
      if($d->sexo == 'Masculino'){
        $this->cMasculino+=1;
      }else if($d->sexo == 'Femenino'){
        $this->cFemenino+=1;
      }else{
        $this->cSinDefinir+=1;
      }
    }

    $this->statistics = [
      0 => $this->cMasculino,
      1 => $this->cFemenino,
      2 => $this->cSinDefinir,
      3 => $this->cMasculino+$this->cFemenino+$this->cSinDefinir,
      4 => $this->coinsOtorgadas,
    ];
    ///dd( $this->statistics );
    return view('empresas.companyStatistics', ['statistics'=>$this->statistics, 'userCompany' => $this->user->empresas[0], 'userSession' => $this->user]);

  }

  public function RequestARaffle(Request $request){


    if(count( $this->user->hasRequested(addslashes($request->empresa_id)) )>0){
      return response()->json(['requests'=>0]);
    }else{

      RaffleRequest::create([
        'user_id'=>$this->user->id,
        'empresa_id'=>addslashes($request->empresa_id),
        'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
        'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())
      ]);

    }

    return response()->json(['requests'=>RaffleRequest::where('empresa_id', addslashes($request->empresa_id))->count('id')]);

  }

  public function store(EmpresaCreateRequest $request){
    if(isset($request) && isset($this->user)){

      $this->empresa = Empresa::create($request->all());
      DB::table('pops')->insert(
        ['user_id' => $this->user->id,
          'empresa_id' => $this->empresa->id,
          'tipo' => 'activacion',
          'estado'   => 'pendiente',
          'contenido' => '¡Se ha registrado tu empresa! '.$request->nombre,
          'created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),
          'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]
      );
      Session::flash('message', 'Empresa creada correctamente');
      return Redirect::to('/empresas/create');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function show($id){

    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    foreach($bannersRandomCenter = BannerData::orderByRaw('RAND()')->take(3)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

      $this->empresa = Empresa::find($id);
      if ($this->empresa) {
        //return $this->MostrarEmpresaPublica($this->empresa->nombre);

        if($this->empresa->user_id != $this->user->id){
          $this->visita = new Visit(['user_id'=>$this->user->id, 'empresa_id' => $this->empresa->id, 'sexo' => $this->user->sexo, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ]);
          $this->visita->save();
        }
        $mapa = $this->empresa->gmaps;

        if($mapa){
          return view('empresas.publicProfile', [ 'e' => $this->empresa , 'mapa' => $mapa, 'companyStatuses' => EstadoEmpresa::where('empresa_id', $this->empresa->id)->orderBy('created_at', 'desc')->paginate(10), 'myCompanies' => $this->user->empresas, 'userSession' => $this->user, 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(),'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter]);
        }else{

          return view('empresas.publicProfile', [ 'e' => $this->empresa , 'companyStatuses' => EstadoEmpresa::where('empresa_id', $this->empresa->id)->orderBy('created_at', 'desc')->paginate(10), 'myCompanies' => $this->user->empresas, 'userSession' => $this->user, 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(),'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter]);
        }


      }else{
        Session::flash('message-warning','No se ha encontrado lo que busca');
        return redirect()->to('/empresas');
      }

  }



  public function MostrarEmpresaPublica($empresa){

    if(isset($empresa)){

      $empresa = DB::table('empresas')
        ->join('users', 'users.id', '=', 'empresas.user_id')
        ->select('empresas.*', 'users.id as user_id')
        ->where('empresas.nombre', '=', addslashes($empresa))
        ->orderBy('empresas.created_at','desc')
        ->get();

      $this->visita = new Visit(['user_id'=>$this->user->id, 'empresa_id' => $empresa[0]->id, 'sexo' => $this->user->sexo, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ]);

      if($empresa[0]->user_id != $this->user->id){
        $this->visita->save();
      }

      $mapa = Empresa::find($empresa[0]->id)->gmaps;

      if($mapa){
        return view('empresas.publicProfile', [ 'empresa' => $empresa , 'mapa' => $mapa, 'companyStatuses' => EstadoEmpresa::where('empresa_id', $empresa[0]->id)->orderBy('created_at', 'desc')->paginate(10), 'myCompanies' => $this->user->empresas, 'userSession' => $this->user, 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(8)->get()]);
      }else{
        return view('empresas.publicProfile', [ 'empresa' => $empresa , 'companyStatuses' => EstadoEmpresa::where('empresa_id', $empresa[0]->id)->orderBy('created_at', 'desc')->paginate(10), 'myCompanies' => $this->user->empresas, 'userSession' => $this->user, 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(8)->get()]);
      }
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }

  public function edit($id){

    if(isset($this->empresa) && isset($this->user)){
      if($this->empresa->user_id == Auth::user()->get()->id){
        return view('empresas.edit', ['empresa' => $this->empresa, 'userSession' => $this->user]);
      }
    }
    return Redirect::to('/');
  }
  public function update(EmpresaUpdateRequest $request, $id){
    if(isset($request)){
      if(RUT::check($request->rut)){
        $this->empresa->fill($request->all());
        $this->empresa->save();
        Session::flash('message', 'Empresa editada correctamente');
        return Redirect::to('/empresas');
      }else{
        Session::flash('message-error', 'El rut ingresado no es válido.');
        return Redirect::to('/dashboard');
      }
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }


  public function RaffleList($id){
    $this->empresa = Empresa::find($id);
    $this->user = User::find($this->empresa->user_id);

    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    foreach($bannersRandomCenter = BannerData::orderByRaw('RAND()')->take(3)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    return view('empresas.raffleList', ['sorteos' => $this->user->sorteos()->get()->where('estado_sorteo', 'Activo'), 'empresa' => $this->empresa,  'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(), 'userSession' => $this->user, 'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter]);
  }
  public function SolicitarEliminacion($id){
    if(isset($id)){
      $id = addslashes($id);
      DB::table('empresas')
        ->where('id', $id)
        ->update(['estado' => 'eliminar']);
      return Redirect::to('/profile');
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }

  public function ValidarRutEmpresa($rut){
    $exist = Empresa::where('rut', '=', RUT::clean($rut))->first();
    if($exist){
      return "registrado";
    }
    if(isset($rut)){
      $rut = addslashes($rut);
      if(RUT::check($rut)){
        return RUT::clean($rut);
      }else{
        return "false";
      }
    }
    return response()->json(["Mensaje: " => "Acceso denegado"]);
  }

  public function searchCompanyByCity(Request $request){

    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    if($request->ciudad!=''){
      //Ojo con esta linea de abajo, si los resultados superan los mil el paginador no funciona
      $empresas = Empresa::where('ciudad', '=', $request->ciudad)->paginate(1000);

      if(count($empresas)<1){
        Session::flash('message-warning', 'No se encontraron resultados en <b>'.$request->ciudad.'</b>');
        return Redirect::to('/empresas');
      }

      return view('empresas.index', ['empresas' => $empresas, 'bannersRandomLeft' => $bannersRandomLeft,'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(),'bannersRandomLeft' => BannerData::orderByRaw('RAND()')->take(2)->get(), 'userSession' => $this->user]);

    }else{
      return $this->index();
    }

  }

  public function BuscarEmpresas(Request $request){

    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    $nombre = addslashes($request->nombre);

    if($nombre!=''){
      $empresas = Empresa::where('ciudad', 'like', '%'.$request->ciudad.'%')
        ->orwhere('descripcion', 'like', '%'.$nombre.'%')
        ->orwhere('direccion', 'like', '%'.$nombre.'%')
        ->orwhere('nombre', 'like', '%'.$nombre.'%')
        ->paginate(20);

      if(count($empresas)<1){
        Session::flash('message-warning', 'No se encontraron resultados de <b>'.$request->nombre.'</b> en <b>'.$request->ciudad.'</b>');
        return Redirect::to('/empresas');
      }else{
        Session::flash('message-warning', 'se encontraron '.count($empresas).' resultados');
        return view('empresas.index', ['empresas' => $empresas, 'bannersRandomLeft' => $bannersRandomLeft, 'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(), 'userSession' => $this->user]);
      }

    }else{
      Session::flash('message-warning', 'No se encontraron resultados');
      return $this->index();
    }

    /*
    if($request->nombre!=''){
      $nombre = addslashes($request->nombre);
      $nombreCompleto="";
      $nombre = explode(' ', $nombre);
      $sqlAdd = "SELECT * FROM (SELECT id, user_id, rut, email, fono, nombre, descripcion, direccion, ciudad, region, pais, estado, imagen_perfil, imagen_portada, created_at FROM empresas)newTable";
      foreach ($nombre as $key => $value) {
        $nombreCompleto .= $value.' ';
        if ($key == 0){
          $sqlAdd .= " WHERE newTable.user_id like '%".$value."%' OR newTable.rut like '%".$value."%' OR newTable.email like '%".$value."%' OR newTable.nombre like '%".$value."%'  OR newTable.descripcion like '%".$value."%' OR newTable.direccion like '%".$value."%' OR newTable.ciudad like '%".$value."%' OR newTable.region like '%".$value."%' OR newTable.pais like '%".$value."%' OR newTable.estado like '%".$value."%'";
        }else{
          $sqlAdd .= " OR newTable.rut like '%".$value."%' OR newTable.email like '%".$value."%' OR newTable.nombre like '%".$value."%' OR newTable.descripcion like '%".$value."%' OR newTable.direccion like '%".$value."%' OR newTable.ciudad like '%".$value."%' OR newTable.region like '%".$value."%' OR newTable.pais like '%".$value."%' OR newTable.estado like '%".$value."%'";
        }
      }
      $sqlAdd .= " OR newTable.rut like '%".$nombreCompleto."%' OR newTable.email like '%".$nombreCompleto."%' OR newTable.nombre like '%".$nombreCompleto."%' OR newTable.descripcion like '%".$value."%' OR newTable.direccion like '%".$nombreCompleto."%' OR newTable.ciudad like '%".$nombreCompleto."%' OR newTable.region like '%".$nombreCompleto."%' OR newTable.pais like '%".$nombreCompleto."%' OR newTable.estado like '%".$nombreCompleto."%'";
      $sqlAdd .= "ORDER BY newTable.created_at DESC";
      $empresas = DB::select($sqlAdd);
      dd($empresas);
    }else{
      $sqlAdd = 'SELECT * FROM (SELECT id, user_id, rut, email, fono, nombre, descripcion, direccion, ciudad, region, pais, estado, imagen_perfil, imagen_portada, created_at FROM empresas)newTable WHERE newTable.rut like "%7%" OR newTable.email like "%@%" OR newTable.nombre like "%empresa%" OR newTable.estado like "%activo%" ';
      $empresas = DB::select($sqlAdd);
      return view('empresas.index', ['empresas' => $empresas, 'bannersRandomLeft' => BannerData::orderByRaw('RAND()')->take(2)->get(),'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(),'bannersRandomLeft' => BannerData::orderByRaw('RAND()')->take(2)->get(), 'userSession' => $this->user]);
    }
    return view('empresas.index', ['empresas' => $empresas, 'bannersRandomLeft' => BannerData::orderByRaw('RAND()')->take(2)->get(),'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(),'bannersRandomLeft' => BannerData::orderByRaw('RAND()')->take(2)->get(), 'userSession' => $this->user]);
    */

  }


  public function searchcat(){
    $categories = \Input::get('categories');
    $vacancies = \Vacancy::whereIn('category_id', $categories)->get();
    return \View::make('vacancies.empty')->with('vacancies', $vacancies);
}

  public function destroy($id){
    $this->empresa->delete();
    Session::flash('message', 'Empresa eliminada correctamente');
    return Redirect::to('/empresas');
  }
  
}

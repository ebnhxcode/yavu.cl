<?php

namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\BannerDisplay;
use yavu\Http\Requests;
use yavu\Http\Requests\SorteoCreateRequest;
use yavu\Http\Requests\SorteoUpdateRequest;
use yavu\Http\Controllers\Controller;
use yavu\ParticipanteSorteo;
use yavu\Pop;
use yavu\RaffleDisplay;
use yavu\Sorteo;
use yavu\Empresa;
use yavu\RegistroCoin;
use yavu\Ticket;
use yavu\User;
use yavu\BannerData;
use Session;
use Redirect;
use Auth;
use DB;
use Mail;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use yavu\Winner;

class SorteoController extends Controller{
  public function __construct(){

    $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy', 'show']]);
    if(Auth::user()->check()){
      $this->user = User::findOrFail(Auth::user()->get()->id);
    }


  }



  public function searchRaffleByOrder(Request $request){

    if(($r=(int)$request->order)<2&&$r>=1){

      foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
        BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

      foreach($bannersRandomCenter = BannerData::orderByRaw('RAND()')->take(3)->get() as $key => $banner )
        BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

      foreach($sorteos = Sorteo::where('estado_sorteo','Activo')->orderBy('id', 'desc')->paginate(15) as $key => $sorteo)
        RaffleDisplay::create([ 'sorteo_id' => $sorteo->id, 'user_id' => $this->user->id ])->save();

      $this->registro_tickets = $this->user->registro_tickets()->orderBy('created_at', 'desc')->limit('20')->get();

      /*
      <option value="1">Mayor cantidad de seguidores</option>
      <option value="2">Últimas empresas registradas</option>
      <option value="3">Peticiones de sorteos</option>
      */

      switch ($request->order) {
        case 1:
          return view('sorteos.indexPartial.indexForSearches', ['sorteos'=>Sorteo::orderBy('created_at', 'desc')->get(), 'rtickets' => $this->registro_tickets, 'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter, 'userSession' => $this->user,'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get()]);

          break;
        case 2:

          echo "other option";
          break;
        case 3:
          echo "other option";
          break;
      }



      /*
      if(count($empresas)<1){
        Session::flash('message-warning', 'No se encontraron resultados en <b>'.$category->category.'</b>');
        return Redirect::to('/empresas');
      }
      */




    }else{
      return $this->index();
    }
  }

  public function searchRaffleByCategory(Request $request){

    if($request->category!=''){

      foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
        BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

      $category = CategoryList::findOrFail($request->category);


      $empresas = Empresa::whereIn('id',(CompanyCategory::select('empresa_id')->where('categorylist_id', $request->category)->get()) )->get();


      if(count($empresas)<1){
        Session::flash('message-warning', 'No se encontraron resultados en <b>'.$category->category.'</b>');
        return Redirect::to('/empresas');
      }

      return view('empresas.indexPartial.indexForSearches', ['empresas' => $empresas, 'bannersRandomLeft' => $bannersRandomLeft,'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(), 'userSession' => $this->user, 'categories' => CategoryList::select('id','category')->get()]);

    }else{
      return $this->index();
    }
  }
  public function searchRaffleByCity(Request $request){

    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    if($request->ciudad!=''){
      //Ojo con esta linea de abajo, si los resultados superan los mil el paginador no funciona
      $empresas = Empresa::where('ciudad', '=', $request->ciudad)->paginate(1000);

      if(count($empresas)<1){
        Session::flash('message-warning', 'No se encontraron resultados en <b>'.$request->ciudad.'</b>');
        return Redirect::to('/empresas');
      }

      return view('empresas.index', ['empresas' => $empresas, 'bannersRandomLeft' => $bannersRandomLeft,'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get(),'bannersRandomLeft' => BannerData::orderByRaw('RAND()')->take(2)->get(), 'userSession' => $this->user, 'categories' => CategoryList::select('id','category')->get()]);

    }else{
      return $this->index();
    }

  }



  public function buscarsorteo(){
    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    foreach($bannersRandomCenter = BannerData::orderByRaw('RAND()')->take(3)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    foreach($sorteos = Sorteo::where('estado_sorteo','Activo')->orderBy('id', 'desc')->paginate(15) as $key => $sorteo)
      RaffleDisplay::create([ 'sorteo_id' => $sorteo->id, 'user_id' => $this->user->id ])->save();

    $this->registro_tickets = $this->user->registro_tickets()->orderBy('created_at', 'desc')->limit('20')->get();

    return view('sorteos.indexPartial.indexForSearches', ['sorteos'=>json_decode(json_encode($sorteos,false)), 'rtickets' => $this->registro_tickets, 'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter, 'userSession' => $this->user,'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get()]);
  }
  public function BuscarSorteos(Request $request){
    if(isset($request->nombre)){
      $nombre = addslashes($request->nombre);
      $nombreCompleto="";
      $nombre = explode('+', $nombre);
      $sqlAdd = "SELECT * FROM (SELECT * FROM sorteos)newTable";
      foreach ($nombre as $key => $value) {
        $nombreCompleto .= $value.' ';
        if ($key === 0){
          $sqlAdd .= " WHERE newTable.nombre_sorteo like '%".$value."%' OR newTable.descripcion like '%".$value."%' OR newTable.estado_sorteo like '%".$value."%'";
        }else{
          $sqlAdd .= " OR newTable.nombre_sorteo like '%".$value."%' OR newTable.descripcion like '%".$value."%' OR newTable.estado_sorteo like '%".$value."%'";
        }
      }
      $sqlAdd .= " OR newTable.nombre_sorteo like '%".$nombreCompleto."%' OR newTable.descripcion like '%".$nombreCompleto."%' OR newTable.estado_sorteo like '%".$nombreCompleto."%'";
      $sqlAdd .= "ORDER BY newTable.nombre_sorteo DESC";
      $sorteos = DB::select($sqlAdd);

      foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
        BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

      foreach($bannersRandomCenter = BannerData::orderByRaw('RAND()')->take(3)->get() as $key => $banner )
        BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

      $this->registro_tickets = $this->user->registro_tickets()->orderBy('created_at', 'desc')->limit('20')->get();

      return view('sorteos.indexPartial.indexForSearches', ['sorteos'=>json_decode(json_encode($sorteos,false)), 'rtickets' => $this->registro_tickets, 'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter, 'userSession' => $this->user,'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get()]);

      //return response()->json($sorteos);
    }else{
      $sqlAdd = 'SELECT * FROM (SELECT id,empresa_id, user_id, estado_sorteo,imagen_sorteo, nombre_sorteo, nombre_empresa, descripcion FROM sorteos)newTable WHERE newTable.nombre_sorteo like "%sorteo%" OR newTable.descripcion like "%sorteo%" OR newTable.estado_sorteo like "%activo%" ';
      $sorteos = DB::select($sqlAdd);
      return response()->json(
        $sorteos
      );
    }
    return response()->json(['Mensaje: ','Acceso denegado']);
  }

  public function CanjearTicket($user_id){
    if($this->getMyCoins() >= 100){

      $this->registro_coins = new RegistroCoin(['user_id'=>$user_id,'motivo'=>'Canje (compra) de ticket','cantidad'=>'-100','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
      $this->user->registro_coins()->save($this->registro_coins);
      $this->ticket = new Ticket(['user_id'=>$user_id,'cantidad_tickets'=>1,'monto'=>100,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
      $this->user->tickets()->save($this->ticket);
      //$this->pop = new Pop(['user_id' => $user_id,'empresa_id'=>1,'tipo'=>'ticket','estado'=>'pendiente','contenido'=>'Se canjeado un ticket por coins!','created_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at'=>strftime( "%Y-%m-%d-%H-%M-%S", time())]);
      //$this->user->pops()->save($this->pop);
      return response()->json(["Mensaje: " => "Creado"]);
    }else{
      return response()->json(["Mensaje: " => "Sin saldo para el servicio"]);
    }
  }
  public function CargarDetallesSorteo($sorteo_id){
    $this->participantes = ParticipanteSorteo::where('sorteo_id', $sorteo_id)->get();

    $OpcionesParticipantes = [];
    foreach($this->participantes as $participante){
      array_push($OpcionesParticipantes, $participante->id);
    }
    
    return response()->json($OpcionesParticipantes);
  }

  public function ContarTicketsEnSorteo($id){
    return response()->json(Sorteo::findOrFail($id)->participante_sorteos);
  }
  public function create(){
    $empresa = Empresa::where('user_id', $this->user->id)->get();
    if(count($empresa) > 0){
      return view('sorteos.create', ['empresa_id' => $empresa[0]->id, 'nombre_empresa' => $empresa[0]->nombre, 'userSession' => $this->user]);
    }
    Session::flash('message', '¡Para crear un sorteo para tus clientes debes tener una empresa creada, creala <a class="btn-info btn-xs" href="/empresas/create">AQUI</a>!');
    return Redirect::to("/dashboard");
  }
  public function destroy($id){
    /*
      verificar que el sorteo no tenga participantes, de lo contrario si elimina el sorteo se deben devolver los tickets a cada usuario
    */
    /*
    if(isset($this->sorteo)){
      $this->sorteo->delete();
      Session::flash('message', 'Sorteo eliminado correctamente');
      return Redirect::to('/sorteos');
    }
    */
    return responde()->json(["Mensaje: " => "Acceso denegado"]);
  }
  public function edit($id){
    if($this->sorteo->user_id == $this->user->id && $this->sorteo->estado_sorteo == 'Pendiente'){
      return view('sorteos.edit', ['sorteo' => $this->sorteo]);
    }
    Session::flash('message-warning', 'Creemos que te haz equivocado esta vez, para crear un sorteo debes tener una empresa creada, si es así haz click <a class="btn-success btn-xs" href="/sorteos/create">AQUI</a>, si no tienes una empresa puedes hacer click <a class="btn-success btn-xs" href="/empresas/create">AQUI</a> para crear una');
    return Redirect::to('/dashboard');
  }

  public function ended(){
    $this->registro_tickets = $this->user->registro_tickets()->orderBy('created_at', 'desc')->limit('20')->get();
    return view('sorteos.ended', ['sorteos'=>Sorteo::where('estado_sorteo','Finalizado')->orderBy('id', 'desc')->paginate(6),'rtickets' => $this->registro_tickets, 'bannersRandomLeft' => BannerData::orderByRaw('RAND()')->take(2)->get(), 'userSession' => $this->user,'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get()]);
  }

  public function find(Route $route){
      $this->sorteo = Sorteo::findOrFail($route->getParameter('sorteos'));
  }

  private function getMyCoins(){
    return $this->user->registro_coins->sum('cantidad');
  }

  private function getMyTickets(){
    return $this->user->tickets->sum('cantidad_tickets');
  }

  public function index(){
    foreach($bannersRandomLeft = BannerData::orderByRaw('RAND()')->take(2)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    foreach($bannersRandomCenter = BannerData::orderByRaw('RAND()')->take(3)->get() as $key => $banner )
      BannerDisplay::create([ 'banner_data_id' => $banner->id, 'user_id' => $this->user->id ])->save();

    foreach($sorteos = Sorteo::where('estado_sorteo','Activo')->orderBy('id', 'desc')->paginate(15) as $key => $sorteo)
      RaffleDisplay::create([ 'sorteo_id' => $sorteo->id, 'user_id' => $this->user->id ])->save();

    $this->registro_tickets = $this->user->registro_tickets()->orderBy('created_at', 'desc')->limit('20')->get();
    return view('sorteos.index', ['sorteos'=>$sorteos, 'rtickets' => $this->registro_tickets, 'bannersRandomLeft' => $bannersRandomLeft, 'bannersRandomCenter' => $bannersRandomCenter, 'userSession' => $this->user,'companies' => Empresa::select('id','nombre','imagen_perfil')->orderByRaw('RAND()')->take(4)->get()]);
  }
  public function MostrarGanador($ganador){
    $ganador = ParticipanteSorteo::findOrFail($ganador)->users;
    return response()->json(['nombre'=>$ganador->nombre, 'apellido'=>$ganador->apellido]);
  }
  public function RegistrarGanadorSorteo($ganador){
    /*AQUI FALTA TERMINAR*/
    $ganador = str_replace('"', '', $ganador);
    $ganador = str_replace('"', '', $ganador);
    $ganador = addslashes($ganador);
    $ganador = str_replace('[', '', $ganador);
    $ganador = str_replace(']', '', $ganador);
    $ArraySeleccionados = explode(',', $ganador);  

    //dd($ArraySeleccionados);
    foreach ($ArraySeleccionados as $key) {
      $this->existe = Winner::where('participante_sorteo_id', $key);

      $this->sorteado = ParticipanteSorteo::where('id', $key)->first();

      $this->ganador = User::where('id', $this->sorteado->user_id)->get();

      $this->sorteo = Sorteo::findOrFail($this->sorteado->sorteo_id);
      $this->sorteo->estado_sorteo = 2;
      $this->sorteo->save();

      if($this->ganador[0]){
        $this->registrar_ganador = new Winner(['user_id' => $this->sorteado->user_id, 'sorteo_id' => $this->sorteado->sorteo_id,'participante_sorteo_id' => $key,'nombre' => $this->ganador[0]->nombre,'apellido' => $this->ganador[0]->apellido]);
        $this->registrar_ganador->save();

        $this->pop = new Pop(['user_id' => $this->sorteado->user_id,'empresa_id' => 1,'tipo' => 'coins','estado' => 'pendiente','contenido' => 'Haz sido el ganador del sorteo '.$this->sorteo->nombre_sorteo.'!','created_at' => strftime("%Y-%m-%d-%H-%M-%S", time()),'updated_at' => strftime("%Y-%m-%d-%H-%M-%S", time())]);
        $this->pop->save();

        /*
        Mail::send('emails.winner', ['email'=>\Input::get('email'), 'nombre' => \Input::get('nombre'), 'codigo' => $this->getCodigoVerificacion()], function($msj){
          $msj->subject('Correo de Contacto');
          $msj->to(\Input::get('email'));
        });
        */

      }
    }



    //dd($this->registrar_ganador);
    return "true";
  }
  public function show($id){

    $winners = $this->sorteo->winners()->get();

    if(count($winners)>0){
      return view('sorteos.show', ['sorteo' => $this->sorteo, 'winners' => $winners, 'userSession' => $this->user, 'sorteos'=>Sorteo::orderByRaw('RAND()')->where('estado_sorteo','Activo')->get()]);
    }else{
      return view('sorteos.show', ['sorteo' => $this->sorteo, 'userSession' => $this->user,'sorteos'=>Sorteo::orderByRaw('RAND()')->where('estado_sorteo','Activo')->get()]);
    }

  }

  public function VisualizarEmpresaSorteoPendiente(Request $request){
    if($request->ajax()){
      return response()->json(Empresa::findOrFail(addslashes($request->id)));
    }else{
      response()->json(['Mensaje: ', 'Acceso denegado']);
    }
  }
  public function AprobarSorteoPendiente(Request $request){
    if($request->ajax()){
      $this->sorteo = Sorteo::findOrFail(addslashes($request->id));

      if($this->sorteo->estado_sorteo == 'Pendiente'){
        $this->sorteo->estado_sorteo = '1';
        $this->sorteo->save();
      }
      return response()->json(['Mensaje: ', 'ok']);
    }else{
      return response()->json(['Mensaje: ', 'Acceso denegado']);
    }
  }
  public function SorteosPendientes(){
    return view('admins.sorteosPendientes', ['sorteospendientes' => Sorteo::where('estado_sorteo', 'Pendiente')->get()]);
  }

  public function store(SorteoCreateRequest $request){
      $this->sorteo = Sorteo::create($request->all());
      if($this->sorteo){
        $this->pop = new Pop(['user_id' => $request->user_id,'empresa_id' => 1, 'poptype_id_helper' => $this->sorteo->id, 'tipo' => 'sorteo', 'estado'   => 'pendiente','contenido' => 'Haz creado un nuevo sorteo!','created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]);
        $this->user->pops()->save($this->pop);
        Session::flash('message', 'Su sorteo se ha creado con éxito, será publicado 
previa confirmación por parte del equipo <a href="/">Yavu.cl</a>. Miralo <a href="/sorteos/'.$this->sorteo->id.'">Aquí</a>');
        return Redirect::to('/sorteos/create');
      }
      return response()->json('Acceso denegado');
    }
  public function update($id, SorteoUpdateRequest $request){
    $this->sorteo->fill($request->all());
    $this->sorteo->save();
    Session::flash('message', 'sorteo validado correctamente');
    return Redirect::to('/sorteos/'.$this->sorteo->id);
    Session::flash('message-warning', '¡Crea tu propio sorteo y promociona tu empresa!');
    return Redirect::to("/dashboard");
  }
  public function UsarTicket(Request $request){
      if($this->getMyTickets() > 0){


        $this->sorteo = Sorteo::findOrFail(addslashes($request->sorteo_id));

        if($this->sorteo->user_id != $this->user->id){

          if($this->sorteo->estado_sorteo == 'Activo'){

            $this->ticket = new Ticket(['user_id' => $this->user->id,'cantidad_tickets' => -1,'monto' => -100,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
            $this->user->tickets()->save($this->ticket);

            //Ahora rindo el ticket

            $this->sorteo = Sorteo::findOrFail($request->sorteo_id);

            $this->participante_sorteos = new ParticipanteSorteo(['user_id' => $this->user->id,'sorteo_id' => $request->sorteo_id,'nombre_sorteo' => $this->sorteo->nombre_sorteo,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
            $this->user->participante_sorteos()->save($this->participante_sorteos);
            return 'Exito';

          }else if($this->sorteo->estado_sorteo == 'Pendiente'){
            return response()->json(['Mensaje : ', 'Este sorteo aun no permite el uso de tickets']);
          }else{
            return response()->json(['Mensaje : ', 'Este sorteo ya no permite el uso de tickets']);
          }

        }else{
          return 'No puedes usar tus tickets en tu propio sorteo.';
        }

        //Ahora notifico
        //$this->pop = new Pop(['user_id' => $user_id,'empresa_id' => 1,'tipo' => 'ticket','estado'   => 'pendiente','contenido' => 'Haz usado un ticket!','created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]);
        //$this->user->pops()->save($this->pop);


      }else{
        return 'sin saldo de tickets';
      }
      return 'hola '.$user_id;
    }

    public function UsarYavuCoins(Request $request){
      if($this->getMyCoins() > 0){


        $this->sorteo = Sorteo::findOrFail(addslashes($request->sorteo_id));

        if($this->sorteo->user_id != $this->user->id){

          if($this->sorteo->estado_sorteo == 'Activo'){

            //Descuento el ticket
            RegistroCoin::create(['user_id' => $this->user->id,'motivo' => 'Participacion con uso de coins','cantidad' => -100,'created_at' => Carbon::now(),'updated_at' => Carbon::now()])->save();

            $this->ticket = new Ticket(['user_id' => $this->user->id,'cantidad_tickets' => 0,'monto' => -100,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
            $this->user->tickets()->save($this->ticket);

            //Ahora rindo el ticket

            $this->sorteo = Sorteo::findOrFail($request->sorteo_id);

            $this->participante_sorteos = new ParticipanteSorteo(['user_id' => $this->user->id,'sorteo_id' => $request->sorteo_id,'nombre_sorteo' => $this->sorteo->nombre_sorteo,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
            $this->user->participante_sorteos()->save($this->participante_sorteos);
            return 'Exito';

          }else if($this->sorteo->estado_sorteo == 'Pendiente'){
            return response()->json(['Mensaje : ', 'Este sorteo aun no permite el uso de tickets']);
          }else{
            return response()->json(['Mensaje : ', 'Este sorteo ya no permite el uso de tickets']);
          }

        }else{
          return 'No puedes participar en tu propio sorteo.';
        }

        //Ahora notifico
        //$this->pop = new Pop(['user_id' => $user_id,'empresa_id' => 1,'tipo' => 'ticket','estado'   => 'pendiente','contenido' => 'Haz usado un ticket!','created_at' => strftime( "%Y-%m-%d-%H-%M-%S", time()),'updated_at' => strftime( "%Y-%m-%d-%H-%M-%S", time())]);
        //$this->user->pops()->save($this->pop);


      }else{
        return 'sin saldo de yavücoins';
      }
      return 'hola '.$user_id;
    }

}

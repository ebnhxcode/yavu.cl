<?php

/* Esto se borra */
Route::get('i', 'UserController@selectInterestsForCreatedUser');
Route::post('agregarinteres', 'UserController@addInterest');
/* End Esto se borra */

/*Gestión rutas públicas*/
Route::get('sorteos/ended', 'SorteoController@ended');
/*Gestión rutas públicas*/

/*Gestión de cors*/
Route::get('breweries', ['middleware' => 'cors', function(){return \Response::json(\yavu\Brewery::with('beers', 'geocode')->paginate(10), 200);}]);
/*Gestión de cors*/

/*Gestión de limpieza de caché*/
Route::get('/clear-cache', function() { view('index'); });
/*Gestión de limpieza de cors*/

/*Gestión de usuarios sin sesión activa*/
Route::get('usuarios', function(){ return Redirect::to('login'); });

Route::get('registro', 'FrontController@loginMassive');

Route::post('usuarios/create', ['uses' => 'UserController@store', 'as' => 'usuarios_store_path',]);
Route::get('usuarios/create', ['uses' => 'UserController@create', 'as' => 'usuarios_create_path',]);
Route::post('usuarios/reset', ['uses' => 'UserController@reset', 'as' => 'usuarios_resetpassword_path',]);
Route::get('verificarusuario/{codigo}', 'LogController@VerificarUsuario');
Route::get('logout', 'LogController@logout');
Route::get('login', function(){
  $exitCode = Artisan::call('cache:clear');
  if(Auth::user()->check()||Auth::admin()->check()){
    $log = new \yavu\Http\Controllers\LogController();
    $log->logout();
    return view('mainViews.login');
  }
  return view('mainViews.login');
});
Route::resource('log', 'LogController');
/*Gestión de correos*/
Route::resource('mail', 'MailController');
/*Gestión de correos*/

/*Gestion socialite*/
Route::get('social/{provider?}', 'SocialController@getSocialAuth');
Route::get('social/callback/{provider?}', 'SocialController@getSocialAuthCallback');
/*Gestion socialite*/
/*Gestión de usuarios sin sesión activa*/

Route::group(['middleware' => 'user'], function(){

  /*Gestión de Usuarios*/
  Route::resource('interactuar', 'InteraccionEstadoController');
  Route::get('contarinteracciones/{status_id}', 'InteraccionEstadoController@ContarInteracciones')->where('status_id', '[0-9]+');
  Route::get('estadosusuario/{idUltima}', 'EstadoController@CargarEstados')->where('idUltima', '[0-9]+');
  //Route::resource('usuarios','UserController');

  Route::resource('dashboard', 'UserController@dashboard');
  Route::resource('profile', 'UserController@profile');

  Route::get('usuarios/{id}/edit', ['uses' => 'UserController@edit', 'as' => 'usuarios_edit_path',]);
  Route::put('usuarios/{id}/edit', ['uses' => 'UserController@update','as' => 'usuarios_put_path',]);
  Route::delete('usuarios/{id}/edit', ['uses' => 'UserController@destroy','as' => 'usuarios_delete_path',]);
  Route::get('usuarios/{id}', function(){return redirect()->to('/');});
  /*Gestión de Usuarios*/


  /*Gestión de estados*/
  Route::resource('estadoempresa', 'EstadoEmpresaController');
  Route::get('estadosempresa/{idUltima}/{empresa}', 'EstadoEmpresaController@CargarEstadoEmpresa')->where('idUltima', '[0-9]+');

  Route::get('cargarfeeds/{idUltima}/', 'FeedController@CargarFeeds');
  Route::get('cargarfeedsempresa/{idUltima}/{empresa}', 'FeedController@CargarFeedsEmpresa')->where('idUltima', '[0-9]+');

  Route::get('contarestados', 'EstadoController@ContarEstados');
  Route::resource('estados','EstadoController');
  Route::get('buscarusuario/{nombre}', 'UserController@BuscarUsuarios');
  /*Gestión de estados*/

  /*Gestión de coins*/
  Route::get('coins/history','CoinController@index');
  Route::resource('coins','CoinController');
  Route::get('contarcoins', 'CoinController@ContarCoins');
  Route::get('historialcoins', 'CoinController@HistorialCoins');
  /*Gestión de coins*/




  /*Gestión de Empresas*/
  Route::get('estadisticasdemiempresa', 'EmpresaController@EstadisticasDeMiEmpresa');
  //Route::get('sorteosempresa' ,'EmpresaController@SorteosEmpresa');
  Route::resource('empresas','EmpresaController');
  Route::get('empresa/{empresa}/', 'EmpresaController@MostrarEmpresaPublica');
  Route::get('listarbanner/listabanner', 'EmpresaController@MostrarBannerPublico');
  Route::get('empresas/{id}/sorteos', 'EmpresaController@RaffleList');
  Route::get('listaempresas', 'EmpresaController@ListaEmpresas');
  Route::get('solicitareliminacionempresa/{id}', 'EmpresaController@SolicitarEliminacion')->where('id', '[0-9]+');
  Route::post('buscarempresa', 'EmpresaController@BuscarEmpresas');
  Route::post('searchCompanyByCity', 'EmpresaController@searchCompanyByCity');
  Route::post('agregarcategoria', 'EmpresaController@addCategory');
  /*Gestión de Empresas*/

  /*Gestión de Servicios*/
  Route::resource('servicios','ServicioController');
  /*Gestión de Servicios*/

  /*Gestión de Sorteos*/

  Route::get('cronjob', 'SorteoController@cronjob');


  Route::resource('sorteos', 'SorteoController');
  Route::get('listasorteos', 'SorteoController@ListaSorteos');

  Route::get('buscarsorteo/{nombre?}', 'SorteoController@BuscarSorteos');
  Route::get('canjearticket/{user_id}', 'SorteoController@CanjearTicket')->where('user_id', '[0-9]+');
  Route::get('contarticketsensorteo/{id}', 'SorteoController@ContarTicketsEnSorteo')->where('user_id', '[0-9]+');
  Route::get('cargardetallessorteo/{id}', 'SorteoController@CargarDetallesSorteo')->where('user_id', '[0-9]+');
  Route::get('mostrarganador/{ganador}', 'SorteoController@MostrarGanador')->where('ganador', '[0-9]+');
  Route::get('registrarganadorsorteo/{sorteado?}', 'SorteoController@RegistrarGanadorSorteo');
  /*Gestión de Sorteos*/

  /*Gestión de Participantes*/
  Route::resource('participantes', 'ParticipanteController');
  Route::get('contarparticipantes/{sorteo_id}','ParticipanteController@ContarParticipantes')->where('sorteo_id', '[0-9]+');

  /*Gestión de Participantes*/

  /*Gestión de Petición de Sorteos*/
  Route::post('requestaraffle', 'EmpresaController@RequestARaffle');

  /*Gestión de Petición de Sorteos*/

  /*Gestión de  Followers */
  Route::post('seguirempresa', 'FollowerController@SeguirEmpresa');
  Route::post('noseguirempresa', 'FollowerController@NoSeguirEmpresa');
  Route::get('contarseguidores/{empresa_id}/{user_id}','FollowerController@ContarSeguidores')->where(['empresa_id', 'user_id'], '[0-9]+');
  Route::get('verificarseguidores/{empresa_id}/{user_id}','FollowerController@VerificarSeguidores')->where(['empresa_id', 'user_id'], '[0-9]+');
  /*Gestión de Followers */

  /*Gestión de  Rut */
  Route::get('validarrutusuario/{rut}', 'UserController@ValidarRutUsuario');
  Route::get('validarrutempresa/{rut}', 'EmpresaController@ValidarRutEmpresa');
  /*Gestión de Rut */


  /*Gestión de tickets*/
  Route::get('tickets','TicketController@history');
  Route::get('tickets/history','TicketController@history');
  Route::resource('tickets','TicketController');
  Route::post('efectuarcompraticket', 'TicketController@EfectuarCompra');
  Route::get('verificartickets/{user_id}', 'TicketController@VerificarTickets')->where('user_id', '[0-9]+');
  Route::get('verificaryavucoins', 'CoinController@VerificarYavuCoins');
  Route::get('contartickets', 'TicketController@ContarTickets');
  Route::post('usarticket/', 'SorteoController@UsarTicket');
  Route::post('usaryavucoins', 'SorteoController@UsarYavuCoins');
  /*Gestión de tickets*/

  /*Gestión de Notificaciones -> Pops*/
  Route::resource('pops', 'PopController');
  Route::get('cargarpops/{idUltima}/{usuario}/{tipo}', 'PopController@CargarPops')->where(['idUltima', 'usuario'], '[0-9]+');
  Route::get('cargarpopsempresa/{idUltima}/{empresa}', 'PopController@CargarPopsEmpresa')->where(['idUltima', 'empresa'], '[0-9]+');

  /*Gestión de Notificaciones -> Pops*/




  /*Gestión de Encuestas*/
  Route::resource('encuestas', 'EncuestaController');
  /*Gestión de Encuestas*/

  /*Gestión de Preguntas*/
  Route::resource('preguntas', 'PreguntaController');
  /*Gestión de Preguntas*/

  /*Gestión de Alternativas*/
  Route::resource('alternativas', 'AlternativaController');
  /*Gestión de Alternativas*/

  /*Gestión de Servicio*/
  Route::resource('servicios', 'ServicioController');
  /*Gestión de Servicio*/

  /*Gestión de Banners */
  Route::resource('banners', 'BannerController');
  /*Gestión de Banners */

  /*Gestión de Pago*/
  Route::resource('pagos', 'PagoController');
  /*Gestión de Pago*/

  /*Gestión de Beneficio*/
  Route::resource('beneficios', 'BeneficioController');
  /*Gestión de Beneficio*/

  /*Gestión de Role*/
  Route::resource('roles', 'RoleController');
  /*Gestión de Role*/

  /*Gestión de Evento*/
  Route::resource('eventos', 'EventoController');
  /*Gestión de Evento*/

  /*Gestión de Banners */
  Route::resource('feeds', 'FeedController');
  Route::get('eliminarfeed/{id}', 'FeedController@EliminarFeed');
  /*Gestión de Banners */

  /*Gestión de  Interacciones */
  Route::resource('interacciones', 'InteraccionController');
  /*Gestión de Interacciones */

  /*Gestión de  Interes */
  Route::resource('intereses', 'InteresController');
  /*Gestión de Interes */

  /*Gestión de Mapas*/
  Route::resource('gmaps', 'GmapsController');
  /*Gestión de Mapas*/





}); /*Fin del middleware user*/


Route::group(['middleware' => 'admin'], function(){


  /*Gestión de Admins*/
  
  Route::get('admins/banneradmin','AdminController@indexbanner');
  Route::get('/admins/bannercreate/{empresa_id}', 'AdminController@bannercreate');
  Route::post('/admins/bannercreate/', ['uses' => 'AdminController@bannerstore' , 'as' => 'admins_banner_create_path']);
  Route::get('admins/banneradmin/{id}/edit/', ['uses' => 'AdminController@banneredit','as' => 'admins_banner_edit_path']);
  Route::put('admins/banneradmin/{id}/edit/', ['uses' => 'AdminController@bannerupdate','as' => 'admins_banner_put_path']);
  Route::get('admins/empresas/index', 'AdminController@empresasindex');

  Route::get('admins/empresas/{id}/edit', ['uses' => 'AdminController@empresasedit', 'as' => 'admins_empresas_edit_path']);

  Route::put('admins/empresas/{id}/edit', ['uses' => 'AdminController@empresasupdate','as' => 'admins_empresas_put_path']);


  Route::get('admins/usersadmin/index', 'AdminController@usersindex');


  Route::get('admins/mailing','AdminController@mailing');

  Route::get('admins/inscribe','AdminController@inscribe');
  Route::post('admins/inscribe','AdminController@saveUser');
  Route::post('admins/mailing', 'MailController@massive');

  /* TEMPLATES --borrar despues cuando se dejen de usar*/
  Route::get('admins/template1', 'AdminController@template1');
  Route::get('admins/template2', 'AdminController@template2');
  Route::get('admins/template3', 'AdminController@template3');
  /* TEMPLATES */

  Route::post('admins/empresas/create', [ 'uses' => 'AdminController@empresasstore', 'as' => 'admins_empresas_create_path' ]);
  Route::get('admins/empresas/create', 'AdminController@empresascreate');
  Route::resource('admins','AdminController');
  Route::get('sorteospendientes', 'SorteoController@SorteosPendientes');
  Route::get('aprobarsorteopendiente', 'SorteoController@AprobarSorteoPendiente');
  Route::get('visualizarempresasorteopendiente', 'SorteoController@VisualizarSorteoPendiente');
  Route::get('validarrutempresaadmin/{rut}', 'EmpresaController@ValidarRutEmpresa');

  
  /*Gestión de Admins*/


  /*Gestión de Categorías */
  Route::resource('categorias', 'CategoriaController');
  /*Gestión de Categorías */



});


/*Gestión del front*/
Route::get('/','FrontController@index');
Route::get('index','FrontController@index');
//Route::get('login','FrontController@login');

//Route::get('registro','FrontController@registro');
Route::get('yavucoins','FrontController@yavucoins');
Route::get('yavu','FrontController@yavu');
Route::get('tuin','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('listaempresas/{empresa}','EmpresaController@ListaEmpresas');
Route::get('nosotros','FrontController@nosotros');
Route::get('terminos','FrontController@terminos');
Route::get('faq','FrontController@faq');

Route::get('main/sorteos/activos', 'FrontController@sorteosActivos');
Route::get('main/sorteos/finalizados', 'FrontController@sorteosFinalizados');
Route::get('main/sorteo/{id}', 'FrontController@sorteo');

/*
Route::get('sitemap', function(){
	return view('sitemap');
});
*/
/*Gestión del front*/




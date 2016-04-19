<?php
Route::get('breweries', ['middleware' => 'cors', function()
{
  return \Response::json(\yavu\Brewery::with('beers', 'geocode')->paginate(10), 200);
}]);

Route::group(['middleware' => 'user'], function(){
  /*
  Route::get('tester', [
    'uses' => 'BorrarController@tester',
    'as' => 'borrar_tester_path',
  ]);
  */

  Route::get('logout', 'LogController@logout');

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
  Route::resource('coins','CoinController');
  Route::get('reports','CoinController@index');
  Route::get('contarcoins', 'CoinController@ContarCoins');
  Route::get('historialcoins', 'CoinController@HistorialCoins');
  /*Gestión de coins*/

  /*Gestión de Usuarios*/
  Route::resource('interactuar', 'InteraccionEstadoController');
  Route::get('contarinteracciones/{status_id}', 'InteraccionEstadoController@ContarInteracciones')->where('status_id', '[0-9]+');
  Route::get('estadosusuario/{idUltima}', 'EstadoController@CargarEstados')->where('idUltima', '[0-9]+');
  Route::resource('usuarios','UserController');
  Route::resource('dashboard', 'UserController@dashboard');
  Route::resource('profile', 'UserController@profile');
  Route::get('infoempresas/{user_id}','UserController@InfoEmpresas')->where('user_id', '[0-9]+');
  Route::get('verificarusuario/{codigo}', 'UserController@VerificarUsuario')->where('codigo', '[0-9]+');
  /*Gestión de Usuarios*/


  /*Gestión de Empresas*/
  Route::resource('empresas','EmpresaController');
  Route::get('empresa/{empresa}/', 'EmpresaController@MostrarEmpresaPublica');
  Route::get('listaempresas', 'EmpresaController@ListaEmpresas');
  Route::get('solicitareliminacionempresa/{id}', 'EmpresaController@SolicitarEliminacion')->where('id', '[0-9]+');
  Route::get('buscarempresa/{nombre?}', 'EmpresaController@BuscarEmpresas');
  /*Gestión de Empresas*/
  /*Gestión de Servicios*/
  Route::resource('servicios','ServicioController');
  /*Gestión de Servicios*/

  /*Gestión de Sorteos*/
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

  /*Gestión de  Followers */
  Route::get('seguirempresa/{empresa_id}/{user_id}', 'FollowerController@SeguirEmpresa')->where(['empresa_id', 'user_id'], '[0-9]+');
  Route::get('noseguirempresa/{empresa_id}/{user_id}', 'FollowerController@NoSeguirEmpresa')->where(['empresa_id', 'user_id'], '[0-9]+');
  Route::get('contarseguidores/{empresa_id}/{user_id}','FollowerController@ContarSeguidores')->where(['empresa_id', 'user_id'], '[0-9]+');
  Route::get('verificarseguidores/{empresa_id}/{user_id}','FollowerController@VerificarSeguidores')->where(['empresa_id', 'user_id'], '[0-9]+');
  /*Gestión de Followers */

  /*Gestión de  Rut */
  Route::get('validarrutusuario/{rut}', 'UserController@ValidarRutUsuario');
  Route::get('validarrutempresa/{rut}', 'EmpresaController@ValidarRutEmpresa');
  /*Gestión de Rut */


  /*Gestión de tickets*/
  Route::resource('tickets','TicketController');
  Route::get('efectuarcompraticket/{user_id}/{cantidadtickets}', 'TicketController@EfectuarCompra')->where(['user_id', 'cantidadtickets'], '[0-9]+');
  Route::get('verificartickets/{user_id}', 'TicketController@VerificarTickets')->where('user_id', '[0-9]+');
  Route::get('contartickets', 'TicketController@ContarTickets');
  Route::get('usarticket/{user_id}/{sorteo_id}', 'SorteoController@UsarTicket')->where(['user_id', 'sorteo_id'], '[0-9]+');
  /*Gestión de tickets*/

  /*Gestión de Notificaciones -> Pops*/
  Route::resource('pops', 'PopController');
  Route::get('cargarpops/{idUltima}/{usuario}/{tipo}', 'PopController@CargarPops')->where(['idUltima', 'usuario'], '[0-9]+');
  Route::get('cargarpopsempresa/{idUltima}/{empresa}', 'PopController@CargarPopsEmpresa')->where(['idUltima', 'empresa'], '[0-9]+');

  /*Gestión de Notificaciones -> Pops*/


  /*Gestión de correos*/
  Route::resource('mail', 'MailController');
  /*Gestión de correos*/



}); /*Fin del middleware user*/


/*Gestión del front*/
Route::get('/','FrontController@index');
Route::get('index','FrontController@index');
Route::get('login','FrontController@login');
Route::get('registro','FrontController@registro');
Route::get('yavucoins','FrontController@yavucoins');
Route::get('contacto','FrontController@contacto');
Route::get('listaempresas/{empresa}','EmpresaController@ListaEmpresas');
Route::get('nosotros','FrontController@nosotros');
Route::get('terminos','FrontController@terminos');
/*
Route::get('sitemap', function(){
	return view('sitemap');
});
*/
/*Gestión del front*/





/*Gestión de ingreso login*/
Route::resource('log', 'LogController');
/*Gestión de ingreso login*/




/*Gestión de Admins*/
Route::resource('admins','AdminController');  
/*Gestión de Admins*/



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

/*Gestión de Categorías */
Route::resource('categorias', 'CategoriaController');
/*Gestión de Categorías */

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
Route::get('vendor/add', function(){

  //view
  return View::make('add');
});
Route::post('vendor/add', function(){

});
Route::get('vendor/{id}', function($id){

});

Route::resource('gmaps', 'GmapsController');
/*Gestión de Mapas*/


Route::get('social/{provider?}', 'SocialController@getSocialAuth');
Route::get('social/callback/{provider?}', 'SocialController@getSocialAuthCallback');
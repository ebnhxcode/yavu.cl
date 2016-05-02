{!!Html::script('js/jquery.js')!!}
<!--{!!Html::script('js/ajax/GestionarEstados.js')!!}-->
<!--{!!Html::script('js/ajax/GestionarInteraccionesEstadosUsuario.js')!!}-->
<!--{!!Html::script('js/ajax/InteraccionPublicaciones.js')!!}-->
@extends('layouts.front')
@section('content')
<div class='jumbotron'>
	<div id='contentMiddle'>
		<div class='row' style='margin-top:-35px;'>
			@include('alerts.alertFields')
			@include('alerts.errorsMessage')
			@include('alerts.successMessage')
			@include('alerts.warningMessage')
				<div class='col-sm-8'>
					<div class='list-group' >

						<div class='list-group'>
							<div class='list-group-item list-group-item-info '>
								Hola!: {!!strtoupper(Auth::user()->get()->nombre . ' ' . Auth::user()->get()->apellido)!!}
							</div>
						</div>

						<!-- SECCION DE LAS FOTO DE PERFIL Y PORTADA -->
						<div id="IPortada" class=''>
							<div class='thumbnail'>

								@if(Auth::user()->get()->imagen_portada === '')
									<img id='ImagenPortada' src='/img/users/banner.png' width=100%>
								@else
									<img id='ImagenPortada' src='/img/users/{!!Auth::user()->get()->imagen_portada!!}' alt='...'>
								@endif								
								<div class='caption'>
									{!!Auth::user()->get()->email!!}
									{!!Auth::user()->get()->ciudad!!}


								</div>

							</div>
						</div>
					</div>
					{!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
					<!--
					<div class='list-group'>
						<div class='list-group-item-full-header'>
							<h6>PUBLICAR NUEVO ESTADO</h6>
						</div>
						{!!Form::open(['action'=>'EstadoController@store', 'method'=>'POST'])!!}
						{!!Form::textarea('status',null,['class'=>'form-control-stat','placeholder'=>'¿Qué deseas compartir en yavu?', 'maxlength'=>'500', 'required'=>'required','style'=>'resize:none;', 'rows'=>'10', 'id'=>'status'])!!}
						
						<input type='hidden' name='_token' value='{!!csrf_token()!!}' id='token' />
						<div class='list-group-item'>
							{!!link_to('#!', $title='Publicar estado', $attributes = ['id'=>'publicar', 'class'=>'btn btn-success btn-xs'], $secure = null)!!}
							{!!link_to('#!', $title='Limpiar', $attributes = ['id'=>'limpiar', 'class'=>'btn btn-success btn-xs'], $secure = null)!!}
							{!!Form::close()!!}     
							<div id='msj-success' class='alert alert-success alert-dismissible' role='alert' style='display:none'>
								Publicacion creada correctamente
							</div>          
							<div id='msj-error' class='alert alert-error alert-dismissible' role='alert' style='display:none'>
								El texto ingresado contiene caracteres no permitidos que no se guardarán.
							</div>                                      
						</div>  
					</div>
					-->
					<!--
					<div id='e'>
						<div id='Estados'></div>
							{!!Form::hidden('idUltima', '0', ['id'=>'idUltima'])!!}
						</div>
					<div>
						<div id='msj-estado' class='alert alert-dismissible list-group-item' role='alert' style='display:none;'>
							<img width='30%'  src='/images/iconoCargando.gif'/>
						</div>
						<div id='msj-finPublicaciones' class='alert alert-dismissible list-group-item-warning' role='alert' style='display:none;'>
							No hay mas publicaciones.
						</div>
						<a id='CargarEstados' href='#!' class='list-group-item list-group-item-info'>
							Cargar estados
							<span id='EstadosNuevos' class='badge'></span>
						</a>
					</div>
					<br>
					-->

				</div>
				<div class='col-sm-4'><!--style='position:fixed;z-index:1000;'-->

					<div class="list-group">
						<div class="list-group-item">
							@if(Auth::user()->get()->imagen_perfil === '')
								<img id='ImagenPerfil' src='/img/users/usuario_nuevo.png' class='center-block'>
							@else
								<img id='ImagenPerfil' src='/img/users/{!!Auth::user()->get()->imagen_perfil!!}' class='center-block' width='100' height='100' class='img-responsive'>
							@endif
                <div class="">
                  <div class="" >
                    <div>

                      <div class="dropdown">
                        <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li>
                            <a href="{!! route('usuarios_edit_path', Auth::user()->get()->id) !!}">Editar Perfil de Usuario</a>
                          </li>
                          <li role="separator" class="divider"></li>
                          <li>
                            <a href="#!">M&aacute;s informaci&oacute;n acerca de la privacidad</a>
                          </li>
                          <li>
                            <a href="#!">Preguntas frecuentes</a>
                          </li>
                          <li>
                            <a href="#!">Ayuda</a>
                          </li>
                          <li>
                            <a href="#!"></a>
                          </li>
                        </ul>
                      </div><!-- /div dropdown -->

                    </div>
                  </div>
                </div>
						</div>
					</div>

					<div class="list-group">


						<div class="list-group-item">
							<div class="row">

								<div class="col-md-4 col-sm-4 col-xs-4">
									<div class="list-group" >
										<div align="center">
											<a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/feeds')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
                          </span>
											</a>
										</div>
										<div align="center"><small>Publicaciones</small></div>
									</div>
								</div>

								<div class="col-md-4 col-sm-4 col-xs-4">
									<div class="list-group" >
										<div align="center">
											<a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/sorteos')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/>
                          </span>
											</a>
										</div>
										<div align="center"><small>Sorteos</small></div>
									</div>
								</div>

								<div class="col-md-4 col-sm-4 col-xs-4">
									<div class="list-group" >
										<div align="center">
											<a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/tickets/history')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}"/>
                          </span>
											</a>
										</div>
										<div align="center"><small>Tickets</small></div>
									</div>
								</div>



								<div class='col-md-4 col-sm-4 col-xs-4'>
									<div class='list-group' >
										<div align="center">
											<a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}"/>
                          </span>
											</a>
										</div>
										<div align="center"><small>Informe Coins</small></div>
									</div>
								</div>

								<div class='col-md-4 col-sm-4 col-xs-4'>
									<div class='list-group' >
										<div align="center">
											<a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/tickets/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
                          <span>
                            <img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
                          </span>
											</a>
										</div>
										<div align="center"><small>Informe Ticket's</small></div>
									</div>
								</div>

							</div><!-- /row -->
						</div> <!-- /list group item -->

					</div> <!-- /list group -->

					{{--
					<div class='list-group'>
						<div class='list-group-item'>
							<h3><span class="list-group-item list-group-item-success">Información</span></h3>
						</div>

						<div class='list-group-item'>
							Estado usuario
							<span id='EstadoUsuario' style='float:right;' class='label label-success'>
							<span class='glyphicon glyphicon-chevron-up' aria-hidden='true'></span>
									{!!Auth::user()->get()->estado!!}
							</span>
						</div>

					</div>
					--}}

					<div class='list-group'  id='EstadoEmpresa'>


					</div>




					<div class='list-group'>
						<div class='list-group-item list-group-item-success'>
							<h4>C&oacute;digo de referidos</h4>
						</div>
						<div class='list-group-item'>
							<h5>¡Invita a tus Amigos a registrarse y entregales este c&oacute;digo!</h5>


							<div align="center">
								<button id='Info' type='button' class='btn btn-info btn-sm' data-container='body' data-toggle='popover' data-placement='top' data-content='Con este código tus amigos ganarán coins al registrarse!' data-original-title='Atención {!!Auth::user()->get()->nombre!!}'>
									Info
								</button>
								<h3>{!!strtoupper(Auth::user()->get()->id. Auth::user()->get()->referente)!!}</h3>
							</div>

						</div>
						
					</div>   
				</div>
		</div>
	</div><!-- Fin del div id contentIn -->
</div>
@stop
<script>

		function CloseInfo()
		{
			$('#Info').popover('hide');
			return true;
		}

			function eliminarEstado(id){
				$('#publicacion'+id).fadeOut();
				return true;
			}

			function Interactuar(valor){
				var status_id = valor.replace('estado_','');
				var user_id = $('#user_id').val();
				var token = $('#token').val();
				var route = 'http://localhost:8000/interactuar';
				$.ajax({
					url: route,
					headers: {'X-CSRF-TOKEN': token},
					type: 'POST',
					dataType: 'json',
					data: {
						status_id: status_id,
						user_id: user_id
					},
					success:function(){
						$('#'+valor).addClass('text-info').fadeIn();
						console.log('exito');
						ContarInteracciones(status_id);
					}
				});
				ContarInteracciones(status_id);
				$('#'+valor).removeClass('text-info').fadeIn();
				return true;
			}

			function ContarInteracciones(status_id){
				status_id = status_id;
				var route = 'http://localhost:8000/contarinteracciones/'+status_id;
				var user_id = $('#user_id');
				var Contador = 0;
				$.get(route, function(res){
					$(res).each(function(key,value){
						Contador += 1;
					});
					$('#badge_'+status_id).text(Contador);
				});
				return true;
			}



</script>
@extends('layouts.front')
@section('content')
<div class='jumbotron'>
	<div id='contentMiddle'>
		<div class='row' style='margin-top:-35px;'>
				<div class="col-md-12 col-sm-12 col-xs-12">
					@include('alerts.allAlerts')
				</div>

				<div class='col-md-8 col-sm-6 col-xs-12'>
					<div class='list-group' >

						{{--
						<div class='list-group'>
							<div class='list-group-item list-group-item-info '>
								Hola! {!!(Auth::user()->get()->nombre . ' ' . Auth::user()->get()->apellido)!!}
							</div>
						</div>
 						--}}

						<!-- SECCION DE LAS FOTO DE PERFIL Y PORTADA -->
						<div id="IPortada" class=''>
							<div class='thumbnail'>
								@if($user->imagen_portada == '')
									<img id='ImagenPortada' src='/img/users/banner.png' width=100%>
								@else
									<img id='ImagenPortada' src='/img/users/{!!$user->imagen_portada!!}' alt='...'>
								@endif
								{{--
								<div class='caption'>

								</div>
								--}}
							</div>
						</div>
					</div>
					{!!Form::hidden('user_id', $user->id, ['id'=>'user_id'])!!}
				</div>
				<div class='col-md-4 col-sm-6 col-xs-12'><!--style='position:fixed;z-index:1000;'-->

					<div class="list-group">
						<div class="list-group-item">
							@if($user->imagen_perfil == '')
								<img id='ImagenPerfil' src='/img/users/usuario_nuevo.png' class='center-block'>
							@else
								<img id='ImagenPerfil' src='/img/users/{!!$user->imagen_perfil!!}' class='center-block' class='thumbnail' class='img-rounded' width='300px' height='300px' class='img-responsive'>
							@endif
								<h3>{!! $user->nombre.' '.$user->apellido !!}</h3>
							<div class="dropdown">

									<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
										<span class="caret"></span>
									</button>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<li>
										<a href="{!! route('usuarios_edit_path', $user->id) !!}">Editar Perfil de Usuario</a>
									</li>
									{{--
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
									--}}
								</ul>
							</div><!-- /div dropdown -->

						</div>
					</div>

					<div class="list-group">

						@include('miniDashboard.miniDashboard')

					</div> <!-- /list group -->

					<div class='list-group'  id='EstadoEmpresa'>

					</div>

				</div>
		</div>
	</div><!-- Fin del div id contentIn -->
</div>
@stop

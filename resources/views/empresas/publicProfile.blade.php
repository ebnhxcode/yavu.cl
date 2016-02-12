{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/GestionarEstadosEmpresa.js')!!}
<!--{!!Html::script('js/ajax/GestionarCoinsEmpresa.js')!!}-->
<!--{!!Html::script('js/ajax/InteraccionPublicacionesEmpresa.js')!!}-->
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')

<!--		
		@foreach($empresa as $e)	
		<h4>Perfil publico de : {{$e->nombre}}</h4>
		Datos para mostrar en el perfil publico
		Campo : {{$e->rut}}<br>
		Campo : {{$e->email}}<br>
		Campo : {{$e->direccion}}<br>
		Campo : {{$e->ciudad}}<br>
		Campo : {{$e->nombre_encargado}}<br>
		Campo : {{$e->fecha_creacion}}<br>
		Campo : {{$e->password}}<br>
		@endforeach
-->
		@foreach($empresa as $e)
			<div class="row" style="margin-top:-35px;">
				<div class="col-sm-8">
					<div class="list-group" >
						<div class="list-group-item-full-header">
							{!!Form::hidden('empresa', $e->nombre, ['id'=>'empresa'])!!}
							<h6>{{ strtoupper("Perfil publico de: ".$e->nombre)}}</h6>
						</div>
						<div class="">
							<div class="thumbnail">
								<img src="/images/default-img.gif" alt="...">
								
								<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTJkNjZiYjE0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MmQ2NmJiMTRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjgiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" alt="..." class="img-circle">									


								<div class="caption">
									Campo : {{$e->email}}<br>
									Campo : {{$e->direccion}}<br>
									Campo : {{$e->ciudad}}<br>
									<p>
										<a href="#!" class="btn btn-primary btn-xs" role="button">Button</a> 
										<a href="#!" class="btn btn-default btn-xs" role="button">Button</a>
									</p>

								</div>
							</div>
						</div>

					</div>

				@if(isset(Auth::user()->get()->id))
					@if($e->user_id == Auth::user()->get()->id)
						<div class="list-group">
							<div class="list-group-item-full-header">
								<h6>PUBLICAR NUEVO ESTADO</h6>
							</div>

							<div class="list-group-item">
								Mira lo que otros interatúan con la variedad de publicaciones de tiendas que podrían interesarte.
							</div>					
							<div class="list-group-item">
								No te pierdas las publicaciones pendientes
							</div>		

							
							<div class="list-group-item-full-classic">
								{!!Form::open(['route'=>'estadoempresa.store', 'method'=>'POST'])!!}
									{!!Form::textarea('status',null,['class'=>'form-control-stat','placeholder'=>'¿Qué deseas compartir en yavu?', 'maxlength'=>'500', 'required'=>'required','style'=>'resize:none;', 'rows'=>'10', 'id'=>'status'])!!}
									@if(Auth::user()->check())
										{!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
									@else
										{!!Form::hidden('user_id', $e->user_id, ['id'=>'user_id'])!!}
									@endif

									{!!Form::hidden('empresa_id', $e->id, ['id'=>'empresa_id'])!!}
									
									<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />
							</div>
							<div class="list-group-item">							
									{!!link_to('#!', $title="Publicar estado", $attributes = ['id'=>'publicar', 'class'=>'btn btn-success btn-xs'], $secure = null)!!}
									{!!link_to('#!', $title="Limpiar", $attributes = ['id'=>'limpiar', 'class'=>'btn btn-success btn-xs'], $secure = null)!!}											
						
								{!!Form::close()!!}		

								<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
									<!--
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									-->
									Publicacion creada correctamente
								</div>			
								<div id="msj-error" class="alert alert-error alert-dismissible" role="alert" style="display:none">
									<!--
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									-->
									El texto ingresado contiene caracteres no permitidos que no se guardarán.
								</div>										
							</div>	
						</div>
					@endif
				@endif

				<div>
					<div id="Estados">
					</div>
					{!!Form::hidden('idUltima', "0", ['id'=>'idUltima'])!!}									
				</div>

				
				<div>
					
					<div id="msj-estado" class="alert alert-dismissible list-group-item" role="alert" style="display:none;">
						<img width="30%"  src='/images/iconoCargando.gif'/>
					</div>
					<div id='msj-finPublicaciones' class="alert alert-dismissible list-group-item" role="alert" style="display:none;">
							No hay mas publicaciones.
					</div>

					<a id="CargarEstados" href="#!" class="list-group-item list-group-item-info">
						Cargar estados 
						<span id="EstadosNuevos" class="badge"></span>					
					</a>	
						
				</div>	
				
				<br>


				</div>

				<div class="col-sm-4"><!--style="position:fixed;z-index:1000;"-->

			   
				
					<div class="list-group">
						<div class="list-group-item-full-header">
							<h6>INFORMACIÓN</h6>
						</div>
						<div class="list-group-item">
							Últimas novedades en yavu
						</div>	
						@if(Auth::user()->check())
							{!!link_to_route('usuarios.edit', $title = 'Modificar datos de mi cuenta', $parameters = Auth::user()->get()->id, $attributes = ['class'=>'list-group-item list-group-item-info'])!!}
							
							<a href="{!!URL::to('dashboard')!!}" class="list-group-item list-group-item-warning">Volver a dashboard</a>
							
							<a href="{!!URL::to('sitemap')!!}" class="list-group-item list-group-item-warning">Ir al Sitemap</a>
						@endif
					</div>	
				
				</div>

			</div>

			<br />

		@endforeach
	</div>
</div>
@stop
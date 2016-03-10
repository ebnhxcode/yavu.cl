{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/GestionarEstadosEmpresa.js')!!}
{!!Html::script('js/ajax/SeguirEmpresa.js')!!}
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

								

								@if($e->imagen_portada === "" )
									<img id="ImagenPortada" src="http://medioambiente.nh-hoteles.es/themes/default/images/bgd-biodiversidad-00.png" alt="...">
								@else
									<img id="ImagenPortada" src="/img/users/{{$e->imagen_portada}}" alt="...">
								@endif								

								@if($e->imagen_perfil === "")
									<img id="ImagenPerfil" src="https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png" class="img-circle" alt="...">
								@else
									<img id="ImagenPerfil" src="/img/users/{{$e->imagen_perfil}}" class="img-circle" alt="...">
								@endif



								<div class="caption">
									Campo : {{$e->email}}<br>
									Campo : {{$e->direccion}}<br>
									Campo : {{$e->ciudad}}<br>
									
									@if (Auth::user()->check())
										<p>
											<span class="btn btn-primary btn-xs" id="seguir" value="{!! $e->id !!}" role="button">Seguir</span> 
											<input type="text" class="btn-xs" id="seguidores" size="1" disabled >
										</p>
									@else
										<p>
											<a href="{!! URL::to('/usuarios/create') !!}" class="btn btn-primary btn-xs" role="button">Seguir</a> 
										</p>
										<small>Para seguir a esta empresa debes registrarte</small>
									@endif

								</div>
							</div>
						</div>

					</div>
					{!!Form::hidden('empresa_id', $e->id, ['id'=>'empresa_id'])!!}
				@if(isset(Auth::user()->get()->id) && Auth::user()->get()->id===$e->user_id)
					@if($e->user_id == Auth::user()->get()->id)
						<div class="list-group">
							<div class="list-group-item-full-header">
								<h6>PUBLICAR NUEVO ESTADO</h6>
							</div>
							{!!Form::open(['route'=>'estadoempresa.store', 'method'=>'POST'])!!}
								{!!Form::textarea('status',null,['class'=>'form-control-stat','placeholder'=>'¿Qué deseas compartir en yavu?', 'maxlength'=>'500', 'required'=>'required','style'=>'resize:none;', 'rows'=>'10', 'id'=>'status'])!!}
								@if(Auth::user()->check())
									{!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
								@else
									{!!Form::hidden('user_id', $e->user_id, ['id'=>'user_id'])!!}
								@endif
									
								<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />
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
					<div id='msj-finPublicaciones' class="alert alert-dismissible list-group-item-warning" role="alert" style="display:none;">
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

					<div class="list-group">                    
						<div class="list-group-item">
							<h6>ACCESOS RÁPIDOS</h6>
						</div>
						<a class="list-group-item list-group-item-warning" href="{!! URL::to('/feeds') !!}">Ir a publicaciones</a>
						{!!link_to_route('empresas.edit', $title = 'Modificar datos de mi empresa', $parameters = $e->id, $attributes = ['class'=>'list-group-item list-group-item-info'])!!}
						<a href="{!!URL::to('dashboard')!!}" class="list-group-item list-group-item-warning">Volver a dashboard</a>
						<a href="{!!URL::to('sitemap')!!}" class="list-group-item list-group-item-warning">Ir al Sitemap</a>
						<a href="{!!URL::to('sorteos/create')!!}" class="list-group-item list-group-item-warning">Crear sorteo nuevo</a>
					</div>  					
				
				</div>

			</div>

			<br />

		@endforeach
	</div>
</div>
@stop
<script>

	function eliminarEstado(id){
		$("#publicacion"+id).fadeOut();
	}

	function Interactuar(valor){
		var status_id = valor.replace('estado_','');
		var user_id = $("#user_id").val();
		var token = $("#token").val();
		var route = "http://localhost:8000/interactuar";
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
				$('#'+valor).addClass("text-info").fadeIn();
				console.log('exito');
				ContarInteracciones(status_id);
			}
		});
		ContarInteracciones(status_id);
		$('#'+valor).removeClass("text-info").fadeIn();
		return true;
	}

	function ContarInteracciones(status_id){
		status_id = status_id;
		var route = "http://localhost:8000/contarinteracciones/"+status_id;
		var user_id = $("#user_id");
		var Contador = 0;
		$.get(route, function(res){
			$(res).each(function(key,value){
				Contador += 1;
			});
			$("#badge_"+status_id).text(Contador);
		});
	}

</script>


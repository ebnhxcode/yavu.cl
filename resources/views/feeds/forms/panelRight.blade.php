<div class="col-md-8 col-sm-12 col-xs-12">


	@if((Auth::user()->check()))
		@if($user_id == Auth::user()->get()->id)
			<div class="list-group">
				<div class="list-group-item">
					<strong>PUBLICAR NUEVO ESTADO</strong>
				</div>
				<div class="list-group-item">
					{!!Form::open(['route'=>'estadoempresa.store', 'method'=>'POST'])!!}
					{!!Form::textarea('status',null,['class'=>'form-control','placeholder'=>'¿Qué deseas compartir en yavu?', 'maxlength'=>'500', 'required'=>'required','style'=>'resize:none;', 'rows'=>'4', 'id'=>'status'])!!}
					@if(Auth::user()->check())
						{!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
						{!!Form::hidden('empresa_id', $empresa_id, ['id'=>'empresa_id'])!!}
					@else
						{!!Form::hidden('user_id', $user_id, ['id'=>'user_id'])!!}
					@endif
				</div>
				<div class="list-group-item">
					{!!link_to('#!', $title="Publicar estado", $attributes = ['id'=>'publicar', 'class'=>'btn btn-success btn-sm'], $secure = null)!!}
					{!!link_to('#!', $title="Limpiar", $attributes = ['id'=>'limpiar', 'class'=>'btn btn-success btn-sm'], $secure = null)!!}
				</div>
				<div class="list-group-item">
					<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
						Publicacion creada correctamente
					</div>
					<div id="msj-error" class="alert alert-info alert-dismissible" role="alert" style="display:none">
						El texto ingresado contiene caracteres no permitidos que no se guardarán.
					</div>
				</div>
				{!!Form::close()!!}
			</div>
		@endif
	@endif











  <div id="e">

	 <div id="Estados"></div>

	 {!!Form::hidden('idUltima', "0", ['id'=>'idUltima'])!!}    

  </div>

  <div>

	 <div id="msj-estado" class="alert alert-dismissible list-group-item" role="alert" style="display:none;">
		<img width="30%"  src='{!! URL::to('/img/users/iconoCargando.gif') !!}'/>
	 </div>

	 <div id='msj-finPublicaciones' class="alert alert-dismissible list-group-item-warning" role="alert" style="display:none;">
		No hay mas publicaciones.
	 </div>

	 <a id="CargarEstados" href="#!" class="list-group-item list-group-item-info">
		Cargar estados 
		<span id="EstadosNuevos" class="badge"></span>                  
	 </a>  

  </div>

</div>
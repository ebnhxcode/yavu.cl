{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarEmpresa.js')!!}
@extends('layouts.front')	

@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		<h1>Empresas</h1>
		<a class="btn btn-success btn-sm" href="{!! URL::to("/empresas/create") !!}">
			<span class="glyphicon glyphicon-plus"></span>
			Crear nueva empresa
		</a>
    <span class="btn btn-success btn-sm" style="" href="#!" id="ComprarMasTickets">
      <span class="glyphicon glyphicon-plus"></span>
      Comprar más tickets
    </span>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
  				@if(Auth::admin()->check())
			      <div class="input-group input-group-lg">
							<span class="glyphicon glyphicon-search input-group-addon" id="sizing-addon1"></span>
							{!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'empresa', 'aria-describedby' => 'sizing-addon1'])!!}
			      </div>
					@elseif(Auth::user()->check() || !Auth::user()->check())
			      <div class="input-group input-group-lg has-success">
							<span class="glyphicon glyphicon-search input-group-addon" id="sizing-addon1"></span>
							{!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'empresathumb', 'role' => 'combobox', 'aria-describedby' => 'sizing-addon1'])!!}
			      </div>
					@endif
				</div>
				@if(Auth::admin()->check())
					<table class="table table-hover" id="EmpresaList">
						<thead>
							<th>Nombre</th>
							<th>Correo</th>
							<th>ciudad</th>
							<th>Fono</th>
							<th>Aniversario Empresa</th>
							<th>Encargado</th>
							<th>Operaciones</th>
						</thead>
						@foreach($empresas as $empresa)	
							<tbody>
								<td>{!!$empresa->nombre!!}</td>
								<td>{!!$empresa->email!!}</td>
								<td>{!!$empresa->ciudad!!}</td>
								<td>{!!$empresa->fono!!}</td>
								<td>{!!$empresa->fecha_creacion!!}</td>
								<td>{!!$empresa->nombre_encargado!!}</td>
								<td>{!!link_to_route('empresas.edit', $title = 'Editar', $parameters = $empresa->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
							</tbody>
						@endforeach
					</table>	
				@elseif(Auth::user()->check() || !Auth::user()->check())
					<div id="EmpresaListThumb">
						@foreach($empresas as $empresa)	
							<div class="col-md-4">
								<div class="thumbnail card">

									@if($empresa->imagen_portada === "" )
										<img id="ImagenPortada" src="http://medioambiente.nh-hoteles.es/themes/default/images/bgd-biodiversidad-00.png" alt="...">
									@else
										<img id="ImagenPortada" src="/img/users/{!!$empresa->imagen_portada!!}" alt="...">
									@endif

									{{-- @if($empresa->imagen_perfil !== "")
										<img width="40%" class="img-circle" src="{!!URL::to('img/users/'.$empresa->imagen_perfil)!!}" alt="">
									@else
										<img width="40%" id="ImagenPerfil" class="img-circle" src="/images/pyme.jpg" alt="...">
									@endif --}}

									<h4><a class="btn-link" href="/empresa/{!!$empresa->nombre!!}">{!!$empresa->nombre!!}</a></h4>
									{!!$empresa->ciudad!!}
									<br>
									{!!$empresa->fono!!}
									<br>
								</div>
							</div>
						@endforeach
					</div>
					{!!$empresas->render()!!}
				@endif
			</div><!-- /panel body -->
		</div><!-- /panel panel-default -->
	</div><!-- /contentMiddle -->
</div><!-- /jumbotron -->


@stop
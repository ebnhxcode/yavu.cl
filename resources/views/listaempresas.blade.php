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
		<h2>Panel de administración</h2>		
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Mantenedor de empresas</h4></div>
			<div class="panel-body">

					<div class="form-group">
						{!!Form::text('empresa',null,['class'=>'form-control','placeholder'=>'buscar...','id'=>'empresa'])!!}
					</div>
					<!--<a href="#!" class="btn btn-primary btn-sm" id="BuscarUsuario">Buscar</a>-->
				<div class="wrap">

					<table id="EmpresaList" class="table table-hover">
						<thead>
							<th>Nombre</th>
							<th>Región</th>
							<th>Ciudad</th>

							<th>Operaciones</th>
						</thead>
						@foreach($empresas as $empresa)	
						<tbody>
							<td>{{$empresa->nombre}}</td>
							<td>{{$empresa->email}}</td>
							<td>{{$empresa->ciudad}}</td>
							<td>{{$empresa->fono}}</td>
							<td>{{$empresa->fecha_nacimiento}}</td>
							<td>{{$empresa->sexo}}</td>
							<td>{!!link_to_route('usuarios.edit', $title = 'Editar', $parameters = $empresa->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
						</tbody>
						@endforeach
					</table>	
								
				</div>

			</div>
		</div>
		{!!$empresas->render()!!}
	</div>
</div>
@stop
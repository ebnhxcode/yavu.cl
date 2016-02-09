@extends('layouts.frontadm')	
@section('content')
<div class="jumbotron">
	<div id="contentIn">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		<h2>Panel de administración</h2>		
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Mantenedor de pagos</h4></div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Ciudad</th>
						<th>Fono</th>
						<!-- <th>Aniversario Empresa</th> -->
						<th>Encargado</th>
						<th>Operaciones</th>
					</thead>
					@foreach($empresas as $empresa)	
					<tbody>
						<td>{{$empresa->nombre}}</td>
						<td>{{$empresa->email}}</td>
						<td>{{$empresa->ciudad}}</td>
						<td>{{$empresa->fono}}</td>
						<!-- <td>{{$empresa->fecha_creacion}}</td> -->
						<td>{{$empresa->nombre_encargado}}</td>
						<td>{!!link_to_route('pagos.edit', $title = 'Editar', $parameters = $empresa->id, $attributes = ['class'=>'btn btn-primary'])!!}
						
						</td>

					</tbody>

					@endforeach

				</table>	
			</div>
		</div>	
		{!!$empresas->render()!!}
	</div>
</div>
@stop
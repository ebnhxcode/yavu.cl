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
			<div class="panel-heading"><h4>Mantenedor de banner</h4></div>
			<div class="panel-body">
				<table class="table">

					
			
					</form>
				
					<thead>
						<th>Nombre Banner</th>
						<th>Enlace</th>
						<th>Imagen</th>
						<th>Comentario</th>
					</thead>
					@foreach($banners as $banner)	
					<tbody>
						<td>{{$banner->banner_empresa}}</td>
						<td>{{$banner->enlace_empresa}}</td>
						<td>{{$banner->imagen_empresa}}</td>
						<td>{{$banner->comentario_banner}}</td>

						<td>{!!link_to_route('banners.edit', $title = 'Editar', $parameters = $banner->id, $attributes = ['class'=>'btn btn-primary'])!!}
						
						</td>

					</tbody>

					@endforeach

				</table>	
			</div>
		</div>	

	</div>
</div>
@stop

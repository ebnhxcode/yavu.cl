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
			<div class="panel-heading"><h4>Mantenedor de categoria</h4></div>
			<div class="panel-body">
				<table class="table">

					
			
					</form>
				
					<thead>
						<th>Nombre Categoria</th>

					</thead>
					@foreach($categorias as $categoria)	
					<tbody>
						<td>{{$categoria->nombre_categoria}}</td>
>

						<td>{!!link_to_route('categorias.edit', $title = 'Editar', $parameters = $categoria->id, $attributes = ['class'=>'btn btn-primary'])!!}
						
						</td>

					</tbody>

					@endforeach

				</table>	
			</div>
		</div>	

	</div>
</div>
@stop

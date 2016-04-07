 @extends('layouts.frontadm')	
@section('content')
<div class="jumbotron">
	<div id="contentIn">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')	
			<div class="col-lg-2 col-sm-2"> <h6>Administración</h6> <a href="#"> 
			<img src= "{!!URL::to('img/yavu007.png')!!}" height="100px" width="100px"/></a>
			</div>	


			<div class="panel-body">
				<table class="table">
					<thead>
					<h5>El panel de administración es una interfaz intuitiva para configurar y administrar las empresas, servicios y estados de pagos de estas mismas. Esto es su base para todo lo relacionado con la plataforma y poder administrar de manera correcta Yavu.cl.</h5>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Operaciones</th>
					</thead>
					@foreach($admins as $admin)	
					<tbody>
						<td>{!!$admin->nombre!!}</td>
						<td>{!!$admin->email!!}</td>
						<td>{!!link_to_route('admins.edit', $title = 'Editar', $parameters = $admin->id, $attributes = ['class'=>'btn btn-primary btn-lg'])!!}</td>
					</tbody>
					@endforeach
				</table>	
				{!!$admins->render()!!}	
			</div>
	
	</div>
</div>


@stop


@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		<h4>Edición de servicios</h4>
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')	
		<div class="row">
			{!!Form::model($servicio, ['method'=>'PUT', 'route' => ['servicios.update', $servicio->id] ])!!}
			@include('servicios.forms.fieldsServicio')
				<div class="list-group">
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">
							{!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;', 'id'=>'guardar'])!!}
							<br>
							{!!Form::close()!!}				
						</div>
					</div>
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">
							{!!Form::open(['action'=> ['ServicioController@destroy', $servicio->id], 'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
							{!!Form::close()!!}													
						</div>	
					</div>		
				</div>
			</div><!--Este fin del div cierra el div que se abre en fieldsUser-->	
		</div>
	</div>
</div>
@stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		<h4>Registro de cliente </h4>
		<div class="row">
			{!!Form::open(['route'=>'sorteo.store', 'method'=>'POST'])!!}
			@include('forms.fieldsSorteo')
				<div class="list-group">
					<div class="list-group-item">
						<h4>Todos los campos son requeridos</h4>
					</div>
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">							
							{!!Form::label('Registrar')!!}						
							{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;'])!!}
							{!!Form::close()!!}
						</div>	
					</div>
				</div>
			</div><!--Este fin del div cierra el div que se abre en fieldsUser-->	
		</div>
	</div>
@stop

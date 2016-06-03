@section('favicon') {!!Html::favicon('favicons/user.png')!!} @stop
@section('title') Create new @stop
@extends('layouts.front')
@if(isset($var))
	{!! $var !!}
@endif
@section('content')
<div class='jumbotron'>
	<div id='contentMiddle'>

		@include('alerts.allAlerts')

		<!--<h4>Registro de usuarios </h4>-->
		<div class='row'>
			{!!Form::open([route('usuarios_create_path'), 'method'=>'POST', 'files' => true])!!}
			@include('usuarios.forms.fieldsUser')
				<div class='list-group'>
					<div class='list-group-item'>
						<h4>Todos los campos son requeridos</h4>
					</div>
					<div class='list-group-item'>
						<div class='form-group has-feedback has-feedback-left'>
							{!!Form::label('Registrar')!!}						
							{!!Form::submit('Registrar', ['class'=>'btn btn-success', 'style'=>'width:100%;'])!!}
							{!!Form::close()!!}
						</div>	
					</div>
				</div>
			</div><!--Este fin del div cierra el div que se abre en fieldsUser-->	
		</div>
	</div>
</div>
@stop

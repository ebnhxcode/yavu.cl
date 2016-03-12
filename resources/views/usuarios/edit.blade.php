{!!Html::script('js/jquery.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		<h4>Actualización de usuario : {{$user->nombre .' '. $user->apellido}}</h4>
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')	
		<div class="row">
			{!!Form::model($user, ['method'=>'PUT', 'route' => ['usuarios.update', $user->id], 'files' => true, 'id' => 'FormUsuario'])!!}
			@include('usuarios.forms.fieldsUser')
				<div class="list-group">
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">
							{!!Form::submit('Guardar', ['class'=>'btn btn-success', 'style'=>'width:100%;', 'id'=>'guardar'])!!}
							<br>
							{!!Form::close()!!}				
						</div>
					</div>
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">
							{!!Form::open(['action'=> ['UserController@destroy', $user->id], 'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar', ['class'=>'btn btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
							{!!Form::close()!!}													
						</div>	
					</div>
					<!--
					<div class="list-group-item">
						<h6>Información en tu perfil completa al:</h6>
						<div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
						    60%
						  </div>
						</div>							
					</div>		
					-->
				</div>
			</div><!--Este fin del div cierra el div que se abre en fieldsUser-->	
		</div>
	</div>
</div>
@stop

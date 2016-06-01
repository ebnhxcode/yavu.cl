@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit {!!$user->nombre!!} @stop
@extends('layouts.front')
@section('content')
<div class='jumbotron'>
	<div id='contentMiddle'>
		<!--Actualización de usuario : {!!$user->nombre .' '. $user->apellido!!}-->
		<!--
		<div class="" style="font-size: 2em;">
			<img width="8%" style="padding-bottom: 20px;" src= "{!!URL::to('/img/users/usuario_nuevo.png')!!}"/><span><a href="{!! URL::to('/profile') !!}">Perfil</a> <span class="requerido">\</span> Informacion de : {!!$user->nombre!!}</span>
		</div>
		-->

		<div class='row'>
			<div class="col-md-12 col-sm-12 col-xs-12">

				@include('alerts.allAlerts')

			</div>
			{!!Form::model($user, ['method'=>'PUT', route('usuarios_put_path', $user->id), 'files' => true, 'id' => 'FormUsuario'])!!}
			@include('usuarios.forms.fieldsUser')
				<div class='list-group'>
					<div class='list-group-item'>
						<div class='form-group has-feedback has-feedback-left'>
							{!!Form::submit('Guardar', ['class'=>'btn btn-success', 'style'=>'width:100%;', 'id'=>'guardar'])!!}
							<br>
							{!!Form::close()!!}				
						</div>
					</div>
					{{--
					<div class='list-group-item'>
						<div class='form-group has-feedback has-feedback-left'>
							{!!Form::open(['action'=> ['UserController@destroy', $user->id], 'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar', ['class'=>'btn btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
							{!!Form::close()!!}
						</div>

					</div>
					--}}
				</div>
			</div><!--Este fin del div cierra el div que se abre en fieldsUser-->	
		</div>
	</div>
</div>
@stop

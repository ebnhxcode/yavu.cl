@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit {!!$admin->nombre!!} @stop
@extends('layouts.frontadm')
@section('content')
<div class="jumbotron">
	<div id="contentIn">
		@include('alerts.allAlerts')
		<!--<h4>Actualización de administrador : {!!$admin->nombre .' '. $admin->apellido!!}</h4>-->
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Mantenedor de administradores</h4></div>
			<div class="panel-body">
				<table class="table">
					{!!Form::model($admin, ['method'=>'PUT', 'route' => ['admins.update', $admin->id] ])!!}
						@include('admins.forms.fieldsAdmin')
						<tr>
							<td>
								Guardar o Eliminar
							</td>
							<td>
								{!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success'])!!}
								{!!Form::close()!!}	
							</td>
							<td>
								{!!Form::open(['action'=> ['AdminController@destroy', $admin->id], 'method'=>'DELETE'])!!}
								{!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger']) !!}﻿
								{!!Form::close()!!}				
							</td>	
						</tr>
				</table>	
			</div>
	    </div>  	
	</div>
</div>
@stop
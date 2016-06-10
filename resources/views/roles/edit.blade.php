@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit {!! $role->nombre !!} @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		<!--<h4>Edición de roles</h4>-->
		@include('alerts.allAlerts')
		<div class="row">
			{!!Form::model($role, ['method'=>'PUT', 'route' => ['roles.update', $role->id] ])!!}
			@include('roles.forms.fieldsRole')
			<div class="list-group">
				<div class="list-group-item">
					<div class="form-group has-feedback has-feedback-left">
						{!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;', 'id'=>'guardar'])!!}
						<br>
						{!!Form::close()!!}
					</div><!-- /div .form-group .has-feedback .has-feedback-left -->
				</div><!-- /div .list-group-item -->
				<div class="list-group-item">
					<div class="form-group has-feedback has-feedback-left">
						{!!Form::open(['action'=> ['RoleController@destroy', $role->id], 'method'=>'DELETE'])!!}
						{!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
						{!!Form::close()!!}
					</div><!-- /div .form-group .has-feedback .has-feedback-left -->
				</div><!-- /div .list-group-item-->
			</div><!-- /div .list-group -->
		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit {!! $servicio->nombre !!} @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				@include('alerts.allAlerts')
			</div><!-- /div col-md12-sm12-xs12 -->
			<div class="col-md-8 col-sm-12 col-xs-12">
				{!!Form::model($servicio, ['method'=>'PUT', 'route' => ['servicios.update', $servicio->id] ])!!}
				@include('servicios.forms.fieldsServicio')
			</div><!-- /div col-md8-sm12-xs12 -->
			<div class="col-md-4 col-sm-12 col-xs-12">
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
							{!!Form::open(['action'=> ['ServicioController@destroy', $servicio->id], 'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
							{!!Form::close()!!}
						</div><!-- /div .form-group .has-feedback .has-feedback-left -->
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->
			</div><!-- /div .col-md4-sm12-xs12 -->
		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
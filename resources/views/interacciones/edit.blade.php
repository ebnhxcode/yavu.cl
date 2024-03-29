@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit interaction @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-md12-sm12-xs12 -->
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				{!!Form::model($interaccion, ['method'=>'PUT', 'route' => ['interacciones.update', $interaccion->id] ])!!}
				@include('interacciones.forms.fieldsInteraccion')
			</div><!-- /div .col-md8-sm12-xs12 -->
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
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
							{!!Form::open(['action'=> ['InteraccionController@destroy', $interaccion->id], 'method'=>'DELETE'])!!}
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
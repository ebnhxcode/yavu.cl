@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') New question @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.allAlerts')
		<!--<h4>Crear una nueva pregunta</h4>-->
		<div class="row">
			{!!Form::open(['route'=>'preguntas.store', 'method'=>'POST'])!!}
			@include('preguntas.forms.fieldsPregunta')
			<div class="list-group">
				<div class="list-group-item">
					<h4>Todos los campos son requeridos</h4>
				</div><!-- /div list-group-item-->
				<div class="list-group-item">
					<div class="form-group has-feedback has-feedback-left">
						{!!Form::label('Registrar')!!}
						{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;'])!!}
						{!!Form::close()!!}
					</div><!-- /div .form-group .has-feedback .has-feedback-left -->
				</div><!-- /div list-group-item-->
			</div><!-- /div .list-group-->
		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle-->
</div><!-- /div .jumbotron -->
@stop
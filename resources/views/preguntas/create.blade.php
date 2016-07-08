@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') New question @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@include('alerts.allAlerts')
			</div><!-- /div col-md12-sm12-xs12 -->
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				{!!Form::open(['route'=>'preguntas.store', 'method'=>'POST'])!!}
				@include('preguntas.forms.fieldsPregunta')
			</div><!-- /div .col-md8-sm12-xs12 -->
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="list-group">
					<div class="list-group-item">
						<h4>Todos los campos son requeridos</h4>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">
							{!!Form::label('Registrar')!!}
							{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;'])!!}
							{!!Form::close()!!}
						</div><!-- /div .form-group .has-feedback .has-feedback-left -->
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->
			</div><!-- /div .col-md4-sm12-xs12 -->
		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop